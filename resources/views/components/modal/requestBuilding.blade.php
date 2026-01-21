<!-- Request Building Modal -->
@props(['countries'])
<div class="modal fade" id="requestBuildingModal" tabindex="-1" role="dialog" aria-labelledby="requestBuildingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestBuildingModalLabel">{{ __('Request For New Building') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route(rolebased() .'.buildings.requestBuilding') }}">
                    @csrf
                    <input type="hidden" class="form-control" id="requestId" name="requestId">
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label><span style="color: red">*</span>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Building Title">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 mb-2">
                            <label for="rb_address">{{ __('Building Address') }}</label><span style="color: red">*</span>
                            <input type="text" class="form-control" id="rb_address" onkeyup="initAutocomplete(this.id)" name="location[address]" placeholder="Street Address">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="rb_city">{{ __('City') }}</label>
                            <input type="text" class="form-control" id="rb_city" name="location[city]" placeholder="City">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="rb_state">{{ __('State / Province / Region') }}</label>
                            <input type="text" class="form-control" id="rb_state" name="location[state]" placeholder="State / Province / Region">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="rb_country">{{ __('Country') }}</label>
                            <select id="rb_country" name="location[country]" class="form-select form-control">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->iso }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="rb_zip">{{ __('Postal Code') }}</label>
                            <input type="text" class="form-control" id="rb_zip" name="location[zip]" placeholder="Zip / Postal Code">
                        </div>
                        <input type="hidden" class="form-control" id="rb_lat" name="location[latitude]">
                        <input type="hidden" class="form-control" id="rb_long" name="location[longitude]">
                    </div>
                    <div class="form-group">
                        <label for="myeditorinstance">{{ __('Message') }}</label>
                        <textarea class="form-control" id="myeditorinstance" name="message" rows="5" placeholder="Please Enter Message"></textarea>
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
