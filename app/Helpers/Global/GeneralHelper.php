<?php

use App\Domains\Auth\Models\User;
use App\Exceptions\GeneralException;
use App\Models\Setting;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Media;
use Modules\Property\Entities\ShowingApplication;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'For Rent Central');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @return Carbon
     *
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            }
            if (auth()->user()->isUser()) {
                if (Auth::user()->hasRole('Agent')) {
                    return 'agent.dashboard';
                } elseif (Auth::user()->hasRole('Property Owner')) {
                    return 'owner.dashboard';
                } elseif (Auth::user()->hasRole('Property Manager')) {
                    if (Auth::user()->subscriptions()->active()->count() == '0') {
                        return 'frontend.price';
                    } else {
                        return 'manager.dashboard';
                    }
                } else {
                    return 'frontend.user.dashboard';
                }
            }
        }

        return 'frontend.index';
    }
}

if (! function_exists('is_base64')) {
    function is_base64($str)
    {
        if (is_array($str)) {
            foreach ($str as $element) {
                if (strpos($element, 'data:image/png;base64') !== false) {
                    return true;
                }
            }

            return false;
        } elseif (is_string($str)) {
            return strpos($str, 'data:image/png;base64') !== false;
        } else {
            return false; // Not a string or an array
        }
    }
}
/*
if (!function_exists('SignPad')) {
    function SignPad($request, $btn_text, $errors = null) {
        $output = '<div class="signature_box">
        <div class="sigPad signlist_' . $request . '">
        <button class="signclick btn btn-sm text-white btn-danger" id="_' . $request . 'textsign" type="button" style="width: 50%;">' . $btn_text . '</button>
            <div class="tooltipsign" id="_' . $request . 'textdivsign">
            <button type="button" class="close">×</button>
            <div class="panel with-nav-tabs panel-success">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="drawsign-tab-' . $request . '" data-bs-toggle="tab" data-bs-target="#drawsign_' . $request . '" type="button" role="tab" aria-controls="drawsign_' . $request . '" aria-selected="true">Draw Sign</button>
                    <button class="nav-link" id="typesign-tab-' . $request . '" data-bs-toggle="tab" data-bs-target="#typesign_' . $request . '" type="button" role="tab" aria-controls="typesign_' . $request . '" aria-selected="true">Type Sign</button>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="drawsign_' . $request . '" role="tabpanel" aria-labelledby="drawsign-tab-' . $request . '" tabindex="0">
                        <div class="clearsign" id="signpad_' . $request . '_Container">
                            <canvas role="_' . $request . '" id="signpad_' . $request . '"></canvas>
                        </div>
                    </div>
                    <div class="tab-pane fade sign_type" id="typesign_' . $request . '" role="tabpanel" aria-labelledby="typesign-tab-' . $request . '" tabindex="0">
                        <input role="_' . $request . '" class="form-control signtype typeunique_' . $request . '" placeholder="Type here..." type="text">
                        <div class="signtyped holdplacesign_' . $request . '"></div>
                        <button type="button" role="_' . $request . '" class="btn btn-danger clear">Clear</button>
                    </div>
                </div>
            </div>
            <button type="button" role="_' . $request . '" class="okbtn btn btn-danger">Ok</button>
            <input  type="hidden" class="form-control output inputfield_' . $request . '" value="">
            </div>
            </div>
        </div>';

        return $output;
    }
}
 */
if (! function_exists('SignPad')) {
    function SignPad($request, $btn_text, $errors = null)
    {
        $output = '<div class="signature_box">
            <div class="sigPad signlist_' . $request . '">
                <button class="signclick btn btn-md text-white btn-danger" id="_' . $request . 'textsign" type="button">' . $btn_text . '</button>
                <div class="tooltipsign" id="_' . $request . 'textdivsign">
                    <button type="button" class="close">×</button>
                    <div class="panel with-nav-tabs panel-success">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="drawsign-tab-' . $request . '" data-bs-toggle="tab" data-bs-target="#drawsign_' . $request . '" type="button" role="tab" aria-controls="drawsign_' . $request . '" aria-selected="true">Draw Sign</button>
                            <button class="nav-link" id="typesign-tab-' . $request . '" data-bs-toggle="tab" data-bs-target="#typesign_' . $request . '" type="button" role="tab" aria-controls="typesign_' . $request . '" aria-selected="false">Type Sign</button>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="drawsign_' . $request . '" role="tabpanel" aria-labelledby="drawsign-tab-' . $request . '" tabindex="0">
                                <div class="clearsign" id="signpad_' . $request . '_Container">
                                    <canvas role="_' . $request . '" id="signpad_' . $request . '"></canvas>
                                </div>
                            </div>
                            <div class="tab-pane fade sign_type" id="typesign_' . $request . '" role="tabpanel" aria-labelledby="typesign-tab-' . $request . '" tabindex="0">
                                <input role="_' . $request . '" class="form-control signtype typeunique_' . $request . '" placeholder="Type here..." type="text">
                                <div class="signtyped holdplacesign_' . $request . '"></div>
                                <button type="button" role="_' . $request . '" class="btn btn-danger clear">Clear</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" role="_' . $request . '" class="okbtn btn btn-danger">Ok</button>
                    <input type="hidden" class="form-control output inputfield_' . $request . '" value="">
                </div>
            </div>
        </div>';

        return $output;
    }
}

if (! function_exists('pdfsign')) {
    function pdfsign($sign = null, $title = null, $width = 150, $height = 65)
    {
        $output = '<div><strong>' . $title . '</strong></div><div class="sign-pad signtyped">';
        if (is_base64($sign) == true) {
            $output .= '<div class="drawsign"><img width="' . $width . '" height="' . $height . '" src="' . $sign . '"></div>';
        } else {
            $output .= '<div class="typedsign">' . $sign . '</div>';
        }
        $output .= '</div>';

        return $output;
    }
}

if (! function_exists('isModuleEnabled')) {
    /**
     * Checks if given module is enabled
     *
     * @return bool
     */
    function isModuleEnabled($moduleName)
    {
        return \Module::collections()->has($moduleName);
    }
}

if (! function_exists('handleShortcodes')) {
    function handleShortcodes($content, $shortcodes)
    {
        //Loop through all shortcodes
        foreach ($shortcodes as $key => $function) {
            $dat = [];
            preg_match_all("/\[" . $key . " (.+?)\]/", $content, $dat);
            if (count($dat) > 0 && $dat[0] != [] && isset($dat[1])) {
                $i = 0;
                $actual_string = $dat[0];
                foreach ($dat[1] as $temp) {
                    $temp = explode(' ', $temp);
                    $params = [];
                    foreach ($temp as $d) {
                        [$opt, $val] = explode('=', $d);
                        $params[$opt] = trim($val, '"');
                    }
                    $content = str_replace($actual_string[$i], $function($params), $content);
                    $i++;
                }
            }
        }

        return $content;
    }
}

if (! function_exists('getUsersByRole')) {
    function getUsersByRole($role)
    {
        $users = \App\Domains\Auth\Models\User::whereHas('roles', function ($q) use ($role) {
            $q->where('name', $role);
        })->get();

        return $users;
    }
}

if (! function_exists('getUserByID')) {
    function getUserByID($user_id)
    {
        $user = \App\Domains\Auth\Models\User::where('id', $user_id)->first();

        return $user;
    }
}

if (! function_exists('get_lat_long')) {
    function get_lat_long($address)
    {
        $address = str_replace('#', '', $address);
        $address = str_replace(',', '', $address);
        $address = str_replace(' ', '+', $address);
        //return $address;
        $client = new Client(['timeout' => 7.0]);
        $verify = true;
        $caCertPath = 'C:\cacert.pem';
        if (file_exists($caCertPath)) {
            $verify = $caCertPath;
        }

        $address = urlencode($address);
        $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
            'query' => [
                'address' => $address,
                'key' => env('GOOGLE_MAP_KEY'),
            ],
            'verify' => $verify,
        ])->getBody();
        // $request = $client->post('https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&key=' . env('GOOGLE_MAP_KEY'), $verifyOption);
        // $response = $request->getBody();
        $json = json_decode($response);
        $city = $state = $country = $postal_code = $neighborhood = $st_address = '';
        foreach ($json->results as $result) {
            foreach ($result->address_components as $addressPart) {
                if ((in_array('locality', $addressPart->types)) && (in_array('political', $addressPart->types))) {
                    $city = $addressPart->long_name;
                } elseif ((in_array('administrative_area_level_1', $addressPart->types)) && (in_array('political', $addressPart->types))) {
                    $state = $addressPart->long_name;
                } elseif ((in_array('country', $addressPart->types)) && (in_array('political', $addressPart->types))) {
                    $country = $addressPart->long_name;
                } elseif ((in_array('postal_code', $addressPart->types))) {
                    $postal_code = $addressPart->long_name;
                } elseif ((in_array('neighborhood', $addressPart->types)) && (in_array('political', $addressPart->types))) {
                    $neighborhood = $addressPart->long_name;
                } elseif ((in_array('route', $addressPart->types)) && (in_array('political', $addressPart->types))) {
                    $st_address = $addressPart->long_name;
                }
            }
        }
        $response = json_decode($response, true);
        $geo = [];
        if (isset($response['results'][0])) {
            $geo['neighborhood'] = $neighborhood;
            $geo['st_address'] = $st_address;
            $geo['city'] = $city;
            $geo['state'] = $state;
            $geo['country'] = $country;
            $geo['postal_code'] = $postal_code;
            $geo['lat'] = $json->results[0]->geometry->location->lat;
            $geo['long'] = $json->results[0]->geometry->location->lng;
            $geo['formatted_address'] = $json->results[0]->formatted_address;
            $geo['place_id'] = $json->results[0]->place_id;
            // $geo['lat'] = $response['results'][0]['geometry']['location']['lat'];
            // $geo['long'] = $response['results'][0]['geometry']['location']['lng'];
            // $geo['formatted_address'] = $response['results'][0]['formatted_address'];
            // $geo['place_id'] = $response['results'][0]['place_id'];
        }

        return $geo;
    }
}

if (! function_exists('checkShowLimit')) {
    function checkShowLimit($showing_id = null, $property_id = null)
    {
        $showing_limit = ShowingApplication::where('showing_id', $showing_id)->where('property_id', $property_id)->count();

        return $showing_limit;
    }
}

if (! function_exists('send_sms')) {
    function send_sms($from, $to, $body)
    {
        $id = config('services.twilio.sid');
        $token = config('services.twilio.token');
        // $url = "https://api.twilio.com/2010-04-01/Accounts/".$id."/SMS/Messages";
        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/Messages.json";
        $data = [
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        ];
        $post = http_build_query($data);
        $x = curl_init($url);
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        curl_close($x);

        return $y;
    }
}

if (! function_exists('saveImage')) {
    function saveImage($file, $directory, $fileName, $width, $height = null)
    {
        $image = Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($directory . '/' . $fileName, 80)->destroy();
    }
}

if (! function_exists('generateFileName')) {
    function generateFileName($file, $includeTime = false)
    {
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $time = $includeTime ? '-' . time() : '';

        return slugify($filename) . $time . '.' . $extension;
    }
}

if (! function_exists('slugify')) {
    function slugify($text)
    {
        $text = preg_replace('/[^a-z0-9]/i', '-', $text);
        $text = preg_replace('/-+/', '-', $text);
        $text = trim($text, '-');
        $text = strtolower($text);

        return $text;
    }
}

if (! function_exists('uploadFile')) {
    function uploadFile($file, $id, $type, $model)
    {
        $allowedImageTypes = ['jpeg', 'png', 'jpg', 'gif', 'svg'];
        $allowedFileTypes = array_merge($allowedImageTypes, ['pdf']);
        $allowedTypes = (in_array($type, ['building_photos', 'property_photos'])) ? $allowedImageTypes : $allowedFileTypes;
        $fileExtension = strtolower($file->getClientOriginalExtension());
        if (! in_array($fileExtension, $allowedTypes)) {
            Log::warning('Unsupported file type uploaded: ' . $fileExtension);

            return;
        }
        if ($fileExtension != 'pdf') {
            $baseDir = public_path('uploads/' . $model . '/' . $id . '/');
            if (! File::isDirectory($baseDir)) {
                File::makeDirectory($baseDir, 0777, true, true);
            }
            $typeDir = $baseDir . '/' . $type;
            if (! File::isDirectory($typeDir)) {
                File::makeDirectory($typeDir, 0777, true, true);
            }
            chmod($baseDir, 0777);
            $dirThumb = $typeDir . '/thumbs';
            $original = $typeDir . '/original';

            foreach ([$dirThumb, $original] as $directory) {
                if (! File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0777, true, true);
                }
            }
        }
        $fileName = generateFileName($file);
        if ($fileExtension == 'pdf') {
            $baseDir = public_path('uploads/' . $type . '/' . $id . '/');
            if (! File::isDirectory($baseDir)) {
                File::makeDirectory($baseDir, 0777, true, true);
            }
            $fileName = generateFileName($file);
            $file->move($baseDir, $fileName);
        } else {
            saveImage($file, $original, $fileName, 1600);
            saveImage($file, $baseDir, $fileName, 845);
            saveImage($file, $dirThumb, $fileName, 405, 304);
            saveImage($file, $dirThumb, generateFileName($file, true), 150, 150);
        }

        $haveFeatured = Media::where(['ref_id' => $id, 'featured' => '1', 'type' => $type])->first();
        $featured = $haveFeatured ? '1' : '0';
        $attachArray = [
            'ref_id' => $id,
            'type' => $type,
            'url' => $fileName,
            'featured' => $featured,
        ];
        Media::create($attachArray);

        return $attachArray['url'];
    }
}

if (! function_exists('str_random')) {
    function str_random($length)
    {
        return Str::random($length);
    }
}

if (! function_exists('extract_name')) {
    function extract_name($name = null)
    {
        if (empty($name)) {
            $name = Auth::user()->name;
        }
        $names = explode(' ', $name, 2);
        $fullname = [];
        if (isset($names[0])) {
            $fullname['first_name'] = $names[0];
        } else {
            $fullname['first_name'] = '';
        }
        if (isset($names[1])) {
            $fullname['last_name'] = $names[1];
        } else {
            $fullname['last_name'] = '';
        }

        return $fullname;
    }
}

if (! function_exists('extract_name2')) {
    function extract_name2($name = null)
    {
        $parts = [];
        if (empty($name)) {
            $name = Auth::user()->name;
        }
        while (strlen(trim($name)) > 0) {
            $name = trim($name);
            $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
            $parts[] = $string;
            $name = trim(preg_replace('#' . $string . '#', '', $name));
        }
        if (empty($parts)) {
            return false;
        }
        $parts = array_reverse($parts);
        $name = [];
        $name['first_name'] = $parts[0];
        $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
        $name['last_name'] = (isset($parts[2])) ? $parts[2] : (isset($parts[1]) ? $parts[1] : '');

        return $name;
    }
}

if (! function_exists('str_slug')) {
    function str_slug($name = null)
    {
        return Str::slug($name);
    }
}

if (! function_exists('numtoword')) {
    function numtoword($num)
    {
        if (! in_array(($num % 100), [11, 12, 13])) {
            switch ($num % 10) {
                case 1:
                    return $num . 'st';
                case 2:
                    return $num . 'nd';
                case 3:
                    return $num . 'rd';
            }
        }

        return $num . 'th';
    }
}

if (! function_exists('admin_email')) {
    function admin_email($email = null)
    {
        $adminRole = 'admin';
        $result = User::whereHas('roles', function ($query) use ($adminRole) {
            $query->where('name', $adminRole);
        })->first();

        if ($result) {
            return $result->email;
        } else {
            // If no admin user found, fallback to the provided email or null
            return $email;
        }
    }
}

if (! function_exists('collectData')) {
    function collectData($data, $subject, $textBody, $textBody2 = null)
    {
        $user_email = isset($data['email']) ? $data['email'] : $data->email;
        $user_name = isset($data['name']) ? $data['name'] : $data->name;
        $userObj = [
            'user_email' => $user_email,
            'from_email' => config('mail.from.address'),
            'from_name' => config('mail.from.name'),
            'site_name' => config('app.name'),
            'user_name' => $user_name,
            'subject' => $subject,
            'msg' => $textBody,
            'msg2' => $textBody2,
        ];

        return $userObj;
    }
}

if (! function_exists('getImageUrl')) {
    function getImageUrl($model, $relationshipName, $imageColumn = 'url')
    {
        $image = $model->$relationshipName->where('featured', '1')->first();

        return $image ? url($image->$imageColumn) : asset('images/bolld-placeholder.png');
    }
}

if (! function_exists('createBaseDirectory')) {
    function createBaseDirectory($type, $id, $permissions = 0777)
    {
        $baseDir = public_path('uploads/' . $type . '/' . $id . '/');
        if (! File::isDirectory($baseDir)) {
            File::makeDirectory($baseDir, $permissions, true, true);
        }

        return $baseDir;
    }
}

if (! function_exists('rolebased')) {
    function rolebased()
    {
        $role = 'user';
        if (Auth::check()) {
            if (Auth::user()->hasRole('Administrator')) {
                $role = 'admin';
            } elseif (Auth::user()->hasRole('Property Manager')) {
                $role = 'manager';
            } elseif (Auth::user()->hasRole('Property Owner')) {
                $role = 'owner';
            } elseif (Auth::user()->hasRole('Tenant')) {
                $role = 'tenant';
            } elseif (Auth::user()->hasRole('Agent')) {
                $role = 'agent';
            }
        }

        return $role;
    }
}

if (! function_exists('userEntity')) {
    function userEntity($account_id, $key, $value)
    {
        UserEntity::updateOrCreate(
            ['account_id' => $account_id, 'entity_key' => $key, 'entity_value' => $value],
            ['account_id' => $account_id, 'entity_key' => $key, 'entity_value' => $value]
        );
    }
}

if (! function_exists('getManagerUsersByRole')) {
    function getManagerUsersByRole($role)
    {
        $users = null;
        try {
            $user = Auth::user();
            if (! $user) {
                throw new Exception('User not authenticated.');
            }
            if ($user->hasManagerAccess()) {
                $entityIds = UserEntity::where(['account_id' => $user->id, 'entity_key' => $role])->pluck('entity_value')->toArray();
                $users = User::whereIn('id', $entityIds)->get();
            } elseif ($user->hasAllAccess()) {
                $users = User::whereHas('roles', function ($q) use ($role) {
                    $q->where('name', $role);
                })->get();
            } else {
                throw new GeneralException(__('User does not have sufficient access.'));
            }
        } catch (Exception $e) {
            Log::error('Error in getManagerUsersByRole: ' . $e->getMessage());
            throw new GeneralException(__('User does not have sufficient access.'));
        }

        return $users;
    }
}

if (! function_exists('getPropertyAgentByID')) {
    function getPropertyAgentByID($userId)
    {
        $user = User::whereIn('id', $userId)->get();

        return $user;
    }
}

if (! function_exists('agentsList')) {
    function agentsList()
    {
        $user = Auth::user();
        $agents = [];
        if ($user->hasManagerAccess()) {
            $entityIds = UserEntity::where(['account_id' => $user->id, 'entity_key' => 'Agent'])->pluck('entity_value')->toArray();
            $ids = array_merge($entityIds, [$user->id]);
            $agents = User::whereIn('id', $ids)->get();
        } elseif ($user->hasAllAccess()) {
            $agents = User::whereHas('roles', function ($query) {
                $query->where('name', 'Agent');
            })->get();
        } elseif ($user->hasRole('Agent')) {
            $agents = User::where('id', $user->id)->get();
        }

        return $agents;
    }
}

/* if (!function_exists('property_type_count')) {
    function property_type_count($type = null, $start = null, $end = null, $agent = null, $count = null)
    {
        if ($start == null || $end == null) {
            $start = Carbon::now()->subDays(6);
            $end = Carbon::now();
        }

        if (isset($type) && $type == 'new') {
            $result = Property::where('status', '1')->whereBetween('created_at', [$start, $end]);
            if (isset($agent) && $agent != '') {
                $result->where('prop_agents', $agent);
            }
            if ($count == 'array') {
                return $result->pluck('id')->toArray();
            }
        } elseif (isset($type) && $type == 'For Rent') {
            $result = PropertyReport::where('property_status', $type)->whereBetween('created_at', [$start, $end])->groupBy('property_id');
        } elseif (isset($type) && $type == 'Rented') {
            $result = PropertyReport::where('property_status', $type)->whereBetween('status_changed_at', [$start, $end])->groupBy('property_id');
        } else {
            $result = PropertyReport::whereBetween('created_at', [$start, $end])->groupBy('property_id');
        }
        if (isset($agent) && $agent != '' && $type != 'new') {
            $result->where('agent_id', $agent);
        }
        if ($count == 'array') {
            return $result->pluck('property_id')->toArray();
        } else {
            return $result->get()->count();
        }
    }
}

if (!function_exists('property_showings_count')) {
    function property_showings_count($agent = null, $start = null, $end = null)
    {
        if ($start == null || $end == null) {
            $start = Carbon::now()->startOfWeek(Carbon::TUESDAY);
            $end = Carbon::now()->endOfWeek(Carbon::MONDAY);
        }
        $result = PropertyReport::select(\DB::raw('SUM(showings) as showings'))->whereBetween('created_at', [$start, $end]);
        if (isset($agent) && $agent != '') {
            return $result->where('agent_id', $agent)->first()->showings;
        } else {
            return $result->first()->showings;
        }
    }
}

if (!function_exists('property_showings_apps_count')) {
    function property_showings_apps_count($agent = null, $start = null, $end = null)
    {
        if ($start == null || $end == null) {
            $start = Carbon::now()->startOfWeek(Carbon::TUESDAY);
            $end = Carbon::now()->endOfWeek(Carbon::MONDAY);
        }
        $result = PropertyReport::select(\DB::raw('SUM(applications) as applications'))->whereBetween('created_at', [$start, $end]);
        if (isset($agent) && $agent != '') {
            return $result->where('agent_id', $agent)->first()->applications;
        } else {
            return $result->first()->applications;
        }
    }
} */

if (! function_exists('managerSetting')) {
    function managerSetting($request, $key, $filename, $width = null, $height = null)
    {
        $userId = Auth::user()->id;
        try {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $extension = $file->getClientOriginalExtension();
                $image_name = $filename . '-' . $userId . '.' . $extension;
                $path = 'uploads/setting/' . $userId;
                if (! File::exists(public_path($path))) {
                    File::makeDirectory(public_path($path), 0755, true);
                }
                $image = Image::make($file->getRealPath());

                if ($height == $width) {
                    $image->fit($width, $height);
                } else {
                    $image->resize(null, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                }

                $image->encode('png', 75);
                $image->save(public_path($path . '/' . $image_name));

                return $image_name;
            }
        } catch (\Exception $e) {
            throw new \Exception('File upload failed: ' . $e->getMessage());
        }
    }
}

if (! function_exists('managerSettingData')) {
    function managerSettingData($subdomain)
    {
        $account_id = User::where(['slug' => $subdomain])->value('id');
        $general_setting = Setting::where(['account_id' => $account_id, 'key' => 'general_setting'])->first();
        if ($general_setting) {
            return $general_setting = json_decode($general_setting->value);
        }

        return null;
    }
}
