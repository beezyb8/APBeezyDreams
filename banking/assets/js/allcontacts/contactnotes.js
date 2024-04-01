$(document)
.on("focusin","textarea#notetextarea", function(event){
    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
    
    $("#notetextarea").on("keydown", function (event) {
    if (event.keyCode === 13) { // Check if Enter key is pressed
        this.style.height = 0;
        this.style.height = (this.scrollHeight) + "px";
    }
    });
    
    var thistextbox = $(this);
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
        url: '../banking/ajax/notesup.php',
        data: updatenotes,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert("You are not logged in. Your notes were saved anyways, don't worry.");
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            thisbutton.style.display = "none";
        }
    })
    .fail(function ajaxFailed(data) {
        console.log('fail');
    })
    }
})