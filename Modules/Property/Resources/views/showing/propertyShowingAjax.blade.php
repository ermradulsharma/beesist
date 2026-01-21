@if ($form == 'apply_showing')
<form id="apply" method="POST" action="{{ route('properties.applyShowing') }}">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title mb-0" id="ShowingApplicationModalLabel">ATTEND SHOWING:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <h5 style="color:#ffba00;margin: 0;font-weight: 500;">{{ $property->title }}</h5>
        <div id="ScheduleForm">
            @if ($user->name && $user->email)
                <div class="md-form required">
                    <input id="fname" name="fname" value="{{ $user->first_name }}" class="form-control" type="text" required="required">
                    <label for="fname" class="active">First Name</label>
                </div>
                <div class="md-form required">
                    <input id="lname" name="lname" value="{{ $user->last_name }}" class="form-control" type="text" required="required">
                    <label for="lname" class="active">Last Name</label>
                </div>
                <div class="md-form required">
                    <input id="email" name="email" value="{{ $user->email }}" class="form-control" type="email" required="required">
                    <label for="email" class="active">Email</label>
                </div>
                <div class="md-form required">
                    <input id="phone" name="phone" value="{{ $user->phone }}" class="form-control" type="text" required="required">
                    <label for="phone" class="active">Phone</label>
                </div>
                <input name="show_app_id" id="show_app_id" type="hidden" value="{{ $request->showing_id }}">
                <input name="showing_action" id="showing_action" type="hidden" value="reschedule">
            @else
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-2">
                        <input id="fname" name="fname" value="{{ Auth::user()->first_name ?? '' }}" placeholder="First Name" class="form-control" type="text" required="required">
                        <label for="fname">First Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-2">
                        <input id="lname" name="lname" value="{{ Auth::user()->last_name ?? '' }}" placeholder="Last Name" class="form-control" type="text" required="required">
                        <label for="lname">Last Name</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-2">
                        <input id="email" name="email" value="{{ Auth::user()->email ?? '' }}" placeholder="Email" class="form-control" type="email" required="required">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-2">
                        <input id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}" placeholder="Phone" class="form-control" type="text" required="required">
                        <label for="phone">Phone</label>
                    </div>
                </div>
            </div>
            @endif

            <p class="mb-1">Showing time <span style="color:red">*</span> : <span id="date_selected"></span></p>
            <p id="agent_info" class="mb-1" style="color: #333;"></p>
            <p id="showing_note" class="mb-1" style="color: #ffba00;font-style: italic;"></p>
            <strong>Available showing times</strong>
            @if (count($property->property_showing) > 0)
            <ul class="showing_dates">
                @foreach ($property->property_showing as $property_showing)
                @if ($property_showing->status == '1' && $property_showing->limit >
                checkShowLimit($property_showing->id, $property_showing->prop_id))
                <li data-id="{{ $property_showing->id }}" data-value="{{ $property_showing->showing_date }}"
                    data-agent="{{ $property_showing->agent_id }}" data-agentname="{{ $property_showing->agent->name }}"
                    data-agentphone="{{ $property_showing->agent->phone }}"
                    data-comment="{{ $property_showing->comments }}">
                    {{ date_format(date_create($property_showing->showing_date), 'F j, Y, g:i a') }}
                </li>
                @endif
                @endforeach
                @if (count($property->property_showing) > 0)
                <li class="datepicker" id="different_time" data-value="" data-agent="" data-agentname="" data-agentphone="" data-comment="">Schedule Different Time</li>
                @endif
            </ul>

            <div class="form-floating mb-2">
                <select name="showing_type" id="showing_type" class="form-control">
                    <option value="Physical">Physical</option>
                    <option value="Virtual">Virtual</option>
                </select>
                <label id="showing_type" for="showing_type">Showing Type</label>
            </div>

            <div class="form-floating">
                <textarea class="form-control" id="comments" name="comments"
                    placeholder="Place additional comments for this showing (if any)"
                    style="width: 100%; height: 80px;"></textarea>
                <label id="comments_title" for="comments">Additional Comments</label>
            </div>
            @else
            <ul class="showing_dates">
                <p style="color:#ed1c24">We are sorry!<br> There is no showing scheduled at the moment. Please send us message via this form and we will schedule one for you.</p>
                <li class="datepicker" id="different_time" data-value="" data-agent="" data-agentname="" data-agentphone="" data-comment="">Schedule Different Time</li>
            </ul>
            <div class="md-form2">
                <label for="comments">Your Message</label>
                <textarea class="form-control" id="comments" name="comments" placeholder="Your Message" style="width: 100%; height: 80px;padding: 5px;line-height: 20px;"></textarea>
            </div>
            @endif

            <label class="form-check-label" for="disclaimer" style="font-weight: 600;margin-top: 15px;">By submitting
                this request, I have read and agree to the <a onclick="showDisclaimer()"
                    style="color:#ffba00;text-decoration: underline;">terms and conditions</a> and the <a
                    href="{{ url('disclosure-for-residential-tenancies-new') }}" target="_blank"
                    style="color:#ffba00;text-decoration: underline;">Disclosure for residential tenancies</a>.</label>
            <div id="disclaimer_box"
                style="display:none;font-size: 12px;font-weight: 600;margin-bottom: 15px;margin-top: 15px;">
                <strong>NOTE:</strong> IN ORDER TO ATTEND ANY OF THE ABOVE SHOWINGS, FOR YOUR SECURITY AND SECURITY OF
                OUR AGENTS YOU MUST REGISTER BY CLICKING ON "SCHEDULE A SHOWING" OR BY CALLING 855-266-8588. IF YOU DO
                NOT REGISTER YOU WILL NOT BE SHOWN THE PLACE. PLEASE ARRIVE 5 MINUTES EARLY AND TEXT THE LISTED LEASING
                AGENT. DUE TO OUR BUSY SCHEDULE IF YOU ARE LATE WE CANNOT GUARANTEE WE WILL BE ABLE TO SHOW YOU THE
                PLACE AT THIS TIME AND YOU MIGHT NEED TO RESCHEDULE
            </div>
        </div>
        <div id="ApplyFormResponse" style="text-align:center"></div>
    </div>
    <div class="modal-footer" style="text-align: left;">
        <p id="form_valid_msg" class="text-danger"></p>

        <input name="prop_id" id="prop_id" type="hidden" value="{{ $property->id }}">
        <input name="prop_title" id="prop_title" type="hidden" value="{{ $property->title }}">
        <input name="agent_id" id="agent_id" type="hidden">
        <input name="showing_id" id="showing_id" type="hidden">
        <input name="prop_date" id="prop_date" type="hidden">
        <img id="ajax_loader" src="{{ asset('images/loader.svg') }}">
        <button type="submit" name="submit" class="btn btn-warning">REQUEST</button>
    </div>
</form>
<script>
    function showDisclaimer() {
        $("#disclaimer_box").show();
    }
    $(document).ready(function() {
        $('#ajax_loader').hide();
        $("ul.showing_dates li").click(function() {
            $("#different_time_input").remove();
            $("ul.showing_dates li").removeClass("active");
            $(this).addClass("active");
            $("#showing_id").val($(this).data('id'));
            $("#prop_date").val($(this).data('value'));
            $("#agent_id").val($(this).data('agent'));
            $("#date_selected").text($(this).text());
            if ($(this).data('agentname') != '' || $(this).data('agentphone') != '') {
                $("#agent_info").html('<strong>Agent:</strong> ' + $(this).data('agentname') + ', <strong>Agent Phone:</strong> ' + $(this).data('agentphone'));
            } else {
                $("#agent_info").html('');
            }
            var comment = $(this).data('comment');
            if (comment != '') {
                $("#showing_note").text('*' + $(this).data('comment'));
            }
        });
        $("ul.showing_dates li#different_time").click(function() {
            $("#different_time_input").remove();
            $("ul.showing_dates li#different_time").after("<input type='text' name='different_time_input' class='datetimepicker' id='different_time_input' placeholder='YYYY-MM-DD H:M AM'>");
            jQuery(document).ready(function () {
                'use strict';
                jQuery('#different_time_input, .datetimepicker').datetimepicker({
                    format: 'Y-m-d h:i A',
                    formatTime: 'h:i A',
                    step: 1
                });
            });
        });
        $('form#apply').on('submit', function(e) {
            e.preventDefault();
            $('#form_valid_msg').hide();
            var fname = $('#apply #fname').val();
            var lname = $('#apply #lname').val();
            var email = $('#apply #email').val();
            var phone = $('#apply #phone').val();
            var showing_id = $('#apply #showing_id').val();
            var prop_id = $('#apply #prop_id').val();
            var agent_id = $('#apply #agent_id').val();
            var prop_title = $('#apply #prop_title').val();
            var prop_date = $('#apply #prop_date').val();
            var comments = $('#apply #comments').val();
            var different_time = $('#apply #different_time_input').val();
            var disclaimer = $('#apply #disclaimer').val();
            var disclaimer2 = $('#apply #disclaimer2').val();

            if (email == null || email == '') {
                $("#form_valid_msg").html('Error: Email field is required.').show();
                return false;
            }

            if (fname == null || fname == '') {
                $("#form_valid_msg").html('Error: First Name field is required.').show();
                return false;
            }

            if (lname == null || lname == '') {
                $("#form_valid_msg").html('Error: Last Name field is required.').show();
                return false;
            }

            if (phone == null || phone == '') {
                $("#form_valid_msg").html('Error: Phone field is required.').show();
                return false;
            }

            if (prop_date == null || prop_date == '') {
                if (typeof different_time == "undefined") {
                    $("#form_valid_msg").html('Error: Please select a Showing time.').show();
                    return false;
                }
            }
            $('#ajax_loader').show();
            $.ajax({
                method: "POST",
                url: "{{ route('properties.applyShowing') }}",
                data: $('form#apply').serialize(),
                success: function(data) {
                    $('#ApplyFormResponse').html(data);
                    $('#ScheduleForm').hide();
                    $('#ShowingApplicationModal .modal-footer').hide();
                    $('#ajax_loader').hide();
                }
            });
        });
    });
</script>
@endif

@if ($form == 'apply_online')
<form id="apply" method="POST" action="{{ route('property.apply.tenancy') }}">
    @csrf
    <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tenancy Application </h3>
        <h5 style="color:red;margin: 0;font-weight: 500;">Applying For: {{ $property->title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                aria-hidden="true">&times;</span> </button>
    </div>
    <div class="modal-body">
        <div class="form-row">
            <div class="col-12 col-sm-12 col-md-12">
                <div id="ScheduleForm">
                    <div class="md-form required ">
                        <input id="fname" name="fname" value="{{ @extract_name()['first_name'] }}" class="form-control"
                            type="text" required="required">
                        <label for="fname" @if (Auth::check()) class="active" @endif>First Name</label>
                    </div>
                    <div class="md-form required ">
                        <input id="lname" name="lname" value="{{ @extract_name()['last_name'] }}" class="form-control"
                            type="text" required="required">
                        <label for="lname" @if (Auth::check()) class="active" @endif>Last Name</label>
                    </div>
                    <div class="md-form required ">
                        <input id="tenantemail" name="email" value="{{ @Auth::user()->email }}" class="form-control"
                            type="email" required="required">
                        <label for="tenantemail" @if (Auth::check()) class="active" @endif>Email</label>
                    </div>
                    <div class="md-form required ">
                        <input id="phone" name="phone" value="{{ @Auth::user()->phone }}" class="form-control"
                            type="tel" required="required">
                        <label for="phone" @if (Auth::check()) class="active" @endif>Phone</label>
                    </div>
                    <div class="md-form required " style="position:relative">
                        <p id="form_valid_msg" style="color:red"></p>
                    </div>
                </div>
                <div id="ApplyFormResponse" style="text-align:center"></div>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="text-align:left">
        <input name="prop_id" id="prop_id" type="hidden" value="{{ $property->id }}">
        <input name="prop_title" id="prop_title" type="hidden" value="{{ $property->title }}">
        <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Continue</button>
        <img id="ajax_loader" src="{{ url('images/loader.svg') }}">
        <button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>
    </div>
</form>
<script>
    $(document).ready(function() {
            $('#ajax_loader').hide();
            $('form#apply2').on('submit', function(e) {
                $('#ajax_loader').show();
                e.preventDefault();
                var fname = $('#apply #fname').val();
                var lname = $('#apply #lname').val();
                var email = $('#apply #tenantemail').val();
                var phone = $('#apply #phone').val();
                var prop_id = $('#apply #prop_id').val();
                var prop_title = $('#apply #prop_title').val();
                $('#ajax_loader').show();
                $.ajax({
                    method: "POST",
                    url: "{{ route('property.apply.tenancy') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "fname": fname,
                        "lname": lname,
                        "email": email,
                        "phone": phone,
                        "prop_id": prop_id
                    },
                    success: function(data) {
                        $('#ScheduleForm').hide();
                        $('#ajax_loader').hide();
                        //$('.lity-close').trigger( "click" );
                        location.reload();
                        //window.open('https://app.naborly.com/s/leochrenko', '_blank');
                        window.open('https://bolld.managebuilding.com/Resident/apps/rentalapp', '_blank');
                    },
                    async: false
                });
            });
        });
</script>
@endif

@if ($form == 'ask_question')
<form id="askQuestion" method="POST" action="{{ route('properties.applyShowing') }}">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title mb-0" id="ShowingApplicationModalLabel">Ask Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <h5 style="color:#ffba00;margin: 0;font-weight: 500;">For: {{ $property->title }}</h5>
        <div class="form-row">
            <div class="col-12 col-sm-12 col-md-12">
                <div id="askQuestionForm">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input id="fname" name="fname" value="{{ auth()->user()->first_name ?? '' }}"
                                    placeholder="First Name" class="form-control" type="text" required="required">
                                <label for="fname">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input id="lname" name="lname" value="{{ auth()->user()->last_name ?? '' }}"
                                    placeholder="Last Name" class="form-control" type="text" required="required">
                                <label for="lname">Last Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input id="email" name="email" value="{{ auth()->user()->email ?? '' }}"
                                    placeholder="Email" class="form-control" type="email" required="required">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input id="phone" name="phone" value="{{ auth()->user()->phone ?? '' }}"
                                    placeholder="Phone" class="form-control" type="text" required="required">
                                <label for="phone">Phone</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-2">
                        <textarea class="form-control" id="question" name="question" placeholder="Your question"
                            style="height: 100px" required="required"></textarea>
                        <label for="question">Your Question</label>
                    </div>

                    <div class="md-form required " style="position:relative">
                        <p id="form_valid_msg" style="color:red"></p>

                    </div>
                </div>
                <div id="askQuestionResponse" style="text-align:center"></div>
            </div>
        </div>

    </div>
    <div class="modal-footer" style="text-align:left">
        <input name="prop_id" id="prop_id" type="hidden" value="{{ $property->id }}">
        <input name="prop_title" id="prop_title" type="hidden" value="{{ $property->title }}">
        <img id="ajax_loader" src="{{ asset('images/loader.svg') }}">
        <button type="submit" name="submit" class="btn btn-lg btn-warning">Submit</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#ajax_loader').hide();
        $('form#askQuestion').on('submit', function(e) {
            e.preventDefault();
            var fname = $('#askQuestion #fname').val();
            var lname = $('#askQuestion #lname').val();
            var email = $('#askQuestion #email').val();
            var phone = $('#askQuestion #phone').val();
            var prop_id = $('#askQuestion #prop_id').val();
            var prop_title = $('#askQuestion #prop_title').val();
            var question = $('#askQuestion #question').val();
            $('#ajax_loader').show();
            $.ajax({
                method: "POST",
                url: "{{ route('properties.askQuestion') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "fname": fname,
                    "lname": lname,
                    "email": email,
                    "phone": phone,
                    "prop_id": prop_id,
                    "question": question
                },
                success: function(data) {
                    $('#askQuestionForm').hide();
                    $('#ShowingApplicationModal .modal-footer').hide();
                    $('#ajax_loader').hide();

                    $('#askQuestionModalLabel').html('You have asked question');
                    $('#askQuestionResponse').html(data).show();
                },
                //async: false
            });
        });
    });
</script>
@endif
