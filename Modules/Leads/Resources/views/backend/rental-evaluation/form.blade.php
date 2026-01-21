@extends('backend.layouts.app')
@section('title', __('Rental Evalution'))
@push('after-styles')
<style>
    .max_400 {
      max-width: 400px;
    }

    .max_200 {
      max-width: 200px;
    }

</style>
<x-head.tinymce-config />
@endpush
@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Rental Evalution')
    </x-slot>
    <x-slot name="body">
        @php
            $method = $action == 'show' ? 'GET' : 'POST';
        @endphp
        <form class="form-signin" method="{{ $method }}" action="{{ route(rolebased().'.rental_evaluation.evaluationForm') }}" enctype="multipart/form-data">
            @if($method == 'POST')
                @csrf
            @endif
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Email Name</label>
                    <input class="form-control max_400" name="title" id="title" placeholder="Enter Email Title" value="{{ old('title', @$data['title']) }}" type="text">
                </div>
                @if($action == 'show')
                    <div class="form-group">
                        <label for="listing_number">Apartment Number</label>
                        <input class="form-control max_400" name="listing_number" id="listing_number" value="{{ old('listing_number', $listing_number) }}" placeholder="ex: R2348219" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control max_400" onclick="initAutocomplete(this.id)" name="address" id="address" value="{{ old('address', $address) }}" placeholder="ex: 2304 - 888 HAMILTON STREET" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="area">{{ __('Size/sq ft')}}</label>
                        <input class="form-control max_400" name="area" id="area" value="{{ old('area', $area) }}" placeholder="ex: 1031" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="beds">Number of Bedrooms</label>
                        <input class="form-control max_400" name="beds" id="beds" value="{{ old('beds', $beds) }}" placeholder="ex: 2" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="baths">{{ __('Number of Bathrooms')}}</label>
                        <input class="form-control max_400" name="baths" id="baths" value="{{ old('baths',  $baths) }}" placeholder="ex: 2" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="rate">{{ __('Expected Rental Rate') }}</label>
                        <input class="form-control max_400" name="rate" id="rate" value="{{ old('rate', $rate) }}" placeholder="ex: $2,900 - $3,100" type="text" required>
                    </div>

                    <input name="name" value="{{ old('name', $name) }}" type="hidden">
                    <input name="email" value="{{ old('email', $email) }}" type="hidden">
                    <input name="id" value="{{ old('id', $req_id) }}" type="hidden">
                    <input name="phone" value="{{ old('phone', $phone) }}" type="hidden">
                @else
                    <div class="form-group">
                        <textarea class="textarea" id="myeditorinstance" name="content" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {!! @$content != "" ? $content : old('content') !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="subject">Email Subject</label>
                        <input class="form-control max_400" name="subject" id="subject" value="{{ old('subject', @$subject) }}" placeholder="Enter Email Subject" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Recipient Name</label>
                        <input class="form-control max_400" name="name" id="name" value="{{ old('name', @$name) }}" placeholder="Enter Recipient Name" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient">Recipient Email</label>
                        <input class="form-control max_400" name="recipient" id="recipient" value="{{ old('recipient', @$email) }}" placeholder="Enter Recipient Email" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Recipient Phone</label>
                        <input class="form-control max_400" name="phone" id="phone" value="{{ old('phone', @$phone) }}" placeholder="Enter Recipient Phone" type="text" required>
                    </div>

                    <input name="listing_number" value="{{ old('listing_number', @$listing_number) }}" type="hidden">
                    <input name="address" value="{{ old('address', @$address) }}" type="hidden">
                    <input name="area" value="{{ old('area', @$area) }}" type="hidden">
                    <input name="beds" value="{{ old('beds', @$beds) }}" type="hidden">
                    <input name="baths" value="{{ old('baths', @$baths) }}" type="hidden">
                    <input name="rate" value="{{ old('rate', @$rate) }}" type="hidden">
                    <input name="id" value="{{ old('id', @$req_id) }}" type="hidden">
                @endif
            </div>
            <div class="box-footer">
                @if($action == 'show')
                    <button type="submit" class="btn btn-primary">Next</button>
                @else
                    <button type="submit" class="btn btn-primary">Send</button>
                @endif
            </div>
        </form>
    </x-slot>
</x-backend.card>
@endsection
@push('after-scripts')
<script>
    function initAutocomplete(id) {
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById(id));
        autocomplete.setComponentRestrictions({
            'country': ['ca', 'us']
        });
    }
</script>
@endpush
