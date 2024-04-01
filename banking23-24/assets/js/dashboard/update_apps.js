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

function UpdateAppTiles(data){
    var firmidlistarray_apps = ['allenco','bankofamerica','barclays','baird','bmo','centerview','citigroup','deutschebank','ducerapartners','evercore','financo','ftpartners','goldmansachs','gordandyal','greenhill','guggenheim','houlihanlokey','jefferies','jpmorgan','lazard','lincoln','liontree','macquarie','mizuho','mkleinco','moelis','morganstanley','perellaweinberg','pjt','pipersandler','raine','rbc','stifel','stout','solomonpartners','tdcowen','ubs','wellsfargo','williamblair']
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
            tile_event_data += "<div class='tile_container' onclick=window.open('"+value.applink+"','_blank');><div class='tile_header'><h3 class='tile_firm_name'>"+value.firm_name+"</h3><input type='checkbox' class='your_app_check tile_app_checker' id='"+value.app_id+"'"+marchbaby+"></div><div class='tile_body'><div class='tile_link_name'>"+value.app_name+"</a></div><div class='tile_date'>"
            tile_event_data += cleandate+"</div></div></div>"
        }else{
            tile_event_data += "<div class='tile_container'><div class='tile_logo_checker_cont'><div class='tile_image_container'><img src = 'images/banklogos/"+firm_id_name+".png'></div><div class='tile_input_container'><input type='checkbox' class='your_app_check tile_app_checker' id='"+value.app_id+"'"+marchbaby+"></div></div><div class='tile_link_box' onclick=window.open('"+value.applink+"','_blank');><div class='tile_header'><h3 class='tile_firm_name'>"+value.firm_name+"</h3></div><div class='tile_body'><div class='tile_link_name'>"+value.app_name+"</div><div class='tile_location_date'><div class='tile_location'>"+value.applocation+"</div><div class='tile_date'>"
            tile_event_data += cleandate+"</div></div></div></div></div>"
        }
    })
    $(".app_tile_holder").html(tile_event_data);
}