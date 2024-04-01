const started = document.querySelector(".get_start");
const gen_nw = document.querySelector(".gennwcont");
const send_emails = document.querySelector(".send_emails");
const comp_pres = document.querySelector(".comp_pres");
const behav = document.querySelector(".behav_int");
const tech = document.querySelector(".tech_int");
const temps = document.querySelector(".temps");


const gen_nw_btn = document.querySelector("#gennw");
const send_emails_btn = document.querySelector("#sendemails");
const comp_pres_btn = document.querySelector("#compres");
const behav_btn = document.querySelector("#behav");
const tech_btn = document.querySelector("#techint");
const temps_btn = document.querySelector("#formats");

gen_nw_btn.onclick = () => {
    started.style.display = "none";
    gen_nw.style.display = "block";
    send_emails.style.display = "none";
    comp_pres.style.display = "none";
    behav.style.display = "none";
    tech.style.display = "none";
    temps.style.display = "none";
}

send_emails_btn.onclick = () => {
    started.style.display = "none";
    gen_nw.style.display = "none";
    send_emails.style.display = "block";
    comp_pres.style.display = "none";
    behav.style.display = "none";
    tech.style.display = "none";
    temps.style.display = "none";
}

comp_pres_btn.onclick = () => {
    started.style.display = "none";
    gen_nw.style.display = "none";
    send_emails.style.display = "none";
    comp_pres.style.display = "block";
    behav.style.display = "none";
    tech.style.display = "none";
    temps.style.display = "none";
}

behav_btn.onclick = () => {
    started.style.display = "none";
    gen_nw.style.display = "none";
    send_emails.style.display = "none";
    comp_pres.style.display = "none";
    behav.style.display = "block";
    tech.style.display = "none";
    temps.style.display = "none";
}

tech_btn.onclick = () => {
    started.style.display = "none";
    gen_nw.style.display = "none";
    send_emails.style.display = "none";
    comp_pres.style.display = "none";
    behav.style.display = "none";
    tech.style.display = "block";
    temps.style.display = "none";
}

temps_btn.onclick = () => {
    started.style.display = "none";
    gen_nw.style.display = "none";
    send_emails.style.display = "none";
    comp_pres.style.display = "none";
    behav.style.display = "none";
    tech.style.display = "none";
    temps.style.display = "block";
}



