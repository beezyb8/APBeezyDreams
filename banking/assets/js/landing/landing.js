const wu_tag = document.querySelector(".wu_cm_tag");
const bp_tag = document.querySelector(".bp_cm_tag");
const nwork_tag = document.querySelector(".nwork_cm_tag");
const vibe_tag = document.querySelector(".vibe_cm_tag");

const wu_hide_show = document.querySelector(".wu_admin_hide_show");
const bp_hide_show = document.querySelector(".bp_admin_hide_show");
const nwork_hide_show = document.querySelector(".nwork_admin_hide_show");
const vibe_hide_show = document.querySelector(".vibe_admin_hide_show");


const wu_arrowup = document.querySelector("#wu_arrowup");
const wu_arrowdown = document.querySelector("#wu_arrowdown");

const bp_arrowup = document.querySelector("#bp_arrowup");
const bp_arrowdown = document.querySelector("#bp_arrowdown");

const nwork_arrowup = document.querySelector("#nwork_arrowup");
const nwork_arrowdown = document.querySelector("#nwork_arrowdown");

const vibe_arrowup = document.querySelector("#vibe_arrowup");
const vibe_arrowdown = document.querySelector("#vibe_arrowdown");


const anc_cont = document.querySelector(".anc_cont");


wu_tag.onclick = () => {
    if(wu_hide_show.classList.contains("active_stuff_cont")){
        wu_hide_show.classList.remove("active_stuff_cont");
        wu_arrowup.style.display = "none";
        wu_arrowdown.style.display = "inline-block";
    }else{
        wu_hide_show.classList.add("active_stuff_cont");
        wu_arrowup.style.display = "inline-block";
        wu_arrowdown.style.display = "none";
    }
}


bp_tag.onclick = () => {
    if(bp_hide_show.classList.contains("active_stuff_cont")){
        bp_hide_show.classList.remove("active_stuff_cont");
        bp_arrowup.style.display = "none";
        bp_arrowdown.style.display = "inline-block";
    }else{
        bp_hide_show.classList.add("active_stuff_cont");
        bp_arrowup.style.display = "inline-block";
        bp_arrowdown.style.display = "none";
    }
}

vibe_tag.onclick = () => {
    if(vibe_hide_show.classList.contains("active_stuff_cont")){
        vibe_hide_show.classList.remove("active_stuff_cont");
        vibe_arrowup.style.display = "none";
        vibe_arrowdown.style.display = "inline-block";
    }else{
        vibe_hide_show.classList.add("active_stuff_cont");
        vibe_arrowup.style.display = "inline-block";
        vibe_arrowdown.style.display = "none";
    }
}

nwork_tag.onclick = () => {
    if(nwork_hide_show.classList.contains("active_stuff_cont")){
        nwork_hide_show.classList.remove("active_stuff_cont");
        nwork_arrowup.style.display = "none";
        nwork_arrowdown.style.display = "inline-block";
    }else{
        nwork_hide_show.classList.add("active_stuff_cont");
        nwork_arrowup.style.display = "inline-block";
        nwork_arrowdown.style.display = "none";
    }
}