@extends('backend.layouts.app')
@section('title', __('Buildings'))
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

        .pac-container {
            z-index: 999999 !important;
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Buildings')
        </x-slot>
        <x-slot name="headerActions">
            @can('user.access.building.create')
                <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route(rolebased() . '.buildings.create')" :text="__('Add New Building')" />
            @endcan
            @if ($logged_in_user->hasRole('Property Manager'))
                <x-utils.link icon="c-icon cil-plus" class="card-header-action" onclick="event.preventDefault(); $('#requestBuildingModal').modal('show');" :text="__('Request For Building')" />
            @endif
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
                <livewire:property::buildings-table />
            </div>

        </x-slot>
    </x-backend.card>
    <x-modal.requestBuilding :countries="$countries"></x-modal.requestBuilding>
@endsection

@push('after-scripts')
    <script src="{{ asset('js/autoCompleteAddress.js') }}"></script>
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.message,
            });
        });
    </script>
@endpush
