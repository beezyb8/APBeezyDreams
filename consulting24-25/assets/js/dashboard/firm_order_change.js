$(document).ready(function(){
    $(".favorites").sortable({
        delay: 150,
        stop: function() {
            updateOrder("favorites");
        }
    });

    $(".normal").sortable({
        delay: 150,
        stop: function() {
            updateOrder("normal");
        }
    });

    function updateOrder(tableType) {
        var selectedData = [];
        $("." + tableType + ">tr").each(function() {
            selectedData.push($(this).attr("id"));
        });

        $.ajax({
            url: 'ajax/firm_order_change.php',
            type: 'POST',
            data: { allData: selectedData },
            dataType: 'json',
            async: true,
        })
        .done(function ajaxDone(data) {
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg_system/login_reg.php";
            }
        });
    }
});
