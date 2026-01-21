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
            <div class="col-md-5">
                <x-frontend.card>
                    <x-slot name="header">@lang('Reset Password')</x-slot>
                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.password.email')">
                            <div class="form-group">
                                <label for="email">{{ __('Email') }} <span style="color: red">*</span></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" maxlength="255" autocomplete="new-email" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0 send-link">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase" type="submit">@lang('Send Password Reset Link')</button>
                                </div>
                            </div>
                        </x-forms.post>
                    </x-slot>
                    {{-- <x-slot name="footer">
                        <div class="text-center">Don't have an account?
                            <x-utils.link class="text-primary" :href="route('frontend.auth.register')" :text="__('Register')" />
                        </div>
                    </x-slot> --}}
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
