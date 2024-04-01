var orderby_key = 1;

$(document)
.on("submit", ".filter_contact_form", function(event) {
    event.preventDefault();
    
    if(document.getElementById('bank_radio').checked) {
        orderby_key = 1

        var key_array = {
            orderkey: orderby_key
        }
        

        $.ajax({
            type: 'POST',
            url: '../banking/ajax/allcontacts/contacts_orderkey.php',
            data: key_array,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg.php"
            } else {
                UpdateFullTable(data)
            }
        })
        
        .fail(function ajaxFail(data) {
            console.log("fail")
        })
    }else if(document.getElementById('lm_radio').checked) {
        orderby_key = 2
        var key_array = {
            orderkey: orderby_key
        }
        
        $.ajax({
            type: 'POST',
            url: '../banking/ajax/allcontacts/contacts_orderkey.php',
            data: key_array,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg.php"
            } else {
                UpdateFullTable(data)
            }
        })
        
        .fail(function ajaxFail(data) {
            console.log("fail")
        })
    }else if(document.getElementById('ml_radio').checked) {
        orderby_key = 3
        var key_array = {
            orderkey: orderby_key
        }

        $.ajax({
            type: 'POST',
            url: '../banking/ajax/allcontacts/contacts_orderkey.php',
            data: key_array,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg.php"
            } else {
                UpdateFullTable(data)
            }
        })
        
        .fail(function ajaxFail(data) {
            console.log("fail")
        })
    }
    
})