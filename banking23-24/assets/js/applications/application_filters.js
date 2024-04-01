// Selector filter
$(document).on('change', ".show_saved_filters", function(event) {
    var key_value = $(this).val();
    if(key_value == "all"){
        $(".saved_tile_container").each(function() {
            var checked = $(this).find(".tile_app_checker").prop('checked');
            console.log(checked)
            $(this).css("display", "inline-block")
        });
    }else if(key_value == "applied"){
        $(".saved_tile_container").each(function() {
            var checked = $(this).find(".tile_app_checker").prop('checked');
            if(checked == true){
                $(this).css("display", "inline-block")
            }else{
                $(this).css("display", "none")
            }
        });
    }else if(key_value == "unapplied"){
        $(".saved_tile_container").each(function() {
            var checked = $(this).find(".tile_app_checker").prop('checked');
            if(checked == true){
                $(this).css("display", "none")
            }else{
                $(this).css("display", "inline-block")
            }
        });
    }
});


//TOP FILTERS BELOW 
const home_btn = document.querySelector("#home_apps")
const saved_btn = document.querySelector("#saved_apps")
const ny_btn = document.querySelector("#ny_apps")
const diversity_btn = document.querySelector("#diversity_apps")
const other_btn = document.querySelector("#other_apps")

const saved_cont = document.querySelector(".saved_section_cont")
const ny_cont = document.querySelector(".ny_section_cont")
const diversity_cont = document.querySelector(".diversity_section_cont")
const other_cont = document.querySelector(".other_section_cont")

home_btn.onclick = () =>{
    if(home_btn.classList.contains("selected_filter_button")){
    }else{
        home_btn.classList.add("selected_filter_button")
        saved_cont.style.display="block"
        ny_cont.style.display="block"
        diversity_cont.style.display="block"
        other_cont.style.display="block"
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }
        if(diversity_btn.classList.contains("selected_filter_button")){
            diversity_btn.classList.remove("selected_filter_button")
        }
        if(other_btn.classList.contains("selected_filter_button")){
            other_btn.classList.remove("selected_filter_button")
        }
    }
}

saved_btn.onclick = () =>{
    if(saved_btn.classList.contains("selected_filter_button")){
    }else{
        saved_btn.classList.add("selected_filter_button")
        saved_cont.style.display="block"
        ny_cont.style.display="none"
        diversity_cont.style.display="none"
        other_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }
        if(diversity_btn.classList.contains("selected_filter_button")){
            diversity_btn.classList.remove("selected_filter_button")
        }
        if(other_btn.classList.contains("selected_filter_button")){
            other_btn.classList.remove("selected_filter_button")
        }
    }
}

ny_btn.onclick = () =>{
    if(ny_btn.classList.contains("selected_filter_button")){
    }else{
        ny_btn.classList.add("selected_filter_button")
        saved_cont.style.display="none"
        ny_cont.style.display="block"
        diversity_cont.style.display="none"
        other_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(diversity_btn.classList.contains("selected_filter_button")){
            diversity_btn.classList.remove("selected_filter_button")
        }
        if(other_btn.classList.contains("selected_filter_button")){
            other_btn.classList.remove("selected_filter_button")
        }
    }
}

diversity_btn.onclick = () =>{
    if(diversity_btn.classList.contains("selected_filter_button")){
    }else{
        diversity_btn.classList.add("selected_filter_button")
        saved_cont.style.display="none"
        ny_cont.style.display="none"
        diversity_cont.style.display="block"
        other_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }
        if(other_btn.classList.contains("selected_filter_button")){
            other_btn.classList.remove("selected_filter_button")
        }
    }
}

other_btn.onclick = () =>{
    if(other_btn.classList.contains("selected_filter_button")){
    }else{
        other_btn.classList.add("selected_filter_button")
        saved_cont.style.display="none"
        ny_cont.style.display="none"
        diversity_cont.style.display="none"
        other_cont.style.display="block"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }
        if(diversity_btn.classList.contains("selected_filter_button")){
            diversity_btn.classList.remove("selected_filter_button")
        }
    }
}