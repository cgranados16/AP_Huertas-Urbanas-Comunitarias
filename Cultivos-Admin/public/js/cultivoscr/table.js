jQuery(function($) {
    //initiate dataTables plugin
    var myTable = 
    $('.js-dataTable-full')
    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
    .DataTable( {
        bAutoWidth: false,
        "aoColumns": [
            null,
            null,
            null
        ],
        "aaSorting": [],
        
        
        //"bProcessing": true,
        //"bServerSide": true,
        //"sAjaxSource": "http://127.0.0.1/table.php"   ,

        //,
        //"sScrollY": "200px",
        //"bPaginate": false,

        //"sScrollX": "100%",
        //"sScrollXInner": "120%",
        //"bScrollCollapse": true,
        //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
        //you may want to wrap the table inside a "div.dataTables_borderWrap" element

        //"iDisplayLength": 50


            select: {
                style: 'multi'
            }
        });
    });