@extends('frontend.layouts.app')
@section('title', __('Reset Password'))
@push('after-styles')
<style>
    main {
        background-image: url("{{ asset('img/beesist-bg.jpg') }}");
        background-size: cover;
        background-position: center; /* Optional: Centers the image */
        background-repeat: no-repeat; /* Ensures the image doesn't repeat */
        height: 100vh; /* Makes the main element cover the full viewport height */
        position: relative;
    }
    .default-header-height {
        min-height: calc(100vh - 115px);
    }
    .send-link button:hover {
        background-color: var(--bs-warning) !important;
        color: var(--black) !important;
    }
</style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-md-center align-items-center default-header-height">
            <div class="col-md-6">
                <x-frontend.card>
                    <x-slot name="header">@lang('Reset Password')</x-slot>
                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.password.update')">
                            <input type="hidden" name="token" value="{{ $token }}" />
                            <div class="form-group">
                                <label for="email">{{ __('E-mail') }} <span style="color: red">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ $email ?? old('email') }}" maxlength="255" required autocomplete="email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Password') }} <span style="color: red">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="password" />
                                    <span class="input-group-text" id="password_3" onclick="togglePasswordVisibility(this.id)"><i id="togglePasswordIcon_1" class="fas fa-eye-slash"></i></span>
                                </div>
                                <span class="error"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password_confirmation">{{ __('Confirm Password') }} <span style="color: red">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password" />
                                    <span class="input-group-text" id="password_confirmation_4" onclick="togglePasswordVisibility(this.id)"><i id="togglePasswordIcon_2" class="fas fa-eye-slash"></i></span>
                                </div>
                            </div>
                            <div class="form-group send-link">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase" type="submit">@lang('Reset Password')</button>
                                </div>
                            </div>
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
<script>
    function togglePasswordVisibility(id) {
        var passwordInput;
        var icon;
        if(id == 'password_confirmation_4'){
            var passwordInput = document.getElementById('password_confirmation');
            var icon = document.getElementById('togglePasswordIcon_2');
        } else if (id == 'password_3'){
            var passwordInput = document.getElementById('password');
            var icon = document.getElementById('togglePasswordIcon_1');
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
@endpush
