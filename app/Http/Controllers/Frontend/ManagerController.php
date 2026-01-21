<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Models\RentalEvaluation;
use App\Models\Setting;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Modules\Cms\Entities\EmailTemplate;
use Modules\Leads\Entities\UserEntity;
use Modules\Leads\Notifications\RentalEvaluationNotification;
use Modules\Property\Entities\Property;

class ManagerController
{
    public function propertiesIndex($subdomain = null)
    {
        $account_id = User::where(['slug' => $subdomain])->value('id');
        if (! $account_id) {
            abort(404);
        }
        $property_ids = UserEntity::where('entity_key', 'Property')->where('account_id', $account_id)->pluck('entity_value');
        $properties = Property::whereIn('id', $property_ids)->where('status', 1)->orderByDesc('id')->get();

        return view('property::property.frontend.properties', compact('properties', 'subdomain'));
    }

    public function singleProperty($subdomain = null, $slug = null)
    {
        $property = Property::where('slug', $slug);
        if (Auth::check() && Auth::user()->hasAnyRole('Administrator', 'Property Manager')) {
            $property = $property;
        } else {
            $property = $property->where(['status' => 1]);
        }
        $property = $property->first();
        if ($property) {
            $shortcodes = [
                'form_builder' => function ($data) {
                    $content = '';
                    if (isset($data['id'])) {
                        $content = \Modules\FormBuilder\Entities\Helper::formShortcode($data['id']);
                    }

                    return $content;
                },
            ];
            $property->content = handleShortcodes($property->content, $shortcodes);

            return view('property::property.frontend.singleProperty', compact('property', 'subdomain'));
        } else {
            return abort(404);
        }
    }

    public function infoWindow(Request $request)
    {
        $data = null;
        $type = '';
        $directory = '';
        $route = '';
        $data = Property::with('featured_image')->find($request->pid);
        $type = 'properties';
        $directory = 'property_photos';
        $route = route('property.single', [$data->slug]);
        if (! $data) {
            return '';
        }
        $id = $data->id;
        $featuredImage = $data->featured_image['url'] ?? 'bolld-placeholder.png';
        $thumbnailPath = public_path("uploads/{$type}/{$id}/{$directory}/thumbs/{$featuredImage}");
        $img = file_exists($thumbnailPath) ? asset("uploads/{$type}/{$id}/{$directory}/thumbs/{$featuredImage}") : asset('images/bolld-placeholder.png');
        $result = "<div style='width:250px; display:flex'>
                        <div class=''>
                            <a href='".$route."'>
                                <img style='width: 80px;min-height: 72px;' class='rp-thumbnail' src='".$img."'>
                            </a>
                        </div>
                        <div style='margin-left:5px;'>
                            <div class='mb-1'>
                                <a style='font-size: 11px;font-weight: 600;margin-bottom:5px' href='".$route."'>".$data->title."</a>
                            </div><div>
                            <p class='mb-1'>".$data->beds.' Beds | '.$data->baths.' Baths | '.$data->area." sqft</p>
                        </div><div class='text-end'>
                        <a href='".$route."' class='btn btn-sm btn-warning waves-effect waves-light' style='font-size: 12px; color: #FFF;'>Details</a>
                    </div>
                </div>
            </div>";

        return $result;
    }

    public function rentalEvaluation(Request $request, $subdomain = null)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'email|required',
                'phone' => 'required',
                'bedrooms' => 'required',
                'bathrooms' => 'required',
            ]);
            $manager = User::where(['slug' => $subdomain])->first();
            $data = $request->all();
            $data['account_id'] = $manager->id;
            $result = RentalEvaluation::create($data);

            // Manager Email
            $notify_data = $request->only('first_name', 'last_name', 'email', 'phone', 'address', 'unit_no', 'bedrooms', 'bathrooms', 'square_footage');
            $html_content = '<p>Dear '.$manager->first_name.'</p>';
            $html_content .= '<p>I hope this message finds you well. I wanted to inform you that you have received a new rental evaluation request. Below are the details of the request:</p>';
            $html_content .= '<table border="0" cellspacing="3" cellpadding="3">';
            foreach ($notify_data as $key => $value) {
                $html_content .= '<tr>';
                $html_content .= '<td>'.htmlspecialchars($key).'</td>';
                $html_content .= '<td> : </td>';
                $html_content .= '<td>'.htmlspecialchars($value).'</td>';
                $html_content .= '</tr>';
            }
            $html_content .= '</table><br>';
            $html_content .= '<p>Please review the information and proceed with the evaluation process at your earliest convenience.</p>';
            // $manager->notify(new RentalEvaluationNotification($html_content, 'New Rental Evaluation Request Received'))->delay(now()->addMinutes(1));

            Notification::send($manager, (new RentalEvaluationNotification($html_content, 'New Rental Evaluation Request Received'))->delay(Carbon::now()->addSeconds(5)));

            // User Email
            $content = EmailTemplate::where(['slug' => 'rental-evaluation-welcome', 'is_active' => 1])->first();
            if ($content) {
                $user = new User();
                $user->email = $request->email;
                $user->name = $request->first_name.' '.$request->last_name;
                $html_content = $content->content;
                $subject = $content->subject ? $content->subject : 'Your rental evaluation request has been received!';
                $user->notify(new RentalEvaluationNotification($html_content, $subject));
                Notification::route('email', $request->email)->notify(new RentalEvaluationNotification($html_content, $subject));
            }

            return redirect()->route('dynamic.rentalEvaluation', ['subdomain' => $subdomain])->withFlashSuccess(__('Thank you! Your request has been sent.'));
        }

        return view('frontend.pages.rentalEvaluation', compact('subdomain'));
    }

    public function termsConditions($subdomain = null)
    {
        $account_id = User::where(['slug' => $subdomain])->value('id');
        $terms = Setting::where('account_id', $account_id)->where('key', 'terms_conditions')->first();
        if ($terms) {
            $page_title = 'Terms & <span class="color-yellow">Conditions</span>';
            $page_content = json_decode($terms->value)->terms_conditions;
        } else {
            $page_title = $page_content = '';
        }

        return view('frontend.pages.page', compact('subdomain', 'page_content', 'page_title'));
    }

    public function privacyPolicy($subdomain = null)
    {
        $account_id = User::where(['slug' => $subdomain])->value('id');
        $privacy = Setting::where('account_id', $account_id)->where('key', 'privacy_policy')->first();
        if ($privacy) {
            $page_title = 'Privacy <span class="color-yellow">Policy</span>';
            $page_content = json_decode($privacy->value)->privacy_policy;
        } else {
            $page_title = $page_content = '';
            abort(404);
        }

        return view('frontend.pages.page', compact('subdomain', 'page_content', 'page_title'));
    }
}
