$(document)
.on("focusin","textarea#notetextarea", function(event){
    var thistextbox = $(this);
    $(this).css("height", "80px");
    var btnidentify = $(this).attr('class');
    var $contactid = btnidentify;
    var btnidentify = "bt"+btnidentify.toString();
    var thisbutton = document.querySelector("."+btnidentify);
    thisbutton.style.display = "inline-block";
thisbutton.onclick = () =>{
    var $newnotes = thistextbox.val();

    var updatenotes = {
        contactid: $contactid,
        newnotes: $newnotes
    };
    $.ajax({
        type: 'POST',
        url: '../ajax/notesup.php',
        data: updatenotes,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        thisbutton.style.display = "none";
        thistextbox.css("height", "50px");
        })
    .fail(function ajaxFailed(data) {
        console.log('fail');
    })
    }
})