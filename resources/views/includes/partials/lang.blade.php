<div aria-labelledby="navbarDropdownLanguageLink" class="dropdown-menu dropdown-menu-right py-0">
    @foreach (collect(config('boilerplate.locale.languages'))->sortBy('name') as $code => $details)
        @if ($code !== app()->getLocale())
            <x-utils.link :href="route('locale.change', $code)" class="dropdown-item">
                <x-slot name="text">
                    <img class="me-2 rounded-1" height="18px" src="{{ asset('images/' . $code . '-flag.jpg') }}" style="max-height: 20px" width="22px" />
                    <span class="pl-2">{{ __(getLocaleName($code)) }}</span>
                </x-slot>
            </x-utils.link>
        @endif
    @endforeach
</div>
<!--dropdown-menu-->
