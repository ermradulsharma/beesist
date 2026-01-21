@extends('backend.layouts.app')

@section('title', __('PMA Forms'))

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
            @lang('PMA Forms')
        </x-slot>
        <x-slot name="body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <livewire:backend.page-table />
        </x-slot>
    </x-backend.card>
@endsection

@push('after-scripts')
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire(event.detail.message, event.detail.text, event.detail.type);
        });
    </script>
@endpush
