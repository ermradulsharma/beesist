<style>
    .footer_copyright {
        display: flex;
        align-items: center;
    }
    .footer_link {
        margin-bottom: 0px !important;
    }
</style>
<footer class="bg-light-yellow">
    <div class="footer_widgets py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3 mb-lg-0">
                    <div class="bg-transparent border-0">
                        <a href="#"><img height="62px" src="{{ asset('images/Beesist-Logo.png') }}" width="auto"></a>
                        <p class="my-4">Lorem ipsum dolor sit amet consectetur. Arcu tempus quis turpis nulla a sed. Pretium risus adipiscing aliquam placerat sapien risus ultrices volutpat. Porttitor sem malesuada magna urna porttitor. Lacus vitae eget egestas ac netus.</p>
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
                <div class="col-lg-2 mb-3 mb-lg-0">
                    <div class="card bg-transparent border-0">
                        <div class="card-body ps-0 text-start">
                            <h5 class="card-title font-bold">Pages</h5>
                            <ul class="p-0 list-group list-unstyled">
                                <li class="mb-2">
                                    <x-utils.link :href="route('frontend.index')" :active="activeClass(Route::is('frontend.index'))" :text="__('Home')" class="text-secondary text-decoration-none" />
                                </li>
                                <li class="mb-2">
                                    <x-utils.link :href="route('frontend.about')" :active="activeClass(Route::is('frontend.about'))" :text="__('About')" class="text-secondary text-decoration-none" />
                                </li>
                                <li class="mb-2">
                                    <x-utils.link :href="route('frontend.solution')" :active="activeClass(Route::is('frontend.solution'))" :text="__('Solution')" class="text-secondary text-decoration-none" />
                                </li>
                                <li class="mb-2">
                                    <x-utils.link :href="route('frontend.resources')" :active="activeClass(Route::is('frontend.resources'))" :text="__('Resources')" class="text-secondary text-decoration-none" />
                                </li>
                                <li class="mb-2">
                                    <x-utils.link :href="route('frontend.contact')" :active="activeClass(Route::is('frontend.contact'))" :text="__('Contact')" class="text-secondary text-decoration-none" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="card bg-transparent border-0">
                        <div class="card-body ps-0 text-start">
                            <h5 class="card-title font-bold">About</h5>
                            <ul class="p-0 list-group list-unstyled footer_about">
                                <li class="mb-3 text-secondary"><i class="fas fa-map-marker-alt"></i> Lorem Ipsum Store, Road Loren, ABC1452</li>
                                <li class="mb-3"><i class="fas fa-phone-alt"></i> <a class="text-secondary text-decoration-none" href="tel:1234567890">(123) 456-7890</a></li>
                                <li class="mb-3"><i class="fas fa-envelope"></i> <a class="text-secondary text-decoration-none" href="mailto:info@forrentcentral.com">info@forrentcentral.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card bg-transparent border-0">
                        <div class="card-body ps-0 text-start">
                            <h5 class="card-title font-bold">Resources</h5>
                            <ul class="p-0 list-group list-unstyled">
                                {{-- <li class="mb-2">
                                    <x-utils.link :href="route('rental_application.rentalApplication')" :active="activeClass(Route::is('rental_application.rentalApplication'))" :text="__('Rental Application')" class="text-secondary text-decoration-none" />
                                </li> --}}
                                <li class="mb-2">
                                    <x-utils.link :href="route('properties.index')" :active="activeClass(Route::is('properties.index'))" :text="__('Properties')" class="text-secondary text-decoration-none" />
                                </li>
                                <li class="mb-2">
                                    <x-utils.link :href="route('buildings.index')" :active="activeClass(Route::is('buildings.index'))" :text="__('Buildings')" class="text-secondary text-decoration-none" />
                                </li>
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
                    <p class="copyright font-bold text-dark mb-0">Copyright © 2010-2024, <a class="text-dark text-decoration-none font-bold" href="{{ route('frontend.index') }}">{{ appName() }}</a>. <span class="d-block d-sm-inline">All Rights Reserved.</span></p>
                </div>
                <div class="col-lg-6">
                    <ul class="copyright-links font-bold list-unstyled footer_link">
                        <li><a class="text-dark text-decoration-none font-bold" href="{{ route('frontend.terms') }}">Terms & Conditions</a></li>
                        <li><a class="text-dark text-decoration-none font-bold" href="{{ route('frontend.privacy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
