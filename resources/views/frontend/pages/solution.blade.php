@extends('frontend.layouts.app')
@section('title', __('Solution'))
@push('after-styles')
    <style>

    </style>
@endpush

@section('content')
    <section class="py-2">
        <div class="container">
            <div class="content-wrap">
                <h1 class="display-5 mb-1 font-bold text-center">Solution</h1>
                <hr>
                <div class="spacer-100"></div>
                <h2 class="display-6 mb-1 font-bold text-center text-muted">Coming Soon...</h2>
                <div class="spacer-100"></div>

                <div class="spacer-20"></div>
                <div class="theme_button text-center">
                    <a href="{{ route('frontend.contact') }}" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">Schedule your FREE business strategy!</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
@endpush
