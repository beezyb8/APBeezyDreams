const fav_contact_filt = document.querySelector("#fav_contact")
const call_contact_filt = document.querySelector("#call_contact")
const asc_contact_filt = document.querySelector("#ascend_contact")
const des_contact_filt = document.querySelector("#descend_contact")


$(document)
.on("click", "#fav_contact", function(event) {
    if(fav_contact_filt.classList.contains("selected_filter_button")){
    }else{
        fav_contact_filt.classList.add("selected_filter_button")
        if(asc_contact_filt.classList.contains("selected_filter_button")){
            asc_contact_filt.classList.remove("selected_filter_button")
        }
        if(des_contact_filt.classList.contains("selected_filter_button")){
            des_contact_filt.classList.remove("selected_filter_button")
        }
        if(call_contact_filt.classList.contains("selected_filter_button")){
            call_contact_filt.classList.remove("selected_filter_button")
        }
    }
    
    var orderby_key = 1;
    var key_array = {
        orderkey: orderby_key
    }
        
    $.ajax({
            type: 'POST',
            url: 'ajax/allcontacts/contacts_orderkey.php',
            data: key_array,
            dataType: 'json',
            async: true,
    })
    
    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
        } else {
            var favorite_firms = []
            $.each(data.firms, function(index, value){
                favorite_firms.push(value.firm)
            })
            if(favorite_firms.length > 0){
                $("tbody tr").each(function() {
                    var firm = $(this).find(".bank_td").text();
                    var hideRow = true;
        
                    for (var i = 0; i < favorite_firms.length; i++) {
                        if (firm.includes(favorite_firms[i])) {
                            hideRow = false;
                            break; // No need to continue checking once we found a match
                        }
                    }
        
                    if (hideRow) {
                        $(this).css("display", "none");
                    } else {
                        $(this).css("display", "table-row"); // Use "table-row" instead of "table-cell"
                    }
                });
            }else{
                alert("You don't have any favorites yet. Go to the Dashboard and add favorites to make this feature work.")
            }
        }
    })
    
    .fail(function ajaxFail(data) {
        console.log("fail")
    })
})


$(document)
.on("click", "#call_contact", function(event) {
    if(call_contact_filt.classList.contains("selected_filter_button")){
    }else{
        call_contact_filt.classList.add("selected_filter_button")
        if(fav_contact_filt.classList.contains("selected_filter_button")){
            fav_contact_filt.classList.remove("selected_filter_button")
        }
        if(asc_contact_filt.classList.contains("selected_filter_button")){
            asc_contact_filt.classList.remove("selected_filter_button")
        }if(des_contact_filt.classList.contains("selected_filter_button")){
            des_contact_filt.classList.remove("selected_filter_button")
        }
    }
    $("tbody tr").each(function() {
        if ($(this).hasClass("callhaddone")) {
            $(this).css("display", "table-row");
        } else {
            $(this).css("display", "none");
        }
    });
});

$(document)
.on("click", "#ascend_contact", function(event) {
    if(asc_contact_filt.classList.contains("selected_filter_button")){
    }else{
        asc_contact_filt.classList.add("selected_filter_button")
        if(fav_contact_filt.classList.contains("selected_filter_button")){
            fav_contact_filt.classList.remove("selected_filter_button")
        }
        if(des_contact_filt.classList.contains("selected_filter_button")){
            des_contact_filt.classList.remove("selected_filter_button")
        }if(call_contact_filt.classList.contains("selected_filter_button")){
            call_contact_filt.classList.remove("selected_filter_button")
        }
    }
    var orderby_key = 2;
    var key_array = {
        orderkey: orderby_key
    }
        
    $.ajax({
            type: 'POST',
            url: 'ajax/allcontacts/contacts_orderkey.php',
            data: key_array,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
            } else {
                UpdateFullTable(data)
            }
        })
        
        .fail(function ajaxFail(data) {
            console.log("fail")
        })
})

$(document)
.on("click", "#descend_contact", function(event) {
    if(des_contact_filt.classList.contains("selected_filter_button")){
    }else{
        des_contact_filt.classList.add("selected_filter_button")
        if(fav_contact_filt.classList.contains("selected_filter_button")){
            fav_contact_filt.classList.remove("selected_filter_button")
        }
        if(asc_contact_filt.classList.contains("selected_filter_button")){
            asc_contact_filt.classList.remove("selected_filter_button")
        }if(call_contact_filt.classList.contains("selected_filter_button")){
            call_contact_filt.classList.remove("selected_filter_button")
        }
    }
    var orderby_key = 3;
    var key_array = {
        orderkey: orderby_key
    }
    $.ajax({
            type: 'POST',
            url: 'ajax/allcontacts/contacts_orderkey.php',
            data: key_array,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
            } else {
                UpdateFullTable(data)
            }
        })
        
        .fail(function ajaxFail(data) {
            console.log("fail")
        })
})


// $(document)
// .on("click", "#favorites_contact", function(event) {
//     var orderby_key = 3;
//     var key_array = {
//         orderkey: orderby_key
//     }
        
//     $.ajax({
//         type: 'POST',
//         url: '/ajax/allcontacts/contacts_orderkey.php',
//         data: key_array,
//         dataType: 'json',
//         async: true,
//     })
    
//     .done(function ajaxDone(data) {
//         if (typeof data.loco !== "undefined") {
//             alert('You are not logged in');
//             window.location.href = "https://mylegup.co/login_reg.php"
//         } else {
//             UpdateFullTable(data)
//         }
//     })
    
//     .fail(function ajaxFail(data) {
//         console.log("fail")
//     })
// })
