@extends('frontend.layouts.app')
@section('title', __('Rental Application'))
@push('after-styles')
    <style>
        .listing-info-card {
            margin-bottom: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            width: 100%;
            min-height: 120px;
            border: 1px solid #E2E2E2;
            border-radius: 5px;
            padding: 12px;
        }

        .listing-info-card__property-info {
            display: flex;
            align-items: center;
        }

        .account-wall img {
            max-width: 115px;
            height: auto;
        }

        .property-info__image {
            height: 96px;
            width: 120px;
            -o-object-fit: cover;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 21px;
        }

        .details__building-name {
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0;
            color: #191919;
            margin-bottom: 7px;
        }

        .property-info__details {
            min-height: 73px;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 18px;
            color: #767676;
        }

        .listing-info-card__lease-info {
            margin-left: auto;
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

        @media only screen and (max-width: 768px) {
            .list-header {
                display: block !important;
            }
            .listing-info-card {
                display: block;
                padding: 10px;
            }

            .listing-info-card__property-info {
                margin-bottom: 10px;
                flex-direction: column;
                align-items: flex-start;
            }

            .property-info__image {
                margin-bottom: 15px;
                margin-right: 0;
            }

            .listing-info-card__lease-info {
                margin-left: 0;
                text-align: right;
            }
        }

        .list-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
        }

    </style>
@endpush
@php
    $slug = '';
@endphp
@section('content')
    <section class="py-4">
        <div class="container">
            <div class="mb-2 list-header">
                <div>
                    <h4 class="text-dark mb-1 ">Rental Application</h4>
                    <h6 class="mb-1">Applying for a specific property? Select it below. </h6>
                </div>
                <div class="form-check">
                    <input class="form-check-input {{ $errors->has('referral') ? 'is-invalid' : '' }}" type="checkbox" name="unknownProperty" id="unknownPropertyCheckbox" value="Yes">
                    <label class="form-check-label" for="unknownPropertyCheckbox">Not sure — I'll pick a property later. </label>
                </div>
                <a id="unknownProperty_btn" href="javascript:void(0)" @guest onclick="applicationLoginPopup();" @else onclick="gotoApplication();" @endguest class="btn btn-danger mt-3 text-uppercase" style="display:none">Continue</a>
            </div>
            <div class="properties-list">
                @foreach ($properties as $key => $property)
                <div class="listing-info-card" @guest onclick="applicationLoginPopup({{ $property->id }});" @else onclick="gotoApplication({{ $property->id }});" @endguest>
                    <div class="listing-info-card__property-info">
                        <img class="property-info__image ng-star-inserted" src="{{ isset($property->featured_image['url']) && file_exists(public_path('uploads/properties/'.$property->id.'/property_photos/thumbs/'.$property->featured_image['url'])) ? asset('uploads/properties/' . $property->id . '/property_photos/thumbs/' . @$property->featured_image['url']) : asset('images/bolld-placeholder.png') }}" alt="{{ $property->title }}">
                        <div class="property-info__details">
                            <div class="details__building-name">{{ $property->title }}</div>
                            <div class="details__address__display">{{ $property->address }}</div>
                            <div> {{ $property->prop_type }} | {{ $property->beds }} Bed | {{ $property->baths }} Bath </div>
                        </div>
                    </div>
                    <div class="listing-info-card__lease-info">
                        <div class="lease-info__price">$ {{ number_format($property->rate, 2) }}<span>/{{ $property->rateper }}</span></div>
                        {{-- <div class="lease-info__date"> AVAILABLE JUNE 1 </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <x-modal.loginModal slug='{{ $slug }}' />
    <x-modal.registerModal slug='{{ $slug }}' />
@endsection
@push('after-scripts')
    <script>
        var code;
        var isVerified = false;
        var packageId;

        function sendCode(id) {
            var email = $('#email').val();
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
                    if(xhr.responseJSON.status == '422'){
                        $('#emailError').text(xhr.responseJSON.error)
                    } else if(xhr.responseJSON.status == '500') {
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
            if(otp == code) {
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

        $('#otp').on('keyup', function () {
            $('#codeError').text('');
        });

        var inputIds = ['#password_0', '#password_confirmation', '#email', '#first_name', '#last_name', '#company', '#phone', '#email_1', '#password'];
        var errorIds = ['#passwordError', '#confirmPasswordError', '#emailError', '#firstNameError', '#lastNameError', '#companyError', '#phoneError', '#errorMsg', '#errorMsg'];
        inputIds.forEach(function(inputId, index) {
            $(inputId).on('keyup', function () {
                $(errorIds[index]).text('');
            });
        });

        function togglePasswordVisibility(id) {
            var passwordInput;
            var icon;
            if(id == 'password_confirmation_1'){
                var passwordInput = document.getElementById('password_confirmation');
                var icon = document.getElementById('togglePasswordIcon_2');
            } else if (id == 'password_1'){
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

        @if (!$errors->isEmpty())
            $("#RegisterModal").modal('show');
        @endif
        $("#first_name, #last_name").on('keydown keyup keypress blur', function() {
            $("#name").val($("#first_name").val() + ' ' + $("#last_name").val());
        });
        $("#unknownPropertyCheckbox").change(function() {
            if (this.checked) {
                $(".properties-list").hide();
                $("#unknownProperty_btn").show();
            } else {
                $(".properties-list").show();
                $("#unknownProperty_btn").hide();
            }
        });

        var previousPid;
        function gotoApplication(pid) {
            var targetUrl = "{{ url('rental-application/apply') }}";
            if (pid) {
                targetUrl += "/" + pid;
                previousPid = pid;
            }
            window.location.href = targetUrl;
        }

        function applicationLoginPopup(pid) {
            if (pid) {
                $('#RegisterModal #skipRegister').attr('onclick', 'gotoApplication(' + pid + ')');
                $("#LoginModal").modal('hide');
                previousPid = pid;
            } else {
                $('#RegisterModal #skipRegister').attr('onclick', 'gotoApplication(previousPid)');
                $("#LoginModal").modal('hide');
            }
            $("#RegisterModal").modal('show');
        }

        function gotoLoginPopup(pid) {
            if (pid) {
                $('#LoginModal #skipRegister').attr('onclick', 'gotoApplication(' + pid + ')');
                $("#RegisterModal").modal('hide');
                previousPid = pid;
            } else {
                $('#LoginModal #skipRegister').attr('onclick', 'gotoApplication(previousPid)');
                $("#RegisterModal").modal('hide');
            }
            $("#LoginModal").modal('show');
        }

        // Login and Registration
        $('#loginForm').submit(function(event) {
            $('.sppiner').removeClass('d-none');
            event.preventDefault();
            var email = $('#email_1').val();
            var password = $('#password').val();
            var pId = previousPid;
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
                    $('#LoginModal').modal('hide');
                    gotoApplication(pId);
                    $('.sppiner').addClass('d-none');
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.message;
                    if(xhr.status == 422){
                        $('#errorMsg').text(errors);
                    } else if(xhr.status == '500') {
                        $('#errorMsg').text('Something went wrong')
                    } else {
                        $('#errorMsg').text('Something went wrong')
                    }
                }
            })
        });

        $('#registerForm').on('submit', function(event) {
            $('.sppiner').removeClass('d-none');
            event.preventDefault();
            if(isVerified == true){
                var formData = $(this).serialize();
                formData += '&roles[]=Tenant';
                formData += '&isVerified='+ isVerified;
                formData += '&prop_id='+previousPid;
                var pId = previousPid;
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
                        gotoApplication(pId);
                        $('.sppiner').addClass('d-none');
                    },
                    error: function(xhr, status, error) {
                        console.log('xhr', xhr);
                        if(xhr.responseJSON.status == '422'){
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
                        } else if(xhr.responseJSON.status == '500') {
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
    </script>
@endpush
