@extends('frontend.layouts.app')
@section('title', __('Rental Application'))
@push('after-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <style>
        .pr-0 {
            padding-right: 0px !important;
        }

        .verifyEmail .card-header button {
            justify-content: flex-end;
            /* Align button to the end of the flex container */
            text-align: end;
            /* Align text within the button to the end */
            background: transparent;
            border: none;
            float: inline-end;
        }

        .listing-info-card {
            /* margin-top: 0px; */
            cursor: pointer;
            display: flex;
            width: 100%;
            min-height: 120px;
            border: 1px solid #E2E2E2;
            border-radius: 5px;
            padding: 12px;
            /* justify-content: space-between; */
            align-items: center;
        }

        .listing-info-card__property-info {
            display: flex;
        }

        .account-wall img {
            max-width: 180px;
            height: auto;
        }

        .details__building-name {
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0;
            color: #191919;
            margin-bottom: 7px
        }

        .property-info__details {
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 18px;
            color: #767676;
        }

        .property-info__image {
            height: 96px;
            width: 120px;
            -o-object-fit: cover;
            object-fit: cover;
            border-radius: 4px;
        }

        .property-info__details {
            min-height: 73px;
            margin: auto 0 11.5px 21px;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 18px;
            color: #767676;
        }

        .listing-info-card__lease-info {
            margin: auto 0 auto auto;
            text-align: right;
            letter-spacing: 0;
            line-height: 18px;
        }

        .lease-info__price {
            font-weight: bold;
        }

        .lease-info__price span {
            font-size: 12px;
            font-weight: normal;
            color: #767676;
        }

        .lease-info__date {
            font-size: 12px;
            font-weight: 600;
            color: #767676;
        }

        .site-chrome__content {
            padding-right: 100px;
        }

        .stepper .line {
            width: 1px;
            background-color: lightgrey !important;
        }

        .stepper .lead {
            font-size: 1.1rem;
        }

        .step-item {
            min-height: 60px
        }

        .step-item h5 {
            line-height: 30px !important;
            font-size: 16px;
            margin-bottom: 0px !important;
        }

        .step-item .rounded-circle {
            width: 28px;
            height: 28px;
            padding: 0 !important;
            text-align: center;
            line-height: 28px;
        }

        .step-item .rounded-circle {
            border: 1px solid #bbb;
            line-height: 26px;
        }

        .step-item.active .rounded-circle {
            background: #ed2323;
            border: 0px solid #ed2323;
            color: #fff;
        }

        .step-item.active h5 {
            color: #ed2323;
        }

        @media (min-width: 1200px) {
            .site-chrome__content {
                padding-right: 200px;
            }
        }

        @media only screen and (max-width: 768px) {
            .site-chrome__content {
                padding-right: 0px;
            }

            .listing-info-card {
                display: block;
                padding: 21px;
            }

            .listing-info-card__property-info {
                display: block;
            }

            .property-info__image {
                margin-bottom: 15px
            }

            .property-info__details {
                min-height: 73px;
                margin: auto 0 11.5px 0px;
            }

            .listing-info-card__lease-info {
                margin: auto 0 0 0;
                text-align: left;
            }
        }

        #side_panel {
            position: sticky;
            top: 80px;
            z-index: 99;
        }

        nav.navbar {
            position: sticky;
            top: 0px;
            z-index: 999;
        }

        .card-footer {
            position: sticky;
            bottom: 0px;
            z-index: 99;
            background: #eaeaea;
        }

        .application-index {
            padding: 0;
            list-style: none;
            font-size: 12px;
            font-weight: 500;
            color: #666;
        }

        .application-index li {
            line-height: 24px
        }

        .application-index li a {
            color: #666;
            text-decoration: none
        }

        .application-index li a.current {
            color: #000;
            font-weight: 500;
        }

        .app_section_content {
            min-height: 100px;
            border: 2px dashed #eee;
            margin: 20px 0;
            padding: 20px;
            border-radius: 10px
        }

        .form-control {
            padding: 0.375rem !important;
        }

        .form-check.form-check-border {
            border: 1px solid #ced4da;
            padding: 5px 5px;
            border-radius: 4px;
            position: relative;
            max-width: 100%;
            min-width: 100%;
        }

        .form-check.form-check-border label:after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        label.required {
            position: relative;
        }

        label.required:after {
            position: relative;
            content: '*';
            color: #ff3824;
            font-size: 18px
        }

        .media_preview {
            margin: 15px 0;
        }

        .media_preview img {
            margin: 7px;
            border-radius: 4px;
            object-fit: cover;
            width: 100px;
            height: 100px;
        }

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #ff3824;
            padding: 10px 20px;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #000;
        }

        .repeater-item {
            background: #fbfbfb;
            padding: 15px;
            border: 1px solid #efefef;
            border-radius: 10px;
            margin-bottom: 15px
        }

        .file-upload-box {
            border: 2px dashed #dfdfdf;
            padding: 20px;
            border-radius: 10px;
        }

        .parsley-errors-list {
            list-style: none;
            padding: 0;
            margin-bottom: 0;
        }

        .parsley-errors-list li {
            font-size: 12px;
            color: #ff3824;
        }

        .form-control.parsley-error,
        .form-check-border.parsley-error {
            border-color: #ff3824;
        }

        .tooltipsign {
            display: none;
            margin-top: 10px;
        }

        .signature_box {
            width: 258px;
            position: relative
        }

        /* .tooltipsign {
                    display: none;
                    margin-top: 10px
                } */
        .signature_box .panel {
            box-shadow: none !important;
            border: none !important
        }

        .signature_box .nav-tabs {
            border: none !important;
            padding-left: 0
        }

        .signature_box .panel .panel-body {
            height: 175px;
            margin-top: -1px;
            border: 1px solid #ddd;
            padding: 10px
        }

        .tab-content>.tab-pane {
            padding-top: 2px !important;
        }

        .tooltipsign .panel-body .tab-content .tab-pane div:nth-child(2) {
            width: 100% !important;
        }

        .btn.clear,
        .okbtn.btn {
            position: absolute;
            bottom: 15px;
            left: 17px
        }

        .signclick.btn.btn-primary {
            border-radius: 4px;
            box-shadow: none;
            margin: 0;
            padding: 5px 10px !important
        }

        .signature_box .panel-body::after {
            clear: none
        }

        .signtyped {
            font-family: Pacifico, cursive;
            font-size: 16px;
            letter-spacing: 1px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            line-height: 96px;
            text-align: center
        }

        .sign_type .signtyped {
            height: 0px !important;
            line-height: 64px !important;
        }

        .nav-tabs>li {
            margin: 0 !important
        }

        .nav-tabs>li:before {
            display: none !important
        }

        .btn.clear {
            right: 18px;
            left: auto
        }

        .btn.clear,
        .okbtn.btn {
            padding: 5px 15px;
            border-radius: 4px;
            background-color: #000 !important;
            border: 1px solid #000 !important
        }

        .sign-pad.signtyped {
            max-width: 236px
        }

        .sign-pad.signtyped.old_sign {
            line-height: unset;
            border: none;
            text-align: left
        }

        .sign-pad.signtyped.old_sign img {
            max-width: 75px
        }

        .nav-tabs>li>a {
            margin-right: 2px !important;
            border-radius: 4px 4px 0 0 !important;
            padding: 7px 15px !important;
            display: block !important;
            color: #000 !important;
        }

        .nav-tabs>li.active>a,
        .nav-tabs>li.active>a:focus,
        .nav-tabs>li.active>a:hover,
        .nav-tabs>li>a:focus,
        .nav-tabs>li>a:hover {
            background: #e32225 !important;
            border-color: #e32225 !important;
            color: #fff !important;
        }

        @media (max-width: 350px) {
            .signature_box {
                width: 220px;
                position: relative
            }

            .signature_box .panel .panel-body {
                padding: 5px
            }

            .signature_box .tooltipsign {
                margin-left: -15px;
                margin-right: -13px
            }

            .signature_box .signtyped img {
                width: 100%
            }

            .md-form-inline {
                display: block;
                margin: 10px 0 20px;
                padding: 0 !important
            }
        }

        .form-check-inline {
            margin-right: 0 !important;
        }

        .form-check .form-check-input {
            margin-left: 0 !important;
        }

        .form-check-label {
            margin-left: 1rem !important;
        }
    </style>
@endpush
@if (Route::currentRouteName() != 'rental_application.applicationForm')
    @push('after-styles')
        <style>
            .card-header .card-title,
            .card-header>.fa,
            .box-header>.glyphicon,
            .box-header>.ion {
                display: inline-block;
                font-size: 18px;
                margin: 0;
                line-height: 1;
            }

            .box-body {
                padding: 10px;
                border-radius: 0 0 3px 3px;
            }

            .h1,
            .h2,
            .h3,
            .h4,
            .h5,
            .h6,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: 'Source Sans Pro', sans-serif;
            }

            .h4,
            h4 {
                font-size: 18px;
            }

            .clearfix button {
                font-size: 0.8rem
            }

            .property-info__image {
                height: 96px;
                width: 120px;
                -o-object-fit: cover;
                object-fit: cover;
                border-radius: 4px;
            }

            .listing-info-card {
                cursor: pointer;
                display: flex;
                width: 100%;
                min-height: 120px;
                border: 1px solid #E2E2E2;
                border-radius: 5px;
                padding: 12px;
                justify-content: space-between;
                align-items: center;
            }

            .listing-info-card__property-info {
                display: flex;
                align-items: center;
            }

            .listing-info-card__lease-info {
                text-align: right;
                letter-spacing: 0;
                line-height: 18px;
            }

            .property-info__details {
                font-size: 13px;
                font-weight: 500;
                letter-spacing: 0;
                line-height: 18px;
                color: #999999;
                padding-left: 20px;
            }

            .details__building-name {
                font-size: 16px;
                font-weight: 600;
                letter-spacing: 0;
                color: #191919;
                margin-bottom: 7px;
            }

            .applicant-info p,
            .listing-info-card p {
                margin: 2px;
                line-height: 1.5;
                font-size: 13px;
                font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            }

            .applicant-info p strong,
            .listing-info-card p strong {
                display: inline-block;
                width: 200px;
                font-size: 14px;
                font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            }

            .app_section_content div.listing-info-card {
                display: block !important;
                min-height: auto !important;
            }

            .img-reference img {
                height: 100%;
                width: 100%;
                max-width: 306px;
            }

            .screening {
                text-align: center;
                padding: 20px;
                font-size: 14px;
                margin-bottom: 0;
            }
        </style>
    @endpush
@endif
@php
    $slug = $property->userEntity->userDetails->slug;
@endphp
@section('content')
    <section class="py-5" style="background-color: #f7f9fa;">
        <div class="container-fluid">
            <div class="row site-chrome__content">
                <div class="col-lg-3 col-md-3">
                    <div id="side_panel">
                        <h4><a class="text-dark text-decoration-none" href="{{ route('rental_application.rentalApplication') }}"><i class="fas fa-angle-left"></i>Rental application</a></h4>
                        <div class="stepper d-flex flex-column mt-4">
                            <div id="step1" class="d-flex mb-1 step-item active">
                                <div class="d-flex flex-column pr-2 align-items-center">
                                    <div class="rounded-circle mb-1" style="margin-right: 5px;">1</div>
                                    <div class="line h-100"></div>
                                </div>
                                <div>
                                    <h5 class="text-danger"> Your information</h5>
                                    <ul class="application-index" id="application_index">
                                        <li><a href="#applicant_information">Applicant information</a></li>
                                        <li><a href="#property_applying_for">Property Applying For</a></li>
                                        <li><a href="#property_information">Property information</a></li>
                                        <li><a href="#rental_history">Rental history</a></li>
                                        <li><a href="#employment">Employment</a></li>
                                        <li><a href="#references">References</a></li>
                                        <li><a href="#cosigners">Cosigners</a></li>
                                        <li><a href="#additional_occupants">Additional occupants</a></li>
                                        <li><a href="#pets">Pets</a></li>
                                        <li><a href="#vehicles">Vehicles</a></li>
                                        <li><a href="#terms_and_conditions">Terms and conditions</a></li>
                                        <li><a href="#financial_Suitability">Financial Suitability</a></li>
                                        <li><a href="#identification">Identification</a></li>
                                        <li><a href="#total_occupants">Total # of Occupants (including you)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="step2" class="d-flex mb-1 step-item">
                                <div class="d-flex flex-column pr-2 align-items-center">
                                    <div class="rounded-circle mb-1" style="margin-right: 5px;">2</div>
                                    <div class="line h-100"></div>
                                </div>
                                <div>
                                    <h5>Review Application</h5>
                                </div>
                            </div>
                            <div id="step3" class="d-flex mb-1 step-item">
                                <div class="d-flex flex-column pr-2 align-items-center">
                                    <div class="rounded-circle mb-1" style="margin-right: 5px;">3</div>
                                    <div class="line h-100 d-none"></div>
                                </div>
                                <div>
                                    <h5>Complete</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    @if (Route::currentRouteName() == 'rental_application.applicationForm' || Route::currentRouteName() == 'rental_application.resumeApply')
                        @include('rentalapplication::layouts._applicationForm')
                    @else
                        <div class="card" style="border: 1px solid #f0f0f0;border-radius: 10px;">
                            <form id="rental_application_apply" method="post" action="{{ route('rental_application.rentalApplicationComplete', ['id' => $rental_application->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @include('rentalapplication::layouts._applicationPreview')
                                <div class="card-footer text-right noprint text-end" data-html2canvas-ignore="true">
                                    <button type="submit" id="form_done" class="btn btn-dark">Done</button>
                                    <button type="button" id="form_print" class="btn btn-danger" onclick="pdf()">Print Application Confirmation</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @guest
        <x-modal.loginModal slug='{{ $property->userEntity->userDetails->slug }}' />
        <x-modal.registerModal slug='{{ $property->userEntity->userDetails->slug }}' />
    @endguest
@endsection
@if (Route::currentRouteName() == 'rental_application.applicationForm' || Route::currentRouteName() == 'rental_application.resumeApply')
    @push('after-scripts')
        <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/jquery.repeater.js') }}"></script>
        <script src="{{ asset('js/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('signdata/ss.js') }}"></script>
        <script src="{{ mix('js/supermask.js') }}"></script>
        <script src="{{ asset('js/autoCompleteAddress.js') }}"></script>
        {{-- Initialize All Datepicker --}}
        <script>
            $(document).ready(function() {
                var today = new Date();
                var maxDate = $.datepicker.formatDate('yy-mm-dd', today);

                // Initialize datepicker for desired_move_in_date
                $("#desired_move_in_date").attr("placeholder", 'yy-mm-dd').datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    minDate: today,
                    onSelect: function(selectedDate) {
                        $("#desired_move_in_date").datepicker("option", "minDate", selectedDate);
                    }
                });

                // Initialize datepicker for applicant_birth_date
                var today = new Date();
                var maxYear = today.getFullYear() - 10;
                var minYear = maxYear - 75;
                var maxDate = new Date(today.getFullYear() - 10, today.getMonth(), today.getDate()); // Today's date
                var minDate = new Date(today.getFullYear() - 75, today.getMonth(), today.getDate()); // 75 years ago from today
                $("#applicant_birth_date").attr("placeholder", 'yyyy-mm-dd').datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    maxDate: maxDate,
                    minDate: minDate,
                    yearRange: minYear + ":" + maxYear,
                    // onSelect: function(selectedDate) {
                    //     $("#applicant_birth_date").datepicker("option", "maxDate", selectedDate);
                    // }
                });

                // Initialize datepicker for rental_start_date
                $("#rental_start_date").attr("placeholder", 'yyyy-mm-dd').datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    onSelect: function(selectedDate) {
                        $("#rental_end_date").datepicker("option", "minDate", selectedDate);
                    }
                });

                // Initialize datepicker for rental_end_date
                $("#rental_end_date").attr("placeholder", 'yyyy-mm-dd').datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    onSelect: function(selectedDate) {
                        $("#rental_start_date").datepicker("option", "maxDate", selectedDate);
                    }
                });

                // Initialize datepicker for employment_start_date
                $("#employment_start_date").attr("placeholder", 'yyyy-mm-dd').datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    onSelect: function(selectedDate) {
                        $("#employment_end_date").datepicker("option", "minDate", selectedDate);
                    }
                });

                // Initialize datepicker for employment_end_date
                $("#employment_end_date").attr("placeholder", 'yyyy-mm-dd').datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    onSelect: function(selectedDate) {
                        $("#employment_start_date").datepicker("option", "maxDate", selectedDate);
                    }
                });
            });
        </script>
        <script>
            function togglePasswordVisibility(id) {
                var passwordInput;
                var icon;
                if (id == 'password_confirmation_1') {
                    var passwordInput = document.getElementById('password_confirmation');
                    var icon = document.getElementById('togglePasswordIcon_2');
                } else if (id == 'password_1') {
                    var passwordInput = document.getElementById('password_0');
                    var icon = document.getElementById('togglePasswordIcon_1');
                } else {
                    var passwordInput = document.getElementById('password');
                    var icon = document.getElementById('togglePasswordIcon');
                }
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            }
        </script>
        <script>
            var code;
            var isVerified = false;

            function sendCode(id) {
                var email = $('.rentalEmail').val();
                console.log('email', email);
                $('#emailError').text('')
                $('#verify').css('display', 'none');
                $('#loader').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('frontend.auth.verifyEmail') }}",
                    data: {
                        "email": email,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        code = response.code;
                        $('#verifiedOtp_parent').css('display', 'block');
                        $('#loader').css('display', 'none');
                    },
                    error: function(xhr, status, error) {
                        if (xhr.responseJSON.status == '422') {
                            $('#emailError').text(xhr.responseJSON.error)
                        } else if (xhr.responseJSON.status == '500') {
                            $('#emailError').text(xhr.responseJSON.error)
                        } else {
                            $('#emailError').text('Something went wrong')
                        }
                        $('#verify').css('display', 'block');
                        $('#loader').css('display', 'none');
                    },
                    complete: function() {
                        $('#submitButton').prop('disabled', false);
                    }
                });
            }

            function verifyCode(id) {
                $('#loader').css('display', 'block');
                $('#verifiedOtp').css('display', 'none');
                var otp = $('#otp').val();
                if (otp == code) {
                    $('#email').attr('readonly', true);
                    $('#verify').css('display', 'none');
                    $('#checkMark').css('display', 'block');
                    $('#verify').removeClass('btn-dark').addClass('btn-success').css('color', '#FFFFFF');
                    $('#verifiedOtp_parent').css('display', 'none');
                    $('#loader').css('display', 'none');
                    isVerified = true;
                } else {
                    $('#loader').css('display', 'none');
                    $('#verifiedOtp').css('display', 'block');
                    $('#codeError').text('Please Enter Correct OTP');
                }
            }

            $('#otp').on('keyup', function() {
                $('#codeError').text('');
            });

            var inputIds = ['#password_0', '#password_confirmation', '#email', '#first_name', '#last_name', '#company', '#phone', '#email_1', '#password'];
            var errorIds = ['#passwordError', '#confirmPasswordError', '#emailError', '#firstNameError', '#lastNameError', '#companyError', '#phoneError', '#errorMsg', '#errorMsg'];
            inputIds.forEach(function(inputId, index) {
                $(inputId).on('keyup', function() {
                    $(errorIds[index]).text('');
                });
            });

            // Check User Logged In Or Not

            var formAction;
            var formQueue = [];
            var isLoggedIn = false;
            $('button[value="save_resume_later"]').on('click', function(event) {
                $('.sppiner').removeClass('d-none');
                formAction = $(this).attr("formaction");
                event.preventDefault();
                var authUser = checkUserLogin();
                if (authUser == true) {
                    var formId = $(this).closest('form').attr('id');
                    var _token = "{{ csrf_token() }}";
                    submitForm(formId, _token);
                } else {
                    $('.sppiner').addClass('d-none');
                    $('#LoginModal').modal('show');
                    formQueue.push('rental_application_apply');
                }
            });

            function validateForm() {
                return $('#rental_application_apply').parsley().validate(); // True;
            }

            function checkUserLogin() {
                var authCheck = "{{ Auth::check() }}";
                if (authCheck == true) {
                    return true;
                } else {
                    return false;
                }
            }

            $('#loginForm').submit(function(event) {
                $('.sppiner').removeClass('d-none');
                event.preventDefault();
                var email = $('#email_1').val();
                var password = $('#password').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('frontend.auth.rentalApplicationLogin') }}",
                    data: {
                        "email": email,
                        "password": password,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.token) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': response.token
                                }
                            });
                        }
                        if (response.success) {
                            $('#LoginModal').modal('hide');
                            if (formQueue.length > 0) {
                                _token = response.token;
                                var formId = formQueue.shift();
                                submitForm(formId, _token);
                            } else {
                                submitForm('rental_application_apply', response.token);
                            }
                        } else {
                            $('#loginMessage').html('Invalid username or password.');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.sppiner').addClass('d-none');
                        console.error(xhr);
                        var errors = xhr.responseJSON.message;
                        if (xhr.status == 422) {
                            $('#errorMsg').text(errors);
                        } else if (xhr.status == '500') {
                            $('#errorMsg').text('Something went wrong')
                        } else {
                            $('#errorMsg').text('Something went wrong')
                        }
                    }
                })
            });

            function submitForm(formId, _token) {
                var formData = new FormData($('#' + formId)[0]);
                formData.append('_token', _token);
                $.ajax({
                    type: 'POST',
                    url: formAction,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.sppiner').addClass('d-none');
                        console.log('response', response);
                        if (response.success) {
                            switch (response.userRole) {
                                case 'Administrator':
                                    window.location.href = "{{ route('admin.dashboard') }}";
                                    break;
                                case 'Property Manager':
                                    if (response.subscription) {
                                        window.location.href = "{{ route('manager.dashboard') }}";
                                    } else {
                                        window.location.href = "{{ route('frontend.price') }}";
                                    }
                                    break;
                                case 'Agent':
                                    window.location.href = "{{ route('agent.dashboard') }}";
                                    break;
                                case 'Property Owner':
                                    window.location.href = "{{ route('owner.dashboard') }}";
                                    break;
                                default:
                                    window.location.href = "{{ route('frontend.user.dashboard') }}";
                                    break;
                            }
                            toastAlert('success', 'Application Submitted Successfully');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.sppiner').addClass('d-none');
                        console.error(xhr);
                    }
                });
            }

            $('#registerForm').submit(function(event) {
                $('.sppiner').removeClass('d-none');
                event.preventDefault();
                if (isVerified == true) {
                    var formData = $(this).serialize();
                    formData += '&roles[]=Tenant';
                    formData += '&isVerified=' + isVerified;
                    formData += '&prop_id=' + $('#prop_id').val();
                    $.ajax({
                        url: "{{ route('frontend.auth.rentalApplicationRegister') }}",
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            $('#RegisterModal').modal('hide');
                            if (response.token) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': response.token
                                    }
                                });
                            }
                            if (response.success) {
                                $('#LoginModal').modal('hide');
                                if (formQueue.length > 0) {
                                    _token = response.token;
                                    var formId = formQueue.shift();
                                    submitForm(formId, _token);
                                } else {
                                    submitForm('rental_application_apply', response.token);
                                }
                            }
                            // $('#verifyEmailModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.log('xhr', xhr);
                            if (xhr.responseJSON.status == '422') {
                                var errors = xhr.responseJSON.error;
                                if (errors) {
                                    $('#firstNameError').text(errors.first_name ? errors.first_name[0] : '');
                                    $('#lastNameError').text(errors.last_name ? errors.last_name[0] : '');
                                    $('#emailError').text(errors.email ? errors.email[0] : '');
                                    $('#phoneError').text(errors.phone ? errors.phone[0] : '');
                                    $('#passwordError').text(errors.password ? errors.password[0] : '');
                                    $('#termsError').text(errors.terms ? errors.terms[0] : '');
                                    $('#captchaError').text(errors.captcha ? errors.captcha[0] : '');
                                    if (errors.password_confirmation) {
                                        $('#confirmPasswordError').text(errors.password_confirmation[0]);
                                    }
                                }
                            } else if (xhr.responseJSON.status == '500') {
                                $('#errorMessage').text(xhr.responseJSON.error)
                            } else {
                                $('#errorMessage').text('Something went wrong')
                            }
                            $('#submitButton').prop('disabled', false);
                        },
                        complete: function() {
                            $('#submitButton').prop('disabled', false);
                        }
                    });
                } else {
                    $('.sppiner').addClass('d-none');
                    $('#errorMessage').text('Please Verify Mail')
                    $('#submitButton').prop('disabled', false);
                    return false;
                }
            });

            function applicationLoginPopup() {
                $("#LoginModal").modal('hide');
                $("#RegisterModal").modal('show');
            }

            function gotoLoginPopup() {
                $("#RegisterModal").modal('hide');
                $("#LoginModal").modal('show');
            }
        </script>
        <script>
            function applyFor() {
                var url = $('#property_applying_for').find(':selected').data('url');
                if (url) {
                    window.location = url;
                }
                return false;
            }
        </script>

        {{-- Send Rental Application with Registraion on For Rent Central Property Management App --}}
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });
                $('button[value="submit_application"]').click(function(event) {
                    $('.sppiner').removeClass('d-none');
                    var formId = $(this).closest('form').attr('id');
                    var formAction = $(this).attr("formaction"); // Declare formAction with var
                    event.preventDefault();
                    if ($('#rental_application_apply').parsley().validate()) {
                        var formData = new FormData($('#' + formId)[0]);
                        $.ajax({
                            type: 'POST',
                            url: formAction,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                console.log('response', response);
                                if (response.success == true) {
                                    window.location.href = "{{ route('rental_application.rentalApplication') }}";
                                    toastAlert('success', 'Application Submitted Successfully');
                                }
                                $('.sppiner').addClass('d-none');
                            },
                            error: function(xhr, status, error) {
                                toastAlert('error', 'Something went to wrong');
                                console.error(xhr.responseText);
                                $('.sppiner').addClass('d-none');
                            }
                        });
                    } else {
                        return false;
                        $('.sppiner').addClass('d-none');
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });
                $(window).keydown(function(event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
                $('button[value="review_application"]').click(function(event) {
                    $('.sppiner').removeClass('d-none');
                    event.preventDefault();
                    var action = $(this).attr("formaction");
                    var $form = $('#rental_application_apply');
                    if ($form.parsley().validate()) {
                        var formData = new FormData($form[0]);
                        sessionStorage.setItem('form_data', JSON.stringify(formData));
                        $.ajax({
                            type: "POST",
                            url: action,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(result) {
                                $("#form_wrapper, #review_application, .stepper #step1 #application_index").hide();
                                $(".stepper #step2").addClass('active');
                                $("#submit_application").show();
                                $("#edit_application").show();
                                $("#form_preview_wrapper").html(result.preview);
                                $('.sppiner').addClass('d-none');
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                $('.sppiner').addClass('d-none');
                            }
                        });
                    } else {
                        $('.sppiner').addClass('d-none');
                        return false;
                    }
                });
                $('button[value="edit_application"]').click(function(event) {
                    $('.sppiner').removeClass('d-none');
                    event.preventDefault();
                    var formDataString = sessionStorage.getItem('form_data');
                    if (formDataString) {
                        var formData = JSON.parse(formDataString);
                        $.each(formData, function(index, field) {
                            $('[name="' + field.name + '"]').val(field.value);
                        });
                        $("#form_wrapper, #review_application, .stepper #step2").show();
                        $(".stepper #step1 #application_index").hide();
                        $("#submit_application").hide();
                        $("#edit_application").hide();
                        $("#form_preview_wrapper").empty(); // Clear any preview data
                        $('.sppiner').addClass('d-none');
                    } else {
                        console.error("Form data not found in sessionStorage.");
                        $('.sppiner').addClass('d-none');
                    }
                });
            });

            $(function() {
                $('#rental_application_apply').parsley().on('field:validated', function() {
                    var ok = $('.parsley-error').length === 0;
                    $('.bs-callout-info').toggleClass('hidden', !ok);
                    $('.bs-callout-warning').toggleClass('hidden', ok);
                })
            });

            $(document.body).on('click', 'textarea', function() {
                $('textarea').keypress(function() {
                    console.log($(this).data('max_length'));
                    if (this.value.length > $(this).data('max_length')) {
                        return false;
                    }
                    // remaing_chars
                    $(this).parent().find('.remaing_chars').html("Remaining characters : " + ($(this).data('max_length') - this.value.length));
                });
            });

            $(document.body).on('click', 'textarea, input', function() {
                $("input").change(function() {
                    $("form").find('button[type="submit"]').removeAttr("disabled")
                });
            });

            // CODE FOR SCROLLING
            $('ul#application_index a').bind('click', function(event) {
                $('ul#application_index a').removeClass("current");
                $(this).addClass("current");
                var $anchor = $(this);
                var header = $('nav.navbar').height();
                $('html, body').stop().animate({
                    scrollTop: ($($anchor.attr('href')).offset().top - (header + 10))
                }, 500, 'easeInOutExpo');
                event.preventDefault();
            });

            $('.app_section_content').waypoint({
                offset: '0%',
                element: $(this),
                handler: function(direction) {
                    var wayID = $(this.element).attr('id');
                    $('.current').removeClass('current');
                    $("#application_index a[href='#" + wayID + "']").addClass('current');
                }
            });

            function filePreview(input) {
                if (input.files && input.files[0]) {
                    $(input).parent().find('.media_preview').html('');
                    [...input.files].map(file => {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            if (e.target.result.indexOf('application/pdf') > -1) {
                                $(input).parent().find('.error-message').addClass('text-danger');
                            } else {
                                $(input).parent().find('.error-message').removeClass('text-danger');
                                $(input).parent().find('.media_preview').append('<img src="' + e.target.result + '" width="150" height="150" style="object-fit:cover"/>');
                            }
                        };
                        reader.readAsDataURL(file);
                    });
                }
            }

            var $rental_history = $('.repeater-rental_history').repeater({
                initEmpty: false,
                isFirstItemUndeletable: true,
                initval: 1,
                show: function() {
                    var repeaterItems = $(this).parent().find('div[data-repeater-item]');
                    var max_limit = repeaterItems.data('max_limit');
                    if (repeaterItems.length >= max_limit) {
                        $(this).parent().parent().find('span[data-repeater-create]').hide();
                    }
                    if (repeaterItems.length > max_limit) {
                        return false;
                    }
                    $(this).slideDown();
                    $(this).attr('data-index', repeaterItems.length - 1);
                    $(this).find('.repeaterItemNumber').html(repeaterItems.length);
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    $(this).parent().parent().find('span[data-repeater-create]').show();
                },
            });

            @php
                $rental_history_data = json_decode(json_encode($rental_application->rental_history));
            @endphp
            @if ($rental_history_data)
                $rental_history.setList(
                    {!! @$rental_history_data !!}
                );
            @endif

            var $employment = $('.repeater-employment').repeater({
                initEmpty: false,
                isFirstItemUndeletable: true,
                initval: 1,
                show: function() {
                    var repeaterItems = $(this).parent().find('div[data-repeater-item]');
                    var max_limit = repeaterItems.data('max_limit');
                    if (repeaterItems.length >= max_limit) {
                        $(this).parent().parent().find('span[data-repeater-create]').hide();
                    }
                    if (repeaterItems.length > max_limit) {
                        return false;
                    }
                    $(this).slideDown();
                    $(this).attr('data-index', repeaterItems.length - 1);
                    $(this).find('.repeaterItemNumber').html(repeaterItems.length);
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    $(this).parent().parent().find('span[data-repeater-create]').show();
                },
            });

            @php
                $employment_data = json_decode(json_encode($rental_application->employment));
            @endphp
            @if ($employment_data)
                $employment.setList(
                    {!! @$employment_data !!}
                );
            @endif

            var $references = $('.repeater-references').repeater({
                initEmpty: false,
                isFirstItemUndeletable: true,
                initval: 1,
                show: function() {
                    var repeaterItems = $(this).parent().find('div[data-repeater-item]');
                    var max_limit = repeaterItems.data('max_limit');
                    if (repeaterItems.length >= max_limit) {
                        $(this).parent().parent().find('span[data-repeater-create]').hide();
                    }
                    if (repeaterItems.length > max_limit) {
                        return false;
                    }
                    $(this).slideDown();
                    $(this).attr('data-index', repeaterItems.length - 1);
                    $(this).find('.repeaterItemNumber').html(repeaterItems.length);
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    $(this).parent().parent().find('span[data-repeater-create]').show();
                },
            });

            @php
                $references_data = json_decode(json_encode($rental_application->references));
            @endphp
            @if ($references_data)
                $references.setList(
                    {!! @$references_data !!}
                );
            @endif

            var $cosigners = $('.repeater-cosigners').repeater({
                initEmpty: true,
                isFirstItemUndeletable: false,
                initval: 1,
                show: function() {
                    var repeaterItems = $(this).parent().find('div[data-repeater-item]');
                    var max_limit = repeaterItems.data('max_limit');
                    if (repeaterItems.length >= max_limit) {
                        $(this).parent().parent().find('span[data-repeater-create]').hide();
                    }
                    if (repeaterItems.length > max_limit) {
                        return false;
                    }
                    $(this).slideDown();
                    $(this).attr('data-index', repeaterItems.length - 1);
                    if (repeaterItems.length > 1) {
                        $(this).find('.repeaterItemNumber').html('Cosigners ' + repeaterItems.length);
                    }
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    $(this).parent().parent().find('span[data-repeater-create]').show();
                },
            });

            @php
                $cosigners_data = json_decode(json_encode($rental_application->cosigners));
            @endphp
            @if ($cosigners_data)
                $cosigners.setList(
                    {!! @$cosigners_data !!}
                );
            @endif

            var $additional_occupants = $('.repeater-additional_occupants').repeater({
                initEmpty: true,
                isFirstItemUndeletable: false,
                initval: 1,
                show: function() {
                    var repeaterItems = $(this).parent().find('div[data-repeater-item]');
                    var max_limit = repeaterItems.data('max_limit');
                    if (repeaterItems.length >= max_limit) {
                        $(this).parent().parent().find('span[data-repeater-create]').hide();
                    }
                    if (repeaterItems.length > max_limit) {
                        return false;
                    }
                    $(this).slideDown();
                    $(this).attr('data-index', repeaterItems.length - 1);
                    if (repeaterItems.length > 1) {
                        $(this).find('.repeaterItemNumber').html('Additional occupants ' + repeaterItems.length);
                    }
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    $(this).parent().parent().find('span[data-repeater-create]').show();
                },
            });

            @php
                $additional_occupants_data = json_decode(json_encode($rental_application->additional_occupants));
            @endphp
            @if ($additional_occupants_data)
                $additional_occupants.setList(
                    {!! @$additional_occupants_data !!}
                );
            @endif

            var $pets = $('.repeater-pets').repeater({
                initEmpty: true,
                isFirstItemUndeletable: false,
                initval: 1,
                show: function() {
                    var repeaterItems = $(this).parent().find('div[data-repeater-item]');
                    var max_limit = repeaterItems.data('max_limit');
                    if (repeaterItems.length >= max_limit) {
                        $(this).parent().parent().find('span[data-repeater-create]').hide();
                    }
                    if (repeaterItems.length > max_limit) {
                        return false;
                    }
                    $(this).slideDown();
                    $(this).attr('data-index', repeaterItems.length - 1);
                    if (repeaterItems.length > 1) {
                        $(this).find('.repeaterItemNumber').html('Pets' + repeaterItems.length);
                    }
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    $(this).parent().parent().find('span[data-repeater-create]').show();
                },
            });

            @php
                $pets_data = json_decode(json_encode($rental_application->pets));
            @endphp
            @if ($pets_data)
                $pets.setList(
                    {!! @$pets_data !!}
                );
            @endif

            var $vehicles = $('.repeater-vehicles').repeater({
                initEmpty: true,
                isFirstItemUndeletable: false,
                initval: 1,
                show: function() {
                    var repeaterItems = $(this).parent().find('div[data-repeater-item]');
                    var max_limit = repeaterItems.data('max_limit');
                    if (repeaterItems.length >= max_limit) {
                        $(this).parent().parent().find('span[data-repeater-create]').hide();
                    }
                    if (repeaterItems.length > max_limit) {
                        return false;
                    }
                    $(this).slideDown();
                    $(this).attr('data-index', repeaterItems.length - 1);
                    if (repeaterItems.length > 1) {
                        $(this).find('.repeaterItemNumber').html('Vehicles' + repeaterItems.length);
                    }
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    $(this).parent().parent().find('span[data-repeater-create]').show();
                },
            });

            @php
                $vehicles_data = json_decode(json_encode($rental_application->vehicles));
            @endphp
            @if ($vehicles_data)
                $vehicles.setList(
                    {!! @$vehicles_data !!}
                );
            @endif

            var $financial_suitability = $('.repeater-financial_suitability').repeater({
                initEmpty: false,
                isFirstItemUndeletable: true,
                initval: 1,
                show: function() {
                    var repeaterItems = $(this).parent().find('div[data-repeater-item]');
                    var max_limit = repeaterItems.data('max_limit');
                    if (repeaterItems.length >= max_limit) {
                        $(this).parent().parent().find('span[data-repeater-create]').hide();
                    }
                    if (repeaterItems.length > max_limit) {
                        return false;
                    }
                    $(this).slideDown();
                    $(this).attr('data-index', repeaterItems.length - 1);
                    $(this).find('.repeaterItemNumber').html(repeaterItems.length);
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    $(this).parent().parent().find('span[data-repeater-create]').show();
                },
            });

            @php
                $financial_suitability_data = json_decode(json_encode($rental_application->financial_suitability));
            @endphp
            @if ($financial_suitability_data)
                $financial_suitability.setList(
                    {!! @$financial_suitability_data !!}
                );
            @endif

            $(document).ready(function() {
                $('.select2_field').select2();
                $('.signclick').on('click', function() {
                    var idtext = $(this).attr('id');
                    idtext = idtext.replace('textsign', '');
                    $("#" + idtext + "textdivsign").show().css({
                        'width': '325px',
                        'height': '265px'
                    });
                });
                $('.close').on('click', function() {
                    var id = $(this).parent().attr('id');
                    idonly = id.replace('textdivsign', '');
                    $("#" + id).hide();
                });
                $('.clear').on('click', function() {
                    var idonly = $(this).attr('role');
                    var inputclass = 'typeunique' + idonly;
                    $('.' + inputclass).val('');
                    var padclass = 'holdplacesign' + idonly;
                    $('.' + padclass).html('');
                });
                $('.okbtn').on('click', function() {
                    var id = $(this).attr('role');
                    if ($('#drawsign' + id).hasClass('active')) {
                        var signbase = $('#signpad' + id + '_data_canvas').val();
                        $.ajax({
                            url: "{{ route('frontend.postimagebase') }}",
                            type: 'POST',
                            data: {
                                'jsonbucket': signbase
                            },
                            success: function(result) {
                                console.log(result);
                                $('.setfield' + id).val(result);
                                $('#' + id + 'textdivsign').html('<img src="' + result + '"/>');
                                $('#' + id + 'textdivsign').removeClass('tooltipsign');
                                $('#' + id + 'textdivsign').addClass('signtyped');
                                $('#' + id + 'textsign').remove();
                                $('.inputfield' + id).remove();
                            }
                        });
                    }
                    if ($('#typesign' + id).hasClass('active')) {
                        var text = $('.typeunique' + id).val();
                        $('.setfield' + id).val(text);
                        $('#' + id + 'textdivsign').html(text);
                        $('#' + id + 'textdivsign').removeClass('tooltipsign');
                        $('#' + id + 'textdivsign').addClass('signtyped');
                        $('#' + id + 'textsign').remove();
                        $('.inputfield' + id).remove();
                    }
                });
                $('.signtype').on('keydown keyup', function() {
                    var textsign = $(this).val();
                    var roleid = $(this).attr('role');
                    var class_id = 'holdplacesign' + roleid;
                    $('.' + class_id).html(textsign);
                });

                window.objsignpad_1 = new SuperSignature({
                    "SignObject": "signpad_1",
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
                    "SignWidth": "250",
                    "SignHeight": "150",
                    "PenColor": "#0000FF",
                    "ErrorMessage": "",
                    "StartMessage": "",
                    "SuccessMessage": "",
                    "forceMouseEvent": true,
                    "IeModalFix": true
                });
                objsignpad_1.Init();
                $("canvas").css({
                    'width': '',
                    'height': ''
                });
                //end signaturepad
            });
        </script>
    @endpush
@endif
@if (Route::currentRouteName() == 'rental_application.rentalApplicationPreviw')
    @push('after-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script>
            function pdf() {
                const {
                    jsPDF
                } = window.jspdf;
                let srcwidth = document.getElementById('rental_application_apply').scrollWidth;
                let doc = new jsPDF('p', 'pt', 'a4');
                let pdfjs = document.querySelector('#rental_application_apply');
                doc.html(pdfjs, {
                    html2canvas: {
                        scale: 600 / (srcwidth + 60),
                        dpi: 300,
                    },
                    callback: function(doc) {
                        doc.save("rental-application.pdf");
                    },
                    x: 12,
                    y: 12
                });
            }
        </script>
    @endpush
@endif
