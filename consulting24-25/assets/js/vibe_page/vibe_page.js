$(document).ready(function(){
    
    order_key = 1

    var data = {
        order_key: order_key,
    }
    
    $.ajax({
        type: 'POST',
        url: 'ajax/vibe_page/vibe_ajax.php',
        data: data,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
        } else {
            if(data.isvibes === true){
                ShowVibes(data)
            }else{
                ShowNothing()
            }
        }
    })
})



$(document).on('change', ".show_sel", function(event) {
    var key_value = $(this).val();
    
    $(".vibe_post_container").each(function() {
        var title = $(this).find(".vibe_post_title").text();
        var school = $(this).find(".vibe_post_school_and_subject").text();
      if(!title.includes(key_value) & !school.includes(key_value)) {
        $(this).css("display", "none");
      } else {
          $(this).css("display", "block")
      }
    });
});


const searchBar = document.getElementById('search_for');
const posts = document.getElementsByClassName('vibe_post_container');

searchBar.addEventListener('keyup', function(event) {
  const searchText = event.target.value.toLowerCase();
  
  for (var i = 0; i < posts.length; i++) {
    var postContent = posts[i].innerText.toLowerCase();
    if (postContent.includes(searchText)) {
        posts[i].style.display = "block";
    } else {
        posts[i].style.display = "none";
    }
  }
});




const thevibe = document.querySelector(".the_vibe")
const thevibe_title = document.querySelector(".vibe_title")
const vibe_bankname = document.querySelector(".firm_name")

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
        url: 'ajax/vibe_page/vibe_add_like.php',
        data: addlike_data,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        var unclicked_div_id = "unclicked_liker_div"+postid;
        var to_hide = document.querySelector("#" + unclicked_div_id);
        to_hide.style.display = "none";
        var clicked_div_id = "clicked_liker_div"+postid;
        var to_show = document.querySelector("#" + clicked_div_id);
        to_show.style.display = "block";
        
        
        
        var likes = document.getElementsByClassName("likes_"+postid);

        // Loop through each element and update the value
        for (var i = 0; i < likes.length; i++) {
          var intValue = parseInt(likes[i].innerHTML);
          var newValue = intValue + 1;
          likes[i].innerHTML = newValue;
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
        url: 'ajax/vibe_page/vibe_remove_like.php',
        data: sublike_data,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        var clicked_div_id = "clicked_liker_div"+postid;
        console.log(clicked_div_id);
        var to_hide = document.querySelector("#" + clicked_div_id);
        to_hide.style.display = "none";
        var unclicked_div_id = "unclicked_liker_div"+postid;
        var to_show = document.querySelector("#" + unclicked_div_id);
        to_show.style.display = "block";
        
        var likes = document.getElementsByClassName("likes_"+postid);

        // Loop through each element and update the value
        for (var i = 0; i < likes.length; i++) {
          var intValue = parseInt(likes[i].innerHTML);
          var newValue = intValue - 1;
          likes[i].innerHTML = newValue;
        }
    })
    
});



$(document)
.on("submit", ".create_a_vibe", function(event) {
    event.preventDefault();
    
    var $form = $(this);


    var vibe_post_info = {
        posttitle: $("input[id='vibe_title_id']", $form).val(),
        postsubject: $("select[name='vibe_pick_sub']", $form).val(),
        postbank: $("select[name='vibe_pick_bank']", $form).val(),
        postdate: $("select[name='vibe_pick_when']", $form).val(),
        posttext: $("textarea[name='vibe_post_textarea']", $form).val(),
    };
    
    
    $.ajax({
        type: 'POST',
        url: 'ajax/vibe_page/vibe_post.php',
        data: vibe_post_info,
        dataType: 'json',
        async: true,
    })
    
    .done(function ajaxDone(data) {
        if (typeof data.loco !== "undefined") {
            alert('You are not logged in');
            window.location.href = "https://mylegup.co/login_reg_system/login_reg.php"
        } else {
            alert("Thanks for posting!");
            location.reload();
        }
    })
    .fail(function ajaxFailed(data) {
        //fail
        console.log('fail');

    })

    
});