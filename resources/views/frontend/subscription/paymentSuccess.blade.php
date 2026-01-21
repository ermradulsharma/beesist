@extends('frontend.layouts.app')
@section('title', __('Subscription'))
@push('after-styles')
    <style>
        .radio-buttons {
            width: 100%;
            margin: 0 auto;
            text-align: center;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
            margin-bottom: 20px
        }

        .custom-radio input {
            display: none;
        }

        .radio-btn {
            margin: 0;
            width: 100%;
            border: 3px solid transparent;
            display: flex;
            border-radius: 10px;
            position: relative;
            box-shadow: 0 0 20px #c3c3c367;
            cursor: pointer;
            padding: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            background: #fff;
        }

        .radio-btn>i {
            color: #fecd0e;
            background-color: #000;
            font-size: 24px;
            position: absolute;
            top: -15px;
            border-radius: 50px;
            padding: 2px;
            transition: 0.5s;
            pointer-events: none;
            opacity: 0;
        }

        .radio-btn .hobbies-icon {
            display: flex;
            align-items: center;
            gap: 1em;
        }

        .radio-btn .hobbies-icon img {
            display: block;
            width: 60px;
            margin-bottom: 0;
            height: auto;
            border-radius: 50%;
        }

        .radio-btn .hobbies-icon h3 {
            color: #000;
            font-size: 18px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0;
        }

        .custom-radio input:checked+.radio-btn {
            border: 2px solid #FECD0E;
            background: #FECD0E;
            box-shadow: rgb(0, 0, 0) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 2px 3px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
        }

        .custom-radio input:checked+.radio-btn>i {
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }

        .btn-lg.btn-block {
            font-size: 20px;
            width: 100%;
        }

        .card {
            background-color: #ffffffd1;
        }

        main {
            background-image: url('{{ asset('images/Lake-Hollywood.jpg') }}');
            background-attachment: fixed;
        }

        .form-check .form-check-input {
            border: 2px solid #000;
        }

        .StripeElement {
            background-color: white;
            padding: 12px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endpush
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 py-5">
                <x-frontend.card>
                    <x-slot name="header">
                        <h3 class="text-center mb-0">@lang('Thanks for the Payment!')</h3>
                    </x-slot>

                    <x-slot name="body">
                        <div class="text-center my-4 brand-yellow" style="font-size:60px; color:#38c172"><i class="far fa-check-circle"></i></div>
                        <h4 class="text-center">Your Subscription has been successfully created.</h4>
                        <div class="inline-buttons d-flex flex-wrap mt-4 mb-5 justify-content-center">
                            @if (in_array($role, ['Property Manager', 'Property Owner', 'Agent', 'Tenant']))
                                <a href="{{ route(rolebased() . '.dashboard') }}" data-aos="fade-up" data-aos-duration="1000" class="btn btn-warning">Go To Dashboard</a>
                            @else
                                <a href="{{ route('admin.dashboard') }}" data-aos="fade-up" data-aos-duration="1000" class="btn btn-warning">Go To Dashboard</a>
                            @endif
                        </div>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection

@push('after-scripts')
    <script id="fbq-pilot">
        // fbq('track', 'Lead');
        // gtag('event', 'conversion', 'send_to': 'AW-10844007686/ZnTpCJ_etJMDEIba6bIo');
    </script>
@endpush
