@extends('backend.layouts.app')
@section('title', __('Send PMA'))
@push('after-styles')
    <style>
        .max_400 {
            max-width: 400px
        }
    </style>
@endpush
@section('content')
<x-backend.card>
    <x-slot name="header">
        <strong>@lang('Send PMA Form')</strong>
        <div class="btn-toolbar float-md-right" role="toolbar">
            <div class="btn-group" role="group" aria-label="Third group">
                <a href="https://bolld.com/register-pma" class="btn btn-primary btn-sm" target="__blank">{{ __('PMA Form') }} <i class="fa fa-paper-plane"></i></a>
            </div>
        </div>
    </x-slot>
    <x-slot name="body">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
        </div>
        <form class="form-signin" method="POST" action="{{ Auth::user()->user_type == 'Admin' ? route('admin.send.pma.post') : (Auth::user()->user_type == 'Agent' ? route('agent.send.pma.post') : '#') }}">
            @csrf
            <div class="box-body">
                <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="fname">{{ __('Name') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control max_400" name="fname" id="fname" placeholder="Enter Name" value="{{ old('fname') }}" type="text">
                            @if ($errors->has('fname'))
                                <span class="help-block"><strong>{{ $errors->first('fname') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('user_email') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="user_email">Email Address</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control max_400" name="user_email" id="user_email" placeholder="Enter Email" value="{{ old('user_email') }}" type="text">
                            @if ($errors->has('user_email'))
                                <span class="help-block"><strong>{{ $errors->first('user_email') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-danger">Send PMA Form Link</button>
            </div>
        </form>
    </x-slot>
</x-backend.card>
@endsection
