@extends('backend.layouts.app')
@php
    $title = $building->id ? 'Edit' : 'Add';
@endphp
@section('title', __(':title Building', ['title' => $title]))
@push('after-styles')
    <style>
        .card-header *,
        .form-group label {
            font-weight: 600
        }

        .files_inner ul {
            padding: 0;
        }
        .alternative_contact {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .full_address{
            font-size: 9px;
            color: red;
        }
        .building_details {
            padding-bottom: 0px;
            padding-left: 15px;
        }
        .lebal_font_weight {
            font-weight: 400 !important;
        }
        /* select {
            -webkit-appearance: none;
            appearance: none;
        } */
    </style>
    <x-head.tinymce-config />
@endpush
@section('content')
    @php
        if (isset($building->location)) {
            $geo = get_lat_long(optional(json_decode($building->location))->address);
            if (isset($building->location)) {
                $lat_long = optional(json_decode($building->location))->lat . ', ' . optional(json_decode($building->location))->lng;
                $zoom = 15;
            } else {
                $lat_long = '49.282730, -123.120735';
                $zoom = 12;
            }
        } else {
            $lat_long = '49.282730, -123.120735';
            $zoom = 12;
        }
    @endphp

    <form method="post" action="{{ optional($building)->id ? route(rolebased() .'.buildings.update', $building) : route(rolebased() .'.buildings.store') }}" id="submit_property_form" enctype="multipart/form-data">
        @if (optional($building)->id)
            <input type="hidden" name="_method" value="patch">
            <p><em>Last updated by: {{ $building->last_edited ? getUserById($building->last_edited)->name : '' }}</em></p>
            <input type="hidden" name="prop_id" value="{{ Crypt::encryptString($building->id) }}">
            <input type="hidden" name="old_agents" value="{{ $building->prop_agents }}">
            <input type="hidden" name="form_id" value="{{ $building->form_id ? Crypt::encryptString($building->form_id) : '' }}">
        @endif
        @csrf
        <input type="hidden" name="last_edited" value="{{ Auth::user()->id }}">
        <div class="row g-2">
            <div class="col-12 col-sm-8 col-md-9">
                <div class="card box-primary">
                    <div class="card-body">
                        <div class="card box-info my-4">
                            <div class="card-header">
                                <h5>Basic Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="building_info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="building_title">Building Title</label>
                                                <input class="form-control" name="title" id="building_title" placeholder="Enter Building Title" value="{{ old('title', $building->title) }}" type="text">
                                            </div>
                                            @if ($building->id)
                                                <div class="form-group">
                                                    <label for="slug">Building Slug</label>
                                                    <input class="form-control" name="slug" placeholder="Building Slug" id="building_slug" value="{{ old('slug', $building->slug) }}" type="text">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="myeditorinstance">Building Description</label>
                                                <textarea id="myeditorinstance" name="content" placeholder="Building Description">{!! old('content', $building->content) !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box-info my-4">
                            <div class="card-header">
                                <h5>Building Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="building_info">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_name">Building Name</label>
                                                <input id="building_name" name="building_info[building_name]" value="{{ old('building_name', optional(json_decode($building->building_info))->building_name) }}" type="text" class="form-control" placeholder="Building Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_address">Building Address</label>
                                                <input id="building_address" onkeyup="initAutocomplete(this.id)" name="building_info[building_address]" value="{{ old('building_address', optional(json_decode($building->building_info))->building_address) }}" type="text" class="form-control" placeholder="Building Address">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_levels">Levels</label>
                                                <input id="building_levels" name="building_info[levels]" value="{{ old('levels', optional(json_decode($building->building_info))->levels) }}" type="text" class="form-control" placeholder="Levels">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_suites">Suites</label>
                                                <input id="building_suites" name="building_info[suites]" value="{{ old('suites', optional(json_decode($building->building_info))->suites) }}" type="text" class="form-control" placeholder="Suites">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_status">Building Status</label>
                                                <input id="building_status" name="building_info[building_status]" value="{{ old('building_status', optional(json_decode($building->building_info))->building_status) }}" type="text" class="form-control" placeholder="Building Status">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_built_year">Built Year</label>
                                                <input id="building_built_year" name="building_info[built_year]" value="{{ old('built_year', optional(json_decode($building->building_info))->built_year) }}" type="text" class="form-control" placeholder="Built Year">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_title_to_land">Title To Land</label>
                                                <input id="building_title_to_land" name="building_info[title_to_land]" value="{{ old('title_to_land', optional(json_decode($building->building_info))->title_to_land ?? '') }}" type="text" class="form-control" placeholder="Title To Land">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_type">Building Type</label>
                                                <select id="building_type" name="building_info[building_type]" class="form-control max_400">
                                                    <option value="Strata unit/Building" {{ optional(json_decode($building->building_info))->building_type == 'Strata unit/Building' ? 'selected' : '' }}>Strata unit/Building</option>
                                                    <option value="Single family/privately owned non strata Building" {{ optional(json_decode($building->building_info))->building_type == 'Single family/privately owned non strata Building' ? 'selected' : '' }}>Single family/privately owned non strata Building</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_strata_plan">Strata Plan</label>
                                                <input id="building_strata_plan" name="building_info[strata_plan]" value="{{ old('strata_plan', optional(json_decode($building->building_info))->strata_plan) }}" type="text" class="form-control" placeholder="Strata Plan">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_area">Area</label>
                                                <input id="building_area" name="building_info[area]" value="{{ old('area', optional(json_decode($building->building_info))->area) }}" type="text" class="form-control" placeholder="Area">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_subarea">Sub Area</label>
                                                <input id="building_subarea" name="building_info[subarea]" value="{{ old('subarea', optional(json_decode($building->building_info))->subarea) }}" type="text" class="form-control" placeholder="Sub Area">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_board_name">Board Name</label>
                                                <input id="building_board_name" name="building_info[board_name]" value="{{ old('board_name', optional(json_decode($building->building_info))->board_name) }}" type="text" class="form-control" placeholder="Board Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_management">Management</label>
                                                <input id="building_management" name="building_info[management]" value="{{ old('management', optional(json_decode($building->building_info))->management) }}" type="text" class="form-control" placeholder="Management">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_management_phone">Management Phone</label>
                                                <input id="building_management_phone" name="building_info[management_phone]" value="{{ old('management_phone', optional(json_decode($building->building_info))->management_phone) }}" type="text" class="form-control" placeholder="Management Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_units_in_development">Units in Development</label>
                                                <input id="building_units_in_development" name="building_info[units_in_development]" value="{{ old('units_in_development', optional(json_decode($building->building_info))->units_in_development) }}" type="text" class="form-control" placeholder="Units in Development" placeholder="Units in Development">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_units_in_strata">Units in Strata</label>
                                                <input id="building_units_in_strata" name="building_info[units_in_strata]" value="{{ old('units_in_strata', optional(json_decode($building->building_info))->units_in_strata) }}" type="text" class="form-control" placeholder="Units in Strata">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_sub_categories">Sub Categories</label>
                                                <input id="building_sub_categories" name="building_info[subcategories]" value="{{ old('subcategories', optional(json_decode($building->building_info))->subcategories) }}" type="text" class="form-control" placeholder="Sub Categories">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="building_property_types">Property Types</label>
                                              <input id="building_property_types" name="building_info[property_types]" value="{{ old('property_types', optional(json_decode($building->building_info))->property_types) }}" type="text" class="form-control" placeholder="Property Types">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box-info my-4">
                            <div class="card-header">
                                <h5>Building Contacts</h5>
                            </div>
                            <div class="card-body">
                                <div class="building_info">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_website">Official Website</label>
                                                <input id="building_website" name="building_contacts[website]" value="{{ old('website', optional(json_decode($building->building_contacts))->website) }}" type="text" class="form-control" placeholder="Official Website">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="concierge_other_name">Concierge Other Name</label>
                                                <input id="concierge_other_name" name="building_contacts[concierge_other_name]" value="{{ old('concierge_other_name', optional(json_decode($building->building_contacts))->concierge_other_name) }}" type="text" class="form-control" placeholder="Concierge Other Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="concierge_other_phone">Concierge Other Phone</label>
                                                <input id="concierge_other_phone" name="building_contacts[concierge_other_phone]" value="{{ old('concierge_other_phone', optional(json_decode($building->building_contacts))->concierge_other_phone) }}" type="text" class="form-control" placeholder="Concierge Other Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="building_contacts_management">Management</label>
                                              <input id="building_contacts_management" name="building_contacts[management]" value="{{ old('management', optional(json_decode($building->building_contacts))->management) }}" type="text" class="form-control" placeholder="Management">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="building_developer">Developer</label>
                                              <input id="building_developer" name="building_contacts[developer]" value="{{ old('developer', optional(json_decode($building->building_contacts))->developer) }}" type="text" class="form-control" placeholder="Developer">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="building_architect">Architect</label>
                                                <input id="building_architect" name="building_contacts[architect]" value="{{ old('architect', optional(json_decode($building->building_contacts))->architect) }}" type="text" class="form-control" placeholder="Architect">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box-info my-4">
                            <div class="card-header">
                                <h5>Construction Info</h5>
                            </div>
                            <div class="card-body">
                                <div class="building_info">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="year_built">Year Built</label>
                                                <input id="year_built" name="construction_info[year_built]" value="{{ old('year_built', optional(json_decode($building->construction_info))->year_built) }}" type="text" class="form-control" placeholder="Year Built">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="construction_info_levels">Levels</label>
                                                <input id="construction_info_levels" name="construction_info[levels]" value="{{ old('levels', optional(json_decode($building->construction_info))->levels) }}" type="text" class="form-control" placeholder="Levels">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="construction">Construction</label>
                                                <input id="construction" name="construction_info[construction]" value="{{ old('construction', optional(json_decode($building->construction_info))->construction) }}" type="text" class="form-control" placeholder="Construction">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rain_screen">Rain Screen</label>
                                                <input id="rain_screen" name="construction_info[rain_screen]" value="{{ old('rain_screen', optional(json_decode($building->construction_info))->rain_screen) }}" type="text" class="form-control" placeholder="Rain Screen">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="construction_info_roof">Roof</label>
                                                <input id="construction_info_roof" name="construction_info[roof]" value="{{ old('roof', optional(json_decode($building->construction_info))->roof) }}" type="text" class="form-control" placeholder="Roof">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="foundation">Foundation</label>
                                                <input id="foundation" name="construction_info[foundation]" value="{{ old('foundation', optional(json_decode($building->construction_info))->foundation) }}" type="text" class="form-control" placeholder="Foundation">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exterior_finish">Exterior Finish</label>
                                                <input id="exterior_finish" name="construction_info[exterior_finish]" value="{{ old('exterior_finish', optional(json_decode($building->construction_info))->exterior_finish) }}" type="text" class="form-control" placeholder="Exterior Finish">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box-info my-4" id="StrataProperty">
                            <div class="card-header">
                                <h5>Strata unit/building details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.suite') ? 'has-error' : '' }}">
                                            <label for="spd_suite">Suite#</label>
                                            <input id="spd_suite.suite" name="strata_property_details[suite]" value="{{ @old('strata_property_details.suite', $strata_property_details->suite) }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.address') ? 'has-error' : '' }}">
                                            <label for="spd_address">Address</label>
                                            <input id="spd_address" name="strata_property_details[address]" value="{{ @old('strata_property_details.address', $strata_property_details->address) }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.city') ? 'has-error' : '' }}">
                                            <label for="spd_city">City</label>
                                            <input id="spd_city" name="strata_property_details[city]" value="{{ @old('strata_property_details.city', $strata_property_details->city) }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.state') ? 'has-error' : '' }}">
                                            <label for="spd_state">{{ __('State / Province / Region') }}</label>
                                            <input id="spd_state" name="strata_property_details[state]" value="{{ @old('strata_property_details.state', $strata_property_details->state) }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.zip') ? 'has-error' : '' }}">
                                            <label for="spd_zip">{{ __('Postal Code') }}</label>
                                            <input id="spd_zip" name="strata_property_details[zip]" value="{{ @old('strata_property_details.zip', $strata_property_details->zip) }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-control-wrap {{ $errors->has('strata_property_details.country') ? 'has-error' : '' }}">
                                            <label for="spd_country">Country</label>
                                            <select id="spd_country" class="form-control" name="strata_property_details[country]">
                                                <option value="">Select Country*</option>
                                                @php
                                                    $sel_country = @old('strata_property_details.country', $strata_property_details->country ?? 'CA');
                                                @endphp
                                                @foreach (Countries() as $country)
                                                    <option value="{{ $country->iso }}" {{ $sel_country == $country->iso ? 'selected' : '' }}>{{ $country->nicename }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.strata_management_company') ? 'has-error' : '' }}">
                                            <label for="spd_strata_management_company">Strata management company</label>
                                            <input id="spd_strata_management_company" name="strata_property_details[strata_management_company]" value="{{ @old('strata_property_details.strata_management_company', $strata_property_details->strata_management_company) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.strata_manager_name') ? 'has-error' : '' }}">
                                            <label for="spd_strata_manager_name">Strata manager's name</label>
                                            <input id="spd_strata_manager_name" name="strata_property_details[strata_manager_name]" value="{{ @old('strata_property_details.strata_manager_name', $strata_property_details->strata_manager_name) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.strata_manager_phone_number') ? 'has-error' : '' }}">
                                            <label for="spd_strata_manager_phone_number">Strata manager's phone number</label>
                                            <input id="spd_strata_manager_phone_number" name="strata_property_details[strata_manager_phone_number]" value="{{ @old('strata_property_details.strata_manager_phone_number', $strata_property_details->strata_manager_phone_number) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.plan_num') ? 'has-error' : '' }}">
                                            <label for="spd_plan_num">Strata Plan No</label>
                                            <input id="spd_plan_num" name="strata_property_details[plan_num]" value="{{ @old('strata_property_details.plan_num', $strata_property_details->plan_num) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.lot_num') ? 'has-error' : '' }}">
                                            <label for="spd_lot_num">Strata Lot Number</label>
                                            <input id="spd_lot_num" name="strata_property_details[lot_num]" value="{{ @old('strata_property_details.lot_num', $strata_property_details->lot_num) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.civic') ? 'has-error' : '' }}">
                                            <label for="spd_civic">Civic Address of the Property</label>
                                            <input id="spd_civic" name="strata_property_details[civic]" value="{{ @old('strata_property_details.civic', $strata_property_details->civic) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.building_manager_name') ? 'has-error' : '' }}">
                                            <label for="spd_building_manager_name">Building manager's name</label>
                                            <input id="spd_building_manager_name" name="strata_property_details[building_manager_name]" value="{{ @old('strata_property_details.building_manager_name', $strata_property_details->building_manager_name) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.bm_phone_number') ? 'has-error' : '' }}">
                                            <label for="spd_bm_phone_number">Building manager's phone number</label>
                                            <input id="spd_bm_phone_number" name="strata_property_details[bm_phone_number]" value="{{ @old('strata_property_details.bm_phone_number', $strata_property_details->bm_phone_number) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.concierge_phone') ? 'has-error' : '' }}">
                                            <label for="spd_concierge_phone">Concierge's phone number</label>
                                            <input id="spd_concierge_phone" name="strata_property_details[concierge_phone]" value="{{ @old('strata_property_details.concierge_phone', $strata_property_details->concierge_phone) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.parking') ? 'has-error' : '' }}">
                                            <label for="spd_parking">Parking stall number/numbers</label>
                                            <input id="spd_parking" name="strata_property_details[parking]" value="{{ @old('strata_property_details.parking', $strata_property_details->parking) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.location_parking') ? 'has-error' : '' }}">
                                            <label for="spd_location_parking">Location of parking</label>
                                            <input id="spd_location_parking" name="strata_property_details[location_parking]" value="{{ @old('strata_property_details.location_parking', $strata_property_details->location_parking) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.storage_locker') ? 'has-error' : '' }}">
                                            <label for="spd_storage_locker">Storage locker number/numbers</label>
                                            <input id="spd_storage_locker" name="strata_property_details[storage_locker]" value="{{ @old('strata_property_details.storage_locker', $strata_property_details->storage_locker) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.location_storage') ? 'has-error' : '' }}">
                                            <label for="spd_location_storage">Location of the storage</label>
                                            <input id="spd_location_storage" name="strata_property_details[location_storage]" value="{{ @old('strata_property_details.location_storage', $strata_property_details->location_storage) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('strata_property_details.amenities') ? 'has-error' : '' }}">
                                            <label for="spd_amenities">Location of the amenities</label>
                                            <input id="spd_amenities" name="strata_property_details[amenities]" value="{{ @old('strata_property_details.amenities', $strata_property_details->amenities) ?? '' }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box-info my-4">
                            <div class="card-header">
                                <h5>Location</h5>
                            </div>
                            <div class="card-body">
                                <div class="location">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Full Building Address</label>
                                                <input id="autocomplete" onkeyup="initAutocomplete(this.id)" name="location[address]" class="form-control" placeholder="Enter your address" onFocus="geolocate()" type="text" autocomplete="off" value="{{ old('address', optional(json_decode($building->location))->address) }}" />
                                            </div>
                                            <div id="map_canvas" style="width: 100%; height: 400px;margin-bottom:20px"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="st_address">Street Address</label>
                                                <input class="form-control" name="location[st_address]" id="st_address" value="{{ old('st_address', optional(json_decode($building->location))->st_address) }}" type="text" placeholder="Street Address">
                                                <span class="full_address">Excluding city, province, and postal code</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input class="form-control" name="location[country]" id="country" value="{{ old('country', optional(json_decode($building->location))->country) }}" type="text" placeholder="Country">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input class="form-control" name="location[state]" id="state" value="{{ old('state', optional(json_decode($building->location))->state) }}" type="text" placeholder="State">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input class="form-control" name="location[city]" id="city" value="{{ old('city', optional(json_decode($building->location))->city) }}" type="text" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="neighborhood">Neighborhood</label>
                                                <input class="form-control" name="location[neighborhood]" id="neighborhood" value="{{ old('neighborhood', optional(json_decode($building->location))->neighborhood) }}" type="text" placeholder="Neighborhood">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="zip">{{ __('Postal Code') }}</label>
                                                <input class="form-control" name="location[zip]" id="zip" value="{{ old('zip', optional(json_decode($building->location))->zip) }}" type="text" placeholder="ZIP / Postal Code">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="seo_title">Latitude</label>
                                                <input class="form-control" name="location[lat]" id="lat" value="{{ old('lat', optional(json_decode($building->location))->lat) }}" type="text" placeholder="Latitude">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="long">Longitude</label>
                                                <input class="form-control" name="location[lng]" id="long" value="{{ old('lng', optional(json_decode($building->location))->lng) }}" type="text" placeholder="Longitude">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box-info my-4">
                            <div class="card-header">
                                <h5>Strata bylaws/building related documents</h5>
                            </div>
                            <div class="card-body">
                                <div class="file-drop-area-wrap my-3">
                                    <div class="file-drop-area">
                                        <span class="choose-file-button">Choose Files</span>
                                        <span class="file-message">or drag and drop files here to upload the current bylaws. (pdf, jpg, png, gif)</span>
                                        <input type="file" class="file-input" name="building_strata_documents[]" accept=".jpg,.jpeg,.png,.gif,.pdf" multiple>
                                    </div>
                                    <div class="divImageMediaPreview">
                                        @if (isset($building) && !empty($building->documents))
                                            @foreach ($building->documents as $strata_document)
                                                <span class="pip">
                                                    <a href="{{ url('uploads/buildings/' . $building->id . '/building_strata_documents/' . $strata_document->url) }}" data-lity data-lity-desc="{{ $strata_document->url }}">
                                                        @if (pathinfo($strata_document->url, PATHINFO_EXTENSION) == 'pdf')
                                                            <img class="imageThumb" src="{{ asset('img/pdf-icon.png') }}">
                                                        @else
                                                            <img class="imageThumb" src="{{ url('uploads/buildings/' . $building->id . '/building_strata_documents/thumbs/' . $strata_document->url) }}">
                                                        @endif
                                                    </a>
                                                    <span class="selFileLive" data-id="{{ $strata_document->id }}" title="Click to remove"><i class="fa fa-trash"></i></span>
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card box-info my-4">
                            <div class="card-header">
                                <h5>Building photos</h5>
                            </div>
                            <div class="card-body">
                                <div class="file-drop-area-wrap my-3">
                                    <div class="file-drop-area">
                                        <span class="choose-file-button">Choose Files</span>
                                        <span class="file-message">or drag and drop files here to upload any building photos you have available. We do take our own photos, but having photos sooner allows us to expedite the rental process. (jpg, png, gif)</span>
                                        <input type="file" class="file-input" name="building_photos[]" accept=".jpg,.jpeg,.png,.gif" multiple>
                                    </div>
                                    <div class="divImageMediaPreview">
                                        @if (isset($building) && !empty($building->photos))
                                            @foreach ($building->photos as $building_photo)
                                                <span class="pip">
                                                    <a href="{{ url('uploads/buildings/' . $building->id . '/' . $building_photo->url) }}" data-lity data-lity-desc="{{ $building_photo->url }}">
                                                        <img class="imageThumb" src="{{ url('uploads/buildings/' . $building->id . '/building_photos/thumbs/' . $building_photo->url) }}">
                                                    </a>
                                                    <span class="selFileLive" data-id="{{ $building_photo->id }}" title="Click to remove"><i class="fa fa-trash"></i></span>

                                                    @php
                                                        $isFeatured = ($building_photo->featured == '1');
                                                    @endphp

                                                    <span class="make_featured" data-id="{{ $building_photo->id }}" data-prop_id="{{ $building->id }}" data-user_id="{{ $building->user_id }}" title="{{ $isFeatured ? 'Featured Image' : 'Make Featured Image' }}">
                                                        <i class="{{ $isFeatured ? 'fas' : 'far' }} fa-heart"></i>
                                                    </span>
                                                </span>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box-info my-4">
                            <div class="card-header">
                                <h5>SEO Data</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="seo_title">SEO Title</label>
                                    <input class="form-control" name="seo_data[seo_title]" id="seo_title" placeholder="Enter SEO Building Title" value="{{ old('seo_title', optional(json_decode($building->seo_data))->seo_title) }}" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="seo_desc">SEO Description</label>
                                    <textarea class="form-control" id="seo_desc" rows="4" name="seo_data[seo_desc]" placeholder="SEO Description">{{ old('seo_desc', optional(json_decode($building->seo_data))->seo_desc) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="seo_keywords">SEO Keywords</label>
                                    <input class="form-control" name="seo_data[seo_keywords]" id="seo_keywords" placeholder="Enter SEO Keywords" value="{{ old('seo_keywords', optional(json_decode($building->seo_data))->seo_keywords) }}" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="card box-info my-4">
                            <div class="card-header">
                                <h5>Custom Tags</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="custom_head_script">Custom Head Tag Code</label>
                                    <textarea class="form-control" name="custom_tags[custom_head_script]" id="custom_head_script" placeholder="Custom Head Tag Code">{{ old('custom_head_script', optional(json_decode($building->custom_tags))->custom_head_script) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="custom_footer_script">Custom Footer Tag Code</label>
                                    <textarea class="form-control" name="custom_tags[custom_footer_script]" id="custom_footer_script" placeholder="Enter SEO Keywords">{{ old('custom_footer_script', optional(json_decode($building->custom_tags))->custom_footer_script) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3">
                <div class="card box-primary">
                    <div class="card-header building_details">
                        <h5>Building Details</h5>
                    </div>

                    <div class="card-body px-2">
                        <div class="form-group">
                            <div class="form-check  md-form-inline-check">
                                <input class="form-check-input filled-in" name="featured" value="1" id="featured" type="checkbox" {{ $building->featured == 'yes' ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">Make Featured Building </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="avg_sqft_rate">Avg $/sqft</label>
                                    <input id="avg_sqft_rate" name="avg_sqft_rate" value="{{ optional($building)->avg_sqft_rate }}" type="text" onkeyup="this.value = this.value.replace(/[^0-9.]/g, '');" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="avg_strata_fee">Avg Strata Fees</label>
                                    <input id="avg_strata_fee" name="avg_strata_fee" value="{{ optional($building)->avg_strata_fee }}" type="text" onkeyup="this.value = this.value.replace(/[^0-9.]/g, '');" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="other_buildings_in_complex" class="mb-1">Other Buildings in Complex</label>
                            <select class="form-control max_400 select2 select_status" class="form-control" name="other_buildings_in_complex[]" multiple>
                                <option value="">------ Select ------</option>
                                @foreach ($buildingObjs ?? [] as $buildingObj)
                                <option value="{{ $buildingObj->id }}">{{ $buildingObj->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-0">Strata ByLaws</label>
                            <hr class="mt-1 mb-1"/>
                            @php
                                $StrataByLaws = ["animals" => "Animals - PETS ALLOWED", "rental" => "Rental - RENTALS ALLOWED"];
                            @endphp

                            @foreach($StrataByLaws as $key => $value)
                            <div class="maintenance_item">
                                <div class="form-check md-form-inline-check">
                                    <input class="form-check-input filled-in" name="strata_by_laws[{{$key}}]" value="1" id="strata_by_laws_{{$key}}" type="checkbox" {{ optional(json_decode($building->strata_by_laws))->$key == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label lebal_font_weight" style="font-size: small;" for="strata_by_laws_{{$key}}"> {{ $value }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-0">Pets Restrictions</label>
                            <hr class="mt-1 mb-1"/>
                            <div class="row">
                                @php
                                    $petRestrictions = [
                                        'pets' => 'Pets Allowed',
                                        'dogs' => 'Dogs Allowed',
                                        'cats' => 'Cats Allowed',
                                    ];
                                @endphp
                                @foreach($petRestrictions as $key => $label)
                                    <div class="form-group mb-2" style="display: flex; align-items: center;">
                                        <div class="col-md-6 pr-0">
                                            <label for="pets_restrictions_{{ $key }}" style="font-size: small;">{{ $loop->iteration }}. {{ $label }}</label>
                                        </div>
                                        <div class="col-md-6 pl-0">
                                            @if($key === 'pets')
                                                <input id="pets_restrictions_{{ $key }}" name="pets_restrictions[{{ $key }}]" value="{{ optional(json_decode($building->pets_restrictions))->$key }}" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Pets Allowed">
                                            @else
                                                <select id="pets_restrictions_{{ $key }}" name="pets_restrictions[{{ $key }}]" class="form-control">
                                                    <option value="" selected>Please Select</option>
                                                    <option value="Yes" {{ optional(json_decode($building->pets_restrictions))->$key == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="No" {{ optional(json_decode($building->pets_restrictions))->$key == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-0">Maintenance Fee Includes</label>
                            <hr class="mt-1 mb-1"/>
                            @php
                            $MaintenanceFeeIncludes = [
                                "caretaker" => "Caretaker",
                                "garbage_pickup" => "Garbage Pickup",
                                "gardening" => "Gardening",
                                "gas" => "Gas",
                                "hot_water" => "Hot Water",
                                "management" => "Management",
                                "recreation_facility" => "Recreation Facility"
                            ];
                            @endphp

                            @foreach($MaintenanceFeeIncludes as $key => $maintenance)
                            <div class="maintenance_item">
                                <div class="form-check md-form-inline-check">
                                    <input class="form-check-input filled-in" name="maintenance_fee_includes[{{$key}}]" value="1" id="maintenance_fee_includes_{{$key}}" type="checkbox" {{ optional(json_decode($building->maintenance_fee_includes))->$key == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label lebal_font_weight" for="maintenance_fee_includes_{{$key}}">{{ $maintenance }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-0">Amenities</label>
                            <hr class="mt-1 mb-1"/>
                            @php $amenities = [
                                "bike_room" => "Bike Room",
                                "exercise_centre" => "Exercise Centre",
                                "in_suite_laundry" => "In-suite Laundry",
                                "indoor_pool" => "Indoor Pool",
                                "sauna" => "Sauna/ Steam Room",
                                "hot_tub" => "Swirlpool/ Hot Tub"
                            ];
                            @endphp
                            @foreach($amenities as $key => $amenity)
                            <div class="feature_item">
                                <div class="form-check md-form-inline-check">
                                    <input class="form-check-input filled-in" name="amenities[{{$key}}]" value="1" id="amenities_{{$key}}" type="checkbox" {{ optional(json_decode($building->amenities))->$key == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label lebal_font_weight" for="amenities_{{$key}}"> {{ $amenity }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="other_amenities" class="mb-1">Other Amenities Information</label>
                            <textarea class="form-control max_600" name="other_amenities" id="other_amenities" placeholder="Other Amenities: comma seperated values" role="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-0">Features</label>
                            <hr class="mt-1 mb-1"/>
                            @php
                                $features = [
                                    "bike_room" => "Bike Room",
                                    "exercise_centre" => "Exercise Centre",
                                    "in_suite_laundry" => "In-suite Laundry",
                                    "indoor_pool" => "Indoor Pool",
                                    "sauna" => "Sauna",
                                    "hot_tub" => "Hot Tub",
                                    "underground_secure_parking" => "Underground Secure Parking",
                                    "open_floor_plan" => "Open Floor Plan",
                                    "high_ceilings" => "High Ceilings",
                                    "granite_countertops" => "Granite Countertops",
                                    "crown_mouldings" => "Crown Mouldings",
                                    "gas_fireplace" => "Gas Fireplace",
                                    "balcony" => "Balcony",
                                    "storage_locker" => "Storage Locker"
                                ];
                            @endphp
                            @foreach($features as $key => $feature)
                            <div class="feature_item">
                                <div class="form-check md-form-inline-check">
                                    <input class="form-check-input filled-in" name="features[{{$key}}]" value="1" id="features_{{$key}}" type="checkbox" {{ optional(json_decode($building->features))->$key == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label lebal_font_weight" for="features_{{$key}}">{{ $feature }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-1">Featured Image</label>
                            <img id="featured_img" style="max-width: 100%;border: 1px solid #bbb;padding: 5px;margin-bottom: 20px;" src="{{ isset($building->featured_image['url']) ? asset('uploads/buildings/' . $building->id . '/building_photos/thumbs/' . $building->featured_image['url']) : asset('images/bolld-placeholder.png') }}">
                            <input type="file" name="featured_image" id="featured_image" style="display: none;">
                        </div>

                        @if (auth()->user()->hasAnyRole('Administrator', 'Agent', 'Property Manager'))
                            <h6 class="mb-1">Status</h6>
                            <label class="c-switch c-switch-label c-switch-primary">
                                <input class="c-switch-input" type="checkbox" value="1" name="status" is="status" {{ optional($building)->status == 'active' ? 'checked' : '' }}>
                                <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                            </label>
                        @else
                            <input type="hidden" name="status" value="{{ optional($building)->status }}">
                        @endif

                    </div>
                    <div class="card-footer">
                        @if (isset($building) && $building->last_edited)
                            <p><em>Last updated by: {{ getUserByID(optional($building)->last_edited)->name }}</em></p>
                        @endif
                        <button type="submit" class="btn-lg btn-primary btn-block" id="submit_property_btn">{{ optional($building)->id ? 'Update' : 'Submit' }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('after-scripts')
    <script src="{{ asset('js/autoCompleteAddress.js') }}"></script>
    <script>
        var selDivStrata = selDivPhotos = "";
        var storedFiles = [];
        var storedPhotos = [];
        $('input, textarea, select').on('keyup keydown change blur', function(e) {
            $('input[type="submit"]').removeAttr('disabled');
            $('button[type="submit"]').removeAttr('disabled');
        });

        jQuery(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            showHideOccTenantInfo();
            showHideStrataDetails();
            $("input[name='occupancy_status']").click(function() {
                showHideOccTenantInfo();
            });
            $('#prop_type').on('change', function() {
                showHideStrataDetails();
            });
        });

        function showHideOccTenantInfo() {
            var occupancy_status = $("input[name='occupancy_status']:checked").val();
            if (occupancy_status == 'tenant') {
                $('#OccupancyTenantInfo').show();
            } else {
                $('#OccupancyTenantInfo').hide();
            }
        }

        function showHideStrataDetails() {
            var prop_type = $("#prop_type").val();
            if (prop_type == 'Strata unit/property') {
                $('#StrataProperty').show();
            } else {
                $('#StrataProperty').hide();
            }
        }

        @if (isset($building->id))
            $('.make_featured').on('click', function() {
                var file_id = $(this).data("id");
                var prop_id = $(this).data("prop_id");
                var user_id = $(this).data("user_id");
                var type = 'building_photos';
                var item = $(this);
                if (confirm("Are you sure?\nwant to Make Featured ")) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route(rolebased() .'.properties.makeFeatured', $building) }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "file_id": file_id,
                            "prop_id": prop_id,
                            "user_id": user_id,
                            "type": type
                        },
                        success: function(data) {
                            console.log('data_img', data);
                            $("#featured_img").attr('src', data);
                            $(".make_featured").html('<i class="far fa-heart"></i>');
                            item.html('<i class="fas fa-heart"></i>');
                        }
                    });
                }
                return false;
            });
        @endif

        window.onload = function() {
            var map;
            function initialize() {
                var myLatlng = new google.maps.LatLng({{ @$lat_long }});
                var myOptions = {
                    zoom: {{ $zoom }},
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                var geocoder = new google.maps.Geocoder();
                var marker = new google.maps.Marker({
                    draggable: true,
                    position: myLatlng,
                    map: map,
                    title: "Building location"
                });
                google.maps.event.addListener(marker, 'dragend', function(event) {
                    document.getElementById("lat").value = event.latLng.lat();
                    document.getElementById("long").value = event.latLng.lng();
                    geocoder.geocode({
                        'latLng': event.latLng
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            /*if (results[0]) {
                                document.getElementById("title").value = results[0].formatted_address;
                                document.getElementById("slug").value = convertToSlug(results[0].formatted_address);
                            }*/
                            city = country = postal_code = neighborhood = st_address = street_number = '';
                            results.forEach(function(element) {
                                element.address_components.forEach(function(element2) {
                                    element2.types.forEach(function(element3) {
                                        switch (element3) {
                                            case 'postal_code':
                                                postal_code = element2.short_name;
                                                break;
                                            case 'administrative_area_level_1':
                                                state = element2.long_name;
                                                break;
                                            case 'locality':
                                                city = element2.long_name;
                                                break;
                                            case 'country':
                                                country = element2.long_name;
                                                break;
                                            case 'neighborhood':
                                                neighborhood = element2.long_name;
                                                break;
                                            case 'route':
                                                st_address = element2.long_name;
                                                break;
                                            case 'street_number':
                                                street_number = element2.long_name;
                                                break;
                                        }
                                    })
                                });
                            });
                            document.getElementById("autocomplete").value = results[0].formatted_address;
                            document.getElementById("st_address").value = street_number + ' ' + st_address;
                            document.getElementById("neighborhood").value = neighborhood;
                            document.getElementById("city").value = city;
                            document.getElementById("state").value = state;
                            document.getElementById("country").value = country;
                            document.getElementById("zip").value = postal_code;
                        }
                    });
                    //infoWindow.open(map, marker);
                });
            }
            google.maps.event.addDomListener(window, "load", initialize());
        }

        $('.selFileLive').on('click', function() {
            var file_id = $(this).data("id");
            $element = $(this).parent('.pip');
            if (confirm("Are you sure?\nwant to Remove ")) {
                $.ajax({
                    method: "DELETE",
                    url: "{{ route(rolebased() .'.buildings.removeBuildingMedia', ['id' => ':id']) }}".replace(':id', file_id),
                    data: {"_token": "{{ csrf_token() }}", "_method": "DELETE"},
                    success: function(data) {
                        $element.remove();
                    }
                });
            }
            return false;
        });
    </script>
@endpush
