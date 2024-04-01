$(document)
.on('click', ".switch", function(event) {

    var $bank = document.querySelector("#bankname");
    var $bank = ($bank.innerHTML).toString();
    var bankname = {
        bank: $bank
    };
    console.log($bank);

    $.ajax({
        type: 'POST',
        url: '../ajax/banknotesswitch.php',
        data: bankname,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        var banknotehtml = "<textarea class='banknotes' id='"+data.notes.notesid+"'>"+data.notes.notestxt+"</textarea><button type='submit' id = 'banknotesbutton' class='"+data.notes.notesid+"'>Confirm Changes</button>";
        $(".banknotescont").html(banknotehtml);
        var appform = document.querySelector(".applinks");
        appform.setAttribute("id",data.notes.notesid);
        
        $("textarea").each(function () {
            this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
        }).on("input", function () {
            this.style.height = 0;
            this.style.height = (this.scrollHeight) + "px";
        });
    })

    .fail(function ajaxFailed() {
    })
})

$(document)
.on("focusin","textarea.banknotes", function(event){
    $("textarea").each(function () {
       this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
    }).on("input", function () {
        this.style.height = 0;
        this.style.height = (this.scrollHeight) + "px";
    });
    
    var thistextbox = $(this);
    var noteid = thistextbox.attr("id");
    var confirmbutton = document.querySelector("#banknotesbutton");
    confirmbutton.style.display = "block";
confirmbutton.onclick = () => {
    var upnotes = thistextbox.val();
    console.log(upnotes)

    var update = {
        notesid: noteid,
        newnotes: upnotes
    }
    $.ajax({
        type: 'POST',
        url: '../ajax/banknotesup.php',
        data: update,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        confirmbutton.style.display = "none";
        $("textarea").each(function () {
            this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
        }).on("input", function () {
            this.style.height = 0;
            this.style.height = (this.scrollHeight) + "px";
        });
    })
    .fail(function ajaxFailed(data) {
        console.log('fail');
    })
    }
})
