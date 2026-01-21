<div class="repeater-item" data-repeater-item="" data-max_limit="2">
    <h5><span class="repeaterItemNumber"></span></h5>
    <div class="row">
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="required">Pet Type</label>
                <input type="text" class="form-control" name="pets[0][type]" value="{{ old('type', @$pet->type)}}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="required">Pet Breed</label>
                <input type="text" class="form-control" name="pets[0][breed]" value="{{ old('breed', @$pet->breed)}}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="required">Pet Age</label>
                <input type="number" class="form-control" name="pets[0][age]" value="{{ old('age', @$pet->age)}}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="required">Pet Spayed or Neutered</label>
                <input type="tel" class="form-control" name="pets[0][spayed]" value="{{ old('spayed', @$pet->spayed)}}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="required">Pet License Number</label>
                <input type="text" class="form-control" name="pets[0][license_number]" value="{{ old('license_number', @$pet->license_number)}}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="required">Pet Weight</label>
                <input type="number" class="form-control" name="pets[0][weight]" value="{{ old('weight', @$pet->weight)}}" autocomplete="off" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <span data-repeater-delete="" class="btn text-danger btn-sm">
            <span class="fas fa-times"></span> Remove Pets
        </span>
    </div>
</div>
