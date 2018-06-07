<!doctype html>
<html lang="en" class="no-focus">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard - Admin</title>
    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/img/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/codebase.min.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('css/themes/flat.min.css') }}">
    @yield('styles')
</head>

<body>
    <div id="page-container" class="sidebar-o side-scroll page-header-fixed page-header-modern main-content-boxed">

        <nav id="sidebar">
            <div id="sidebar-scroll">
                <div class="sidebar-content">
                    <div class="content-header content-header-fullrow px-15">
                        <div class="content-header-section sidebar-mini-visible-b">
                            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span>
                                <span class="text-primary">b</span>
                            </span>
                        </div>
                        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <div class="content-header-item">
                                <a class="link-effect font-w700" href="{{url('admin/garden/'.$garden->id)}}">
                                    <i class="si si-fire text-primary"></i>
                                    <span class="font-size-xl text-dual-primary-dark">code</span>
                                    <span class="font-size-xl text-primary">base</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content-side content-side-full content-side-user px-10 align-parent">
                        <div class="sidebar-mini-visible-b align-v animated fadeIn">
                            <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar11.jpg" alt="">
                        </div>
                        <div class="sidebar-mini-hidden-b text-center">
                            <a class="img-link" href="javascript:void(0)">
                                <img class="img-avatar" src="{{ asset('photos/users/default.png') }}" alt="">
                            </a>
                            <ul class="list-inline mt-10">
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="javascript:void(0)"> {{$garden->Name}}</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li>
                                <a class="active" href="{{url('admin/garden/'.$garden->id)}}">
                                    <i class="fa fa-hospital-o"></i>
                                    <span class="sidebar-mini-hide">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a class="active" href="{{url('admin/garden/'.$garden->id.'/products')}}">
                                    <i class="si si-docs"></i>
                                    <span class="sidebar-mini-hide">Productos</span>
                                </a>
                            </li>
                            <li>
                                <a class="active" href="{{url('admin/garden/'.$garden->id.'/Sales')}}">
                                    <i class="si si-docs"></i>
                                    <span class="sidebar-mini-hide">Ventas</span>
                                </a>
                            </li>
                            <li>
                                <a class="active" href="{{url('admin/garden/'.$garden->id.'/Trades')}}">
                                    <i class="si si-docs"></i>
                                    <span class="sidebar-mini-hide">Trueques</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <header id="page-header">
            <div class="content-header">
                <div class="content-header-section">

                </div>
                <div class="content-header-section">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-user-md d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{Auth::user()->getFullNameAttribute()}}</span>
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                          <a class="dropdown-item" href="{{ url('home') }}">
                                <i class="fa fa-home"></i> Inicio
                          </a>
                          <a class="dropdown-item" href="{{ url('favoriteGardens') }}">
                              <i class="fa fa-star mr-5"></i> Mis favoritos
                          </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('home')}}">
                                <i class="fa fa-unlock-alt mr-5"></i> Cerrar Sesión
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header content-header-fullrow text-center">
                    <div class="content-header-item">
                        <i class="fa fa-sun-o fa-spin text-white"></i>
                    </div>
                </div>
            </div>
        </header>
        <main id="main-container">
           @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/codebase.min.js') }}"></script>
    @yield('scripts')
    </body >
</html>
