const thevibe = document.querySelector(".the_vibe")
const thevibe_title = document.querySelector(".vibe_title")
const vibe_bankname = document.querySelector(".firm_name")




$(document)
.on('click', ".reply_icon", function(event) {
    var reply_icon = document.querySelector(".reply_icon")
    reply_icon.style.display = "none";
    var hide_reply_icon = document.querySelector(".hide_reply_icon")
    hide_reply_icon.style.display = "block";
    var reply_act_cont = document.querySelector(".vibe_reply_cont")
    reply_act_cont.style.display = "block"
})

$(document)
.on('click', ".hide_reply_icon", function(event) {
    var reply_icon = document.querySelector(".reply_icon")
    reply_icon.style.display = "block";
    var hide_reply_icon = document.querySelector(".hide_reply_icon")
    hide_reply_icon.style.display = "none";
    var reply_act_cont = document.querySelector(".vibe_reply_cont")
    reply_act_cont.style.display = "none"
})

$(document)
.on('focusin', ".vibe_reply_textarea", function(event) {
    var vibe_reply_btn = document.querySelector(".vibe_reply_btn")
    vibe_reply_btn.style.display = "block"
    var reply_act_txta = document.querySelector(".vibe_reply_textarea")
    reply_act_txta.style.height = "80px"
})

$(document)
.on('click', ".vibe_reply_btn", function(event) {
    var postid_string = $(this).attr('id');
    var postid = parseInt(postid_string);
    
    var reply_act_txta = document.querySelector(".vibe_reply_textarea")
    
    console.log(postid)
    
    var reply_info = {
        postid: postid,
        reply: reply_act_txta.value
    }
    
    $.ajax({
        type: 'POST',
        url: '../consulting/ajax/vibe_replies/vibe_post_reply.php',
        data: reply_info,
        dataType: 'json',
        async: true,
    })
        .done(function ajaxDone(data) {
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg.php"
            } else {
                console.log("done")
                // Show new replies function to show replies
            }
        })
        .fail(function ajaxFailed(data) {
            console.log('fail');
        })
    // })
    
});

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
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
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
                if (typeof data.loco !== "undefined") {
                    alert('You are not logged in');
                    window.location.href = "https://mylegup.co/login_reg.php"
                } else {
                    if(data.isvibes === true){
                        ShowVibes(data)
                    }else{
                        ShowNothing()
                    }
                }
            })
            .fail(function ajaxFailed(data) {
            //fail
                console.log('fail');
    
            })
        }
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
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
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
                if (typeof data.loco !== "undefined") {
                    alert('You are not logged in');
                    window.location.href = "https://mylegup.co/login_reg.php"
                } else {
                    if(data.isvibes === true){
                        ShowVibes(data)
                    }else{
                        ShowNothing()
                    }
                }
            })
            
            .fail(function ajaxFailed(data) {
            })
        }
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
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            if(data.isvibes === true){
                ShowVibes(data)
            }else{
                ShowNothing()
            }
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
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg.php"
        } else {
            alert("Thanks for posting! Your submission will be posted pending review.");
            location.reload();
        }
    })
    .fail(function ajaxFailed(data) {
        //fail
        console.log('fail');

    })

    
});