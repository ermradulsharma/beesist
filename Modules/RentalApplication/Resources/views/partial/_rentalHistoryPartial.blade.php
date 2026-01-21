<div class="repeater-item" data-repeater-item="" data-max_limit="3" data-index="{{ @$key }}">
    <h5>Rental history <span class="repeaterItemNumber"></span></h5>
    <p>IMPORTANT:</p>
    <p>Please help us to ensure we can screen your application efficiently. We will require a check of your landlord reference to successfully approve your application.</p>
    <p>Please let your landlord know that we will be reaching out to them to conduct a reference check and ask them when is a good time to call them. Please confirm your landlord’s email and contact number below. We will be calling the number you provide us and/or emailing your landlord.</p>
    <p>We will contact your landlord and if we are unable to reach them after three attempts, unfortunately, we may need to reject your application due to not being able to verify your reference.</p>
    <div class="row">
        <div class="col-md-12 mb-2">
            <label class="required">Rental address</label>
        </div>
        <div class="col-md-12 mb-2">
            <div class="form-group">
                {{-- {{ json_decode($rental_application->rental_history, true)[0]['country'] }} --}}
                <select class="form-control" name="rental_history[0][country]" id="h_country" required>
                    <option value="">Select Country</option>
                    @php
                        $sel_country = old('country');
                        if (empty($sel_country)) {
                            $sel_country = 'CA';
                        }
                    @endphp
                    @foreach ($countries as $country)
                        <option value="{{ $country->iso }}" {{ $country->iso == ($rentalHistory->country ?? $sel_country) ? 'selected' : '' }}>{{ $country->nicename }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <input name="rental_history[0][street_address]" id="h_street_address" onkeyup="initAutocomplete(this.id)" value="{{ old('street_address', @$rentalHistory->street_address) }}" placeholder="Street Address" type="text" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <input name="rental_history[0][city]" id="h_city" value="{{ old('city', @$rentalHistory->city) }}" placeholder="City" type="text" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="row gap-0">
                <div class="col-md-6 pr-0">
                    <div class="form-group">
                        <input name="rental_history[0][state]" id="h_state" value="{{ old('state', @$rentalHistory->state) }}" placeholder="State / Province / Region" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input name="rental_history[0][zip_code]" id="h_zip_code" value="{{ old('zip_code', @$rentalHistory->zip_code) }}" placeholder="ZIP / Postal Code" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label class="required" for="desired_move_in_date">Rental dates</label>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <input type="text" class="form-control rental_start_date" value="{{ old('rental_start_date', @$rentalHistory->rental_start_date) }}" id="rental_start_date" name="rental_history[0][rental_start_date]" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <input type="text" class="form-control rental_end_date" id="rental_end_date" value="{{ old('rental_end_date', @$rentalHistory->rental_end_date) }}" name="rental_history[0][rental_end_date]" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <label class="required">Monthly Rent</label>
                <input placeholder="Monthly Rent" type="number" class="form-control" name="rental_history[0][monthly_rent]" value="{{ old('monthly_rent', @$rentalHistory->monthly_rent) }}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="form-group">
                <label class="required">Reason For Leaving</label>
                <input placeholder="Reason For Leaving" type="text" class="form-control" name="rental_history[0][reason_for_leaving]" value="{{ old('reason_for_leaving', @$rentalHistory->reason_for_leaving) }}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <label class="required">Landlord Name</label>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <input type="text" class="form-control" name="rental_history[0][landlord_first_name]" value="{{ old('landlord_first_name', @$rentalHistory->landlord_first_name) }}" placeholder="First Name" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <input type="text" class="form-control" name="rental_history[0][landlord_last_name]" value="{{ old('landlord_last_name', @$rentalHistory->landlord_last_name) }}" placeholder="Last Name" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="required">Landlord Phone Number</label>
                <input placeholder="Landlord Phone Number" type="tel" class="form-control" name="rental_history[0][landlord_phone]" value="{{ old('landlord_phone', @$rentalHistory->landlord_phone) }}" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label class="required">Landlord E-mail</label>
                <input placeholder="Landlord E-mail" type="email" class="form-control" name="rental_history[0][landlord_email]" value="{{ old('landlord_email', @$rentalHistory->landlord_email) }}" autocomplete="off" required>
            </div>
        </div>
    </div>
    <div class="form-group file-upload-box mb-2">
        <p>Landlord Reference Letter</p>
        <input type="file" name="rental_history[0][landlord_reference_letter]" onchange="filePreview(this)" value="{{ asset(@$rentalHistory->landlord_reference_letter) }}" required/>
        <div class="media_preview">
            @if (isset($rentalHistory))
                <img src="{{ asset(@$rentalHistory->landlord_reference_letter) }}" width="150" height="150" style="object-fit:cover">
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="required">Good time and day to call your landlord</label>
        <textarea placeholder="Good time and day to call your landlord" class="form-control" name="rental_history[0][time_to_call_landlord]" data-max_length="5000" required>{{ @$rentalHistory->time_to_call_landlord }}</textarea>
        <div class="remaing_chars text-right">5000</div>
    </div>
    <div class="form-group">
        <span data-repeater-delete="" class="btn text-danger btn-sm">
            <span class="fas fa-times"></span> Additional Landlord Reference
        </span>
    </div>
</div>
