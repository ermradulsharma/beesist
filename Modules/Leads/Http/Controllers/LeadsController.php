<?php

namespace Modules\Leads\Http\Controllers;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Notifications\WelcomeEmailNotification;
use Auth;
use Carbon\Carbon;
use Crypt;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Modules\Leads\Entities\PropertyManagementAgreement;
use Modules\Leads\Entities\PropertyManagementAgreementForm;
use Modules\Leads\Notifications\ApplicationAttachementNotification;
use Modules\Leads\Notifications\ApplicationNotification;
use Modules\Leads\Notifications\LeadsFormNotification;
use Modules\Property\Entities\Media;
use Modules\Property\Entities\Property;
use PDF;
use Response;
use Str;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
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
        return view('leads::backend.index');
    }

    public function sendPMA()
    {
        return view('leads::backend.sendPMAForm');
    }

    public function addFormManually(Request $request)
    {
        if ($request->isMethod('POST')) {
            $rules = [
                'owner_count' => 'required',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|string|email:rfc,dns|max:255',
                'phone' => 'required|regex:/^[0-9]{10}$/',
                'prop_address' => 'required|string',
                'pma_pdf' => 'required|mimes:pdf|max:10000',
            ];
            if ($request->owner_count == 2) {
                $rules['first_name_2'] = 'required|string';
                $rules['last_name_2'] = 'required|string';
                $rules['email_2'] = 'required|string|email:rfc,dns|max:255';
                $rules['phone_2'] = 'required|regex:/^[0-9]{10}$/';
            }
            $request->validate($rules);
            DB::beginTransaction();

            try {
                $checkUser = User::where('email', $request->email)->first();
                if (! $checkUser) {
                    $password = str_random(8);
                    $userData = [
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'name' => $request->first_name . ' ' . $request->last_name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'country' => $request->country ?? 'CA',
                        'type' => User::TYPE_USER,
                        'roles' => 'Property Owner',
                        'password' => bcrypt($password),
                    ];
                    $createUser = $this->createUser($userData);
                    userEntity(Auth::user()->id, 'owner', $createUser->id);
                    $createUser->notify(new WelcomeEmailNotification($createUser, $password));
                    if ($createUser) {
                        try {
                            $subject = appName() . ' - New User Registered!';
                            $message = 'We hope this message finds you well.<br>';
                            $message .= 'A new user has registered on ' . appName() . '. Here are the details:<br>';
                            $message .= '<strong> Name:    </strong>' . $createUser->name .  '<br>';
                            $message .= '<strong> E-mail:  </strong>' . $createUser->email . '<br>';
                            $message .= '<strong> Phone:   </strong>' . $createUser->phone . '<br>';
                            $message .= '<strong> Country: </strong>' . $userData['country'];
                            if (Auth::check() && Auth::user()->hasAnyRole(['Administrator', 'Property Manager'])) {
                                $adminObj = User::find(Auth::user()->id);
                                $adminObj->notify(new LeadsFormNotification($adminObj, $subject, $message));
                            }

                            $ownerSubject = appName() . ' - Property Management Agreement Confirmation';
                            $ownerMessage = 'Thank you for verifying your email!';
                            $ownerMessage .= 'Please click on the link below to review and sign the agreement.<br>';
                            $ownerMessage .= '<div style="text-align: center;"><a href="' . route('pma.pmaRegisterForm', ['userId' => Crypt::encryptString($createUser->id)]) . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Fill Property Management Agreement</a></div>';
                            $createUser->notify(new LeadsFormNotification($createUser, $ownerSubject, $ownerMessage));
                        } catch (\Exception $e) {
                            Log::error($e);
                        }
                        $userId = $createUser->id;
                    }
                    $userId = $createUser->id;
                    $userEmail = $createUser->email;
                } else {
                    $userId = $checkUser->id;
                    $userEmail = $checkUser->email;
                }

                $pmaDetails = PropertyManagementAgreement::create([
                    'user_id' => $userId,
                    'owner_count' => $request->owner_count,
                    'first_name_1' => $request->first_name,
                    'last_name_1' => $request->last_name,
                    'email_1' => $userEmail,
                    'phone_1' => $request->phone,
                    'first_name_2' => $request->first_name_2,
                    'last_name_2' => $request->last_name_2,
                    'email_2' => $request->email_2,
                    'phone_2' => $request->phone_2,
                    'prop_address' => $request->prop_address,
                    'status' => '1',
                    'notify_status' => '6',

                ]);
                $fileName = uploadFile($request->file('pma_pdf'), $pmaDetails->id, 'PMA', 'PropertyManagementAgreement');
                $pmaDetails->update(['pma_pdf' => $fileName]);
                $propertyDetails = [
                    'form_id' => $pmaDetails->id,
                    'user_id' => $userId,
                    'title' => $request->prop_address,
                    'slug' => Str::slug($request->prop_address, '-'),
                    'prop_type' => $pmaDetails->prop_type,
                    'address' => $request->prop_address,
                ];
                Property::updateOrCreate(['form_id' => $pmaDetails->id], $propertyDetails);
                userEntity(Auth::user()->id, 'pmaManual', $pmaDetails->id);
                $ownerDetails = User::where('email', $request->email)->first();
                $subject2 = 'Complete your property information ' . config('app.name') . '!';
                $textBody = 'Please follow the below link to complete your property information:<br>';
                $textBody .= '<a href="' . url('/property-info') . '/' . Crypt::encryptString($userId) . '/' . Crypt::encryptString($pmaDetails->id) . '">Click Here</a>';
                $ownerDetails->notify(new LeadsFormNotification($ownerDetails, $subject2, $textBody));
                DB::commit();

                return redirect()->route('admin.leads.index')->with('flash_success', __('Form submitted successfully!'));
            } catch (Exception $e) {
                DB::rollback();
                Log::error($e->getMessage() . ' Line No. ' . $e->getLine());

                return redirect()->back()->flash('flash_danger', $e->getMessage());
            }
        }

        return view('leads::backend.manuallyForm');
    }

    public function editFormManually($id)
    {
        return view('frontend.pages.coming');
    }

    public function pdfFile($agreementId)
    {
        $agreement = PropertyManagementAgreement::find(decrypt($agreementId));
        if ($agreement && $agreement->pma_pdf) {
            $filePath = public_path('/uploads/PMA/' . decrypt($agreementId) . '/' . $agreement->pma_pdf);
            if (file_exists($filePath)) {
                return Response::file($filePath);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('leads::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $tableArray = [];
        $uploadedFiles = [];
        $rules = [];
        foreach ($request->all() as $key => $val) {
            if (in_array($key, ['located_3', 'located_o2_3', 'manage_p_at_9', 'items_inc_17', 'reg_own_23', 're_reg_own_28', 'ac_holder_30', 'bank_details_31', 'resident_won1', 'resident_won2', 'occupancy_tenant_info'])) {
                $tableArray[$key] = (! empty($val) ? serialize(json_encode($val)) : null);
            } elseif ($key === 'voided_check' && ! empty($val)) {
                $rules = [
                    'voided_check' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:10000',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }
                // Create base directory if it doesn't exist.
                $type = 'pma';
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
            } else {
                $tableArray[$key] = $val;
            }
        }
        $tableArray = array_merge($tableArray, $uploadedFiles);
        if ($request->has('id') && ! empty($request->id)) {
            $data = PropertyManagementAgreementForm::find($request->id);
            if ($data->form_step == 0) {
                // $access_token2 = bin2hex(random_bytes(16));
                $resident_won2 = (! empty($request->resident_won2) ? serialize(json_encode($request->resident_won2)) : null);
                $rules = [
                    'own2_identity' => 'required',
                    'initial_2' => 'required',
                    'initial_4' => 'required',
                    'initial_6' => 'required',
                    'initial_8' => 'required',
                    'initial_10' => 'required',
                    'initial_12' => 'required',
                    'initial_14' => 'required',
                    'initial_16' => 'required',
                    'initial_18' => 'required',
                    'initial_20' => 'required',
                    'initial_22' => 'required',
                    //'initial_24' => 'required',
                    'pName_20' => 'required',
                    'date_21' => 'required',
                    'pName_26' => 'required',
                    //'date_27' => 'required',
                    //'pw_name_34' => 'required',
                    //'date_35' => 'required',
                    'phone_o2_4' => ['required', 'regex:/^[0-9]{10}$/'],
                ];
                $messages = [
                    'own2_identity.required' => 'The Own2 Identity field is required.',
                    'initial_2.required' => 'The Initial 2 field is required.',
                    'initial_4.required' => 'The Initial 4 field is required.',
                    'initial_6.required' => 'The Initial 6 field is required.',
                    'initial_8.required' => 'The Initial 8 field is required.',
                    'initial_10.required' => 'The Initial 10 field is required.',
                    'initial_12.required' => 'The Initial 12 field is required.',
                    'initial_14.required' => 'The Initial 14 field is required.',
                    'initial_16.required' => 'The Initial 16 field is required.',
                    'initial_18.required' => 'The Initial 18 field is required.',
                    'initial_20.required' => 'The Initial 20 field is required.',
                    'initial_22.required' => 'The Initial 22 field is required.',
                    'pName_20.required' => 'The PName 20 field is required.',
                    'date_21.required' => 'The Date 21 field is required.',
                    'pName_26.required' => 'The PName 26 field is required.',
                    'phone_o2_4.required' => 'The Phone field is required.',
                    'phone_o2_4.regex' => 'Please enter a correct phone number format for the Phone field.',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                foreach (['own1_identity', 'own2_identity'] as $fileKey) {
                    if ($request->hasFile($fileKey)) {
                        $baseDir = public_path('uploads/pma/ownerIdentity/');
                        if (! File::isDirectory($baseDir)) {
                            File::makeDirectory($baseDir, 0777, true, true);
                        }
                        $filename = time() . '-' . str_replace(" ", "-", $request->file($fileKey)->getClientOriginalName());
                        if ($request->file($fileKey)->move($baseDir, $filename)) {
                            $tableArray[$fileKey] = $filename;
                        }
                    }
                }
                PropertyManagementAgreementForm::find($request->id)->update([
                    'fName_1_2' => $request->fName_1_2,
                    'lName_2_2' => $request->lName_2_2,
                    'own2_identity' => $tableArray['own2_identity'],
                    'phone_o2_4' => $request->phone_o2_4,
                    'located_o2_3' => (! empty($request->located_o2_3) ? serialize(json_encode($request->located_o2_3)) : null),
                    'reg_own_23' => (! empty($request->reg_own_23) ? serialize(json_encode($request->reg_own_23)) : null),
                    'resident_won2' => $resident_won2,
                    'initial_2' => $request->initial_2,
                    'initial_4' => $request->initial_4,
                    'initial_6' => $request->initial_6,
                    'initial_8' => $request->initial_8,
                    'initial_10' => $request->initial_10,
                    'initial_12' => $request->initial_12,
                    'initial_14' => $request->initial_14,
                    'initial_16' => $request->initial_16,
                    'initial_18' => $request->initial_18,
                    'initial_20' => $request->initial_20,
                    'initial_22' => $request->initial_22,
                    'initial_24' => $request->initial_24,
                    'pName_20' => $request->pName_20,
                    'date_21' => $request->date_21,
                    'pName_26' => $request->pName_26,
                    'date_27' => $request->date_27,
                    'pw_name_34' => $request->pw_name_34,
                    'date_35' => $request->date_35,
                    // 'access_token'  => $access_token2,
                    'form_step' => '1',
                ]);
                $current_token = PropertyManagementAgreementForm::where('id', $request->id)->value('access_token');
                $managerObj = User::where('uuid', $request->account_id)->first();
                if ($managerObj) {
                    $managerSubject = appName() . ' - Property Management Application [Agent]!';
                    $managerContent = 'We hope this message finds you well. <br>';
                    $managerContent .= 'A property management application has been submitted. Please review the details and take necessary actions.<br>';
                    $managerContent .= 'To view the application form, click the link below:<br>';
                    $managerContent .= '<div style="text-align: center;"><a href="' . route('pma.viewForm', ['action' => 'view', 'form_id' => Crypt::encryptString($data->id)]) . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">View Property Management Agreement</a></div><br>'; // for view form
                    $managerContent .= 'Please attend to this matter at your earliest convenience.<br>';
                    $managerContent .= 'If you have any questions or need further assistance, feel free to reach out.<br><br>';
                    $managerObj->notify(new ApplicationNotification($managerObj->first_name, $managerSubject, $managerContent));
                }
                if ($data->n_own == 2 && $data->bp == 1 && ! empty($data->won2_email)) {
                    $this->sendNotification($data->fName_1_2, $data->won2_email, $request->account_id, $data->user_id, $data->id);
                }

                return redirect()->route('pma.viewForm', ['action' => 'view', 'form_id' => Crypt::encryptString($data->id)])->with('status', 'Updated successfully!');
            } elseif ($data->form_step == 1) {
                $access_token3 = bin2hex(random_bytes(16));

                $validate_fields = ['initial_25', 'AgentN_25', 'Agentdate_25'];
                $common_msg = 'The :attribute field is required.';
                $rules = [];
                $messages = [];
                foreach ($validate_fields as $field) {
                    $rules[$field] = 'required';
                    $messages[$field . '.required'] = $common_msg;
                }
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                PropertyManagementAgreementForm::find($request->id)->update([
                    'initial_25' => $request->initial_25,
                    'AgentN_25' => $request->AgentN_25,
                    'Agentdate_25' => $request->Agentdate_25,
                    'form_step' => '2',
                    'approved_on' => now(),
                    'access_token' => $access_token3,
                    'status' => '1',
                ]);

                try {
                    // Retrieve countries data and PropertyManagementAgreementForm by ID
                    $countries = Countries();
                    $data = PropertyManagementAgreementForm::find($request->id);

                    // Generate file name
                    $fileName = Str::slug($data->fName_1 . ' ' . $data->lName_2 . ' ' . $data->fName_1_2 . ' ' . $data->lName_2_2 . ' ' . $data->address_10 . ' ' . $data->id, "-");

                    // Define base directory and save path
                    $baseDir = public_path('uploads/pma/pdf/');
                    $savePath = $baseDir . 'beesist-PMA-' . $fileName . '.pdf';

                    // Create directory if it doesn't exist
                    if (! File::isDirectory($baseDir)) {
                        File::makeDirectory($baseDir, 0777, true, true);
                    }

                    // Generate PDF if it doesn't exist already
                    if (! file_exists($savePath)) {
                        ini_set('max_execution_time', 0);
                        $pdf = PDF::loadView('forms.formdownload', compact('countries', 'data'));
                        $pdf->getDomPDF()->set_option("enable_php", true);

                        // Uncomment the following lines if you want to add page numbers
                        /*
                            $dom_pdf = $pdf->getDomPDF();
                            $canvas = $dom_pdf->get_canvas();
                            $font = $dom_pdf->getFontMetrics()->get_font("helvetica", "bold");
                            $canvas->page_text(285, 770, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0, 0, 0));
                        */

                        // Save PDF
                        $pdf->save($savePath);
                    }
                } catch (\Exception $e) {
                    Log::error('Error generating PDF: ' . $e->getMessage());
                }

                $access_form = url('pma-form-2') . '/' . $data->id . '/' . Crypt::encryptString($data->id);
                $viewForm = route('pma.viewForm', ['action' => 'view', 'form_id' => Crypt::encryptString($data->id)]); // url('pmaform/view') . '/' . Crypt::encryptString($data->id);
                $agentForm = $editPMA = route('pma.agentForm', ['account_id' => Auth::user()->uuid, 'formId' => Crypt::encryptString($data->id)]);

                $subject = appName() . ' Property Management Agreement Received';
                $message = 'We hope this message finds you well. <br>';
                $message .= 'Please find a signed property management agreement by clicking on the button below. <br>';
                if ($request->account_id) {
                    $message .= '<div style="text-align: center;"><a href="' . $agentForm . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Sign Property Management Agreement</a></div><br>';
                } else {
                    $message .= '<div style="text-align: center;"><a href="' . $viewForm . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">View Property Management Agreement</a></div><br>';
                }

                $message .= 'We are available should you have any questions or require more assistance. <br>';
                $attachment = $savePath;
                if ($data->email_5) {
                    $userObj = User::where('email', $data->email_5)->first();
                    if ($userObj) {
                        $userObj->notify(new ApplicationAttachementNotification($userObj->first_name, $subject, $message, $attachment));
                    }
                }

                if ($data->email_5 && $data->won2_email) {
                    $emails = [$data->email_5, $data->won2_email];
                    foreach ($emails as $email) {
                        $userObj = User::where('email', $email)->first();
                        if ($userObj) {
                            $name = $userObj->first_name;
                        } else {
                            $userObj = new User();
                            $userObj->name = $data->fName_1_2;
                            $userObj->email = $email;
                        }
                        $userObj->notify(new ApplicationAttachementNotification($name, $subject, $message, $attachment));
                    }
                }
                // Send Notification to agent is pending

                // Send Notification to Property Manager
                if ($request->account_id) {
                    $managerObj = User::where('uuid', $request->account_id)->first();
                    if ($managerObj) {
                        $managerObj->notify(new ApplicationAttachementNotification($managerObj->first_name, $subject, $message, $attachment));
                    }
                }

                return redirect()->route('pma.viewForm', ['action' => 'view', 'form_id' => Crypt::encryptString($data->id)])->with('status', 'Updated successfully!');
            }
        } else {
            $rules = [
                'fName_1' => 'required',
                'lName_2' => 'required',
                'located_3.*' => 'required',
                'manage_p_at_9.*' => 'required',
                'reg_own_23.*' => 'required',
                're_reg_own_28.*' => 'required',
                'ac_holder_30.*' => 'required',
                'phone_4' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
                'email_5' => 'required',
                'address_10' => 'required',
                'referral' => 'required',
                'referral_other' => 'required_if:referral,Other',
            ];
            if ($request->occu_status == 'Tenant') {
                $rules['occupancy_tenant_info.tenant_name'] = 'required';
                $rules['occupancy_tenant_info.tenant_email'] = 'required|email';
                $rules['occupancy_tenant_info.tenant_phone'] = ['required', 'regex:/^[0-9]{10}$/'];
            }
            if ($request->n_own == 1 && empty($request->bp)) {
                $rules = array_merge($rules, ["own1_identity", "management_type", 'initial_1', 'initial_3', 'initial_5', 'initial_7', 'initial_9', 'initial_11', 'initial_13', 'initial_15', 'initial_17', 'initial_19', 'initial_21', 'initial_23', "pName_18", "date_19", "pName_24", "date_25", "pw_name_29", "pw_name_32", "date_33", "ad_excess_11", "IA_rent_13", "utilities_14"]);
            }
            if ($request->n_own == 2 && $request->bp == 2) {
                $rules = array_merge($rules, ["own1_identity", "own2_identity", "management_type", "initial_1", "initial_2", "initial_3", "initial_4", "initial_5", "initial_6", "initial_7", "initial_8", "initial_9", "initial_10", "initial_11", "initial_12", "initial_13", "initial_14", "initial_15", "initial_16", "initial_17", "initial_18", "initial_19", "initial_20", "initial_21", "initial_22", "initial_23", "pName_18", "date_19", "pName_20", "date_21", "pName_24", "date_25", "pName_26", "date27", "pw_name_29", "pw_name_32", "date_33", "ad_excess_11", "IA_rent_13", "utilities_14"]);
            }
            if (empty($request->voided_check)) {
                $rules['bank_details_31.*'] = 'required';
            }
            if (! empty($request->items_inc_17[0])) {
                $rules['parking_17_1'] = 'required';
            }
            $messages = [
                'required' => ':attribute field is required.',
                'phone_4.regex' => 'Please enter a correct phone number.',
                'email_5.email' => 'Please enter a valid email address.',
                'occupancy_tenant_info.tenant_phone.regex' => 'Please enter a correct tenant phone number.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if (! isset($request->furn_excess_12)) {
                $tableArray['furn_excess_12'] = '0';
            }
            if (empty($request->bp)) {
                $tableArray['bp'] = '0';
            }
            $type = 'pma';
            $baseDir = createBaseDirectory($type, $request->id);
            foreach (['own1_identity', 'own2_identity'] as $fileKey) {
                if ($request->hasFile($fileKey)) {
                    $typeDir = $baseDir . 'ownerIdentity/';
                    if (! File::isDirectory($typeDir)) {
                        File::makeDirectory($typeDir, 0777, true, true);
                    }
                    $filename = time() . '-' . str_replace(" ", "-", $request->file($fileKey)->getClientOriginalName());
                    if ($request->file($fileKey)->move($typeDir, $filename)) {
                        $tableArray[$fileKey] = $filename;
                    }
                }
            }
            if (! empty($request->owner_title)) {
                $rules = [
                    'owner_title' => 'required|mimes:jpeg,png,jpg,gif|max:10000',
                ];
                $messages = [
                    'owner_title.required' => 'The owner title is required.',
                    'owner_title.mimes' => 'The owner title must be a file of type: jpeg, png, jpg, gif.',
                    'owner_title.max' => 'The owner title may not be greater than 10 MB.',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }
                foreach (['owner_title'] as $fileKey) {
                    if ($request->hasFile($fileKey)) {
                        $typeDir = $baseDir . 'ownerTitle/';
                        if (! File::isDirectory($typeDir)) {
                            File::makeDirectory($typeDir, 0777, true, true);
                        }
                        $filename = time() . '-' . str_replace(" ", "-", $request->file($fileKey)->getClientOriginalName());
                        if ($request->file($fileKey)->move($typeDir, $filename)) {
                            $tableArray[$fileKey] = $filename;
                        }
                    }
                }
            }
            $insertForm = PropertyManagementAgreementForm::create($tableArray);
            $data = PropertyManagementAgreementForm::find($insertForm->id);
            if ($data->n_own == 2 && $data->bp == 1 && ! empty($data->won2_email)) {
                if ($data->won2_email) {
                    $ownerEmail2 = $data->won2_email;
                    $ownerName2 = $data->fName_1_2;
                    $ownerSubject2 = appName() . ' - Property Management Agreement Received!';
                    $ownerContent2 = 'We hope this message finds you well.';
                    $ownerContent2 .= 'This document was sent to you for signature by <strong>' . $data->fName_1 . ' ' . $data->lName_2 . '</strong> <br>';
                    $ownerContent2 .= 'It is a property management agreement for property at <strong>' . $data->address_10 . '</strong>. <br>';
                    $ownerContent2 .= '<div style="text-align: center;"><a href="' . route('pma.form', ['account_id' => $request->account_id, 'owners' => $data->n_own, 'ap' => $data->bp, 'email2' => Crypt::encrypt($data->won2_email), 'formId' => $data->id]) . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Fill Property Management Agreement</a></div><br>'; // for access form
                    $ownerContent2 .= 'Once the agreement is signed by one of our agents, you will receive another link where you can download the PDF for your records. <br>';
                    $ownerContent2 .= 'If you have any questions or concerns, feel free to contact us.';
                    $ownerObj2 = User::where(['email' => $ownerEmail2,])->first();
                    if (! $ownerObj2) {
                        $ownerObj2 = new User();
                        $ownerObj2->email = $ownerEmail2;
                        $ownerObj2->name = $ownerName2;
                    }
                    $ownerObj2->notify(new ApplicationNotification($ownerName2, $ownerSubject2, $ownerContent2));
                }
                $this->sendNotification($data->fName_1, $data->email_5, $request->account_id, $data->user_id, $data->id);
            } else {
                // Notification For Owner 1
                if ($data->email_5) {
                    $this->sendNotification($data->fName_1, $data->email_5, $request->account_id, $data->user_id, $data->id);
                }

                // Notification For Owner 2
                if ($data->won2_email) {
                    $this->sendNotification($data->fName_1_2, $data->won2_email, $request->account_id, $data->user_id, $data->id);
                }

                // Notification For Propert Manager
                $managerObj = User::where('uuid', $request->account_id)->first();
                if ($managerObj) {
                    $agentSubject = appName() . ' - Property Management Application!';
                    $agentContent = 'We hope this message finds you well. ';
                    $agentContent .= 'A property management application has been submitted. Please review the details and take necessary actions.<br>';
                    $agentContent .= 'To view the application form, click the link below:<br>';
                    $agentContent .= '<div style="text-align: center;"><a href="' . route('pma.pmaRegisterForm', ['account_id' => $request->account_id, 'user_id' => Crypt::encryptString($data->id)]) . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">View Property Management Agreement</a></div><br>'; // for view Property Management Agreement form
                    $agentContent .= 'Please attend to this matter at your earliest convenience.<br>';
                    $agentContent .= 'If you have any questions or need further assistance, feel free to reach out.<br><br>';
                    $managerObj->notify(new ApplicationNotification($managerObj->first_name, $agentSubject, $agentContent));
                }
            }
        }

        $propertytableArray['form_id'] = $data->id;
        $propertytableArray['user_id'] = $data->user_id;
        $propertytableArray['title'] = $data->address_10;
        $propertytableArray['slug'] = Str::slug($data->address_10, '-');
        $propertytableArray['address'] = $data->address_10;
        $propertytableArray['occupancy_tenant_info'] = unserialize($data->occupancy_tenant_info) ?: [];
        $propertytableArray['occupancy_status'] = strtolower($data->occu_status);
        $propertytableArray['prop_agents'] = $data->agent_pma_id;
        $propertytableArray['status'] = 0;
        $propertyObj = Property::updateOrCreate(['form_id' => $data->id], $propertytableArray);
        $userId = User::where(['uuid' => $request->account_id])->first()->id;
        userEntity($userId, 'property', $propertyObj->id);
        userEntity($userId, 'pma', $data->id);
        $msg = 'Submited successfully!';

        return redirect()->route('pma.propertyInfo', ['account_id' => $request->account_id, 'user_id' => Crypt::encryptString($data->user_id), 'id' => Crypt::encryptString($data->id)])->with('status', $msg);
    }

    private function sendNotification($ownerName, $ownerEmail, $account_id, $userId, $id)
    {
        $ownerSubject = appName() . ' - Property Management Application Submitted!';
        $ownerContent = 'We hope this message finds you well. ';
        $ownerContent .= 'Thank you, ' . $ownerName . ',';
        $ownerContent .= 'You have successfully signed your property management agreement. You can review the details by clicking on the link below:<br>';
        $ownerContent .= '<div style="text-align: center;"><a href="' . route('pma.propertyInfo', ['account_id' => $account_id, 'user_id' => Crypt::encryptString($userId), 'id' => Crypt::encryptString($id)]) . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Fill Property Information</a></div><br>'; // for Property Info
        $ownerContent .= 'If you have any questions or concerns, feel free to contact us.';

        $ownerObj = User::where('email', $ownerEmail)->first();
        if (! $ownerObj) {
            $ownerObj = new User();
            $ownerObj->email = $ownerEmail;
            $ownerObj->name = $ownerName;
        }
        $ownerObj->notify(new ApplicationNotification($ownerName, $ownerSubject, $ownerContent));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('leads::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('leads::edit');
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

    public function propertyInfo(Request $request, $account_id, $userId = null, $id)
    {
        if ($request->isMethod('POST')) {
            foreach ($request->all() as $key => $val) {
                if (! in_array($key, ['stratafiles', 'propertyphotos', 'utilities', 'prop_agents', 'prop_status', 'occupancy_tenant_info', 'way_to_contact'])) {
                    $tableArray[$key] = $val;
                } elseif ($key == 'utilities' || $key == 'way_to_contact' || $key == 'strata_property_details' || $key == 'occupancy_tenant_info') {
                    $tableArray[$key] = (! empty($val) ? json_encode($val) : null);
                } elseif ($key == 'prop_agents' || $key == 'prop_status') {
                    $tableArray[$key] = (! empty($val) ? implode(',', $val) : null);
                }
            }
            if (! isset($request->title)) {
                $tableArray['title'] = $request->address;
            }
            $form_id = ! empty($request->form_id) ? $request->form_id : '0';
            if (isset($request->prop_id) && ! empty($request->prop_id)) {
                $prop_status_old = Property::find($request->prop_id);
                if ($prop_status_old) {
                    $splittedstring = explode(',', $prop_status_old->prop_status);
                    $splittedstring_c = explode(',', $request->prop_status);
                    if (in_array('For Rent', $splittedstring) && in_array('Rented', $splittedstring_c)) {
                        $to_date = ! empty($prop_status_old->status_changed_on) ? $prop_status_old->status_changed_on : $prop_status_old->created_at;
                        $to = Carbon::parse($to_date);
                        $from = Carbon::now()->format('Y-m-d H:i:s');
                        $days_on_market = $to->diffInDays($from);

                        $tableArray['days_on_market'] = ! empty($prop_status_old->days_on_market) ? $prop_status_old->days_on_market + $days_on_market : $days_on_market;
                        $tableArray['status_changed_on'] = now();
                    }
                    if (in_array('Rented', $splittedstring) && in_array('For Rent', $splittedstring_c)) {
                        $tableArray['status_changed_on'] = Carbon::now()->format('Y-m-d H:i:s');
                    }
                    if ($prop_status_old->rate != $request->rate) {
                        $tableArray['last_rate_change'] = Carbon::now()->format('Y-m-d H:i:s');
                    }
                } else {
                    return back()->with('status', 'Property Does Not Exist');
                }
            } else {
                $prop_id = '';
            }
            $tableArray['form_id'] = $form_id;
            $tableArray['content'] = $request->desc;
            $tableArray['st_address'] = $request->strata_property_details['address'];
            $tableArray['country'] = $request->strata_property_details['country'];
            $tableArray['state'] = $request->strata_property_details['state'];
            $tableArray['city'] = $request->strata_property_details['city'];
            $tableArray['zip'] = $request->strata_property_details['zip'];
            if (isset($request->source) && $request->source == 'pma') {
                $property = Property::updateOrCreate(['form_id' => $form_id], $tableArray);
                PropertyManagementAgreementForm::find($form_id)->update(['pro_status' => 1]);
            } else {
                $property = Property::updateOrCreate(['id' => $prop_id], $tableArray);
            }

            // Upload Strata Files
            if ($request->hasFile('strata_documents')) {
                foreach ($request->file('strata_documents') as $stratafile) {
                    $this->uploadFile($stratafile, $property->id, 'strata_documents', 'properties');
                }
            }

            if ($request->hasFile('property_photos')) {
                foreach ($request->file('property_photos') as $propertyPhoto) {
                    request()->validate([
                        'property_photos.*' => 'mimes:jpeg,png,jpg,gif,svg',
                    ]);
                    $this->uploadFile($propertyPhoto, $property->id, 'property_photos', 'properties');
                }
            }
            $data = PropertyManagementAgreementForm::find($form_id);

            return response()->json(['data' => $data, 'status' => 'created']);
        } else {
            $data = $property = [];
            if ($id) {
                $data = PropertyManagementAgreementForm::find(Crypt::decryptString($id));
                $property = Property::with('strataDocs', 'propertyImages', 'featuredImage')->where('form_id', Crypt::decryptString($id))->first();
            }
        }
        $ip = \Request::ip();
        $countries = Countries();

        return view('leads::property-form', compact('countries', 'account_id', 'data', 'property', 'ip'))->with('msg', 'inserted');
    }

    private function uploadFile($file, $id, $type)
    {
        $allowedImageTypes = ['jpeg', 'png', 'jpg', 'gif', 'svg'];
        $allowedFileTypes = array_merge($allowedImageTypes, ['pdf']);
        $allowedTypes = ($type == 'property_photos') ? $allowedImageTypes : $allowedFileTypes;
        $fileExtension = strtolower($file->getClientOriginalExtension());
        if (! in_array($fileExtension, $allowedTypes)) {
            Log::warning('Unsupported file type uploaded: ' . $fileExtension);

            return;
        }

        $baseDir = public_path('uploads/properties/' . $id . '/');
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

        $fileName = generateFileName($file);
        if ($fileExtension == 'pdf') {
            $fileName = generateFileName($file);
            if (! File::isDirectory($typeDir)) {
                File::makeDirectory($typeDir, 0777, true, true);
            }
            $file->move($typeDir, $fileName);
        } else {
            saveImage($file, $original, $fileName, 1600);
            saveImage($file, $baseDir, $fileName, 845);
            saveImage($file, $dirThumb, $fileName, 405, 304);
            saveImage($file, $dirThumb, generateFileName($file, true), 150, 150);
        }

        $haveFeatured = Media::where('ref_id', $id)->where('featured', '1')->first();
        $featured = $haveFeatured ? '' : '1';
        $attachArray = [
            'ref_id' => $id,
            'type' => $type,
            'url' => $fileName,
            'featured' => $featured,
        ];
        Media::create($attachArray);

        return $attachArray['url'];
    }

    public function pmaRegisterForm(Request $request, $account_id, $user_id = null)
    {
        if ($user_id) {
            $user_id = Crypt::decryptString($user_id);
            $isVerify = User::find($user_id)->email_verified_at;
            if (! $isVerify || ! Auth::check()) {
                abort(401);
            }
        } elseif (Auth::check()) {
            $user_id = Crypt::encryptString(Auth::user()->id);

            return redirect()->route('pma.pmaRegisterForm', ['account_id' => $account_id, 'userId' => $user_id]);
        }
        $verify = $request->has('email') && $request->email == 'true' ? 'email' : 'direct';

        return view('leads::pmaRegister', compact('verify', 'user_id', 'account_id'));
    }

    public function pmaRegisterFormSubmit(Request $request)
    {
        if (isset($request->email)) {
            $userExist = User::where('email', $request->email)->first();
            if ($userExist) {
                if ($request->varify == 'email') {
                    return redirect()->route('pma.pmaRegisterForm', ['account_id' => $request->account_id, 'userId' => Crypt::encryptString($userExist->id)]);
                } else {
                    $subject = appName() . ' - Property Management Agreement Confirmation';
                    $message = 'Thank you for verifying your email!';
                    $message .= 'Please click on the link below to review and sign the agreement.<br>';
                    $message .= '<div style="text-align: center;"><a href="' . route('pma.pmaRegisterForm', ['account_id' => $request->account_id, 'userId' => Crypt::encryptString($userExist->id)]) . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Fill Property Management Agreement</a></div>';
                    $userExist->notify(new LeadsFormNotification($userExist, $subject, $message));

                    return redirect()->route('pma.pmaRegisterFormSubmit')->with('response', 'IMPORTANT: VERIFY YOUR EMAIL ADDRESS!<br> Security is our top priority. To complete the signing process, please log in to the email address you provided in this form and click on the unique link to authenticate your signature.');
                }
            } else {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|string|email|max:255|unique:users',
                    'fname' => 'required',
                    'lname' => 'required',
                    'phone' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $password = Str::random(8);
                $userData = [
                    'first_name' => $request->fname,
                    'last_name' => $request->lname,
                    'name' => $request->fname . ' ' . $request->lname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country' => $request->country ?? 'CA',
                    'type' => User::TYPE_USER,
                    'roles' => 'Property Owner',
                    'password' => bcrypt($password),
                ];
                $createUser = $this->createUser($userData);
                $account = User::where(['uuid' => $request->account_id])->first();
                userEntity($account->id, 'owner', $createUser->id);
                $createUser->notify(new WelcomeEmailNotification($createUser, $password));
                if ($createUser) {
                    try {
                        $adminObj = User::where(['uuid' => $request->account_id])->first();
                        if ($adminObj) {
                            $adminSubject = appName() . ' - New User Registered!';
                            $adminTextBody = 'We hope this message finds you well.<br>';
                            $adminTextBody .= 'A new user has registered on ' . appName() . '. Here are the details:<br>';
                            $adminTextBody .= '<strong> Name:    </strong>' . $createUser->name .  '<br>';
                            $adminTextBody .= '<strong> E-mail:  </strong>' . $createUser->email . '<br>';
                            $adminTextBody .= '<strong> Phone:   </strong>' . $createUser->phone . '<br>';
                            $adminTextBody .= '<strong> Country: </strong>' . $userData['country'];
                            $adminObj->notify(new LeadsFormNotification($adminObj, $adminSubject, $adminTextBody));
                        }

                        $subject = appName() . ' - Property Management Agreement Confirmation';
                        $message = 'We hope this message finds you well.<br>';
                        $message .= 'Thank you for verifying your email!<br>';
                        $message .= 'Please click on the link below to review and sign the agreement.<br>';
                        $message .= '<div style="text-align: center;"><a href="' . route('pma.pmaRegisterForm', ['account_id' => $request->account_id, 'userId' => Crypt::encryptString($createUser->id)]) . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Fill Property Management Agreement</a></div><br>';
                        $createUser->notify(new LeadsFormNotification($createUser, $subject, $message));
                    } catch (\Exception $e) {
                        Log::error($e);
                    }
                }

                return redirect()->route('pma.pmaRegisterForm', ['account_id' => $request->account_id])->with('response', 'Thank you! We have just sent you a confirmation email with the Property Management Agreement form link. Please check your Inbox or Spam folder if you have not received any confirmation.');
            }
        } elseif (isset($request->user_id, $request->owners)) {
            if (($request->owners == '1') || ($request->owners == '2' && $request->ap == '2')) {
                $url = route('pma.form', ['account_id' => $request->account_id, 'owners' => $request->owners, 'ap' => $request->ap]);
            } elseif ($request->owners == '2' && $request->ap == '1' && $request->email2 !== '') {
                $url = route('pma.form', ['account_id' => $request->account_id, 'owners' => $request->owners, 'ap' => $request->ap, 'email2' => Crypt::encrypt($request->email2)]);
            }

            return redirect($url ?? route('pma.pmaRegisterForm', ['account_id' => $request->account_id]));
        }
    }

    public function pmaForm(Request $request, $account_id, $owners = null, $ap = null, $email2 = null, $formId = null)
    {

        $user = '';
        if (Auth::check()) {
            $user = Auth::user();
        }
        if (Route::currentRouteName() == 'pma.agentForm') {
            $formId = $owners;
        }
        $agentPmaId = session('agent_pma_id', '');
        $action = $request->action ?? '';
        $ip = $request->ip();
        $countries = Countries();
        $accessToken = bin2hex(random_bytes(16));
        $data = new PropertyManagementAgreementForm();
        $linkAccessible = true;
        if ($email2) {
            $email2 = Crypt::decrypt($email2);
        }

        if ($action === 'view') {
            $formId = Crypt::decryptString($request->form_id);
            $data = PropertyManagementAgreementForm::find($formId);
        } elseif (! empty($formId)) {
            $data = PropertyManagementAgreementForm::where(['id' => Crypt::decryptString($formId)])->first();
            $accessToken = $request->access_key;
            if (! $data) {
                $linkAccessible = false;
            }
        }

        return view('leads::pmaForm', compact('countries', 'accessToken', 'action', 'data', 'ip', 'linkAccessible', 'owners', 'ap', 'email2', 'agentPmaId', 'user', 'account_id'));
    }

    public function pmaViewForm(Request $request, $account_id, $action = null, $form_id = null, $userId = null, $owners = null, $ap = null, $email2 = null)
    {
        $user = '';
        $agentPmaId = session('agent_pma_id', '');
        $action = $request->action ?? '';
        $ip = $request->ip();
        $countries = Countries();
        $accessToken = bin2hex(random_bytes(16));
        $data = new PropertyManagementAgreementForm();
        $linkAccessible = true;

        if ($action === 'view') {
            $formId = Crypt::decryptString($request->form_id);
            $data = PropertyManagementAgreementForm::find($formId);
        } elseif (! empty($request->form_id)) {
            $formId = $request->form_id;
            $data = PropertyManagementAgreementForm::where(['id' => $formId, 'access_token' => $request->access_key])->first();
            $accessToken = $request->access_key;
            if (! $data) {
                $linkAccessible = false;
            }
        } else {
            if ($userId) {
                $id = Crypt::decryptString($userId);
                $user = User::find($id);
            }
        }

        return view('leads::pmaForm', compact('countries', 'accessToken', 'action', 'data', 'ip', 'linkAccessible', 'owners', 'ap', 'email2', 'agentPmaId', 'user', 'account_id'));
    }

    public function sendPMAForm(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        $subject = appName() . ' - Property Management Agreement';
        $message = 'We hope this message finds you well.<br>';
        $message .= 'Thank you for verifying your email!<br>';
        $message .= 'Please click on the link below to review and sign the agreement.<br>';
        $message .= '<div style="text-align: center;"><a href="' . route('pma.pmaRegisterForm', ['account_id' => Auth::user()->uuid]) . '" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Fill Property Management Agreement</a></div><br>';

        $user->notify(new LeadsFormNotification($user, $subject, $message));

        return back()->withFlashSuccess(__('Propert Management Form Send Successfully.'));
    }
}
