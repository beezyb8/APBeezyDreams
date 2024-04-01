$(document)
.on("click","input#cold", function(event){
    let contactid = $(this).attr('class');
    let isChecked = $(this)[0].checked;
    let thisrow = $("tr."+contactid);
    
    if (isChecked == true){
        var coldcheck = 1;
    } else {
        var coldcheck = 0;
    }

    var needed = {
        coldcheck: coldcheck,
        contactid: contactid,
    };
    //Begin AJAX process

    $.ajax({
        type: 'POST',
        url: '../consulting/ajax/coldcheck.php',
        data: needed,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            let marker = "cd"+String(data.thiscontact.contact_id);
            let thisrow = document.querySelector("."+marker);
            if(data.thiscontact.coldemail == 1){
                thisrow.classList.add("colddone")
            } else{
                thisrow.classList.remove("colddone")
            }
        }
    })
})

$(document)
.on("click","input#callsched", function(event){
    let contactid = $(this).attr('class');
    let isChecked = $(this)[0].checked;
    let thisrow = $("tr."+contactid);
    
    if (isChecked == true){
        var callschedcheck = 1;
    } else {
        var callschedcheck = 0;
    }

    var needed = {
        callschedcheck: callschedcheck,
        contactid: contactid,
    };
    //Begin AJAX process

    $.ajax({
        type: 'POST',
        url: '../consulting/ajax/callsched.php',
        data: needed,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            let marker = "cd"+data.thiscontact.contact_id.toString();
            let thisrow = document.querySelector("."+marker);
            if(data.thiscontact.callsched == 1){
                thisrow.classList.add("callscheddone")
            } else{
                thisrow.classList.remove("callscheddone")
            }
        }
    })
})

$(document)
.on("click","input#call", function(event){
    let contactid = $(this).attr('class');
    let isChecked = $(this)[0].checked;
    let thisrow = $("tr."+contactid);
    
    if (isChecked == true){
        var callhadcheck = 1;
    } else {
        var callhadcheck = 0;
    }

    var needed = {
        callhadcheck: callhadcheck,
        contactid: contactid,
    };

    $.ajax({
        type: 'POST',
        url: '../consulting/ajax/callhad.php',
        data: needed,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            let marker = "cd"+data.thiscontact.contact_id.toString();
            let thisrow = document.querySelector("."+marker);
            if(data.thiscontact.callhad == 1){
                thisrow.classList.add("callhaddone")
            } else{
                thisrow.classList.remove("callhaddone")
            }
        }
    })
})

$(document)
.on("click","input#thankyou", function(event){
    let contactid = $(this).attr('class');
    let isChecked = $(this)[0].checked;
    let thisrow = $("tr."+contactid);
    
    if (isChecked == true){
        var thankyoucheck = 1;
    } else {
        var thankyoucheck = 0;
    }

    var needed = {
        thankyoucheck: thankyoucheck,
        contactid: contactid,
    };

    $.ajax({
        type: 'POST',
        url: '../consulting/ajax/thankyou.php',
        data: needed,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            let marker = "cd"+data.thiscontact.contact_id.toString();
            let thisrow = document.querySelector("."+marker);
            if(data.thiscontact.thankyou == 1){
                thisrow.classList.add("thankyoudone")
            } else{
                thisrow.classList.remove("thankyoudone")
            }
        }
    })
})