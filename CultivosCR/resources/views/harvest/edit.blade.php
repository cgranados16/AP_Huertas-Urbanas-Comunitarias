@extends('layouts.app')
@section('styles')
<!-- Page JS Plugins CSS -->

<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick-theme.min.css') }}">

@endsection
@section('content')
<div class="bg-image bg-image-bottom" style="background-image: url('{{ asset('img/photos/photo13@2x.jpg') }}');">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center">
            <!-- Personal -->
            <h1 class="h3 text-white font-w700 mb-30">Editar cultivo</h1>

    
        </div>
    </div>
</div>
<!-- Main Content -->
<!-- Progress Wizard 2 -->
<div class="content">
    
        <!-- Form -->
        <form action="{{route('harvest.update',[$garden->id, $harvest->id] )}}" method="patch">
            
            
            <div class="block block-rounded ">
                    <div class="block-header">
                        <h3 class="block-title">Información sobre el cultivo</h3>
                        <div class="block-options">
                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>Save
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="District">Cultivo</label>
                                <select class="js-example-basic-single" name="Harvest">
                                    @foreach($trees as $tree)
                                        <option value="{{$tree->id}}" >Árbol - {{$tree ->Name}}</option>
                                    @endforeach
                                    @foreach($vegetables as $vegetable)
                                        <option value="{{$vegetable->id}}">Hortaliza - {{$vegetable ->Name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-12" for="Price">Precio</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="Price" value="{{$harvest->Price}}" name="Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="District">Abono</label>
                                <select class="js-example-basic-single" name="Fertilizer">
                                    @foreach($fertilizer as $fertilize)
                                        @if($fertilize->id === $harvest->FertilizerRequirements)
                                            <option value="{{$fertilize->id}}" selected="selected">{{$fertilize ->Description}}</option>                                        
                                        @else
                                            <option value="{{$fertilize->id}}">{{$fertilize ->Description}}</option>
                                        @endif
                                    @endforeach
                                  
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-12">Disponible</label>
                            <div class="col-12">
                                <label class="css-control css-control-success css-switch">
                                    <input type="checkbox" class="css-control-input" id="ecom-product-published" name="InStock" checked="">
                                    <span class="css-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <!-- END Form -->
    </div>
    <!-- END Progress Wizard 2 -->
</div>
<!-- END Page Container -->
@endsection
@section('scripts')
    <script src="{{ asset('js/plugins/slick/slick.min.js') }}"></script>

     <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
     <script src="{{ asset('js/plugins/jquery-validation/additional-methods.min.js') }}"></script>
     <!-- Page JS Code -->
     

     <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function () {
                $('.js-example-basic-single').select2({width: '100%'});
            });
        </script> 
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-59jWkkJJxeKQdF1KNUqgg7MrSWRqHt4&callback=initMap"></script>
        
@endsection