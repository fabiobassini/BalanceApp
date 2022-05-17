function visualizzaSelect(id) {
    $("#" + id).selectmenu("widget").show();
}

function nascondiSelect(id) {
    $("#" + id).selectmenu("widget").hide();
}

function open_login() {
    $("#login").dialog("open");
}

function dati_azienda() {
    var name = document.getElementById("azienda").value;
    var year = document.getElementById("anno").value;

    if (name != "" && year != "") {
        $("#table_bilancio").dialog({
            title: "Bilancio " + name + " - " + year
        });
        $("#tax_dialog").dialog("open");
    } else {
        alert("Inserisci le informazioni dell'azienda!");
        $("#login").dialog("open");
    }
}

function dati1() {
    $("#dati1").dialog("open");
}

function dati2() {
    $("#dati2").dialog("open");
}

function open_credits() {
    $("#credits").dialog("open");
}

function openBilancio() {
    $("#table_bilancio").dialog("open");
}

function openCrono1() {
    $("#history1").dialog("open");
}

function openCrono2() {
    $("#history2").dialog("open");
}

function openCrono3() {
    $("#history3").dialog("open");
}