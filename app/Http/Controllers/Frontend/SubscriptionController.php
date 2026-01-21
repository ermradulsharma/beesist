<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Laravel\Cashier\Subscription;
use Modules\Leads\Entities\UserEntity;

class SubscriptionController extends Controller
{
    public function subscriber($id)
    {
        $packageObj = Package::find($id);
        $intent = null;
        if (Auth::check()) {
            $user = Auth::user();
            $setupIntent = $user->createSetupIntent();
            if ($setupIntent) {
                $intent = $setupIntent;
            }
        }

        return view('frontend.subscription.subscriptionPay', compact('packageObj', 'intent'));
    }

    public function price(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = Auth::user();
            $user->update(['email_verified_at' => Carbon::now()]);
            $packageObj = Package::find($request->packageModalId);

            try {
                $subscriptionObj = Subscription::where('user_id', $user->id)->whereNull('ends_at')->latest()->first();
                if ($subscriptionObj) {
                    $currentPlan = $user->subscription($subscriptionObj->name)->markAsCanceled();
                }

                $subscription = $user->newSubscription($packageObj->title, $packageObj->stripe_price_id)->create($request->token);
                UserEntity::updateOrCreate(
                    ['account_id' => Auth::user()->id, 'entity_key' => 'subscription', 'entity_value' => $subscription->id],
                    ['account_id' => Auth::user()->id, 'entity_key' => 'subscription', 'entity_value' => $subscription->id]
                );

                return redirect()->route('frontend.user.payment.success')->withFlashSuccess(__('Subscription successful.'));
            } catch (IncompletePayment $exception) {
                Log::alert($exception->payment->status);
                if ($exception instanceof \Laravel\Cashier\Exceptions\IncompletePayment) {
                    $subscriptionId = $exception->payment->invoice->subscription->id;
                    UserEntity::updateOrCreate(
                        ['account_id' => Auth::user()->id, 'entity_key' => 'subscription', 'entity_value' => $subscriptionId],
                        ['account_id' => Auth::user()->id, 'entity_key' => 'subscription', 'entity_value' => $subscriptionId]
                    );

                    return redirect()->route('cashier.payment', [$exception->payment->id, 'redirect' => route('frontend.user.payment.success', $subscriptionId)]);
                } else {
                    return back()->withInput()->withErrors(['error' => $exception->getMessage()]);
                }
            } catch (\Exception $e) {
                Log::error($e->getMessage());

                return back()->withInput()->withErrors(['error' => $e->getMessage()]);
            }
        } else {
            $services = Service::get();
            $packages = Package::with('package')->get();
            $countries = Countries();
            $intent = null;
            if (Auth::check()) {
                $user = Auth::user();
                $setupIntent = $user->createSetupIntent();
                if ($setupIntent) {
                    $intent = $setupIntent;
                }
            }

            return view('frontend.subscription.subscription', compact('services', 'packages', 'countries', 'intent'));
        }
    }

    public function paymentSuccess($subscription = null)
    {
        if ($subscription) {
            Subscription::where('stripe_id', $subscription)->update(['stripe_status' => 'active']);
        }
        $user = Auth::user();
        $role = $user->roles[0]['name'] ?? 'Manager';

        return view('frontend.subscription.paymentSuccess', compact('role'));
    }

    public function subscribe()
    {
        return view('backend.subscription.index');
    }

    public function mySubscription()
    {
        $user = Auth::user();
        $customerId = $user->stripe_id;
        $stripe = new \Stripe\StripeClient([
             'api_key' => config('cashier.secret'),
             'stripe_version' => "2024-04-10",
         ]);

        $subscriptions = $stripe->subscriptions->all([
            'customer' => $customerId,
            // 'status' => 'active'
        ]);

        $subscriptionObj = Subscription::where('user_id', $user->id)->whereNull('ends_at')->latest()->first();
        $subscription = $stripe->subscriptions->retrieve($subscriptionObj->stripe_id);
        $customer = $stripe->customers->retrieve($customerId, ['expand' => ['invoice_settings.default_payment_method']]);
        $paymentMethod = null;
        if (isset($customer->invoice_settings->default_payment_method)) {
            $paymentMethod = $customer->invoice_settings->default_payment_method->card;
        }

        return view('backend.subscription.manager.index', compact('subscriptions', 'subscription', 'paymentMethod'));
    }
}
