<style>
    @media screen and (min-width: 1440px) {
        .container.header {
            max-width: 1440px !important;
        }
    }

    @media (max-width: 1440px) {
        body .container.header {
            max-width: 1440px !important;
        }
    }
</style>
<!-- TopBar Header -->
<div class="d-md-block d-lg-none topbar bg-yellow sticky-top p-2" style="z-index: 9999;position: sticky;">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-2">
                @if (config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
                <div class="dropdown">
                    <x-utils.link :text="__(getLocaleName(app()->getLocale()))" aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle p-1 border" data-bs-toggle="dropdown" id="navbarDropdownLanguageLink">
                        <x-slot name="text">
                            <img class="me-2 rounded-1" height="18px" src="{{ asset('images/' . app()->getLocale() . '-flag.jpg') }}" style="max-height: 20px" width="22px" />
                            <span class="caret"></span>
                        </x-slot>
                    </x-utils.link>
                    @include('includes.partials.lang')
                </div>
                @endif
            </div>
            <div class="col-md-7 col-10">
                <form action="#" method="POST">
                    <div class="form_inner d-lg-flex justify-content-center position-relative">
                        <div class="search-table flex-grow-1">
                            <input class="form-control" name="%s%" placeholder="Search Here..." type="text">
                        </div>
                        <div class="search_btn">
                            <input name="submit" type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col">
                <div class="theme_button text-md-end text-sm-center">
                    <a class="w-sm-100 btn btn-dark rounded-pill px-4 py-1 border-0 text-uppercase" href="#">Talk to Us</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End TopBar Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container header">
        <x-utils.link :href="route('frontend.index')" :text="appName()" class="navbar-brand">
            <x-slot name="text">
                <img alt="{{ appName() }}" src="{{ asset('images/Beesist-Logo.png') }}" style="width: auto; height: 50px;" />
                <span class="caret"></span>
            </x-slot>
        </x-utils.link>

        <a aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('Toggle navigation')" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" type="button">
            <span class="navbar-toggler-icon"></span>
        </a>

        <div class="collapse navbar-collapse py-sx-3 py-sm-3" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 gap-lg-4 gap-sm-1 gap-xs-1">
                <li class="nav-item">
                    <x-utils.link :href="route('frontend.index')" :active="activeClass(Route::is('frontend.index'))" :text="__('Home')" class="nav-link" />
                </li>
                <li class="nav-item">
                    <x-utils.link :href="route('frontend.subscription')" :active="activeClass(Route::is('frontend.subscription'))" :text="__('Pricing')" class="nav-link" />
                </li>
                <li class="nav-item">
                    <x-utils.link :href="route('frontend.about')" :active="activeClass(Route::is('frontend.about'))" :text="__('About')" class="nav-link" />
                </li>
                <li class="nav-item">
                    <x-utils.link :href="route('frontend.solution')" :active="activeClass(Route::is('frontend.solution'))" :text="__('Solution')" class="nav-link" />
                </li>
                <li class="nav-item">
                    <x-utils.link :href="route('frontend.resources')" :active="activeClass(Route::is('frontend.resources'))" :text="__('Resources')" class="nav-link" />
                </li>
                <li class="nav-item">
                    <x-utils.link :href="route('frontend.contact')" :active="activeClass(Route::is('frontend.contact'))" :text="__('Contact')" class="nav-link" />
                </li>
                {{-- <li class="nav-item">
                    <x-utils.link :href="route('rental_application.rentalApplication')" :active="activeClass(Route::is('frontend.contact'))" :text="__('Rental')" class="nav-link" />
                </li> --}}

                {{-- <li class="nav-item dropdown">
                    <x-utils.link aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre>
                        <x-slot name="text">PMA Applications <span class="caret"></span>
                        </x-slot>
                    </x-utils.link>

                    <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                        <x-utils.link :href="route('frontend.airbnbManagementAgreement')" :text="__('Airbnb management agreement')" class="dropdown-item" />
                        <x-utils.link :href="route('frontend.VacationRentalManagementAgreement')" :text="__('Vacation rental management agreement')" class="dropdown-item" />
                    </div>
                </li> --}}

                {{-- @guest
                    <li class="nav-item">
                        <x-utils.link :href="route('frontend.auth.login')" :active="activeClass(Route::is('frontend.auth.login'))" :text="__('Login')" class="nav-link" />
                    </li>

                    @if (config('boilerplate.access.user.registration'))
                        <li class="nav-item">
                            <x-utils.link :active="activeClass(Route::is('frontend.auth.register'))" :text="__('Register')" :href="route('frontend.auth.register')" class="nav-link" />

                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <x-utils.link aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre>
                            <x-slot name="text">
                                <img class="rounded-circle" src="{{ $logged_in_user->avatar }}" style="max-height: 20px" />
                {{ $logged_in_user->name }} <span class="caret"></span>
                </x-slot>
                </x-utils.link>

                <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                    @if ($logged_in_user->isAdmin())
                    <x-utils.link :href="route('admin.dashboard')" :text="__('Administration')" class="dropdown-item" />
                    @endif

                    @if ($logged_in_user->isUser())
                    <x-utils.link :href="route('frontend.user.dashboard')" :active="activeClass(Route::is('frontend.user.dashboard'))" :text="__('Dashboard')" class="dropdown-item" />
                    @endif

                    <x-utils.link :href="route('frontend.user.account')" :active="activeClass(Route::is('frontend.user.account'))" :text="__('My Account')" class="dropdown-item" />

                    <x-utils.link :text="__('Logout')" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" class="d-none" id="logout-form" />
                        </x-slot>
                    </x-utils.link>
                </div>
                </li>
                @endguest --}}
            </ul>
        </div>
        <!--navbar-collapse-->

        @if (config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
        <div class="dropdown mx-4 d-md-none d-sm-none d-xs-none d-lg-block">
            <x-utils.link :text="__(getLocaleName(app()->getLocale()))" aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle p-1 border" data-bs-toggle="dropdown" id="navbarDropdownLanguageLink">
                <x-slot name="text">
                    <img class="me-2 rounded-1" height="18px" src="{{ asset('images/' . app()->getLocale() . '-flag.jpg') }}" style="max-height: 20px" width="22px" />
                    {{ __(getLocaleName(app()->getLocale())) }} <span class="caret"></span>
                </x-slot>
            </x-utils.link>
            @include('includes.partials.lang')
        </div>
        @endif

        <!--End Flag Drpdown -->
        <button class="btn d-md-none d-sm-none d-xs-none d-lg-block rounded-0 text-secondary px-4 border-start border-end" data-bs-target="#exampleModalCenter" data-bs-toggle="modal" type="button">
            <i class="fas fa-search"></i>
        </button>
        <!-- Header Button-->
        <div class="theme_button d-md-none d-sm-none d-xs-none d-lg-block ms-4">
            <a class="btn btn-dark rounded-pill px-4 py-1 border-0 text-uppercase" href="#">Talk to Us</a>
        </div>
        <!--End Header Button-->

        @guest
        <div class="theme_button d-md-none d-sm-none d-xs-none d-lg-block ms-4">
            <a class="btn btn-dark rounded-pill px-4 py-1 border-0 text-uppercase" href="{{ route('frontend.auth.login') }}">Login</a>
        </div>
        @else
        <div class="theme_button d-md-none d-sm-none d-xs-none d-lg-block ms-4">
            <a class="btn btn-dark rounded-pill px-4 py-1 border-0 text-uppercase" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>
            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
        </div>
        @endguest


    </div>
    <!--container-->
</nav>

@if (config('boilerplate.frontend_breadcrumbs'))
@include('frontend.includes.partials.breadcrumbs')
@endif