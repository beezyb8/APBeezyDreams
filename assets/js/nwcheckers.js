$(document)
.on("click","input#cold", function(event){
    let contactid = $(this).attr('class');
    let isChecked = $(this)[0].checked;
    let thisrow = $("tr."+contactid);
    
    if (isChecked == true){
        var coldcheck = 1;
    } else {
        var coldcheck = 0;
    }
    console.log(coldcheck)
    console.log(contactid)

    var needed = {
        coldcheck: coldcheck,
        contactid: contactid,
    };
    //Begin AJAX process

    $.ajax({
        type: 'POST',
        url: '../ajax/coldcheck.php',
        data: needed,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
            // Change color based on checks
            let marker = "cd"+String(data.thiscontact.contact_id);
            let thisrow = document.querySelector("."+marker);
            if(data.thiscontact.coldemail == 1){
                thisrow.classList.add("colddone")
            } else{
                thisrow.classList.remove("colddone")
            }
        })
        console.log("done")
    })

$(document)
.on("click","input#callsched", function(event){
    let contactid = $(this).attr('class');
    let isChecked = $(this)[0].checked;
    let thisrow = $("tr."+contactid);
    
    if (isChecked == true){
        var callschedcheck = 1;
    } else {
        var callschedcheck = 0;
    }
    console.log(callschedcheck)
    console.log(contactid)

    var needed = {
        callschedcheck: callschedcheck,
        contactid: contactid,
    };
    //Begin AJAX process

    $.ajax({
        type: 'POST',
        url: '../ajax/callsched.php',
        data: needed,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
            // Change color based on checks
            let marker = "cd"+data.thiscontact.contact_id.toString();
            let thisrow = document.querySelector("."+marker);
            if(data.thiscontact.callsched == 1){
                thisrow.classList.add("callscheddone")
            } else{
                thisrow.classList.remove("callscheddone")
            }
        })
        console.log("done")
    })

$(document)
.on("click","input#call", function(event){
    let contactid = $(this).attr('class');
    let isChecked = $(this)[0].checked;
    let thisrow = $("tr."+contactid);
    
    if (isChecked == true){
        var callhadcheck = 1;
    } else {
        var callhadcheck = 0;
    }
    console.log(callhadcheck)
    console.log(contactid)

    var needed = {
        callhadcheck: callhadcheck,
        contactid: contactid,
    };
    //Begin AJAX process

    $.ajax({
        type: 'POST',
        url: '../ajax/callhad.php',
        data: needed,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
            // Change color based on checks
            let marker = "cd"+data.thiscontact.contact_id.toString();
            let thisrow = document.querySelector("."+marker);
            if(data.thiscontact.callhad == 1){
                thisrow.classList.add("callhaddone")
            } else{
                thisrow.classList.remove("callhaddone")
            }
        })
        console.log("done")
    })

$(document)
.on("click","input#thankyou", function(event){
    let contactid = $(this).attr('class');
    let isChecked = $(this)[0].checked;
    let thisrow = $("tr."+contactid);
    
    if (isChecked == true){
        var thankyoucheck = 1;
    } else {
        var thankyoucheck = 0;
    }
    console.log(thankyoucheck)
    console.log(contactid)

    var needed = {
        thankyoucheck: thankyoucheck,
        contactid: contactid,
    };
    //Begin AJAX process

    $.ajax({
        type: 'POST',
        url: '../ajax/thankyou.php',
        data: needed,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
            // Change color based on checks
            let marker = "cd"+data.thiscontact.contact_id.toString();
            let thisrow = document.querySelector("."+marker);
            if(data.thiscontact.thankyou == 1){
                thisrow.classList.add("thankyoudone")
            } else{
                thisrow.classList.remove("thankyoudone")
            }
        })
        console.log("done")
    })
// $(document)
// .on("click","input#callsched", function(event){
//     let contactid = $(this).attr('class');
//     let isChecked = $(this)[0].checked;
    
//     if (isChecked == true){
//         var coldcheck = 1;
//     } else {
//         var coldcheck = 0;
//     }
//     console.log(coldcheck)
//     console.log(contactid)

//     var bank = document.querySelector("#bankname");
//     var bank = bank.innerHTML;


//     var needed = {
//         coldcheck: coldcheck,
//         contactid: contactid,
//         bank: bank
//     };
//     //Begin AJAX process

//     $.ajax({
//         type: 'POST',
//         url: '../finalmlu/ajax/checks/callsched.php',
//         data: needed,
//         dataType: 'json',
//         async: true,
//     })

//     .done(function ajaxDone(data) {
//         $.each(data.contacts, function(index, value){
//             // Change color based on checks
//             let marker = "cd"+value.contact_id.toString();
//             let thisrow = document.querySelector("."+marker);
//             if(value.callsched == 1){
//                 thisrow.classList.add("callschedone")
//             } else{
//                 thisrow.classList.remove("callscheddone")
//             }
//         })
//         console.log("done")
//     })

//     .fail(function ajaxFailed(data){
//         //fail
//         console.log("fail");

//     })

//     .always(function ajaxAlwaysDoThis(data){
//         //always run
//         console.log('always')

//     })
// })


// if(value.callhad == 1){
//     thisrow.classList.add("callhaddone")
// } else{
//     thisrow.classList.remove("callhaddone")
// }
// if(value.thankyou == 1){
//     thisrow.classList.add("thankyoudone")
// } else{
//     thisrow.classList.remove("thankyoudone")
// }



// $(document).ready(function(){
//     $("input.coldemail").change(function() { 
//         if($(this).is(":checked")) { 
//             var $contactid = $inputitem.getAttribute('value');
//             var $contactid = parseInt($contactid);
//             var $thisrow = document.getElementById("."+$contactid);
//             var $coldchecker = 1

//             var needed = {
//                 contactid: $contactid,
//                 thisrow: $thisrow,
//                 coldchecker: $coldchecker,
//             }

//             $.ajax({
//                 type: 'POST',
//                 url: '../finalmlu/ajax/check.php',
//                 data: needed,
//                 dataType: 'json',
//                 async: true,
//             })

//             .done(function ajaxDone(data) {
//                 $thisrow.style.backgroundColor = "green";
//                 console.log("done")
//             })
        
//             .fail(function ajaxFailed(data){
//                 //fail
//                 console.log("fail");
        
//             })
        
//             .always(function ajaxAlwaysDoThis(data){
//                 //always run
//                 console.log('always');
//             })
//         } else {
//             $.ajax({
//                 type: 'POST',
//                 url: '../finalmlu/ajax/uncheck.php',
//                 data: needed,
//                 dataType: 'json',
//                 async: true,
//             });
//         }
//     }); 
// });



// Send to server information about changes in check marks!!!!!