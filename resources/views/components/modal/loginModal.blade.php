<style>
    #errorMsg {
        font-size: 11px;
        color: red;
    }
</style>
@props(['slug'])
<div id="LoginModal" class="modal fade authModals" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="account-wall" style="padding: 10px;">
                    <div style="text-align:center;">
                        <img src="{{ asset('images/Beesist-Logo.png') }}" alt="{{ appName() }}" title="{{ appName() }}" style="margin-bottom: 10px">
                        <h5 class="mb-1">Login your account</h5>
                        <p style="font-size: 12px">Save your application progress, <br>come back to check the status and more!</p>
                    </div>
                    @captcha()
                    <form id="loginForm" class="form-signin" method="POST" action="#">
                        @csrf
                        <div class="form-group mb-1">
                            <label for="email">Email</label>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input id="email_1" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off" required>
                            </div>
                            <span id="errorMsg" class="d-flex justify-content-start"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" autocomplete="off" required>
                                <span class="input-group-text" onclick="togglePasswordVisibility()"><i id="togglePasswordIcon" class="fas fa-eye-slash"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-md btn-primary btn-block" type="submit" style="width: 100%;">Login</button>
                        <hr>
                    </form>
                    <p style="text-align: center">
                        <small>If you don't have an account, please register.<br> By registering, you agree to our <a href="{{ $slug ? route('dynamic.privacyPolicy', ['subdomain' => $slug]) : route('frontend.privacy') }}">Privacy Policy</a> and <a href="{{ $slug ? route('dynamic.termsConditions', ['subdomain' => $slug]) : route('frontend.terms') }}">Terms of Service</a></small><br><a href="javascript:void(0)" title="Sign up" onclick="applicationLoginPopup()">Register</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
