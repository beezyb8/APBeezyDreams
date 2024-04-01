const modalbtn = document.querySelector(".createpostbtn")
const closebtn = document.querySelector(".close_new_post_modal")
const postmodal = document.querySelector(".add_post_modal")
const body = document.querySelector(".outermostcont_change")

modalbtn.onclick = () =>{
    postmodal.style.top = "20px"
    body.style.opacity = "40%"
    postmodal.style.opacity = "100%"
}

closebtn.onclick = () =>{
    postmodal.style.top = "-1000px"
    body.style.opacity = "100%"
    postmodal.style.opacity = "0%"
}