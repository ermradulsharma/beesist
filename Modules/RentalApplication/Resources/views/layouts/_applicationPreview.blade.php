<div class="card-box">
    <div class="card-body box-body">
        @if ($property->id)
            <h4>Property Information </h4>
            <div class="properties-list">
                <div class="listing-info-card">
                    <div class="listing-info-card__property-info">
                        <img class="property-info__image ng-star-inserted" src="{{ isset($property->featured_image['url']) ? asset('uploads/properties/' . $property->id . '/property_photos/thumbs/' . @$property->featured_image['url']) : asset('images/bolld-placeholder.png') }}" alt="{{ $property->title }}">
                        <div class="property-info__details">
                            <div class="details__building-name">{{ $property->title }}</div>
                            <div class="details__address__display">{{ $property->address }}</div>
                            <div> {{ $property->prop_type }} | {{ $property->beds }} Bed | {{ $property->baths }} Bath </div>
                        </div>
                    </div>
                    <div class="listing-info-card__lease-info">
                        <div class="lease-info__price">${{ number_format($property->rate, 2) }}<span>/{{ $property->rateper }}</span></div>
                        {{-- <div class="lease-info__date"> AVAILABLE JUNE 1 </div> --}}
                    </div>
                </div>
            </div>
        @endif
        <div id="app_content" class="pt-3">
            {{-- Applicant information --}}
            <h5>Applicant information</h5>
            <div class="listing-info-card">
                <div id="applicant_information" class="app_section_content">
                    <small>
                        <strong>NOTE:</strong>
                        <ul>
                            <li>Please note that cosigners needs to send a separate application</li>
                            <li>If you wish to speed up the process of your application please go to <a href="https://www.equifax.com/personal/credit-report-services/free-credit-reports/" target="_blank">https://www.equifax.com/personal/credit-report-services/free-credit-reports/</a> and print screen and share your credit score with us.</li>
                        </ul>
                    </small>
                    <div class="applicant-info">
                        <p><strong>Applicant Name:</strong> {{ $rental_application->first_name }} {{ $rental_application->last_name }}</p>
                        <p><strong>Have you viewed the home?</strong> {{ $rental_application->viewed_home }}</p>
                        <p><strong>Applicant birth date:</strong> {{ $rental_application->dob }}</p>
                        <p><strong>SIN:</strong> {{ $rental_application->sin }}</p>
                        <p><strong>Applicant current address:</strong> {{ $rental_application->street_address }}, {{ $rental_application->city }}, {{ $rental_application->state }}, {{ $rental_application->zip_code }}, {{ $rental_application->country }}</p>
                        <p><strong>Applicant Email:</strong> {{ $rental_application->email }}</p>
                        <p><strong>Applicant home phone:</strong> {{ $rental_application->phone }}</p>
                        <p><strong>Emergency contact name:</strong> {{ $rental_application->emc_first_name }} {{ $rental_application->emc_last_name }}</p>
                        <p><strong>Emergency contact relationship:</strong> {{ $rental_application->emc_relation }}</p>
                        <p><strong>Emergency contact email:</strong> {{ $rental_application->emc_email }}</p>
                        <p><strong>Emergency contact phone:</strong> {{ $rental_application->emc_phone }}</p>
                    </div>
                </div>
            </div>
            {{-- Applicant information --}}

            {{-- Property Applying For --}}
            <div id="property_applying_for" class="app_section_content pt-3">
                <h5>Property Applying For</h5>
                <div class="listing-info-card">
                    <p>Please enter the property name (as per our advertisement) or the address of the property you are applying for.</p>
                    <p> <strong>Property Applying For</strong> {{ $rental_application->property_applying_for }}</p>
                </div>
            </div>
            {{-- Property Applying For --}}

            {{-- Property information --}}
            <div id="property_information" class="app_section_content pt-3">
                <h5>Property information</h5>
                <div class="listing-info-card">
                    <p> <strong>Desired move-in date</strong> {{ $rental_application->desired_move_in_date }}</p>
                    <p> <strong>Desired lease duration</strong> {{ $rental_application->desired_lease_duration }}</p>
                </div>
            </div>
            {{-- Property information --}}

            {{-- Rental history --}}
            @if (!empty($rental_histories) && count($rental_histories) > 0)
                <div id="rental_history" class="app_section_content pt-3">
                    @foreach ($rental_histories ?? [] as $key => $rental_history)
                        <h5>Rental history <span class="repeaterItemNumber">{{ $key > 0 ? $key : '' }}</span></h5>
                        <div class="listing-info-card">
                            <p>IMPORTANT:</p>
                            <p>Please help us run your application efficiently. Unfortunately, we are not able to run your application without checking your landlord's reference. We will contact your landlord three times and after the thrid attempt unfortunately we will reject your application due to not being able to verify your reference.</p>
                            <p>Please contact your landlord and ask them when is a good time to call them and let us know below. We will be calling the number you provide here.</p>
                            <div class="row">
                                <div class="col-8">
                                    <p><strong>Rental Address</strong><br>
                                        {{ $rental_history->street_address }}<br>{{ $rental_history->city }}, {{ $rental_history->city }} {{ $rental_history->zip_code }}<br>{{ $rental_history->country }}
                                    </p>
                                    <p><strong>Rental Dates</strong>{{ $rental_history->rental_start_date }} - {{ $rental_history->rental_end_date }}</p>
                                    <p><strong>Monthly Rent</strong> {{ $rental_history->monthly_rent }}</p>
                                    <p><strong>Reason For Leaving</strong> {{ $rental_history->reason_for_leaving }}</p>
                                    <p><strong>Landlord Name</strong> {{ $rental_history->landlord_first_name }} {{ $rental_history->landlord_last_name }}</p>
                                    <p><strong>Landlord Phone Number</strong> {{ $rental_history->landlord_phone }}</p>
                                    <p><strong>Landlord Email</strong> {{ $rental_history->landlord_email }}</p>
                                </div>
                                @if (isset($rental_history->landlord_reference_letter))
                                    <div class="col-4 img-reference">
                                        <p><strong>Landlord Reference Letter</strong><br></p>
                                        <img src="{{ asset($rental_history->landlord_reference_letter) }}">
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p><strong style="min-width: 270px;">Good time and day to call your landlord</strong> {{ $rental_history->time_to_call_landlord }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            {{-- Rental history --}}

            {{-- Employment --}}
            @if (!empty($employments) && count($employments) > 0)
                <div id="employment" class="app_section_content pt-3">
                    @foreach ($employments ?? [] as $key => $employment)
                        <h5>Employment <span class="repeaterItemNumber">{{ $key > 0 ? $key : '' }}</span></h5>
                        <div class="listing-info-card">
                            <p>IMPORTANT:</p>
                            <p>Please help us run your application efficiently. Unfortunately, we are not able to run your application without checking your employment reference. We will contact your landlord three times and after the third attempt unfortunately we will reject your application due to not being able to verify your reference.</p>
                            <p>Please contact your eployer and ask them when is a good time to call them and let us know below. We will be calling the number you provide here.</p>
                            <p><strong>Employer Name</strong> {{ $employment->name }}</p>
                            <p><strong>Employer Address</strong><br> {{ $employment->street_address }}<br>{{ $employment->city }}, {{ $employment->city }} {{ $employment->zip_code }}<br>{{ $employment->country }}</p>
                            <p><strong>Employer E-mail</strong> {{ $employment->employer_email }}</p>
                            <p><strong>Employer Phone</strong> {{ isset($employment->employer_phone) ? $employment->employer_phone : 'N/A' }}</p>
                            <p><strong>Position Held</strong> {{ $employment->position_held }}</p>
                            <p><strong>Employment Dates</strong> {{ $employment->start_date }} - {{ $employment->end_date }}</p>
                            <p><strong>Monthly Gross Salary</strong> {{ $employment->salary }}</p>
                            <p><strong>Supervisor Name</strong> {{ $employment->supervisor_first_name }} {{ $employment->supervisor_last_name }}</p>
                            <p><strong>Supervisor Title</strong> {{ $employment->supervisor_title }}</p>
                            <p><strong style="min-width: 300px">Good time and day to contact your employer</strong> {{ $employment->time_to_call_employer }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
            {{-- Employment --}}

            {{-- References --}}
            @if (!empty($referencess) && count($referencess) > 0)
                <div id="references" class="app_section_content pt-3">
                    @foreach ($referencess as $key => $references)
                        <h5>References <span class="repeaterItemNumber">{{ $key > 0 ? $key : '' }}</span></h5>
                        <div class="listing-info-card">
                            <p><strong>Supervisor Name</strong> {{ $references->first_name }} {{ $references->last_name }}</p>
                            <p><strong>Reference Relationship</strong> {{ $references->relationship }}</p>
                            <p><strong>Reference Phone Number</strong> {{ $references->phone }}</p>
                            <p><strong>Reference E-mail</strong> {{ $references->email }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
            {{-- References --}}

            {{-- Cosigners --}}
            @if (!empty($cosignerss) && count($cosignerss) > 0)
                <div id="cosigners" class="app_section_content pt-3">
                    <h5>Cosigners</h5>
                    <div class="listing-info-card">
                        @foreach ($cosignerss as $key => $cosigners)
                            {!! $key > 0 ? '<h5>Cosigners ' . $key . '</h5>' : '' !!}
                            <p> <strong>Cosigner Name</strong> {{ $cosigners->first_name }} {{ $cosigners->last_name }}</p>
                            <p> <strong>Cosigner Relationship</strong> {{ $cosigners->relationship }}</p>
                            <p> <strong>Cosigner Social Security Number</strong> {{ $cosigners->ssn }}</p>
                            <p> <strong>Cosigner Phone Number</strong> {{ $cosigners->phone_number }}</p>
                            <p> <strong>Birthday</strong> {{ $cosigners->birth_date }}</p>
                            <p> <strong>Home Address</strong> <br> {{ $cosigners->street_address }}<br>{{ $cosigners->city }}, {{ $cosigners->city }} {{ $cosigners->zip_code }}<br>{{ $cosigners->country }}</p>
                            <p> <strong>Cosigner E-mail</strong> {{ $cosigners->cosigner_email }}</p>
                            <p> <strong>Name of Employer/Company Name</strong> {{ $cosigners->employer_name }}</p>
                            <p> <strong>Position</strong> {{ $cosigners->position }}</p>
                            <p> <strong>Employment - Monthly Income</strong> {{ $cosigners->employment_monthly_income }}</p>
                            <p> <strong>Supervisor Name</strong> {{ $cosigners->supervisor_name }}</p>
                            <p> <strong>Supervisor Number</strong> {{ $cosigners->supervisor_number }}</p>
                            <p> <strong>Supervisor E-mail</strong> {{ $cosigners->supervisor_email }}</p>
                            <p> <strong>Financial Suitability Documents (Pay stubs, employment contract or bank statements)</strong><br>
                                @if (isset($cosigners->financial_suitability_documents))
                                    <img src="{{ asset($cosigners->financial_suitability_documents) }}" style="height: 96px;width: 120px;">
                                @endif
                            </p>

                            <p> <strong>Credit Report (From Credit Karma https://www.creditkarma.ca)</strong> <br>
                                @if (isset($cosigners->credit_report))
                                    <img src="{{ asset($cosigners->credit_report) }}" style="height: 96px;width: 120px;">
                                @endif
                            </p>

                            <p> <strong>Additional Financial Suitability Documents (Pay stubs, employment contract or bank statements)</strong> <br>
                                @if (isset($cosigners->additional_financial_suitability_documents))
                                    <img src="{{ asset($cosigners->additional_financial_suitability_documents) }}" style="height: 96px;width: 120px;">
                                @endif
                            </p>

                            <p> <strong>ID</strong> <br>
                                @if (isset($cosigners->id))
                                    <img src="{{ asset($cosigners->id) }}" style="height: 96px;width: 120px;">
                                @endif
                            </p>
                        @endforeach
                    </div>
                </div>
            @endif
            {{-- Cosigners --}}

            {{-- Additional occupants --}}
            @if (!empty($additional_occupantses) && count($additional_occupantses) > 0)
                <div id="additional_occupants" class="app_section_content">
                    <h5>Additional occupants</h5>
                    <div class="listing-info-card">
                        @if ($additional_occupantses)
                            @foreach ($additional_occupantses as $key => $additional_occupants)
                                {!! $key > 0 ? '<h5>Additional occupants ' . $key . '</h5>' : '' !!}
                                <p> <strong>Occupant Name</strong> {{ $additional_occupants->first_name }} {{ $additional_occupants->last_name }}</p>
                                <p> <strong>Reference Relationship</strong> {{ $additional_occupants->relationship }}</p>
                                <p> <strong>Occupant Birth Date</strong> {{ $additional_occupants->birth_date }}</p>
                                <p> <strong>Occupant E-mail</strong> {{ $additional_occupants->occupant_email }}</p>
                                <p> <strong>Occupant Phone Number</strong> {{ $additional_occupants->phone_number }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
            {{-- Additional occupants --}}

            {{-- Pets --}}
            @if (!empty($petses) && count($petses) > 0)
                <div id="pets" class="app_section_content pt-3">
                    <h5>Pets</h5>
                    <div class="listing-info-card">
                        @if ($petses)
                            @foreach ($petses as $key => $pet)
                                {!! $key > 0 ? '<h5>Pets ' . $key . '</h5>' : '' !!}
                                <p> <strong>Pet Type</strong> {{ $pet->type }}</p>
                                <p> <strong>Pet Breed</strong> {{ $pet->breed }}</p>
                                <p> <strong>Pet Age</strong> {{ $pet->age }}</p>
                                <p> <strong>Pet Spayed or Neutered</strong> {{ $pet->spayed }}</p>
                                <p> <strong>Pet License Number</strong> {{ $pet->license_number }}</p>
                                <p> <strong>Pet Weight</strong> {{ $pet->weight }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
            {{-- Pets --}}

            {{-- Vehicles --}}
            @if (!empty($vehicleses) && count($vehicleses) > 0)
                <div id="vehicles" class="app_section_content pt-3">
                    <h5>Vehicles</h5>
                    <div class="listing-info-card">
                        @if ($vehicleses)
                            @foreach ($vehicleses as $key => $vehicles)
                                {!! $key > 0 ? '<h5>Vehicles ' . $key . '</h5>' : '' !!}
                                <p> <strong>Vehicle Make</strong> {{ $vehicles->make }}</p>
                                <p> <strong>Vehicle Model</strong> {{ $vehicles->model }}</p>
                                <p> <strong>Vehicle Color</strong> {{ $vehicles->color }}</p>
                                <p> <strong>Vehicle Year</strong> {{ $vehicles->year }}</p>
                                <p> <strong>Vehicle License Plate</strong> {{ $vehicles->license_plate }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
            {{-- Vehicles --}}

            {{-- Terms and conditions --}}
            <div id="terms_and_conditions" class="app_section_content pt-3">
                <h5>Terms and conditions</h5>
                <div class="listing-info-card">
                    <p>I understand that this is a routine application to establish credit, character, employment, and rental history. I also understand that this is NOT an agreement to rent and that all applications must be approved. I authorize the verification of references given. I declare that the statements above are true and correct, and I agree that the landlord may terminate my agreement entered into in reliance on any misstatement made above.</p>
                    <p> <strong>Agreed To</strong> {{ $rental_application->agreed_to }}</p>
                    <p> <strong>Agreed By</strong> <br>
                        @if (is_base64($rental_application->agreed_by) == true)
                            <img src="{{ $rental_application->agreed_by }}">
                        @else
                            <strong>{{ $rental_application->agreed_by }}</strong>
                        @endif
                    </p>
                </div>
            </div>
            {{-- Terms and conditions --}}

            {{-- Financial Suitability --}}
            @if (!empty($financial_suitabilities) && count($financial_suitabilities) > 0)
                <div id="financial_Suitability" class="app_section_content pt-3">
                    @foreach ($financial_suitabilities as $key => $financial_suitability)
                        {!! $key > 0 ? '<h5>Financial Suitability ' . $key . '</h5>' : '' !!}
                        <h5>Financial Suitability {{ $key > 0 ? $key : '' }}</h5>
                        <div class="listing-info-card">
                            <p>Financial Suitability of prospects required to offer tenancy. The income of at least 2.5 times the rent for a single person and 3 times the rent for a couple</p>
                            <div class="row">
                                <div class="col-6">
                                    <p>Financial Documents (Pay stub or Job offering letter)<br>
                                        @if (isset($financial_suitability->job_offer_letter))
                                            <img src="{{ asset($financial_suitability->job_offer_letter) }}" style="height: 96px;width: 120px;">
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p>Financial Document (Bank Statements - Substantial savings in Canadian Bank Account)<br>
                                        @if (isset($financial_suitability->bank_statement))
                                            <img src="{{ asset($financial_suitability->bank_statement) }}" style="height: 96px;width: 120px;">
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p>Credit Score (From Equifax : https://www.consumer.equifax.ca/personal/products/credit-score-report/)<br>
                                        @if (isset($financial_suitability->credit_score))
                                            <img src="{{ asset($financial_suitability->credit_score) }}" style="height: 96px;width: 120px;">
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            {{-- Financial Suitability --}}

            {{-- Identification --}}
            @if (isset($rental_application->picture_id))
                <div id="identification" class="app_section_content pt-3">
                    <h5>Identification</h5>
                    <div class="listing-info-card">
                        <p> <strong style="min-width: 500px;">Picture ID required (Driver's License or Passport)</strong> <br>
                            <img src="{{ asset($rental_application->picture_id) }}" style="height: 96px;width: 120px;">
                        </p>
                    </div>
                </div>
            @endif
            {{-- Identification --}}

            {{-- Total # of Occupants --}}
            <div id="total_occupants" class="app_section_content pt-3">
                <h5>Total # of Occupants (including you)</h5>
                <div class="listing-info-card">
                    <p><strong style="min-width: 300px;">Total # of Occupants (including you)</strong> {{ $rental_application->total_occupants }}</p>
                    <hr>
                    <p>By submitting this application, I am: (1) giving {{ appName() }} Real Estate Management permission to run a background check on me, which may include obtaining my credit report from a consumer reporting agency; and (2) agreeing to the <a href="{{ route('frontend.privacy') }}" target="_blank">Privacy Policy</a> and <a href="{{ route('frontend.terms') }}" target="_blank">Terms of Service</a>. </p>
                </div>
            </div>
            {{-- Total # of Occupants --}}
        </div>
    </div>
</div>
