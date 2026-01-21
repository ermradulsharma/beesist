@extends('frontend.layouts.app')

@section('title', __('Dashboard'))
@push('before-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
<style>
    .card-header {
        display: flex;
        justify-content: space-between;
    }
</style>
@endpush
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <x-frontend.card>
                <x-slot name="header" class="d-flex justify-content-between">
                    <div>
                        @lang('Dashboard')
                    </div>
                    <div>
                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-power-off" style="color: black;"></i></a>
                        <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                    </div>
                </x-slot>


                <x-slot name="body">
                    @if($user->roles->isNotEmpty())
                    @lang('You are logged in') {{ $user->roles->first()->name }} @lang('Dashboard!')
                    @else
                    @lang('You are logged in Dashboard!')
                    @endif
                </x-slot>

            </x-frontend.card>
        </div>
        <!--col-md-10-->
    </div>
    <!--row-->
</div>
<!--container-->
@endsection
