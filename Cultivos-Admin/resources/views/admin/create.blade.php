@extends('layouts.app') 

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endsection 

@section('content')
<h2 class="content-heading">@lang('auth.admin')</h2>

@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'vegetables.store']) !!}
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Create new Admin</h3>
    </div>
    <div class="block-content">
        <form action="be_forms_premade.php" method="post" onsubmit="return false;">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="mega-firstname">Firstname</label>
                            <input type="text" class="form-control form-control-lg" id="firstname" name="firstname" placeholder="Enter your firstname..">
                        </div>
                        <div class="col-6">
                            <label for="mega-lastname">Lastname</label>
                            <input type="text" class="form-control form-control-lg" id="lastname" name="lastname" placeholder="Enter your lastname..">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="mega-lastname">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your username..">
                            </div>
                        </div>
                    </div>
            </div>
            
            <div class="row">
                    <div class="col-md-7">
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="mega-firstname">Password</label>
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your firstname..">
                                </div>
                                <div class="col-6">
                                    <label for="mega-lastname">Confirm Password</label>
                                    <input type="password" class="form-control form-control-lg" id="confirm-password" name="confirm-password" placeholder="Enter your lastname..">
                                </div>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="mega-age">Birth Date</label>
                            <input type="text" class="js-datepicker form-control js-datepicker-enabled" id="birthdate" name="birthdate" data-week-start="1" data-autoclose="true" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12">Gender</label>
                        <div class="col-12">
                            <label class="css-control css-control-primary css-radio mr-10">
                                <input type="radio" class="css-control-input" name="gender-group">
                                <span class="css-control-indicator"></span> Female
                            </label>
                            <label class="css-control css-control-primary css-radio">
                                <input type="radio" class="css-control-input" name="gender-group">
                                <span class="css-control-indicator"></span> Male
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <button type="submit" class="btn btn-alt-primary">
                        <i class="fa fa-check mr-5"></i> Create User
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>  
{!! Form::close() !!}


@endsection

@section('scripts')
    <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        jQuery(function () {
            Codebase.helpers('datepicker');
        });
    </script>
@endsection 