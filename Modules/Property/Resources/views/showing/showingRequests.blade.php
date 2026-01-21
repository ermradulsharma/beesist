@extends('backend.layouts.app')

@section('title', __('Properties'))

@push('after-styles')
    <style>
        .table th,
        .table td {
            padding: 0.6rem;
            /* text-align: center !important; */
        }

        .table td {
            padding: 0.3rem 0.3rem 0.3rem 0rem !important;
        }

        .table th {
            font-size: 12px;
        }

        .table thead th {
            white-space: nowrap;
        }

        .tooltip {
            text-align-last: left;
        }

        .table.table-striped {
            min-width: 1200px !important;
        }

        .tooltip-inner {
            text-align: left;
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">@lang('Showings Request')</x-slot>
        <x-slot name="body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:property::showing-requests-table showingId='{{ $showingId }}' account_id='{{ Auth::user()->id }}' />
            </div>
        </x-slot>
    </x-backend.card>
    <div class="modal fade" id="rejectionModal" tabindex="-1" role="dialog" aria-labelledby="rejectionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectionModalLabel">Reason for Rejection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="RejectShowingForm">
                        <input type="hidden" id="show_id" name="show_id" value="" />
                        <div class="form-group">
                            <label for="rejectionReason" style="float: inline-start;">Reason:</label>
                            <textarea id="rejectionReason" class="form-control" rows="4"></textarea>
                        </div>
                        <div style="float: right;">
                            <button type="submit" class="btn btn-success rejected">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#done").click(function() {
            $('button.close').trigger("click");
        });

        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.message,
            });
        });
        window.addEventListener('reload:data', () => {
            window.location.reload();
        });
    </script>
    @php
        $prefix = 'admin';
    @endphp
    <script>
        $(".rejected_item").on("click", function() {
            var showing_id = $(this).data('showing_id');
            console.log('show_id', showing_id);
            $("#show_id").val(showing_id);

            $("#rejectionModal").modal();
        });

        function approve(id) {
            if (confirm("Are you sure?\nwant to Approve ")) {
                // $('div#ajax_loader').show();
                var baseUrl = "{{ route('admin.showings.requestsStatus', ['id' => ':id']) }}";
                var url = baseUrl.replace(':id', id);
                $.ajax({
                    method: "POST",
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "status": "approved"
                    },
                    success: function(data) {
                        console.log('data', data);
                        window.location.reload();
                        const swalEvent = new CustomEvent('swal:modal', {
                            detail: {
                                message: 'Success!',
                                text: 'Showing application has been approved!',
                                type: 'success'
                            }
                        });
                        window.dispatchEvent(swalEvent);
                    }
                });
            }
            return false;
        }
        $(document).ready(function() {
            $("#RejectShowingForm").submit(function(e) {
                e.preventDefault();
                var showing_id = $("#show_id").val();
                var reason_of_rejection = $("#rejectionReason").val();
                $("#RejectShowingForm .loader").show();
                $(".alert-msg.text-danger").remove();
                if (reason_of_rejection == '') {
                    $('#RejectShowingForm .form-group').append('<p class="alert-msg text-danger">Please provide a reason of rejection.</p>');
                    $("#RejectShowingForm .loader").hide();
                    return false;
                }
                $("#RejectShowingForm button").text('Rejecting Showing...');
                var baseUrl = "{{ route('admin.showings.requestsStatus', ['id' => ':id']) }}";
                var url = baseUrl.replace(':id', showing_id);
                $.ajax({
                    method: "POST",
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "status": "rejected",
                        "reason": reason_of_rejection
                    },
                    success: function(data) {
                        console.log('data', data);
                        $("#RejectShowingForm .loader").hide();
                        $("#RejectShowingForm button").text('Showing Rejected');
                        $('#rejectionModal').modal('hide');
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endpush
