<!-- Request Building Modal -->
<div class="modal fade" id="announcementModal" tabindex="-1" role="dialog" aria-labelledby="announcementModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="announcementModalLabel">{{ __('Announcement') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route(rolebased() .'.cms.announcement.store') }}">
                    @csrf
                    <input type="hidden" class="form-control" id="requestId" name="requestId">
                    <div class="form-group row mb-0">
                        <div class="col-md-6 mb-2">
                            <label for="area">{{ __('Area') }}</label>
                            <select id="area" name="area" class="form-select form-control">
                                <option value="">-------- Select --------</option>
                                <option value="frontend">Frontend</option>
                                <option value="backend">Backend</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="type">{{ __('Type') }}</label><span style="color: red">*</span>
                            <select id="type" name="type" class="form-select form-control">
                                <option value="">-------- Select --------</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="success">Success</option>
                                <option value="warning">Warning</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="starts_at">{{ __('Start Date') }}</label>
                            <input type="" class="form-control datetimepicker" id="starts_at" name="starts_at" placeholder="YYYY-M-D H:M AM/PM">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="ends_at">{{ __('End Date') }}</label>
                            <input type="text" class="form-control datetimepicker" id="ends_at" name="ends_at" placeholder="YYYY-M-D H:M AM/PM">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="myeditorinstance">{{ __('Message') }}</label><span style="color: red">*</span>
                        <textarea class="form-control" id="myeditorinstance" name="message" rows="5" placeholder="Please Enter Message"></textarea>
                    </div>
                    <div class="form-group mb-0">
                        <h6 class="mb-1">Status</h6>
                        <input type="hidden" name="enabled" value="0">
                        <label class="c-switch c-switch-label c-switch-primary">
                            <input class="c-switch-input" type="checkbox" id="enabled" value="1" name="enabled" is="status">
                            <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                        </label>
                    </div>
                    <div class="modal-footer" id="modalFooter">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
