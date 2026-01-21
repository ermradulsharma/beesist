<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <img src="{{ asset('images/Beesist-Logo.png') }}" class="c-sidebar-brand-full" width="118" height="46">
        <img src="{{ asset('images/beesist-icon.png') }}" class="c-sidebar-brand-minimized" width="46" height="46">
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link class="c-sidebar-nav-link" :href="route(rolebased() .'.dashboard')" :active="activeClass(Route::is(rolebased() .'.dashboard'), 'c-active')" icon="c-sidebar-nav-icon cil-speedometer" :text="__('Dashboard')" />
        </li>

        @if ($logged_in_user->hasAnyRole('Administrator', 'Property Manager', 'Property Owner', 'Agent'))
            @if (isModuleEnabled('Property'))
                {{-- Building --}}
                @if($logged_in_user->canAny(['user.access.building', 'user.access.building.view', 'user.access.building.request', 'user.access.building.request.list', 'user.access.building.request.create', 'user.access.building.request.edit', 'user.access.building.request.delete', 'user.access.building.request.view', 'user.access.building.request.approve', 'user.access.building.request.cancel', 'user.access.building.request.decline']))
                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is([rolebased() .'.buildings.*']), 'c-open c-show') }}">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-building" class="c-sidebar-nav-dropdown-toggle" :text="__('Buildings')" />
                        <ul class="c-sidebar-nav-dropdown-items">
                            @if($logged_in_user->canAny(['user.access.building']) || $logged_in_user->canAny(['user.access.building.view']))
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link :href="route(rolebased() .'.buildings.index')" class="c-sidebar-nav-link" :text="__('All Buildings')" :active="activeClass(Route::is(rolebased() .'.buildings.*'), 'c-active')" />
                                </li>
                            @endif
                            @if($logged_in_user->canAny(['user.access.building.request']) || $logged_in_user->canAny(['user.access.building.request', 'user.access.building.request.list', 'user.access.building.request.create', 'user.access.building.request.edit', 'user.access.building.request.delete', 'user.access.building.request.view', 'user.access.building.request.approve', 'user.access.building.request.cancel', 'user.access.building.request.decline']))
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link :href="route(rolebased() .'.buildings.request')" class="c-sidebar-nav-link" :text="__('Building Request')" :active="activeClass(Route::is(rolebased() .'.buildings.*'), 'c-active')" />
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                {{-- Property & Buildings --}}
                @if($logged_in_user->canAny(['user.access.property', 'user.access.property.view']))
                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is([rolebased() .'.properties.*']), 'c-open c-show') }}">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-building" class="c-sidebar-nav-dropdown-toggle" :text="__('Properties')" />
                        <ul class="c-sidebar-nav-dropdown-items">
                            @if($logged_in_user->canAny(['user.access.property']) || $logged_in_user->canAny(['user.access.property.view']))
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route(rolebased() .'.properties.index')" class="c-sidebar-nav-link" :text="__('Properties')" :active="activeClass(Route::is(rolebased() .'.properties.*'), 'c-active')" />
                            </li>
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route(rolebased() .'.properties.performanceReport')" class="c-sidebar-nav-link" :text="__('Performance Report')" :active="activeClass(Route::is(rolebased() .'.properties.*'), 'c-active')" />
                            </li>
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route(rolebased() .'.properties.sentPerformanceReport')" class="c-sidebar-nav-link" :text="__('Sent Performance Reports')" :active="activeClass(Route::is(rolebased() .'.properties.*'), 'c-active')" />
                            </li>
                            @endif
                        </ul>
                    </li>
                @endif

                {{-- Showing --}}
                @if($logged_in_user->canAny(['user.access.showing', 'user.access.showing.list', 'user.access.showing.scheduled.list', 'user.access.showing.request.list', 'user.access.showing.questions.list', 'user.access.showing.view']))
                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is(rolebased() .'.showings.*'), 'c-open c-show') }}">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-clock" class="c-sidebar-nav-dropdown-toggle" :text="__('Showings')" />
                        <ul class="c-sidebar-nav-dropdown-items">
                            @if($logged_in_user->canAny(['user.access.showing.list']))
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link :href="route(rolebased() .'.showings.index')" class="c-sidebar-nav-link" :text="__('Schedule Showings')" :active="activeClass(Route::is(rolebased() .'.showings.index'), 'c-active')" />
                                </li>
                            @endif
                            {{-- @dump($logged_in_user->canAny(['user.access.showing.scheduled.list'])) --}}
                            @if($logged_in_user->canAny(['user.access.showing.scheduled.list']))
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route(rolebased() .'.showings.scheduled')" class="c-sidebar-nav-link" :text="__('Scheduled Showings')" :active="activeClass(Route::is(rolebased() .'.showings.scheduled'), 'c-active')" />
                            </li>
                            @endif
                            @if($logged_in_user->canAny(['user.access.showing.request.list']))
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route(rolebased() .'.showings.requests')" class="c-sidebar-nav-link" :text="__('Showings Requests')" :active="activeClass(Route::is(rolebased() .'.showings.requests'), 'c-active')" />
                            </li>
                            @endif
                            @if($logged_in_user->canAny(['user.access.showing.questions.list']))
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route(rolebased() .'.showings.questions')" class="c-sidebar-nav-link" :text="__('Asked Questions')" :active="activeClass(Route::is(rolebased() .'.showings.questions'), 'c-active')" />
                            </li>
                            @endif
                        </ul>
                    </li>
                @endif
            @endif

            @if (isModuleEnabled('RentalApplication'))
                @if($logged_in_user->canAny(['user.access.rental.list', 'user.access.rental.view', 'user.access.rental.screening.list', 'user.access.rental.screening.view']))
                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is([rolebased() .'.rental_application.*']), 'c-open c-show') }}">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-apps" class="c-sidebar-nav-dropdown-toggle" :text="__('Rental Application')" />
                        <ul class="c-sidebar-nav-dropdown-items">
                            @if ($logged_in_user->canAny(['user.access.rental.list', 'user.access.rental.view']))
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link :href="route(rolebased() .'.rental_application.index')" class="c-sidebar-nav-link" :text="__('All Rental Application')" :active="activeClass(Route::is(rolebased() .'.rental_application.index') || Route::is(rolebased() .'.rental_application.leasingApplication'), 'c-active')" />
                                </li>
                            @endif
                            @if ($logged_in_user->canAny(['user.access.rental.screening.list', 'user.access.rental.screening.view']))
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link :href="route(rolebased() .'.rental_application.screeningQuestion')" class="c-sidebar-nav-link" :text="__('Screening Questions')" :active="activeClass(Route::is(rolebased() .'.rental_application.screeningQuestion'), 'c-active')" />
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is([rolebased() .'.rental_evaluation.*']), 'c-open c-show') }}">
                    <x-utils.link href="#" icon="c-sidebar-nav-icon cil-apps" class="c-sidebar-nav-dropdown-toggle" :text="__('Rental Evaluation')" />
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route(rolebased() .'.rental_evaluation.index')" class="c-sidebar-nav-link" :text="__('All Rental Evaluation Request')" :active="activeClass(Route::is(rolebased() .'.rental_evaluation.*'), 'c-active')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route(rolebased() .'.rental_evaluation.evaluationForm')" class="c-sidebar-nav-link" :text="__('Send Rental Evaluation')" :active="activeClass(Route::is(rolebased() .'.rental_evaluation.*'), 'c-active')" />
                        </li>
                    </ul>
                </li>
            @endif

            @if (isModuleEnabled('Leads'))
                @if($logged_in_user->canAny(['user.access.pma', 'user.access.pma.send', 'user.access.pma.list']))
                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is([rolebased() .'.leads.*']), 'c-open c-show') }}">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-envelope-letter" class="c-sidebar-nav-dropdown-toggle" :text="__('PMA')" />
                        <ul class="c-sidebar-nav-dropdown-items">
                            @if ($logged_in_user->canAny(['user.access.pma', 'user.access.pma.list']))
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link :href="route(rolebased() .'.pma.index')" class="c-sidebar-nav-link" :text="__('Signed PMA')" :active="activeClass(Route::is(rolebased() .'.pma.*'), 'c-active')" />
                                </li>
                            @endif
                            @if ($logged_in_user->canAny(['user.access.pma.send']))
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link :href="route(rolebased() .'.pma.sendPMA')" class="c-sidebar-nav-link" :text="__('Send PMA')" :active="activeClass(Route::is(rolebased() .'.pma.*'), 'c-active')" />
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            @endif

            @if (isModuleEnabled('Tenant'))
                @if($logged_in_user->canAny(['user.access.tenancy', 'user.access.tenancy.view', 'user.access.tenancy.list']))
                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is(['admin.tenant.*']), 'c-open c-show') }}">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-applications" class="c-sidebar-nav-dropdown-toggle" :text="__(' Tenant')" />
                        <ul class="c-sidebar-nav-dropdown-items">
                            @if ($logged_in_user->can('user.access.tenancy.tenant'))
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route(rolebased() .'.tenant.index')" class="c-sidebar-nav-link" :text="__('Tenancy Applications')" :active="activeClass(Route::is(rolebased() .'.tenant.index'), 'c-active')" />
                            </li>
                            @endif
                            @if ($logged_in_user->can('user.access.tenancy.list'))
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route(rolebased() .'.tenant.tenantAgreements')" class="c-sidebar-nav-link" :text="__('Tenancy Agreements')" :active="activeClass(Route::is(rolebased() .'.tenant.agreements'), 'c-active')" />
                            </li>
                            @endif
                            @if ($logged_in_user->can('user.access.pma.notice'))
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route(rolebased() .'.tenant.tenancyEndNotice')" class="c-sidebar-nav-link" :text="__('Tenancy End Notices')" :active="activeClass(Route::is(rolebased() .'.tenant.tenancyEndNotice'), 'c-active')" />
                            </li>
                            @endif
                        </ul>
                    </li>
                @endif
            @endif

            @if ($logged_in_user->hasAllAccess())
                @if (isModuleEnabled('FormBuilder'))
                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('formbuilder::forms.*') || Route::is('formbuilder::forms.*'), 'c-open c-show') }}">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-spreadsheet" class="c-sidebar-nav-dropdown-toggle" :text="__('Forms')" />
                        <ul class="c-sidebar-nav-dropdown-items">
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('formbuilder::forms.index')" class="c-sidebar-nav-link" :text="__('Forms')" :active="activeClass(Route::is('formbuilder::forms.*'), 'c-active')" />
                            </li>
                        </ul>
                    </li>
                @endif

                @if (isModuleEnabled('Cms'))
                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.page.*') || Route::is('admin.cms.page.*'), 'c-open c-show') }}">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-screen-desktop" class="c-sidebar-nav-dropdown-toggle" :text="__('CMS')" />
                        <ul class="c-sidebar-nav-dropdown-items">
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.cms.page.index')" class="c-sidebar-nav-link" :text="__('Pages')" :active="activeClass(Route::is('admin.cms.page.*'), 'c-active')" />
                            </li>
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.cms.emailTemplate.index')" class="c-sidebar-nav-link" :text="__('Email Templates')" :active="activeClass(Route::is('admin.cms.email_template.*'), 'c-active')" />
                            </li>
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.cms.announcement.index')" class="c-sidebar-nav-link" :text="__('Announcement')" :active="activeClass(Route::is('admin.cms.announcement.*'), 'c-active')" />
                            </li>
                        </ul>
                    </li>
                @endif

                @if (isModuleEnabled('Notifications'))
                    <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is(['admin.notification.*']), 'c-open c-show') }}">
                        <x-utils.link href="#" icon="c-sidebar-nav-icon cil-bullhorn" class="c-sidebar-nav-dropdown-toggle" :text="__('Notification')" />
                        <ul class="c-sidebar-nav-dropdown-items">
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.notification.index')" class="c-sidebar-nav-link" :text="__('Notification')" :active="activeClass(Route::is('admin.notification.index'), 'c-active')" />
                            </li>
                            {{-- <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.tenant.tenantAgreements')" class="c-sidebar-nav-link" :text="__('Tenancy Agreements')" :active="activeClass(Route::is('admin.tenant.agreements'), 'c-active')" />
                            </li>
                            <li class="c-sidebar-nav-item">
                                <x-utils.link :href="route('admin.tenant.tenancyEndNotice')" class="c-sidebar-nav-link" :text="__('Tenancy End Notices')" :active="activeClass(Route::is('admin.tenant.tenancyEndNotice'), 'c-active')" />
                            </li> --}}
                        </ul>
                    </li>
                @endif

                <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.subscription.subscribe.*') || Route::is('admin.subscription.services*') || Route::is('admin.subscription.packages.*'), 'c-open c-show') }}">
                    <x-utils.link href="#" icon="c-sidebar-nav-icon cil-screen-desktop" class="c-sidebar-nav-dropdown-toggle" :text="__('Subscription')" />
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route('admin.subscription.services.index')" class="c-sidebar-nav-link" :text="__('Services')" :active="activeClass(Route::is('admin.subscription.services*'), 'c-active')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route('admin.subscription.packages.index')" class="c-sidebar-nav-link" :text="__('Packages')" :active="activeClass(Route::is('admin.subscription.packages.*'), 'c-active')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route('admin.subscription.subscribe')" class="c-sidebar-nav-link" :text="__('Subscribers')" :active="activeClass(Route::is('admin.subscription.subscribe.*'), 'c-active')" />
                        </li>
                    </ul>
                </li>

                <li class="c-sidebar-nav-title">@lang('System')</li>
                <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                    <x-utils.link href="#" icon="c-sidebar-nav-icon cil-user" class="c-sidebar-nav-dropdown-toggle" :text="__('Access')" />
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route('admin.auth.user.index')" class="c-sidebar-nav-link" :text="__('User Management')" :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route('admin.auth.role.index')" class="c-sidebar-nav-link" :text="__('Role Management')" :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    </ul>
                </li>

                {{-- Term & Conditions And Privacy Policy  --}}
                <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                    <x-utils.link href="#" icon="c-sidebar-nav-icon cil-user" class="c-sidebar-nav-dropdown-toggle" :text="__('Settings')" />
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route(rolebased() .'.termsCondition')" class="c-sidebar-nav-link" :text="__('Terms & Condition')" :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route(rolebased() .'.privacyPolicy')" class="c-sidebar-nav-link" :text="__('Privacy Policy')" :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    </ul>
                </li>

                <li class="c-sidebar-nav-dropdown">
                    <x-utils.link href="#" icon="c-sidebar-nav-icon cil-list" class="c-sidebar-nav-dropdown-toggle" :text="__('Logs')" />
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route('log-viewer::dashboard')" class="c-sidebar-nav-link" :text="__('Dashboard')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route('log-viewer::logs.list')" class="c-sidebar-nav-link" :text="__('Logs')" />
                        </li>
                    </ul>
                </li>
            @endif

            @if ($logged_in_user->hasRole('Property Manager') && $logged_in_user->hasManagerAccess())
                <li class="c-sidebar-nav-item">
                    <x-utils.link class="c-sidebar-nav-link" :href="route('manager.mySubscription')" :active="activeClass(Route::is('frontend.user.mySubscriptions'), 'c-active')" icon="c-sidebar-nav-icon cil-tag" :text="__('My Subscriptions')" />
                </li>
                <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('manager.auth.agent.*'), 'c-open c-show') }}">
                    <x-utils.link :href="route('manager.auth.agent.index')" icon="c-sidebar-nav-icon cil-user" class="c-sidebar-nav-link" :text="__('Agents')" :active="activeClass(Route::is('manager.auth.agent.*'), 'c-active')" />
                </li>
                <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is(rolebased() .'.termsCondition') || Route::is(rolebased() .'.privacyPolicy'), 'c-open c-show') }}">
                    <x-utils.link href="#" icon="c-sidebar-nav-icon cil-settings" class="c-sidebar-nav-dropdown-toggle" :text="__('Settings')" />
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route(rolebased() .'.termsCondition')" class="c-sidebar-nav-link" :text="__('Terms & Condition')" :active="activeClass(Route::is(rolebased() .'.termsCondition'), 'c-active')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route(rolebased() .'.privacyPolicy')" class="c-sidebar-nav-link" :text="__('Privacy Policy')" :active="activeClass(Route::is(rolebased() .'.privacyPolicy'), 'c-active')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link :href="route(rolebased() .'.generalSetting')" class="c-sidebar-nav-link" :text="__('General Setting')" :active="activeClass(Route::is(rolebased() .'.generalSetting'), 'c-active')" />
                        </li>
                    </ul>
                </li>
            @endif
        @endif
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
<!--sidebar-->
