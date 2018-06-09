@extends('layouts.app')
@section('styles')
<!-- Page JS Plugins CSS -->

<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick-theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/cultivoscr.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/magnific-popup/magnific-popup.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="bg-image bg-image-bottom" style="background-image: url('{{ asset('img/photos/photo13@2x.jpg') }}');">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center">
            <!-- Personal -->
            <h1 class="h3 text-white font-w700 mb-10">{{ $garden->Name }}</h1>
            <h2 class="h5 text-white-op">
                {{ $garden->Directions }}
            </h2>
            <!-- END Personal -->
            @auth
            <!-- Actions -->
            @if(!$garden->favorites->contains(Auth::user()->id))
                <button id="addFavoriteButton" type="button" onclick="addFavorite('{{ $garden->id }}')" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5">
                    <i class="fa fa-plus mr-5"></i> Añadir a Favoritos
                </button>
                <button id="removeFavoriteButton" type="button" onclick="removeFavorite('{{ $garden->id }}')" class="btn btn-rounded btn-hero btn-sm btn-alt-danger mb-5"
                style="display:none;">
                    <i class="fa fa-times mr-5"></i> Eliminar de Favoritos
                </button>
            @else
                <button id="addFavoriteButton" type="button" onclick="addFavorite('{{ $garden->id }}')" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5" style="display:none;">
                    <i class="fa fa-plus mr-5"></i> Añadir a Favoritos
                </button>
                <button id="removeFavoriteButton" type="button" onclick="removeFavorite('{{ $garden->id }}')" class="btn btn-rounded btn-hero btn-sm btn-alt-danger mb-5">
                    <i class="fa fa-times mr-5"></i> Eliminar de Favoritos
                </button>
            @endif
            
            @endif
            <!-- END Actions -->
        </div>
    </div>
</div>
<!-- Main Content -->
<div class="content">
    <div class="row">
        <!-- Garden Navigation Bar -->
        <div class="col-lg-4 col-xl-3">
            <div class="block block-themed">
                <div class="block-content block-content-full bg-image" style="background-image: url('{{ asset($garden->GardenPicture) }}');width:100%;height: 200px;">
                </div>
                <div class="block-content block-content-full block-content-sm ">
                    <div class="font-size-xl font-w600 mb-5">{{ $garden->Name }}</div>
                    <ul class="nav-main p-10">
                        <li>
                            <a href="{{url('garden/'.$garden->id)}}">
                                <span class="sidebar-mini-hide">Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('garden/'.$garden->id.'/products')}}">
                                <span class="sidebar-mini-hide">Productos</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('garden/'.$garden->id.'/photos')}}">
                                <span class="sidebar-mini-hide">Fotos</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('garden/'.$garden->id.'/reviews')}}">
                                <span class="sidebar-mini-hide">Opiniones</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END Garden Navigation Bar -->

         <!-- Simple Gallery (.js-gallery class is initialized in Codebase() -> uiHelperMagnific()) -->
         <div class="col-lg-4 col-xl-9">
            <h2 class="content-heading">Fotos</h2>
            <div class="row items-push js-gallery img-fluid-100">
                @foreach($garden->photos as $photo)
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                    <a class="img-link img-link-zoom-in img-thumb img-lightbox" href="{{ asset($photo->Photo) }}">
                        <img class="img-fluid" src="{{ asset($photo->Photo) }}" alt="">
                    </a>
                </div> 
                @endforeach                  
            </div>
        </div>
        <!-- END Simple Gallery -->
    </div>
</div>

@endsection
@section('scripts')
    
    <script src="{{ asset('js/cultivoscr/garden-profile.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/plugins/magnific-popup/magnific-popup.min.js') }}"></script>
    <script>
        jQuery(function () {
            // Init page helpers (Magnific Popup plugin)
            Codebase.helpers('magnific-popup');
        });
    </script>        
@endsection