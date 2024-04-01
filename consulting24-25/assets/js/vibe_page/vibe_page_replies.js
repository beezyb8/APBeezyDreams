$(document)
.on('click', ".reply_icon", function(event) {
    var $reply_icon = $(this);
    var reply_cont = $reply_icon.siblings(".replies_cont");
    
    var postid = $reply_icon.attr("vibe-post-id");
    // Convert the ID to an integer
    var postid = parseInt(postid);
    
    $reply_icon.css('display', 'none');
    var hide_reply_icon = $reply_icon.siblings(".hide_reply_icon")
    var reply_act_cont = $reply_icon.siblings(".vibe_reply_cont")
    hide_reply_icon.css('max-height', '1000px')
    reply_act_cont.css('max-height', '1000px')
    hide_reply_icon.css('display', 'block');
    reply_act_cont.css('display', 'block');
    
    var postid_data = {
        postid: postid,
    }
    
    $.ajax({
        type: 'POST',
        url: 'ajax/vibe_page/vibe_get_replies.php',
        data: postid_data,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
        } else {
            ShowReplies(data, $reply_icon);
            reply_cont.css('display', 'block');
            reply_cont.removeClass('animate-shrink');
            reply_cont.addClass('animate-expand');
        }
    })
})

$(document)
.on('click', ".hide_reply_icon", function(event) {
    var $hide_reply_icon = $(this);
    var reply_cont = $hide_reply_icon.siblings(".replies_cont");
    var reply_act_cont = $hide_reply_icon.siblings(".vibe_reply_cont")
    var reply_icon = $hide_reply_icon.siblings(".reply_icon")
    reply_cont.removeClass('animate-expand');
    reply_cont.css('display', 'none');
    $hide_reply_icon.css('display', 'none');
    reply_icon.css('display', 'block');
    reply_act_cont.css('display', 'none');
})

$(document)
.on('focusin', ".vibe_reply_textarea", function(event) {
    var reply_act_txta = $(this);
    reply_act_txta.css("height", "80px")
    var vibe_reply_btn = reply_act_txta.siblings(".vibe_reply_btn")
    vibe_reply_btn.css("display", "block")
})


$(document)
.on('click', ".vibe_reply_btn", function(event) {
    var postid_string = $(this).attr('id');
    var postid = parseInt(postid_string);
    var post_button = $(this)
    var reply_act_txta = post_button.siblings(".vibe_reply_textarea")
    var reply = reply_act_txta.val()
    reply_act_txta.val("")
    var parent_rep_cont = reply_act_txta.parent()
    var $reply_icon = parent_rep_cont.siblings(".reply_icon")
    
    console.log(postid)
    
    var reply_info = {
        postid: postid,
        reply: reply
    }
    
    $.ajax({
        type: 'POST',
        url: 'ajax/vibe_replies/vibe_post_reply.php',
        data: reply_info,
        dataType: 'json',
        async: true,
    })
        .done(function ajaxDone(data) {
            if (typeof data.loco !== "undefined") {
                alert('You are not logged in');
                window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
            } else {
                var postid_data = {
                    postid: postid,
                }
    
                $.ajax({
                    type: 'POST',
                    url: '../banking/ajax/vibe_page/vibe_get_replies.php',
                    data: postid_data,
                    dataType: 'json',
                    async: true,
                })
                
                .done(function ajaxDone(data) {
                    if (typeof data.loco !== "undefined") {
                        alert('You are not logged in');
                        window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
                    } else {
                        ShowReplies(data, $reply_icon);
                    }
                })
            }
        })
        .fail(function ajaxFailed(data) {
            console.log('fail');
        })
    // })
    
});


$(document)
.on('click', ".add_rep_like", function(event) {
    event.preventDefault();
    var replyid_string = $(this).attr('id');
    var replyid = parseInt(replyid_string);
    
    var addlike_data = {
        replyid: replyid,
    }
    
    $.ajax({
        type: 'POST',
        url: 'ajax/vibe_replies/vibe_add_rep_like.php',
        data: addlike_data,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        var unclicked_div_id = "unclicked_rep_liker_div"+replyid;
        var to_hide = document.querySelector("#" + unclicked_div_id);
        to_hide.style.display = "none";
        var clicked_div_id = "clicked_rep_liker_div"+replyid;
        var to_show = document.querySelector("#" + clicked_div_id);
        to_show.style.display = "block";
        
        
        
        var likes = document.getElementsByClassName("likes_"+replyid);

        // Loop through each element and update the value
        for (var i = 0; i < likes.length; i++) {
          var intValue = parseInt(likes[i].innerHTML);
          var newValue = intValue + 1;
          likes[i].innerHTML = newValue;
        }
    })
});

$(document)
.on('click', ".sub_rep_like", function(event) {
    event.preventDefault();
    var replyid_string = $(this).attr('id');
    var replyid = parseInt(replyid_string);
    
    var sublike_data = {
        replyid: replyid,
    }
    
    $.ajax({
        type: 'POST',
        url: 'ajax/vibe_replies/vibe_remove_rep_like.php',
        data: sublike_data,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        var clicked_div_id = "clicked_rep_liker_div"+replyid;
        console.log(clicked_div_id);
        var to_hide = document.querySelector("#" + clicked_div_id);
        to_hide.style.display = "none";
        var unclicked_div_id = "unclicked_rep_liker_div"+replyid;
        var to_show = document.querySelector("#" + unclicked_div_id);
        to_show.style.display = "block";
        
        var likes = document.getElementsByClassName("likes_"+replyid);

        // Loop through each element and update the value
        for (var i = 0; i < likes.length; i++) {
          var intValue = parseInt(likes[i].innerHTML);
          var newValue = intValue - 1;
          likes[i].innerHTML = newValue;
        }
    })
    
});