const modalbtn = document.querySelector(".newcontact")
const closebtn = document.querySelector(".closemodal")
const contactmodal = document.querySelector(".contactmodal")
const body = document.querySelector(".outermostcont_change")
var editmodal = document.querySelector(".edit_contactmodal");
var exit_edit = document.querySelector(".edit-modal-closemodal")

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
.on("submit", "form.js-add-contact", function(event) {
    event.preventDefault();

    var $form = $(this);
    var $conacts = $(".network_div")

    const nocontacts = document.querySelector(".nocontacts");
    const nwork = document.querySelector(".nworktable");
    var bank = $("select[id='conbank']", $form).val();

    

    var contact = {
        contactname: $("input[id='conname']", $form).val(),
        contactemail: $("input[id='conemail']", $form).val(),
        contactnumber: $("input[id='conphonenumber']", $form).val(),
        contactconnection: $("input[id='conconnection']", $form).val(),
        bank: $("select[id='conbank']", $form).val()
    };
    contact.bank = contact.bank.replace(/&/g, '&amp;');
    
    console.log(contact)

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
            window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
        } else {
            $.ajax({
                type: 'POST',
                url: 'ajax/allcontacts/getcontacts.php',
                dataType: 'json',
                async: true,
            })
            .done(function ajaxDone(data) {
                UpdateFullTable(data)
                document.getElementById('conname').value=''
                document.getElementById('conemail').value=''
                document.getElementById('conphonenumber').value=''
                document.getElementById('conconnection').value=''
                $("#notetextarea").each(function () {
                    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                })
                const contactmodal = document.querySelector(".contactmodal")
                const body = document.querySelector(".outermostcont_change")
                contactmodal.style.top = "-1000px"
                body.style.opacity = "100%"
                contactmodal.style.opacity = "0%"
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
            })
            .fail(function ajaxFailed(data) {
                console.log('fail');
            })
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
})

$(document)
.on("submit", "form.edit_js-edit-contact", function(event) {
    event.preventDefault();

    var $form = $(this);
    var contactid = $(this).attr('id');


    var edit_contact = {
        contactid: contactid,
        contactname: $("input[id='edit-conname']", $form).val(),
        contactemail: $("input[id='edit-conemail']", $form).val(),
        contactnumber: $("input[id='edit-conphonenumber']", $form).val(),
        contactconnection: $("input[id='edit-conconnection']", $form).val(),
        contactnotes: $("textarea[id='edit-contactnotes']", $form).val(),
    };
    
    $.ajax({
        type: 'POST',
        url: 'ajax/allcontacts/updatecontact.php',
        data: edit_contact,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
         if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
        } else {
            $.ajax({
                type: 'POST',
                url: 'ajax/allcontacts/getcontacts.php',
                dataType: 'json',
                async: true,
            })
            .done(function ajaxDone(data) {
                UpdateFullTable(data)
                document.getElementById('conname').value=''
                document.getElementById('conemail').value=''
                document.getElementById('conphonenumber').value=''
                document.getElementById('conconnection').value=''
                $("#notetextarea").each(function () {
                    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                })
                const body = document.querySelector(".outermostcont_change")
                var editmodal = document.querySelector(".edit_contactmodal");
                editmodal.style.top = "-1000px"
                body.style.opacity = "100%"
                editmodal.style.opacity = "0%"
            })
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
        url: 'ajax/allcontacts/contact_view_modal.php',
        data: contactid,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
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
            const body = document.querySelector(".outermostcont_change")
            body.style.opacity = "40%"
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
});
