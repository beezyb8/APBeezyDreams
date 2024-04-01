var dropdown_links = document.querySelector(".dropdown_links")
var dropup_icon = document.querySelector(".drop_up")
var dropdown_icon = document.querySelector(".drop_down")

$(document)
.on('click', ".drop_up", function(event) {
    dropdown_links.style.display = "block"
    dropup_icon.style.display = "none"
    dropdown_icon.style.display = "inline-block"
})

$(document)
.on('click', ".drop_down", function(event) {
    dropdown_links.style.display = "none"
    dropup_icon.style.display = "inline-block"
    dropdown_icon.style.display = "none"
})