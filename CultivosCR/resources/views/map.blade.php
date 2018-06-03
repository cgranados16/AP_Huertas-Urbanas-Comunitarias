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


</head>

    <body>
        <!-- Page Container -->
        <div id="page-container" class="sidebar-o side-scroll page-header-glass main-content-boxed">
            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="content-header content-header-fullrow px-15">
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <!-- Close Sidebar, Visible only on mobile screens -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                                <!-- END Close Sidebar -->
                                <!-- Logo -->
                                <div class="content-header-item">
                                    <a class="link-effect font-w700" href="start_backend.html">
                                        <i class="si si-fire text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">Cultivos</span><span class="font-size-xl text-primary">CR</span>
                                    </a>
                                </div>
                                <!-- END Logo -->
                            </div>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Navigation -->
                        <div class="content-side content-side-full">
                            <ul class="nav-main">
                                <li>
                                    <a class="active" href="javascript:history.back()">
                                        <i class="si si-arrow-left"></i>
                                        <span class="sidebar-mini-hide">Regresar</span>
                                    </a>
                                </li>
                                <li class="nav-main-heading">
                                    <span>Mapa</span>
                                </li>
                                <li>
                                  
                                </li>
                            </ul>
                        </div>
                        <!-- END Side Navigation -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                        <!-- END Toggle Sidebar -->
                    </div>
                    <!-- END Left Section -->
                </div>
                <!-- END Header Content -->

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
                    <div id="map" style="width: 100%; height: 100%; position:absolute"></div>                                         
                </main> 
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->

    </body>
    <script src="{{ asset('js/codebase.min.js') }}"></script>
    <script>
        function initMap() {
            var mapCenter = {lat: 9.826333, lng: -83.979851};
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: mapCenter,
            mapTypeControl: false,
            });
            
            @foreach ($gardens as $garden)
                var location = { lat: {{ $garden->Latitude }}, lng: {{ $garden->Longitude }} };
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: "{{$garden->Name}}",
                });
                var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h3 id="firstHeading" >{{$garden->Name}}</h1>'+
                '<a href="{{url("garden/$garden->id")}}">'+
                'Visitar la página</a> '+
                '</div>'+
                '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
                
            @endforeach
            
        }
    </script>
          <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-59jWkkJJxeKQdF1KNUqgg7MrSWRqHt4&callback=initMap"></script>
    
</html>
