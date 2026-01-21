@extends('backend.layouts.app')
@section('title', __('Package'))

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

        .swal2-header {
            padding: 0 0rem !important;
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Packages List')
            <div class="btn-toolbar float-md-right" role="toolbar">
                <div class="btn-group" role="group" aria-label="Third group">
                    <a href="{{ route('admin.subscription.packages.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus-circle"></i> {{ __('Add Package') }}
                    </a>
                </div>
            </div>
        </x-slot>
        <x-slot name="body">
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:backend.package-table />
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
@push('after-scripts')
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
                className: 'swal-button'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit(event.detail.function, event.detail.id);
                }
            });
        });
    </script>
@endpush
