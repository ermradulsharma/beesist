@php session(['bootstrap_v' => 4]) @endphp
<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>

<head>
    @include('backend.includes.head')
    @stack('before-styles')
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
    @livewireStyles
    @stack('after-styles')
    <style>
        .d-md-flex.justify-content-between.mb-3 {
            flex-direction: row-reverse;
        }

        .d-md-flex.justify-content-between.mb-3 .d-md-flex {
            flex-direction: row-reverse;
        }

        .container-fluid .p-0 div.row {
            flex-direction: row-reverse;
            align-items: center;
        }

        ul.dropdown-menu.w-100.mt-md-5.show {
            margin-top: 0.25rem !important;
        }

        .table.laravel-livewire-table [class^="bg-"] {
            color: unset;
        }

        /* .table.table-striped {
            min-width: 1200px !important;
        } */
    </style>
</head>

<body class="c-app">
    @include('backend.includes.sidebar')
    <div class="c-wrapper c-fixed-components">
        @include('backend.includes.header')
        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')
        @include('includes.partials.announcements')
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        @include('includes.partials.messages')
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
        @include('backend.includes.footer')
    </div>
    @stack('before-scripts')
    @livewireScripts
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/backend.js') }}"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkh0MJV_FAoKEmmC5mKOwqb9sqoG-Fk8A&libraries=places&callback=initMapAndAutocomplete&loading=async"></script>
    <script>
        function initMapAndAutocomplete() {
            if (typeof initMap === 'function') {
                initMap();
            }
            if (typeof initAutocomplete === 'function') {
                initAutocomplete('autocomplete');
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
    <script>
        @if (isset($errors) && $errors->any())
            toastr.options.timeOut = 10000;
            toastr.error(`@foreach ($errors->all() as $error) {{ $error }}<br/> @endforeach`);
        @endif

        @if (session()->get('flash_success'))
            toastr.options.timeOut = 10000;
            toastr.success(`{{ session()->get('flash_success') }}`);
        @endif

        @if (session()->get('flash_warning'))
            toastr.options.timeOut = 10000;
            toastr.warning(`{{ session()->get('flash_warning') }}`);
        @endif

        @if (session()->get('flash_info') || session()->get('flash_message'))
            toastr.options.timeOut = 10000;
            toastr.info(`{{ session()->get('flash_info') }}`);
        @endif

        @if (session()->get('flash_danger'))
            toastr.options.timeOut = 10000;
            toastr.error(`{{ session()->get('flash_danger') }}`);
        @endif

        @if (session()->get('status'))
            toastr.options.timeOut = 10000;
            toastr.success(`{{ session()->get('status') }}`);
        @endif

        @if (session()->get('resent'))
            toastr.options.timeOut = 10000;
            toastr.success(`@lang('A fresh verification link has been sent to your email address.')`);
        @endif

        @if (session()->get('verified'))
            toastr.options.timeOut = 10000;
            toastr.success(`@lang('Thank you for verifying your e-mail address.')`);
        @endif
    </script>

    @stack('after-scripts')
</body>

</html>
