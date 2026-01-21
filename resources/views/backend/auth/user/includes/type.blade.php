@if ($user->isAdmin())
    @lang('Administrator')
@elseif ($user->isUser())
    @lang('User')
@else
    @lang('N/A')
@endif
{{-- {{ $user->isAdmin() ? __('Administrator') : ($user->isUser() ? __('User') : __('N/A')) }} --}}

