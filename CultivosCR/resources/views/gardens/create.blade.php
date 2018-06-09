@extends('layouts.app')
@section('styles')
<!-- Page JS Plugins CSS -->

<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick-theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/min/dropzone.min.css') }}"> 
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('content')
<div class="bg-image bg-image-bottom" style="background-image: url('{{ asset('img/photos/photo13@2x.jpg') }}');">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center">
            <!-- Personal -->
            <h1 class="h3 text-white font-w700 mb-30"> Iniciar una Huerta</h1>

    
        </div>
    </div>
</div>
<!-- Main Content -->
<!-- Progress Wizard 2 -->
<div class="content">
    <div class="js-wizard-simple block">
        <!-- Wizard Progress Bar -->
        <div class="progress rounded-0" data-wizard="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%; height: 8px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!-- END Wizard Progress Bar -->

        <!-- Step Tabs -->
        <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#wizard-progress2-step1" data-toggle="tab">1. Información</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#wizard-progress2-step2" data-toggle="tab">2. Fotos</a>
            </li>
        </ul>
        <!-- END Step Tabs -->

        <!-- Form -->
        {!! Form::open(['route' =>'garden.store', 'method' => 'post', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
            @csrf
            <!-- Steps Content -->
            <div class="block-content block-content-full tab-content" style="min-height: 274px;">
                <!-- Step 1 -->
                <div class="tab-pane active" id="wizard-progress2-step1" role="tabpanel">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="Name">Nombre de la huerta</label>
                                    <input type="text" class="form-control form-control-lg" id="Name" name="Name" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="District">Distrito</label>
                                    <select class="js-example-basic-single" id="District" name="District">
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}">{{$district->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row">
                            <div class="col-12">
                                    <label for="mega-bio">Direcciones</label>
                                    <textarea class="form-control form-control-lg" id="Directions" name="Directions" rows="6"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="hidden" class="form-control form-control-lg" id="Latitude" name="Latitude" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="hidden" class="form-control form-control-lg" id="Longitude" name="Longitude">
                                </div>
                            </div>                                                                          
                        </div>
                        
                        <div class="col-md-7">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="mega-bio">Localización de la huerta</label>
                                    <div id="map" style="width: 100%; height: 600px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Step 1 -->

                <!-- Step 2 -->
                <div class="tab-pane" id="wizard-progress2-step2" role="tabpanel">
                    <div class="dropzone dz-clickable" id="myDrop">
                        <div class="dz-default dz-message" data-dz-message="">
                            <span>Drop files here to upload</span>
                        </div>
                    </div>                    
                </div>
                <!-- END Step 2 -->                
            </div>
            <!-- END Steps Content -->

            <!-- Steps Navigation -->
            <div class="block-content block-content-sm block-content-full bg-body-light">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-alt-secondary" data-wizard="prev">
                            <i class="fa fa-angle-left mr-5"></i> Previous
                        </button>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                            Next <i class="fa fa-angle-right ml-5"></i>
                        </button>
                        
                        <button class="btn btn-alt-primary d-none" id="submit" data-wizard="finish">
                            <i class="fa fa-check mr-5"></i> Submit
                        </button>
                    </div>
                </div>
            </div>
            <!-- END Steps Navigation -->
        {!! Form::close() !!}
        <!-- END Form -->
    </div>
    <!-- END Progress Wizard 2 -->
</div>
<!-- END Page Container -->
@endsection
@section('scripts')
    <script src="{{ asset('js/plugins/slick/slick.min.js') }}"></script>

     <script src="{{ asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
     <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
     <script src="{{ asset('js/plugins/jquery-validation/additional-methods.min.js') }}"></script>
     <!-- Page JS Code -->
     <script src="{{ asset('js/pages/be_forms_wizard.js') }}"></script>
     <script src="{{ asset('js/plugins/dropzonejs/min/dropzone.min.js')}}"></script>
    <script>

        Dropzone.autoDiscover = false;
        $("div#myDrop").dropzone({
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFiles: 10,
            url: '{{route("garden.store")}}',
            parallelUploads: 10,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
            
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                    
                }); 
                // Event to send your custom data to your server
                myDropzone.on("sending", function(file, xhr, data) {

                    // First param is the variable name used server side
                    // Second param is the value, you can add what you what
                    // Here I added an input value
                    data.append("Name", $('#Name').val());
                    data.append("District", $('#District').val());
                    data.append("Directions", $('#Directions').val());
                    data.append("Latitude", $('#Latitude').val());
                    data.append("Longitude", $('#Longitude').val());
                }); 
                this.on("successmultiple", function(files, response) {
                    window.location.href = "{{route('home')}}";
                });          
            }
        });
    </script>
     <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function () {
                $('.js-example-basic-single').select2({width: '100%'});
                $('.js-example-basic-single').select2({width: '100%'});
            });
        </script> 
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-59jWkkJJxeKQdF1KNUqgg7MrSWRqHt4&callback=initMap"></script>
        
@endsection