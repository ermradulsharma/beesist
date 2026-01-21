@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))

@section('content')
    <div style="text-align: center;">
        <h1>404</h1>
        <h1>Oops! Page Not Found</h1>
        <p>We're sorry, but the page you were looking for could not be found. It might have been removed, had its name changed, or is temporarily unavailable.</p>
        <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">Back to Home</a>
    </div>
@endsection

