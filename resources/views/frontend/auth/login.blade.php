@extends('frontend.layouts.app')
@section('title', __('Login'))

@push('after-styles')
    <style>
        main {
            background-image: url("{{ asset('img/beesist-bg.jpg') }}");
            background-size: cover;
            background-position: center;
            /* Optional: Centers the image */
            background-repeat: no-repeat;
            /* Ensures the image doesn't repeat */
            height: 100vh;
            /* Makes the main element cover the full viewport height */
            position: relative;
        }

        .default-header-height {
            min-height: calc(100vh - 115px);
        }

        .alert {
            position: relative;
            z-index: 9;
        }

        .alert-dismissible .btn-close {
            padding: 0;
        }

        @media only screen and (max-width: 768px) {
            .default-header-height {
                min-height: calc(70vh - 115px);
            }
        }
    </style>
    <style>
        .input-group-addon {
            cursor: pointer;
        }

        .loginBtn button:hover {
            background-color: var(--bs-warning) !important;
            color: var(--black) !important;
        }
    </style>
@endpush

@section('content')
    <div class="container py-0">
        <div class="row justify-content-md-center align-items-center default-header-height">
            <div class="col-md-5 align-self-center">
                <x-frontend.card>
                    <x-slot name="header">
                        <h2 class="mb-0">@lang('Login')</h2>
                    </x-slot>
                    <x-slot name="body">
                        <div class="pb-0 p-2">
                            <p class="text-medium-emphasis">Sign In to your account</p>
                            @captcha()
                            <x-forms.post :action="route('frontend.auth.login')">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email" />
                                </div>
                                <!--form-group-->

                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
                                    <span class="input-group-text" onclick="togglePasswordVisibility()"><i id="togglePasswordIcon" class="fas fa-eye-slash"></i></span>
                                </div>
                                <!--form-group-->

                                <div class="form-group">
                                    <div class="form-check">
                                        <input name="remember" id="remember" class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="remember"> @lang('Remember Me')</label>
                                    </div>
                                    <!--form-check-->
                                </div>
                                <!--form-group-->

                                @if (config('boilerplate.access.captcha.login'))
                                    <div class="row">
                                        <div class="col">
                                            @captcha
                                            <input type="hidden" name="captcha_status" value="true" />
                                        </div>
                                        <!--col-->
                                    </div>
                                    <!--row-->
                                @endif

                                <div class="form-group d-flex align-items-center flex-column loginBtn">
                                    <button class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase" type="submit">@lang('Login')</button>
                                    <x-utils.link :href="route('frontend.auth.password.request')" class="btn btn-link text-primary" :text="__('Forgot Your Password?')" />
                                </div>
                                <!--form-group-->

                                <div class="text-center">@include('frontend.auth.includes.social')</div>
                            </x-forms.post>
                        </div>
                    </x-slot>
                    {{-- @if (config('boilerplate.access.user.registration'))
                <x-slot name="footer">
                    <div class="text-center">Don't have an account?
                        <x-utils.link class="text-primary" :href="route('frontend.auth.register')" :text="__('Register')" />
                    </div>
                </x-slot>
                @endif --}}
                </x-frontend.card>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var icon = document.getElementById('togglePasswordIcon');

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
