@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}"> @endsection @section('content')
<section class="content-header">
    <h1 class="pull-left">{{Lang::get('/trees.title')}}</h1>
</section>

@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'trees.store']) !!}

@include('trees.fields')

{!! Form::close() !!}

<div class="block block-rounded block-themed">
    <div class="block-header bg-gd-primary">
        <h3 class="block-title">Images</h3>
    </div>
    <div class="block-content block-content-full">
        <form action="/trees.store" class="dropzone" id="my-awesome-dropzone"></form>
    </div>
</div>
@endsection @section('scripts')


<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ asset('js/plugins/dropzonejs/min/dropzone.min.js')}}"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('.js-example-basic-single').select2({width: '100%'});
        Codebase.helpers(['maxlength', 'select2']);
    });
</script> @endsection