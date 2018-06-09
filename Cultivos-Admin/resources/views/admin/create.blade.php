@extends('layouts.app') 

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endsection 

@section('content')
<h2 class="content-heading">@lang('auth.admin')</h2>

@include('adminlte-templates::common.errors')
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Create new Admin</h3>
    </div>
    <div class="block-content">
        <form action="{{route('admin.store')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="mega-first_name">Nombre</label>
                            <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" placeholder="Enter your firstname..">
                        </div>
                        <div class="col-6">
                            <label for="mega-last_name">Apellidos</label>
                            <input type="text" class="form-control form-control-lg" id="last_name" name="last_name" placeholder="Enter your lastname..">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="mega-lastname">Email</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                required> @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
            </div>
            
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="mega-firstname">Contraseña</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your firstname..">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="mega-age">Birth Date</label>
                            <input type="text" class="js-datepicker form-control js-datepicker-enabled" id="birth_date" name="birth_date" data-week-start="1"
                            data-autoclose="true" data-today-highlight="true" data-date-format="mm/dd/yy"
                            placeholder="mm/dd/yy">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12">Gender</label>
                        <div class="col-12">
                            <label class="css-control css-control-primary css-radio mr-10">
                                <input type="radio" class="css-control-input" name="gender-group" value="F">
                                <span class="css-control-indicator"></span> Female
                            </label>
                            <label class="css-control css-control-primary css-radio">
                                <input type="radio" class="css-control-input" name="gender-group" value="M">
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


@endsection

@section('scripts')
    <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        jQuery(function () {
            $('.js-datepicker').datepicker();
            Codebase.helpers('datepicker');
        });
    </script>
    <script src="{{ asset('js/pages/be_forms_validation.js') }}"></script>
@endsection 