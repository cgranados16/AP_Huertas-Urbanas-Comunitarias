@extends('layouts.app')

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
					<div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">estadistica</h3>
                            <div class="block-options">
                            </div>
                        </div>
                        <div class="block-content">
                            <table class="table table-vcenter">
                                <thead class="thead-default">
                                    <tr>
                                        <th class="text-center" style="width: 15%;">Categorizacion</th>
                                        <th class="text-center" style="width: 15%;">Cultivo</th>
                                        <th class="text-center" style="width: 15%;">En stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($garden->harvests as $harvest)
                                    <tr>
                                      @if($harvest->HarvestType == 1)
                                        <td class="text-center">Arbol</td>
                                      @else
                                        <td class="text-center">Vegetal</td>
                                      @endif
                                      <td class="text-center" scope="row">{{$harvest->harvest->Name}}</td>
                                      @if($harvest->InStock == 1)
                                        <td class="text-center">Disponible</td>
                                      @else
                                        <td class="text-center">No disponible</td>
                                      @endif

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Simple Table-->
                </div>

            </div>
            <!-- END Page Content -->
@endsection
