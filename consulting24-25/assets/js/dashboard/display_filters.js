const writtencont_toshow_hide = document.querySelector(".writtencont")
const notescont_toshow_hide = document.querySelector(".notescont")
const buttoncont_toshow_hide = document.querySelector(".button_modal_cont")
const contactcont_toshow_hide = document.querySelector(".contactcont")
const apptiles_toshow_hide = document.querySelector(".app_tile_holder")

const show_all_btn = document.querySelector(".show_all")
const show_yours_btn = document.querySelector(".show_yours")
const show_info_btn = document.querySelector(".show_info")

$(document)
.on('click', ".show_all", function(event) {
    writtencont_toshow_hide.style.display = "block"
    notescont_toshow_hide.style.display = "block"
    buttoncont_toshow_hide.style.display = "flex"
    contactcont_toshow_hide.style.display = "block"
    apptiles_toshow_hide.style.display = "flex"
    if(show_all_btn.classList.contains("current_show_filter")){
    }else{
        show_all_btn.classList.add("current_show_filter")
    }
    
    if(show_yours_btn.classList.contains("current_show_filter")){
        show_yours_btn.classList.remove("current_show_filter")
    }else{
    }
    
    if(show_info_btn.classList.contains("current_show_filter")){
        show_info_btn.classList.remove("current_show_filter")
    }else{
    }
    
})

$(document)
.on('click', ".show_yours", function(event) {
    writtencont_toshow_hide.style.display = "none"
    notescont_toshow_hide.style.display = "block"
    buttoncont_toshow_hide.style.display = "flex"
    contactcont_toshow_hide.style.display = "block"
    apptiles_toshow_hide.style.display = "flex"
    if(show_all_btn.classList.contains("current_show_filter")){
        show_all_btn.classList.remove("current_show_filter")
    }else{
    }
    
    if(show_yours_btn.classList.contains("current_show_filter")){
    }else{
        show_yours_btn.classList.add("current_show_filter")
    }
    
    if(show_info_btn.classList.contains("current_show_filter")){
        show_info_btn.classList.remove("current_show_filter")
    }else{
    }
})

$(document)
.on('click', ".show_info", function(event) {
    writtencont_toshow_hide.style.display = "block"
    notescont_toshow_hide.style.display = "none"
    buttoncont_toshow_hide.style.display = "none"
    contactcont_toshow_hide.style.display = "none"
    apptiles_toshow_hide.style.display = "none"
    if(show_all_btn.classList.contains("current_show_filter")){
        show_all_btn.classList.remove("current_show_filter")
    }else{
    }
    
    if(show_yours_btn.classList.contains("current_show_filter")){
        show_yours_btn.classList.remove("current_show_filter")
    }else{
    }
    
    if(show_info_btn.classList.contains("current_show_filter")){
    }else{
        show_info_btn.classList.add("current_show_filter")
    }
})