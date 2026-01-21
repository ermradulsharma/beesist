<div class="repeater-item" data-repeater-item="" data-max_limit="2">
    <h5><span class="repeaterItemNumber"></span></h5>
    <div class="row">
        <div class="col-md-4 mb-2">
            <div class="form-group">
                <label class="required">Vehicle Make</label>
                <input type="text" class="form-control" name="vehicles[0][make]" value="{{ old('make', @$vehicle->make)}}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-group">
                <label class="required">Vehicle Model</label>
                <input type="text" class="form-control" name="vehicles[0][model]" value="{{ old('model', @$vehicle->model)}}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-group">
                <label class="required">Vehicle Color</label>
                <input type="text" class="form-control" name="vehicles[0][color]" value="{{ old('color', @$vehicle->color)}}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-group">
                <label class="required">Vehicle Year</label>
                <input type="number" class="form-control" name="vehicles[0][year]" value="{{ old('year', @$vehicle->year)}}" placeholder="YYYY" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-group">
                <label class="required">Vehicle License Plate</label>
                <input type="text" class="form-control" name="vehicles[0][license_plate]" value="{{ old('license_plate', @$vehicle->license_plate)}}" autocomplete="off" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <span data-repeater-delete="" class="btn text-danger btn-sm">
            <span class="fas fa-times"></span> Remove Vehicles
        </span>
    </div>
</div>
