const thevibe = document.querySelector(".the_vibe")
const thevibe_title = document.querySelector(".vibe_title")
const vibe_bankname = document.querySelector(".bank_name")

$(document)
.on('click', ".addlike", function(event) {
    event.preventDefault();
    var postid_string = $(this).attr('id');
    var postid = parseInt(postid_string);
    
    var addlike_data = {
        postid: postid,
    }
    
    $.ajax({
        type: 'POST',
        url: '../ajax/vibelikes/addlike.php',
        data: addlike_data,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        let vibe_bank = vibe_bankname.innerHTML;
        
        var vibepull = {
            postbank: vibe_bank,
        }
        
        $.ajax({
            type: 'POST',
            url: '../ajax/vibepull.php',
            data: vibepull,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            if(data.isvibes === true){
                ShowVibes(data)
            }else{
                ShowNothing()
            }
        })
        .fail(function ajaxFailed(data) {
        //fail
            console.log('fail');

        })
    })
    
});

$(document)
.on('click', ".sublike", function(event) {
    event.preventDefault();
    var postid_string = $(this).attr('id');
    var postid = parseInt(postid_string);
    
    var sublike_data = {
        postid: postid,
    }
    
    $.ajax({
        type: 'POST',
        url: '../ajax/vibelikes/removelike.php',
        data: sublike_data,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        let vibe_bank = vibe_bankname.innerHTML;
        
        var vibepull = {
            postbank: vibe_bank,
        }
        
        $.ajax({
            type: 'POST',
            url: '../ajax/vibepull.php',
            data: vibepull,
            dataType: 'json',
            async: true,
        })
        
        .done(function ajaxDone(data) {
            if(data.isvibes === true){
                ShowVibes(data)
            }else{
                ShowNothing()
            }
        })
        
        .fail(function ajaxFailed(data) {
        })
        
        
    })
    
});


$(document)
.on('click', ".switch", function(event) {
    thevibe.style.display = "block";
    let vibe_bank = vibe_bankname.innerHTML;
    thevibe_title.innerHTML = "The Vibe - " + vibe_bank;
    
    var vibepull = {
        postbank: vibe_bank,
    }
    
    $.ajax({
        type: 'POST',
        url: '../ajax/vibepull.php',
        data: vibepull,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        if(data.isvibes === true){
            ShowVibes(data)
        }else{
            ShowNothing()
        }
    })
    
    
    
    
});


$(document)
.on("submit", ".create_a_vibe", function(event) {
    event.preventDefault();
    
    let vibe_bank = vibe_bankname.innerHTML;
    var $form = $(this);


    var vibe_post_info = {
        postbank: vibe_bank,
        posttitle: $("input[id='vibe_title_id']", $form).val(),
        postsubject: $("select[name='vibe_pick_sub']", $form).val(),
        postdate: $("select[name='vibe_pick_when']", $form).val(),
        posttext: $("textarea[name='vibe_post_textarea']", $form).val(),
    };
    
    console.log(vibe_post_info)
    
    
    $.ajax({
        type: 'POST',
        url: '../ajax/vibepost.php',
        data: vibe_post_info,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        alert("Thanks for posting! Your submission will be posted pending review. Sorry, but we have to reload the page.");
        location.reload();
    })
    .fail(function ajaxFailed(data) {
        //fail
        console.log('fail');

    })

    
});