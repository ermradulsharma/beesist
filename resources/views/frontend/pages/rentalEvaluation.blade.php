@if (isset($subdomain))
    @php $layout = 'frontend.layouts.manager'; @endphp
@else
    @php $layout = 'frontend.layouts.app'; @endphp
@endif
@extends($layout)
@section('title', __('Rental Evaluation'))
@push('after-styles')
    <style>
        .graphic-image__figure {
            padding: 5rem 2rem;
            box-shadow: 3px 8px 12px 0px rgba(0, 0, 0, 0.14);
            border-top-left-radius: 0px;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 150px;
        }

        .graphic-image__figure img {
            max-width: 100%
        }

        .rental-evaluation .card {
            box-shadow: 0px 4px 12px 0px #0000002b;
            border-color: transparent;
            padding: 1rem;
        }

        #map {
            height: 580px;
            width: 100%;
        }
    </style>
@endpush

@section('content')
    <section class="py-2">
        <div class="container">

            @if (isset(request()->address, request()->address) && !empty(request()->address))
                <div class="card my-5">
                    <div class="card-body">
                        <div class="row g-0 align-items-center rental-evaluation">
                            <div class="col-md-7">
                                <div id="map"></div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="search_form1 search_form2 we-do" method="post" action="{{ route('dynamic.rentalEvaluation', ['subdomain' => $subdomain]) }}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address" name="address" value="{{ old('address', request()->get('address')) }}" placeholder="Enter your property address" onkeyup="initAutocomplete(this.id)">
                                                <label for="address">Enter your property address</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control {{ $errors->has('unit_no') ? 'is-invalid' : '' }}" id="unit_no" value="{{ old('unit_no', request()->get('unit_no')) }}" name="unit_no" placeholder="Unit #">
                                                        <label for="unit_no">Unit #</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control {{ $errors->has('bedrooms') ? 'is-invalid' : '' }}" id="bedrooms" value="{{ old('bedrooms') }}" name="bedrooms" placeholder="# Bedrooms">
                                                        <label for="bedrooms"># Bedrooms</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}" id="bathrooms" value="{{ old('bathrooms') }}" name="bathrooms" placeholder="# Bathrooms">
                                                        <label for="bathrooms"># Bathrooms</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control {{ $errors->has('square_footage') ? 'is-invalid' : '' }}" id="square_footage" value="{{ old('square_footage') }}" name="square_footage" placeholder="Square Footage">
                                                        <label for="square_footage">Square Footage</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name" value="{{ old('first_name') }}" name="first_name" placeholder="First Name">
                                                        <label for="first_name">First Name</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name" value="{{ old('last_name') }}" name="last_name" placeholder="Last Name">
                                                        <label for="last_name">Last Name</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" value="{{ old('email') }}" name="email" placeholder="Email">
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="phone" value="{{ old('phone') }}" name="phone" placeholder="Phone">
                                                        <label for="phone">Phone</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="what_are_you_looking" name="what_are_you_looking" aria-label="Please choose one">
                                                            <option selected>Open this select menu</option>
                                                            <option value="Just curious">Just curious</option>
                                                            <option value="Ready to rent in 1-3 months" {{ old('what_are_you_looking') == 'Ready to rent in 1-3 months' ? 'selected' : '' }}>Ready to rent in 1-3 months</option>
                                                            <option value="Ready to rent in 3-6 months" {{ old('what_are_you_looking') == 'Ready to rent in 3-6 months' ? 'selected' : '' }}>Ready to rent in 3-6 months</option>
                                                            <option value="Ready to rent in 6-12 months" {{ old('what_are_you_looking') == 'Ready to rent in 6-12 months' ? 'selected' : '' }}>Ready to rent in 6-12 months</option>
                                                            <option value="Interested in buying this property" {{ old('what_are_you_looking') == 'Interested in buying this property' ? 'selected' : '' }}>Interested in buying this property</option>
                                                            <option value="Interested in selling this property" {{ old('what_are_you_looking') == 'Interested in selling this property' ? 'selected' : '' }}>Interested in selling this property</option>
                                                        </select>
                                                        <label for="what_are_you_looking">Please choose one</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="btn btn-dark px-4 py-3 border-0 text-uppercase w-100" type="submit">Get it Now!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="py-5 row g-0 align-items-center rental-evaluation">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <p><img alt="{{ appName() }}" src="{{ asset('images/Beesist-Logo.png') }}" style="width: auto; max-height: 60px;" /></p>
                                <h2>FREE RENTAL INCOME ESTIMATE</h2>

                                @if (session()->get('flash_success'))
                                    <div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading">Thank you!</h4>
                                        <p>Your request for rental evaluation has been submitted. You can expect to receive the report shortly.</p>
                                    </div>
                                @else
                                    <p>Find out how much can your home rent for. Just enter your home’s address and we will send you your estimate within 24 hours.</p>
                                    <form class="search_form1 search_form2 we-do" method="get">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your property address" onkeyup="initAutocomplete(this.id)">
                                            <label for="address">Enter your property address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="unit_no" name="unit_no" placeholder="Unit #">
                                            <label for="unit_no">Unit #</label>
                                        </div>
                                        <button class="btn btn-dark px-4 py-3 border-0 text-uppercase w-100" type="submit">Get it Now!</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <figure class="graphic-image__figure">
                            <img src="https://bolldpm.com/wp-content/uploads/2023/03/FREE-RENTAL-INCOME-ESTIMATE.png" alt="FREE-RENTAL-INCOME-ESTIMATE" title="FREE-RENTAL-INCOME-ESTIMATE">
                        </figure>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('after-scripts')
    <script>
        function initAutocomplete(id) {
            var input = document.getElementById(id);
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
        @if (isset(request()->address, request()->address) && !empty(request()->address))
            $(document).ready(function() {
                initMap()
            });

            function initMap() {
                var address = "{{ old('address', request()->get('address')) ?? 'Vancouver, BC, Canada' }}";
                var geocoder = new google.maps.Geocoder();
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 18
                });
                geocoder.geocode({
                    address: address
                }, function(results, status) {
                    if (status === 'OK') {
                        var location = results[0].geometry.location;
                        map.setCenter(location);
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map,
                            title: address
                        });
                        var circle = new google.maps.Circle({
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#FF0000',
                            fillOpacity: 0.35,
                            map: map,
                            center: location,
                            radius: 100 // Radius in meters
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        @endif
    </script>
@endpush
