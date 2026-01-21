@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            <livewire:property::appointment-calendar account_id='{{ Auth::user()->id }}' />
        </x-slot>
    </x-backend.card>
@endsection
