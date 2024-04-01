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
        url: '../consulting/ajax/firm_order_change.php',
        type: 'POST',
        data:{
            allData: adata
        },
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        }
    })
}
