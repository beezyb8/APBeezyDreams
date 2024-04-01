$(document)
.on("click","input.checker", function(event){
    let uq_id = $(this).attr('id');
    let isChecked = $(this)[0].checked;
    
    if (isChecked === true){
        var check = 1;
    } else {
        var check = 0;
    }
    
    var needed = {
        check: check,
        uq_id: uq_id
    };

    $.ajax({
        type: 'POST',
        url: '../consulting/ajax/accbanks.php',
        data: needed,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            console.log("hi")
        }
    })
})