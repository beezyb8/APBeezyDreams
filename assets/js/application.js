const applinkform = document.querySelector(".applinks");
const applink_modal = document.querySelector(".applink_modal");
const closeapp = document.querySelector(".closeapp");
const app_cont= document.querySelector(".app_cont");

applink_modal.onclick = () => {
    app_cont.style.display = "block"
    applink_modal.style.display = "none"
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
    var noteid = form.attr("id");
    var link = $("input[type='text']", form).val();
    var date = $("input[type='date']", form).val();

    var appinfo = {
        link: $("input[type='text']", form).val(),
        date: $("input[type='date']", form).val(),
        notesid: noteid
    };

    $.ajax({
        type: 'POST',
        url: '../ajax/applications.php',
        data: appinfo,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        app_cont.style.display = "none";
        applink_modal.style.display = "block";
        alert("Application link and date saved to Applications!")
    })
 
    .fail(function ajaxFailed(data) {
        console.log('fail');
    })
})