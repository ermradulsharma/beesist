@extends('backend.layouts.app')
@section('title', __(($logged_in_user->hasAllAccess() ? 'User' : 'Agent') . ' Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">{{ $logged_in_user->hasAllAccess() ? 'User' : 'Agent' }} {{ __('Management') }}</x-slot>

        @if ($logged_in_user->hasAllAccess() || $logged_in_user->hasManagerAccess())
            <x-slot name="headerActions">
                @php
                    $createUser = $logged_in_user->hasAllAccess() ? __('Create User') : __('Create Agent');
                    $routeName = $logged_in_user->hasAllAccess() ? 'user' : 'agent';
                @endphp
                <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route(rolebased() . '.auth.' . $routeName . '.create')" :text="$createUser" />
            </x-slot>
        @endif

        <x-slot name="body">
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:backend.users-table account_id='{{ Auth::user()->id }}' />
            </div>
        </x-slot>
    </x-backend.card>
@endsection
