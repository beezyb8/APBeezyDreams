$(document)
.on("click","input.app_check", function(event){
    let notesid = $(this).attr('id');
    let isChecked = $(this)[0].checked;
    
    if (isChecked === true){
        var check = 1;
    } else {
        var check = 0;
    }
    console.log(check)
    console.log(notesid)
    
    console.log("yoo")

    var info = {
        check: check,
        notesid: notesid,
    };

    $.ajax({
        type: 'POST',
        url: '../ajax/appchecker.php',
        data: info,
        dataType: 'json',
        async: true,
    })
})