function UpdateFullTable(data){
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

        var dd = value.date_added.slice(8,10)
        var mm = value.date_added.slice(5,7)
        var yy = value.date_added.slice(2,4)
        var cleandate = mm+'/'+dd+'/'+yy
        
        var marker = "cd"+value.contact_id.toString();
        var txmarker = value.contact_id.toString();
        var btnmarker = "bt"+value.contact_id.toString();
        event_data += "<tr class='"+marker+"'>";
        event_data += "<td class='contacttitle' id='ctcttile"+txmarker+"'value='"+value.contact_name+"'>"+value.contact_name+"<br><button class='editct bi bi-pencil-square' id='"+txmarker+"'></button></td>";
        event_data += "<td class='date_td'>"+cleandate+"</td>";
        event_data += "<td class='bank_td' id='bankname'>"+value.bank+"</td>"
        event_data += "<td class='notes'><textarea id='notetextarea' placeholder='Click here to enter notes...' class='"+txmarker+"'>"+value.notes+"</textarea><br><button type='submit' id='textchangebtn' class='" +btnmarker+"'>confirm</button></td>";
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
}