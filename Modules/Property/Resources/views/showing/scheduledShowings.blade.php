@extends('backend.layouts.app')

@section('title', __('Properties'))

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

        .tooltip-inner {
            text-align: left;
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">@lang('Scheduled Showings')</x-slot>
        <x-slot name="body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:property::scheduled-showing-table account_id='{{ Auth::user()->id }}' />
            </div>
        </x-slot>
    </x-backend.card>
    <x-modal.editShowingModal :agents="$agents" />
@endsection

@push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            'use strict';
            jQuery('#showing_date_new, .datetimepicker').datetimepicker({
                format: 'Y-m-d h:i A',
                formatTime: 'h:i A',
                step: 1
            });
        });
    </script>
    <script type="text/javascript">
        $("#done").click(function() {
            $('button.close').trigger("click");
        });

        $(".edit_showing").on("click", function() {
            var showing_id = $(this).data('showing_id'),
                property = $(this).data('title'),
                showing_date = $(this).data('showing_date'),
                agent_id = $(this).data('agent_id'),
                limit = $(this).data('limit'),
                comments = $(this).data('comments');
            $("#prop_title").val(property);
            $("#show_id").val(showing_id);
            $("#showing_date_new").val(showing_date);
            $("#showing_limit").val(limit);
            $("#prop_agent").val(agent_id);
            $("#comments").val(comments);
            $("#EditShowingForm button").text('Update Showing');
            $("#EditShowingForm .loader").hide();
            $("#EditShowingModal").modal();
        });

        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.message,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#EditShowingForm").submit(function(e) {
                e.preventDefault();
                $('#EditShowingForm .error_msg').html('');
                var showing_id = $("#show_id").val(),
                    showing_date = $("#showing_date_new").val(),
                    agent_id = $("#prop_agent").val(),
                    limit = $("#showing_limit").val(),
                    comments = $("#comments").val();
                $("#EditShowingForm .loader").show();
                $(".alert-msg.text-danger").remove();
                if (showing_id == '' || showing_date == '' || agent_id == '' || limit == '') {
                    $('#EditShowingForm .error_msg').html('<p class="alert-msg text-danger">Please fill all the fields.</p>');
                    $("#EditShowingForm .loader").hide();
                    return false;
                }
                $("#EditShowingForm button").text('Updating Showing...');
                var baseUrl = "{{ route(rolebased() . '.showings.scheduledEdit', ['id' => ':id']) }}";
                var url = baseUrl.replace(':id', showing_id);
                console.log('url', url);
                $.ajax({
                    method: "POST",
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "showing_date": showing_date,
                        "agent_id": agent_id,
                        "limit": limit,
                        "comments": comments
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            // $('.datatable').DataTable().draw();
                            setTimeout(function() {
                                $('tr#' + data.id).addClass('animate');
                            }, 500);
                            $("#EditShowingForm .loader").hide();
                            $("#EditShowingForm button").text('Showing Updated');
                            $('#EditShowingModal').modal('hide');
                        } else {
                            $('#EditShowingForm .error_msg').html('<p class="alert-msg text-danger">Something went wrong!, showing not updated.</p>');
                        }
                    }
                });
            });
        });
    </script>
@endpush
