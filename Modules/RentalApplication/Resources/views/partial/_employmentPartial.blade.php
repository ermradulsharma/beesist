<div class="repeater-item" data-repeater-item="" data-max_limit="3">
    <h5>Employment <span class="repeaterItemNumber"></span></h5>
    <p>IMPORTANT:</p>
    <p>Please help us to ensure we can screen your application efficiently. We will require a check of your employer reference to successfully approve your application.</p>
    <p>Please let your employer know that we will be reaching out to them to conduct a reference check and ask them when is a good time to call them. Please confirm your employer’s email and contact number below. We will be calling the number you provide us and/or emailing your employer.</p>
    <p>We will contact your employer and if we are unable to reach them after three attempts, unfortunately, we may need to reject your application due to not being able to verify your reference.</p>
    <div class="row mb-2">
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <label class="required">Employer Name</label>
                <input name="employment[0][name]" value="{{ old('name',  @$employment->name) }}" type="text" class="form-control" placeholder="Employer Name" required>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <label class="required">Employer Address</label>
                <select class="form-control" name="employment[0][country]" id="e_country" required>
                    <option value="">Select Country</option>
                    @php
                        $sel_country = old('country');
                        if (empty($sel_country)) {
                            $sel_country = 'CA';
                        }
                    @endphp
                    @foreach ($countries as $country)
                        <option value="{{ $country->iso }}" {{ $country->iso == ($employment->country ?? $sel_country) ? 'selected' : '' }}>{{ $country->nicename }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <input name="employment[0][street_address]" id="e_street_address"onkeyup="initAutocomplete(this.id)" value="{{ old('street_address',  @$employment->street_address) }}" placeholder="Street Address" type="text" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <input name="employment[0][city]" id="e_city" value="{{ old('city',  @$employment->city) }}" placeholder="City" type="text" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="row gap-0">
                <div class="col-md-6 pr-0">
                    <div class="form-group">
                        <input name="employment[0][state]" id="e_state" value="{{ old('state',  @$employment->state) }}" placeholder="State / Province / Region" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input name="employment[0][zip_code]" id="e_zip_code" value="{{ old('zip_code',  @$employment->zip_code) }}" placeholder="ZIP / Postal Code" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-12 mb-2">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required">Employer E-mail</label>
                        <input type="email" value="{{ old('email',  @$employment->employer_email) }}" placeholder="Employer E-mail" class="form-control" name="employment[0][employer_email]" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required">Employer Phone Number</label>
                        <input type="text" placeholder="Employer Phone Number" class="form-control" name="employment[0][employer_phone]" value="{{ old('employer_phone',  @$employment->employer_phone) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required">Position Held</label>
                        <input type="text" placeholder="Position Held" class="form-control" name="employment[0][position_held]" value="{{ old('position_held',  @$employment->position_held) }}" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="row">
                <label class="required">Employment Dates</label>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control employment_start_date" id="employment_start_date" name="employment[0][start_date]" value="{{ old('start_date',  @$employment->start_date) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control employment_end_date" id="employment_end_date" name="employment[0][end_date]" value="{{ old('end_date',  @$employment->end_date) }}" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <label class="required">Monthly Gross Salary</label>
                <input type="number" placeholder="Monthly Gross Salary" class="form-control" name="employment[0][salary]" value="{{ old('salary',  @$employment->salary) }}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="row">
                <label class="required">Supervisor Name</label>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="employment[0][supervisor_first_name]" value="{{ old('supervisor_first_name',  @$employment->supervisor_first_name) }}" placeholder="First Name" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="employment[0][supervisor_last_name]" value="{{ old('supervisor_last_name',  @$employment->supervisor_last_name) }}" placeholder="Last Name" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <label class="required">Supervisor Title</label>
                <input type="text" class="form-control" name="employment[0][supervisor_title]" value="{{ old('supervisor_title',  @$employment->supervisor_title) }}" placeholder="Supervisor Title" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="row">
                <div class="form-group">
                    <label class="required">Good time and day to contact your employer</label>
                    <textarea class="form-control" name="employment[0][time_to_call_employer]" data-max_length="5000" placeholder="Good time and day to contact your employer" required>{{ @$employment->time_to_call_employer }}</textarea>
                    <div class="remaing_chars text-right">5000</div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="row">
                <div class="form-group">
                    <span data-repeater-delete="" class="btn text-danger btn-sm">
                        <span class="fas fa-times"></span> Remove additional Employment
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
