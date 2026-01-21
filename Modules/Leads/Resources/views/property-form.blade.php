@extends('frontend.layouts.app')
@section('title', __('Property Management Application'))
@push('after-styles')
<link rel="stylesheet" href="{{ asset('css/pma/style-form.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/pma/style.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('css/pma/mdb.min.css') }}">
<style>
    .panel .panel-body { padding: 20px; }
    .panel.panel-default.page-inner { border-radius: 10px !important; background-color: #fff; }
    button.btn { line-height: initial; padding: 7px 15px !important; height: auto !important; }
    .btn {
        color: var(--bs-btn-color) !important;
        box-shadow: unset !important;
    }
    .navbar .dropdown-menu a {
        color: var(--bs-dropdown-link-color) !important;
    }
</style>
    <style>
        input[type="file"] {display: block;}
        .files_inner {padding: 0px 0px 20px; background: #f8f8f8;}
        .imageThumb {max-height: 114px; border: 2px solid; padding: 1px; cursor: pointer; height: 100%; width: 150px;}
        .pip {display: inline-block; margin: 10px 10px 0 0; height: 125px; width: 150px; position: relative;}
        .selFile, .selFileLive {display: block; background: rgba(0, 0, 0, 0.5); color: white; text-align: center; cursor: pointer; position: absolute; top: 0; right: 0; width: 24px; height: 24px;}
        .remove:hover {background: red; color: #fff;}
        #files.md2-form {margin: 0px 0;}
        /* .md2-form input[type="file"]+label {border: 2px dashed red; padding: 40px 10px 45px; background: #f6f6f6;} */
        .wysihtml5-toolbar li a {margin: 0;}
        .wysihtml5-toolbar .btn-default { background-color: #fff !important; color: #666 !important; box-shadow: none; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;}
        .glyphicon {font-family: 'Glyphicons Halflings' !important;}
        .mce-branding {display: none !important;}
        .md-form.required label::before {display: none;}
        [type="checkbox"]+label {padding-right: 30px;}
        .w-100 {width: 100%;}
        .form-submit button{margin-top: 1em; color: #FFFFFF;}
        .form-floating > .form-select {padding-top: 1.5rem; padding-bottom: 0.5rem;}
        @media (max-width:768px) {#field_id_30+label {font-size: 12px !important;}}
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title text-center"><strong>PMA</strong> Property Information</h1>
                <div class="panel panel-default page-inner success-msg">
                    @if(session('status'))
                        <div id="pmaupdate_msg" class="alert alert-success text-center" role="alert" style="margin: 0rem 0rem 2rem; padding: 2rem;">
                            <h4 class="alert-heading text-capitalize">@php nl2br(session('status')); @endphp</h4>
                            <p class="text-capitalize">Property Management Agreement completed, a copy has been sent to your email, please complete the following questionnaire, we look forward to working with you!</p>
                        </div>
                    @endif
                    <div id="propertyupdate_msg" class="alert alert-success text-center " role="alert" style="padding: 2rem; display: none;">
                        <h4 class="alert-heading text-capitalize">Property Info Submitted!</h4>
                        <p class="text-capitalize">Thank you for trusting in our services.</p>
                    </div>
                    <div class="panel-body">
                        @php
                            if($data){
                                $located_3 = json_decode(unserialize($data->located_3));
                                $manage_p_at_9 = json_decode(unserialize($data->manage_p_at_9));
                                $items_inc_17 = json_decode(unserialize($data->items_inc_17), true);
                                $reg_own_23 = json_decode(unserialize($data->reg_own_23));
                                $re_reg_own_28 = json_decode(unserialize($data->re_reg_own_28));
                                $ac_holder_30 = json_decode(unserialize($data->ac_holder_30));
                            }
                            if($property){
                                $strata_property_details = json_decode($property->strata_property_details, true);
                                $way_to_contact = json_decode($property->way_to_contact, true);
                            }else {
                                $strata_property_details = [];
                                $way_to_contact = [];
                            }
                        @endphp
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (!empty($data->pro_status) && $data->pro_status == 1)
                            <div id="propertyupdate_msg" class="alert alert-danger text-center" role="alert" style="margin: 0rem 0rem 2rem; padding: 2rem;">
                                <h4 class="alert-heading text-capitalize">Property Info already Submitted!</h4>
                                <p class="text-capitalize">Please login to your account to edit the property information.</p>
                            </div>
                        @else
                            <form id="pmaForm" class="form-horizontal form-validate" method="POST" action="{{ route('pma.propertyInfo', ['account_id' => $account_id, 'user_id' => Crypt::encryptString($data->user_id), 'id' => Crypt::encryptString($data->id)]) }}" enctype="multipart/form-data">
                                @csrf
                                @if(!empty($data->id))
                                    <input type="hidden" name="id" value="{{ @$data->id }}">
                                    <input type="hidden" name="ip" value="{{ $ip }}">
                                    <input type="hidden" name="source" value="pma">
                                    <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                                    <input type="hidden" name="form_id" value="{{ $data->id }}">
                                    <input type="hidden" name="address" value="{{ $property->address }}">
                                    <input type="hidden" name="prop_id" value="{{ $property->id }}">
                                @endif
                                <h4 class="mb-2">Property Information</h4>
                                <hr class="mt-0"/>
                                <p>Please fill out the form below to help us serve you in the most efficient way. The information will help us to market your property and provide your tenants with all the necessary details.</p>
                                <p>Please do not worry if you do not know answers to any of the questions. Most of the questions are optional. We just ask that you answer the questions to the best of your knowledge. <span id="StrataProperty_text">If you do not have a copy of the building bylaws now, please kindly request for a copy of the latest bylaw and email it to <a href="mailto:info@forrentcentral.com">info@forrentcentral.com</a></span></p>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-6 mb-3">
                                            <div class="form-floating required {{ $errors->has('first_name_1') ? 'has-error' : '' }}">
                                                <input id="field_id_1" name="first_name_1" value="{{ old('first_name_1', $data->fName_1 ?? '') }}" type="text" class="form-control" placeholder="">
                                                <label for="field_id_1">First Name</label>
                                                @if ($errors->has('first_name_1'))<span class="text-danger">{{ $errors->first('first_name_1') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-floating required {{ $errors->has('last_name_1') ? 'has-error' : '' }}">
                                                <input id="field_id_2" name="last_name_1" value="{{ old('last_name_1', $data->lName_2 ?? '') }}" type="text" class="form-control" placeholder="">
                                                <label for="field_id_2">Last Name</label>
                                                @if ($errors->has('last_name_1'))<span class="text-danger">{{  $errors->first('last_name_1') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6 mb-3">
                                            <div class="form-floating required {{ $errors->has('phone_1') ? 'has-error' : '' }}">
                                                <input id="field_id_3" name="phone_1" value="{{ old('phone_1', @$data->phone_4 ?? '') }}" type="text" class="form-control" placeholder="">
                                                <label for="field_id_3">Phone</label>
                                                @if ($errors->has('phone_1'))<span class="text-danger">{{ $errors->first('phone_1') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-floating required {{ $errors->has('email_1') ? 'has-error' : '' }}">
                                                <input id="field_id_4" name="email_1" value="{{ old('email_1', @$data->email_5 ?? '') }}" type="email" class="form-control" required="required" placeholder="">
                                                <label for="field_id_4">Email</label>
                                                @if ($errors->has('email_1'))<span class="text-danger">{{ $errors->first('email_1') }}</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--What is the best way to contact you?-->
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <h4 class="mb-2">What is the best way to contact you?</h4>
                                            <hr class="mt-0"/>
                                            @php
                                                $wayContacts = ['phone' => 'Phone', 'text' => 'Text', 'email' => 'E-mail', 'whatsapp' => 'whatsApp', 'wechat' => 'weChat', 'other' => 'Other'];
                                            @endphp
                                            @foreach ($wayContacts as $key => $wayContact)
                                                <div class="utility_item">
                                                    <div class="form-check  md-form-inline-check">
                                                        <input class="form-check-input filled-in" name="way_to_contact[{{ $key }}]" value="1" id="way_to_contact_{{ $key }}" type="checkbox" @if(old('way_to_contact.'.$key, @$way_to_contact[$key]) == "1" ) checked @endif>
                                                        <label class="form-check-label" for="way_to_contact_{{ $key }}"> Via {{ $wayContact }}</label>
                                                    </div>
                                                    @if($key == 'other')
                                                    <div class="md-form-inline">
                                                        <input type="text" id="way_to_contact_12" name="way_to_contact[other_way]" value="{{ old('way_to_contact.other_way', @$way_to_contact['other_way'] ?? '') }}" class="form-control" placeholder="">
                                                    </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                            <h4 class="mb-2">Alternative Contact Person</h4>
                                            <hr class="mt-0"/>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input id="way_to_contact_alt_contact_name" placeholder="" name="way_to_contact[alt_contact_name]" value="{{ old('way_to_contact.alt_contact_name', @$way_to_contact['alt_contact_name'] ?? '') }}" type="text" class="form-control">
                                                        <label for="way_to_contact_alt_contact_name">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input id="way_to_contact_alt_contact_phone" placeholder="" name="way_to_contact[alt_contact_phone]" value="{{ old('way_to_contact.alt_contact_phone', @$way_to_contact['alt_contact_phone'] ?? '') }}" type="text" class="form-control">
                                                        <label for="way_to_contact_alt_contact_phone">Phone number</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--What is the best way to contact you?-->
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <h4 class="mb-2">Property Type</h4>
                                            <hr class="mt-0"/>
                                            <div class="form-floating require {{ $errors->has('prop_type') ? 'has-error' : '' }}">
                                                <select class="form-select" id="prop_type"  name="prop_type" aria-placeholder="">
                                                    <option value="Strata unit/property" {{ @$data->prop_type == 'Strata unit/property' ? 'selected' : '' }}>Strata unit/property</option>
                                                    <option value="Single family/privately owned non strata property" {{ @$data->prop_type == 'Single family/privately owned non strata property' ? 'selected' : '' }}>Single family/privately owned non strata property</option>
                                                </select>
                                                <label for="prop_type">Property Type</label>
                                            </div>
                                            <small>Please enter the type of your property. Whether it is a property which is part of a strata corporation or it is a privately owned property which is not part of a strata.</small>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <h4 class="mb-2">Current Strata Fees Paying</h4>
                                            <hr class="mt-0"/>
                                            <div class="form-floating required {{ $errors->has('strata_fees_paying') ? 'has-error' : '' }}">
                                                <input id="strata_fees_paying" name="strata_fees_paying" value="{{ old('strata_fees_paying', @$property->strata_fees_paying) }}" type="number" class="form-control" placeholder="">
                                                <label for="strata_fees_paying">How much do you currently pay for your strata fees per month?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-2">Strata Unit/Property Details</h4>
                                <hr class="mt-0"/>
                                <div class="form-group mb-2" id="StrataProperty">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.suite') ? 'has-error' : '' }}">
                                                <input id="field_id_5" placeholder="" name="strata_property_details[suite]" value="{{ old('strata_property_details.suite', @$strata_property_details['suite']) ??  (!empty($manage_p_at_9) ? $manage_p_at_9[0] : '') }}" type="text" class="form-control">
                                                <label for="field_id_5">Suite#</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating {{ $errors->has('strata_property_details.address') ? 'has-error' : '' }}">
                                                <input id="field_id_6" placeholder="" name="strata_property_details[address]" value="{{ old('strata_property_details.address', @$strata_property_details['address']) ?? (!empty($manage_p_at_9) ? $manage_p_at_9[1] : '') }}" type="text" class="form-control">
                                                <label for="field_id_6">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.city') ? 'has-error' : '' }}">
                                                <input id="field_id_7" placeholder="" name="strata_property_details[city]" value="{{ old('strata_property_details.city', @$strata_property_details['city']) ?? (!empty($manage_p_at_9) ? $manage_p_at_9[2] : '') }}" type="text" class="form-control">
                                                <label for="field_id_7">City</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.state') ? 'has-error' : '' }}">
                                                <input id="field_id_8" placeholder="" name="strata_property_details[state]" value="{{ old('strata_property_details.state', @$strata_property_details['state']) ?? (!empty($manage_p_at_9) ? $manage_p_at_9[3] : '') }}" type="text" class="form-control">
                                                <label for="field_id_8">State / Province / Region</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.zip') ? 'has-error' : '' }}">
                                                <input id="field_id_9" placeholder="" name="strata_property_details[zip]" value="{{ old('strata_property_details.zip', @$strata_property_details['zip']) ?? (!empty($manage_p_at_9) ? $manage_p_at_9[4] : '') }}" type="text" class="form-control">
                                                <label for="field_id_9">ZIP / Postal Code</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.country') ? 'has-error' : '' }}">
                                                <select id="field_id_10" class="form-select" name="strata_property_details[country]" aria-label="Floating label select">
                                                    <option value="">Select Country*</option>
                                                    <?php
                                                        $sel_country = old('strata_property_details.country', @$strata_property_details['country']) ??  '';
                                                        if(empty($sel_country)){
                                                            $sel_country = 'CA';
                                                        }
                                                    ?>
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->iso }}" {{ $sel_country==$country->iso ? 'selected' : '' }} >{{ $country->nicename }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="field_id_10">Country</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.strata_management_company') ? 'has-error' : '' }}">
                                                <input id="field_id_11" placeholder="" name="strata_property_details[strata_management_company]" value="{{ @old('strata_property_details.strata_management_company', $strata_property_details['strata_management_company']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_11">Strata Management Company</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.strata_manager_name') ? 'has-error' : '' }}">
                                                <input id="field_id_12" placeholder="" name="strata_property_details[strata_manager_name]" value="{{ @old('strata_property_details.strata_manager_name', $strata_property_details['strata_manager_name']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_12">Strata Manager's Name</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.strata_manager_phone_number') ? 'has-error' : '' }}">
                                                <input id="field_id_13" placeholder="" name="strata_property_details[strata_manager_phone_number]" value="{{ @old('strata_property_details.strata_manager_phone_number', $strata_property_details['strata_manager_phone_number']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_13">Strata Manager's Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.building_manager_name') ? 'has-error' : '' }}">
                                                <input id="field_id_14" placeholder="" name="strata_property_details[building_manager_name]" value="{{ @old('strata_property_details.building_manager_name', $strata_property_details['building_manager_name']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_14">Building Manager's Name</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.bm_phone_number') ? 'has-error' : '' }}">
                                                <input id="field_id_15" placeholder="" name="strata_property_details[bm_phone_number]" value="{{ @old('strata_property_details.bm_phone_number', $strata_property_details['bm_phone_number']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_15">Building Manager's Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.concierge_phone') ? 'has-error' : '' }}">
                                                <input id="field_id_16" placeholder="" name="strata_property_details[concierge_phone]" value="{{ @old('strata_property_details.concierge_phone', $strata_property_details['concierge_phone']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_16">Concierge's Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.parking') ? 'has-error' : '' }}">
                                                <input id="field_id_17" placeholder="" name="strata_property_details[parking]" value="{{ @old('strata_property_details.parking', $strata_property_details['parking']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_17">Parking Stall Number(s)</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.location_parking') ? 'has-error' : '' }}">
                                                <input id="field_id_18" placeholder="" name="strata_property_details[location_parking]" value="{{ @old('strata_property_details.location_parking', $strata_property_details['location_parking']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_18">Location Of Parking</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.storage_locker') ? 'has-error' : '' }}">
                                                <input id="field_id_19" placeholder="" name="strata_property_details[storage_locker]" value="{{ @old('strata_property_details.storage_locker', $strata_property_details['storage_locker']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_19">Storage Locker Number(s)</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.location_storage') ? 'has-error' : '' }}">
                                                <input id="field_id_20" placeholder="" name="strata_property_details[location_storage]" value="{{ @old('strata_property_details.location_storage', $strata_property_details['location_storage']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_20">Location Of The Storage</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('strata_property_details.amenities') ? 'has-error' : '' }}">
                                                <input id="field_id_21" placeholder="" name="strata_property_details[amenities]" value="{{ @old('strata_property_details.amenities', $strata_property_details['amenities']) ?? '' }}" type="text" class="form-control">
                                                <label for="field_id_21">Location Of The Amenities</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mb-2">Building details</h4>
                                <hr class="mt-0"/>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4 col-md-4 mb-3">
                                            <div class="form-floating {{ $errors->has('unit_number') ? 'has-error' : '' }}">
                                                <input id="field_id_22" placeholder="" name="unit_number" value="{{ old('unit_number', $property->unit_number ?? (!empty($manage_p_at_9) ? $manage_p_at_9[0] : '')) }}" type="text" class="form-control">
                                                <label for="field_id_22">Unit Number</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-8 col-md-4">
                                            <div class="form-floating required {{ $errors->has('beds') ? 'has-error' : '' }}">
                                                <input id="field_id_23" placeholder="" name="beds" value="{{ old('beds', $property->beds ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_23">Number Of Bedroom(s)</label>
                                                @if ($errors->has('beds'))<span class="text-danger">{{ $errors->first('beds') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required {{ $errors->has('baths') ? 'has-error' : '' }}">
                                                <input id="field_id_24" placeholder="" name="baths" value="{{ old('baths', $property->baths ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_24">Number Of Bathroom(s)</label>
                                                @if ($errors->has('baths'))<span class="text-danger">{{ $errors->first('baths') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 mb-3">
                                            <div class="form-floating required {{ $errors->has('area') ? 'has-error' : '' }}">
                                                <input id="field_id_25" placeholder="" name="area" value="{{ old('area', $property->area ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_25">Square Footage</label>
                                                @if ($errors->has('area'))<span class="text-danger">{{ $errors->first('area') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required mdb-select-wrap {{ $errors->has('parking') ? 'has-error' : '' }}">
                                                <select id="field_id_26" class="form-select" name="parking">
                                                    <option value="">Parking</option>
                                                    <option value="Yes" @if(@old('parking', $property->parking) == 'Yes')selected="selected" @endif>Yes</option>
                                                    <option value="No" @if(@old('parking', $property->parking) == 'No')selected="selected" @endif>No </option>
                                                    <option value="Plenty of street parking" @if(@old('parking', $property->parking) == 'Plenty of street parking')selected="selected" @endif>Plenty of street parking </option>
                                                </select>
                                                <label for="field_id_26">{{ __('Parking') }}</label>
                                                @if ($errors->has('parking'))<span class="text-danger">{{ $errors->first('parking') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating required mdb-select-wrap {{ $errors->has('storage') ? 'has-error' : '' }}">
                                                <select id="field_id_27" class="form-select" name="storage">
                                                    <option value="">Storage</option>
                                                    <option value="Yes, storage locker" @if(@old('storage', $property->storage) == 'Yes, storage locker')selected="selected" @endif>Yes, storage locker</option>
                                                    <option value="No" @if(@old('storage', $property->storage) == 'No')selected="selected" @endif>No</option>
                                                    <option value="In property storage" @if(@old('storage', $property->storage) == 'In property storage')selected="selected" @endif>In property storage</option>
                                                </select>
                                                <label for="field_id_27">{{ __('Storage') }}</label>
                                                @if ($errors->has('storage'))<span class="text-danger">{{ $errors->first('storage') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <h4 class="mb-2">Included In Rent</h4>
                                            <hr class="mt-0"/>
                                            <div class="utility_item">
                                                <div class="form-check  md-form-inline-check">
                                                    <input class="form-check-input filled-in" name="utilities[parking]" value="1" id="utilities_1" type="checkbox" @if(old('utilities.parking', @$items_inc_17[0])=="1" ) checked @endif>
                                                    <label class="form-check-label" for="utilities_1"> Parking x </label>
                                                </div>
                                                <div class="md-form-inline">
                                                    <input type="text" id="utilities_2" name="utilities[num_parking]" value="{{ old('utilities.num_parking', $data->parking_17_1 ?? '') }}" class="form-control" placeholder=''>
                                                </div>
                                                (Stall #
                                                <div class="md-form-inline">
                                                    <input type="text" id="utilities_3" name="utilities[stall]" value="{{ old('utilities.stall', $data->stall_17_2 ?? '') }}" class="form-control" >
                                                </div>
                                                )
                                            </div>
                                            <div class="utility_item">
                                                <div class="form-check  md-form-inline-check">
                                                    <input class="form-check-input filled-in" name="utilities[storage]" value="1" id="utilities_4" type="checkbox" @if(old('utilities.storage', @$items_inc_17[1])=="1" ) checked @endif>
                                                    <label class="form-check-label" for="utilities_4"> Storage </label>
                                                </div>
                                                <div class="md-form-inline">
                                                    <input type="text" id="utilities_5" name="utilities[storage_desc]" value="{{ old('utilities.storage_desc', $data->storage_17_3 ?? '') }}" class="form-control" placeholder=''>
                                                </div>
                                            </div>
                                            <div class="utility_item">
                                                <div class="form-check  md-form-inline-check">
                                                    <input class="form-check-input filled-in" name="utilities[hot_water]" value="1" id="utilities_6" type="checkbox" @if(old('utilities.hot_water', @$items_inc_17[2])=="1" ) checked @endif>
                                                    <label class="form-check-label" for="utilities_6"> Hot Water </label>
                                                </div>
                                            </div>
                                            <div class="utility_item">
                                                <div class="form-check  md-form-inline-check">
                                                    <input class="form-check-input filled-in" name="utilities[gas]" value="1" id="utilities_7" type="checkbox" @if(old('utilities.gas', @$items_inc_17[3])=="1" ) checked @endif>
                                                    <label class="form-check-label" for="utilities_7"> Gas </label>
                                                </div>
                                            </div>
                                            <div class="utility_item">
                                                <div class="form-check  md-form-inline-check">
                                                    <input class="form-check-input filled-in" name="utilities[cable_tv]" value="1" id="utilities_8" type="checkbox" @if(old('utilities.cable_tv', @$items_inc_17[4])=="1" ) checked @endif>
                                                    <label class="form-check-label" for="utilities_8"> Cable TV </label>
                                                </div>
                                            </div>
                                            <div class="utility_item">
                                                <div class="form-check  md-form-inline-check">
                                                    <input class="form-check-input filled-in" name="utilities[internet]" value="1" id="utilities_9" type="checkbox" @if(old('utilities.internet', @$items_inc_17[5])=="1" ) checked @endif>
                                                    <label class="form-check-label" for="utilities_9"> Internet </label>
                                                </div>
                                            </div>
                                            <div class="utility_item">
                                                <div class="form-check  md-form-inline-check">
                                                    <input class="form-check-input filled-in" name="utilities[electricity]" value="1" id="utilities_10" type="checkbox" @if(old('utilities.electricity', @$items_inc_17[6])=="1" ) checked @endif>
                                                    <label class="form-check-label" for="utilities_10"> Electricity </label>
                                                </div>
                                            </div>
                                            <div class="utility_item">
                                                <div class="form-check  md-form-inline-check">
                                                    <input class="form-check-input filled-in" name="utilities[others]" value="1" id="utilities_11" type="checkbox" @if(old('utilities.others', @$items_inc_17[7])=="1" ) checked @endif>
                                                    <label class="form-check-label" for="utilities_11"> Others </label>
                                                </div>
                                                <div class="md-form-inline">
                                                    <input type="text" id="utilities_12" name="utilities[others_desc]" value="{{ old('utilities.others_desc', $data->others_17_4 ?? '') }}" class="form-control" placeholder=''>
                                                </div>
                                            </div>
                                            <div class="utility_item">
                                                <div class="form-check  md-form-inline-check">
                                                    <input class="form-check-input filled-in" name="utilities[no_utilities_included]" value="1" id="utilities_13" type="checkbox" @if(old('utilities.no_utilities_included', @$items_inc_17[8])=="1" ) checked @endif>
                                                    <label class="form-check-label" for="utilities_13"> No utilities included</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-8 col-md-8" id="other_utilities_box">
                                            <div class="form-floating required {{ $errors->has('other_utilities') ? 'has-error' : '' }}">
                                                <input id="other_utilities" name="other_utilities" value="{{ @old('other_utilities', $data->others_17_4 ?? '') }}" type="text" class="form-control">
                                                <label for="other_utilities">Other included utilities</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4">
                                            <div class="form-floating required mdb-select-wrap {{ $errors->has('pet_policy') ? 'has-error' : '' }}">
                                                <select id="pet_policy" class="form-select" name="pet_policy">
                                                    <option value="">Pet Policy</option>
                                                    <option value="Cats allowed" @if(@old('pet_policy', $property->pet_policy) == 'Cats allowed')selected="selected" @endif>Cats allowed</option>
                                                    <option value="Dogs allowed" @if(@old('pet_policy', $property->pet_policy) == 'Dogs allowed')selected="selected" @endif>Dogs allowed</option>
                                                    <option value="Cats/dogs allowed" @if(@old('pet_policy', $property->pet_policy) == 'Cats/dogs allowed')selected="selected" @endif>Cats/dogs allowed</option>
                                                    <option value="No pets" @if(@old('pet_policy', $property->pet_policy) == 'No pets')selected="selected" @endif>No pets</option>
                                                </select>
                                                <label for="pet_policy">{{ __('Pet Policy') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <p><small>Please enter your building pet policy or your personal preference. Please keep in mind a lot of people in Vancouver do have pets and choosing a no pet policy will reduce the pool of potential prospects. When you choose to accept pets, we make sure a pet damage deposit is collected and we also get reference from previous landlord on the pet specifically and we do require to meet the pet.</small></p>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mb-2">RECITALS:</h4>
                                <hr class="mt-0"/>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-12 col-sm-8 col-md-6">
                                            <label for="insurance">Have you purchased your rental property insurance? <span style="color: red">*</span></label>
                                            <div class="form-floating required mdb-select-wrap required {{ $errors->has('insurance') ? 'has-error' : '' }}">
                                                <select id="insurance" class="form-select" name="insurance">
                                                    <option value="Yes" @if(@old('insurance', $property->insurance) == 'Yes')selected="selected" @endif>Yes</option>
                                                    <option value="No" @if(@old('insurance', $property->insurance) == 'No')selected="selected" @endif>No</option>
                                                </select>
                                                <label for="insurance">{{ __('Property Insurance') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="col-12 mb-3"><small>It is very important that you purchase your rental property insurance. If you choose not to purchase the insurance unfortunately we will not be able to protect you from possible losses, including rental loss. Although we do require the tenant to purchase the tenant insurance, it does not protect you from possible damages sourcing from your property. The tenant insurance only covers the tenant's contents and their liability for incidents caused by their actions like for example overflowing the bath tub. Leak sourcing from the washing machine or the plumbing would be something covered by rental property insurance. The potential liability can reach thousands of dollars.</small></div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <h4 class="mb-2">Strata Bylaws/Property Related Documents</h4>
                                            <hr class="mt-0"/>
                                            <div class="files_inner">
                                                <div class="md2-form">
                                                    <input id="Stratafiles" class="form-control" type="file" multiple>
                                                    <label for="Stratafiles" class="mt-2"><span class="icon"><i class="fa fa-upload"></i></span><span class="filename"></span><span class="info_text">Click to upload the current bylaws. Accepted formats: pdf, jpg, png.</span></label>
                                                </div>
                                                <div id="selectedStrata">
                                                    @if(isset($property->strata_documents))
                                                        @foreach($property->strata_documents as $strata_document)
                                                            @if(pathinfo($strata_document->url, PATHINFO_EXTENSION) == 'pdf')
                                                                <span class="pip">
                                                                    <a href="{{ url('storage/files') }}/{{ $property->user_id }}/{{ $strata_document->url }}" data-lity data-lity-desc="{{ $strata_document->url }}">
                                                                        <img class="imageThumb" src="{{ asset('images/pdf-icon.png') }}">
                                                                    </a>
                                                                    <span class="selFileLive" data-id="{{ $strata_document->id }}" title="Click to remove">
                                                                        <i class="fa fa-trash"></i>
                                                                    </span>
                                                                </span>
                                                            @else
                                                                <span class="pip">
                                                                    <a href="{{ url('storage/files') }}/{{ $property->user_id }}/{{ $strata_document->url }}" data-lity data-lity-desc="{{ $strata_document->url }}">
                                                                        <img class="imageThumb" src="{{ url('storage/files') }}/{{ $property->user_id }}/thumbs/{{ $strata_document->url }}">
                                                                    </a>
                                                                    <span class="selFileLive" data-id="{{ $strata_document->id }}" title="Click to remove">
                                                                        <i class="fa fa-trash"></i>
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <h4 class="mb-2">Property photos</h4>
                                            <hr class="mt-0"/>
                                            <div class="files_inner">
                                                <div class="md2-form">
                                                    <input id="PropertyPhotos" class="form-control" type="file" multiple>
                                                    <label for="PropertyPhotos" class="mt-2">
                                                        <span class="icon"><i class="fa fa-upload"></i></span>
                                                        <span class="filename"></span>
                                                        <span class="info_text">Click to upload any property photos you have available. While we do take our own photos, having yours sooner allows us to expedite the rental process. Accepted formats: jpg, png, gif</span>
                                                    </label>
                                                </div>
                                                <div id="selectedPhotos">
                                                    @if(isset($property->property_photos))
                                                        @foreach($property->property_photos as $strata_document)
                                                        <span class="pip">
                                                            <a href="{{ url('storage/photos') }}/{{ $property->user_id }}/{{ $strata_document->url }}" data-lity data-lity-desc="{{ $strata_document->url }}">
                                                                <img  class="imageThumb" src="{{ url('storage/photos') }}/{{ $property->user_id }}/thumbs/{{ $strata_document->url }}">
                                                            </a>
                                                            <span class="selFileLive" data-id="{{ $strata_document->id }}" title="Click to remove">
                                                                <i class="fa fa-trash"></i>
                                                            </span>
                                                        </span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <h4 class="mb-2">Additional comments</h4>
                                            <hr class="mt-0"/>
                                            <textarea class="form-control" name="desc" style="height:450px; line-height:20px" id="myeditorinstance" placeholder="Please enter any details you feel we should know.">{!! @$property->content !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both" class="clearfix"></div>
                                <div class="form-group">
                                    <div class="col-md-12 form-submit text-end">
                                        <button type="submit" name="submit" class="btn btn-warning">Submit</button>
                                        <img id="ajax_loader" src="{{ url('images/loader.svg') }}" style="display:none;">
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js"></script>
<script src='{{ asset("js/pmaForm/particles.min.js") }}'></script>
<script src="{{ asset('js/pmaForm/jquery.backstretch.min.js') }}"></script>
<script src='{{ asset("js/pmaForm/custom.js") }}'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function(){
        $('#other_utilities_box').hide();
        if ($('input#utilities_11').is(':checked')) {
            $('#other_utilities_box').show();
        }else{
            $('#other_utilities_box').hide();
        }
        // Define function to open filemanager window
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };
        // Define LFM summernote button
        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {
                    lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
                        lfmItems.forEach(function (lfmItem) {
                            context.invoke('insertImage', lfmItem.url);
                        });
                    });
                }
            });
            return button.render();
        };
        // Initialize summernote with LFM button in the popover button group
        // Please note that you can add this button to any other button group you'd like
    });
    $("input#utilities_11").change(function() {
        if ($('input#utilities_11').is(':checked')) {
            $('#other_utilities_box').show();
        }else{
            $('#other_utilities_box').hide();
        }
    });
</script>
<x-head.tinymce-config />
<script>
    $("#field_id_22, #field_id_23, #field_id_24, #field_id_25, #field_id_19").on('keydown keyup keypress blur', function(){
        $("#field_id_30").val($("#field_id_23").val()+ ", " + $("#field_id_24").val() + " " + $("#field_id_25").val() + " " + $("#field_id_19").val());
        $("#field_id_30 + label").addClass('active');
    });
    $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    $(document).ready(function(){
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
        $.mask.definitions['~']='[+-]';
        $('#field_id_15, #field_id_16').mask('(999) 999-9999');
        var pro_type = $('#prop_type').val();
        if( pro_type == 'Strata unit/property' ){
            $('#StrataProperty').show();
            $('#StrataProperty_text').show();
        }else{
            $('#StrataProperty').hide();
            $('#StrataProperty_text').hide();
        }
    });

    $(document).ready(function(){
        // Set up CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        // Define mask for phone numbers
        $.mask.definitions['~'] = '[+-]';

        // Apply mask to phone number fields
        $('#field_id_15, #field_id_16').mask('(999) 999-9999');

        // Check property type on page load
        var pro_type = $('#prop_type').val();
        if (pro_type == 'Strata unit/property') {
            $('#StrataProperty').show();
            $('#StrataProperty_text').show();
        } else {
            $('#StrataProperty').hide();
            $('#StrataProperty_text').hide();
        }

        // Update visibility of StrataProperty fields on prop_type change
        $('#prop_type').change(function() {
            if ($(this).val() == 'Strata unit/property') {
                $('#StrataProperty').show();
                $('#StrataProperty_text').show();
            } else {
                $('#StrataProperty').hide();
                $('#StrataProperty_text').hide();
            }
        });
    });

    // $('#prop_type').on('change', function() {
    //     if( this.value == 'Strata unit/property' ){
    //         $('#StrataProperty').show();
    //         $('#StrataProperty_text').show();
    //     }else{
    //         $('#StrataProperty').hide();
    //         $('#StrataProperty_text').hide();
    //     }
    // });
    // FILE UPLOAD START
    var selDivStrata = selDivPhotos = "";
    var storedFiles = [];
    var storedPhotos = [];
    $(document).ready(function() {
        $("#Stratafiles").on("change", handleFileSelectStrata);
        selDivStrata = $("#selectedStrata");
        $("#PropertyPhotos").on("change", handleFileSelect);
        selDivPhotos = $("#selectedPhotos");
        $("#pmaForm").on("submit", handleForm);
        $("body").on("click", ".selFile", removeFile);
    });
    function handleFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function(f) {
            if(!f.type.match("image.*")) {
                return;
            }
            storedPhotos.push(f);
            var reader = new FileReader();
            reader.onload = function (e) {
                var html = "<span class=\"pip\">" + "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" + "<span class=\"selFile\" data-file='"+f.name+"' title='Click to remove'><i class=\"fa fa-trash\"></i></span>" + "</span>";
                selDivPhotos.append(html);
            }
            reader.readAsDataURL(f);
        });
    }
    function handleFileSelectStrata(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function(f) {
            if(!f.type.match("image.*")) {
                // return;
            }
            storedFiles.push(f);
            var reader = new FileReader();
            reader.onload = function (e) {
                if(f.type == 'application/pdf'){
                    var html = "<span class=\"pip\">" + "<img class=\"imageThumb\" src='{{ asset('images/pdf-icon.png') }}' title=\"" + f.name + "\"/>" + "<span class=\"selFile\" data-file='"+f.name+"' title='Click to remove'><i class=\"fa fa-trash\"></i></span>" + "</span>";
                }else{
                    var html = "<span class=\"pip\">" + "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" + "<span class=\"selFile\" data-file='"+f.name+"' title='Click to remove'><i class=\"fa fa-trash\"></i></span>" + "</span>";
                }
                selDivStrata.append(html);
            }
            reader.readAsDataURL(f);
        });
    }
    function handleForm(e) {
        e.preventDefault();
        $('#ajax_loader').show();
        $('#pmaForm button[name="submit"]').addClass('disabled');
        var data = new FormData($(this)[0]);
        for(var i=0, len=storedFiles.length; i<len; i++) {
            data.append('stratafiles['+[i]+']', storedFiles[i]);
        }
        for(var i=0, len=storedPhotos.length; i<len; i++) {
            data.append('propertyphotos['+[i]+']', storedPhotos[i]);
        }
        data.append('_token', $('input[name=_token]').val());
        url = $('#pmaForm').attr('action');
        $.ajax({
            method:"POST",
            url: url,
            data: data,
            success: function(data) {
                // alert(data.status + 'HHHHHHHH');
                console.log('data', data);
                if(data.status == 'created'){
                    $('.panel-body').css('padding', '0px');
                    // window.location.replace(data.url);
                    $('#propertyupdate_msg').show();
                    $('#pmaupdate_msg').hide();
                    $('#pmaForm').remove();
                    $(window).scrollTop(0);
                    $('#ajax_loader').hide();
                    $('#pmaForm button[name="submit"]').removeClass('disabled');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
    function removeFile(e) {
        var file = $(this).data("file");
        for(var i=0;i<storedFiles.length;i++) {
            if(storedFiles[i].name === file) {
                storedFiles.splice(i,1);
                break;
            }
        }
        $(this).parent().remove();
    }
    // END FILE UPLOAD START
    $('.selFileLive').on('click', function() {
        var file_id = $(this).data("id");
        $element = $(this).parent('.pip');
        if (confirm("Are you sure?\nwant to Remove ")) {
            $.ajax({
                method:"POST",
                url: "{{ url('user/delete-file') }}/" + file_id,
                data: {"_token": "{{ csrf_token() }}"},
                success: function(data) {
                    $element.remove();
                }
            });
        }
        return false;
    });
</script>
@endpush
