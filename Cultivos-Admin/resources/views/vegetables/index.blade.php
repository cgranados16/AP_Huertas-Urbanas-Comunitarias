@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.css') }}">    
@endsection
@section('content')                
        <h2 class="content-heading pull-left">@lang('/vegetables.title')</h2>                    
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('vegetables.table')
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

