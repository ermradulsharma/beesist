<div>
    <select wire:model="account_id" class="form-control" wire:change='getEvents'>
        <option value="#">Filter</option>
        <option value="132">Speed</option>
    </select>
    <div wire:ignore id="calendar"></div>
</div>
@push('after-styles')
    <style>
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
    </style>
@endpush

@push('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script>
        $(document).on("click", ".popover .close", function() {
            $(this).parents(".popover").remove();
        });
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listMonth'
                },
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: true
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
                        console.log(results);
                        successCallback(results);
                    });
                },

                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                    if (info.event.url) {
                        //window.open(info.event.url, '_blank');
                    }

                    $('.popover .close').trigger('click');
                    @this.setEvent(info.event);

                    $(info.jsEvent.target).popover({
                        html: true,
                        sanitize: false,
                        title: info.event.title + '<a style="float: right;" role="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></a>',
                        content: '<div><strong>Showing Date:</strong> ' + info.event.start + '</div><div><strong>Agent:</strong> ' + info.event.extendedProps.agent + '</div><div><strong>Showing Type:</strong> ' + info.event.extendedProps.type + '</div><blockquote>' + info.event.extendedProps.content + '</blockquote><div class="inline-buttons"><a href="' + info.event.url + '" target="_blank" data-aos="fade-up" data-aos-duration="1000" class="btn btn-primary">View Details</a></div>',
                        // placement: 'top',
                        container: '#calendar'
                    }).popover('show');
                    return false;
                }

            });
            calendar.render();
        });
    </script>
@endpush
