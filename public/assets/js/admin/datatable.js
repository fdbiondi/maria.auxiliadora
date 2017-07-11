const dataTableConfig = {
    info: false,
    order: [[ 0 , 'asc' ]],
    paging: true,
    fileToExportName: 'exportedFile',
};

$(function(){
    $('.dataTables-list').DataTable({
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: dataTableConfig.fileToExportName},
            {extend: 'pdf', title: dataTableConfig.fileToExportName},
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
            url: app.url.data_table
        },
        info: dataTableConfig.info,
        order: dataTableConfig.order,
        paging: dataTableConfig.paging
    });
});