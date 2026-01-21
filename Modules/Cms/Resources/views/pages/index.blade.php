@extends('backend.layouts.app')

@section('title', __('CMS Pages'))

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
            @lang('CMS Pages')

            <div class="btn-toolbar float-md-right" role="toolbar">
                <div class="btn-group" role="group" aria-label="Third group">
                    <a href="{{ route('admin.cms.page.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus-circle"></i> Create a New Page
                    </a>
                </div>
            </div>
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
                <livewire:cms::page-table />
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
