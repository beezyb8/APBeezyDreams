function ShowVibes(data){
    var event_data = '';
    var userid = data.userid;

    $.each(data.vibe, function(index, value){
        var likesArray = value.likes.split(",");
        var userid_string = userid.toString();
        console.log(value.likes)
        console.log(typeof(value.likes))
        console.log(likesArray)
        
        if(!value.likes){
            var totallikes = 0;
            console.log("0")
        } else {
            var totallikes = likesArray.length;
        }
        //LIKES/
        if (likesArray.includes(userid_string)) {
            // You already liked it
            var x = "hidden_liker"
            var y = "shown_liker"
        } else {
        // No like
            var x = "shown_liker"
            var y = "hidden_liker"
        }
        //LIKES^^^/ 
        
        
        var dd = value.postdate_added.slice(8,10);
        var mm = value.postdate_added.slice(5,7);
        var yy = value.postdate_added.slice(2,4);
        if (mm.charAt(0) === '0') {
            mm = mm.substring(1);
        }
        if (dd.charAt(0) === '0') {
            dd = dd.substring(1);
        }
        var cleandate = mm+'/'+dd+'/'+yy;
        
        event_data += "<div class='vibe_post_container'><div class='vibe_post_header'><div class = 'vibe_lowkey_head'><span class='vibe_post_school_and_subject'>";
        event_data += value.postschool + " ~ " + value.postsubject;
        event_data += "</span><span class='vibe_post_date'>"
        event_data += "Posted On " + cleandate;
        event_data += "</span></div><div class = 'vibe_highkey_head'><span class='vibe_post_title'>";
        event_data += value.postbank + " ~ " + value.posttitle + "";
        event_data += "</span><div id='unclicked_liker_div" + value.postid +"' class='vibe_upvote " + x +"'><span class='likes_"+value.postid+"'>" + totallikes + "</span><i class='bi bi-hand-thumbs-up addlike' id=" + value.postid + "></i></div><div id='clicked_liker_div" + value.postid +"' class='vibe_upvote_clicked " + y +"'><span class='likes_"+value.postid+"'>" + totallikes + "</span><i class='bi bi-hand-thumbs-up-fill sublike' id=" + value.postid + "></i></div></div></div><div class='vibe_post_info'><div class='vibe_post_content'>";
        event_data += value.posttext;
        event_data += "</div></div><div class='reply_icon' vibe-post-id="+value.postid+">See Replies/Reply <i class='bi bi-arrow-return-left vibe_reply_arrow_down'></i></div><div class='hide_reply_icon'>Hide <i class='bi bi-arrow-up-short vibe_reply_arrow_up'></i></div><div class='replies_cont'></div><div class='vibe_reply_cont'><textarea placeholder='Reply here' class='vibe_reply_textarea' maxlength=20000 id ="+value.postid+"></textarea><button class='btn_guo vibe_reply_btn' id="+value.postid+">Submit Reply</button></div></div></div>"
    });

    $(".vibe_post").html(event_data);
}

function ShowReplies(data, $reply_icon){
    if(data.isreps===true){
        var event_data = '';
        var userid = data.userid;
    
        $.each(data.replies, function(index, value){
            var likesArray = value.likes.split(",");
            var userid_string = userid.toString();
            
            if(!value.likes){
                var totallikes = 0;
            } else {
                var totallikes = likesArray.length;
            }
            //LIKES/
            if (likesArray.includes(userid_string)) {
                // You already liked it
                var x = "hidden_liker"
                var y = "shown_liker"
            } else {
            // No like
                var x = "shown_liker"
                var y = "hidden_liker"
            }
            //LIKES^^^/ 
            
            
            var dd = value.replydate.slice(8,10);
            var mm = value.replydate.slice(5,7);
            var yy = value.replydate.slice(2,4);
            if (mm.charAt(0) === '0') {
                mm = mm.substring(1);
            }
            if (dd.charAt(0) === '0') {
                dd = dd.substring(1);
            }
            var cleandate = mm+'/'+dd+'/'+yy;
            
            event_data += "<div class='vibe_reply_container'><div class='vibe_reply_head'><span class='vibe_reply_date'>"
            event_data += cleandate;
            event_data += "</span><div class = 'reply_likes_head'><div id='unclicked_rep_liker_div" + value.replyid +"' class='rep_upvote " + x +"'><span class='likes_"+value.replyid+"'>" + totallikes + "</span><i class='bi bi-hand-thumbs-up add_rep_like' id=" + value.replyid + "></i></div><div id='clicked_rep_liker_div" + value.replyid +"' class='rep_upvote_clicked " + y +"'><span class='likes_"+value.replyid+"'>" + totallikes + "</span><i class='bi bi-hand-thumbs-up-fill sub_rep_like' id=" + value.replyid + "></i></div></div></div><div class='vibe_post_content'>";
            event_data += value.reply;
            event_data += "</div></div>"
            
        });
    
        var reply_cont = $reply_icon.siblings(".replies_cont")
        reply_cont.html(event_data);
        
    }else{
        event_data = "<div class='no_reps'>There are no replies</div>"
        var reply_cont = $reply_icon.siblings(".replies_cont")
        reply_cont.html(event_data);
    }
    
}