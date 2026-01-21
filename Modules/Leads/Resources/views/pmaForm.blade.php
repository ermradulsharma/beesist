@extends('frontend.layouts.app')
@section('title', __('Property Management Application'))
@push('after-styles')
<link rel="stylesheet" href="{{ asset('css/pma/style-form.css') }}">
<link rel="stylesheet" href="{{ asset('css/pma/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/pma/mdb.min.css') }}">
<style>
    .has-error #field_id_21, .has-error #field_id_22, .has-error #field_id_23 {border-bottom: 2px solid red !important; height: 22px; line-height: 22px; }
    #field_id_25, #field_id_26, #field_id_60, #field_id_54, #field_id_28, #field_id_29, #field_id_31, #field_id_38, #field_id_44 { height: 22px; line-height: 22px; }
    @media (max-width:768px) {#field_id_20+label {font-size: 12px !important; }}
    .color-green {color: #008000 !important; border-bottom: 2px solid red !important;}
    .color-yellow {color: #008000 !important; border-bottom: 2px solid var(--bs-yellow) !important;}
    h1, h2, h3, h4, h5, h6 {display: block }
    ul, ol {padding-left: 20px }
    .panel.panel-default.page-inner { border-radius: 10px !important; background-color: #fff; }
    .panel .panel-body { padding: 20px; }
    .btn-primary { background-color: var(--bs-yellow) !important; border: 1px solid var(--bs-yellow) !important; height: auto !important; line-height: inherit; padding: 7px 15px !important; }
    button.btn { line-height: initial; padding: 7px 15px !important; height: auto !important; }
    .bolld-alert-box .alert { padding: 20px }
    h1.page-title { color: #FFF; text-align: center; margin: 25px 0; font-weight: 300; font-size: 1.75rem;}
    ul.no-ol li .md-form {margin-top: 0rem !important;}
    .ol ol li ol .md-form {margin-top: 0rem !important;}
    .md-form .form-control {padding: 0.3rem 0 0.3rem !important;}
    .no-ol li .md-form .form-control {padding: 0rem 0.3rem 0 0!important;}
    .md-form select {border-top: none; border-right: none; border-left: none;}
    select.md-form {margin-top: 0.7rem !important;}
    .md-form label.active {top: 1.3rem !important;}
    .or {margin-top: 1rem;}
    .text-secondary {--bs-text-opacity: 1; color: rgba(var(--bs-secondary-rgb), var(--bs-text-opacity)) !important;}
    .btn {box-shadow: unset !important;}
    .navbar .dropdown-menu a {color: var(--bs-dropdown-link-color) !important;}
    .signature_box {width: auto !important;}
</style>
@endpush
@php
    $owner_two_data = false;
    $agent_data = false;
    $owner_two_name = true;
    if(isset($owners, $ap) && $owners == 2 && $ap == 2){
        $owner_two_data = true;
    }elseif(isset($owners, $ap) && $owners == 2 && $ap == 1 && $data->form_step == null){

        $owner_two_name = false;
    }elseif(isset($data->n_own, $data->bp) && $data->n_own == 2 && $data->bp == 1 && $data->form_step == 0){
        if((isset($action) && $action == 'view')){
            $owner_two_data = false;
        }else{
            $owner_two_data = true;
        }
    }elseif(isset($data->n_own, $data->bp) && $data->n_own == 2){
        $owner_two_data = true;
    }
    if((isset($data->form_step) && $data->form_step == 1)){
        if((isset($action) && $action == 'view')){
            $agent_data = false;
        }else{
            $agent_data = true;
        }
    }elseif((isset($data->form_step) && $data->form_step == 2)){
        $agent_data = true;
    }
    if($data){
        $located_3 = json_decode(unserialize($data->located_3), true) ?? [];
        $located_o2_3 = json_decode(unserialize($data->located_o2_3), true) ?? [];
        $resident_won1 = json_decode(unserialize($data->resident_won1), true) ?? [];
        $resident_won2 = json_decode(unserialize($data->resident_won2), true) ?? [];
        $occupancy_tenant_info = json_decode(unserialize($data->occupancy_tenant_info), true) ?? [];
        $manage_p_at_9 = json_decode(unserialize($data->manage_p_at_9), true) ?? [];
        $items_inc_17 = json_decode(unserialize($data->items_inc_17), true) ?? [];
        $reg_own_23 = json_decode(unserialize($data->reg_own_23), true) ?? [];
        $re_reg_own_28 = json_decode(unserialize($data->re_reg_own_28), true) ?? [];
        $ac_holder_30 = json_decode(unserialize($data->ac_holder_30), true) ?? [];
        $bank_details_31 = json_decode(unserialize($data->bank_details_31), true) ?? [];
    }
@endphp

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title" style="color:#fff; text-align:center">For Rent Central <strong>Property Management </strong>Agreement</h1>
            <div class="panel panel-default page-inner success-msg">
                @if(isset($data, $action) && $data->form_step == 2 && $data->status == 1 && $action == 'view' && empty(session('status')))
                    <div class="alert alert-success" role="alert" style="margin: 0rem 0rem 2rem; padding: 2rem;">
                        <a href="{{url('/pma-download').'/'.Crypt::encryptString($data->id).'/'.$data->accessToken }}">
                            <button type="button" class="btn btn-success">Save as PDF</button>
                        </a>
                    </div>
                @endif
                @if($linkAccessible == false)
                    <div class="alert alert-danger text-center" role="alert" style="margin: 0rem 0rem 2rem; padding: 2rem;">
                        <h4 class="alert-heading text-capitalize">Link is expired!</h4>
                        <p class="text-capitalize">Sorry! this link is not accessible anymore.</p>
                    </div>
                    <div class="theme_button text-center">
                        <a href="{{ route('frontend.contact') }}" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">Schedule your FREE business strategy!</a>
                    </div>
                @elseif(session('status'))
                    <div class="alert alert-success text-center" role="alert" style="margin: 0rem 0rem 2rem; padding: 2rem;">
                        <h4 class="alert-heading text-capitalize"><?php echo nl2br(session('status')); ?></h4>
                        <p class="text-capitalize">You have successfully signed the agreement. You can find a copy of the agreement in the dashboard.</p>
                        <hr>
                        @if (isset($data, $action) && $data->form_step == 2 && $data->status == 1 && $action == 'view')
                            <a href="{{url('/pma-download').'/'.Crypt::encryptString($data->id).'/'.$data->accessToken }}"><button type="button" class="btn btn-success">Save as PDF</button></a>
                        @endif
                    </div>
                @else
                    @if(session('msg') != 'insert')
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">Oh no! You have missed some required fields. Please review the fields below.
                                    <ul style="display:none">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form id="pmaForm" class="form-horizontal form-validate p-4" method="POST" action="{{ route('pma.store') }}" enctype="multipart/form-data">
                                @csrf
                                <h4>This Property Management Agreement (the "Agreement") is made and effective on {{ date('d/m/Y') }}</h4>
                                <h4>BETWEEN: <small>(The "Owner")</small></h4>
                                <div class="form-row-group">
                                    <h5 style="font-weight: 600;">Owner :</h5>
                                    <div class="form-row row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="md-form required {{ $errors->has('fName_1') ? 'has-error' : '' }}">
                                                <input id="field_id_1" name="fName_1" value="{{ old('fName_1', $data->fName_1) }}" type="text" class="form-control" required="required">
                                                <label for="field_id_1">First Name</label>
                                                @if ($errors->has('fName_1'))<span class="text-danger">{{ $errors->first('fName_1') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="md-form required {{ $errors->has('lName_2') ? 'has-error' : '' }}">
                                                <input id="field_id_2" name="lName_2" value="{{ old('lName_2', $data->lName_2) }}" type="text" class="form-control" required="required">
                                                <label for="field_id_2">Last Name</label>
                                                @if ($errors->has('lName_2'))<span class="text-danger">{{ $errors->first('lName_2') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h5>Owner Identity</h5>
                                            @if(!empty($data->own1_identity) && substr($data->own1_identity, -4) == '.pdf')
                                                <div class="image-responsive">
                                                    <a href="{{ asset('uploads/pma/ownerIdentity/'.$data->own1_identity) }}" alt="Identity" download>
                                                        <button type="button" class="btn btn-primary">View Identity</button>
                                                    </a>
                                                </div>
                                            @elseif(!empty($data->own1_identity) && substr($data->own1_identity, -4) != '.pdf')
                                                <div class="image-responsive">
                                                    <a href="{{ asset('uploads/pma/ownerIdentity/'.$data->own1_identity) }}" target="_blank" download>
                                                        <img style="height:150px;width:auto" src="{{ asset('uploads/pma/ownerIdentity/'.$data->own1_identity) }}" alt="Identity">
                                                    </a>
                                                </div>
                                            @else
                                                <div class="md2-form position-relative {{ $errors->has('own1_identity') ? 'has-error' : '' }}">
                                                    <input id="own1_identity" name="own1_identity" class="form-control" type="file">
                                                    <label for="own1_identity">
                                                        <span class="icon">
                                                            <i class="fa fa-upload"></i>
                                                        </span>
                                                        <span class="filename"></span>
                                                        <span class="info_text">Click to upload the Owner Identity (pdf, jpg, png)
                                                            <span style="color:red">(required)</span>
                                                        </span>
                                                    </label>
                                                    @if ($errors->has('own1_identity'))
                                                        <span class="text-danger">{{ $errors->first('own1_identity') }}</span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if($owner_two_data == true)
                                        @if($owner_two_name == true)
                                            <h5 style="font-weight: 600;">Owner 2:</h5>
                                            <div class="form-row row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="md-form required {{ $errors->has('fName_1_2') ? 'has-error' : '' }}">
                                                        <input id="field_id_1_2" name="fName_1_2" value="{{ old('fName_1_2', $data->fName_1_2 ?? '') }}" type="text" class="form-control" required="required">
                                                        <label for="field_id_1_2">First Name</label>
                                                        @if ($errors->has('fName_1_2'))<span class="text-danger">{{ $errors->first('fName_1_2') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="md-form required {{ $errors->has('lName_2_2') ? 'has-error' : '' }}">
                                                        <input id="field_id_2_2" name="lName_2_2" value="{{ old('lName_2_2', $data->lName_2_2 ?? '') }}" type="text" class="form-control" required="required">
                                                        <label for="field_id_2_2">Last Name</label>
                                                        @if ($errors->has('lName_2_2'))<span class="text-danger">{{ $errors->first('lName_2_2') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5>Owner 2 Identity</h5>
                                                    @if(!empty($data->own2_identity) && substr($data->own2_identity, -4) == '.pdf')
                                                        <div class="image-responsive">
                                                            <a href="{{ asset('uploads/pma/ownerIdentity/'.$data->own2_identity) }}" alt="Identity" download>
                                                                <button type="button" class="btn btn-primary">View Identity</button>
                                                            </a>
                                                        </div>
                                                    @elseif(!empty($data->own2_identity) && substr($data->own2_identity, -4) != '.pdf')
                                                        <div class="image-responsive">
                                                            <a href="{{ asset('uploads/pma/ownerIdentity/'.$data->own2_identity) }}" target="_blank" download>
                                                                <img style="height:150px;width:auto" src="{{ asset('uploads/pma/ownerIdentity/'.$data->own2_identity) }}" alt="Identity">
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div class="md2-form position-relative {{ $errors->has('own2_identity') ? 'has-error' : '' }}">
                                                            <input id="own2_identity" name="own2_identity" class="form-control" type="file">
                                                            <label for="own2_identity">
                                                                <span class="icon"><i class="fa fa-upload"></i></span>
                                                                <span class="filename"></span>
                                                                <span class="info_text">Click to upload the Owner 2 Identity (pdf, jpg, png)<span style="color:red">(required)</span></span>
                                                            </label>
                                                            @if ($errors->has('own2_identity'))
                                                                <span class="text-danger">{{ $errors->first('own2_identity') }}</span>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <h4>Residing at:<br><small>(Owner's Residential Address)</small></h4>
                                <div class="form-row-group">
                                    <h5 style="font-weight: 600;">Owner :</h5>
                                    <div class="form-row row">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form {{ $errors->has('located_3.1') ? 'has-error' : '' }}">
                                                <input id="field_id_4" name="located_3[1]" value="{{ old('located_3.1', @$located_3[1] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_4">Unit Number</label>
                                                @if ($errors->has('located_3.1'))<span class="text-danger">{{ $errors->first('located_3.1') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('located_3.0') ? 'has-error' : '' }}">
                                                <input id="field_id_3" onkeyup="initAutocomplete(this.id)" name="located_3[0]" value="{{ old('located_3.0', @$located_3[0] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_3">Street Address</label>
                                                @if ($errors->has('located_3.0'))<span class="text-danger">{{ $errors->first('located_3.0') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('located_3.2') ? 'has-error' : '' }}">
                                                <input id="field_id_5" name="located_3[2]" value="{{ old('located_3.2', @$located_3[2] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_5">City</label>
                                                @if ($errors->has('located_3.2'))<span class="text-danger">{{ $errors->first('located_3.2') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('located_3.3') ? 'has-error' : '' }}">
                                                <input id="field_id_6" name="located_3[3]" value="{{ old('located_3.3', @$located_3[3] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_6">State / Province / Region</label>
                                                @if ($errors->has('located_3.3'))<span class="text-danger">{{ $errors->first('located_3.3') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('located_3.4') ? 'has-error' : '' }}">
                                                <input id="field_id_7" name="located_3[4]" value="{{ old('located_3.4', @$located_3[4] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_7">ZIP / Postal Code</label>
                                                @if ($errors->has('located_3.4'))<span class="text-danger">{{ $errors->first('located_3.4') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('located_3.5') ? 'has-error' : '' }}">
                                                <select id="field_id_8" class="mdb-select md-form initialized w-100" name="located_3[5]">
                                                    <option value="">Select Country*</option>
                                                    @php
                                                        $sel_country = old('located_3.5', @$located_3[5]);
                                                        if(empty($sel_country)){
                                                            $sel_country = 'CA';
                                                        }
                                                    @endphp
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->iso }}" {{ $sel_country == $country->iso ? 'selected' : '' }}>{{ $country->nicename }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('located_3.5'))
                                                    <span class="text-danger">{{ $errors->first('located_3.5') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="md-form required {{ $errors->has('phone_4') ? 'has-error' : '' }}">
                                                <input id="field_id_9" name="phone_4" value="{{ old('phone_4', $data->phone_4) }}" type="tel" class="form-control">
                                                <label for="field_id_9">Phone</label>
                                                @if ($errors->has('phone_4'))<span class="text-danger">{{ $errors->first('phone_4') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="md-form required {{ $errors->has('email_5') ? 'has-error' : '' }}">
                                                <input id="field_id_10" name="email_5" value="{{ old('email_5', $data->email_5) }}" type="email" class="form-control" required="required" @if(@$data->email_5) readonly @endif>
                                                <label for="field_id_10">Email</label>
                                                @if ($errors->has('email_5'))<span class="text-danger">{{ $errors->first('email_5') }}</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--owners 2 Residing at-->
                                    @if($owner_two_data == true)
                                        @if($owner_two_name == true)
                                        <h5 style="font-weight: 600;">Owner 2 :</h5>
                                            <div class="form-row row">
                                                <div class="col-12 col-sm-6 col-md-4">
                                                    <div class="md-form {{ $errors->has('located_o2_3.1') ? 'has-error' : '' }}">
                                                        <input id="field_id_o2_4" name="located_o2_3[1]" value="{{ old('located_o2_3.1', @$located_o2_3[1] ?? '') }}" type="text" class="form-control">
                                                        <label for="field_id_o2_4">Unit Number</label>
                                                        @if ($errors->has('located_o2_3.1'))<span class="text-danger">{{ $errors->first('located_o2_3.1') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-4">
                                                    <div class="md-form required {{ $errors->has('located_o2_3.0') ? 'has-error' : '' }}">
                                                        <input id="field_id_o2_3" onkeyup="initAutocomplete(this.id)" name="located_o2_3[0]" value="{{ old('located_o2_3.0', @$located_o2_3[0] ?? '') }}" type="text" class="form-control" required="required">
                                                        <label for="field_id_o2_3">Street Address</label>
                                                        @if ($errors->has('located_o2_3.0'))<span class="text-danger">{{ $errors->first('located_o2_3.0') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-4">
                                                    <div class="md-form required {{ $errors->has('located_o2_3.2') ? 'has-error' : '' }}">
                                                        <input id="field_id_o2_5" name="located_o2_3[2]" value="{{ old('located_o2_3.2', @$located_o2_3[2] ?? '') }}" type="text" class="form-control" required="required">
                                                        <label for="field_id_o2_5">City</label>
                                                        @if ($errors->has('located_o2_3.2'))<span class="text-danger">{{ $errors->first('located_o2_3.2') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-4">
                                                    <div class="md-form required {{ $errors->has('located_o2_3.3') ? 'has-error' : '' }}">
                                                        <input id="field_id_o2_6" name="located_o2_3[3]" value="{{ old('located_o2_3.3', @$located_o2_3[3] ?? '') }}" type="text" class="form-control" required="required">
                                                        <label for="field_id_o2_6">State / Province / Region</label>
                                                        @if ($errors->has('located_o2_3.3'))<span class="text-danger">{{ $errors->first('located_o2_3.3') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-4">
                                                    <div class="md-form required {{ $errors->has('located_3.4') ? 'has-error' : '' }}">
                                                        <input id="field_id_o2_7" name="located_o2_3[4]" value="{{ old('located_o2_3.4', @$located_o2_3[4] ?? '') }}" type="text" class="form-control" required="required">
                                                        <label for="field_id_o2_7">ZIP / Postal Code</label>
                                                        @if ($errors->has('located_o2_3.4'))<span class="text-danger">{{ $errors->first('located_o2_3.4') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-4">
                                                    <div class="md-form required mdb-select-wrap {{ $errors->has('located_o2_3.5') ? 'has-error' : '' }}">
                                                        <select id="field_id_o2_8" class="mdb-select md-form initialized w-100" name="located_o2_3[5]">
                                                            <option value="">Select Country*</option>
                                                            @php
                                                                $sel_country = old('located_o2_3.5', @$located_o2_3[5]);
                                                                if(empty($sel_country)){
                                                                    $sel_country = 'CA';
                                                                }
                                                            @endphp
                                                            @foreach($countries as $country)
                                                                <option value="{{ $country->iso }}" {{ $sel_country==$country->iso ? 'selected' : '' }} >{{ $country->nicename }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('located_o2_3.5'))<span class="text-danger">{{ $errors->first('located_o2_3.5') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6">
                                                    <div class="md-form required {{ $errors->has('phone_o2_4') ? 'has-error' : '' }}">
                                                        <input id="field_id_o2_9" name="phone_o2_4" value="{{ old('phone_o2_4',@$data->phone_o2_4 ?? '') }}" type="tel" class="form-control" required="required">
                                                        <label for="field_id_o2_9">Phone</label>
                                                        @if ($errors->has('phone_o2_4'))<span class="text-danger">{{ $errors->first('phone_o2_4') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-6">
                                                    <div class="md-form required {{ $errors->has('won2_email') ? 'has-error' : '' }}">
                                                        <input id="field_id_o2_10" name="won2_email" value="{{ old('won2_email',@$data->won2_email ?? '') }}" type="email" class="form-control" required="required">
                                                        <label for="field_id_o2_10">Email</label>
                                                        @if ($errors->has('won2_email'))<span class="text-danger">{{ $errors->first('won2_email') }}</span>@endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <h4>AND:</h4>
                                <div class="form-row-group">
                                    <p><strong>{{ appName() }} Real Estate Management <small>(the "Agent")</small></strong><br />
                                        <strong>a corporation organised and existing under the laws Of British Columbia, with its head office located at:</strong><br />
                                        <strong class="color-red">B - 2127 Granville Street, Vancouver BC V6H 3E9</strong>
                                    </p>
                                </div>
                                <div class="form-row row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <h4>Owner residency declaration:</h4>
                                        <div class="form-row">
                                            <div class="form-check col-12 col-sm-12 col-md-12">
                                                <input class="form-check-input filled-in" name="resident_won1[res_ca]" value="1" id="field_id_11" type="radio" @if(old('resident_won1.res_ca', @$resident_won1['res_ca'])=="1" ) checked @endif @if(old('resident_ca_won1.res', @$resident_won1['res_ca'])=="" ) checked @endif>
                                                <label class="form-check-label" for="field_id_11"> Resident of Canada </label>
                                            </div>
                                            <div class="form-check col-12 col-sm-12 col-md-12">
                                                <input class="form-check-input filled-in" name="resident_won1[res_ca]" value="0" id="field_id_12" type="radio" @if(old('resident_won1.res_ca', @$resident_won1['res_ca'])=="0" ) checked @endif>
                                                <label class="form-check-label" for="field_id_12"> Non Resident of Canada </label>
                                            </div>
                                            <div id="non_reg_ca">
                                                <p><strong>If Non-resident, the following must be completed:</strong></p>
                                                <div class="form-row row">
                                                    <div class="col-12 col-sm-12 col-md-12">
                                                        <div class="md-form {{ $errors->has('rescount_7') ? 'has-error' : '' }}">
                                                            <input id="field_id_13" name="resident_won1[address]" value="{{ old('resident_won1.address', @$resident_won1['address'] ?? '') }}" type="text" class="form-control">
                                                            <label for="field_id_13">Address in country of Residence</label>
                                                            @if ($errors->has('resident_won1.address'))<span class="text-danger">{{ $errors->first('resident_won1.address') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12">
                                                        <div class="md-form">
                                                            <input id="field_id_14" name="resident_won1[dob_8]" value="{{ old('resident_won1.dob_8', @$resident_won1['dob_8'] ?? '') }}" type="text" class="form-control">
                                                            <label for="field_id_14">Date of birth (yyyy-mm-dd)</label>
                                                            @if ($errors->has('resident_won1.dob_8'))<span class="text-danger">{{ $errors->first('resident_won1.dob_8') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12">
                                                        <div class="md-form">
                                                            <input id="field_id_14_1" name="resident_won1[tax_sin_no_8]" value="{{ old('resident_won1.tax_sin_no_8', @$resident_won1['tax_sin_no_8'] ?? '') }}" type="text" class="form-control">
                                                            <label for="field_id_14_1">International Tax Number (ITN) or Social Insurance Number (SIN)</label>
                                                            @if ($errors->has('resident_won1.tax_sin_no_8'))<span class="text-danger">{{ $errors->first('resident_won1.tax_sin_no_8') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($owner_two_data == true)
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <h4>Owner 2 residency declaration:</h4>
                                        <div class="form-row row">
                                            <div class="form-check col-12 col-sm-12 col-md-12">
                                                <input class="form-check-input filled-in" name="resident_won2[res_ca]" value="1" id="won2_field_id_11" type="radio" @if(old('resident_won2.res_ca', @$resident_won2['res_ca'])=="1" ) checked @endif @if(old('resident_ca_won2.res', @$resident_won2['res_ca'])=="" ) checked @endif>
                                                <label class="form-check-label" for="won2_field_id_11"> Resident of Canada </label>
                                            </div>
                                            <div class="form-check col-12 col-sm-12 col-md-12">
                                                <input class="form-check-input filled-in" name="resident_won2[res_ca]" value="0" id="won2_field_id_12" type="radio" @if(old('resident_won2.res_ca', @$resident_won2['res_ca'])=="0" ) checked @endif>
                                                <label class="form-check-label" for="won2_field_id_12"> Non Resident of Canada </label>
                                            </div>
                                        </div>
                                        <div id="won2_non_reg_ca">
                                            <p><strong>If Non-resident, the following must be completed:</strong></p>
                                            <div class="form-row row">
                                                <div class="form-check col-12 col-sm-12 col-md-12">
                                                    <div class="md-form {{ $errors->has('rescount_7') ? 'has-error' : '' }}">
                                                        <input id="field_id_o2_13" name="resident_won2[address]" value="{{ old('resident_won2.address', @$resident_won2['address'] ?? '') }}" type="text" class="form-control">
                                                        <label for="field_id_o2_13">Address in country of Residence</label>
                                                        @if ($errors->has('resident_won2.address'))<span class="text-danger">{{ $errors->first('resident_won2.address') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="form-check col-12 col-sm-12 col-md-12">
                                                    <div class="md-form">
                                                        <input id="field_iddate_14_2" name="resident_won2[dob_8]" value="{{ old('resident_won2.dob_8', @$resident_won2['dob_8'] ?? '') }}" type="text" class="form-control">
                                                        <label for="field_iddate_14_2">Date of birth (yyyy-mm-dd)</label>
                                                        @if ($errors->has('resident_won2.dob_8'))<span class="text-danger">{{ $errors->first('resident_won2.dob_8') }}</span>@endif
                                                    </div>
                                                </div>
                                                <div class="form-check col-12 col-sm-12 col-md-12">
                                                    <div class="md-form">
                                                        <input id="field_id_14_2" name="resident_won2[tax_sin_no_8]" value="{{ old('resident_won2.tax_sin_no_8', @$resident_won2['tax_sin_no_8'] ?? '') }}" type="text" class="form-control">
                                                        <label for="field_id_14_2">International Tax Number (ITN) or Social Insurance Number (SIN)</label>
                                                        @if ($errors->has('resident_won2.tax_sin_no_8'))<span class="text-danger">{{ $errors->first('resident_won2.tax_sin_no_8') }}</span>@endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-row row" style="margin-top:20px; margin-bottom:20px">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        @php
                                            $sign_id = 1;
                                            $sign_field = 'initial_'.$sign_id;
                                            $sign_field_value = @$data[$sign_field];
                                        @endphp
                                        <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has('initial_1') ? ' has-error' : '' }}">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                    <div>
                                                        <label for="initial_1">Owner Initials</label>
                                                    </div>
                                                    @if(@$sign_field_value=='')
                                                        {!! SignPad($sign_id, 'Initials') !!}
                                                        @if(old($sign_field))
                                                            <div class="sign-pad signtyped old_sign">
                                                                @if(is_base64(old($sign_field))==true)
                                                                    <img src="{{ old($sign_field) }}">
                                                                @else
                                                                    {{ old($sign_field) }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="sign-pad signtyped">
                                                            @if(is_base64($sign_field_value)==true)
                                                                <img src="<?php echo $sign_field_value; ?>">
                                                            @else
                                                                {{ $sign_field_value }}
                                                            @endif
                                                        </div>
                                                    @endif
                                                    <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                </div>
                                            </div>
                                            @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                        </div>
                                    </div>
                                    @if ($owner_two_data == true)
                                        @php
                                            $sign_id = 2;
                                            $sign_field = 'initial_'. $sign_id;
                                            $sign_field_value = @$data[$sign_field];
                                        @endphp
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div id="signbox_{{ $sign_id }}"
                                                class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                        <div>
                                                            <label>Owner 2 Initials</label>
                                                        </div>
                                                        @if(@$sign_field_value=='')
                                                            {!! SignPad($sign_id, 'Initials') !!}
                                                            @if(old($sign_field))
                                                                <div class="sign-pad signtyped old_sign">
                                                                    @if(is_base64(old($sign_field))==true)
                                                                        <img src="{{ old($sign_field) }}">
                                                                    @else
                                                                        {{ old($sign_field) }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="sign-pad signtyped">
                                                                @if(is_base64($sign_field_value)==true)
                                                                    <img src="<?php echo $sign_field_value; ?>">
                                                                @else
                                                                    {{ $sign_field_value }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <p class="mb-20"><strong>The Owner hereby employs the Agent exclusively to rent, lease, operate and manage the Property at:</strong></p>
                                <div class="form-row-group">
                                    <div class="form-row row">
                                        <div class="col-12 col-sm-4 col-md-4">
                                            <div class="md-form {{ $errors->has('manage_p_at_9.0') ? 'has-error' : '' }}">
                                                <input id="field_id_15" name="manage_p_at_9[0]" value="{{ old('manage_p_at_9.0', $manage_p_at_9[0] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_15">Suite#</label>
                                                @if ($errors->has('manage_p_at_9.0'))<span class="text-danger">{{ $errors->first('manage_p_at_9.0') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4">
                                            <div class="md-form required {{ $errors->has('manage_p_at_9.1') ? 'has-error' : '' }}">
                                                <input id="field_id_16" onkeyup="initAutocomplete(this.id)" name="manage_p_at_9[1]" value="{{ old('manage_p_at_9.1', $manage_p_at_9[1] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_16">Address</label>
                                                @if ($errors->has('manage_p_at_9.1'))<span class="text-danger">{{ $errors->first('manage_p_at_9.1') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('manage_p_at_9.2') ? 'has-error' : '' }}">
                                                <input id="field_id_17" name="manage_p_at_9[2]" value="{{ old('manage_p_at_9.2', $manage_p_at_9[2] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_17">City</label>
                                                @if ($errors->has('manage_p_at_9.2'))<span class="text-danger">{{ $errors->first('manage_p_at_9.2') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('manage_p_at_9.3') ? 'has-error' : '' }}">
                                                <input id="field_id_18" name="manage_p_at_9[3]" value="{{ old('manage_p_at_9.3', $manage_p_at_9[3] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_18">State / Province / Region</label>
                                                @if ($errors->has('manage_p_at_9.3'))<span class="text-danger">{{ $errors->first('manage_p_at_9.3') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('manage_p_at_9.4') ? 'has-error' : '' }}">
                                                <input id="field_id_19" name="manage_p_at_9[4]" value="{{ old('manage_p_at_9.4', $manage_p_at_9[4] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_19">ZIP / Postal Code</label>
                                                @if ($errors->has('manage_p_at_9.4'))<span class="text-danger">{{ $errors->first('manage_p_at_9.4') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required mdb-select-wrap {{ $errors->has('manage_p_at_9.5') ? 'has-error' : '' }}">
                                                <select id="field_id_19_2" class="mdb-select md-form initialized w-100" name="manage_p_at_9[5]">
                                                    <option value="">Select Country*</option>
                                                    @php
                                                        $sel_country = old('manage_p_at_9.5', @$manage_p_at_9[5]);
                                                        if(empty($sel_country)){
                                                            $sel_country = 'CA';
                                                        }
                                                    @endphp
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->iso }}" {{ $sel_country==$country->iso ? 'selected' : '' }} >{{ $country->nicename }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('manage_p_at_9.5'))<span class="text-danger">{{ $errors->first('manage_p_at_9.5') }}</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>CURRENT OCCUPANCY STATUS:</h4>
                                <div class="form-check" style="display: inline-block; margin-right: 20px;">
                                    <input class="form-check-input filled-in" name="occu_status" value="Vacant"  id="occu_status_1" type="radio" @if(old('occu_status', @$data->occu_status)=="Vacant") checked @endif @if(old('occu_status', @$data->occu_status)=="") checked @endif>
                                    <label class="form-check-label" for="occu_status_1"> Vacant</label>
                                </div>
                                <div class="form-check" style="display: inline-block; margin-right: 20px;">
                                    <input class="form-check-input filled-in" name="occu_status" value="Owner Occupied" id="occu_status_2" type="radio" @if(old('occu_status', @$data->occu_status)=="Owner Occupied") checked @endif>
                                    <label class="form-check-label" for="occu_status_2"> Owner Occupied</label>
                                </div>
                                <div class="form-check" style="display: inline-block; margin-right: 20px;">
                                    <input class="form-check-input filled-in" name="occu_status" value="Tenant" id="occu_status_3" type="radio" @if(old('occu_status', @$data->occu_status)=="Tenant")  checked @endif>
                                    <label class="form-check-label" for="occu_status_3">Tenant Occupied</label>
                                </div>
                                <div id="tenant_occup">
                                    <p><strong>Occupancy Tenant Info:</strong></p>
                                    <div class="form-row row">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form {{ $errors->has('occupancy_tenant_info.tenant_name') ? 'has-error' : '' }}">
                                                <input id="tenant_field_id_13" name="occupancy_tenant_info[tenant_name]" value="{{ old('occupancy_tenant_info.tenant_name', @$occupancy_tenant_info['tenant_name'])  }}" type="text" class="form-control">
                                                <label for="tenant_field_id_13">Tenant Name</label>
                                                @if ($errors->has('occupancy_tenant_info.tenant_name'))<span class="text-danger">{{ $errors->first('occupancy_tenant_info.tenant_name') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form {{ $errors->has('occupancy_tenant_info.tenant_email') ? 'has-error' : '' }}">
                                                <input id="tenant_field_id_14" name="occupancy_tenant_info[tenant_email]" value="{{ old('occupancy_tenant_info.tenant_email', @$occupancy_tenant_info['tenant_email'])  }}" type="text" class="form-control">
                                                <label for="tenant_field_id_14">Tenant Email</label>
                                                @if ($errors->has('occupancy_tenant_info.tenant_email'))<span class="text-danger">{{ $errors->first('occupancy_tenant_info.tenant_email') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form {{ $errors->has('occupancy_tenant_info.tenant_phone') ? 'has-error' : '' }}">
                                                <input id="tenant_field_id_14_1" name="occupancy_tenant_info[tenant_phone]" value="{{ old('occupancy_tenant_info.tenant_phone', @$occupancy_tenant_info['tenant_phone'])  }}" type="text" class="form-control">
                                                <label for="tenant_field_id_14_1">Tenant Phone</label>
                                                @if ($errors->has('occupancy_tenant_info.tenant_phone'))<span class="text-danger">{{ $errors->first('occupancy_tenant_info.tenant_phone') }}</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>RECITALS:</h4>
                                <div class="ol">
                                    <ol>
                                        <li>Owner holds Title to the following described real property:
                                            <div class="col-12 col-sm-12 col-md-12">
                                                <div class="md-form required {{ $errors->has('address_10') ? 'has-error' : '' }}">
                                                    <input type="text" id="field_id_20" name="address_10" value="{{ old('address_10', $data->address_10 ?? '') }}" class="form-control">
                                                    <label for="field_id_20">Property Address (here referred to as the "Property")</label>
                                                    @if ($errors->has('address_10'))<span class="text-danger">{{ $errors->first('address_10') }}</span>@endif
                                                </div>
                                                @if(!empty($data->owner_title))
                                                    <div class="image-responsive">
                                                        <img src="{{ asset('uploads/pma/ownerTitle/'.$data->owner_title)}}" alt="Owner Title" style="width: 25%">
                                                    </div>
                                                @else
                                                    <div class="md2-form position-relative{{ $errors->has('owner_title') ? 'has-error' : '' }}">
                                                        <input id="owner_title" name="owner_title" class="form-control" type="file">
                                                        <label for="owner_title">
                                                            <span class="icon"><i class="fa fa-upload"></i></span>
                                                            <span class="filename"></span>
                                                            <span class="info_text">Click to upload Owner Title (jpg, png) <span style="color:red">(Optional)</span>
                                                        </label>
                                                        @if ($errors->has('owner_title'))<span class="text-danger">{{ $errors->first('owner_title') }}</span>@endif
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                        <li>Agent is experienced in the business of operating and managing real estate similar to the above described property.</li>
                                        <li>Owner desires to engage the services of Agent to manage and operate the property, and Agent desires to provide such services on the following terms and conditions.</li>
                                    </ol>
                                </div>
                                <div class="form-row row" style="margin-top:20px; margin-bottom:20px">
                                    <div class="col-12 col-sm-4 col-md-4">
                                        @php
                                            $sign_id = 3;
                                            $sign_field = 'initial_'.$sign_id;
                                            $sign_field_value = @$data[$sign_field];
                                        @endphp
                                        <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                    <div>
                                                        <label for="initial_3">Owner Initials</label>
                                                    </div>
                                                    @if(@$sign_field_value=='')
                                                        {!! SignPad($sign_id, 'Initials') !!}
                                                        @if(old($sign_field))
                                                            <div class="sign-pad signtyped old_sign">
                                                                @if(is_base64(old($sign_field))==true)
                                                                    <img src="{{ old($sign_field) }}">
                                                                @else
                                                                    {{ old($sign_field) }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="sign-pad signtyped">
                                                            @if(is_base64($sign_field_value)==true)
                                                                <img src="<?php echo $sign_field_value; ?>">
                                                            @else
                                                                {{ $sign_field_value }}
                                                            @endif
                                                        </div>
                                                    @endif
                                                    <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                </div>
                                            </div>
                                            @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                        </div>
                                    </div>
                                    @if($owner_two_data == true)
                                        @php
                                            $sign_id = 4;
                                            $sign_field = 'initial_'.$sign_id;
                                            $sign_field_value = @$data[$sign_field];
                                        @endphp
                                        <div class="col-12 col-sm-4 col-md-4">
                                            <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                        <div>
                                                            <label>Owner 2 Initials</label>
                                                        </div>
                                                        @if(@$sign_field_value=='')
                                                            {!! SignPad($sign_id, 'Initials') !!}
                                                            @if(old($sign_field))
                                                                <div class="sign-pad signtyped old_sign">
                                                                    @if(is_base64(old($sign_field))==true)
                                                                        <img src="{{ old($sign_field) }}">
                                                                    @else
                                                                        {{ old($sign_field) }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="sign-pad signtyped">
                                                                @if(is_base64($sign_field_value)==true)
                                                                    <img src="<?php echo $sign_field_value; ?>">
                                                                @else
                                                                    {{ $sign_field_value }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <h4>In consideration of the mutual covenants contained herein, the parties agree:</h4>
                                <h4 style="color:#ed2324;margin-bottom: 0;">REQUIRED SERVICE:</h4>
                                <div class="form-row">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div style="margin-top: 0;" class="md-form required mdb-select-wrap {{ $errors->has('management_type') ? 'has-error' : '' }}">
                                            <select id="management_type" class="mdb-select md-form initialized w-100" name="management_type">
                                                <option value="Full Property Management" {{ (old('management_type', $data->management_type) == 'Full Property Management') ? 'selected' : '' }}>Full Property Management (Month to Month Contract)</option>
                                                <option value="Tenant Placement Only" {{ (old('management_type', $data->management_type) == 'Tenant Placement Only') ? 'selected' : '' }}>Tenant Placement Only</option>
                                            </select>
                                            @if ($errors->has('management_type'))<span class="text-danger">{{ $errors->first('management_type') }}</span>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="ol">
                                    <ol>
                                        <li><strong>EMPLOYMENT OF AGENT</strong>
                                            <ul class="no-ol">
                                                <li>Agent shall act as the exclusive Agent of Owner to manage, operate and maintain the property.</li>
                                            </ul>
                                        </li>
                                        <li><strong>BEST EFFORTS OF AGENT</strong>
                                            <ol start="2">
                                                <li>On assuming the management and operation of the property Agent shall thoroughly inspect the property and submit a written reports to the Owner. The written reports shall include the move-in and move-out inspections and condition inspections.</li>
                                                <li>Agent shall perform a thorough background check of prospective Tenant, including credit worthiness.</li>
                                                <li>Agent shall provide legally enforceable Residential Tenancy Agreement as per the BC Residential Tenancy Act.</li>
                                            </ol>
                                        </li>
                                        <li><strong>LEASING OF PROPERTY</strong>
                                            <ol start="3">
                                                <li>Agent shall make reasonable effort to lease the available space of the property, and shall be responsible for all negotiations with prospective Tenant.</li>
                                                <li>After a background check of the prospective Tenant has been performed and the Agent deems the Tenant qualified, the Owner authorizes the Agent to approve the Tenant, execute and enter into tenancies of the units of the property, on the behalf of the Owner. No further authorization by the Owner will be required.</li>
                                                <li>Agent may negotiate and is authorized to execute all extensions and renewals of such tenancies. The lease shall be in strict accordance with the Residential Tenancy Act of BC, also known as “RTA”.</li>
                                                <li>Agent shall inform the owner of the intent of the tenant to move out of the property via email. The Owner shall confirm in writing whether the Agent should start advertising the Property for rent within 7 days after the email was sent. Should the Owner not confirm within the 7 days, the Agent shall start advertising the Property and the Agent is authorized to execute and enter into tenancies as per section 3.1 and 3.2. of this agreement.</li>
                                            </ol>
                                        </li>
                                        <li><strong>ADVERTISING AND PROMOTION</strong>
                                            <ul class="no-ol">
                                                <li>Agent shall advertise vacancies by all reasonable and proper means; provided, Agent shall not incur expenses for advertising in excess of $
                                                    <div class="md-form md-form-inline required {{ $errors->has('ad_excess_11') ? 'has-error' : '' }}">
                                                        <input type="text" id="field_id_21" name="ad_excess_11" value="{{ old('ad_excess_11', $data->ad_excess_11 ?? '0') }}" class="form-control color-yellow" placeholder='0'>
                                                    </div> during any calendar year without the prior written consent of Owner. (Generally paid advertising is optional and not required).
                                                </li>
                                            </ul>
                                        </li>
                                        <div class="form-row row" style="margin-top:20px; margin-bottom:20px">
                                            <div class="col-12 col-sm-4 col-md-4">
                                                @php
                                                    $sign_id = 5;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div>
                                                                <label for="initial_5">Owner Initials</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                @if(old($sign_field))
                                                                <div class="sign-pad signtyped old_sign">
                                                                    @if(is_base64(old($sign_field))==true)
                                                                        <img src="{{ old($sign_field) }}">
                                                                    @else
                                                                        {{ old($sign_field) }}
                                                                    @endif
                                                                </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                </div>
                                            </div>
                                            @if($owner_two_data == true)
                                                @php
                                                    $sign_id = 6;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                                <div>
                                                                    <label>Owner 2 Initials</label>
                                                                </div>
                                                                @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true) <img
                                                                            src="{{ old($sign_field) }}">
                                                                        @else
                                                                        {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                    @endif
                                                                @else
                                                                    <div class="sign-pad signtyped">
                                                                        @if(is_base64($sign_field_value)==true)
                                                                            <img src="<?php echo $sign_field_value; ?>">
                                                                        @else
                                                                            {{ $sign_field_value }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                                <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <li><strong>MAINTENANCE, REPAIRS AND OPERATIONS</strong>
                                            <ol start="5">
                                                <li>Agent shall use its best efforts to ensure that the property is maintained in an attractive condition and in a good state of repair. In this regard, Agent shall use its best skills and efforts to serve the Tenant of the property with the necessary supplies. Agent shall make or cause to be made necessary repairs and alterations. Expenditures for repairs, alterations, decorations or furnishing in excess of $
                                                    <div class="md-form md-form-inline required {{ $errors->has('furn_excess_12') ? 'has-error' : '' }}">
                                                        <input type="text" id="field_id_22" name="furn_excess_12" value="{{ old('furn_excess_12', $data->furn_excess_12 ?? '250') }}" class="form-control color-yellow" placeholder='0'>
                                                    </div> shall not be made without prior written consent of Owner, except in the case of emergency, or if Agent in good faith determines that such expenditures are necessary to protect the property from damage, to prevent injury to persons or loss of life, or to maintain services to Tenant.</li>
                                                <li>Agent shall make reasonable effort to inform the owner of any necessary repairs in excess of the $ amount set in 5.1. of this agreement. Should the Owner fail to provide a written response within 3 days after the Owner was informed, generally via email, the Owner authorizes the Agent to arrange the repair at a reasonable cost and the Owner agrees to reimburse the Agent for the cost of the repair. The reimbursement shall be made either by deduction of the cost of the repair from the collected rent or by direct payment to the agent.</li>
                                            </ol>
                                        </li>
                                        <div class="form-row row" style="margin-top:20px; margin-bottom:20px">
                                            <div class="col-12 col-sm-4 col-md-4">
                                                @php
                                                    $sign_id = 7;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div>
                                                                <label for="initial_7">Owner Initials</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true)
                                                                            <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                            {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value) == true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                </div>
                                            </div>
                                            @if($owner_two_data == true)
                                                @php
                                                    $sign_id = 8;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                                <div>
                                                                    <label>Owner 2 Initials</label>
                                                                </div>
                                                                @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                        <div class="sign-pad signtyped old_sign">
                                                                            @if(is_base64(old($sign_field))==true) <img
                                                                                src="{{ old($sign_field) }}">
                                                                            @else
                                                                            {{ old($sign_field) }}
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <div class="sign-pad signtyped">
                                                                        @if(is_base64($sign_field_value)==true)
                                                                            <img src="<?php echo $sign_field_value; ?>">
                                                                        @else
                                                                            {{ $sign_field_value }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                                <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <li><strong>GOVERNMENT REGULATIONS</strong>
                                            <ul class="no-ol">
                                                <li>Agent shall manage the property in full compliance with all laws and regulations of any federal, provincial or municipal authority having jurisdiction over the property. </li>
                                            </ul>
                                        </li>
                                        <li><strong>THIRD PARTY LIABILITY DISCLAIMER</strong>
                                            <ul class="no-ol">
                                                <li>The Owner further agrees:</li>
                                            </ul>
                                            <ol start="7">
                                                <li>To save the Agent harmless from all damage suits in connection with the management of the herein described property and from liability from injury suffered by any employee or other person whomsoever, and to carry, at the Owner’s expense, necessary public liability and Worker’s Compensation insurance adequate to protect the interest of the parties hereto, which policies shall be written to protect the Agent in the same manner and to the same extent they protect the Owner. The Agent also shall not be liable for any error of judgement, except in cases of wilful misconduct or gross negligence.</li>
                                                <li>Upon approval by the Owner, the Agent is authorised to pay property taxes, special assessment, and to place fire, liability, steam boiler, pressure vessel, or any other insurance required, and the Agent is hereby directed to accrue and pay for same from the Owner’s funds. All of these payments are subject to prior written consent by the Owner in the form of email, written note, mail or text message. </li>
                                            </ol>
                                        </li>
                                        <li><strong>COLLECTION OF RENT, INSTITUTION OF LEGAL ACTION</strong>
                                            <ol start="8">
                                                <li>Agent shall use its best efforts to collect promptly all rents and other income issuing from the property when such amounts become due. It is understood that the Agent does not guarantee the  collection of rents.</li>
                                                <li>Agent shall collect a security deposit and pet deposit (if applicable) of half month’s rent each (maximum allowable amount under the BC Residential Tenancy Act; this deposit will be held by trust by {{ appName() }} Real Estate Management and will be returned to the tenant at the end of the Tenancy net of any costs for damages or extraordinary cleaning; also as per the RTA, interest must be paid on all damage deposits, this amount will be charged and withdrawn from the Owner's account.</li>
                                                <li>{{ appName() }} Real Estate Management is a fully licensed Real Estate Brokerage, governed by the Real Estate Services Act of BC and all rent monies are held in Trust.<br /> Any interest earned in the Agent’s Trust Account, accrues to the benefit of the Real Estate Foundation of British Columbia. (sec. 29(1)).</li>
                                                <li>The agreed initial asking rent is Initial Asking Rent $
                                                    <div class="md-form md-form-inline required {{ $errors->has('IA_rent_13') ? 'has-error' : '' }}">
                                                        <input type="text" id="field_id_23" name="IA_rent_13" value="{{ old('IA_rent_13', $data->IA_rent_13 ?? '0') }}" class="form-control color-yellow" placeholder=''>
                                                    </div>(utilities
                                                    <div class="md-form md-form-inline required {{ $errors->has('utilities_14') ? 'has-error' : '' }}">
                                                        <!--<input type="text" id="field_id_24" name="utilities_14" value="{{ old('utilities_14', $data->utilities_14 ?? '') }}" class="form-control" placeholder=''>-->
                                                        <select id="field_id_24" class="mdb-select md-form initialized w-100" name="utilities_14">
                                                            <option value="not included" @if(old('utilities_14', @$data->utilities_14)=="not included") selected @endif>not included</option>
                                                            <option value="included" @if(old('utilities_14', @$data->utilities_14)=="included") selected @endif>included</option>
                                                        </select>
                                                    </div>). The Owner understands that in the event the property cannot be rented at the agreed initial asking price, it may be necessary to lower the rental asking price. The Owner acknowledges that Agent has expert knowledge of rental market conditions and appropriate rental rates. The Owner authorises a $100 discretion to the Agent (i.e. rent deduction).</li>
                                                <li>Arranging for the direct deposit of your rent on or before of the 15th of the month.</li>
                                                <div class="form-row row" style="margin-top:20px; margin-bottom:20px">
                                                    <div class="col-12 col-sm-4 col-md-4">
                                                        @php
                                                            $sign_id = 9;
                                                            $sign_field = 'initial_'.$sign_id;
                                                            $sign_field_value = @$data[$sign_field];
                                                        @endphp
                                                        <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                                    <div>
                                                                        <label for="initial_9">Owner Initials</label>
                                                                    </div>
                                                                    @if(@$sign_field_value=='')
                                                                        {!! SignPad($sign_id, 'Initials') !!}
                                                                        @if(old($sign_field))
                                                                            <div class="sign-pad signtyped old_sign">
                                                                                @if(is_base64(old($sign_field))==true) <img
                                                                                    src="{{ old($sign_field) }}">
                                                                                @else
                                                                                    {{ old($sign_field) }}
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <div class="sign-pad signtyped">
                                                                            @if(is_base64($sign_field_value)==true)
                                                                                <img src="<?php echo $sign_field_value; ?>">
                                                                            @else
                                                                                {{ $sign_field_value }}
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                    <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                                </div>
                                                            </div>
                                                            @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                        </div>
                                                    </div>
                                                    @if($owner_two_data == true)
                                                        @php
                                                            $sign_id = 10;
                                                            $sign_field = 'initial_'.$sign_id;
                                                            $sign_field_value = @$data[$sign_field];
                                                        @endphp
                                                        <div class="col-12 col-sm-4 col-md-4">
                                                            <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                                        <div>
                                                                            <label>Owner 2 Initials</label>
                                                                        </div>
                                                                        @if(@$sign_field_value=='')
                                                                            {!! SignPad($sign_id, 'Initials') !!}
                                                                            @if(old($sign_field))
                                                                                <div class="sign-pad signtyped old_sign">
                                                                                    @if(is_base64(old($sign_field))==true)
                                                                                        <img src="{{ old($sign_field) }}">
                                                                                    @else
                                                                                        {{ old($sign_field) }}
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <div class="sign-pad signtyped">
                                                                                @if(is_base64($sign_field_value)==true)
                                                                                    <img src="<?php echo $sign_field_value; ?>">
                                                                                @else
                                                                                    {{ $sign_field_value }}
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <li>Agent shall, in the name of Owner, execute and serve such notices and demands on delinquent Tenant as Agent may deem necessary or proper. Agent, in the name of Owner, shall institute, settle or compromise any legal action and make use of such methods of legal process against a delinquent Tenant or the property of a delinquent Tenant as may be necessary to enforce the collection of rent or other sums due from the Tenant, to enforce any covenants or conditions of the Residential Tenancy Agreement and to recover possession of any part of the property. No other form of legal action will be instituted and no settlement, compromise, or adjustment of any matters involved therein shall be made without the prior written consent of Owner, except when Agent determines that immediate action is necessary.</li>
                                            </ol>
                                        </li>
                                        <li><strong>RECORDS AND REPORTS</strong>
                                            <ol start="9">
                                                <li>Agent will keep records, including but not limited to: Residential Tenancy Agreement; bylaw notices; fines from the strata management company.</li>
                                                <li>Agent will calculate and provide annual income and expense by February 28 of each calendar year.</li>
                                                <li>Agent will inform the Owner upon receiving proper termination notice from the Tenant and re-lease the property as outlined in Section 3.1 of this agreement unless the Owner advises the Agent otherwise</li>
                                                <li>Agent will provide the Owner with a monthly statement of rental income and expenses by the 15th of each month by granting the Owner access to his/her online profile where such statements can be generated and downloaded.</li>
                                            </ol>
                                        </li>
                                        <li><strong>COMPENSATION OF AGENT</strong>
                                            <ul class="no-ol">
                                                <li>The Owner agrees to pay the Agent:</li>
                                            </ul>
                                            <ol start="10">
                                                <li>
                                                    <div class="md-form md-form-inline">
                                                        @php
                                                            if(isset($manage_p_at_9[2]) && strtoupper($manage_p_at_9[2])=='VANCOUVER'){
                                                                $field_id_25 = '45%';
                                                            }else{
                                                                $field_id_25 = '45%';
                                                            }
                                                        @endphp
                                                        <input type="text" id="field_id_25" name="rent_gst_15" value="{{ $field_id_25 }}" class="form-control color-yellow" placeholder='' readonly="readonly" disabled="disabled" style="color: #000;">
                                                    </div> of 1 month’s rent + GST, Tenancy Placement Fee for any lease terms of 12 month or more for each unit.</li>
                                                <li>No additional placement fee will be charged within a fixed lease agreement in the event the Tenant cannot fulfil the terms of the lease.</li>
                                                <li>Management fee
                                                    <div class="md-form md-form-inline">
                                                        <input type="text" id="field_id_26" name="manage_fee_16" value="6%" class="form-control color-yellow" placeholder='' readonly="readonly" disabled="disabled" style="color: #000;">
                                                    </div> of Gross monthly rent commencing on the first month of rent plus GST per month or a minimum of $80 plus GST for a condo/townhouse or a minimum of $120 plus GST for a house, whichever is greater.</li>
                                                <li>The actual cost of material and labour for maintenance and repair.</li>
                                                <li>The actual cost of any disbursement (i.e. print, advertisement, legal, trades, consultants etc).</li>
                                                <li>All tenancy contracts, unless otherwise negotiated, will be for a minimum of 12 months lease.</li>
                                                <li>No fee will be charged for renewing leases or terminations of an existing lease.</li>
                                                <li>Liquidated damages as per the Residential Tenancy Agreement will be charged to the Tenant's security deposit and retained as a fee by the Agent in the event a Tenant ends the lease prior to expiry of the tenancy agreement.</li>
                                                <li>Owner shall furnish Agent with three complete sets of keys to the unit and all extra garage door openers (if applicable) to property within one week of signing this Agreement. One set shall be retained by Agent, and two sets to be furnished to Tenant. If the three complete sets of keys to the unit and all extra garage door openers (if applicable) are not delivered by the Owner within one week of signing this Agreement, the Owner authorizes the Agent to obtain the copies to have complete 3 sets and agrees to reimburse the agent for the copy making.</li>
                                                <li>The Owner agrees to hand over the property to the agent in a good repair. The property shall be in good operating and ready to move-in condition and free of material defects.</li>
                                                <li>Owner confirms that he/she is authorized to rent the property. If there are any issues with strata management, the owner takes full responsibility to resolve the issues before this agreement is signed. Shall the agent find a qualified tenant and not be able to execute the tenancy agreement due to the owner’s failure to obtain an authorization to rent from the strata corporation, the owner agrees to pay the agent the placement fee in full.</li>
                                            </ol>
                                        </li>
                                        <div class="form-row row" style="margin-top:20px; margin-bottom:20px">
                                            <div class="col-12 col-sm-4 col-md-4">
                                                @php
                                                    $sign_id = 11;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div>
                                                                <label for="initial_11">Owner Initials</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true) <img
                                                                            src="{{ old($sign_field) }}">
                                                                        @else
                                                                            {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                </div>
                                            </div>
                                            @if($owner_two_data == true)
                                                @php
                                                    $sign_id = 12;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                                <div>
                                                                    <label>Owner 2 Initials</label>
                                                                </div>
                                                                @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                        <div class="sign-pad signtyped old_sign">
                                                                            @if(is_base64(old($sign_field))==true)
                                                                                <img src="{{ old($sign_field) }}">
                                                                            @else
                                                                                {{ old($sign_field) }}
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <div class="sign-pad signtyped">
                                                                        @if(is_base64($sign_field_value)==true)
                                                                            <img src="<?php echo $sign_field_value; ?>">
                                                                        @else
                                                                            {{ $sign_field_value }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                                <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <li><strong>LEASE TERMS</strong>
                                            <ol start="11">
                                                <li>The Owner agrees that the following items are included:</li>
                                            </ol>
                                            <ul class="no-ol">
                                                <li>
                                                    <div class="form-check  md-form-inline-check">
                                                        @if(isset($items_inc_17) && !isset($items_inc_17[0]))
                                                            <input class="form-check-input filled-in" name="items_inc_17[0]" value="1" id="field_id_27" type="checkbox">
                                                        @else
                                                            <input class="form-check-input filled-in" name="items_inc_17[0]" value="1" id="field_id_27" type="checkbox" @if(old('items_inc_17.0', @$items_inc_17[0])=="1" ) checked @endif>
                                                        @endif
                                                        <label class="form-check-label" for="field_id_27"> Parking x </label>
                                                    </div>
                                                    <div class="md-form md-form-inline {{ $errors->has('parking_17_1') ? 'has-error' : '' }}">
                                                        <input type="text" id="field_id_28" name="parking_17_1" value="{{ old('parking_17_1', $data->parking_17_1 ?? '') }}" class="form-control" placeholder=''>
                                                    </div> (Stall #
                                                    <div class="md-form md-form-inline {{ $errors->has('stall_17_2') ? 'has-error' : '' }}">
                                                        <input type="text" id="field_id_29" name="stall_17_2" value="{{ old('stall_17_2', $data->stall_17_2 ?? '') }}" class="form-control" placeholder=''>
                                                    </div>
                                                    )
                                                </li>
                                                @if($errors->has('parking_17_1'))<span class="text-danger">{{  $errors->first('parking_17_1') }}</span>@endif
                                                @if($errors->has('stall_17_2'))<span class="text-danger">{{ $errors->first('stall_17_2')  }}</span>@endif
                                                <li>
                                                    <div class="form-check  md-form-inline-check">
                                                        <input class="form-check-input filled-in" name="items_inc_17[1]" value="1" id="field_id_30" type="checkbox" @if(old('items_inc_17.1', @$items_inc_17[1])=="1" ) checked @endif>
                                                        <label class="form-check-label" for="field_id_30"> Storage </label>
                                                    </div>
                                                    <div class="md-form md-form-inline">
                                                        <input type="text" id="field_id_31" name="storage_17_3" value="{{ old('storage_17_3', $data->storage_17_3 ?? '') }}" class="form-control" placeholder=''>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check  md-form-inline-check">
                                                        <input class="form-check-input filled-in" name="items_inc_17[2]" value="1" id="field_id_32" type="checkbox" @if(old('items_inc_17.2', @$items_inc_17[2])=="1" ) checked @endif>
                                                        <label class="form-check-label" for="field_id_32"> Hot Water </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check  md-form-inline-check">
                                                        <input class="form-check-input filled-in" name="items_inc_17[3]" value="1" id="field_id_33" type="checkbox" @if(old('items_inc_17.3', @$items_inc_17[3])=="1" ) checked @endif>
                                                        <label class="form-check-label" for="field_id_33"> Gas </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check  md-form-inline-check">
                                                        <input class="form-check-input filled-in" name="items_inc_17[4]" value="1" id="field_id_34" type="checkbox" @if(old('items_inc_17.4', @$items_inc_17[4])=="1" ) checked @endif>
                                                        <label class="form-check-label" for="field_id_34"> Cable TV </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check  md-form-inline-check">
                                                        <input class="form-check-input filled-in" name="items_inc_17[5]" value="1" id="field_id_35" type="checkbox" @if(old('items_inc_17.5', @$items_inc_17[5])=="1" ) checked @endif>
                                                        <label class="form-check-label" for="field_id_35"> Internet </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check  md-form-inline-check">
                                                        <input class="form-check-input filled-in" name="items_inc_17[6]" value="1" id="field_id_36" type="checkbox" @if(old('items_inc_17.6',  @$items_inc_17[6])=="1" ) checked @endif>
                                                        <label class="form-check-label" for="field_id_36"> Electricity </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check  md-form-inline-check">
                                                        <input class="form-check-input filled-in" name="items_inc_17[7]" value="1" id="field_id_37" type="checkbox" @if(old('items_inc_17.7', @$items_inc_17[7])=="1" ) checked @endif>
                                                        <label class="form-check-label" for="field_id_37"> Others </label>
                                                    </div>
                                                    <div class="md-form md-form-inline">
                                                        <input type="text" id="field_id_38" name="others_17_4" value="{{ old('others_17_4', $data->others_17_4 ?? '') }}" class="form-control" placeholder=''>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check  md-form-inline-check">
                                                        <input class="form-check-input filled-in" name="items_inc_17[8]" value="1" id="field_id_39" type="checkbox" @if(old('items_inc_17.8', @$items_inc_17[8])=="1" ) checked @endif>
                                                        <label class="form-check-label" for="field_id_39"> No utilities included </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <div class="form-row row" style="margin-top:20px; margin-bottom:20px">
                                            <div class="col-12 col-sm-4 col-md-4">
                                                @php
                                                    $sign_id = 13;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div>
                                                                <label for="initial_13">Owner Initials</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true)
                                                                            <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                            {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                </div>
                                            </div>
                                            @if($owner_two_data == true)
                                                @php
                                                    $sign_id = 14;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div id="signbox_{{ $sign_id }}"
                                                        class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                                <div>
                                                                    <label>Owner 2 Initials</label>
                                                                </div>
                                                                @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                        <div class="sign-pad signtyped old_sign">
                                                                            @if(is_base64(old($sign_field))==true)
                                                                                <img src="{{ old($sign_field) }}">
                                                                            @else
                                                                                {{ old($sign_field) }}
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <div class="sign-pad signtyped">
                                                                        @if(is_base64($sign_field_value)==true)
                                                                            <img src="<?php echo $sign_field_value; ?>">
                                                                        @else
                                                                            {{ $sign_field_value }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                                <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <li><strong>INSURANCE OF THE PROPERTY</strong>
                                            <ol start="12">
                                                <li>INSURANCE: The Owner shall carry and maintain a sufficient insurance coverage for his/her personal property together with sufficient insurance coverage including fire, smoke, water damage, theft and third party liability. The Owner agrees and promises to indemnify and save harmless the Agent in respect of all liabilities, fines, suits, claims, demands and actions of any kind. Owner shall provide a copy of the insurance policy to the Agent within 30 days after the commencement day of this contract.</li>
                                            </ol>
                                        </li>
                                        <li><strong>FURNISHINGS OF PROPERTY</strong> (Furnished properties only)
                                            <ol start="13">
                                                <li>The Agent does not guarantee condition of furnishing or missing items.</li>
                                                <li>The Agent will complete an inventory list which will be signed off by the Owner prior to the start of the lease and complete another inventory list at the end of the lease.</li>
                                                <li>The Owner should provide a price list for the items on the inventory list so it may be assessed to the Tenant's Security Deposit should an item be damaged or missing.</li>
                                            </ol>
                                        </li>
                                        <div class="form-row row" style="margin-top:20px; margin-bottom:20px">
                                            <div class="col-12 col-sm-4 col-md-4">
                                                @php
                                                    $sign_id = 15;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div>
                                                                <label for="initial_15">Owner Initials</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true)
                                                                            <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                            {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                </div>
                                            </div>
                                            @if($owner_two_data == true)
                                                @php
                                                    $sign_id = 16;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                                <div>
                                                                    <label>Owner 2 Initials</label>
                                                                </div>
                                                                @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                        <div class="sign-pad signtyped old_sign">
                                                                            @if(is_base64(old($sign_field))==true)
                                                                                <img src="{{ old($sign_field) }}">
                                                                            @else
                                                                                {{ old($sign_field) }}
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <div class="sign-pad signtyped">
                                                                        @if(is_base64($sign_field_value)==true)
                                                                            <img src="<?php echo $sign_field_value; ?>">
                                                                        @else
                                                                            {{ $sign_field_value }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                                <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <li><strong>COMMENCEMENT, RENEWAL AND TERMINATION OF AGREEMENT</strong>
                                            <ol start="14">
                                                <li>The Agreement is to commence immediately. The Agreement stays in effect unless either party serves a proper notice. Either party may terminate the agreement at any time by serving the other party a minimum of 30 days written notice, the effective day being the last day of any calendar month.</li>
                                                <li>The Owner shall honour all existing tenancies, agreements, notices signed prior to the receipt of the notice to terminate the agreement.</li>
                                                <li>If the Owner wishes to cancel the agreement prior to placement of Tenant after the Agent started marketing the Property (an ad had been posted on craigslist.org), either after the commencement of the property management agreement, or after the previous tenant vacated the Property, the Owner agrees to pay a compensation to the Agent in the amount of $500 plus applicable taxes. In addition the owner agrees to reimburse the agent for any expenses incurred in the process of renting the Property.</li>
                                                <li>If the Property remains unrented after ninety days due to Owner’s failure to accept the Agent recommendations regarding appropriate rental rates, Agent may, at the Agent’s discretion, terminate this agreement with immediate effect and the Owner agrees to pay a compensation to the Agent in the amount of $500 plus applicable taxes. In addition the owner agrees to reimburse the agent for any expenses incurred in the process of renting the Property.</li>
                                            </ol>
                                        </li>
                                        <div class="form-row row" style="margin-top:20px; margin-bottom:20px">
                                            <div class="col-12 col-sm-4 col-md-4">
                                                @php
                                                    $sign_id = 17;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div>
                                                                <label for="initial_17">Owner Initials</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true)
                                                                            <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                            {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                </div>
                                            </div>
                                            @if($owner_two_data == true)
                                                @php
                                                    $sign_id = 18;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$data[$sign_field];
                                                @endphp
                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                                <div>
                                                                    <label>Owner 2 Initials</label>
                                                                </div>
                                                                @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                        <div class="sign-pad signtyped old_sign">
                                                                            @if(is_base64(old($sign_field))==true)
                                                                                <img src="{{ old($sign_field) }}">
                                                                            @else
                                                                                {{ old($sign_field) }}
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <div class="sign-pad signtyped">
                                                                        @if(is_base64($sign_field_value)==true)
                                                                            <img src="<?php echo $sign_field_value; ?>">
                                                                        @else
                                                                            {{ $sign_field_value }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                                <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <li><strong>PRIVACY STATEMENT</strong>
                                            <ol start="15">
                                                <li>Agent only collects personal information necessary to effectively market to rent the property of clients, to locate, assess and qualify properties for Tenant and to otherwise provide professional and competent real estate services to clients and customers.</li>
                                            </ol>
                                        </li>
                                    </ol>
                                    <p><strong>The above agreement is accepted and signed by:</strong></p>
                                    <div class="form-row row">
                                        <div class="col-12 col-sm-4 col-md-4">
                                            @php
                                                $sign_id = 19;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$data[$sign_field];
                                            @endphp
                                            <div id="signbox_{{ $sign_id }}" class="form-row-group @if($errors->has($sign_field) or $errors->has('pName_18') or $errors->has('date_19')) has-error @endif">
                                                <div class="form-row">
                                                    <div class="col-12 col-sm-12 col-md-12">
                                                        <div>
                                                            <label for="initial_19">Signature of Property Owner <span style="color:red">*</span></label>
                                                        </div>
                                                        @if(@$sign_field_value=='')
                                                            {!! SignPad($sign_id, 'Authorized Signature') !!}
                                                            @if(old($sign_field))
                                                                <div class="sign-pad signtyped old_sign">
                                                                    @if(is_base64(old($sign_field))==true)
                                                                        <img src="{{ old($sign_field) }}">
                                                                    @else
                                                                        {{ old($sign_field) }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="sign-pad signtyped">
                                                                @if(is_base64($sign_field_value)==true)
                                                                    <img src="<?php echo $sign_field_value; ?>">
                                                                @else
                                                                    {{ $sign_field_value }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                        <div class="md-form required">
                                                            <input id="field_id_40" name="pName_18" value="{{ isset($user->name) ? $user->name : old('pName_18', $data->pName_18) }}" class="form-control" type="text">
                                                            <label for="field_id_40" class="">Printed name of Property Owner</label>
                                                        </div>
                                                        <div class="md-form required">
                                                            <input id="field_id_41" name="date_19" value="{{ old('date_19', $data->date_19 ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                            <label for="field_id_41" class="">Date</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has($sign_field) or $errors->has('pName_18') or $errors->has('date_19'))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                            </div>
                                        </div>
                                        @if($owner_two_data == true)
                                            @php
                                                $sign_id = 20;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$data[$sign_field];
                                            @endphp
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group @if($errors->has($sign_field) or $errors->has('pName_20') or $errors->has('date_21')) has-error @endif">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div>
                                                                <label for="initial_20">Signature of Property Owner 2</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Authorized Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true)
                                                                            <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                            {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            <div class="md-form required">
                                                                <input id="field_id_42" name="pName_20" value="{{ old('pName_20', $data->pName_20 ?? '') }}" class="form-control" type="text" placeholder="">
                                                                <label for="field_id_42" class="">Printed name of Property Owner</label>
                                                            </div>
                                                            <div class="md-form required">
                                                                <input id="field_id_43" name="date_21" value="{{ old('date_21', $data->date_21 ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="field_id_43" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field) or $errors->has('pName_20') or $errors->has('date_21'))<span class="text-danger">Please fill all the fields</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                        @if($agent_data == true)
                                            @php
                                                $sign_id = 25;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$data[$sign_field];
                                            @endphp
                                            <div class="col-12 col-sm-12 col-md-4">
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group @if($errors->has($sign_field) or $errors->has('AgentN_25') or $errors->has('Agentdate_25')) has-error @endif">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div>
                                                                <label>Signature of the Agent</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Authorized Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true)
                                                                            <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                            {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            <div class="md-form required">
                                                                <input id="field_id_42_25" name="AgentN_25" value="{{ old('AgentN_25', $data->AgentN_25 ?? '') }}" class="form-control" type="text">
                                                                <label for="field_id_42_25" class="">Printed name of Agent</label>
                                                            </div>
                                                            <div class="md-form required">
                                                                <input id="field_id_43_25" name="Agentdate_25" value="{{ old('Agentdate_25', date(" d/m/Y") ?? '' ) }}" class="form-control" type="text">
                                                                <label for="field_id_43_25" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field) or $errors->has('AgentN_25') or $errors->has('Agentdate_25'))<span class="text-danger">Please fill all the fields</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div id="registerd_owners">
                                        <h4>Authorization Form <small>(Please fill out as displayed on your void check or upload a void check)</small></h4>
                                        <p><strong>To Whom It May Concern:</strong></p>
                                        <div class="form-row row">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <strong>I,
                                                    <div class="md-form required md-form-inline {{ $errors->has('reg_own_23.0') ? 'has-error' : '' }}">
                                                        <input style="text-align:left" type="text" id="field_id_44" name="reg_own_23[0]" value="{{ old('reg_own_23.0', $reg_own_23[0] ?? null) }}" class="form-control" placeholder='Owner Full Name'>
                                                    </div>
                                                    @if($owner_two_data == true)
                                                        @if($owner_two_name == true)
                                                            , <div class="md-form required md-form-inline {{ $errors->has('reg_own_23.6') ? 'has-error' : '' }}">
                                                                <input style="text-align:left" type="text" id="field_id_o2_44" name="reg_own_23[6]"  value="{{ old('reg_own_23.6', $reg_own_23[6] ?? '') }}" class="form-control" placeholder='Owner 2 Full Name'>
                                                            </div>
                                                        @endif
                                                    @endif registered Owner of.
                                                </strong>
                                                @if ($errors->has('reg_own_23.0'))<br />
                                                    <span class="text-danger">{{ $errors->first('reg_own_23.0') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="md-form {{ $errors->has('reg_own_23.1') ? 'has-error' : '' }}">
                                                    <input id="field_id_45" name="reg_own_23[1]" value="{{ old('reg_own_23.1', $reg_own_23[1] ?? '') }}" type="text" class="form-control">
                                                    <label for="field_id_45">Suite#</label>
                                                    @if ($errors->has('reg_own_23.1'))<span class="text-danger">{{ $errors->first('reg_own_23.1') }}</span>@endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="md-form required {{ $errors->has('reg_own_23.2') ? 'has-error' : '' }}">
                                                    <input id="field_id_46" name="reg_own_23[2]" value="{{ old('reg_own_23.2', $reg_own_23[2] ?? '') }}" type="text" class="form-control">
                                                    <label for="field_id_46">Address</label>
                                                    @if ($errors->has('reg_own_23.2'))<span class="text-danger">{{ $errors->first('reg_own_23.2') }}</span>@endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="md-form required {{ $errors->has('reg_own_23.3') ? 'has-error' : '' }}">
                                                    <input id="field_id_47" name="reg_own_23[3]" value="{{ old('reg_own_23.3', $reg_own_23[3] ?? '') }}" type="text" class="form-control">
                                                    <label for="field_id_47">City</label>
                                                    @if ($errors->has('reg_own_23.3'))<span class="text-danger">{{ $errors->first('reg_own_23.3') }}</span>@endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="md-form required {{ $errors->has('reg_own_23.4') ? 'has-error' : '' }}">
                                                    <input id="field_id_48" name="reg_own_23[4]" value="{{ old('reg_own_23.4', $reg_own_23[4] ?? '') }}" type="text" class="form-control">
                                                    <label for="field_id_48">State / Province / Region</label>
                                                    @if ($errors->has('reg_own_23.4'))<span class="text-danger">{{ $errors->first('reg_own_23.4') }}</span>@endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="md-form required {{ $errors->has('reg_own_23.5') ? 'has-error' : '' }}">
                                                    <input id="field_id_49" name="reg_own_23[5]" value="{{ old('reg_own_23.5', $reg_own_23[5] ?? '') }}" type="text" class="form-control">
                                                    <label for="field_id_49">ZIP / Postal Code</label>
                                                    @if ($errors->has('reg_own_23.5'))<span class="text-danger">{{ $errors->first('reg_own_23.5') }}</span>@endif
                                                </div>
                                            </div>
                                            {{-- <div class="col-12 col-sm-6 col-md-4">
                                                <div class="md-form required mdb-select-wrap {{ $errors->has('manage_p_at_9.5') ? 'has-error' : '' }}">
                                                    <select id="field_id_19_2" class="mdb-select md-form initialized w-100" name="manage_p_at_9[5]">
                                                        <option value="">Select Country*</option>
                                                        @php
                                                            $sel_country = old('manage_p_at_9.5', @$manage_p_at_9[5]);
                                                            if(empty($sel_country)){
                                                                $sel_country = 'CA';
                                                            }
                                                        @endphp
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->iso }}" {{ $sel_country==$country->iso ? 'selected' : '' }} >{{ $country->nicename }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('manage_p_at_9.5'))<span class="text-danger">{{ $errors->first('manage_p_at_9.5') }}</span>@endif
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <p>hereby confirm that I have appointed {{ appName() }} Real Estate Management located at:<br /> B - 2127 Granville Street, Vancouver BC V6H 3E9 as my representative with respect to the management, leasing and maintenance of this property. {{ appName() }} Real Estate Management is hereby authorized to obtain keys, security passes or make any arrangements as may be necessary.</p>
                                    <p>Thank you for your cooperation.</p>
                                    <p>Sincerely,</p>
                                    <br />
                                    <div class="form-row row">
                                        <div class="col-12 col-sm-12 col-md-4">
                                            @php
                                                $sign_id = 21;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$data[$sign_field];
                                            @endphp
                                            <div id="signbox_{{ $sign_id }}" class="form-row-group @if($errors->has($sign_field) or $errors->has('pName_24') or $errors->has('date_25')) has-error @endif">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                        <div>
                                                            <label for="initial_21">Signature of Property Owner</label>
                                                        </div>
                                                        @if(@$sign_field_value=='')
                                                            {!! SignPad($sign_id, 'Authorized Signature') !!}
                                                            @if(old($sign_field))
                                                                <div class="sign-pad signtyped old_sign">
                                                                    @if(is_base64(old($sign_field))==true)
                                                                        <img src="{{ old($sign_field) }}">
                                                                    @else
                                                                        {{ old($sign_field) }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @else
                                                        <div class="sign-pad signtyped">
                                                            @if(is_base64($sign_field_value)==true)
                                                                <img src="<?php echo $sign_field_value; ?>">
                                                            @else
                                                                {{ $sign_field_value }}
                                                            @endif
                                                        </div>
                                                        @endif
                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                        <div class="md-form required">
                                                            <input id="field_id_50" name="pName_24" value="{{ isset($user->name) ? $user->name : old('pName_24', $data->pName_24) }}" class="form-control" type="text">
                                                            <label for="field_id_50" class="">Printed name of Property Owner</label>
                                                        </div>
                                                        <div class="md-form required">
                                                            <input id="field_id_51" name="date_25" value="{{ old('date_25', $data->date_25 ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                            <label for="field_id_51" class="">Date</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has($sign_field) or $errors->has('pName_24') or $errors->has('date_25'))<span class="text-danger">Please fill all the fields.</span>@endif
                                            </div>
                                        </div>
                                        @if($owner_two_data == true)
                                            @php
                                                $sign_id = 22;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$data[$sign_field];
                                            @endphp
                                            <div class="col-12 col-sm-12 col-md-4">
                                                <div id="signbox_{{ $sign_id }}"
                                                    class="form-row-group @if($errors->has($sign_field) or $errors->has('pName_26') or $errors->has('date27')) has-error @endif">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div>
                                                                <label for="initial_22">Signature of Property Owner 2</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Authorized Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true)
                                                                            <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                            {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            <div class="md-form required">
                                                                <input id="field_id_52" name="pName_26" value="{{ old('pName_26', $data->pName_26 ?? '') }}" class="form-control" type="text" placeholder="">
                                                                <label for="field_id_52" class="">Printed name of Property Owner 2</label>
                                                            </div>
                                                            <div class="md-form required">
                                                                <input id="field_id_53" name="date27" value="{{ old('date27', $data->date27 ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="field_id_53" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field) or $errors->has('pName_26') or $errors->has('date27'))<span class="text-danger">Please fill all the fields.</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <strong>RE:
                                                <div class="md-form md-form-inline required {{ $errors->has('re_reg_own_28.0') ? 'has-error' : '' }}" style="max-width: unset;padding-left:10px">
                                                    <input style="text-align:left" type="text" id="field_id_54" name="re_reg_own_28[0]" value="{{ old('re_reg_own_28.0', $re_reg_own_28[0] ?? '') }}" class="form-control" placeholder=' Building Name'>
                                                </div> Building (Property)
                                            </strong>
                                            @if ($errors->has('re_reg_own_28.0'))<br />
                                                <span class="text-danger">{{ $errors->first('re_reg_own_28.0') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4">
                                            <div class="md-form {{ $errors->has('re_reg_own_28.1') ? 'has-error' : '' }}">
                                                <input id="field_id_55" name="re_reg_own_28[1]" value="{{ old('re_reg_own_28.1', $re_reg_own_28[1] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_55">Suite#</label>
                                                @if ($errors->has('re_reg_own_28.1'))<span class="text-danger">{{ $errors->first('re_reg_own_28.1') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-4">
                                            <div class="md-form required {{ $errors->has('re_reg_own_28.2') ? 'has-error' : '' }}">
                                                <input id="field_id_56" name="re_reg_own_28[2]" value="{{ old('re_reg_own_28.2', $re_reg_own_28[2] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_56">Address</label>
                                                @if ($errors->has('re_reg_own_28.2'))<span class="text-danger">{{ $errors->first('re_reg_own_28.2') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('re_reg_own_28.3') ? 'has-error' : '' }}">
                                                <input id="field_id_57" name="re_reg_own_28[3]" value="{{ old('re_reg_own_28.3', $re_reg_own_28[3] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_57">City</label>
                                                @if ($errors->has('re_reg_own_28.3'))<span class="text-danger">{{ $errors->first('re_reg_own_28.3') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('re_reg_own_28.4') ? 'has-error' : '' }}">
                                                <input id="field_id_58" name="re_reg_own_28[4]" value="{{ old('re_reg_own_28.4', $re_reg_own_28[4] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_58">Province</label>
                                                @if ($errors->has('re_reg_own_28.4'))<span class="text-danger">{{ $errors->first('re_reg_own_28.4') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form required {{ $errors->has('re_reg_own_28.5') ? 'has-error' : '' }}">
                                                <input id="field_id_59" name="re_reg_own_28[5]" value="{{ old('re_reg_own_28.5', $re_reg_own_28[5] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_59">Postal Code</label>
                                                @if ($errors->has('re_reg_own_28.5'))<span class="text-danger">{{ $errors->first('re_reg_own_28.5') }}</span> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h4>1. Property Owner’s name and address</h4>
                                    <strong>I,
                                        <div class="md-form md-form-inline" style="max-width: unset;padding-left:10px">
                                            <input style="text-align:left" type="text" id="field_id_60" name="pw_name_29" value="{{ isset($user->name) ? $user->name : old('pw_name_29', $data->pw_name_29) }}" class="form-control" placeholder='Please enter name'>
                                        </div> warrant and represent that the following information is accurate.
                                        <p>Please fill out the information below as per the information on your bank cheque.</p>
                                    </strong>
                                    <h4>ACCOUNT HOLDER DETAILS</h4>
                                    <p><strong>Please fill out as displayed on your void check or upload a void check</strong>
                                    </p>
                                    <div class="form-row row">
                                        <div class="col-12 col-sm-12 col-md-2">
                                            <div class="md-form required {{ $errors->has('ac_holder_30.0') ? 'has-error' : '' }}">
                                                <input id="field_id_61" name="ac_holder_30[0]" value="{{ old('ac_holder_30.0', $ac_holder_30[0] ?? 'Mr.') }}" class="form-control" type="text">
                                                <label for="field_id_61">Mr./Mrs./Ms./Miss:</label>
                                                @if ($errors->has('ac_holder_30.0'))<span class="text-danger">{{ $errors->first('ac_holder_30.0') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-5">
                                            <div class="md-form required {{ $errors->has('ac_holder_30.1') ? 'has-error' : '' }}">
                                                <input id="field_id_62" name="ac_holder_30[1]" value="{{ old('ac_holder_30.1', $ac_holder_30[1] ?? null) }}" class="form-control" type="text">
                                                <label for="field_id_62">Last name</label>
                                                @if ($errors->has('ac_holder_30.1'))<span class="text-danger">{{ $errors->first('ac_holder_30.1') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-5">
                                            <div class="md-form required {{ $errors->has('ac_holder_30.2') ? 'has-error' : '' }}">
                                                <input id="field_id_63" name="ac_holder_30[2]" value="{{ old('ac_holder_30.2', $ac_holder_30[2] ?? null) }}" class="form-control" type="text">
                                                <label for="field_id_63">First Name</label>
                                                @if ($errors->has('ac_holder_30.2'))<span class="text-danger">{{ $errors->first('ac_holder_30.2') }}</span>@endif
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="md-form {{ $errors->has('ac_holder_30.4') ? 'has-error' : '' }}">
                                                <input id="field_id_65" name="ac_holder_30[4]" value="{{ old('ac_holder_30.4', $ac_holder_30[4] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_65">Unit number</label>
                                                @if ($errors->has('ac_holder_30.4'))<span class="text-danger">{{ $errors->first('ac_holder_30.4') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="md-form required {{ $errors->has('ac_holder_30.3') ? 'has-error' : '' }}">
                                                <input id="field_id_64" name="ac_holder_30[3]" value="{{ old('ac_holder_30.3', $ac_holder_30[3] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_64">Street address</label>
                                                @if ($errors->has('ac_holder_30.3'))<span class="text-danger">{{ $errors->first('ac_holder_30.3') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="md-form required {{ $errors->has('ac_holder_30.5') ? 'has-error' : '' }}">
                                                <input id="field_id_66" name="ac_holder_30[5]" value="{{ old('ac_holder_30.5', $ac_holder_30[5] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_66">City</label>
                                                @if ($errors->has('ac_holder_30.5'))<span class="text-danger">{{ $errors->first('ac_holder_30.5') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="md-form required {{ $errors->has('ac_holder_30.6') ? 'has-error' : '' }}">
                                                <input id="field_id_67" name="ac_holder_30[6]" value="{{ old('ac_holder_30.6', $ac_holder_30[6] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_67">Province</label>
                                                @if ($errors->has('ac_holder_30.6'))<span class="text-danger">{{ $errors->first('ac_holder_30.6') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="md-form required {{ $errors->has('ac_holder_30.7') ? 'has-error' : '' }}">
                                                <input id="field_id_68" name="ac_holder_30[7]" value="{{ old('ac_holder_30.7', $ac_holder_30[7] ?? '') }}" type="text" class="form-control">
                                                <label for="field_id_68">Postal Code</label>
                                                @if ($errors->has('ac_holder_30.7'))<span class="text-danger">{{ $errors->first('ac_holder_30.7') }}</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <h4>BANK DETAILS</h4>
                                    <p>Please fill out the bank details as shown below:</p>
                                    <div class="image-responsive"><img src="{{asset('img/pma/voided-check.jpg')}}" alt="voided-check"></div>
                                    <div class="form-row row">
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <div class="md-form required {{ $errors->has('bank_details_31.0') ? 'has-error' : '' }}">
                                                <input id="field_id_69" name="bank_details_31[0]" value="{{ old('bank_details_31.0', $bank_details_31[0] ?? '') }}" class="form-control" type="text">
                                                <label for="field_id_69" class="">Name of financial institution</label>
                                                @if ($errors->has('bank_details_31.0'))<span class="text-danger">{{ $errors->first('bank_details_31.0') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="md-form required {{ $errors->has('bank_details_31.1') ? 'has-error' : '' }}">
                                                <input id="field_id_70" name="bank_details_31[1]" value="{{ old('bank_details_31.1', $bank_details_31[1] ?? '') }}" class="form-control" type="text">
                                                <label for="field_id_70">Transit number (always 5 digits)</label>
                                                @if ($errors->has('bank_details_31.1'))<span class="text-danger">{{ $errors->first('bank_details_31.1') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="md-form required {{ $errors->has('bank_details_31.2') ? 'has-error' : '' }}">
                                                <input id="field_id_71" name="bank_details_31[2]" value="{{ old('bank_details_31.2', $bank_details_31[2] ?? '') }}" class="form-control" type="text">
                                                <label for="field_id_71">Institution number (always 3 digits)</label>
                                                @if ($errors->has('bank_details_31.2'))<span class="text-danger">{{ $errors->first('bank_details_31.2') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="md-form required {{ $errors->has('bank_details_31.3') ? 'has-error' : '' }}">
                                                <input id="field_id_72" name="bank_details_31[3]" value="{{ old('bank_details_31.3', $bank_details_31[3] ?? '') }}" class="form-control" type="text">
                                                <label for="field_id_72">Account number</label>
                                                @if ($errors->has('bank_details_31.3'))<span class="text-danger">{{ $errors->first('bank_details_31.3') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <p class="or" style="text-align:center">- - - - - - - - - - - - - OR - - - - - - - - - - - - - </p>
                                            @if(!empty($data->voided_check) && substr($data->voided_check, -4) == '.pdf')
                                                <div class="image-responsive">
                                                    <a href="{{ url('/images/checks/')}}/{{$data->voided_check}}" alt="voided-check" download>
                                                        <button type="button" class="btn btn-primary">Download Check</button>
                                                    </a>
                                                </div>
                                            @elseif(!empty($data->voided_check) && substr($data->voided_check, -4) != '.pdf')
                                                <div class="image-responsive">
                                                    <img src="{{ url('/images/checks/')}}/{{$data->voided_check}}" alt="voided-check">
                                                </div>
                                            @else
                                                <div class="md2-form position-relative {{ $errors->has('voided_check') ? 'has-error' : '' }}">
                                                    <input id="field_id_72_2" name="voided_check" class="form-control" type="file">
                                                    <label for="field_id_72_2">
                                                        <span class="icon"><i class="fa fa-upload"></i></span>
                                                        <span class="filename"></span>
                                                        <span class="info_text">Click to upload the check (pdf, jpg, png)<span style="color:red">(Optional)</span></span>
                                                    </label>
                                                    @if ($errors->has('voided_check'))<span class="text-danger">{{ $errors->first('voided_check') }}</span>@endif
                                                </div>
                                            @endif
                                            <br />
                                        </div>
                                    </div>
                                    <p>I/We will inform {{ appName() }} Real Estate Management in writing of any changes in the information provided in this section of the Authorization form.</p>
                                    <p>I/We agree that before transferring funds to our authorized account, {{ appName() }} Real Estate Management may deduct applicable monthly management fees, as well as expenses related directly to the management of my/our property/properties as per this agreement. </p>
                                    <p>I/We hereby authorize {{ appName() }} Real Estate Management to debit the above account in order to pay for property related expenses as outlined in section 5 of this agreement. </p>
                                    <br />
                                    <div class="form-row row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5">
                                            @php
                                                $sign_id = 23;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$data[$sign_field];
                                            @endphp
                                            <div id="signbox_{{ $sign_id }}" class="form-row-group @if($errors->has($sign_field) or $errors->has('pw_name_32') or $errors->has('date_33')) has-error @endif">
                                                <div class="form-row">
                                                    <div class="col-12">
                                                        <div class="md-form required">
                                                            <input id="field_id_73" name="pw_name_32" value="{{ old('pw_name_32', $data->pw_name_32) }}" class="form-control" type="text">
                                                            <label for="field_id_73" class="">Property Owner’s/Account Holder’s Name</label>
                                                        </div>
                                                        @if(@$sign_field_value=='')
                                                            {!! SignPad($sign_id, 'Authorized Signature') !!}
                                                            @if(old($sign_field))
                                                                <div class="sign-pad signtyped old_sign">
                                                                    @if(is_base64(old($sign_field))==true)
                                                                        <img src="{{ old($sign_field) }}">
                                                                    @else
                                                                        {{ old($sign_field) }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="sign-pad signtyped">
                                                                @if(is_base64($sign_field_value)==true)
                                                                    <img src="<?php echo $sign_field_value; ?>">
                                                                @else
                                                                    {{ $sign_field_value }}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                        <div class="md-form required">
                                                            <input id="field_id_75" name="date_33" value="{{ old('date_33', $data->date_33 ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                            <label for="field_id_75" class="">Date</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has($sign_field) or $errors->has('pw_name_32') or $errors->has('date_33'))<span class="text-danger">Please fill all the fields</span>@endif
                                            </div>
                                        </div>
                                        @if($owner_two_data == true)
                                            @php
                                                $sign_id = 24;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$data[$sign_field];
                                            @endphp
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5">
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group @if ($errors->has($sign_field) or $errors->has('pw_name_34') or $errors->has('date_35')) has-error @endif">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                                            <div class="md-form required">
                                                                <input id="field_id_76" name="pw_name_34" value="{{ old('pw_name_34', $data->pw_name_34 ?? '') }}" class="form-control" type="text">
                                                                <label for="field_id_76" class="">Property Owner’s/Account Holder’s Name</label>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Authorized Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true)
                                                                            <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                            {{ old($sign_field) }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                            <div class="md-form required">
                                                                <input id="field_id_78" name="date_35" value="{{ old('date_35', $data->date_35 ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="field_id_78" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has($sign_field) or $errors->has('pw_name_34') or $errors->has('date_35'))<span class="text-danger">Please fill all the fields</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <h4>Have promocode?:</h4>
                                <div class="form-row form-group">
                                    <div class="form-check col-4 col-sm-1 col-md-1">
                                        <input class="form-check-input filled-in" name="promo_code" value="yes" id="promo_code_1" type="radio" @if(old('promo_code', @$data->promo_code)=="yes") checked @endif>
                                        <label class="form-check-label" for="promo_code_1"> Yes</label>
                                    </div>
                                    <div class="form-check col-4 col-sm-1 col-md-1">
                                        <input class="form-check-input filled-in" name="promo_code" value="no" id="promo_code_2" type="radio" @if(old('promo_code', @$data->promo_code)=="no") checked @endif
                                        @if(old('promo_code', @$data->promo_code)=="") checked @endif>
                                        <label class="form-check-label" for="promo_code_2"> No</label>
                                    </div>
                                </div>
                                <div id="promocode_box">
                                    <div class="form-row">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="md-form {{ $errors->has('promocode') ? 'has-error' : '' }}">
                                                <input id="promo_code_text" name="promocode" value="{{ old('promocode', $data->promocode ?? '') }}" type="text" class="form-control">
                                                <label for="promo_code_text">Enter Promocode</label>
                                                @if ($errors->has('promocode'))<span class="text-danger">{{ $errors->first('promocode') }}</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="referral_box mb-3">
                                    <h5>How did you find us?</h5>
                                    <div class="form-check">
                                        <input class="form-check-input {{ $errors->has('referral') ? 'is-invalid' : '' }}" type="radio" name="referral" id="referral1" value="Google" {{ old('referral', @$data->referral) == 'Google' ? 'checked="checked"' : '' }}>
                                        <label class="form-check-label" for="referral1">Google</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input {{ $errors->has('referral') ? 'is-invalid' : '' }}" type="radio" name="referral" id="referral2" value="Facebook" {{ old('referral', @$data->referral) == 'Facebook' ? 'checked="checked"' : '' }}>
                                        <label class="form-check-label" for="referral2">Facebook</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input {{ $errors->has('referral') ? 'is-invalid' : '' }}" type="radio" name="referral" id="referral3" value="Instagram" {{ old('referral', @$data->referral) == 'Instagram' ? 'checked="checked"' : '' }}>
                                        <label class="form-check-label" for="referral3">Instagram</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input {{ $errors->has('referral') ? 'is-invalid' : '' }}" type="radio" name="referral" id="referral4" value="Friend Referral" {{ old('referral', @$data->referral) == 'Friend Referral' ? 'checked="checked"' : '' }}>
                                        <label class="form-check-label" for="referral4">Friend Referral</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input {{ $errors->has('referral') ? 'is-invalid' : '' }}" type="radio" name="referral" id="referral5" value="Realtor Referral" {{ old('referral', @$data->referral) == 'Realtor Referral' ? 'checked="checked"' : '' }}>
                                        <label class="form-check-label" for="referral5">Realtor Referral</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input {{ $errors->has('referral') ? 'is-invalid' : '' }}" type="radio" name="referral" id="referral6" value="Other" {{ old('referral', @$data->referral) == 'Other' ? 'checked="checked"' : '' }}>
                                        <label class="form-check-label" for="referral6">Other</label>
                                    </div>
                                    @if ($errors->has('referral'))
                                        <div>
                                            <small class="text-danger">{{ $errors->first('referral') }}</small>
                                        </div>
                                    @endif
                                    <div class="row" id="referral_other_box" style="display:none">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control {{ $errors->has('referral_other') ? 'is-invalid' : '' }}" id="referral_other" name="referral_other" placeholder="Describe Other" value="{{ old('referral_other', @$data->referral_other) }}">
                                                <label for="referral_other">Describe Other</label>
                                                @if ($errors->has('referral_other'))
                                                    <small class="text-danger">{{ $errors->first('referral_other') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(isset($data->id))
                                    <input id="id" type="hidden" name="id" value="{{ $data->id }}">
                                    <input type="hidden" name="form_id" value="{{ $data->form_id }}">
                                @else
                                    <input type="hidden" name="n_own" value="{{ $owners }}">
                                    <input type="hidden" name="bp" value="{{ $ap }}">
                                    @if($ap == 1)
                                        <input type="hidden" name="won2_email" value="{{ $email2 }}">
                                    @endif
                                @endif
                                <input type="hidden" name="user_id" value="{{ isset($user->id) ? $user->id : $data->user_id }}">
                                @if(isset($action) && $action === 'view')
                                @else
                                    <div class="form-group">
                                        <div class="col-md-12 form-submut text-end">
                                            @php
                                                if((isset($owners) && isset($ap) && $owners == 2 && $ap == 2) || (isset($owners) && $owners == 1)){
                                                    echo '<input type="hidden" name="form_step" value="1">';
                                                } else {
                                                    echo '<input type="hidden" name="form_step" value="0">';
                                                }
                                                $access_token_a = isset($data->accessToken) ? $data->accessToken : $accessToken;
                                            @endphp
                                            {{-- <input type="hidden" name="form_step" value="{{ @$data->form_step }}"> --}}
                                            <input type="hidden" name="ip" value="{{ @$ip }}">
                                            <input type="hidden" name="access_token" value="{{ $accessToken }}">
                                            <input type="hidden" name="account_id" value="{{ $account_id }}">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    @endif
                @endif
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
<script src="{{ asset('signdata/ss.js') }}"></script>
<script src="{{ asset('js/autoCompleteAddress.js') }}"></script>

<script>
    $('#field_id_17').on('keydown keyup keypress blur', function(){
        var city = $("#field_id_17").val().trim().toUpperCase();
        if(city == 'VANCOUVER'){
            $("#field_id_25").val('45%');
        }else{
            $("#field_id_25").val('45%');
        }
    });
    $('input[type=radio][name=referral]').change(function() {
        otherReferral();
    });
    function otherReferral(){
        if( $('input[type=radio][name=referral]:checked').val() == 'Other'){
            $('#referral_other_box').show();
        }else{
            $('#referral_other_box').hide();
        }
    }
    $("#field_id_15, #field_id_16, #field_id_17, #field_id_18, #field_id_19").on('keydown keyup keypress blur', function(){
        if($("#field_id_15").val() ==''){
            $("#field_id_20").val($("#field_id_16").val()+ ", "+ $("#field_id_17").val() + " " + $("#field_id_18").val() + " " + $("#field_id_19").val());
            $("#field_id_20 + label").addClass('active');
        }else{
            $("#field_id_20").val("#" +$("#field_id_15").val()+" "+$("#field_id_16").val()+", "+ $("#field_id_17").val() + " " + $("#field_id_18").val() + " " + $("#field_id_19").val());
            $("#field_id_20 + label").addClass('active');
        }
    });
    $("#field_id_1, #field_id_2, #field_id_3, #field_id_4, #field_id_5, #field_id_6, #field_id_7, #field_id_8").on('keydown keyup keypress blur', function(){
        $("#field_id_60, #field_id_40, #field_id_50, #field_id_73, #field_id_44").val($("#field_id_1").val()+ " " + $("#field_id_2").val());
        $("#field_id_62").val($("#field_id_2").val());
        $("#field_id_63").val($("#field_id_1").val());
        $("#field_id_64").val($("#field_id_3").val());
        $("#field_id_65").val($("#field_id_4").val());
        $("#field_id_66").val($("#field_id_5").val());
        $("#field_id_67").val($("#field_id_6").val());
        $("#field_id_68").val($("#field_id_7").val());
        $("#field_id_60 + label, #field_id_62 + label, #field_id_63 + label, #field_id_64 + label, #field_id_65 + label, #field_id_66 + label, #field_id_67 + label, #field_id_68 + label, #field_id_44 + label, #field_id_40 + label, #field_id_50 + label, #field_id_73 + label").addClass('active');
    });
    $("#field_id_15, #field_id_16, #field_id_17, #field_id_18, #field_id_19").on('keydown keyup keypress blur', function(){
        $("#field_id_44").val($("#field_id_1").val()+ " " + $("#field_id_2").val());
        $("#field_id_45, #field_id_55").val($("#field_id_15").val());
        $("#field_id_46, #field_id_56").val($("#field_id_16").val());
        $("#field_id_47, #field_id_57").val($("#field_id_17").val());
        $("#field_id_48, #field_id_58").val($("#field_id_18").val());
        $("#field_id_49, #field_id_59").val($("#field_id_19").val());
        $("#field_id_45 + label, #field_id_46 + label, #field_id_47 + label, #field_id_48 + label, #field_id_49 + label, #field_id_55 + label, #field_id_56 + label, #field_id_57 + label, #field_id_58 + label, #field_id_59 + label").addClass('active');
    });
    $("#field_id_1_2, #field_id_2_2, #field_id_4, #field_id_3").on('keydown keyup keypress blur', function(){
        $("#field_id_42, #field_id_52").val($("#field_id_1_2").val()+ " " + $("#field_id_2_2").val());
        var reg_ons = $("#field_id_1").val()+ " " + $("#field_id_2").val();
        var owner_2_name = $("#field_id_1_2").val()+ " " + $("#field_id_2_2").val();
        $("#field_id_44").val(reg_ons);
        $("#field_id_o2_44").val(owner_2_name);
        $("#field_id_76").val(owner_2_name);
        $("#field_id_44").css({"width":"250px"});
        $("#field_id_o2_44").css({"width":"250px"});
        $("#field_id_42 + label, #field_id_52 + label").addClass('active');
    });
    $("#termn_f26_date,#agent_f48_date,#woner_f40_date,#woner_f109_date,#woner_f44_date,#field_id_14,#field_iddate_14_2").datepicker({ dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });

    $("input[name='resident_won1[res_ca]']").click(function () {
        if($(this).prop("checked")) {
            var resident_ca = $("input[name='resident_won1[res_ca]']:checked").val();
            if(resident_ca == 1){
                $('#non_reg_ca').hide();
            }else{
                $('#non_reg_ca').show();
            }
        }
    });
    $("input[name='occu_status']").click(function () {
        if($(this).prop("checked")) {
            var tenant_occup = $("input[name='occu_status']:checked").val();
            if(tenant_occup == 'Tenant'){
                $('#tenant_occup').show();
            }else{
                $('#tenant_occup').hide();
            }
        }
    });
    $("input[name='resident_won2[res_ca]']").click(function () {
        if($(this).prop("checked")) {
            var won2_resident_ca = $("input[name='resident_won2[res_ca]']:checked").val();
            if(won2_resident_ca == 1){
                $('#won2_non_reg_ca').hide();
            }else{
                $('#won2_non_reg_ca').show();
            }
        }
    });
    $("input[name=promo_code]").click(function () {
        if($(this).prop("checked")) {
            var promo_code = $('input[name=promo_code]:checked').val();
            if(promo_code == 'yes'){
                $('#promocode_box').show();
            }else{
                $('#promocode_box').hide();
            }
        }
    });
    $(document).ready(function(){otherReferral();
        var resident_ca = $("input[name='resident_won1[res_ca]']:checked").val();
        if(resident_ca == 1){
            $('#non_reg_ca').hide();
        } else {
            $('#non_reg_ca').show();
        }
        var tenant_occup = $("input[name='occu_status']:checked").val();
        if(tenant_occup == 'Tenant'){
            $('#tenant_occup').show();
        }else{
            $('#tenant_occup').hide();
        }
        var won2_resident_ca = $("input[name='resident_won2[res_ca]']:checked").val();
        if(won2_resident_ca == 1){
            $('#won2_non_reg_ca').hide();
        }else{
            $('#won2_non_reg_ca').show();
        }
        var promo_code = $('input[name=promo_code]:checked').val();
        if(promo_code == 'yes'){
            $('#promocode_box').show();
        }else{
            $('#promocode_box').hide();
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });
        $.mask.definitions['~']='[+-]';
        //$('#field_id_9').mask('(999) 999-9999');
        $('#field_id_70').mask('99999');
        $('#field_id_71').mask('999');
        //$('#field_id_72').mask('999999999999999');
    });
</script>
<script>
    @php
        $arraysign = [];
        if (isset($owners, $ap) && $owners == 2 && $ap == 2) {
            $arraysign = ['signpad_1', 'signpad_2', 'signpad_3', 'signpad_4', 'signpad_5', 'signpad_6', 'signpad_7', 'signpad_8', 'signpad_9', 'signpad_10', 'signpad_11', 'signpad_12', 'signpad_13', 'signpad_14', 'signpad_15', 'signpad_16', 'signpad_17', 'signpad_18', 'signpad_19', 'signpad_20', 'signpad_21', 'signpad_22', 'signpad_23'];
        } elseif ((isset($owners, $ap) && $owners == 2 && $ap == 1) || (isset($owners) && $owners == 1)) {
            $arraysign = ['signpad_1', 'signpad_3', 'signpad_5', 'signpad_7', 'signpad_9', 'signpad_11', 'signpad_13', 'signpad_15', 'signpad_17', 'signpad_19', 'signpad_21', 'signpad_23'];
        }
        if (isset($action) && $action == 'view') {

        } else {
            if (isset($data->form_step)) {
                if ($data->form_step == 0) {
                    $arraysign = ['signpad_2', 'signpad_4', 'signpad_6', 'signpad_8', 'signpad_10', 'signpad_12', 'signpad_14', 'signpad_16', 'signpad_18', 'signpad_20', 'signpad_22'];
                } elseif ($data->form_step == 1) {
                    $arraysign = ['signpad_25'];
                }
            }
        }
    @endphp
</script>
<script>
    $('#woner_f18_resident').on('click', function(){
        if ($('#woner_f18_resident').is(':checked')){
            $('#woner_f18_resident').val('checked');
        }else{
            $('#woner_f18_resident').val('unchecked');
        }
    });
    $('#woner_f19_nonresident').on('click', function(){
        if ($('#woner_f19_nonresident').is(':checked')){
            $('#woner_f19_nonresident').val('checked')
        }else{
            $('#woner_f19_nonresident').val('unchecked')
        }
    });
    $('.signclick').on('click', function(){
        var idtext = $(this).attr('id');
        idtext = idtext.replace('textsign', '');
        $("#"+idtext+"textdivsign").show();
        window['objsignpad' + idtext] = new SuperSignature({
            "SignObject": "signpad" + idtext,
            "BackColor": "#FFFFFF",
            "PenSize": "2",
            "PenColor": "#000000",
            "BorderStyle": "Dashed",
            "BorderWidth": "1px",
            "BorderColor": "#DDDDDD",
            "RequiredPoints": "15",
            "ClearImage": "{{ asset('/signdata/img/refresh.png') }}",
            "PenCursor": "{{ asset('/signdata/img/pen.cur') }}",
            "Visible": true,
            "PenColor": "#0000FF",
            "ErrorMessage": "",
            "StartMessage": "",
            "SuccessMessage": "",
            "forceMouseEvent": true,
            "IeModalFix": true
        });

        window['objsignpad' + idtext].Init();
        $("canvas").css({
            'width': '265',
            'height': ''
        });
    });
    $('.close').on('click', function(){
        var id=$(this).parent().attr('id');
        idonly=id.replace('textdivsign', '');
        $("#"+id).hide();
    });
    $('.clear').on('click', function(){
        var idonly=$(this).attr('role');
        var inputclass='typeunique'+idonly;
        $('.'+inputclass).val('');
        var padclass='holdplacesign'+idonly;
        $('.'+padclass).html('');
    });
    $('.okbtn').on('click', function(){
        var id = $(this).attr('role');
        if($('#drawsign'+id).hasClass('active')){
            var signbase = $('#signpad' + id + '_data_canvas').val();
            $.ajax({
                url: "{{ route('frontend.postimagebase') }}",
                type:'POST',
                data:{'jsonbucket':signbase} ,
                success: function(result){
                    console.log(result);
                    $('.setfield'+id).val(result);
                    $('#'+id+'textdivsign').html('<img src="'+result+'"/>');
                    $('#'+id+'textdivsign').removeClass('tooltipsign');
                    $('#'+id+'textdivsign').addClass('signtyped');
                    $('#'+id+'textsign').remove();
                    $('.inputfield'+id).remove();
                }
            });
        }
        if($('#typesign' +id).hasClass('active')){
            var text=$('.typeunique'+id).val();
            $('.setfield'+id).val(text);
            $('#'+id+'textdivsign').html(text);
            $('#'+id+'textdivsign').removeClass('tooltipsign');
            $('#'+id+'textdivsign').addClass('signtyped');
            $('#'+id+'textsign').remove();
            $('.inputfield'+id).remove();
        }

    });
    $('.signtype').on('keydown keyup', function(){
        var textsign=$(this).val();
        var roleid=$(this).attr('role');
        var class_id='holdplacesign'+roleid;
        $('.'+class_id).html(textsign);
    });
    $(document).ready(function(){
        @if(isset($data->form_step) && $data->form_step == 0 && $data->bp == 1 )
            $("#pmaForm :input").not("[name=submit], input[name='form_step'], input[name='account_id'], input[name='_token'], input[name='access_token'], #id, #signbox_2 :input, #signbox_4 :input, #signbox_6 :input, #signbox_8 :input, #signbox_10 :input, #signbox_12 :input, #signbox_14 :input, #signbox_16 :input, #signbox_18 :input, #signbox_20 :input, #signbox_22 :input, #signbox_24 :input, input[name='resident_won2[res_ca]'], input[name='resident_won2[address]'], input[name='resident_won2[dob_8]'], input[name='resident_won2[tax_sin_no_8]'],input[name='own2_identity'], input[name='fName_1_2'],input[name='lName_2_2'],#field_id_o2_4,#field_id_o2_3,#field_id_o2_5,#field_id_o2_6,#field_id_o2_7,#field_id_o2_8,#field_id_o2_9,#field_id_o2_10,#field_id_o2_44,#field_iddate_14_2,#field_id_14_2").prop("disabled", true);
            $("#registerd_owners :input").prop("disabled", false);
            $("#registerd_owners :input").prop("readonly", true);
        @elseif(isset($data->form_step) && $data->form_step == 1 )
            $("#pmaForm :input").not("[name=submit], input[name='_token'], input[name='account_id'], input[name='access_token'], #id, #signbox_25 :input").prop("disabled", true);
        @elseif(isset($data->form_step) && $data->form_step == 2 && $data->status == 1 )
            $("#pmaForm :input").not("#signbox_25 :input").prop("disabled", true);
        @elseif(isset($action) && $action == 'view' )
            $("#pmaForm :input").not("").prop("disabled", true);
        @endif
        @if(isset($action) && $action == 'view')
            $("#pmaForm :input").not("input[name='account_id']").prop("disabled", true);
        @endif
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            // $('input[type="file"] + label span.filename').text(fileName);
            // $('input[type="file"] + label span.info_text').text('Click to replace the file');
            $(this).next().find('span.filename').text(fileName);
            $(this).next().find('span.info_text').text('Click to replace the file');
        });
    });
    $(document).on('change', '#field_id_8', function() {
        var count_ca = $('#field_id_8').val();
        if(count_ca != 'CA'){
            $("#field_id_12").prop("checked", true).trigger("click");
            var unit_number  =  $('#field_id_4').val();
            var street_address  =  $('#field_id_3').val();
            var city  =  $('#field_id_5').val();
            var state  =  $('#field_id_6').val();
            var zip  =  $('#field_id_7').val();
            var country  =  $('#field_id_8').val();
            var add = street_address + ', ' + city + ' ' + state + ' ' + zip + ', ' +country;
            $('#field_id_13').val(add);
            $("#field_id_13 + label").addClass('active');
        } else {
            $("#field_id_11").prop("checked", true).trigger("click");
        }
    });
    $(document).on('change', '#field_id_o2_8', function() {
        var count_ca = $('#field_id_o2_8').val();
        if(count_ca != 'CA'){
            $("#won2_field_id_12").prop("checked", true).trigger("click");
            var unit_number  =  $('#field_id_o2_4').val();
            var street_address  =  $('#field_id_o2_3').val();
            var city  =  $('#field_id_o2_5').val();
            var state  =  $('#field_id_o2_6').val();
            var zip  =  $('#field_id_o2_7').val();
            var country  =  $('#field_id_o2_8').val();
            var add = street_address + ', ' + city + ' ' + state + ' ' + zip + ', ' +country;
            //alert(add);
            $('#field_id_o2_13').val(add);
            $("#field_id_o2_13 + label").addClass('active');
        }else{
            $("#won2_field_id_11").prop("checked", true).trigger("click");
        }
    });
</script>
@endpush
