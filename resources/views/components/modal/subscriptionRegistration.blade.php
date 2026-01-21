<style>
    #firstNameError, #lastNameError, #emailError, #codeError, #companyError, #phoneError, #passwordError {
        font-size: 11px;
        color: red;
    }
    .account-wall img {
        max-width: 115px;
        height: auto;
    }
    .btn-h:hover {
        background-color: var(--bs-warning) !important;
        color: var(--black) !important;
    }
    #verifiedOtp_parent {
        display: none;
    }
    .form-group label {
        font-size: 14px;
    }
</style>
<div id="subscriptionRegisterModal" class="modal fade authModals" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="account-wall" style="padding: 10px;">
                    <div style="text-align:center;">
                        <img src="{{ asset('images/Beesist-Logo.png') }}" alt="{{ appName() }}" title="{{ appName() }}" style="margin-bottom: 10px">
                        <h5 class="mb-1">Create your account</h5>
                        <p style="font-size: 12px">Save your application progress, <br>come back to check the status and more!</p>
                    </div>
                    @captcha()
                    <form id="subscriptionRegisterForm" class="form-signin mt-3" method="POST" action="#">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <div class="form-group text-start">
                                    <label for="first_name">{{ __('First Name') }} <span style="color: red">*</span></label>
                                    <div class="input-group mb-1">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" autocomplete="off">
                                    </div>
                                    <span id="firstNameError" class="d-flex justify-content-start"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-start">
                                    <label for="last_name">{{ __('Last Name') }} <span style="color: red">*</span></label>
                                    <div class="input-group mb-1">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" autocomplete="off">
                                    </div>
                                    <span id="lastNameError" class="d-flex justify-content-start"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-start mb-1">
                            <label for="email">{{ __('Email') }} <span style="color: red">*</span></label>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="new-email">
                                <div class="loginBtn d-flex align-items-center">
                                    <img id="loader" src="{{ asset('images/loder.gif') }}" style="margin-left: 8px; width: 30px; display: none;">
                                    <a id="verify" class="btn btn-dark ms-2 border-0 btn-h" onclick="sendCode(this.id)" value="verify">Verify Email</a>
                                    <a id="checkMark" class="ms-2" style="font-size: medium; color: green; display: none;"><i class="fas fa-check"></i></a>
                                </div>
                            </div>
                            <span id="emailError" class="d-flex justify-content-start"></span>
                        </div>
                        <div class="form-group text-start mb-1" id="verifiedOtp_parent">
                            <div class="input-group">
                                <input id="otp" type="otp" class="form-control me-2" name="otp" value="{{ old('otp') }}" placeholder="Please enter the OTP sent to your email" autocomplete="off">
                                <div class="form-group loginBtn">
                                    <img id="loader_1" src="{{ asset('images/loder.gif') }}" style="width: 30px; display: none;">
                                    <a id="verifiedOtp" class="btn btn-danger border-0 btn-h" onclick="verifyCode(this.id)" style="color: #FFFFFF">Verify</a>
                                </div>
                            </div>
                            <span id="codeError" class="d-flex justify-content-start"></span>
                        </div>
                        <div class="form-group text-start mb-1">
                            <label for="company">{{ __('Company Name') }} <span style="color: red">*</span></label>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" placeholder="Company Name" autocomplete="off">
                            </div>
                            <span id="companyError" class="d-flex justify-content-start"></span>
                        </div>
                        <div class="form-group text-start mb-1">
                            <label for="phone">{{ __('Phone') }} <span style="color: red">*</span></label>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone" autocomplete="off">
                            </div>
                            <span id="phoneError" class="d-flex justify-content-start"></span>
                        </div>
                        <div class="form-group mb-1 text-start">
                            <label for="password">{{ __('Password') }} <span style="color: red">*</span></label>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="password_0" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" autocomplete="new-password">
                                <span class="input-group-text" id="password_1" onclick="togglePasswordVisibility(this.id)"><i id="togglePasswordIcon_1" class="fas fa-eye-slash"></i></span>
                            </div>
                            <span id="passwordError" class="d-flex justify-content-start"></span>
                        </div>
                        <div class="form-group text-start mb-1">
                            <label for="password_confirmation">{{ __('Confirm Password') }} <span style="color: red">*</span></label>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" autocomplete="off">
                                <span class="input-group-text" id="password_confirmation_1" onclick="togglePasswordVisibility(this.id)"><i id="togglePasswordIcon_2" class="fas fa-eye-slash"></i></span>
                            </div>
                            <span id="confirmPasswordError" class="d-flex justify-content-start"></span>
                        </div>
                        <div class="form-group text-start mb-2">
                            <input type="checkbox" name="terms" value="1" id="terms" class="form-check-input" required>
                            <label class="form-check-label" for="terms">
                                @lang('I agree to the') <a href="{{ route('frontend.terms') }}" target="_blank">@lang('Terms & Conditions')</a>
                            </label>
                            <span id="termsError" class="d-flex justify-content-start"></span>
                        </div>
                        @if(config('boilerplate.access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    <input type="hidden" name="captcha_status" value="true" />
                                </div><!--col-->
                            </div><!--row-->
                        @endif
                        <div class="form-group loginBtn">
                            <button id="submitButton" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase btn-h" type="submit" style="width: 100%;">Create account</button>
                        </div>
                    </form>
                    <hr class="my-2">
                    <p style="text-align: center"><small>By creating an account you agree to our <br><a href="{{ route('frontend.privacy') }}">Privacy Policy</a> and <a href="{{ route('frontend.terms') }}">Terms of Service</a>.<br>Already have an account?</small><br><a href="javascript:void(0)" title="Sign in" onclick="gotoLoginPopup()">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
