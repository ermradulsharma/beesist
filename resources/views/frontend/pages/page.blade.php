@extends('frontend.layouts.manager')
@section('title', __('Terms & Conditions'))
@push('after-styles')
    <style>

    </style>
@endpush

@section('content')
    <section class="py-2">
        <div class="container">
            <div class="content-wrap">
                <h1 class="display-5 mb-1 font-bold text-center">{!! $page_title !!}</h1>
                <hr>
                {!! $page_content !!}
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
@endpush
