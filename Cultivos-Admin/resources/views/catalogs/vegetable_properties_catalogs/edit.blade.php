@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{Lang::get('catalogs/vegetable_properties_catalogs.title')}}</h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vegetablePropertiesCatalog, ['route' => ['catalogs.vegetablePropertiesCatalogs.update', $vegetablePropertiesCatalog->id], 'method' => 'patch']) !!}

                        @include('catalogs.vegetable_properties_catalogs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection