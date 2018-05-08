@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{Lang::get('catalogs/fertilizer_catalogs.title')}}</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'catalogs.fertilizerCatalogs.store']) !!}

                        @include('catalogs.fertilizer_catalogs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
