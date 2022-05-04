var n = 1;

function addRow(valore, voce, tabella) {

    var table = document.getElementById(tabella);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    row.insertCell(0).innerHTML= n.toString() + "°";
    row.insertCell(1).innerHTML= valore.toFixed(2);
    row.insertCell(2).innerHTML= voce;

    n++;
}

