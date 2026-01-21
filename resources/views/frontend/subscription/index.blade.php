@extends('frontend.layouts.app')
@section('title', __('Subscription'))
@push('after-styles')
<style>
    .tgl-sw-light+.btn-switch {
        background: #999;
    }

    .tgl-sw-light-checked+.btn-switch {
        background: #2893BE;
    }

    .full-feature {
        display: block;
        width: 100%;
    }

    .price-box {
        border-radius: 10px;
        padding-bottom: 100px;
    }

    .price-instruction {
        font-size: 1.2rem;
        margin: 15px auto;
    }

    #price-box-pm {
        display: none;
    }

    #pro-features .footer,
    #pm-features .footer {
        background-color: #fff;
        text-align: center;
    }

    #pro-features .header,
    #pm-features .header {
        color: #333;
        text-align: center;
        font-size: 3.5rem;
        margin-top: 20px;
        line-height: 3.5rem;
        padding: 0;
    }

    #pro-features .subheader,
    #pm-features .subheader {
        color: #333;
        text-align: center;
        font-size: 1.8rem;
        padding: 10px 0;
        font-weight: normal;
    }

    #pro-features .sublink,
    #pm-features .sublink {
        color: #333;
        text-align: center;
        font-size: 0.9rem;
    }

    #pro-features .mnf-text,
    #pm-features .mnf-text {
        display: inline-block;
        padding-top: 20px;
        padding-left: 20px;
    }

    #pro-features .mnf-icon,
    #pm-features .mnf-icon {
        display: inline-block;
    }

    #pro-features:target,
    #pm-features:target {
        visibility: visible;
        top: 100px;
    }

    .mnf-1 {
        grid-area: mnf-1;
    }

    .mnf-2 {
        grid-area: mnf-2;
    }

    .mnf-3 {
        grid-area: mnf-3;
    }

    .mnf-4 {
        grid-area: mnf-4;
    }

    .mnf-5 {
        grid-area: mnf-5;
    }

    .mnf-6 {
        grid-area: mnf-6;
    }

    .mrf-1 {
        grid-area: mrf-1;
    }

    .mrf-2 {
        grid-area: mrf-2;
    }

    .mrf-3 {
        grid-area: mrf-3;
    }

    .mrf-4 {
        grid-area: mrf-4;
    }

    .mrf-5 {
        grid-area: mrf-5;
    }

    .mrf-6 {
        grid-area: mrf-6;
    }

    .mrf-7 {
        grid-area: mrf-7;
    }

    .mrf-8 {
        grid-area: mrf-8;
    }

    .mrf-9 {
        grid-area: mrf-9;
    }

    .mrf-10 {
        grid-area: mrf-10;
    }

    .mrf-11 {
        grid-area: mrf-11;
    }

    .mrf-12 {
        grid-area: mrf-12;
    }

    .mrf-icon {
        grid-area: mrf-icon;
    }

    .mrf-text {
        grid-area: mrf-text;
    }

    .mnf-icon {
        grid-area: mnf-icon;
    }

    .mnf-text {
        grid-area: mnf-text;
    }

    .pricebox-1 {
        grid-area: pricebox-1;
    }

    .pricebox-2 {
        grid-area: pricebox-2;
    }

    .pricebox-3 {
        grid-area: pricebox-3;
    }

    .pricebox-4 {
        grid-area: pricebox-4;
    }

    .pricebox-5 {
        grid-area: pricebox-5;
    }

    #pm-features {
        display: none;
    }

    section.price-section {
        background-color: var(--bs-gray-200)
    }

    .ps-title-wrapper {
        background-color: var(--bs-gray-200)
    }

    @media (min-width: 200px) {
        .ps-monthly {
            width: 50px;
            display: inline-block;
            float: left;
            padding-top: 5px;
            color: #999;
        }

        .ps-toggle {
            width: 70px;
            margin: 0 5px 0 15px;
            display: inline-block;
            float: left;
        }

        .ps-annual {
            width: 60px;
            display: inline-block;
            float: left;
            padding-top: 5px;
            color: #5CB8F8;
        }

        .ps-message {
            padding-top: 0;
            display: block;
            width: 150px;
            padding-left: 40px;
            margin: 0 auto;
        }

        .ps-message img#save-lg {
            display: none;
        }

        .ps-message img#save-sm {
            width: 100%;
            display: inline-block;
        }

        .tgl-sw+.btn-switch {
            width: 4em;
        }

        .tgl-sw+.btn-switch:after,
        .tgl-sw+.btn-switch:before {
            width: 50%;
        }

        .tgl-sw-active+.btn-switch:after {
            left: 48%;
        }

        #pro-cost,
        #pm-cost {
            font-size: 5rem;
        }

        .cost-billed,
        .cost-save {
            font-size: 1rem;
            text-align: center;
        }

        .cost-save {
            margin-top: -28px;
            display: none;
        }

        ul.pricing-list {
            list-style: none;
            text-align: left;
            display: block;
            width: 330px;
            margin: 20px auto;
        }

        ul.pricing-list li {
            position: relative;
            padding: 7px 0 7px 15px;
        }

        ul.pricing-list li::before {
            content: "•";
            color: #333;
            font-weight: bold;
            display: inline-block;
            width: 0.1em;
            margin-left: -0.5em;
            font-size: 2rem;
            top: -4px;
            position: absolute;
        }

        #comparison-table {
            width: 100%;
            max-width: 832px;
            margin: 0 auto;
        }

        #comparison-table td,
        #comparison-table th {
            width: 33%;
        }

        .comparison-cta-word {
            display: none;
        }

        #comparison-cta-row {
            display: none;
        }

        #pro-cost,
        #pm-cost {
            font-size: 4rem;
        }

        .price-box {
            border-radius: 10px;
            padding-bottom: 0;
        }

        .pricing .header {
            text-align: center;
            padding: 10px;
            font-size: 2.2rem;
            font-weight: 600;
            color: #1571b1;
            line-height: 1.1rem;
            margin-top: 7px;
        }

        .pricing-ideal {
            padding-top: 10px;
            height: auto;
        }

        .pricing-trial-btn {
            padding: 4px 10px;
        }

        .pricing-wrapper {
            width: 100%;
            margin: 0 auto;
        }

        .pricing-switch-wrapper {
            height: 100px;
            position: relative;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .pricing-ideal span {
            display: block;
            font-weight: bold;
            width: 100%;
        }

        .price-wrapper {
            padding: 0;
        }

        .full-feature-mobile {
            display: block;
            width: 100%;
            padding: 0 0 20px 0;
        }

        .dollar-sign {
            font-size: 2rem;
            color: #999;
            display: inline-block;
            top: -21px;
            position: relative;
        }

        .ps-title-subtext {
            font-size: 1.3rem;
        }

        .plan-btn {
            width: 45%;
            border: 1px solid var(--bs-gray-200);
            height: 150px;
            float: left;
            text-align: center;
            padding-top: 25px;
            margin-right: -1px;
        }

        .plan-btn:hover {
            background-color: #efefef;
            cursor: pointer;
        }

        .plan-btn.active {
            background-color: var(--bs-warning);
            color: #fff;
            border: 1px solid var(--bs-warning);
        }

        .plan-btn.active:hover {
            background-color: var(--bs-warning);
            color: #fff;
        }

        .plan-btn .plan-title {
            font-size: 1.8rem;
            font-weight: 500;
        }

        .plan-btn .plan-sub {
            font-size: 1rem;
            line-height: 1.3rem;
        }

        .pricing-container {
            display: grid;
            grid-template: "pricebox-2""pricebox-3""pricebox-4""pricebox-1" /100%;
            row-gap: 1rem;
            padding: 30px 20px;
        }

        .toggle-wrapper {
            width: 220px;
            margin: 0 auto;
            height: 30px;
            position: relative;
            padding-left: 20px;
        }

        .price-more-units {
            display: none;
        }

        .plan-btn {
            width: 50%;
            height: 130px;
            padding: 10px 5px 0 5px;
        }

        .ps-title {
            padding-top: 20px;
        }

        .more-features {
            display: grid;
            grid-template: "mrf-1""mrf-2""mrf-3""mrf-4""mrf-5""mrf-6""mrf-7""mrf-8""mrf-9""mrf-10""mrf-11""mrf-12" /100%;
            row-gap: 0.5rem;
        }

        .more-features-item {
            background-color: #f9f9f9;
            border-radius: 4px;
            padding: 10px;
            line-height: 1rem;
            display: grid;
            grid-template: "mrf-icon mrf-text";
            grid-template-columns: 60px 1fr;
            align-items: center;
        }

        .more-features-item img {
            width: 40px;
        }

        .more-features-item.mrf-4 img,
        .more-features-item.mrf-6 img,
        .more-features-item.mrf-11 img {
            height: 40px;
        }

        .more-features-item .mrf-text {
            display: inline-block;
            box-sizing: border-box;
        }

        .btn-lg-text {
            font-size: 1.3rem;
        }

        .footer .pricing-trial-btn {
            padding: 10px 40px;
        }

        .main-features {
            display: grid;
            grid-template: "mnf-1""mnf-2""mnf-3""mnf-4""mnf-5""mnf-6" /1fr;
            margin-top: 20px;
        }

        .main-features-item {
            display: grid;
            grid-template: "mnf-icon mnf-text" /15% 85%;
        }

        #pro-features,
        #pm-features {
            padding: 25px;
        }

        #pro-features .mnf-text span:last-child,
        #pm-features .mnf-text span:last-child {
            width: 100%;
            padding-left: 10px;
        }

        #pro-features .mnf-icon,
        #pm-features .mnf-icon {
            position: relative;
            top: 30px;
        }

        #pro-features .mnf-icon img,
        #pm-features .mnf-icon img {
            width: 100%;
        }

        #pro-features .mnf-icon.icon-mobile img,
        #pm-features .mnf-icon.icon-mobile img {
            width: 75%;
            margin-left: 4px;
        }

        #pro-features .header,
        #pm-features .header {
            font-size: 2.5rem;
            line-height: 2.5rem;
            font-weight: normal;
        }

        #pro-features .subheader,
        #pm-features .subheader {
            font-size: 1.5rem;
            line-height: 1.7rem;
        }

        #pro-features .mnf-text h4,
        #pm-features .mnf-text h4 {
            font-weight: bold;
            display: block;
            padding-bottom: 10px;
            padding-left: 10px;
            font-size: 1.1rem;
        }

        #pro-features .mnf-text span,
        #pm-features .mnf-text span {
            font-weight: bold;
            display: block;
            padding-bottom: 10px;
            padding-left: 10px;
            font-size: 1rem;
        }

        #pro-features .mnf-text span:last-child,
        #pm-features .mnf-text span:last-child {
            font-weight: normal;
            font-size: 1rem;
        }

        .slider-wrapper {
            display: none;
        }
    }

    @media (min-width: 420px) {

        #pro-features .mnf-icon.icon-mobile img,
        #pm-features .mnf-icon.icon-mobile img {
            width: 75%;
            margin-left: 4px;
        }

        #comparison-cta-row {
            display: table-row;
        }
    }

    @media (min-width: 576px) {
        .pricing .header {
            padding: 20px;
            font-size: 2.4rem;
            font-weight: 500;
        }

        .pricing-ideal {
            padding-top: 20px;
            height: 100px;
        }

        .price-wrapper {
            padding: 0;
        }

        #pro-cost,
        #pm-cost {
            font-size: 5rem;
        }

        .pricing-trial-btn {
            padding: 10px 20px;
        }

        ul.pricing-list {
            display: block;
        }

        .full-feature {
            display: block;
        }

        .comparison-cta-word {
            display: inline-block;
        }

        .pricing-wrapper {
            width: 75%;
            margin: 0 auto;
        }

        .dollar-sign {
            font-size: 2rem;
            color: #999;
            display: inline-block;
            top: -31px;
            position: relative;
        }

        #pro-features .mnf-icon.icon-mobile,
        #pm-features .mnf-icon.icon-mobile {
            left: 0;
            top: 30px;
        }

        #pro-features .mnf-text span,
        #pm-features .mnf-text span {
            font-size: 1.1rem;
        }

        #pro-features .mnf-text span:last-child,
        #pm-features .mnf-text span:last-child {
            font-size: 0.95rem;
        }

        .main-features {
            display: grid;
            grid-template: "mnf-1""mnf-2""mnf-3""mnf-4""mnf-5""mnf-6" /1fr;
        }

        .main-features-item {
            display: grid;
            grid-template: "mnf-icon mnf-text" /10% 90%;
        }

        .ps-title {
            font-size: 2rem;
        }

        .ps-title-subtext {
            font-size: 1.3rem;
        }

        .more-features {
            display: grid;
            grid-template: "mrf-1 mrf-2""mrf-3 mrf-4""mrf-5 mrf-6""mrf-7 mrf-8""mrf-9 mrf-10""mrf-11 mrf-12" /49% 49%;
            row-gap: 1rem;
            column-gap: 1rem;
        }

        .full-feature-mobile {
            display: none;
        }
    }

    @media (min-width: 768px) {
        .main-features {
            grid-template: "mnf-1 mnf-2""mnf-3 mnf-4""mnf-5 mnf-6" /1fr 1fr;
            column-gap: 1rem;
        }

        #pro-features .mnf-text,
        #pm-features .mnf-text {
            width: 95%;
        }

        #pro-features .mnf-text span:last-child,
        #pm-features .mnf-text span:last-child {
            display: block;
        }

        .slider-wrapper {
            margin: 15px auto;
            display: block;
        }

        .slider-container {
            width: 70%;
            margin: 0 auto;
            display: inline-block;
        }

        .ps-title {
            font-size: 2.5rem;
        }

        .ps-title-subtext {
            font-size: 1.2rem;
        }



        .pricing-container {
            display: grid;
            grid-template: "pricebox-1 pricebox-2""pricebox-1 pricebox-5""pricebox-1 pricebox-3""pricebox-1 pricebox-4" /40% 60%;
            column-gap: 3rem;
        }

        .toggle-wrapper {
            margin: 0;
            padding-left: 0;
        }

        .plan-btn {
            width: 45%;
            height: 140px;
            padding: 30px 10px 0 10px;
        }

        .plan-btn .plan-title {
            font-size: 1.8rem;
            font-weight: 500;
        }

        .plan-btn .plan-sub {
            font-size: 0.9rem;
        }

        .ps-message {
            width: 100%;
            padding-left: 180px;
        }

        .ps-message img#save-sm {
            display: none;
        }

        .ps-message img#save-lg {
            display: inline-block;
            width: 120px;
            margin-top: -30px;
        }

        .price-more-units {
            width: 90%;
        }

        ul.pricing-list li::before {
            margin-left: -0.5em;
            top: -8px;
        }

        ul.pricing-list li {
            padding: 3px 0;
        }

        .price-more-units {
            display: block;
            width: 100%;
            text-align: center;
            clear: both;
            padding-top: 6px;
        }

        .pricebox-4 {
            margin-top: -10px;
        }
    }

    @media (min-width: 992px) {
        .slider-container {
            width: 75%;
        }

        .price-more-units {
            position: relative;
            height: 20px;
            width: 90%;
        }
    }
    .pricing-switch-wrapper {
        margin: 30px auto;
    }
    .pricing-trial-btn {
        color: #FFFFFF;
    }
</style>
<link rel="stylesheet" href="{{ asset('subscription/css/range-slider.css') }}">
<link rel="stylesheet" href="{{ asset('subscription/css/jquery.btnswitch.css') }}">
@endpush
@section('content')
<section class="ps-title-wrapper p-4">
    <h1 class="text-center ps-title">Pricing Calculator</h1>
    <div class="text-center pb-3 ps-title-subtext">Scale your plan to meet your rental management needs.</div>
</section>
<section class="p-4 price-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4 card px-0 price-box pricebox-1" id="price-box-pro">
                <div class="card-header text-center">
                    <h4 class="mb-0 p-2">For Rent Central Pro</h4>
                </div>
                <div class="card-body p-0 d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <p class="my-2 position-relative">
                            <span class="dollar-sign">$</span>
                            <span id="pro-cost">00</span> /mo
                        </p>
                        <div class="cost-save text-theme-green" style="display: block;">Save $<span id="pro-cost-save">00</span>, billed annually.</div>
                    </div>
                </div>
                <div class="text-center mt-3 font-weight-bold font18" style="min-height: 25px;"><p class="d-none">Everything in For Rent Central Pro, plus:</p></div>
                <ul class="pricing-list pro">
                    <li>Complete Accounting &amp; Reporting</li>
                    <li>Free Online Rent Payments</li>
                    <li>Unlimited Tenants &amp; Properties</li>
                    <li>Free Setup &amp; Onboarding</li>
                </ul>
                <div class="text-center">
                    <a href="/signup/?product=PRO" class="btn btn-sm btn-warning btn-capsule pricing-trial-btn">Start my two week free trial </a>
                </div>
                <div class="text-center py-4 full-feature">
                    <a href="#pro-features" id="pro-features-btn">See More Features Below </a>
                </div>
            </div>
            <div class="col-md-4 card px-0 price-box pricebox-1" id="price-box-pm">
                <div class="card-header text-center">
                    <h4 class="mb-0 p-2">For Rent Central PM</h4>
                </div>
                <div class="card-body p-0 d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <p class="my-2 price position-relative">
                            <span class="dollar-sign">$</span>
                            <span id="pm-cost">00</span> /mo
                        </p>
                        <div class="cost-save text-theme-green" style="display: block;">Save $<span id="pm-cost-save">300</span>, billed annually</div>
                    </div>
                </div>
                <div class="text-center mt-3 font-weight-bold font18" style="min-height: 25px;"><p>Everything in For Rent Central Pro, plus:</p></div>
                <ul class="pricing-list pm">
                    <li>Marketing and Maintenance Managers</li>
                    <li>Pay Owners via ACH</li>
                    <li>Trust Account Management &amp; Reporting</li>
                    <li>Free Setup &amp; Onboarding</li>
                </ul>
                <div class="text-center">
                    <a href="/signup/?product=PM" class="btn btn-sm btn-warning btn-capsule pricing-trial-btn">Start my two week free trial </a>
                </div>

                <div class="text-center py-4 full-feature">
                    <a href="#pro-features" id="pm-features-btn">See More Features Below</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="pricebox-2">
                    <div class="price-instruction">How many units do you manage?</div>
                    <input type="number" class="form-control" id="unitsInput" value="1" min="1" data-hj-whitelist="" style="width:225px;">
                </div>
                <div class="slider-wrapper pricebox-5">
                    <span style="font-size:1.4rem;color:#999;">1</span>
                    <div class="slider-container">
                        <input class="" type="range" id="rangeInput" value="10" step="1" min="1" max="9999" data-rangeslider="" oninput="unitsInput.value=rangeInput.value" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
                    </div>
                    <span style="font-size:1.4rem;color:#999;">9999+</span>
                </div>
                <div class="pricing-switch-wrapper pricebox-3">
                    <div class="price-instruction pb-2">Choose your billing cycle</div>
                    <div class="toggle-wrapper">
                        <div class="ps-monthly">Monthly</div>
                        <div class="ps-toggle">
                            <div id="toggleSwitch">
                                <div id="bsh-toggleSwitch">
                                    <input class="tgl-sw tgl-sw-light tgl-sw-light-checked tgl-sw-active"
                                        id="light-toggleSwitch" type="checkbox" checked="">
                                    <label class="btn-switch" for="light-toggleSwitch" id="sw-light-221121"
                                        data-state="true"></label>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                        <div class="ps-annual">Annual</div>
                    </div>
                    <div class="ps-message">
                        <img src="{{ asset('img/icons') }}/pricing-message.svg" id="save-sm" alt="save 10% on annual subscription">
                        <img src="{{ asset('img/icons') }}/pricing-message-2.svg" id="save-lg" alt="save 10% on annual subscription">
                    </div>
                </div>
                <div class="pricebox-4">
                    <div class="price-instruction">Choose your plan</div>
                    <div class="plan-btn active" id="proButton" data-price-box="price-box-pro" data-feature-box="pro-features" data-plan-state="pro">
                        <div class="plan-title">For Rent Central Pro</div>
                        <div class="plan-sub">For Landlords and Investors</div>
                    </div>
                    <div class="plan-btn" id="pmButton" data-price-box="price-box-pm" data-feature-box="pm-features" data-plan-state="pm">
                        <div class="plan-title">For Rent Central PM</div>
                        <div class="plan-sub">For Property Managers
                            <div style="font-size:.8rem;width:100%;position: relative;">(managing for owners)</div>
                        </div>
                    </div>
                    <div class="text-center price-more-units">
                        <a href="/contact">Contact us</a> for pricing above 2,500 units
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 bg-white shadow-sm feature-box-wrapper" id="pro-features">
                <h2 class="header">For Rent Central Pro Features</h2>
                <h3 class="subheader">Designed for landlords and investors who self-manage their own properties.</h3>
                <div class="sublink">What’s the difference between For Rent Central Pro and For Rent Central PM? <a href="#difference-pro-pm">See the feature comparison guide below.</a></div>
                <div class="main-features">
                    <div class="mnf-1 main-features-item">
                        <span class="mnf-icon icon-bank"><img src="{{ asset('img/icons')}}/icon-bank.svg" alt="bank property and tenant accounting icon"></span>
                        <span class="mnf-text">
                            <h4>Full Bank, Property, and Tenant Accounting</h4>
                            <span>Track your income and expenses and keep your records organized and accounts in order Generate reports and ledgers from streamlined accounting.</span>
                        </span>
                    </div>
                    <div class="mnf-2 main-features-item">
                        <span class="mnf-icon"><img src="{{ asset('img/icons')}}/icon-screening.svg" alt="tenant screening icon"></span>
                        <span class="mnf-text">
                            <h4>Tenant Screening</h4>
                            <span>Access instant background screening reports, like criminal records, credit reports, eviction history, income verification, and more.</span>
                        </span>
                    </div>
                    <div class="mnf-3 main-features-item">
                        <span class="mnf-icon icon-syndicate"><img src="{{ asset('img/icons')}}/icon-syndicate.svg" alt="market vacant properties icon"></span>
                        <span class="mnf-text">
                            <h4>Market Vacant Properties</h4>
                            <span>Create beautiful rental listings, that will be published online and syndicated to the top ten rental listing sites. Collect online applications and track prospects and leads.</span>
                        </span>
                    </div>
                    <div class="mnf-4 main-features-item">
                        <span class="mnf-icon"><img src="{{ asset('img/icons')}}/icon-pay-online.svg" alt="online rent payments icon"></span>
                        <span class="mnf-text">
                            <h4>Free Online Rent Payments</h4>
                            <span>Collect rent online with free ACH payments. Your tenants also have the option to pay via credit or debit card or with an electronic cash payment.</span>
                        </span>
                    </div>
                    <div class="mnf-5 main-features-item">
                        <span class="mnf-icon icon-mobile"><img src="{{ asset('img/icons')}}/icon-mobile-app.svg" alt="tenant portal mobile app icon"></span>
                        <span class="mnf-text">
                            <h4>Tenant Portal Mobile App</h4>
                            <span>Give your residents modern tools to pay their rent online, submit maintenance requests, purchase renters insurance with the Resident Connect by For Rent Central Direct mobile app.</span>
                        </span>
                    </div>
                    <div class="mnf-6 main-features-item">
                        <span class="mnf-icon"><img src="{{ asset('img/icons')}}/icon-workorder.svg" alt="workorders and maintenance tracking icon"></span>
                        <span class="mnf-text">
                            <h4>Workorders &amp; Maintenance Tracking</h4>
                            <span>Enter and track your own work orders and recurring maintenance, or allow tenants to place their own repair requests via your tenant portal.</span>
                        </span>
                    </div>
                </div>
                <h3 class="subheader mt-5 mb-4">More features included with your software</h3>
                <div class="more-features">
                    <div class="mrf-1 more-features-item">
                        <div class="mrf-img"><img src="{{ asset('img/icons')}}/icon-blue-support.svg"
                                alt="free training and unlimited support icon"></div>
                        <div class="mrf-text">Free Training &amp; Unlimited US-Based Customer Support</div>
                    </div>
                    <div class="mrf-2 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-payment.svg" alt="cash payment network icon">
                        <span>Cash Payment Network</span>
                    </div>
                    <div class="mrf-3 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-rent-ins.svg" alt="renters insurance icon">
                        <span>Renters Insurance</span>
                    </div>
                    <div class="mrf-4 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-mobile.svg" alt="mobile app icon">
                        <span>Mobile App</span>
                    </div>
                    <div class="mrf-5 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-online-rent-payment.svg"
                            alt="online rent payments icon">
                        <span>Free Online Rent Payments</span>
                    </div>
                    <div class="mrf-6 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-report.svg" alt="income expense reports icon">
                        <span>Customizable Income and Expense Reports</span>
                    </div>
                    <div class="mrf-7 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-id.svg" alt="online rental applications icon">
                        <span>Online Rental Applications</span>
                    </div>
                    <div class="mrf-8 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-desktop.svg" alt="tenant and owners portals icon">
                        <span>Tenant &amp; Owner Portals</span>
                    </div>
                    <div class="mrf-9 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-leaf.svg" alt="automated cam charges icon">
                        <span>Automated CAM Charges</span>
                    </div>
                    <div class="mrf-10 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-check.svg" alt="pay owners via ach icon">
                        <span>Pay Owners via ACH</span>
                    </div>
                    <div class="mrf-11 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-file.svg" alt="1099 efile icon">
                        <span>1099 E-File &amp; Schedule_E Tax Reports</span>
                    </div>
                    <div class="mrf-12 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-security-check.svg"
                            alt="tenant screening criminal history icon">
                        <span>Tenant Screening &amp; Criminal History</span>
                    </div>
                </div>
                <div class="footer pt-3">
                    <a href="/signup/?product=PRO" class="btn btn-sm btn-warning btn-capsule pricing-trial-btn"><span class="btn-lg-text">Get Started</span><br>two weeks free</a>
                </div>
            </div>
            <div class="col-12 bg-white shadow-sm feature-box-wrapper" id="pm-features">
                <h2 class="header">For Rent Central PM Features</h2>
                <h3 class="subheader">For property managers and agents who manage properties on behalf of owner clients.</h3>
                <div class="sublink">What’s the difference between For Rent Central Pro and For Rent Central PM? <a href="#difference-pro-pm">See the feature comparison guide below.</a></div>
                <div class="main-features">
                    <div class="mnf-1 main-features-item">
                        <span class="mnf-icon icon-bank"><img src="{{ asset('img/icons')}}/icon-bank.svg" alt="bank property tenant accounting icon"></span>
                        <span class="mnf-text">
                            <h4>Full Bank, Property, and Tenant Accounting</h4>
                            <span>Track your income and expenses, keeping your records organized and your accounts in order. Generate reports and ledgers through streamlined accounting.</span>
                        </span>
                    </div>
                    <div class="mnf-2 main-features-item">
                        <span class="mnf-icon"><img src="{{ asset('img/icons')}}/icon-screening.svg" alt="tenant screening icon"></span>
                        <span class="mnf-text">
                            <h4>Tenant Screening</h4>
                            <span>Access instant background screening reports, such as criminal records, credit reports, eviction history, income verification, and more.</span>
                        </span>
                    </div>
                    <div class="mnf-3 main-features-item">
                        <span class="mnf-icon icon-syndicate"><img src="{{ asset('img/icons')}}/icon-syndicate.svg" alt="market vacancies icon"></span>
                        <span class="mnf-text">
                            <h4>Market Vacant Properties</h4>
                            <span>Create beautiful rental listings that will be published online and syndicated to the top ten rental listing sites, while also collecting online applications and tracking prospects and leads.</span>
                        </span>
                    </div>
                    <div class="mnf-4 main-features-item">
                        <span class="mnf-icon"><img src="{{ asset('img/icons')}}/icon-pay-online.svg" alt="online rent payments icon"></span>
                        <span class="mnf-text">
                            <h4>Free Online Rent Payments</h4>
                            <span>Collect rent online with free ACH payments. Your tenants also have the option to pay via credit or debit card or with an electronic cash payment.</span>
                        </span>
                    </div>
                    <div class="mnf-5 main-features-item">
                        <span class="mnf-icon icon-mobile"><img src="{{ asset('img/icons')}}/icon-mobile-app.svg" alt="tenant portal mobile app icon"></span>
                        <span class="mnf-text">
                            <h4>Tenant Portal Mobile App</h4>
                            <span>Give your residents modern tools to pay their rent online, submit maintenance requests, purchase renters insurance with the Resident Connect by For Rent Central Direct mobile app.</span>
                        </span>
                    </div>
                    <div class="mnf-6 main-features-item">
                        <span class="mnf-icon"><img src="{{ asset('img/icons')}}/icon-workorder.svg" alt="workorders and maintenance icon"></span>
                        <span class="mnf-text">
                            <h4>Workorders &amp; Maintenance Tracking</h4>
                            <span>Enter and track your own work orders and recurring maintenance, or allow tenants to place their own repair requests via your tenant portal.</span>
                        </span>
                    </div>
                    <div class="mnf-7 main-features-item">
                        <span class="mnf-icon"><img src="{{ asset('img/icons')}}/icon-trust-mgmt.svg" alt="trust account management reporting icon"></span>
                        <span class="mnf-text">
                            <h4>Trust Account Management &amp; Reporting</h4>
                            <span>Manage your clients’ and tenants’ funds safely and securely with tools designed for Trust Accounting and Trust Account Management. For Rent Central Direct has been recognized as a Trust-Account compliant software by third-party reviewers.</span>
                        </span>
                    </div>
                    <div class="mnf-8 main-features-item">
                        <span class="mnf-icon icon-mobile"><img src="{{ asset('img/icons')}}/icon-owner-portal.svg" alt="owner portal mobile app icon"></span>
                        <span class="mnf-text">
                            <h4>Owner Portal Mobile App</h4>
                            <span>Give your owners a convenient way to stay connected with you through a designated portal to view property performance and details. Automate owner disbursements with online payments and share valuable reports.</span>
                        </span>
                    </div>
                </div>
                <h3 class="subheader mt-5 mb-4">More features included with your software</h3>
                <div class="more-features">
                    <div class="mrf-1 more-features-item">
                        <div class="mrf-img"><img src="{{ asset('img/icons')}}/icon-blue-support.svg" alt="free training and support icon"></div>
                        <div class="mrf-text">Free Training &amp; Unlimited US-Based Customer Support</div>
                    </div>
                    <div class="mrf-2 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-payment.svg" alt="cash payment network icon">
                        <span>Cash Payment Network</span>
                    </div>
                    <div class="mrf-3 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-rent-ins.svg" alt="renters insurance icon">
                        <span>Renters Insurance</span>
                    </div>
                    <div class="mrf-4 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-mobile.svg" alt="mobile app icon">
                        <span>Mobile App</span>
                    </div>
                    <div class="mrf-5 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-online-rent-payment.svg" alt="online rent payments icon">
                        <span>Free Online Rent Payments</span>
                    </div>
                    <div class="mrf-6 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-report.svg" alt="income and expense reports icon">
                        <span>Customizable Income and Expense Reports</span>
                    </div>
                    <div class="mrf-7 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-id.svg" alt="online rental applications icon">
                        <span>Online Rental Applications</span>
                    </div>
                    <div class="mrf-8 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-desktop.svg" alt="tenant owner portals icon">
                        <span>Tenant &amp; Owner Portals</span>
                    </div>
                    <div class="mrf-9 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-leaf.svg" alt="automated cam charges icon">
                        <span>Automated CAM Charges</span>
                    </div>
                    <div class="mrf-10 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-check.svg" alt="pay owners via ach icon">
                        <span>Pay Owners via ACH</span>
                    </div>
                    <div class="mrf-11 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-file.svg" alt="1099 file icon">
                        <span>1099 E-File &amp; Schedule_E Tax Reports</span>
                    </div>
                    <div class="mrf-12 more-features-item">
                        <img src="{{ asset('img/icons')}}/icon-blue-security-check.svg" alt="tenant sceenign criminal history icon">
                        <span>Tenant Screening &amp; Criminal History</span>
                    </div>
                </div>
                <div class="footer">
                    <a href="/signup/?product=PRO" class="btn btn-sm btn-warning btn-capsule pricing-trial-btn"><span class="btn-lg-text">Get Started</span><br> two weeks free</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="xcontent" style="display:none;"></div>
@endsection
@push('after-scripts')
<script src="{{ asset('subscription/js/pricing.min.js') }}"></script>
<script src="{{ asset('subscription/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('subscription/js/jquery.btnswitch.min.js') }}"></script>
<script src="{{ asset('subscription/js/range-slider.min.js') }}"></script>
<script>
    var selector = '[data-rangeSlider]';
    var elements = document.querySelectorAll(selector);
    $(document).ready(function() {
        $("#unitsInput").on("click", function() {
            $(this).select();
        });
    });

    if ($.isNumeric($.cookie("unitcount"))) {
        var units = parseInt($.cookie("unitcount"));
        var inputRange = document.getElementById('rangeInput');
        inputRange.value = units;
        var event = new Event('change');
        inputRange.dispatchEvent(event);
    } else {
        var units = 10;
    }

    var ts;
    if (typeof $.cookie("toggleswitch") !== 'undefined' && $.cookie("toggleswitch") !== '') {
        ts = $.cookie("toggleswitch");
    } else {
        ts = 'Annual';
    }

    if ($.cookie("planstate") === 'pm') {
        $('#proButton').removeClass('active');
        $('#pmButton').addClass('active');
        $('#price-box-pro').hide();
        $('#price-box-pm').show();
        $('#pro-features').hide();
        $('#pm-features').show();
    }

    $('#toggleSwitch').btnSwitch({
        Theme: 'Light',
        ToggleState: ts,
        OnValue: 'Annual',
        OnCallback: function(val) {
            let u = $('#unitsInput').val();
            show_price(u);
            $('.cost-billed, .cost-save').slideDown();
        },
        OffValue: 'Monthly',
        OffCallback: function(val) {
            let u = $('#unitsInput').val();
            show_price(u);
            $('.cost-billed, .cost-save').slideUp();
        }
    });

    if(ts == 'Annual'){
        $('.cost-save').show();
    }

    $('.plan-btn').on('click', function(){
        $('.plan-btn').removeClass('active');
        $(this).addClass('active');
        $('.price-box').hide();
        $('#' + $(this).data('price-box')).show();
        $('.feature-box-wrapper').hide();
        $('#' + $(this).data('feature-box')).show();
        $('#pm-features-btn').attr('href','#' + $(this).data('feature-box'));
        $.cookie("planstate", $(this).data('planState'), { expires : 90 });
    })

    function show_price(units) {
        var price = calc_price(units);
        var pro_cost = price[0];
        var pm_cost = price[1];
        if ($('#light-toggleSwitch').hasClass('tgl-sw-light-checked')) {
            $("#pro-cost").text(price[2]);
            $("#pm-cost").text(price[3]);
            $('#pro-cost-billed').text(price[4]);
            $('#pm-cost-billed').text(price[5]);
            $('#pro-cost-save').text(price[6]);
            $('#pm-cost-save').text(price[7]);
            var ts = 'Annual';
        } else {
            $("#pro-cost").text(pro_cost);
            $("#pm-cost").text(pm_cost);
            var ts = 'Monthly';
        }
        $.cookie("unitcount", units, { expires: 90 });
        $.cookie("toggleswitch", ts, { expires: 90 });
        $("#xcontent").load("/lib/rentec/pricing-count?count=" + units);
    }
	show_price(units);

    $('#unitsInput').on('keyup mouseup', function(e){
        if($(this).val() !== '') {
            let inputRange = document.getElementById('rangeInput');
            let value = $(this).val();
            const event = new Event('change', {
                bubbles: true
            });
            inputRange.value = value;
            inputRange.dispatchEvent(event);
            show_price(value);
        }
    })

    // Basic rangeSlider initialization
    rangeSlider.create(elements, {
        onInit: function () {
        },
        onSlideStart: function (value, percent, position) {
            //console.info('onSlideStart', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
        },
        onSlide: function (value, percent, position) {
            // console.log('onSlide', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
        },
        onSlideEnd: function (value, percent, position) {
            // console.warn('onSlideEnd', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            // console.log('slider')
            show_price(value);
        }
    });

</script>
@endpush
