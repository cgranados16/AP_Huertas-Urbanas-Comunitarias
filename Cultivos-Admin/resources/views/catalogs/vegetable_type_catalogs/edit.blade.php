@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vegetable Type Catalog
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vegetableTypeCatalog, ['route' => ['catalogs.vegetableTypeCatalogs.update', $vegetableTypeCatalog->id], 'method' => 'patch']) !!}

                        @include('catalogs.vegetable_type_catalogs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection