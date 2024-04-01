const admin_tag = document.querySelector(".admin_cm_tag");
const admin_hide_show = document.querySelector(".admin_hide_show");
const arrowup = document.querySelector("#arrowup");
const arrowdown = document.querySelector("#arrowdown");
const anc_cont = document.querySelector(".anc_cont");

admin_tag.onclick = () => {
    if(admin_hide_show.style.display != "none"){
        admin_hide_show.style.display = "none";
        arrowdown.style.display = "none";
        arrowup.style.display = "inline-block";
        anc_cont.style.padding = "0px";
    }else{
        admin_hide_show.style.display = "block";
        arrowdown.style.display = "inline-block";
        arrowup.style.display = "none";
        anc_cont.style.padding = "0px 0px 30px 0px"; 
    }
}

// $(document)
// .on('click', ".admin_cm_tag", function(event) {
//     if(admin_hide_show.style.display != "none"){
//         admin_hide_show.style.display = "none";
//         arrowdown.style.display = "none";
//         arrowup.style.display = "inline-block";
//     } else{
//         admin_hide_show.style.display = "block";
//         arrowdown.style.display = "inline-block";
//         arrowup.style.display = "none";
//     }
// })