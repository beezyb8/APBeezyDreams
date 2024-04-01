const addbankform = document.querySelector(".addbankcont");
const addbank = document.querySelector(".addbankp");
const exit = document.querySelector(".exitaddform");

addbank.onclick = () => {
    addbankform.style.display = "block"
}

exit.onclick = () => {
    addbankform.style.display = "none"
}


$(document)
.on("submit", "form.addbankform", function(event) {
    event.preventDefault();
    var totalRowCount = 0;
    var rowCount = 0;
    var table = document.getElementById("banklist");
    var rows = table.getElementsByTagName("tr")
    for (var i = 0; i < rows.length; i++) {
        totalRowCount++;
        if (rows[i].getElementsByTagName("td").length > 0) {
            rowCount++;
        }
    }
    var bankname = String($("input[id='compname']").val());
    var bankid = bankname.toLowerCase();
    var bankid = bankid.replaceAll(" ","");
    var bankid = bankid.replaceAll("&","");
    var bankid = bankid.replaceAll(".","");
    var bankid = bankid.replaceAll("#","");
    var bankid = bankid.replaceAll("/","");
    var bankid = bankid.replaceAll("@","");
    var bankid = bankid.replaceAll("$","");
    var bankid = bankid.replaceAll("?","");
    var bankid = bankid.replaceAll("*","");
    var bankid = bankid.replaceAll("^","");
    var bankid = bankid.replaceAll("]","");
    var bankid = bankid.replaceAll("[","");
    var bankid = bankid.replaceAll("(","");
    var bankid = bankid.replaceAll(")","");
    var bankid = bankid.replaceAll("+","");
    var bankid = bankid.replaceAll("=","");
    var bankid = bankid.replaceAll("{","");
    var bankid = bankid.replaceAll("}","");
    var bankid = bankid.replaceAll("|","");
    var bankid = bankid.replaceAll(";","");
    var bankid = bankid.replaceAll(":","");
    var bankid = bankid.replaceAll("'","");
    var bankid = bankid.replaceAll("!","");
    var bankid = bankid.replaceAll("~","");
    var bankid = bankid.replaceAll("`","");
    var bankid = bankid.replaceAll("%","");
    var bankid = bankid.replaceAll(",","");
    var bankid = bankid.replaceAll("<","");
    var bankid = bankid.replaceAll(">","");
    var bankid = bankid.replaceAll("_","");
    var bankid = bankid.replaceAll("-","");
    var bankid = bankid.replaceAll('"',"");
    var displayrank = rowCount
    console.log(bankname)
    console.log(bankid)
    console.log(displayrank)
    var bankprops = {
        bank: bankname,
        bankid: bankid,
        displayrank: displayrank
    };
    $.ajax({
        url: '../ajax/addbank.php',
        type: 'POST',
        data: bankprops,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(data) {
        location.reload();
    })
        // FIGURE THIS OUT!!!!
        // Make this return after the ajax request!!
        // THINKING Just ajax here, refresh page, have a function in bankshift listening to row count, if row count changes creates new class that has id listener and stuff
})