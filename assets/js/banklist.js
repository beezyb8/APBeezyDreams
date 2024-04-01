$(document).ready(function(){

})
    $(".row_position").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $(".row_position>tr").each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData)
        }
    });

    function updateOrder(adata){
        $.ajax({
            url: '../ajax/banklistchange.php',
            type: 'POST',
            data:{
                allData: adata
            },
        })
    }