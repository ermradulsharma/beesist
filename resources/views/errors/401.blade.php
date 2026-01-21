@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
@section('content')
    <div style="text-align: center;">
        <h1>401</h1>
        <h2>Oops! You are Unauthorized</h2>
        <p>Oops! You are unauthorized to access this page. Please make sure you have the necessary permissions to view the content.</p>
        <a href="{{ route('frontend.auth.login') }}" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">@lang('Login')</a>
    </div>
@endsection
