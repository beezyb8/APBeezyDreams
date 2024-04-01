const modalbtn = document.querySelector(".newcontact")
const closebtn = document.querySelector(".closemodal")
const contactwindow = document.querySelector(".contactmodal")
var switchbanks = document.querySelectorAll(".switch") 

modalbtn.onclick = () =>{
    contactwindow.style.display = "inline-block"
}
closebtn.onclick = () =>{
    contactwindow.style.display = "none"
}

function UpdateNW(data){
        const nocontacts = document.querySelector(".nocontacts");
        const nwork = document.querySelector(".nworktable");
        var event_data = '';
        $.each(data.contacts, function(index, value){
            if(value.coldemail == 1){
                coldchecker = 'checked'
            } else {
                coldchecker = ''
            }
            if(value.callsched == 1){
                callsched = 'checked'
            } else {
                callsched = ''
            }
            if(value.callhad == 1){
                callchecker = 'checked'
            }  else {
                callchecker = ''
            }
            if(value.thankyou == 1){
                thankyouchecker = 'checked'
            }  else {
                thankyouchecker = ''
            }
            /*console.log(value);*/
            var marker = "cd"+value.contact_id.toString();
            var txmarker = value.contact_id.toString();
            var btnmarker = "bt"+value.contact_id.toString();
            event_data += "<tr class='"+marker+"'>";
            event_data += "<td class='contacttitle' id='ctcttile"+txmarker+"'value='"+value.contact_name+"'>"+value.contact_name+"<br><button class='editct bi bi-pencil-square' id='"+txmarker+"'></button></td>";
            event_data += "<td class='notes'><textarea id='notetextarea' placeholder='Click here to enter notes...' class='"+txmarker+"'>"+value.notes+"</textarea><br><button type='submit' id='textchangebtn' class='" +btnmarker+" btn_guo'>Confirm</button></td>";
            event_data += "<td class='coldemail'>"+
            "<form class='coldcheck_checks "+value.contact_id+"'>"+
            "<input type='checkbox' id='cold' name='cold' class = '"+value.contact_id+"'" + coldchecker + ">"
            +"</form></td>"
            event_data += "<td class='callsched'>"+
            "<form class='callsched_checks "+value.contact_id+"'>"+
            "<input type='checkbox' id='callsched' name='callsched' class = '"+value.contact_id+"'" + callsched + ">"
            +"</form></td>";
            event_data += "<td class='call'>"+
            "<form class='callhad_checks "+value.contact_id+"'>"+
            "<input type='checkbox' id='call' name='call' class = '"+value.contact_id+"'" +callchecker + ">"
            +"</form></td>";
            event_data += "<td class='thankyou'>"+
            "<form class='ty_checks "+value.contact_id+"'>"+
            "<input type='checkbox' id='thankyou' name='thankyou' class = '"+value.contact_id+"'" + thankyouchecker + ">"
            +"</form></td>";
            event_data += '</tr>';
        
        });
        if(event_data.length > 0){
            $(".table_body").html(event_data);
            nocontacts.style.display = "none";
            nwork.style.display = "inline-block";
        } else {
            nocontacts.style.display = "inline-block";
            nwork.style.display = "none";
            $(".table_body").html(event_data);
        }

        $.each(data.contacts, function(index, value){
            // Change color based on checks
            let marker = "cd"+value.contact_id.toString();
            let thisrow = document.querySelector("."+marker);
            if(value.coldemail == 1){
                thisrow.classList.add("colddone")
            } else{
                thisrow.classList.remove("colddone")
            }
            if(value.callsched == 1){
                thisrow.classList.add("callscheddone")
            } else{
                thisrow.classList.remove("callscheddone")
            }
            if(value.callhad == 1){
                thisrow.classList.add("callhaddone")
            } else{
                thisrow.classList.remove("callhaddone")
            }
            if(value.thankyou == 1){
                thisrow.classList.add("thankyoudone")
            } else{
                thisrow.classList.remove("thankyoudone")
            }
        })
    
}

$(document)
.on('click', ".switch", function(event) {

    const nocontacts = document.querySelector(".nocontacts");
    const nwork = document.querySelector(".nworktable");
    var $bank = document.querySelector("#firm_name");
    var $bank = $bank.innerHTML;
    
    var bankname = {
        bank: $bank
    };

    $.ajax({
        type: 'POST',
        url: '../banking/ajax/nw.php',
        data: bankname,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            UpdateNW(data);
            document.getElementById('conname').value=''
            $("#notetextarea").each(function () {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
            })
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
})


$(document)
.on("submit", "form.js-add-contact", function(event) {
    event.preventDefault();

    var $form = $(this);
    var $conacts = $(".network_div")
    var $bank = document.querySelector("#firm_name");
    var $bank = $bank.innerHTML;

    const nocontacts = document.querySelector(".nocontacts");
    const nwork = document.querySelector(".nworktable");

    var contact = {
        contactname: $("input[id='conname']", $form).val(),
        bank: $bank
    };

    $.ajax({
        type: 'POST',
        url: '../banking/ajax/addcontact.php',
        data: contact,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
         if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            UpdateNW(data);
            document.getElementById('conname').value=''
            $("#notetextarea").each(function () {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
            })
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
})
