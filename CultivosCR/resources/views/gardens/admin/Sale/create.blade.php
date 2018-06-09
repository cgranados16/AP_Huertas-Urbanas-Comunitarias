@extends('layouts.app')
@section('styles')
<!-- Page JS Plugins CSS -->

<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/slick/slick-theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/cultivoscr.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="bg-image bg-image-bottom" style="background-image: url('{{ asset('img/photos/photo13@2x.jpg') }}');">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center">
            <!-- Personal -->
            <h1 class="h3 text-white font-w700 mb-30">Crear venta</h1>
        </div>
    </div>
</div>
<!-- Main Content -->
<!-- Progress Wizard 2 -->
<div class="content">
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
                    
                    
                    <input type="hidden" id="harvests" name="harvests[]">

                    <a href="javascript:$('#addHarvestModal').modal().show();"><button type="button" class="btn btn-primary">Agregar Nuevo Producto</button></a>

                    <table id="productsTable" class="table table-bordered table-striped table-vcenter js-dataTable-full mt-15">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">Producto</th>
                                    <th style="width: 20%;">Cantidad</th>
                                    <th style="width: 5%;">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <tr>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>
                                        <button type="button"  class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="{{Lang::get('common.edit')}}">
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </button>
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                        
                </div>
                   
            </div>
        
        
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
           
    <!-- END Progress Wizard 2 -->

</div>


<div class="modal fade modal-center" id="addHarvestModal" role="dialog" aria-labelledby="modal-popout">
        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">                
            <div class="modal-content ">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Añadir Producto</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content"> 
                        <div class="row">
                            <div class="col-3">
                                <img id="harvestimg" style="height: 100%;width:100%" src="{{ asset('img/photos/photo13@2x.jpg') }}"></img>
                            </div>
                            <div class="col-9">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="District">Productos</label>
                                        <select id="harvestSelect" class="js-example-basic-single" name="Harvest">
                                            <div></div>
                                            @foreach($garden->harvests as $h)
                                                <option imagesrc="{{$h->harvest->photos->first()->Photo}}" value="{{$h->id}}">{{$h->harvest->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="Quantity">Cantidad</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="quantity" name="Quantity">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="javascript:addHarvest();">
                        <button type="submit" value="Submit" class="btn btn-alt-success">Aceptar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<!-- END Page Container -->
<script src="{{ asset('js/core/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    var products = []
    $(document).ready(function () {
        $('.js-example-basic-single').select2({width: '100%'});   
        // var array = $("#harvests").val();
        // console.log(array);
        // addHarvest(5,12);
        $('#harvestSelect').on("select2:selecting", function(e) { 
            var id = $('#harvestSelect option:selected').attr('value');
            getGardenPhoto(id);
        });
    });

    function Harvest(product, quantity) {
        this.product = product;
        this.quantity = quantity;
    }

    Harvest.prototype.toString = function harvestToString() {
        return this.product.toString() +" "+this.quantity.toString();
    }

    function addHarvest(){
        var product = $('#harvestSelect option:selected').attr('value');
        var quantity = $('#quantity').val();
        var harvest = new Harvest(product, quantity);
        products.push(harvest);
        $('#harvests').val(products);
        $('#productsTable tr:last').after('<tr>3</tr><tr>2</tr><tr>2</tr>');
        //$('#addHarvestModal').modal().hide();
    }

    function getGardenPhoto(id){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            type: "get",
            url: "{{route('harvest.photo')}}",
            data: {"id" : id},   
            success: function(value) {
                $('#harvestimg').attr('src',value);
            }
        });
                
    }
    
</script> 


@endsection
