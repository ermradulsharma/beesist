<?php

namespace Modules\Tenant\Http\Controllers;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Notifications\ThankYouEmailNotification;
use App\Notifications\WelcomeEmailNotification;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Modules\Leads\Notifications\FormNotification;
use Modules\Property\Entities\Property;
use Modules\Tenant\Entities\Tenant;

class TenantController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    protected function createUser(array $data)
    {
        return $this->userService->registerUser($data);
    }

    public function index()
    {
        $properties = Property::latest()->get();

        return view('tenant::index', compact('properties'));
    }

    public function store(Request $request)
    {
        $userExists = User::where('email', $request->email)->first();
        if (! $userExists) {
            $password = str_random(8);
            $userData = [
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'name' => $request->fname . ' ' . $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country ?? 'CA',
                'type' => 'user',
                'password' => bcrypt($password),
            ];
            event(new Registered($createUser = $this->createUser($userData)));
            $createUser->assignRole('Tenant');
            if ($createUser) {
                try {
                    $createUser->notify(new WelcomeEmailNotification($createUser, $password));
                    if (Auth::check() && Auth::user()->hasRole('Administrator')) {
                        $adminSubject = 'New Tenant registered on ' . config('app.name') . '!';
                        $adminTextBody = '<p>A new tenant has been registered with the following details: <br>' .
                            'Name: ' . $createUser->name . '<br>' .
                            'E-mail: ' . $createUser->email . '<br>' .
                            'Phone: ' . $createUser->phone . '<br>' .
                            'Country: ' . $userData['country'] .
                            '</p>';
                        $adminData = Auth::user();
                        $adminObj = collectData($adminData, $adminSubject, $adminTextBody);
                        $adminData->notify(new FormNotification($adminObj));
                    }
                } catch (\Exception $e) {
                    Log::error($e);
                }
                $userId = $createUser->id;
            }
            $userId = $createUser->id;
        } else {
            $userId = $userExists->id;
        }
        Tenant::updateOrCreate(
            ['property_id' => $request->prop_id, 'user_id' => $userId],
            ['property_id' => $request->prop_id, 'user_id' => $userId]
        );

        $property = Property::find($request->prop_id);
        $user = User::find($userId);
        $subject = 'Thank you for your interest in our listing!';
        $message = '<p>Thank you for your interest in our listing, (' . $property->title . ')! Please make sure that you fill out the full application form.</p>
        <p>In case you have not been redirected to the application form page or you did not have a chance to complete, you can find it here: <a href="' . route('tenant.agreementForm') . '">Application Form</a></p>
        <p>Please contact us if you have any questions or need assistance simply by replying to this email.</p>';
        $userObj = collectData($user, $subject, $message);
        $user->notify(new ThankYouEmailNotification($userObj));
        if (isset($request->by_admin) && $request->by_admin == 'YES') {
            return back();
        }

        return redirect()->route('rental_application.rentalApplication');
    }

    public function applyTenancyApplication(Request $request)
    {
        $userExists = User::where('email', $request->email)->first();
        if ($userExists) {
            $user_id = $userExists->id;
        } else {
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users',
                'fname' => 'required',
                'lname' => 'required',
            ]);
            $password = str_random(8);
            $user_created = User::create([
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'name' => $request->fname . ' ' . $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'type' => 'user',
                'password' => bcrypt($password),
            ]);
            if ($user_created) {
                //auth()->login($user_created, true);
                $user_id = $user_created->id;
                $user['user_mail'] = $user_created->email;
                $user['admin_mail'] = env('ADMIN_EMAIL');
                $user['from_email'] = env('MAIL_FROM_ADDRESS');
                $user['from_name'] = env('MAIL_FROM_NAME');
                $user['site_name'] = env('APP_NAME');
                $text_body = '<p>Your account has been created with ' . $user['site_name'] . ', you can login with:<br>Username: ' . $user_created->email . '<br>Password: ' . $password . '</p>';
                Mail::send('emails.mail', ['name' => $request->fname, 'body' => $text_body, 'subject' => 'Registration confirmed at ' . $user['site_name'] . '!', 'access_form' => '', 'view_form' => ''], function ($message) use ($user) {
                    $message->from($user['from_email'], $user['from_name']);
                    $message->subject('Registration confirmed at ' . $user['site_name'] . '!');
                    $message->to($user['user_mail']);
                });
                if (isset($request->by_admin) && $request->by_admin == 'YES') {
                } else {
                    Mail::send('emails.newUserAdmin', ['name' => $request->fname, 'email' => $user_created->email, 'phone' => $user_created->phone, 'country' => ''], function ($message) use ($user) {
                        $message->from($user['from_email'], $user['from_name']);
                        $message->subject('New Tenant registerd on ' . $user['site_name'] . '!');
                        $message->to($user['admin_mail']);
                    });
                }
            }
        }

        $tenancy_app = Tenant::updateOrCreate(
            ['property_id' => $request->prop_id, 'user_id' => $user_id],
            ['property_id' => $request->prop_id, 'user_id' => $user_id]
        );

        $property = Property::find($request->prop_id);

        $user['user_mail'] = $request->email;
        $user['admin_mail'] = env('ADMIN_EMAIL');
        $user['from_email'] = env('MAIL_FROM_ADDRESS');
        $user['from_name'] = env('MAIL_FROM_NAME');
        $user['site_name'] = env('APP_NAME');
        $text_body = '<p>Thank you for your interest in our listing, (' . $property->title . ')! Please make sure that you fill out the full application form.</p>
            <p>In case you have not been redirected to the application form page or you did not have a chance to complete, you can find it here: https://bolld.managebuilding.com/Resident/rental-application</p>
            <p>Please contact us if you have any questions or need assistance simply by replying to this email.</p>';
        Mail::send('emails.mail', ['name' => $request->fname, 'body' => $text_body, 'subject' => 'Thank you for your interest in our listing!', 'access_form' => '', 'view_form' => ''], function ($message) use ($user) {
            $message->from($user['from_email'], $user['from_name']);
            $message->subject('Thank you for your interest in our listing!');
            $message->to($user['user_mail']);
        });


        if (isset($request->by_admin) && $request->by_admin == 'YES') {
            return back();
        }

        return Redirect::to('https://bolld.managebuilding.com/Resident/apps/rentalapp');
    }
}
