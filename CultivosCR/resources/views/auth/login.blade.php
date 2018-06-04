<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
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
</head>

<body>
    <div id="page-container" class="main-content-boxed page-header-modern">
        
        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-gd-dusk">
                <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                    <!-- Header -->
                    <div class="py-30 px-5 text-center">
                        <a class="link-effect font-w700" href="{{url('/')}}">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">Cultivos</span>
                            <span class="font-size-xl">CR</span>
                        </a>
                        <h1 class="h2 font-w700 mt-50 mb-10">Bienvenido</h1>
                        <h2 class="h4 font-w400 text-muted mb-0">Huertas Urbanas Comunitarias</h2>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <div class="row justify-content-center px-5">
                        <div class="col-sm-8 col-md-6 col-xl-4">
                            <form method="post" action="{{ url('/login') }}">
                                {!! csrf_field() !!}
                                <div class="form-group row has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input type="text" class="form-control"  id="login-username" name="email">
                                            <label for="login-username">Correo electrónico:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input type="password" class="form-control" id="login-password" name="password">
                                            <label for="login-password">Contraseña:</label>
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="login-remember-me">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Recordarme</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row gutters-tiny">
                                    <div class="col-12 mb-10">
                                        <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                                            <i class="si si-login mr-10"></i> Iniciar Sesión
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Sign In Form -->
                    <!-- User Dropdown -->
                </div>

            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->

    </div>
    <!-- END Page Container -->
    <script src="{{ asset('js/codebase.min.js') }}"></script>
</body>

</html>