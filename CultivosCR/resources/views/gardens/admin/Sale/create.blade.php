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
            <h1 class="h3 text-white font-w700 mb-30">Agregar un cultivo</h1>


        </div>
    </div>
</div>
<!-- Main Content -->
<!-- Progress Wizard 2 -->
<div class="content">

        <!-- Form -->
        <form action="" method="POST">
            @csrf

            <div class="block block-rounded ">
                    <div class="block-header">
                        <h3 class="block-title">Información sobre la venta</h3>
                        <div class="block-options">
                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>Save
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="District">IdCliente</label>
                                <input type="text" class="form-control" name="correoCliente">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="District">Producto</label>
                                <select class="js-example-basic-single" name="Harvest">
                                  <div></div>
                                    @foreach($garden->harvests as $h)
                                        <option value="{{$h->id}}">{{$h->harvest->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="Price">Cantidad</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="Price">Precio</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="Price">
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
