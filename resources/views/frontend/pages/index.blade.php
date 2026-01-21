@extends('frontend.layouts.app')
@section('title', __('Home'))
@push('after-styles')
    <style>

    </style>
@endpush

@section('content')
    <!-- Section 1-->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-3 font-bold">We build systems to help you <span class="color-yellow">grow your business.</span></h1>
                    <p class="fs-4 font-bold text-black-80">We are your in-house business growth team that you do not need to train or manage.</p>
                    <p class="text-black-50">Many small business owners handle all aspects of their business until there is no time to work on what matters. We help small business owners to have a business that works without them. We document and optimize
                        your workflows. If needed, we hire, train, and manage your team to execute your workflows.</p>
                    <div class="theme_button d-lg-flex mt-5 gap-1">
                        <a class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase" href="{{ route('frontend.contact') }}">Schedule your FREE business strategy!</a>
                        <a class="btn outline rounded-pill px-4 py-2 text-uppercase" href="{{ route('frontend.about') }}">LEARN ABOUT OUR PROCESS</a>
                    </div>
                </div>
                <div class="col-lg-5 gx-5 text-md-center text-sm-center text-xs-center mt-lg-0 mt-md-4 mt-sm-4 mt-xs-4">
                    <img class="img-fluid" src="{{ asset('images/grow-your-business.png') }}">
                </div>
            </div>
        </div>
    </section>
    <!-- End Section 1-->
    <!-- Section 2-->
    <section class="py-5">
        <div class="container">
            <div class="p-5 text-center position-relative" id="what_we_do">
                <span class="left-top"></span>
                <span class="left-center"></span>
                <span class="left-bottom"></span>
                <span class="right-top"></span>
                <span class="right-bottom"></span>
                <h2 class="display-6 mb-1 mt-4 font-bold">What <span class="color-yellow">Do</span> We <span class="color-yellow">Do?</span></h2>
                <p class="fs-5 color-yellow mb-1 font-bold">From Lead Generation to Customer Support, We take care of your business the way you do.</p>
                <p class="mb-5">Working with us is like having your in-house team. The manpower you’ve always wanted. The difference is you do not need to train or manage us. We learn how you do your business and we take care of it your way.</p>
            </div>
        </div>
    </section>
    <!-- End Section 2-->

    <!-- Section 3-->
    <section class="py-5">
        <div class="container">
            <div class="position-relative mb-5" id="how_can_help">
                <h3 class="display-6 mb-1 mt-4 font-bold text-center">How can we <span class="color-yellow">help?</span></h3>
                <p class="fs-6 mb-1 text-black-50 font-semi text-center">Working with us is like having your in-house team. The manpower you’ve always wanted. The difference is you do not need to train or manage us. We learn how you do your business and
                    we take care of it your way.</p>
            </div>
            <div class="row how_can_help">
                <div class="col-lg-4">
                    <div class="card card-border-yellow-color">
                        <div class="card-body text-center p-4">
                            <div class="box_icon d-flex align-items-center justify-content-center">
                                <img class="img-fluid" src="{{ asset('images/lead-generation.png') }}">
                            </div>
                            <h4 class="font-bold text-black my-4">Lead Generation <br>& Follow Up</h4>
                            <p class="my-4">We help you develop your marketing strategy and execute it. From campaigns to personalized follow up.</p>
                            <div class="theme_button">
                                <a class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-sm-4 mt-md-4 mt-xs-4">
                    <div class="card card-border-yellow-color">
                        <div class="card-body text-center p-4">
                            <div class="box_icon d-flex align-items-center justify-content-center">
                                <img class="img-fluid" src="{{ asset('images/work-optimization.png') }}">
                            </div>
                            <h4 class="font-bold text-black my-4">Workflow Optimization and Automation Custom Web Solutions</h4>
                            <p class="my-4">We get you a website that converts. We hire and train a dedicated assistant to do business the same way you do.</p>
                            <div class="theme_button">
                                <a class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-sm-4 mt-md-4 mt-xs-4">
                    <div class="card card-border-yellow-color">
                        <div class="card-body text-center p-4">
                            <div class="box_icon d-flex align-items-center justify-content-center">
                                <img class="img-fluid" src="{{ asset('images/vip-customer.png') }}">
                            </div>
                            <h4 class="font-bold text-black my-4">VIP Customer Experience Every time</h4>
                            <p class="my-4">Treat every customer like VIP. Get back to your customers fast without picking up the phone yourself.</p>
                            <div class="theme_button">
                                <a class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section 3-->

    <!-- Section 4-->
    <section class="py-5 background-light">
        <div class="container">
            <div class="position-relative" id="how_works">
                <h3 class="display-6 mb-1 mt-4 font-bold text-center">How it <span class="color-yellow">Works</span></h3>
                <p class="fs-5 mb-1 text-black font-bold text-center mb-5">We review what they need - our customer success</p>
                <div class="card card-border-yellow-color border-radius-20 bg-transparent mb-5">
                    <div class="card-body bg-transparent p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-7 position-relative">
                                <div class="num d-flex gap-3 align-items-end mb-4">
                                    <h4 class="display-5 font-bold mb-0">Discover</h4>
                                    <span class="flex-grow-1 text-center"><img class="img-fluid" src="{{ asset('images/num-01.png') }}"></span>
                                </div>
                                <p class="mb-0 text-black-50">Lorem ipsum dolor sit amet consectetur. Hac eget velit arcu lectus lacus egestas. Odio at viverra quam arcu nisl. Non pellentesque quam eu interdum morbi. Nibh egestas ac dui vitae pharetra
                                    tortor vitae. Arcu varius in facilisis pulvinar malesuada eget mattis. Elit ut pharetra imperdiet lobortis. Morbi proin lacus et tristique aenean amet massa. Vitae lacinia aenean tristique </p>
                            </div>
                            <div class="col-lg-5 text-center mt-sm-4 mt-md-4 mt-xs-4">
                                <img class="img-fluid" src="{{ asset('images/Discover-img.png') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-border-yellow-color border-radius-20 bg-transparent mb-5">
                    <div class="card-body bg-transparent p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-5 text-center order-lg-first order-md-last order-sm-last order-xs-last mt-sm-4 mt-md-4 mt-xs-4">
                                <img class="img-fluid" src="{{ asset('images/onboarding-img.png') }}">
                            </div>
                            <div class="col-lg-7 position-relative order-md-first order-sm-first order-xs-first">
                                <div class="num d-flex gap-3 align-items-end mb-4">
                                    <h4 class="display-5 font-bold mb-0">Onbording</h4>
                                    <span class="flex-grow-1 text-center"><img class="img-fluid" src="{{ asset('images/num-02.png') }}"></span>
                                </div>
                                <p class="mb-0 text-black-50">Lorem ipsum dolor sit amet consectetur. Hac eget velit arcu lectus lacus egestas. Odio at viverra quam arcu nisl. Non pellentesque quam eu interdum morbi. Nibh egestas ac dui vitae pharetra
                                    tortor vitae. Arcu varius in facilisis pulvinar malesuada eget mattis. Elit ut pharetra imperdiet lobortis. Morbi proin lacus et tristique aenean amet massa. Vitae lacinia aenean tristique </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-border-yellow-color border-radius-20 bg-transparent">
                    <div class="card-body bg-transparent p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-7 position-relative">
                                <div class="num d-flex gap-3 align-items-end mb-4">
                                    <h4 class="display-5 font-bold mb-0">Get Result</h4>
                                    <span class="flex-grow-1 text-center"><img class="img-fluid" src="{{ asset('images/num-03.png') }}"></span>
                                </div>
                                <p class="mb-0 text-black-50">Lorem ipsum dolor sit amet consectetur. Hac eget velit arcu lectus lacus egestas. Odio at viverra quam arcu nisl. Non pellentesque quam eu interdum morbi. Nibh egestas ac dui vitae pharetra
                                    tortor vitae. Arcu varius in facilisis pulvinar malesuada eget mattis. Elit ut pharetra imperdiet lobortis. Morbi proin lacus et tristique aenean amet massa. Vitae lacinia aenean tristique </p>
                            </div>
                            <div class="col-lg-5 text-center mt-sm-4 mt-md-4 mt-xs-4">
                                <img class="img-fluid" src="{{ asset('images/get-result-img.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section 4-->

    <!-- Section 5-->
    <section class="py-5">
        <div class="container">
            <div class="card card-border-yellow-color border-radius-20 bg-transparent text-lg-start text-md-center text-sm-center text-xs-center">
                <div class="card-body bg-transparent p-4 pb-0">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="p-3">
                                <h4 class="display-5 font-bold mb-2">Ready to take your <span class="color-yellow">business</span> to the next level?</h4>
                                <p class="text-black-50 font-bold fs-6 mb-4">Learn what we can do with your budget and find the GROWTH OPPORTUNITIES in your business.</p>
                                <div class="theme_button mb-3">
                                    <a class="btn btn-theme-yellow rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block" href="#">Get a FREE Business Assessment TODAY</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <img class="img-fluid" src="{{ asset('images/free-business-assessment.png') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer-40"></div>
            <div class="row my-5">
                <div class="col-lg-6 text-md-center text-sm-center text-xs-center">
                    <img class="img-fluid" src="{{ asset('images/virtual-assistant.png') }}">
                </div>
                <div class="col-lg-6 mt-lg-0 mt-md-4 mt-sm-4 mt-xs-4">
                    <h4 class="display-5 font-bold">With the Right <span class="color-yellow">Virtual Assistant</span> by your Side, you're Unstoppable</h4>
                    <p>What do the world's most successful entrepreneurs have in common? The ability to delegate and keep every day free of energy-zapping tasks.</p>
                    <p>They know that having an assistant isn't a luxury - an assistant is an essential tool and vital to their success.</p>
                    <p>Whether you want to grow your business, maximize your billable time, spend more time at home or simply feel less stressed and disorganized, an assistant will make all the difference.</p>
                    <div class="spacer-20"></div>
                    <div class="theme_button">
                        <a class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block" href="#">Get a FREE Business Assessment TODAY</a>
                    </div>
                </div>
            </div>
            <div class="spacer-20"></div>
            <div class="row my-5 align-items-center">
                <div class="col-lg-6">
                    <h4 class="display-5 font-bold">How <span class="color-yellow">{{ appName() }}</span> helps you take care of your <span class="color-yellow">business</span></h4>
                    <div class="card card-border-yellow-color border-radius-20 bg-transparent mb-3">
                        <div class="card-body bg-transparent p-3">
                            <h5 class="font-bold mb-2">More time for your family, friends or whatever matters to you.</h5>
                            <p class="text-black-50 mb-0">We take care of the repetitive tasks so you can focus on what matters. We are your in-house team. We take care of all scheduling, pick up your phone, follow up, and provide customer support.</p>
                        </div>
                    </div>
                    <div class="card card-border-yellow-color border-radius-20 bg-transparent mb-3">
                        <div class="card-body bg-transparent p-3">
                            <h5 class="font-bold mb-2">Consistent service delivery. Your business done your way.</h5>
                            <p class="text-black-50 mb-0">Everyone is doing the work their own way, but you want your service to be delivered the way you do. We document and optimize your processes. No matter who delivers the service, it will be
                                delivered the way you want.</p>
                        </div>
                    </div>
                    <div class="card card-border-yellow-color border-radius-20 bg-transparent">
                        <div class="card-body bg-transparent p-3">
                            <h5 class="font-bold mb-2">We help you deliver VIP customer experience to your clients.</h5>
                            <p class="text-black-50 mb-0">Clients these days expect a quick response, but you have work to do. We treat all your clients like VIPs. Even if you are not available, we answer the phone, emails, and are available for your
                                clients when you can’t be.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-md-4 mt-sm-4 mt-xs-4">
                    <img class="img-fluid" src="{{ asset('images/growth-rider-business.png') }}">
                </div>
            </div>
            <div class="spacer-20"></div>
            <div class="row my-5 gx-5 align-items-center">
                <div class="col-lg-6 text-md-center text-sm-center text-xs-center">
                    <img class="img-fluid" src="{{ asset('images/grow-your-business-support.png') }}">
                </div>
                <div class="col-lg-6 mt-lg-0 mt-md-4 mt-sm-4 mt-xs-4">
                    <h4 class="display-6 font-bold"><span class="color-yellow">Grow your business</span> one small step at a time. Sign up for our newsletter to learn how.</h4>
                    <div class="spacer-40"></div>
                    <div class="supprt_form">
                        <div class="card border border-radius-20 bg-transparent">
                            <div class="card-body bg-transparent p-4">
                                <h3 class="border-bottom font-bold pb-3 mb-4">Sign Up</h3>
                                <form>
                                    <div class="form-floating mb-3">
                                        <input class="form-control border-radius-100 card-border-yellow-color" id="floating_Name" placeholder="Your Name" type="text">
                                        <label for="floating_Name">Your Name</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input class="form-control border-radius-100 card-border-yellow-color" id="floating_Email" placeholder="Email Address" type="email">
                                        <label for="floating_Email">Email Address</label>
                                    </div>
                                    <div class="form_btn">
                                        <input class="btn fs-5 btn-dark w-100 border-radius-100 p-2 text-uppercase border-0" type="submit" value="Sign Up Now">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer-20"></div>
            <div class="card card-border-yellow-color border-radius-20 bg-transparent my-5 mb-0 text-lg-start text-md-center text-sm-center text-xs-center">
                <div class="card-body bg-transparent p-4 pb-0">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="p-3">
                                <h4 class="display-5 font-bold mb-2">Have a <span class="color-yellow">Question?</span></h4>
                                <p class="text-black-50 fs-6 mb-3">Lorem ipsum dolor sit amet consectetur. Urna amet tempus morbi amet eget velit nisl amet. Lacus quam eget vitae turpis.</p>
                                <div class="spacer-20"></div>
                                <div class="theme_button mb-3">
                                    <a class="btn btn-theme-yellow rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block" href="#">Get a FREE Business Assessment TODAY</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <img class="img-fluid" src="{{ asset('images/have-a-question.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section 5-->
@endsection

@push('after-scripts')
@endpush
