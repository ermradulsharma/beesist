@extends('frontend.layouts.app')
@section('title', __('Buildings'))
@push('after-styles')
    <style>
        .properties {
            margin: 40px auto
        }

        .properties .card {
            box-shadow: 0px 10px 5px -8px rgba(0, 0, 0, 0.3);
            border-color: #E6E6E6;
            margin-bottom: 25px
        }

        .rooms-price {
            list-style: none;
            padding: 0;
            column-count: 2;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .featured_ribbon {
            position: absolute;
            top: 5px;
            padding: 3px 10px;
            background: #fdd501;
            color: #000;
            box-shadow: -1px 2px 3px rgba(0, 0, 0, .3);
            z-index: 1;
            text-transform: uppercase;
            font-size: 12px;
        }

        .featured_ribbon::after,
        .featured_ribbon::before {
            content: "";
            position: absolute;
        }

        .featured_ribbon::before {
            width: 7px;
            height: calc(100% + 7px);
            top: 0;
            left: -6.5px;
            padding: 0 0 7px;
            background: inherit;
            border-radius: 5px 0 0 5px;
        }

        .featured_ribbon::after {
            width: 5px;
            height: 5px;
            bottom: -5px;
            left: -4.5px;
            background: rgba(255, 255, 255, .8);
            border-radius: 5px 0 0 5px;
        }

        .properties .status {
            position: absolute;
            top: 0;
            right: 0;
            padding: 5px 10px;
            z-index: 9;
        }

        .p_status {
            background: #000;
            padding: 3px 7px;
            border-radius: 3px;
            color: #fff;
            text-transform: uppercase;
            font-size: 11px;
        }

        .rented,
        .sold {
            background: #e31e24;
        }

        .featured,
        .luxurious {
            background: #e7a60c;
        }

        .furnished {
            background: #1A73E8;
        }

        .for_rent,
        .for_sale,
        .vacation_rental {
            background: #34a853;
        }

        .card-title a {
            color: inherit;
        }

        .property-image {
            position: relative;
        }

        .property-image .price {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 5px 10px;
            background: rgba(255, 255, 255, 0.6);
            color: #000;
        }

        #cluster_map {
            height: 450px;
        }

        .property-info i,
        .card-text i {
            color: #FDD501
        }

        .properties .card-body .card-text {
            line-height: 17px;
            min-height: 49px;
        }
        .card-title {
            min-height: 52px;
        }
        .card-img-top {
            height: 266px;
        }
    </style>
@endpush

@section('content')
    <div id="cluster_map"></div>
    <div class="container properties">
        @if ($properties->count() > 0)
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <a href="{{ route('building.single', $property->slug) }}" class="property-image">
                                @if($property->featured_image)
                                    @if (file_exists(public_path('uploads/buildings/'.$property->id.'/building_photos/thumbs/'.$property->featured_image['url'])))
                                        <img src="{{ asset('uploads/buildings/'.$property->id.'/building_photos/thumbs/'.$property->featured_image['url']) }}" class="card-img-top" alt="{{ $property->title }}">
                                    @else
                                        <img src="{{ asset('images/bolld-placeholder.png') }}" class="card-img-top" alt="{{ $property->title }}">
                                    @endif
                                @else
                                    <img src="{{ asset('images/bolld-placeholder.png') }}" class="card-img-top" alt="{{ $property->title }}">
                                @endif
                                @if ($property->rate)
                                    <span class="price">${{ $property->rate }}</span>
                                @endif
                            </a>
                            <div class="card-body">
                                <h6 class="card-title fw-bold mb-2">
                                    <a href="{{ route('building.single', $property->slug) }}">{{ $property->title }}</a>
                                </h6>
                                <p class="card-text fs-6 mb-1"><i class="fas fa-map-marker-alt"></i> <small>{{ json_decode($property->location)->address }}</small></p>
                                <h6 class="card-text fs-5 mb-1"><strong>Listings:</strong> {{ $property->properties->count() ?? 'N/A' }} </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning" role="alert" style="margin: 20px;">
                <h4 class="alert-heading"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Property Not Found!</h4>
                <p>There is no property listed in this category.</p>
            </div>
        @endif
    </div>
@endsection

@push('after-scripts')
    <div class="modal fade" id="ShowingApplicationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ShowingApplicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"></div>
        </div>
    </div>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('cluster_map'), {
                zoom: 11,
                center: {
                    lat: 49.282730,
                    lng: -123.120735
                }
            });

            var infoWin = new google.maps.InfoWindow();
            var bounds = new google.maps.LatLngBounds();
            var markers = locations.map(function(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    icon: "{{ url('images/map-icons/marker.png') }}"
                });
                bounds.extend(marker.position);
                google.maps.event.addListener(marker, 'click', function(evt) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('building.infoWindow') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "pid": location.pid
                        },
                        success: function(data) {
                            console.log('data', data);
                            infoWin.setContent(data);
                            infoWin.open(map, marker);
                        }
                    });

                })
                return marker;
            });
            map.fitBounds(bounds);
            var listener = google.maps.event.addListener(map, "idle", function () {
                map.setZoom(3);
                google.maps.event.removeListener(listener);
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
            @foreach($properties as $property)
                @php $location = json_decode($property->location); @endphp
                @if(isset($location->lat, $location->lng))
                    { lat: {{ $location->lat }}, lng: {{ $location->lng }}, pid: {{ $property->id }} },
                @endif
            @endforeach
        ];
        function initAutocomplete() {
            // Your autocomplete initialization code goes here
        }
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
