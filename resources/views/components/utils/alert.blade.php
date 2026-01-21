@props(['dismissable' => true, 'type' => 'success', 'ariaLabel' => __('Close'), 'bootstrap' => session()->get('bootstrap_v')])

@if (Auth::check() && (Auth::user()->hasAllAccess() || Auth::user()->hasManagerAccess()))
    @if ($bootstrap == 6)
        <div {{ $attributes->merge(['class' => 'alert alert-dismissible alert-' . $type]) }} role="alert">
            @if ($dismissable)
                <button type="button" class="btn-close rounded-0" data-bs-dismiss="alert" aria-label="{{ $ariaLabel }}"></button>
            @endif
            {{ $slot }}
        </div>
    @else
        <div {{ $attributes->merge(['class' => 'alert alert-dismissible alert-' . $type]) }} role="alert">
            @if ($dismissable)
                <button type="button" class="close rounded-0" data-dismiss="alert" aria-label="{{ $ariaLabel }}"><span aria-hidden="true">&times;</span></button>
            @endif
            {{ $slot }}
        </div>
    @endif
@else
    @if ($bootstrap == 6)
        <div {{ $attributes->merge(['class' => 'alert alert-dismissible alert-' . $type]) }} role="alert">
            @if ($dismissable)
                <button type="button" class="btn-close rounded-0" data-bs-dismiss="alert" aria-label="{{ $ariaLabel }}"></button>
            @endif
            {{ $slot }}
        </div>
    @else
        <div {{ $attributes->merge(['class' => 'alert alert-dismissible alert-' . $type]) }} role="alert">
            @if ($dismissable)
                <button type="button" class="close rounded-0" data-dismiss="alert" aria-label="{{ $ariaLabel }}"><span aria-hidden="true">&times;</span></button>
            @endif
            {{ $slot }}
        </div>
    @endif
@endif
