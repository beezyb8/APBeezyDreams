$(document)
.on("click","input.your_app_check", function(event){
    let app_id = $(this).attr('id');
    let isChecked = $(this)[0].checked;
    
    if (isChecked === true){
        var check = 1;
    } else {
        var check = 0;
    }
    
    console.log(check)

    var info = {
        check: check,
        app_id: app_id,
    };

    $.ajax({
        type: 'POST',
        url: '../banking/ajax/applications/appchecker.php',
        data: info,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            console.log('checker')
        }
    })
})