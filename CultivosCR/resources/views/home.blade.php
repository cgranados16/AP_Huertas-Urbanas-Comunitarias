@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/cultivoscr.css') }}">
@endsection
@section('content')
<div class="bg-primary-dark-op py-30">  
    </div>
    <div class="content">
        
    
<div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
        <div class="col-md-4">
            <div class="block">
                <a href="map">
                <div class="block-content block-content-full">
                    <div class="py-20 text-center">
                        <div class="mb-20">
                            <i class="fa fa-map fa-4x text-warning"></i>
                        </div>
                        <div class="font-size-h4 font-w600 text-warning">Ver Mapa</div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block">
                <a href="#">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="mb-20">
                                <i class="fa fa-tree fa-4x text-primary"></i>
                            </div>
                            <div class="font-size-h4 font-w600">Huertas</div>
                            <div class="text-muted"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block">
                <a href="#">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="mb-20">
                                <i class="fa fa-cogs fa-4x text-muted"></i>
                            </div>
                            <div class="font-size-h4 font-w600 text-muted">Ajustes</div>  
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="content-heading">
        Administrador de Huertas
    </div>
    <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
        <div class="col-md-12">
            <div class="block">
                <a href="#">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="mb-20">
                                <i class="fa fa-heart fa-4x text-danger"></i>
                            </div>
                            <div class="font-size-h4 font-w600">Empieza tu huerta!</div>  
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
        @foreach($gardens as $garden)
            <div class="col-md-4">
                <div class="block">
                    <a href="#">
                        <div class="block-content block-content-full">
                            <div class="py-20 text-center">
                                <div class="mb-20">
                                    <img class="harvest-profile-showcase" src="{{ asset($garden->photos->first()->Photo) }}"></img>
                                </div>
                                <div class="font-size-h4 font-w600">{{$garden->Name}}</div>  
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
