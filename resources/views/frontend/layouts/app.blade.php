@php session(['bootstrap_v' => 6]) @endphp
<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>

<head>
    @include('backend.includes.head')
    @yield('meta')
    @stack('before-styles')
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    @livewireStyles
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
    </style>
</head>

<body>
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')
    @include('includes.partials.announcements')
    <div class="sppiner d-none">
        <div class="spinner-border"></div>
    </div>
    <div id="app">
        @auth
        @if (Auth::user()->hasAnyRole('Administrator', 'Property Manager', 'Property Owner', 'Agent'))
        @include('backend.includes.partials._navigation')
        @endif
        @endauth
        @include('frontend.includes.nav')
        @include('includes.partials.messages')
        <main>
            @yield('content')
        </main>
    </div>
    @include('frontend.includes.footer')
    @include('frontend.includes.searchModal')

    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    @livewireScripts
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkh0MJV_FAoKEmmC5mKOwqb9sqoG-Fk8A&libraries=places&callback=initMapAndAutocomplete&loading=async"></script>
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
    </script>
    @if (Session::has('message'))
    <script>
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
    </script>
    @endif
    @stack('after-scripts')
</body>

</html>