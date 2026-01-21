@if ($user->isVerified())
    <span class="badge badge-success" data-toggle="tooltip" title="{{ Timezone::convertToLocal($user->email_verified_at) }}">@lang('Yes')</span>
@else
    <span class="badge badge-danger">@lang('No')</span>
@endif
