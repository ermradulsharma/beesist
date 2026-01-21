<!-- Modal -->
@props(['agents'])
<div class="modal fade" id="scheduleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleModalLabel">Schedule Showing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="ScheduleForm">
                    <div class="alert alert-danger" id="sh_error" style="display:none"></div>
                    <form class="form-signin repeater" method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="prop_id" name="prop_id" />
                        <div class="form-group">
                            <label for="prop_title"><strong>Property Name</strong></label>
                            <input class="form-control" name="prop_title" id="prop_title" value="" type="text" readonly="readonly" required="required">
                        </div>
                        <div class="form-group">
                            <label for="prop_agent"><strong>Asign Agent(s)</strong></label>
                            <select class="form-control" class="form-control" name="prop_agent" id="prop_agent" required="required">
                                <option value="">--Select Agent--</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}" {{ Auth::user()->id == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="mb-3"><strong>Showing Date(s)</strong></label>
                        <div id="showing_dates">
                            <div class="r-group">
                                <div class="d-flex">
                                    <div class="form-group">
                                        <label for="showing_date_0_0" data-pattern-text="Showing Date +=1:">Showing Date 1:</label>
                                        <input type="text" class="form-control datetimepicker" name="showing_dates[0][date]" id="showing_date_0_date" data-pattern-name="showing_dates[++][date]" data-pattern-id="showing_date_++_date" placeholder="YYYY-MM-DD H:M AM" />
                                    </div>
                                    <div class="form-group">
                                        <label for="showing_limit_0_0" data-pattern-text="Attendees Limit +=1:">Attendees Limit 1:</label>
                                        <input type="number" class="form-control" name="showing_dates[0][limit]" id="showing_date_0_limit" data-pattern-name="showing_dates[++][limit]" data-pattern-id="showing_date_++_limit" placeholder="Attendees Limit" />
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="r-btnRemove btn btn-danger"><i class="fa fa-fw fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="r-btnAdd btn btn-success" style="position: absolute;bottom: 3px;">Add More Dates +</button>
                        </div>
                        <div class="form-group">
                            <label for="comments"><strong>Additional Comments</strong></label>
                            <textarea class="form-control" id="comments" name="comments" placeholder="Place additional comments for this showing (if any)" style="width: 100%; height: 80px;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Schedule Showing</button>
                        <img id="ajax_loader" src="{{ asset('images/loader.svg') }}">
                    </form>
                </div>
                <div id="ScheduleFormResponse" style="display:none; text-align:center">
                    <p id="mySmallModalLabel" style="text-align: center;">Property <span id="sh_prop_name"></span> has been scheduled for Showing on <span id="sh_date"></span> <br>by agent <span id="sh_agent"></span></p>
                    <button type="button" id="ScheduleMore" class="btn btn-primary">Schedule More</button>
                    <button type="button" id="done" class="btn btn-success">Done</button>
                </div>
            </div>
        </div>
    </div>
</div>
