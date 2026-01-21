<style>
    #notificationDropdownLink:after {
        display: none;
    }
</style>
<header class="c-header c-header-light c-header-fixed">
    <button class="c-header-toggler c-class-toggler d-lg-none" type="button" data-target="#sidebar" data-class="c-sidebar-show"><i class="c-icon c-icon-lg cil-menu"></i></button>
    <a class="c-header-brand d-lg-none" href="{{ route(rolebased() . '.dashboard') }}"><img src="{{ asset('images/Beesist-Logo.png') }}" class="c-sidebar-brand-full" width="118" height="46"></a>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><i class="c-icon c-icon-lg cil-menu"></i></button>
    <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('frontend.index') }}">@lang('Home')</a></li>
        @if (config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
            <li class="c-header-nav-item dropdown">
                <x-utils.link :text="__(getLocaleName(app()->getLocale()))" class="c-header-nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                @include('includes.partials.lang')
            </li>
        @endif
    </ul>
    <ul class="c-header-nav d-md-down-none ml-auto mr-4">
        <li class="c-header-nav-item">
            <x-utils.link :href="route('frontend.index')" :text="__('Goto Website')" icon="fas fa-external-link-alt" class="c-header-nav-link" style="gap: 0.4em;" target="__blank" />
        </li>
        <li class="c-header-nav-item">
            <x-utils.link :text="__('Add New')" icon="fa fa-plus-square" class="c-header-nav-link dropdown-toggle" id="addNewDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="gap: 0.4em;" />
            @include('includes.partials.navBar')
        </li>

        @if ($logged_in_user->hasAllAccess())
            <li class="c-header-nav-item">
                <x-utils.link :href="route(rolebased() . '.clear-cache')" :text="__('Clear Cache')" icon="fa fa-eraser" class="c-header-nav-link" style="gap: 0.4em;" />
            </li>
        @endif

        <li class="c-header-nav-item">
            <x-utils.link icon="fas fa-bell" class="c-header-nav-link dropdown-toggle" id="notificationDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
            @include('includes.partials.navBar')
        </li>

        <li class="c-header-nav-item">
            <x-utils.link class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <x-slot name="text">
                    <div class="c-avatar mr-2">
                        <img class="c-avatar-img" src="{{ $logged_in_user->image ? asset('uploads/profile/' . $logged_in_user->id . '/' . $logged_in_user->image) : $logged_in_user->avatar }}" style="height: 100%;" alt="{{ $logged_in_user->email ?? '' }}">
                        {{-- <span class="hidden-xs">{{ Auth::user()->first_name }}</span> --}}
                    </div>
                    <span class="hidden-xs">{{ Auth::user()->first_name }}</span>
                </x-slot>
            </x-utils.link>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2"><strong>@lang('Account')</strong></div>
                <x-utils.link :href="route(rolebased() . '.account')" :text="__('Profile')" class="dropdown-item" icon="c-icon mr-2 cil-user" />
                <x-utils.link class="dropdown-item" icon="c-icon mr-2 cil-account-logout" :text="__('Logout')" onclick="event.preventDefault();document.getElementById('logout-form').submit();" />
                <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
            </div>
        </li>
    </ul>
    <div class="c-subheader justify-content-between px-3">
        @include('backend.includes.partials.breadcrumbs')
        <div class="c-subheader-nav mfe-2">
            @yield('breadcrumb-links')
        </div>
    </div>
</header>
