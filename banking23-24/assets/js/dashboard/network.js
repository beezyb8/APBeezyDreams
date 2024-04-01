const modalbtn = document.querySelector(".newcontact")
const closebtn = document.querySelector(".closemodal")
const contactmodal = document.querySelector(".contactmodal")
const body = document.querySelector(".body_div_body")
var editmodal = document.querySelector(".edit_contactmodal");
var exit_edit = document.querySelector(".edit-modal-closemodal")
var switchbanks = document.querySelectorAll(".switch")


modalbtn.onclick = () =>{
    contactmodal.style.top = "20px"
    body.style.opacity = "40%"
    contactmodal.style.opacity = "100%"
}
closebtn.onclick = () =>{
    contactmodal.style.top = "-1000px"
    body.style.opacity = "100%"
    contactmodal.style.opacity = "0%"
}

exit_edit.onclick = () =>{
    editmodal.style.top = "-1000px"
    body.style.opacity = "100%"
    editmodal.style.opacity = "0%"
}

$(document)
.on("submit", "form.edit_js-edit-contact", function(event) {
    event.preventDefault();

    var $form = $(this);
    var contactid = $(this).attr('id');
    var $conacts = $(".network_div")
    var $bank = document.querySelector("#firm_name");
    var $bank = $bank.innerHTML;

    const nocontacts = document.querySelector(".nocontacts");
    const nwork = document.querySelector(".nworktable");

    var edit_contact = {
        contactid: contactid,
        contactname: $("input[id='edit-conname']", $form).val(),
        contactemail: $("input[id='edit-conemail']", $form).val(),
        contactnumber: $("input[id='edit-conphonenumber']", $form).val(),
        contactconnection: $("input[id='edit-conconnection']", $form).val(),
        contactnotes: $("textarea[id='edit-contactnotes']", $form).val(),
        bank: $bank
    };
    
    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/updatecontact.php',
        data: edit_contact,
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
            document.getElementById('conemail').value=''
            document.getElementById('conphonenumber').value=''
            document.getElementById('conconnection').value=''
            $("#notetextarea").each(function () {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
            })
            const body = document.querySelector(".body_div_body")
            var editmodal = document.querySelector(".edit_contactmodal");
            editmodal.style.top = "-1000px"
            body.style.opacity = "100%"
            editmodal.style.opacity = "0%"
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
})




$(document)
.on('click', ".contacttitle", function(event) {
    var contactid = ($(this).attr('id'));
    
     var contactid = {
        contactid: contactid
    };

    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/contact_view_modal.php',
        data: contactid,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            // Fill edit contact modal and show
            var contactname = document.querySelector(".edit_contact-name-input");
            var contactemail = document.querySelector(".edit_email-bin");
            var contactnumber = document.querySelector(".edit_phone-number-bin");
            var contactconnection = document.querySelector(".edit_connection-bin");
            var contactnotes = document.querySelector(".edit_notes");
            contactname.value = data.contact.contact_name;
            contactemail.value = data.contact.contact_email;
            contactnumber.value = data.contact.contact_number;
            contactconnection.value = data.contact.contact_connection;
            contactnotes.value = data.contact.notes;
            var editmodal = document.querySelector(".edit_contactmodal");
            var editmodalform = document.querySelector(".edit_js-edit-contact");
            var contactId = data.contact.contact_id; // Assuming data.contact.contactid contains the desired ID
            editmodalform.setAttribute("id", contactId);
            editmodal.style.top = "20px";
            editmodal.style.opacity = "100%";
            const body = document.querySelector(".body_div_body")
            body.style.opacity = "40%"
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
});

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
            event_data += "<td class='contacttitle' id='"+value.contact_id+"' value='"+value.contact_name+"'><div class='tooltip'>"+value.contact_name+"<span class='tooltiptext'>Click to Edit</span></div></td>";
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
        url: 'ajax/nw.php',
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
            document.getElementById('conemail').value=''
            document.getElementById('conphonenumber').value=''
            document.getElementById('conconnection').value=''
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
        contactemail: $("input[id='conemail']", $form).val(),
        contactnumber: $("input[id='conphonenumber']", $form).val(),
        contactconnection: $("input[id='conconnection']", $form).val(),
        bank: $bank
    };

    $.ajax({
        type: 'POST',
        url: 'ajax/addcontact.php',
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
            document.getElementById('conemail').value=''
            document.getElementById('conphonenumber').value=''
            document.getElementById('conconnection').value=''
            $("#notetextarea").each(function () {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
            })
            const contactmodal = document.querySelector(".contactmodal")
            const body = document.querySelector(".body_div_body")
            contactmodal.style.top = "-1000px"
            body.style.opacity = "100%"
            contactmodal.style.opacity = "0%"
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
})
