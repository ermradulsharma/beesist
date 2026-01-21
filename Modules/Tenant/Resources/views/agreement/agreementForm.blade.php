@extends('frontend.layouts.app')
@section('title', __('Tenancy Application'))

@push('after-styles')
<style>
    h3, h4, h5 {
        margin: 10px 0;
        font-weight: 400;
        font-family: 'Roboto Condensed', sans-serif;
        line-height: 1.1 !important;
    }

    h3 {
        font-size: 1.4rem;
        color: #ec1f27;
    }

    h4 {
        font-size: 1.2rem;
        color: #333;
    }

    h5 {
        font-size: 1em;
        color: #333;
    }


    #field_id_21,
    #field_id_22,
    #field_id_23 {
        border-bottom: 2px solid red !important;
        height: 22px;
        line-height: 22px;
    }

    #field_id_25,
    #field_id_26,
    #field_id_60,
    #field_id_54,
    #field_id_28,
    #field_id_29,
    #field_id_31,
    #field_id_38,
    #field_id_44 {
        height: 22px;
        line-height: 22px;
    }

    .md-form-inline input {
        text-align: left;
        padding-left: 7px !important;
        line-height: 22px; /* Added for consistency */
    }

    .md-form .form-control:disabled,
    .md-form .form-control[readonly] {
        color: #d48989;
    }

    .select2 span {
        width: 100%;
        display: block !important;
    }

    .select2-container--bootstrap .select2-selection--single {
        border-radius: 0;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
        border-color: #ccc !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
    }

    .has-doller {
        position: relative;
        padding-left: 10px;
    }

    .has-doller:before {
        position: absolute;
        content: '$';
        left: 0;
    }

    /* Media Queries */
    @media (max-width: 1024px) {
        .utilities_grig {
            grid-template-columns: auto auto auto;
        }
    }

    @media (max-width: 768px) {
        #field_id_20+label {
            font-size: 12px !important;
        }

        .utilities_grig {
            grid-template-columns: auto auto;
        }

        .rent_fees span.label2 {
            display: block;
            min-width: 150px;
        }
    }

    @media (max-width: 480px) {
        .utilities_grig {
            grid-template-columns: auto;
        }
    }

    /* Styles for a specific section (disclosure-wrap) */
    .disclosure-wrap * {
        color: #000;
    }

    .disclosure-wrap .md-form {
        margin: 30px 0;
    }

    .disclosure-wrap .md-form textarea.md-textarea {
        line-height: 22px;
        height: auto;
        color: #000;
        font-style: italic;
    }

    .disclosure-wrap .md-form label,
    .disclosure-wrap .md-form label.active {
        font-size: 16px;
        color: #000;
    }

    .disclosure-wrap .md-form label .fas {
        position: absolute;
        left: 0;
    }

    .disclosure-wrap .md-form input,
    .disclosure-wrap .md-form textarea.md-textarea {
        color: blue;
        font-weight: 500;
        font-style: normal;
    }

    .disclosure-wrap .sign {
        font-family: Pacifico, cursive !important;
        font-size: 18px !important;
        letter-spacing: 1px !important;
        color: blue !important;
    }

    /* Styles for a specific section (right-side-area) */
    .right-side-area {
        background: #d2e8f6;
        padding: 20px;
    }

    .color_red {
        color: #ec1f27;
    }

    /* Styles for Masonry layout */
    .masonry .brick {
        display: inline-block;
        height: 108px;
        width: auto;
        border: 1px dotted #bbb;
        padding: 3px;
        margin-right: 5px;
    }

    .masonry .brick img {
        max-height: 100px;
        width: auto;
    }


    /* New Style */
    .form-floating > .form-select {
        padding-top: 1.5rem;
        padding-bottom: 0.5rem;
    }
    .right-side-area p {
        font-size: 14px;
        font-weight: 400;
        font-family: 'Roboto Condensed',sans-serif;
    }
    .cannot,
    .can {
        padding: 20px;
    }

    .cannot p,
    .can p {
        font-size: 13px;
        font-weight: 400;
    }

    .cannot p i,
    .can p i {
        margin-right: 10px;
    }

    .cannot p i.fa-times {
        color: #fc4a31;
    }

    .can p i.fa-check {
        color: #5ec685;
    }

    .information-box {
        padding: 10px 0;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .residential p {
        color: #1f8ec3;
        font-size: 18px;
        font-weight: 600;
    }

    .prospective-tenant-info {
        color: #000;
        font-size: 18px;
        font-weight: 600;
    }

    .footer-image {
        margin: 100px 0;
        width: 100%;
    }

    .rental-heading {
        font-size: 28px;
        font-weight: 600;
        color: #1f8ec3;
    }

    .disclosure-heading {
        font-size: 1.4rem;
        font-weight: 400;
    }

    .disclosure-info {
        color: #000;
        font-size: 18px;
        font-weight: 600;
    }

    .blue-text {
        color: #1f8ec3;
    }

    .professional-details {
        font-size: 28px;
        font-weight: 600;
        color: #1f8ec3;
    }

    .professional-disclosure {
        font-size: 1.1rem;
        font-weight: 400;
    }
    .form-row-group {
        /*  */
        padding: 18px;
    }
    .tenant_data {
        border: 1px dotted #000;
    }

    .header-message {
        display: none;
    }
    .form-floating > label {
        padding: 0.65rem !important;
    }
    #signbox_29 .form-floating > label {
        padding: 0.65rem 1.5rem !important;
    }
</style>
@if(isset($data->form_step) && $data->form_step =='1')
    <style>
        .md-form.tenant1.required label::before {
            opacity: 1 !important;
        }
    </style>
@else
    <style>
        .md-form.tenant1.required label::before {
            opacity: 0 !important;
        }
    </style>
@endif
@endpush

@section('content')
<link href="{{ asset('css/agreementForm.css')}}" >
@php
    $tenants = $tenants ?? 0;
    $no_of_tenants = $tenants ?? 0;
    if($no_of_tenants == 1){
        $second_tenant_data = false;
        $third_tenant_data = false;
    } else if($no_of_tenants == 2) {
        $second_tenant_data = true;
        $third_tenant_data = false;
    } else if($no_of_tenants == 3) {
        $second_tenant_data = true;
        $third_tenant_data = true;
    } else {
        $second_tenant_data = false;
        $third_tenant_data = false;
    }

    $owner_two_data = false;
    $agent_data = false;
    if(isset($data->form_step) && $data->form_step == 4){
        if((isset($action) && $action == 'view')){
            $agent_data = false;
        }else{
            $agent_data = true;
        }
    }

    if(isset($data->id, $action) && $action == 'view'){
        if($tenants > 1){
            $second_tenant_data = true;
        }
        if($tenants > 2){
            $third_tenant_data = true;
        }
        $agent_data = true;
    }

    $form_k = false;
    if((isset($data->prop_type) && $data->prop_type == 'Strata') || (isset($_GET['prop_type']) && $_GET['prop_type'] == 'Strata') || (isset($property->prop_type) && $property->prop_type == 'Strata unit/property' && !isset($_GET['prop_type']))){
        $form_k = true;
    }
@endphp

<div class="container card shadow-lg p-3 my-5 bg-body rounded">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="panel panel-default page-inner success-msg">
                @if(isset($data, $action) && $data->form_step == 5 && $data->status == 1 && $action == 'view' && empty(session('status')))
                    <div class="alert alert-success" role="alert" style="margin: 20px;">
                        <a href="{{ route(rolebased() .'.tenant.savePdf', ['type' => 'agreement', 'id' => Crypt::encryptString($data->id), 'access_token' => $data->access_token, 'action' => 'view' ]) }}">
                            <button type="button" class="btn btn-success">Save as PDF</button>
                        </a>
                    </div>
                @endif
                @if(session('status'))
                    <div class="alert alert-success" role="alert" style="margin: 20px;text-align: center;">
                        <h4 class="alert-heading">Agreement updated successfully!</h4>
                        <p>You have successfully signed the agreement. You can find a copy of the agreement in the dashboard.</p>
                        <hr>
                        @if(isset($data, $action) && $data->form_step == 5 && $data->status == 1 && $action == 'view')
                            <a href="{{ route(rolebased() .'.tenant.savePdf', ['type' => 'agreement', 'id' => Crypt::encryptString($data->id), 'access_token' => $data->access_token, 'action' => 'view' ]) }}">
                                <button type="button" class="btn btn-success">Save as PDF</button>
                            </a>
                        @endif
                    </div>
                @elseif(isset($link_accessible) && $link_accessible == false)
                    <div class="alert alert-danger" role="alert" style="margin: 20px;padding: 100px 20px;text-align: center;">
                        <h4 class="alert-heading">Link is expired!</h4>
                        <p>Sorry! this link is not accessible anymore.</p>
                    </div>
                @else
                    @if(session('msg')!='insert')
                        <div class="panel-body">
                            @php
                                if($data){
                                    $adult_tenants = (isset($_GET['adult_tenants']) ? $_GET['adult_tenants']: $data->adult_tenants);
                                    $minor_tenants = (isset($_GET['minor_tenants']) ? $_GET['minor_tenants']: $data->minor_tenants);
                                }
                                $property_id = (isset($data->prop_id) ? $data->prop_id: @$property->id);
                                if(isset($property->rate) && $property->rate > 0){
                                    $property_rate = str_replace( ',', '', $property->rate );
                                    $security_deposit = $property_rate/2;
                                    $property_liquidated_damages = $property_rate*40/100;
                                }
                            @endphp
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">Oh no! You have missed some required fields. Please review the fields below.
                                </div>
                            @endif
                            <form id="pmaForm" class="form-horizontal form-validate" method="POST" action="{{ route('tenant.agreementForm.save') }}" enctype="multipart/form-data">
                                @csrf
                                @if(!empty(@$data->id))
                                    <input id="id" type="hidden" name="id" value="{{ @$data->id }}">
                                    <input type="hidden" name="user_id" value="{{ @$data->user_id }}">
                                @endif

                                <div class="row disclosure-wrap">
                                    <div class="col-md-8" style="padding-top: 20px;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <img src="{{ asset('images/bcfsa-logo.png') }}" style="margin-bottom: 30px; width: 100%;">
                                            </div>
                                            <div class="col-md-12">
                                                <h2 style="color: #1f8ec3; font-weight: 600; font-size: 55px;">Renting Residential Property:<br>What Tenants Need to Know</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="right-side-area">
                                            <p><strong>BC Financial Services Authority</strong> is the legislated regulatory agency that works to ensure real estate professionals have the skills and knowledge to provide you with a high standard of service. All real estate professionals must follow rules that help protect consumers, like you. We’re here to help you understand your rights as a real estate consumer.</p>
                                            <p><strong>Keep this information page for your reference</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div style="height:3px; background:#eff6fc; margin-top:10px; margin-bottom: 20px;"></div>
                                <h4 style="font-size: 26px; color: #000; font-weight:400">Real estate professionals have a regulatory requirement to present you with this consumer information before providing services to you.</h4>
                                <p>This information from BC Financial Services Authority explains the role of a real estate professional when you are considering renting a property.</p>
                                <h4 style="color: #1f8ec3;font-size: 18px;font-weight: 600;">The real estate professional who gave you this form represents the owner of this residential rental property.</h4>
                                <p>While this real estate professional can provide some limited services to you as a prospective tenant of this rental property, they owe a duty of loyalty to the owner, and are working for the owner’s best interests.</p>
                                <h4 style="color: #1f8ec3;font-size: 18px;font-weight: 600;">This form sets out what this real estate professional can and cannot do for you as a prospective tenant in relation to this rental property.</h4>
                                {{-- They can & can't --}}
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="cannot">
                                                <p>They cannot:</p>
                                                <p><i class="fa fa-times"></i> give you advice on terms and conditions to include in a tenancy agreement</p>
                                                <p><i class="fa fa-times"></i> negotiate on your behalf</p>
                                                <p><i class="fa fa-times"></i> share any of the owner’s confidential information with you</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="can">
                                                <p>They can:</p>
                                                <p><i class="fa fa-check"></i> share statistics and general information about the rental property market </p>
                                                <p><i class="fa fa-check"></i> provide you with standard forms and contracts such as a rental application and/or tenancy agreement</p>
                                                <p><i class="fa fa-check"></i> show the property</p>
                                                <p><i class="fa fa-check"></i> assist you to fill out a tenancy agreement</p>
                                                <p><i class="fa fa-check"></i> communicate your messages and present your offers to their client</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Because this real estate professional is working in the owner’s best interests, they have a duty to share important information with the owner if disclosed by you including, for example: your motivations, your financial qualifications, and your preferred terms and conditions.</p>
                                </div>

                                {{-- Information Box --}}
                                <div class="information-box">
                                    <div class="row">
                                        <div class="col-md-9 residential">
                                            <p>Find information about the rights and responsibilities of tenants and landlords from:</p>
                                            <ul>
                                                <li>BC Residential Tenancy Branch: <a href="https://www2.gov.bc.ca/gov/content/housing-tenancy/residential-tenancies" target="_blank">gov.bc.ca/landlordtenant</a></li>
                                                <li>Tenant Resource & Advisory Centre: <a href="https://tenants.bc.ca/" target="_blank">tenants.bc.ca</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <p class="prospective-tenant-info">As a prospective tenant, you should consider seeking independent professional advice about renting property.</p>
                                <img src="{{ asset('images/bcfsa-footer.png') }}" class="footer-image" alt="BCFSA Footer">
                                <h2 class="rental-heading">Renting Residential Property: What Tenants Need to Know</h2>
                                <hr>

                                <h3 class="disclosure-heading">DISCLOSURE FOR RESIDENTIAL TENANCIES</h3>
                                <p class="disclosure-info"><span class="blue-text">This is a required disclosure form in compliance with sections 54 and 55 of the Real Estate Services Rules.</span> The real estate professional must present the Renting Residential Property: What Tenants Need to Know information page to you along with this disclosure form.</p>
                                <p class="professional-details">REAL ESTATE PROFESSIONAL DISCLOSURE DETAILS</p>
                                <h5 class="professional-disclosure">I disclose that I represent the owner of this rental property. I cannot represent you or act on your behalf.</h5>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div id="Feedback">
                                            <div class="form-floating mb-2">
                                                <input id="name" placeholder="Name" name="disclosure[name]" value="{{ old('disclosure.name', @$disclosure['name'] ?? appName()) }}" class="form-control" type="text">
                                                <label for="name" class="active">Name</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input id="team_member" placeholder="Team name and members. The duties of a real estate professional as outlined in this form apply to all team members." name="disclosure[team_member]" value="{{ old('disclosure.team_member', @$disclosure['team_member'] ?? '') }}" class="form-control" type="text">
                                                <label for="team_member" class="active">Team name and members. The duties of a real estate professional as outlined in this form apply to all team members.</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input id="brokerage" placeholder="Brokerage" name="disclosure[brokerage]" value="{{ old('disclosure.brokerage', @$disclosure['brokerage'] ??  appName() .' Real Estate Management') }}" class="form-control" type="text">
                                                <label for="name" class="active">Brokerage</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-2">
                                                        <input id="signature" placeholder="Signature" name="disclosure[signature]" value="{{ old('disclosure.signature', @$disclosure['signature'] ?? '' ) }}" class="form-control sign" type="text">
                                                        <label for="signature" class="active">Signature</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-2">
                                                        <input id="date" placeholder="Date" name="disclosure[date]" value="{{ old('disclosure.date', @$disclosure['date'] ?? '') }}" class="form-control datepicker" type="text">
                                                        <label for="date" class="active">Date</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input id="property_name" onkeyup="initAutocomplete(this.id)" placeholder="Rental property address" name="disclosure[property_name]" value="{{ old('disclosure.property_name', @$disclosure['property_name'] ?? @$property->address ) }}" class="form-control" type="text">
                                                <label for="property_name" @if(Auth::check()) class="active" @endif>Rental property address</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <textarea id="experience" class="md-textarea form-control" placeholder="Notes" name="disclosure[experience]" rows="8" style="height: 100px">{{ old('disclosure.experience',@$disclosure['experience'] ?? '') }}</textarea>
                                                <label for="experience">Notes:</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input id="agent_name" placeholder="Name of the agent" name="disclosure[agent_name]" value="{{ old('disclosure.agent_name', @$disclosure['agent_name']) }}" class="form-control" type="text">
                                                <label for="agent_name">Name of the agent</label>
                                            </div>
                                            <div class="bg-light p-3 mt-4">
                                                <h4>Consumer Acknowledgment <span style="background: #2695d2; padding: 10px; line-height: 27px; color: #fff; float:right; margin-top: -40px;">This is NOT a contract</span></h4>
                                                <hr>
                                                <p>I acknowledge that I have received the <strong>Renting Residential Property: What Tenants Need to Know</strong> consumer information page and this disclosure form.</p>
                                                <p>I understand that the real estate professional named above is not representing me as a client or acting on my behalf in this transaction.</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-2">
                                                            <input id="name2" placeholder="Name (optional)" name="disclosure[name2]" value="{{ old('disclosure.name2', @$disclosure['name2'] ?? '') }}" class="form-control" type="text">
                                                            <label for="name2" class="active">Name (optional)</label>
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <input id="signature2" placeholder="Signature (optional)" name="disclosure[signature2]" value="{{ old('disclosure.signature2', @$disclosure['signature2'] ?? '') }}" class="form-control sign" type="text">
                                                            <label for="signature2" class="active">Signature (optional)</label>
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <input id="date2" placeholder="Date" name="disclosure[date2]" value="{{ old('disclosure.date2', @$disclosure['date2'] ?? '') }}" class="form-control datepicker" type="text">
                                                            <label for="date2" class="active">Date</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-2">
                                                            <input id="name3" placeholder="Name (optional)" name="disclosure[name3]" value="{{ old('disclosure.name3', @$disclosure['name3'] ?? '') }}" class="form-control" type="text">
                                                            <label for="name3" class="active">Name (optional)</label>
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <input id="signature3" placeholder="Signature (optional)" name="disclosure[signature3]" value="{{ old('disclosure.signature3',@$disclosure['signature3'] ?? '') }}" class="form-control sign" type="text">
                                                            <label for="signature3" class="active">Signature (optional)</label>
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <input id="date3" placeholder="Date" name="disclosure[date3]" value="{{ old('disclosure.date3',@$disclosure['date3'] ?? '') }}" class="form-control datepicker" type="text">
                                                            <label for="date3" class="active">Date</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="{{ asset('images/bcfsa-footer-2.png') }}" style="margin-top:100px; width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                @if(!isset($data->id) || empty($data->id))
                                    <div class="form-row-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                <div class="form-floating mb-2 {{ $errors->has('number_tenants') ? 'has-error' : '' }}" style="margin-bottom: 0px">

                                                    <select id="number_tenants" class="form-select" name="number_tenants" style="width: 100%;">
                                                        @if(Route::current()->getName() == 'tenant.agreementForm')
                                                            <option data-url="{{ route('tenant.agreementForm', ['form_id' => isset($rentalApplicationData->id) ? Crypt::encryptString($rentalApplicationData->id) : null, 'prop_id' => @$property->id, 'tenants' => '1', 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => @$_GET['minor_tenants']]) }}" value="1">1 Tenant</option>
                                                        @else
                                                            <option data-url="{{ route('tenancy.agreement.form', ['user_id' => Crypt::encryptString($user->id), 'prop_id' => @$property->id, 'tenants' => '1', 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => @$_GET['minor_tenants']]) }}" value="1">1 Tenant</option>
                                                        @endif
                                                        @for ($i = 2; $i <= 3; $i++)
                                                            <option data-url="{{ Route::current()->getName() == 'tenant.agreementForm' ? route('tenant.agreementForm', ['form_id' => isset($rentalApplicationData->id) ? Crypt::encryptString($rentalApplicationData->id) : null, 'prop_id' => @$property->id, 'tenants' => $i, 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => @$_GET['minor_tenants']]) : route('tenancy.agreement.form', ['user_id' => Crypt::encryptString($user->id), 'prop_id' => $property->id, 'tenants' => $i, 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => @$_GET['minor_tenants']]) }}" value="{{ $i }}" @if(isset($_GET['tenants']) && $_GET['tenants'] == $i)selected @endif>{{ $i }} Tenants</option>
                                                        @endfor
                                                    </select>
                                                    @if ($errors->has('number_tenants'))
                                                        <span class="text-danger">{{ $errors->first('number_tenants') }}</span>
                                                    @endif
                                                    <label for="number_tenants">{{ __('Number of Tenants') }}</label>
                                                </div>
                                                {{-- <small>Number of Tenants</small> --}}
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                <div class="form-floating mb-2 required {{ $errors->has('adult_tenants') ? 'has-error' : '' }}" style="margin-bottom: 0px">
                                                    <select id="adult_tenants" class="form-select" name="adult_tenants" style="width: 100%;">
                                                        @if(Route::current()->getName() == 'tenant.agreementForm')
                                                            <option value="0" data-url="{{ route('tenant.agreementForm', ['form_id' => isset($rentalApplicationData->id) ? Crypt::encryptString($rentalApplicationData->id) : null, 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => '0', 'minor_tenants' => @$_GET['minor_tenants']]) }}"># ADULT persons</option>
                                                        @else
                                                            <option value="0" data-url="{{ route('tenancy.agreement.form', ['user_id' => Crypt::encryptString($user->id), 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => '0', 'minor_tenants' => @$_GET['minor_tenants']]) }}">ADULT persons</option>
                                                        @endif
                                                        @for ($i = 1; $i <= 4; $i++)
                                                            @if(Route::current()->getName() == 'tenant.agreementForm')
                                                                <option data-url="{{ route('tenant.agreementForm', ['form_id' => isset($rentalApplicationData->id) ? Crypt::encryptString($rentalApplicationData->id) : null, 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => $i, 'minor_tenants' => @$_GET['minor_tenants']]) }}" value="{{ $i }}" @if(isset($_GET['adult_tenants']) && $_GET['adult_tenants']==$i)selected @endif>{{ $i }}</option>
                                                            @else
                                                                <option data-url="{{ route('tenancy.agreement.form', ['user_id' => Crypt::encryptString($user->id), 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => $i, 'minor_tenants' => @$_GET['minor_tenants']]) }}" value="{{ $i }}" @if(isset($_GET['adult_tenants']) && $_GET['adult_tenants']==$i)selected @endif>{{ $i }}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                    @if ($errors->has('adult_tenants'))
                                                        <span class="text-danger">{{ $errors->first('adult_tenants') }}</span>
                                                    @endif
                                                    <label for="adult_tenants">{{ __('# ADULT persons (age 19 or older) other than tenant(s)') }}</label>
                                                </div>
                                                {{-- <small># ADULT persons (age 19 or older) other than tenant(s)</small> --}}
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <div class="form-floating mb-2 required {{ $errors->has('minor_tenants') ? 'has-error' : '' }}">
                                                    <select id="minor_tenants" class="form-select" name="minor_tenants" style="width: 100%;">
                                                        @if(Route::current()->getName() == 'tenant.agreementForm')
                                                            <option value="0" data-url="{{ route('tenant.agreementForm', ['form_id' => isset($rentalApplicationData->id) ? Crypt::encryptString($rentalApplicationData->id) : null, 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => '0']) }}"># MINOR persons</option>
                                                        @else
                                                            <option value="0" data-url="{{ route('tenancy.agreement.form', ['user_id' => Crypt::encryptString($user->id), 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => '0']) }}"># MINOR persons</option>
                                                        @endif
                                                        @for ($i = 1; $i <= 4; $i++)
                                                            @if(Route::current()->getName() == 'tenant.agreementForm')
                                                                <option data-url="{{ route('tenant.agreementForm', ['form_id' => isset($rentalApplicationData->id) ? Crypt::encryptString($rentalApplicationData->id) : null, 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => $i]) }}" value="{{ $i }}" @if(isset($_GET['minor_tenants']) && $_GET['minor_tenants']==$i)selected @endif>{{ $i }}</option>
                                                            @else
                                                                <option data-url="{{ route('tenancy.agreement.form', ['user_id' => Crypt::encryptString($user->id), 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => $i]) }}" value="{{ $i }}" @if(isset($_GET['minor_tenants']) && $_GET['minor_tenants']==$i)selected @endif>{{ $i }}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                    @if ($errors->has('minor_tenants'))<span class="text-danger">{{ $errors->first('minor_tenants') }}</span>@endif
                                                    <label for="minor_tenants">{{ __('# MINOR persons (under age 19, including infants)') }}</label>
                                                </div>
                                                {{-- <small># MINOR persons (under age 19, including infants)</small> --}}
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6">
                                                <div class="form-floating required {{ $errors->has('prop_id') ? 'has-error' : '' }}" style="margin-bottom: 0px">
                                                    <select id="prop_id" class="form-select" name="prop_id" style="width: 100%;">
                                                        <option data-url="" value="">Select Property</option>
                                                        @foreach ($properties as $prop_item)
                                                            @if(Route::current()->getName() == 'tenant.agreementForm')
                                                                <option data-url="{{ route('tenant.agreementForm', ['form_id' => @$rentalApplicationData->id, 'prop_id' => $prop_item->id, 'tenants' => $tenants, 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => @$_GET['minor_tenants']]) }}" value="{{ $prop_item->id ?? @$rentalApplicationData->prop_id }}" @if(@$_GET['prop_id'] == $prop_item->id || @$rentalApplicationData->prop_id == $prop_item->id) selected @endif>{{ $prop_item->title }}</option>
                                                            @else
                                                                <option data-url="{{ route('tenancy.agreement.form', ['user_id' => Crypt::encryptString($user->id), 'prop_id' => $prop_item->id, 'tenants' => $tenants]) }}" value="{{ $prop_item->id }}" @if($property_id==$prop_item->id)selected @endif>{{ $prop_item->title}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('prop_id'))<span class="text-danger">{{ $errors->first('prop_id') }}</span>@endif
                                                    <label for="prop_id">{{ __('Property') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-6">
                                                <div class="form-floating required {{ $errors->has('prop_type') ? 'has-error' : '' }}" style="margin-bottom: 0px">
                                                    <select id="prop_type" class="form-select" name="prop_type" style="width: 100%;">
                                                        <option data-url="" value="">Select Property Type</option>
                                                        @if(Route::current()->getName() == 'tenant.agreementForm')
                                                            <option data-url="{{ route('tenant.agreementForm', ['form_id' => @$rentalApplicationData->id, 'prop_id' => @$_GET['prop_id'], 'tenants' => @$_GET['tenants'], 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => @$_GET['minor_tenants'], 'prop_type' => 'Strata']) }}" value="Strata" @if((isset($_GET['prop_type']) && $_GET['prop_type']=='Strata' ) || (@$property->prop_type == 'Strata unit/property' && !isset($_GET['prop_type'])) )selected @endif>Strata</option>
                                                            <option data-url="{{ route('tenant.agreementForm', ['form_id' => @$rentalApplicationData->id, 'prop_id' => @$_GET['prop_id'], 'tenants' => @$_GET['tenants'], 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => @$_GET['minor_tenants'], 'prop_type' => 'Non Strata']) }}" value="Non Strata" @if((isset($_GET['prop_type']) && $_GET['prop_type']=='Non Strata' ) || (@$property->prop_type == 'Single family/privately owned non strata property' && !isset($_GET['prop_type'])) )selected @endif>Non Strata</option>
                                                        @else
                                                            <option data-url="{{ route('tenancy.agreement.form', ['user_id' => Crypt::encryptString($user->id), 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => @$_GET['minor_tenants'], 'prop_type' => 'Strata']) }}" value="Strata" @if((isset($_GET['prop_type']) && $_GET['prop_type']=='Strata' ) || (@$property->prop_type == 'Strata unit/property' && !isset($_GET['prop_type'])) )selected @endif>Strata</option>
                                                            <option data-url="{{ route('tenancy.agreement.form', ['user_id' => Crypt::encryptString($user->id), 'prop_id' => @$property->id, 'tenants' => @$_GET['tenants'], 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => @$_GET['minor_tenants'], 'prop_type' => 'Non Strata']) }}" value="Non Strata" @if((isset($_GET['prop_type']) && $_GET['prop_type']=='Non Strata' ) || (@$property->prop_type == 'Single family/privately owned non strata property' && !isset($_GET['prop_type'])) )selected @endif>Non Strata</option>
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('prop_id'))<span class="text-danger">{{ $errors->first('prop_id') }}</span>@endif
                                                    <label for="prop_type">{{ __('Property Type') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ @$user->id }}">
                                @endif
                                @if(isset($data->form_step) && $data->form_step == '1')
                                    <div class="form-row-group ">
                                        <div class="row">
                                            <div class="col-12 col-sm-4 col-md-6">
                                                <div class="form-floating required {{ $errors->has('adult_tenants') ? 'has-error' : '' }}" style="margin-bottom: 0px">
                                                    <select id="adult_tenants" class="form-select" name="adult_tenants">
                                                        <option value=""># ADULT persons</option>
                                                        @for ($i = 1; $i <= 4; $i++)
                                                            <option data-url="{{ route('tenant.viewTenantAgreement', ['action' => 'edit', 'form_id' => Crypt::encryptString($data->id), 'access_token' => $data->access_token, 'adult_tenants' => $i, 'minor_tenants' => @$_GET['minor_tenants']]) }}" value="{{ $i }}" @if((isset($_GET['adult_tenants']) && $_GET['adult_tenants']==$i) || ($data->adult_tenants == $i && (!isset($_GET['adult_tenants']))))selected @endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    @if ($errors->has('adult_tenants'))<span class="text-danger">{{ $errors->first('adult_tenants') }}</span>@endif
                                                    <label># ADULT persons (age 19 or older) other than tenant(s)</label>
                                                </div>
                                                {{-- <small># ADULT persons (age 19 or older) other than tenant(s)</small> --}}
                                            </div>

                                            <div class="col-12 col-sm-4 col-md-6">
                                                <div class="form-floating required {{ $errors->has('monor_tenants') ? 'has-error' : '' }}" style="margin-bottom: 0px">
                                                    <select id="minor_tenants" class="form-select" name="minor_tenants">
                                                        <option value=""># MINOR persons</option>
                                                        @for ($i = 1; $i <= 4; $i++)
                                                            <option data-url="{{ route('tenant.viewTenantAgreement', ['action' => 'edit', 'form_id' => Crypt::encryptString($data->id), 'access_token' => $data->access_token, 'adult_tenants' => @$_GET['adult_tenants'], 'minor_tenants' => $i]) }}" value="{{ $i }}" @if((isset($_GET['minor_tenants']) && $_GET['minor_tenants']==$i) || ($data->minor_tenants == $i && (!isset($_GET['minor_tenants']))))selected @endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    @if ($errors->has('minor_tenants'))<span class="text-danger">{{ $errors->first('minor_tenants') }}</span>@endif
                                                    <label># MINOR persons (under age 19, including infants)</label>
                                                </div>
                                                {{-- <small># MINOR persons (under age 19, including infants)</small> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="ol">
                                    <ol>
                                        <li><strong>AGREEMENT.</strong> The parties to this Residential Tenancy Agreement (from now on referred to as, "this Agreement") agree to be legally bound by and comply with the terms of this Agreement. The parties understand that where in this Agreement the words, "the Act," are used, they refer to the Residential Tenancy Act, SBC 2002, c.78, as amended, and Regulation made from time to time. The Standard Terms required by the Act are shaded in grey, distinguishing them from other Terms.</li>
                                            <strong>BETWEEN:</strong>
                                            <p><strong>{{ appName() }} Real Estate Management</strong><br>B-2127 Granville Street,<br>Vancouver BC V6H 3E9<br>("Landlord’s Agent")</p>
                                            <h5>AND:</h5>
                                            <p>(FULL NAMES of all ADULT Tenants to occupy the rental premises.) ("Tenants")</p>
                                            <div class="form-row-group tenant_data">
                                                <h5 style="font-weight: 600; margin-bottom: 10px !important;">First Tenant's Name</h5>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 col-md-3">
                                                        <div class="form-floating required {{ $errors->has('tenants_data.t1_fname') ? 'has-error' : '' }}">
                                                            <input id="tenant1_fname" placeholder="First Name" name="tenants_data[t1_fname]" value="{{ $tenants_data['t1_fname'] ?? @$rentalApplicationData->first_name }}" type="text" class="form-control">
                                                            <label for="tenant1_fname">First Name</label>
                                                            @if ($errors->has('tenants_data.t1_fname'))<span class="text-danger">{{ $errors->first('tenants_data.t1_fname') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-3">
                                                        <div class="form-floating required {{ $errors->has('tenants_data.t1_lname') ? 'has-error' : '' }}">
                                                            <input id="tenant1_lname" placeholder="Last Name" name="tenants_data[t1_lname]" value="{{ $tenants_data['t1_lname'] ?? @$rentalApplicationData->last_name }}" type="text" class="form-control">
                                                            <label for="tenant1_lname">Last Name</label>
                                                            @if ($errors->has('tenants_data.t1_lname'))<span class="text-danger">{{ $errors->first('tenants_data.t1_lname') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-3">
                                                        <div class="form-floating required {{ $errors->has('tenants_data.t1_email') ? 'has-error' : '' }}">
                                                            <input id="tenant1_email" placeholder="E-mail" name="tenants_data[t1_email]" value="{{ $tenants_data['t1_email'] ?? @$rentalApplicationData->email }}" type="text" class="form-control">
                                                            <label for="tenant1_email">E-mail</label>
                                                            @if ($errors->has('tenants_data.t1_email'))<span class="text-danger">{{ $errors->first('tenants_data.t1_email') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-3">
                                                        <div class="form-floating required {{ $errors->has('tenants_data.t1_phone') ? 'has-error' : '' }}">
                                                            <input id="tenant1_phone" placeholder="Phone" name="tenants_data[t1_phone]" value="{{ $tenants_data['t1_phone'] ?? @$rentalApplicationData->phone }}" type="text" class="form-control telephone">
                                                            <label for="tenant1_phone">Phone</label>
                                                            @if ($errors->has('tenants_data.t1_phone'))<span class="text-danger">{{ $errors->first('tenants_data.t1_phone') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($second_tenant_data == true)
                                                    <h5 style="font-weight: 600; margin-bottom: 10px !important;">Second Tenant's Name</h5>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 col-md-3">
                                                            <div class="form-floating required{{ $errors->has('tenants_data.t2_fname') ? 'has-error' : '' }}">
                                                                <input id="tenant2_fname" placeholder="First Name" name="tenants_data[t2_fname]" value="{{ old('tenants_data.t2_fname', $tenants_data['t2_fname'] ?? '') }}" type="text" class="form-control">
                                                                <label for="tenant2_fname">First Name</label>
                                                                @if ($errors->has('tenants_data.t2_fname'))<span class="text-danger">{{ $errors->first('tenants_data.t2_fname') }}</span>@endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-3">
                                                            <div class="form-floating required{{ $errors->has('tenants_data.t2_lname') ? 'has-error' : '' }}">
                                                                <input id="tenant2_lname" placeholder="Last Name" name="tenants_data[t2_lname]" value="{{ old('tenants_data.t2_lname', $tenants_data['t2_lname'] ?? '') }}" type="text" class="form-control">
                                                                <label for="tenant2_lname">Last Name</label>
                                                                @if ($errors->has('tenants_data.t2_lname'))<span class="text-danger">{{ $errors->first('tenants_data.t2_lname') }}</span>@endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-3">
                                                            <div class="form-floating required{{ $errors->has('tenants_data.t2_email') ? 'has-error' : '' }}">
                                                                <input id="tenant2_email" placeholder="E-mail" name="tenants_data[t2_email]" value="{{ old('tenants_data.t2_email', $tenants_data['t2_email'] ?? '' ) }}" type="text" class="form-control">
                                                                <label for="tenant2_email">Email</label>
                                                                @if ($errors->has('tenants_data.t2_email'))<span class="text-danger">{{ $errors->first('tenants_data.t2_email') }}</span>@endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-3">
                                                            <div class="form-floating required{{ $errors->has('tenants_data.t2_phone') ? 'has-error' : '' }}">
                                                                <input id="tenant2_phone" placeholder="Phone" name="tenants_data[t2_phone]" value="{{ old('tenants_data.t2_phone', $tenants_data['t2_phone'] ?? '') }}" type="text" class="form-control">
                                                                <label for="tenant2_phone">Phone</label>
                                                                @if ($errors->has('tenants_data.t2_phone'))<span class="text-danger">{{ $errors->first('tenants_data.t2_phone') }}</span>@endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($third_tenant_data == true)
                                                    <h5 style="font-weight: 600; margin-bottom: 10px !important;">Third Tenant's Name</h5>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 col-md-3">
                                                            <div class="form-floating required{{ $errors->has('tenants_data.t3_fname') ? 'has-error' : '' }}">
                                                                <input id="tenant3_fname" placeholder="First Name" name="tenants_data[t3_fname]" value="{{ old('tenants_data.t3_fname', $tenants_data['t3_fname'] ?? '') }}" type="text" class="form-control">
                                                                <label for="tenant3_fname">First Name</label>
                                                                @if ($errors->has('tenants_data.t3_fname'))<span class="text-danger">{{ $errors->first('tenants_data.t3_fname') }}</span>@endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-3">
                                                            <div class="form-floating required{{ $errors->has('tenants_data.t3_lname') ? 'has-error' : '' }}">
                                                                <input id="tenant3_lname" placeholder="Last Name" name="tenants_data[t3_lname]" value="{{ old('tenants_data.t3_lname', $tenants_data['t3_lname'] ?? '') }}" type="text" class="form-control">
                                                                <label for="tenant3_lname">Last Name</label>
                                                                @if ($errors->has('tenants_data.t3_lname'))<span class="text-danger">{{ $errors->first('tenants_data.t3_lname') }}</span>@endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-3">
                                                            <div class="form-floating required{{ $errors->has('tenants_data.t3_email') ? 'has-error' : '' }}">
                                                                <input id="tenant3_email" placeholder="E-mail" name="tenants_data[t3_email]" value="{{ old('tenants_data.t3_email', $tenants_data['t3_email'] ?? '' ) }}" type="text" class="form-control">
                                                                <label for="tenant3_email">Email</label>
                                                                @if ($errors->has('tenants_data.t3_email'))<span class="text-danger">{{ $errors->first('tenants_data.t3_email') }}</span>@endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 col-md-3">
                                                            <div class="form-floating required{{ $errors->has('tenants_data.t3_phone') ? 'has-error' : '' }}">
                                                                <input id="tenant3_phone" placeholder="Phone" name="tenants_data[t3_phone]" value="{{ old('tenants_data.t3_phone', $tenants_data['t3_phone'] ?? '') }}" type="text" class="form-control">
                                                                <label for="tenant3_phone">Phone</label>
                                                                @if ($errors->has('tenants_data.t3_phone'))<span class="text-danger">{{ $errors->first('tenants_data.t3_phone') }}</span>@endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                        <li>
                                            @if($adult_tenants > 0)
                                                <h4 class="d-inline">CORRECT LEGAL NAMES:<br><small>of all ADULT persons (age 19 or older) other than tenant(s) to occupy the rental unit.</small></h4>
                                                <div class="form-row-group tenant_data" id="adult_tenants_fullnames">
                                                    @for ($i = 1; $i <= $adult_tenants; $i++)
                                                        <h5 style="font-weight: 600; margin-bottom: 10px !important;">{{ numtoword($i) }} Adult Additional Occupant's Name</h5>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6 mb-3">
                                                                <div class="form-floating">
                                                                    <input id="adult_names{{$i}}_fname" placeholder="First Name" name="adult_names[{{$i}}][fname]" value="{{ old("adult_names.{$i}.fname", isset($adult_names[$i]['fname']) ? $adult_names[$i]['fname'] : '') }}" type="text" class="form-control">
                                                                    <label for="adult_names{{$i}}_fname" class="form-label">First Name</label>
                                                                    @if ($errors->has('adult_names.'.$i.'.fname'))
                                                                        <div class="text-danger">{{ $errors->first('adult_names.'.$i.'.fname') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mb-3">
                                                                <div class="form-floating">
                                                                    <input id="adult_names{{$i}}_lname" placeholder="Last Name" name="adult_names[{{$i}}][lname]" value="{{ old("adult_names.{$i}.lname", isset($adult_names[$i]['lname']) ? $adult_names[$i]['lname'] : '') }}" type="text" class="form-control">
                                                                    <label for="adult_names{{$i}}_lname" class="form-label">Last Name</label>
                                                                    @if ($errors->has('adult_names.'.$i.'.lname'))
                                                                        <div class="text-danger">{{ $errors->first('adult_names.'.$i.'.lname') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            @endif
                                            @if($minor_tenants > 0)
                                                <h4>CORRECT LEGAL NAMES:<br><small>of all MINOR persons (under age 19, including infants) to occupy the rental unit.</small></h4>
                                                <div class="form-row-group tenant_data" id="minor_tenants_fullnames">
                                                    @for ($i = 1; $i <= $minor_tenants; $i++)
                                                        <h5 style="font-weight: 600; margin-bottom: 10px !important;">{{ numtoword($i) }} Minor Additional Occupant's Name</h5>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6 mb-3">
                                                                <div class="form-floating">
                                                                    <input id="minor_names{{$i}}_fname" placeholder="First Name" name="minor_names[{{$i}}][fname]" value="{{ old("minor_names.{$i}.fname") ?? @$minor_names[$i]['fname'] }}" type="text" class="form-control">
                                                                    <label for="minor_names{{$i}}_fname" class="form-label">First Name</label>
                                                                    @if ($errors->has('minor_names.'.$i.'.fname'))
                                                                        <div class="text-danger">{{ $errors->first('minor_names.'.$i.'.fname') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 mb-3">
                                                                <div class="form-floating">
                                                                    <input id="minor_names{{$i}}_lname" placeholder="Last Name" name="minor_names[{{$i}}][lname]" value="{{ old("minor_names.{$i}.lname") ?? @$minor_names[$i]['lname'] }}" type="text" class="form-control">
                                                                    <label for="minor_names{{$i}}_lname" class="form-label">Last Name</label>
                                                                    @if ($errors->has('minor_names.'.$i.'.lname'))
                                                                        <div class="text-danger">{{ $errors->first('minor_names.'.$i.'.lname') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            @endif
                                            <h5 style="margin-bottom: 20px" class="d-inline">Only those listed above may occupy the premises. (Tenants, Adults listed under Occupants and Minor Occupants.)</h5>
                                        </li>
                                        <li><strong>RENTAL UNIT TO BE RENTED:</strong><small>(called residential premises in this tenancy agreement)</small>
                                            <div class="form-row-group tenant_data">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 col-md-4">
                                                        <div class="form-floating mb-2 {{ $errors->has('property_address.unit') ? 'has-error' : '' }}">
                                                            <input id="property_address_unit" placeholder="Unit Number" name="property_address[unit]" value="{{ old('property_address.unit',  @$property->unit_number) }}" type="text" class="form-control">
                                                            <label for="property_address_unit">Unit Number</label>
                                                            @if ($errors->has('property_address.unit'))<span class="text-danger">{{ $errors->first('property_address.unit') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4">
                                                        <div class="form-floating mb-2 required {{ $errors->has('property_address.st') ? 'has-error' : '' }}">
                                                            <input id="property_address_st" onkeyup="initAutocomplete(this.id)" placeholder="Street Address" name="property_address[st]" value="{{ old('property_address.st', @$property->address) }}" type="text" class="form-control">
                                                            <label for="property_address_st">Street Address</label>
                                                            @if ($errors->has('property_address.st'))<span class="text-danger">{{ $errors->first('property_address.st') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating mb-2 required {{ $errors->has('property_address.city') ? 'has-error' : '' }}">
                                                            <input id="property_address_city" placeholder="City" name="property_address[city]" value="{{ old('property_address.city', @$property->city) }}" type="text" class="form-control">
                                                            <label for="property_address_city">City</label>
                                                            @if ($errors->has('property_address.city'))<span class="text-danger">{{ $errors->first('property_address.city') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 col-md-4">
                                                        <div class="form-floating mb-2 required {{ $errors->has('property_address.state') ? 'has-error' : '' }}">
                                                            <input id="property_address_state" placeholder="State / Province / Region" name="property_address[state]" value="{{ old('property_address.state', @$property->state) }}" type="text" class="form-control">
                                                            <label for="property_address_state">State / Province / Region</label>
                                                            @if ($errors->has('property_address.state'))<span class="text-danger">{{ $errors->first('property_address.state') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4">
                                                        <div class="form-floating mb-2 required {{ $errors->has('property_address.zip') ? 'has-error' : '' }}">
                                                            <input id="property_address_zip" placeholder="ZIP / Postal Code" name="property_address[zip]" value="{{ old('property_address.zip', @$property->zip) }}" type="text" class="form-control">
                                                            <label for="property_address_zip">ZIP / Postal Code</label>
                                                            @if ($errors->has('property_address.zip'))<span class="text-danger">{{ $errors->first('property_address.zip') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4">
                                                        <div class="form-floating {{ $errors->has('property_address.country') ? 'has-error' : '' }}">
                                                            <select id="property_address_country" class="form-select" name="property_address[country]" style="width: 100%;" aria-label="Floating label select">
                                                                <option value="">Select Country*</option>
                                                                @php
                                                                    $sel_country = old('property_address.country', @$property->country);
                                                                        if(empty($sel_country)){
                                                                            $sel_country = 'CA';
                                                                        }
                                                                @endphp
                                                                @foreach($countries as $country)
                                                                    <option value="{{ $country->nicename }}" {{ $sel_country == $country->nicename ? 'selected' : '' }}>{{ $country->nicename }}</option>
                                                                    {{-- <option value="{{ $country->nicename }}" {{ $sel_country==$country->nicename ? 'selected' : '' }} >{{ $country->nicename }}</option> --}}
                                                                @endforeach
                                                            </select>
                                                            <label for="property_address_country">Country</label>
                                                            @if ($errors->has('property_address.country'))<span class="text-danger">{{ $errors->first('property_address.country') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>No furnishings, equipment, facilities, services, or utilities will be provided by the landlord and included in the rent EXCEPT those checked below, which the tenant agrees are in good condition and which the tenant and his guests will use carefully. See Clause 11, Utilities Payment</h6>
                                            <div class="form-row-group tenant_data">
                                                @php
                                                    $utilities_data = array('Refrigerator', 'Range', 'Dishwasher', 'Garburator', 'Garbage compactor', 'Washer in premises', 'Dryer in premises', 'Washer and dryer in common room', 'Security alarm', 'Microwave', 'Hood fan', 'Hot water', 'Heat', 'Electricity', 'Cablevision', 'Gas', 'Parking stall 1', 'Parking stall 2', 'Storage locker');
                                                @endphp
                                                <div class="row">
                                                    @php $i = 1; @endphp
                                                    @foreach($utilities_data as $utility)
                                                        @php $key = str_slug($utility, '_'); @endphp
                                                        <div class="col-md-3">
                                                            <div class="{{ @$utilities[$key] }}">
                                                                <div class="form-check md-form-inline-check">
                                                                    <input class="form-check-input filled-in" name="utilities[{{$key}}]" value="1" id="utilities_{{$key}}" type="checkbox" @if(old('utilities.'.$key, @$utilities[$key])=="1" ) checked @endif>
                                                                    <label class="form-check-label" for="utilities_{{$key}}" style="font-size: 13px;"> {{$utility}}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($i % 4 == 0 && $i != count($utilities_data))
                                                            </div><div class="row">
                                                        @endif
                                                        @php $i++; @endphp
                                                    @endforeach
                                                </div>
                                                <p>The landlord must not take away or make the tenant pay extra for a service or facility that is already included in the rent, unless a reduction is made under section 27 (2) of the Act.</p>
                                                <small><em>* Upon 30 days written notice, the landlord may change or remove any of these services, if the method by which they are supplied to the landlord changes</em></small>
                                            </div>
                                        </li>
                                        <li><strong>RENTAL PERIOD AND TERMS OF TENANCY.</strong>
                                            <div class="d-flex align-items-center">
                                                <span>The tenancy created by this agreement STARTS ON:</span>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-md-4 mx-1" style="padding-right: 0px;">
                                                        <div class="form-group required {{ $errors->has('rental_period.start_date') ? 'has-error' : '' }}">
                                                            <input id="rental_period_start_date" name="rental_period[start_date]" value="{{ old('rental_period.start_date', @$rental_period['start_date'] ?? '') }}" type="text" class="form-control datepicker" style="height: 26px;">
                                                        </div>
                                                        @if ($errors->has('rental_period.start_date'))
                                                            <span class="text-danger">{{ $errors->first('rental_period.start_date') }}</span>
                                                        @endif
                                                    </div>
                                                    Term of
                                                    <div class="col-md-4" style="padding-right: 0px; padding-left: 4px; margin-right: 6px;">
                                                        <div class="form-group required {{ $errors->has('rental_period.term_of') ? 'has-error' : '' }}">
                                                            <input id="rental_period_term_of" name="rental_period[term_of]" value="{{ old('rental_period.term_of', @$rental_period['term_of'] ?? '') }}" type="text" class="form-control"  style="height: 26px;">
                                                        </div>
                                                        @if ($errors->has('rental_period.term_of'))
                                                            <span class="text-danger">{{ $errors->first('rental_period.term_of') }}</span>
                                                        @endif
                                                    </div>
                                                    months
                                                </div>


                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input filled-in" name="rental_period[rental_terms]" value="monthly" id="rental_period_month_to_month" type="radio" @if(old('rental_period.rental_terms', @$rental_period['rental_terms'])=="monthly" ) checked @endif>
                                                <label class="form-check-label" for="rental_period_month_to_month"> <strong>A.</strong> and continues on a month to month basis until cancelled in accordance with the Act.</label>
                                            </div>
                                            <div class="form-check d-flex">
                                                <input class="form-check-input filled-in" name="rental_period[rental_terms]" value="fixed" id="rental_period_fixed" type="radio" @if(old('rental_period.rental_terms', @$rental_period['rental_terms'])=="fixed" ) checked @endif>
                                                <label class="form-check-label" for="rental_period_fixed" style="padding: 0px 10px;"><strong>B.</strong> and is for a fixed term ending on</label>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="md-form md-form-inline required {{ $errors->has('rental_period.fixed_ending_on') ? 'has-error' : '' }}">
                                                            <input id="fixed_ending_on" name="rental_period[fixed_ending_on]" value="{{ old('rental_period.fixed_ending_on', @$rental_period['fixed_ending_on'] ?? '') }}" type="text" class="form-control datepicker" style="height: 26px; width: 110px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <i class="fa fa-info-circle" style="cursor:pointer;color:#aaa" title="You can change the tenancy term ending date from here"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($errors->has('rental_period.rental_terms'))
                                                <span class="text-danger">The rental A or B terms field is required.</span>
                                            @endif
                                            <h5 style="margin-bottom: 10px !important;">IF YOU CHOOSE B, CHECK C OR D</h5>
                                            <div class="form-check">
                                                <input class="form-check-input filled-in" name="rental_period[ending]" value="c" id="rental_period_c" type="radio" @if(old('rental_period.ending', @$rental_period['ending'])=="c") checked @endif>
                                                <label class="form-check-label" for="rental_period_c"><strong>C.</strong> At the end of this time the tenancy will continue on a month to month basis, or another fixed length of time, unless the tenant gives notice to end the tenancy at least one clear month before the end of the term.</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input filled-in" name="rental_period[ending]" value="d" id="rental_period_d" type="radio" @if(old('rental_period.ending', @$rental_period['ending'])=="d") checked @endif>
                                                <label class="form-check-label" for="rental_period_d"><strong>D.</strong> At the end of this time the tenancy is ended and the tenant must vacate the rental unit.</label>
                                            </div>
                                            @if ($errors->has('rental_period.ending'))
                                                <span class="text-danger">The rental C or D terms field is required.</span>
                                            @endif
                                        </li>
                                        @if(isset($data->form_step) && $data->form_step > 0)
                                            <div class="row">
                                                @if(($data->form_step == 1) || (($data->number_tenants == 2 || $data->number_tenants == 3) && $second_tenant_data == true && $data->form_step == 2 && $action == 'edit') || ($data->number_tenants == 3 && $third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                        @php
                                                            $sign_id = 1;
                                                            $sign_field = 'initial_'.$sign_id;
                                                            $sign_field_value = @$data[$sign_field];
                                                        @endphp
                                                        <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div>
                                                                        <label>Tenants' Initials</label>
                                                                    </div>
                                                                    @if(@$sign_field_value=='')
                                                                        {!! SignPad($sign_id, 'Initials') !!}
                                                                        @if(old($sign_field))
                                                                            <div class="sign-pad signtyped old_sign">
                                                                                @if(is_base64(old($sign_field))==true)
                                                                                    <img src="{{ old($sign_field) }}">
                                                                                @else
                                                                                    {!! old($sign_field) !!}
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <div class="sign-pad signtyped">
                                                                            @if(is_base64($sign_field_value)==true)
                                                                                <img src="{{ $sign_field_value }}">
                                                                            @else
                                                                                {!! $sign_field_value !!}
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                    <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                                </div>
                                                            </div>
                                                            @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($second_tenant_data == true && $data->form_step == 2) || ($data->number_tenants == 3 && $third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || (($data->number_tenants == 2 || $data->number_tenants == 3) && $agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $second_tenant_data == true))
                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                        @php
                                                            $sign_id = 2;
                                                            $sign_field = 'initial_'.$sign_id;
                                                            $sign_field_value = @$data[$sign_field];
                                                        @endphp
                                                        <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div>
                                                                        <label>Second Tenants' Initials</label>
                                                                    </div>
                                                                    @if(@$sign_field_value=='')
                                                                        {!! SignPad($sign_id, 'Initials') !!}
                                                                        @if(old($sign_field))
                                                                            <div class="sign-pad signtyped old_sign">
                                                                                @if(is_base64(old($sign_field))==true)
                                                                                    <img src="{{ old($sign_field) }}">
                                                                                @else
                                                                                    {!! old($sign_field) !!}
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <div class="sign-pad signtyped">
                                                                            @if(is_base64($sign_field_value)==true)
                                                                                <img src="{{ $sign_field_value }}">
                                                                            @else
                                                                                {!! $sign_field_value !!}
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
                                                @if(($third_tenant_data == true && $data->form_step == 3) || ($data->number_tenants == 3 && $agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $third_tenant_data == true))
                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                        @php
                                                            $sign_id = 3;
                                                            $sign_field = 'initial_'.$sign_id;
                                                            $sign_field_value = @$data[$sign_field];
                                                        @endphp
                                                        <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div>
                                                                        <label>Third Tenants' Initials</label>
                                                                    </div>
                                                                    @if(@$sign_field_value=='')
                                                                        {!! SignPad($sign_id, 'Initials') !!}
                                                                        @if(old($sign_field))
                                                                            <div class="sign-pad signtyped old_sign">
                                                                                @if(is_base64(old($sign_field))==true)
                                                                                    <img src="{{ old($sign_field) }}">
                                                                                @else
                                                                                    {!! old($sign_field) !!}
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <div class="sign-pad signtyped">
                                                                            @if(is_base64($sign_field_value)==true)
                                                                                <img src="{{ $sign_field_value }}">
                                                                            @else
                                                                                {!! $sign_field_value !!}
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
                                                @if(($agent_data == true && $data->form_step == 4) || (isset($data->id, $action) && $action == 'view'))
                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                        @php
                                                        $sign_id = 4;
                                                        $sign_field = 'initial_'.$sign_id;
                                                        $sign_field_value = @$data[$sign_field];
                                                        @endphp
                                                        <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div>
                                                                        <label>Landlord's Agent's Initials</label>
                                                                    </div>
                                                                    @if(@$sign_field_value == '')
                                                                        {!! SignPad($sign_id, 'Signature') !!}
                                                                        @if(old($sign_field))
                                                                            <div class="sign-pad signtyped old_sign">
                                                                                @if(is_base64(old($sign_field))==true)
                                                                                    <img src="{{ old($sign_field) }}">
                                                                                @else
                                                                                    {!! old($sign_field) !!}
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <div class="sign-pad signtyped">
                                                                            @if(is_base64($sign_field_value)==true)
                                                                                <img src="{{ $sign_field_value }}">
                                                                            @else
                                                                                {!! $sign_field_value !!}
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
                                        @endif
                                        <li><strong>LIQUIDATED DAMAGES.</strong> If the tenant breaches a material term of this Agreement that causes the landlord to end the tenancy before the end of any fixed term, or if the tenant provides the landlord with notice, whether written, oral, or by conduct, of an intention to breach this Agreement and end the tenancy by vacating, and does vacatebefore the end of any fixed term, the tenant will pay to the landlord the sum of $
                                            <div class="md-form-inline required {{ $errors->has('ad_excess_11') ? 'has-error' : '' }}">
                                                <input type="text" id="liquidated_damages" name="liquidated_damages" value="{{ old('liquidated_damages', $data->liquidated_damages ?? @$property_liquidated_damages) ?: 0 }}"  class="form-control" placeholder="0" style="height: 25px;">
                                            </div>
                                            Plus GST as liquidated damages and not as a penalty for all costs associated with re-renting the
                                            rental unit. Payment of such liquidated damages does not preclude the landlord from claiming future
                                            rental revenue losses due to a material breach of the agreement that will remain unliquidated. </li>
                                        <li><strong>RENT AND FEES.</strong> Rent must be received by the landlord on or before the first calendar day of each month, unless the parties agree in advance in writing to a different date.
                                            <div class="rent_fees d-flex align-items-center mb-2"><span class="label2">Rent: $ </span>
                                                <div class="md-form-inline required {{ $errors->has('rental_period.start_date') ? 'has-error' : '' }}" style="padding: 0px 10px;">
                                                    <input id="rent_fees_rent" name="rent_fees[rent]" value="{{ old('rent_fees.rent', @$rent_fees['rent'] ?? @$property_rate) }}" type="text" class="form-control" style="height: 25px;">
                                                </div>/Per
                                                <div class="form-check md-form-inline" >
                                                    <input class="form-check-input filled-in" name="rent_fees[per]" value="month" id="per_month" type="radio" @if(old('rent_fees.per', @$rent_fees['per'])=="month" ) checked @elseif(empty(@$rent_fees['per'])) checked @endif style="margin-left: 10px;">
                                                    <label class="form-check-label" for="per_month" style="padding: 0 10px;">Month</label>
                                                </div>
                                                <div class="form-check md-form-inline">
                                                    <input class="form-check-input filled-in" name="rent_fees[per]" value="week" id="per_week" type="radio" @if(old('rent_fees.per', @$rent_fees['per'])=="week" ) checked @endif>
                                                    <label class="form-check-label" for="per_week" style="padding-right: 10px;">Week</label>
                                                </div>
                                                <div class="form-check md-form-inline">
                                                    <input class="form-check-input filled-in" name="rent_fees[per]" value="other" id="per_other" type="radio" @if(old('rent_fees.per', @$rent_fees['per'])=="other" ) checked @endif>
                                                    <label class="form-check-label" for="per_other" style="padding-right: 10px;">Other:</label>
                                                </div>
                                                <div class="md-form-inline required {{ $errors->has('rent_fees.other_label') ? 'has-error' : '' }}">
                                                    <input id="other_label" name="rent_fees[other_label]" value="{{ old('rent_fees.other_label', @$rent_fees['other_label'] ?? '') }}" type="text" class="form-control" style="height: 30px;">
                                                </div>
                                            </div>
                                            <div class="rent_fees d-flex align-items-center mb-2"><span class="label2">Parking Fee(s): $ </span>
                                                <div class="md-form-inline required {{ $errors->has('rent_fees.parking') ? 'has-error' : '' }} px-2">
                                                    <input id="rent_fees_parking" name="rent_fees[parking]" value="{{ old('rent_fees.parking', @$rent_fees['parking'] ?? '0') }}" type="text" class="form-control" style="height: 30px;">
                                                </div>
                                                (<div class="md-form-inline required {{ $errors->has('rent_fees.parking_specify') ? 'has-error' : '' }}">
                                                    <input id="parking_specify" name="rent_fees[parking_specify]" value="{{ old('rent_fees.parking_specify', @$rent_fees['parking_specify'] ?? '') }}" type="text" class="form-control" placeholder="Specify" style="height: 30px;">
                                                </div>)
                                            </div>
                                            <div class="rent_fees d-flex align-items-center mb-2"><span class="label2">Other Fee(s): $ </span>
                                                <div class="md-form-inline required {{ $errors->has('rent_fees.other') ? 'has-error' : '' }} px-2">
                                                    <input id="rent_fees_other" name="rent_fees[other]" value="{{ old('rent_fees.other', @$rent_fees['other'] ?? '0') }}" type="text" class="form-control" style="height: 30px;">
                                                </div>
                                                (<div class="md-form-inline required {{ $errors->has('rent_fees.other_specify') ? 'has-error' : '' }}">
                                                    <input id="other_specify" name="rent_fees[other_specify]" value="{{ old('rent_fees.other_specify', @$rent_fees['other_specify'] ?? '') }}" type="text" class="form-control" placeholder="Specify" style="height: 30px;">
                                                </div>)
                                            </div>
                                            <div class="rent_fees d-flex align-items-center mb-2"><span class="label2">TOTAL RENT AND FEES: $ </span>
                                                <div class="md-form-inline required {{ $errors->has('rent_fees.total') ? 'has-error' : '' }} px-2">
                                                    <input id="rent_fees_total" name="rent_fees[total]" value="{{ old('rent_fees.total', @$rent_fees['total'] ?? @$property_rate) }}" type="text" class="form-control" style="height: 30px;">
                                                </div>
                                            </div>
                                            <div> Subject to clause 13, Additional Occupants, the tenant agrees that for each additional tenant or occupant not named in clause 1 or 2 above, the rent will increase by $
                                                <div class="md-form-inline required {{ $errors->has('rent_fees.rent_increase') ? 'has-error' : '' }}">
                                                    <input type="text" id="rent_increase" name="rent_fees[rent_increase]" value="{{ old('rent_fees.rent_increase', $rent_fees['rent_increase'] ?? '50') }}" class="form-control" placeholder='0' style="height: 28px;">
                                                </div>
                                                per month, effective from the date of his occupancy. The acceptance by the landlord of any additional occupant does not otherwise change this Agreement or create a new tenancy.
                                            </div> </li>
                                        <li><strong>SECURITY DEPOSIT AND PET DAMAGE DEPOSIT.</strong>
                                            <div class="d-flex align-items-center mb-2">A security deposit in the amount of $
                                                <div class="px-2 required {{ $errors->has('security.0') ? 'has-error' : '' }}">
                                                    <input type="text" id="security_0" name="security[0]" value="{{ old('security.0', @$security['0'] ?? @$security_deposit) }}" class="form-control" placeholder='' style="text-align: left; height: 28px;">
                                                    @if ($errors->has('security.0'))<span class="text-danger">{{ $errors->first('security.0') }}</span>@endif
                                                </div> paid on
                                                <div class="px-2 required {{ $errors->has('security.1') ? 'has-error' : '' }}">
                                                    <input type="text" id="security_1" name="security[1]" value="{{ old('security.1', @$security['1'] ?? '') }}" class="form-control datepicker" placeholder='' style="height: 28px;">
                                                    @if ($errors->has('security.1'))<span class="text-danger">{{ $errors->first('security.1') }}</span>@endif
                                                </div>
                                            </div>


                                            <div class="d-flex align-items-center">A pet damage deposit in the amount of $
                                                <div class="required {{ $errors->has('security.2') ? 'has-error' : '' }} px-2">
                                                    <input type="text" id="security_2" name="security[2]" value="{{ old('security.2', @$security['2'] ?? '0') }}" class="form-control" placeholder='' style="text-align: left; height: 28px;">
                                                </div>paid on
                                                <div class="required {{ $errors->has('security.3') ? 'has-error' : '' }} px-2">
                                                    <input type="text" id="security_3" name="security[3]" value="{{ old('security.3', @$security['3'] ?? '') }}" class="form-control datepicker" placeholder='' style="height: 28px;">
                                                </div>
                                            </div>
                                            @if ($errors->has('security.2'))<span class="text-danger">{{ $errors->first('security.2') }}</span>@endif
                                            @if ($errors->has('security.3'))<span class="text-danger">{{ $errors->first('security.3') }}</span>@endif
                                            <strong>The landlord agrees:</strong>
                                            <ul class="no-ol" style="margin:0;padding: 0">
                                                <li><strong>(a)</strong> that the security deposit and pet damage deposit must each not exceed one half of the monthly rent payable for the rental unit,</li>
                                                <li><strong>(b)</strong> to keep the security deposit and pet damage deposit during the tenancy and pay interest on it in accordance with the Regulation, and</li>
                                                <li><strong>(c)</strong> to repay the security deposit and pet damage deposit and interest to the tenant within 15 days of the end of the tenancy agreement, unless the tenant agrees in writing to allow the landlord to keep an amount as payment for unpaid rent or damage, or the landlord applies for dispute resolution under the Act within 15 days of the end of the tenancy agreement to claim some or all of the security deposit or pet damage deposit. The 15 days period starts on the later of the date the tenancy ends, or the date the landlord receives the tenant’s forwarding address in writing.</li>
                                                <li><strong>(d)</strong> If the landlord does not comply with (c), the landlord may not make a claim against the security deposit or pet damage deposit, and must pay the tenant double the amount of the security deposit, pet damage deposit, or both.</li>
                                                <li><strong>(e)</strong> The tenant may agree to use the security deposit and interest as rent only if the landlord gives written consent.</li>
                                            </ul>
                                            <p>At the end of the tenancy, the landlord may retain from a security deposit or a pet damage deposit any unpaid amount that a Dispute Resolution Officer has ordered the tenant to pay to the landlord.</p> </li>
                                        <li><strong>CONDITION INSPECTIONS.</strong> In accordance with sections 23 and 35 of the Act and Part 3
                                            of the Regulation, the landlord and tenant must inspect the condition of the rental unit together when
                                            the tenant is entitled to possession, when the tenant starts keeping a pet during the tenancy if a
                                            condition inspection was not completed at the start of the tenancy, and at the end of the tenancy. The
                                            landlord and tenant may agree on a different day for the condition inspection. The right of a tenant
                                            to return of a security or pet damage deposit or both, or the right of a landlord to claim against a
                                            security or pet damage deposit or both for damage to residential property is extinguished if that
                                            party does not comply with sections 23 and 35 of the Act.</li>

                                        <li><strong>PAYMENT OF RENT.</strong> The tenant must pay the rent on time, unless the tenant is
                                            permitted under the Act to deduct from the rent. If the rent is unpaid, the landlord may issue a
                                            notice to end a tenancy to the tenant, which may take effect not earlier than 10 days after the date
                                            the tenant receives the notice. The landlord must give the tenant a receipt for rent paid in cash. The
                                            landlord must return to the tenant on or before the last day of the tenancy any post-dated cheques for
                                            rent that remain in the possession of the landlord. If the landlord does not have a forwarding address
                                            for the tenant and the tenant has vacated the rental unit without notice to the landlord, the landlord
                                            must forward any post-dated cheques for rent to the tenant when the tenant provides a forwarding
                                            address in writing. </li>

                                        <li><strong>ARREARS.</strong> Late payment, returned or non-sufficient funds (N.S.F.) cheques are
                                            subject to an administrative fee of not more than $25.00 each, plus the amount of any service fees
                                            charged by a financial institution to the landlord. Although these fees are payable by the tenant to
                                            the landlord, failure to pay the rent on the due date is a breach of a material term of this
                                            Agreement. The obligation of the tenant under this Agreement and by law requires the rent to be paid
                                            on the date that it is due. For example, an excuse that the tenant does not have the rent money or
                                            will not have the rent money until a later date is not an acceptable excuse in law.</li>
                                        <li><strong>UTILITIES PAYMENT.</strong> Utilities that are not included in the rent or are not paid to
                                            the landlord are the responsibility of the tenant who must apply for hook up and must maintain current
                                            payment of the utility account. The discontinuation of utility service resulting from the tenant's
                                            cancellation or failure to maintain payment of his utility account is a breach of a material term of
                                            this Agreement. The landlord has the right to end the tenancy if the tenant fails to correct the
                                            breach within a reasonable time after receiving written notice to do so. Any utilities charges to be
                                            paid to the landlord that remain unpaid more than 30 days after the tenant receives a written demand
                                            for payment will be treated as unpaid rent and the landlord may issue a Notice to End Tenancy.</li>
                                        <li><strong>RENT INCREASES.</strong> Once a year the landlord may increase the rent for the existing
                                            tenant. The landlord may only increase the rent 12 months after the date that the existing rent was
                                            established with the tenant or 12 months after the date of the last legal rent increase for the
                                            tenant, even if there is a new landlord or a new tenant by way of an assignment. The landlord must use
                                            the approved Notice of Rent Increase form available from any Residential Tenancy Branch or ServiceBC
                                            Centre. The landlord must give the tenant 3 whole months notice, in writing, of a rent increase. For
                                            example, if the rent is due on the 1st of the month and the tenant is given notice any time in
                                            January, including January 1st, there must be 3 whole months before the increase begins. In this
                                            example, the months are February, March and April, so the increase would begin on May 1st. The
                                            landlord may increase the rent only in the amount set out by the Regulation. If the tenant thinks the
                                            rent increase is more than is allowed by the Regulation, the tenant may talk to the landlord or
                                            contact the Residential Tenancy office for assistance. Either the landlord or the tenant may obtain
                                            the percentage amount prescribed for a rent increase from the Residential Tenancy office.</li>
                                        <li><strong>ADDITIONAL OCCUPANTS.</strong> Only those persons listed in clauses 1 or 2 above may occupy
                                            the rental unit or residential property. A person not listed in 1 or 2 above who, without the
                                            landlord's prior written consent, resides in the rental unit or on the residential property in excess
                                            of fourteen cumulative days in a calendar year will be considered to be occupying the rental unit or
                                            residential property contrary to this Agreement. If the tenant anticipates an additional occupant, the
                                            tenant must apply in writing for approval from the landlord for such person to become an authorized
                                            occupant. Failure to obtain the landlord's written approval is a breach of a material term of this
                                            Agreement, giving the landlord the right to end the tenancy on proper notice.</li>
                                        <li><strong>USE OF RENTAL UNIT.</strong> The tenant and his guests must use the rental unit for private
                                            residential purposes only and not for any illegal, unlawful, commercial, political, or business
                                            purposes. No public meetings or assemblies may be held in the rental unit. No business or commercial
                                            advertising may be placed on or at the rental unit or the residential property. When the landlord
                                            supplies window coverings, the tenant's drapes and curtains may not be used without the landlord's
                                            prior written consent. The tenant will not make or cause any structural alteration to be made to the
                                            rental unit or residential property. Painting, papering, or decorating of the rental unit or
                                            residential property may be done only with the landlord's prior written consent and with landlord
                                            approved colours. Hooks, nails, tapes, or other devices for hang pictures or plants, or for affixing
                                            anything to the rental unit or residential property will be of a type approved by the landlord and
                                            used only with the landlord's prior written consent. The tenant may not install a washer, dryer,
                                            dishwasher, freezer, or similar equipment without the landlord's prior written consent. Any appliance
                                            or equipment supplied by the landlord must not be repaired or removed without the landlord's prior
                                            written consent. The tenant must ensure that the rental unit is appropriately ventilated, exhaust fans
                                            are regularly used, and must follow reasonable housekeeping practices, to minimize the presence or
                                            accumulation of moisture, thus preventing the occurrence of mould or mildew.</li>
                                        <li><strong>MOVING.</strong> The tenant's property must be moved in or out of the residential property
                                            through designated doors, at the risk of the tenant. The tenant will be liable for any costs of
                                            moving, including any costs resulting from injury, or from damage to the tenant's property, the
                                            residential property, or the rental unit. If the tenant requests and the landlord agrees to a move to
                                            a different rental unit within the residential property, the landlord may charge the tenant the
                                            greater of $15 or 3% of the rent in the tenant's current rental unit as a one-time moving fee.</li>
                                        <li><strong>ASSIGN OR SUBLET.</strong> The tenant may assign or sublet the rental unit to another person
                                            with the written consent of the landlord. If this tenancy agreement is for a fixed length of 6 months
                                            or more, the landlord must not unreasonably withhold consent. Under an assignment a new tenant must
                                            assume all of the rights and obligations under this tenancy agreement, at the same rent. The landlord
                                            must not charge a fee or receive a benefit, directly or indirectly, for giving this consent. If a
                                            landlord unreasonably withholds consent to assign or sublet or charges a fee, the tenant may apply for
                                            dispute resolution under the Act.</li>

                                        <li><strong>CONDUCT.</strong> In order to promote the safety, welfare, enjoyment, and comfort of other
                                            occupants and tenants of the residential property and the landlord, the tenant or the tenant's guests
                                            must not disturb, harass, or annoy another occupant of the residential property, the landlord, or a
                                            neighbour. In addition, noise or behaviour, which in the reasonable opinion of the landlord may
                                            disturb the comfort of any occupant of the residential property or other person, must not be made by
                                            the tenant or the tenant's guests, nor must any noise be repeated or persisted after a request to
                                            discontinue such noise or behaviour has been made by the landlord. The tenant or the tenant's guests
                                            must not cause or allow loud conversation or noise to disturb the quiet enjoyment of another occupant
                                            of the residential property or other person at any time, and in particular between the hours of 10:00
                                            p.m. and 9:00 a.m. If any tenant or tenant's guest causes another tenant to vacate his rental unit
                                            because of such noise or other disturbance, harassment, or annoyance or because of illegal activity by
                                            the tenant or tenant's guest, the tenant must indemnify and save harmless the landlord for all costs,
                                            losses, damages, or expenses caused thereby. The landlord may end the tenancy pursuant to the Act as
                                            one of his remedies.</li>

                                        <li><strong>PETS.</strong> Unless specifically permitted in writing in advance by the landlord, the
                                            tenant must not keep or allow on the residential property any animal, including a dog, cat, reptile,
                                            or exotic animal, domestic or wild, fur bearing or otherwise. Where the landlord has given his
                                            permission in advance in writing, the tenant must ensure that the pet does not disturb any person in
                                            the residential property or neighbouring property, and further the tenant must ensure that no damage
                                            occurs to the rental unit or residential property as a result of having or keeping the pet. This is
                                            a material term of this Agreement. If any damage occurs caused by the pet, the tenant will be liable
                                            for such damage and will compensate the landlord for damages, expenses, legal fees and/or any
                                            reasonable costs incurred by the landlord. Further, if the landlord gives notice to the tenant to
                                            correct any breach and the tenant fails to comply within a reasonable time, the landlord has a right
                                            to end the tenancy along with making the appropriate claims against the tenant. Having regard to the
                                            potential safety issues, noise factors, health requirements, and mess, the tenant will not encourage
                                            or feed wild birds or animals at or near the residential property.
                                            <p>Any term in this tenancy agreement that prohibits or restricts the size of a pet, or that governs
                                            the tenant’s obligations regarding the keeping of a pet on the residential property is subject to
                                            the rights and restrictions under the Guide Animal Act.</p></li>

                                        <li><strong>OCCUPANTS AND INVITED GUESTS.</strong> The landlord must not stop the tenant from having
                                            guests under reasonable circumstances in the rental unit. The landlord must not impose restrictions on
                                            guests and must not require or accept any extra charge for daytime visits or overnight accommodation
                                            of guests. If the number of occupants in the rental unit is unreasonable, the landlord may discuss the
                                            issue with the tenant and may serve a notice to end a tenancy. Disputes regarding the notice may be
                                            resolved by applying for dispute resolution under the Act.</li>

                                        <li><strong>STORAGE.</strong> All property of the tenant kept on the residential property must be kept
                                            in safe condition in proper storage areas and is at the tenant's risk for loss, theft, or damage
                                            from any cause whatsoever. Hazardous or dangerous items must not be brought onto or kept on or in
                                            the residential property or rental unit. It is a material term of this Agreement that items stored
                                            inside the rental unit must be limited in type and quantity so as not to present a potential fire or
                                            health hazard, or to impede access to, egress from or normal movement within any area of the rental
                                            unit.

                                            <p><strong>VEHICLES.</strong>Only vehicles listed in the tenancy application and no other vehicles may
                                            be parked, but not stored, on the residential property. Vehicles must not leak fluids and must be in
                                            operating condition, currently licensed, and insured for on-road operation. Motor vehicle or other
                                            repairs must not be done in the rental unit or on the residential property.</p>

                                            <p><strong>BICYCLES.</strong> Bicycles are to be stored in designated areas only. They must not be
                                            kept, left, or stored on a balcony or in a hallway. They must not be moved through a lobby or
                                            hallway, or placed in an elevator.</p></li>
                                        <li><strong>LIQUID FILLED ITEMS.</strong> The tenant must not bring in to the rental unit or on the
                                            residential property any waterbed, aquarium, or other property that can be considered to be liquid
                                            filled, without the landlord's prior written consent. The landlord's consent will be subject to the
                                            tenant providing the landlord with written evidence that the tenant has in place tenant liability
                                            insurance with a minimum coverage of $1,000,000.</li>
                                        <li><strong>WASTE MANAGEMENT.</strong> Garbage, waste, boxes, papers, or recyclable materials must not
                                            be placed or left in hallways, a parking area, driveway, patio, or other common area of the
                                            residential property, except those areas designated for disposal. All garbage must be drained,
                                            bagged or wrapped, and tied securely before being placed in a chute or approved receptacle. Spillage
                                            must be cleaned up immediately by the person responsible. Any large item to be discarded, such as
                                            furniture, must not be abandoned or placed in garbage collection areas, but must be removed from the
                                            residential property by the tenant at the tenant&rsquo;s expense. The tenant must comply with the
                                            residential property recycling methods.</li>
                                        <li><strong>CARPETS AND WINDOW COVERINGS.</strong> The tenant is responsible for periodic cleaning of
                                            carpets and window coverings provided by the landlord. While professional cleaning is recommended at
                                            all times, if the carpets and window coverings are new or professionally cleaned at the start of the
                                            tenancy, the tenant will pay for professional cleaning at the end of the tenancy.</li>
                                        <li><strong>FLOORS.</strong> All non-carpeted floors must be kept clean and properly cared for by the
                                            tenant. The tenant will, within one month of the commencement of this tenancy, carpet all traffic
                                            areas that were previously bare floor, to the landlord's reasonable satisfaction. Any furniture
                                            located on the bare floor must have protective devices on the base or legs to protect the floor from
                                            damage.</li>
                                        <li><strong>COMMON AREAS.</strong> The tenant must not misuse or damage common areas of the residential
                                            property, but must use them prudently and safely and must conform to all notices, rules, or
                                            regulations posted on or about the residential property concerning the use of common areas,
                                            including restriction of their use to tenants only and restriction on use by children. All such use
                                            will be at the sole risk of the tenant or the tenant's guests.</li>
                                        <li><strong>OUTSIDE.</strong> Rugs, mops, rags, and dusters must not be shaken out of windows, doors,
                                            or in common areas of the residential property. Nothing may be thrown from or placed on, hung on, or
                                            affixed to the inside or outside of windows, doors, balconies, or the exterior parts of the
                                            residential property. An awning, antenna, satellite dish, cable, or wire must not be installed on
                                            the residential property. A barbecue must not be used on or in the rental unit or stored on a
                                            balcony without the prior written consent of the landlord. A chiminea or outdoor wood-burning stove
                                            may not be used without the landlord's prior written consent.</li>
                                        <li><strong>REPAIRS. Landlord&rsquo;s obligations:</strong>The landlord must provide and maintain the
                                            residential property in a reasonable state of decoration and repair, suitable for occupation by a
                                            tenant. The landlord must comply with health, safety, and housing standards required by law. If the
                                            landlord is required to make a repair to comply with the above obligations, the tenant may discuss
                                            it with the landlord. If the landlord refuses to make the repair, the tenant may apply for dispute
                                            resolution under the Act for the completion and costs of the repair.
                                            <p><strong>Tenant&rsquo;s obligations:</strong> The tenant must maintain reasonable health,
                                            cleanliness, and sanitary standards throughout the rental unit and the residential property to which
                                            the tenant has access. The tenant must take the necessary steps to repair damage to the residential
                                            property caused by the actions or neglect of the tenant or a person permitted on the residential
                                            property by that tenant. The tenant is not responsible for repairs for reasonable wear and tear to
                                            the residential property. If the tenant does not comply with the above obligations within a
                                            reasonable time, the landlord may discuss the matter with the tenant and may apply for dispute
                                            resolution under the Act for the cost of repairs, serve a Notice to End Tenancy, or both.</p>
                                            <p><strong>Emergency Repairs:</strong> The landlord must post and maintain in a conspicuous place on
                                            the residential property, or give to the tenant in writing, the name and telephone number of the
                                            designated contact person for emergency repairs. If emergency repairs are required, the tenant must
                                            make at least two attempts to telephone the designated contact person, and then give the landlord
                                            reasonable time to complete the repairs. If the emergency repairs are still required, the tenant may
                                            undertake the repairs, and claim reimbursement from the landlord, provided a statement of account
                                            and receipts are given to the landlord. If the landlord does not reimburse the tenant as required,
                                            the tenant may deduct the cost from rent. The landlord may take over completion of the emergency
                                            repairs at any time. Emergency repairs must be urgent and necessary for the health and safety of
                                            persons or preservation or use of the residential property, and are limited to repairing major leaks
                                            in pipes or the roof, damaged or blocked water or sewer pipes or plumbing fixtures, the primary
                                            heating system, damaged or defective locks that give access to a rental unit, or the electrical
                                            systems.</p></li>
                                        <li><strong>HAZARDS.</strong> The tenant will immediately notify the landlord or landlord's contact
                                            person in the event of discovery of a fire, or the escape of water, gas or other substance starting
                                            from the rental unit or elsewhere on the residential property. The tenant will also warn any other
                                            persons on the residential property threatened by the hazard. The tenant must inform the landlord at
                                            the earliest opportunity of the presence of pests or vermin in the rental unit or on the residential
                                            property. Should pests or vermin be discovered, the tenant will cooperate with the landlord in
                                            treatment or eradication efforts.</li>
                                        <li><strong>APPLICATION OF THE RESIDENTIAL TENANCY ACT.</strong> The terms of this tenancy agreement
                                            and any changes or additions to the terms may not contradict or change any right or obligation under
                                            the Act or a regulation made under the Act, or any standard term. If a term of this tenancy
                                            agreement does contradict or change such a right, obligation, or standard term, the term of the
                                            tenancy agreement is void. Any change or addition to this tenancy agreement must be agreed to in
                                            writing and initialled by both the landlord and the tenant. If a change is not agreed to in writing,
                                            is not initialled by both the landlord and the tenant or is unconscionable, it is not enforceable.
                                            The requirement for agreement to change this tenancy Agreement does not apply to a rent increase
                                            given in accordance with the Act, a withdrawal of, or a restriction on, a service or facility in
                                            accordance with the Act, or a term in respect of which a landlord or tenant has obtained a Dispute
                                            Resolution Officer’s order that the agreement of the other is not required.</li>
                                        <li><strong>LANDLORD TO GIVE TENANCY AGREEMENT TO TENANT.</strong> The landlord must give the tenant a
                                            copy of this Agreement promptly, and in any event within 21 days of entering into this Agreement.
                                            </li>
                                        <li><strong>LOCKS.</strong> The landlord must not change locks or other means of access to the
                                            residential property unless the landlord provides each tenant with new keys or other means of access
                                            to the residential property. The landlord must not change locks or other means of access to a rental
                                            unit unless the tenant agrees and is given new keys. The tenant must not change locks or other means
                                            of access to common areas of the residential property, unless the landlord agrees in writing to the
                                            change, or to his rental unit, unless the landlord agrees in writing to, or a Dispute Resolution
                                            Officer has ordered, the change.

                                            <p>The door to the tenant's rental unit must be kept closed and in the tenant's absence locked.
                                            Subject to the Act no lock or security device, such as a door chain or alarm system, may be
                                            installed or changed or altered, and extra keys must not be made for any lock on the residential
                                            property or rental unit, except with the prior written consent of the landlord. The entry to any
                                            part of the residential property or rental unit by unauthorized possession of a key or otherwise by
                                            any person is a breach of a material term of this Agreement. The tenant will be responsible for any
                                            cost incurred to regain entrance to the residential property or rental unit including any damage and
                                            all necessary repairs, in the event the tenant locks himself out of the residential property or
                                            rental unit.</p></li>
                                        <li><strong>ENTRY OF RENTAL UNIT BY THE LANDLORD.</strong> For the duration of this tenancy agreement,
                                            the rental unit is the tenant's home and the tenant is entitled to quiet enjoyment, reasonable
                                            privacy, freedom from unreasonable disturbance, and exclusive use of the rental unit. The landlord
                                            may enter the rental unit only if one of the following applies:
                                            <ul class="no-ol">
                                                <li><strong>(a)</strong> at least 24 hours and not more than 30 days before the entry, the landlord gives the tenant a written notice which states the purpose for entering, which must be reasonable, and the date and the time of the entry, which must be between 8 a.m. and 9 p.m. unless the tenant agrees otherwise;</li>
                                                <li><strong>(b)</strong> there is an emergency and the entry is necessary to protect life or property;</li>
                                                <li><strong>(c)</strong> the tenant gives the landlord permission to enter at the time of entry or not more than 30 days before the entry;</li>
                                                <li><strong>(d)</strong> the tenant has abandoned the rental unit;</li>
                                                <li><strong>(e)</strong> the landlord has an order of a Dispute Resolution Officer or court saying the landlord may enter the rental unit;</li>
                                                <li><strong>(f)</strong> the landlord is providing housekeeping or related services and the entry is for that purpose and at a reasonable time.</li>
                                            </ul>
                                            <p>The landlord may inspect the rental unit monthly in accordance with (a) above. </p>
                                            <p>If a landlord enters or is likely to enter the rental unit illegally, the tenant may apply for
                                            dispute resolution under the Act to change the locks, keys, or other means of access to the rental
                                            unit and prohibit the landlord from obtaining entry into the rental unit. At the end of the tenancy
                                            the tenant must give the key to the rental unit to the landlord.</p></li>

                                        <li><strong>ENDING THE TENANCY.</strong> The tenant may end a monthly, weekly, or other periodic
                                            tenancy by giving the landlord at least one month’s written notice. A notice given the day before
                                            the rent is due in a given month ends the tenancy at the end of the following month. For example, if
                                            the tenant wants to move at the end of May, the tenant must make sure the landlord receives written
                                            notice on or before April 30th.<br>
                                            This notice must be in writing and must include the address of the rental unit, include the date the
                                            tenancy is to end, be signed and dated by the tenant, and include the specific grounds for ending
                                            the tenancy, if the tenant is ending a tenancy because the landlord has breached a material term of
                                            the tenancy.<br>If this is a fixed term tenancy and the agreement does not require the tenant to
                                            vacate at the end of the tenancy, the agreement is renewed as a monthly tenancy on the same terms
                                            until the tenant gives notice to end a tenancy as required under the Act. <br>The landlord may end
                                            the tenancy only for the reasons and only in the manner set out in the Act and the landlord must use
                                            the approved notice to end a tenancy form available from the Residential Tenancy office. The
                                            landlord and tenant may mutually agree in writing to end this tenancy agreement at any time. <br>The
                                            tenant must vacate the residential property by 1:00 p.m. on the day the tenancy ends, unless the
                                            landlord and tenant otherwise agree.<br>The tenant understands and agrees that the rental unit may
                                            be shown to potential purchasers or tenants in accordance with the Act. The tenant agrees to fully
                                            cooperate in the interest of incoming tenants.</li>
                                        <li><strong>OVERHOLDING.</strong>If the tenant remains in possession of the rental unit after the last
                                            day of the term as set out in this Agreement, or after any other lawful end of the tenancy, the
                                            landlord may claim for damages against the tenant and the tenant will be liable for damages suffered
                                            by the landlord. The landlord may apply for an Order of Possession or a similar order from a court
                                            or a Dispute Resolution Officer and when such an order has been obtained, eviction by a bailiff may
                                            follow. In addition the landlord and the incoming tenant have a civil right of action against the
                                            tenant as a result of the tenant's failure to leave the rental unit as required by law.</li>
                                        <li><strong>DISPUTE RESOLUTION.</strong> Either the tenant or the landlord has the right to apply for
                                            dispute resolution, as provided under the Act.</li>
                                        <li><strong>SERVICE OF NOTICES.</strong> The tenant must accept any notice, order, process or document
                                            required or permitted to be given, when served in accordance with the Act.</li>
                                        <li><strong>FORM K, NOTICE OF TENANT&rsquo;S RESPONSIBILITIES.</strong>Where the rental unit is a
                                            strata lot, the tenant agrees to complete and sign Form K, Notice of Tenant's Responsibilities,
                                            prior to possession and will at all times during this tenancy comply with the provisions of the
                                            Strata Property Act as it affects him as a tenant and occupier of the strata lot. The tenant agrees
                                            to abide by the provisions of the bylaws and the rules and regulations of the Strata Corporation as
                                            adopted from time to time.</li>
                                        <li><strong>CONTRACTUAL.</strong> If more than one tenant signs this Agreement, each tenant's obligations are joint and several. If more than one landlord signs this Agreement, each landlord's obligations are joint and several. A breach of this Agreement by the tenant may give the landlord the right to end the tenancy in accordance with the Act and thus regain vacant possession of the rental unit. The singular of any word includes the plural, and vice versa. The use of any term is generally applicable to any gender and, where applicable, to a corporation. The word &quot;landlord&quot; includes the owner of the residential property and his authorized agent.</li>
                                        <li><strong>PERSONAL INFORMATION. </strong>The landlord agrees not to use or disclose any of the tenant's personal information contained in this Agreement without the tenant's prior written permission, unless the Personal Information Protection Act permits such use or disclosure.</li>
                                        <li><strong>AGENT NOT A STAKEHOLDER. </strong>The tenant agrees that if the person signing this Agreement as or on behalf of the landlord is an agent for the owner of the residential property, and such agent receives any money in connection with the tenancy, the agent is not a stakeholder, and the agent may release the money to the owner.</li>
                                        <li><strong>DISCLOSURE.</strong> The tenant acknowledges and agrees that the landlord or landlord's agent is not representing or acting on behalf of the tenant in this Agreement.</li>
                                        <li><strong>LIABILITY AND INSURANCE.</strong> The tenant will not do, or permit to be done, anything
                                            that may void the landlord's insurance covering the residential property or rental unit, or that may
                                            cause the landlord's insurance premiums to be increased. Unless the landlord is in breach of a
                                            lawful duty, the tenant releases the landlord from any liability in connection with the use by the
                                            tenant or tenant's guests of the rental unit or the residential property.
                                            <p>The tenant agrees to carry sufficient insurance to cover his property against loss or damage from
                                            any cause and for third party liability. The tenant agrees that the landlord will not be responsible
                                            for any loss or damage to the tenants property. The tenant will be responsible for any claim,
                                            expense, or damage resulting from the tenants failure to comply with any term of this Agreement and
                                            this responsibility will survive the ending of this Agreement.</p>

                                            @if(isset($data->form_step) && $data->form_step > 0)
                                                <div>The tenant has a current tenants insurance policy:
                                                    <div class="form-check md-form-inline">
                                                        <input class="form-check-input filled-in" name="insurance" value="Yes" id="insurance_1" type="radio" @if(old('insurance', @$data->insurance)=="Yes") checked @elseif(empty(@$data->insurance)) checked @endif>
                                                        <label class="form-check-label" for="insurance_1" style="padding-left: 25px;margin-left: 15px;">Yes</label>
                                                    </div>
                                                    <div class="form-check md-form-inline">
                                                        <input class="form-check-input filled-in" name="insurance" value="No" id="insurance_2" type="radio" @if(old('insurance', @$data->insurance)=="No") checked @endif>
                                                        <label class="form-check-label" for="insurance_2" style="padding-left: 25px;margin-left: 15px;">No</label>
                                                    </div>
                                                </div>
                                                <div class="row" id="insurance_docs">
                                                    <div class="col-12 col-sm-6 col-md-6">
                                                        @if(!empty($data->ins_policy) && substr($data->ins_policy, -4) == '.pdf')
                                                            <div class="image-responsive">
                                                                <a href="{{ url('/images/checks/')}}/{{$data->ins_policy}}" alt="voided-check" download><button type="button" class="btn btn-primary">Download</button></a>
                                                            </div>
                                                        @elseif(!empty($data->ins_policy) && substr($data->ins_policy, -4) != '.pdf')
                                                            <div class="image-responsive">
                                                                <img src="{{ isset($data->ins_policy) ? asset('uploads/tenancy/'. $data->id . '/policy/' . $data->ins_policy) : '' }}" alt="policy" style="width: 100%">
                                                            </div>
                                                        @else
                                                            <div class="md2-form {{ $errors->has('ins_policy') ? 'has-error' : '' }}">
                                                                <input id="ins_policy" name="ins_policy" class="form-control" type="file">
                                                                <label for="ins_policy"><span class="filename"></span><span class="info_text">Please take a picture of insurance policy and upload it here. (pdf, jpg, png)</span></label>
                                                                @if ($errors->has('ins_policy'))<span class="text-danger">This field is required. Please take a picture of insurance policy and upload it here. </span>@endif
                                                            </div>
                                                        @endif
                                                        <br />
                                                    </div>
                                                </div>
                                            @endif
                                        </li>
                                        <li><strong>SMOKING.</strong> The tenant agrees to the following material term regarding smoking:
                                            <div class="form-check">
                                                <input class="form-check-input filled-in" name="smoking[0]" value="1" id="smoking_0" type="checkbox" @if(old('smoking.0', @$smoking['0']) == "1" ) checked @endif>
                                                <label class="form-check-label" for="smoking_0">No smoking of any combustible material is permitted on the residential property, including within the rental unit.</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input filled-in" name="smoking[1]" value="1" id="smoking_1" type="checkbox" @if(old('smoking.1', @$smoking['1']) == "1" ) checked @endif>
                                                <label class="form-check-label" for="smoking_1">Smoking of tobacco products only is limited to within the rental unit.</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input filled-in" name="smoking[2]" value="1" id="smoking_2" type="checkbox" @if(old('smoking.2', @$smoking['2']) == "1" ) checked @endif>
                                                <label class="form-check-label" for="smoking_2">Smoking of tobacco products only is limited to the area described as</label>

                                                <div class="md-form md-form-inline required {{ $errors->has('smoking.3') ? 'has-error' : '' }}" style="min-width: 300px">
                                                    <input type="text" id="smoking_3" name="smoking[3]" value="{{ old('smoking.3', @$smoking['3'] ?? '') }}" class="form-control" placeholder='' style="text-align: left; height: 26px;">
                                                </div>
                                            </div>
                                            @if(isset($data->form_step) && $data->form_step > 0)
                                                <div class="row mt-3">
                                                    @if(($data->form_step == 1) || (($data->number_tenants == 2 || $data->number_tenants == 3) && $second_tenant_data == true && $data->form_step == 2 && $action == 'edit') || ($data->number_tenants == 3 && $third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                            @php
                                                                $sign_id = 5;
                                                                $sign_field = 'initial_'.$sign_id;
                                                                $sign_field_value = @$data[$sign_field];
                                                            @endphp
                                                            <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div>
                                                                            <label>Tenants' Initials</label>
                                                                        </div>
                                                                        @if(@$sign_field_value=='')
                                                                            {!! SignPad($sign_id, 'Initials') !!}
                                                                            @if(old($sign_field))
                                                                            <div class="sign-pad signtyped old_sign">
                                                                                @if(is_base64(old($sign_field))==true)
                                                                                    <img src="{{ old($sign_field) }}">
                                                                                @else
                                                                                    {!! old($sign_field) !!}
                                                                                @endif
                                                                            </div>
                                                                            @endif
                                                                        @else
                                                                            <div class="sign-pad signtyped">
                                                                                @if(is_base64($sign_field_value)==true)
                                                                                    <img src="{{ $sign_field_value }}">
                                                                                @else
                                                                                    {!! $sign_field_value !!}
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
                                                    @if(($second_tenant_data == true && $data->form_step == 2) || ($data->number_tenants == 3 && $third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || (($data->number_tenants == 2 || $data->number_tenants == 3) && $agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $second_tenant_data == true))
                                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                            @php
                                                                $sign_id = 6;
                                                                $sign_field = 'initial_'.$sign_id;
                                                                $sign_field_value = @$data[$sign_field];
                                                            @endphp
                                                            <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div>
                                                                            <label>Second Tenants' Initials</label>
                                                                        </div>
                                                                        @if(@$sign_field_value=='')
                                                                            {!! SignPad($sign_id, 'Initials') !!}
                                                                            @if(old($sign_field))
                                                                                <div class="sign-pad signtyped old_sign">
                                                                                    @if(is_base64(old($sign_field))==true)
                                                                                        <img src="{{ old($sign_field) }}">
                                                                                    @else
                                                                                        {!! old($sign_field) !!}
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <div class="sign-pad signtyped">
                                                                                @if(is_base64($sign_field_value)==true)
                                                                                    <img src="<?php echo $sign_field_value; ?>">
                                                                                @else
                                                                                    {!! $sign_field_value !!}
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
                                                    @if(($third_tenant_data == true && $data->form_step == 3) || ($data->number_tenants == 3 && $agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $third_tenant_data == true))
                                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                            @php
                                                                $sign_id = 7;
                                                                $sign_field = 'initial_'.$sign_id;
                                                                $sign_field_value = @$data[$sign_field];
                                                            @endphp
                                                            <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div>
                                                                            <label>Third Tenants' Initials</label>
                                                                        </div>
                                                                        @if(@$sign_field_value=='')
                                                                            {!! SignPad($sign_id, 'Initials') !!}
                                                                            @if(old($sign_field))
                                                                                <div class="sign-pad signtyped old_sign">
                                                                                    @if(is_base64(old($sign_field))==true)
                                                                                        <img src="{{ old($sign_field) }}">
                                                                                    @else
                                                                                        {!! old($sign_field) !!}
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <div class="sign-pad signtyped">
                                                                                @if(is_base64($sign_field_value)==true)
                                                                                    <img src="<?php echo $sign_field_value; ?>">
                                                                                @else
                                                                                    {!! $sign_field_value !!}
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
                                                    @if(($agent_data == true && $data->form_step == 4) || (isset($data->id, $action) && $action == 'view'))
                                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                            @php
                                                            $sign_id = 8;
                                                            $sign_field = 'initial_'.$sign_id;
                                                            $sign_field_value = @$data[$sign_field];
                                                            @endphp
                                                            <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div>
                                                                            <label>Landlord's Agent's Initials</label>
                                                                        </div>
                                                                        @if(@$sign_field_value=='')
                                                                            {!! SignPad($sign_id, 'Initials') !!}
                                                                            @if(old($sign_field))
                                                                                <div class="sign-pad signtyped old_sign">
                                                                                    @if(is_base64(old($sign_field))==true)
                                                                                        <img src="{{ old($sign_field) }}">
                                                                                    @else
                                                                                        {!! old($sign_field) !!}
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <div class="sign-pad signtyped">
                                                                                @if(is_base64($sign_field_value)==true)
                                                                                    <img src="<?php echo $sign_field_value; ?>">
                                                                                @else
                                                                                    {!! $sign_field_value !!}
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ old($sign_field, $sign_field_value) }}">
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        </li>
                                        @if((isset($data->form_step) && $data->form_step > 0 && !empty($data->other_act_1)) || (!isset($data)) )
                                            <li><strong>OTHER.</strong>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="{{ $errors->has('other_act_1') ? 'has-error' : '' }}">
                                                            <textarea id="other_act_1" name="other_act_1" style="height: 120px;line-height: 18px" class="form-control">{{ old('other_act_1', $data->other_act_1 ?? '') }}</textarea>
                                                            @if ($errors->has('other_act_1'))<span class="text-danger">{{ $errors->first('other_act_1') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($data->form_step) && $data->form_step > 0)
                                                    <div class="row" style="margin-top:20px; margin-bottom:20px">
                                                        @if(($data->form_step == 1) || ($second_tenant_data == true && $data->form_step == 2 && $action == 'edit') || ($third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                                            <div class="col-12 col-sm-4 col-md-4">
                                                                @php
                                                                    $sign_id = 9;
                                                                    $sign_field = 'initial_'.$sign_id;
                                                                    $sign_field_value = @$data[$sign_field];
                                                                @endphp
                                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div>
                                                                                <label>Tenants' Initials</label>
                                                                            </div>
                                                                            @if(@$sign_field_value=='')
                                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                                @if(old($sign_field))
                                                                                    <div class="sign-pad signtyped old_sign">
                                                                                        @if(is_base64(old($sign_field))==true)
                                                                                            <img src="{{ old($sign_field) }}">
                                                                                        @else
                                                                                            {!! old($sign_field) !!}
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                <div class="sign-pad signtyped">
                                                                                    @if(is_base64($sign_field_value)==true)
                                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                                    @else
                                                                                        {!! $sign_field_value !!}
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
                                                        @if(($second_tenant_data == true && $data->form_step == 2) || ($third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $second_tenant_data == true))
                                                            <div class="col-12 col-sm-4 col-md-4">
                                                                @php
                                                                    $sign_id = 10;
                                                                    $sign_field = 'initial_'.$sign_id;
                                                                    $sign_field_value = @$data[$sign_field];
                                                                @endphp
                                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div>
                                                                                <label>Second Tenants' Initials</label>
                                                                            </div>
                                                                            @if(@$sign_field_value=='')
                                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                                @if(old($sign_field))
                                                                                    <div class="sign-pad signtyped old_sign">
                                                                                        @if(is_base64(old($sign_field))==true)
                                                                                            <img src="{{ old($sign_field) }}">
                                                                                        @else
                                                                                            {!! old($sign_field) !!}
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                <div class="sign-pad signtyped">
                                                                                    @if(is_base64($sign_field_value)==true)
                                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                                    @else
                                                                                        {!! $sign_field_value !!}
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
                                                        @if(($third_tenant_data == true && $data->form_step == 3) || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $third_tenant_data == true))
                                                            <div class="col-12 col-sm-4 col-md-4">
                                                                @php
                                                                    $sign_id = 11;
                                                                    $sign_field = 'initial_'.$sign_id;
                                                                    $sign_field_value = @$data[$sign_field];
                                                                @endphp
                                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div>
                                                                                <label>Third Tenants' Initials</label>
                                                                            </div>
                                                                            @if(@$sign_field_value=='')
                                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                                @if(old($sign_field))
                                                                                    <div class="sign-pad signtyped old_sign">
                                                                                        @if(is_base64(old($sign_field))==true)
                                                                                            <img src="{{ old($sign_field) }}">
                                                                                        @else
                                                                                            {!! old($sign_field) !!}
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                <div class="sign-pad signtyped">
                                                                                    @if(is_base64($sign_field_value)==true)
                                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                                    @else
                                                                                        {!! $sign_field_value !!}
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
                                                        @if(($agent_data == true && $data->form_step == 4) || (isset($data->id, $action) && $action == 'view'))
                                                            <div class="col-12 col-sm-4 col-md-4">
                                                                @php
                                                                    $sign_id = 12;
                                                                    $sign_field = 'initial_'.$sign_id;
                                                                    $sign_field_value = @$data[$sign_field];
                                                                @endphp
                                                                <div id="signbox_{{ $sign_id }}" class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div>
                                                                                <label>Landlord's Agent's Initials</label>
                                                                            </div>
                                                                            @if(@$sign_field_value=='')
                                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                                @if(old($sign_field))
                                                                                    <div class="sign-pad signtyped old_sign">
                                                                                        @if(is_base64(old($sign_field))==true)
                                                                                            <img src="{{ old($sign_field) }}">
                                                                                        @else
                                                                                            {!! old($sign_field) !!}
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                <div class="sign-pad signtyped">
                                                                                    @if(is_base64($sign_field_value)==true)
                                                                                        <img src="<?php echo $sign_field_value; ?>">
                                                                                    @else
                                                                                        {!! $sign_field_value !!}
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
                                                @endif
                                            </li>
                                        @endif
                                        @if((isset($data->form_step) && $data->form_step > 0 && !empty($data->other_act_2)) || (!isset($data)) )
                                            <li><strong>OTHER.</strong>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="{{ $errors->has('other_act_2') ? 'has-error' : '' }}">
                                                            <textarea id="other_act_2" name="other_act_2" style="height: 120px;line-height: 18px" class="form-control">{{ old('other_act_2', $data->other_act_2 ?? '') }}</textarea>
                                                            @if ($errors->has('other_act_2'))<span class="text-danger">{{ $errors->first('other_act_2') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($data->form_step) && $data->form_step > 0)
                                                    <div class="row" style="margin-top:20px; margin-bottom:20px">
                                                        @if(($data->form_step == 1) || ($second_tenant_data == true && $data->form_step == 2 && $action == 'edit') || ($third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                                            <div class="col-12 col-sm-4 col-md-4">
                                                                @php
                                                                $sign_id = 13;
                                                                $sign_field = 'initial_'.$sign_id;
                                                                $sign_field_value = @$data[$sign_field];
                                                                @endphp
                                                                <div id="signbox_{{ $sign_id }}"
                                                                class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                    <div>
                                                                        <label>Tenants' Initials</label>
                                                                    </div>
                                                                    @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true) <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                        {!! old($sign_field) !!}
                                                                        @endif
                                                                    </div>
                                                                    @endif
                                                                    @else
                                                                    <div class="sign-pad signtyped"> @if(is_base64($sign_field_value)==true) <img
                                                                        src="<?php echo $sign_field_value; ?>"> @else
                                                                        {!! $sign_field_value !!}
                                                                        @endif </div>
                                                                    @endif
                                                                    <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}"
                                                                        name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field)
                                                                    }}</span>@endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if(($second_tenant_data == true && $data->form_step == 2) || ($third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $second_tenant_data == true))
                                                            <div class="col-12 col-sm-4 col-md-4">
                                                                @php
                                                                $sign_id = 14;
                                                                $sign_field = 'initial_'.$sign_id;
                                                                $sign_field_value = @$data[$sign_field];
                                                                @endphp
                                                                <div id="signbox_{{ $sign_id }}"
                                                                class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                    <div>
                                                                        <label>Second Tenants' Initials</label>
                                                                    </div>
                                                                    @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true) <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                        {!! old($sign_field) !!}
                                                                        @endif
                                                                    </div>
                                                                    @endif
                                                                    @else
                                                                    <div class="sign-pad signtyped"> @if(is_base64($sign_field_value)==true) <img
                                                                        src="<?php echo $sign_field_value; ?>"> @else
                                                                        {!! $sign_field_value !!}
                                                                        @endif </div>
                                                                    @endif
                                                                    <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}"
                                                                        name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field)
                                                                    }}</span>@endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if(($third_tenant_data == true && $data->form_step == 3) || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $third_tenant_data == true))
                                                            <div class="col-12 col-sm-4 col-md-4">
                                                                @php
                                                                $sign_id = 15;
                                                                $sign_field = 'initial_'.$sign_id;
                                                                $sign_field_value = @$data[$sign_field];
                                                                @endphp
                                                                <div id="signbox_{{ $sign_id }}"
                                                                class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                    <div>
                                                                        <label>Third Tenants' Initials</label>
                                                                    </div>
                                                                    @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true) <img src="{{ old($sign_field) }}">
                                                                        @else
                                                                        {!! old($sign_field) !!}
                                                                        @endif
                                                                    </div>
                                                                    @endif
                                                                    @else
                                                                    <div class="sign-pad signtyped"> @if(is_base64($sign_field_value)==true) <img
                                                                        src="<?php echo $sign_field_value; ?>"> @else
                                                                        {!! $sign_field_value !!}
                                                                        @endif </div>
                                                                    @endif
                                                                    <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}"
                                                                        name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field)
                                                                    }}</span>@endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if(($agent_data == true && $data->form_step == 4) || (isset($data->id, $action) && $action == 'view'))
                                                            <div class="col-12 col-sm-4 col-md-4">
                                                                @php
                                                                    $sign_id = 16;
                                                                    $sign_field = 'initial_'.$sign_id;
                                                                    $sign_field_value = @$data[$sign_field];
                                                                @endphp
                                                                <div id="signbox_{{ $sign_id }}"
                                                                class="form-row-group{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div>
                                                                            <label>Landlord's Agent's Initials</label>
                                                                        </div>
                                                                        @if(@$sign_field_value['signature']=='')
                                                                            {!! SignPad($sign_id, 'Signature') !!}
                                                                            @if(old($sign_field))
                                                                                <div class="sign-pad signtyped old_sign">
                                                                                    @if(is_base64(old($sign_field.'.signature'))==true)
                                                                                        <img src="{{ old($sign_field.'.signature') }}">
                                                                                    @else
                                                                                        {!! old($sign_field.'.signature') !!}
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <div class="sign-pad signtyped">
                                                                                @if(is_base64($sign_field_value['signature'])==true)
                                                                                    <img src="<?php echo $sign_field_value['signature']; ?>">
                                                                                @else
                                                                                    {!! $sign_field_value['signature'] !!}
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field)
                                                                    }}</span>@endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </li>
                                        @endif
                                    </ol>
                                </div>

                                <p>Landlord’s email address for service: <a href="mailto:info@forrentcentral.com">info@forrentcentral.com</a></p>
                                @php
                                    $sign_field_value = @$initial_29;
                                @endphp
                                <p>Tenant’s Email Address for service: {{ isset($sign_field_value['email_for_service']) ? $sign_field_value['email_for_service'] : (isset($tenants_data['t1_email']) ? $tenants_data['t1_email'] : '') }}</p>
                                {{-- <p>Tenant’s Email Address for service: {{ $sign_field_value['email_for_service'] ?? @$tenants_data['t1_email'] }}</p> --}}
                                <p><strong>NOTE: By signing and giving a copy of this form to the other party(s), you understand and agree:</strong></p>
                                <ul style="list-style: disc !important;">
                                    <li>You can be given or served documents related to your tenancy at the email address you provide.</li>
                                    <li>You are aware that, depending on the type of document you are given or served, there may be legislated time frames within which you must act upon receiving a document. You should only agree to using email for service if you are able to monitor your email address on a regular basis.</li>
                                    <li>You must give the other party a copy of this form as soon as possible, and if your email address changes or you no longer want to be given or served documents at the email address you provided for that purpose, you must notify the other party, in writing, as soon as possible. Failure to do so may result in important documents not coming to your attention.</li>
                                </ul>
                                <p>This form does not have to be filed with the Residential Tenancy Branch. If you have any questions about your rights and responsibilities under the Residential Tenancy Act or the Manufactured Home Park Tenancy Act, contact the Residential Tenancy Branch by using the contact information below.</p>
                                @if(isset($data->form_step) && $data->form_step > 0)
                                    <div class="row">
                                        @if(($data->form_step == 1) || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                @php
                                                    $sign_id = 29;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$initial_29;
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date')) has-error @endif">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <h5>Tenant's Signature</h5>
                                                            </div>
                                                            @if(@$sign_field_value == '')
                                                                {!! SignPad($sign_id, 'Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field.'.signature'))==true)
                                                                            <img src="{{ old($sign_field.'.signature') }}">
                                                                        @else
                                                                            {!! old($sign_field.'.signature') !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if (is_array($sign_field_value))
                                                                        @if (isset($sign_field_value['signature']) && is_base64($sign_field_value['signature']))
                                                                            <img src="{{ $sign_field_value['signature'] }}">
                                                                        @else
                                                                            {{ implode(', ', $sign_field_value) }}
                                                                        @endif
                                                                    @else
                                                                        {{ $sign_field_value }}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ $sign_field_value['signature'] ?? old($sign_field.'.signature') }}">
                                                        </div>
                                                        <div class="form-floating required mb-2 mt-2">
                                                            <input id="{{ $sign_field }}_email_for_service" placeholder="" name="{{ $sign_field }}[email_for_service]" value="{{ old($sign_field.'.email_for_service', $sign_field_value['email_for_service'] ?? $tenants_data['t1_email'])  }}" class="form-control">
                                                            <label for="{{ $sign_field }}_email_for_service" class="">Tenant’s Email Address for service</label>
                                                        </div>
                                                        <div class="form-floating required mb-2">
                                                            <input id="{{ $sign_field }}_fname" placeholder="" name="{{ $sign_field }}[fname]" value="{{ old($sign_field.'.fname', $sign_field_value['fname'] ?? $tenants_data['t1_fname']) }}" class="form-control">
                                                            <label for="{{ $sign_field }}_fname" class="">Name</label>
                                                        </div>
                                                        <div class="form-floating required mb-2">
                                                            <input id="{{ $sign_field }}_date" placeholder="" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', $sign_field_value['date'] ?? date("d/m/Y")) }}" class="form-control" type="text">
                                                            <label for="{{ $sign_field }}_date" class="">Date</label>
                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                <h4>FOR MORE INFORMATION:</h4>
                                <p>Residential Tenancy Branch Office of Housing and Construction Standards</p>
                                <p><a href="https://www.gov.bc.ca/landlordtenant" target="_blank">www.gov.bc.ca/landlordtenant</a></p>
                                <p><strong>Phone:</strong> 1-800-665-8779 (toll-free) <strong>Greater Vancouver:</strong> 604-660-1020 <strong>Victoria:</strong> 250-387-1602 </p>
                                <div>ADDENDUMS ARE ATTACHED:
                                    <div class="form-check md-form-inline">
                                        <input class="form-check-input filled-in" name="addendum" value="Yes" id="addendum_1" type="radio" @if(old('addendum', @$data->addendum)=="Yes") checked @elseif(empty(@$data->addendum)) checked @endif>
                                        <label class="form-check-label" for="addendum_1" style="padding-left: 25px;margin-left: 15px;">Yes</label>
                                    </div>
                                    <div class="form-check md-form-inline">
                                        <input class="form-check-input filled-in" name="addendum" value="No" id="addendum_2" type="radio" @if(old('addendum', @$data->addendum)=="No") checked @endif>
                                        <label class="form-check-label" for="addendum_2" style="padding-left: 25px;margin-left: 15px;">No</label>
                                    </div>
                                </div>
                                <div>A PET AGREEMENT IS ATTACHED:
                                    <div class="form-check md-form-inline">
                                        <input class="form-check-input filled-in" name="pet_agreement" value="Yes" id="pet_agreement_1" type="radio" {{ @$data->pet_agreement == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pet_agreement_1" style="padding-left: 25px;margin-left: 15px;">Yes</label>
                                    </div>

                                    <div class="form-check md-form-inline">
                                        <input class="form-check-input filled-in" name="pet_agreement" value="No" id="pet_agreement_2" type="radio" {{ @$data->pet_agreement == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pet_agreement_2" style="padding-left: 25px;margin-left: 15px;">No</label>
                                    </div>
                                </div>
                                <p>THE PARTIES, INTENDING TO BE LEGALLY BOUND, AGREE TO THE TERMS AND CONDITIONS OF THIS AGREEMENT. THE TENANT HEREBY ACKNOWLEDGES HAVING READ AND RECEIVED A DUPLICATE COPY OF THIS AGREEMENT.</p>
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-4">
                                        <div class="md-form required {{ $errors->has('van_tenancy_date') ? 'has-error' : '' }}">
                                            <input id="van_tenancy_date" name="van_tenancy_date" value="{{ old('van_tenancy_date', $data->van_tenancy_date ?? '') }}" type="text" class="form-control datepicker">
                                            <label for="van_tenancy_date">Dated at:</label>
                                            @if ($errors->has('van_tenancy_date'))<span class="text-danger">{{ $errors->first('van_tenancy_date') }}</span>@endif
                                        </div>
                                    </div>
                                </div>
                                {{-- <h5>Agreed and signed by each adult TENANT</h5> --}}
                                @if(isset($data->form_step) && $data->form_step > 0)
                                    <div class="row">
                                        @if(($data->form_step == 1) || (($data->number_tenants == 2 || $data->number_tenants == 3) && $second_tenant_data == true && $data->form_step == 2 && $action == 'edit') || ($data->number_tenants == 3 && $third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                            <div class="col-12 col-sm-6 col-md-4">
                                                @php
                                                    $sign_id = 17;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$initial_17;
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date')) has-error @endif">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <h4>First Tenant's Details</h4>
                                                            </div>
                                                            @if(@$sign_field_value=='')
                                                                {!! SignPad($sign_id, 'Initials') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field))==true)
                                                                            <img src="{{ old($sign_field.'.signature') }}">
                                                                        @else
                                                                            {!! old($sign_field.'.signature') !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value)==true)
                                                                        <img src="{{ $sign_field_value['signature'] }}">
                                                                    @else
                                                                        {!! $sign_field_value !!}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ $sign_field_value['signature'] ?? old($sign_field.'.signature') }}">
                                                            <div class="form-floating required mb-2 mt-2">
                                                                <input id="{{ $sign_field }}_fname" placeholder="" name="{{ $sign_field }}[fname]" value="{{ old($sign_field.'.fname', isset($sign_field_value['fname']) ? $sign_field_value['fname'] : '') }}" class="form-control">
                                                                <label for="{{ $sign_field }}_fname" class="">First Name</label>
                                                            </div>

                                                            <div class="form-floating required mb-2">
                                                                <input id="{{ $sign_field }}_lname" placeholder="" name="{{ $sign_field }}[lname]" value="{{ old($sign_field.'.lname', isset($sign_field_value['lname']) ? $sign_field_value['lname'] : '') }}" class="form-control">
                                                                <label for="{{ $sign_field }}_lname" class="">Last Name</label>
                                                            </div>

                                                            <div class="form-floating required mb-2">
                                                                <input id="{{ $sign_field }}_date" placeholder="" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', isset($sign_field_value['date']) ? $sign_field_value['date'] : date("Y-m-d")) }}" class="form-control">
                                                                <label for="{{ $sign_field }}_date" class="">Date</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                        @if(($second_tenant_data == true && $data->form_step == 2) || ($data->number_tenants == 2 && $third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || (($data->number_tenants == 2 || $data->number_tenants == 3) && $agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $second_tenant_data == true))
                                            <div class="col-12 col-sm-6 col-md-4">
                                                @php
                                                    $sign_id = 18;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$initial_18;
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date')) has-error @endif">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <h4>Second Tenant's Signature</h4>
                                                            </div>
                                                            @if(@$sign_field_value['signature']=='')
                                                                {!! SignPad($sign_id, 'Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign mb-2">
                                                                        @if(is_base64(old($sign_field.'.signature'))==true)
                                                                            <img src="{{ old($sign_field.'.signature') }}">
                                                                        @else
                                                                            {!! old($sign_field.'.signature') !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped mb-2">
                                                                    @if(is_base64($sign_field_value['signature'])==true)
                                                                        <img src="<?php echo $sign_field_value['signature']; ?>">
                                                                    @else
                                                                        {!! $sign_field_value['signature'] !!}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ $sign_field_value['signature'] ?? old($sign_field.'.signature') }}">
                                                            <div class="form-floating required mb-2 mt-2">
                                                                <input id="{{ $sign_field }}_fname" name="{{ $sign_field }}[fname]" value="{{ old($sign_field.'.fname', $sign_field_value['fname'] ?? '') }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_fname" class="">First Name</label>
                                                            </div>
                                                            <div class="form-floating required mb-2">
                                                                <input id="{{ $sign_field }}_lname" name="{{ $sign_field }}[lname]" value="{{ old($sign_field.'.lname', $sign_field_value['lname'] ?? '') }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_lname" class="">Last Name</label>
                                                            </div>
                                                            <div class="form-floating required mb-2">
                                                                <input id="{{ $sign_field }}_date" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', $sign_field_value['date'] ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_date" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field) or $errors->has($sign_field.'.fname') or $errors->has($sign_field.'.lname') or $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                        @if(($third_tenant_data == true && $data->form_step == 3) || ($data->number_tenants == 3 && $agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $third_tenant_data == true))
                                            <div class="col-12 col-sm-6 col-md-4">
                                                @php
                                                    $sign_id = 19;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$initial_19;
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date')) has-error @endif">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <h4>Third Tenant's Signature</h4>
                                                            </div>
                                                            @if(@$sign_field_value['signature']=='')
                                                                {!! SignPad($sign_id, 'Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign mb-2">
                                                                        @if(is_base64(old($sign_field.'.signature'))==true)
                                                                            <img src="{{ old($sign_field.'.signature') }}">
                                                                        @else
                                                                            {!! old($sign_field.'.signature') !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped mb-2">
                                                                    @if(is_base64($sign_field_value['signature'])==true)
                                                                        <img src="<?php echo $sign_field_value['signature']; ?>">
                                                                    @else
                                                                        {!! $sign_field_value['signature'] !!}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ $sign_field_value['signature'] ?? old($sign_field.'.signature') }}">

                                                            <div class="form-floating required mb-2 mt-2">
                                                                <input id="{{ $sign_field }}_fname" name="{{ $sign_field }}[fname]" value="{{ old($sign_field.'.fname', $sign_field_value['fname'] ?? '') }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_fname" class="">First Name</label>
                                                            </div>

                                                            <div class="form-floating required mb-2">
                                                                <input id="{{ $sign_field }}_lname" name="{{ $sign_field }}[lname]" value="{{ old($sign_field.'.lname', $sign_field_value['lname'] ?? '') }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_lname" class="">Last Name</label>
                                                            </div>
                                                            <div class="form-floating required mb-2">
                                                                <input id="{{ $sign_field }}_date" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', $sign_field_value['date'] ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_date" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field) or $errors->has($sign_field.'.fname') or $errors->has($sign_field.'.lname') or $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                        @if(($agent_data == true && $data->form_step == 4) || (isset($data->id, $action) && $action == 'view'))
                                            <div class="col-12 col-sm-6 col-md-4">
                                                @php
                                                    $sign_id = 20;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$initial_20;
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') or $errors->has($sign_field.'.name') or $errors->has($sign_field.'.date')) has-error @endif">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <h5>Agreed and signed by the LANDLORD'S AGENT</h5>
                                                            </div>
                                                            @if(@$sign_field_value['signature'] == '')
                                                                {!! SignPad($sign_id, 'Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field.'.signature'))==true)
                                                                            <img src="{{ old($sign_field.'.signature') }}">
                                                                        @else
                                                                            {!! old($sign_field.'.signature') !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value['signature'])==true)
                                                                        <img src="{{ $sign_field_value['signature'] }}">
                                                                    @else
                                                                        {!! $sign_field_value['signature'] !!}
                                                                    @endif
                                                                </div>
                                                            @endif

                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ $sign_field_value['signature'] ?? old($sign_field.'.signature') }}">
                                                            <div class="form-floating required mb-2 mt-2">
                                                                <input id="{{ $sign_field }}_name" placeholder="" name="{{ $sign_field }}[name]" value="{{ old($sign_field.'.name', $sign_field_value['name'] ?? '') }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_name" class="">Signing authority name</label>
                                                            </div>
                                                            <div class="form-floating required mb-2">
                                                                <input id="{{ $sign_field }}_date" placeholder="" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', $sign_field_value['date'] ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_date" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has($sign_field.'.signature') or $errors->has($sign_field.'.name') or $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                <p><strong>{{ appName() }} Real Estate Management</strong><br>B-2127 Granville Street,<br> Vancouver BC V6H 3E9</p>

                                {{-- FORM K Start --}}
                                @if($form_k == true)
                                    @php
                                        $strata_property_details = json_decode(@$property->strata_property_details);
                                    @endphp
                                    @if(isset($property->strata_documents) && $property->strata_documents->count() > 0)
                                        <h4 class="heading border-bottom"><span>Strata bylaws/property related documents</span></h4>
                                        <div class="masonry bordered">
                                            @if(isset($property->strata_documents))
                                                @foreach($property->strata_documents as $strata_document)
                                                    <div class="brick">
                                                        @if(pathinfo($strata_document->url, PATHINFO_EXTENSION) == 'pdf')
                                                            <a href="{{ url('storage/files') }}/{{ $property->user_id }}/{{ $strata_document->url }}" data-fancybox="gallery" data-options='{"caption" : "{{ $property->title }}"}' target="_blank">
                                                                <img class="imageThumb" src="{{ asset('images/pdf-icon.png') }}">
                                                            </a>
                                                        @else
                                                            <a href="{{ url('storage/files') }}/{{ $property->user_id }}/{{ $strata_document->url }}" data-fancybox="gallery" data-options='{"caption" : "Strata bylaws/property related documents: {{ $property->title }}"}' target="_blank">
                                                                <img class="imageThumb" src="{{ url('storage/files') }}/{{ $property->user_id }}/thumbs/{{ $strata_document->url }}">
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endif
                                    <h3>Form K Notice of Tenant's Responsibilities<br><small>(Section 146)</small></h3>
                                    <hr>
                                    <div class="form-row-group" id="form_k_notice_box">
                                        <div class="row mb-3">
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-floating required {{ $errors->has('form_k_notice.plan_num') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_plan_num" placeholder="To the Owners Strata Plan No:" name="form_k_notice[plan_num]" value="{{ old('form_k_notice.plan_num', $form_k_notice['plan_num'] ?? @$strata_property_details->plan_num) }}" type="text" class="form-control">
                                                    <label for="form_k_notice_plan_num">To the Owners Strata Plan No:</label>
                                                    @if ($errors->has('form_k_notice.plan_num'))<span class="text-danger">{{ $errors->first('form_k_notice.plan_num') }}</span>@endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-floating required {{ $errors->has('form_k_notice.lot_num') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_lot_num" placeholder="Re: Strata Lot Number:" name="form_k_notice[lot_num]" value="{{ old('form_k_notice.lot_num', $form_k_notice['lot_num'] ?? @$strata_property_details->lot_num ) }}" type="text" class="form-control">
                                                    <label for="form_k_notice_lot_num">Re: Strata Lot Number:</label>
                                                    @if ($errors->has('form_k_notice.lot_num'))<span class="text-danger">{{ $errors->first('form_k_notice.lot_num') }}</span>@endif
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-floating required {{ $errors->has('form_k_notice.civic') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_civic" placeholder="Civic Address of the Property:" name="form_k_notice[civic]" value="{{ old('form_k_notice.civic', $form_k_notice['civic'] ?? @$property->address) }}" type="text" class="form-control">
                                                    <label for="form_k_notice_civic">Civic Address of the Property:</label>
                                                    @if ($errors->has('form_k_notice.civic'))<span class="text-danger">{{ $errors->first('form_k_notice.civic') }}</span>@endif
                                                </div>
                                            </div>
                                        </div>
                                        <h5 style="margin-bottom: 10px !important;">Tenant's Details</h5>
                                        <div class="row mb-3">
                                            <div class="col-12 col-sm-4 col-md-4 mb-2">
                                                <div class="form-floating required {{ $errors->has('form_k_notice.t1_fname') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_t1_fname" placeholder="First Name" name="form_k_notice[t1_fname]" value="{{ old('form_k_notice.t1_fname', $form_k_notice['t1_fname'] ?? @extract_name($user->name)['first_name'] ) }}" type="text" class="form-control {{ $errors->has('form_k_notice.t1_fname') ? 'is-invalid' : '' }}">
                                                    <label for="form_k_notice_t1_fname">First Name</label>
                                                    @if ($errors->has('form_k_notice.t1_fname'))<span class="text-danger">{{ $errors->first('form_k_notice.t1_fname') }}</span>@endif
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-floating required {{ $errors->has('form_k_notice.t1_lname') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_t1_lname" placeholder="Last Name" name="form_k_notice[t1_lname]" value="{{ old('form_k_notice.t1_lname', $form_k_notice['t1_lname'] ?? @extract_name($user->name)['last_name'] ) }}" type="text" class="form-control {{ $errors->has('form_k_notice.t1_lname') ? 'is-invalid' : '' }}">
                                                    <label for="form_k_notice_t1_lname">Last Name</label>
                                                    @if ($errors->has('form_k_notice.t1_lname'))<span class="text-danger">{{ $errors->first('form_k_notice.t1_lname') }}</span>@endif
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-floating tenant1 required {{ $errors->has('form_k_notice.t1_dl') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_t1_dl" placeholder="Drivers License/Passport Number" name="form_k_notice[t1_dl]" value="{{ old('form_k_notice.t1_dl', $form_k_notice['t1_dl'] ?? '' ) }}" type="text" class="form-control {{ $errors->has('form_k_notice.t1_dl') ? 'is-invalid' : '' }}">
                                                    <label for="form_k_notice_t1_dl">Drivers License/Passport Number</label>
                                                    @if ($errors->has('form_k_notice.t1_dl'))<span class="text-danger">{{ $errors->first('form_k_notice.t1_dl') }}</span>@endif
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-floating required {{ $errors->has('form_k_notice.t1_email') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_t1_email" placeholder="Email" name="form_k_notice[t1_email]" value="{{ old('form_k_notice.t1_email', $form_k_notice['t1_email'] ?? @$user->email) }}" type="text" class="form-control {{ $errors->has('form_k_notice.t1_email') ? 'is-invalid' : '' }}">
                                                    <label for="form_k_notice_t1_email">Email</label>
                                                    @if ($errors->has('form_k_notice.t1_email'))<span class="text-danger">{{ $errors->first('form_k_notice.t1_email') }}</span>@endif
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-floating required {{ $errors->has('form_k_notice.t1_phone_work') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_t1_phone_work" placeholder="Work Phone #" name="form_k_notice[t1_phone_work]" value="{{ old('form_k_notice.t1_phone_work', $form_k_notice['t1_phone_work'] ?? @$user->phone) }}" type="text" class="form-control {{ $errors->has('form_k_notice.t1_phone_work') ? 'is-invalid' : '' }}">
                                                    <label for="form_k_notice_t1_phone_work">Work Ph #</label>
                                                    @if ($errors->has('form_k_notice.t1_phone_work'))<span class="text-danger">{{ $errors->first('form_k_notice.t1_phone_work') }}</span>@endif
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-floating {{ $errors->has('form_k_notice.t1_phone_home') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_t1_phone_home" placeholder="Home Phone #" name="form_k_notice[t1_phone_home]" value="{{ old('form_k_notice.t1_phone_home', $form_k_notice['t1_phone_home'] ?? '') }}" type="text" class="form-control {{ $errors->has('form_k_notice.t1_phone_home') ? 'is-invalid' : '' }}">
                                                    <label for="form_k_notice_t1_phone_home">Home Ph #</label>
                                                    @if ($errors->has('form_k_notice.t1_phone_home'))<span class="text-danger">{{ $errors->first('form_k_notice.t1_phone_home') }}</span>@endif
                                                </div>
                                            </div>
                                        </div>
                                        @if($second_tenant_data == true)
                                            <h5 style="margin-bottom: 10px !important;">Second Tenant's Details</h5>
                                            <div class="row mb-3">
                                                <div class="col-12 col-sm-4 col-md-4 mb-2">
                                                    <div class="form-floating required {{ $errors->has('form_k_notice.t2_fname') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t2_fname" placeholder="" name="form_k_notice[t2_fname]" value="{{ old('form_k_notice.t2_fname', @$form_k_notice['t2_fname'] ?? '' ) }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t2_fname">First Name</label>
                                                        @if ($errors->has('form_k_notice.t2_fname'))<span class="text-danger">{{ $errors->first('form_k_notice.t2_fname') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div class="form-floating required {{ $errors->has('form_k_notice.t2_lname') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t2_lname" placeholder="" name="form_k_notice[t2_lname]" value="{{ old('form_k_notice.t2_lname', $form_k_notice['t2_lname'] ?? '' ) }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t2_lname">Last Name</label>
                                                        @if ($errors->has('form_k_notice.t2_lname'))<span class="text-danger">{{ $errors->first('form_k_notice.t2_lname') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div class="form-floating tenant1 required {{ $errors->has('form_k_notice.t2_dl') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t2_dl" placeholder="" name="form_k_notice[t2_dl]" value="{{ old('form_k_notice.t2_dl', $form_k_notice['t2_dl'] ?? '' ) }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t2_dl">Drivers License/Passport Number</label>
                                                        @if ($errors->has('form_k_notice.t2_dl'))<span class="text-danger">{{ $errors->first('form_k_notice.t2_dl') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div class="form-floating required {{ $errors->has('form_k_notice.t2_email') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t2_email" placeholder="" name="form_k_notice[t2_email]" value="{{ old('form_k_notice.t2_email', $form_k_notice['t2_email'] ?? '') }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t2_email">Email</label>
                                                        @if ($errors->has('form_k_notice.t2_email'))<span class="text-danger">{{ $errors->first('form_k_notice.t2_email') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div class="form-floating required {{ $errors->has('form_k_notice.t2_phone_work') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t2_phone_work" placeholder="" name="form_k_notice[t2_phone_work]" value="{{ old('form_k_notice.t2_phone_work', $form_k_notice['t2_phone_work'] ?? '') }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t2_phone_work">Work Ph #</label>
                                                        @if ($errors->has('form_k_notice.t2_phone_work'))<span class="text-danger">{{ $errors->first('form_k_notice.t2_phone_work') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-4 col-md-4">
                                                    <div class="form-floating {{ $errors->has('form_k_notice.t2_phone_home') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t2_phone_home" placeholder="" name="form_k_notice[t2_phone_home]" value="{{ old('form_k_notice.t2_phone_home', $form_k_notice['t2_phone_home'] ?? '') }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t2_phone_home">Home Ph #</label>
                                                        @if ($errors->has('form_k_notice.t2_phone_home'))<span class="text-danger">{{ $errors->first('form_k_notice.t2_phone_home') }}</span>@endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($third_tenant_data == true)
                                            <h5 style="margin-bottom: 10px !important;">Third Tenant's Details</h5>
                                            <div class="row mb-3">
                                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                    <div class="form-floating required {{ $errors->has('form_k_notice.t3_fname') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t3_fname" placeholder="" name="form_k_notice[t3_fname]" value="{{ old('form_k_notice.t3_fname', @$form_k_notice['t3_fname'] ?? '' ) }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t3_fname">First Name</label>
                                                        @if ($errors->has('form_k_notice.t3_fname'))<span class="text-danger">{{ $errors->first('form_k_notice.t3_fname') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-floating required {{ $errors->has('form_k_notice.t3_lname') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t3_lname" placeholder="" name="form_k_notice[t3_lname]" value="{{ old('form_k_notice.t3_lname', $form_k_notice['t3_lname'] ?? '' ) }}" type="text"  class="form-control">
                                                        <label for="form_k_notice_t3_lname">Last Name</label>
                                                        @if ($errors->has('form_k_notice.t3_lname'))<span class="text-danger">{{ $errors->first('form_k_notice.t3_lname') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-floating tenant1 required {{ $errors->has('form_k_notice.t3_dl') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t3_dl" placeholder="" name="form_k_notice[t3_dl]" value="{{ old('form_k_notice.t3_dl', $form_k_notice['t3_dl'] ?? '' ) }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t2_dl">Drivers License/Passport Number</label>
                                                        @if ($errors->has('form_k_notice.t3_dl'))<span class="text-danger">{{ $errors->first('form_k_notice.t3_dl') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-floating required {{ $errors->has('form_k_notice.t3_email') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t3_email" placeholder="" name="form_k_notice[t3_email]" value="{{ old('form_k_notice.t3_email', $form_k_notice['t3_email'] ?? '') }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t3_email">Email</label>
                                                        @if ($errors->has('form_k_notice.t3_email'))<span class="text-danger">{{ $errors->first('form_k_notice.t3_email') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-floating required {{ $errors->has('form_k_notice.t3_phone_work') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t3_phone_work" placeholder="" name="form_k_notice[t3_phone_work]" value="{{ old('form_k_notice.t3_phone_work', $form_k_notice['t3_phone_work'] ?? '') }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t3_phone_work">Work Ph #</label>
                                                        @if ($errors->has('form_k_notice.t3_phone_work'))<span class="text-danger">{{ $errors->first('form_k_notice.t3_phone_work') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-floating {{ $errors->has('form_k_notice.t3_phone_home') ? 'has-error' : '' }}">
                                                        <input id="form_k_notice_t3_phone_home" placeholder="" name="form_k_notice[t3_phone_home]" value="{{ old('form_k_notice.t3_phone_home', $form_k_notice['t3_phone_home'] ?? '') }}" type="text" class="form-control">
                                                        <label for="form_k_notice_t3_phone_home">Home Ph #</label>
                                                        @if ($errors->has('form_k_notice.t3_phone_home'))<span class="text-danger">{{ $errors->first('form_k_notice.t3_phone_home') }}</span>@endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                <h5 style="margin-bottom: 10px !important;">Tenancy commencing at VANCOUVER, date:</h5>
                                                <div class="form-floating {{ $errors->has('form_k_notice.tenancy_van_date') ? 'has-error' : '' }}">
                                                    <input id="form_k_notice_tenancy_van_date" name="form_k_notice[tenancy_van_date]" value="{{ old('form_k_notice.tenancy_van_date', $form_k_notice['tenancy_van_date'] ?? '') }}" type="text" class="form-control datepicker">
                                                    <label for="form_k_notice_tenancy_van_date">Date</label>
                                                    @if ($errors->has('form_k_notice.tenancy_van_date'))<span class="text-danger">{{ $errors->first('form_k_notice.tenancy_van_date') }}</span>@endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if(($data->form_step == 1) || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                    <h5 style="margin-bottom: 10px !important;">Tenant's Signature</h5>
                                                    @php
                                                        $sign_id = 27;
                                                        $sign_field = 'initial_'.$sign_id;
                                                        $sign_field_value = @$data[$sign_field];
                                                    @endphp
                                                    {{-- {{ unserialize($sign_field_value) }} --}}
                                                    <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                        <div class="sign-pad signtyped old_sign">
                                                                            @if(is_base64(old($sign_field))==true)
                                                                                <img src="{{ old($sign_field) }}">
                                                                            @else
                                                                                {!! old($sign_field) !!}
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <div class="sign-pad signtyped">
                                                                        @if(is_base64($sign_field_value) == true)
                                                                            <img src="{{ $sign_field_value }}">
                                                                        @else
                                                                            {!! $sign_field_value !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                                <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ old($sign_field, $sign_field_value) }}">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                    </div>
                                                </div>
                                            @endif
                                            @if(($agent_data == true && $data->form_step == 4) || (isset($data->id, $action) && $action == 'view'))
                                                <div class="col-12 col-sm-4 col-md-4">
                                                    @php
                                                        $sign_id = 28;
                                                        $sign_field = 'initial_'.$sign_id;
                                                        $sign_field_value = @$data[$sign_field];
                                                    @endphp
                                                    <div id="signbox_{{ $sign_id }}" class="form-row-group_1 {{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div>
                                                                    <label>Property Manager's Signature</label>
                                                                </div>
                                                                @if(@$sign_field_value=='')
                                                                    {!! SignPad($sign_id, 'Initials') !!}
                                                                    @if(old($sign_field))
                                                                        <div class="sign-pad signtyped old_sign">
                                                                            @if(is_base64(old($sign_field))==true)
                                                                                <img src="{{ old($sign_field) }}">
                                                                            @else
                                                                                {!! old($sign_field) !!}
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <div class="sign-pad signtyped">
                                                                        @if(is_base64($sign_field_value)==true)
                                                                            <img src="<?php echo $sign_field_value; ?>">
                                                                        @else
                                                                            {!! $sign_field_value !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                                <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ old($sign_field, $sign_field_value) }}">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <h4>IMPORTANT NOTICE TO TENANTS:</h4>
                                    <p>1) Under the ​Strata Property Act, ​ a tenant in a strata corporation ​must ​comply with the bylaws and rules of the strata corporation that are in force from time to time (current bylaws and rules attached).</p>
                                    <p>2) The current bylaws and rules may be changed by the strata corporation, and if they are changed, the tenant ​must ​comply with the changed bylaws and rules.</p>
                                    <p>3) If a tenant or occupant of the strata lot, or a person visiting the tenant or admitted by the tenant for any reason, contravenes a bylaw or rule, the tenant is responsible and may be subject to penalties, including fines, denial of access to recreational facilities, and if the strata corporation incurs costs for remedying a contravention, payment of those costs.</p>
                                    <p>Date:@if($data->created_at){{ date_format(date_create($data->created_at),"d/m/Y") }} @else {{ date('d/m/Y') }} @endif</p>
                                    <h5>NOTE TO LANDLORD: A VALID FORM "K" MUST BE ISSUED WITH ​EACH ​ TENANT CHANGE</h5>
                                    <p>The address to which any notices to the registered owner of the strata lot shall be delivered is:</p>
                                    <p><strong>{{ appName() }} Real Estate Management</strong><br>B-2127 Granville Street,<br>Vancouver BC V6H 3E9<br>(<a href="mailto:info@forrentcentral.com">info@forrentcentral.com</a>)</p>
                                    <p>The personal information requested and subsequently provided in this document is for the purpose of communicating with tenants and owners, ensuring the orderly management of the Strata Corporation and complying with legal requirements.</p>
                                @endif
                                {{-- FORM K END --}}

                                {{-- AUTHORIZATION FORM --}}
                                <h3>TENANTS AUTHORIZATION FOR PRE-AUTHORIZED DEBITS FOR TENANCY PURPOSES</h3>
                                <hr>
                                <h5>Tenants Name and Address of Rental Property</h5>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-3 col-md-3">
                                        <div class="form-floating required {{ $errors->has('tenant_property.fname') ? 'has-error' : '' }}">
                                            <input id="tenant_property_fname" placeholder="First Name" name="tenant_property[fname]" value="{{ old('tenant_property.fname', $tenant_property['fname'] ?? '') }}" type="text" class="form-control">
                                            <label for="tenant_property_fname">{{ __('First Name') }}</label>
                                            @if ($errors->has('tenant_property.fname'))<span class="text-danger">{{ $errors->first('tenant_property.fname') }}</span>@endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3 col-md-3">
                                        <div class="form-floating required {{ $errors->has('tenant_property.lname') ? 'has-error' : '' }}">
                                            <input id="tenant_property_lname" placeholder="Last Name" name="tenant_property[lname]" value="{{ old('tenant_property.lname', $tenant_property['lname'] ?? '') }}" type="text" class="form-control">
                                            <label for="tenant_property_lname">{{ __('Last Name') }}</label>
                                            @if ($errors->has('tenant_property.lname'))<span class="text-danger">{{ $errors->first('tenant_property.lname') }}</span>@endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <div class="form-floating required {{ $errors->has('tenant_property.address') ? 'has-error' : '' }}">
                                            <input id="tenant_property_address" placeholder="Address of Rental Property" name="tenant_property[address]" value="{{ old('tenant_property.address', $tenant_property['address'] ?? @$property->address ) }}" type="text" class="form-control">
                                            <label for="tenant_property_address">{{ __('Address of Rental Property') }}</label>
                                            @if ($errors->has('tenant_property.address'))<span class="text-danger">{{ $errors->first('tenant_property.address') }}</span>@endif
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mb-0" style="text-transform: uppercase;">Charge</h3>
                                <hr class="mt-0">
                                <h6><u>One-time charge (initial payment):</u></h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                Security Deposit:
                                            </div>
                                            <div class="col-md-6 d-flex">
                                                <span style="padding-right: 4px;">$</span>
                                                <div class="required {{ $errors->has('charges.security') ? 'has-error' : '' }}">
                                                    <input id="charges_security" name="charges[security]" value="{{ old('charges.security', @$charges['security'] ?? @$security_deposit) }}" type="text" class="form-control" style="height: 26px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                Pet Damage Deposit:
                                            </div>
                                            <div class="col-md-6 d-flex">
                                                <span style="padding-right: 4px;">$</span>
                                                <div class="required {{ $errors->has('charges.pet_damage') ? 'has-error' : '' }}">
                                                    <input id="charges_pet_damage" name="charges[pet_damage]" value="{{ old('charges.pet_damage', @$charges['pet_damage'] ?? 0) }}" type="text" class="form-control" style="height: 26px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                Rent or Prorated Rent:
                                            </div>
                                            <div class="col-md-6 d-flex">
                                                <span style="padding-right: 4px;">$</span>
                                                <div class="required {{ $errors->has('charges.rent') ? 'has-error' : '' }}">
                                                    <input id="charges_rent" name="charges[rent]" value="{{ old('charges.rent', @$charges['rent'] ?? @$property_rate) }}" type="text" class="form-control" style="height: 26px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                Move-in Fee:
                                            </div>
                                            <div class="col-md-6 d-flex">
                                                <span style="padding-right: 4px;">$</span>
                                                <div class="required {{ $errors->has('charges.move_in_fee') ? 'has-error' : '' }}">
                                                    <input id="charges_move_in_fee" name="charges[move_in_fee]" value="{{ old('charges.move_in_fee', @$charges['move_in_fee'] ?? 0) }}" type="text" class="form-control" style="height: 26px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <strong style="text-transform: capitalize;">
                                                    Total initial charge:
                                                </strong>
                                            </div>
                                            <div class="col-md-6 d-flex">
                                                <span style="padding-right: 4px;">$</span>
                                                <div class="required {{ $errors->has('charges.total') ? 'has-error' : '' }}">
                                                    <input id="charges_total" name="charges[total]" value="{{ old('charges.total', @$charges['total'] ?? 0) }}" type="text" class="form-control" style="height: 26px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <strong style="text-transform: capitalize;">
                                                    to be collected on:
                                                </strong>
                                            </div>
                                            <div class="col-md-6 d-flex">
                                                <span style="padding-right: 4px;"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 12px;"></i></span>
                                                <div class="required {{ $errors->has('charges.collect_date') ? 'has-error' : '' }}">
                                                    <input id="charges_collect_date" name="charges[collect_date]" value="{{ old('charges.collect_date', @$charges['collect_date'] ?? '') }}" type="text" class="form-control datepicker" style="height: 26px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-bottom: 20px">Monthly Charge thereafter:
                                    <div class="md-form md-form-inline required {{ $errors->has('charges.monthly_charge_thereafter') ? 'has-error' : '' }}">
                                        <input id="monthly_charge_thereafter" name="charges[monthly_charge_thereafter]" value="{{ old('charges.monthly_charge_thereafter', @$charges['monthly_charge_thereafter'] ?? @$property_rate) }}" type="text" class="form-control" style="height: 26px;">
                                    </div> per month starting
                                    <div class="md-form md-form-inline required {{ $errors->has('charges.thereafter_start_date') ? 'has-error' : '' }}">
                                        <input id="thereafter_start_date" name="charges[thereafter_start_date]" value="{{ old('charges.thereafter_start_date', @$charges['thereafter_start_date'] ?? '') }}" type="text" class="form-control datepicker" style="height: 26px;">
                                    </div> till end of lease.
                                </div>
                                @if((isset($data->form_step) && $data->form_step == '1') || (isset($data->form_step) && $data->form_step == '4') || (isset($data->id, $action) && $action == 'view'))
                                    <h4>I/We warrant and represent that the following information is accurate: </h4>
                                    <h5><u>Account Details</u></h5>
                                    <div class="row" id="AccountDetailsBox">
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-floating required {{ $errors->has('account_details.name') ? 'has-error' : '' }}">
                                                <input id="account_details_name" placeholder="" name="account_details[name]" value="{{ old('account_details.name', $account_details['name'] ?? '') }}" type="text" class="form-control">
                                                <label for="account_details_name">Name on Account</label>
                                                @if ($errors->has('account_details.name'))<span class="text-danger">{{ $errors->first('account_details.name') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-floating required {{ $errors->has('account_details.institute') ? 'has-error' : '' }}">
                                                <input id="account_details_institute" placeholder="" name="account_details[institute]" value="{{ old('account_details.institute', $account_details['institute'] ?? '') }}" type="text" class="form-control">
                                                <label for="account_details_institute">Institute #:</label>
                                                @if ($errors->has('account_details.institute'))<span class="text-danger">{{ $errors->first('account_details.institute') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-floating required {{ $errors->has('account_details.transit') ? 'has-error' : '' }}">
                                                <input id="account_details_transit" placeholder="" name="account_details[transit]" value="{{ old('account_details.transit', $account_details['transit'] ?? '' ) }}" type="text" class="form-control">
                                                <label for="account_details_transit">Transit #:</label>
                                                @if ($errors->has('account_details.transit'))<span class="text-danger">{{ $errors->first('account_details.transit') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-floating required {{ $errors->has('account_details.account') ? 'has-error' : '' }}">
                                                <input id="account_details_account" placeholder="" name="account_details[account]" value="{{ old('account_details.account', $account_details['account'] ?? '' ) }}" type="text" class="form-control">
                                                <label for="account_details_account">Account #:</label>
                                                @if ($errors->has('account_details.account'))<span class="text-danger">{{ $errors->first('account_details.account') }}</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                    <h4>BANK INFORMATION</h4>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-6">
                                            @if(!empty($data->voided_check) && substr($data->voided_check, -4) == '.pdf')
                                                <div class="image-responsive"><a href="{{ url('/images/checks/')}}/{{$data->voided_check}}" alt="voided-check" download><button type="button" class="btn btn-primary">Download Check</button></a></div>
                                            @elseif(!empty($data->voided_check) && substr($data->voided_check, -4) != '.pdf')
                                                <div class="image-responsive">
                                                    <img src="{{ isset($data->ins_policy) ? asset('uploads/tenancy/'. $data->id . '/check/' . $data->voided_check) : '' }}" alt="policy" style="width: 700px; height: 200px;">
                                                </div>
                                            @else
                                            <div class="form {{ $errors->has('voided_check') ? 'has-error' : '' }}">
                                                <input id="voided_check" placeholder="" name="voided_check" class="form-control" type="file">
                                                <label for="voided_check"><span class="filename"></span><span class="info_text">Please take a picture of a void cheque and upload it here. (pdf, jpg, png)</span></label>
                                                @if ($errors->has('voided_check'))<span class="text-danger">{{ $errors->first('voided_check') }}</span>@endif
                                            </div>
                                            @endif
                                            <br />
                                        </div>
                                    </div>
                                    <p>Void cheque to be attached - The name on cheque must match name(s) of the tenant(s) on our records. If
                                        someone other than the tenant(s) is making the payment, please complete below information Or, If your
                                        account does not provide cheques, please include a document filled out by your bank to ensure the account
                                        is coded correctly and will allow for pre-authorized payment.</p>

                                    <div class="row" id="RelationTenantBox">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating {{ $errors->has('other_account_holder.relation') ? 'has-error' : '' }}">
                                                <input id="other_account_holder_relation" placeholder="" name="other_account_holder[relation]" value="{{ old('other_account_holder.relation', $other_account_holder['relation'] ?? '') }}" type="text" class="form-control">
                                                <label for="other_account_holder_relation">Relation to Tenant</label>
                                                @if ($errors->has('other_account_holder.relation'))<span class="text-danger">{{ $errors->first('other_account_holder.relation') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating {{ $errors->has('other_account_holder.bank_add') ? 'has-error' : '' }}">
                                                <input id="other_account_holder_bank_add" placeholder="" name="other_account_holder[bank_add]" value="{{ old('other_account_holder.bank_add', $other_account_holder['bank_add'] ?? '') }}" type="text" class="form-control">
                                                <label for="other_account_holder_bank_add">Bank Address</label>
                                                @if ($errors->has('other_account_holder.bank_add'))<span class="text-danger">{{ $errors->first('other_account_holder.bank_add') }}</span>@endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-floating {{ $errors->has('other_account_holder.phone') ? 'has-error' : '' }}">
                                                <input id="other_account_holder_phone" placeholder="" name="other_account_holder[phone]" value="{{ old('other_account_holder.phone', $other_account_holder['phone'] ?? '' ) }}" type="text" class="form-control">
                                                <label for="other_account_holder_phone">Contact Phone Number </label>
                                                @if ($errors->has('other_account_holder.phone'))<span class="text-danger">{{ $errors->first('other_account_holder.phone') }}</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if((isset($data->form_step) && $data->form_step == 1) || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                    <div class="row mt-2">
                                        <div class="col-12 col-sm-4 col-md-4">
                                            @php
                                                $sign_id = 21;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$data[$sign_field];
                                            @endphp
                                            <div id="signbox_{{ $sign_id }}" class="form-row-group_1{{ $errors->has($sign_field) ? ' has-error' : '' }}">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div>
                                                            <label>Account Holder Signature</label>
                                                        </div>
                                                        @if(@$sign_field_value=='')
                                                            {!! SignPad($sign_id, 'Initials') !!}
                                                            @if(old($sign_field))
                                                                <div class="sign-pad signtyped old_sign">
                                                                    @if(is_base64(old($sign_field))==true)
                                                                        <img src="{{ old($sign_field) }}">
                                                                    @else
                                                                        {!! old($sign_field) !!}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="sign-pad signtyped">
                                                                @if(is_base64($sign_field_value)==true)
                                                                    <img src="{{ $sign_field_value }}">
                                                                @else
                                                                    {!! $sign_field_value !!}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has($sign_field))<span class="text-danger">{{ $errors->first($sign_field) }}</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <h4>TERMS & CONDITIONS</h4>
                                <ul>
                                    <li style="list-style: decimal !important;">I/We hereby authorize {{ appName() }} Real Estate Management on behalf of the owner of the rental property to deduct the following:
                                        <ul>
                                            <li style="list-style: disc!important;">Regular recurring monthly rent payments on the 1st of each month </li>
                                            <li style="list-style: disc!important;">Onetime payment for charges/debits arising under my/our Tenancy Agreement </li>
                                            <li style="list-style: disc!important;">{{ appName() }} Real Estate Management will obtain my/our authorization for any other one-time or sporadic debits including but not limited to; move in or move out fees, NSF & Late fees, Strata Fines and Rental Increases</li>
                                        </ul></li>
                                    <li style="list-style: decimal !important;">I/We will inform {{ appName() }} Real Estate Management, in writing, of any change in the information provided in this section of the Authorization 10 days before the next due date of the PAD.</li>
                                    <li style="list-style: decimal !important;">This authority is to remain in effect until {{ appName() }} Real Estate Management has received written notification from me/us of its change or termination. This notification must be received at least ten (10) business days before the next debit is scheduled at the address provided below. I/We may obtain a sample cancellation form or more information on my/our right to cancel a PAD agreement at my/our financial institution or by visiting <a href="http://www.cdnpay.ca">www.cdnpay.ca</a></li>
                                    <li style="list-style: decimal !important;">{{ appName() }} Real Estate Management. may not assign this authorization, whether directly or indirectly, by operation of law, change of control or otherwise, without providing at least 10 days prior written notice to me/us.</li>
                                    <li style="list-style: decimal !important;">I/We have certain recourse rights if any debit does not comply with this agreement. For example, I have the right to receive reimbursement for any PAD that is not authorized or is not consistent with this PAD Agreement. To obtain a form for a reimbursement claim, or for more information on my/our recourse rights, I/We may contact my/our financial institution or visit <a href="http://www.cdnpay.ca">www.cdnpay.ca</a></li>
                                </ul>
                                <h4>AUTHORIZATION</h4>
                                @if((isset($data->form_step) && $data->form_step == 1) || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            @php
                                            $sign_id = 22;
                                            $sign_field = 'initial_'.$sign_id;
                                            $sign_field_value = @$initial_22;
                                            @endphp
                                            <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date')) has-error @endif">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div>
                                                            <h4>Authorized Signature</h4>
                                                        </div>
                                                        @if(@$sign_field_value['signature']=='')
                                                            {!! SignPad($sign_id, 'Signature') !!}
                                                            @if(old($sign_field))
                                                                <div class="sign-pad signtyped old_sign">
                                                                    @if(is_base64(old($sign_field.'.signature'))==true)
                                                                    <img src="{{ old($sign_field.'.signature') }}">
                                                                    @else
                                                                        {!! old($sign_field.'.signature') !!}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="sign-pad signtyped">
                                                                @if(is_base64($sign_field_value['signature'])==true)
                                                                    <img src="<?php echo $sign_field_value['signature']; ?>">
                                                                @else
                                                                    {!! $sign_field_value['signature'] !!}
                                                                @endif
                                                            </div>
                                                        @endif
                                                        <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ old($sign_field.'.signature') ?: (is_array($sign_field_value) ? $sign_field_value['signature'] : '') }}">
                                                        <div class="form-floating required mb-2 mt-2">
                                                            <input id="{{ $sign_field }}_fname" placeholder="" name="{{ $sign_field }}[fname]" value="{{ old($sign_field.'.fname', $sign_field_value['fname'] ?? @$tenants_data['t1_fname']) }}" class="form-control">
                                                            <label for="{{ $sign_field }}_fname" class="">First Name</label>
                                                        </div>
                                                        <div class="form-floating required mb-2">
                                                            <input id="{{ $sign_field }}_lname" placeholder="" name="{{ $sign_field }}[lname]" value="{{ old($sign_field.'.lname', $sign_field_value['lname'] ?? @$tenants_data['t1_lname']) }}" class="form-control">
                                                            <label for="{{ $sign_field }}_lname" class="">Last Name</label>
                                                        </div>
                                                        <div class="form-floating required mb-2">
                                                            <input id="{{ $sign_field }}_date" placeholder="" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', $sign_field_value['date'] ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                            <label for="{{ $sign_field }}_date" class="">Date</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                @if($errors->has($sign_field) or $errors->has($sign_field.'.fname') or $errors->has($sign_field.'.lname') or $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!--  AUTHORIZATION FORM END -->
                                <!--  Addendum FORM -->
                                <h3>Addendum to the Residential Tenancy Agreement</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-4">
                                        <div class="form-floating required {{ $errors->has('addendum_dated') ? 'has-error' : '' }}">
                                            <input id="addendum_dated" name="addendum_dated" value="{{ old('addendum_dated', $data->addendum_dated ?? date('d/m/Y')) }}" type="text" class="form-control datepicker" placeholder="Addendum Dated On">
                                            <label for="addendum_dated">Addendum dated on:</label>
                                            @if ($errors->has('addendum_dated'))<span class="text-danger">{{ $errors->first('addendum_dated') }}</span>@endif
                                        </div>
                                    </div>
                                </div>
                                <h5>BETWEEN: Landlord {{ appName() }} Real Estate Management</h5>
                                <h5>AND: Tenant(s) <span id="tenant_1_full_name" class="color_red"></span>
                                    @if($second_tenant_data == true), <span id="tenant_2_full_name" class="color_red"></span>@endif
                                    @if($third_tenant_data == true), <span id="tenant_3_full_name" class="color_red"></span>@endif
                                </h5>
                                <h4>WHEREAS:</h4>
                                @php
                                    if(isset($property_address->st)){
                                        $formatted_address = isset($property_address->unit) ? $property_address->unit.', ' : '';
                                        $formatted_address .= $property_address->st;
                                    }
                                @endphp
                                <p>A. The Landlord and Tenant entered into a Tenancy Agreement dated on <u class="color_red">{{ @$data->addendum_dated ?? date('d/m/Y') }}</u> for the premises located at <u id="property_address_addendum" class="color_red">{{ $property_address ? $formatted_address : @$property->address }}</u>. </p>
                                <p>B. The Landlord and Tenant have agreed to amend the Tenancy Agreement in accordance with the terms of this Agreement.</p>
                                <div class="ol" style="padding-left: 5px">
                                    <ol>
                                        <li>Tenants and occupants are not allowed to do short term rental with the property, all resulting fines from short term rental will be the responsibility of the tenant. This clause survives the expiry and termination of the tenancy agreement. </li>
                                        <li>Tenant (s) agree to have the units professionally cleaned with receipt provided and all the repairs caused by the tenant (s) to be repaired upon vacating the unit. The unit cleanliness and repaired state is upon approval by the property manager after the cleaning service. Failure to do so will result in a charge of $90/hr + GST for 2 cleaners plus a $100 administration fee. </li>
                                        <li>Tenant insurance of no less than $500,000 of Personal Liability must be purchased prior to the possession of the unit and proof of insurance or a copy of the insurance should be submitted to info@forrentcentral.com​ prior to key handover. </li>
                                        <li>Tenants and occupants are prohibit (a) smoking, growing, cultivating, propagating, or harvesting of cannabis (including medical cannabis), and (b) smoking, growing, cultivating, propagating, or harvesting of any hydroponic (water based) plant (including without limitation cannabis and medical cannabis). </li>
                                        <li>Tenant agrees that in the event of misplacing or losing the keys or other devices (garage FOB, etc) the tenant should pick up the keys from {{ appName() }} Real Estate Management office during business working hours (Monday to Friday, 10AM - 6PM). We do not guarantee we will be available outside of working hours. In this case the locksmith needs to be called. The tenant is responsible for the replacement or any related expenses such as re-keying the unit, ordering a new FOB, etc.</li>
                                        Outside of business working hours the tenant may contact the office. If the tenant picks up the copy of the keys outside of business hours, {{ appName() }} Real Estate Management will charge a service fee of $100. We do not guarantee we will be available outside of working hours. In this case the locksmith needs to be called.</li>
                                    </ol>
                                </div>
                                <h4>All other terms of the original agreement remains the same.</h4>
                                @if(isset($data->form_step) && $data->form_step > 0)
                                    <div class="check" style="margin-bottom: 20px;">
                                        <input class="form-check-input filled-in" name="disclaimer" value="1" {{ ($data->disclaimer == 1) ? 'checked' : '' }} id="disclaimer" type="checkbox">
                                        <label class="form-check-label" for="disclaimer">By signing this agreement I acknowledge that I have read and understand <a href="{{ url('disclosure-for-residential-tenancies') }}" target="_blank" style="color:red;text-decoration: underline;">the disclosure for residential tenancies</a>.</label>
                                        @if($errors->has('disclaimer'))<div class="text-danger">{{ $errors->first('disclaimer') }}</div>@endif
                                    </div>
                                @endif
                                @if(isset($data->form_step) && $data->form_step > 0)
                                    {{-- <h5>Agreed and signed by each adult TENANT</h5> --}}
                                    <div class="row">
                                        @if(($data->form_step == 1) || (($data->number_tenants == 2 || $data->number_tenants == 3) && $second_tenant_data == true && $data->form_step == 2 && $action == 'edit') || ($data->number_tenants == 3 && $third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || ($agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view'))
                                            <div class="col-12 col-sm-6 col-md-4">
                                                @php
                                                    $sign_id = 23;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$initial_23;
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date')) has-error @endif">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <h5>First Tenant's Details</h5>
                                                            </div>
                                                            @if(@$sign_field_value['signature']=='')
                                                                {!! SignPad($sign_id, 'Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field.'.signature'))==true)
                                                                        <img src="{{ old($sign_field.'.signature') }}">
                                                                        @else
                                                                            {!! old($sign_field.'.signature') !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value['signature'])==true)
                                                                        <img src="<?php echo $sign_field_value['signature']; ?>">
                                                                    @else
                                                                        {!! $sign_field_value['signature'] !!}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ $sign_field_value['signature'] ?? old($sign_field.'.signature') }}">
                                                            <div class="form-floating mb-2 mt-2 required">
                                                                <input id="{{ $sign_field }}_fname" name="{{ $sign_field }}[fname]" value="{{ old($sign_field.'.fname', $sign_field_value['fname'] ?? $tenants_data['t1_fname']) }}" class="form-control">
                                                                <label for="{{ $sign_field }}_fname" class="">First Name</label>
                                                            </div>

                                                            <div class="form-floating mb-2 required">
                                                                <input id="{{ $sign_field }}_lname" name="{{ $sign_field }}[lname]" value="{{ old($sign_field.'.lname', $sign_field_value['lname'] ?? $tenants_data['t1_lname']) }}" class="form-control">
                                                                <label for="{{ $sign_field }}_lname" class="">Last Name</label>
                                                            </div>

                                                            <div class="form-floating mb-2 required">
                                                                <input id="{{ $sign_field }}_date" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', $sign_field_value['date'] ?? date("d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_date" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                        @if(($second_tenant_data == true && $data->form_step == 2) || ($data->number_tenants == 3 && $third_tenant_data == true && $data->form_step == 3 && $action == 'edit') || (($data->number_tenants == 2 || $data->number_tenants == 3) && $agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $second_tenant_data == true))
                                            <div class="col-12 col-sm-6 col-md-4">
                                                @php
                                                $sign_id = 24;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$initial_24;
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date')) has-error @endif">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <h5>Second Tenant's Signature</h5>
                                                            </div>
                                                            @if(@$sign_field_value['signature']=='')
                                                                {!! SignPad($sign_id, 'Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field.'.signature'))==true)
                                                                        <img src="{{ old($sign_field.'.signature') }}">
                                                                        @else
                                                                            {!! old($sign_field.'.signature') !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value['signature'])==true)
                                                                        <img src="<?php echo $sign_field_value['signature']; ?>">
                                                                    @else
                                                                        {!! $sign_field_value['signature'] !!}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ $sign_field_value['signature'] ?? old($sign_field.'.signature') }}">
                                                            <div class="form-floating mb-2 mt-2 required">
                                                                <input id="{{ $sign_field }}_fname" name="{{ $sign_field }}[fname]" value="{{ old($sign_field.'.fname', $sign_field_value['fname'] ?? $tenants_data['t2_fname']) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_fname" class="">First Name</label>
                                                            </div>
                                                            <div class="form-floating mb-2 required">
                                                                <input id="{{ $sign_field }}_lname" name="{{ $sign_field }}[lname]" value="{{ old($sign_field.'.lname', $sign_field_value['lname'] ?? $tenants_data['t2_lname']) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_lname" class="">Last Name</label>
                                                            </div>
                                                            <div class="form-floating mb-2 required">
                                                                <input id="{{ $sign_field }}_date" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', $sign_field_value['date'] ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_date" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field) or $errors->has($sign_field.'.fname') or $errors->has($sign_field.'.lname') or $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                        @if(($third_tenant_data == true && $data->form_step == 3) || ($data->number_tenants == 3 && $agent_data == true && $data->form_step == 4 && $action == 'edit') || (isset($data->id, $action) && $action == 'view' && $third_tenant_data == true))
                                            <div class="col-12 col-sm-6 col-md-4">
                                                @php
                                                    $sign_id = 25;
                                                    $sign_field = 'initial_'.$sign_id;
                                                    $sign_field_value = @$initial_25;
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') || $errors->has($sign_field.'.fname') || $errors->has($sign_field.'.lname') || $errors->has($sign_field.'.date')) has-error @endif">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <h4>Third Tenant's Signature</h4>
                                                            </div>
                                                            @if(@$sign_field_value['signature']=='')
                                                                {!! SignPad($sign_id, 'Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field.'.signature'))==true)
                                                                            <img src="{{ old($sign_field.'.signature') }}">
                                                                        @else
                                                                            {!! old($sign_field.'.signature') !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value['signature'])==true)
                                                                        <img src="<?php echo $sign_field_value['signature']; ?>">
                                                                    @else
                                                                        {!! $sign_field_value['signature'] !!}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ $sign_field_value['signature'] ?? old($sign_field.'.signature') }}">

                                                            <div class="form-floating mb-2 mt-2 required">
                                                                <input id="{{ $sign_field }}_fname" name="{{ $sign_field }}[fname]" value="{{ old($sign_field.'.fname', $sign_field_value['fname'] ?? $tenants_data['t3_fname']) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_fname" class="">First Name</label>
                                                            </div>

                                                            <div class="form-floating mb-2 required">
                                                                <input id="{{ $sign_field }}_lname" name="{{ $sign_field }}[lname]" value="{{ old($sign_field.'.lname', $sign_field_value['lname'] ?? $tenants_data['t3_lname']) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_lname" class="">Last Name</label>
                                                            </div>
                                                            <div class="form-floating mb-2 required">
                                                                <input id="{{ $sign_field }}_date" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', $sign_field_value['date'] ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_date" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($errors->has($sign_field) or $errors->has($sign_field.'.fname') or $errors->has($sign_field.'.lname') or $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                                </div>
                                            </div>
                                        @endif
                                        @if(($agent_data == true && $data->form_step == 4) || (isset($data->id, $action) && $action == 'view'))
                                            <div class="col-12 col-sm-6 col-md-4">
                                                @php
                                                $sign_id = 26;
                                                $sign_field = 'initial_'.$sign_id;
                                                $sign_field_value = @$initial_26;
                                                @endphp
                                                <div id="signbox_{{ $sign_id }}" class="form-row-group_1 @if($errors->has($sign_field.'.signature') or $errors->has($sign_field.'.name') or $errors->has($sign_field.'.date')) has-error @endif">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <h5>Agreed and signed by the LANDLORD'S AGENT</h5>
                                                            </div>
                                                            @if(@$sign_field_value['signature']=='')
                                                                {!! SignPad($sign_id, 'Signature') !!}
                                                                @if(old($sign_field))
                                                                    <div class="sign-pad signtyped old_sign">
                                                                        @if(is_base64(old($sign_field.'.signature'))==true)
                                                                            <img src="{{ old($sign_field.'.signature') }}">
                                                                        @else
                                                                            {!! old($sign_field.'.signature') !!}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="sign-pad signtyped">
                                                                    @if(is_base64($sign_field_value['signature'])==true)
                                                                        <img src="<?php echo $sign_field_value['signature']; ?>">
                                                                    @else
                                                                        {!! $sign_field_value['signature'] !!}
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            <input id="{{ $sign_field }}" type="hidden" class="form-control setfield_{{ $sign_id }}" name="{{ $sign_field }}[signature]" value="{{ $sign_field_value['signature'] ?? old($sign_field.'.signature') }}">
                                                            <div class="form-floating mb-2 mt-2 required">
                                                                <input id="{{ $sign_field }}_name" name="{{ $sign_field }}[name]" placeholder="" value="{{ old($sign_field.'.name', $sign_field_value['name'] ?? '') }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_name" class="">Signing authority name</label>
                                                            </div>
                                                            <div class="form-floating mb-2 required">
                                                                <input id="{{ $sign_field }}_date" name="{{ $sign_field }}[date]" value="{{ old($sign_field.'.date', $sign_field_value['date'] ?? date(" d/m/Y")) }}" class="form-control" type="text">
                                                                <label for="{{ $sign_field }}_date" class="">Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has($sign_field.'.signature') or $errors->has($sign_field.'.name') or $errors->has($sign_field.'.date'))<span class="text-danger">Please fill all the fields.</span>@endif
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                <!--  Addendum FORM END -->
                                <div class="form-group">
                                    <div class="col-md-12 form-floating mb-2">
                                        @if(isset($data->id) && $data->agreement_notes)
                                            <p>{{ $data->agreement_notes }}</p>
                                        @else
                                            <textarea name="agreement_notes" id="agreement_notes" class="form-control" placeholder="Notes" style="height: 200px;">{{ old('agreement_notes') }}</textarea>
                                        @endif
                                        @if(empty($data->agreement_notes))
                                        <label for="agreement_notes">Notes:</label>
                                        @endif
                                    </div>
                                </div>
                                @if (!isset($action) || $action !== 'view')
                                    <div class="form-group">
                                        <div class="col-md-12 form-submut">
                                            @if(isset($data->id))
                                                <input type="hidden" name="form_step" value="{{ @$data->form_step }}">
                                                <input type="hidden" name="access_token" value="{{ $data->access_token }}">
                                            @else
                                                <input type="hidden" name="form_step" value="0">
                                                <input type="hidden" name="access_token" value="{{ $access_token }}">
                                            @endif
                                            <input type="hidden" name="ip" value="{{ @$ip }}">
                                            <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Submit</button>
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
    <script src="{{ asset('signdata/ss.js') }}"></script>
    <script src="{{ asset('js/autoCompleteAddress.js') }}"></script>
    <script>
        function showDisclaimer() {
            $("#disclaimer_box").show();
        }

        $(function(){
            $('#number_tenants, select#prop_id, select#prop_type, select#adult_tenants, select#minor_tenants').on('change', function () {
                var url = $(this).find(':selected').data('url');
                if (url) {
                    window.location = url;
                }
                return false;
            });
            $('input[type="radio"]#rental_period_month_to_month').click(function(){
                if ($(this).is(':checked') && $(this).val() == 'monthly'){
                    $("#rental_period_c, #rental_period_d").prop("checked", false);
                    // $("#rental_period_c, #rental_period_d, #fixed_ending_on").prop("disabled", true);
                    $("#rental_period_c, #rental_period_d").prop("disabled", true);
                    $("#fixed_ending_on").val("");
                }
            });
            $('input[type="radio"]#rental_period_fixed').click(function(){
                if ($(this).is(':checked') && $(this).val() == 'fixed'){
                    $("#rental_period_c, #rental_period_d, #fixed_ending_on").prop("disabled", false);
                }
            });
            $('input[type="radio"]#insurance_1, input[type="radio"]#insurance_2').click(function(){
                if ($(this).is(':checked') && $(this).val() == 'Yes'){
                    $("#insurance_docs").show();
                } else {
                    $("#insurance_docs").hide();
                }
            });

            if ($('input[type="radio"]#insurance_1').is(':checked') && $('input[type="radio"]#insurance_1').val() == 'Yes'){
                $("#insurance_docs").show();
            } else {
                $("#insurance_docs").hide();
            }
            var security_2 = $("#security_2").val();
            if(security_2 != ''){
                $("#pet_agreement_1").prop("checked", true);
            } else{
                $("#pet_agreement_2").prop("checked", true);

            }
            calcRent();
            calcCharges();
            fillTenantsNames();
            @if(!isset($data->form_step))
                termEnding();
            @endif
        });

        function termEnding() {
            var st_date = $("#rental_period_start_date").val();
            var term_of = $("#rental_period_term_of").val();
            if (st_date != '' && term_of != '') {
                var EndingDate = new Date(st_date);
                EndingDate.setMonth(EndingDate.getMonth() + parseInt(term_of));
                var dd = EndingDate.getDate();
                var mm = EndingDate.getMonth() + 1; // January is 0!
                var yyyy = EndingDate.getFullYear();

                if (dd < 10) { dd = '0' + dd; }
                if (mm < 10) { mm = '0' + mm; }

                var formattedEndingDate = yyyy + '-' + mm + '-' + dd;
                $("#fixed_ending_on").val(formattedEndingDate);
            }
        }
        $('#rental_period_term_of, #rental_period_start_date').on('input keydown keyup keypress blur', function(){
            termEnding();
        });

        $('#rent_fees_rent, #rent_fees_parking, #rent_fees_other, #rent_fees_total').on('keydown keyup keypress blur', function(){
            calcRent();
        });

        function calcRent(){
            var rent = parseInt($("#rent_fees_rent").val());
            var parking = parseInt($("#rent_fees_parking").val());
            var rent_fees_other = parseInt($("#rent_fees_other").val());
            var liquidated_damages = rent*40/100;
            $("#liquidated_damages").val(liquidated_damages);
            $("#rent_fees_total").val((!isNaN(rent) ? rent : 0)+(!isNaN(parking) ? parking : 0)+(!isNaN(rent_fees_other) ? rent_fees_other : 0));
        }

        $('#charges_security, #charges_pet_damage, #charges_rent, #charges_move_in_fee, #charges_total').on('keydown keyup keypress blur', function(){
            calcCharges();
        });

        function calcCharges(){
            var charges_security = parseInt($("#charges_security").val());
            var charges_pet_damage = parseInt($("#charges_pet_damage").val());
            var charges_rent = parseInt($("#charges_rent").val());
            var charges_move_in_fee = parseInt($("#charges_move_in_fee").val());
            $("#charges_total").val((!isNaN(charges_security) ? charges_security : 0)+(!isNaN(charges_pet_damage) ? charges_pet_damage : 0)+(!isNaN(charges_rent) ? charges_rent : 0)+(!isNaN(charges_move_in_fee) ? charges_move_in_fee : 0));
        }

        function fillTenantsNames(){
            $("#form_k_notice_t1_fname, #initial_17_fname, #tenant_property_fname").val($("#tenant1_fname").val());
            $("#form_k_notice_t2_fname, #initial_18_fname").val($("#tenant2_fname").val());
            $("#form_k_notice_t3_fname, #initial_19_fname").val($("#tenant3_fname").val());
            $("#form_k_notice_t1_lname, #initial_17_lname, #tenant_property_lname").val($("#tenant1_lname").val());
            $("#form_k_notice_t2_lname, #initial_18_lname").val($("#tenant2_lname").val());
            $("#form_k_notice_t3_lname, #initial_19_lname").val($("#tenant3_lname").val());
            $("#form_k_notice_t1_email").val($("#tenant1_email").val());
            $("#form_k_notice_t2_email").val($("#tenant2_email").val());
            $("#form_k_notice_t3_email").val($("#tenant3_email").val());
            $("#form_k_notice_t1_phone_work").val($("#tenant1_phone").val());
            $("#form_k_notice_t2_phone_work").val($("#tenant2_phone").val());
            $("#form_k_notice_t3_phone_work").val($("#tenant3_phone").val());
            $("#tenant_1_full_name").text($("#tenant1_fname").val()+' '+$("#tenant1_lname").val());
            $("#tenant_2_full_name").text($("#tenant2_fname").val()+' '+$("#tenant2_lname").val());
            $("#tenant_3_full_name").text($("#tenant3_fname").val()+' '+$("#tenant3_lname").val());
            $("#form_k_notice_t1_fname + label, #form_k_notice_t2_fname + label, #form_k_notice_t3_fname + label, #form_k_notice_t1_lname + label, #form_k_notice_t2_lname + label, #form_k_notice_t3_lname + label, #initial_17_fname + label, #initial_18_fname + label, #initial_19_fname + label, #initial_17_lname + label, #initial_18_lname + label, #initial_19_lname + label, #form_k_notice_t1_email + label, #form_k_notice_t2_email + label, #form_k_notice_t3_email + label, #form_k_notice_t1_phone_work + label, #form_k_notice_t2_phone_work + label, #form_k_notice_t3_phone_work + label, #tenant_property_lname + label").addClass('active');
        }

        $("#tenant1_fname, #tenant1_lname, #tenant2_fname, #tenant2_lname, #tenant3_fname, #tenant3_lname, #tenant1_email, #tenant2_email, #tenant3_email, #tenant1_phone, #tenant2_phone, #tenant3_phone").on('keydown keyup keypress blur', function(){
            fillTenantsNames();
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
            var reg_ons = $("#field_id_1").val()+ " " + $("#field_id_2").val()+", "+ $("#field_id_1_2").val()+ " " + $("#field_id_2_2").val();
            $("#field_id_44").val(reg_ons);
            $("#field_id_44").css({"width":"250px"});
            $("#field_id_42 + label, #field_id_52 + label").addClass('active');
        });

        $("#security_2").on('keydown keyup keypress blur', function(){
            var security_2 = $("#security_2").val();
            if(security_2 != ''){
                $("#pet_agreement_1").prop("checked", true);
            } else {
                $("#pet_agreement_2").prop("checked", true);

            }
        });

        $(".datepicker").attr("placeholder", "Select a date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            minDate: 0,
            onSelect: function (dateText, inst) {
                $(this).removeAttr("placeholder");
            }
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

        $("input[name='resident_won2[res_ca]']").click(function () {
            if($(this).prop("checked")) {
                var won2_resident_ca = $("input[name='resident_won2[res_ca]']:checked").val();
                if(won2_resident_ca == 1){
                    $('#won2_non_reg_ca').hide();
                } else {
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

        $(document).ready(function(){
            var resident_ca = $("input[name='resident_won1[res_ca]']:checked").val();
            if(resident_ca == 1){
                $('#non_reg_ca').hide();
            } else {
                $('#non_reg_ca').show();
            }
            var won2_resident_ca = $("input[name='resident_won2[res_ca]']:checked").val();
            if(won2_resident_ca == 1){
                $('#won2_non_reg_ca').hide();
            } else {
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
            $('#other_account_holder_phone, #tenant1_phone, #tenant2_phone, #tenant3_phone, #form_k_notice_t1_phone_work, #form_k_notice_t2_phone_work, #form_k_notice_t3_phone_work, #form_k_notice_t1_phone_home, #form_k_notice_t2_phone_home, #form_k_notice_t3_phone_home').mask('(999) 999-9999');
            $('#account_details_transit').mask('99999');
            $('#account_details_institute').mask('999');
            // $('#field_id_72').mask('999999999999999');
            // start signaturepad
        });

    </script>
    <script>
    @php
        $arraysign = [];
        if(isset($data->form_step) && $data->form_step > 0){
            if(isset($action) && $action == 'edit' && $data->form_step == 1){
                $arraysign = ['signpad_1', 'signpad_5', 'signpad_17', 'signpad_21', 'signpad_22', 'signpad_23', 'signpad_27', 'signpad_29'];
                if(!empty($data->other_act_1)){
                    array_push($arraysign,"signpad_9");
                }
                if(!empty($data->other_act_2)){
                    array_push($arraysign,"signpad_13");
                }
            } else if(isset($action) && $action == 'edit' && $data->form_step == 2){
                $arraysign = ['signpad_2', 'signpad_6', 'signpad_18', 'signpad_24'];
                if(!empty($data->other_act_1)){
                    array_push($arraysign,"signpad_10");
                }
                if(!empty($data->other_act_2)){
                    array_push($arraysign,"signpad_14");
                }
            } else if(isset($action) && $action == 'edit' && $data->form_step == 3){
                $arraysign=['signpad_3', 'signpad_7', 'signpad_19', 'signpad_25'];
                if(!empty($data->other_act_1)){
                    array_push($arraysign,"signpad_11");
                }
                if(!empty($data->other_act_2)){
                    array_push($arraysign,"signpad_15");
                }
            } else if(isset($action) && $action == 'edit' && $data->form_step == 4){
                $arraysign=['signpad_4', 'signpad_8', 'signpad_20', 'signpad_26', 'signpad_28'];
                if(!empty($data->other_act_1)){
                    array_push($arraysign,"signpad_12");
                }
                if(!empty($data->other_act_2)){
                    array_push($arraysign,"signpad_16");
                }
            } else if(isset($action) && $action == 'view'){
                $arraysign=array();
            }
        }
    @endphp

    {{--
    @php
        $arraysign = [];

        if (isset($data->form_step) && $data->form_step > 0) {
            $stepConditions = [
                1 => ['signpad_1', 'signpad_5', 'signpad_17', 'signpad_21', 'signpad_22', 'signpad_23', 'signpad_27', 'signpad_29'],
                2 => ['signpad_2', 'signpad_6', 'signpad_18', 'signpad_24'],
                3 => ['signpad_3', 'signpad_7', 'signpad_19', 'signpad_25'],
                4 => ['signpad_4', 'signpad_8', 'signpad_20', 'signpad_26', 'signpad_28'],
            ];

            $additionalConditions = [
                'other_act_1' => ['signpad_9', 'signpad_10', 'signpad_11', 'signpad_12'],
                'other_act_2' => ['signpad_13', 'signpad_14', 'signpad_15', 'signpad_16'],
            ];

            if (isset($action) && $action == 'edit' && isset($stepConditions[$data->form_step])) {
                $arraysign = $stepConditions[$data->form_step];

                foreach ($additionalConditions as $key => $values) {
                    if (!empty($data->{$key})) {
                        $arraysign = array_merge($arraysign, $values);
                    }
                }
            } elseif (isset($action) && $action == 'view') {
                $arraysign = [];
            }
        }
    @endphp
    --}}

    var arraysign = @json($arraysign);

    arraysign.forEach(function (arraysignavl) {
        window['obj' + arraysignavl] = new SuperSignature({
            "SignObject": arraysignavl,
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
            "SignWidth": "260",
            "SignHeight": "135",
            "PenColor": "#0000FF",
            "ErrorMessage": "",
            "StartMessage": "",
            "SuccessMessage": "",
            "forceMouseEvent": true,
            "IeModalFix": true
        });
        window['obj' + arraysignavl].Init();
    });
    </script>
    <script>
        $('#woner_f18_resident').on('click', function(){
            if ($('#woner_f18_resident').is(':checked')){
                $('#woner_f18_resident').val('checked');
            } else {
                $('#woner_f18_resident').val('unchecked');
            }
        });
        $('#woner_f19_nonresident').on('click', function(){
            if ($('#woner_f19_nonresident').is(':checked')){
                $('#woner_f19_nonresident').val('checked')
            } else {
                $('#woner_f19_nonresident').val('unchecked')
            }
        });
        $('.signclick').on('click', function(){
            var idtext=$(this).attr('id');
            idtext = idtext.replace('textsign', '');
            $("#"+idtext+"textdivsign").show();
        });
        $('.close').on('click', function(){
            var id=$(this).parent().attr('id');
            idonly = id.replace('textdivsign', '');
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
            var id=$(this).attr('role');
            if($('#drawsign'+id).hasClass('active')){
                var signbase=$('#signpad'+id+'_data_canvas').val();
                $.ajax({
                    url:"{{ route('tenant.saveSign') }}",
                    type:'POST',
                    data:{'jsonbucket':signbase} ,
                    success: function(result){
                        $('.setfield'+id).val(result);
                        $('#'+id+'textdivsign').html('<img src="'+result+'"/>');
                        $('#'+id+'textdivsign').removeClass('tooltipsign');
                        $('#'+id+'textdivsign').addClass('signtyped');
                        $('#'+id+'textsign').remove();
                        $('.inputfield'+id).remove();
                    }
                });
            }
            if($('#typesign'+id).hasClass('active')){
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

        // Disable Field
        $(document).ready(function(){
            @if(isset($action, $data->form_step) && $data->form_step == 1 && $action == 'edit')
                $("#Feedback :input").prop("disabled", true);
                $("#pmaForm :input").not("[name=submit], input[name='_token'], input[name='access_token'], #id, select#adult_tenants, select#minor_tenants, input[name='form_step'], #tenant2_fname, #tenant3_fname, #tenant2_lname, #tenant3_lname, #tenant2_email, #tenant3_email, #tenant2_phone, #tenant3_phone, #adult_tenants_fullnames :input, #minor_tenants_fullnames :input, #signbox_1 :input, #signbox_5 :input, #signbox_9 :input, #signbox_13 :input, #signbox_17 :input, #signbox_21 :input, #signbox_22 :input, #signbox_23 :input, #signbox_29 :input, #AccountDetailsBox :input, #voided_check, #RelationTenantBox :input, #form_k_notice_box :input, #insurance_1, #insurance_2, #insurance_docs :input, #form_k_notice_box :input, #disclaimer").prop("disabled", true);
                $("#form_k_notice_box :input").not("#form_k_notice_t1_dl :input, #form_k_notice_t1_phone_home :input, #form_k_notice_tenancy_van_date :input, #signbox_27 :input").prop("disabled", true);
                $("#pmaForm #tenant1_fname, #tenant1_lname, #tenant1_email, #tenant1_phone").prop("disabled", false).prop('readonly', true);
                $("#form_k_notice_box #form_k_notice_t1_dl, #form_k_notice_box #form_k_notice_t1_phone_home, #form_k_notice_box #form_k_notice_tenancy_van_date").prop("disabled", false);
                $("#signbox_17 #initial_17_lname, #signbox_17 #initial_17_fname, #signbox_17 #initial_17_date").prop("disabled", false).prop('readonly', true);
                $("#signbox_22 #initial_22_lname, #signbox_22 #initial_22_fname, #signbox_22 #initial_22_date").prop("disabled", false).prop('readonly', true);
                $("#signbox_23 #initial_23_lname, #signbox_23 #initial_23_fname, #signbox_23 #initial_23_date").prop("disabled", false).prop('readonly', true);
                $("#signbox_29 #initial_29_email_for_service, #signbox_29 #initial_29_fname, #signbox_29 #initial_29_date").prop("disabled", false).prop('readonly', true);
            @endif

            @if(isset($action, $data->form_step) && $data->form_step == 2 && $action == 'edit')
                $("#pmaForm :input").not("[name=submit], input[name='_token'], input[name='access_token'], #id, input[name='form_step'], #signbox_2 :input, #signbox_6 :input, #signbox_10 :input, #signbox_14 :input, #signbox_18 :input, #signbox_24 :input").prop("disabled", true);
                $("#pmaForm #tenant1_fname, #tenant1_lname, #tenant1_email, #tenant1_phone, #tenant2_fname, #tenant2_lname, #tenant2_email, #tenant2_phone, #tenant3_fname, #tenant3_lname, #tenant3_email, #tenant3_phone").prop("disabled", false).prop('readonly', true);
            @endif

            @if(isset($action, $data->form_step) && $data->form_step == 3 && $action == 'edit')
                $("#pmaForm :input").not("[name=submit], input[name='_token'], input[name='access_token'], #id, input[name='form_step'], #signbox_3 :input, #signbox_7 :input, #signbox_11 :input, #signbox_15 :input, #signbox_19 :input, #signbox_25 :input").prop("disabled", true);
            @endif

            @if(isset($action, $data->form_step) && $data->form_step == 4 && $action == 'edit')
                $("#pmaForm :input").not("[name=submit], input[name='_token'], input[name='access_token'], #id, input[name='form_step'], #signbox_4 :input, #signbox_8 :input, #signbox_12 :input, #signbox_16 :input, #signbox_20 :input, #signbox_26 :input, #signbox_28 :input").prop("disabled", true);
            @endif

            @if(isset($action) && $action == 'view')
                $("#pmaForm :input").not("").prop("disabled", true);
            @endif
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                $(this).next('label').find('span.filename').text(fileName);
                $(this).next('label').find('span.info_text').text(' Click to replace the file');
            });
        });
    </script>
@endpush
