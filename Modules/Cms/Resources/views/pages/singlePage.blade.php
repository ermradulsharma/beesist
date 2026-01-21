@extends('frontend.layouts.app')
@section('title', __('About'))
@push('after-styles')
@endpush

@section('content')

    {!! $page->content !!}

    <!-- Section 1-->
    <section class="py-5" id="about_secion_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-3 font-bold">About Our <br>Virtual <span class="color-yellow"> Assistants.</span></h1>
                    <p class="text-black-80">Lorem ipsum dolor sit amet consectetur. Leo urna at eget proin lacus. Hac facilisis
                        volutpat odio pellentesque sagittis nullam egestas. Sollicitudin turpis facilisis gravida sollicitudin
                        purus. Fermentum fames ut consectetur sed. Dignissim consequat ut ultricies in quis faucibus tincidunt vitae
                        vel..</p>
                    <div class="theme_button d-lg-flex d-md-flex d-sm-block mt-5 gap-2">
                        <a href="{{ route('frontend.contact') }}" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase">Try a virtual assistant for free</a>
                        <a href="{{ route('frontend.contact') }}" class="btn outline rounded-pill px-4 py-2 text-uppercase">Book a consultation</a>
                    </div>
                </div>
                <div class="col-lg-5 gx-5 text-md-center text-sm-center text-xs-center mt-lg-0 mt-md-5 mt-sm-5 mt-xs-5">
                    <img src="{{ asset('images/about-virtual-assistant.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- End Section 1-->
@endsection

@push('after-scripts')
@endpush
