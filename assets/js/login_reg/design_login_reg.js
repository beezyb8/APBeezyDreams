const login_btn = document.querySelector(".log-btn");
const reg_btn = document.querySelector(".reg-btn");
const log_form = document.querySelector(".js-login");
const reg_form = document.querySelector(".js-register");

login_btn.onclick = () => {
    log_form.style.display = "block";
    reg_form.style.display = "none";
    reg_btn.classList.add();
    login_btn.classList.remove("disable");
    reg_btn.classList.add("disable");
}

reg_btn.onclick = () => {
    log_form.style.display = "none";
    reg_form.style.display = "block";
    reg_btn.classList.remove("disable");
    login_btn.classList.add("disable");
}