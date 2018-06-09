@extends('layouts.app')
@section('styles')
<link rel="stylesheet" id="css-main" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endsection
@section('content')

<div class="bg-primary-dark-op py-30">
</div>

<div class="content">
    <div class="my-50 text-center">
        <h2 class="font-w700 text-black mb-10">{{$user->getFullNameAttribute()}}</h2>
    </div>
    @include('flash::message')
    
    <div class="block block-fx-shadow">
        <div class="block-content">
            <form action="{{route('user.updateProfile')}}" id="validate-email" method="post">
                @csrf
                {{ method_field('post') }}
                <h2 class="content-heading text-black">Perfil</h2>
                <div class="row items-push">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-email">Correo Electronico</label>
                                <input type="email" class="form-control form-control-lg" id="profile-email" name="profile-email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{route('user.updatePassword')}}" class="js-validation-bootstrap" id="validate-password" method="post">
                @csrf
                <h2 class="content-heading text-black">Cambiar Contraseña</h2>
                <div class="row items-push">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="password-current">Contraseña Actual</label>
                                <input type="password" class="form-control form-control-lg" id="password-current" name="password-current">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="assword-new">Contraseña Nueva</label>
                                <input type="password" class="form-control form-control-lg" id="password-new" name="password-new">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="password-new-confirm">Confirmar Contraseña Nueva</label>
                                <input type="password" class="form-control form-control-lg" id="password-new-confirm" name="password-new-confirm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{route('user.updateInfo')}}" method="post">
                @csrf
                <h2 class="content-heading text-black">Información Personal</h2>
                <div class="row items-push">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="first_name">Nombre</label>
                                <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" value="{{$user->first_name}}">
                            </div>
                            <div class="col-6">
                                <label for="last_name">Apellido</label>
                                <input type="text" class="form-control form-control-lg" id="last_name" name="last_name"  value="{{$user->last_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="birth_date">Fecha de Nacimiento</label>
                                <input type="text" class="js-datepicker form-control js-datepicker-enabled" id="birth_date" name="birth_date" data-week-start="1"
                                    data-autoclose="true" data-today-highlight="true" data-date-format="yyyy/mm/dd"
                                placeholder="yyyy/mm/dd" value="{{$user->birth_date}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12">Género</label>
                            <div class="col-6">
                                <label class="css-control css-control-primary css-radio">
                                    <input type="radio" class="css-control-input" name="gender" value="M" @if($user->gender=="M")checked="checked"@endif required>
                                    <span class="css-control-indicator"></span> Masculino
                                </label>
                                <label class="css-control css-control-primary css-radio mr-10">
                                    <input type="radio" class="css-control-input" name="gender" value="F" @if($user->gender=="F")checked="checked"@endif required>
                                    <span class="css-control-indicator"></span> Femenino
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Actualizar</button>
                            </div>
                        </div>                     
                    </div>
                </div>
            </form>
           
        </div>
    </div>
</div>

@endsection
@section('scripts')
    
    <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script>
        var BeFormValidation = function() {
            // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
            var initValidationBootstrap = function(){
                $('#validate-profile').validate({
                    ignore: [],
                    errorClass: 'invalid-feedback animated fadeInDown',
                    errorElement: 'div',
                    errorPlacement: function(error, e) {
                        jQuery(e).parents('.form-group > div').append(error);
                    },
                    highlight: function(e) {
                        jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
                    },
                    success: function(e) {
                        jQuery(e).closest('.form-group').removeClass('is-invalid');
                        jQuery(e).remove();
                    },
                    rules: {
                        'profile-email': {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        'profile-email': 'Ingrese un correo electrónico válido',
                    }
                });
                $('#validate-password').validate({
                    ignore: [],
                    errorClass: 'invalid-feedback animated fadeInDown',
                    errorElement: 'div',
                    errorPlacement: function(error, e) {
                        jQuery(e).parents('.form-group > div').append(error);
                    },
                    highlight: function(e) {
                        jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
                    },
                    success: function(e) {
                        jQuery(e).closest('.form-group').removeClass('is-invalid');
                        jQuery(e).remove();
                    },
                    rules: {
                        'profile-email': {
                            required: true,
                            email: true
                        },
                        'password-current': {
                            required: true,
                            minlength: 6
                        },
                        'password-new': {
                            required: true,
                            minlength: 6
                        },
                        'password-new-confirm': {
                            required: true,
                            equalTo: '#password-new'
                        }
                    },
                    messages: {
                        'profile-email': 'Ingrese un correo electrónico válido',
                        'password-current': {
                            required: 'Ingrese una contraseña',
                            minlength: 'La contraseña debe tener al menos 6 caracteres'
                        },
                        'password-new': {
                            required: 'Ingrese una contraseña',
                            minlength: 'La contraseña debe tener al menos 6 caracteres'
                        },
                        'password-new-confirm': {
                            required: 'Ingrese una contraseña',
                            minlength: 'La contraseña debe tener al menos 6 caracteres',
                            equalTo: 'Las contraseñas no coinciden'
                        }
                    }
                });
            };
            
            return {
                init: function () {
                    // Init Bootstrap Forms Validation
                    initValidationBootstrap();
                }
            };
    }();
    jQuery(function () {
        BeFormValidation.init();
        $('.js-datepicker').datepicker();
        Codebase.helpers(['datepicker']);
    });
    </script>
@endsection