<div>
    <div class="row">
        @if ($logged_in_user->hasAllAccess())
            <div class="col-md-4">
                <select wire:model="accountId" id="account_id" class="form-control mb-3" wire:change='getEvents'>
                    <option value="" selected>All Property Manager</option>
                    @foreach ($subscribers as $subscriber)
                        <option value="{{ $subscriber->user_id }}">{{ $subscriber->userDetails->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if ($logged_in_user->hasManagerAccess())
            <div class="col-md-4">
                <div id="testContent"></div>
                <select wire:model="agentId" id="account_agent" class="form-control mb-3" wire:change='getEvents'>
                    <option value="" selected>All Agent</option>
                    @foreach ($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8">
                <a href="{{ route('dynamic.index', auth()->user()->slug) }}" target="_blank" data-toggle="tooltip" title="Manager's Property Page" class="btn btn-primary float-right">Manager's Property Page</a>
            </div>
        @endif
    </div>
    <div wire:ignore id="calendar"></div>

    <div id="AppointmentModal" wire:ignore.self class="modal fade bd-appointment-modal-lg" tabindex="-1" role="dialog" aria-labelledby="AppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form wire:submit="saveAppointment">
                    <input type="hidden" wire:model.defer="type" value="Appointment">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AppointmentModalLongTitle">Schedule Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="appointment_title">Appointment Title <span class="req">*</span></label>
                            <input type="text" class="form-control @error('appointment_title') is-invalid @enderror" wire:model.defer="appointment_title" id="appointment_title" placeholder="Appointment Title" />
                            @error('appointment_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="user_id">
                                    @if (auth()->user()->hasAllAccess())
                                        Property Manager/Agent
                                    @else
                                        Agent
                                    @endif
                                    <span class="req">*</span>
                                </label>
                                <select wire:model.defer="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                    <option value="" selected>Select User</option>
                                    @if ($subscribers)
                                        <optgroup label="Property Managers">
                                            @foreach ($subscribers as $subscriber)
                                                <option value="{{ $subscriber->user_id }}">{{ $subscriber->userDetails->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                    @if ($agents)
                                        <optgroup label="Property Agents">
                                            @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointment_date">Appointment Date <span class="req">*</span></label>
                                    <input type="text" class="form-control datetimepicker @error('appointment_date') is-invalid @enderror" wire:model.defer="appointment_date" id="appointment_date" placeholder="YYYY/MM/DD H:M" />
                                    @error('appointment_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <h5>Appointment With:</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name <span class="req">*</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" wire:model.defer="first_name" id="first_name" placeholder="First Name" />
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name <span class="req">*</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" wire:model.defer="last_name" id="last_name" placeholder="Last Name" />
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="req">*</span></label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email" id="email" placeholder="Email" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone <span class="req">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model.defer="phone" id="phone" placeholder="Phone" />
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" wire:model.defer="location" id="location" onFocus="initializeAutocomplete('location')" placeholder="Location" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unit_number">Unit Number</label>
                                    <input type="text" class="form-control" wire:model.defer="unit_number" id="unit_number" placeholder="Unit Number" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="comments">Additional Comments</label>
                            <textarea class="form-control" wire:model.defer="comments" id="comments" placeholder="Additional Comments"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="InspectionModal" wire:ignore.self class="modal fade bd-inspection-modal-lg" tabindex="-1" role="dialog" aria-labelledby="InspectionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form wire:submit="saveInspection">
                    <input type="hidden" wire:model.defer="type" value="Inspection">
                    <div class="modal-header">
                        <h5 class="modal-title" id="InspectionModalLongTitle">Schedule Inspection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="appointment_title">Inspection Title <span class="req">*</span></label>
                            <input type="text" class="form-control @error('appointment_title') is-invalid @enderror" wire:model.defer="appointment_title" id="appointment_title" placeholder="Inspection Title" required />
                            @error('appointment_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="property_id">Property <span class="req">*</span></label>
                            <select wire:model.defer="property_id" id="property_id" class="form-control @error('property_id') is-invalid @enderror">
                                <option value="" selected>Select Property</option>
                                @if ($properties)
                                    @foreach ($properties as $property)
                                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('property_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_id">
                                        @if (auth()->user()->hasAllAccess())
                                            Property Manager/Agent
                                        @else
                                            Agent
                                        @endif
                                        <span class="req">*</span>
                                    </label>
                                    <select wire:model.defer="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                        <option value="" selected>Select User</option>
                                        @if ($subscribers)
                                            <optgroup label="Property Managers">
                                                @foreach ($subscribers as $subscriber)
                                                    <option value="{{ $subscriber->user_id }}">{{ $subscriber->userDetails->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                        @if ($agents)
                                            <optgroup label="Property Agents">
                                                @foreach ($agents as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointment_date">Appointment Date <span class="req">*</span></label>
                                    <input type="text" class="form-control datetimepicker @error('appointment_date') is-invalid @enderror" wire:model.defer="appointment_date" id="appointment_date" placeholder="YYYY/MM/DD H:M" />
                                    @error('appointment_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <h5>Inspection With:</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name <span class="req">*</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" wire:model.defer="first_name" id="first_name" placeholder="First Name" />
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name <span class="req">*</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" wire:model.defer="last_name" id="last_name" placeholder="Last Name" />
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="req">*</span></label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email" id="email" placeholder="Email" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone <span class="req">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model.defer="phone" id="phone" placeholder="Phone" />
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="comments">Additional Comments</label>
                            <textarea class="form-control" wire:model.defer="comments" id="comments" placeholder="Additional Comments"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Inspection</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('after-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .popover {
            z-index: 1 !important;
        }
        .popover-header {
            padding-right: 30px;
        }

        .popover-header .close {
            float: right;
            position: absolute;
            top: 10px;
            right: 12px;
        }

        .popover-body p {
            font-size: 13px;
        }

        .popover-body .inline-buttons .btn {
            padding: 7px 15px;
            font-size: 12px;
        }

        .fc-daygrid-event {
            white-space: normal;
            align-items: baseline;
            font-size: 12px;
            line-height: 16px;
            display: block;
            padding: 5px;
        }

        .req {
            color: red;
            font-size: 16px;
            line-height: 16px;
        }

        a.fc-event,
        a.fc-event:hover {
            color: #333
        }

        .fc-daygrid-dot-event {
            background: rgba(2, 255, 57, 0.08);
        }

        .fc-daygrid-dot-event:hover {
            background: rgba(2, 255, 57, 0.18)
        }

        .fc-daygrid-dot-event.fc-event-past {
            background: rgba(255, 0, 0, 0.08);
        }

        .fc-daygrid-dot-event.fc-event-past:hover {
            background: rgba(255, 2, 2, 0.18)
        }

        .fc-daygrid-event-dot {
            border-width: 1px;
            margin: 0 0 5px 0;
            width: 100%;
        }

        .fc-h-event .fc-event-main {
            color: #000;
        }

        .fc .fc-button-group>.fc-button,
        .fc .fc-button-primary {
            text-transform: uppercase;
        }

        a.fc-event {
            cursor: pointer
        }

        .pac-container {
            z-index: 9999999;
        }
    </style>
@endpush

@push('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function initializeAutocomplete(inputId) {
            var input = document.getElementById(inputId);
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                @this.set('location', place.formatted_address);
            });
        }

        jQuery(document).ready(function() {
            'use strict';
            jQuery('#showing_date, .datetimepicker').datetimepicker({
                format: 'Y-m-d H:i',
                step: 15,
                autoclose: true,
                closeOnDateSelect: true,
                onChangeDateTime: function(dp, $input) {
                    @this.set('appointment_date', $input.val());
                }
            });
        });

        $(document).on("click", ".popover .close", function() {
            $(this).parents(".popover").remove();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today addAppointment addInspection',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listMonth'
                },
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: true
                },
                customButtons: {
                    addAppointment: {
                        text: 'Add Appointment',
                        click: function() {
                            $('#AppointmentModal').modal('show');
                            @this.set('type', 'Appointment');
                        }
                    },
                    addInspection: {
                        text: 'Add Inspection',
                        click: function() {
                            $('#InspectionModal').modal('show');
                            @this.set('type', 'Inspection');
                        }
                    }
                },
                loading: function(isLoading) {
                    if (!isLoading) {
                        this.getEvents().forEach(function(e) {
                            if (e.source === null) {
                                e.remove();
                            }
                        });
                    }
                },
                events: function(fetchInfo, successCallback, failureCallback) {
                    @this.set('startDate', fetchInfo.startStr);
                    @this.set('endDate', fetchInfo.endStr);
                    @this.getEvents().then(results => {
                        successCallback(results);
                    });
                },

                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                    if (info.event.url) {
                        //window.open(info.event.url, '_blank');
                    }

                    $('.popover .close').trigger('click');
                    @this.setEvent(info.event, info.event.extendedProps.type);
                    $(info.jsEvent.target).popover({
                        html: true,
                        sanitize: false,
                        title: info.event.title + '<a style="float: right;" role="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></a>',
                        content: info.event.extendedProps.content,
                        // placement: 'top',
                        container: '#calendar'
                    }).popover('show');
                    return false;
                }

            });
            calendar.render();
        });
        Livewire.on('LoadAgents', (data) => {
            data.preventDefault();
            //document.getElementById('testContent').innerHTML = data.options;
            //console.log($("#account_agent").html());
            //$("#account_agent").remove();
            $("select#account_agent").html(data.options);
            console.log(data.options);
        });

        Livewire.on('closeAppointmentPopup', (data) => {
            $('#AppointmentModal').modal('hide');
        });
        Livewire.on('closeInspectionPopup', (data) => {
            $('#InspectionModal').modal('hide');
        });
        Livewire.on('closetooltipPopup', (data) => {
            $('.popover .close').trigger('click');
        });
        Livewire.on('editAppointmentPopup', (data) => {
            const data1 = data[0];
            console.log(data1);
            if (data1.type === 'Appointment') {
                $('#AppointmentModal #appointment_title').val(data1.appointment_title);
                $('#AppointmentModal #user_id').val(data1.user_id);
                $('#AppointmentModal #appointment_date').val(data1.appointment_date);
                $('#AppointmentModal #first_name').val(data1.first_name);
                $('#AppointmentModal #last_name').val(data1.last_name);
                $('#AppointmentModal #email').val(data1.email);
                $('#AppointmentModal #phone').val(data1.phone);
                $('#AppointmentModal #location').val(data1.location);
                $('#AppointmentModal #unit_number').val(data1.unit_number);
                $('#AppointmentModal #comments').val(data1.comments);
                $('#AppointmentModal').modal('show');

            } else if (data1.type === 'Inspection') {
                $('#InspectionModal').modal('show');
                $('#InspectionModal').find('#appointment_title').val(data1.appointment_title);
                $('#InspectionModal').find('#property_id').val(data1.property_id);
                $('#InspectionModal').find('#user_id').val(data1.user_id);
                $('#InspectionModal').find('#appointment_date').val(data1.appointment_date);
                $('#InspectionModal').find('#first_name').val(data1.first_name);
                $('#InspectionModal').find('#last_name').val(data1.last_name);
                $('#InspectionModal').find('#email').val(data1.email);
                $('#InspectionModal').find('#phone').val(data1.phone);
                $('#InspectionModal').find('#comments').val(data1.comments);
            }
        });
    </script>
@endpush
