<?php

namespace Modules\RentalApplication\Http\Controllers;

use App\Domains\Auth\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;
use Modules\RentalApplication\Entities\ApplicantScreening;
use Modules\RentalApplication\Entities\RentalApplication;
use Modules\RentalApplication\Entities\ScreeningQuestion;
use Modules\RentalApplication\Notifications\ApplicationVerification;
use Modules\RentalApplication\Notifications\RentalApplication as NotificationsRentalApplication;
use Modules\RentalApplication\Notifications\RentalApplicationNotification;
use Route;

class RentalApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $properties = Property::with('featured_image', 'userEntity')->whereRaw("find_in_set('For Rent', prop_status)")->where('status', '1')->orderByDesc('featured')->orderBy('title')->select('id', 'title', 'address', 'city', 'beds', 'baths', 'sleeps', 'area', 'prop_status', 'rate', 'rateper', 'prop_type')->get();

        // return json_decode($properties[0]->userEntity->managerPage[0]->value, true)['terms_conditions'];
        return view('rentalapplication::index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('rentalapplication::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $uploadData = $this->uploadApplicationFiles($request);
            $status = Route::currentRouteName() == 'rental_application.rentalApplicationSubmit' ? 1 : 0;
            $alt_data = $this->prepareApplicationData($request, $uploadData, $status);

            $data = array_merge($request->all(), $alt_data);
            $rental_application = RentalApplication::updateOrCreate(['id' => $request->app_id], $data);

            if (Auth::check()) {
                userEntity(Auth::user()->id, 'rental_application', $rental_application->id);
            }

            $propertyObj = Property::find($rental_application->prop_id);
            if (! $propertyObj) {
                Log::error('Property not found for application: ' . $rental_application->id);
            }

            $accountObj = UserEntity::where(['entity_key' => 'property', 'entity_value' => $rental_application->prop_id])->first();
            if (! $accountObj) {
                Log::error('Account/UserEntity not found for property: ' . $rental_application->prop_id);
            }

            if ($status == 1 && $accountObj) {
                $questions = ScreeningQuestion::where(function ($query) use ($accountObj) {
                    $query->where('status', '1')->whereNull('pm_id')->orWhere('pm_id', $accountObj->account_id);
                })->orderBy('id', 'asc')->get();
                foreach ($questions as $question) {
                    $existingRecord = ApplicantScreening::where(['app_id' => $rental_application->id, 'question' => $question->title, 'question_type' => $question->question_type])->first();
                    if ($existingRecord) {
                        $existingRecord->update(['field_type' => $question->field_type]);
                    } else {
                        ApplicantScreening::create(['app_id' => $rental_application->id, 'question' => $question->title, 'question_type' => $question->question_type, 'field_type' => $question->field_type]);
                    }
                }
            }

            $applicantName = $rental_application->first_name . ' ' . $rental_application->last_name;
            $applicantEmail = $rental_application->email;

            if ($applicantEmail && $applicantName && $rental_application->property) {
                try {
                    $subject = 'Your Rental Reference Request for ' . $applicantName;
                    $textBody = 'We hope this message finds you well. ';
                    $textBody .= 'We wanted to inform you that ' . config('app.name') . ' is currently processing your rental application for the property located at ' . $rental_application->property->address . '. ';
                    $textBody .= 'As part of our application review process, we kindly request a rental reference regarding your suitability as a tenant. Your references play a crucial role in helping us assess your application. ';
                    $textBody .= 'If you have any questions or concerns regarding this request, please do not hesitate to reach out to us. ';
                    $textBody .= 'Thank you for your cooperation. ';
                    $textBody .= 'Sincerely, ';
                    $textBody .= 'The ' . config('app.name') . ' Team';
                    $rental_application->notify(new NotificationsRentalApplication($rental_application->toArray(), $subject, $textBody));
                    Log::info('Notification for Applicant');
                } catch (\Exception $e) {
                    Log::error('Applicant notification error: ' . $e->getMessage());
                }
            }

            if ($accountObj) {
                $subject = appName() . ' - New Rental Application Submitted';
                $content = 'We hope this message finds you well. <br>';
                $content .= 'A new rental application has been submitted by ' . $applicantName . ' for ' . ($rental_application->property ? $rental_application->property->address : 'the property') . '.<br>';
                $content .= 'Please review the details and take necessary actions<br>';
                $content .= "Your prompt attention to this matter would be greatly appreciated.<br>";
                $content .= 'If you have any questions or need further assistance, feel free to reach out.<br>';

                $managerObj = User::find($accountObj->account_id);
                if ($managerObj) {
                    try {
                        $managerObj->notify(new RentalApplicationNotification($managerObj, $subject, $content));
                        Log::info('Notifying the property manager');
                    } catch (\Exception $e) {
                        Log::error('Manager notification error: ' . $e->getMessage());
                    }
                }

                if ($propertyObj && $propertyObj->prop_agents) {
                    $agentIds = explode(',', $propertyObj->prop_agents);
                    foreach ($agentIds as $agentId) {
                        $agentObj = User::find($agentId);
                        if ($agentObj) {
                            try {
                                $agentObj->notify(new RentalApplicationNotification($agentObj, $subject, $content));
                                Log::info('Notifying property agent: ' . $agentId);
                            } catch (\Exception $e) {
                                Log::error('Agent notification error: ' . $agentId . ' ' . $e->getMessage());
                            }
                        }
                    }
                }

                if ($propertyObj && $propertyObj->user_id && $accountObj->account_id != $propertyObj->user_id) {
                    $ownerObj = User::find($propertyObj->user_id);
                    if ($ownerObj) {
                        try {
                            $ownerObj->notify(new RentalApplicationNotification($ownerObj, $subject, $content));
                            Log::info('Notifying property owner');
                        } catch (\Exception $e) {
                            Log::error('Owner notification error: ' . $e->getMessage());
                        }
                    }
                }
            }

            return response()->json(['message' => 'Application submitted successfully!', 'status' => 200, 'success' => true, 'rental_application' => $rental_application, 'subscription' => isset($subscription) ? $subscription : false, 'userRole' => isset($userRole) ? $userRole : 'tenant']);
        } catch (\Exception $e) {
            Log::error('Error in storing rental application: ' . $e->getMessage() . ' Line No ' . $e->getLine());

            return response()->json(['message' => 'An error occurred while processing your request. Please try again.', 'status' => 500, 'success' => false], 500);
        }
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('rentalapplication::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('rentalapplication::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function applicationForm(Request $request, $id = null)
    {
        $userEntity = UserEntity::where(['entity_key' => 'property', 'entity_value' => $id])->first();
        if ($userEntity) {
            $accountId = $userEntity->account_id;
            $propertiesDetails = UserEntity::with('property')->where(['entity_key' => 'property', 'account_id' => $accountId])->get();
            $property = $id ? Property::with('featured_image', 'userEntity')->find($id, ['id', 'title', 'address', 'city', 'beds', 'baths', 'sleeps', 'area', 'prop_status', 'rate', 'rateper', 'prop_type']) : new Property();
            $properties = [];
            foreach ($propertiesDetails as $propertyDetails) {
                if ($propertyDetails->property) {
                    $properties[] = $propertyDetails->property;
                }
            }
        } else {
            $properties = [];
            $property = new Property();
        }

        // $property = $id ? Property::with('featured_image', 'userEntity')->find($id, ['id', 'title', 'address', 'city', 'beds', 'baths', 'sleeps', 'area', 'prop_status', 'rate', 'rateper', 'prop_type']) : new Property;
        // $properties = Property::with('featured_image', 'userEntity')->whereRaw("find_in_set('For Rent', prop_status)")->where('status', '1')->select('id', 'title', 'address', 'city')->get();

        $countries = Countries();
        $rental_application = new RentalApplication();

        $rentalHistories = json_decode($rental_application->rental_history) ?? [];
        $employments = json_decode($rental_application->employment) ?? [];
        $references = json_decode($rental_application->references) ?? [];
        $cosigners = json_decode($rental_application->cosigners) ?? [];
        $additionalOccupants = json_decode($rental_application->additional_occupants) ?? [];
        $pets = json_decode($rental_application->pets) ?? [];
        $vehicles = json_decode($rental_application->vehicles) ?? [];
        $financialSuitabilities = json_decode($rental_application->financial_suitability) ?? [];

        return view('rentalapplication::applicationForm', compact('property', 'rental_application', 'properties', 'countries', 'rentalHistories', 'employments', 'references', 'cosigners', 'additionalOccupants', 'pets', 'vehicles', 'financialSuitabilities'));
    }

    public function rentalApplicationIndex()
    {
        return view('rentalapplication::rentalApplication.index');
    }

    public function leasingApplication(Request $request, $id)
    {
        $rental_application = RentalApplication::find(decrypt($id));
        $screening_questions = ApplicantScreening::where(['app_id' => $rental_application->id])->get();
        $groupedQuestions = $screening_questions->groupBy('question_type');
        $property = null;
        if ($rental_application->prop_id) {
            $property = Property::find($rental_application->prop_id);
        }

        $rental_histories = json_decode($rental_application->rental_history);
        $employments = json_decode($rental_application->employment);
        $referencess = json_decode($rental_application->references);
        $cosignerss = json_decode($rental_application->cosigners);
        $additional_occupantses = json_decode($rental_application->additional_occupants);
        $petses = json_decode($rental_application->pets);
        $vehicleses = json_decode($rental_application->vehicles);
        $financial_suitabilities = json_decode($rental_application->financial_suitability);
        if (Route::getCurrentRoute()->getName() == rolebased() . '.rental_application.leasingApplication') {
            return view('rentalapplication::rentalApplication.summary', compact('rental_application', 'screening_questions', 'groupedQuestions', 'property', 'rental_histories', 'employments', 'referencess', 'cosignerss', 'additional_occupantses', 'petses', 'vehicleses', 'financial_suitabilities'));
        }
        if (Route::getCurrentRoute()->getName() == 'rental_application.previewApplication') {
            return view('rentalapplication::applicationForm', compact('rental_application', 'screening_questions', 'groupedQuestions', 'property', 'rental_histories', 'employments', 'referencess', 'cosignerss', 'additional_occupantses', 'petses', 'vehicleses', 'financial_suitabilities'));
        }
    }

    public function resumeApply($applicationId, $propertyId)
    {
        $propertyId = decrypt($propertyId);
        if ($propertyId) {
            $property = Property::with('featured_image')->findOrFail($propertyId, ['id', 'title', 'address', 'city', 'beds', 'baths', 'sleeps', 'area', 'prop_status', 'rate', 'rateper', 'prop_type']);
        } else {
            $property = new Property();
        }
        $applicationId = decrypt($applicationId);
        $rental_application = RentalApplication::findOrFail($applicationId);
        $countries = Countries();
        $properties = Property::all();

        $rentalHistories = json_decode($rental_application->rental_history) ?? [];
        $employments = json_decode($rental_application->employment) ?? [];
        $references = json_decode($rental_application->references) ?? [];
        $cosigners = json_decode($rental_application->cosigners) ?? [];
        $additionalOccupants = json_decode($rental_application->additional_occupants) ?? [];
        $pets = json_decode($rental_application->pets) ?? [];
        $vehicles = json_decode($rental_application->vehicles) ?? [];
        $financialSuitabilities = json_decode($rental_application->financial_suitability) ?? [];

        return view('rentalapplication::applicationForm', compact('properties', 'property', 'countries', 'rental_application', 'rentalHistories', 'employments', 'references', 'cosigners', 'additionalOccupants', 'pets', 'vehicles', 'financialSuitabilities'));
    }

    public function preview(Request $request)
    {
        $property = Property::findOrFail($request->prop_id);
        $rental_application = $request;
        if (! $rental_application) {
            return response()->json(['success' => false, 'message' => 'Rental application not found'], 404);
        }
        $returnPreview = view('rentalapplication::layouts._preview', compact('property', 'rental_application'))->render();

        return response()->json(['success' => true, 'preview' => $returnPreview]);
    }

    public function applyPost(Request $request)
    {
        $request->validate([
            'rental_history.*.street_address' => 'required',
        ]);

        $uploadData = $this->uploadApplicationFiles($request);
        $alt_data = $this->prepareApplicationData($request, $uploadData, 1);

        $data = array_merge($request->all(), $alt_data);
        $rental_application = RentalApplication::updateOrCreate(['id' => $request->app_id], $data);

        if (Auth::check()) {
            userEntity(Auth::user()->id, 'rental_application', $rental_application->id);
        }

        $questions = ScreeningQuestion::where('status', 1)->orderBy('id', 'asc')->get();
        foreach ($questions as $question) {
            ApplicantScreening::updateOrCreate(['app_id' => $rental_application->id, 'question' => $question->title, 'question_type' => $question->question_type], ['app_id' => $rental_application->id, 'question' => $question->title, 'question_type' => $question->question_type, 'field_type' => $question->field_type]);
        }

        $applicantName = $rental_application->first_name . ' ' . $rental_application->last_name;
        if (isset($rental_application->rental_history)) {
            $rental_history = json_decode($rental_application->rental_history);
            foreach ($rental_history as $rhistory) {
                $rhistory->email = $rhistory->landlord_email;
                $rhistory->name = $rhistory->landlord_first_name . ' ' . $rhistory->landlord_last_name;
                $subject = 'Review rental application of ' . $applicantName . '!';
                $textBody = '<p>' . $applicantName . ', who resides or resided at ' . ($rental_application->property ? $rental_application->property->address : 'the property') . ' is undertaking a rental reference check through ' . config('app.name') . ', an intelligent risk assessment tool for tenants.</p>';
                $textBody .= '<p>In order for us to complete the tenancy check on ' . $applicantName . ', we require a rental reference regarding the suitability as a tenant. As such we would appreciate if you could kindly to spend 30s to give ' . $applicantName . ' a review.</p>';
                $textBody .= '<p>If you are not able to give a reference for the applicant, please let us know at <a href="mailto:info@beesist.com">info@beesist.com</a>.</p>';
                $textBody2 = '<p>We aim to make the rental check process as easy and fast as possible. Our online tool will guide you through the application, and the ' . config('app.name') . ' Team is here to help. If you have any questions, you can check the FAQs on our website or contact us via email or via the live chat function on our website.</p>';
                $this->collectData($rental_application->id, 'landlord', $rhistory, $applicantName, $subject, $textBody, $textBody2);
            }
        }

        $subject = 'New Rental Application Submitted';
        $textBody = '<p>' . $applicantName . ', has submitted rental application for ' . ($rental_application->property ? $rental_application->property->address : 'the property') . '</p>';
        $adminData = (object) [
            'email' => "info@beesist.com",
            'name' => "Beesist Team",
        ];
        $this->collectData($rental_application->id, 'admin', $adminData, $applicantName, $subject, $textBody);

        return redirect()->route('rental_application.previewApplication', encrypt($rental_application->id))->with(compact('rental_application'));
    }

    public function submitScreeningQuestion(Request $request)
    {
        if (isset($request->newQuestion)) {
            $question = ApplicantScreening::find($request->question);
            $question->update(['question' => $request->newQuestion]);

            return response()->json(['success' => true, 'msg' => 'Question has been updated successfully.']);
        } elseif (isset($request->request_type) && $request->request_type == 'remove') {
            $question = ApplicantScreening::find($request->question);
            $question->delete();

            return response()->json(['success' => true, 'msg' => 'Question has been deleted successfully.']);
        } elseif (isset($request->request_type) && $request->request_type == 'status_change') {
            $application = RentalApplication::find($request->app_id);
            $application->update(['status' => $request->status]);
            $labels = ['Draft', 'New', 'Approved', 'Rejected', 'Canceled', 'Undecided', 'Deferred', 'Added to lease'];
            $status = isset($labels[$request->status]) ? $labels[$request->status] : 'Invalid Status';

            return response()->json(['success' => true, 'msg' => 'Application status updated successfully to ' . $status]);
        } else {
            $question = ApplicantScreening::find($request->question);
            if ($request->checked == 'true') {
                $question->update(['screened_by' => Auth::user()->id, 'answer' => 1]);
                $screened_by = Auth::user()->name . ' at ' . $question->fresh()->updated_at;
            } else {
                $question->update(['screened_by' => null, 'answer' => null]);
                $screened_by = null;
            }

            return response()->json(['success' => true, 'screened_by' => $screened_by, 'msg' => 'Question has been successfully submitted.']);
        }
    }

    public function sendRentaApplicationVerification(Request $request, $type)
    {
        $rentalApplication = RentalApplication::find($request->appId);
        if ($rentalApplication->status == '2') {
            return response()->json(['error' => true, 'msg' => 'This Rental Application Already Approved.']);
        }
        if ($rentalApplication->status == '0') {
            return response()->json(['error' => true, 'msg' => 'This Rental Application is not completed.']);
        }
        if (! $rentalApplication) {
            return response()->json(['error' => true, 'msg' => 'Sorry! something went wrong.']);
        }
        $notificationType = $type === 'landlord' ? 'Landlord' : ($type === 'employer' ? 'Employer' : '');
        if ($notificationType === 'Landlord' && isset($rentalApplication->rental_history)) {
            foreach (json_decode($rentalApplication->rental_history) as $rhistory) {
                $rhistory->email = $rhistory->landlord_email;
                $rhistory->name = $rhistory->landlord_first_name . ' ' . $rhistory->landlord_last_name;
                $applicantName = $rentalApplication->first_name . ' ' . $rentalApplication->last_name;
                $subject = 'Review rental application of ' . $applicantName . '!';
                $textBody = '<p>' . $applicantName . ', who resides or resided at ' . ($rentalApplication->property ? $rentalApplication->property->address : 'the property') . ' is undertaking a rental reference check through ' . config('app.name') . ', an intelligent risk assessment tool for tenants.</p>';
                $textBody .= '<p>In order for us to complete the tenancy check on ' . $applicantName . ', we require a rental reference regarding the suitability as a tenant. As such we would appreciate if you could kindly to spend 30s to give ' . $applicantName . ' a review.</p>';
                $textBody .= '<p>If you are not able to give a reference for the applicant, please let us know at <a href="mailto:info@beesist.com">info@beesist.com</a>.</p>';
                $textBody2 = '<p>We aim to make the rental check process as easy and fast as possible. Our online tool will guide you through the application, and the ' . config('app.name') . ' Team is here to help. If you have any questions, you can check the FAQs on our website or contact us via email or via the live chat function on our website.</p>';
                $this->collectData($rentalApplication->id, $type, $rhistory, $applicantName, $subject, $textBody, $textBody2);
            }

            return response()->json(['success' => true, 'msg' => $notificationType . ' verification sent successfully.']);
        } elseif ($notificationType === 'Employer' && isset($rentalApplication->employment)) {
            foreach (json_decode($rentalApplication->employment) as $employment) {
                $employment->email = $employment->employer_email;
                $applicantName = $rentalApplication->first_name . ' ' . $rentalApplication->last_name;
                $subject = 'Review rental application of ' . $applicantName . '!';
                $textBody = '<p>' . $applicantName . ', who resides or resided at ' . ($rentalApplication->property ? $rentalApplication->property->address : 'the property') . ' is undertaking a rental reference check through ' . config('app.name') . ', an intelligent risk assessment tool for tenants.</p>';
                $textBody .= '<p>In order for us to complete the tenancy check on ' . $applicantName . ', we require a rental reference regarding the suitability as a tenant. As such we would appreciate if you could kindly to spend 30s to give ' . $applicantName . ' a review.</p>';
                $textBody .= '<p>If you are not able to give a reference for the applicant, please let us know at <a href="mailto:info@beesist.com">info@beesist.com</a>.</p>';
                $textBody2 = '<p>We aim to make the rental check process as easy and fast as possible. Our online tool will guide you through the application, and the ' . config('app.name') . ' Team is here to help. If you have any questions, you can check the FAQs on our website or contact us via email or via the live chat function on our website.</p>';
                $this->collectData($rentalApplication->id, $type, $employment, $applicantName, $subject, $textBody, $textBody2);
            }

            return response()->json(['success' => true, 'msg' => $notificationType . ' verification sent successfully.']);
        } else {
            return response()->json(['error' => true, 'msg' => 'Sorry! something went wrong.']);
        }
    }

    public function screeningRentalApplication(Request $request, $type = 'landlord', $application = null)
    {
        $rental_application = RentalApplication::find(decrypt($application));
        if (! $rental_application) {
            abort(404);
        }

        $property = Property::find($rental_application->prop_id);
        $propAgents = $property ? $property->prop_agents : null;
        $agentName = null;

        if ($propAgents) {
            $agentIds = explode(',', $propAgents);
            $agent = User::whereIn('id', $agentIds)->first();
            $agentName = $agent ? $agent->name : 'Property Manager';
        } else {
            $userEntity = UserEntity::where(['entity_key' => 'property', 'entity_value' => $rental_application->prop_id])->first();
            if ($userEntity) {
                $manager = User::find($userEntity->account_id);
                $agentName = $manager ? $manager->name : 'Property Manager';
            }
        }

        if ($request->isMethod('post')) {
            if ($request->screening_questions) {
                foreach ($request->screening_questions as $key => $value) {
                    $quest = ApplicantScreening::find($key);
                    if ($quest && isset($value['answer'])) {
                        $quest->update(['answer_guest' => $value['answer'], 'answer' => 1]);
                    }
                }
            }

            return redirect()->back()->with('status', 'updated successfully!');
        }

        $questions = ApplicantScreening::where(['app_id' => $rental_application->id, 'question_type' => $type])->get();

        $rental_history = json_decode($rental_application->rental_history, true) ?: [];
        $references = json_decode($rental_application->references, true) ?: [];
        $employment = json_decode($rental_application->employment, true) ?: [];
        $applicant_name = $rental_application->first_name . ' ' . $rental_application->last_name;

        foreach ($questions as $question) {
            if (! empty($rental_history)) {
                $landlordName = ($rental_history[0]['landlord_first_name'] ?? '') . ' ' . ($rental_history[0]['landlord_last_name'] ?? '');
                $question->question = str_replace('(Landlord name)', trim($landlordName), $question->question);
            }
            $question->question = str_replace('(your name)', $agentName, $question->question);
            $question->question = str_replace('(applicant)', $applicant_name, $question->question);
            $question->question = str_replace('(applicant name)', $applicant_name, $question->question);
            if (! empty($references)) {
                $refName = ($references[0]['first_name'] ?? '') . ' ' . ($references[0]['last_name'] ?? '');
                $question->question = str_replace('(applicant namey', trim($refName), $question->question);
                $question->question = str_replace('(applicant name)', trim($refName), $question->question);
            }
            if (! empty($employment)) {
                $question->question = str_replace('(Employer Contact Name)', $employment[0]['name'] ?? '', $question->question);
            }
        }

        return view('rentalapplication::screeningApplication', compact('rental_application', 'questions', 'type'));
    }

    private function uploadApplicationFiles(Request $request)
    {
        $destinationPath = 'uploads/rental-applications';
        $uploadData = [
            'rental_history_array' => [],
            'cosigners_array' => [],
            'financial_suitability_array' => [],
            'picture_id' => null,
        ];

        if ($request->rental_history) {
            foreach ($request->rental_history as $index => $rental_history) {
                foreach ($rental_history as $key => $value) {
                    if ($key == 'landlord_reference_letter' && $request->hasFile("rental_history.$index.$key")) {
                        $filename = time() . '-' . $value->getClientOriginalName();
                        $value->move($destinationPath, $filename);
                        $uploadData['rental_history_array'][$index][$key] = $destinationPath . '/' . $filename;
                    } else {
                        $uploadData['rental_history_array'][$index][$key] = $value;
                    }
                }
            }
        }

        if ($request->cosigners) {
            foreach ($request->cosigners as $index => $cosigners) {
                foreach ($cosigners as $key => $value) {
                    if (in_array($key, ["financial_suitability_documents", "credit_report", "additional_financial_suitability_documents", "id"]) && $request->hasFile("cosigners.$index.$key")) {
                        $filename = time() . '-' . $value->getClientOriginalName();
                        $value->move($destinationPath, $filename);
                        $uploadData['cosigners_array'][$index][$key] = $destinationPath . '/' . $filename;
                    } else {
                        $uploadData['cosigners_array'][$index][$key] = $value;
                    }
                }
            }
        }

        if ($request->financial_suitability) {
            foreach ($request->financial_suitability as $index => $financial_suitability) {
                foreach ($financial_suitability as $key => $value) {
                    if (in_array($key, ["job_offer_letter", "bank_statement", "credit_score"]) && $request->hasFile("financial_suitability.$index.$key")) {
                        $filename = time() . '-' . $value->getClientOriginalName();
                        $value->move($destinationPath, $filename);
                        $uploadData['financial_suitability_array'][$index][$key] = $destinationPath . '/' . $filename;
                    } else {
                        $uploadData['financial_suitability_array'][$index][$key] = $value;
                    }
                }
            }
        }

        if ($request->hasFile('picture_id')) {
            $picture_id = time() . '-' . $request->file('picture_id')->getClientOriginalName();
            $request->file('picture_id')->move($destinationPath, $picture_id);
            $uploadData['picture_id'] = $destinationPath . '/' . $picture_id;
        }

        return $uploadData;
    }

    private function prepareApplicationData(Request $request, array $uploadData, int $status)
    {
        return [
            'rental_history' => json_encode($uploadData['rental_history_array']),
            'employment' => json_encode($request->employment),
            'references' => json_encode($request->references),
            'cosigners' => json_encode($uploadData['cosigners_array']),
            'additional_occupants' => json_encode($request->additional_occupants),
            'pets' => json_encode($request->pets),
            'vehicles' => json_encode($request->vehicles),
            'financial_suitability' => json_encode($uploadData['financial_suitability_array']),
            'picture_id' => $uploadData['picture_id'],
            'status' => $status,
            'user_id' => Auth::check() ? Auth::user()->id : null,
        ];
    }

    private function collectData($id = null, $type = null, $data, $applicantName, $subject, $textBody, $textBody2 = null)
    {
        $userObj = [
            'user_email' => $data->email ?? null,
            'from_email' => config('mail.from.address'),
            'from_name' => config('mail.from.name'),
            'site_name' => config('app.name'),
            'user_name' => $data->name ?? null,
            'user_address' => sprintf(
                '%s, %s, %s, %s - %s',
                $data->street_address ?? '',
                $data->city ?? '',
                $data->zip_code ?? '',
                $data->state ?? '',
                $data->country ?? ''
            ),
            'applicant_name' => $applicantName,
            'subject' => $subject,
            'msg' => $textBody,
            'msg2' => $textBody2,
        ];
        $this->sendNotification($userObj, $type, $id);
    }

    private function sendNotification($userObj, $type, $application_id)
    {
        try {
            if (empty($userObj['user_email'])) {
                Log::warning('Skipping notification: user_email is missing.');

                return;
            }
            $user = User::where(['email' => $userObj['user_email']])->first();
            if ($user) {
                $user->notify(new ApplicationVerification($userObj, $type, $application_id));
            } else {
                $user = User::make([
                    'name' => $userObj['user_name'] ?? 'Applicant',
                    'email' => $userObj['user_email'],
                ]);
                $user->notify(new ApplicationVerification($userObj, $type, $application_id));
            }
            Log::info('Notification email sent successfully to ' . $userObj['user_email']);
        } catch (\Exception $e) {
            Log::error('Notification error: ' . $e->getMessage());

            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
