@extends('backend.layouts.app')
@section('title', __('View ' . (Auth::user()->hasAllAccess() ? 'User' : 'Agent')))
@push('after-styles')
    <style>
        i.x {
            position: relative;
            bottom: 37px;
            right: 20px;
            border: 1px solid #c5c5c5;
            padding: 5px;
            border-radius: 50%;
            background: #000000;
            color: #FFFFFF;
        }
        .user-profile-image {
            height: 80px;
            width: 80px;
            object-fit: cover;
        }
    </style>
@endpush
@section('content')
    @php
        $routeName = $logged_in_user->hasAllAccess() ? 'user' : 'agent';
    @endphp
    <x-backend.card>
        <x-slot name="header">{{ __('View') }} {{ $logged_in_user->hasAllAccess() ? 'User' : 'Agent' }}</x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route(rolebased().'.auth.'.$routeName.'.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-striped table-bordered">
                @if($user->hasAllAccess())
                <tr>
                    <th>@lang('Type')</th>
                    <td>@include('backend.auth.user.includes.type')</td>
                </tr>
                @endif
                <tr>
                    <th>@lang('Avatar')</th>
                    <td>
                        <img src="{{ $user->image ? asset('uploads/profile/'.$user->id.'/'.$user->image) : $user->avatar }}"  class="user-profile-image" />
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="fas fa-user-edit x"></i></a></td>
                </tr>

                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>@lang('E-mail Address')</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>@lang('Status')</th>
                    <td>@include('backend.auth.user.includes.status', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('Verified')</th>
                    <td>@include('backend.auth.user.includes.verified', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('2FA')</th>
                    <td>@include('backend.auth.user.includes.2fa', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('Timezone')</th>
                    <td>{{ $user->timezone ?? __('N/A') }}</td>
                </tr>

                <tr>
                    <th>@lang('Last Login At')</th>
                    <td>
                        @if($user->last_login_at)
                            @displayDate($user->last_login_at)
                        @else
                            @lang('N/A')
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>@lang('Last Known IP Address')</th>
                    <td>{{ $user->last_login_ip ?? __('N/A') }}</td>
                </tr>

                @if ($user->isSocial())
                    <tr>
                        <th>@lang('Provider')</th>
                        <td>{{ $user->provider ?? __('N/A') }}</td>
                    </tr>

                    <tr>
                        <th>@lang('Provider ID')</th>
                        <td>{{ $user->provider_id ?? __('N/A') }}</td>
                    </tr>
                @endif

                <tr>
                    <th>@lang('Roles')</th>
                    <td>{!! $user->roles_label !!}</td>
                </tr>

                <tr>
                    <th>@lang('Additional Permissions')</th>
                    <td>{!! $user->permissions_label !!}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                @if ($user)
                    <strong>@lang('Account Created'):</strong> @if($user->created_at) @displayDate($user->created_at) ({{ $user->created_at->diffForHumans() }}) @endif,
                    <strong>@lang('Last Updated'):</strong> @if($user->updated_at) @displayDate($user->updated_at) ({{ $user->updated_at->diffForHumans() }}) @endif
                @endif

                {{-- <strong>@lang('Account Created'):</strong> @displayDate($user->created_at) ({{ $user->created_at->diffForHumans() ?? '' }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($user->updated_at) ({{ $user->updated_at->diffForHumans() ?? '' }}) --}}

                @if($user->trashed())
                    <strong>@lang('Account Deleted'):</strong> @displayDate($user->deleted_at) ({{ $user->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
    <x-modal.fileUploadModal :user="$user" :routeName="$routeName" />
@endsection
@push('after-scripts')
<script>
    $(document).ready(function() {
        window.filePreview = function(input) {
            if (input.files && input.files.length > 0) {
                const fileName = [...input.files].map(file => file.name).join(', ');
                $(input).siblings('.custom-file-label').html(fileName);
                const previewContainer = $(input).closest('.modal-body').find('.media_preview');
                const errorMessageContainer = $(input).closest('.modal-body').find('.error-message');
                previewContainer.html('');
                errorMessageContainer.removeClass('text-danger').text('');
                [...input.files].forEach(file => {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        if (file.type === 'application/pdf') {
                            errorMessageContainer.addClass('text-danger').text('PDF files are not supported.');
                        } else {
                            previewContainer.append('<img src="' + e.target.result + '" width="120" height="120" style="object-fit:cover; margin: 5px;"/>');
                        }
                    };
                    reader.readAsDataURL(file);
                });
            }
        };
    });
</script>
@endpush
