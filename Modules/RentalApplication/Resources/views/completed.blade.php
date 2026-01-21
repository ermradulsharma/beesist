@extends('frontend.layouts.app')
@section('title', __('Rental Application Completed'))
@push('after-styles')
    <style>
    </style>
@endpush
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="mb-5">
                <div class="alert alert-success">
                    <h2 class="text-center">Rental Application Completed</h2>
                    <hr>
                    <h4 class="text-center">Thank you for taking the time to submit a rental application with us. We look forward to following up on all your references and reviewing your information as submitted.</h4>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
@endpush
