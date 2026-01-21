@extends('backend.layouts.app')
@section('title', __('Tenant'))

@push('after-styles')
    <style>
        .tenant-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

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

        .text-danger {
            color: red !important;
        }

        .d-md-flex.justify-content-between.mb-3 {
            flex-direction: row-reverse;
        }

        .d-md-flex.justify-content-between.mb-3 .d-md-flex {
            flex-direction: row-reverse;
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header" class="d-flex">
            <div>
                <h5>
                    @lang('All Tenancy End Notices')
                </h5>
            </div>
        </x-slot>
        <x-slot name="body" class="xxxx">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:tenant::tenancy-end-notice-table />
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
