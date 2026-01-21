@if ($user->hasTwoFactorEnabled())
    <span class="badge badge-success" data-toggle="tooltip" title="{{ Timezone::convertToLocal($user->twoFactorAuth->enabled_at) }}">@lang('Yes')</span>
@else
    <span class="badge badge-danger">@lang('No')</span>
@endif
