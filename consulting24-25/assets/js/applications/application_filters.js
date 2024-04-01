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
const strategy_btn = document.querySelector("#strategy_apps")
const management_btn = document.querySelector("#mgmt_apps")
const supplychain_btn = document.querySelector("#supply_apps")
const audit_btn = document.querySelector("#audit_apps")
const other_btn = document.querySelector("#other_apps")

const saved_cont = document.querySelector(".saved_section_cont")
const ny_cont = document.querySelector(".ny_section_cont")
const diversity_cont = document.querySelector(".diversity_section_cont")
const strategy_cont = document.querySelector(".strategy_section_cont")
const management_cont = document.querySelector(".mgmt_section_cont")
const supplychain_cont = document.querySelector(".supply_section_cont")
const audit_cont = document.querySelector(".audit_section_cont")
const other_cont = document.querySelector(".other_section_cont")

home_btn.onclick = () =>{
    if(home_btn.classList.contains("selected_filter_button")){
    }else{
        home_btn.classList.add("selected_filter_button")
        saved_cont.style.display="block"
        ny_cont.style.display="block"
        diversity_cont.style.display="block"
        other_cont.style.display="block"        
        strategy_cont.style.display="block"
        management_cont.style.display="block"
        supplychain_cont.style.display="block"
        audit_cont.style.display="block"
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }
        if(diversity_btn.classList.contains("selected_filter_button")){
            diversity_btn.classList.remove("selected_filter_button")
        }if(strategy_btn.classList.contains("selected_filter_button")){
            strategy_btn.classList.remove("selected_filter_button")
        }if(management_btn.classList.contains("selected_filter_button")){
            management_btn.classList.remove("selected_filter_button")
        }if(supplychain_btn.classList.contains("selected_filter_button")){
            supplychain_btn.classList.remove("selected_filter_button")
        }if(audit_btn.classList.contains("selected_filter_button")){
            audit_btn.classList.remove("selected_filter_button")
        }if(other_btn.classList.contains("selected_filter_button")){
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
        strategy_cont.style.display="none"
        management_cont.style.display="none"
        supplychain_cont.style.display="none"
        audit_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }
        if(diversity_btn.classList.contains("selected_filter_button")){
            diversity_btn.classList.remove("selected_filter_button")
        }if(strategy_btn.classList.contains("selected_filter_button")){
            strategy_btn.classList.remove("selected_filter_button")
        }if(management_btn.classList.contains("selected_filter_button")){
            management_btn.classList.remove("selected_filter_button")
        }if(supplychain_btn.classList.contains("selected_filter_button")){
            supplychain_btn.classList.remove("selected_filter_button")
        }if(audit_btn.classList.contains("selected_filter_button")){
            audit_btn.classList.remove("selected_filter_button")
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
        strategy_cont.style.display="none"
        management_cont.style.display="none"
        supplychain_cont.style.display="none"
        audit_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(diversity_btn.classList.contains("selected_filter_button")){
            diversity_btn.classList.remove("selected_filter_button")
        }if(strategy_btn.classList.contains("selected_filter_button")){
            strategy_btn.classList.remove("selected_filter_button")
        }if(management_btn.classList.contains("selected_filter_button")){
            management_btn.classList.remove("selected_filter_button")
        }if(supplychain_btn.classList.contains("selected_filter_button")){
            supplychain_btn.classList.remove("selected_filter_button")
        }if(audit_btn.classList.contains("selected_filter_button")){
            audit_btn.classList.remove("selected_filter_button")
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
        management_cont.style.display="none"
        strategy_cont.style.display="none"
        management_cont.style.display="none"
        supplychain_cont.style.display="none"
        audit_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }if(strategy_btn.classList.contains("selected_filter_button")){
            strategy_btn.classList.remove("selected_filter_button")
        }if(management_btn.classList.contains("selected_filter_button")){
            management_btn.classList.remove("selected_filter_button")
        }if(supplychain_btn.classList.contains("selected_filter_button")){
            supplychain_btn.classList.remove("selected_filter_button")
        }if(audit_btn.classList.contains("selected_filter_button")){
            audit_btn.classList.remove("selected_filter_button")
        }
        if(other_btn.classList.contains("selected_filter_button")){
            other_btn.classList.remove("selected_filter_button")
        }
    }
}

strategy_btn.onclick = () =>{
    if(strategy_btn.classList.contains("selected_filter_button")){
    }else{
        strategy_btn.classList.add("selected_filter_button")
        strategy_cont.style.display="block"
        saved_cont.style.display="none"
        ny_cont.style.display="none"
        diversity_cont.style.display="none"
        management_cont.style.display="none"
        supplychain_cont.style.display="none"
        audit_cont.style.display="none"
        other_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }if(diversity_btn.classList.contains("selected_filter_button")){
            diversity_btn.classList.remove("selected_filter_button")
        }if(management_btn.classList.contains("selected_filter_button")){
            management_btn.classList.remove("selected_filter_button")
        }if(supplychain_btn.classList.contains("selected_filter_button")){
            supplychain_btn.classList.remove("selected_filter_button")
        }if(audit_btn.classList.contains("selected_filter_button")){
            audit_btn.classList.remove("selected_filter_button")
        }
        if(other_btn.classList.contains("selected_filter_button")){
            other_btn.classList.remove("selected_filter_button")
        }
    }
}

management_btn.onclick = () =>{
    if(management_btn.classList.contains("selected_filter_button")){
    }else{
        management_btn.classList.add("selected_filter_button")
        management_cont.style.display="block"
        saved_cont.style.display="none"
        ny_cont.style.display="none"
        diversity_cont.style.display="none"
        strategy_cont.style.display="none"
        supplychain_cont.style.display="none"
        audit_cont.style.display="none"
        other_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }if(strategy_btn.classList.contains("selected_filter_button")){
            strategy_btn.classList.remove("selected_filter_button")
        }if(supplychain_btn.classList.contains("selected_filter_button")){
            supplychain_btn.classList.remove("selected_filter_button")
        }if(audit_btn.classList.contains("selected_filter_button")){
            audit_btn.classList.remove("selected_filter_button")
        }
        if(other_btn.classList.contains("selected_filter_button")){
            other_btn.classList.remove("selected_filter_button")
        }
    }
}

supplychain_btn.onclick = () =>{
    if(supplychain_btn.classList.contains("selected_filter_button")){
    }else{
        supplychain_btn.classList.add("selected_filter_button")
        supplychain_cont.style.display="block"
        saved_cont.style.display="none"
        ny_cont.style.display="none"
        diversity_cont.style.display="none"
        strategy_cont.style.display="none"
        management_cont.style.display="none"
        audit_cont.style.display="none"
        other_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }if(strategy_btn.classList.contains("selected_filter_button")){
            strategy_btn.classList.remove("selected_filter_button")
        }if(management_btn.classList.contains("selected_filter_button")){
            management_btn.classList.remove("selected_filter_button")
        }if(audit_btn.classList.contains("selected_filter_button")){
            audit_btn.classList.remove("selected_filter_button")
        }
        if(other_btn.classList.contains("selected_filter_button")){
            other_btn.classList.remove("selected_filter_button")
        }
    }
}

audit_btn.onclick = () =>{
    if(audit_btn.classList.contains("selected_filter_button")){
    }else{
        audit_btn.classList.add("selected_filter_button")
        audit_cont.style.display="block"
        saved_cont.style.display="none"
        ny_cont.style.display="none"
        diversity_cont.style.display="none"
        strategy_cont.style.display="none"
        management_cont.style.display="none"
        supplychain_cont.style.display="none"
        other_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }if(strategy_btn.classList.contains("selected_filter_button")){
            strategy_btn.classList.remove("selected_filter_button")
        }if(management_btn.classList.contains("selected_filter_button")){
            management_btn.classList.remove("selected_filter_button")
        }if(supplychain_btn.classList.contains("selected_filter_button")){
            supplychain_btn.classList.remove("selected_filter_button")
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
        strategy_cont.style.display="none"
        management_cont.style.display="none"
        supplychain_cont.style.display="none"
        audit_cont.style.display="none"
        if(home_btn.classList.contains("selected_filter_button")){
            home_btn.classList.remove("selected_filter_button")
        }
        if(saved_btn.classList.contains("selected_filter_button")){
            saved_btn.classList.remove("selected_filter_button")
        }
        if(ny_btn.classList.contains("selected_filter_button")){
            ny_btn.classList.remove("selected_filter_button")
        }if(strategy_btn.classList.contains("selected_filter_button")){
            strategy_btn.classList.remove("selected_filter_button")
        }if(management_btn.classList.contains("selected_filter_button")){
            management_btn.classList.remove("selected_filter_button")
        }if(supplychain_btn.classList.contains("selected_filter_button")){
            supplychain_btn.classList.remove("selected_filter_button")
        }if(audit_btn.classList.contains("selected_filter_button")){
            audit_btn.classList.remove("selected_filter_button")
        }
        if(diversity_btn.classList.contains("selected_filter_button")){
            diversity_btn.classList.remove("selected_filter_button")
        }
    }
}