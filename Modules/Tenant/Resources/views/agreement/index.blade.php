@extends('backend.layouts.app')
@section('title', __('Tenant'))

@push('after-styles')
@endpush
@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Tenant Agreements')
            @can('user.access.tenancy.add')
                <div class="btn-toolbar float-md-right" role="toolbar">
                    <div class="btn-group" role="group" aria-label="Third group">
                        <a href="{{ route('tenant.agreementForm') }}" title="New Agreement" class="btn btn-primary btn-sm" target="_blank">
                            <i class="fa fa-plus-circle"></i> {{ __('Add New Agreement') }}
                        </a>
                    </div>
                </div>
            @endcan
        </x-slot>
        <x-slot name="body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:tenant::tenant-agreement-table account_id='{{ Auth::user()->id }}' />
            </div>
        </x-slot>
    </x-backend.card>
@endsection
@push('after-scripts')
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.message,
            });
        });
    </script>
@endpush
