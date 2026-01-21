@php session(['bootstrap_v' => 6]) @endphp
<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
@php
    $managerSetting = managerSettingData($subdomain);
    if ($managerSetting) {
        $logo_path = 'uploads/setting/' . $managerSetting->userId . '/' . $managerSetting->site->logo;
        $favicon_path = 'uploads/setting/' . $managerSetting->userId . '/' . $managerSetting->site->favicon;
        $logo = $managerSetting->site->logo && file_exists($logo_path) ? $logo_path : 'images/Beesist-Logo.png';
        $favicon = $managerSetting->site->logo && file_exists($favicon_path) ? $favicon_path : 'favicon.ico';
        $meta_title = $managerSetting->seo->metatitle ? $managerSetting->seo->metatitle : appName();
        $meta_description = $managerSetting->seo->metadescription ? $managerSetting->seo->metadescription : appName();
        $metakeyword = $managerSetting->seo->metakeyword ? $managerSetting->seo->metakeyword : appName();

        $header_bg = $managerSetting->header->normal->background ? $managerSetting->header->normal->background : null;
        $header_text_color = $managerSetting->header->normal->text ? $managerSetting->header->normal->text : null;
        $header_text_link = $managerSetting->header->normal->link ? $managerSetting->header->normal->link : null;
        $header_text_link_hover = $managerSetting->header->hover->link ? $managerSetting->header->hover->link : null;

        $button_bg = $managerSetting->button->normal->background ? $managerSetting->button->normal->background : null;
        $button_bg_hover = $managerSetting->button->hover->background ? $managerSetting->button->hover->background : null;
        $button_text = $managerSetting->button->normal->text ? $managerSetting->button->normal->text : null;
        $button_text_hover = $managerSetting->button->hover->text ? $managerSetting->button->hover->text : null;

        $footer_bg = $managerSetting->footer->normal->background ? $managerSetting->footer->normal->background : null;
        $footer_text_color = $managerSetting->footer->normal->text ? $managerSetting->footer->normal->text : null;
        $footer_text_link = $managerSetting->footer->normal->link ? $managerSetting->footer->normal->link : null;
        $footer_text_link_hover = $managerSetting->footer->hover->link ? $managerSetting->footer->hover->link : null;

        $copy_right_text = $managerSetting->footer->copy_right_text ? $managerSetting->footer->copy_right_text : null;
        $about = $managerSetting->footer->why_section ? $managerSetting->footer->why_section : null;

        $address = $managerSetting->bussiness->address ? $managerSetting->bussiness->address : 'Lorem Ipsum Store, Road Loren, ABC1452';
        $email = $managerSetting->bussiness->email ? $managerSetting->bussiness->email : 'info@forrentcentral.com';
        $phone = $managerSetting->bussiness->phone ? $managerSetting->bussiness->phone : '(123) 456-7890';
        $website = $managerSetting->bussiness->website ? $managerSetting->bussiness->website : null;
    } else {
        $logo = 'images/Beesist-Logo.png';
        $favicon = 'favicon.ico';
        $meta_title = $meta_description = $metakeyword = appName();
        $header_bg = $header_text_color = $header_text_link = $header_text_link_hover = $button_bg = $button_bg_hover = $button_text = $button_text_hover = $footer_bg = $footer_text_color = $footer_text_link = $footer_text_link_hover = $copy_right_text = $about = $website = null;
        $address = 'Lorem Ipsum Store, Road Loren, ABC1452';
        $email = 'info@forrentcentral.com';
        $phone = '(123) 456-7890';
    }
@endphp

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', @$meta_title) | {{ @$meta_title }}</title>
    <meta name="description" content="@yield('meta_description', $meta_description)">
    <meta name="keywords" content="@yield('meta_keywords', $metakeyword)">
    <meta name="author" content="@yield('meta_author', appName())">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="content-language" content="en-US" />
    <link rel="shortcut icon" href="{{ asset($favicon) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset($favicon) }}" type="image/x-icon">

    @yield('meta')
    @stack('before-styles')
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <livewire:styles />
    @stack('after-styles')
    <style>
        .sppiner {
            position: fixed;
            height: 100%;
            width: 100%;
            z-index: 1060;
            background: rgba(0, 0, 0, 0.6);
        }

        .spinner-border {
            position: fixed;
            top: 50%;
            left: 50%;
            z-index: 1062;
            color: var(--bs-yellow);
        }

        .footer_copyright {
            display: flex;
            align-items: center;
        }

        .footer_link {
            margin-bottom: 0px !important;
        }

        .card-header {
            background-color: transparent;
            border-bottom-color: #d8d8d8;
        }

        .card {
            border-color: #d8d8d8;
        }

        @if ($header_bg)
            .navbar.bg-white {
                background-color: {{ $header_bg }} !important;
            }
        @endif
        @if ($button_bg)
            .rounded-pill,
            .social_links li a,
            .btn:not(.apply_show_pop):not(.ask_question_pop):not(.btn-warning) {
                background-color: {{ $button_bg }} !important;
                color: {{ $button_text }} !important;
            }

            .rounded-pill:hover,
            .social_links li a:hover,
            .btn:not(.apply_show_pop):not(.ask_question_pop):not(.btn-warning):hover {
                background-color: {{ $button_bg_hover }} !important;
                color: {{ $button_text_hover }} !important;
                border-color: {{ $button_bg_hover }} !important;
            }

            .footer_about li i {
                border: 1px solid {{ $button_bg }} !important;
                color: {{ $button_bg }} !important;
            }

            .footer_about li:hover i {
                border: 1px solid {{ $button_bg_hover }} !important;
                color: {{ $button_text_hover }} !important;
                background: {{ $button_bg_hover }} !important;
            }
        @endif
        @if ($footer_bg)
            footer.bg-light-yellow {
                background-color: {{ $footer_bg }} !important;
            }

            footer .footer_bar.bg-yellow {
                background-color: {{ $footer_bg }} !important;
                border-top: 1px solid rgba(0, 0, 0, 0.3) !important;
            }
        @endif
        @if ($footer_text_color)
            footer div,
            footer li,
            footer .text-secondary,
            footer {
                color: {{ $footer_text_color }} !important;
            }
        @endif
        @if ($footer_text_link)
            footer a,
            footer a.text-secondary {
                color: {{ $footer_text_link }} !important;
            }

            footer a:hover,
            footer a.text-secondary:hover {
                color: {{ $footer_text_link_hover }} !important;
            }
        @endif
    </style>
</head>

<body>
    <div class="sppiner d-none">
        <div class="spinner-border"></div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container header">
                <x-utils.link :href="route('dynamic.index', ['subdomain' => $subdomain])" :text="appName()" class="navbar-brand">
                    <x-slot name="text">
                        <img alt="{{ appName() }}" src="{{ asset($logo) }}" style="width: auto; max-height: 60px;" />
                        <span class="caret"></span>
                    </x-slot>
                </x-utils.link>

                <div class="py-sx-3 py-sm-3">
                    <ul class="navbar-nav ms-auto ms-auto mb-2 mb-lg-0 gap-lg-4 gap-sm-1 gap-xs-1">
                        @if ($website)
                            <li class="nav-item">
                                <x-utils.link :href="$website" :text="__('Go to Home')" class="nav-link" />
                            </li>
                        @endif
                        <li class="nav-item">
                            <x-utils.link :href="route('dynamic.rentalEvaluation', ['subdomain' => $subdomain])" :active="activeClass(Route::is('frontend.index'))" :text="__('FREE RENTAL VALUATION')" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase" />
                        </li>
                    </ul>
                </div>
                <!--navbar-collapse-->
            </div>
            <!--container-->
        </nav>

        @if (config('boilerplate.frontend_breadcrumbs'))
            @include('frontend.includes.partials.breadcrumbs')
        @endif

        @include('includes.partials.messages')
        <main>
            @yield('content')
        </main>
    </div>

    <footer class="bg-light-yellow">
        <div class="footer_widgets py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <div class="bg-transparent border-0">
                            <a href="#"><img height="62px" src="{{ asset($logo) }}" width="auto"></a>
                            @if ($about)
                                <p class="my-4">{{ $about }}</p>
                            @else
                                <p class="my-4">Lorem ipsum dolor sit amet consectetur. Arcu tempus quis turpis nulla a sed. Pretium risus adipiscing aliquam placerat sapien risus ultrices volutpat. Porttitor sem malesuada magna urna porttitor. Lacus vitae eget egestas ac netus.</p>
                            @endif
                            <ul class="list-group list-group-horizontal gap-2 social_links">
                                <li class="list-group-item rounded-pill p-0 d-flex align-items-center justify-content-center">
                                    <a class="p-3 fs-3 d-flex align-items-center justify-content-center" href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="list-group-item rounded-pill p-0 d-flex align-items-center justify-content-center">
                                    <a class="p-3 fs-3 d-flex align-items-center justify-content-center" href="#"><i class="fab fa-linkedin"></i></a>
                                </li>
                                <li class="list-group-item rounded-pill p-0 d-flex align-items-center justify-content-center">
                                    <a class="p-3 fs-3 d-flex align-items-center justify-content-center" href="#"><i class="fab fa-facebook"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">

                    </div>

                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <div class="card bg-transparent border-0">
                            <div class="card-body ps-0 text-start">
                                <h5 class="card-title font-bold">Contact Info</h5>
                                <ul class="p-0 list-group list-unstyled footer_about">
                                    <li class="mb-3 text-secondary"><i class="fas fa-map-marker-alt"></i> {{ $address }}</li>
                                    <li class="mb-3"><i class="fas fa-phone-alt"></i> <a class="text-secondary text-decoration-none" href="tel:{{ $phone }}">{{ $phone }}</a></li>
                                    <li class="mb-3"><i class="fas fa-envelope"></i> <a class="text-secondary text-decoration-none" href="mailto:{{ $email }}">{{ $email }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer_bar p-3 bg-yellow">
            <div class="container">
                <div class="row footer_copyright">
                    <div class="col-lg-6">
                        @if ($copy_right_text)
                            <p class="copyright font-bold text-dark mb-0">{!! $copy_right_text !!}</p>
                        @else
                            <p class="copyright font-bold text-dark mb-0">Copyright © 2010-2024, <a class="text-dark text-decoration-none font-bold" href="{{ route('frontend.index') }}">{{ appName() }}</a>. <span class="d-block d-sm-inline">All Rights Reserved.</span></p>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <ul class="copyright-links font-bold list-unstyled footer_link">
                            <li><a class="text-dark text-decoration-none font-bold" href="{{ route('dynamic.termsConditions', ['subdomain' => $subdomain]) }}">Terms & Conditions</a></li>
                            <li><a class="text-dark text-decoration-none font-bold" href="{{ route('dynamic.privacyPolicy', ['subdomain' => $subdomain]) }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    <livewire:scripts />
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkh0MJV_FAoKEmmC5mKOwqb9sqoG-Fk8A&libraries=places,geometry&callback=initMapAndAutocomplete&loading=async"></script>
    <script src="https://cdn.jsdelivr.net/npm/markerclustererplus@2.1.4/dist/markerclusterer.min.js"></script>
    <script>
        function initMapAndAutocomplete() {
            if (typeof initMap === 'function') {
                initMap();
            }
            if (typeof initAutocomplete === 'function') {
                initAutocomplete();
            }
        }

        function toastAlert(type, message) {
            toastr.options = {
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };
            switch (type) {
                case 'success':
                    toastr.success(message);
                    break;
                case 'error':
                    toastr.error(message);
                    break;
                case 'warning':
                    toastr.warning(message);
                    break;
                case 'info':
                    toastr.info(message);
                    break;
                default:
                    toastr.info(message);
                    break;
            }
        }
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
    @stack('after-scripts')
</body>

</html>
