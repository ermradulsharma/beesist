@extends('backend.layouts.app')
@section('title', __('Multiple Schedule Showings'))
@push('after-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.min.css"/>
<style>
    .max_400 {
        max-width: 400px
    }

    .table td img {
        height: 40px;
        border: 1px solid #bbb;
        padding: 2px;
        border-radius: 5px;
        width: 40px;
    }

    .table td {
        line-height: 40px !important
    }

    #mySmallModalLabel {
        line-height: 28px
    }

    #mySmallModalLabel span {
        color: #00a65a;
        font-weight: 600
    }

    .r-group .form-group {
        position: relative;
        margin-top: 10px;
        padding-right: 50px;
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
    }

    #showing_dates {
        position: relative;
        padding-bottom: 30px;
    }

    .nopadding {
        padding: 0
    }

    @media screen and (max-width: 1385px) {
        .table.datatable td {
            line-height: 20px !important
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child::before,
        table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child::before {
            top: 20px;
        }

        .table.datatable td:nth-child(1) {
            max-width: 80px;
        }

        .table.datatable td:nth-child(2),
        .table.datatable td:nth-child(3) {
            min-width: 180px;
        }

        table.dataTable>tbody>tr.child ul.dtr-details {
            display: block;
        }

        table.dataTable>tbody>tr.child ul.dtr-details>li {
            display: flex;
        }
    }
</style>
@endpush
@section('content')
<x-backend.card>
    <x-slot name="header">@lang('Schedule Multiple Showings')</x-slot>
    <x-slot name="body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="card box-primary">
                    <div class="card-body">
                        <form method="POST" id="ScheduleShowing" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="box">
                                <div class="box-body">
                                    <div class="agent_field">
                                        <div class="col-sm-12 nopadding form-group d-flex align-items-center">
                                            <div class="col-sm-2">
                                                <label for="prop_agent"><h6>Select Agent</h6></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="prop_agent" id="prop_agent" required>
                                                    <option value="">--Select Agent--</option>
                                                    @foreach($agents as $agent)
                                                        <option value="{{ $agent->id }}" {{ Auth::user()->id == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="fieldgroup">
                                        <h6 style="margin: 0;">Select Properties and dates to schedule showings</h6>
                                        <hr>
                                        <div id="main_fields" class="d-flex">
                                            <div class="col-sm-3 nopadding">
                                                <div class="form-group">
                                                    <select class="form-control" name="showings[0][prop_id]">
                                                        <option value="">Property Name</option>
                                                        @foreach($properties as $property)
                                                            <option value="{{ $property->id }}|{{ $property->title }}">{{ $property->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 nopadding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control datetimepicker1" name="showings[0][date1]" value="" placeholder="Showing Date 1">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 nopadding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control datetimepicker2" name="showings[0][date2]" value="" placeholder="Showing Date 2">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 nopadding">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="showings[0][limit]" value="" placeholder="Max. Number of Attendees">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="showings[0][comment]" value="" placeholder="Additional Comment">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success" type="button" onclick="showing_fields()">
                                                                <span class="fas fa-plus-circle" aria-hidden="true"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div id="showing_fields"></div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <input name="type" value="multiple" type="hidden">
                                    <button type="submit" class="btn btn-success btn-md"><i class="fa fa-fw fa-clock"></i> Schedule Showings</button>
                                    <span id="success_msg" style="color: #00a65a;padding-left: 10px;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-backend.card>
@endsection
@push('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js"></script>
<script>
    $(document).ready(function() {
        $('form#ScheduleShowing').on('submit', function (e) {
            e.preventDefault();
            $('div#ajax_loader').show();
            var url = "{{ route(rolebased().'.showings.store') }}";
            $.ajax({
                method: "POST",
                url: url,
                data: $(this).serialize(),
                success: function(data) {
                    $('form#ScheduleShowing')[0].reset();
                    $('#showing_fields').empty();
                    $('#success_msg').text('Showings Scheduled successfully.');
                    $('div#ajax_loader').hide();
                },
                error: function(xhr, status, error) {
                    // Handle error cases here
                    console.error(xhr.responseText);
                    $('div#ajax_loader').hide();
                }
            });
        });
    });

    var room = 1;
    function showing_fields() {
        room++;
        var objTo = document.getElementById('showing_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group d-flex repeat_item removeclass" + room);
        var rdiv = 'removeclass' + room;
        var mainfield = document.getElementById('main_fields').innerHTML;
        mainfield = mainfield.replace(/showing_fields\(\)/g, 'remove_showing_fields(' + room + ')')
                        .replace(/fa-plus-circle/g, 'fa-minus-circle')
                        .replace(/btn-success/g, 'btn-danger')
                        .replace(/datetimepicker1/g, 'datetimepicker1' + room)
                        .replace(/datetimepicker2/g, 'datetimepicker2' + room);
        divtest.innerHTML = mainfield;
        objTo.appendChild(divtest);

        $(".datetimepicker1" + room).datetimepicker({
            format: 'Y-m-d h:i A',
            formatTime: 'h:i A',
            step: 1
         });
        $(".datetimepicker2" + room).datetimepicker({
            format: 'Y-m-d h:i A',
            formatTime: 'h:i A',
            step: 1
         });

        $("#showing_fields .repeat_item").each(function(index) {
            var prefix = "showings[" + (index + 1) + "]";
            $(this).find("input, select").each(function() {
                this.name = this.name.replace(/showings\[\d+\]/, prefix);
            });
        });
    }

    function remove_showing_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    $(document).ready(function() {
        $(".datetimepicker1").datetimepicker({
            format: 'Y-m-d h:i A',
            formatTime: 'h:i A',
            step: 1
        });
        $(".datetimepicker2").datetimepicker({
            format: 'Y-m-d h:i A',
            formatTime: 'h:i A',
            step: 1
        });
    });

</script>
@endpush
