    <div class="c-wrapper c-fixed-components">

        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        @include('includes.partials.messages')
                        @yield('content')
                    </div>
                    <!--fade-in-->
                </div>
                <!--container-fluid-->
            </main>
        </div>
        <!--c-body-->
    </div>
    <!--c-wrapper-->

    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/backend.js') }}"></script>

    <script type="text/javascript">
        window.FormBuilder = {
            csrfToken: '{{ csrf_token() }}',
        }
    </script>
    <script src="{{ asset('vendor/formbuilder/js/jquery-ui.min.js') }}" defer></script>
    <script src="{{ asset('vendor/formbuilder/js/sweetalert.min.js') }}" defer></script>

    <script src="{{ asset('vendor/formbuilder/js/jquery-formbuilder/form-render.min.js') }}" defer></script>
    <script src="{{ asset('vendor/formbuilder/js/parsleyjs/parsley.min.js') }}" defer></script>
