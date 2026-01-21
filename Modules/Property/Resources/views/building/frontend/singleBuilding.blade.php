@extends('frontend.layouts.app')
@section('title', __($building->title))
@push('after-styles')
<style>
    #cluster_map {
        height: 435px;
    }

    .lSSlideOuter .lSPager.lSGallery li {
        border: 1px solid transparent;
        opacity: 0.7;
    }

    .lSSlideOuter .lSPager.lSGallery li.active,
    .lSSlideOuter .lSPager.lSGallery li:hover {
        border-radius: 0px;
        border: 1px solid #FDD501;
        opacity: 1;
    }

    .lSSlideOuter .lSPager.lSGallery li a {
        vertical-align: top;
    }

    .masonry {
        transition: all .5s ease-in-out;
        column-gap: 30px;
        column-fill: initial;
    }

    .masonry .brick {
        margin-bottom: 30px;
        display: inline-block;
        vertical-align: top;
    }

    .masonry .brick img {
        transition: all .5s ease-in-out;
        backface-visibility: hidden;
        max-width: 100%;
    }

    .masonry .brick:hover img {
        opacity: .75;
    }

    .masonry.bordered {
        column-rule: 1px solid #eee;
        column-gap: 30px;
    }

    .masonry.bordered .brick {
        padding-bottom: 15px;
        margin-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .masonry.gutterless {
        column-gap: 0;
    }

    .masonry.gutterless .brick {
        margin-bottom: 0;
    }

    .p_status {
        background: #000;
        padding: 3px 7px;
        border-radius: 3px;
        color: #fff;
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
    }

    .rented,
    .sold {
        background: #e31e24 !important;
    }

    .featured,
    .luxurious {
        background: #e7a60c !important;
    }

    .furnished {
        background: #1A73E8 !important;
    }

    .for_rent,
    .for_sale,
    .vacation_rental {
        background: #64b450 !important;
    }

    .pro-option {
        display: block;
        padding: 5px 0 0 0;
        font-size: 14px;
    }

    .pro-option li {
        line-height: 19px;
        display: block;
    }

    .pro-option .item-value {
        color: #000;
        flex: 1;
    }

    .utilities ul {
        padding-left: 0px;
        list-style: none;
    }

    .utilities ul li {
        color: #666;
    }

    .utilities ul li strong {
        color: #000;
    }

    .card-header {
        color: #000;
    }

    .pro-option .item {
        margin: 0px;
        border-bottom: 1px dotted #bbb;
        font-size: 13px;
        padding: 0;
        background: transparent;
        line-height: 30px;
        display: flex;
    }

    .pro-option .item-label {
        color: #000;
    }

    .pro-option .item-value {
        flex: 1;
    }

    .utilities ul li i,
    .pro-option .item-label i {
        color: #666;
    }

    #lightSlider {
        padding: 0;
        list-style: none;
    }

    @media (min-width: 991px) {

        .lSSlideOuter .lightSlider,
        .lSSlideOuter .lightSlider li {
            height: 500px !important;
        }

        .lSSlideOuter .lightSlider li {
            position: relative;
        }

        .lSSlideOuter .lightSlider li a {
            height: 500px;
            display: block;
        }

        .lSSlideOuter .lightSlider li a img {
            object-fit: cover;
            width: 100%;
            height: 500px;
        }

        #virtual-tour iframe {
            width: 100%;
            height: 575px;
        }
    }

    @media only screen and (min-width: 320px) and (max-width: 768px) {
        .masonry {
            column-count: 2;
        }

        #cluster_map {
            height: 260px;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
        .masonry {
            column-count: 3;
        }
    }

    @media only screen and (min-width: 1024px) {
        .intro {
            letter-spacing: 1px;
        }

        .masonry {
            column-count: 5;
        }
    }

    .building_area_info {
        border-collapse: collapse;
        width: 100%;
    }

    .building_area_info td {
        padding: 8px;
    }

    .building_area_info td span {
        font-weight: bold;
    }

    .building_documents_item {
        display: flex;
        flex-wrap: wrap;
    }

    .property_price {
        position: absolute;
        left: 0px;
        padding: 1px 6px;
        background: rgba(0,0,0,0.6);
        top: 210px;
        color: #ffffff;
        font-weight: bold;
    }
    .property_status {
        position: absolute;
        padding: 1px 6px;
        background: rgb(251 4 4);
        color: #ffffff;
        right: 0;
        font-weight: 600;
        font-size: 14px;
    }
    .property_location {
        font-size: 13px !important;
    }

    .property_location i {
        color: red;
    }
    .property_title {
        font-weight: bold;
    }
    .property_title a {
        color: red;
    }
    .property_details {
        list-style: none;
        min-height: 60px;
    }
    .property_details ul{
        list-style: none;
        min-height: 60px;
        margin-bottom: 0px;
    }

    .rooms-price {
        column-count: 2;
        padding-left: 20px;
    }
    .rooms-price li i {
        color: red;
    }

    .schedule-btn a {
        background: #ed1c24;
        display: block;
        padding: 10px;
        text-transform: uppercase;
        color: #fff !important;
        font-size: 16px;
        text-align: center;
        font-weight: 400;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush

@section('content')
    <section class="py-2" id="property_gallery">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <ul id="lightSlider">
                        @if (isset($building) && isset($building->buildingImages) && count($building->buildingImages) > 0)
                            @foreach ($building->buildingImages->sortByDesc('featured') as $image)
                                @if (file_exists(public_path('uploads/buildings/'.$image->ref_id.'/building_photos/thumbs/'.$image->url)))
                                    <li class="pt-3" data-thumb="{{ asset('uploads/buildings/'.$image->ref_id.'/building_photos/thumbs/'.$image->url) }}" data-src="{{ asset('uploads/buildings/'.$image->ref_id.'/building_photos/thumbs/'.$image->url) }}">
                                        <a href="{{ asset('uploads/buildings/'.$image->ref_id.'/building_photos/thumbs/'.$image->url) }}" data-lity data-lity-desc='{{ $building->title }}'>
                                            <img src="{{ asset('uploads/buildings/'.$image->ref_id.'/building_photos/thumbs/'.$image->url) }}"/>
                                        </a>
                                    </li>
                                @else
                                    <li data-thumb="{{ asset('images/bolld-placeholder.png') }}">
                                        <a href="{{ asset('images/bolld-placeholder.png') }}" data-lity data-lity-desc='{{ $building->title }}'>
                                            <img src="{{ asset('images/bolld-placeholder.png') }}"/>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <li data-thumb="{{ asset('images/bolld-placeholder.png') }}">
                                <a href="{{ asset('images/bolld-placeholder.png') }}" data-lity data-lity-desc='{{ $building->title }}'>
                                    <img src="{{ asset('images/bolld-placeholder.png') }}" />
                                </a>
                            </li>
                            <li data-thumb="{{ asset('images/bolld-placeholder.png') }}">
                                <a href="{{ asset('images/bolld-placeholder.png') }}" data-lity data-lity-desc='{{ $building->title }}'>
                                    <img src="{{ asset('images/bolld-placeholder.png') }}" />
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 text-center px-0">
                    <div id="cluster_map" class="mb-2"></div>
                    @php
                        $prop_status = explode(',', $building->prop_status);
                        $showRentButton = in_array('For Rent', $prop_status);
                    @endphp
                    @if(!$showRentButton)
                        <style>
                            #cluster_map {
                                height: 590px !important;
                            }
                        </style>
                    @endif
                    @if ($showRentButton)
                    <div class="d-block" role="group" aria-label="">
                        <button type="button" class="btn btn-lg d-block mb-1 w-100 btn-success apply_show_pop" data-form="apply_showing" data-id="{{ $building->id }}" title="Schedule Showing"><i class="fas fa-calendar-alt"></i> SCHEDULE A SHOWING</button>
                        {{-- <a type="button" class="btn btn-lg d-block mb-1 w-100 btn-warning" title="Apply Now!" href="https://bolld.managebuilding.com/Resident/rental-application/" target="_blank"><i class="fab fa-wpforms"></i> Apply Now!</a>
                        <button type="button" class="btn btn-lg d-block mb-1 w-100 btn-dark ask_question_pop" data-form="ask_question" data-title="{{ $building->title }}" data-id="{{ $building->id }}" title="Ask Question!"><i class="far fa-question-circle"></i> Ask Question!</button> --}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    @if ($building->content)
                        <div class="card mb-3">
                            <div class="card-header">Building Description</div>
                            <div class="card-body">
                                <div class="pro-option">
                                    <div class="desc">{!! $building->content !!}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card mb-3">
                        <div class="card-header">Building Information</div>
                        <div class="card-body">
                            <div class="pro-option">
                                @php
                                    $building_info = [
                                        'building_name' => 'Building Name',
                                        'building_address' => 'Building Address',
                                        'levels' => 'Level(s)',
                                        'suites' => 'Suite(s)',
                                        'building_status' => 'Building Status',
                                        'built_year' => 'Built Year',
                                        'title_to_land' => 'Title To Land',
                                        'building_type' => 'Building Type',
                                        'strata_plan' => 'Strata Plan',
                                        'area' => 'Area',
                                        'subarea' => 'Sub Area',
                                        'board_name' => 'Board Name',
                                        'units_in_development' => 'Units In Development',
                                        'units_in_strata' => 'Units In Strata',
                                        'subcategories' => 'Sub Categories',
                                        'property_types' => 'Property Types',
                                        'management' => 'Management',
                                        'management_phone' => 'Management Phone',
                                    ];
                                @endphp
                                @foreach($building_info as $key => $buildingInfo)
                                    @if(optional(json_decode($building->building_info))->$key !== null)
                                        <div class="item">
                                            <span class="item-label">{{ $buildingInfo }}</span>
                                            <span class="item-value" style="text-align: end;">{{ optional(json_decode($building->building_info))->$key }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Building Contacts</div>
                        <div class="card-body">
                            <div class="pro-option">
                                @php
                                    $building_contacts = [
                                        'website' => 'Website',
                                        'concierge_other_name' => 'Concierge Other Name',
                                        'concierge_other_phone' => 'Concierge Other Phone',
                                        'management' => 'Management',
                                        'developer' => 'Developer',
                                        'architect' => 'Architect',
                                    ];
                                @endphp
                                @foreach($building_contacts as $key => $buildingContact)
                                    @if(optional(json_decode($building->building_contacts))->$key !== null)
                                        <div class="item">
                                            <span class="item-label">{{ $buildingContact }}</span>
                                            <span class="item-value" style="text-align: end;">{{ optional(json_decode($building->building_contacts))->$key }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Construction Info</div>
                        <div class="card-body">
                            <div class="pro-option">
                                @php
                                    $constructionKeys = [
                                        'year_built' => 'Built Year',
                                        'levels' => 'Levels',
                                        'construction' => 'Construction',
                                        'rain_screen' => 'Rain Screen',
                                        'roof' => 'Roof',
                                        'foundation' => 'Foundation',
                                        'exterior_finish' => 'Exterior Finish',
                                    ];
                                @endphp
                                @foreach($constructionKeys as $key => $construction)
                                    @if(optional(json_decode($building->construction_info))->$key !== null)
                                        <div class="item">
                                            <span class="item-label">{{ $construction }}</span>
                                            <span class="item-value" style="text-align: end;">{{ optional(json_decode($building->construction_info))->$key }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if (count($building->buildingDocuments) > 0)
                        <div class="card mb-3">
                            <div class="card-header">Document(s)</div>
                            <div class="card-body">
                                <div class="pro-option">
                                    <div class="item building_documents_item">
                                        @foreach ($building->buildingDocuments as $strataDocument)
                                            @php
                                                $fileName = $strataDocument->url;
                                                $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                                                $type = $extension != 'pdf' ? '/thumbs/' : '/';
                                            @endphp
                                            <span class="pip">
                                                @if (file_exists(public_path('uploads/buildings/'.$strataDocument->ref_id.'/building_strata_documents'.$type.$fileName)))
                                                    <a href="{{ asset('uploads/buildings/'.$strataDocument->ref_id.'/building_strata_documents'.$type.$fileName) }}" data-lity data-lity-desc="{{ $strataDocument->url }}">
                                                        @if($extension  == 'pdf')
                                                            <img class="imageThumb" src="{{ asset('img/pdf-icon.png') }}">
                                                        @else
                                                            <img class="imageThumb" src="{{ asset('uploads/buildings/'.$strataDocument->ref_id.'/building_strata_documents'.$type.$fileName) }}">
                                                        @endif
                                                    </a>
                                                @else
                                                    <a href="{{ asset('images/bolld-placeholder.png') }}" data-lity data-lity-desc='{{ $property->title }}'>
                                                        <img class="imageThumb" src="{{ asset('images/bolld-placeholder.png') }}" />
                                                    </a>
                                                @endif
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 px-0">
                    <div class="card mb-3">
                        <div class="card-header">Building Info</div>
                        <div class="card-body p-0">
                            <div class="pro-option p-0">
                                <table class="building_area_info">
                                    <tbody>
                                        <tr>
                                            <td style="border-bottom: 1px solid #fdd501"><span>Avg $/sqft</span><br>{{ $building->avg_sqft_rate ?? 'N/A' }}</td>
                                            <td style="border-bottom: 1px solid #fdd501; border-left: 1px solid #fdd501;"><span>Built</span><br>{{ json_decode($building->construction_info)->year_built ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td><span>Avg Strata Fees</span><br>{{ $building->avg_strata_fee ?? 'N/A' }}</td>
                                            <td style="border-left: 1px solid #fdd501"><span>Total Levels</span><br>{{ json_decode($building->building_info)->levels ?? 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Building Details</div>
                        <div class="card-body p-3">
                            <div class="pb-2">
                                <h6 class="mb-0 text-capitalize"><strong class="text-capitalize">PETS RESTRICTIONS</strong></h6>
                                <hr class="m-0" />
                                <div class="pro-option">
                                    @php
                                        $petRestrictions = [
                                            'pets' => 'Pets Allowed',
                                            'dogs' => 'Dogs Allowed',
                                            'cats' => 'Cats Allowed',
                                        ];
                                    @endphp
                                    @foreach($petRestrictions as $key => $label)
                                    <div class="item">
                                        <span class="item-label"><i class="fa fa-{{ $key == 'pets' ? 'paw' : ($key == 'dogs' ? 'dog' : 'cat') }}"></i> {{ $label }}</span>
                                        <span class="item-value" style="text-align: end;">{{ optional(json_decode($building->pets_restrictions))->$key ?? 'N/A' }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @php
                                $MaintenanceFeeIncludes = [
                                    "caretaker" => "Caretaker",
                                    "garbage_pickup" => "Garbage Pickup",
                                    "gardening" => "Gardening",
                                    "gas" => "Gas",
                                    "hot_water" => "Hot Water",
                                    "management" => "Management",
                                    "recreation_facility" => "Recreation Facility"
                                ];
                                $checkedMaintenanceFeeIncludes = [];
                                foreach($MaintenanceFeeIncludes as $key => $maintenance) {
                                    if(optional(json_decode($building->maintenance_fee_includes))->$key == '1') {
                                        $checkedMaintenanceFeeIncludes[] = $maintenance;
                                    }
                                }
                            @endphp
                            @if (count($checkedMaintenanceFeeIncludes) > 0)
                                <div class="py-2">
                                    <h6 class="mb-0"><strong>MAINTENANCE FEE INCLUDES</strong></h6>
                                    <hr class="m-0" />
                                    <div class="pro-option">
                                        <div class="item">
                                            <span class="item-label">{{ count($checkedMaintenanceFeeIncludes) > 0 ? implode(', ', $checkedMaintenanceFeeIncludes) : 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php
                                $amenities = [
                                    "bike_room" => "Bike Room",
                                    "exercise_centre" => "Exercise Centre",
                                    "in_suite_laundry" => "In-suite Laundry",
                                    "indoor_pool" => "Indoor Pool",
                                    "sauna" => "Sauna/ Steam Room",
                                    "hot_tub" => "Swirlpool/ Hot Tub"
                                ];

                                $checkedAmenities = [];
                                foreach($amenities as $key => $amenity) {
                                    if(optional(json_decode($building->amenities))->$key == '1') {
                                        $checkedAmenities[] = $amenity;
                                    }
                                }
                            @endphp
                            @if (count($checkedAmenities) > 0)
                                <div class="py-2">
                                    <h6 class="mb-0"><strong>AMENITIES</strong></h6>
                                    <hr class="m-0" />
                                    <div class="pro-option">
                                        <div class="item">
                                            <span class="item-label">{{ count($checkedAmenities) > 0 ? implode(', ', $checkedAmenities) : 'N/A' }}</span>
                                        </div>

                                    </div>
                                </div>
                            @endif
                            @php
                                $features = [
                                    "bike_room" => "Bike Room",
                                    "exercise_centre" => "Exercise Centre",
                                    "in_suite_laundry" => "In-suite Laundry",
                                    "indoor_pool" => "Indoor Pool",
                                    "sauna" => "Sauna",
                                    "hot_tub" => "Hot Tub",
                                    "underground_secure_parking" => "Underground Secure Parking",
                                    "open_floor_plan" => "Open Floor Plan",
                                    "high_ceilings" => "High Ceilings",
                                    "granite_countertops" => "Granite Countertops",
                                    "crown_mouldings" => "Crown Mouldings",
                                    "gas_fireplace" => "Gas Fireplace",
                                    "balcony" => "Balcony",
                                    "storage_locker" => "Storage Locker"
                                ];
                                $featuresObj = [];
                                foreach($features as $key => $feature) {
                                    if(optional(json_decode($building->features))->$key == '1') {
                                        $featuresObj[] = $feature;
                                    }
                                }
                            @endphp
                            @if (count($featuresObj) > 0)
                            <div class="py-2">
                                <h6 class="mb-0"><strong>FEATURES</strong></h6>
                                <hr class="m-0" />
                                <div class="pro-option">
                                    <div class="item">
                                        <span class="item-label">{{ count($featuresObj) > 0 ? implode(', ', $featuresObj) : 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
        $rentProperties = [];
        $rentedProperties = [];
        $propertyTypes = [];
        foreach ($building->properties as $property) {
            $propertyTypes = explode(',', $property->prop_status);

            if (in_array('For Rent', $propertyTypes)) {
                $rentProperties[] = $property;
            }

            foreach ($propertyTypes as $type) {
                if ($type === 'Rented' || $type === 'Just Rented') {
                    $rentedProperties[] = $property;
                    break;
                }
            }
        }

        if (!function_exists('getPropertyImageUrl')) {
            function getPropertyImageUrl($property) {
                $featuredImage = $property->propertyImages->where('featured', '1')->first();
                return $featuredImage && file_exists(public_path('uploads/properties/'.$property->id.'/property_photos/thumbs/'.$featuredImage->url)) ? url('uploads/properties/' . $property->id . '/property_photos/thumbs/' . $featuredImage->url) : asset('images/bolld-placeholder.png');
            }
        }

        // Sort properties by creation date, latest first
        usort($rentProperties, function($a, $b) {
            return strtotime($b->created_at) - strtotime($a->created_at);
        });

        usort($rentedProperties, function($a, $b) {
            return strtotime($b->created_at) - strtotime($a->created_at);
        });

        // Limit to 3 properties in each category
        $propertiesForRent = array_slice($rentProperties, 0, 3);
        $propertiesRented = array_slice($rentedProperties, 0, 3);
    @endphp
    @if(count($propertiesForRent) > 0)
        <section class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">Properties Available For Rent(s) in {{ $building->title }}</div>
                            <div class="card-body d-flex">
                                @foreach ($propertiesForRent as $key => $value)
                                @php
                                    $propertyTypes = explode(',', $value->prop_status);
                                @endphp
                                <div class="col-md-4">
                                    <div class="card mx-auto" style="width:20rem;">
                                        <img src="{{ getPropertyImageUrl($value) }}" class="card-img-top" alt="Featured Image" style="width: 318px !important; height: 238px !important;">
                                        <span class="property_price">$ {{ $value->rate }}</span>
                                        <span class="property_status">{{ in_array('For Rent', $propertyTypes) ? 'For Rent' : 'none' }}</span>
                                        <div class="card-body pt-2 pl-2">
                                            <h6 class="card-title property_title mb-0">
                                                <a href="{{ route('property.single', $value->slug) }}"> {{ $value->title }}</a>
                                            </h6>
                                            <h6 class="property_location mb-0"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $value->address }} </h6>
                                        </div>
                                        <div class="property_details">
                                            <ul class="rooms-price ">
                                                <li><i class="fa fa-bed" aria-hidden="true"></i> <span>{{ $value->beds }} Beds</span></li>
                                                <li><i class="fas fa-chart-area" aria-hidden="true"></i> <span>{{ $value->area }} sqft</span></li>
                                                <li><i class="fa fa-bath" aria-hidden="true"></i> <span>{{ $value->baths }} Baths</span></li>
                                            </ul>
                                        </div>
                                        <div class="schedule-btn">
                                            <a class="apply_online_link" href="{{ route('property.single', $value->slug) }}">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(count($propertiesRented) > 0)
        <section class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">Properties Rented in {{ $building->title }}</div>
                            <div class="card-body d-flex">
                                @foreach ($propertiesRented as $key => $value)
                                @php
                                    $propertyTypes = explode(',', $value->prop_status);
                                @endphp
                                <div class="col-md-4">
                                    <div class="card mx-auto" style="width:20rem;">
                                        <img src="{{ getPropertyImageUrl($value) }}" class="card-img-top" alt="Featured Image" style="width: 318px !important; height: 238px !important;">
                                        <span class="property_price">$ {{ $value->rate }}</span>
                                        <span class="property_status">{{ in_array('Rented', $propertyTypes) ? 'Rented' : (in_array('Just Rented', $propertyTypes) ? 'Just Rented' : 'none') }}</span>
                                        <div class="card-body pt-2 pl-2">
                                            <h6 class="card-title property_title mb-0"><a href="{{ route('property.single', $value->slug) }}"> {{ $value->title }} </a></h6>
                                            <h6 class="property_location mb-0"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $value->address }} </h6>
                                        </div>
                                        <div class="property_details">
                                            <ul class="rooms-price ">
                                                <li><i class="fa fa-bed" aria-hidden="true"></i> <span>{{ $value->beds }} Beds</span></li>
                                                <li><i class="fas fa-chart-area" aria-hidden="true"></i> <span>{{ $value->area }} sqft</span></li>
                                                <li><i class="fa fa-bath" aria-hidden="true"></i> <span>{{ $value->baths }} Baths</span></li>
                                            </ul>
                                        </div>
                                        <div class="schedule-btn">
                                            <a class="apply_online_link" href="{{ route('property.single', $value->slug) }}">READ MORE</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@push('after-scripts')
<div class="modal fade" id="ShowingApplicationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ShowingApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>
<script>
    @php
        $location = json_decode($building->location);
    @endphp
    $(document).ready(function() {
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 6,
            slideMargin: 0,
            adaptiveHeight: true,
            // height: '100px',
            enableDrag: false,
            currentPagerPosition: 'left',
            onSliderLoad: function(el) {
                // $('#lightSlider .lslide img').css('height', '100px');
                // el.lightGallery({
                //     selector: '#lightSlider .lslide'
                // });

            }
        });
    });

    function initMap() {
        var map = new google.maps.Map(document.getElementById('cluster_map'), {
            zoom: 14,
            @if(isset($location->lat, $location->lng))
                center: {
                    lat: {{ $location->lat }},
                    lng: {{ $location->lng }}
                }
            @else
                center: {
                    lat: 49.282730,
                    lng: -123.120735
                }
            @endif
        });
        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var markers = locations.map(function(location, i) {
            return new google.maps.Marker({
                position: location,
                icon: "{{ url('images/map-icons/marker.png') }}",
                //label: labels[i % labels.length]
            });
        });
        mcOptions = {
            styles: [{
                    height: 53,
                    url: "{{ url('images/map-icons/m1.png') }}",
                    width: 53
                },
                {
                    height: 56,
                    url: "{{ url('images/map-icons/m2.png') }}",
                    width: 56
                },
                {
                    height: 66,
                    url: "{{ url('images/map-icons/m3.png') }}",
                    width: 66
                },
                {
                    height: 78,
                    url: "{{ url('images/map-icons/m4.png') }}",
                    width: 78
                },
                {
                    height: 90,
                    url: "{{ url('images/map-icons/m5.png') }}",
                    width: 90
                }
            ]
        }
        var markerCluster = new MarkerClusterer(map, markers, mcOptions);
    }
    function initAutocomplete() {
        // Your autocomplete initialization code goes here
    }
    var locations = [
        @if (isset($location->lat, $location->lng))
            {
                lat: {{ $location->lat }},
                lng: {{ $location->lng }}
            }
        @endif
    ]

    $(".apply_show_pop, .apply_online_pop, .ask_question_pop").click(function() {
        $('#ajax_loader').hide();
        var prop_id = $(this).data("id");
        var form = $(this).data("form");
        $.ajax({
            method: "POST",
            url: "{{ route('properties.propertyShowingAjax') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": prop_id,
                "form": form
            },
            success: function(data) {
                if (data.success == true) {
                    $('#ShowingApplicationModal .modal-content').html(data.html);
                    $('#ShowingApplicationModal').modal('show')
                }
            }
        });
    });
</script>
@endpush
