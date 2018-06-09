@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection 

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{Lang::get('/vegetables.title')}}</h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
        {!! Form::model($vegetable, ['route' => ['vegetables.update', $vegetable->id], 'method' => 'patch', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}

            @include('vegetables.fields')

        {!! Form::close() !!}
            
    <!-- Images -->
    <div class="block block-rounded block-themed pt-15">
            <div class="block-header bg-gd-primary">
                <h3 class="block-title">Imágenes</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row gutters-tiny items-push">
                @foreach($vegetable->photos as $photo)
                    <div class="col-sm-3 col-xl-3" id="image_{{$photo->id}}">
                            <div class="options-container">
                                <div class="thumbnail">
                                    <img class="img-fluid options-item thumb" src="{{ asset($photo->Photo) }}" alt="">
                                </div>
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <a class="btn btn-sm btn-rounded btn-alt-danger min-width-75" href="javascript:destroyPhoto({{$photo->id}})">
                                            <i class="fa fa-times"></i> Eliminar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                </div>
            </div>
        </div>
        <!-- END Images -->
   </div>


@endsection

@section('scripts')


<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ asset('js/plugins/dropzonejs/min/dropzone.min.js')}}"></script>
<script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

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
                myDropzone.processQueue();
            });  
            this.on("successmultiple", function(files, response) {
                window.location.href="{{route('vegetables.index')}}";
            });
        }

    };

     function destroyPhoto(id){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        document.getElementById('image_'+id).style.display = 'none';  
        $.ajax({
            type: "post",
            url: "{{route('vegetables.destroy_photo')}}",
            data: {"id" : id},   
            success: function( ) {
                swal(
                    '¡Imagen Eliminada!',
                    'Se ha eliminado correctamente',
                    'success'
                );
            }
        });
                
    }
</script>
@endsection