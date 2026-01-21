@extends('tenant::layouts.master')
{{-- @extends('frontend.layouts.app') --}}
@section('title', __('Tenancy Agreement Disclousure'))
@push('after-styles')
<style>
    .disclosure-box table tbody tr {
        background: transparent
    }

    @font-face {
        font-family: Kai;
        src: url('{{base_path().' /public/'}}css/wts11.ttf') format('truetype');
    }

    body {
        margin: 0cm 1cm 1.2cm 1cm;
        font-family: Arial, sans-serif;
        font-size: 13px !important;
        line-height: 18px
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        display: block
    }

    h3 {
        margin-top: 20px;
        color: #ec1f27;
        font-size: 22px
    }

    h4 {
        font-size: 18px
    }

    h4,
    h5 {
        color: #000
    }

    h5 {
        font-size: 16px
    }

    a,
    label {
        font-size: inherit
    }

    ol,
    ul {
        padding-left: 20px
    }

    .ol OL {
        counter-reset: item;
        padding-left: 0px
    }

    .ol LI {
        position: relative;
        line-height: 16px;
        display: block;
        margin: 7px 0;
        padding-left: 25px;
        text-align: justify;
    }

    .ol LI ol li {
        padding-left: 40px;
    }

    .ol LI:before {
        content: counters(item, ".") ". ";
        padding-right: 10px;
        left: 0;
        position: absolute;
        counter-increment: item;
        font-weight: 600;
        font-size: 13px
    }

    .no-ol li {
        position: static;
        margin: 0;
        padding-left: 0;
        text-align: justify;
    }

    ul.no-ol li:before {
        display: none
    }

    .no-ol.lease_terms {
        list-style: circle !important;
        list-style-position: inside !important
    }

    .no-ol.lease_terms LI {
        display: block !important
    }

    small {
        color: #999;
        font-size: 11px
    }

    table tbody tr td {
        color: #000;
        font-size: 14px;
        padding: 5px !important
    }

    table tbody tr:nth-child(2n+2) {
        background: rgba(0, 0, 0, .02)
    }

    table tbody tr {
        background: rgba(0, 0, 0, .04)
    }

    .signtyped {
        font-family: 'Beth Ellen', 'SimHei', sans-serif, cursive;
        font-weight: 500;
        font-size: 16px;
        letter-spacing: 1px;
        box-sizing: border-box;
        text-align: center
    }

    .sign-pad.signtyped,
    .sign-pad.signtyped img {
        width: 150px;
        height: 65px
    }

    .sign-pad.signtyped {
        margin: 10px 0;
        border: 0;
        padding: 0;
        color: #000aff;
    }

    .sign-pad.signtyped img {
        display: block;
        width: 150px;
        height: 65px;
    }

    .typedsign {
        text-align: left
    }

    .form-row-group-border {
        border: 1px dashed #666;
        padding: 20px
    }

    div.breakNow {
        page-break-inside: avoid;
        page-break-after: always
    }

    p {
        margin: 0 0 5px;
        text-align: justify;
    }

    .color-red {
        color: #e32124
    }

    @page {
        margin: 94px 0 0px 0;
    }

    header {
        position: fixed;
        top: -64px;
        left: 1cm;
        right: 1cm;
        height: 54px;
    }

    .pdf-heading {
        margin-bottom: 15px;
        text-align: center
    }
</style>
@endpush
@section('content')
<div class="panel-body">
    {{--
    <!--<div class="pdf-heading"><img src="{{ asset('images/Bolld-Tenancy-Agreement-header.png') }}" style="width:auto; height:22px"/></div>-->
    --}}
    @php
    if($data){
        $disclosure = json_decode(unserialize($data->disclosure), true);
    }
    @endphp
    <div class="disclosure-box">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="60%" style="vertical-align: top;">
                    <img src="{{ asset('images/bcfsa-logo.png') }}" style="margin-bottom:30px" width="350">
                    <p style="color: #1f8ec3;font-weight: bold;font-size: 55px;">Renting Residential Property:<br>What Tenants Need to Know</p>
                </td>
                <td style="background: #d2e8f6;padding: 20px;vertical-align: top;">
                    <div class="right-side-area">
                        <p><strong>BC Financial Services Authority</strong> is the legislated regulatory agency that works to ensure real estate professionals have the skills and knowledge to provide you with a high standard of service. All real estate professionals must follow rules that help protect consumers, like you. We’re here to help you understand your rights as a real estate consumer.</p>
                        <p><strong>Keep this information page for your reference</strong></p>
                    </div>
                </td>
            </tr>
        </table>

        <div style="height:3px;background:#eff6fc;margin-top:10px;margin-bottom: 20px;"></div>
        <p style="font-size: 30px;color: #000;">Real estate professionals have a regulatory requirement to present you with this consumer information before providing services to you.</p>
        <p style="font-size: 17px;color: #000;">This information from BC Financial Services Authority explains the role of a real estate professional when you are considering renting a property.</p>
        <p style="color: #1f8ec3;font-size: 18px;font-weight: bold;">The real estate professional who gave you this form represents the owner of this residential rental property.</p>
        <p style="font-size: 17px;color: #000;">While this real estate professional can provide some limited services to you as a prospective tenant of this rental property, they owe a duty of loyalty to the owner, and are working for the owner’s best interests.</p>
        <p style="color: #1f8ec3;font-size: 18px;font-weight: bold;">This form sets out what this real estate professional can and cannot do for you as a prospective tenant in relation to this rental property.</p>

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td style="vertical-align: top;">
                    <p style="color:#fc4a31; font-size:18px;font-weight:600">They cannot:</p>
                    <ul>
                        <li>give you advice on terms and conditions to include in a tenancy agreement</li>
                        <li>negotiate on your behalf</li>
                        <li>share any of the owner’s conﬁdential information with you</li>
                    </ul>
                </td>
                <td style="vertical-align: top;">
                    <p style="color:#5ec685; font-size:18px;font-weight:600">They can:</p>
                    <ul>
                        <li>share statistics and general information about the rental property market </li>
                        <li>provide you with standard forms and contracts such as a rental application and/or tenancy agreement</li>
                        <li>show the property</p>
                        <li>assist you to ﬁll out a tenancy agreement</li>
                        <li>communicate your messages and present your offers to their client</li>
                    </ul>
                </td>
            </tr>
        </table>
        <p>Because this real estate professional is working in the owner’s best interests, they have a duty to share important information with the owner if disclosed by you including, for example: your motivations, your ﬁnancial qualiﬁcations, and your preferred terms and conditions.</p>
        <p style="color:#1f8ec3; font-size:18px;font-weight:600">Find information about the rights and responsibilities of tenants and landlords from:</p>
        <ul>
            <li>BC Residential Tenancy Branch: gov.bc.ca/landlordtenant</li>
            <li>Tenant Resource & Advisory Centre: tenants.bc.ca</li>
        </ul>
        <p style="color:#000; font-size:18px;font-weight:600">As a prospective tenant you should consider seeking independent professional advice about renting property.</p>
        <img src="{{ asset('images/bcfsa-footer.png') }}" style="margin-top:100px" width="100%">
        <div class="breakNow"></div>
        <h2>Renting Residential Property: What Tenants Need to Know</h2>
        <hr>
        <h3>DISCLOSURE FOR RESIDENTIAL TENANCIES</h3>
        <p style="color:#000; font-size:18px;font-weight:600"><span style="color:#1f8ec3;">This is a required disclosure form in compliance with sections 54 and 55 of the Real Estate Services Rules.</span> The real estate professional must present the Renting Residential Property: What Tenants Need to Know information page to you along with this disclosure form.</p>
        <p style="color:#1f8ec3; font-size:28px;font-weight:600">REAL ESTATE PROFESSIONAL DISCLOSURE DETAILS</p>
        <h5>I disclose that I represent the owner of this rental property. I cannot represent you or act on your behalf.
        </h5>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="3">
                    <div>{{ $disclosure['name'] ?? 'N/A' }}</div>
                    <small>Name</small>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div>{{ $disclosure['team_member'] ?? 'N/A' }}</div>
                    <small>Team name and members. The duties of a real estate professional as outlined in this form apply to all team members.</small>
                </td>
            </tr>
            <tr>
                <td>
                    <div>{{ $disclosure['brokerage'] ?? 'N/A' }}</div>
                    <small>Brokerage</small>
                </td>
                <td>
                    <div>{{ $disclosure['signature'] ?? 'N/A' }}</div>
                    <small>Signature</small>
                </td>
                <td>
                    <div>{{ $disclosure['date'] ?? 'N/A' }}</div>
                    <small>Date</small>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>{{ $disclosure['property_name'] ?? 'N/A' }}</div>
                    <small>Rental property address</small>
                </td>
                <td>
                    <div>{{ $disclosure['agent_name'] ?? 'N/A' }}</div>
                    <small>Name of the agent</small>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div>{{ $disclosure['experience'] ?? 'N/A' }}</div>
                    <small>Notes</small>
                </td>
            </tr>
        </table>
        <h4>Consumer Acknowledgment <span style="background: #2695d2;padding: 10px;line-height: 27px;color: #fff;">This is NOT a contract</span></h4>
        <hr>
        <p>I acknowledge that I have received the <strong>Renting Residential Property: What Tenants Need to Know</strong> consumer information page and this disclosure form.</p>
        <p>I understand that the real estate professional named above is not representing me as a client or acting on my behalf in this transaction.</p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="2">
                    <div>{{ $disclosure['name2'] ?? 'N/A' }}</div>
                    <small>Name (optional)</small>
                </td>
                <td>
                    <div>{{ $disclosure['name3'] ?? 'N/A' }}</div>
                    <small>Name (optional)</small>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>{{ $disclosure['signature2'] ?? 'N/A' }}</div>
                    <small>Signature (optional)</small>
                </td>
                <td>
                    <div>{{ $disclosure['signature3'] ?? 'N/A' }}</div>
                    <small>Signature (optional)</small>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>{{ $disclosure['date2'] ?? 'N/A' }}</div>
                    <small>Date (optional)</small>
                </td>
                <td>
                    <div>{{ $disclosure['date3'] ?? 'N/A' }}</div>
                    <small>Date (optional)</small>
                </td>
            </tr>
        </table>

        <img src="{{ asset('images/bcfsa-footer-2.png') }}" style="margin-top:150px" width="100%">
    </div>
</div>
<script type="text/php">
    if (isset($pdf)) {
        $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
        $size = 10;
        $font = $fontMetrics->getFont("Verdana");
        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
        $x = ($pdf->get_width() - $width) / 2;
        $y = $pdf->get_height() - 30;
        $pdf->page_text($x, $y, $text, $font, $size, array(0,0,0));
    }
</script>
@endsection
