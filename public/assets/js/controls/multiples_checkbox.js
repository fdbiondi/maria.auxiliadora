/*
 * CheckBox Controls
 */
$(function(){
    $('.i-checks .iCheck-helper').on('click', function() {
        change_element_of_table($(this))
    });
});

function change_element_of_table($chk) {
    var id = $chk.closest('tr').parent()[0].getAttribute('id');

    var trow = $chk.closest('tr');

    if(id == "disallow_table") {
        $assign.append(trow);
    }
    else if(id == "assign_table") {
        $disallow.append(trow);
    }
}

function searchInTable($input, $table) {
    var that = $input || this;
    $.each($($table + ' tr'),
        function(i, val) {
            if ($(val).text().indexOf($(that).val()) == -1) {
                $($table + ' tr').eq(i).hide();
            } else {
                $($table + ' tr').eq(i).show();
            }
        });
}

/**
 * Tables Ids
 */
$assign = $('#assign_table');
$disallow= $('#disallow_table');

/**
 * Text Box to search in disallow table
 */
$('#disallow_search').keyup(function () {
    searchInTable(this, '#disallow_table');
});

$('#assign_search').keyup(function() {
    searchInTable(this, '#assign_table');
});