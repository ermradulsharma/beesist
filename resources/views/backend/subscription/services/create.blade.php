@extends('backend.layouts.app')
@section('title', $service ? __('Edit Package') : __('Create Package'))
@push('after-styles')
@endpush
@section('content')
<x-backend.card>
    <x-slot name="header">
        <strong>{{ $service ? __('Edit Package') : __('Create Package') }}</strong>
    </x-slot>
    <x-slot name="body">
        @php
        if ($service){
            $route = route(rolebased().'.subscription.services.update', $service);
        } else {
            $route = route(rolebased().'.subscription.services.store');
        }
        @endphp
        <form method="POST" id="ScheduleShowing" action="{{ $route }}" enctype="multipart/form-data">
            @if ($service != null)
                @method('PUT')
            @endif
            @csrf
            <div class="row" id="main_fields">
                <div class="col-md-6 pr-0">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title[]" placeholder="Service" value="{{ old('title', optional($service)->title) }}">
                    </div>
                </div>
                <div class="col-md-2 pr-0">
                    <div class="form-group">
                        <select class="form-control" name="status[]">
                            <option value="" selected>Select Status</option>
                            <option value="1" {{ optional($service)->status == "1" ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ optional($service)->status == "0" ? 'selected' : '' }}>De-Active</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-success" type="button" onclick="showing_fields()">
                                    <span class="fas fa-plus-circle" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="showing_fields"></div>
            <div class="row">
                <div class="col-md-6 offset-md-6 text-end">
                    <button type="submit" class="btn btn-success btn-md"><i class="fa fa-fw fa-clock"></i> {{ __('Create Services') }}</button>
                    <span id="success_msg" style="color: #00a65a;padding-left: 10px;"></span>
                </div>
            </div>
        </form>
    </x-slot>
</x-backend.card>
@endsection
@push('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js"></script>
<script>
    var room = 1;
    function showing_fields() {
        room++;
        var objTo = document.getElementById('showing_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "row repeat_item removeclass" + room);
        var rdiv = 'removeclass' + room;
        var mainfield = document.getElementById('main_fields').innerHTML;
        mainfield = mainfield.replace(/showing_fields\(\)/g, 'remove_showing_fields(' + room + ')').replace(/glyphicon-plus/g, 'glyphicon-minus').replace(/btn-success/g, 'btn-danger').replace(/datetimepicker1/g, 'datetimepicker1' + room).replace(/datetimepicker2/g, 'datetimepicker2' + room);

        divtest.innerHTML = mainfield;
        objTo.append(divtest);

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
</script>
@endpush
