@extends('backend.layouts.app')
@section('title', __('Rental Application'))

@push('after-styles')
    <style>
        .table th,
        .table td {
            padding: 0.4rem;
        }

        .table th {
            font-size: 12px;
        }

        .table thead th {
            white-space: nowrap;
        }

        /* .table.table-striped {
                min-width: 1200px;
            } */
        .d-md-flex.justify-content-between.mb-3 {
            flex-direction: row-reverse;
        }

        .d-md-flex.justify-content-between.mb-3 .d-md-flex {
            flex-direction: row-reverse;
        }

        /* .row .col-12.col-md-6.overflow-auto div {
                float: right;
            }
            .row div.col-12.col-md-6.text-center.text-md-right.text-muted {
                text-align: left !important;
            } */
        .container-fluid .p-0 div.row {
            flex-direction: row-reverse;
            align-items: center;
        }

        .swal2-actions {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between !important;
        }

        .progressPercent {
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            color: #FFFFFF
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Rental Application')
        </x-slot>
        <x-slot name="headerActions">
            @can('user.access.rental.create')
                <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('rental_application.rentalApplication')" :text="__('Add New Rental Application')" />
            @endcan
        </x-slot>
        <x-slot name="body">
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:rentalapplication::rental-application-table account_id='{{ Auth::user()->id }}' />
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
    <script>
        window.addEventListener('swal:confirmed', event => {
            Swal.fire({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type, // Use 'icon' instead of 'type'
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                showCloseButton: true,
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit(event.detail.function, event.detail.id);
                }
            });
        });
    </script>
@endpush
