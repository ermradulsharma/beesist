@extends('frontend.layouts.app')
@section('title', __('About'))
@push('after-styles')
    <style>

    </style>
@endpush

@section('content')
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

    <!-- Section 2 -->
    <section class="py-5 background-light" id="about_secion_2">
        <div class="container">
            <div class="row info_frames">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-0">
                        <div class="card-body text-center p-3">
                            <div class="box_icon d-flex align-items-center justify-content-center">
                                <img class="brightness-0" src="{{ asset('images/lead-generation.png') }}" width="auto" height="38px">
                            </div>
                            <h4 class="font-bold text-black my-4">Cost Effective</h4>
                            <p class="my-4 mb-0">Pricing starts at $12/hr Enjoy flexibility with no setup fees or overhead costs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-0">
                        <div class="card-body text-center p-3">
                            <div class="box_icon d-flex align-items-center justify-content-center">
                                <img class="brightness-0" src="{{ asset('images/lead-generation.png') }}" width="auto" height="38px">
                            </div>
                            <h4 class="font-bold text-black my-4">Time-Saving</h4>
                            <p class="my-4 mb-0">Leave the sourcing and screening to us. An account manager will help you coordinate
                                and onboard your team.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-0">
                        <div class="card-body text-center p-3">
                            <div class="box_icon d-flex align-items-center justify-content-center">
                                <img class="brightness-0" src="{{ asset('images/lead-generation.png') }}" width="auto" height="38px">
                            </div>
                            <h4 class="font-bold text-black my-4">Skilled</h4>
                            <p class="my-4 mb-0">We recruit skilled, experienced workers for various roles, including sales, customer
                                support, and administrative assistance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-0">
                        <div class="card-body text-center p-3">
                            <div class="box_icon d-flex align-items-center justify-content-center">
                                <img class="brightness-0" src="{{ asset('images/lead-generation.png') }}" width="auto" height="38px">
                            </div>
                            <h4 class="font-bold text-black my-4">Scalable</h4>
                            <p class="my-4 mb-0">You can expand your team or adjust their schedule whenever you need to.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section 2 -->

    <!-- Section 3 -->
    <section class="py-5 background-light">
        <div class="container">
            <div id="how_works" class="position-relative">
                <h3 class="display-5 mb-1 mt-4 font-bold text-center">What Sets <span class="color-yellow">Us
                        Apart</span></h3>
                <p class="fs-6 mb-1 text-black-50 text-center mb-5 w-75 m-auto">Working with us is like having your in-house
                    team. The manpower you’ve always wanted. The difference is you do not need to train or manage us. We learn how
                    you do your business and we take care of it your way.</p>
                <div class="card card-border-yellow-color border-radius-20 bg-transparent mb-5">
                    <div class="card-body bg-transparent p-4">
                        <div class="row align-items-center gx-lg-5">
                            <div class="col-lg-5 text-center my-sm-4 my-md-4 my-xs-4">
                                <img src="{{ asset('images/Great.png') }}" class="img-fluid">
                            </div>
                            <div class="col-lg-7 position-relative">
                                <div class="num d-flex gap-3 align-items-end mb-4">
                                    <h4 class="display-5 font-bold mb-0">Great <span class="color-yellow">WFH</span> Setup</h4>
                                    <span class="flex-grow-1 text-center"><img src="{{ asset('images/num-01.png') }}" class="img-fluid"></span>
                                </div>
                                <p class="mb-0 text-black-50">All of our recruits are fully equipped for remote work.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-border-yellow-color border-radius-20 bg-transparent mb-5">
                    <div class="card-body bg-transparent p-4">
                        <div class="row align-items-center gx-lg-5">
                            <div class="col-lg-7 position-relative order-md-last order-sm-last order-xs-last">
                                <div class="num d-flex gap-3 align-items-end mb-4">
                                    <h4 class="display-5 font-bold mb-0">Carefully <span class="color-yellow">Screened</span></h4>
                                    <span class="flex-grow-1 text-center"><img src="{{ asset('images/num-02.png') }}" class="img-fluid"></span>
                                </div>
                                <p class="mb-0 text-black-50 w-75">Our team assesses skills, experience and work ethic. We’ve matched
                                    thousands of workers with satisfied clients.</p>
                            </div>
                            <div class="col-lg-5 text-center order-lg-last order-md-first order-sm-first order-xs-first my-sm-4 my-md-4 my-xs-4">
                                <img src="{{ asset('images/Carefully.png') }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-border-yellow-color border-radius-20 bg-transparent mb-5">
                    <div class="card-body bg-transparent p-4">
                        <div class="row align-items-center gx-lg-5">
                            <div class="col-lg-5 text-center my-sm-4 my-md-4 my-xs-4">
                                <img src="{{ asset('images/Effective.png') }}" class="img-fluid">
                            </div>
                            <div class="col-lg-7 position-relative">
                                <div class="num d-flex gap-3 align-items-end mb-4">
                                    <h4 class="display-5 font-bold mb-0">Effective <span class="color-yellow">Communicators</span></h4>
                                    <span class="flex-grow-1 text-center"><img src="{{ asset('images/num-03.png') }}" class="img-fluid"></span>
                                </div>
                                <p class="mb-0 text-black-50 w-75">All recruits have a firm grasp of English, and communicate well
                                    across various channels and media</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-border-yellow-color border-radius-20 bg-transparent mb-5">
                    <div class="card-body bg-transparent p-4">
                        <div class="row align-items-center gx-lg-5">
                            <div class="col-lg-7 position-relative order-md-last order-sm-last order-xs-last">
                                <div class="num d-flex gap-3 align-items-end mb-4">
                                    <h4 class="display-5 font-bold mb-0">Top University <span class="color-yellow">Graduates</span></h4>
                                    <span class="flex-grow-1 text-center"><img src="{{ asset('images/num-04.png') }}" class="img-fluid"></span>
                                </div>
                                <p class="mb-0 text-black-50 w-75">Our team assesses skills, experience and work ethic. We’ve matched
                                    thousands of workers with satisfied clients.</p>
                            </div>
                            <div class="col-lg-5 text-center order-lg-last order-md-first order-sm-first order-xs-first my-sm-4 my-md-4 my-xs-4">
                                <img src="{{ asset('images/Top-University.png') }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="theme_button text-center">
                    <a href="{{ route('frontend.contact') }}" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">Schedule your FREE business strategy!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section 3 -->

    <!-- Section 4 -->
    <section class="py-5" id="about_secion_4">
        <div class="container">
            <h3 class="display-5 mb-1 mt-4 font-bold text-center">What <span class="color-yellow">Teams</span> Do
            </h3>
            <p class="fs-6 mb-1 text-black-50 text-center mb-5 w-75 m-auto">Working with us is like having your in-house team.
                The manpower you’ve always wanted. The difference is you do not need to train or manage us. We learn how you do
                your business and we take care of it your way.</p>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-radius-20 card-box-shadow border-0">
                        <div class="card-body bg-transparent">
                            <div class="teams_img text-sm-center">
                                <img src="{{ asset('images/customer_support.png') }}" class="img-fluid">
                            </div>
                            <h4 class="fs-5 font-bold my-3">Customer Support</h4>
                            <ul class="list-unstyled">
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> CRM database</li>
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Email support</li>
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Phone support</li>
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Live chat customer service</li>
                                <li class="mb-0 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Virtual receptionist service</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-radius-20 card-box-shadow border-0">
                        <div class="card-body bg-transparent">
                            <div class="teams_img text-sm-center">
                                <img src="./images/Sales-Enrichment.png" class="img-fluid">
                            </div>
                            <h4 class="fs-5 font-bold my-3">Sales Enrichment & Qualification</h4>
                            <ul class="list-unstyled">
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> B2C or B2B Lead generation</li>
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Lead qualification</li>
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Outbound calling service</li>
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2">Appointment setting</li>
                                <li class="mb-0 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Target market research</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 mb-4">
                    <div class="card border-radius-20 card-box-shadow border-0">
                        <div class="card-body bg-transparent">
                            <div class="teams_img text-sm-center">
                                <img src="./images/Administrative-Assistance.png " class="img-fluid">
                            </div>
                            <h4 class="fs-5 font-bold my-3">Administrative Assistance</h4>
                            <ul class="list-unstyled">
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Remote workforce management</li>
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Calendar management</li>
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Inbox management</li>
                                <li class="mb-1 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Social media management</li>
                                <li class="mb-0 fs-5 text-black-50"><img src="{{ asset('images/list-icon.png') }}" class="img-fluid me-2"> Data entry</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer-20"></div>
            <div class="theme_button text-center">
                <a href="{{ route('frontend.contact') }}" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">Schedule your FREE business strategy!</a>
            </div>
        </div>
    </section>
    <!-- End Section 4 -->

    <!-- Section 5 -->
    <section class="py-5" id="about_secion_5">
        <div class="container">
            <div class="row align-items-center text-md-center">
                <div class="col-lg-5 text-sm-center">
                    <img src="./images/customer_story.png" class="img-fluid">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h4 class="display-5 font-bold my-3"><span class="color-yellow">Customer</span> Story <br />Yacht life</h4>
                    <p class="fs-6 text-black-50">Yachtlife got a team to support its sales agents behind the scenes⁠ and achieved
                        stellar results⁠—demonstrating that with someone else handling routine work, your in-house team can focus on
                        the things they do best.</p>
                    <div class="theme_button mt-4">
                        <a href="#" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">LEARN ABOUT
                            OUR PROCESS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section 5 -->

    <!-- Section 6 -->
    <section class="py-5 background-light" id="about_secion_6">
        <div class="container">
            <div class="row gx-5 align-items-center mb-5">
                <div class="col-lg-6 text-md-center text-sm-center text-xs-center">
                    <img src="./images/grow-your-business-support.png" class="img-fluid">
                </div>
                <div class="col-lg-6 mt-lg-0 mt-md-4 mt-sm-4 mt-xs-4">
                    <h4 class="display-6 font-bold"><span class="color-yellow">Grow your business</span> one small step at a time.
                        Sign up for our newsletter to learn how.</h4>
                    <div class="spacer-20"></div>
                    <div class="supprt_form">
                        <div class="card border border-radius-20 bg-transparent">
                            <div class="card-body bg-transparent p-4">
                                <h3 class="border-bottom font-bold pb-3 mb-4">Sign Up</h3>
                                <form>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control border-radius-100 card-border-yellow-color" id="floating_Name" placeholder="Your Name">
                                        <label for="floating_Name">Your Name</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control border-radius-100 card-border-yellow-color" id="floating_Email" placeholder="Email Address">
                                        <label for="floating_Email">Email Address</label>
                                    </div>
                                    <div class="form_btn">
                                        <input type="submit" class="btn fs-5 btn-dark w-100 border-radius-100 p-2 text-uppercase border-0" value="Sign Up Now">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer-40"></div>
            <div class="card card-border-yellow-color border-radius-20 bg-transparent text-lg-start text-md-center text-sm-center text-xs-center">
                <div class="card-body bg-transparent p-4 pb-0">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="p-3">
                                <h4 class="display-5 font-bold mb-2">Ready to take your <span class="color-yellow">business</span> to
                                    the next level?</h4>
                                <p class="text-black-50 font-bold fs-6 mb-4">Learn what we can do with your budget and find the GROWTH
                                    OPPORTUNITIES in your business.</p>
                                <div class="theme_button mb-3">
                                    <a href="#" class="btn btn-theme-yellow rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">Get a
                                        FREE Business Assessment TODAY</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <img src="./images/free-business-assessment.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section 6 -->
@endsection

@push('after-scripts')
@endpush
