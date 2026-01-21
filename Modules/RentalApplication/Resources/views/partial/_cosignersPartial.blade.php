<div class="repeater-item" data-repeater-item="" data-max_limit="1">
    <h5><span class="repeaterItemNumber"></span></h5>
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Cosigner First Name</label>
                        <input type="text" class="form-control" name="cosigners[0][first_name]" value="{{ old('first_name', @$cosigner->first_name) }}" placeholder="First Name" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Cosigner Last Name</label>
                        <input type="text" class="form-control" name="cosigners[0][last_name]" value="{{ old('last_name', @$cosigner->last_name) }}" placeholder="Last Name" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Cosigner Relationship</label>
                        <input type="text" class="form-control" name="cosigners[0][relationship]" value="{{ old('relationship', @$cosigner->relationship) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="">Cosigner Social Security Number</label>
                        <input type="text" class="form-control" name="cosigners[0][ssn]" value="{{ old('ssn', @$cosigner->ssn) }}" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Cosigner Phone Number</label>
                        <input type="tel" class="form-control" name="cosigners[0][phone_number]" value="{{ old('phone_number', @$cosigner->phone_number) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Birthday</label>
                        <input type="text" class="form-control" name="cosigners[0][birth_date]" value="{{ old('birth_date', @$cosigner->birth_date) }}" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label class="required">Home Address</label>
                        <select class="form-control" name="cosigners[0][country]" required>
                            <option value="">Select Country</option>
                            @php
                                $sel_country = old('country');
                                if (empty($sel_country)) {
                                    $sel_country = 'CA';
                                }
                            @endphp
                            @foreach ($countries as $country)
                                <option value="{{ $country->iso }}" {{ $sel_country==$country->iso ? 'selected' : '' }}>{{ $country->nicename }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <input name="cosigners[0][street_address]" value="{{ old('street_address', @$cosigner->street_address) }}" placeholder="Street Address" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="cosigners[0][city]" value="{{ old('city', @$cosigner->city) }}" placeholder="City" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 gap-0 pr-0">
                                    <div class="form-group">
                                        <input name="cosigners[0][state]" value="{{ old('state', @$cosigner->state) }}" placeholder="State / Province / Region" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="cosigners[0][zip_code]" value="{{ old('zip_code', @$cosigner->zip_code) }}" placeholder="ZIP / Postal Code" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="required">Cosigner E-mail</label>
                        <input type="email" class="form-control" name="cosigners[0][cosigner_email]" value="{{ old('cosigner_email', @$cosigner->cosigner_email) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="required">Name of Employer/Company Name</label>
                        <input type="text" class="form-control" name="cosigners[0][employer_name]" value="{{ old('employer_name', @$cosigner->employer_name) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="required">Position</label>
                        <input type="text" class="form-control" name="cosigners[0][position]" value="{{ old('position', @$cosigner->position) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="required">Employment - Monthly Income</label>
                        <input type="text" class="form-control" name="cosigners[0][employment_monthly_income]" value="{{ old('employment_monthly_income', @$cosigner->employment_monthly_income) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="required">Supervisor Name</label>
                        <input type="text" class="form-control" name="cosigners[0][supervisor_name]" value="{{ old('supervisor_name', @$cosigner->supervisor_name) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="required">Supervisor Number</label>
                        <input type="tel" class="form-control" name="cosigners[0][supervisor_number]" value="{{ old('supervisor_number', @$cosigner->supervisor_number) }}" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required">Supervisor E-mail</label>
                        <input type="email" class="form-control" name="cosigners[0][supervisor_email]" value="{{ old('supervisor_email', @$cosigner->supervisor_email) }}" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group file-upload-box">
                    <label class="required d-block">Financial Suitability Documents (Pay stubs, employment contract or bank statements)</label>
                    <input type="file" name="cosigners[0][financial_suitability_documents]" onchange="filePreview(this)" accept="image/*,.pdf" />
                    <div class="media_preview">
                         @if (isset($cosigner))
                            <img src="{{ asset($cosigner->financial_suitability_documents) }}" width="150" height="150" style="object-fit:cover">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group file-upload-box">
                    <label class="required d-block">Credit Report (From Credit Karma https://www.creditkarma.ca)</label>
                    <input type="file" name="cosigners[0][credit_report]" onchange="filePreview(this)" />
                    <div class="media_preview">
                         @if (isset($cosigner))
                            <img src="{{ asset($cosigner->credit_report) }}" width="150" height="150" style="object-fit:cover">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group file-upload-box">
                    <label class="required d-block">Additional Financial Suitability Documents (Pay stubs, employment contract or bank statements)</label>
                    <input type="file" name="cosigners[0][additional_financial_suitability_documents]" onchange="filePreview(this)" required />
                    <div class="media_preview">
                         @if (isset($cosigner))
                            <img src="{{ asset($cosigner->additional_financial_suitability_documents) }}" width="150" height="150" style="object-fit:cover">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group file-upload-box">
                    <label class="required d-block">ID</label>
                    <input type="file" name="cosigners[0][id]" onchange="filePreview(this)" required />
                    <div class="media_preview">
                         @if (isset($cosigner))
                            <img src="{{ asset($cosigner->id) }}" width="150" height="150" style="object-fit:cover">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <span data-repeater-delete="" class="btn text-danger btn-sm">
            <span class="fas fa-times"></span> Remove Cosigners
        </span>
    </div>
</div>
