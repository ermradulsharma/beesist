@extends('frontend.layouts.app')
@section('title', __('Property Management Application'))
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/pmaform.css') }}">
    <style>
        input[type="text"], input[type="email"]{height: 40px;padding: 0 10px;}
        .form-control{padding: 0px 10px;height: 40px;}
        /* .f1{margin-bottom: 30px;} */
        .form-box {padding: 7% 3% 7% 3%; max-width: 670px; margin: auto;}
        /* .f1-buttons{display: flex; justify-content: space-between; align-items: center; margin-top: 16px;} */
        .btn-previous{color: #FFFFFF;}
        .btn-submit{color: #FFFFFF;}
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="top-content">
                <div class="container">
                    <div class="row">
                        <div class="form-box">
                            <form role="form" action="{{route('pma.pmaRegisterFormSubmit')}}" method="POST" class="f1">
                                @csrf
                                <h3><strong>{{ appName() }} Property Management Agreement</strong></h3>
                                @if(session('response'))
                                <div class="alert alert-success" role="alert" style="margin: 20px;text-align: center;">
                                    <p>{!! session('response') !!}</p>
                                </div>
                                @else
                                <div class="form-group">
                                    <h3 style="border-top: 1px solid #bbb;padding-top: 10px;margin: 10px;clear:both;">Fill Agreement</h3>
                                </div>
                                <div class="f1-steps">
                                    <div class="f1-progress">
                                        <div class="f1-progress-line" data-now-value="50" data-number-of-steps="2" style="width: 50%;"></div>
                                    </div>
                                    <div class="f1-step active">
                                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                        <p>{{ $user_id ? 'Owners' : 'Owner Detail'}}</p>
                                    </div>
                                    <div class="f1-step">
                                        <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                        <p>Owners Presence</p>
                                    </div>
                                    {{-- <div class="f1-step">
                                        <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                                        <p>social</p>
                                    </div> --}}
                                </div>
                                <fieldset>
                                    @if($user_id)
                                        <h4>Number of Owners:</h4>
                                        <div class="form-group">
                                            <label class="sr-only" for="no_of_owners">Select Owners</label>
                                            <select id="no_of_owners" class="form-control" name="owners">
                                                <option value="" selected="selected">-- Select Owners --</option>
                                                <option value="1">1 Owner</option>
                                                <option value="2">2 Owner</option>
                                            </select>
                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                                        </div>
                                    @else
                                        <div class="form-group mb-3" id="fo_fname"><input name="fname" placeholder="First Name..." value="{{ old('fname') }}" class="f1-name form-control" id="fname" type="text"></div>
                                        <div class="form-group mb-3" id="fo_lname"><input name="lname" placeholder="Last Name..." value="{{ old('lname') }}" class="f1-name form-control" id="lname" type="text"></div>
                                        <div class="form-group mb-3" id="fo_email"><input name="email" placeholder="Email..." value="{{ old('email') }}" class="f1-email form-control" id="email" type="email"></div>
                                        <div class="form-group mb-3" id="fo_phone"><input name="phone" placeholder="Phone..." value="{{ old('phone') }}" class="f1-phone form-control" id="fo_phone" type="text"></div>
                                        @if ($errors->has('email') && $errors->first('email') == 'The email has already been taken.')
                                        <p class="text-danger">{{ $errors->first('email') }}<br>Please <a style="color: #ed1c24;font-size: 15px" href="#" title="Login" data-toggle="modal" data-target="#LoginModal">login</a> to your account to fill the Property Management Agreement.</p>
                                        @endif
                                    @endif
                                    <div class="f1-buttons mt-3">
                                        @guest
                                        <!-- <span style="display: inline-block;line-height: 40px;float: left;">Already have an account? <a style="color: #ed1c24;font-size: 15px" href="#" title="Login" data-toggle="modal" data-target="#LoginModal">Login</a></span> -->
                                        @endguest
                                        <button type="button" class="btn btn-warning btn-md btn-next">Next</button>
                                    </div>
                                </fieldset>
                                <fieldset id="step2">
                                    <div class="form-group mb-2">
                                        <label class="sr-only2" for="both_present">Both Owners Present To Sign?</label>
                                        <select id="both_present" class="form-control" name="ap">
                                            <option value="" selected="selected">-- Please Select --</option>
                                            <option value="2">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="Second_Owner_Email">
                                        <label class="sr-only2" for="email2">Second Owner Email</label>
                                        <input name="email2" placeholder="Email..." class="f1-email form-control" id="email2" type="text">
                                    </div>
                                    <div class="f1-buttons d-flex justify-content-between mt-3">
                                        <input type="hidden" name="verify" value="{{ $verify }}">
                                        <input type="hidden" name="account_id" value="{{ $account_id }}">
                                        <button type="button" class="btn btn-warning btn-previous">Previous</button>
                                        <button type="submit" class="btn btn-danger btn-submit">Submit</button>
                                    </div>
                                </fieldset>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-scripts')
<script src='{{ asset("js/pmaForm/particles.min.js") }}'></script>
<script src="{{ asset('js/pmaForm/jquery.backstretch.min.js') }}"></script>
<script src='{{ asset("js/pmaForm/custom.js") }}'></script>
<script>
    $(document).ready(function(){
        $('#no_of_owners').on('change', function(){
            var no_of_owners = $(this).val();
            if(no_of_owners == 1){
                $('#fo_fname').show();
                $('#fo_lname').hide();
                $('#fo_email').hide();
                $('#fo_phone').hide();
            }else if(no_of_owners == 2){
                $('#fo_fname').show();
                $('#fo_lname').show();
                $('#fo_email').show();
                $('#fo_phone').show();
            }
        });
    });
</script>
@endpush
