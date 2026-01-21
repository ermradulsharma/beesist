<?php

namespace Modules\Property\Http\Controllers;

use App\Domains\Auth\Models\User;
use App\Exceptions\GeneralException;
use Auth;
use Carbon\Carbon;
use Exception;
use File;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Building;
use Modules\Property\Entities\Media;
use Modules\Property\Entities\Property;
use Modules\Property\Entities\SendPerformanceReport;
use Modules\Property\Notifications\PerformanceReportNotification;
use Modules\RentalApplication\Notifications\RentalApplicationNotification;
use Route;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('property::property.index')->withBuildings(new Building);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        $buildings = Building::all();

        return view('property::property.create', compact('buildings'))->withProperty(new Property());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::check()) {
                $request->validate([
                    'title' => 'required',
                ]);
                $user = Auth::user();
                $data = $request->except('alt_contact', 'strata_property_details', 'utilities', 'propertyphotos', 'stratafiles', 'occupancy_tenant_info', 'prop_status', 'prop_agents');
                $data['alt_contact'] = json_encode($request->alt_contact);
                $data['strata_property_details'] = json_encode($request->strata_property_details);
                $data['utilities'] = json_encode($request->utilities);
                $data['occupancy_tenant_info'] = json_encode($request->occupancy_tenant_info);
                $data['way_to_contact'] = json_encode($request->way_to_contact);
                $data['prop_status'] = is_array($request->prop_status) ? implode(',', $request->prop_status) : $request->prop_status;
                $data['address'] = $request->address ?? null;
                $data['status'] = $request->status ?? 0;
                $data['ip'] = $request->ip();

                if ($user->hasAgentAccess() && $user->can('user.access.property.create')) {
                    $accountId = UserEntity::where(['entity_key' => 'Agent', 'entity_value' => $user->id])->first()->account_id;
                    $data['prop_agents'] = is_array($user->id) ? implode(',', $user->id) : implode(',', [$user->id]);
                } else {
                    $accountId = $user->id;
                    $data['prop_agents'] = is_array($request->prop_agents) ? implode(',', $request->prop_agents) : $request->prop_agents;
                }
                if (in_array('For Rent', $request->prop_status)) {
                    $data['status_changed_on'] = now();
                }
                $property = Property::Create($data);

                userEntity($accountId, 'property', $property->id);

                if ($property->prop_agents) {
                    $subject = appName() . ' - New Property Assigned By Manager';
                    $content = 'We hope this message finds you well. <br>';
                    $content .= 'You are assigned as property agent on property: <b>' . $property->title . '</b>';

                    $agentIds = explode(',', $property->prop_agents);
                    if (count($agentIds) > 0) {
                        foreach ($agentIds as $key => $agentId) {
                            $agentObj = User::find($agentId);
                            try {
                                $agentObj->notify(new RentalApplicationNotification($agentObj, $subject, $content));
                                Log::info('Notifying property agent: ' . $agentId);
                            } catch (\Exception $e) {
                                Log::error('Agent ' . $e->getMessage());

                                return response()->json(['message' => 'An error occurred while processing your request. Please try again.', 'status' => 500, 'success' => false], 500);
                            }
                        }
                    }
                }

                // Upload Strata Files
                if ($request->hasFile('strata_documents')) {
                    foreach ($request->file('strata_documents') as $stratafile) {
                        $this->uploadFile($stratafile, $property->id, 'strata_documents', 'properties');
                    }
                }

                // Upload Building Photos
                if ($request->hasFile('property_photos')) {
                    foreach ($request->file('property_photos') as $propertyPhoto) {
                        request()->validate([
                            'property_photos.*' => 'mimes:jpeg,png,jpg,gif,svg',
                        ]);
                        $this->uploadFile($propertyPhoto, $property->id, 'property_photos', 'properties');
                    }
                }
                DB::commit();

                return redirect()->route(rolebased() . '.properties.index')->withFlashSuccess(__('The property was successfully created.'));
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating property.'));
        }
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function show(Property $property)
    {
        return view('property::property.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit(Property $property)
    {
        $buildings = Building::all();
        $strataPropertyDetails = json_decode($property->strata_property_details, true) ?? [];
        $occupancyTenantInfo = json_decode($property->occupancy_tenant_info, true) ?? [];
        $utilities = json_decode($property->utilities, true) ?? [];
        $propAgents = explode(',', $property->prop_agents);

        return view('property::property.create', compact('property', 'buildings', 'strataPropertyDetails', 'occupancyTenantInfo', 'utilities', 'propAgents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $data['alt_contact'] = json_encode($request->alt_contact);
        $data['strata_property_details'] = json_encode($request->strata_property_details);
        $data['utilities'] = json_encode($request->utilities);
        $data['occupancy_tenant_info'] = json_encode($request->occupancy_tenant_info);
        $data['way_to_contact'] = json_encode($request->way_to_contact);
        $data['prop_agents'] = is_array($request->prop_agents) ? implode(',', $request->prop_agents) : null;
        $data['prop_status'] = is_array($request->prop_status) ? implode(',', $request->prop_status) : null;
        $data['ip'] = $request->ip();
        $data['status'] = $request->status;
        $splittedstring = explode(',', $property->prop_status);
        $splittedstring_c = $request->prop_status;
        if (in_array('For Rent', $splittedstring) && in_array('Rented', $splittedstring_c)) {
            if (!empty($property->status_changed_on)) {
                $to_date = $property->status_changed_on;
            } else {
                $to_date = $property->created_at;
            }
            $to = Carbon::parse($to_date);
            $from = Carbon::now()->format('Y-m-d H:i:s');
            $days_on_market = $to->diffInDays($from);
            if (!empty($property->days_on_market)) {
                $data['days_on_market'] = $property->days_on_market + $days_on_market;
            } else {
                $data['days_on_market'] = $days_on_market;
            }
            $data['status_changed_on'] = Carbon::now()->format('Y-m-d H:i:s');
        }
        if (in_array('Rented', $splittedstring) && in_array('For Rent', $splittedstring_c)) {
            $data['status_changed_on'] = Carbon::now()->format('Y-m-d H:i:s');
        }

        if ($property->rate != $request->rate) {
            $data['last_rate_change'] = Carbon::now()->format('Y-m-d H:i:s');
        }

        $property->update($data);

        // Upload Strata Files
        if ($request->hasFile('strata_documents')) {
            foreach ($request->file('strata_documents') as $stratafile) {
                $this->uploadFile($stratafile, $property->id, 'strata_documents');
            }
        }

        // Upload Building Photos
        if ($request->hasFile('property_photos')) {
            foreach ($request->file('property_photos') as $buildingPhoto) {
                request()->validate([
                    'property_photos.*' => 'mimes:jpeg,png,jpg,gif,svg',
                ]);
                $this->uploadFile($buildingPhoto, $property->id, 'property_photos');
            }
        }

        return redirect()->route(rolebased() . '.properties.index')->withFlashSuccess(__('The property was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function destroy(Property $property)
    {
        //
    }

    public function makeFeatured(Request $request)
    {
        Media::where(['ref_id' => $request->prop_id, 'type' => $request->type])->update(['featured' => 0]);
        $file = Media::find($request->file_id);
        $file->featured = 1;
        $file->save();
        if ($file['type'] == 'property_photos') {
            $type = 'properties';
        } else {
            $type = 'buildings';
        }
        $url = asset('uploads/' . $type . '/' . $request->prop_id . '/' . $file['type'] . '/thumbs/' . $file['url']);

        return $url;
    }

    public function removePropertyMedia(Property $property, $id)
    {
        $property->propertyImages()->each(function ($photo) {
            $this->deleteMedia($photo->id);
        });
        $property->strataDocs()->each(function ($document) {
            $this->deleteMedia($document->id);
        });
        $property->delete();

        return response()->json('Removed');
    }

    private function deleteMedia($id = null)
    {
        $file = Media::find($id);
        if (!$file) {
            return 'Media not found';
        }
        $file->delete();
        $ext = pathinfo($file->url, PATHINFO_EXTENSION);
        $thumb_url = basename($file->url, '.' . $ext) . '-150x150.' . $ext;
        @unlink(public_path('storage/media') . '/' . $file->url);
        @unlink(public_path('storage/media') . '/thumbs/' . $file->url);
        @unlink(public_path('storage/media') . '/thumbs/' . $thumb_url);
        @unlink(public_path('storage/media') . '/original/' . $file->url);

        return 'Media removed';
    }

    public function propertiesIndex()
    {
        $properties = Property::query();
        if (Auth::check() && Auth::user()->hasAnyRole('Administrator', 'Property Manager', 'Property Owner')) {
            $properties = $properties;
        } else {
            $properties = $properties->where(['status' => 1]);
        }
        $properties = $properties->orderByDesc('id')->get();

        return view('property::property.frontend.properties', compact('properties'));
    }

    public function singleProperty($slug)
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

            return view('property::property.frontend.singleProperty', compact('property'));
        } else {
            return abort(404);
        }
    }

    private function uploadFile($file, $id, $type)
    {
        $allowedImageTypes = ['jpeg', 'png', 'jpg', 'gif', 'svg'];
        $allowedFileTypes = array_merge($allowedImageTypes, ['pdf']);
        $allowedTypes = ($type == 'property_photos') ? $allowedImageTypes : $allowedFileTypes;
        $fileExtension = strtolower($file->getClientOriginalExtension());
        if (!in_array($fileExtension, $allowedTypes)) {
            Log::warning('Unsupported file type uploaded: ' . $fileExtension);

            return;
        }

        $baseDir = public_path('uploads/properties/' . $id . '/');
        if (!File::isDirectory($baseDir)) {
            File::makeDirectory($baseDir, 0777, true, true);
        }
        $typeDir = $baseDir . '/' . $type;
        if (!File::isDirectory($typeDir)) {
            File::makeDirectory($typeDir, 0777, true, true);
        }
        chmod($baseDir, 0777);
        $dirThumb = $typeDir . '/thumbs';
        $original = $typeDir . '/original';

        foreach ([$dirThumb, $original] as $directory) {
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }
        }

        $fileName = generateFileName($file);
        if ($fileExtension == 'pdf') {
            $fileName = generateFileName($file);
            if (!File::isDirectory($typeDir)) {
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

    public function infoWindow(Request $request)
    {
        $data = null;
        $type = '';
        $directory = '';
        $route = '';
        if (Route::currentRouteName() == 'property.infoWindow') {
            $data = Property::with('featured_image')->find($request->pid);
            $type = 'properties';
            $directory = 'property_photos';
            $route = route('property.single', [$data->slug]);
        } elseif (Route::currentRouteName() == 'building.infoWindow') {
            $data = Building::with('featured_image')->find($request->pid);
            $type = 'buildings';
            $directory = 'building_photos';
            $route = route('building.single', [$data->slug]);
        }
        if (!$data) {
            return '';
        }
        $id = $data->id;
        $featuredImage = $data->featured_image['url'] ?? '';
        $thumbnailPath = public_path("uploads/{$type}/{$id}/{$directory}/thumbs/{$featuredImage}");
        $img = file_exists($thumbnailPath) ? asset("uploads/{$type}/{$id}/{$directory}/thumbs/{$featuredImage}") : asset('images/bolld-placeholder.png');
        $result = "<div style='width:250px; display:flex'>
                        <div class=''>
                            <a href='" . $route . "'>
                                <img style='width: 80px;min-height: 72px;' class='rp-thumbnail' src='" . $img . "'>
                            </a>
                        </div>
                        <div style='margin-left:5px;'>
                            <div class='mb-1'>
                                <a style='font-size: 11px;font-weight: 600;margin-bottom:5px' href='" . $route . "'>" . $data->title . '</a>
                            </div>';
        if (Route::currentRouteName() == 'property.infoWindow') {
            $result .= "<div>
                            <p class='mb-1'>" . $data->beds . ' Beds | ' . $data->baths . ' Baths | ' . $data->area . ' sqft</p>
                        </div>';
        }
        $result .= "<div class='text-end'>
                        <a href='" . $route . "' class='btn btn-sm btn-warning waves-effect waves-light' style='font-size: 12px; color: #FFF;'>Details</a>
                    </div>
                </div>
            </div>";

        return $result;
    }

    public function performanceReport(Request $request)
    {
        return view('property::property.report.index');
    }

    public function sentPerformanceReport(Request $request, $pId = null)
    {
        return view('property::property.report.sentReport', compact('pId'));
    }

    public function sendPerformanceReport(Request $request)
    {
        $result = SendPerformanceReport::create($request->all());
        if ($result) {
            $property = Property::find($result->property_id);

            $subject = 'Property Performance Report from ' . appName() . '!';
            $message = '<p>Your property performance report for <b><a href="' . $result->prop_url . '">' . $property->title . '</a></b> from <b>' . $result->from_date . '</b> to <b>' . $result->to_date . '</b> is:</p>';
            $message .= '<table width="100%">
                                <tr><td>Applied: </td><td>' . $result->applied . '</td></tr>
                                <tr><td>Applications Received: </td><td>' . $result->applications . '</td></tr>
                                <tr><td>Showings: </td><td>' . $result->showings . '</td></tr>
                                <tr><td>People Attended: </td><td>' . $result->people_attended . '</td></tr>
                                <tr><td>Asked a Question: </td><td>' . $result->asked_questions . '</td></tr>
                                <tr><td>Days on Market: </td><td>' . $result->days_on_market . '</td></tr>
                                <tr><td>Property Views: </td><td>' . $result->views . '</td></tr>
                                <tr><td>Rent Board URL: </td><td><a href="' . $result->rent_board_url . '">' . $result->rent_board_url . '</a></td></tr>
                                <tr><td>Rent Board Enquiries: </td><td>' . $result->rent_board_enquiries . '</td></tr>
                                <tr><td>Vancouver Craigslist URL: </td><td><a href="' . $result->craigslist_url . '">' . $result->craigslist_url . '</a></td></tr>
                                <tr><td>Vancouver Craigslist Enquiries: </td><td>' . $result->craigslist_enquiries . '</td></tr>
                            </table>';
            $message .= '<p>Comments:<br>' . nl2br($result->comment) . '</p>';

            if ($result->owner_email) {
                $userObj = User::where('email', $result->owner_email)->first();
                if (!$userObj) {
                    $userObj = new User;
                    $userObj->name = $result->owner_name;
                    $userObj->email = $result->owner_email;
                }
                $email2 = $result->owner2_email ?? null;
                try {
                    $userObj->notify(new PerformanceReportNotification($result->owner_name, $subject, $message, $email2));
                } catch (\Exception $e) {
                    Log::error('Error' . $e->getMessage());
                }
            }
        }

        return redirect()->route(rolebased() . '.properties.performanceReport')->withFlashSuccess(__('Property Performance Report Sent Successfully.'));
        // return response()->json(['msg' => '<h2 style="text-align: center;margin-bottom: 60px;color: green;"><i class="fa fa-check"></i> Report sent successfully.</h2>'], 200);
    }
}
