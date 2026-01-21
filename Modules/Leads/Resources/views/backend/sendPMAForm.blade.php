@extends('backend.layouts.app')
@section('title', __('Send PMA'))
@push('after-styles')
    <style>
        .max_400 {
            max-width: 400px
        }
        .btn-toolbar {
            gap: 0.5em;
        }
    </style>
@endpush
@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Send PMA Form')
        @if (Auth::user()->canAny(['user.access.pma.copy', 'user.access.pma.form']))
            <div class="btn-toolbar float-md-right" role="toolbar">
                @can('user.access.pma.copy')
                <div class="btn-group" role="group" aria-label="Third group">
                    <a href="{{ route('pma.pmaRegisterForm', ['account_id' => Auth::user()->uuid]) }}" class="btn btn-success btn-sm copy-link">{{ __('Copy PMA Form Link') }} <i class="fa fa-copy"></i></a>
                </div>
                @endcan
                @can('user.access.pma.form')
                <div class="btn-group" role="group" aria-label="Third group">
                    <a href="{{ route('pma.pmaRegisterForm', ['account_id' => Auth::user()->uuid]) }}" class="btn btn-primary btn-sm" target="__blank">{{ __('PMA Form') }} <i class="fa fa-paper-plane"></i></a>
                </div>
                @endcan
            </div>
        @endif
    </x-slot>
    <x-slot name="body">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
        </div>
        <form class="form-signin" method="POST" action="{{ route(rolebased() .'.pma.sendPMAForm') }}">
            @csrf
            <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control max_400" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}" type="text">
                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="email">Email Address</label>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control max_400" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}" type="email">
                            @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
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
@push('after-scripts')
<script>
    $(document).ready(function(){
        $('.copy-link').click(function(e){
            e.preventDefault();
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(this).attr('href')).select();
            document.execCommand("copy");
            $temp.remove();
            toastAlert('success', 'PMA Form Link Copied Successfully');
        });
    });
    </script>
@endpush
