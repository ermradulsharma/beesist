<div class="card-body">
    @if ($property)
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

    <div id="app_content">

        {{-- Applicant information --}}
        <div id="applicant_information" class="app_section_content">
            <h5>Applicant information</h5>
            <small>
                <strong>NOTE:</strong>
                <ul>
                    <li>Please note that cosigners needs to send a separate application</li>
                    <li>If you wish to speed up the process of your application please go to <a href="https://www.equifax.com/personal/credit-report-services/free-credit-reports/" target="_blank">https://www.equifax.com/personal/credit-report-services/free-credit-reports/</a> and print screen and share your credit score with us.</li>
                </ul>
            </small>
            <p>Applicant name<br>
                <strong>{{ $rental_application->first_name }} {{ $rental_application->last_name }}</strong>
            </p>
            <p>Have you viewed the home?<br>
                <strong>{{ $rental_application->viewed_home }}</strong>
            </p>
            <p>Applicant birth date<br>
                <strong>{{ $rental_application->dob }}</strong>
            </p>
            <p>SIN<br>
                <strong>{{ $rental_application->sin }}</strong>
            </p>
            <p>Applicant current address<br>
                <strong>{{ $rental_application->street_address }}<br>{{ $rental_application->city }}, {{ $rental_application->city }} {{ $rental_application->zip_code }}<br>{{ $rental_application->country }}</strong>
            </p>
            <p>Applicant Email<br>
                <strong>{{ $rental_application->email }}</strong>
            </p>
            <p>Applicant home phone<br>
                <strong>{{ $rental_application->phone }}</strong>
            </p>
            <p>Emergency contact name<br>
                <strong>{{ $rental_application->emc_first_name }} {{ $rental_application->emc_last_name }}</strong>
            </p>
            <p>Emergency contact relationship<br>
                <strong>{{ $rental_application->emc_relation }}</strong>
            </p>
            <p>Emergency contact email<br>
                <strong>{{ $rental_application->emc_email }}</strong>
            </p>
            <p>Emergency contact email<br>
                <strong>{{ $rental_application->emc_phone }}</strong>
            </p>
        </div>
        {{-- Applicant information --}}

        {{-- Property Applying For --}}
        <div id="property_applying_for" class="app_section_content">
            <h5>Property Applying For</h5>
            <p>Please enter the property name (as per our advertisement) or the address of the property you are applying for.</p>
            <p>Property Applying For<br>
                <strong>{{ $rental_application->property_applying_for }}</strong>
            </p>
            <hr>
        </div>
        {{-- Property Applying For --}}

        {{-- Property information --}}
        <div id="property_information" class="app_section_content">
            <h5>Property information</h5>
            <p>Desired move-in date<br>
                <strong>{{ $rental_application->desired_move_in_date }}</strong>
            </p>
            <p>Desired lease duration<br>
                <strong>{{ $rental_application->desired_lease_duration }}</strong>
            </p>
            <hr>
        </div>
        {{-- Property information --}}

        {{-- Rental history --}}
        <div id="rental_history" class="app_section_content">

            @php $rental_history_data = json_decode(json_encode($rental_application->rental_history)); @endphp
            @foreach ($rental_history_data as $key => $rental_history)
                <h5>Rental history <span class="repeaterItemNumber">{{ $key > 0 ? $key : '' }}</span></h5>
                <p>IMPORTANT:</p>
                <p>Please help us run your application efficiently. Unfortunately, we are not able to run your application without checking your landlord's reference. We will contact your landlord three times and after the thrid attempt unfortunately we will reject your application due to not being able to verify your reference.</p>
                <p>Please contact your landlord and ask them when is a good time to call them and let us know below. We will be calling the number you provide here.</p>
                <p>Rental address<br>
                    <strong>{{ $rental_history->street_address }}<br>{{ $rental_history->city }}, {{ $rental_history->city }} {{ $rental_history->zip_code }}<br>{{ $rental_history->country }}</strong>
                </p>
                <p>Rental dates<br>
                    <strong>{{ $rental_history->rental_start_date }} - {{ $rental_history->rental_end_date }}</strong>
                </p>
                <p>Monthly rent<br>
                    <strong>{{ $rental_history->monthly_rent }}</strong>
                </p>
                <p>Reason for leaving<br>
                    <strong>{{ $rental_history->reason_for_leaving }}</strong>
                </p>
                <p>Landlord name<br>
                    <strong>{{ $rental_history->landlord_first_name }} {{ $rental_history->landlord_last_name }}</strong>
                </p>
                <p>Landlord Phone Number<br>
                    <strong>{{ $rental_history->landlord_phone }}</strong>
                </p>
                <p>Landlord Email<br>
                    <strong>{{ $rental_history->landlord_email }}</strong>
                </p>
                <p>Landlord Reference Letter<br>
                    @if (isset($rental_application['rental_history'][$key]['landlord_reference_letter']))
                        <img src="data:image/png;base64, {{ base64_encode(file_get_contents($rental_application['rental_history'][$key]['landlord_reference_letter'])) }}" style="height: 96px;width: 120px;">
                    @endif
                </p>
                <p>Good time and day to call your landlord<br>
                    <strong>{{ $rental_history->time_to_call_landlord }}</strong>
                </p>
            @endforeach
        </div>
        {{-- Rental history --}}

        {{-- Employment --}}
        <div id="employment" class="app_section_content">
            @php $employment_data = json_decode(json_encode($rental_application->employment)); @endphp
            @foreach ($employment_data as $key => $employment)
                <h5>Employment <span class="repeaterItemNumber">{{ $key > 0 ? $key : '' }}</span></h5>
                <p>IMPORTANT:</p>
                <p>Please help us run your application efficiently. Unfortunately, we are not able to run your application without checking your employment reference. We will contact your landlord three times and after the third attempt unfortunately we will reject your application due to not being able to verify your reference.</p>
                <p>Please contact your eployer and ask them when is a good time to call them and let us know below. We will be calling the number you provide here.</p>
                <p>Employer name<br>
                    <strong>{{ $employment->name }}</strong>
                </p>
                <p>Employer address<br>
                    <strong>{{ $employment->street_address }}<br>{{ $employment->city }}, {{ $employment->city }} {{ $employment->zip_code }}<br>{{ $employment->country }}</strong>
                </p>
                <p>Employer email<br>
                    <strong>{{ $employment->employer_email }}</strong>
                </p>
                <p>Employer Phone<br>
                    <strong>{{ $employment->employer_phone }}</strong>
                </p>
                <p>Position held<br>
                    <strong>{{ $employment->position_held }}</strong>
                </p>
                <p>Employment dates<br>
                    <strong>{{ $employment->start_date }} - {{ $employment->end_date }}</strong>
                </p>
                <p>Monthly gross salary<br>
                    <strong>{{ $employment->salary }}</strong>
                </p>
                <p>Supervisor name<br>
                    <strong>{{ $employment->supervisor_first_name }} {{ $employment->supervisor_last_name }}</strong>
                </p>
                <p>Supervisor title<br>
                    <strong>{{ $employment->supervisor_title }}</strong>
                </p>
                <p>Good time and day to contact your employer<br>
                    <strong>{{ $employment->time_to_call_employer }}</strong>
                </p>
            @endforeach
        </div>
        {{-- Employment --}}

        {{-- References --}}
        <div id="references" class="app_section_content">
            @php $references_data = json_decode(json_encode($rental_application->references)); @endphp
            @foreach ($references_data as $key => $references)
                <h5>References <span class="repeaterItemNumber">{{ $key > 0 ? $key : '' }}</span></h5>
                <p>Supervisor name<br>
                    <strong>{{ $references->first_name }} {{ $references->last_name }}</strong>
                </p>
                <p>Reference relationship<br>
                    <strong>{{ $references->relationship }}</strong>
                </p>
                <p>Reference phone number<br>
                    <strong>{{ $references->phone }}</strong>
                </p>
                <p>Reference email<br>
                    <strong>{{ $references->email }}</strong>
                </p>
            @endforeach
        </div>
        {{-- References --}}

        {{-- Cosigners --}}
        <div id="cosigners" class="app_section_content">
            <h5>Cosigners</h5>
            @php $cosigners_data = json_decode(json_encode($rental_application->cosigners)); @endphp
            @if (is_array($cosigners_data))
                @foreach ($cosigners_data as $key => $cosigners)
                    {!! $key > 0 ? '<h5>Cosigners ' . $key . '</h5>' : '' !!}
                    <p>Cosigner name<br>
                        <strong>{{ $cosigners->first_name }} {{ $cosigners->last_name }}</strong>
                    </p>
                    <p>Cosigner relationship<br>
                        <strong>{{ $cosigners->relationship }}</strong>
                    </p>
                    <p>Cosigner social security number<br>
                        <strong>{{ $cosigners->ssn }}</strong>
                    </p>
                    <p>Cosigner phone number<br>
                        <strong>{{ $cosigners->phone_number }}</strong>
                    </p>
                    <p>Birthday<br>
                        <strong>{{ $cosigners->birth_date }}</strong>
                    </p>
                    <p>Home Address<br>
                        <strong>{{ $cosigners->street_address }}<br>{{ $cosigners->city }}, {{ $cosigners->city }} {{ $cosigners->zip_code }}<br>{{ $cosigners->country }}</strong>
                    </p>
                    <p>Cosigner email<br>
                        <strong>{{ $cosigners->cosigner_email }}</strong>
                    </p>
                    <p>Name of Employer/Company Name<br>
                        <strong>{{ $cosigners->employer_name }}</strong>
                    </p>
                    <p>Position<br>
                        <strong>{{ $cosigners->position }}</strong>
                    </p>
                    <p>Employment - monthly income<br>
                        <strong>{{ $cosigners->employment_monthly_income }}</strong>
                    </p>
                    <p>Supervisor Name<br>
                        <strong>{{ $cosigners->supervisor_name }}</strong>
                    </p>
                    <p>Supervisor Number<br>
                        <strong>{{ $cosigners->supervisor_number }}</strong>
                    </p>
                    <p>Supervisor Email<br>
                        <strong>{{ $cosigners->supervisor_email }}</strong>
                    </p>
                    <p>Financial Suitability Documents (Pay stubs, employment contract or bank statements)<br>
                        @if (isset($rental_application['cosigners'][$key]['financial_suitability_documents']))
                            <img src="data:image/png;base64, {{ base64_encode(file_get_contents($rental_application['cosigners'][$key]['financial_suitability_documents'])) }}" style="height: 96px;width: 120px;">
                        @endif
                    </p>

                    <p>Credit Report (From Credit Karma https://www.creditkarma.ca)<br>
                        @if (isset($rental_application['cosigners'][$key]['credit_report']))
                            <img src="data:image/png;base64, {{ base64_encode(file_get_contents($rental_application['cosigners'][$key]['credit_report'])) }}" style="height: 96px;width: 120px;">
                        @endif
                    </p>

                    <p>Additional Financial Suitability Documents (Pay stubs, employment contract or bank statements)<br>
                        @if (isset($rental_application['cosigners'][$key]['additional_financial_suitability_documents']))
                            <img src="data:image/png;base64, {{ base64_encode(file_get_contents($rental_application['cosigners'][$key]['additional_financial_suitability_documents'])) }}" style="height: 96px;width: 120px;">
                        @endif
                    </p>

                    <p>ID<br>
                        @if (isset($rental_application['cosigners'][$key]['id']))
                            <img src="data:image/png;base64, {{ base64_encode(file_get_contents($rental_application['cosigners'][$key]['id'])) }}" style="height: 96px;width: 120px;">
                        @endif
                    </p>
                @endforeach
            @endif
        </div>
        {{-- Cosigners --}}

        {{-- Additional occupants --}}
        <div id="additional_occupants" class="app_section_content">
            <h5>Additional occupants</h5>
            @if ($rental_application->additional_occupants)
                @php $additional_occupants_data = json_decode(json_encode($rental_application->additional_occupants)); @endphp
                @foreach ($additional_occupants_data as $key => $additional_occupants)
                    {!! $key > 0 ? '<h5>Additional occupants ' . $key . '</h5>' : '' !!}
                    <p>Occupant name<br>
                        <strong>{{ $additional_occupants->first_name }} {{ $additional_occupants->last_name }}</strong>
                    </p>
                    <p>Reference relationship<br>
                        <strong>{{ $additional_occupants->relationship }}</strong>
                    </p>
                    <p>Occupant birth date<br>
                        <strong>{{ $additional_occupants->birth_date }}</strong>
                    </p>
                    <p>Occupant email<br>
                        <strong>{{ $additional_occupants->occupant_email }}</strong>
                    </p>
                    <p>Occupant phone number<br>
                        <strong>{{ $additional_occupants->phone_number }}</strong>
                    </p>
                @endforeach
            @endif
        </div>
        {{-- Additional occupants --}}

        {{-- Pets --}}
        <div id="pets" class="app_section_content">
            <h5>Pets</h5>
            @if ($rental_application->pets)
                @php $pets_data = json_decode(json_encode($rental_application->pets)); @endphp
                @foreach ($pets_data as $key => $pet)
                    {!! $key > 0 ? '<h5>Pets ' . $key . '</h5>' : '' !!}
                    <p>Pet type<br>
                        <strong>{{ $pet->type }}</strong>
                    </p>
                    <p>Pet Breed<br>
                        <strong>{{ $pet->breed }}</strong>
                    </p>
                    <p>Pet age<br>
                        <strong>{{ $pet->age }}</strong>
                    </p>
                    <p>Pet spayed or neutered<br>
                        <strong>{{ $pet->spayed }}</strong>
                    </p>
                    <p>Pet license number<br>
                        <strong>{{ $pet->license_number }}</strong>
                    </p>
                    <p>Pet weight<br>
                        <strong>{{ $pet->weight }}</strong>
                    </p>
                @endforeach
            @endif
        </div>
        {{-- Pets --}}

        {{-- Vehicles --}}
        <div id="vehicles" class="app_section_content">
            <h5>Vehicles</h5>
            @if ($rental_application->vehicles)
                @php $vehicles_data = json_decode(json_encode($rental_application->vehicles)); @endphp
                @foreach ($vehicles_data as $key => $vehicles)
                    {!! $key > 0 ? '<h5>Vehicles ' . $key . '</h5>' : '' !!}
                    <p>Vehicle make<br>
                        <strong>{{ $vehicles->make }}</strong>
                    </p>
                    <p>Vehicle model<br>
                        <strong>{{ $vehicles->model }}</strong>
                    </p>
                    <p>Vehicle color<br>
                        <strong>{{ $vehicles->color }}</strong>
                    </p>
                    <p>Vehicle year<br>
                        <strong>{{ $vehicles->year }}</strong>
                    </p>
                    <p>Vehicle license plate<br>
                        <strong>{{ $vehicles->license_plate }}</strong>
                    </p>
                @endforeach
            @endif
        </div>
        {{-- Vehicles --}}

        {{-- Terms and conditions --}}
        <div id="terms_and_conditions" class="app_section_content">
            <h5>Terms and conditions</h5>
            <p>I understand that this is a routine application to establish credit, character, employment, and rental history. I also understand that this is NOT an agreement to rent and that all applications must be approved. I authorize the verification of references given. I declare that the statements above are true and correct, and I agree that the landlord may terminate my agreement entered into in reliance on any misstatement made above.</p>
            <p>Agreed to<br>
                <strong>{{ $rental_application->agreed_to }}</strong>
            </p>
            <p>Agreed by<br>
                @if (is_base64($rental_application->agreed_by) == true)
                    <img src="{{ $rental_application->agreed_by }}">
                @else
                    <strong>{{ $rental_application->agreed_by }}</strong>
                @endif
            </p>
        </div>
        {{-- Terms and conditions --}}

        {{-- Financial Suitability --}}
        <div id="financial_Suitability" class="app_section_content">
            @php $financial_suitability_data = json_decode(json_encode($rental_application->financial_suitability)); @endphp
            @if (is_array($financial_suitability_data))
                @foreach ($financial_suitability_data as $key => $financial_suitability)
                    {!! $key > 0 ? '<h5>Financial Suitability ' . $key . '</h5>' : '' !!}
                    <h5>Financial Suitability {{ $key > 0 ? $key : '' }}</h5>
                    <p>Financial Suitability of prospects required to offer tenancy. The income of at least 2.5 times the rent for a single person and 3 times the rent for a couple</p>
                    <p>Financial Documents (Pay stub or Job offering letter)<br>
                        @if (isset($rental_application['financial_suitability'][$key]['job_offer_letter']))
                            <img src="data:image/png;base64, {{ base64_encode(file_get_contents($rental_application['financial_suitability'][$key]['job_offer_letter'])) }}" style="height: 96px;width: 120px;">
                        @endif
                    </p>
                    <p>Financial Document (Bank Statements - Substantial savings in Canadian Bank Account)<br>
                        @if (isset($rental_application['financial_suitability'][$key]['bank_statement']))
                            <img src="data:image/png;base64, {{ base64_encode(file_get_contents($rental_application['financial_suitability'][$key]['bank_statement'])) }}" style="height: 96px;width: 120px;">
                        @endif
                    </p>
                    <p>Credit Score (From Equifax : https://www.consumer.equifax.ca/personal/products/credit-score-report/)<br>
                        @if ($rental_application['financial_suitability'][$key]['credit_score'])
                            <img src="data:image/png;base64, {{ base64_encode(file_get_contents($rental_application['financial_suitability'][$key]['credit_score'])) }}" style="height: 96px;width: 120px;">
                        @endif
                    </p>
                @endforeach
            @endif
        </div>
        {{-- Financial Suitability --}}

        {{-- Identification --}}
        <div id="identification" class="app_section_content">
            <h5>Identification</h5>
            <p>Picture ID required (Driver's License or Passport)<br>
                @if ($rental_application->picture_id)
                    <img src="data:image/png;base64, {{ base64_encode(file_get_contents($rental_application->picture_id)) }}" style="height: 96px;width: 120px;">
                @endif
            </p>
        </div>
        {{-- Identification --}}

        {{-- Total # of Occupants --}}
        <div id="total_occupants" class="app_section_content">
            <h5>Total # of Occupants (including you)</h5>
            <p><strong>{{ $rental_application->total_occupants }}</strong></p>
            <hr>
            <p>By submitting this application, I am: (1) giving {{ appName() }} Real Estate Management permission to run a background check on me, which may include obtaining my credit report from a consumer reporting agency; and (2) agreeing to the <a href="{{ route('frontend.privacy') }}" target="_blank">Privacy Policy</a> and <a href="{{ route('frontend.terms') }}" target="_blank">Terms of Service</a>.</p>
        </div>
        {{-- Total # of Occupants --}}

    </div>
</div>
