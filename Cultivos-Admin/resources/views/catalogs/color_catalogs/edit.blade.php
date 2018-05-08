@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Color Catalog
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($colorCatalog, ['route' => ['catalogs.colorCatalogs.update', $colorCatalog->id], 'method' => 'patch']) !!}

                        @include('catalogs.color_catalogs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection