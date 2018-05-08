@extends('layouts.app') 

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}"> 
@endsection 

@section('content')
<section class="content-header">
    <h1 class="pull-left">{{Lang::get('/vegetables.title')}}</h1>
</section>

@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'vegetables.store']) !!}
    @include('vegetables.fields')
{!! Form::close() !!}


@endsection

@section('scripts')


<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ asset('js/plugins/dropzonejs/min/dropzone.min.js')}}"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('.js-example-basic-single').select2({width: '100%'});
        $('.js-example-basic-multiple').select2({width: '100%'});
        Codebase.helpers(['maxlength', 'select2']);
    });

    Dropzone.options.myDropzone = {
        // Prevents Dropzone from uploading dropped files immediately
        autoProcessQueue: false,
        addRemoveLinks: true,

        init: function() {
        var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

        submitButton.addEventListener("click", function() {
            alert('caca');
            //myDropzone.processQueue(); // Tell Dropzone to process all queued files.
        });

        // You might want to show the submit button only when 
        // files are dropped here:
        this.on("addedfile", function() {
            // Show submit button here and/or inform user to click it.
        });

        }
    };
</script>
@endsection