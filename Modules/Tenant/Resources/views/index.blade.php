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
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            <h5>
                @lang('Add Applicant')
            </h5>
        </x-slot>
        <x-slot name="body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <form id="apply" method="POST" action="{{ route(rolebased() . '.tenant.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-2 pr-0">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-2 pr-0">
                        <div class="form-group">
                            <input type="text" class="form-control" name="lname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-md-2 pr-0">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-2 pr-0">
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="col-md-2 pr-0">
                        <div class="form-group">
                            <select id="prop_id" class="form-control" name="prop_id">
                                <option value="">Select Property</option>
                                @foreach ($properties as $property)
                                    <option value="{{ $property->id }}">{{ $property->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="hidden" name="by_admin" value="YES">
                            <button type="submit" class="btn btn-primary btn-md btn-block">Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-backend.card>
    <x-backend.card>
        <x-slot name="header" class="d-flex">
            <div>
                <h5>
                    @lang('Tenant')
                </h5>
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
                <livewire:tenant::tenant-table />
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
    @push('after-scripts')
        <script>
            window.addEventListener('swal:confirmed', event => {
                // let confirmButtonText = event.detail.id ? 'Confirm' : '';
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
