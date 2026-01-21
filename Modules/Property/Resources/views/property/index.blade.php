@extends('backend.layouts.app')

@section('title', __('Properties'))

@push('after-styles')
    <style>
        .table th,
        .table td {
            padding: 0.6rem;
        }

        .table th {
            font-size: 12px;
        }

        .table thead th {
            white-space: nowrap;
        }

        .table.table-striped {
            min-width: 1200px;
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Properties')
        </x-slot>
        <x-slot name="headerActions">
            @can('user.access.property.create')
                <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route(rolebased() . '.properties.create')" :text="__('Add New Property')" />
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
                <livewire:property::property-table account_id='{{ Auth::user()->id }}' />
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
