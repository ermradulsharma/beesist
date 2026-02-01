<td>
    @if ($row->type === \App\Domains\Auth\Models\User::TYPE_ADMIN)
    {{ __('Administrator') }}
    @elseif ($row->type === \App\Domains\Auth\Models\User::TYPE_USER)
    {{ __('User') }}
    @else
    N/A
    @endif
</td>

<td>
    {{ $row->name }}
</td>

<td>
    {!! $row->permissions_label !!}
</td>

<td>
    {{ $row->users_count }}
</td>

<td>
    @include('backend.auth.role.includes.actions', ['model' => $row])
</td>