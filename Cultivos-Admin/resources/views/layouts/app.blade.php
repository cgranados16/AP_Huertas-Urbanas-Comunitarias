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
    <link rel="stylesheet" id="css-main" href="{{ asset('css/cultivoscr.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('css/themes/flat.min.css') }}">    
        
    @yield('styles')
</head>

<body>
    <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-modern main-content-boxed">

        @include('layouts.sidebar')
        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="content-header-section">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary " data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-navicon"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="header_search_on">
                        <i class="fa fa-search"></i>
                    </button>
                    
                    <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="content-header-section">
                    <!-- User Dropdown -->
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {!! Auth::user()->getFullNameAttribute() !!}
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                <i class="si si-wrench mr-5"></i> {{Lang::get('common.settings')}}
                            </a>
                            <!-- END Side Overlay -->

                            <div class="dropdown-divider"></div>
                            <a href="{!! url('/logout') !!}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="si si-logout mr-5"></i> {{Lang::get('auth.sign out')}}
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    <!-- END User Dropdown -->
                    <!-- User Dropdown -->
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ Config::get('languages')[App::getLocale()] }}
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown"> 
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())                                    
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                    <!-- END User Dropdown -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header">
                <div class="content-header content-header-fullrow">
                    <form action="start_backend.html" method="post">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <!-- Close Search Section -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                <button type="button" class="btn btn-secondary px-15" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-times"></i>
                                </button>
                                <!-- END Close Search Section -->
                            </span>
                            <input type="text" class="form-control" placeholder="{{Lang::get('common.search_placeholder')}}" id="page-header-search-input" name="page-header-search-input">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-secondary px-15">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header content-header-fullrow text-center">
                    <div class="content-header-item">
                        <i class="fa fa-sun-o fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="opacity-0">
            <div class="content py-20 font-size-xs clearfix">
                <div class="float-right">
                    <a class="font-w600" target="_blank">Instituto Tecnológico de Costa Rica</a>
                </div>
                <div class="float-left">
                    <a class="font-w600" target="_blank">CultivosCR - Administración de Proyectos
                </div>
                
            </div>
            
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    {{-- <script src="{{ asset('js/core/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/core/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/core/jquery.scrollLock.min.js') }}"></script>
    <script src="{{ asset('js/core/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('js/core/jquery.countTo.min.js') }}"></script>
    <script src="{{ asset('js/core/js.cookie.min.js') }}"></script>

    <script src="{{ asset('js/codebase.min.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    @yield('scripts')
    
</body>

</html>