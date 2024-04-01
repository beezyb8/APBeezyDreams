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
    })

    .fail(function ajaxFailed() {
    })
})

$(document)
.on("focusin","textarea.banknotes", function(event){
    var thistextbox = $(this);
    $(this).css("height", "150px");
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
        thistextbox.css("height", "50px");
        console.log("yo")
        })
    .fail(function ajaxFailed(data) {
        console.log('fail');
    })
    }
})



// Get id from text area thats primary key, modify sql. Pretty easy!!!

// thisbutton.onclick = () =>{
//     var $newnotes = thistextbox.val();
//     var updatenotes = {
//         contactid: $contactid,
//         newnotes: $newnotes
//     };
//     $.ajax({
//         type: 'POST',
//         url: '../finalmlu/ajax/banknotesup.php',
//         data: updatenotes,
//         dataType: 'json',
//         async: true,
//     })

//     .done(function ajaxDone(data) {
//         thisbutton.style.display = "none";
//         alert("changes confirmed")
//         thistextbox.css("height", "50px");
//         })
//     .fail(function ajaxFailed(data) {
//         console.log('fail');
//     })
//     }
