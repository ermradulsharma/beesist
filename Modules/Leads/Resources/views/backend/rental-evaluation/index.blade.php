@extends('backend.layouts.app')
@section('title', __('Rental Evalution'))
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

        .swal2-header {
            padding: 0 0rem !important;
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Rental Evalution')
        </x-slot>
        <x-slot name="body">
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:leads::rental-evaluation account_id='{{ Auth::user()->id }}' />
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
