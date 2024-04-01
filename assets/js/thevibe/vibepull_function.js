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
        event_data += value.posttitle + "";
        event_data += "</span><div class='vibe_upvote " + x +"'>" + totallikes + " <i class='bi bi-hand-thumbs-up addlike' id=" + value.postid + "></i></div><div class='vibe_upvote_clicked " + y +"'>" + totallikes + " <i class='bi bi-hand-thumbs-up-fill sublike' id=" + value.postid + "></i></div></div></div><div class='vibe_post_info'><div class='vibe_post_content'>";
        event_data += value.posttext;
        event_data += "</div></div></div></div>"
    });

    $(".vibe_post").html(event_data);
}

function ShowNothing(){
    var event_data = '';
    event_data += "<div class='vibe_nothing'><p class='vibe_nothing_text'>There Are No Posts Available Yet</p></div>";
    $(".vibe_post").html(event_data);
}