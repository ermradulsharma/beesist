<?php

namespace Modules\Property\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Modules\Property\Entities\Building;
use Modules\Property\Entities\Media;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $countries = Countries();

        return view('property::building.index', compact('countries'));
    }

    public function buildingsIndex()
    {
        $properties = Building::query();
        if (Auth::check() && Auth::user()->hasAnyRole('Administrator', 'Property Manager', 'Property Owner')) {
            $properties = $properties;
        } else {
            $properties = $properties->where(['status' => 1]);
        }
        $properties = $properties->orderByDesc('id')->get();

        return view('property::building.frontend.buildings', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $countries = Countries();
        $buildingObjs = Building::all();

        return view('property::building.create', compact('countries', 'buildingObjs'))->withBuilding(new Building());
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            if (! Auth::user()->hasAllAccess()) {
                return redirect()->back()->withFlashDanger(__('You do not have access to do that.'));
            }
            $validationRules = [
                'title' => 'required|unique:buildings,title,' . ($request->filled('building_id') ? $request->building_id : 'NULL'),
            ];
            $request->validate($validationRules);
            $data = [
                'title' => $request->title,
                'content' => $request->content,
                'building_info' => $request->building_info ? json_encode($request->building_info) : null,
                'building_contacts' => $request->building_contacts ? json_encode($request->building_contacts) : null,
                'construction_info' => $request->construction_info ? json_encode($request->construction_info) : null,
                'strata_property_details' => $request->strata_property_details ? json_encode($request->strata_property_details) : null,
                'location' => $request->location ? json_encode($request->location) : null,
                'seo_data' => $request->seo_data ? json_encode($request->seo_data) : null,
                'custom_tags' => $request->custom_tags ? json_encode($request->custom_tags) : null,
                'featured' => $request->featured == '1' ? 'yes' : 'no',
                'avg_sqft_rate' => $request->avg_sqft_rate,
                'avg_strata_fee' => $request->avg_strata_fee,
                'strata_by_laws' => $request->strata_by_laws ? json_encode($request->strata_by_laws) : null,
                'maintenance_fee_includes' => $request->maintenance_fee_includes ? json_encode($request->maintenance_fee_includes) : null,
                'amenities' => $request->amenities ? json_encode($request->amenities) : null,
                'features' => $request->features ? json_encode($request->features) : null,
                'status' => $request->status,
                'pets_restrictions' => $request->pets_restrictions ? json_encode($request->pets_restrictions) : null,
                'other_amenities' => $request->other_amenities,
                'last_edited' => $request->last_edited,
            ];
            $buildingObj = Building::create($data);
            $building_id = $buildingObj->id;
            userEntity(Auth::user()->id, 'building', $building_id);

            // Upload Strata Files
            if ($request->hasFile('building_strata_documents')) {
                foreach ($request->file('building_strata_documents') as $stratafile) {
                    $this->uploadFile($stratafile, $building_id, 'building_strata_documents');
                }
            }

            // Upload Building Photos
            if ($request->hasFile('building_photos')) {
                foreach ($request->file('building_photos') as $buildingPhoto) {
                    $rules = [
                        'building_photos.*' => 'mimes:jpeg,png,jpg,gif,svg',
                    ];
                    $messages = [
                        'building_photos.mimes' => "Please upload jpeg, png, jpg, gif, svg format image",
                    ];
                    $validation = Validator::make($request->all(), $rules, $messages);
                    if ($validation->fails()) {
                        return redirect()->back()->withErrors($validation)->withInput();
                    }
                    $this->uploadFile($buildingPhoto, $building_id, 'building_photos');
                }
            }

            return redirect()->route(rolebased() . '.buildings.index')->withFlashSuccess(__('The building was successfully created.'));
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag())->withInput();
        } catch (\Exception $e) {
            Log::error('Error in building creation: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.'])->withInput();
        }
    }

    private function uploadFile($file, $building_id, $type)
    {
        $allowedImageTypes = ['jpeg', 'png', 'jpg', 'gif', 'svg'];
        $allowedFileTypes = array_merge($allowedImageTypes, ['pdf']);
        $allowedTypes = ($type == 'building_photos') ? $allowedImageTypes : $allowedFileTypes;
        $fileExtension = strtolower($file->getClientOriginalExtension());
        if (! in_array($fileExtension, $allowedTypes)) {
            Log::warning('Unsupported file type uploaded: ' . $fileExtension);

            return;
        }

        $baseDir = public_path('uploads/buildings/' . $building_id . '/');
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

        $haveFeatured = Media::where('ref_id', $building_id)->where('featured', '1')->first();
        $featured = $haveFeatured ? '' : '1';
        $attachArray = [
            'ref_id' => $building_id,
            'type' => $type,
            'url' => $fileName,
            'featured' => $featured,
        ];
        Media::create($attachArray);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('property::building.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($building)
    {
        $building = Building::find($building);

        return view('property::building.create', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try {
            if (! Auth::user()->hasAllAccess()) {
                return redirect()->back()->withFlashDanger(__('You do not have access to do that.'));
            }
            $validationRules = [
                'title' => 'required',
            ];
            $request->validate($validationRules);
            $buildingObj = Building::find($id);
            $data = [
                'title' => $request->title,
                'content' => $request->content,
                'building_info' => $request->building_info ? json_encode($request->building_info) : null,
                'building_contacts' => $request->building_contacts ? json_encode($request->building_contacts) : null,
                'construction_info' => $request->construction_info ? json_encode($request->construction_info) : null,
                'strata_property_details' => $request->strata_property_details ? json_encode($request->strata_property_details) : null,
                'location' => $request->location ? json_encode($request->location) : null,
                'seo_data' => $request->seo_data ? json_encode($request->seo_data) : null,
                'custom_tags' => $request->custom_tags ? json_encode($request->custom_tags) : null,
                'featured' => $request->featured ? 'yes' : 'no', // Using filled() instead of ==
                'avg_sqft_rate' => $request->avg_sqft_rate,
                'avg_strata_fee' => $request->avg_strata_fee,
                'strata_by_laws' => $request->strata_by_laws ? json_encode($request->strata_by_laws) : null,
                'maintenance_fee_includes' => $request->maintenance_fee_includes ? json_encode($request->maintenance_fee_includes) : null,
                'amenities' => $request->amenities ? json_encode($request->amenities) : null,
                'features' => $request->features ? json_encode($request->features) : null,
                'status' => $request->status,
                'pets_restrictions' => $request->pets_restrictions ? json_encode($request->pets_restrictions) : null,
                'other_amenities' => $request->other_amenities,
                'last_edited' => $request->last_edited,
            ];
            $buildingObj->update($data);

            // Update Strata Files
            if ($request->file('building_strata_documents')) {
                foreach ($request->file('building_strata_documents') as $stratafile) {
                    $this->uploadFile($stratafile, $id, 'building_strata_documents');
                }
            }

            // Update Building Photos
            if ($request->hasFile('building_photos')) {
                foreach ($request->file('building_photos') as $buildingPhoto) {
                    $rules = ['building_photos.*' => 'mimes:jpeg,png,jpg,gif,svg'];
                    $messages = ['building_photos.mimes' => "Please upload jpeg, png, jpg, gif, svg format image"];
                    $validation = Validator::make($request->all(), $rules, $messages);
                    if ($validation->fails()) {
                        return redirect()->back()->withErrors($validation)->withInput();
                    }
                    $this->uploadFile($buildingPhoto, $id, 'building_photos');
                }
            }

            return redirect()->route(rolebased() . '.buildings.index')->withFlashSuccess(__('The building was successfully updated.'));
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag())->withInput();
        } catch (\Exception $e) {
            Log::error('Error in building update: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.'])->withInput();
        }
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

    public function singleProperty($slug)
    {
        $building = Building::where('slug', $slug);
        if (Auth::check() && Auth::user()->hasAnyRole('Administrator', 'Property Manager', 'Property Owner')) {
            $properties = $building;
        } else {
            $properties = $building->where(['status' => 1]);
        }
        $building = $building->with('properties', 'buildingImages', 'buildingDocuments')->first();
        if ($building) {
            $shortcodes = [
                'form_builder' => function ($data) {
                    $content = '';
                    //Calculate the age
                    if (isset($data['id'])) {
                        $content = \Modules\FormBuilder\Entities\Helper::formShortcode($data['id']);
                    }

                    return $content;
                },
            ];
            $building->content = handleShortcodes($building->content, $shortcodes);

            return view('property::building.frontend.singleBuilding', compact('building'));
        } else {
            return abort(404);
        }
    }

    public function removePropertyMedia(Building $building, $id)
    {
        $building->photos()->each(function ($photo) {
            $this->deleteMedia($photo->id);
        });
        $building->documents()->each(function ($document) {
            $this->deleteMedia($document->id);
        });
        $building->delete();

        return response()->json('Removed');
    }

    private function deleteMedia($id = null)
    {
        $file = Media::find($id);
        if (! $file) {
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

    private function building($request)
    {
        return $data = [
            'title' => $request->title,
            'content' => $request->content,
            'building_info' => $request->building_info ? json_encode($request->building_info) : null,
            'building_contacts' => $request->building_contacts ? json_encode($request->building_contacts) : null,
            'construction_info' => $request->construction_info ? json_encode($request->construction_info) : null,
            'strata_property_details' => $request->strata_property_details ? json_encode($request->strata_property_details) : null,
            'location' => $request->location ? json_encode($request->location) : null,
            'seo_data' => $request->seo_data ? json_encode($request->seo_data) : null,
            'custom_tags' => $request->custom_tags ? json_encode($request->custom_tags) : null,
            'featured' => $request->featured ? 'yes' : 'no', // Using filled() instead of ==
            'avg_sqft_rate' => $request->avg_sqft_rate,
            'avg_strata_fee' => $request->avg_strata_fee,
            'strata_by_laws' => $request->strata_by_laws ? json_encode($request->strata_by_laws) : null,
            'maintenance_fee_includes' => $request->maintenance_fee_includes ? json_encode($request->maintenance_fee_includes) : null,
            'amenities' => $request->amenities ? json_encode($request->amenities) : null,
            'features' => $request->features ? json_encode($request->features) : null,
            'status' => $request->status,
            'pets_restrictions' => $request->pets_restrictions ? json_encode($request->pets_restrictions) : null,
            'other_amenities' => $request->other_amenities,
            'last_edited' => $request->last_edited,
        ];
    }
}
