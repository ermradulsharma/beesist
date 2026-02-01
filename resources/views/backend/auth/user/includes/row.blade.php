<td>@include('backend.auth.user.includes.type', ['user' => $row])</td>
<td>{{ $row->name }}</td>
<td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
<td>@include('backend.auth.user.includes.verified', ['user' => $row])</td>
<td>@include('backend.auth.user.includes.2fa', ['user' => $row])</td>
<td>{!! $row->roles_label !!}</td>
<td>{!! $row->permissions_label !!}</td>
<td>@include('backend.auth.user.includes.actions', ['user' => $row])</td>