@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left"> {{Lang::get('catalogs/color_catalog.title')}}</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'catalogs.colorCatalogs.store']) !!}

                        @include('catalogs.color_catalogs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
