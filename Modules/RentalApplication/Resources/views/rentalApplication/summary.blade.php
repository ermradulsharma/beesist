@extends('backend.layouts.app')
@section('title', __('Leasing Summary'))
@push('after-styles')
<style>
    .nav-tabs .nav-link.active,
    .nav-tabs .nav-item.show .nav-link {
        color: #000000 !important;
        background-color: transparent !important;
    }

    .nav-tabs-custom ul.nav-tabs li.nav-item a {
        color: #999999
    }

    .card-header .card-title,
    .card-header>.fa,
    .box-header>.glyphicon,
    .box-header>.ion {
        display: inline-block;
        font-size: 18px;
        margin: 0;
        line-height: 1;
    }

    .box-body {
        padding: 10px;
        border-radius: 0 0 3px 3px;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Source Sans Pro', sans-serif;
    }

    .h4,
    h4 {
        font-size: 18px;
    }

    .clearfix button {
        font-size: 0.8rem
    }

    .property-info__image {
        height: 96px;
        width: 120px;
        -o-object-fit: cover;
        object-fit: cover;
        border-radius: 4px;
    }

    .listing-info-card {
        cursor: pointer;
        display: flex;
        width: 100%;
        min-height: 120px;
        border: 1px solid #E2E2E2;
        border-radius: 5px;
        padding: 12px;
        justify-content: space-between;
        align-items: center;
    }

    .listing-info-card__property-info {
        display: flex;
        align-items: center;
    }

    .listing-info-card__lease-info {
        text-align: right;
        letter-spacing: 0;
        line-height: 18px;
    }

    .property-info__details {
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 18px;
        color: #999999;
        padding-left: 20px;
    }

    .details__building-name {
        font-size: 16px;
        font-weight: 600;
        letter-spacing: 0;
        color: #191919;
        margin-bottom: 7px;
    }

    .applicant-info p,
    .listing-info-card p {
        margin: 2px;
        line-height: 1.5;
        font-size: 13px;
        font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .applicant-info p strong,
    .listing-info-card p strong {
        display: inline-block;
        width: 200px;
        font-size: 14px;
        font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .app_section_content div.listing-info-card {
        display: block !important;
        min-height: auto !important;
    }

    .img-reference img {
        height: 100%;
        width: 100%;
        max-width: 306px;
    }

    .screening {
        text-align: center;
        padding: 20px;
        font-size: 14px;
        margin-bottom: 0;
    }

    #screening_questions {
        padding: 0;
        list-style: none;
    }

    #screening_questions li {
        background: #eaeaea;
        padding: 5px 10px;
        margin: 3px 0;
        display: flex;
        align-items: flex-start;
    }

    .screened_by {
        flex: 1;
        text-align: right;
        font-style: italic;
        color: #666;
    }

    .completed label {
        text-decoration: line-through;
        color: #666
    }

    li i.fa-pencil-alt,
    li i.fa-times {
        padding: 0 15px;
        line-height: 24px;
        visibility: hidden;
        cursor: pointer;
    }

    li:not(.completed):hover i.fa-pencil-alt,
    li:not(.completed):hover i.fa-times {
        visibility: visible
    }

    #screening_questions label {
        margin-left: 7px;
    }

    #screening_questions label[contenteditable="true"] {
        background-color: rgba(217, 245, 255, 0.5);
        padding: 3px 20px 3px 10px;
        border: 1px solid #bbb;
        border-radius: 4px
    }

    .contact-box {
        box-shadow: 0 0px 1px rgba(0, 0, 0, 0.3);
        padding: 10px;
        border-radius: 3px;
        margin-bottom: 10px
    }

    .reviewer_answer {
        border: 1px solid #d5d5d5;
        padding: 5px 10px;
        border-radius: 0px;
        margin-bottom: 15px;
        margin-top: -3px
    }

    .mt-10 {
        margin-top: 10px;
    }
    .questionType {
        /* border: 1px solid #eaeaea; */
        font-weight: 700;
        font-size: 18px;
        background: #FFFFFF !important;
        /* border-radius: 6px; */
    }
</style>
@endpush
@push('after-styles')

@endpush
@section('content')
<x-backend.card>
    <x-slot name="header">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link {{ $rental_application->status != 0 ? 'active' : '' }}" href="#summary-tab" data-toggle="tab">Summary</a></li>
                <li class="nav-item"><a class="nav-link {{ $rental_application->status == 0 ? 'active' : '' }}" href="#application-tab" data-toggle="tab">Application</a></li>
                <li class="nav-item"><a class="nav-link" href="#screening-tab" data-toggle="tab">Screening</a></li>
            </ul>
            <div class="tab-content">
                <div id="summary-tab" class="tab-pane {{ $rental_application->status != 0 ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-md-9 pt-2">
                            @if (Auth::user()->hasAnyRole(['Administrator', 'Property Manager']))
                                <div id="status_update_msg" role="alert" class="alert alert-success" style="margin-bottom:15px;display:none">
                                    <div></div>
                                </div>
                                <select name="status" id="status" class="form-control mb-2" style="max-width:250px;">
                                    @php
                                        $labels = ['Draft', 'New', 'Approved', 'Rejected', 'Canceled', 'Undecided', 'Deferred', 'Added to lease'];
                                    @endphp
                                    @foreach($labels as $key => $value)
                                        <option value="{{ $key }}" {{ $rental_application->status == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            @endif
                            <ul id="screening_questions">
                                @forelse ($screening_questions as $question)
                                @if (in_array($question->question_type, ['landlord', 'employer']))
                                    <div class="{{ $question->question_type == 'landlord' ? 'landlord' : 'employer' }} ml-4">
                                @endif
                                <li class="{{ $question->answer == 1 ? 'completed' : '' }}">
                                    <input type="checkbox" name="question" value="{{ $question->id }}" {{ $question->answer == 1 ? 'checked' : '' }}>
                                    <label>{{ $question->question }}</label>
                                    <i class="fa fa-pencil-alt edit-icon" data-question="{{ $question->id }}"></i>
                                    <span class="screened_by">{{ $question->screening_user ? $question->screening_user->name . ' at ' . $question->updated_at : '' }}</span>
                                    <i class="fas fa-times delete-icon" data-question="{{ $question->id }}"></i>
                                </li>
                                @if ($question->answer_guest)
                                    <div class="reviewer_answer"><em>Reviewer Answer: {{ $question->answer_guest }}</em></div>
                                @endif
                                @if (in_array($question->question_type, ['landlord', 'employer']))
                                    </div>
                                @endif
                                @empty
                                <li>No screening questions found.</li>
                                @endforelse
                            </ul>
                            {{-- <ul id="screening_questions">
                                @forelse ($groupedQuestions as $type => $questions)
                                    <li class="question_type_header my-2 p-2 questionType">{{ $type == 'other' ? 'Manager' : ($type == 'landlord' ? 'Landlord' : 'Employer') }}</li>
                                    @foreach ($questions as $question)
                                        <li class="{{ $question->answer == 1 ? 'completed' : '' }}">
                                            <input type="checkbox" name="question" value="{{ $question->id }}" {{ $question->answer == 1 ? 'checked' : '' }}>
                                            <label>{{ $question->question }}</label>
                                            <i class="fa fa-pencil-alt edit-icon" data-question="{{ $question->id }}"></i>
                                            <span class="screened_by">{{ $question->screening_user ? $question->screening_user->name . ' at ' . $question->updated_at : '' }}</span>
                                            <i class="fas fa-times delete-icon" data-question="{{ $question->id }}"></i>
                                        </li>
                                        @if ($question->answer_guest)
                                            <div class="reviewer_answer"><em>Reviewer Answer: {{ $question->answer_guest }}</em></div>
                                        @endif
                                    @endforeach
                                @empty
                                    <li>No screening questions found.</li>
                                @endforelse
                            </ul> --}}
                        </div>
                        <div class="col-md-3 pt-2 px-1">
                            <div class="card card-primary">
                                <div class="card-header p-2">
                                    <i class="fa fa-user"></i>
                                    <h3 class="card-title text-uppercase">Applicant</h3>
                                </div>
                                <div class="card-body p-2">
                                    <h4>{{ $rental_application->first_name }} {{ $rental_application->last_name }}</h4>
                                    <p><i class="fa fa-phone"></i> {{ $rental_application->phone }}</p>
                                    <p><i class="fa fa-envelope"></i> {{ $rental_application->email }}</p>
                                </div>
                            </div>

                            <div class="card card-primary">
                                <div class="card-header"> <i class="fa fa-user"></i>
                                    <h3 class="card-title text-uppercase">Current Landlord</h3>
                                </div>
                                <div class="card-body p-2">
                                    @foreach ($rental_histories as $rental)
                                        <div class="contact-box">
                                            <h4 style="border-bottom:1px solid #dbdbdb;padding-bottom: 12px;margin-top: 0px;">{{ $rental->landlord_first_name }} {{ $rental->landlord_last_name }}</h4>
                                            <p>
                                                <i class="fa fa-home"></i> {{ $rental->street_address }}, {{ $rental->city }}, {{ $rental->zip_code }}, {{ $rental->state }} - {{ $rental->country }}<br>
                                                <i class="fa fa-calendar"></i> Tenancy from {{ $rental->rental_start_date }} to {{ $rental->rental_end_date }}<br>
                                                <i class="fa fa-envelope"></i> {{ $rental->landlord_email }}<br>
                                                <i class="fa fa-phone"></i> {{ $rental->landlord_phone }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($rental_application->status != 0)
                                <div class="card-footer clearfix text-center p-2">
                                    <button type="submit" class="btn btn-primary" id="Landlord_Verification_BTN" data-type="landlord" data-link="{{ route(rolebased() .'.rental_application.sendRentaApplicationVerification',['type' => 'landlord']) }}">Send Landlord Verification  <i class="fa fa-arrow-circle-right"></i></button>
                                    <div class="alert alert-success mt-10" style="display:none"></div>
                                </div>
                                @endif
                            </div>

                            <div class="card card-primary">
                                <div class="card-header"> <i class="fa fa-user"></i>
                                    <h3 class="card-title text-uppercase">Employer</h3>
                                </div>
                                <div class="card-body p-2">
                                    @foreach ($employments as $employment)
                                        <div class="contact-box">
                                            <h4 style="border-bottom:1px solid #dbdbdb;padding-bottom: 12px;margin-top: 0px;">{{ $employment->name }}</h4>
                                            <p>
                                                <i class="fa fa-home"></i> {{ $employment->street_address }}, {{ $employment->city }}, {{ $employment->zip_code }}, {{ $employment->state }} - {{ $employment->country }}<br>
                                                <i class="fa fa-calendar"></i> Employment from {{ $employment->start_date }} to {{ $employment->end_date }}<br>
                                                <i class="fa fa-envelope"></i> {{ $employment->employer_email }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($rental_application->status != 0)
                                    <div class="card-footer clearfix text-center p-2">
                                        <button type="submit" class="btn btn-primary" id="Employer_Verification_BTN" data-type="employer" data-link="{{ route(rolebased() .'.rental_application.sendRentaApplicationVerification',['type' => 'employer']) }}">Send Employer Verification <i class="fa fa-arrow-circle-right"></i></button>
                                        <div class="alert alert-success mt-10" style="display:none"></div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div id="application-tab" class="tab-pane {{ $rental_application->status == 0 ? 'active' : '' }}">
                    <form id="rental_application_apply" method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        @include('rentalapplication::layouts._applicationPreview')
                        <div class="card-footer text-right noprint" data-html2canvas-ignore="true">
                            <button type="button" id="form_print" class="btn btn-danger" onclick="pdf()">Print payment
                                slip & confirmation</button>
                        </div>
                    </form>
                </div>
                <div id="screening-tab" class="tab-pane">
                    <h1 class="screening">No More Screening</h1>
                </div>
            </div>
        </div>
    </x-slot>
</x-backend.card>
@endsection
@push('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    function pdf() {
        const { jsPDF } = window.jspdf;
        let srcwidth = document.getElementById('rental_application_apply').scrollWidth;
        let doc = new jsPDF('p', 'pt', 'a4');
        let pdfjs = document.querySelector('#rental_application_apply');
        doc.html(pdfjs, {
            html2canvas: {
                scale: 600 / (srcwidth + 60),
                dpi: 300,
            },
            callback: function(doc) {
                doc.save("rental-application.pdf");
            },
            x: 12,
            y: 12
        });
    }
</script>

<script>
    $(document).ready(function(){
        $('.nav-tabs a').click(function(e){
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>

<script>
    $("select#status").on("change", function() {
        $.ajax({
            method: "POST",
            url: "{{ route(rolebased() .'.rental_application.submitScreeningQuestion') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "app_id": {{ $rental_application->id }},
                "status": $(this).val(),
                "request_type": 'status_change'
            },
            success: function(data) {
                toastAlert('success', data.msg);
                $("#status_update_msg div").html(data.msg);
                $("#status_update_msg").html(data.msg).show();
            }
        });
    });

    $('#screening_questions li input').click(function() {
        var item = $(this);
        var question = item.val();
        if (item.is(':checked')) {
            var checked = true;
            var class_add = 'completed';
            var class_remove = '';
        } else {
            var checked = false;
            var class_add = '';
            var class_remove = 'completed';
        }
        $.ajax({
            method: "POST",
            url: "{{ route(rolebased().'.rental_application.submitScreeningQuestion') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "question": question,
                "checked": checked
            },
            success: function(data) {
                item.parent('li').addClass(class_add).removeClass(class_remove);
                item.parent('li').find('span.screened_by').text(data.screened_by);
            }
        });
    });

    $('li i.fa-pencil-alt').click(function() {
        var item = $(this);
        var question = item.data('question');
        var current_content = item.parent('li').find('label').text();
        item.parent('li').find('label').attr('contenteditable', 'true');
        item.hide();
        item.parent('li').find('label').on('blur', function() {
            var editedContent = $(this).text();
            if (JSON.stringify(current_content) != JSON.stringify(editedContent)) {
                $.ajax({
                    method: "POST",
                    url: "{{ route(rolebased().'.rental_application.submitScreeningQuestion') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "question": question,
                        "newQuestion": editedContent
                    },
                    success: function(data) {
                        toastAlert('success', data.msg);
                        item.parent('li').find('label').attr('contenteditable', 'false');
                        item.show();
                    }
                });
            }
            item.parent('li').find('label').attr('contenteditable', 'false');
            item.show();
        });
    });

    $('li i.fa-times').click(function() {
        var item = $(this);
        var question = item.data('question');
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                method: "POST",
                url: "{{ route(rolebased().'.rental_application.submitScreeningQuestion') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "question": question,
                    "request_type": 'remove'
                },
                success: function(data) {
                    item.parent('li').remove();
                }
            });
        } else {
            return false;
        }
    });
</script>
<script>
    $('#Landlord_Verification_BTN, #Employer_Verification_BTN').click(function() {
        var item = $(this);
        var url = item.data('link');
        var type = item.data('type');
        console.log('url', url);
        $.ajax({
            method: "POST",
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                "appId": {{ $rental_application->id }},
                "type":type
            },
            success: function(data) {
                if (data.success == true) {
                    toastAlert('success', data.msg);
                    item.parent().find('div.alert').text(data.msg).removeClass('alert-danger').addClass('alert-success').show();

                } else {
                    toastAlert('error', data.msg);
                    item.parent().find('div.alert').text(data.msg).addClass('alert-danger').removeClass('alert-success').show();
                }

            }
        });
    });
</script>
@endpush
