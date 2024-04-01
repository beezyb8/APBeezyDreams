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
    console.log(ctcttile)
    contactname = ctcttile.getAttribute("value")
    var torevert = ctcttile.innerHTML
    console.log(torevert)
    
    // FIX BELOW HERE
    ctcttile.innerHTML = "<input class='contact-edit-"+contactid+"' type='text' value = '"+contactname+"'><br><button type=submit class='submitctchanges bi bi-check2-square' id='editctnamebtn' value='"+contactid+"'> Confirm</button><button class='deletect bi bi-database-x' id='deletectnamebtn' value='"+contactid+"'> Delete</button>"
    // ctcttile.innerHTML = TBD!!!!;

})

$(document)
.on("click",".submitctchanges", function(event){
    var contactid = $(this).attr("value")
    var newcontactname = document.querySelector(".contact-edit-"+contactid).value;
    var $bank = document.querySelector("#bankname");
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
        url: '../ajax/updatect.php',
        data: update,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        ct_tile_id = "#ctcttile" + contactid
        ct_tile = document.querySelector(ct_tile_id)
        ct_tile.innerHTML = newcontactname + "<br><button class='editct bi bi-pencil-square' id='" + contactid + "'></button>"


        nwork.style.display = "table";
        changebtntoEdit();
    })

})

$(document)
.on("click",".deletect", function(event){
    var contactid = $(this).attr('value');
    var sure = confirm("Deleting this contact will be permanent. All data associated with this contact will be lost. Are you sure you want to do that?");
        if(sure == true) {
            var $bank = document.querySelector("#bankname");
            var $bank = $bank.innerHTML;

            const nocontacts = document.querySelector(".nocontacts");
            const nwork = document.querySelector(".nworktable");


            var update = {
                contactid: contactid,
                bank: $bank
            };

            $.ajax({
                type: 'POST',
                url: '../ajax/deletect.php',
                data: update,
                dataType: 'json',
                async: true,
            })
        
            .done(function ajaxDone(data) {
                var cat = ".cd"+contactid
                var thisrow = document.querySelector(cat);
                thisrow.style.display = "none";
                
                

                nwork.style.display = "table";
                changebtntoEdit();
            })
            .fail(function ajaxFailed(data) {
                 //fail
                console.log('fail');
            
            })
        }else{}
    })