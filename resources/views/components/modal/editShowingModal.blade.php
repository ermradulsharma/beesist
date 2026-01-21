@props(['agents'])
<div class="modal fade" tabindex="-1" id="EditShowingModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="flex-direction: row-reverse;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">{{ __('Update Scheduled Showing') }}</h4>
            </div>
            <div class="modal-body">
                <div id="ScheduleForm">
                    <form id="EditShowingForm">
                        <input type="hidden" id="show_id" name="show_id"/>
                        <div class="form-group">
                            <label for="prop_title">Property Name</label>
                            <input class="form-control" name="prop_title" id="prop_title" value="" type="text" readonly="readonly" required="required">
                        </div>
                        <div class="form-group">
                            <label for="name">Asign Agent(s)</label>
                            <select class="form-control" class="form-control" name="prop_agent" id="prop_agent" required="required">
                                <option value="">--Select Agent--</option>
                                @foreach($agents as $agent)
                                <option value="{{ $agent->id }}" @if(Auth::user()->id == $agent->id) selected="selected" @endif>{{ $agent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="showing_date_new">Showing Date</label>
                            <input type="text" class="form-control datetimepicker" name="showing_date_new" id="showing_date_new" placeholder="YYYY/MM/DD H:M" />
                        </div>
                        <div class="form-group">
                            <label for="showing_limit">Attendees  Limit</label>
                            <input type="number" class="form-control" name="showing_limit" id="showing_limit" placeholder="Attendees Limit" />
                        </div>
                        <div class="form-group">
                            <label for="comments">Additional Comments</label>
                            <textarea class="form-control" id="comments" name="comments" style="width: 100%; height: 80px;"></textarea>
                        </div>
                        <div class="error_msg"></div>
                        <button type="submit" class="btn btn-danger" style="float: right;">Update Showing</button>
                        <img class="loader" style="display: none;" src="{{ asset('images/loader.svg') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
