@extends('backend.layouts.app')
@section('title', __('Rental Application'))

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

        .btn-close {
            border: 0 transparent;
            background: #FFFFFF;
        }

        .btn-close:focus {
            border: 0 transparent !important;
            background: #FFFFFF !important;
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Screening Questions')
            @can('user.access.rental.screening.create')
                <div class="btn-toolbar float-md-right" role="toolbar">
                    <div class="btn-group" role="group" aria-label="Third group">
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addScreeningQuestionModal" wire:click="openModal()">
                            <i class="fa fa-plus-circle"></i> @lang('New Screening Question')
                        </a>
                    </div>
                </div>
            @endcan
        </x-slot>
        <x-slot name="body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:rentalapplication::screening-question-table account_id='{{ Auth::user()->id }}' />
            </div>
            <livewire:rentalapplication::add-screening-question-modal account_id='{{ Auth::user()->id }}' />
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
        Livewire.on('closeModal', () => {
            $('#addScreeningQuestionModal').modal('hide');
        });
    </script>
@endpush
