var orderby_key = 1;

$(document)
.on("submit", ".filter_contact_form", function(event) {
    event.preventDefault();
    
    if(document.getElementById('bank_radio').checked) {
        orderby_key = 1
        console.log("yoyo")
        var key_array = {
            orderkey: orderby_key
        }
        
        console.log("yoyo")
        $.ajax({
            type: 'POST',
            url: '../ajax/allcontacts/contacts_orderkey.php',
            data: key_array,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            console.log("yoyo")
            UpdateFullTable(data)
        })
        
        .fail(function ajaxFail(data) {
            console.log("fail")
        })
    }else if(document.getElementById('lm_radio').checked) {
        orderby_key = 2
        console.log("yoyo")
        var key_array = {
            orderkey: orderby_key
        }
        
        console.log("yoyo")
        $.ajax({
            type: 'POST',
            url: '../ajax/allcontacts/contacts_orderkey.php',
            data: key_array,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            console.log("yoyo")
            UpdateFullTable(data)
        })
        
        .fail(function ajaxFail(data) {
            console.log("fail")
        })
    }else if(document.getElementById('ml_radio').checked) {
        orderby_key = 3
        console.log("yoyo")
        var key_array = {
            orderkey: orderby_key
        }
        
        console.log("yoyo")
        $.ajax({
            type: 'POST',
            url: '../ajax/allcontacts/contacts_orderkey.php',
            data: key_array,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            console.log("yoyo")
            UpdateFullTable(data)
        })
        
        .fail(function ajaxFail(data) {
            console.log("fail")
        })
    }
    
})