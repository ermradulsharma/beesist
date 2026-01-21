@extends('backend.layouts.app')
@section('title', $package ? __('Edit Package') : __('Create Package'))
@push('after-styles')
@endpush
@section('content')
<x-backend.card>
    <x-slot name="header">
        <strong>{{ $package ? __('Edit Package') : __('Create Package') }}</strong>
    </x-slot>
    <x-slot name="body">
        @php
        if ($package){
            $route = route(rolebased().'.subscription.packages.update', $package);
        } else {
            $route = route(rolebased().'.subscription.packages.store');
        }
        @endphp
        <form method="POST" id="ScheduleShowing" action="{{ $route }}" enctype="multipart/form-data">
            @if ($package != null)
            @method('PUT')
            @endif
            @csrf
            <div class="form-group row">
                <div class="col-md-2">
                    <label class="required" for="title">{{ __('Package Name') }}</label><span style="color: red">*</span>
                </div>
                <div class="col-md-6">
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', optional($package)->title) }}" required>
                    @if($errors->has('title'))<div class="invalid-feedback">{{ $errors->first('title') }}</div> @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label class="required" for="myeditorinstance">{{ __('Description') }}</label><span style="color: red">*</span> <i class="fa fa-info-circle" aria-hidden="true" title="Description should not exceed 180 characters."></i>
                </div>
                <div class="col-md-6">
                    <textarea name="description" id="myeditorinstance" cols="80" rows="10" maxlength="180" required>{!! old('description', optional($package)->description) !!}</textarea>
                    <div id="charCount"></div>
                    @if($errors->has('description'))<div class="invalid-feedback">{{ $errors->first('description') }}</div> @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label class="required" for="total_property_limit">{{ __('Property Limit') }}</label><span style="color: red">*</span>
                </div>
                <div class="col-md-6">
                    <input class="form-control {{ $errors->has('total_property_limit') ? 'is-invalid' : '' }}" type="number" name="total_property_limit" id="total_property_limit" value="{{ old('total_property_limit', optional($package)->total_property_limit) }}" required>
                    @if($errors->has('total_property_limit'))<div class="invalid-feedback">{{ $errors->first('total_property_limit') }}</div> @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label class="required" for="amount">{{ __('Amount') }}</label><span style="color: red">*</span>
                </div>
                <div class="col-md-6">
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" step="0.01" name="amount" id="amount" value="{{ old('amount', optional($package)->amount) }}" required>
                    @if($errors->has('amount'))<div class="invalid-feedback">{{ $errors->first('amount') }}</div> @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label class="required" for="title">{{ __('Package Services') }}</label><span style="color: red">*</span>
                </div>
                <div class="col-md-6">
                    <select class="form-control select2" name="services[]" multiple required>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ isset($selectedServices) && $selectedServices->contains($service->id) ? 'selected' : '' }}>{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label class="required" for="title">{{ __('Status') }}</label><span style="color: red">*</span>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="status" required>
                        <option value="" selected>Select Status</option>
                        <option value="1" {{ optional($package)->status == '1' ? 'Selected' : '' }}>Enable</option>
                        <option value="0" {{ optional($package)->status == '0' ? 'Selected' : '' }}>Disable</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">{{ __('Save') }}</button>
            </div>
        </form>
    </x-slot>
</x-backend.card>
@endsection
@push('after-scripts')
<script>
    var textArea = document.getElementById('myeditorinstance');
    var charCount = document.getElementById('charCount');
    charCount.textContent = textArea.value.length + ' / 180 characters';
    textArea.addEventListener('input', function() {
        charCount.textContent = textArea.value.length + ' / 180 characters';
    });
</script>
@endpush
