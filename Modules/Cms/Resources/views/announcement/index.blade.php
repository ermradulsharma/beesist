@extends('backend.layouts.app')
@section('title', __('Buildings'))
@push('after-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.min.css" />
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
            @lang('Announcements')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link icon="c-icon cil-plus" class="card-header-action" onclick="event.preventDefault(); $('#announcementModal').modal('show');" :text="__('Announcement')" />
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
                <livewire:cms::announcement-table />
            </div>
        </x-slot>
    </x-backend.card>
    <x-modal.announcementModal />
@endsection
@push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            'use strict';
            jQuery('#announcementModal .datetimepicker').datetimepicker({
                step: 1
            });
        });
    </script>
    <script src="{{ asset('js/autoCompleteAddress.js') }}"></script>
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.message,
            });
        });

        window.addEventListener('openEditModal', event => {
            const announcement = event.detail[0];
            console.log(announcement);
            populateModalFields(announcement);
            // document.getElementById('modalFooter').style.display = 'flex';
            $('#announcementModal').modal('show');
        });
        window.addEventListener('openViewModal', event => {
            const building = event.detail[0];
            populateModalFields(building, true);
            document.getElementById('modalFooter').style.display = 'none';
            $('#requestBuildingModal').modal('show');
        });

        function populateModalFields(announcement) {
            document.getElementById('requestId').value = announcement.id;
            document.getElementById('area').value = announcement.area;
            document.getElementById('type').value = announcement.type;
            document.getElementById('starts_at').value = announcement.starts_at;
            document.getElementById('ends_at').value = announcement.ends_at;
            document.getElementById('myeditorinstance').value = announcement.message;
            document.getElementById('enabled').checked = announcement.enabled == 1;
        }
    </script>
@endpush
