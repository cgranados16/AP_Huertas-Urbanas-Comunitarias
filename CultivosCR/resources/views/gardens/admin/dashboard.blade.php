@extends('gardens.admin.app') @section('content')
<div class="bg-body-dark">
    <div class="content">
        <div class="row">
            <div class="col-6">
                <a class="block block-rounded text-center" href="{{route('sales/create',[$garden->id])}}">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                            <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Añadir Venta</p>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a class="block block-rounded text-center" href="{{route('sales/create',[$garden->id])}}">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                            <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Añadir Trueque</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
<div class="content">
    <div class="block block-rounded block-bordered invisible" data-toggle="appear">
        <div class="block-header block-header-default">
            <h3 class="block-title">Últimas Ventas</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive">
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
                            <td>
                                <a href="{{url('admin/garden/'.$garden->id.'/Sales/'.$sale->id)}}">
                                    {{$sale->id}}
                                </a>
                            </td>
                            <td>{{$sale->client->getFullNameAttribute()}}</td>
                            <td>{{$sale->TotalPrice}}</td>
                            <td>{{$sale->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
@endsection