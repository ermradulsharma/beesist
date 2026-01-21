@extends('backend.layouts.app')
@php
    $title = $property->id ? 'Edit' : 'Add';
@endphp
@section('title', __(':title Property', ['title' => $title]))
@push('after-styles')
<style>
    .card-header *,
    .form-group label {
        font-weight: 600
    }

    .files_inner ul {
        padding: 0;
    }

    .full_address {
        font-size: 9px;
        color: red;
    }
</style>
<x-head.tinymce-config />
@endpush
@section('content')

@php
    $strata_property_details = $property ? json_decode($property->strata_property_details) : null;
    $occupancy_tenant_info = $property ? json_decode($property->occupancy_tenant_info, true) : [];
    $utilities = $property ? json_decode($property->utilities, true) : [];
    $prop_agents = $property ? (isset($property->prop_agents) ? json_decode($property->prop_agents) : []) : [];
    if ($property && isset($property['address'])) {
        $geo = get_lat_long($property['address']);
        $lat = $geo['lat'] ?? 49.282730;
        $lng = $geo['long'] ?? -123.120735;
        $zoom = isset($geo['lat'], $geo['long']) ? 15 : 12;
    } else {
        $lat = 49.282730;
        $lng = -123.120735;
        $zoom = 12;
    }
    $lat_long = $lat . ', ' . $lng;
@endphp
<form method="post" action="{{ optional($property)->id ? route(rolebased() .'.properties.update', $property) : route(rolebased() .'.properties.store') }}" id="submit_property_form" enctype="multipart/form-data">
    @if (optional($property)->id)
        <input type="hidden" name="_method" value="patch">
        <p><em>Last updated by: {{ $property->last_edited ? getUserById($property->last_edited)->name : '' }}</em></p>
        <input type="hidden" name="prop_id" value="{{ Crypt::encryptString($property->id) }}">
        <input type="hidden" name="old_agents" value="{{ $property->prop_agents }}">
        <input type="hidden" name="form_id" value="{{ $property->form_id ? Crypt::encryptString($property->form_id) : '' }}">
    @endif
    @csrf
    <input type="hidden" name="last_edited" value="{{ auth()->user()->id }}">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-9">
            <div class="card box-primary">
                <div class="card-body">
                    <div class="card box-info mt-4">
                        <div class="card-header">
                            <h5>Property Basic Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="location">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Property Title</label>
                                            <input class="form-control" name="title" id="title" placeholder="Enter Property Title" value="{{ old('title', @$property->title) }}" type="text">
                                        </div>
                                        @if ($property->id)
                                        <div class="form-group">
                                            <label for="slug">Property Slug</label>
                                            <input class="form-control" name="slug" placeholder="Property Slug" id="slug" value="{{ old('slug', @$property->slug) }}" type="text">
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="content">Property Description</label>
                                            <textarea id="myeditorinstance" name="content" placeholder="Property Description">{!! old('content', @$property->content) !!}</textarea>
                                        </div>
                                        <div class="form-group d-flex">
                                            <div class="col-md-6">
                                                <label for="prop_type">Property Type</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="prop_type" id="prop_type" class="form-control">
                                                    <option value="Strata unit/property" {{ old('prop_type', @$property->prop_type) == 'Strata unit/property' ? 'selected' : '' }}>Strata Unit/Property</option>
                                                    <option value="Single family/privately owned non strata property" {{ old('prop_type', @$property->prop_type) == 'Single family/privately owned non strata property' ? 'selected' : '' }}>Single Family/Privately Owned Non Strata Property</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <div class="col-md-6">
                                                <label for="strata_fees_paying">How much do you currently pay for your strata fees per month?</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" name="strata_fees_paying" id="strata_fees_paying" placeholder="Current Strata Fees Paying" type="text" value="{{ old('strata_fees_paying', @$property->strata_fees_paying)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card box-info" id="StrataProperty">
                        <div class="card-header">
                            <h5>Strata Unit/Property Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.suite') ? 'has-error' : '' }}">
                                        <label for="spd_suite">Suite#</label>
                                        <input id="spd_suite.suite" name="strata_property_details[suite]" value="{{ old('strata_property_details.suite', @$strata_property_details->suite) }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.address') ? 'has-error' : '' }}">
                                        <label for="spd_address">Address</label>
                                        <input id="spd_address" onkeyup="initAutocomplete(this.id)" name="strata_property_details[address]" value="{{ old('strata_property_details.address', @$strata_property_details->address) }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.city') ? 'has-error' : '' }}">
                                        <label for="spd_city">City</label>
                                        <input id="spd_city" name="strata_property_details[city]" value="{{ old('strata_property_details.city', @$strata_property_details->city) }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.state') ? 'has-error' : '' }}">
                                        <label for="spd_state">{{ __('State / Province / Region') }}</label>
                                        <input id="spd_state" name="strata_property_details[state]" value="{{ old('strata_property_details.state', @$strata_property_details->state) }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.zip') ? 'has-error' : '' }}">
                                        <label for="spd_zip">{{ __('Postal Code') }}</label>
                                        <input id="spd_zip" name="strata_property_details[zip]" value="{{ old('strata_property_details.zip', @$strata_property_details->zip) }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-control-wrap {{ $errors->has('strata_property_details.country') ? 'has-error' : '' }}">
                                        <label for="spd_country">Country</label>
                                        <select id="spd_country" class="form-control" name="strata_property_details[country]">
                                            <option value="">Select Country*</option>
                                            @php
                                                $sel_country = @old('strata_property_details.country', $strata_property_details->country ?? 'CA');
                                            @endphp
                                            @foreach (Countries() as $country)
                                                <option value="{{ $country->iso }}" {{ $sel_country == $country->iso ? 'selected' : '' }}>{{ $country->nicename }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.strata_management_company') ? 'has-error' : '' }}">
                                        <label for="spd_strata_management_company">Strata Management Company</label>
                                        <input id="spd_strata_management_company" name="strata_property_details[strata_management_company]" value="{{ @old('strata_property_details.strata_management_company', $strata_property_details->strata_management_company) ?? '' }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group {{ $errors->has('strata_property_details.strata_manager_name') ? 'has-error' : '' }}">
                                        <label for="spd_strata_manager_name">Strata Manager's Name</label>
                                        <input id="spd_strata_manager_name" name="strata_property_details[strata_manager_name]" value="{{ @old('strata_property_details.strata_manager_name', $strata_property_details->strata_manager_name) ?? '' }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.strata_manager_phone_number') ? 'has-error' : '' }}">
                                        <label for="spd_strata_manager_phone_number">Strata Manager's Phone No.</label>
                                        <input id="spd_strata_manager_phone_number" name="strata_property_details[strata_manager_phone_number]" value="{{ @old('strata_property_details.strata_manager_phone_number', $strata_property_details->strata_manager_phone_number) ?? '' }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.plan_num') ? 'has-error' : '' }}">
                                        <label for="spd_plan_num">Strata Plan No</label>
                                        <input id="spd_plan_num" name="strata_property_details[plan_num]" value="{{ @old('strata_property_details.plan_num', $strata_property_details->plan_num) ?? '' }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.lot_num') ? 'has-error' : '' }}">
                                        <label for="spd_lot_num">Strata Lot Number</label>
                                        <input id="spd_lot_num" name="strata_property_details[lot_num]" value="{{ @old('strata_property_details.lot_num', $strata_property_details->lot_num) ?? '' }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.civic') ? 'has-error' : '' }}">
                                        <label for="spd_civic">Civic Address of the Property</label>
                                        <input id="spd_civic" name="strata_property_details[civic]" value="{{ @old('strata_property_details.civic', $strata_property_details->civic) ?? '' }}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('strata_property_details.building_manager_name') ? 'has-error' : '' }}">
                                        <label for="spd_building_manager_name">Building Manager's Name</label>
                                        <input id="spd_building_manager_name"
                                            name="strata_property_details[building_manager_name]"
                                            value="{{ @old('strata_property_details.building_manager_name', $strata_property_details->building_manager_name) ?? '' }}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group {{ $errors->has('strata_property_details.bm_phone_number') ? 'has-error' : '' }}">
                                        <label for="spd_bm_phone_number">Building Manager's Phone No.</label>
                                        <input id="spd_bm_phone_number" name="strata_property_details[bm_phone_number]"
                                            value="{{ @old('strata_property_details.bm_phone_number', $strata_property_details->bm_phone_number) ?? '' }}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group {{ $errors->has('strata_property_details.concierge_phone') ? 'has-error' : '' }}">
                                        <label for="spd_concierge_phone">Concierge's Phone Number</label>
                                        <input id="spd_concierge_phone" name="strata_property_details[concierge_phone]"
                                            value="{{ @old('strata_property_details.concierge_phone', $strata_property_details->concierge_phone) ?? '' }}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group {{ $errors->has('strata_property_details.parking') ? 'has-error' : '' }}">
                                        <label for="spd_parking">Parking Stall Number(s)</label>
                                        <input id="spd_parking" name="strata_property_details[parking]"
                                            value="{{ @old('strata_property_details.parking', $strata_property_details->parking) ?? '' }}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group {{ $errors->has('strata_property_details.location_parking') ? 'has-error' : '' }}">
                                        <label for="spd_location_parking">Location Of Parking</label>
                                        <input id="spd_location_parking"
                                            name="strata_property_details[location_parking]"
                                            value="{{ @old('strata_property_details.location_parking', $strata_property_details->location_parking) ?? '' }}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group {{ $errors->has('strata_property_details.storage_locker') ? 'has-error' : '' }}">
                                        <label for="spd_storage_locker">Storage Locker Number(s)</label>
                                        <input id="spd_storage_locker" name="strata_property_details[storage_locker]"
                                            value="{{ @old('strata_property_details.storage_locker', $strata_property_details->storage_locker) ?? '' }}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group {{ $errors->has('strata_property_details.location_storage') ? 'has-error' : '' }}">
                                        <label for="spd_location_storage">Location Of The Storage</label>
                                        <input id="spd_location_storage"
                                            name="strata_property_details[location_storage]"
                                            value="{{ @old('strata_property_details.location_storage', $strata_property_details->location_storage) ?? '' }}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group {{ $errors->has('strata_property_details.amenities') ? 'has-error' : '' }}">
                                        <label for="spd_amenities">Location Of The Amenities</label>
                                        <input id="spd_amenities" name="strata_property_details[amenities]"
                                            value="{{ @old('strata_property_details.amenities', $strata_property_details->amenities) ?? '' }}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card box-info">
                        <div class="card-header">
                            <h5>Other Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="location">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="form-group {{ $errors->has('insurance') ? 'has-error' : '' }} d-flex">
                                            <div class="col-md-4">
                                                <label for="insurance">Recital(s):</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select id="insurance" class="form-control" name="insurance">
                                                    <option value="">Have you purchased your rental property insurance?</option>
                                                    <option value="Yes" @if (@old('insurance', $property->insurance) == 'Yes') selected="selected" @endif>Yes</option>
                                                    <option value="No" @if (@old('insurance', $property->insurance) == 'No') selected="selected" @endif>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <div class="col-md-4">
                                                <label for="virtual_tour">Virtual Tour</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="virtual_tour" id="virtual_tour" rows="4">{{ old('virtual_tour', @$property->virtual_tour) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <div class="col-md-4">
                                                <label for="disclaimer">Disclaimer</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="disclaimer" id="disclaimer" rows="4">{{ old('disclaimer', @$property->disclaimer) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card box-info">
                        <div class="card-header">
                            <h5>Location</h5>
                        </div>
                        <div class="card-body">
                            <div class="location">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Full Property Address</label>
                                            <input id="autocomplete" onkeyup="initAutocomplete(this.id)" name="address" class="form-control" placeholder="Enter your address"  onFocus="geolocate()" type="text" autocomplete="off" value="{{ old('address', $property->address ?? @$geo['formatted_address']) }}" />
                                        </div>
                                        <div id="map_canvas" style="width: 100%; height: 400px;margin-bottom:20px"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="st_address" class="text-capitalize">Street Address</label>
                                            <input class="form-control" name="st_address" id="st_address" value="{{ old('st_address', $property['st_address'] ?? @$geo['st_address']) }}" type="text">
                                            <span class="full_address text-capitalize">Excluding city, province, and postal code</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input class="form-control" name="country" id="country"
                                                value="{{ old('country', @$property->country ?? @$geo['country']) }}"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">{{ __('State / Province / Region') }}</label>
                                            <input class="form-control" name="state" id="state"  value="{{ old('state', @$property->state ?? @$geo['state']) }}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input class="form-control" name="city" id="city" value="{{ old('city', @$property->city ?? @$geo['city']) }}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="neighborhood">Neighborhood</label>
                                            <input class="form-control" name="neighborhood" id="neighborhood"
                                                value="{{ old('neighborhood', $property->neighborhood ?? @$geo['neighborhood']) }}"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zip">{{ __('Postal Code') }}</label>
                                            <input class="form-control" name="zip" id="zip" value="{{ old('zip', @$property->zip ?? @$geo['postal_code']) }}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="seo_title">Latitude</label>
                                            <input class="form-control" name="lat" id="lat" placeholder="Enter Property Latitude" value="{{ old('lat', $property->lat ?? @$geo['lat']) }}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="long">Longitude</label>
                                            <input class="form-control" name="lng" id="long" placeholder="Enter Property Longitude" value="{{ old('lng', $property->lng ?? @$geo['lng']) }}" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card box-info">
                        <div class="card-header">
                            <h5 class="text-capitalize">Strata bylaws/property related documents</h5>
                        </div>
                        <div class="card-body">
                            <div class="file-drop-area-wrap my-3">
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Choose Files</span>
                                    <span class="file-message">or drag and drop files here to upload the current bylaws. (pdf, jpg, png, gif)</span>
                                    <input type="file" class="file-input" name="strata_documents[]" accept=".jpg,.jpeg,.png,.gif,.pdf" multiple>
                                </div>
                                <div class="divImageMediaPreview">
                                    @if (isset($property) && $property->strataDocs != '')
                                        @foreach (@$property->strataDocs as $strata_document)
                                            <span class="pip">
                                                <a href="{{ url('uploads/properties/' . $property->id . '/strata_documents/' . $strata_document->url) }}" data-lity data-lity-desc="{{ $strata_document->url }}">
                                                    @if (pathinfo($strata_document->url, PATHINFO_EXTENSION) == 'pdf')
                                                        <img class="imageThumb" src="{{ asset('img/pdf-icon.png') }}">
                                                    @else
                                                        <img class="imageThumb" src="{{ url('uploads/properties/' . $property->id . '/strata_documents/thumbs/' . $strata_document->url) }}">
                                                    @endif
                                                </a>
                                                <span class="selFileLive" data-id="{{ $strata_document->id }}" title="Click to remove"><i class="fa fa-trash"></i></span>
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card box-info">
                        <div class="card-header">
                            <h5 class="text-capitalize">Property photos</h5>
                        </div>
                        <div class="card-body">
                            <div class="file-drop-area-wrap my-3">
                                <div class="file-drop-area">
                                    <span class="choose-file-button">Choose Files</span>
                                    <span class="file-message">or drag and drop files here to upload any property photos
                                        you have available. We do take our own photos, but having photos sooner allows
                                        us to expedite the rental process. (jpg, png, gif)</span>
                                    <input type="file" class="file-input" name="property_photos[]"
                                        accept=".jpg,.jpeg,.png,.gif" multiple>
                                </div>
                                <div class="divImageMediaPreview">
                                    @if (isset($property) && $property->propertyImages != '')
                                        @foreach (@$property->propertyImages as $property_photo)
                                            <span class="pip">
                                                <a href="{{ url('uploads/properties/' . $property->id . '/property_photos/thumbs/' . $property_photo->url) }}" data-lity data-lity-desc="{{ $property_photo->url }}">
                                                    <img class="imageThumb" src="{{ url('uploads/properties/' . $property->id . '/property_photos/thumbs/' . $property_photo->url) }}">
                                                </a>
                                                <span class="selFileLive" data-id="{{ $property_photo->id }}" title="Click to remove"><i class="fa fa-trash"></i></span>
                                                @php
                                                    $isFeatured = ($property_photo->featured == '1');
                                                @endphp
                                                <span class="make_featured" data-id="{{ $property_photo->id }}" data-prop_id="{{ $property->id }}" data-user_id="{{ $property->user_id }}" title="{{ $isFeatured ? 'Featured Image' : 'Make Featured Image' }}">
                                                    <i class="{{ $isFeatured ? 'fas' : 'far' }} fa-heart"></i>
                                                </span>
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card box-info">
                        <div class="card-header">
                            <h5>SEO Data</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="meta_title">SEO Title</label>
                                <input class="form-control" name="meta_title" id="meta_title"
                                    placeholder="Enter SEO Property Title"
                                    value="{{ old('meta_title', @$property->meta_title) }}" type="text">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">SEO Description</label>
                                <textarea class="form-control" id="meta_description" rows="4" name="meta_description"
                                    placeholder="SEO Description">{{ old('meta_description', @$property->meta_description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">SEO Keywords</label>
                                <input class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter SEO Keywords" value="{{ old('meta_keywords', @$property->meta_keywords) }}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="card box-info">
                        <div class="card-header">
                            <h5>Custom Tags</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="custom_head_script">Custom Head Tag Code</label>
                                <textarea class="form-control" name="custom_head_script" id="custom_head_script" placeholder="Custom Head Tag Code">{{ old('custom_head_script', @$property->custom_head_script) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="custom_footer_script">Custom Footer Tag Code</label>
                                <textarea class="form-control" name="custom_footer_script" id="custom_footer_script" placeholder="Enter SEO Keywords">{{ old('custom_footer_script', @$property->custom_footer_script) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 col-md-3">
            <div class="card box-primary">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-check  md-form-inline-check">
                            <input class="form-check-input filled-in" name="featured" value="1" id="featured"
                                type="checkbox" {{ $property->featured == '1' ? 'checked' : ''}}>
                            <label class="form-check-label" for="featured"> Make Featured Property </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="building_id">Building</label>
                        <select class="form-control select2 select_status" name="building_id" id="building_id">
                            <option value=""> {{ __('Select') }} </option>
                            @foreach ($buildings as $building)
                                <option value="{{ $building->id }}" {{ isset($property) && $property->building_id == $building->id ? 'selected' : '' }}>{{ $building->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Property Status</label>
                        <select class="form-control select2 select_status" name="prop_status[]" multiple="multiple">
                            @php
                                $statusOptions = ['For Rent', 'For Sale', 'Furnished', 'Luxurious', 'Rented', 'Just Rented', 'Sold', 'Vacation Rental'];
                                $selectedStatus = collect(@old('prop_status', explode(',', $property->prop_status)));
                            @endphp
                            @foreach ($statusOptions as $status)
                                <option value="{{ $status }}" {{ $selectedStatus->contains($status) ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('unit_number') ? 'has-error' : '' }}">
                        <label for="field_id_20">Unit number</label>
                        <input id="field_id_20" name="unit_number"
                            value="{{ old('unit_number', $property->unit_number ?? '') }}" type="text"
                            class="form-control">
                        @if ($errors->has('unit_number'))
                        <span class="help-block">{{ $errors->first('unit_number') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="beds">Bedroom</label>
                        <input class="form-control" name="beds" id="beds" placeholder="Enter Bedroom" value="{{ old('beds', @$property['beds']) }}" step="0.50" type="number">
                    </div>

                    <div class="form-group">
                        <label for="baths">Bathroom</label>
                        <input class="form-control" name="baths" id="baths" placeholder="Enter Bathroom" value="{{ old('baths', @$property['baths']) }}" step="0.50" type="number">
                    </div>

                    <div class="form-group">
                        <label for="sleeps">Sleeps</label>
                        <input class="form-control" name="sleeps" id="sleeps" placeholder="Enter Sleeps" value="{{ old('sleeps', @$property['sleeps']) }}" step="0.50" type="number">
                    </div>

                    <div class="form-group">
                        <label for="area">Square footage</label>
                        <input class="form-control" name="area" id="area" placeholder="Enter Area Eg:1000 sqft" value="{{ old('area', @$property['area']) }}" type="text">
                    </div>

                    <div class="form-group">
                        <label for="rate">Rates</label>
                        <div class="row" style="text-align:left">
                            <div class="col-6 col-sm-6 col-md-6 col-xs-6 pr-0">
                                <input class="form-control max_200" name="rate" id="rate" placeholder="Enter Rates" value="{{ old('rate', @$property['rate']) }}" type="text">
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-xs-6 pl-1">
                                <select class="form-control max_200" name="rateper">
                                    @foreach(['Night', 'Week', 'Month', 'Year'] as $option)
                                    <option value="{{ $option }}" {{ $property->rateper == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="prop_url">Apply Online URL</label>
                        <input class="form-control" name="prop_url" id="prop_url" placeholder="Enter Property URL" value="{{ old('prop_url', @$property['prop_url']) }}" type="text">
                    </div>

                    <div class="form-group required form-control-wrap {{ $errors->has('parking') ? 'has-error' : '' }}">
                        <label for="field_id_24">Parking</label>
                        <select id="field_id_24" class="form-control" name="parking">
                            <option value="" disabled selected>Select Parking</option>
                            <option value="Yes" {{ old('parking', $property->parking) == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ old('parking', $property->parking) == 'No' ? 'selected' : '' }}>No</option>
                            <option value="Plenty of street parking" {{ old('parking', $property->parking) == 'Plenty of street parking' ? 'selected' : '' }}>Plenty of street parking</option>
                        </select>
                        @if ($errors->has('parking'))
                        <span class="text-danger">{{ $errors->first('parking') }}</span>
                        @endif
                    </div>
                    <div class="form-group required form-control-wrap {{ $errors->has('storage') ? 'has-error' : '' }}">
                        <label for="field_id_25">Storage</label>
                        <select id="field_id_25" class="form-control" name="storage">
                            <option value="" disabled selected>Select Storage</option>
                            <option value="Yes, storage locker" {{ old('storage', $property->storage) == 'Yes, storage locker' ? 'selected' : '' }}>Yes, storage locker</option>
                            <option value="No" {{ old('storage', $property->storage) == 'No' ? 'selected' : '' }}>No </option>
                            <option value="In property storage" {{ old('storage', $property->storage) == 'In property storage' ? 'selected' : '' }}>In property storage</option>
                        </select>
                        @if ($errors->has('storage'))
                            <span class="text-danger">{{ $errors->first('storage') }}</span>
                        @endif
                    </div>

                    <h6>Included Utilities</h6>
                    @php
                        $utilityItems = [
                            'parking' => 'Parking',
                            'storage' => 'Storage',
                            'hot_water' => 'Hot Water',
                            'gas' => 'Gas',
                            'cable_tv' => 'Cable TV',
                            'internet' => 'Internet',
                            'electricity' => 'Electricity',
                            'others' => 'Others',
                            'no_utilities_included' => 'No utilities included',
                        ];
                    @endphp

                    @foreach ($utilityItems as $key => $label)
                        <div class="utility_item">
                            <div class="form-check md-form-inline-check">
                                <input class="form-check-input filled-in" name="utilities[{{ $key }}]" value="1" id="utilities_{{ $key }}" type="checkbox" @if (old("utilities.$key", @$utilities[$key])=='1' ) checked @endif>
                                <label class="form-check-label" for="utilities_{{ $key }}">{{ $label }}</label>
                            </div>
                            @if (in_array($key, ['parking', 'storage', 'others']))
                                <div class="md-form md-form-inline" id="{{ $key }}_details_box" style="margin-bottom:10px">
                                    @if ($key == 'parking')
                                        <div class="md-form md-form-inline">
                                            <label for="utilities_{{ $key }}_num">Number of {{ $label }}</label>
                                            <input type="text" id="utilities_{{ $key }}_num" name="utilities[{{ $key }}_num]" value="{{ old(" utilities.{$key}_num", @$utilities["{$key}_num"] ?? '' ) }}" class="form-control" placeholder=''>
                                        </div>
                                        <div class="md-form md-form-inline">
                                            <label for="utilities_{{ $key }}_stall">Stall #</label>
                                            <input type="text" id="utilities_{{ $key }}_stall" name="utilities[{{ $key }}_stall]" value="{{ old(" utilities.{$key}_stall", @$utilities["{$key}_stall"] ?? '' ) }}" class="form-control" placeholder=''>
                                        </div>
                                    @elseif ($key == 'storage')
                                        <div class="md-form md-form-inline">
                                            <label for="utilities_{{ $key }}_desc">{{ $label }} Description</label>
                                            <input type="text" id="utilities_{{ $key }}_desc" name="utilities[{{ $key }}_desc]" value="{{ old(" utilities.{$key}_desc", @$utilities["{$key}_desc"] ?? '' ) }}" class="form-control" placeholder=''>
                                        </div>
                                    @elseif ($key == 'others')
                                        <label for="utilities_{{ $key }}_desc">Other included {{ $label }}</label>
                                        <input type="text" id="utilities_{{ $key }}_desc" name="utilities[{{ $key }}_desc]" value="{{ old(" utilities.{$key}_desc", @$utilities["{$key}_desc"] ?? '' ) }}" class="form-control" placeholder=''>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                    <hr />

                    <div class="form-group required form-control-wrap {{ $errors->has('pet_policy') ? 'has-error' : '' }}">
                        <label for="pet_policy">Pet Policy</label>
                        <select id="pet_policy" class="form-control" name="pet_policy">
                            <option value="" disabled>Select Pet Policy</option>
                            <option value="Cats allowed" @if (old('pet_policy', @$property->pet_policy) == 'Cats allowed') selected @endif>Cats allowed</option>
                            <option value="Dogs allowed" @if (old('pet_policy', @$property->pet_policy) == 'Dogs allowed') selected @endif>Dogs allowed</option>
                            <option value="Cats/dogs allowed" @if (old('pet_policy', @$property->pet_policy) == 'Cats/dogs allowed') selected @endif>Cats/dogs allowed</option>
                            <option value="No pets" @if (old('pet_policy', @$property->pet_policy) == 'No pets') selected @endif>No pets</option>
                        </select>
                        @if ($errors->has('pet_policy'))
                            <span class="text-danger">{{ $errors->first('pet_policy') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="in_suite_laundry">In suite laundry</label>
                        <input class="form-control" name="in_suite_laundry" id="in_suite_laundry" placeholder="In suite laundry" value="{{ old('in_suite_laundry', @$property['in_suite_laundry']) }}" type="text">
                    </div>

                    <div class="form-group">
                        <label for="last_rate_change">Last rate change</label>
                        <input class="form-control datepicker" name="last_rate_change" id="last_rate_change" placeholder="Last rate change" value="{{ old('last_rate_change', @$property['last_rate_change']) }}" type="text">
                    </div>

                    <div class="form-group">
                        <label for="craigslist">Craigslist</label>
                        <input class="form-control" name="craigslist" id="craigslist" placeholder="Craigslist" value="{{ old('craigslist', @$property['craigslist']) }}" type="text">
                    </div>

                    <div class="form-group">
                        <label for="rentboard">Rentboard</label>
                        <input class="form-control" name="rentboard" id="rentboard" placeholder="Rentboard" value="{{ old('rentboard', @$property['rentboard']) }}" type="text">
                    </div>

                    <div class="form-group">
                        <label for="fb">FB</label>
                        <input class="form-control" name="fb" id="fb" placeholder="FB" value="{{ old('fb', @$property['fb']) }}" type="text">
                    </div>

                    @if (Auth::check() && (Auth::user()->hasManagerAccess() || Auth::user()->hasAllAccess()))
                        <div class="form-group">
                            <label for="prop_agents">Assigned Agent/s</label>
                            <select class="form-control select_agents select2" name="prop_agents[]" multiple="multiple">
                                @foreach (getManagerUsersByRole('Agent') as $agent)
                                    <option value="{{ $agent->id }}" {{ in_array($agent->id, old('prop_agents', explode(',', $property->prop_agents))) ? 'selected' : '' }}>{{ $agent->name }} [{{ $agent->email }}]</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif(Auth::check() && Auth::user()->hasRole('Agent'))
                        <input type="hidden" name="prop_agents[]" value="{{ Auth::user()->id }}">
                    @else
                        <div class="form-group">
                            <label>Property Agent</label>
                            <ul style="padding: 0;">
                                @foreach (getPropertyAgentByID(explode(',', $property->prop_agents)) as $agent)
                                    <li class="btn btn-default">{{ $agent->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Auth::check() && (Auth::user()->hasManagerAccess() || Auth::user()->hasAllAccess()))
                        <div class="form-group">
                            <label for="user_id">Property Owner</label>
                            <select id="user_id" class="form-control select_agents select2" name="user_id">
                                @foreach (getManagerUsersByRole('Property Owner') as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $property->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }} [{{ $user->email }}]</option>
                                @endforeach
                            </select>
                            @if ($errors->has('user_id'))
                                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                            @endif
                        </div>
                    @elseif(Auth::check() && Auth::user()->hasAgentAccess())
                        <input type="hidden" name="user_id" value="">
                    @else
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endif

                    <div class="form-group{{ $errors->has('occupancy_status') ? ' has-error' : '' }}">
                        <h6>Current Occupancy Status</h6>
                        <div class="radio">
                            <label><input name="occupancy_status" value="vacant" {{ old('occupancy_status', @$property['occupancy_status'])=='vacant' ? 'checked' : '' }} type="radio"> Vacant </label>
                        </div>
                        <div class="radio">
                            <label><input name="occupancy_status" value="owner_occupied" {{ old('occupancy_status', @$property['occupancy_status'])=='owner_occupied' ? 'checked' : '' }} type="radio"> Owner Occupied </label>
                        </div>
                        <div class="radio">
                            <label><input name="occupancy_status" value="tenant" {{ old('occupancy_status', @$property['occupancy_status'])=='tenant' ? 'checked' : '' }} type="radio">Tenant</label>
                        </div>
                        @if ($errors->has('occupancy_status'))
                            <span class="text-danger">{{ $errors->first('occupancy_status') }}</span>
                        @endif
                    </div>

                    <div class="card box-info my-2" id="OccupancyTenantInfo" style="display: {{ old('occupancy_status', @$property['occupancy_status']) == 'tenant' ? 'block' : 'none' }}">
                        <div class="card-header p-1">
                            <h5 class="mb-0">Tenant Info</h5>
                        </div>
                        <div class="card-body p-1">
                            <div class="form-group">
                                <label for="tenant_name">Tenant Name</label>
                                <input class="form-control" name="occupancy_tenant_info[tenant_name]" id="tenant_name"
                                    value="{{ old('occupancy_tenant_info.tenant_name', @$occupancy_tenant_info['tenant_name']) }}"
                                    type="text">
                            </div>
                            <div class="form-group">
                                <label for="tenant_email">Tenant Email</label>
                                <input class="form-control" name="occupancy_tenant_info[tenant_email]" id="tenant_email"
                                    value="{{ old('occupancy_tenant_info.tenant_email', @$occupancy_tenant_info['tenant_email']) }}"
                                    type="text">
                            </div>
                            <div class="form-group">
                                <label for="tenant_phone">Tenant Phone</label>
                                <input class="form-control" name="occupancy_tenant_info[tenant_phone]" id="tenant_phone"
                                    value="{{ old('occupancy_tenant_info.tenant_phone', @$occupancy_tenant_info['tenant_phone']) }}"
                                    type="text">
                            </div>
                        </div>
                    </div>
                    <!--What is the best way to contact you?-->
                    @php
                        $wayToContact = json_decode($property->way_to_contact, true);
                        $contactMethods = ['phone', 'text', 'email', 'whatsapp', 'wechat', 'other'];
                    @endphp
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <h6>What is the best way to contact you?</h6>
                            @foreach($contactMethods as $method)
                            <div class="utility_item">
                                <div class="form-check md-form-inline-check">
                                    <input class="form-check-input filled-in" name="way_to_contact[{{ $method }}]" value="1" id="way_to_contact_{{ $method }}" type="checkbox" {{ old("way_to_contact.$method", @$wayToContact[$method])=='1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="way_to_contact_{{ $method }}"> Via {{ ucfirst($method) }}</label>
                                </div>
                                @if ($method === 'other')
                                <div class="md-form md-form-inline">
                                    <input type="text" id="way_to_contact_other_way" name="way_to_contact[other_way]" value="{{ old('way_to_contact.other_way', @$wayToContact['other_way'] ?? '') }}" class="form-control" placeholder=''>
                                </div>
                                @endif
                            </div>
                            @endforeach

                            <h6 class="mt-2">Alternative contact person</h6>
                            <div class="row mb-3">
                                <div class="col-md-6 pr-0">
                                    <div class="md-form">
                                        <label for="way_to_contact_alt_contact_name">Name</label>
                                        <input id="way_to_contact_alt_contact_name" name="way_to_contact[alt_contact_name]" value="{{ old('way_to_contact.alt_contact_name', @$wayToContact['alt_contact_name'] ?? '') }}" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 pl-1">
                                    <div class="md-form">
                                        <label for="way_to_contact_alt_contact_phone">Phone No.</label>
                                        <input id="way_to_contact_alt_contact_phone" name="way_to_contact[alt_contact_phone]" value="{{ old('way_to_contact.alt_contact_phone', @$wayToContact['alt_contact_phone'] ?? '') }}" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--What is the best way to contact you?-->
                    <div class="form-group">
                        <h5>Featured Image</h5>
                        <img id="featured_img" style="max-width: 100%; border: 1px solid #bbb; padding: 5px; margin-bottom: 20px;" src="{{ isset($property->featured_image['url']) ? asset('uploads/properties/' . $property->id . '/property_photos/thumbs/' . @$property->featured_image['url']) : asset('images/bolld-placeholder.png') }}">
                    </div>

                    @if (Auth::check() && (Auth::user()->hasAgentAccess() || Auth::user()->hasManagerAccess() || Auth::user()->hasAllAccess()))
                        <hr>
                        <h6 class="mb-1">Status</h6>
                        <label class="c-switch c-switch-label c-switch-primary">
                            <input class="c-switch-input" type="checkbox" value="1" name="status" is="status" {{ optional($property)->status == 1 ? 'checked' : '' }}>
                            <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                        </label>
                    @else
                        <input type="hidden" name="status" value="{{ optional($property)->status }}">
                    @endif
                </div>
                <div class="card-footer">
                    @if (isset($property) && $property->last_edited)
                    <p><em>Last updated by: {{ getUserByID($property->last_edited)->name }}</em></p>
                    @endif
                    <button type="submit" class="btn-lg btn-primary btn-block" id="submit_property_btn">{{ $property->id ? 'Update' : 'Submit' }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('after-scripts')
    <script src="{{ asset('js/autoCompleteAddress.js') }}"></script>
    <script>
        var selDivStrata = selDivPhotos = "";
        var storedFiles = [];
        var storedPhotos = [];

        $('input, textarea, select').on('keyup keydown change blur', function(e) {
            $('input[type="submit"]').removeAttr('disabled');
            $('button[type="submit"]').removeAttr('disabled');
        });

        jQuery(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            showHideOccTenantInfo();
            showHideStrataDetails();
            $("input[name='occupancy_status']").click(function() {
                showHideOccTenantInfo();
            });
            $('#prop_type').on('change', function() {
                showHideStrataDetails();
            });
        });

        function showHideOccTenantInfo() {
            var occupancy_status = $("input[name='occupancy_status']:checked").val();
            if (occupancy_status == 'tenant') {
                $('#OccupancyTenantInfo').show();
            } else {
                $('#OccupancyTenantInfo').hide();
            }
        }

        function showHideStrataDetails() {
            var prop_type = $("#prop_type").val();
            if (prop_type == 'Strata unit/property') {
                $('#StrataProperty').show();
            } else {
                $('#StrataProperty').hide();
            }
        }

        $('.selFileLive').on('click', function() {
            var file_id = $(this).data("id");
            $element = $(this).parent('.pip');
            if (confirm("Are you sure?\nwant to Remove ")) {
                $.ajax({
                    method: "DELETE",
                    url: "{{ route(rolebased() .'.properties.removePropertyMedia', ['id' => ':id']) }}".replace(':id', file_id),
                    data: {"_token": "{{ csrf_token() }}", "_method": "DELETE"},
                    success: function(data) {
                        $element.remove();
                    }
                });
            }
            return false;
        });
    </script>
    @if (isset($property->id))
        <script>
            $('.make_featured').on('click', function() {
                var file_id = $(this).data("id");
                var prop_id = $(this).data("prop_id");
                var user_id = $(this).data("user_id");
                var type = 'property_photos';
                var item = $(this);
                if (confirm("Are you sure?\nwant to Make Featured ")) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route(rolebased() .'.properties.makeFeatured', $property) }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "file_id": file_id,
                            "prop_id": prop_id,
                            "user_id": user_id,
                            "type": type
                        },
                        success: function(data) {
                            $("#featured_img").attr('src', data);
                            $(".make_featured").html('<i class="far fa-heart"></i>');
                            item.html('<i class="fas fa-heart"></i>');
                        }
                    });
                }
                return false;
            });
        </script>
    @endif
    @if ($lat_long)
        <script>
            window.onload = function() {
                var map;
                function initialize() {
                    var myLatlng = new google.maps.LatLng({{ @$lat_long }});
                    var myOptions = {
                        zoom: <?php echo $zoom; ?>,
                        center: myLatlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                    var geocoder = new google.maps.Geocoder();
                    var marker = new google.maps.Marker({
                        draggable: true,
                        position: myLatlng,
                        map: map,
                        title: "Property location"
                    });
                    google.maps.event.addListener(marker, 'dragend', function(event) {
                        document.getElementById("lat").value = event.latLng.lat();
                        document.getElementById("long").value = event.latLng.lng();
                        geocoder.geocode({ 'latLng': event.latLng }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                city = country = postal_code = neighborhood = st_address = street_number = '';
                                results.forEach(function(element) {
                                    element.address_components.forEach(function(element2) {
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
                                });
                                document.getElementById("autocomplete").value = results[0].formatted_address;
                                document.getElementById("st_address").value = street_number + ' ' + st_address;
                                document.getElementById("neighborhood").value = neighborhood;
                                document.getElementById("city").value = city;
                                document.getElementById("state").value = state;
                                document.getElementById("country").value = country;
                                document.getElementById("zip").value = postal_code;
                            }
                        });
                    });
                }
                google.maps.event.addDomListener(window, "load", initialize());
            }
        </script>
    @endif
@endpush
