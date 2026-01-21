{{-- @props(['active' => '', 'text' => '', 'hide' => false, 'icon' => false, 'permission' => false])

@if ($permission)
    @if ($logged_in_user->can($permission))
        @if (!$hide)
            <a {{ $attributes->merge(['href' => '#', 'class' => $active]) }}>@if ($icon)<i class="{{ $icon }}"></i> @endif{{ strlen($text) ? $text : $slot }}</a>
        @endif
    @endif
@else
    @if (!$hide)
        <a {{ $attributes->merge(['href' => '#', 'class' => $active]) }}>@if ($icon)<i class="{{ $icon }}"></i> @endif{{ strlen($text) ? $text : $slot }}</a>
    @endif
@endif --}}

@props(['active' => '', 'text' => '', 'hide' => false, 'icon' => false, 'permission' => false])

@if ($permission)
    @php
        $permissions = is_array($permission) ? $permission : [$permission];
        $canAccess = false;
        foreach ($permissions as $perm) {
            if ($logged_in_user->can($perm)) {
                $canAccess = true;
                break;
            }
        }
    @endphp
    @if ($canAccess)
        @if (!$hide)
            <a {{ $attributes->merge(['href' => '#', 'class' => $active]) }}>
                @if ($icon)
                    <i class="{{ $icon }}"></i>
                @endif{{ strlen($text) ? $text : $slot }}
            </a>
        @endif
    @endif
@else
    @if (!$hide)
        <a {{ $attributes->merge(['href' => '#', 'class' => $active]) }}>
            @if ($icon)
                <i class="{{ $icon }}"></i>
            @endif{{ strlen($text) ? $text : $slot }}
        </a>
    @endif
@endif
