UpdateTDL()

$(document)
.on('click', ".deletetdlitem", function(event) {

    var todo_id = $(this).attr('id');
    var sure = confirm("Deleting this item will be permanent. Are you sure you want to do that?");
    if(sure === true){
        var data_holder = {
            todo_id: todo_id
        };
        
        $.ajax({
            type: 'POST',
            url: 'ajax/dashboard/todo/delete_item.php',
            data: data_holder,
            dataType: 'json',
            async: true,
        })
    
        .done(function ajaxDone(data) {
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg.php"
            } else {
                UpdateTDL()
            }
        })
    
        .fail(function ajaxFailed() {
        })   
    }else{
        
    }
})

$(document)
.on('click', ".checkofftdl", function(event) {

    var todo_id = $(this).attr('id');
    
    var data_holder = {
        todo_id: todo_id
    };
    
    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/todo/check_item.php',
        data: data_holder,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            UpdateTDL()
        }
    })

    .fail(function ajaxFailed() {
    })
})

$(document)
.on('click', ".unchecktdl", function(event) {

    var todo_id = $(this).attr('id');
    
    var data_holder = {
        todo_id: todo_id
    };
    
    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/todo/uncheck_item.php',
        data: data_holder,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            UpdateTDL()
        }
    })

    .fail(function ajaxFailed() {
    })
    
    
})

$(document)
.on('submit', "#add_item_form", function(event) {
    event.preventDefault()

    var user_input = document.querySelector("#user_input_todo").value;
    
    var data_holder = {
        user_input: user_input
    };
    
    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/todo/add_to_do_item.php',
        data: data_holder,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            UpdateTDL()
            document.querySelector("#user_input_todo").value = ""
        }
    })

    .fail(function ajaxFailed() {
    })
})

function UpdateTDL(){
    $.ajax({
        type: 'POST',
        url: 'ajax/dashboard/todo/load_todo.php',
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            var uncheckedhtml = '';
            $.each(data.uncheckedtdlitems, function(index, value){
                uncheckedhtml += "<div class='ind_uncompleted_item'><i class='bi bi-square checkofftdl' id="+value.todo_id+"></i><div class='item_text'>"+value.user_input+"</div><i class='bi bi-dash-square-dotted deletetdlitem' id="+value.todo_id+"></i></div>"
            })
            $(".ind_uncompleted_item_cont").html(uncheckedhtml);
            
            var checkedhtml = '';
            $.each(data.checkedtdlitems, function(index, value){
                checkedhtml += "<div class='ind_completed_item'><i class='bi bi-check-square-fill unchecktdl' id="+value.todo_id+"></i><div class='item_text'>"+value.user_input+"</div><i class='bi bi-dash-square-dotted deletetdlitem' id="+value.todo_id+"></i></div>"
            })
            $(".ind_completed_item_cont").html(checkedhtml);
        }
    })

    .fail(function ajaxFailed() {
    })
}