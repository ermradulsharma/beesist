<div aria-labelledby="addNewDropdownLink" class="dropdown-menu dropdown-menu-right py-0">
    <x-utils.link :href="route(rolebased() . '.properties.index')" :text="__('Property')" class="dropdown-item" style="gap: 0.8em;" icon="fas fa-building" />
    <x-utils.link :text="__('Page')" class="dropdown-item" style="gap: 0.8em;" icon="fas fa-copy" />
    <x-utils.link :href="route('pma.pmaRegisterForm', ['account_id' => Auth::user()->uuid])" :text="__('Send PMA')" class="dropdown-item" style="gap: 0.8em;" icon="fas fa-paper-plane" />
    <x-utils.link :href="route(rolebased() . '.tenant.index')" :text="__('Tenancy Applications')" class="dropdown-item" style="gap: 0.8em;" icon="fas fa-copy" />
    <x-utils.link :href="route(rolebased() . '.tenant.tenantAgreements')" :text="__('Tenancy Agreements')" class="dropdown-item" style="gap: 0.8em;" icon="fas fa-file-alt" />
    <x-utils.link :href="route(rolebased() . '.showings.scheduled')" :text="__('Schedule Showings')" class="dropdown-item" style="gap: 0.8em;" icon="fas fa-clock" />
    <x-utils.link :text="__('FAQs')" class="dropdown-item" style="gap: 0.8em;" icon="fas fa-question-circle" />
</div>
