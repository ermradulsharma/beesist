@extends('frontend.layouts.app')
@section('title', __('Contact'))
@push('after-styles')
    <style>

    </style>
@endpush

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="display-5 font-bold text-center">Contact Us</span></h1>
            <p class="text-black-80 text-center w-75 m-auto">Working with us is like having your in-house team. The manpower
                you’ve always wanted. The difference is you do not need to train or manage us. We learn how you do your business
                and we take care of it your way.</p>
            <div class="spacer-20"></div>
            <div class="row mt-4">
                <div class="col-lg-5 col-md-6 mb-4">
                    <div class="card border-0 rounded-4 h-100" style="box-shadow: 0px 16px 120px rgba(0, 0, 0, 0.05);">
                        <h4 class="fs-4 bg-yellow p-3 rounded-top-4 mb-0 font-semi">Contact Informations</h4>
                        <div class="card-body border-1 border border-top-0 p-4 rounded-4 rounded-top-0">
                            <div class="contact_details mx-3 my-4" style="border-bottom:1px solid #CFCAFF;">
                                <h5 class="font-bold" style="color:#2B3674;">Contact Info</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-1" style="color:#3F4A73;"><img src="{{ asset('images/email-icon.png') }}" class="img-fluid me-2">
                                        Support@Forexample.com</li>
                                    <li class="mb-1" style="color:#3F4A73;"><img src="{{ asset('images/phone-icon.png') }}" class="img-fluid me-2"> +44
                                        (0) 30 546 7865</li>
                                </ul>
                            </div>
                            <div class="contact_details mx-3 my-4">
                                <h5 class="font-bold" style="color:#2B3674;">Office Address</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-1 d-flex align-items-start" style="color:#3F4A73;"><img src="{{ asset('images/location-icon.png') }}" class="img-fluid me-2"> 100 Edenbridge Road, <br>London, United Kingdom</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 mb-4">
                    <div class="card rounded-4" style="box-shadow: 0px 16px 120px rgba(0, 0, 0, 0.05);">
                        <div class="card-body p-4 mx-lg-3">
                            <h3 class="display-5 font-bold color-yellow">Send Us a Message</h3>
                            <div class="spacer-20"></div>
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border-radius-100 card-border-yellow-color" id="floating_Name" placeholder="Enter Your Name">
                                    <label for="floating_Name">Enter Your Name</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control border-radius-100 card-border-yellow-color" id="floating_Email" placeholder="Enter your email address">
                                    <label for="floating_Email">Enter your email address</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <textarea class="form-control card-border-yellow-color" placeholder="Write your message" id="floating_message" style="height: 100px;border-radius:30px;"></textarea>
                                    <label for="floating_message">Write your message</label>
                                </div>
                                <div class="form_btn">
                                    <input type="submit" class="btn btn-dark border-radius-100 p-2 px-4 border-0" value="Send Message">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Section 1-->

    <!-- Section 6 -->
    <section class="py-5 background-light" id="about_secion_6">
        <div class="container">
            <div class="card card-border-yellow-color border-radius-20 bg-transparent text-lg-start text-md-center text-sm-center text-xs-center">
                <div class="card-body bg-transparent p-4 pb-0">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="p-3">
                                <h4 class="display-5 font-bold mb-2">Ready to take your <span class="color-yellow">business</span> to the next level?</h4>
                                <p class="text-black-50 font-bold fs-6 mb-4">Learn what we can do with your budget and find the GROWTH OPPORTUNITIES in your business.</p>
                                <div class="theme_button mb-3">
                                    <a href="#" class="btn btn-theme-yellow rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">Get aFREE Business Assessment TODAY</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <img src="{{ asset('images/free-business-assessment.png') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
@endpush
