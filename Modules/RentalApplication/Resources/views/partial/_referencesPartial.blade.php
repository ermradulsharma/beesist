<div class="repeater-item" data-repeater-item="" data-max_limit="3">
    <h5>References <span class="repeaterItemNumber"></span></h5>
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="row">
                <label class="required">Reference name</label>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="references[first_name]" value="{{ old('first_name', @$reference->first_name)}}" placeholder="First Name" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="references[last_name]" value="{{ old('last_name', @$reference->last_name)}}" placeholder="Last Name" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <label class="required">Reference Relationship</label>
                <input type="text" placeholder="Reference Relationship" class="form-control" name="references[relationship]" value="{{ old('relationship', @$reference->relationship)}}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Reference Phone Number</label>
                        <input type="tel" placeholder="Reference Phone Number" class="form-control" name="references[phone]" value="{{ old('phone', @$reference->phone)}}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Reference E-mail</label>
                        <input type="email" placeholder="Reference E-mail" class="form-control" name="references[email]" value="{{ old('email', @$reference->email)}}" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <span data-repeater-delete="" class="btn text-danger btn-sm">
            <span class="fas fa-times"></span> Remove additional References
        </span>
    </div>
</div>
