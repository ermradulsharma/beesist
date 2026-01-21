<?php

namespace Modules\Tenant\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Property\Entities\Property;

class TenancyEndNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $prop_id = null)
    {
        $title = 'NOTICE TO END TENANCY';
        $desc = 'NOTICE TO END TENANCY';
        $keyword = 'NOTICE TO END TENANCY';

        $property = $prop_id ? Property::find($prop_id, ['id', 'user_id', 'title', 'address', 'country', 'state', 'city', 'zip', 'rate', 'unit_number', 'prop_type', 'strata_property_details']) : null;
        $properties = Property::where('status', '1')->whereRaw("find_in_set('Rented', prop_status)")->select('id', 'title', 'address')->get();
        $ip = \Request::ip();
        $countries = Countries();

        return view('tenant::notices.index', compact('title', 'keyword', 'desc', 'property', 'properties', 'ip', 'countries'));
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
        //
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
}
