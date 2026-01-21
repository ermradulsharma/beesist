<div class="repeater-item" data-repeater-item="" data-max_limit="3">
    <h5><span class="repeaterItemNumber"></span></h5>
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Occupant First Name</label>
                        <input type="text" class="form-control" name="additional_occupants[0][first_name]"
                            value="{{ old('first_name', @$additionalOccupant->first_name)}}" placeholder="First Name"
                            autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Occupant Last Name</label>
                        <input type="text" class="form-control" name="additional_occupants[0][last_name]"
                            value="{{ old('last_name', @$additionalOccupant->last_name)}}" placeholder="Last Name"
                            autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Occupant Relationship</label>
                        <input type="text" class="form-control" name="additional_occupants[0][relationship]"
                            value="{{ old('relationship', @$additionalOccupant->relationship)}}" autocomplete="off"
                            required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Occupant Birth Date</label>
                        <input type="text" class="form-control" name="additional_occupants[0][birth_date]"
                            value="{{ old('birth_date', @$additionalOccupant->birth_date)}}" autocomplete="off"
                            required>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Occupant E-mail</label>
                        <input type="email" class="form-control" name="additional_occupants[0][occupant_email]"
                            value="{{ old('occupant_email', @$additionalOccupant->occupant_email)}}" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Occupant Phone Number</label>
                        <input type="tel" class="form-control" name="additional_occupants[0][phone_number]"
                            value="{{ old('phone_number', @$additionalOccupant->phone_number)}}" autocomplete="off"
                            required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <span data-repeater-delete="" class="btn text-danger btn-sm">
                        <span class="fas fa-times"></span> Remove Additional occupants
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
