@extends('backend.layouts.app')

@section('title', __('Add Page'))
@push('after-styles')
    <x-head.tinymce-config />
@endpush
@section('content')

    @if ($page->id)
        <form method="post" action="{{ route('admin.cms.page.update', $page) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="patch">
        @else
            <form method="post" action="{{ route(rolebased().'.cms.page.store', @$page->id) }}" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="card box-primary">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Page Title</label>
                <input class="form-control" name="title" id="title" placeholder="Enter Page Title" value="{{ old('title', @$page->title) }}" type="text">
            </div>
            <div class="form-group">
                <label for="content">Page Description</label>
                <textarea id="myeditorinstance" name="content" placeholder="Page Description">{!! old('content', @$page->content) !!}</textarea>
            </div>
            <div class="form-group">
                <label for="meta_title">SEO Title</label>
                <input class="form-control" name="meta_title" id="meta_title" placeholder="Enter SEO Page Title" value="{{ old('meta_title', @$page->meta_title) }}" type="text">
            </div>
            <div class="form-group">
                <label for="meta_description">SEO Description</label>
                <textarea class="form-control" id="meta_description" rows="4" name="meta_description" placeholder="SEO Description">{{ old('meta_description', @$page->meta_description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="meta_keywords">SEO Keywords</label>
                <input class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter SEO Keywords" value="{{ old('meta_keywords', @$page->meta_keywords) }}" type="text">
            </div>
            @if ($page->id)
                <div class="form-group">
                    <label for="slug">Page Slug</label>
                    <input class="form-control" name="slug" placeholder="Page Slug" id="slug" value="{{ old('slug', @$page->slug) }}" type="text">
                </div>
            @endif

            <div class="form-group">
                <label for="custom_head_script">Custom Head Tag Code</label>
                <textarea class="form-control" name="custom_head_script" id="custom_head_script" placeholder="Custom Head Tag Code">{{ old('custom_head_script', @$page->custom_head_script) }}</textarea>
            </div>

            <div class="form-group">
                <label for="custom_footer_script">Custom Footer Tag Code</label>
                <textarea class="form-control" name="custom_footer_script" id="custom_footer_script" placeholder="Enter SEO Keywords">{{ old('custom_footer_script', @$page->custom_footer_script) }}</textarea>
            </div>

            <hr>
            <h6 class="mb-1">Status</h6>
            <label class="c-switch c-switch-label c-switch-primary">
                <input class="c-switch-input" type="checkbox" {{ old('is_active', @$page->is_active) == 1 ? 'checked' : '' }} value="1" name="is_active" is="is_active">
                <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
            </label>

        </div>
        <div class="card-footer">
            @if ($page->id)
                <button type="submit" class="btn btn-primary">Update</button>
            @else
                <button type="submit" class="btn btn-primary">Submit</button>
            @endif
        </div>
    </div>
    </form>
@endsection
@push('after-scripts')
    <script>
        jQuery(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#title").keyup(function() {
                var Text = $(this).val();
                // $.ajax({
                //     url: "{{ '' }}",
                //     type: "POST",
                //     data: $('#skillbank_update').serialize(),
                //     success: function(response) {
                //         Swal.fire('Updated!', response.flash_success, 'success');
                //     }
                // });
            });
        });
    </script>
@endpush
