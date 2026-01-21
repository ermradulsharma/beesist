<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.subscription.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($service = null)
    {
        return view('backend.subscription.services.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $titles = $requestData['title'];
        $statuses = $requestData['status'];
        foreach (array_combine($titles, $statuses) as $title => $status) {
            Service::create([
                'title' => $title,
                'status' => $status,
            ]);
        }

        return redirect()->route('admin.subscription.services.index')->withFlashSuccess(__('Service Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('backend.subscription.services.create', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $requestData = $request->all();
        $titles = $requestData['title'];
        $statuses = $requestData['status'];
        foreach (array_combine($titles, $statuses) as $title => $status) {
            $service->update([
                'title' => $title,
                'status' => $status,
            ]);
        }

        return redirect()->route('admin.subscription.services.index')->withFlashSuccess(__('Service Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
