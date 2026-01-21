@extends('tenant::layouts.master')
@section('title', __('Tenancy Agreement PDF'))
@push('after-styles')
    <style>
        .disclosure-box table tbody tr { background: transparent; }
        @font-face { font-family: Kai; src: url('/public/css/wts11.ttf') format('truetype'); }
        body { margin: 0cm 1cm 1.2cm 1cm; font-family: Arial, sans-serif; font-size: 13px !important; line-height: 18px; }
        h3 { margin-top: 20px; color: #ec1f27; font-size: 22px; }
        h4 { font-size: 18px; }
        h5 { font-size: 16px; }
        .ol OL { counter-reset: item; padding-left: 0; }
        .ol LI { position: relative; line-height: 16px; display: block; margin: 7px 0; padding-left: 25px; text-align: justify; }
        .ol LI ol li { padding-left: 40px; }
        .ol LI:before { content: counters(item, ".") ". "; padding-right: 10px; left: 0; position: absolute; counter-increment: item; font-weight: 600; font-size: 13px; }
        .no-ol li { position: static; margin: 0; padding-left: 0; text-align: justify; }
        ul.no-ol li:before { display: none; }
        .no-ol.lease_terms { list-style: circle !important; list-style-position: inside !important; }
        .no-ol.lease_terms LI { display: block !important; }
        small { color: #999; font-size: 11px; }
        table tbody tr td { color: #000; font-size: 14px; padding: 5px !important; }
        table tbody tr:nth-child(2n+2) { background: rgba(0, 0, 0, .02); }
        table tbody tr { background: rgba(0, 0, 0, .04); }
        .signtyped { font-family: 'Beth Ellen', 'SimHei', sans-serif, cursive; font-weight: 500; font-size: 16px; letter-spacing: 1px; box-sizing: border-box; text-align: center; }
        .sign-pad.signtyped, .sign-pad.signtyped img { width: 150px; height: 65px; }
        .sign-pad.signtyped { margin: 10px 0; border: 0; padding: 0; color: #000aff; }
        .sign-pad.signtyped img { display: block; width: 150px; height: 65px; }
        .typedsign { text-align: left; }
        .form-row-group-border { border: 1px dashed #666; padding: 20px; }
        div.breakNow { page-break-inside: avoid; page-break-after: always; }
        p { margin: 0 0 5px; text-align: justify; }
        .color-red { color: #e32124; }
        @page { margin: 94px 0 0px 0; }
        header { position: fixed; top: -64px; left: 1cm; right: 1cm; height: 54px; }
        .pdf-heading { margin-bottom: 15px; text-align: center; }
    </style>
@endpush
@section('content')
    @php
        $number_tenants = $data->number_tenants ?? '1';
        $form_k = $data->prop_type == 'Strata' ? true : false;
        $agent_data = true;
        switch ($number_tenants) {
            case 1:
                $second_tenant_data = false;
                $third_tenant_data = false;
                break;
            case 2:
                $second_tenant_data = true;
                $third_tenant_data = false;
                break;
            case 3:
                $second_tenant_data = true;
                $third_tenant_data = true;
                break;
            default:
                $second_tenant_data = false;
                $third_tenant_data = false;
                break;
        }
        if($data){
            $disclosure = json_decode(unserialize($data->disclosure), true);
            $tenants_data = json_decode(unserialize($data->tenants_data), true);
            $minor_names = json_decode(unserialize($data->minor_names), true);
            $adult_names = json_decode(unserialize($data->adult_names), true);
            $property_address = json_decode(unserialize($data->property_address), true);

            $utilities = json_decode(unserialize($data->utilities), true);
            $rental_period = json_decode(unserialize($data->rental_period), true);
            $rent_fees = json_decode(unserialize($data->rent_fees), true);
            $charges = json_decode(unserialize($data->charges), true);

            $security = json_decode(unserialize($data->security), true);
            $smoking = unserialize($data->smoking);
            $form_k_notice = json_decode(unserialize($data->form_k_notice), true);

            $tenant_property = json_decode(unserialize($data->tenant_property), true);
            $account_details = json_decode(unserialize($data->account_details), true);
            $other_account_holder = json_decode(unserialize($data->other_account_holder), true);

            $initial_17 = null;
            if ($data->initial_17) {
                $unserialized_data = @unserialize($data->initial_17);
                $initial_17 = ($unserialized_data !== false) ? json_decode($unserialized_data, true) : null;
            }

            $initial_18 = null;
            if ($data->initial_18) {
                $unserialized_data = @unserialize($data->initial_18);
                $initial_18 = ($unserialized_data !== false) ? json_decode($unserialized_data, true) : null;
            }

            $initial_19 = null;
            if ($data->initial_19) {
                $unserialized_data = @unserialize($data->initial_19);
                $initial_19 = ($unserialized_data !== false) ? json_decode($unserialized_data, true) : null;
            }

            $initial_22 = null;
            if ($data->initial_22) {
                $unserialized_data = @unserialize($data->initial_22);
                $initial_22 = ($unserialized_data !== false) ? json_decode($unserialized_data, true) : null;
            }

            $initial_23 = null;
            if ($data->initial_23) {
                $unserialized_data = @unserialize($data->initial_23);
                $initial_23 = ($unserialized_data !== false) ? json_decode($unserialized_data, true) : null;
            }

            $initial_24 = null;
            if ($data->initial_24) {
                $unserialized_data = @unserialize($data->initial_24);
                $initial_24 = ($unserialized_data !== false) ? json_decode($unserialized_data, true) : null;
            }

            $initial_25 = null;
            if ($data->initial_25) {
                $unserialized_data = @unserialize($data->initial_25);
                $initial_25 = ($unserialized_data !== false) ? json_decode($unserialized_data, true) : null;
            }

            $initial_26 = null;
            if ($data->initial_26) {
                // $unserialized_data = @unserialize($data->initial_26);
                $initial_26 = json_decode($unserialized_data, true) ?? null;
            }

            $initial_29 = null;
            if ($data->initial_29) {
                $unserialized_data = @unserialize($data->initial_29);
                $initial_29 = ($unserialized_data !== false) ? json_decode($unserialized_data, true) : null;
            }
            $adult_tenants = $data->adult_tenants ?? 0;
            $minor_tenants = $data->minor_tenants ?? 0;
        }
        $property_id = (isset($data->prop_id) ? $data->prop_id: @$property->id);
        $adult_fullnames = [];
        $minor_fullnames = [];

    @endphp

    <div class="panel-body">
    <div class="ol">
        <ol>
            <li>AGREEMENT. The parties to this Residential Tenancy Agreement (from now on referred to as, "this Agreement") agree to be legally bound by and comply with the terms of this Agreement. The parties understand that where in this Agreement the words, "the Act," are used, they refer to the Residential  Tenancy Act, SBC 2002, c.78, as amended, and Regulation made from time to time. The Standard Terms required by the Act are shaded in grey, distinguishing them from other Terms.
                <h4 style="margin-bottom:10px">BETWEEN:</h4>
                <p><strong>{{ appName() }} Real Estate Management</strong><br>B-2127 Granville Street,<br>Vancouver BC V6H 3E9<br>("Landlord’s Agent")</p>
                <h4 style="margin-bottom:10px">AND:</h4>
                <p>(FULL NAMES of all ADULT Tenants to occupy the rental premises.) ("Tenants")</p>
                <h5 style="font-weight: 600;margin-bottom:0">First Tenant's Name</h5>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><div>{{ $tenants_data['t1_fname'] }}</div><small>First Name</small></td>
                        <td><div>{{ $tenants_data['t1_lname'] }}</div><small>Last Name</small></td>
                        <td><div>{{ $tenants_data['t1_email'] }}</div><small>Email</small></td>
                        <td><div>{{ $tenants_data['t1_phone'] }}</div><small>Phone</small></td>
                    </tr>
                </table>
                @if($second_tenant_data == true && !empty($tenants_data['t2_fname']))
                    <h5 style="font-weight: 600;margin-bottom:0">Second Tenant's Name</h5>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><div>{{ $tenants_data['t2_fname'] }}</div><small>First Name</small></td>
                            <td><div>{{ $tenants_data['t2_lname'] }}</div><small>Last Name</small></td>
                            <td><div>{{ $tenants_data['t2_email'] }}</div><small>Email</small></td>
                            <td><div>{{ $tenants_data['t2_phone'] }}</div><small>Phone</small></td>
                        </tr>
                    </table>
                @endif
                @if($third_tenant_data == true && !empty($tenants_data['t3_fname']))
                    <h5 style="font-weight: 600;margin-bottom:0">Third Tenant's Name</h5>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><div>{{ $tenants_data['t3_fname'] }}</div><small>First Name</small></td>
                            <td><div>{{ $tenants_data['t3_lname'] }}</div><small>Last Name</small></td>
                            <td><div>{{ $tenants_data['t3_email'] }}</div><small>Email</small></td>
                            <td><div>{{ $tenants_data['t3_phone'] }}</div><small>Phone</small></td>
                        </tr>
                    </table>
                @endif
            </li>
            <li>
                @if($adult_fullnames)
                    <strong>CORRECT LEGAL NAMES:</strong><br><small>of all ADULT persons (age 19 or older) other than tenant(s) to occupy the rental unit.</small>
                    @foreach($adult_fullnames as $key => $adult)
                        <h5 style="font-weight: 600;margin-bottom:0">{{ numtoword($key+1) }} Adult Additional Occupant's Name</h5>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><div>{{ $adult['fname'] }}</div><small>First Name</small></td>
                                <td><div>{{ $adult['lname'] }}</div><small>Last Name</small></td>
                            </tr>
                        </table>
                    @endforeach
                @endif
                @if($minor_fullnames)
                    <strong>CORRECT LEGAL NAMES:</strong><br><small>of all MINOR persons (under age 19, including infants) to occupy the rental unit.</small>
                    @foreach($minor_fullnames as $key => $minor)
                        <h5 style="font-weight: 600;margin-bottom:0">{{ numtoword($key+1) }} Adult Additional Occupant's Name</h5>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><div>{{ $minor['fname'] }}</div><small>First Name</small></td>
                                <td><div>{{ $minor['lname'] }}</div><small>Last Name</small></td>
                            </tr>
                        </table>
                    @endforeach
                @endif
                <p>Only those listed above may occupy the premises. (Tenants, Adults listed under Occupants and Minor Occupants.)</p>
            </li>
            <li>
                <strong>RENTAL UNIT TO BE RENTED:</strong><br><small>(called residential premises in this tenancy agreement)</small>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><div>{{ $property_address['unit'] ?? '' }}</div><small>Unit Number</small></td>
                        <td><div>{{ $property_address['st'] ?? '' }}</div><small>Street Address</small></td>
                        <td><div>{{ $property_address['city'] ?? '' }}</div><small>City</small></td>
                    </tr>
                    <tr>
                        <td><div>{{ $property_address['state'] ?? '' }}</div><small>State / Province / Region</small></td>
                        <td><div>{{ $property_address['zip'] ?? '' }}</div><small>ZIP / Postal Code</small></td>
                        <td><div>{{ $property_address['country'] ?? '' }}</div><small>Country</small></td>
                    </tr>
                </table>
                <h4>No furnishings, equipment, facilities, services, or utilities will be provided by the landlord and included in the rent EXCEPT those checked below, which the tenant agrees are in good condition and which the tenant and his guests will use carefully. See Clause 11, Utilities Payment</h4>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    @php
                        $utilities_data = ['Refrigerator', 'Range', 'Dishwasher', 'Garburator', 'Garbage compactor', 'Washer in premises', 'Dryer in premises', 'Washer and dryer in common room', 'Security alarm', 'Microwave', 'Hood fan', 'Hot water', 'Heat', 'Electricity', 'Cablevision', 'Gas', 'Parking stall 1', 'Parking stall 2', 'Storage locker'];
                        $count = 1;
                    @endphp
                    @foreach($utilities_data as $utility)
                        @php $key = str_slug($utility, '_'); @endphp
                        @if(isset($utilities[$key]) && $utilities[$key] == '1')
                            <tr style="background: transparent">
                                <td><img src="{{ asset('images/checks/check-mark.png') }}" style="width: 16px; height: 16px; margin-bottom: -3px;" /> {{ $utility }}</td>
                            </tr>
                            @endif
                        @php $count++; @endphp
                    @endforeach
                </table>
                <p>The landlord must not take away or make the tenant pay extra for a service or facility that is already included in the rent, unless a reduction is made under section 27 (2) of the Act.<br><small><em>* Upon 30 days written notice, the landlord may change or remove any of these services, if the method by which they are supplied to the landlord changes</em></small></p>
            </li>
            <div class="breakNow"></div>
            <li>
                <strong>RENTAL PERIOD AND TERMS OF TENANCY.</strong>
                <p>The tenancy created by this agreement STARTS ON: <strong>{{ isset($rental_period['start_date']) ? $rental_period['start_date'] : '' }}</strong>Term of <strong>{{ isset($rental_period['term_of']) ? $rental_period['term_of'] : '' }}</strong> months</p>
                <p><img src="{{ asset('images/checks/' . (isset($rental_period['rental_terms']) && $rental_period['rental_terms'] == 'monthly' ? 'check-mark.png' : 'checkbox-unchecked.png')) }}" style="width:16px; height:16px" />
                <strong>A.</strong> and continues on a month to month basis until cancelled in accordance with the Act.</p>
                <p><img src="{{ asset('images/checks/' . (isset($rental_period['rental_terms']) && $rental_period['rental_terms'] == 'fixed' ? 'check-mark.png' : 'checkbox-unchecked.png')) }}" style="width:16px; height:16px" />
                <strong>B.</strong> and is for a fixed term ending on: <strong>{{ isset($rental_period['fixed_ending_on']) ? $rental_period['fixed_ending_on'] : '' }}</strong></p>
                <h5>IF YOU CHOOSE B, CHECK C OR D</h5>
                <p><img src="{{ asset('images/checks/' . (isset($rental_period['ending']) && $rental_period['ending'] == 'c' ? 'check-mark.png' : 'checkbox-unchecked.png')) }}" style="width:16px; height:16px" />
                <strong>C.</strong> At the end of this time the tenancy will continue on a month to month basis, or another fixed length of time, unless the tenant gives notice to end the tenancy at least one clear month before the end of the term. </p>
                <p><img src="{{ asset('images/checks/' . (isset($rental_period['ending']) && $rental_period['ending'] == 'd' ? 'check-mark.png' : 'checkbox-unchecked.png')) }}" style="width:16px; height:16px" />
                <strong>D.</strong> At the end of this time the tenancy is ended and the tenant must vacate the rental unit.</p>

                {{-- <p>The tenancy created by this agreement STARTS ON: <strong>{{ @$rental_period['start_date'] }}</strong>Term of <strong>{{ @$rental_period['term_of'] }}</strong> months</p>
                <p><img src="{{ asset('images/checks/' . ($rental_period['rental_terms'] == 'monthly' ? 'check-mark.png' : 'checkbox-unchecked.png')) }}" style="width:16px; height:16px" />
                    <strong>A.</strong> and continues on a month to month basis until cancelled in accordance with the Act.</p>
                <p><img src="{{ asset('images/checks/' . ($rental_period['rental_terms'] == 'fixed' ? 'check-mark.png' : 'checkbox-unchecked.png')) }}" style="width:16px; height:16px" />
                    <strong>B.</strong> and is for a fixed term ending on: <strong>{{ @$rental_period['fixed_ending_on'] }}</strong></p>
                <h5>IF YOU CHOOSE B, CHECK C OR D</h5>
                <p><img src="{{ asset('images/checks/' . ($rental_period['ending'] == 'c' ? 'check-mark.png' : 'checkbox-unchecked.png')) }}" style="width:16px; height:16px" />
                    <strong>C.</strong> At the end of this time the tenancy will continue on a month to month basis, or another fixed length of time, unless the tenant gives notice to end the tenancy at least one clear month before the end of the term. </p>
                <p><img src="{{ asset('images/checks/' . ($rental_period['ending'] == 'd' ? 'check-mark.png' : 'checkbox-unchecked.png')) }}" style="width:16px; height:16px" />
                    <strong>D.</strong> At the end of this time the tenancy is ended and the tenant must vacate the rental unit.</p> --}}
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr style="background:#fff">
                        @if($data->initial_1)
                            <td>{!! pdfsign($data->initial_1, "Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_2)
                            <td>{!! pdfsign($data->initial_2, "Second Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_3)
                            <td>{!! pdfsign($data->initial_3, "Third Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_3)
                    </tr>
                    <tr style="background:#fff">
                        @endif
                        @if($data->initial_4)
                            <td>{!! pdfsign($data->initial_4, "Landlord's Agent's Initials") !!}</td>
                        @endif
                    </tr>
                </table>
            </li>
            <li>
                <p><strong>LIQUIDATED DAMAGES.</strong> If the tenant breaches a material term of this Agreement that causes the landlord to end the tenancy before the end of any fixed term, or if the tenant provides the landlord with notice, whether written, oral, or by conduct, of an intention to breach this Agreement and end the tenancy by vacating, and does vacatebefore the end of any fixed term, the tenant will pay to the landlord the sum of <strong class="color-red">${{$data->liquidated_damages ?? 0}}</strong> as liquidated damages and not as a penalty for all costs associated with re-renting the rental unit. Payment of such liquidated damages does not preclude the landlord from claiming future rental revenue losses due to a material breach of the agreement that will remain unliquidated.</p>
            </li>
            <li>
                <p><strong>RENT AND FEES.</strong> Rent must be received by the landlord on or before the first calendar day of each month, unless the parties agree in advance in writing to a different date.</p>
                <table width="auto" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>Rent:</td>
                        <td>${{ $rent_fees['rent'] }}</td>
                        <td>/Per {{ $rent_fees['per'] == 'other' ? $rent_fees['other_label'] : $rent_fees['per'] }}</td>
                    </tr>
                    <tr>
                        <td>Parking Fee(s)</td>
                        <td>${{ $rent_fees['parking'] }}</td>
                        <td>{{ $rent_fees['parking_specify'] ? $rent_fees['parking_specify'] : '' }}</td>
                    </tr>
                    <tr>
                        <td>Other Fee(s)</td>
                        <td>${{ $rent_fees['other'] }}</td>
                        <td>{{ $rent_fees['other_specify'] ? $rent_fees['other_specify'] : '' }}</td>
                    </tr>
                    <tr>
                        <td><strong>TOTAL RENT AND FEES</strong></td>
                        <td><strong>${{ $rent_fees['total'] }}</strong></td>
                        <td></td>
                    </tr>
                </table>
                <p>Subject to clause 13, Additional Occupants, the tenant agrees that for each additional tenant or occupant not named in clause 1 or 2 above, the rent will increase by <strong class="color-red">${{$rent_fees['rent_increase']}}</strong> per month, effective from the date of his occupancy. The acceptance by the landlord of any additional occupant does not otherwise change this Agreement or create a new tenancy.</p>
            </li>
            <li><strong>SECURITY DEPOSIT AND PET DAMAGE DEPOSIT.</strong>
                <p>A security deposit in the amount of <strong class="color-red">${{ $security['0'] }}</strong> paid on <strong class="color-red">{{ $security['1'] ?? '___________' }}</strong> </p>
                <p>A pet damage deposit in the amount of <strong class="color-red">${{ $security['2'] ?? 0 }}</strong> paid on <strong class="color-red">{{ $security['3'] ?? '___________' }}</strong></p>
                <p><strong>The landlord agrees:</strong></p>
                <ul class="no-ol" style="margin:0;padding: 0">
                    <li><strong>(a)</strong> that the security deposit and pet damage deposit must each not exceed one half of the monthly rent payable for the rental unit,</li>
                    <li><strong>(b)</strong> to keep the security deposit and pet damage deposit during the tenancy and pay interest on it in accordance with the Regulation, and</li>
                    <li><strong>(c)</strong> to repay the security deposit and pet damage deposit and interest to the tenant within 15 days of the end of the tenancy agreement, unless the tenant agrees in writing to allow the landlord to keep an amount as payment for unpaid rent or damage, or the landlord applies for dispute resolution under the Act within 15 days of the end of the tenancy agreement to claim some or all of the security deposit or pet damage deposit. The 15 days period starts on the later of the date the tenancy ends, or the date the landlord receives the tenant’s forwarding address in writing.</li>
                    <li><strong>(d)</strong> If the landlord does not comply with (c), the landlord may not make a claim against the security deposit or pet damage deposit, and must pay the tenant double the amount of the security deposit, pet damage deposit, or both.</li>
                    <li><strong>(e)</strong> The tenant may agree to use the security deposit and interest as rent only if the landlord gives written consent.</li>
                </ul>
                <p>At the end of the tenancy, the landlord may retain from a security deposit or a pet damage depositany unpaid amount that a Dispute Resolution Officer has ordered the tenant to pay to the landlord.</p>
            </li>
            <li><strong>CONDITION INSPECTIONS.</strong> In accordance with sections 23 and 35 of the Act and Part 3 of the Regulation, the landlord and tenant must inspect the condition of the rental unit together when the tenant is entitled to possession, when the tenant starts keeping a pet during the tenancy if a condition inspection was not completed at the start of the tenancy, and at the end of the tenancy. The landlord and tenant may agree on a different day for the condition inspection. The right of a tenant to return of a security or pet damage deposit or both, or the right of a landlord to claim against a security or pet damage deposit or both for damage to residential property is extinguished if that party does not comply with sections 23 and 35 of the Act.</li>
            <li><strong>PAYMENT OF RENT.</strong> The tenant must pay the rent on time, unless the tenant is permitted under the Act to deduct from the rent. If the rent is unpaid, the landlord may issue a notice to end a tenancy to the tenant, which may take effect not earlier than 10 days after the date the tenant receives the notice. The landlord must give the tenant a receipt for rent paid in cash. The landlord must return to the tenant on or before the last day of the tenancy any post-dated cheques for rent that remain in the possession of the landlord. If the landlord does not have a forwarding address for the tenant and the tenant has vacated the rental unit without notice to the landlord, the landlord must forward any post-dated cheques for rent to the tenant when the tenant provides a forwarding address in writing.</li>
            <li><strong>ARREARS.</strong> Late payment, returned or non-sufficient funds (N.S.F.) cheques are subject to
                an administrative fee of not more than $25.00 each, plus the amount of any service fees charged by a
                financial institution to the landlord. Although these fees are payable by the tenant to the landlord,
                failure to pay the rent on the due date is a breach of a material term of this Agreement. The obligation
                of the tenant under this Agreement and by law requires the rent to be paid on the date that it is due.
                For example, an excuse that the tenant does not have the rent money or will not have the rent money
                until a later date is not an acceptable excuse in law.</li>
            <li><strong>UTILITIES PAYMENT.</strong> Utilities that are not included in the rent or are not paid to the
                landlord are the responsibility of the tenant who must apply for hook up and must maintain current
                payment of the utility account. The discontinuation of utility service resulting from the tenant's
                cancellation or failure to maintain payment of his utility account is a breach of a material term of
                this Agreement. The landlord has the right to end the tenancy if the tenant fails to correct the breach
                within a reasonable time after receiving written notice to do so. Any utilities charges to be paid to
                the landlord that remain unpaid more than 30 days after the tenant receives a written demand for payment
                will be treated as unpaid rent and the landlord may issue a Notice to End Tenancy.</li>
            <li><strong>RENT INCREASES.</strong> Once a year the landlord may increase the rent for the existing tenant.
                The landlord may only increase the rent 12 months after the date that the existing rent was established
                with the tenant or 12 months after the date of the last legal rent increase for the tenant, even if
                there is a new landlord or a new tenant by way of an assignment. The landlord must use the approved
                Notice of Rent Increase form available from any Residential Tenancy Branch or ServiceBC Centre. The
                landlord must give the tenant 3 whole months notice, in writing, of a rent increase. For example, if the
                rent is due on the 1st of the month and the tenant is given notice any time in January, including
                January 1st, there must be 3 whole months before the increase begins. In this example, the months are
                February, March and April, so the increase would begin on May 1st. The landlord may increase the rent
                only in the amount set out by the Regulation. If the tenant thinks the rent increase is more than is
                allowed by the Regulation, the tenant may talk to the landlord or contact the Residential Tenancy office
                for assistance. Either the landlord or the tenant may obtain the percentage amount prescribed for a rent
                increase from the Residential Tenancy office.</li>
            <li><strong>ADDITIONAL OCCUPANTS.</strong> Only those persons listed in clauses 1 or 2 above may occupy the
                rental unit or residential property. A person not listed in 1 or 2 above who, without the landlord's
                prior written consent, resides in the rental unit or on the residential property in excess of fourteen
                cumulative days in a calendar year will be considered to be occupying the rental unit or residential
                property contrary to this Agreement. If the tenant anticipates an additional occupant, the tenant must
                apply in writing for approval from the landlord for such person to become an authorized occupant.
                Failure to obtain the landlord's written approval is a breach of a material term of this Agreement,
                giving the landlord the right to end the tenancy on proper notice.</li>
            <li><strong>USE OF RENTAL UNIT.</strong> The tenant and his guests must use the rental unit for private
                residential purposes only and not for any illegal, unlawful, commercial, political, or business
                purposes. No public meetings or assemblies may be held in the rental unit. No business or commercial
                advertising may be placed on or at the rental unit or the residential property. When the landlord
                supplies window coverings, the tenant's drapes and curtains may not be used without the landlord's prior
                written consent. The tenant will not make or cause any structural alteration to be made to the rental
                unit or residential property. Painting, papering, or decorating of the rental unit or residential
                property may be done only with the landlord's prior written consent and with landlord approved colours.
                Hooks, nails, tapes, or other devices for hang pictures or plants, or for affixing anything to the
                rental unit or residential property will be of a type approved by the landlord and used only with the
                landlord's prior written consent. The tenant may not install a washer, dryer, dishwasher, freezer, or
                similar equipment without the landlord's prior written consent. Any appliance or equipment supplied by
                the landlord must not be repaired or removed without the landlord's prior written consent. The tenant
                must ensure that the rental unit is appropriately ventilated, exhaust fans are regularly used, and must
                follow reasonable housekeeping practices, to minimize the presence or accumulation of moisture, thus
                preventing the occurrence of mould or mildew.</li>
            <li><strong>MOVING.</strong> The tenant's property must be moved in or out of the residential property
                through designated doors, at the risk of the tenant. The tenant will be liable for any costs of moving,
                including any costs resulting from injury, or from damage to the tenant's property, the residential
                property, or the rental unit. If the tenant requests and the landlord agrees to a move to a different
                rental unit within the residential property, the landlord may charge the tenant the greater of $15 or 3%
                of the rent in the tenant's current rental unit as a one-time moving fee.</li>
            <li><strong>ASSIGN OR SUBLET.</strong> The tenant may assign or sublet the rental unit to another person
                with the written consent of the landlord. If this tenancy agreement is for a fixed length of 6 months or
                more, the landlord must not unreasonably withhold consent. Under an assignment a new tenant must assume
                all of the rights and obligations under this tenancy agreement, at the same rent. The landlord must not
                charge a fee or receive a benefit, directly or indirectly, for giving this consent. If a landlord
                unreasonably withholds consent to assign or sublet or charges a fee, the tenant may apply for dispute
                resolution under the Act.</li>

            <li><strong>CONDUCT.</strong> In order to promote the safety, welfare, enjoyment, and comfort of other
                occupants and tenants of the residential property and the landlord, the tenant or the tenant's guests
                must not disturb, harass, or annoy another occupant of the residential property, the landlord, or a
                neighbour. In addition, noise or behaviour, which in the reasonable opinion of the landlord may disturb
                the comfort of any occupant of the residential property or other person, must not be made by the tenant
                or the tenant's guests, nor must any noise be repeated or persisted after a request to discontinue such
                noise or behaviour has been made by the landlord. The tenant or the tenant's guests must not cause or
                allow loud conversation or noise to disturb the quiet enjoyment of another occupant of the residential
                property or other person at any time, and in particular between the hours of 10:00 p.m. and 9:00 a.m. If
                any tenant or tenant's guest causes another tenant to vacate his rental unit because of such noise or
                other disturbance, harassment, or annoyance or because of illegal activity by the tenant or tenant's
                guest, the tenant must indemnify and save harmless the landlord for all costs, losses, damages, or
                expenses caused thereby. The landlord may end the tenancy pursuant to the Act as one of his remedies.
            </li>
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
                <p>Any term in this tenancy agreement that prohibits or restricts the size of a pet, or that governs the
                    tenant’s obligations regarding the keeping of a pet on the residential property is subject to the
                    rights and restrictions under the Guide Animal Act.</p>
            </li>
            <li><strong>OCCUPANTS AND INVITED GUESTS.</strong> The landlord must not stop the tenant from having guests
                under reasonable circumstances in the rental unit. The landlord must not impose restrictions on guests
                and must not require or accept any extra charge for daytime visits or overnight accommodation of guests.
                If the number of occupants in the rental unit is unreasonable, the landlord may discuss the issue with
                the tenant and may serve a notice to end a tenancy. Disputes regarding the notice may be resolved by
                applying for dispute resolution under the Act.</li>








            <li><strong>STORAGE.</strong> All property of the tenant kept on the residential property must be kept in
                safe condition in proper storage areas and is at the tenant's risk for loss, theft, or damage from
                any cause whatsoever. Hazardous or dangerous items must not be brought onto or kept on or in the
                residential property or rental unit. It is a material term of this Agreement that items stored
                inside the rental unit must be limited in type and quantity so as not to present a potential fire or
                health hazard, or to impede access to, egress from or normal movement within any area of the rental
                unit.
                <p><strong>VEHICLES.</strong>Only vehicles listed in the tenancy application and no other vehicles may be parked, but not stored, on the residential property. Vehicles must not leak fluids and must be in operating condition, currently licensed, and insured for on-road operation. Motor vehicle or other repairs must not be done in the rental unit or on the residential property.</p>
                <p><strong>BICYCLES.</strong> Bicycles are to be stored in designated areas only. They must not be kept, left, or stored on a balcony or in a hallway. They must not be moved through a lobby or hallway, or placed in an elevator.</p></li>
            <li><strong>LIQUID FILLED ITEMS.</strong> The tenant must not bring in to the rental unit or on the
                residential property any waterbed, aquarium, or other property that can be considered to be liquid
                filled, without the landlord's prior written consent. The landlord's consent will be subject to the
                tenant providing the landlord with written evidence that the tenant has in place tenant liability
                insurance with a minimum coverage of $1,000,000.</li>
            <li><strong>WASTE MANAGEMENT.</strong> Garbage, waste, boxes, papers, or recyclable materials must not be
                placed or left in hallways, a parking area, driveway, patio, or other common area of the residential
                property, except those areas designated for disposal. All garbage must be drained, bagged or
                wrapped, and tied securely before being placed in a chute or approved receptacle. Spillage must be
                cleaned up immediately by the person responsible. Any large item to be discarded, such as furniture,
                must not be abandoned or placed in garbage collection areas, but must be removed from the
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
            <li><strong>OUTSIDE.</strong> Rugs, mops, rags, and dusters must not be shaken out of windows, doors, or
                in common areas of the residential property. Nothing may be thrown from or placed on, hung on, or
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
                <p><strong>Tenant&rsquo;s obligations:</strong> The tenant must maintain reasonable health, cleanliness,
                    and sanitary standards throughout the rental unit and the residential property to which the tenant
                    has access. The tenant must take the necessary steps to repair damage to the residential property
                    caused by the actions or neglect of the tenant or a person permitted on the residential property by
                    that tenant. The tenant is not responsible for repairs for reasonable wear and tear to the
                    residential property. If the tenant does not comply with the above obligations within a reasonable
                    time, the landlord may discuss the matter with the tenant and may apply for dispute resolution under
                    the Act for the cost of repairs, serve a Notice to End Tenancy, or both.</p>
                <p><strong>Emergency Repairs:</strong> The landlord must post and maintain in a conspicuous place on the
                    residential property, or give to the tenant in writing, the name and telephone number of the
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
                    systems.</p> </li>
            <li><strong>HAZARDS.</strong> The tenant will immediately notify the landlord or landlord's contact
                person in the event of discovery of a fire, or the escape of water, gas or other substance starting
                from the rental unit or elsewhere on the residential property. The tenant will also warn any other
                persons on the residential property threatened by the hazard. The tenant must inform the landlord at
                the earliest opportunity of the presence of pests or vermin in the rental unit or on the residential
                property. Should pests or vermin be discovered, the tenant will cooperate with the landlord in
                treatment or eradication efforts.</li>
            <li><strong>APPLICATION OF THE RESIDENTIAL TENANCY ACT.</strong> The terms of this tenancy agreement and
                any changes or additions to the terms may not contradict or change any right or obligation under the
                Act or a regulation made under the Act, or any standard term. If a term of this tenancy agreement
                does contradict or change such a right, obligation, or standard term, the term of the tenancy
                agreement is void. Any change or addition to this tenancy agreement must be agreed to in writing and
                initialled by both the landlord and the tenant. If a change is not agreed to in writing, is not
                initialled by both the landlord and the tenant or is unconscionable, it is not enforceable. The
                requirement for agreement to change this tenancy Agreement does not apply to a rent increase given
                in accordance with the Act, a withdrawal of, or a restriction on, a service or facility in
                accordance with the Act, or a term in respect of which a landlord or tenant has obtained a Dispute
                Resolution Officer’s order that the agreement of the other is not required.</li>

            <li><strong>LANDLORD TO GIVE TENANCY AGREEMENT TO TENANT.</strong> The landlord must give the tenant acopy
                of this Agreement promptly, and in any event within 21 days of entering into this Agreement.</li>
            <li><strong>LOCKS.</strong> The landlord must not change locks or other means of access to the
                residential property unless the landlord provides each tenant with new keys or other means of access
                to the residential property. The landlord must not change locks or other means of access to a rental
                unit unless the tenant agrees and is given new keys. The tenant must not change locks or other means
                of access to common areas of the residential property, unless the landlord agrees in writing to the
                change, or to his rental unit, unless the landlord agrees in writing to, or a Dispute Resolution
                Officer has ordered, the change.
                <p>The door to the tenant's rental unit must be kept closed and in the tenant's absence locked. Subject
                    to the Act no lock or security device, such as a door chain or alarm system, may be installed or
                    changed or altered, and extra keys must not be made for any lock on the residential property or
                    rental unit, except with the prior written consent of the landlord. The entry to any part of the
                    residential property or rental unit by unauthorized possession of a key or otherwise by any person
                    is a breach of a material term of this Agreement. The tenant will be responsible for any cost
                    incurred to regain entrance to the residential property or rental unit including any damage and all
                    necessary repairs, in the event the tenant locks himself out of the residential property or rental
                    unit.</p> </li>
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
                    the tenant must give the key to the rental unit to the landlord.</p> </li>

            <li><strong>ENDING THE TENANCY.</strong> The tenant may end a monthly, weekly, or other periodic tenancy
                by giving the landlord at least one month’s written notice. A notice given the day before the rent
                is due in a given month ends the tenancy at the end of the following month. For example, if the
                tenant wants to move at the end of May, the tenant must make sure the landlord receives written
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
            <li><strong>FORM K, NOTICE OF TENANT&rsquo;S RESPONSIBILITIES.</strong>Where the rental unit is a strata
                lot, the tenant agrees to complete and sign Form K, Notice of Tenant's Responsibilities, prior to
                possession and will at all times during this tenancy comply with the provisions of the Strata
                Property Act as it affects him as a tenant and occupier of the strata lot. The tenant agrees to
                abide by the provisions of the bylaws and the rules and regulations of the Strata Corporation as
                adopted from time to time.</li>
            <li><strong>CONTRACTUAL.</strong> If more than one tenant signs this Agreement, each tenant's obligations
                are joint and several. If more than one landlord signs this Agreement, each landlord's obligations
                are joint and several. A breach of this Agreement by the tenant may give the landlord the right to
                end the tenancy in accordance with the Act and thus regain vacant possession of the rental unit. The
                singular of any word includes the plural, and vice versa. The use of any term is generally
                applicable to any gender and, where applicable, to a corporation. The word &quot;landlord&quot;
                includes the owner of the residential property and his authorized agent.</li>
            <li><strong>PERSONAL INFORMATION. </strong>The landlord agrees not to use or disclose any of the tenant's
                personal information contained in this Agreement without the tenant's prior written permission, unless
                the Personal Information Protection Act permits such use or disclosure.</li>
            <li><strong>AGENT NOT A STAKEHOLDER. </strong>The tenant agrees that if the person signing this Agreement as
                or on behalf of the landlord is an agent for the owner of the residential property, and such agent
                receives any money in connection with the tenancy, the agent is not a stakeholder, and the agent may
                release the money to the owner.</li>
            <li><strong>DISCLOSURE.</strong> The tenant acknowledges and agrees that the landlord or landlord's agent is
                not representing or acting on behalf of the tenant in this Agreement.</li>
            <li><strong>LIABILITY AND INSURANCE.</strong> The tenant will not do, or permit to be done, anything that
                may void the landlord's insurance covering the residential property or rental unit, or that may
                cause the landlord's insurance premiums to be increased. Unless the landlord is in breach of a
                lawful duty, the tenant releases the landlord from any liability in connection with the use by the
                tenant or tenant's guests of the rental unit or the residential property.
                <p>The tenant agrees to carry sufficient insurance to cover his property against loss or damage from any cause and for third party liability. The tenant agrees that the landlord will not be responsible for any loss or damage to the tenants property. The tenant will be responsible for any claim, expense, or damage resulting from the tenants failure to comply with any term of this Agreement and this responsibility will survive the ending of this Agreement.</p>
                <p>The tenant has a current tenants insurance policy <strong class="color-red">{{ $data->insurance }}</strong></p>
                @if (!empty($data->ins_policy))
                    @if (substr($data->ins_policy, -4) != '.pdf')
                        <div class="image-responsive">
                            <img src="{{ isset($data->ins_policy) ? asset('uploads/tenancy/'. $data->id . '/policy/' . $data->ins_policy) : '' }}" alt="policy" style="width: 100%">
                        </div>
                    @else
                        <a href="{{ url('/images/checks/') }}/{{ $data->ins_policy }}" class="color-red"><strong><u>View Policy</u></strong></a>
                    @endif
                @endif
            </li>
            <li>
                {{-- @foreach ($smoking as $value)
                {{ $value }}
                @endforeach --}}
                <p><img src="{{ public_path($smoking['0'] == '1' ? 'images/checks/check-mark.png' : 'images/checks/checkbox-unchecked.png') }}" style="width:16px; height:16px" /> No smoking of any combustible material is permitted on the residential property, including within the rental unit.</p>
                <p><img src="{{ public_path($smoking['1'] == '1' ? 'images/checks/check-mark.png' : 'images/checks/checkbox-unchecked.png') }}" style="width:16px; height:16px" /> Smoking of tobacco products only is limited to within the rental unit.</p>
                <p><img src="{{ public_path($smoking['2'] == '1' ? 'images/checks/check-mark.png' : 'images/checks/checkbox-unchecked.png') }}" style="width:16px; height:16px" /> Smoking of tobacco products only is limited to the area described as <strong class="color-red">{{ $smoking['3'] }}</strong></p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr style="background:#fff">
                        @if($data->initial_5)
                            <td>{!! pdfsign($data->initial_5, "Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_6)
                            <td>{!! pdfsign($data->initial_6, "Second Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_7)
                            <td>{!! pdfsign($data->initial_7, "Third Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_7)
                    </tr>
                    <tr style="background:#fff">
                        @endif
                        @if($data->initial_8)
                            <td>{!! pdfsign($data->initial_8, "Landlord's Agent's Initials") !!}</td>
                        @endif
                    </tr>
                </table>
            </li>
            @if($data->other_act_1)
            <li>
                <h4>OTHER.</h4>
                <p>{{ $data->other_act_1 }}</p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr style="background:#fff">
                        @if($data->initial_9)
                            <td>{!! pdfsign($data->initial_9, "Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_10)
                            <td>{!! pdfsign($data->initial_10, "Second Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_11)
                            <td>{!! pdfsign($data->initial_11, "Third Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_11)
                    </tr>
                    <tr style="background:#fff">
                        @endif
                        @if($data->initial_12)
                            <td>{!! pdfsign($data->initial_12, "Landlord's Agent's Initials") !!}</td>
                        @endif
                    </tr>
                </table>
            </li>
            @endif
            @if($data->other_act_2)
            <li>
                <h4>OTHER.</h4>
                <p>{{ $data->other_act_2 }}</p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr style="background:#fff">
                        @if($data->initial_13)
                            <td>{!! pdfsign($data->initial_13, "Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_14)
                            <td>{!! pdfsign($data->initial_14, "Second Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_15)
                            <td>{!! pdfsign($data->initial_15, "Third Tenants' Initials") !!}</td>
                        @endif
                        @if($data->initial_15)
                    </tr>
                    <tr style="background:#fff">
                        @endif
                        @if($data->initial_16)
                            <td>{!! pdfsign($data->initial_16, "Landlord's Agent's Initials") !!}</td>
                        @endif
                    </tr>
                </table>
            </li>
            @endif
        </ol>
    </div>
    <p>Landlord’s email address for service: <a href="mailto:info@forrentcentral.com">info@forrentcentral.com</a></p>
    <p>Tenant’s Email Address for service: {{ @$initial_29['email_for_service'] }}</p>
    <p><strong>NOTE: By signing and giving a copy of this form to the other party(s), you understand and agree:</strong></p>
    <ul style="list-style: disc !important;">
        <li>You can be given or served documents related to your tenancy at the email address you provide.</li>
        <li>You are aware that, depending on the type of document you are given or served, there may be legislated time
            frames within which you must act upon receiving a document. You should only agree to using email for service
            if you are able to monitor your email address on a regular basis.</li>
        <li>You must give the other party a copy of this form as soon as possible, and if your email address changes or
            you no longer want to be given or served documents at the email address you provided for that purpose, you
            must notify the other party, in writing, as soon as possible. Failure to do so may result in important
            documents not coming to your attention.</li>
    </ul>
    <p>This form does not have to be filed with the Residential Tenancy Branch. If you have any questions about your
        rights and responsibilities under the Residential Tenancy Act or the Manufactured Home Park Tenancy Act, contact
        the Residential Tenancy Branch by using the contact information below.</p>
    @if($initial_29['signature'])
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background:#fff">
            <td>{!! pdfsign($initial_29['signature'], "Tenant's Signature") !!}
                <p>Name: <strong>{{@$initial_29['fname']}}</strong></p>
                <p>Date: <strong>{{@$initial_29['date']}}</strong></p>
            </td>
        </tr>
    </table>
    @endif
    <h4>FOR MORE INFORMATION:</h4>
    <p>Residential Tenancy Branch Office of Housing and Construction Standards</p>
    <p><a href="https://www.gov.bc.ca/landlordtenant" target="_blank">www.gov.bc.ca/landlordtenant</a></p>
    <p><strong>Phone:</strong> 1-800-665-8779 (toll-free) <strong>Greater Vancouver:</strong> 604-660-1020 <strong>Victoria:</strong> 250-387-1602 </p>
    <p>ADDENDUMS ARE ATTACHED: <strong class="color-red">{{ @$data->addendum }}</strong></p>
    <p>A PET AGREEMENT IS ATTACHED: <strong class="color-red">{{ @$data->pet_agreement }}</strong></p>
    <p>THE PARTIES, INTENDING TO BE LEGALLY BOUND, AGREE TO THE TERMS AND CONDITIONS OF THIS AGREEMENT. THE TENANT HEREBY ACKNOWLEDGES HAVING READ AND RECEIVED A DUPLICATE COPY OF THIS AGREEMENT.</p>
    <p>Dated at: <strong class="color-red">{{ @$data->van_tenancy_date }}</strong></p>
    <p><strong>Agreed and signed by each adult TENANT</strong></p>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background:#fff">
            @if($initial_17)
                <td>
                    {!! pdfsign($initial_17['signature'], "Tenants' Initials") !!}
                    <p>First Name: <strong>{{@$initial_17['fname']}}</strong></p>
                    <p>Last Name: <strong>{{@$initial_17['lname']}}</strong></p>
                    <p>Date: <strong>{{@$initial_17['date']}}</strong></p>
                </td>
            @endif

            @if($initial_18)
                <td>
                    {!! pdfsign($initial_18['signature'], "Second Tenants' Initials") !!}
                    <p>First Name: <strong>{{@$initial_18['fname']}}</strong></p>
                    <p>Last Name: <strong>{{@$initial_18['lname']}}</strong></p>
                    <p>Date: <strong>{{@$initial_18['date']}}</strong></p>
                </td>
            @endif

            @if($initial_19)
                <td>
                    {!! pdfsign($initial_19['signature'], "Third Tenant's Signature") !!}
                    <p>First Name: <strong>{{@$initial_19['fname']}}</strong></p>
                    <p>Last Name: <strong>{{@$initial_19['lname']}}</strong></p>
                    <p>Date: <strong>{{@$initial_19['date']}}</strong></p>
                </td>
            @endif
            @if($initial_19)
        </tr>
        <tr style="background:#fff">
            @endif
            @if(isset($initial_20) && is_array($initial_20))
                <td>
                    {!! pdfsign($initial_20['signature'], "Agreed and signed by the LANDLORD'S AGENT") !!}
                    <p>Signing authority name: <strong>{{$initial_20['name']}}</strong></p>
                    <p>Date: <strong>{{$initial_20['date']}}</strong></p>
                </td>
            @endif
        </tr>
    </table>
    <p><strong>{{ appName() }} Real Estate Management</strong><br>B-2127 Granville Street,<br>Vancouver BC V6H 3E9</p>
    @if($form_k == true)
        <div class="breakNow"></div>
        <h3>Form K Notice of Tenant's Responsibilities<br><br><small>(Section 146)</small></h3>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <div>{{ @$form_k_notice['plan_num'] }}</div><small>To the Owners Strata Plan No:</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['lot_num'] }}</div><small>Re: Strata Lot Number:</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['civic'] }}</div><small>Civic Address of the Property:</small>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <h4>Tenant's Details</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <div>{{ @$form_k_notice['t1_fname'] }}</div><small>First Name</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t1_lname'] }}</div><small>Last Name</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t1_dl'] }}</div><small>Drivers License/Passport Number</small>
                </td>
            </tr>
            <tr>
                <td>
                    <div>{{ @$form_k_notice['t1_email'] }}</div><small>Email</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t1_phone_work'] }}</div><small>Work Ph #</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t1_phone_home'] }}</div><small>Home Ph #</small>
                </td>
            </tr>
            @if(isset($form_k_notice['t2_fname'], $form_k_notice['t2_email']) && !empty($form_k_notice['t2_fname']) &&
            !empty($form_k_notice['t2_email']))
            <tr>
                <td colspan="3">
                    <h4>Second Tenant's Details</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <div>{{ @$form_k_notice['t2_fname'] }}</div><small>First Name</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t2_lname'] }}</div><small>Last Name</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t2_dl'] }}</div><small>Drivers License/Passport Number</small>
                </td>
            </tr>
            <tr>
                <td>
                    <div>{{ @$form_k_notice['t2_email'] }}</div><small>Email</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t2_phone_work'] }}</div><small>Work Ph #</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t2_phone_home'] }}</div><small>Home Ph #</small>
                </td>
            </tr>
            @endif
            @if(isset($form_k_notice['t3_fname'], $form_k_notice['t3_email']) && !empty($form_k_notice['t3_fname']) &&
            !empty($form_k_notice['t3_email']))
            <tr>
                <td colspan="3">
                    <h4>Third Tenant's Details</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <div>{{ @$form_k_notice['t3_fname'] }}</div><small>First Name</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t3_lname'] }}</div><small>Last Name</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t3_dl'] }}</div><small>Drivers License/Passport Number</small>
                </td>
            </tr>
            <tr>
                <td>
                    <div>{{ @$form_k_notice['t3_email'] }}</div><small>Email</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t3_phone_work'] }}</div><small>Work Ph #</small>
                </td>
                <td>
                    <div>{{ @$form_k_notice['t3_phone_home'] }}</div><small>Home Ph #</small>
                </td>
            </tr>
            @endif
            <tr>
                <td colspan="3">
                    <div>{{ @$form_k_notice['tenancy_van_date'] }}</div><small>Tenancy commencing at VANCOUVER,
                        date:</small>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr style="background:#fff">
                @if($data->initial_27)
                <td>{!! pdfsign($data->initial_27, "Tenants' Signature") !!}</td>
                @endif

                @if($data->initial_28)
                <td>{!! pdfsign($data->initial_28, "Property Manager's Signature") !!}</td>
                @endif
            </tr>
        </table>
    @endif

    <h4>IMPORTANT NOTICE TO TENANTS:</h4>
    <p>1) Under the Strata Property Act, a tenant in a strata corporation must comply with the bylaws and rules of the strata corporation that are in force from time to time (current bylaws and rules attached).</p>
    <p>2) The current bylaws and rules may be changed by the strata corporation, and if they are changed, the tenant must comply with the changed bylaws and rules.</p>
    <p>3) If a tenant or occupant of the strata lot, or a person visiting the tenant or admitted by the tenant for any reason, contravenes a bylaw or rule, the tenant is responsible and may be subject to penalties, including fines, denial of access to recreational facilities, and if the strata corporation incurs costs for remedying a contravention, payment of those costs.</p>
    <p>Date: {{ date('d/m/Y', strtotime(@$data->created_at)) }}</p>
    <h5>NOTE TO LANDLORD: A VALID FORM “K” MUST BE ISSUED WITH EACH TENANT CHANGE</h5>
    <p>The address to which any notices to the registered owner of the strata lot shall be delivered is:</p>
    <p><strong>{{ appName() }} Real Estate Management</strong><br>B-2127 Granville Street,<br>Vancouver BC V6H 3E9<br>(<a href="mailto:info@forrentcentral.com">info@forrentcentral.com</a>)</p>
    <p>The personal information requested and subsequently provided in this document is for the purpose of communicating with tenants and owners, ensuring the orderly management of the Strata Corporation and complying with legal requirements.</p>
    <div class="breakNow"></div>
    <h3>TENANTS AUTHORIZATION FOR PRE-AUTHORIZED DEBITS FOR TENANCY PURPOSES</h3>
    <hr>
    <h5>Tenants Name and Address of Rental Property</h5>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><div>{{ isset($tenant_property['fname']) ? $tenant_property['fname'] : '' }}</div><small>First Name</small></td>
            <td><div>{{ isset($tenant_property['lname']) ? $tenant_property['lname'] : '' }}</div><small>Last Name</small></td>
            <td><div>{{ isset($tenant_property['address']) ? $tenant_property['address'] : '' }}</div><small>Address of Rental Property</small></td>
        </tr>
    </table>
    <h4>Charge</h4>
    <h5><u>One-time charge (initial payment):</u></h5>
    <table width="auto" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td>Security Deposit</td>
                <td>${{@$charges['security']}}</td>
            </tr>
            <tr>
                <td>Pet Damage Deposit</td>
                <td>${{@$charges['pet_damage']}}</td>
            </tr>
            <tr>
                <td>Rent or Prorated Rent</td>
                <td>${{@$charges['rent']}}</td>
            </tr>
            <tr>
                <td>Move-in Fee</td>
                <td>${{@$charges['move_in_fee']}}</td>
            </tr>
            <tr>
                <td><strong>Total initial charge</strong></td>
                <td><strong>${{@$charges['total']}}</strong></td>
            </tr>
            <tr>
                <td><strong>to be collected on:</strong></td>
                <td><strong>{{@$charges['collect_date']}}</strong></td>
            </tr>
        </tbody>
    </table>
    <p>Monthly Charge thereafter: <strong class="color-red">${{@$charges['monthly_charge_thereafter'] ?? '___________'}}</strong> per month starting <strong class="color-red">{{@$charges['thereafter_start_date'] ?? '___________'}}</strong> till end of lease.</p>
    <h4>I/We warrant and represent that the following information is accurate: </h4>
    <h5><u>Account Details</u></h5>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><div>{{ @$account_details['name'] }}</div><small>Name on Account</small></td>
            <td><div>{{ @$account_details['institute'] }}</div><small>Institute #</small></td>
            <td><div>{{ @$account_details['transit'] }}</div><small>Transit #</small></td>
            <td><div>{{ @$account_details['account'] }}</div><small>Account #</small></td>
        </tr>
    </table>
    <h4>BANK INFORMATION</h4>
    @if(!empty($data->voided_check))
        @if(substr($data->voided_check, -4) != '.pdf')
            <div class="image-responsive">
                <img src="{{ isset($data->ins_policy) ? asset('uploads/tenancy/'. $data->id . '/check/' . $data->voided_check) : '' }}" alt="policy" style="width: 700px; height: 200px;">
            </div>
        @else
            <a href="{{ asset('images/checks/' . $data->voided_check) }}">View Check</a>
        @endif
    @endif
    <p>Void cheque to be attached - The name on cheque must match name(s) of the tenant(s) on our records. If someone other than the tenant(s) is making the payment, please complete below information Or, If your account does not provide cheques, please include a document filled out by your bank to ensure the account is coded correctly and will allow for pre-authorized payment.</p>
    @if(!empty($other_account_holder['relation']) && !empty($other_account_holder['bank_add']) && !empty($other_account_holder['phone']))
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><div>{{ @$other_account_holder['relation'] }}</div><small>Relation to Tenant</small></td>
                <td><div>{{ @$other_account_holder['bank_add'] }}</div><small>Bank Address</small></td>
                <td><div>{{ @$other_account_holder['phone'] }}</div><small>Contact Phone Number</small></td>
            </tr>
        </table>
    @endif
    @if($data->initial_21)
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr style="background:#fff">
                <td>{!! pdfsign($data->initial_21, "Account Holder Signature") !!}</td>
            </tr>
        </table>
    @endif
    <div class="breakNow"></div>
    <h4>TERMS & CONDITIONS</h4>
    <ul>
        <li style="list-style: decimal !important;">I/We hereby authorize {{ appName() }} Real Estate Management on behalf of the owner of the rental property to deduct the following:
            <ul>
                <li style="list-style: disc!important;">Regular recurring monthly rent payments on the 1st of each month </li>
                <li style="list-style: disc!important;">Onetime payment for charges/debits arising under my/our Tenancy Agreement </li>
                <li style="list-style: disc!important;">{{ appName() }} Real Estate Management will obtain my/our authorization for any other one-time or sporadic debits including but not limited to; move in or move out fees, NSF & Late fees, Strata Fines and Rental Increases</li>
            </ul>
        </li>
        <li style="list-style: decimal !important;">I/We will inform {{ appName() }} Real Estate Management, in writing, of any change in the information provided in this section of the Authorization 10 days before the next due date of the PAD.</li>
        <li style="list-style: decimal !important;">This authority is to remain in effect until {{ appName() }} Real Estate Management has received written notification from me/us of its change or termination. This notification must be received at least ten (10) business days before the next debit is scheduled at the address provided below. I/We may obtain a sample cancellation form or more information on my/our right to cancel a PAD agreement at my/our financial institution or by visiting <a href="http://www.cdnpay.ca">www.cdnpay.ca</a></li>
        <li style="list-style: decimal !important;">{{ appName() }} Real Estate Management. may not assign this authorization, whether directly or indirectly, by operation of law, change of control or otherwise, without providing at least 10 days prior written notice to me/us.</li>
        <li style="list-style: decimal !important;">I/We have certain recourse rights if any debit does not comply with this agreement. For example, I have the right to receive reimbursement for any PAD that is not authorized or is not consistent with this PAD Agreement. To obtain a form for a reimbursement claim, or for more information on my/our recourse rights, I/We may contact my/our financial institution or visit <a href="http://www.cdnpay.ca">www.cdnpay.ca</a></li>
    </ul>

    <h4>AUTHORIZATION</h4>
    @if($initial_22['signature'])
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background:#fff">
            <td>
                {!! pdfsign($initial_22['signature'], "Authorized Signature") !!}
                <p>First Name: <strong>{{@$initial_22['fname']}}</strong></p>
                <p>Last Name: <strong>{{@$initial_22['lname']}}</strong></p>
                <p>Date: <strong>{{@$initial_22['date']}}</strong></p>
            </td>
        </tr>
    </table>
    @endif

    <div class="breakNow"></div>
    <h3>Addendum to the Residential Tenancy Agreement</h3>
    <hr>
    <p>Addendum dated on: <strong class="color-red">{{@$data->addendum_dated}}</strong></p>
    <h5>BETWEEN: Landlord {{ appName() }} Real Estate Management</h5>
    <h5>AND: Tenant(s)
        <strong class="color_red">
            {{ $tenants_data['t1_fname'] }} {{ $tenants_data['t1_lname'] }}
            @if($second_tenant_data), {{ @$tenants_data['t2_fname'] }} {{ @$tenants_data['t2_lname'] }} @endif
            @if($third_tenant_data), {{ @$tenants_data['t3_fname'] }} {{ @$tenants_data['t3_lname'] }} @endif
        </strong>
    </h5>
    <h4>WHEREAS:</h4>
    {{-- @php
    $address_parts = [
    $property_address['st'],
    $property_address['city'],
    $property_address['state'],
    $property_address['country'],
    $property_address['zip']
    ];
    $property_address = implode(', ', $address_parts);
    @endphp --}}
    @php
    $property_address = [
        'st' => '123 Main St',
        'city' => 'City Name',
        'state' => 'State Name',
        'country' => 'Country Name',
        'zip' => '12345'
    ];

    $address_parts = [];
    foreach ($property_address as $part) {
        $address_parts[] = $part;
    }
    $formatted_address = implode(', ', $address_parts);
    @endphp
    <p>A. The Landlord and Tenant entered into a Tenancy Agreement dated on <u class="color_red">{{ date('d/m/Y', strtotime(@$data->created_at)) }}</u> for the premises located at <u id="property_address_addendum" class="color_red">{{ htmlspecialchars(implode(', ', $property_address)) }}</u>. </p>
    <p>B. The Landlord and Tenant have agreed to amend the Tenancy Agreement in accordance with the terms of this Agreement.</p>
    <div class="ol" style="padding-left: 5px">
        <ol>
            <li>Tenants and occupants are not allowed to do short term rental with the property, all resulting fines from short term rental will be the responsibility of the tenant. This clause survives the expiry and termination of the tenancy agreement. </li>
            <li>Tenant (s) agree to have the units professionally cleaned with receipt provided and all the repairs caused by the tenant (s) to be repaired upon vacating the unit. The unit cleanliness and repaired state is upon approval by the property manager after the cleaning service. Failure to do so will result in a charge of $90/hr + GST for 2 cleaners plus a $100 administration fee. </li>
            <li>Tenant insurance of no less than $500,000 of Personal Liability must be purchased prior to the possession of the unit and proof of insurance or a copy of the insurance should be submitted to info@forrentcentral.com prior to key handover.</li>
            <li>Tenants and occupants are prohibit (a) smoking, growing, cultivating, propagating, or harvesting of cannabis (including medical cannabis), and (b) smoking, growing, cultivating, propagating, or harvesting of any hydroponic (water based) plant (including without limitation cannabis and medical cannabis).</li>
            <li>Tenant agrees that in the event of misplacing or losing the keys or other devices (garage FOB, etc) the tenant should pick up the keys from {{ appName() }} Real Estate Management office during business working hours (Monday to Friday, 10AM - 6PM). We do not guarantee we will be available outside of working hours. In this case the locksmith needs to be called. The tenant is responsible for the replacement or any related expenses such as re-keying the unit, ordering a new FOB, etc. Outside of business working hours the tenant may contact the office. If the tenant picks up the copy of the keys outside of business hours, {{ appName() }} Real Estate Management will charge a service fee of $100. We do not guarantee we will be available outside of working hours. In this case the locksmith needs to be called.</li>
        </ol>
    </div>
    <h4>All other terms of the original agreement remains the same.</h4>
    <br>
    <p>
        <img src="{{ asset('images/checks/check-mark.png') }}" style="width:16px; height:16px;margin-bottom: -3px;" /> By signing this agreement I acknowledge that I have read and understand &nbsp;
        <a href="{{ url('disclosure-for-residential-tenancies') }}" target="_blank" style="color:red;text-decoration: underline;">the disclosure for residential tenancies</a>.
    </p>
    <p>Agreed and signed by each adult TENANT</p>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="background:#fff">
            @if($initial_23)
            <td>
                {!! pdfsign($initial_23['signature'], "Tenants' Initials") !!}
                <p>First Name: <strong>{{@$initial_23['fname']}}</strong></p>
                <p>Last Name: <strong>{{@$initial_23['lname']}}</strong></p>
                <p>Date: <strong>{{@$initial_23['date']}}</strong></p>
            </td>
            @endif
            @if($initial_24)
            <td>{!! pdfsign($initial_24['signature'], "Second Tenants' Initials") !!}
                <p>First Name: <strong>{{@$initial_24['fname']}}</strong></p>
                <p>Last Name: <strong>{{@$initial_24['lname']}}</strong></p>
                <p>Date: <strong>{{@$initial_24['date']}}</strong></p>
            </td>
            @endif
            @if($initial_25)
            <td>{!! pdfsign($initial_25['signature'], "Third Tenants' Initials") !!}
                <p>First Name: <strong>{{@$initial_25['fname']}}</strong></p>
                <p>Last Name: <strong>{{@$initial_25['lname']}}</strong></p>
                <p>Date: <strong>{{@$initial_25['date']}}</strong></p>
            </td>
            @endif
            @if($initial_25)
        </tr>
        <tr style="background:#fff">
            @endif
            @if(is_array($initial_26))
            <td>{!! pdfsign($initial_26['signature'], "Landlord's Agent's Initials") !!}
                {{-- <p>Signing authority name: <strong>{{$initial_26['name']}}</strong></p> --}}

                <p>Date: <strong>{{$initial_26['date']}}</strong></p>
            </td>
            @endif
        </tr>
    </table>
    @if($data->agreement_notes)
    <p>Notes:<br> {{@$data->agreement_notes}}</p>
    @endif
</div>
<script type="text/php">
    if (isset($pdf)) {
        $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
        $size = 10;
        $font = $fontMetrics->getFont("Verdana");

        // Calculate position
        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
        $x = ($pdf->get_width() - $width) / 2;
        $y = $pdf->get_height() - 30;

        // Add page number
        $pdf->page_text($x, $y, $text, $font, $size, array(0, 0, 0));
    }
</script>
@endsection
