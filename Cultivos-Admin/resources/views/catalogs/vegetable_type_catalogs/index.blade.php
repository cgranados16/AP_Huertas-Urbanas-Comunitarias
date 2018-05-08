@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{Lang::get('catalogs/vegetable_type_catalog.title')}}</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('catalogs.vegetableTypeCatalogs.create') !!}">Añadir Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('catalogs.vegetable_type_catalogs.table')
            </div>
        </div>
    </div>
@endsection

