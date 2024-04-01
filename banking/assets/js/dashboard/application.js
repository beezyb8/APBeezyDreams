const applinkform = document.querySelector(".applinks");
const applink_modal = document.querySelector(".applink_modal");
const closeapp = document.querySelector(".closeapp");
const app_cont = document.querySelector(".app_cont");


applink_modal.onclick = () => {
    app_cont.style.display = "block"
    applink_modal.style.display = "none"
    // AJAX to display applications
}


closeapp.onclick = () => {
    app_cont.style.display = "none"
    applink_modal.style.display = "block"
}

$(document)
.on('submit', ".applinks", function(event) {
    event.preventDefault();
    // SEND TO BANK NOTES!
    var form = $(this);
    var uq_id = form.attr("id");
    var link = $("input[name='link']", form).val();
    var name = $("input[name='title']", form).val();
    var date = $("input[type='date']", form).val();
    var firm = document.querySelector(".firm_name");
    var firm_name = firm.innerHTML;
    firm_name = firm_name.replace(/&amp;/g, '&');
    
    
    if (date === ""){
        date = "2023-12-31"
    }
    

    var appinfo = {
        link: $("input[name='link']", form).val(),
        name: $("input[name='title']", form).val(),
        date: date,
        firm_name: firm_name,
        uq_id: uq_id
    };

    $.ajax({
        type: 'POST',
        url: '../banking/ajax/dashboard/add_app.php',
        data: appinfo,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            alert("Application link and date saved to Applications!")
            UpdateAppTable(data);
        }
    })
 
    .fail(function ajaxFailed(data) {
        console.log('fail');
    })
})