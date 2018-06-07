@extends('gardens.admin.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="bg-body-dark">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <a class="block block-rounded text-center" href="{{route('sales/create',$garden->id)}}">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                            <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Crear Intercambio</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="content">
        <div class="content-heading">
                Trueque
            </div>
        <div class="block block-rounded">

              <div class="content">
                  <div class="content-heading">
                          Productos Vendidos
                          </div>
                        <div class="block block-rounded">
                        <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Cultivo</th>
                            <th style="width: 20%;">Cantidad</th>
                            <th style="width: 20%;">Recibiendo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trade->items as $item)
                            <tr>
                                <td>{{$item->harvest->harvest->Name}}</td>
                                <td>{{$item->Quantity}}</td>
                                <td>
                                    @if($item->Receiving===0)
                                        <span class="badge badge-primary">Envia</span>
                                    @else
                                        <span class="badge badge-warning">Recibe</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
@section('scripts')

    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>


    <script>
        var BeTableDatatables = function() {
            // Override a few DataTable defaults, for more examples you can check out https://www.datatables.net/
            var exDataTable = function() {
                jQuery.extend( jQuery.fn.dataTable.ext.classes, {
                    sWrapper: "dataTables_wrapper dt-bootstrap4"
                });
            };

            // Init full DataTable, for more examples you can check out https://www.datatables.net/
            var initDataTableFull = function() {
                var lang = "";
                "{{ Session::get('applocale') }}" === "es" ? (lang = "Spanish") : (lang = "English");
                jQuery('.js-dataTable-full').dataTable({
                    columnDefs: [{orderable: true }],
                    autoWidth: false,
                    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/"+lang+".json"},
                });
            };

            return {
                init: function() {
                    // Override a few DataTable defaults
                    exDataTable();
                    // Init Datatables
                    initDataTableFull();
                }
            };

        }();
        // Initialize when page loads
        jQuery(function(){
            BeTableDatatables.init();
        });
    </script>
@endsection
