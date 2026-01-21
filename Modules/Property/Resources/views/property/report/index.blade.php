@extends('backend.layouts.app')

@section('title', __('Properties'))

@push('after-styles')
    <style>
        .table th,
        .table td {
            padding: 0.6rem;
        }

        .table th {
            font-size: 12px;
        }

        .table thead th {
            white-space: nowrap;
        }

        .table.table-striped {
            min-width: 1200px;
        }

        .card-btn {
            background: rgba(0, 0, 0, .1);
            color: #ffffff;
        }

        .fs-18 {
            font-size: 18px
        }

        .card-icon i {
            color: rgba(0, 0, 0, .15);
        }

        .modal-title span {
            color: red;
            font-size: 18px;
        }
    </style>
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @php
        $accountId = request()->accountId != 'undefined' && request()->accountId != '' ? request()->accountId : null;
        $agentId = request()->agentId != 'undefined' && request()->agentId != '' ? request()->agentId : null;
        $status = request()->status != 'undefined' && request()->status != '' ? request()->status : null;
        $from = request()->from != 'undefined' && request()->from != '' ? request()->from : null;
        $to = request()->to != 'undefined' && request()->to != '' ? request()->to : null;
        $dateRange = $from ? $from . ' - ' . $to : '';
    @endphp
    <div x-data="{ currentlyReorderingStatus: false }">
        <livewire:property::performance-report :loggedId="$logged_in_user->id" :accountId="$accountId" :agentId="$agentId" :status="$status" :dateRange="$dateRange" :key="$accountId" />
    </div>
    <x-modal.sendReportModal />
@endsection

@push('after-scripts')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            @if (isset($_GET['from'], $_GET['to']))
                var start = moment("{{ $_GET['from'] }}");
                var end = moment("{{ $_GET['to'] }}");
            @else
                var start = moment("{{ \Carbon\Carbon::now()->subDays(6)->format('m/d/Y') }}");
                var end = moment("{{ \Carbon\Carbon::now()->format('m/d/Y') }}");
            @endif

            function cb(start, end) {
                $('#daterangepicker').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
                var accountId = $("#account_id").val();
                var status = $("#propertyStatus").val();
                var agentId = $("#account_agent").val();
                var dateRange = $('#daterangepicker').val();
                var dateArr = dateRange.split(' - ');
                var from = to = '';
                if (dateRange != '') {
                    var from = dateArr[0];
                    var to = dateArr[1];
                }
                var url = "{{ request()->url() }}?accountId=" + accountId + "&status=" + status + "&agentId=" + agentId + "&from=" + from + "&to=" + to;
                if (url) {
                    window.location = url;
                }
                return false;
            }

            $('#daterangepicker').daterangepicker({
                startDate: start,
                endDate: end,
                locale: {
                    format: 'YYYY-MM-DD',
                    separator: ' - ',
                    applyLabel: 'Apply',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    weekLabel: 'W',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                },
                ranges: {
                    'Today': [moment().startOf('day'), moment().endOf('day')],
                    'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days').endOf('day')],
                    'Last 7 Days': [moment().subtract(6, 'days').startOf('day'), moment().endOf('day')],
                    'Last 30 Days': [moment().subtract(29, 'days').startOf('day'), moment().endOf('day')],
                    'This Month': [moment().startOf('month').startOf('day'), moment().endOf('month').endOf('day')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month').startOf('day'), moment().subtract(1, 'month').endOf('month').endOf('day')]
                },
                opens: 'right',
                showCustomRangeLabel: true,
                alwaysShowCalendars: false,
                autoUpdateInput: true,
            }, cb);
        });
    </script>
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.message,
            });
        });

        window.addEventListener('sendReportModal', event => {
            const property = event.detail[0];
            var dateRange = $('#daterangepicker').val();
            var dateArray = dateRange.split(" - ");
            console.log(property.property_reports);
            if (property.property_reports && property.property_reports.length > 0) {
                status = property.property_reports[property.property_reports.length - 1].property_status;
            } else {
                status = 'For Rent';
            }

            populateModalFields(property, dateArray, status);
            $('#sendReportModal').modal('show');
        });

        function populateModalFields(property, dateArray, status) {
            document.getElementById('propertyId').value = property.id;
            document.getElementById('title').textContent = property.title;

            document.getElementById('propStatus').value = status;
            document.getElementById('propertyUrl').value = property.url
            document.getElementById('fromDate').value = dateArray[0];
            document.getElementById('toDate').value = dateArray[1];

            document.getElementById('start_date').textContent = formatDate(dateArray[0]);
            document.getElementById('end_date').textContent = formatDate(dateArray[1]);

            document.getElementById('applied').value = property.property_report['applied'];
            document.getElementById('applications').value = property.property_report['applications'];
            document.getElementById('showings').value = property.property_report['showings'];
            document.getElementById('people_attended').value = property.property_report['peopleAttended'];
            document.getElementById('asked_questions').value = property.property_report['askedQuestions'];
            document.getElementById('days_on_market').value = property.property_report['daysOnMarket'];
            document.getElementById('views').value = property.property_report['views'];

            document.getElementById('comparable_listings').value = '';
            document.getElementById('rent_board_url').value = property.rentboard;
            document.getElementById('rent_board_enquiries').value = 0;
            document.getElementById('craigslist_url').value = '';
            document.getElementById('craigslist_enquiries').value = 0;
            if (property.form_id) {
                document.getElementById('owner_name').value = property.property_form.fName_1 + ' ' + property.property_form.lName_2;
                document.getElementById('owner_email').value = property.property_form.email_5;
                document.getElementById('owner2_name').value = property.property_form.fName_1_2 + ' ' + property.property_form.lName_2_2;
                document.getElementById('owner2_email').value = property.property_form.email_o2_5;
            }
        }

        function formatDate(dateString) {
            var date = new Date(dateString);
            var months = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            var month = months[date.getMonth()];
            var day = date.getDate();
            var year = date.getFullYear();

            function getDaySuffix(day) {
                if (day > 3 && day < 21) return 'th';
                switch (day % 10) {
                    case 1:
                        return "st";
                    case 2:
                        return "nd";
                    case 3:
                        return "rd";
                    default:
                        return "th";
                }
            }

            var suffix = getDaySuffix(day);
            var formattedDate = `${month} ${day}${suffix} ${year}`;
            return formattedDate;
        }
    </script>
@endpush
