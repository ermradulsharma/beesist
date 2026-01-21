@extends('backend.layouts.app')
@section('title', __('Property Questions'))
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
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">@lang('Property Questions')</x-slot>
        <x-slot name="body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div x-data="{ currentlyReorderingStatus: false }">
                <livewire:property::property-question-table account_id='{{ Auth::user()->id }}' />
            </div>
        </x-slot>
    </x-backend.card>
    <x-modal.answerModal />
@endsection

@push('after-scripts')
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.message,
            });
        });

        window.addEventListener('openAnsweModal', event => {
            const question = event.detail[0];
            console.log(question);
            populateModalFields(question);
            $('#answerModal').modal('show');
        });

        function populateModalFields(question) {
            document.getElementById('questionName').textContent = question.tenant.name;
            document.getElementById('questionEmail').textContent = question.tenant.email;
            document.getElementById('questionPhone').textContent = question.tenant.phone;
            document.getElementById('questionProperty').textContent = question.property.title;
            document.getElementById('Question').textContent = question.question;
            document.getElementById('questionId').value = question.id;
            if (question.answer) {
                document.getElementById('answer').textContent = question.answer;
            }

        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('form#answerQuestion').on('submit', function(event) {
                event.preventDefault();
                const questionId = $('#answerQuestion #questionId').val();
                const answer = $('#answerQuestion #answer').val();
                $('#ajax_loader').show();
                $.ajax({
                    method: "POST",
                    url: "{{ route(rolebased() . '.showings.answerQuestion') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "question_id": questionId,
                        "answer": answer
                    },
                    success: function(data) {
                        $('#answerModal').modal('hide');
                        $('#' + questionId + ' .status').html('<i class="text-green fa fa-fw fa-circle" data-toggle="tooltip" title="Answered"></i>');
                    },
                    complete: function() {
                        $('#ajax_loader').hide();
                    }
                });
            });
        });
    </script>
@endpush
