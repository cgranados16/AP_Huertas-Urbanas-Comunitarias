<!doctype html>
<!--[if lte IE 9]>         <html lang="en" class="lt-ie10 lt-ie10-msg no-focus"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en" class="no-focus">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>CultivosCR</title>

    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/img/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon-180x180.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" id="css-main" href="{{ asset('css/codebase.min.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('css/themes/flat.min.css') }}"> 
    <link rel="stylesheet" id="css-main" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
</head>


<body>
    <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed page-header-glass page-header-inverse main-content-boxed">
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="content-header-section">
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="{{ url('home') }}">
                            <i class="si si-fire text-primary"></i>
                            <span class="d-none d-md-inline-block">
                                <span class="font-size-xl text-dual-primary-dark">Cultivos</span>
                                <span class="font-size-xl text-primary">CR</span>
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-rounded btn-dual-secondary" data-toggle="layout" data-action="header_search_on">
                        <i class="fa fa-search mr-5"></i> Buscar
                    </button>
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="content-header-section">
                    <ul class="nav-main-header">
                        <li>
                            <a href="{{ url('home') }}">
                                <i class="fa fa-home"></i> Inicio
                            </a>
                        </li>
                        <li>
                            <a href="map">
                                <i class="si si-rocket"></i> Explorar
                            </a>
                        </li>
                        <li>
                            <a href="u-catalog-home.html">
                                <i class="fa fa-shopping-basket"></i> Productos
                            </a>
                        </li>
                        @auth @else
                        <li>
                            <a href="{{ url('/login') }}">
                                Iniciar Sesión
                            </a>
                        </li>
                        @endif
                    </ul>
                    <!-- User Dropdown -->
                    @auth
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {!! Auth::user()->getFullNameAttribute() !!}
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                            <a class="dropdown-item" href="start_backend.html">
                                <i class="si si-user mr-5"></i> Mi perfil
                            </a>
                            <a class="dropdown-item" href="start_backend.html">
                                <i class="fa fa-star mr-5"></i> Mis favoritos
                            </a>
                            <div class="dropdown-divider"></div>
                            <!-- Toggle Side Overlay -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                <i class="si si-wrench mr-5"></i> Ajustes
                            </a>
                            <!-- END Side Overlay -->

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item">
                                <a href="{!! url('/logout') !!}" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="si si-logout mr-5"></i> Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </div>
                    </div>
                   
                    @endif
                    <!-- END User Dropdown -->
                </div>
                <!-- END Right Section -->
            </div>
            <div id="page-header-search" class="overlay-header">
                <div class="content-header content-header-fullrow">
                    <form>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-secondary px-15" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar productos o huertas.." id="page-header-search-input" name="page-header-search-input">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary px-15">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Content -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header content-header-fullrow text-center">
                    <div class="content-header-item">
                        <i class="fa fa-sun-o fa-spin text-white"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Container -->
        <main id="main-container">
            <div class="bg-image" style="background-image: url('{{ asset('img/photos/frutas.jpg') }}');">
                <div class="hero bg-primary-dark-op">
                    <div class="hero-inner">
                        <div class="content content-full ">
                            <div class="row items-push text-center">
                                <div class="col-md-8">
                                    <h1 class="display-4 font-w700 text-white mb-10 js-appear-enabled animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Únete a la nueva forma de comprar y vender frutas y verduras</h1>
                                    <h2 class="font-w400 text-white-op mb-50 js-appear-enabled animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp"
                                        data-timeout="250">CultivosCR</h2>
                                </div>
                                <div class="col-md-4">
                                    <div class="block block-rounded">
                                        <div class="block-content tab-content">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class=" col-md-6">
                                                        <div class=" form-material floating ">
                                                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name"
                                                                value="{{ old('first_name') }}" required autofocus>
                                                            <label for="first_name">Nombre</label>
                                                            @if ($errors->has('first_name'))
                                                            <div class="invalid-feedback animated fadeInDown">
                                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-6">
                                                        <div class=" form-material floating">
                                                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name"
                                                                value="{{ old('last_name') }}" required autofocus>
                                                            <label for="last_name">Apellidos</label>
                                                            @if ($errors->has('last_name'))
                                                            <div class="invalid-feedback animated fadeInDown">
                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-12">Género</label>
                                                    <div class="col-12">
                                                        <label class="css-control css-control-primary css-radio">
                                                            <input type="radio" class="css-control-input" name="gender" value="M" required>
                                                            <span class="css-control-indicator"></span> Masculino
                                                        </label>
                                                        <label class="css-control css-control-primary css-radio mr-10">
                                                            <input type="radio" class="css-control-input" name="gender" value="F" required>
                                                            <span class="css-control-indicator"></span> Femenino
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>
                                                    <div class="col-6">
                                                        <input type="text" class="js-datepicker form-control js-datepicker-enabled" id="birth_date" name="birth_date" data-week-start="1"
                                                            data-autoclose="true" data-today-highlight="true" data-date-format="mm/dd/yy"
                                                            placeholder="mm/dd/yy">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>
            
                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                                            required> @if ($errors->has('email'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
            
                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
            
                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                                            required> @if ($errors->has('password'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
            
                                                <div class="form-group row">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
            
                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">
                                                            <label class="custom-control-label" for="signup-terms">Acepto términos y condiciones</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-hero btn-alt-success">
                                                        <i class="fa fa-plus mr-10"></i> Crear Cuenta
                                                    </button>
                                                    <div class="mt-30">
                                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="#" data-toggle="modal" data-target="#modal-terms">
                                                            <i class="fa fa-book text-muted mr-5"></i> Leer Términos
                                                        </a>
                                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ url('/login') }}">
                                                            <i class="fa fa-user text-muted mr-5"></i> Iniciar Sesión
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- Codebase Core JS -->
    <script src="{{ asset('js/codebase.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script>
        jQuery(function () {
            $('.js-datepicker').datepicker();
            Codebase.helpers(['datepicker']);
        });
    </script>
    <script src="{{ asset('js/pages/be_forms_validation.js') }}"></script> 
</body>

</html>