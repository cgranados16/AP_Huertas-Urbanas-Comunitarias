@extends('gardens.admin.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.css') }}">  
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection
@section('content')
<div class="bg-body-dark">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <a class="block block-rounded text-center" href="javascript:$('#modal').modal().show();">
                    <div class="block-content">
                        <p class="mt-5 mb-10">
                            <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                            <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                        </p>
                        <p class="font-w600 font-size-sm text-uppercase">Añadir Colaborador a la Huerta</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="content">
        <div class="content-heading">
                Colaboradores
            </div>
        <div class="block block-rounded">
        <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th style="width: 5%;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($garden->collaborators as $collaborator) 
                            <tr>
                                <td>{{$collaborator->getFullNameAttribute()}}</td>
                                <td>{{$collaborator->email}}</td>
                                <td>
                                        {!! Form::open(['url' => ['admin/garden/'.$garden->id.'/Collaborators/'.$collaborator->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-secondary primary-color text-primary',
                                                'onclick' => "return confirm('Está seguro?')",'data-toggle'=>"tooltip",  'data-original-title'=>'Eliminar' ]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>

<div class="modal fade modal-center" id="modal" role="dialog" aria-labelledby="modal-popout">
        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">                
            <div class="modal-content ">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Añadir colaborador a la Huerta</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content"> 
                        <div class="row">
                            <div class="col-9">
                                <div class="form-group row">
                                    <label class="col-12" for="email">Correo electrónico:</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="javascript:collaborator();">
                        <button type="submit" value="Submit" class="btn btn-alt-success">Aceptar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
   
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>    
    
    <script>
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
        function collaborator(){
            var email = $('#email').val();
            $.ajax({
                url: "{{route('garden/collaborators',[$garden->id])}}",
                type: 'post',
                data: { 'email' : email },
                success: function(result) {
                    location.reload();
                },
                erro: function(result) {
                    location.reload();
                }
            });
        }
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
                jQuery('.js-dataTable-full').dataTable({
                    columnDefs: [{orderable: true }],
                    autoWidth: false,
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