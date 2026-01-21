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

        .table.table-striped {
            min-width: 1200px;
        }

        .pac-container {
            z-index: 999999 !important;
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Request For Building')
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
                <livewire:property::request-building-table account_id='{{ Auth::user()->id }}' />
            </div>
        </x-slot>
    </x-backend.card>
    <x-modal.requestBuilding :countries="$countries" />
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

        window.addEventListener('openEditModal', event => {
            const building = event.detail[0];
            populateModalFields(building, false);
            document.getElementById('modalFooter').style.display = 'flex';
            $('#requestBuildingModal').modal('show');
        });
        window.addEventListener('openViewModal', event => {
            const building = event.detail[0];
            populateModalFields(building, true);
            document.getElementById('modalFooter').style.display = 'none';
            $('#requestBuildingModal').modal('show');
        });

        function populateModalFields(building, isReadOnly) {
            document.getElementById('requestId').value = building.id;
            document.getElementById('title').value = building.title;

            console.log(building);
            const location = JSON.parse(building.location);
            document.getElementById('rb_address').value = location.address;
            document.getElementById('rb_city').value = location.city;
            document.getElementById('rb_state').value = location.state;
            document.getElementById('rb_country').value = location.country;
            document.getElementById('rb_zip').value = location.zip;
            document.getElementById('rb_lat').value = location.latitude;
            document.getElementById('rb_long').value = location.longitude;
            document.getElementById('myeditorinstance').value = building.message;

            document.getElementById('title').readOnly = isReadOnly;
            document.getElementById('rb_address').readOnly = isReadOnly;
            document.getElementById('rb_city').readOnly = isReadOnly;
            document.getElementById('rb_state').readOnly = isReadOnly;
            document.getElementById('rb_country').disabled = isReadOnly;
            document.getElementById('rb_zip').readOnly = isReadOnly;
            document.getElementById('rb_lat').readOnly = isReadOnly;
            document.getElementById('rb_long').readOnly = isReadOnly;
            document.getElementById('myeditorinstance').readOnly = isReadOnly;
        }
    </script>
@endpush
