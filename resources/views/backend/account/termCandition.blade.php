@extends('backend.layouts.app')
@section('title', __('Terms & Condition'))
@push('after-styles')
<x-head.tinymce-config />
@endpush
@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Terms & Condition')
    </x-slot>
    <x-slot name="body">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <form action="{{ route(rolebased() .'.termsCondition') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea id="myeditorinstance" name="terms_conditions" placeholder="Terms & Condition">{!! $data['terms_conditions'] ?? '' !!}</textarea>
                    </div>
                </div>
            </div>
            <div class="row px-3 justify-content-end">
                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </x-slot>
</x-backend.card>
@endsection
@push('after-scripts')
@endpush
