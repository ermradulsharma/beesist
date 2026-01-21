<?php

namespace Modules\Tenant\Http\Controllers;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Notifications\WelcomeEmailNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Modules\RentalApplication\Entities\RentalApplication;
use Modules\Tenant\Entities\TenantAgreement;
use Modules\Tenant\Notifications\TenantAgreementNotification;
use Modules\Tenant\Rules\TenantRequest;
use PDF;
use Str;
use ZipArchive;

class TenantAgreementController extends Controller
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
     * @return Renderable
     */
    public function index()
    {
        return view('tenant::agreement.index')->with('property', 'tenant');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('tenant::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request->all();
        $onetenant = ['tenants_data', 'adult_names', 'minor_names', 'property_address', 'utilities', 'warrant', 'form_k_notice', 'rental_period', 'security', 'initial_1', 'initial_5', 'initial_9', 'initial_12', 'initial_15', 'initial_19', 'initial_23', 'initial_25', 'initial_27', 'initial_28', 'initial_29'];
        $twotenants = ['tenants_data', 'initial_1', 'initial_2', 'initial_5', 'initial_6', 'initial_9', 'initial_10', 'initial_12', 'initial_13', 'initial_15', 'initial_16', 'initial_19', 'initial_20', 'initial_23', 'initial_24', 'initial_25', 'initial_26', 'initial_27', 'initial_28', 'initial_29', 'property_address', 'utilities', 'warrant', 'form_k_notice', 'security'];
        $threetenants = ['tenants_data', 'initial_1', 'initial_2', 'initial_3', 'initial_5', 'initial_6', 'initial_7', 'initial_9', 'initial_10', 'initial_11', 'initial_12', 'initial_13', 'initial_14', 'initial_15', 'initial_16', 'initial_17', 'initial_19', 'initial_20', 'initial_21', 'initial_23', 'initial_24', 'initial_25', 'initial_26', 'initial_27', 'initial_28', 'initial_29', 'property_address', 'utilities', 'warrant', 'form_k_notice', 'security'];
        $json_fields = ['disclosure', 'tenants_data', 'adult_names', 'minor_names', 'property_address', 'utilities', 'rental_period', 'rent_fees', 'security', 'smoking', 'form_k_notice', 'tenant_property', 'charges', 'account_details', 'other_account_holder', 'initial_17', 'initial_18', 'initial_19', 'initial_20', 'initial_22', 'initial_23', 'initial_24', 'initial_25', 'initial_25', 'initial_29'];
        $rules = [];
        if ($request->form_step == '0') {
            if ($request->number_tenants == 1) {
                foreach ($onetenant as $key) {
                    if (in_array($key, $json_fields)) {
                        if ($key == 'form_k_notice') {
                            $rules[$key . '.plan_num'] = [new TenantRequest()];
                            $rules[$key . '.lot_num'] = [new TenantRequest()];
                            $rules[$key . '.civic'] = [new TenantRequest()];
                            $rules[$key . '.t1_fname'] = [new TenantRequest()];
                            $rules[$key . '.t1_lname'] = [new TenantRequest()];
                            //$rules[$key.'.t1_dl'] = [new TenantRequest()];
                            $rules[$key . '.t1_email'] = [new TenantRequest()];
                            $rules[$key . '.t1_phone_work'] = [new TenantRequest()];
                        } elseif ($key == 'property_address') {
                            $rules[$key . '.st'] = [new TenantRequest()];
                            $rules[$key . '.city'] = [new TenantRequest()];
                            $rules[$key . '.state'] = [new TenantRequest()];
                            $rules[$key . '.zip'] = [new TenantRequest()];
                            $rules[$key . '.country'] = [new TenantRequest()];
                        } elseif ($key == 'adult_names') {
                            $rules[$key . '.1' . '.fname'] = [new TenantRequest()];
                            $rules[$key . '.1' . '.lname'] = [new TenantRequest()];
                        } elseif ($key == 'minor_names') {
                            $rules[$key . '.1' . '.fname'] = [new TenantRequest()];
                            $rules[$key . '.1' . '.lname'] = [new TenantRequest()];
                        } elseif ($key == 'rental_period') {
                            $rules[$key . '.start_date'] = [new TenantRequest()];
                            $rules[$key . '.term_of'] = [new TenantRequest()];
                            if (isset($request->rental_period['rental_terms']) && $request->rental_period['rental_terms'] == 'monthly') {
                                $rules[$key . '.rental_terms'] = 'required|in:monthly,fixed';
                                // $rules[$key . '.ending'] = '';
                            } else {
                                $rules[$key . '.ending'] = 'required|in:c,d';
                            }
                        } elseif ($key == 'security') {
                            $rules[$key . '.0'] = [new TenantRequest()];
                            $rules[$key . '.1'] = [new TenantRequest()];
                            //$rules[$key.'.2'] = [new TenantRequest()];
                            //$rules[$key.'.3'] = [new TenantRequest()];
                        } else {
                            $rules[$key . '.*'] = [new TenantRequest()];
                        }
                    } else {
                        $rules[$key] = [new TenantRequest()];
                    }
                }
            } elseif ($request->number_tenants == 2) {
                foreach ($twotenants as $key) {
                    if (in_array($key, $json_fields)) {
                        if ($key == 'form_k_notice') {
                            $rules[$key . '.plan_num'] = [new TenantRequest()];
                            $rules[$key . '.lot_num'] = [new TenantRequest()];
                            $rules[$key . '.civic'] = [new TenantRequest()];
                            $rules[$key . '.t1_fname'] = [new TenantRequest()];
                            $rules[$key . '.t1_lname'] = [new TenantRequest()];
                            //$rules[$key.'.t1_dl'] = [new TenantRequest()];
                            $rules[$key . '.t1_email'] = [new TenantRequest()];
                            $rules[$key . '.t1_phone_work'] = [new TenantRequest()];
                            $rules[$key . '.t2_fname'] = [new TenantRequest()];
                            $rules[$key . '.t2_lname'] = [new TenantRequest()];
                            //$rules[$key.'.t2_dl'] = [new TenantRequest()];
                            $rules[$key . '.t2_email'] = [new TenantRequest()];
                            $rules[$key . '.t2_phone_work'] = [new TenantRequest()];
                        } else {
                            $rules[$key . '.*'] = [new TenantRequest()];
                        }
                    } else {
                        $rules[$key] = [new TenantRequest()];
                    }
                }
            } elseif ($request->number_tenants == 3) {
                foreach ($threetenants as $key) {
                    if (in_array($key, $json_fields)) {
                        if ($key == 'form_k_notice') {
                            $rules[$key . '.plan_num'] = [new TenantRequest()];
                            $rules[$key . '.lot_num'] = [new TenantRequest()];
                            $rules[$key . '.civic'] = [new TenantRequest()];
                            $rules[$key . '.t1_fname'] = [new TenantRequest()];
                            $rules[$key . '.t1_lname'] = [new TenantRequest()];
                            //$rules[$key.'.t1_dl'] = [new TenantRequest()];
                            $rules[$key . '.t1_email'] = [new TenantRequest()];
                            $rules[$key . '.t1_phone_work'] = [new TenantRequest()];
                            $rules[$key . '.t2_fname'] = [new TenantRequest()];
                            $rules[$key . '.t2_lname'] = [new TenantRequest()];
                            //$rules[$key.'.t2_dl'] = [new TenantRequest()];
                            $rules[$key . '.t2_email'] = [new TenantRequest()];
                            $rules[$key . '.t2_phone_work'] = [new TenantRequest()];
                            $rules[$key . '.t3_fname'] = [new TenantRequest()];
                            $rules[$key . '.t3_lname'] = [new TenantRequest()];
                            //$rules[$key.'.t3_dl'] = [new TenantRequest()];
                            $rules[$key . '.t3_email'] = [new TenantRequest()];
                            $rules[$key . '.t3_phone_work'] = [new TenantRequest()];
                        } else {
                            $rules[$key . '.*'] = [new TenantRequest()];
                        }
                    } else {
                        $rules[$key] = [new TenantRequest()];
                    }
                }
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
                ;
                // return response()->json(['errors' => $validator->errors()], 422);
            }
            foreach ($request->all() as $key => $val) {
                if (in_array($key, $json_fields)) {
                    $tableArray[$key] = (! empty($val) ? serialize(json_encode($val)) : null);
                } else {
                    $tableArray[$key] = $val;
                }
            }
            $tableArray['ip_address'] = $request->ip();
            $tableArray['access_token'] = bin2hex(random_bytes(16));
            if (empty($request->user_id)) {
                $userexist = User::where('email', $request->tenants_data['t1_email'])->first();
                if ($userexist) {
                    $checkRole = $userexist->hasRole('Tenant');
                    if (! $checkRole) {
                        $userexist->syncRoles(['Tenant']);
                    }
                    $user_id = $userexist->id;
                } else {
                    $password = Str::random(8);
                    $userData = [
                        'first_name' => $request->tenants_data['t1_fname'],
                        'last_name' => $request->tenants_data['t1_lname'],
                        'name' => $request->tenants_data['t1_fname'] . ' ' . $request->tenants_data['t1_lname'],
                        'email' => $request->tenants_data['t1_email'],
                        'phone' => $request->tenants_data['t1_phone'],
                        'country' => $request->country ?? 'CA',
                        'type' => User::TYPE_USER,
                        'roles' => 'Tenant',
                        'password' => bcrypt($password),
                    ];
                    $createUser = $this->createUser($userData);
                    if (Auth::check()) {
                        userEntity(Auth::user()->id, 'tenant', $createUser->id);
                    }
                    $createUser->notify(new WelcomeEmailNotification($createUser, $password));
                    $user_id = $createUser->id;
                    // Tenant For Manager
                    /* if (Auth::check()) {
                        userEntity(Auth::user()->id, 'tenancyAgreement', $tenancy->id);
                    } */
                }
            }
            if ($user_id) {
                $tableArray['form_step'] = '1';
                $tenancy = TenantAgreement::create($tableArray);
                if (Auth::check()) {
                    userEntity(Auth::user()->id, 'tenancyAgreement', $tenancy->id);
                }
                $tenant = getUserById($user_id);
                if ($tenant) {
                    $data = TenantAgreement::find($tenancy->id);
                    $tenantData = json_decode(unserialize($data->tenants_data), true);
                    $firstName = isset($tenantData['t1_fname']) ? $tenantData['t1_fname'] : '';

                    $content = 'We hope this message finds you well. Please take a moment to review and sign your Tenancy Agreement. Your prompt action on this matter is greatly appreciated.';
                    $content .= 'To sign the agreement, please click the link below:';
                    $content .= '<a href="' . route('tenant.viewTenantAgreement', ['action' => 'edit', 'form_id' => Crypt::encryptString($tenancy->id), 'access_token' => $tenancy->access_token]) . '"> Click Here </a>';
                    $content .= 'If you have any questions or concerns, feel free to contact us.';

                    $subject = appName() . ' - New Tenancy Agreement';
                    $ccEmails = [];
                    $attachment = [];
                    $tenant->notify(new TenantAgreementNotification($content, $subject, $firstName, $ccEmails, $attachment));
                }
                $propertyObj = Property::find($tenancy->prop_id);
                $this->sendNotification($propertyObj, $tenancy->id, $tenancy->access_token);
            }

            return redirect()->route('tenant.viewTenantAgreement', ['action' => 'view', 'form_id' => Crypt::encryptString($tenancy->id), 'access_token' => $tenancy->access_token])->with('status', 'Submitted Successfully!');
        } elseif ($request->form_step == '1' && ! empty($request->id)) {
            $rules = [
                'other_account_holder.*' => ['required', new TenantRequest()],
                'account_details.*' => ['required', new TenantRequest()],
                'initial_1' => ['required', new TenantRequest()],
                'initial_5' => ['required', new TenantRequest()],
                'initial_17.*' => ['required', new TenantRequest()], // Adjusted for array handling
                'initial_21.*' => ['required', new TenantRequest()],
                'initial_22.*' => ['required', new TenantRequest()],
                'initial_23.*' => ['required', new TenantRequest()],
                'initial_27' => ['required', new TenantRequest()],
                'initial_29.*' => ['required', new TenantRequest()],
                // 'voided_check'           => ['required', new TenantRequest()],
                'disclaimer' => ['required', new TenantRequest()],

            ];
            if ($request->insurance == 'Yes') {
                $rules['ins_policy'] = ['required', new TenantRequest()];
            }

            // Additional rules based on conditions
            $data = TenantAgreement::find($request->id);
            if ($data->prop_type == 'Strata' && $request->has('form_k_notice')) {
                $rules["form_k_notice.t1_dl"] = ['required', new TenantRequest()];
                $rules["form_k_notice.t1_dl"] = ['required', new TenantRequest()];
                // $number_tenants = $data->number_tenants;
                // for ($i = 1; $i <= $number_tenants; $i++) {
                //     $rules["form_k_notice.t{$i}_dl"] = ['required', new TenantRequest()];
                // }
            }
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // ===================================================== //
            $requestData = array_filter($request->except(['_token']), function ($value) {
                return $value !== null;
            });
            $tableArray = [];
            foreach ($requestData as $key => $val) {
                if (in_array($key, $json_fields)) {
                    $tableArray[$key] = (! empty($val) ? serialize(json_encode($val)) : null);
                } else {
                    $tableArray[$key] = $val;
                }
            }
            if ($request->hasFile('voided_check') || $request->hasFile('ins_policy')) {
                $rules = [
                    'voided_check' => 'required|mimes:jpeg,png,jpg,gif,webp,pdf|max:10000',
                    'ins_policy' => 'nullable|mimes:jpeg,png,jpg,gif,webp,pdf|max:10000',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }

                // Create base directory if it doesn't exist.
                $type = 'tenancy';
                $baseDir = createBaseDirectory($type, $request->id);

                foreach (['voided_check', 'ins_policy'] as $fileKey) {
                    if ($request->hasFile($fileKey)) {
                        $typeDir = $baseDir . ($fileKey == 'voided_check' ? 'check/' : 'policy/');
                        if (! File::isDirectory($typeDir)) {
                            File::makeDirectory($typeDir, 0777, true, true);
                        }
                        $filename = time() . '-' . str_replace(" ", "-", $request->file($fileKey)->getClientOriginalName());
                        if ($request->file($fileKey)->move($typeDir, $filename)) {
                            $uploadedFiles[$fileKey] = $filename;
                        }
                    }
                }

                $tableArray = array_merge($tableArray, $uploadedFiles);
            }
            $tableArray['ip_address'] = $request->ip();
            $tableArray['access_token'] = bin2hex(random_bytes(16));

            $updateForm = TenantAgreement::find($request->id);
            if ($updateForm) {
                foreach ($tableArray as $key => $value) {
                    $updateForm->$key = $value;
                }
                $updateForm->form_step = $updateForm->number_tenants == '1' ? '4' : '2';
                if ($data->prop_type == 'Strata' && isset($request->form_k_notice)) {
                    $updateForm->form_k_notice = ! empty($request->form_k_notice) ? serialize(json_encode($request->form_k_notice)) : null;
                }
                $updateForm->save();
            }
            // ===================================================== //
            $tenants_data = json_decode(unserialize($data->tenants_data), true);
            $property_address = json_decode(unserialize($data->property_address), true);
            $unit = $property_address['unit'] ? $property_address['unit'] . ', ' : '';
            $prop_address = $unit . $property_address['st'] . ', ' . $property_address['city'] . ', ' . $property_address['state'] . ', ' . $property_address['zip'];
            $countries = Countries();
            if ($updateForm->number_tenants > 1) {
                //FIRST TENANT EMAIL
                $tenant = getUserById($updateForm->user_id);
                $subject = appName() . ' Tenancy Agreement';
                $content = 'We hope this message finds you well. Please take a moment to review and sign your Tenancy Agreement. Your prompt action on this matter is greatly appreciated.';
                $content .= 'To sign the agreement, please click the link below:';
                $content .= '<a href="' . route('tenant.viewTenantAgreement', ['action' => 'edit', 'form_id' => Crypt::encryptString($data->id), 'access_token' => $updateForm->access_token]) . '"> Click Here </a>';
                $content .= 'If you have any questions or concerns, feel free to contact us.';

                $firstName = $tenants_data['t2_fname'];
                if (! $tenant) {
                    $tenant = new User();
                    $tenant->email = $tenants_data['t2_email'];
                }
                $ccEmails = [];
                $attachment = [];
                $tenant->notify(new TenantAgreementNotification($content, $subject, $firstName, $ccEmails, $attachment));
            } else {
                $propertyObj = Property::find($updateForm->prop_id);
                $this->sendNotification($propertyObj, $updateForm->id, $updateForm->access_token);
            }

            return redirect()->route('tenant.viewTenantAgreement', ['action' => 'view', 'form_id' => Crypt::encryptString($updateForm->id), 'access_token' => $updateForm->access_token])->with('status', 'Submitted Successfully!');
        } elseif ($request->form_step == '2' && ! empty($request->id)) {
            // return $request->all();
            $rules = [
                'initial_2' => ['required', new TenantRequest()],
                'initial_6' => ['required', new TenantRequest()],
                // 'initial_10' => ['required', new TenantRequest()],
                // 'initial_14' => ['required', new TenantRequest()],
                'initial_18.*' => ['required', new TenantRequest()],
                'initial_24.*' => ['required', new TenantRequest()],
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $requestData = array_filter($request->except(['_token']), function ($value) {
                return $value !== null;
            });

            $tableArray = [];
            foreach ($requestData as $key => $val) {
                if (in_array($key, $json_fields)) {
                    $tableArray[$key] = (! empty($val) ? serialize(json_encode($val)) : null);
                } else {
                    $tableArray[$key] = $val;
                }
            }
            $tableArray['ip_address'] = $request->ip();
            $tableArray['access_token'] = bin2hex(random_bytes(16));

            $updateForm = TenantAgreement::find($request->id);
            $tableArray['form_step'] = $updateForm->number_tenants == '2' ? '4' : '3';
            if ($updateForm) {
                $updateForm->update($tableArray);
            }

            $data = TenantAgreement::find($request->id);
            if ($data) {
                $tenants_data = json_decode(unserialize($data->tenants_data), true);
                $property_address = json_decode(unserialize($data->property_address), true);
            }

            $unit = $property_address['unit'] ? $property_address['unit'] . ', ' : '';
            $prop_address = $unit . $property_address['st'] . ', ' . $property_address['city'] . ', ' . $property_address['state'] . ', ' . $property_address['zip'];
            $countries = Countries();

            if ($updateForm->number_tenants > 2) {
                //FIRST TENANT EMAIL
                $tenant = getUserById($updateForm->user_id);

                // Notification E-mail Body
                $subject = appName() . ' - New Tenancy Agreement';
                $content = 'We hope this message finds you well. Please take a moment to review and sign your Tenancy Agreement. Your prompt action on this matter is greatly appreciated.';
                $content .= 'To sign the agreement, please click the link below:';
                $content .= '<a href="' . route('tenant.viewTenantAgreement', ['action' => 'edit', 'form_id' => Crypt::encryptString($data->id), 'access_token' => $updateForm->access_token]) . '"> Click Here </a>';
                $content .= 'If you have any questions or concerns, feel free to contact us.';

                $firstName = $tenants_data['t3_fname'];
                if (! $tenant) {
                    $tenant = new User();
                    $tenant->email = $tenants_data['t3_email'];
                }
                $ccEmails = [];
                $attachment = [];
                $tenant->notify(new TenantAgreementNotification($content, $subject, $firstName, $ccEmails, $attachment));
            } else {
                $propertyObj = Property::find($updateForm->prop_id);
                $this->sendNotification($propertyObj, $updateForm->id, $updateForm->access_token);
            }

            return redirect()->route('tenant.viewTenantAgreement', ['action' => 'view', 'form_id' => Crypt::encryptString($data->id), 'access_token' => $data->access_token])->with('status', 'Submitted Successfully!');
        } elseif ($request->form_step == '3' && ! empty($request->id)) {
            $rules = [
                'initial_3' => ['required', new TenantRequest()],
                'initial_7' => ['required', new TenantRequest()],
                // 'initial_11' => ['required', new TenantRequest()],
                // 'initial_15' => ['required', new TenantRequest()],
                'initial_19.*' => ['required', new TenantRequest()],
                'initial_25.*' => ['required', new TenantRequest()],
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $requestData = array_filter($request->except(['_token']), function ($value) {
                return $value !== null;
            });

            $tableArray = [];
            foreach ($requestData as $key => $val) {
                if (in_array($key, $json_fields)) {
                    $tableArray[$key] = (! empty($val) ? serialize(json_encode($val)) : null);
                } else {
                    $tableArray[$key] = $val;
                }
            }
            $tableArray['ip_address'] = $request->ip();
            $tableArray['access_token'] = bin2hex(random_bytes(16));
            $tableArray['form_step'] = '4';
            $updateForm = TenantAgreement::find($request->id);
            if ($updateForm) {
                $updateForm->update($tableArray);
            }

            $data = TenantAgreement::find($request->id);
            if ($data) {
                $tenants_data = json_decode(unserialize($data->tenants_data), true);
                $property_address = json_decode(unserialize($data->property_address), true);
            }

            $unit = $property_address['unit'] ? $property_address['unit'] . ', ' : '';
            $prop_address = $unit . $property_address['st'] . ', ' . $property_address['city'] . ', ' . $property_address['state'] . ', ' . $property_address['zip'];
            $countries = Countries();

            $propertyObj = Property::find($updateForm->prop_id);
            $this->sendNotification($propertyObj, $updateForm->id, $updateForm->access_token);

            return redirect()->route('tenant.viewTenantAgreement', ['action' => 'view', 'form_id' => Crypt::encryptString($data->id), 'access_token' => $data->access_token])->with('status', 'Submitted Successfully!');
        } elseif ($request->form_step == '4' && ! empty($request->id)) {
            $rules = [
                'initial_4' => ['required', new TenantRequest()],
                'initial_8' => ['required', new TenantRequest()],
                // 'initial_12' => ['required', new TenantRequest()],
                // 'initial_16' => ['required', new TenantRequest()],
                'initial_20.*' => ['required', new TenantRequest()],
                'initial_26.*' => ['required', new TenantRequest()],
                'initial_28' => ['required', new TenantRequest()],
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $requestData = array_filter($request->except(['_token']), function ($value) {
                return $value !== null;
            });
            $tableArray = [];
            foreach ($requestData as $key => $val) {
                if (in_array($key, $json_fields)) {
                    $tableArray[$key] = (! empty($val) ? serialize(json_encode($val)) : null);
                } else {
                    $tableArray[$key] = $val;
                }
            }
            $tableArray['ip_address'] = $request->ip();
            $tableArray['access_token'] = bin2hex(random_bytes(16));
            $tableArray['status'] = '1';
            $tableArray['approved_on'] = Carbon::now();
            $tableArray['form_step'] = '5';
            $updateForm = TenantAgreement::find($request->id);
            if ($updateForm) {
                $updateForm->update($tableArray);
            }
            $data = TenantAgreement::find($request->id);
            if ($data) {
                $tenants_data = json_decode(unserialize($data->tenants_data), true);
                $countries = Countries();
                $file_name = Str::slug($tenants_data['t1_fname'] . ' ' . $tenants_data['t1_lname'] . ' ' . $data->id, "-");
            }

            $type = 'tenancy-agreements';
            $baseDir = createBaseDirectory($type, $request->id);
            $savePath = $baseDir . 'forrentcentral-TA-' . $file_name . '.pdf';

            if (! file_exists($savePath)) {
                ini_set('max_execution_time', 0);
                $pdf = PDF::loadView('tenant::agreement.agreementsView', compact('countries', 'data'));
                $pdf->getDomPDF()->set_option("enable_php", true);
                $pdf->save($savePath);
            }

            $content = 'We are pleased to inform you that your Tenancy Agreement has been successfully completed. You can now view the agreement form by clicking the link below:';
            $content .= '<a href="' . route('tenant.viewTenantAgreement', ['action' => 'view', 'form_id' => Crypt::encryptString($data->id), 'access_token' => $data->access_token]) . '"> View Tenancy Agreement </a>';
            $content .= 'Additionally, please find the attached PDF file for your reference.';
            $content .= "If you have any questions or need further assistance, please don't hesitate to contact us.";
            $content .= 'Thank you for choosing ' . appName() . ' for your tenancy needs.';
            $subject = appName() . ' Tenancy Agreement Completed.';

            $attachment = $savePath;

            $ccEmails = [];
            if ($updateForm->number_tenants == 2) {
                $ccEmails[] = $tenants_data['t2_email'];
            } elseif ($updateForm->number_tenants == 3) {
                $ccEmails = [$tenants_data['t2_email'], $tenants_data['t3_email']];
            }
            // Initialize tenantData array
            $tenantData = [];

            for ($i = 1; $i <= $updateForm->number_tenants; $i++) {
                $tenantData[] = [
                    "t{$i}_fname" => $tenants_data["t{$i}_fname"],
                    "t{$i}_lname" => $tenants_data["t{$i}_lname"],
                    "t{$i}_email" => $tenants_data["t{$i}_email"],
                    "t{$i}_phone" => $tenants_data["t{$i}_phone"],
                ];
            }
            foreach ($tenantData as $key => $tenant) {
                $tenantName = $tenant['t' . (intval($key) + 1) . '_fname'];
                $tenantEmail = $tenant['t' . (intval($key) + 1) . '_email'];
                $userObj = User::where('email', $tenantEmail)->first();
                if (! $userObj) {
                    $userObj = new User();
                    $userObj->email = $tenant['t' . (intval($key) + 1) . '_email'];
                }
                $userObj->notify(new TenantAgreementNotification($content, $subject, $tenantName, $ccEmails, $attachment));
            }

            return redirect()->route('tenant.viewTenantAgreement', ['action' => 'view', 'form_id' => Crypt::encryptString($data->id), 'access_token' => $updateForm->access_token])->with('status', 'Submitted Successfully!');
        }
    }

    // Send Notification to the Manager, Owner, and Agents
    private function sendNotification($propertyObj, $id, $token)
    {
        $accountObj = UserEntity::where(['entity_key' => 'property', 'entity_value' => $propertyObj->id])->first();
        $subject = 'New Tenancy Agreement Submitted';
        $content = "We'd like to inform you that a new tenancy agreement has been submitted. Please review the details and take necessary action.";
        $content .= 'You can access tenancy agreement form by clicking the link <a href="' . route('tenant.viewTenantAgreement', ['action' => 'edit', 'form_id' => Crypt::encryptString($id), 'access_token' => $token]) . '"> Click Here </a>.';
        $content .= 'Thank you for your attention to this matter.';
        $ccEmails = [];
        $attachment = [];

        // Notifying the property manager
        $managerObj = User::find($accountObj->account_id);

        try {
            $managerObj->notify(new TenantAgreementNotification($content, $subject, $managerObj->name, $ccEmails, $attachment));
            Log::info('Notifying the property manager');
        } catch (\Exception $e) {
            Log::error('Manager ' . $e->getMessage());
        }

        // Notifying property agents
        if ($propertyObj->prop_agents) {
            $agentIds = explode(',', $propertyObj->prop_agents);
            if (count($agentIds) > 0) {
                foreach ($agentIds as $key => $agentId) {
                    $agentObj = User::find($agentId);

                    try {
                        $agentObj->notify(new TenantAgreementNotification($content, $subject, $agentObj->name, $ccEmails, $attachment));
                        Log::info('Notifying to property agent: ' . $agentObj->name);
                    } catch (\Exception $e) {
                        Log::error('Agent ' . $e->getMessage());
                    }
                }
            }
        }


        // Notifying property owner if not the same as the manager
        if ($propertyObj->user_id) {
            $ownerId = $propertyObj->user_id;
            if ($accountObj->account_id != $ownerId) {
                $ownerObj = User::find($ownerId);

                try {
                    $ownerObj->notify(new TenantAgreementNotification($content, $subject, $ownerObj->name, $ccEmails, $attachment));
                    Log::info('Notifying property owner if not the same as the manager: ' . $ownerObj->name);
                } catch (\Exception $e) {
                    Log::error('Owner ' . $e->getMessage());
                }
            }
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('tenant::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('tenant::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function agreementForm(Request $request, $user_id = null, $prop_id = null, $tenants = null, $app_id = null)
    {
        $formId = $request->query('form_id');
        $rentalApplicationData = null;
        $property = null;
        $disclosure = [];

        if ($formId) {
            $appId = Crypt::decryptString($formId);
            $rentalApplicationData = RentalApplication::find($appId);
            if ($rentalApplicationData) {
                $property = Property::with('agent_detail')->find($rentalApplicationData->prop_id);
            }
        } else {
            $property = Property::with('agent_detail')->find($prop_id, ['id', 'user_id', 'title', 'address', 'country', 'state', 'city', 'zip', 'rate', 'unit_number', 'prop_type', 'strata_property_details', 'prop_agents']);
        }

        $tenants = $request->tenants ?? 1;
        $adult_tenants = $request->adult_tenants ?? 0;
        $minor_tenants = $request->minor_tenants ?? 0;
        $prop_type = $request->prop_type ?? 'Non Strata';

        $properties = Property::where('status', '1')->whereRaw("find_in_set('For Rent', prop_status)")->select('id', 'title', 'address')->get();

        $ip = $request->ip();
        $countries = Countries(); // Assuming this function retrieves countries data

        $data = new TenantAgreement();
        $access_token = bin2hex(random_bytes(16));
        $user = $user_id ? User::find(Crypt::decryptString($user_id)) : null;

        $title = 'Tenancy Agreement';
        $desc = '';
        $tenants_data = [];
        $property_address = [];

        return view('tenant::agreement.agreementForm', compact('title', 'disclosure', 'tenants_data', 'property_address', 'rentalApplicationData', 'desc', 'countries', 'data', 'property', 'properties', 'ip', 'tenants', 'user', 'access_token', 'app_id', 'minor_tenants', 'adult_tenants', 'prop_type'));
    }

    public function viewTenantAgreement(Request $request, $action, $form_id, $access_token)
    {
        try {
            $data = TenantAgreement::where(['id' => Crypt::decryptString($form_id), 'access_token' => $access_token])->first();
            if (! $data) {
                $link_accessible = false;

                return view('tenant::agreement.expireLinkPage', compact('link_accessible'));
            }
            $countries = Countries();
            $link_accessible = false;

            $disclosure = json_decode(unserialize($data->disclosure), true);
            $tenants_data = json_decode(unserialize($data->tenants_data), true);
            $minor_names = json_decode(unserialize($data->minor_names), true);
            $adult_names = json_decode(unserialize($data->adult_names), true);
            $property_address = json_decode(unserialize($data->property_address));

            $utilities = json_decode(unserialize($data->utilities), true);
            $rental_period = json_decode(unserialize($data->rental_period), true);
            $rent_fees = json_decode(unserialize($data->rent_fees), true);
            $charges = json_decode(unserialize($data->charges), true);

            $security = json_decode(unserialize($data->security), true);
            $smoking = json_decode(unserialize($data->smoking), true);
            $form_k_notice = json_decode(unserialize($data->form_k_notice), true);

            $tenant_property = json_decode(unserialize($data->tenant_property), true);
            $account_details = json_decode(unserialize($data->account_details), true);
            $other_account_holder = json_decode(unserialize($data->other_account_holder), true);

            $initial_1 = $data->initial_1;
            $initial_2 = $data->initial_2 ?? null;
            $initial_3 = $data->initial_3 ?? null;
            $initial_4 = $data->initial_4 ?? null;
            $initial_5 = $data->initial_5 ?? null;
            $initial_6 = $data->initial_6 ?? null;
            $initial_7 = $data->initial_7 ?? null;
            $initial_8 = $data->initial_8 ?? null;
            $initial_9 = $data->initial_9 ?? null;
            $initial_10 = $data->initial_10 ?? null;
            $initial_11 = $data->initial_11 ?? null;
            $initial_12 = $data->initial_12 ?? null;
            $initial_13 = $data->initial_13 ?? null;
            $initial_14 = $data->initial_14 ?? null;
            $initial_15 = $data->initial_15 ?? null;
            $initial_16 = $data->initial_16 ?? null;
            $initial_17 = json_decode(unserialize($data->initial_17), true) ?? null;
            $initial_18 = json_decode(unserialize($data->initial_18), true) ?? null;
            $initial_19 = json_decode(unserialize($data->initial_19), true) ?? null;
            $initial_20 = json_decode(unserialize($data->initial_20), true) ?? null;
            $initial_21 = $data->initial_21 ?? null;
            $initial_22 = json_decode(unserialize($data->initial_22), true) ?? null;
            $initial_23 = json_decode(unserialize($data->initial_23), true) ?? null;
            $initial_24 = json_decode(unserialize($data->initial_24), true) ?? null;
            $initial_25 = json_decode(unserialize($data->initial_25), true) ?? null;
            $initial_26 = json_decode($data->initial_26, true);
            $initial_27 = $data->initial_27 ?? null;
            $initial_28 = $data->initial_28 ?? null;
            $initial_29 = json_decode(unserialize($data->initial_29), true) ?? null;
            $initial_30 = unserialize($data->initial_30) ?? null;

            // Property
            $property = null;
            if ($data && $data->prop_id) {
                $property = Property::select('id', 'user_id', 'title', 'address', 'country', 'state', 'city', 'zip', 'rate', 'unit_number', 'prop_type', 'strata_property_details')->find($data->prop_id);
            }
            $properties = Property::where('status', '1')->select('id', 'title', 'address')->get();

            $adult_tenants = $data ? $data->adult_tenants : 0;
            $minor_tenants = $data ? $data->minor_tenants : 0;
            $tenants = $data ? $data->number_tenants : 1;
            $user = null;

            if ($data) {
                $link_accessible = true;
                $user = User::find($data->user_id);
            }

            return view('tenant::agreement.agreementForm', compact('countries', 'data', 'link_accessible', 'tenants', 'action', 'user', 'properties', 'property', 'minor_tenants', 'adult_tenants', 'initial_1', 'initial_2', 'initial_3', 'initial_4', 'initial_5', 'initial_6', 'initial_7', 'initial_8', 'initial_9', 'initial_10', 'initial_11', 'initial_12', 'initial_13', 'initial_14', 'initial_15', 'initial_16', 'initial_17', 'initial_18', 'initial_19', 'initial_20', 'initial_21', 'initial_22', 'initial_23', 'initial_24', 'initial_25', 'initial_26', 'initial_27', 'initial_28', 'initial_29', 'initial_30', 'disclosure', 'tenants_data', 'minor_names', 'adult_names', 'property_address', 'utilities', 'rental_period', 'rent_fees', 'charges', 'security', 'smoking', 'form_k_notice', 'tenant_property', 'account_details', 'other_account_holder'));
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            $lineNumber = $e->getLine();
            Log::error("Error in viewTenantAgreement at line $lineNumber: $errorMessage");

            return redirect()->back();
        }
    }

    public function saveSign(Request $request)
    {
        $file = base64_encode($request->input('jsonbucket'));

        return base64_decode($file);
    }

    public function savePdf(Request $request, $type, $id, $access_key, $action = null)
    {
        // return $request->query('action');
        ini_set('max_execution_time', 0);

        try {
            $data = TenantAgreement::where('id', Crypt::decryptString($id))->where('access_token', $access_key)->first();
            $countries = Countries();
            $tenants_data = json_decode(unserialize($data->tenants_data), true);
            $fileName = str_slug($tenants_data['t1_fname'] . ' ' . $tenants_data['t1_lname'] . ' ' . $data->id, "-");

            $baseDir = public_path('uploads/agreements/' . $data->id . '/');
            if (! File::isDirectory($baseDir)) {
                File::makeDirectory($baseDir, 0777, true, true);
            }

            $agreementFilePath = $baseDir . 'forrentcentral-TA-' . $fileName . '-agreement.pdf';
            $disclosureFilePath = $baseDir . 'forrentcentral-TA-' . $fileName . '-disclosure.pdf';

            $zipFileName = 'forrentcentral-TA-' . $fileName . '.zip';
            $zipPath = $baseDir . $zipFileName;

            // Create a ZIP file if it doesn't exist
            $zip = new ZipArchive();

            if (! file_exists($zipPath) && $zip->open($zipPath, ZipArchive::CREATE) === true) {
                $pdf = PDF::loadView('tenant::agreement.agreementsView', compact('countries', 'data'));
                $pdf->getDomPDF()->set_option("enable_php", true);
                $pdf->save($agreementFilePath);
                $this->addToZip($zip, $agreementFilePath, 'forrentcentral-TA-' . $fileName . '-agreement.pdf');

                $pdf = PDF::loadView('tenant::agreement.agreementDisclosure', compact('countries', 'data'));
                $pdf->getDomPDF()->set_option("enable_php", true);
                $pdf->save($disclosureFilePath);
                $this->addToZip($zip, $disclosureFilePath, 'forrentcentral-TA-' . $fileName . '-disclosure.pdf');
                $zip->close();
            }

            if ($type == 'agreement') {
                if ($request->query('action') == 'view') {
                    return response()->download($agreementFilePath);
                } else {
                    if (file_exists($zipPath)) {
                        return response()->download($zipPath);
                    }
                }
            } elseif ($type == 'disclosure') {
                return $data;
                if (! file_exists($disclosureFilePath)) {
                    $pdf = PDF::stream('tenant::agreement.agreementDisclosure', compact('countries', 'data'));
                    $pdf->getDomPDF()->set_option("enable_php", true);
                    $pdf->save($disclosureFilePath);
                }

                return response()->download($disclosureFilePath);
            }

            return response()->json(['error' => 'Invalid PDF type.'], 400);
        } catch (\Exception $e) {
            Log::error('Message ' . $e->getMessage() . ' Line No: ' . $e->getLine() . ' File Name ' . $e->getFile());

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function addToZip($zip, $filePath, $fileName)
    {
        if (file_exists($filePath)) {
            $zip->addFile($filePath, $fileName);
        } else {
            Log::error("File not found: $filePath");
        }
    }
}
