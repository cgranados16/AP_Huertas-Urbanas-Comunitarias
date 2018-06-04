@extends('layouts.app')
@section('styles')
<!-- Page JS Plugins CSS -->

<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick-theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/cultivoscr.css') }}">
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
                    <div class="col-lg-4 col-xl-9">
                        <!-- User Review -->
                        <div class="block block-rounded block-bordered pb-20">
                            <div class="block-content">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <img class="img-avatar" src="assets/img/avatars/avatar10.jpg" alt="">
                                    </div>
                                    <div class="float-left p-5 m l-10">
                                        <div class="font-w600" style="font-size:16px">Di a los demás qué te parece</div>
                                        <div class="js-rating" data-star-on="fa fa-fw fa-2x fa-star text-primary" data-star-off="fa fa-fw fa-2x fa-star text-muted"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END User Review -->
                        <div class="block">
                            <div class="block-content">
                                <table class="table table-borderless">
                                    <tbody>
                                        @foreach ($garden->reviews as $review)                                            
                                            <tr class="table-active">
                                                <td class="d-none d-sm-table-cell"></td>
                                                <td class="font-size-sm text-muted">
                                                    <span class="text-primary">{{$review->user->getFullNameAttribute()}}</span> el
                                                    <em>{{$review->Date->diffForHumans()}}</em>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell text-center" style="width: 140px;">
                                                    <div class="mb-10">
                                                        <img class="img-avatar" src="{{ asset('photos/users/default.png') }}" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="js-rating-read" data-score="{{$review->Score}}" data-star-on="fa fa-fw fa-2x fa-star text-warning" data-star-off="fa fa-fw fa-2x fa-star text-muted"></div>
                                                    <p>{{$review->Description}}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Main Content -->
            @endsection
            @section('scripts')
    <script src="{{ asset('js/cultivoscr/garden-profile.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-raty/jquery.raty.min.js') }}"></script>

        
@endsection