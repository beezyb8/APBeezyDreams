$(document)
.on("click","#star", function(event){
    let uq_id = $(this).attr('value');
    console.log(uq_id)
    
    var star = {
        uq_id: uq_id
    };

    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/star.php',
        data: star,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            console.log(uq_id)
            
            document.querySelectorAll('tr[id]').forEach(function (trElement) {
                if (trElement.getAttribute('id') == uq_id){
                    if(trElement.getAttribute('favTag') == "favorite"){
                        trElement.style.display = "table-row"
                    }else if(trElement.getAttribute('favTag') == "normal"){
                        trElement.style.display = "none"
                    }
                }else{
                    
                }
            });
            
            
        }
    })
})

$(document)
.on("click","#unstar", function(event){
    let uq_id = $(this).attr('value');
    console.log(uq_id)
    
    var star = {
        uq_id: uq_id
    };

    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/unstar.php',
        data: star,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            document.querySelectorAll('tr[id]').forEach(function (trElement) {
                if (trElement.getAttribute('id') == uq_id){
                    if(trElement.getAttribute('favTag') == "favorite"){
                        trElement.style.display = "none"
                    }else if(trElement.getAttribute('favTag') == "normal"){
                        trElement.style.display = "table-row"
                    }
                }else{
                    
                }
            });
        }
    })
})