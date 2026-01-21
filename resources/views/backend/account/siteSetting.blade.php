@extends('backend.layouts.app')
@section('title', __('General Setting'))
@push('after-styles')
    <x-head.tinymce-config />
    <style>
        .input-group-prepend span {
            min-width: 42px;
        }

        :root {}
    </style>
@endpush
@php
    $sections = [
        'header' => [
            'title' => '1. Header',
            'fields' => [['name' => 'Background', 'normal' => '#ffffff', 'hover' => '#ffffff'], ['name' => 'Text', 'normal' => '#000000', 'hover' => '#000000'], ['name' => 'Link', 'normal' => '#007bff', 'hover' => '#007bff']],
        ],
        'button' => [
            'title' => '2. Button',
            'fields' => [['name' => 'Background', 'normal' => '#fddd34', 'hover' => '#000000'], ['name' => 'Text', 'normal' => '#000000', 'hover' => '#ffffff']],
        ],
        'footer' => [
            'title' => '3. Footer',
            'fields' => [['name' => 'Background', 'normal' => '#f8f9fa', 'hover' => '#f8f9fa'], ['name' => 'Text', 'normal' => '#212529', 'hover' => '#212529'], ['name' => 'Link', 'normal' => '#007bff', 'hover' => '#007bff']],
        ],
    ];

    $platforms = [
        'facebook' => 'facebook-f',
        'linkedin' => 'linkedin',
        'instagram' => 'instagram',
        'youtube' => 'youtube',
        'twitter' => 'twitter',
    ];
    if ($data) {
        $faviconPath = isset($data['site']['favicon']) ? public_path('uploads/setting/' . $data['userId'] . '/' . $data['site']['favicon']) : null;
        $faviconImg = $faviconPath && file_exists($faviconPath) ? asset('uploads/setting/' . $data['userId'] . '/' . $data['site']['favicon']) : asset('img/placeholder.jpg');
        $logoPath = isset($data['site']['logo']) ? public_path('uploads/setting/' . $data['userId'] . '/' . $data['site']['logo']) : null;
        $logoImg = $logoPath && file_exists($logoPath) ? asset('uploads/setting/' . $data['userId'] . '/' . $data['site']['logo']) : asset('img/placeholder.jpg');
    } else {
        $faviconImg = $logoImg = asset('img/placeholder.jpg');
    }

@endphp
@section('content')
    <x-backend.card>
        <x-slot name="header">@lang('General Setting')</x-slot>
        <x-slot name="body">
            <form method="POST" action="{{ route(rolebased() . '.generalSetting') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                <div class="row">
                    <div class="col-lg-3 col-md-4 pr-0">
                        <div class="card">
                            <div class="card-body px-2">
                                <div class="row align-items-center">
                                    <div class="square position-relative text-center col-md-3 pr-0">
                                        <img id="licenseImageOutput" title="Preview Image" src="{{ $faviconImg }}" class="img-fluid" alt="Preview Image" width="44" height="44">
                                    </div>
                                    <div class="custom-file col-md-9 pl-2">
                                        <input type="file" class="custom-file-input {{ $errors->has('site.favicon') ? 'is-invalid' : '' }}" id="licenseImage" name="site[favicon]" accept="image/*" hidden>
                                        <label class="btn btn-primary btn-block" for="licenseImage">Site favicon</label>
                                        @if ($errors->has('site.favicon'))
                                            <div class="invalid-feedback">{{ $errors->first('site.favicon') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="square position-relative mb-3 text-center">
                                    <img id="imageProfileOutput" title="Preview Image" src="{{ $logoImg }}" class="img-fluid" alt="Preview Image" width="auto" height="80">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input {{ $errors->has('site.logo') ? 'is-invalid' : '' }}" id="imageProfile" name="site[logo]" accept="image/*" hidden>
                                    <label class="btn btn-primary btn-block" for="imageProfile">Upload Site Logo</label>
                                </div>
                                @if ($errors->has('site.logo'))
                                    <div class="invalid-feedback">{{ $errors->first('site.logo') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" id="site-details">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="required" for="title">{{ __('Site Name') }}</label>
                                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="site[title]" id="title" value="{{ old('title', @$data['site']['title']) }}" placeholder="Site Name" required>
                                            @if ($errors->has('title'))
                                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">{{ trans('Site Description') }}</label>
                                            <textarea id="myeditorinstance" rows="4" style="resize: none; width: 100%" name="site[description]" class="ckeditor form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{!! old('description', @$data['site']['description']) !!}</textarea>
                                            @if ($errors->has('description'))
                                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-0">{{ __('Social Media') }}</h5>
                                <hr class="mt-0">
                                <div class="row" id="social-media">
                                    @foreach ($platforms as $platform => $icon)
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fab fa-{{ $icon }}"></i>
                                                    </span>
                                                </div>
                                                <input type="url" class="form-control {{ $errors->has('social.' . $platform) ? 'is-invalid' : '' }}" value="{{ old('social.' . $platform, @$data['social'][$platform]) }}" name="social[{{ $platform }}]" id="{{ $platform }}" aria-label="{{ ucfirst($platform) }}" aria-describedby="{{ $platform }}">
                                                @if ($errors->has('social.' . $platform))
                                                    <div class="invalid-feedback">{{ $errors->first('social.' . $platform) }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <h5 class="mb-0">{{ __('Bussiness Contact') }}</h5>
                                <hr class="mt-0">
                                <div class="row" id="bussiness-contact">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-marked"></i>
                                                </span>
                                            </div>
                                            <input class="form-control {{ $errors->has('bussiness.address') ? 'is-invalid' : '' }}" type="text" value="{{ old('bussiness.address', @$data['bussiness']['address']) }}" name="bussiness[address]" id="address" onclick="initAutocomplete(this.id)" placeholder="Enter Address" aria-label="address" aria-describedby="Address">
                                            @if ($errors->has('bussiness.address'))
                                                <div class="invalid-feedback">{{ $errors->first('bussiness.address') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-globe"></i>
                                                </span>
                                            </div>
                                            <input class="form-control {{ $errors->has('bussiness.website') ? 'is-invalid' : '' }}" type="text" value="{{ old('bussiness.website', @$data['bussiness']['website']) }}" name="bussiness[website]" id="website" placeholder="Enter website" aria-label="website" aria-describedby="Website">
                                            @if ($errors->has('bussiness.website'))
                                                <div class="invalid-feedback">{{ $errors->first('bussiness.website') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-phone-alt"></i>
                                                </span>
                                            </div>
                                            <input class="form-control {{ $errors->has('bussiness.phone') ? 'is-invalid' : '' }}" type="tel" value="{{ old('bussiness.phone', @$data['bussiness']['phone']) }}" name="bussiness[phone]" id="phone" placeholder="Enter Phone" aria-label="phone" aria-describedby="basic-addon1">
                                            @if ($errors->has('bussiness.phone'))
                                                <div class="invalid-feedback">{{ $errors->first('bussiness.phone') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control {{ $errors->has('bussiness.email') ? 'is-invalid' : '' }}" value="{{ old('bussiness.email', @$data['bussiness']['email']) }}" name="bussiness[email]" placeholder="Enter E-mail" aria-label="email" aria-describedby="basic-addon1">
                                            @if ($errors->has('bussiness.email'))
                                                <div class="invalid-feedback">{{ $errors->first('bussiness.email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-0">{{ __('Color Schema') }}</h5>
                                <hr class="mt-0">
                                <div class="row" id="color-schema">
                                    <div class="col-md-12">
                                        @foreach ($sections as $key => $section)
                                            <div class="form-group">
                                                <label class="form-label mb-2">{{ __($section['title']) }}</label>
                                                @foreach ($section['fields'] as $field)
                                                    <div class="form-check d-flex align-items-center justify-content-between mb-3">
                                                        <label class="form-check-label col-md-3" for="{{ $key }}-{{ strtolower($field['name']) }}-normal">{{ $field['name'] }}</label>
                                                        <input type="color" class="form-control col-md-4" name="{{ $key }}[normal][{{ strtolower($field['name']) }}]" id="{{ $key }}-{{ strtolower($field['name']) }}-normal" value="{{ old($key . '.normal.' . strtolower($field['name']), $data[$key]['normal'][strtolower($field['name'])] ?? $field['normal']) }}">
                                                        <input type="color" class="form-control col-md-4" name="{{ $key }}[hover][{{ strtolower($field['name']) }}]" id="{{ $key }}-{{ strtolower($field['name']) }}-hover" value="{{ old($key . '.hover.' . strtolower($field['name']), $data[$key]['hover'][strtolower($field['name'])] ?? $field['hover']) }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <h5 class="mb-0">{{ __('Footer Section') }}</h5>
                                <hr class="mt-0">
                                <div class="row" id="footer-section">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="whySection">{{ __('About') }}</label>
                                            <textarea name="footer[why_section]" class="form-control {{ $errors->has('footer.whySection') ? 'is-invalid' : '' }}" rows="4" style="resize: none; width: 100%">{{ old('footer.why_section', @$data['footer']['why_section']) }}</textarea>
                                            @if ($errors->has('footer.whySection'))
                                                <div class="invalid-feedback">{{ $errors->first('footer.whySection') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="copyRightText">{{ __('Copyright Text') }}</label>
                                            <input name="footer[copy_right_text]" class="form-control {{ $errors->has('footer.copy_right_text') ? 'is-invalid' : '' }}" value="{{ old('footer.copy_right_text', @$data['footer']['copy_right_text']) }}">
                                            @if ($errors->has('footer.copy_right_text'))
                                                <div class="invalid-feedback">{{ $errors->first('footer.copy_right_text') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-0">{{ __('Search Engine Snippets') }}</h5>
                                <hr class="mt-0">
                                <div class="row" id="search-engine">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="metatitle">{{ __('Meta Title') }}</label>
                                            <input class="form-control {{ $errors->has('seo.metatitle') ? 'is-invalid' : '' }}" type="text" name="seo[metatitle]" id="metatitle" value="{{ old('seo.metatitle', @$data['seo']['metatitle']) }}">
                                            @if ($errors->has('seo.metatitle'))
                                                <div class="invalid-feedback">{{ $errors->first('seo.metatitle') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="metatitle">{{ __('Meta Keywords') }}</label>
                                            <input class="form-control {{ $errors->has('seo.metakeyword') ? 'is-invalid' : '' }}" type="text" name="seo[metakeyword]" id="metakeyword" value="{{ old('seo.metakeyword', @$data['seo']['metakeyword']) }}">
                                            @if ($errors->has('seo.metakeyword'))
                                                <div class="invalid-feedback">{{ $errors->first('seo.metakeyword') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="metadescription">{{ __('Meta Description') }}</label>
                                            <textarea name="seo[metadescription]" class="form-control {{ $errors->has('seo.metadescription') ? 'is-invalid' : '' }}" rows="4" style="resize: none; width: 100%">{{ old('seo.metadescription', @$data['seo']['metadescription']) }}</textarea>
                                            @if ($errors->has('seo.metadescription'))
                                                <div class="invalid-feedback">{{ $errors->first('seo.metadescription') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-end">
                                    <button class="btn btn-success" type="submit">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-backend.card>
@endsection
@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('#imageProfile').change(function() {
                previewImage(this, '#imageProfileOutput');
            });

            $('#licenseImage').change(function() {
                previewImage(this, '#licenseImageOutput');
            });

            function previewImage(input, target) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(target).attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
    <script>
        function initAutocomplete(id) {
            var autocomplete = new google.maps.places.Autocomplete(document.getElementById(id));
            autocomplete.setComponentRestrictions({
                'country': ['ca', 'us']
            });
        }
    </script>
@endpush
