<!DOCTYPE html>
<html>

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
    @yield('styles')
</head>

<body>
    <div id="page-container" class="page-header-glass page-header-inverse page-header-fixed main-content-boxed">
        <!-- Header -->
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
                            <a href="{{route('map')}}">
                                <i class="si si-rocket"></i> Explorar
                            </a>
                        </li>
                        @auth @else
                        <li>
                            <a href="{{route('login')}}">
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
                            <a class="dropdown-item" href="users/favoriteGardens">
                                <i class="fa fa-star mr-5"></i> Mis favoritos
                            </a>
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

            <!-- END Header Content -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header content-header-fullrow text-center">
                    <div class="content-header-item">
                        <i class="fa fa-sun-o fa-spin text-white"></i>
                    </div>
                </div>
            </div>
        </header>
        <!-- END Header -->
        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
    </div>


    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script> {{--
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/core/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/core/jquery.scrollLock.min.js') }}"></script>
    <script src="{{ asset('js/core/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('js/core/jquery.countTo.min.js') }}"></script>
    <script src="{{ asset('js/core/js.cookie.min.js') }}"></script>

    <script src="{{ asset('js/codebase.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> @yield('scripts')
</body>

</html>
