@extends('frontend.layouts.app')
@section('title', __('Tenancy Application'))
@push('after-styles')
@endpush

@section('content')
<div class="container card shadow-lg bg-body rounded p-5 mt-0">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="panel panel-default page-inner success-msg">
                @if(isset($link_accessible) && $link_accessible == false)
                    <div class="alert alert-danger text-center" role="alert" style="margin: 0rem 0rem 2rem; padding: 2rem;">
                        <h4 class="alert-heading text-capitalize">Link is expired!</h4>
                        <p class="text-capitalize">Sorry! this link is not accessible anymore.</p>
                    </div>
                    <div class="theme_button text-center">
                        <a href="{{ route('frontend.contact') }}" class="btn btn-dark rounded-pill px-4 py-2 border-0 text-uppercase d-inline-block">Schedule your FREE business strategy!</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-scripts')
@endpush
