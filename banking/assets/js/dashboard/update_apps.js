function UpdateAppTable(data){
    var event_data = '';
    $.each(data.apps, function(index, value){
        if(value.applied == 1){
            marchbaby = 'checked'
        } else {
            marchbaby = ''
        }
        var dd = value.appdate.slice(8,10)
        var mm = value.appdate.slice(5,7)
        var yy = value.appdate.slice(2,4)
        var cleandate = mm+'/'+dd+'/'+yy
        
        event_data += "<tr><td>"+value.firm_name+"</td><td><a href='"+value.applink+"'target='blank'>"+value.app_name+"</a></td><td>"
        event_data += cleandate+"</td><td><input type='checkbox' class='your_app_check' id='"+value.app_id+"'"+marchbaby+"></td></tr>"
    })
    $(".app_table_fillit").html(event_data);
}