$(document)
.on("click","input.checker", function(event){
    let rowid = $(this).attr('id');
    let isChecked = $(this)[0].checked;
    
    if (isChecked === true){
        var check = 1;
    } else {
        var check = 0;
    }
    console.log(check)
    console.log(rowid)
    
    console.log("yoo")

    var needed = {
        check: check,
        rowid: rowid,
    };

    $.ajax({
        type: 'POST',
        url: '../ajax/accbanks.php',
        data: needed,
        dataType: 'json',
        async: true,
    })
})