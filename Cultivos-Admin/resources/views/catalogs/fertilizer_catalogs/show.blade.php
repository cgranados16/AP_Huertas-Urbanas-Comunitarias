@extends('layouts.app')

@section('content')
    <section class="content-header">
       <h1 class="pull-left">{{Lang::get('catalogs/fertilizer_catalogs.title')}}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('catalogs.fertilizer_catalogs.show_fields')
                    <a href="{!! route('catalogs.fertilizerCatalogs.index') !!}" class="btn btn-default">{{Lang::get('common.back')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
