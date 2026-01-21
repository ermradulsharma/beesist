@extends('frontend.layouts.app')
@section('title', __('About'))
@push('after-styles')
    <style>
        #cluster_map {
            height: 436px
        }

        .lSSlideOuter .lSPager.lSGallery li {
            border: 1px solid transparent;
            opacity: 0.7
        }

        .lSSlideOuter .lSPager.lSGallery li.active,
        .lSSlideOuter .lSPager.lSGallery li:hover {
            border-radius: 0px;
            border: 1px solid #FDD501;
            opacity: 1
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

        .pro-option .item {
            display: block;
            padding: 0;
            background: transparent;
            line-height: 30px;
        }

        .pro-option .item-label {
            color: #888;
        }

        .pro-option .item-value {
            color: #000;
        }

        .pro-option .item-label,
        .pro-option .item-value {}

        .pro-option .item {
            display: flex;
            text-align: right;
        }

        .pro-option .item-value {
            flex: 1
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
            color: #000
        }

        .pro-option .item {
            display: flex;
            padding: 2px 0;
            background: #fff;
            margin: 0px;
            border-bottom: 1px dotted #bbb;
            font-size: 13px;
            font-weight: 600;
            text-align: right
        }

        .pro-option .item-label {
            color: #666
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
            list-style: none
        }

        @media (min-width:991px) {

            .lSSlideOuter .lightSlider,
            .lSSlideOuter .lightSlider li {
                height: 500px !important;
            }

            .lSSlideOuter .lightSlider li {
                position: relative
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
                height: 575px
            }
        }

        @media only screen and (min-width: 320px) and (max-width: 768px) {
            .masonry {
                column-count: 2;
            }

            #cluster_map {
                height: 260px
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
    </style>
@endpush

@section('content')

    <section class="py-2" id="property_gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <ul id="lightSlider">
                        @if (isset($property) && $property->propertyImages != '')
                            @if (isset($property->featured_image['url']))
                                <li data-thumb="{{ asset('uploads/properties/' . $property->id . '/photos/thumbs/' . @$property->featured_image['url']) }}" data-src="{{ asset('uploads/properties/' . $property->id . '/photos/' . @$property->featured_image['url']) }}">
                                    <a href="{{ asset('uploads/properties/' . $property->id . '/photos/' . @$property->featured_image['url']) }}" data-lity data-lity-desc='{{ $property->title }}'>
                                        <img src="{{ asset('uploads/properties/' . $property->id . '/photos/' . @$property->featured_image['url']) }}" />
                                    </a>
                                </li>
                            @endif
                            @foreach (@$property->propertyImages as $property_photo)
                                @if ($property_photo->featured == 0)
                                    <li data-thumb="{{ url('uploads/properties') }}/{{ @$property->id }}/photos/thumbs/{{ $property_photo->url }}" data-src="{{ url('uploads/properties') }}/{{ @$property->id }}/photos/{{ $property_photo->url }}">
                                        <a href="{{ url('uploads/properties') }}/{{ @$property->id }}/photos/{{ $property_photo->url }}" data-lity data-lity-desc='{{ $property->title }}'>
                                            <img src="{{ url('uploads/properties') }}/{{ @$property->id }}/photos/{{ $property_photo->url }}" />
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-lg-4 gx-5 text-md-center text-sm-center text-xs-center mt-lg-0 mt-md-5 mt-sm-5 mt-xs-5">
                    <div id="cluster_map" class="mb-2"></div>

                    @php $prop_status = explode(',', $property->prop_status); @endphp
                    <div class="d-block" role="group" aria-label="">
                        @if (in_array('For Rent', $prop_status))
                            <button type="button" class="btn btn-lg d-block mb-1 w-100 btn-success apply_show_pop" data-form="apply_showing" data-id="{{ $property->id }}" title="Schedule Showing"><i class="fas fa-calendar-alt"></i> SCHEDULE A SHOWING</button>
                        @endif
                        <a type="button" class="btn btn-lg d-block mb-1 w-100 btn-warning" title="Apply Now!" href="https://bolld.managebuilding.com/Resident/rental-application/" target="_blank"><i class="fab fa-wpforms"></i> Apply Now!</a>
                        <button type="button" class="btn btn-lg d-block mb-1 w-100 btn-dark ask_question_pop" data-form="ask_question" data-title="{{ $property->title }}" data-id="{{ $property->id }}" data-form="ask_question" title="Ask Question!"><i class="far fa-question-circle"></i> Ask Question!</button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-2">
        <div class="container">
            <div class="row flex-md-row-reverse">
                <div class="col-lg-4 gx-5 mt-lg-0 mt-md-5 mt-sm-5 mt-xs-5">

                    <div class="card mb-3">
                        <div class="card-header">Property Details</div>
                        <div class="card-body">
                            <div class="pro-option">
                                <div class="item"><span class="item-label"><i class="fa fa-bed"></i> Beds</span><span class="item-value">{{ $property->beds ? $property->beds . ' Beds' : 'N/A' }}</span></div>
                                <div class="item"><span class="item-label"><i class="fa fa-bath"></i> Baths</span><span class="item-value">{{ $property->baths }} Baths</span></div>
                                <div class="item"><span class="item-label"><i class="fa fa-bed"></i> Sleeps</span><span class="item-value">{{ $property->sleeps }} Sleeps</span></div>
                                <div class="item"><span class="item-label"><i class="fas fa-chart-area"></i> Area</span><span class="item-value">{{ $property->area }} sqft</span></div>
                                <div class="item"><span class="item-label"><i class="fa fa-building"></i> Property Type</span><span class="item-value">{{ $property->prop_type }}</span></div>
                                <div class="item"><span class="item-label"><i class="fa fa-car"></i> Parking</span><span class="item-value">{{ $property->parking }}</span></div>
                                <div class="item"><span class="item-label"><i class="fa fa-archive"></i> Storage</span><span class="item-value">{{ $property->storage }}</span></div>
                                <div class="item"><span class="item-label"><i class="fa fa-paw"></i> Pet Policy</span><span class="item-value">{{ $property->pet_policy }}</span></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">Included Utilities</div>
                        <div class="card-body utilities">
                            <ul>
                                @php $utilities = json_decode($property->utilities, true); @endphp
                                @if (@$utilities['parking'] == '1')
                                    <li><i class="fa fa-check-square" aria-hidden="true"></i> Parking
                                        @if (@$utilities['num_parking'])
                                            x <u><strong>{{ $utilities['num_parking'] }}</strong></u>
                                        @endif
                                        @if (@$utilities['stall'])
                                            (Stall # <u><strong>{{ $utilities['stall'] }}</strong></u>)
                                        @endif
                                    </li>
                                @endif

                                @if (@$utilities['storage'] == '1')
                                    <li><i class="fa fa-check-square" aria-hidden="true"></i> Storage
                                        @if (@$utilities['storage_desc'])
                                            <u><strong>{{ $utilities['storage_desc'] }}</strong></u>
                                        @endif
                                    </li>
                                @endif

                                {!! @$utilities['water'] == '1' ? '<li><i class="fa fa-check-square" aria-hidden="true"></i> Water</li>' : '' !!}
                                {!! @$utilities['hot_water'] == '1' ? '<li><i class="fa fa-check-square" aria-hidden="true"></i> Hot water </li>' : '' !!}
                                {!! @$utilities['heat'] == '1' ? '<li><i class="fa fa-check-square" aria-hidden="true"></i> Heat</li>' : '' !!}
                                {!! @$utilities['elcetricity'] == '1' ? '<li><i class="fa fa-check-square" aria-hidden="true"></i> Electricity</li>' : '' !!}
                                {!! @$utilities['gas'] == '1' ? '<li><i class="fa fa-check-square" aria-hidden="true"></i> Gas</li>' : '' !!}
                                {!! @$utilities['cable_tv'] == '1' ? '<li><i class="fa fa-check-square" aria-hidden="true"></i> Cable TV</li>' : '' !!}
                                {!! @$utilities['internet'] == '1' ? '<li><i class="fa fa-check-square" aria-hidden="true"></i> Internet</li>' : '' !!}
                                {!! @$utilities['phone'] == '1' ? '<li><i class="fa fa-check-square" aria-hidden="true"></i> Phone</li>' : '' !!}
                                @if (isset($utilities['others_desc']))
                                    @foreach (explode(',', $utilities['others_desc']) as $utilities)
                                        @if ($utilities)
                                            <li><i class="fa fa-check-square" aria-hidden="true"></i> {{ $utilities }}</li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="card text-center mb-3">
                        <div class="card-header">Contact Agent</div>
                        <div class="card-body">
                            @php
                                $agent_pic = 'https://gravatar.com/avatar/' . md5(strtolower(trim(@$property->agent_detail->email))) . '?s=100&d=mp';
                            @endphp
                            <img class="profile-user-img rounded-circle" style="max-width:150px;height:auto;margin-bottom:20px" src="{{ $agent_pic }}" alt="{{ @$property->agent_detail->name }}">
                            <h5 class="font-bold mb-0">{{ @$property->agent_detail->name }}</h5>
                            <p class="text-muted text-center">Agent</p>
                            @if ($property->agent_detail->email)
                                <h5><i class="fa fa-envelope"></i> <a href="mailto:{{ @$property->agent_detail->email }}">{{ @$property->agent_detail->email }}</a></h5>
                            @endif
                            @if ($property->agent_detail->phone)
                                <h5><i class="fa fa-phone-alt"></i> <a href="tel:{{ @$property->agent_detail->phone }}">{{ @$property->agent_detail->phone }}</a></h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="mb-2">
                        <a href="{{ url('property-pdf-download') }}/{{ $property->id }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-file-pdf" aria-hidden="true"></i> Download PDF
                        </a>
                    </div>
                    <div class="property-content">
                        <div class="disclaimer p-3 alert alert-warning">
                            <h5 class="font-bold mb-2">MPORTANT: DISCLAIMER - PLEASE READ</h5>
                            <hr>
                            @if ($property->disclaimer)
                                {!! @$property->disclaimer !!}
                            @else
                                <strong>NOTE:</strong> IN ORDER TO ATTEND ANY OF THE ABOVE SHOWINGS, FOR YOUR SECURITY AND SECURITY OF OUR AGENTS YOU MUST REGISTER BY CLICKING ON "SCHEDULE A SHOWING" OR BY CALLING 855-266-8588. IF YOU DO NOT REGISTER YOU WILL NOT BE SHOWN THE PLACE. PLEASE ARRIVE 5 MINUTES EARLY AND TEXT THE LISTED LEASING AGENT. DUE TO OUR BUSY SCHEDULE IF YOU ARE LATE WE CANNOT GUARANTEE WE WILL BE ABLE TO SHOW YOU THE PLACE AT THIS TIME AND YOU MIGHT NEED TO RESCHEDULE
                            @endif
                        </div>

                        @php $prop_status = explode(',', $property->prop_status); @endphp
                        @foreach ($prop_status as $status)
                            <span class="p_status {{ Str::slug($status, '_') }}">{{ $status }}</span>
                        @endforeach

                        <h2 class="mb-1 mt-2">{{ $property->title }}</h2>
                        <h6 class="mt-0"><i class="fa fa-map-marker-alt" aria-hidden="true"></i> {{ $property->address }}</h6>
                        @if ($property->rate)
                            <h4 class="price"><b>${{ @$property->rate }}</b>/<small>{{ @$property->rateper }}</small></h4>
                        @endif
                        <hr>
                        @if ($property->prop_type == 'Strata unit/property')
                            @php $strata_property_details = json_decode($property->strata_property_details); @endphp
                            <div class="strata_property_details mb-4">
                                <h3 class="heading_style1 my-4">Strata unit/property details</h3>
                                <div class="pro-option">
                                    @if ($strata_property_details->suite)
                                        <div class="item"><span class="item-label">Suite#</span><span class="item-value">{{ $strata_property_details->suite }}</span></div>
                                    @endif
                                    @if ($strata_property_details->address)
                                        <div class="item"><span class="item-label">Address</span><span class="item-value">{{ $strata_property_details->address }}</span></div>
                                    @endif
                                    @if ($strata_property_details->city)
                                        <div class="item"><span class="item-label">City</span><span class="item-value">{{ $strata_property_details->city }}</span></div>
                                    @endif
                                    @if ($strata_property_details->state)
                                        <div class="item"><span class="item-label">State / Province / Region</span><span class="item-value">{{ $strata_property_details->state }}</span></div>
                                    @endif
                                    @if ($strata_property_details->zip)
                                        <div class="item"><span class="item-label">ZIP / Postal Code</span><span class="item-value">{{ $strata_property_details->zip }}</span></div>
                                    @endif
                                    @if ($strata_property_details->country)
                                        <div class="item"><span class="item-label">Country</span><span class="item-value">{{ $strata_property_details->country }}</span></div>
                                    @endif
                                    @if ($strata_property_details->strata_management_company)
                                        <div class="item"><span class="item-label">Strata management company</span><span class="item-value">{{ $strata_property_details->strata_management_company }}</span></div>
                                    @endif
                                    @if ($strata_property_details->strata_manager_name)
                                        <div class="item"><span class="item-label">Strata manager's name</span><span class="item-value">{{ $strata_property_details->strata_manager_name }}</span></div>
                                    @endif
                                    @if ($strata_property_details->building_manager_name)
                                        <div class="item"><span class="item-label">Building manager's name</span><span class="item-value">{{ $strata_property_details->building_manager_name }}</span></div>
                                    @endif
                                    @if ($strata_property_details->bm_phone_number)
                                        <div class="item"><span class="item-label">Building manager's phone number</span><span class="item-value">{{ $strata_property_details->bm_phone_number }}</span></div>
                                    @endif
                                    @if ($strata_property_details->concierge_phone)
                                        <div class="item"><span class="item-label">Concierge's phone number</span><span class="item-value">{{ $strata_property_details->concierge_phone }}</span></div>
                                    @endif
                                    @if ($strata_property_details->parking)
                                        <div class="item"><span class="item-label">Parking stall number/numbers</span><span class="item-value">{{ $strata_property_details->parking }}</span></div>
                                    @endif
                                    @if ($strata_property_details->location_parking)
                                        <div class="item"><span class="item-label">Location of parking</span><span class="item-value">{{ $strata_property_details->location_parking }}</span></div>
                                    @endif
                                    @if ($strata_property_details->storage_locker)
                                        <div class="item"><span class="item-label">Storage locker number/numbers</span><span class="item-value">{{ $strata_property_details->storage_locker }}</span></div>
                                    @endif
                                    @if ($strata_property_details->location_storage)
                                        <div class="item"><span class="item-label">Location of the storage</span><span class="item-value">{{ $strata_property_details->location_storage }}</span></div>
                                    @endif
                                    @if ($strata_property_details->amenities)
                                        <div class="item"><span class="item-label">Location of the amenities</span><span class="item-value">{{ $strata_property_details->amenities }}</span></div>
                                    @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        @endif
                        <div class="prop-highlight">
                            <h3 class="heading_style1 my-4">Property Description</h3>
                            <div class="desc mb-5">{!! $property->content !!}</div>
                            @if ($property->strataDocs->count() > 0)
                                <h3 class="heading_style1 my-4">Strata bylaws/property related documents</h3>
                                <div class="masonry bordered mb-5">
                                    @if (isset($property->strataDocs))
                                        @foreach (@$property->strataDocs as $strata_document)
                                            <div class="brick">
                                                @if (pathinfo($strata_document->url, PATHINFO_EXTENSION) == 'pdf')
                                                    <a href="{{ url('uploads/properties/') }}/{{ @$property->id }}/strata/{{ $strata_document->url }}" data-lity data-lity-desc="{{ $strata_document->url }}">
                                                        <img class="imageThumb" src="{{ asset('img/pdf-icon.png') }}">
                                                    </a>
                                                @else
                                                    <a href="{{ url('uploads/properties/') }}/{{ @$property->id }}/strata/{{ $strata_document->url }}" data-lity data-lity-desc="{{ $strata_document->url }}">
                                                        <img class="imageThumb" src="{{ url('uploads/properties/') }}/{{ @$property->id }}/strata/thumbs/{{ $strata_document->url }}">
                                                    </a>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                            @if ($property->propertyImages->count() > 0)
                                <h3 class="heading_style1 my-4">Property photos</h3>
                                <div class="masonry bordered mb-5">
                                    @if (isset($property->propertyImages))
                                        @foreach (@$property->propertyImages as $property_photo)
                                            <div class="brick">
                                                <a href="{{ url('uploads/properties') }}/{{ @$property->id }}/photos/{{ $property_photo->url }}" data-lity data-lity-desc='{{ $property->title }}'>
                                                    <img class="imageThumb" src="{{ url('uploads/properties') }}/{{ @$property->id }}/photos/thumbs/{{ $property_photo->url }}" />
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
    <div class="modal fade" id="ShowingApplicationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ShowingApplicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&callback=initMap"></script>
    <script src="{{ asset('js/markerclusterer.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#lightSlider').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                thumbItem: 6,
                slideMargin: 0,
                adaptiveHeight: true,
                enableDrag: false,
                currentPagerPosition: 'left',
                onSliderLoad: function(el) {
                    // el.lightGallery({
                    //     selector: '#lightSlider .lslide'
                    // });
                }
            });
        });

        function initMap() {
            var map = new google.maps.Map(document.getElementById('cluster_map'), {
                zoom: 14,
                @if (isset($property->lat, $property->lng))
                    center: {
                        lat: {{ $property->lat }},
                        lng: {{ $property->lng }}
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
        var locations = [
            @if (isset($property->lat, $property->lng))
                {
                    lat: {{ $property->lat }},
                    lng: {{ $property->lng }}
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
