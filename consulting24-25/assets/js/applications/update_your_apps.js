function UpdateYourAppTiles(data){
    var firmidlistarray_apps = ['mckinsey','bostonconsultinggroup','deloitte','kpmg','baincompany','pwc','strategy','ey','eyp','fticonsulting','zs','boozallen','oliverwyman','clearviewhcp','accenture','westmonroe','lek','treacycompany','rolandberger','cornerstone']
    var tile_event_data = '';
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
        if(cleandate=='12/31/69'){
            cleandate='TBD'
        }else{}
        var firm_id_name = value.firm_name;
        var firm_id_name = firm_id_name.toLowerCase();
        var firm_id_name = firm_id_name.replaceAll(" ","");
        var firm_id_name = firm_id_name.replaceAll("&","");
        var firm_id_name = firm_id_name.replaceAll(".","");
        var firm_id_name = firm_id_name.replaceAll("#","");
        var firm_id_name = firm_id_name.replaceAll("/","");
        var firm_id_name = firm_id_name.replaceAll("@","");
        var firm_id_name = firm_id_name.replaceAll("$","");
        var firm_id_name = firm_id_name.replaceAll("?","");
        var firm_id_name = firm_id_name.replaceAll("*","");
        var firm_id_name = firm_id_name.replaceAll("^","");
        var firm_id_name = firm_id_name.replaceAll("]","");
        var firm_id_name = firm_id_name.replaceAll("[","");
        var firm_id_name = firm_id_name.replaceAll("(","");
        var firm_id_name = firm_id_name.replaceAll(")","");
        var firm_id_name = firm_id_name.replaceAll("+","");
        var firm_id_name = firm_id_name.replaceAll("=","");
        var firm_id_name = firm_id_name.replaceAll("{","");
        var firm_id_name = firm_id_name.replaceAll("}","");
        var firm_id_name = firm_id_name.replaceAll("|","");
        var firm_id_name = firm_id_name.replaceAll(";","");
        var firm_id_name = firm_id_name.replaceAll(":","");
        var firm_id_name = firm_id_name.replaceAll("'","");
        var firm_id_name = firm_id_name.replaceAll("!","");
        var firm_id_name = firm_id_name.replaceAll("~","");
        var firm_id_name = firm_id_name.replaceAll("`","");
        var firm_id_name = firm_id_name.replaceAll("%","");
        var firm_id_name = firm_id_name.replaceAll(",","");
        var firm_id_name = firm_id_name.replaceAll("<","");
        var firm_id_name = firm_id_name.replaceAll(">","");
        var firm_id_name = firm_id_name.replaceAll("_","");
        var firm_id_name = firm_id_name.replaceAll("-","");
        var firm_id_name = firm_id_name.replaceAll('"',"");
        
        if(!firmidlistarray_apps.includes(firm_id_name)){
            firm_id_name = "default_logo"
            tile_event_data += "<div class='tile_container saved_tile_container'><div class='tile_logo_checker_cont'><div class='tile_image_container'><img src = 'images/firmlogos/"+firm_id_name+".png'></div>"
            tile_event_data += "<div class='tile_pencil_check_container'><div class='tile_input_container'><input type='checkbox' class='your_app_check tile_app_checker' id='"+value.app_id+"'"+marchbaby+"></div><div class='tile_pencil_container'><div class='tooltip'><i class='bi bi-pencil-square edit-app-tool' id='"+value.app_id+"'></i><span class='tooltiptext'>Click to Edit</span></div></div></div></div>"
            tile_event_data += "<div class='tile_link_box' onclick=window.open('"+value.applink+"','_blank');><div class='tile_header'><h3 class='tile_firm_name'>"+value.firm_name+"</h3></div><div class='tile_body'><div class='tile_link_name'>"+value.app_name+"</div><div class='tile_location_date'><div class='tile_location'>"+value.applocation+"</div><div class='tile_date'>"+cleandate+"</div></div></div></div></div></div>"
        }else{
            tile_event_data += "<div class='tile_container saved_tile_container'><div class='tile_logo_checker_cont'><div class='tile_image_container'><img src = 'images/firmlogos/"+firm_id_name+".png'></div>"
            tile_event_data += "<div class='tile_pencil_check_container'><div class='tile_input_container'><input type='checkbox' class='your_app_check tile_app_checker' id='"+value.app_id+"'"+marchbaby+"></div><div class='tile_pencil_container'><div class='tooltip'><i class='bi bi-pencil-square edit-app-tool' id='"+value.app_id+"'></i><span class='tooltiptext'>Click to Edit</span></div></div></div></div>"
            tile_event_data += "<div class='tile_link_box' onclick=window.open('"+value.applink+"','_blank');><div class='tile_header'><h3 class='tile_firm_name'>"+value.firm_name+"</h3></div><div class='tile_body'><div class='tile_link_name'>"+value.app_name+"</div><div class='tile_location_date'><div class='tile_location'>"+value.applocation+"</div><div class='tile_date'>"+cleandate+"</div></div></div></div></div></div>"
        }
    })
    $(".saved_app_tile_holder").html(tile_event_data);
}