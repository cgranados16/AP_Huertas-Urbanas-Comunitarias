@extends('layouts.app') 

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}"> 
@endsection 

@section('content')
<section class="content-header">
    <h1 class="pull-left">{{Lang::get('/vegetables.title')}}</h1>
</section>

@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'vegetables.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
    {!! csrf_field() !!}
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
        autoProcessQueue: false,
        uploadMultiple: true,
        maxFiles: 10,
        parallelUploads: 10,
        addRemoveLinks: true,
        
        init: function() {
            var submitBtn = document.querySelector("#submit");
            myDropzone = this;
            
            submitBtn.addEventListener("click", function(e){
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });  
            this.on("successmultiple", function(files, response) {
                window.location.href="{{route('vegetables.index')}}";
            });
        }

    };
</script>
@endsection