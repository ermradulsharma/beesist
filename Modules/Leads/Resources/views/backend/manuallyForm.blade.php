@extends('backend.layouts.app')
@section('title', __('Add PMA Form Manually'))
@push('after-styles')
<style>
    .max_400 {max-width: 400px}
    .max_200 {max-width:200px}
</style>
@endpush
@section('content')
<x-backend.card>
    <x-slot name="header">
        <h4>@lang('PMA Details')</h4>
    </x-slot>
    <x-slot name="body">
        <form class="form-signin" method="POST" action="{{ route(rolebased().'.pma.addFormManually') }}" enctype="multipart/form-data">
           @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="owner_count">Number of Owners</label>
                            <select name="owner_count" id="owner_count" class="form-control max_400">
                                <option value="1">1 Owner</option>
                                <option value="2">2 Owner</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6>Owner Details</h6>
                        <hr class="mt-0">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" name="first_name" id="first_name" placeholder="Owner First Name" value="{{ old('fName_1', $pma->fName_1 ?? '') }}" type="text" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" name="last_name" id="last_name" placeholder="Owner Last Name" value="{{ old('lName_2', $pma->lName_2 ?? '') }}" type="text" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" name="email" id="email" placeholder="Owner Email" value="{{ old('email_5', $pma->email_5 ?? '') }}" type="text" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" name="phone" id="phone" placeholder="Owner Phone" value="{{ old('phone_4', $pma->phone_4 ?? '') }}" type="text" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row" id="second_owner_details" style="display:none">
                    <div class="col-md-12">
                        <h6>Second Owner Details</h6>
                        <hr class="mt-0">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="first_name_2">First Name</label>
                            <input class="form-control" name="first_name_2" id="first_name_2" placeholder="Second Owner First Name" value="{{ old('first_name_2', $pma->fName_1_2 ?? '') }}" type="text" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="last_name_2">Last Name</label>
                            <input class="form-control" name="last_name_2" id="last_name_2" placeholder="Second Owner Last Name" value="{{ old('last_name_2', $pma->lName_2_2 ?? '') }}" type="text" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email_2">Email</label>
                            <input class="form-control" name="email_2" id="email_2" placeholder="Second Owner Email" value="{{ old('email_2', $pma->email_o2_5 ?? '') }}" type="text" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="phone_2">Phone</label>
                            <input class="form-control" name="phone_2" id="phone_2" placeholder="Second Owner Phone" value="{{ old('phone_2', $pma->phone_o2_4 ?? '') }}" type="text" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row" id="property_details">
                    <div class="col-md-12">
                        <h6>Property Details</h6>
                        <hr class="mt-0">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prop_type">Property Type</label>
                            <select name="prop_type" id="prop_type" class="form-control">
                                <option value="Strata unit/property">Strata unit/property</option>
                                <option value="Single family/privately owned non strata property">Single family/privately owned non strata property</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prop_address">Property Address</label>
                            <input class="form-control" onkeyup="initAutocomplete('prop_address')" name="prop_address" id="prop_address" placeholder="Property Address" value="{{ old('prop_address', $pma->address_10 ?? '') }}" type="text" autocomplete="off">
                            <input type="hidden" name="country" id="country">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pma_pdf">Upload PMA PDF</label>
                    <input class="" name="pma_pdf" id="pma_pdf" value="{{ old('pma_pdf') }}" type="file">
                </div>
            </div>
            <div class="box-footer">
                @if(!empty($id))
                  <input type="hidden" name="action" value="update">
                  <input type="hidden" name="pma_id" value="{{ $id }}">
                @else
                  <input type="hidden" name="action" value="add">
                @endif
                  <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-slot>
</x-backend.card>
@endsection
@push('after-scripts')
<script>
    $(function(){
      if ($('#owner_count').val() == 2) {
          $('#second_owner_details').show();
      }else{
          $('#second_owner_details').hide();
      }
      $('#owner_count').on('change', function () {
          var owner_count = $(this).val();
          if (owner_count == 2) {
              $('#second_owner_details').show();
          }else{
              $('#second_owner_details').hide();
          }
      });
    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&callback=initAutocomplete"></script>
<script>
    var placeSearch, autocomplete;
    function initAutocomplete(id) {
        var autocomplete = new google.maps.places.Autocomplete(
            document.getElementById(id), {
                types: ['geocode']
            });
        autocomplete.setComponentRestrictions({
            'country': ['ca', 'us', 'in']
        });
        autocomplete.addListener('place_changed', function () {
            fillInAddress(autocomplete, id);
        });
    }
    function fillInAddress(autocomplete, id) {
        var place = autocomplete.getPlace();
        console.log('Place', place);
        document.getElementById(id).value = place.formatted_address;
        place.address_components.forEach(function(element2) {
            element2.types.forEach(function(element3) {
                switch (element3) {
                    case 'postal_code':
                        postal_code = element2.short_name;
                        break;
                    case 'administrative_area_level_1':
                        state = element2.long_name;
                        break;
                    case 'locality':
                        city = element2.long_name;
                        break;
                    case 'country':
                        country = element2.long_name;
                        country_short_name = element2.short_name
                        break;
                    case 'neighborhood':
                        neighborhood = element2.long_name;
                        break;
                    case 'route':
                        st_address = element2.long_name;
                        break;
                    case 'street_number':
                        street_number = element2.long_name;
                        break;
                }
            })
        });
        document.getElementById("country").value = country;
    }
</script>
@endpush

