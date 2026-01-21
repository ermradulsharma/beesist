@extends('backend.layouts.app')
@section('title', __('Add Page'))
@push('after-styles')
    <x-head.tinymce-email-config />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            padding: 0 22px !important;
        }
    </style>
@endpush
@section('content')
    <form method="post" action="{{ $email_template->id ? route(rolebased().'.cms.emailTemplate.update', $email_template->id) : route('admin.cms.emailTemplate.store', optional($email_template)->id) }}" enctype="multipart/form-data">
        @if($email_template->id)
            @method('patch')
            <input type="hidden" name="form_id" value="{{ $email_template->id }}">
        @endif
        @csrf
        <div class="card box-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" name="title" id="title" placeholder="Enter E-mail Title" value="{{ old('title', @$email_template->title) }}" type="text">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input class="form-control" name="subject" id="subject" placeholder="Enter E-mail Subject" value="{{ old('subject', @$email_template->subject) }}" type="text">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="myeditorinstance" name="content" placeholder="Page Description">{!! old('content', @$email_template->content) !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="scheduled_time">Scheduled Time</label>
                    <input class="form-control" name="scheduled_time" id="scheduled_time" placeholder="Enter Scheduled Time" value="{{ old('scheduled_time', @$email_template->scheduled_time) }}" type="text">
                </div>
                <div class="form-group">
                    <label for="title">Schedule Description</label>
                    <textarea class="form-control" id="schedule_desc" rows="4" name="schedule_desc" placeholder="Enter Schedule Description">{{ old('schedule_desc', @$email_template->schedule_desc) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="title">Command</label>
                    <input class="form-control" name="command" id="command" placeholder="Enter Command" value="{{ old('command', @$email_template->title) }}" type="text">
                </div>
                <div class="form-group">
                    <label for="other_recipients">Other Recipients</label>
                    <select class="form-control" name="other_recipients[]" id="other_recipients" multiple>
                        @foreach ($users as $user)
                        @php
                            $otherRecipients = old('other_recipients', json_decode($email_template->other_reciepients) ?? []);
                            $selected = in_array($user->id, $otherRecipients) ? 'selected' : '';
                        @endphp
                        <option value="{{ $user->id }}" {{ $selected }}> {{ $user->name }} [{{ $user->email }}] ({{ $user->roles->implode('name', ', ') }})</option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role">
                        <option value="" selected disabled>Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ old('role', @$email_template->role) === $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="title">Notify Trigger</label>
                    <input class="form-control" name="notify_trigger" id="notify_trigger" placeholder="Enter Notify Trigger" value="{{ old('notify_trigger', @$email_template->title) }}" type="text">
                </div>
                {{-- <div class="form-group">
                    <label for="meta_title">SEO Title</label>
                    <input class="form-control" name="seo['meta_title']" id="meta_title" placeholder="Enter SEO Title" value="{{ old('meta_title', @$page->meta_title) }}" type="text">
                </div>
                <div class="form-group">
                    <label for="meta_description">SEO Description</label>
                    <textarea class="form-control" id="seo['meta_description']" rows="4" name="meta_description" placeholder="Enter SEO Description">{{ old('meta_description', @$page->meta_description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="meta_keywords">SEO Keywords</label>
                    <input class="form-control" name="seo['meta_keywords']" id="meta_keywords" placeholder="Enter SEO Keywords" value="{{ old('meta_keywords', @$page->meta_keywords) }}" type="text">
                </div>
                <div class="form-group">
                    <label for="custom_head_script">Custom Head Tag Code</label>
                    <textarea class="form-control" name="customScript['custom_head_script']" id="custom_head_script" placeholder="Custom Head Tag Code">{{ old('custom_head_script', @$page->custom_head_script) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="custom_footer_script">Custom Footer Tag Code</label>
                    <textarea class="form-control" name="customScript['custom_footer_script']" id="custom_footer_script" placeholder="Enter SEO Keywords">{{ old('custom_footer_script', @$page->custom_footer_script) }}</textarea>
                </div> --}}

                {{-- <hr> --}}
                <h6 class="mb-1">Status</h6>
                <label class="c-switch c-switch-label c-switch-primary">
                    <input class="c-switch-input" type="checkbox" {{ old('is_active', @$email_template->is_active) == 1 ? 'checked' : '' }} value="1" name="is_active" is="is_active">
                    <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                </label>
            </div>
            <div class="card-footer" style="text-align: end;">
                <button type="submit" class="btn btn-primary">{{ $email_template->id ? 'Update' : 'Submit' }}</button>
            </div>
        </div>
    </form>
@endsection
@push('after-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#other_recipients').select2();
    });
</script>
@endpush
