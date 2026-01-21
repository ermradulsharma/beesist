<style>
    @media (min-width: 1200px) {
        body .navbar .container {
            max-width: 1440px;
        }
    }

    .navbar-header a,
    .navbar-collapse ul li a {
        color: var(--bs-white);
        text-decoration: none;
    }

    .navbar-collapse ul.dropdown-menu,
    .navbar-collapse ul.dropdown-menu li {
        background: var(--bs-black);
        width: 215px;
    }

    .navbar-collapse ul.dropdown-menu li {
        padding: 2.5px 12px;
        font-size: 16px;
        border-bottom: 1px solid #FFFFFF;
        line-height: 30px;
    }

    .navbar-collapse ul.dropdown-menu li:last-child {
        border: none;
    }

    .navbar-header a.navbar-toggle {
        float: right;
    }

    @media (max-width: 768px) {
        body .navbar .container .navbar-header {
            width: 100%;
        }

        .navbar-collapse ul {
            padding: 10px;
            border-top: 1px solid #ffffff1c;
        }
    }

    @media (max-width: 768px) and (min-width: 426px) {
        .navbar-collapse ul {
            width: 25%;
            float: inline-end;
        }
    }
</style>
<nav class="navbar sticky-lg-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route(rolebased() . '.dashboard') }}">
                <span><i class="fas fa-tachometer-alt"></i> Dashboard </span>
            </a>
            <a type="button" class="navbar-toggle collapsed d-lg-none" data-bs-toggle="collapse" data-bs-target="#navbar_top">
                <span class="navbar-toggler-icon"></span>
            </a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbar_top">
            <ul class="nav navbar-nav navbar-right mb-lg-0 gap-lg-4 gap-sm-1 gap-xs-1">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-plus-square"></i> Add New <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu py-0">
                        <li><a target="_blank" href="{{ route(rolebased() . '.properties.index') }}"><i class="fas fa-building"></i> Property</a></li>
                        <li><a target="_blank" href="#"><i class="far fa-copy"></i> Page</a></li>
                        <li><a target="_blank" href="{{ route(rolebased() . '.pma.sendPMA') }}"><i class="fas fa-paper-plane"></i> Send PMA</a></li>
                        <li><a target="_blank" href="{{ route(rolebased() . '.tenant.index') }}"><i class="far fa-copy"></i> Tenancy Applications</a></li>
                        <li><a target="_blank" href="{{ route(rolebased() . '.tenant.tenantAgreements') }}"><i class="far fa-file-alt"></i> Tenancy Agreements</a></li>
                        <li><a target="_blank" href="{{ route(rolebased() . '.showings.scheduled') }}"><i class="fas fa-clock"></i> Schedule Showings</a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-question-circle"></i> FAQs</a></li>
                    </ul>
                </li>
                @if (Auth::user()->hasAnyRole('Administrator'))
                    <li><a href="{{ route(rolebased() . '.clear-cache') }}" class="trackClick"><i class="fa fa-eraser" aria-hidden="true"></i> Clear Cache</a></li>
                @endif
                <li><a target="_blank" href="{{ route(rolebased() . '.account') }}"><i class="fas fa-user" aria-hidden="true"></i> Welcome {{ Auth::user()->first_name }} !</a></li>
                <li>
                    <a style="color: #FFFFFF; cursor: pointer;" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout </a>
                    <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                </li>
            </ul>
        </div>
    </div>
</nav>
