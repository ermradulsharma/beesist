@extends('backend.layouts.app')

@section('title', __('Deleted Users'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Users')
        </x-slot>

        <x-slot name="body">
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:backend.users-table status="deleted" />
            </div>
        </x-slot>
    </x-backend.card>
@endsection
