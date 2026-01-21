<?php

namespace Modules\Property\Http\Controllers;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Notifications\WelcomeEmailNotification;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Log;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Modules\Property\Entities\PropertyQuestion;
use Modules\Property\Entities\PropertyShowing;
use Modules\Property\Entities\ShowingApplication;
use Modules\Property\Notifications\AdminShowing;
use Modules\Property\Notifications\AgentAssignedOnShowing;
use Modules\Property\Notifications\AgentShowing;
use Modules\Property\Notifications\DefaultNotification;
use Modules\Property\Notifications\ShowingRequestNotification;
use Modules\Property\Notifications\UserShowing;
use phpDocumentor\Reflection\Types\Null_;

class ShowingController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $agents = agentsList();

        return view('property::showing.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('property::showing.create')->withProperty(new Property);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $sch_dates = '';
            if (isset($request->type) && $request->type === 'multiple') {
                $showingsData = $request->showings;
                $response = [];
                $count = 0;
                $date = [];
                foreach ($showingsData as $showing) {
                    $property = explode('|', $showing['prop_id']);
                    $pro_dates = '';

                    foreach (['date1', 'date2'] as $dateKey) {
                        if (!empty($showing[$dateKey])) {
                            $data = [
                                'prop_id' => $property[0],
                                'agent_id' => $request->prop_agent,
                                'showing_date' => date('Y-m-d H:i:s', strtotime($showing[$dateKey])),
                                'limit' => $showing['limit'],
                                'comments' => $showing['comment'],
                                'status' => '1',
                            ];
                            $show = PropertyShowing::create($data);
                            if (Auth::check() && (Auth::user()->hasManagerAccess() || Auth::user()->hasAllAccess())) {
                                userEntity(Auth::user()->id, 'propertyShowing', $show->id);
                            } elseif (Auth::check() && Auth::user()->hasRole('Agent')) {
                                $account_id = UserEntity::where(['entity_key' => 'property', 'entity_value' => $show->prop_id])->first()->account_id;
                                userEntity($account_id, 'propertyShowing', $show->id);
                            }
                            $date[] = date_format(date_create($showing[$dateKey]), 'F j, Y, g:i a');
                            try {
                                $pro_dates .= '<b>' . date_format(date_create($showing[$dateKey]), 'F j, Y, g:i a') . '</b>';
                            } catch (\Exception $e) {
                                $response['error'] = $e->getMessage();
                            }
                        }
                    }

                    if (!empty($pro_dates)) {
                        $sch_dates .= '<p>Property Name: ' . ($property[1] ?? '') . '<br>Showing on: <ul>' . $pro_dates . '</ul></p>';
                    }
                }

                if (isset($show) && isset($show->agent)) {
                    $response['prop_title'] = $property[1] ?? 'Unknown';
                    $response['showing_date'] = $date;
                    $response['prop_agent'] = $show->agent->name ?? 'Unknown';
                    $subject = 'Assigned as Property Agent';
                    if (is_array($response['showing_date']) && count($response['showing_date']) > 1) {
                        $showingDatesList = '<ul>';
                        foreach ($response['showing_date'] as $date) {
                            $showingDatesList .= "<li> $date </li>";
                        }
                        $showingDatesList .= '</ul>';
                        $message = "You've been assigned as the property agent for: <b>{$response['prop_title']}</b>. This includes showing dates for the property:<br><b>$showingDatesList</b>";
                    } else {
                        $message = "You've been assigned as the property agent for: <b>{$response['prop_title']}</b>. This includes showing dates for the property: {$response['showing_date']}";
                    }

                    try {
                        $show->agent->notify(new AgentAssignedOnShowing($show, $message, $subject));
                    } catch (\Exception $e) {
                        $response['error'] = $e->getMessage();
                    }
                }

                return $response;
            } else {

                $response = [];
                $count = 0;
                foreach ($request->showing_dates as $showing_date) {

                    if (!empty($showing_date['date'])) {
                        try {
                            $data = [
                                'prop_id' => $request->prop_id,
                                'agent_id' => $request->prop_agent,
                                'showing_date' => date('Y-m-d H:i:s', strtotime($showing_date['date'])),
                                'limit' => $showing_date['limit'],
                                'comments' => $request->comments,
                                'status' => '1',
                            ];
                            $showing = PropertyShowing::create($data);

                            // User Entity
                            if (Auth::check() && (Auth::user()->hasManagerAccess() || Auth::user()->hasAllAccess())) {
                                userEntity(Auth::user()->id, 'propertyShowing', $showing->id);
                            } elseif (Auth::check() && Auth::user()->hasRole('Agent')) {
                                $account_id = UserEntity::where(['entity_key' => 'property', 'entity_value' => $showing->prop_id])->first()->account_id;
                                userEntity($account_id, 'propertyShowing', $showing->id);
                            }

                            $sch_dates .= '<br>' . date_format(date_create($showing->showing_date), 'F j, Y, g:i a');
                            $count++;
                        } catch (\Exception $e) {
                            $response['error'] = $e->getMessage();
                        }
                    }
                }

                if (isset($showing)) {
                    $response['prop_title'] = $showing->property->title ?? 'Unknown';
                    $response['showing_date'] = $sch_dates;
                    $response['prop_agent'] = $showing->agent->name ?? 'Unknown';

                    $subject = 'Showing Property to the client';
                    $message = 'Hello ' . $response['prop_agent'];
                    $message .= 'You have been assigned as the property agent for the property <b>' . $response['prop_title'] . '</b>.';
                    $message .= 'The showing date' . ($count > 1 ? 's are' : ' is') . ': <b>' . $sch_dates . '</b>.';

                    try {
                        $showing->agent->notify(new AgentAssignedOnShowing($showing, $message, $subject));
                    } catch (\Exception $e) {
                        $response['error'] = $e->getMessage();
                    }
                }

                return $response;
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return ['error' => $e->getMessage()];
        }
    }

    public function scheduledShowings()
    {
        $agents = agentsList();

        return view('property::showing.scheduledShowings', compact('agents'));
    }

    public function updateScheduledShowings(Request $request, $id = null)
    {
        $showing = PropertyShowing::find($id);
        $data = [
            'showing_date' => $request->showing_date,
            'agent_id' => $request->agent_id,
            'limit' => $request->limit,
            'comments' => $request->comments,
        ];
        $updated = $showing->update($data);
        if ($updated) {
            $showing_apps = ShowingApplication::where('showing_id', $showing->id)->get();
            $agent = $showing->agent;
            $property = $showing->property;

            $emailSubject = 'Showing updated for property ' . $property->title . '!';

            $emailBody = '<p>Below are the updated showing details.<br>
                Property Name: <b>' . $property->title . '</b><br>
                Property Address: <b>' . $property->address . '</b><br>
                Showing Date: <b>' . date_format(date_create($showing->showing_date), 'F j, Y, g:i a') . '</b><br>
                Attendees Limit: <b>' . $showing->limit . '</b><br>
                Agent Name: <b>' . $agent->name . '</b><br>
                Agent Phone: <b>' . $agent->phone . '</b><br>
                Comments: <br><b>' . $showing->comments . '</b>
                </p>';

            $smsBodyAgent = 'Your updated showing schedule for ' . $property->title . ' is now at ' . date_format(date_create($showing->showing_date), 'F j, Y, g:i a');
            $agent->notify(new AgentAssignedOnShowing($showing, $emailBody, $emailSubject));
            if ($showing->agent->phone) {
                send_sms('+16042656950', $showing->agent->phone, $smsBodyAgent);
            }

            if ($showing->property->occupancy_status == 'tenant' && !empty($showing->property->occupancy_tenant_info)) {
                $occupancy_tenant_info = json_decode($showing->property->occupancy_tenant_info, true);
                $tenant_sms_body = 'We have updated the showing schedule of your property at ' . $showing->property->address . ' on ' . date_format(date_create($request->prop_date), 'F j, Y, g:i a') . '. The showing should take about 10-15 minutes';
                if ($occupancy_tenant_info['tenant_phone']) {
                    send_sms('+16042656950', $occupancy_tenant_info['tenant_phone'], $tenant_sms_body);
                }
            }

            //User MAIL
            foreach ($showing_apps as $showing_app) {
                $tenant = $showing_app->tenant;
                $emailBodyTenant = $emailBody;
                $smsBodyTenant = 'We have updated the showing schedule of your property at ' . $property->address . ' on ' . date_format(date_create($request->prop_date), 'F j, Y, g:i a') . '. The showing should take about 10-15 minutes';
                $tenant->notify(new AgentAssignedOnShowing($showing, $emailBodyTenant, $emailSubject));
                if ($showing_app->user->phone) {
                    send_sms('+16042656950', $showing_app->user->phone, $smsBodyTenant);
                }
            }

            return response()->json(['status' => 'success', 'id' => $id]);
        } else {
            return response()->json(['status' => 'error', 'id' => $id]);
        }
    }

    public function propertyShowingAjax(Request $request)
    {
        $property = Property::with('property_showing')->find($request->id);
        $form = $request->form;
        $user = new User();
        if ($request->user) {
            $user = $user->find($request->user);
        }
        $showings = view('property::showing.propertyShowingAjax')->with(compact('property', 'form', 'user', 'request'))->render();

        return response()->json(['success' => true, 'html' => $showings]);
    }

    public function applyShowing(Request $request)
    {
        $property = Property::with('userEntity')->find($request->prop_id);
        if ($request->agent_id) {
            $agentObj = User::find($request->agent_id);
        } else {
            if ($property->prop_agents) {
                $agentIds = explode(',', $property->prop_agents);
                $agentObj = User::whereIn('id', $agentIds)->first();
            } else {
                $agentObj = User::find($property->userEntity->account_id);
            }
        }
        $existUser = User::where('email', $request->email)->first();
        if (!$existUser) {
            $password = Str::random(8);
            $userData = [
                'name' => $request->fname . ' ' . $request->lname,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $password,
                'roles' => 'Tenant',
            ];
            event(new Registered($createUser = $this->createUser($userData)));
            if ($createUser) {
                $createUser->notify(new WelcomeEmailNotification($createUser, $password));
            }
            $userId = $createUser->id;
        } else {
            $userId = $existUser->id;
        }
        userEntity($property->userEntity->account_id, 'Tenant', $userId);
        $show_property = PropertyShowing::with('property', 'agent')->where(['prop_id' => $request->prop_id, 'showing_date' => $request->prop_date, 'status' => '1'])->first();
        if (isset($request->showing_action) && $request->showing_action == 'reschedule') {
            $showing_limit = ShowingApplication::where(['showing_id' => $request->showing_id, 'property_id' => $request->prop_id])->count() ?? 0;
            if ($show_property->limit <= $showing_limit) {
                return '<h4 style="text-align: center;color:red">Sorry!, this showing date has exceeded the number of maximum attendees.</h4>';
            }
            $currentShowing = ShowingApplication::where(['showing_id' => $request->showing_id, 'property_id' => $request->prop_id, 'tenant_id' => $userId, 'showing_date' => $request->prop_date])->first();
            if (!$currentShowing) {
                $currentShowing = new ShowingApplication();
            } else {
                if ($currentShowing->showing_date == $request->prop_date) {
                    return '<h4 style="text-align: center;color:red">it\'s the same date you are requesting again</h4>';
                }
            }
            $currentShowing->showing_id = $request->showing_id;
            $currentShowing->property_id = $request->prop_id;
            $currentShowing->agent_id = $request->agent_id ?? $agentObj->id;
            $currentShowing->tenant_id = $userId;
            $currentShowing->showing_date = $request->prop_date;
            $currentShowing->first_name = $request->fname;
            $currentShowing->last_name = $request->lname;
            $currentShowing->email = $request->email;
            $currentShowing->phone = $request->phone;
            if (empty($request->showing_id) && empty($request->prop_date)) {
                $currentShowing->status = '3';
                $currentShowing->comments = $request->comments;
                $currentShowing->different_time = date('Y-m-d H:i:s', strtotime($request->different_time_input));
            } else {
                $currentShowing->status = '0';
                $currentShowing->comments = $request->comments;
                $currentShowing->different_time = date('Y-m-d H:i:s', strtotime($request->different_time_input));
            }
            $saved = $currentShowing->save();
            if ($currentShowing->save()) {
                $status = $currentShowing->status;
            }
            if ($saved) {
                $reschedule_sms_body = $request->fname . ' ' . $request->lname . ' has rescheduled the showing of property at ' . $show_property->property->address . ' on ' . date_format(date_create($request->prop_date), 'F j, Y, g:i a') . ' to ' . date_format(date_create($request->prop_date), 'F j, Y, g:i a');
                if ($agentObj->phone) {
                    send_sms('+16042656950', $agentObj->phone, $reschedule_sms_body);
                }
                if ($show_property->property->occupancy_status == 'tenant' && !empty($show_property->property->occupancy_tenant_info)) {
                    $occupancy_tenant_info = json_decode($show_property->property->occupancy_tenant_info, true);
                    if ($occupancy_tenant_info['tenant_phone']) {
                        send_sms('+16042656950', $occupancy_tenant_info['tenant_phone'], $reschedule_sms_body);
                    }
                }
            }
            $data = ShowingApplication::find($currentShowing->id);
        } else {
            $check_showing = ShowingApplication::where(['showing_id' => $request->showing_id, 'property_id' => $request->prop_id, 'tenant_id' => $userId])->count();
            if ($check_showing > 0) {
                return '<h4 style="text-align: center;color:red">Sorry!, You have already applied for this showing.</h4>';
            }
            $showing_limit = ShowingApplication::where(['showing_id' => $request->showing_id, 'property_id' => $request->prop_id])->count();
            if (isset($show_property->limit) && $show_property->limit <= $showing_limit) {
                return '<h4 style="text-align: center;color:red">Sorry!, this showing date has exceeded the number of maximum attendees.</h4>';
            }

            $showing = new ShowingApplication();
            $showing->showing_id = $request->showing_id;
            $showing->property_id = $request->prop_id;
            $showing->agent_id = $request->agent_id ?? $agentObj->id;
            $showing->tenant_id = $userId;
            $showing->showing_date = $request->prop_date;
            $showing->first_name = $request->fname;
            $showing->last_name = $request->lname;
            $showing->email = $request->email;
            $showing->phone = $request->phone;
            $showing->comments = $request->comments;
            $showing->different_time = date('Y-m-d H:i:s', strtotime($request->different_time_input));

            if (empty($request->showing_id) && empty($request->prop_date)) {
                $showing->status = '3';
            } else {
                $showing->status = '1';
            }
            $showing->showing_type = $request->showing_type ?? '';
            if ($showing->save()) {
                $status = $showing->status;
            }
            $saved = $showing->save();
            if ($saved) {
                userEntity($userId, 'showingApplication', $showing->id);
            }
            $data = ShowingApplication::find($showing->id);
        }
        if ($saved) {
            if ($status == '3') {
                $agentMessage = '<b>New Showing Request for:</b><br>';
                $agentMessage .= 'Property Name: ' . $property->title . '<br>';
                $agentMessage .= 'Property Address: ' . $property->address . '<br>';
                $agentMessage .= 'Name: ' . $request->fname . ' ' . $request->lname . '<br>';
                $agentMessage .= 'Email: ' . $request->email . '<br>';
                $agentMessage .= 'Phone: ' . $request->phone . '<br>';
                $agentMessage .= 'Comments: ' . $request->comments;

                if ($property->prop_agents) {
                    $agents_ids = explode(',', $property->prop_agents);
                    $agents = User::whereIn('id', $agents_ids)->get();
                    foreach ($agents as $agent) {
                        $agent->notify(new AgentShowing($data, $agentMessage, 'New Showing Request!'));
                    }
                }

                if ($property->userEntity->account_id) {
                    $managerObj = User::find($property->userEntity->account_id);
                    $managerObj->notify(new AgentShowing($data, $agentMessage, 'New Showing Request!'));
                }

                //USER EMAIL
                $message = '<p>Thank you for your interest in attending the showing of our property:<br>' . $property->title . '!</p>';
                $message .= '<p>We will confirm the showing schedule for you shortly.</p>';
                $message .= '<p>Please do not hesitate to contact us, if you have any questions.</p>';
                $message .= '<p>Please check <a href="' . url('disclosure-for-residential-tenancies') . '?app=' . $data->id . '">Disclosure for residential tenancies</a></p>';
                $data->tenant->notify(new UserShowing($data, $message, 'Showing Request Received!'));

                return '<div style="text-align: center;">' . $message . '</div>';
            } else {
                if ($property->prop_agents) {
                    $agents_ids = explode(',', $property->prop_agents);
                    $agents = User::whereIn('id', $agents_ids)->first();

                    // AGENT EMAIL
                    $message = 'You have got a new application for showing property.<br>';
                    $message .= 'Property Name: ' . $show_property->property->title . '<br>';
                    $message .= 'Property Address: ' . $show_property->property->address . '<br>';
                    $message .= 'Showing Date: ' . date_format(date_create($request->prop_date), 'F j, Y, g:i a') . '<br>';
                    $message .= 'Name: ' . $request->fname . ' ' . $request->lname . '<br>';
                    $message .= 'Email: ' . $request->email . '<br>';
                    $message .= 'Phone: ' . $request->phone . '<br>';
                    $message .= 'Comments: ' . $request->comments;
                    $agent_sms_body = 'You have a scheduled appointment for ' . $show_property->property->title . ' at ' . date_format(date_create($request->prop_date), 'F j, Y, g:i a') . ' with ' . $request->fname . ' ' . $request->lname . ' Phone: ' . $request->phone;
                    // foreach ($agents as $agent) {
                    //     $agentObj->notify(new AgentShowing($data, $message, 'New application for showing property'));
                    //     if ($agent->phone) {
                    //         send_sms('+16042656950', $agent->phone, $agent_sms_body);
                    //     }
                    // }
                    $agentObj->notify(new AgentShowing($data, $message, 'New application for showing property'));
                    if ($agentObj->phone) {
                        send_sms('+16042656950', $agentObj->phone, $agent_sms_body);
                    }
                }

                //ADMIN EMAIL
                $adminMessage = '<p>New application for showing property.<br>';
                $adminMessage .= 'Property Name: <b>' . $show_property->property->title . '</b><br>';
                $adminMessage .= 'Property Address: <b>' . $show_property->property->address . '</b><br>';
                $adminMessage .= 'Showing Date: <b>' . date_format(date_create($request->prop_date), 'F j, Y, g:i a') . '</b><br>';
                $adminMessage .= 'Agent: <b>' . $agentObj->name . '</b><br>';
                $adminMessage .= 'Name: <b>' . $request->fname . ' ' . $request->lname . '</b><br>';
                $adminMessage .= 'Email: <b>' . $request->email . '</b><br>';
                $adminMessage .= 'Phone: <b>' . $request->phone . '</b><br>';
                $adminMessage .= 'Comments: <br><b>' . $request->comments . '</b></p>';

                if ($property->userEntity->account_id) {
                    $managerObj = User::find($property->userEntity->account_id);
                    $managerObj->notify(new AdminShowing($data, $adminMessage, 'New Showing Request!'));
                }

                //USER EMAIL
                $userMessage = 'Thank you for your interest in attending the showing of our property!';
                $userMessage .= 'Property Name: <b>' . $show_property->property->title . '</b><br>';
                $userMessage .= 'Property Address: <b>' . $show_property->property->address . '</b><br>';
                $userMessage .= 'Showing Date: <b>' . date_format(date_create($request->prop_date), 'F j, Y, g:i a') . '</b>';
                $userMessage .= 'We will confirm the showing schedule you have selected shortly.';
                $userMessage .= 'Please do not hesitate to contact us if you have any questions.';
                $userMessage .= 'Please check <a href="' . url('disclosure-for-residential-tenancies') . '?app=' . $data->id . '">Disclosure for residential tenancies</a>';
                $data->tenant->notify(new UserShowing($data, $userMessage, 'Showing Request Received!'));
                $user_sms_body = 'Thank you for scheduling a showing of ' . $show_property->property->address . ' at ' . date_format(date_create($request->prop_date), 'F j, Y, g:i a') . '. Please kindly arrive on time with a mask.';
                if ($request->phone) {
                    send_sms('+16042656950', $request->phone, $user_sms_body);
                }
                if ($show_property->property->occupancy_status == 'tenant' && !empty($show_property->property->occupancy_tenant_info)) {
                    $occupancy_tenant_info = json_decode($show_property->property->occupancy_tenant_info, true);
                    $tenant_sms_body = 'We have a confirmed showing of your property at ' . $show_property->property->address . ' on ' . date_format(date_create($request->prop_date), 'F j, Y, g:i a') . '. The showing should take about 10-15 minutes';
                    if ($occupancy_tenant_info['tenant_phone']) {
                        send_sms('+16042656950', $occupancy_tenant_info['tenant_phone'], $tenant_sms_body);
                    }
                }

                $message_user = '<p><strong>Please note your attendance at the following showing is confirmed:</strong></p>
                <table class="display" width="100%" cellspacing="0" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="left" style="font:normal 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                <tbody>';
                if ($show_property->property->featured) {
                    $message_user .= '<tr><td colspan="2" align="left"><img src="' . asset('images/property/thumbnail') . '/' . $show_property->property->featured . '"></td></tr>';
                }
                $message_user .= '<tr><td align="left" valign="top">Property Name: </td><td valign="top">' . $show_property->property->title . '</td></tr>
                <tr><td align="left" valign="top">Property Details: </td><td valign="top">Beds: ' . $show_property->property->beds . ' | Baths: ' . $show_property->property->baths . ' | Sleeps: ' . $show_property->property->sleeps . ' | Area: ' . $show_property->property->area . 'sqft</td></tr>
                <tr><td align="left" valign="top">Address: </td><td valign="top">' . $show_property->property->address . '</td></tr>
                <tr><td align="left" valign="top">Showing Date: </td><td valign="top">' . $show_property->showing_date . '</td></tr>
                <tr><td align="left" valign="top">Agent: </td><td valign="top">' . $show_property->agent->name . '</td></tr>
                <tr><td align="left" valign="top">Agent\'s phone number: </td><td valign="top">' . $show_property->agent->phone . '</td></tr>
                </tbody>
                </table>
                <p>Please do let us know if you are not able to attend the showing by replying to this email.</p>
                <p>Please arrive 5 minutes early to the showing as it is a group showing and will start at the specified time.</p>
                <p>Unfortunately, our property managers are not able to accommodate late arrivals, and we cannot guarantee that we will be able to show you the place if you arrive late.</p>
                <p>Thank you for respecting the time of the showing.</p>
                <p>Please do not hesitate to contact us if you have any questions.</p>
                <p>Please check <a href="' . url('disclosure-for-residential-tenancies') . '?app=' . $data->id . '">Disclosure for residential tenancies</a></p>';
                $data->tenant->notify(new UserShowing($data, $message_user, 'Showing Confirmation!'));

                return '<div class="alert alert-success">Thank you for scheduling the showing of our property! We will send you the confirmation shortly. Please check spam folder for confirmation if you did not receive one</div>';
            }
        } else {
            return '<div class="alert alert-danger">Sorry!, You have not applied for showing property <strong>' . $show_property->property->title . '<strong></div>';
        }
    }

    public function showingRequest($showingId = null)
    {
        $agents = agentsList();

        return view('property::showing.showingRequests', compact('agents', 'showingId'));
    }

    public function showingRequestStatus(Request $request, $id)
    {
        $validStatus = ['approved', 'rejected', 'removed'];
        if (!in_array($request->status, $validStatus)) {
            return response()->json(['error' => 'Invalid status provided', 'status' => 400]);
        }

        $showingApplication = ShowingApplication::find($id);
        if (!$showingApplication) {
            return response()->json(['error' => 'Showing application with ID ' . $id . ' not found', 'status' => 404]);
        }

        $msg = '';
        $status = 200;
        if ($request->status == 'approved') {
            $showingApplication->update(['status' => '1']);
            $applicationData = ShowingApplication::with('property', 'agent')->where('id', $id)->first();
            $agent = $applicationData->agent;
            $property = $applicationData->property;
            $subject = 'Showing Confirmation';
            $body = '<p><strong>Please note your attendance at the following showing is confirmed:</strong></p>
                    <table class="display" width="100%" cellspacing="0" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="left" style="font:normal 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                        <tbody>';
            if ($applicationData->property->featured) {
                $body .= '<tr><td colspan="2" align="left"><img src="' . asset('images/property/thumbnail') . '/' . $applicationData->property->featured . '"></td></tr>';
            }
            $body .= '<tr><td align="left" valign="top">Property Name: </td><td valign="top">' . $applicationData->property->title . '</td></tr>
                        <tr><td align="left" valign="top">Property Details: </td><td valign="top">Beds: ' . $applicationData->property->beds . ' | Baths: ' . $applicationData->property->baths . ' | Sleeps: ' . $applicationData->property->sleeps . ' | Area: ' . $applicationData->property->area . 'sqft</td></tr>
                        <tr><td align="left" valign="top">Address: </td><td valign="top">' . $applicationData->property->address . '</td></tr>
                        <tr><td align="left" valign="top">Showing Date: </td><td valign="top">' . $applicationData->showing_date . '</td></tr>
                        <tr><td align="left" valign="top">Agent: </td><td valign="top">' . ($applicationData->agent ? ($applicationData->agent->name != '' ? $applicationData->agent->name : env('APP_NAME')) : env('APP_NAME')) . '</td></tr>
                        <tr><td align="left" valign="top">Agent\'s phone number: </td><td valign="top">' . ($applicationData->agent ? ($applicationData->agent->phone != '' ? $applicationData->agent->name : '') : '') . '</td></tr>
                    </tbody>
			    </table>
                <p>Please do let us know if you are not able to attend the showing by replying to this email.</p>
                <p>Please arrive 5 minutes early to the showing as it is a group showing and will go up at the specified time.</p>
                <p>Unfortunately, our property managers are not able to accommodate late arrivals and we cannot guarantee you that we will be able to show you the place if you arrived late.</p>
                <p>Thank you for respecting the time of the showing.</p>
                <p>Please do not hesitate to contact us, if you have any questions.</p>';
            try {
                $applicationData->notify(new ShowingRequestNotification($applicationData, $body, $subject));
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                $msg = 'First Notification sending failed: ' . $e->getMessage();

                return response()->json(['error' => $msg, 'status' => 500]);
            }

            $property = Property::find($applicationData->property->id);
            $agentEmailBody = '<p><b>Showing Confirmation for:</b><br>
                Property Name: ' . $applicationData->property->title . '<br>
                Property Address: ' . $applicationData->property->address . '<br>
                Showing Date: ' . $applicationData->showing_date . '<br>
                Name: ' . $applicationData->first_name . ' ' . $applicationData->last_name . '<br>
                Email: ' . $applicationData->email . '<br>
                Phone: ' . $applicationData->phone . '<br></p>
                <p>Comments: <br>' . $applicationData->comments . '</p>';

            if ($property->prop_agents) {
                $agentIds = explode(',', $property->prop_agents);
                $agentObjs = User::whereIn('id', $agentIds)->get();
                foreach ($agentObjs as $key => $agentObj) {
                    try {
                        $agentObj->notify(new ShowingRequestNotification($applicationData, $agentEmailBody, $subject));
                    } catch (\Exception $e) {
                        Log::error($e->getMessage());
                        $msg = $key . 'Notification sending failed: ' . $e->getMessage();

                        return response()->json(['error' => $msg, 'status' => 500]);
                    }
                }
            }
            $managerObj = User::find($property->userEntity->account_id);
            $managerObj->notify(new ShowingRequestNotification($applicationData, $agentEmailBody, $subject));

            if ($property->occupancy_status == 'owner_occupied' || $property->occupancy_status == 'tenant') {
                $owner = ($property->occupancy_status == 'owner_occupied') ? getUserById($property->user_id) : json_decode($property->occupancy_tenant_info, true);
                $ownerName = extract_name($owner->name)['first_name'];
                $ownerMail = ($property->occupancy_status == 'owner_occupied') ? $owner->email : $owner['tenant_email'];
                if (!empty($ownerName) && !empty($ownerMail)) {
                    $ownerEmailBody = '<p>A showing has been confirmed for (' . $applicationData->showing_date . ').<br>
                    Property Name: ' . $applicationData->property->title . '<br>
                    Property Address: ' . $applicationData->property->address . '<br>
                    The agent (agent name and phone number), will arrive at the property at the time of the showing.</p>
                    <p>Please let us know if you have any questions.</p>';
                    try {
                        $owner->notify(new ShowingRequestNotification($applicationData, $ownerEmailBody, $subject));
                    } catch (\Exception $e) {
                        Log::error($e->getMessage());
                        $msg = 'Third Notification sending failed: ' . $e->getMessage();

                        return response()->json(['error' => $msg, 'status' => 500]);
                    }
                }
            }
            $msg = 'Showing application with ID ' . $id . ' has been approved!';
        } elseif ($request->status == 'rejected') {
            $showingApplication->update(['status' => '2', 'reason_of_rejection' => $request->reason]);
            $applicationData = ShowingApplication::with('property', 'agent')->where('id', $id)->first();
            $agent = $applicationData->agent;
            $property = $applicationData->property;
            $subject = 'Attend Showing has been Rejected on ' . env('APP_NAME') . '!';
            $body = '<table class="display" width="100%" cellspacing="0" data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="left" style="font:normal 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
            <tbody>';
            if ($applicationData->property->featured) {
                $body .= '<tr><td colspan="2" align="left"><img src="' . asset('images/property/thumbnail') . '/' . $applicationData->property->featured . '"></td></tr>';
            }
            $body .= '<tr><td align="left" valign="top">Property Name: </td><td valign="top">' . $applicationData->property->title . '</td></tr>
                        <tr><td align="left" valign="top">Property Details: </td><td valign="top">Beds: ' . $applicationData->property->beds . ' | Baths: ' . $applicationData->property->baths . ' | Sleeps: ' . $applicationData->property->sleeps . ' | Area: ' . $applicationData->property->area . 'sqft</td></tr>
                        <tr><td align="left" valign="top">Address: </td><td valign="top">' . $applicationData->property->address . '</td></tr>
                        <tr><td align="left" valign="top">Showing Date: </td><td valign="top">' . $applicationData->showing_date . '</td></tr>
                        <tr><td align="left" valign="top">Agent: </td><td valign="top">' . $applicationData->agent->name . '</td></tr>
                        <tr><td align="left" valign="top">Reason of Rejection: </td><td valign="top">' . $applicationData->reason_of_rejection . '</td></tr>
                    </tbody>
				</table>';
            try {
                $applicationData->notify(new ShowingRequestNotification($applicationData, $body, $subject));
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                $msg = 'Forth Notification sending failed: ' . $e->getMessage();

                // return response()->json(['error' => $msg, 'status' => 500]);
            }

            $msg = 'Showing application with ID ' . $id . ' has been rejected!';
        } elseif ($request->status == 'removed') {
            $showingApplication->delete();
            $msg = 'Showing application with ID ' . $id . ' has been successfully removed';
        }

        return response()->json(['message' => $msg, 'status' => $status, 'data' => $id]);
    }

    public function askQuestion(Request $request)
    {
        $property = Property::with('userEntity')->find($request->prop_id);
        $userexist = User::where('email', $request->email)->first();
        if ($userexist) {
            $user_id = $userexist->id;
        } else {
            $password = Str::random(8);
            $user_data = [
                'name' => $request->fname . ' ' . $request->lname,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $password,
                'roles' => 'Tenant',
            ];
            event(new Registered($createUser = $this->createUser($user_data)));

            if ($createUser) {
                try {
                    $createUser->notify(new WelcomeEmailNotification($createUser, $password));
                } catch (\Exception $e) {
                    Log::error($e);
                }
                $user_id = $createUser->id;
            }
        }
        userEntity($property->userEntity->account_id, 'Tenant', $user_id);
        if ($property->prop_agents) {
            $managerId = $property->prop_agents;
        } else {
            $managerId = $property->userEntity->account_id;
        }
        $data = [
            'property_id' => $request->prop_id,
            'user_id' => $user_id,
            'agents' => $managerId,
            'question' => $request->question,
        ];
        $question_created = PropertyQuestion::create($data);
        userEntity($user_id, 'askQuestion', $question_created->id);
        if ($question_created) {
            $text_body = '<p><b>New Question Asked For:</b><br>
				Property Name: <b>' . $property->title . '</b><br>
				Name: <b>' . $request->fname . ' ' . $request->lname . '</b><br>
				Email: <b>' . $request->email . '</b><br>
				Phone: <b>' . $request->phone . '</b><br></p>
				<p>Question: <br><b>' . $request->question . '</b></p>';
            if ($property->prop_agents) {
                $managerIds = explode(',', $property->prop_agents);
                $managerObjs = User::whereIn('id', $managerIds)->get();
                foreach ($managerObjs as $managerObj) {
                    $managerObj->notify(new DefaultNotification('Hello ' . $managerObj->first_name, $text_body, 'New Question Asked!'));
                }
            }
            if ($property->userEntity->account_id) {
                $managerId = $property->userEntity->account_id;
                $managerObj = User::find($managerId);
                $managerObj->notify(new DefaultNotification('Hello ' . $managerObj->first_name, $text_body, 'New Question Asked!'));
            }

            //USER Notification
            $text_body = '<p>Thank you for your interest in our property:<br><b>' . $property->title . '</b>!</p>
				<p>One of our agent will answer you soon.</p>
				<p>Please do not hesitate to contact us, if you have any other questions.</p>';
            $question_created->tenant->notify(new DefaultNotification('Hello ' . $request->fname, $text_body, 'Question Submitted Successfully!'));

            return '<div class="alert alert-success">Your question has been submitted successfully!, One of our agent will answer you soon.</div>';
        }
    }

    public function askedQuestions()
    {
        $agents = agentsList();

        return view('property::showing.propertyQuestions', compact('agents'));
    }

    public function getQuestion($question)
    {
        return PropertyQuestion::with('tenant', 'property')->find($question);
    }

    public function answerQuestion(Request $request)
    {
        $question = PropertyQuestion::find($request->question_id);
        $question->update(['status' => '1', 'answer' => $request->answer]);

        return $question;
    }

    public function scheduleMultiple()
    {
        $agents = agentsList();
        $propertyObjs = Property::query();
        $user = Auth::user();
        if (Auth::user()->hasManagerAccess()) {
            $entityIds = UserEntity::where(['account_id' => Auth::user()->id, 'entity_key' => 'property'])->pluck('entity_value');
            $propertyObjs->whereIn('id', $entityIds);
        } elseif (Auth::user()->hasRole('Agent')) {
            $propertyObjs->whereIn('prop_agents', [Auth::user()->id]);
        } elseif (Auth::user()->hasRole('Property Owner')) {
            $propertyObjs->whereIn('user_id', [Auth::user()->id]);
        }
        $properties = $propertyObjs->where('status', '1')->select('id', 'title', 'user_id', 'address')->orderBy('title', 'ASC')->get();

        return view('property::showing.scheduleMultiple', compact('agents', 'properties'));
    }

    public function cancelViewing(Request $request, $id = null)
    {
        $showingIds = Crypt::decryptString($id);
        $showingApplication = ShowingApplication::with('user', 'property', 'agent')->find($showingIds);
        $title = $showingApplication->property->title;
        $propertyId = $showingApplication->property_id;
        $address = $showingApplication->property->address;
        $showingDate = $showingApplication->showing_date;
        $accountId = UserEntity::where(['entity_key' => 'property', 'entity_value' => $propertyId])->first()->account_id;

        $manager = (is_null($showingApplication->agent_id) || ($showingApplication->agent_id == 0)) ? User::find($accountId) : User::find($showingApplication->agent_id);
        $manageBy = $manager->name ?? $manager->first_name;
        $name = $showingApplication->first_name . ' ' . $showingApplication->last_name;

        if ($showingApplication->status == '2') {
            $title = 'Viewing Already Canceled';
            $desc = '<p>Dear ' . $name . '</p>';
            $desc .= '<p>Your viewing request for property <strong>' . $title . '</strong> located <strong>' . $address . '</strong> at <strong>' . $showingDate . '</strong> with Manager/Agent <strong>' . $manageBy . '</strong> is already canceled.</p>';
            return view('property::showing.notify-page', compact('title', 'desc'));
        }

        $showingApplication->update(['status' => '2', 'reason_of_rejection' => 'Canceled by user']);
        $msg = 'Viewing request of ' . $name . ' for property ' . $title . ' located ' . $address . ' at ' . $showingDate . ' has been canceled.';

        // Notification for Manager
        $this->sendNotification($manager, $showingApplication, $name, $title, $address, $showingDate, $manageBy, $msg);

        // Notification For Agent
        if (!is_null($showingApplication->agent_id) || $showingApplication->agent_id !== 0) {
            $agent = User::find($showingApplication->agent_id);
            $this->sendNotification($agent, $showingApplication, $name, $title, $address, $showingDate, $manageBy, $msg);
        }

        // Notification For Tenant
        $tenant = User::where('email', $showingApplication->email)->first();
        if ($tenant) {
            $this->sendNotification($tenant, $showingApplication, $name, $title, $address, $showingDate, $manageBy, $msg);
        } else {
            $tenantSubject = 'Viewing Canceled on ' . appName() . '!';
            $tenantMessage = '<p>Your viewing request for property <strong>' . $title . '</strong> located at <strong>' . $address . '</strong> on <strong>' . $showingDate . '</strong> with Manager/Agent <strong>' . $manageBy . '</strong> has been successfully canceled.</p>';

            $tenant = new User();
            $tenant->email = $showingApplication->email;
            $tenant->phone = $showingApplication->phone;
            $tenant->notify(new UserShowing($showingApplication, $tenantMessage, $tenantSubject));
            if ($showingApplication->phone) {
                send_sms("+16042656950", $showingApplication->phone, $msg);
            }
        }

        if ($showingApplication->property->occupancy_status == 'tenant' && !empty($showingApplication->property->occupancy_tenant_info)) {
            $occupancyTenantInfo = json_decode($showingApplication->property->occupancy_tenant_info, true);
            if ($occupancyTenantInfo['tenant_phone']) {
                send_sms("+16042656950", $occupancyTenantInfo['tenant_phone'], $msg);
            }
        }
        $title = 'Viewing Canceled';
        $desc = '<p>Dear ' . $name . '</p>';
        $desc .= '<p>Your viewing request for property <strong>' . $title . '</strong> located <strong>' . $address . '</strong> at <strong>' . $showingDate . '</strong> with Agent <strong>' . $manageBy . '</strong> has been canceled successfully.</p>';
        return view('property::showing.notify-page', compact('title', 'desc'));
    }

    private function sendNotification($user, $showingApplication, $name, $title, $address, $showingDate, $manageBy, $msg)
    {
        if ($user) {
            $subject = 'Viewing Canceled on ' . appName() . '!';
            $message = "<p>The viewing request by {$name} for the property <strong>{$title}</strong> located at <strong>{$address}</strong> on <strong>{$showingDate}</strong> with Manager/Agent <strong>{$manageBy}</strong> has been successfully canceled.</p>";
            $user->notify(new UserShowing($showingApplication, $message, $subject));
            if ($user->phone) {
                send_sms("+16042656950", $user->phone, $msg);
            }
        }
    }
}
