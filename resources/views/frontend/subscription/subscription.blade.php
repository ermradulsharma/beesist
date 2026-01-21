@extends('frontend.layouts.app')
@section('title', __('Subscription'))
@push('after-styles')
<style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }
    section.container{max-width: 1275px;}

    body {
        font-family: 'Roboto', sans-serif;
        text-align: center;
    }

    .plans {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin: 2em 0;
    }

    .plan {
        padding: 20px;
        border-radius: 1em;
    }

    .plan--light {
        color: #4E4E4E;
        background: linear-gradient(-45deg, #E5E3E8, #FAFAFA);
    }

    .plan--light .plan-price {
        color: var(--bs-yellow);
    }

    .plan--light .btn:hover {
        background-color: var(--bs-yellow) !important;
        color: var(--black) !important;
    }

    .plan--accent {
        color: #FFF;
        background: linear-gradient(-45deg, var(--bs-yellow), #3741A0);
    }

    .plan--accent .btn {
        color: #4E4E4E;
        background: #FFF;
    }

    .plan-title {
        text-transform: uppercase;
        margin: 0 0 1em;
        font-weight: 700;
    }

    .plan-price {
        margin: 0;
        font-size: 3rem;
        line-height: 1;
        font-weight: 900;
    }

    .plan-price span {
        display: block;
        font-size: 1rem;
        font-weight: 300;
    }

    .plan-description {
        margin: 1em 0;
        line-height: 1.5;
        min-height: 120px;
    }

    ul.features {
        text-align: left;
        li {
            margin-top: 6px;
            display: flex;
            gap: 0.5em;
            /* .fas {
                margin-right: 4px;
            } */
            .fa-check-circle {
                color: #6ab04c;
                position: relative;
                top: 5px;
            }
            .fa-times-circle {
                color: #eb4d4b;
                position: relative;
                top: 5px;
            }
        }

    }
    .form-class {
        border: 1px solid #cfd7df;
        border-radius: 7px;
        padding: 1.5rem;
    }
    .billingCycle {
        border-bottom: 1px solid #cfd7df;
    }
    .pl-0 {
        padding-left: 0px !important;
    }
    button[type=button] {
        color: #FAFAFA;
    }
    #LoginModal img, #RegisterModal img {
        width: 30%;
    }
    form#loginForm .form-group label, form#registerForm .form-group label  {
        display: flex;
    }
    form#registerForm .form-group.mb-3 {
        display: flex
    }
    form#registerForm .form-group.mb-3 input#terms {
        margin-right: 10px;
    }
</style>
@endpush
@section('content')
@php
    $slug = '';
@endphp
<section class="container">
    <div class="row">
        @foreach($packages as $package)
            <div class="col-md-3">
                <div class="plans flow-content">
                    <div class="plan plan--light">
                        <input class="package" type="hidden" name="package" id="packageId_{{ $package->id }}" data-package-id="{{ $package->id }}">
                        <h2 class="plan-title" id="packageTitle_{{ $package->id }}" data-title="{{ $package->title }}">{{ $package->title }}</h2>
                        <p class="plan-price" id="packagePrice_{{ $package->id }}" data-price="{{ number_format($package->amount, 2) }}">$ {{ number_format($package->amount, 2) }}<span>/month</span></p>
                        <p class="plan-description text-start">{{ $package->description ? Str::limit($package->description, 180) : 'Eleifend cursus volutpat risus convallis nam sed quam sollicitudin eget leo at erat cursus justo'}}</p>
                        <ul class="features list-unstyled">
                            @foreach ($services as $key=>$service)
                                <li>
                                    @if ($service->title === 'Properties')
                                        <i class="fas fa-check-circle"></i> {{ $package->total_property_limit }} {{ $service->title }}
                                    @else
                                        <i class="fas fa-{{ $package->services->contains($service->id) ? 'check' : 'times' }}-circle"></i> {{ $service->title }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <button id="joinNow_{{ $package->id }}" data-id="{{ $package->id }}" value="joinNow" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase join-now-button" >Sing Up</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@guest
    <x-modal.subscriptionRegistration />
    <x-modal.loginModal slug='{{ $slug }}'/>
@endguest
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

    $('#subscriptionRegisterForm').on('submit',function(event) {
        event.preventDefault();
        if(isVerified == true){
            $('#submitButton').prop('disabled', true);
            var formData = $(this).serialize();
            formData += '&roles[]=Property Manager';
            formData += '&isVerified='+ isVerified;
            $.ajax({
                url: "{{ route('frontend.auth.subscriptionRegistration') }}",
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success == true) {
                        var redirectUrl = "{{ route('frontend.user.subscribers', ':id') }}";
                        redirectUrl = redirectUrl.replace(':id', packageId);
                        window.location.href = redirectUrl;
                    } else {
                        console.log('Error registering user:', error);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('xhr', xhr);
                    if(xhr.responseJSON.status == '422'){
                        var errors = xhr.responseJSON.error;
                        if (errors) {
                            $('#firstNameError').text(errors.first_name ? errors.first_name[0] : '');
                            $('#lastNameError').text(errors.last_name ? errors.last_name[0] : '');
                            $('#emailError').text(errors.email ? errors.email[0] : '');
                            $('#companyError').text(errors.company ? errors.company[0] : '');
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
            $('#errorMessage').text('Please Verify Mail')
            $('#submitButton').prop('disabled', false);
            return false;
        }
    });

    $('button[value="joinNow"]').click(function(event) {
        event.preventDefault();
        packageId = $(this).data('id');
        checkUserLogin();
    });

    function checkUserLogin() {
        var authCheck = "{{ Auth::check() }}";
        if(authCheck == true){
            var redirectUrl = "{{ route('frontend.user.subscribers', ':id') }}";
            redirectUrl = redirectUrl.replace(':id', packageId);
            window.location.href = redirectUrl;
        } else {
            $("#subscriptionRegisterModal").modal('show');
        }
    }

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

    function applicationLoginPopup() {
        $("#LoginModal").modal('hide');
        $("#subscriptionRegisterModal").modal('show');
    }

    function gotoLoginPopup(){
        $("#LoginModal").modal('show');
        $("#subscriptionRegisterModal").modal('hide');

    }

    document.addEventListener('DOMContentLoaded', function() {
        @if(is_null($slug))
            $("#LoginModal").modal('show');
        @endif
    });

    $('#loginForm').submit(function(event) {
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
                console.log(response);
                if (response.success == true) {
                    $('#LoginModal').modal('hide');
                    if(response.subscription > 0){
                        window.location.href = "{{ route('manager.dashboard') }}";
                    } else {
                        var redirectUrl = "{{ route('frontend.user.subscribers', ':id') }}";
                        redirectUrl = redirectUrl.replace(':id', packageId);
                        window.location.href = redirectUrl;
                    }
                } else {
                    $('#loginMessage').html('Invalid username or password.');
                }
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
  </script>
@endpush
