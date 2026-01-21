@if (isset($subdomain))
@php $layout = 'frontend.layouts.manager'; @endphp
@else
@php $layout = 'frontend.layouts.app'; @endphp
@endif
@extends($layout)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div style="max-width: 650px;margin: 11vh auto;padding:4rem; border:1px solid #eee">
                <h1 class="page-title">{{ @$title }}</h1>
                <hr />
                {!! @$desc !!}
            </div>
        </div>
    </div>
</div>
@endsection
