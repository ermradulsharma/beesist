<form id="rental_application_apply" method="POST" action="" enctype="multipart/form-data">
    {{-- @csrf --}}
    <input type="hidden" name="app_id" value="{{ @$rental_application->id }}">
    <div class="card" style="border: 1px solid #f0f0f0; border-radius: 10px;">
        <div class="card-body" id="form_wrapper">
            @if ($property->id)
                <h4>Property Information </h4>
                <div class="properties-list">
                    <div class="listing-info-card">
                        <div class="listing-info-card__property-info">
                            <img class="property-info__image ng-star-inserted" src="{{ isset($property->featured_image['url']) && file_exists(public_path('uploads/properties/' . $property->id . '/property_photos/thumbs/' . $property->featured_image['url'])) ? asset('uploads/properties/' . $property->id . '/property_photos/thumbs/' . @$property->featured_image['url']) : asset('images/bolld-placeholder.png') }}" alt="{{ $property->title }}">
                            <div class="property-info__details">
                                <div class="details__building-name">{{ $property->title }}</div>
                                <div class="details__address__display">{{ $property->address }}</div>
                                <div> {{ $property->prop_type }} | {{ $property->beds }} Bed | {{ $property->baths }} Bath </div>
                                <input type="hidden" id="prop_id" name="prop_id" value="{{ $property->id }}">
                            </div>
                        </div>
                        <div class="listing-info-card__lease-info">
                            <div class="lease-info__price">${{ number_format($property->rate, 2) }}<span>/{{ $property->rateper }}</span></div>
                            {{-- <div class="lease-info__date"> AVAILABLE JUNE 1 </div> --}}
                        </div>
                    </div>
                </div>
            @endif

            {{-- Property Applying For --}}
            <div id="property_applying_for" class="app_section_content">
                <h5>Property Applying For</h5>
                <p>Please enter the property name (as per our advertisement) or the address of the property you are applying for.</p>
                <div class="row mb-2">
                    <div class="form-group {{ $errors->has('property_applying_for') ? 'has-error' : '' }}">
                        <label class="required" for="property_applying_for">Property Applying For</label>
                        <select id="property_applying_for" class="form-control" name="property_applying_for" onchange="applyFor()" required>
                            <option value="">Select Property</option>
                            @php
                                $selected_property = old('property_applying_for', isset($rental_application) ? $rental_application->property_applying_for : '');
                            @endphp
                            @foreach ($properties as $prop)
                                <option data-url="{{ route('rental_application.applicationForm', ['id' => $prop->id]) }}" value="{{ $prop->title }}" {{ $selected_property === null && $property->title == $prop->title ? 'selected' : ($selected_property == $prop->title ? 'selected' : '') }}>{{ $prop->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- </div> --}}
                {{-- Property Applying For --}}

                {{-- Property information --}}
                {{-- <div id="property_information" class="app_section_content">
                <h5>Property information</h5> --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('desired_move_in_date') ? 'has-error' : '' }}">
                            <label class="required" for="desired_move_in_date">Desired Move-in Date</label>
                            <input placeholder="Desired Move-in Date" id="desired_move_in_date" type="text" class="form-control" name="desired_move_in_date" value="{{ old('desired_move_in_date', @$rental_application->desired_move_in_date) }}" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('desired_lease_duration') ? 'has-error' : '' }}">
                            <label class="required" for="desired_lease_duration">Desired Lease Duration</label>
                            <input placeholder="Desired Lease Duration" id="desired_lease_duration" type="text" class="form-control" name="desired_lease_duration" value="{{ old('desired_lease_duration', @$rental_application->desired_lease_duration) }}" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Property information --}}

            <div id="app_content">
                {{-- Applicant information --}}
                <div id="applicant_information" class="app_section_content">
                    <h5>Applicant information</h5>
                    <small>
                        <strong>NOTE:</strong>
                        <ul>
                            <li>Please note that cosigners needs to send a separate application</li>
                            <li>If you wish to speed up the process of your application please go to <a href="https://www.equifax.com/personal/credit-report-services/free-credit-reports/" target="_blank">https://www.equifax.com/personal/credit-report-services/free-credit-reports/</a>and print screen and share your credit score with us.</li>
                        </ul>
                    </small>

                    <div class="row mb-2">
                        <div class="col-md-12"><label class="required" for="first_name">Applicant Name</label></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name', $rental_application->first_name ?? (Auth::check() ? Auth::user()->first_name : '')) }}" placeholder="First Name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name', @$rental_application->last_name ?? (Auth::check() ? Auth::user()->last_name : '')) }}" placeholder="Last Name" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="required">Have you viewed the home?</label>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline form-check-border">
                                            <input {{ old('viewed_home', @$rental_application->viewed_home) == 'Yes' ? 'checked' : '' }} class="form-check-input" type="radio" name="viewed_home" id="viewed_home_yes" value="Yes" required>
                                            <label class="form-check-label" for="viewed_home_yes">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline form-check-border">
                                            <input {{ old('viewed_home', @$rental_application->viewed_home) == 'No' ? 'checked' : '' }} class="form-check-input" type="radio" name="viewed_home" id="viewed_home_no" value="No">
                                            <label class="form-check-label" for="viewed_home_no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }} mb-2">
                                <label class="required" for="dob">Applicant Date Of Birth</label>
                                <input id="applicant_birth_date" type="text" class="form-control applicant_birth_date" name="dob" value="{{ old('dob', @$rental_application->dob) }}" placeholder="Applicant birth date" autocomplete="off" required>
                            </div>

                            <div class="form-group {{ $errors->has('sin') ? 'has-error' : '' }}">
                                <label class="" for="sin">SIN</label>
                                <input id="sin" type="number" class="form-control" name="sin" value="{{ old('sin', @$rental_application->sin) }}" placeholder="SIN" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12"><label class="required">Applicant current address</label></div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group {{ $errors->has('street_address') ? 'has-error' : '' }}">
                                <input id="street_address" onkeyup="initAutocomplete(this.id)" name="street_address" value="{{ old('street_address', @$rental_application->street_address) }}" placeholder="Street Address" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                                <select id="country" class="form-control" name="country" required>
                                    <option value="">Select Country</option>
                                    @php
                                        $sel_country = old('country', isset($rental_application) ? $rental_application->country : '');
                                        if (empty($sel_country)) {
                                            $sel_country = 'CA'; // Default country as Canada
                                        }
                                    @endphp
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->iso }}" {{ $sel_country == $country->iso ? 'selected' : '' }}>{{ $country->nicename }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                                <input id="city" name="city" value="{{ old('city', @$rental_application->city) }}" placeholder="City" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="row">
                                <div class="col-md-6 pr-0">
                                    <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                                        <input id="state" name="state" value="{{ old('state', @$rental_application->state) }}" placeholder="State / Province / Region" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('zip_code') ? 'has-error' : '' }}">
                                        <input id="zip_code" name="zip_code" value="{{ old('zip_code', @$rental_application->zip_code) }}" placeholder="ZIP / Postal Code" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label class="required" for="email">Applicant E-mail</label>
                                <input placeholder="Applicant E-mail" id="email" type="email" class="form-control" name="email" value="{{ old('email', @$rental_application->email ?? (Auth::check() ? Auth::user()->email : '')) }}" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label class="required" for="phone">Applicant Home Phone</label>
                                <input placeholder="+1 (999) 999-9999" id="phone" type="text" class="form-control maskField" mask="+1 (999) 999-9999" name="phone" value="{{ old('phone', @$rental_application->phone ?? (Auth::check() ? Auth::user()->phone : '')) }}" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12"><label class="required" for="emc_first_name">Emergency Contact Name</label></div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group {{ $errors->has('emc_first_name') ? 'has-error' : '' }}">
                                <input id="emc_first_name" type="text" class="form-control" name="emc_first_name" value="{{ old('emc_first_name', @$rental_application->emc_first_name) }}" placeholder="First Name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group {{ $errors->has('emc_last_name') ? 'has-error' : '' }}">
                                <input id="emc_last_name" type="text" class="form-control" name="emc_last_name" value="{{ old('emc_last_name', @$rental_application->emc_last_name) }}" placeholder="Last Name" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group {{ $errors->has('emc_relation') ? 'has-error' : '' }}">
                                <label class="required" for="emc_relation">Emergency Contact Relationship</label>
                                <input placeholder="Emergency Contact Relationship" id="emc_relation" type="text" class="form-control" name="emc_relation" value="{{ old('emc_relation', @$rental_application->emc_relation) }}" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group {{ $errors->has('emc_email') ? 'has-error' : '' }}">
                                <label class="required" for="emc_email">Emergency Contact E-mail</label>
                                <input placeholder="Emergency Contact E-mail" id="emc_email" type="text" class="form-control" name="emc_email" value="{{ old('emc_email', @$rental_application->emc_email) }}" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('emc_phone') ? 'has-error' : '' }}">
                                <label class="required" for="emc_phone">Emergency Contact Phone</label>
                                <input placeholder="Emergency Contact Phone" id="emc_phone" type="text" class="form-control" name="emc_phone" value="{{ old('emc_phone', @$rental_application->emc_phone) }}" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Applicant information --}}

                {{-- Rental history --}}
                <div id="rental_history" class="app_section_content">
                    <div class="repeater-rental_history">
                        <div data-repeater-list="rental_history">
                            @if (is_array($rentalHistories) && count($rentalHistories) > 0)
                                @foreach ($rentalHistories as $key => $rentalHistory)
                                    @include('rentalapplication::partial._rentalHistoryPartial')
                                @endforeach
                            @else
                                @include('rentalapplication::partial._rentalHistoryPartial')
                            @endif
                        </div>
                        <div class="form-group">
                            <span data-repeater-create="" class="btn text-success btn-md">
                                <span class="fas fa-plus"></span> Additional Landlord Reference
                            </span>
                        </div>
                    </div>
                </div>
                {{-- Rental history --}}

                {{-- Employment --}}
                <div id="employment" class="app_section_content">
                    <div class="repeater-employment">
                        <div data-repeater-list="employment">
                            @if (is_array($employments) && count($employments) > 0)
                                @foreach ($employments as $key => $employment)
                                    @include('rentalapplication::partial._employmentPartial')
                                @endforeach
                            @else
                                @include('rentalapplication::partial._employmentPartial')
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group">
                                    <span data-repeater-create="" class="btn text-success btn-md">
                                        <span class="fas fa-plus"></span> Add additional Employment
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Employment --}}

                {{-- References --}}
                <div id="references" class="app_section_content">
                    <div class="repeater-references">
                        <div data-repeater-list="references">
                            @if (is_array($references) && count($references) > 0)
                                @foreach ($references as $key => $reference)
                                    @include('rentalapplication::partial._referencesPartial')
                                @endforeach
                            @else
                                @include('rentalapplication::partial._referencesPartial')
                            @endif
                        </div>
                        <div class="form-group">
                            <span data-repeater-create="" class="btn text-success btn-md">
                                <span class="fas fa-plus"></span> Add additional References
                            </span>
                        </div>
                    </div>
                </div>
                {{-- References --}}

                {{-- Cosigners --}}
                <div id="cosigners" class="app_section_content">
                    <h5>Cosigners</h5>
                    <div class="repeater-cosigners">
                        <div data-repeater-list="cosigners">
                            @if (is_array($cosigners) && count($cosigners) > 0)
                                @foreach ($cosigners as $key => $cosigner)
                                    @include('rentalapplication::partial._cosignersPartial')
                                @endforeach
                            @else
                                @include('rentalapplication::partial._cosignersPartial')
                            @endif
                        </div>
                        <div class="form-group">
                            <span data-repeater-create="" class="btn text-success btn-md">
                                <span class="fas fa-plus"></span> Add Cosigners
                            </span>
                        </div>
                    </div>
                </div>
                {{-- Cosigners --}}

                {{-- Additional occupants --}}
                <div id="additional_occupants" class="app_section_content">
                    <h5>Additional occupants</h5>
                    <div class="repeater-additional_occupants">
                        <div data-repeater-list="additional_occupants">
                            @if (is_array($additionalOccupants) && count($additionalOccupants) > 0)
                                @foreach ($additionalOccupants as $key => $additionalOccupant)
                                    @include('rentalapplication::partial._additionalOccupantsPartial')
                                @endforeach
                            @else
                                @include('rentalapplication::partial._additionalOccupantsPartial')
                            @endif
                        </div>
                        <div class="form-group">
                            <span data-repeater-create="" class="btn text-success btn-md">
                                <span class="fas fa-plus"></span> Add Additional occupants
                            </span>
                        </div>
                    </div>
                </div>
                {{-- Additional occupants --}}

                {{-- Pets --}}
                <div id="pets" class="app_section_content">
                    <h5>Pets</h5>
                    <div class="repeater-pets">
                        <div data-repeater-list="pets">
                            @if (is_array($pets) && count($pets) > 0)
                                @foreach ($pets as $key => $pet)
                                    @include('rentalapplication::partial._petsPartial')
                                @endforeach
                            @else
                                @include('rentalapplication::partial._petsPartial')
                            @endif
                        </div>
                        <div class="form-group">
                            <span data-repeater-create="" class="btn text-success btn-md">
                                <span class="fas fa-plus"></span> Add Pets
                            </span>
                        </div>
                    </div>
                </div>
                {{-- Pets --}}

                {{-- Vehicles --}}
                <div id="vehicles" class="app_section_content">
                    <h5>Vehicles</h5>
                    <div class="repeater-vehicles">
                        <div data-repeater-list="vehicles">
                            @if (is_array($vehicles) && count($vehicles) > 0)
                                @foreach ($vehicles as $key => $vehicle)
                                    @include('rentalapplication::partial._vehiclesPartial')
                                @endforeach
                            @else
                                @include('rentalapplication::partial._vehiclesPartial')
                            @endif
                        </div>
                        <div class="form-group">
                            <span data-repeater-create="" class="btn text-success btn-md">
                                <span class="fas fa-plus"></span> Add Vehicles
                            </span>
                        </div>
                    </div>
                </div>
                {{-- Vehicles --}}

                {{-- Terms and conditions --}}
                <div id="terms_and_conditions" class="app_section_content">
                    <h5>Terms And Conditions</h5>
                    <p>I understand that this is a routine application to establish credit, character, employment, and rental history. I also understand that this is NOT an agreement to rent and that all applications must be approved. I authorize the verification of references given. I declare that the statements above are true and correct, and I agree that the landlord may terminate my agreement entered into in reliance on any misstatement made above.</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <input {{ old('agreed_to', @$rental_application->agreed_to) == 'Yes' ? 'checked' : '' }} class="form-check-input" type="checkbox" name="agreed_to" id="agreed_to" value="Yes" required>
                                <label class="form-check-label required" for="agreed_to">Agreed To</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="form-group">
                                <label class="required">Agreed By</label>
                                {{-- <!--<input type="text" class="form-control" name="agreed_by" value="{{ old('agreed_by', @$rental_application->agreed_by) }}" autocomplete="off" required>--> --}}
                            </div>
                            @php
                                $sign_id = 1;
                                $sign_field = 'agreed_by';
                                $sign_field_value = @$rental_application->agreed_by;
                            @endphp
                            <div id="signbox_{{ $sign_id }}" class="form-row-group {{ $errors->has('agreed_by') ? ' has-error' : '' }}" style="margin-left: 10px;">
                                <div class="form-row">
                                    <div class="col-12">
                                        @if (@$sign_field_value == '')
                                            {!! SignPad($sign_id, 'Agreed By') !!}
                                            @if (old($sign_field))
                                                <div class="sign-pad signtyped old_sign">
                                                    @if (is_base64(old($sign_field)) == true)
                                                        <img src="{{ old($sign_field) }}">
                                                    @else
                                                        {{ old($sign_field) }}
                                                    @endif
                                                </div>
                                            @endif
                                        @else
                                            <div class="sign-pad signtyped">
                                                @if (is_base64($sign_field_value) == true)
                                                    <img src="{{ $sign_field_value }}">
                                                @else
                                                    {{ $sign_field_value }}
                                                @endif
                                            </div>
                                        @endif
                                        <input id="{{ $sign_field }}" type="hidden" class="form-control  setfield_{{ $sign_id }}" name="{{ $sign_field }}" value="{{ $sign_field_value ?? old($sign_field) }}">
                                    </div>
                                </div>
                                @if ($errors->has($sign_field))
                                    <span class="text-danger">{{ $errors->first($sign_field) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Terms and conditions --}}

                {{-- Financial Suitability --}}
                <div id="financial_Suitability" class="app_section_content">
                    <div class="repeater-financial_suitability">
                        <div data-repeater-list="financial_suitability">
                            @if (is_array($financialSuitabilities) && count($financialSuitabilities) > 0)
                                @foreach ($financialSuitabilities as $key => $financialSuitability)
                                    @include('rentalapplication::partial._financialSuitabilitiesPartial')
                                @endforeach
                            @else
                                @include('rentalapplication::partial._financialSuitabilitiesPartial')
                            @endif
                        </div>
                        <div class="form-group">
                            <span data-repeater-create="" class="btn text-success btn-md">
                                <span class="fas fa-plus"></span> Add additional Financial Suitability
                            </span>
                        </div>
                    </div>
                </div>
                {{-- Financial Suitability --}}

                {{-- Identification --}}
                <div id="identification" class="app_section_content">
                    <h5>Identification</h5>
                    <p>Picture ID required (Driver's License or Passport)</p>
                    <input type="file" name="picture_id" id="picture_id" onchange="filePreview(this)" required />
                    <span class="d-block error-message" style="font-size: 12px;">Please upload a picture of Driver's License or Passport and upload it here. (jpeg, jpg, png)</span>
                    <div class="media_preview">
                        @if (isset($rental_application->picture_id))
                            <img src="{{ asset($rental_application->picture_id) }}" width="150" height="150" style="object-fit:cover">
                        @endif
                    </div>
                </div>
                {{-- Identification --}}

                {{-- Total # of Occupants --}}
                <div id="total_occupants" class="app_section_content">
                    <h5>Total # of Occupants (including you)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('total_occupants') ? 'has-error' : '' }}">
                                <label class="required" for="total_occupants">Total # of Occupants (including you)</label>
                                <input id="total_occupants" type="number" class="form-control" name="total_occupants" value="{{ old('total_occupants', @$rental_application->total_occupants) }}" autocomplete="off" required>
                                @if ($errors->has('total_occupants'))
                                    <span class="text-danger">{{ $errors->first('total_occupants') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p>By submitting this application, I am: (1) giving {{ appName() }} Real Estate Management permission to run a background check on me, which may include obtaining my credit report from a consumer reporting agency; and (2) agreeing to the <a href="{{ $slug ? route('dynamic.privacyPolicy', ['subdomain' => $slug]) : route('frontend.privacy') }}" target="_blank">Privacy Policy</a> and <a href="{{ $slug ? route('dynamic.termsConditions', ['subdomain' => $slug]) : route('frontend.terms') }}" target="_blank">Terms of Service</a>. </p>
                </div>
                {{-- Total # of Occupants --}}
            </div>
        </div>
        <div class="card-body" id="form_preview_wrapper"></div>
    </div>
    <div class="card-footer text-right" style="float: right;">
        <a href="{{ route('rental_application.rentalApplication') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" name="action" value="save_resume_later" id="save_resume_later" class="btn btn-dark" formaction="{{ route('rental_application.rentalApplicationSave') }}" formnovalidate>Save & resume later</button>
        <button type="submit" name="action" value="edit_application" id="edit_application" class="btn btn-warning" style="display:none" formaction="{{ route('rental_application.rentalApplicationSave') }}" formnovalidate>Edit Application</button>
        <button type="submit" name="action" value="review_application" id="review_application" class="btn btn-danger" formaction="{{ route('rental_application.previewApplicationForm') }}">Review application</button>
        <button type="submit" name="action" value="submit_application" id="submit_application" class="btn btn-danger" formaction="{{ route('rental_application.rentalApplicationSubmit') }}" style="display:none">Submit application</button>
    </div>
</form>
