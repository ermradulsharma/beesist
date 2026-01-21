@extends('backend.layouts.app')
@section('title', __('Show Properties'))
@push('after-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.min.css" />
    <style>
        .livewire-datatables table {
            overflow-x: hidden;
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

        /* .table.table-striped {
            min-width: 1200px;
        } */
        #showing_dates {
            position: relative;
            padding-bottom: 30px;
        }

        .modal .form-control {
            border-radius: 0;
        }

        .r-group .form-group {
            position: relative;
            padding-right: 0px;
        }

        .r-group .form-group label {
            font-size: 11px;
            height: 10px;
            line-height: 10px;
            position: absolute;
            top: -5px;
            left: 9px;
            background: #fff;
            padding: 0 5px;
            text-transform: uppercase;
            font-weight: 700;
        }
    </style>
@endpush
@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Schedule Showings')
            @can('user.access.showing.scheduleMultiple')
                <div class="btn-toolbar float-md-right" role="toolbar">
                    <div class="btn-group" role="group" aria-label="Third group">
                        <a href="{{ route(rolebased() . '.showings.scheduleMultiple') }}" title="Schedule Multiple" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle"></i> {{ __('Schedule Multiple') }}
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
                <livewire:property::schedule-showing-table account_id='{{ Auth::user()->id }}' />
            </div>
        </x-slot>
    </x-backend.card>
    <x-modal.scheduleModal :agents="$agents" />
@endsection
@push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/customDateTimePicker.js') }}"></script>
    <script type="text/javascript">
        $("#ScheduleMore").click(function() {
            $('#sh_error').hide();
            $('#ScheduleForm').show();
            $('#ScheduleFormResponse').hide();
            $('#showing_dates input, #comments').val('');
            $('#ScheduleForm button').prop("disabled", false);
        });

        $("#done").click(function() {
            $('button.close').trigger("click");
        });

        $(function() {
            $('#scheduleModal').on('show.coreui.modal', function(event) {
                var button = $(event.relatedTarget);
                var propid = button.data('propid');
                var propname = button.data('propname');
                var modal = $(this);
                $('#sh_error').hide();
                $('#showing_date, #comments, #prop_id, #showing_dates input').val('');
                $('#ScheduleForm').show();
                $('#ScheduleFormResponse').hide();
                modal.find('#prop_id').val(propid);
                modal.find('#prop_title').val(propname);
                $('#ScheduleForm button').prop("disabled", false);
                $("#ajax_loader").css('visibility', 'hidden');
            });
        });

        $('#ScheduleForm form').on('submit', function(e) {
            e.preventDefault();
            $('#sh_error').hide();
            var form = $(this);
            $("#ajax_loader").css('visibility', 'visible');
            var prop_id = $('#prop_id').val();
            var prop_title = $('#prop_title').val();
            var prop_agent = $('#prop_agent').val();
            var showing_date = $('#showing_date').val();
            var comments = $('#comments').val();
            $.ajax({
                method: "POST",
                url: "{{ route(rolebased() . '.showings.store') }}",
                data: form.serialize(),
                success: function(data) {
                    if (data.error) {
                        $('#sh_error').text(data.error).show();
                    } else {
                        $('#sh_error').hide();
                        $('#sh_prop_name').text(data.prop_title);
                        $('#sh_date').html(data.showing_date);
                        $('#sh_agent').text(data.prop_agent);
                        $('#ScheduleForm').hide();
                        $('#ScheduleFormResponse').show();
                    }
                    $('#ScheduleForm button').prop("disabled", false);
                    $("#ajax_loader").css('visibility', 'hidden');
                }
            });
        });

        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.message,
            });
        });
    </script>
@endpush
