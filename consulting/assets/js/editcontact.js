function displayedits(displaystyle, contact_edit_buttons){
    contact_edit_buttons.forEach(element => {
        element.style.display = displaystyle;
    });

}

function changebtntoEdit(){        
    var editcontbtn = document.querySelector("#editbtnid");
    editcontbtn.classList.add('editcontbtn');
    editcontbtn.classList.remove('exiteditmode');
    var contact_edit_buttons = document.querySelectorAll(".editct")

    displayedits("none", contact_edit_buttons)
    editcontbtn.innerHTML = "Edit"
}

function changebtntoEXIT(){
    var editcontbtn = document.querySelector("#editbtnid");
    editcontbtn.classList.add('exiteditmode');
    editcontbtn.classList.remove('editcontbtn');
    var contact_edit_buttons = document.querySelectorAll(".editct")

    displayedits("inline-block", contact_edit_buttons)
    editcontbtn.innerHTML = "EXIT"
}

$(document)
.on("click",".editcontbtn", function(event){
    changebtntoEXIT()
})

// Style the two classes to have different CSS properties

$(document)
.on("click",".exiteditmode", function(event){
    changebtntoEdit()
    // Maybe Hide these buttons in here!
    
})


$(document)
.on("click",".editct", function(event){
    var contactid = $(this).attr("id")
    var ctcttile = document.querySelector("#ctcttile"+contactid)
    contactname = ctcttile.getAttribute("value")
    var torevert = ctcttile.innerHTML
    
    ctcttile.innerHTML = "<input class='contact-edit-"+contactid+"' type='text' value = '"+contactname+"'><br><button type=submit class='submitctchanges bi bi-check2-square' id='editctnamebtn' value='"+contactid+"'> Confirm</button><button class='deletect bi bi-database-x' id='deletectnamebtn' value='"+contactid+"'> Delete</button>"
    // ctcttile.innerHTML = TBD!!!!;

})

$(document)
.on("click",".submitctchanges", function(event){
    var contactid = $(this).attr("value")
    var newcontactname = document.querySelector(".contact-edit-"+contactid).value;
    var $bank = document.querySelector("#firm_name");
    var $bank = $bank.innerHTML;

    const nocontacts = document.querySelector(".nocontacts");
    const nwork = document.querySelector(".nworktable");

    var update = {
        contactname: newcontactname,
        contactid: contactid,
        bank: $bank
    };

    $.ajax({
        type: 'POST',
        url: '../consulting/ajax/updatect.php',
        data: update,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
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
    
            $(".table_body").html(event_data);
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
    
            nwork.style.display = "table";
            nocontacts.style.display = "none";
            changebtntoEdit();
            $("#notetextarea").each(function () {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
            })
        }
    })

})

$(document)
.on("click",".deletect", function(event){
    var contactid = $(this).attr('value');
    var sure = confirm("Deleting this contact will be permanent. All data associated with this contact will be lost. Are you sure you want to do that?");
        if(sure == true) {
            var $bank = document.querySelector("#firm_name");
            var $bank = $bank.innerHTML;
            console.log(contactid)

            const nocontacts = document.querySelector(".nocontacts");
            const nwork = document.querySelector(".nworktable");


            var update = {
                contactid: contactid,
                bank: $bank
            };

            $.ajax({
                type: 'POST',
                url: '../consulting/ajax/deletect.php',
                data: update,
                dataType: 'json',
                async: true,
            })
        
            .done(function ajaxDone(data) {
                if (typeof data.loco !== "undefined") {
                    alert('You are not logged in');
                    window.location.href = "https://mylegup.co/login_reg.php"
                } else {
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
                        event_data += "<td class='notes'><textarea id='notetextarea' placeholder='Click here to enter notes...' class='"+txmarker+"'>"+value.notes+"</textarea><br><button type='submit' id='textchangebtn' class='" +btnmarker+"' btn_guo>Confirm</button></td>";
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
    
                    $(".table_body").html(event_data);
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
    
                    nwork.style.display = "table";
                    nocontacts.style.display = "none";
                    changebtntoEdit();
                    $("#notetextarea").each(function () {
                    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                    })
                }
            })
            .fail(function ajaxFailed(data) {
                 //fail
                console.log('fail');
            
            })
        }
    })