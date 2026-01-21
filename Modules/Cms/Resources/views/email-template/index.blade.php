@extends('backend.layouts.app')
@section('title', __('E-mail Templates'))
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
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <h5>@lang('E-mail Templates')</h5>
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group" role="group" aria-label="Third group">
                        <a href="{{ route('admin.cms.emailTemplate.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle"></i> @lang('New E-mail Template')
                        </a>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="body">
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:cms::email-template-table />
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
