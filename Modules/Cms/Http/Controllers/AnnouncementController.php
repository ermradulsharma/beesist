<?php

namespace Modules\Cms\Http\Controllers;

use App\Domains\Announcement\Models\Announcement;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Validator;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms::announcement.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'area' => 'required',
            'type' => 'required',
            'message' => 'required',
        ];
        $messages = [
            'area.required' => 'The area field is required.',
            'type.required' => 'The type field is required.',
            'message.required' => 'The message field is required.',
        ];
        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }
        $data = $request->only(['area', 'type', 'message', 'ends_at', 'enabled']);
        $data['starts_at'] = Carbon::parse($request->starts_at)->format('Y-m-d h:i:s');
        $data['ends_at'] = Carbon::parse($request->ends_at)->format('Y-m-d h:i:s');
        if ($request->requestId) {
            $announcement = Announcement::find($request->requestId);
            if ($announcement) {
                $announcement->update($data);
            }
        } else {
            Announcement::create($data);
        }

        return back()->withFlashSuccess(__('Announcement saved successfully.'));
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('cms::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('cms::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
