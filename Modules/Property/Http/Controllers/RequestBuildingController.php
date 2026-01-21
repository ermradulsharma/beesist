<?php

namespace Modules\Property\Http\Controllers;

use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Property\Entities\RequestBuilding;
use Str;

class RequestBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $id = null)
    {
        $countries = Countries();
        return view('property::building.requestBuilding', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('property::building.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
        ];
        $messages = [
            'title.required' => 'The title field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $buildingObj = RequestBuilding::find($request->requestId);
        if (!$request->requestId) {
            $buildingObj = new RequestBuilding;
            $buildingObj->user_id = Auth::user()->id;
        }
        $buildingObj->title = $request->title;
        $buildingObj->slug = Str::slug($request->title);
        $buildingObj->location = json_encode($request->location);
        $buildingObj->message = $request->message;
        if ($buildingObj->save()) {
            userEntity(Auth::user()->id, 'building_request', $buildingObj->id);
        }
        return redirect()->route(rolebased() . '.buildings.request')->withFlashSuccess(__('The building was successfully created.'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('property::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $countries = Countries();
        return view('property::building.requestBuilding', compact('countries'));
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
}
