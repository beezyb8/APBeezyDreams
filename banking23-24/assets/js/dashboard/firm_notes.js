$(document)
.on('click', ".switch", function(event) {

    var firmswitch = $(this);
    var uq_id = firmswitch.attr('uq_id');
    var notes_key = {
        uq_id: uq_id
    };


    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/main_noteswitch.php',
        data: notes_key,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            var banknotehtml = "<textarea class='banknotes' placeholder='Click here to enter notes...' id='"+data.notes.uq_id+"'>"+data.notes.notestxt+"</textarea><button type='submit' id = 'banknotesbutton' class='"+data.notes.uq_id+" btn_guo'>Confirm Changes</button>";
            $(".banknotescont").html(banknotehtml);
            var appform = document.querySelector(".applinks");
            appform.setAttribute("id",data.notes.uq_id);
            UpdateAppTiles(data)
            UpdateAppTable(data)
            
            $(".banknotes").each(function () {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
            })
        }
    })

    .fail(function ajaxFailed() {
    })
})

$(document)
.on("focusin","textarea.banknotes", function(event){
    $(".banknotes").on("keydown", function (event) {
      if (event.keyCode === 13) { // Check if Enter key is pressed
        this.style.height = 0;
        this.style.height = (this.scrollHeight) + "px";
      }
    });
    
    var thistextbox = $(this);
    var uq_id = thistextbox.attr("id");
    var confirmbutton = document.querySelector("#banknotesbutton");
    confirmbutton.style.display = "block";
confirmbutton.onclick = () => {
    var upnotes = thistextbox.val();

    var update = {
        uq_id: uq_id,
        newnotes: upnotes
    }
    
    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/main_notesup.php',
        data: update,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert("You are not logged in. Don't worry, your notes saved anyways.");
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            confirmbutton.style.display = "none";
        }
    })
    .fail(function ajaxFailed(data) {
        console.log('fail');
    })
    }
})

            // $(".banknotes").each(function () {
            //     this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
            // }).on("input", function () {
            //     this.style.height = 0;
            //     this.style.height = (this.scrollHeight) + "px";
            // });
