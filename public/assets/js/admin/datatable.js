let $info = false;
let $order = [[ 0 , 'asc' ]];
let $paging = true;
let $fileToExportName = 'exportedFile';

$(function(){
    $('.dataTables-list').DataTable({
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: $fileToExportName},
            {extend: 'pdf', title: $fileToExportName},
            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ],
        language: {
            url: LANG_DATA_TABLE_URL
        },
        info: $info,
        order: $order,
        paging: $paging
    });
});