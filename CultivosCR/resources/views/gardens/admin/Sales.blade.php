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
                        <p class="font-w600 font-size-sm text-uppercase">Crear venta</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="content">
        <div class="content-heading">
                Ventas
            </div>
        <div class="block block-rounded">
        <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th style="width: 20%;">IdVenta</th>
                            <th style="width: 20%;">Cliente</th>
                            <th style="width: 20%;">PrecioTotal</th>
                            <th style="width: 20%;">FechaCreado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($garden->sales as $sale)
                            <tr>
                                <td>{{$sale->id}}</td>
                                <td>{{$sale->client->getFullNameAttribute()}}</td>
                                <td>{{$sale->TotalPrice}}</td>
                                <td>{{$sale->created_at}}</td>
                                <td>
                                    <button type="button"  class="btn btn-sm btn-secondary" data-toggle="tooltip" title="" data-original-title="Editar">

                                    </button>
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
