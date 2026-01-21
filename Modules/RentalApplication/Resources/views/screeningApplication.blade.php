@extends('frontend.layouts.app')

@section('title', __('Screening Question For Rental Application'))

@push('after-styles')
<style>
    .reference-detail {
        list-style: none;
        padding: 15px;
        background: #fee;
        border-radius: 7px;
        border: 1px solid #eececf;
    }
    .noprint {
        float: right;
    }
    .card {
        border: 0 transparent;
        padding-top: 10px;
        border-radius: 0px;
    }
    .card-footer {
        background-color: transparent;
        border-top: 0 solid transparent;
    }
</style>
@endpush

@section('content')

<section class="py-2" style="background-color: #f7f9fa;">
    <div class="container">
        <div class="row site-chrome__content">
            <div class="col-lg-12 col-md-12 card pt-3">
                <form id="review_rental_application" method="POST" action="{{ route('rental_application.screeningRentalApplication', [$type, encrypt($rental_application->id)]) }}" enctype="multipart/form-data">
                    @csrf
                    <h2>{{ $type == 'landlord' ? 'Rental' : 'Employment' }} Reference</h2>
                    <p><strong>{{ $rental_application->first_name }} {{ $rental_application->last_name }}</strong> has asked you to provide a {{ $type == 'landlord' ? 'rental' : 'employment' }} reference regarding their recent/current {{ $type == 'landlord' ? 'tenancy' : 'employment' }}.</p>
                    <h4>Reference detail:</h4>
                    @php $rental_history = json_decode($rental_application->rental_history); @endphp
                    @foreach ($rental_history as $rental)
                    <ul class="reference-detail">
                        <li><i class="fas fa-user"></i> {{ $rental_application->first_name }} {{ $rental_application->last_name }}</li>
                        <li><i class="fas fa-home"></i> {{ $rental->street_address }}, {{ $rental->city }}, {{ $rental->zip_code }}, {{ $rental->state }} - {{ $rental->country }}</li>
                        <li><i class="fas fa-calendar"></i> Tenancy from {{ $rental->rental_start_date }} to {{ $rental->rental_end_date }}</li>
                    </ul>
                    @endforeach
                    <hr>
                    @foreach ($questions as $key => $question)
                        <h5 class="mb-0">{{ $key + 1 }}. {{ $question->question }}</h5>
                        <div class="form-group mb-4">
                            @if ($question->field_type == 'radio')
                                @foreach(['Yes', 'No'] as $value)
                                    <div class="form-check form-check-inline form-check-border">
                                        <input class="form-check-input" type="{{ $question->field_type }}" name="screening_questions[{{ $question->id }}][answer]" id="screening_question_{{ $question->id }}_{{ strtolower($value) }}" value="{{ $value }}" {{ $question->answer_guest === $value ? 'checked' : '' }}>
                                        <label class="form-check-label" for="screening_question_{{ $question->id }}_{{ strtolower($value) }}">{{ $value }}</label>
                                    </div>
                                @endforeach
                            @else
                                <input type="text" class="form-control" name="screening_questions[{{ $question->id }}][answer]" id="screening_question_{{ $question->id }}" value="{{ $question->answer_guest }}">
                            @endif
                        </div>
                    @endforeach

                    <hr>
                    <p>By submitting the above information you confirm that you believe the above facts to be true and that you are either the {{ $type == 'landlord' ? 'landlord' : 'employer' }} or their authorised  representative.</p>
                    <p>Please note that if you provide incorrect or false information, this may affect the tenant's ability to secure their desired property.</p>
                    <div class="card-footer text-right noprint" >
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('after-scripts')
<script></script>
@endpush
