@extends('frontend.layouts.app')
@section('title', __('Register'))
@push('after-styles')
<style>
    main {
        background-image: url("{{ asset('img/beesist-bg.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }
    .default-header-height {
        min-height: calc(100vh - 115px);
    }

    .configuration {
        background: var(--bs-card-cap-bg);
        min-height: 50px !important;
        align-items: center;
        color: var(--bs-card-cap-color);
        border-radius: var(--bs-card-border-radius);
        border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color);
    }
    .register-btn {
        width: 50%;
        color: var(--bs-white);
    }
    .input-group-text {
        padding: 0.65rem 0.75rem !important;
        font-size: 1rem !important;
        border-radius: 0rem !important;
    }
    .input-group {
        width: 66.66666667% !important;
    }
</style>
@endpush
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    <h5 class="mb-0">@lang('Create Your For Rent Central Account')</h5>
                </x-slot>
                <x-slot name="body">
                    @captcha()
                    <x-forms.post :action="route('frontend.auth.register')">
                        <div class="form-group row mb-3">
                            <div class="card px-0">
                                <div class="card-header">
                                    <h5 class="mb-0">@lang('1. Basic Infomation')</h5>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Name') <span style="color: red">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Name') }}" maxlength="100" required autofocus autocomplete="name" />
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">@lang('E-mail Address') <span style="color: red">*</span></label>
                            <div class="col-md-8">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255"
                                    required autocomplete="email" />
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">@lang('Phone') <span style="color: red">*</span></label>
                            <div class="col-md-8">
                                <input type="phone" name="phone" id="phone" class="form-control" placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" maxlength="16" required autocomplete="phone" />
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Password') <span style="color: red">*</span></label>
                            <div class="col-md-8 input-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="{{ __('Password') }}" maxlength="100" required
                                    autocomplete="new-password" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('Password Confirmation') <span style="color: red">*</span></label>
                            <div class="col-md-8 input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                    placeholder="{{ __('Password Confirmation') }}" maxlength="16" required
                                    autocomplete="new-password" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye-slash" id="togglePasswordConfirmation" style="cursor: pointer;"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="units">How many units do you currently manage? </label>
                            <input name="units" class="form-control " type="number" min="0" id="units" placeholder="" oninput="validity.valid||(value='');" data-hj-whitelist="" value="">
                        </div>

                        <div class="form-group mt-3">
                            <div class="row configuration mb-3">
                                <h5 class="mb-0">@lang('2. Software Configuration')</h5>
                            </div>
                            <p>Please inform us about your identity so that we can provide you with the appropriate version of the software.</p>
                            <div class="form-group">
                                <p class="mb-0">I am a...</p>
                                @php
                                    $name = [
                                        'Property Manager' => 'Property Manager',
                                        'Property Owner' => 'Property Owner',
                                        'Tenant' => 'Renter or Resident',
                                    ];
                                    $description = [
                                        'Property Manager' => 'I am a property manager or manage properties on behalf of others',
                                        'Property Owner' => 'I manage my own properties or apartments',
                                        'Tenant' => 'I want to pay my rent or dues online',
                                    ];
                                @endphp
                                @foreach ($roles->reverse() as $key => $role)
                                    <div class="form-group py-2">
                                        <label class="form-check" for="edition{{ $key }}">
                                            <input type="radio" class="form-check-input" name="roles" value="{{ $role->name }}" id="edition{{ $key }}" data-gtm-form-interact-field-id="{{ $key }}" @if($key === 2) checked @endif> <span class="" style="font-weight:bold; font-size: 1.125rem">{{ $name[$role->name] }}</span>
                                            <span class="d-block">{{ $description[$role->name] }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" name="terms" value="1" id="terms" class="form-check-input" required>
                                <label class="form-check-label" for="terms">
                                    @lang('I agree to the') <a href="{{ route('frontend.terms') }}"  target="_blank">@lang('Terms & Conditions')</a>
                                </label>
                            </div>
                        </div>
                        @if(config('boilerplate.access.captcha.registration'))
                        <div class="row">
                            <div class="col">
                                @captcha
                                <input type="hidden" name="captcha_status" value="true" />
                            </div>
                        </div>
                        @endif

                        <div class="form-group text-center my-2">
                            <button class="btn btn-warning p-2 fs-5 register-btn" type="submit">@lang('Register')</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
        const passwordConfirmation = document.querySelector('#password_confirmation');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        togglePasswordConfirmation.addEventListener('click', function (e) {
            const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirmation.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
</script>

@endpush
