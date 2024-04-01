$(document).on("click","input.applied_checker", function(event){
    let appid = $(this).attr('id');
    let isChecked = $(this)[0].checked;
    
    if (isChecked === true){
        var checked = 1;
    } else {
        var checked = 0;
    }
    console.log(checked)
    console.log(appid)

    var needed = {
        checked: checked,
        appid: appid,
    };
    if (checked == 1){
        $.ajax({
            type: 'POST',
            url: '../ajax/applied_ours/add_appliedours.php',
            data: needed,
            dataType: 'json',
            async: true,
        })
        
    } else {
        $.ajax({
            type: 'POST',
            url: '../ajax/applied_ours/remove_appliedours.php',
            data: needed,
            dataType: 'json',
            async: true,
        })
    }
})