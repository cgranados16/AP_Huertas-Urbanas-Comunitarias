@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{Lang::get('/trees.title')}}</h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tree, ['route' => ['trees.update', $tree->id], 'method' => 'patch']) !!}

                        @include('trees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection