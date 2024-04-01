const modalbtn = document.querySelector(".newapp")
const closebtn = document.querySelector(".add-modal-closemodal")
const addmodal = document.querySelector(".add_appmodal")
const body = document.querySelector(".outermostcont_change")
var editmodal = document.querySelector(".edit_appmodal");
var exit_edit = document.querySelector(".edit-modal-closemodal")

modalbtn.onclick = () =>{
    addmodal.style.top = "20px"
    body.style.opacity = "40%"
    addmodal.style.opacity = "100%"
}

function Exit_Add_Modal(data){
    const body = document.querySelector(".outermostcont_change")
    var addmodal = document.querySelector(".add_appmodal");
    body.style.opacity = "100%"
    addmodal.style.opacity = "0%"
    setTimeout(function() {
        addmodal.style.top = "-1000px";
    }, 1000);
}

closebtn.onclick = () =>{
    Exit_Add_Modal();
}

// Within Add App... change logo given a change in the select. Testing this idea will run by Nate

// var selectElement = document.getElementById('appbank-selector');

// // Use mousedown to detect when an option is clicked
// selectElement.addEventListener('mousedown', function() {
//   console.log('Option clicked!');
// });

// // Use change to detect when the selected option changes
// selectElement.addEventListener('change', function() {
//   console.log('Selected option changed to: ' + selectElement.value);
// });

// Add App

$(document)
.on("submit", "form.add_js-add-app", function(event) {
    event.preventDefault();

    var $form = $(this);
    var selectElement = document.getElementById("appbank-selector");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedOptionId = selectedOption.id;
    var uq_id = selectedOptionId;


    var add_app = {
        uq_id: uq_id,
        firm_name: $("select[id='appbank-selector']", $form).val(),
        app_name: $("input[id='add-appname']", $form).val(),   
        applink: $("input[id='add-applink']", $form).val(),
        appdate: $("input[id='add-appdate']", $form).val(),
        applocation: $("input[id='add-applocation']", $form).val(),
    };
    
    $.ajax({
        type: 'POST',
        url: 'ajax/applications/addapp-modal.php',
        data: add_app,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            Exit_Add_Modal();
            UpdateYourAppTiles(data);
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
})


// EDIT BELOW

// The opening of the modal

function Exit_Edit_Modal(data){
    const body = document.querySelector(".outermostcont_change")
    var editmodal = document.querySelector(".edit_appmodal");
    body.style.opacity = "100%"
    editmodal.style.opacity = "0%"
    setTimeout(function() {
        editmodal.style.top = "-1000px";
    }, 1000);
}

exit_edit.onclick = () =>{
    Exit_Edit_Modal();
}


// Opening Edit Modal
$(document)
.on('click', ".edit-app-tool", function(event) {
    var app_id = ($(this).attr('id'));
    
     var app_id = {
        app_id: app_id
    };

    $.ajax({
        type: 'POST',
        url: 'ajax/applications/app_view_modal.php',
        data: app_id,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            // App_ID for use
            var App_Id = data.app.app_id;
            //  Set form ID attr so can be edited.
            var editmodalform = document.querySelector(".edit_js-edit-app");
            editmodalform.setAttribute("id", App_Id);
            // Set delete ID attr so can be deleted.
            var delete_application_btn = document.querySelector(".delete_application_btn");
            delete_application_btn.setAttribute('id', App_Id);
            // App_Id handled
            
            // Populate the edit box
            var editappfirmlogocont = document.querySelector(".edit_tile_image_container");
            var appfirmname = document.querySelector(".app_edit_tile_firm_name");
            var appname = document.querySelector(".edit_app-name-input");
            var applink = document.querySelector(".edit_app-link-input");
            var appdate = document.querySelector(".edit_app-date-input");
            var applocation = document.querySelector(".edit_app-location-input");
            editappfirmlogocont.innerHTML = '<img src="images/banklogos/'+data.app.firm_id_name+'.png">'
            appfirmname.innerHTML = data.app.firm_name;
            appname.value = data.app.app_name;
            appdate.value = data.app.appdate;
            applink.value = data.app.applink;
            applocation.value = data.app.applocation;
            // Populate the edit box
            
            // Modal work
            var editmodal = document.querySelector(".edit_appmodal");
            editmodal.style.top = "20px";
            editmodal.style.opacity = "100%";
            const body = document.querySelector(".outermostcont_change")
            body.style.opacity = "40%"
            // Modal work
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
});


$(document)
.on("submit", "form.edit_js-edit-app", function(event) {
    event.preventDefault();

    var $form = $(this);
    var app_id = $(this).attr('id');


    var edit_app = {
        app_id: app_id,
        app_name: $("input[id='edit-appname']", $form).val(),   
        applink: $("input[id='edit-applink']", $form).val(),
        appdate: $("input[id='edit-appdate']", $form).val(),
        applocation: $("input[id='edit-applocation']", $form).val(),
    };
    
    $.ajax({
        type: 'POST',
        url: 'ajax/applications/updateapp.php',
        data: edit_app,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            Exit_Edit_Modal();
            UpdateYourAppTiles(data);
        }
    })

    .fail(function ajaxFailed(data) {
        console.log('fail');
    })

    return false;
})


// Delete App below. Easy and done, shouldn't need any further changes. Maybe stop the refresh, but it doens't bother me.

$(document)
.on("click", ".delete_application_btn", function(event) {
    event.preventDefault();

    var app_id = $(this).attr('id');
    var sure = confirm("Deleting this application will be permanent. All data associated with this application will be lost. Are you sure you want to do that?");
    if(sure == true) {
        var appid = {
            app_id: app_id
        };
        
        $.ajax({
            type: 'POST',
            url: 'ajax/applications/deleteapp.php',
            data: appid,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            // Reload the current page
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg.php"
            } else {
                Exit_Edit_Modal();
                UpdateYourAppTiles(data);
            }

        })

        .fail(function ajaxFailed(data) {
            console.log('fail');
        })
    }else{
        console.log(app_id)
    }

    return false;
})

// End of Delte!