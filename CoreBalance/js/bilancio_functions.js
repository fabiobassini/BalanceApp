
var segno, checked = false;
var v = 0, temp = 0;

var a_a = 0, a_b11 = 0,a_b12 = 0, a_b13 = 0, a_b14 = 0, a_b15 = 0, a_b16 = 0, a_b17 = 0,
    a_b21 = 0, a_b22 = 0, a_b23 = 0, a_b24 = 0, a_b25 = 0, a_b31 = 0, a_b32 = 0, a_b33 = 0, a_b34 = 0,
    a_c11 = 0, a_c12 = 0, a_c13 = 0, a_c14 = 0, a_c15 = 0, a_c21 = 0, a_c22 = 0, a_c23 = 0, a_c31 = 0,
    a_c32 = 0, a_c33 = 0, a_c41 = 0, a_c42 = 0, a_c43 = 0, a_d = 0;

var p_a1 = 0, p_a2 = 0, p_a3 = 0, p_b1 = 0, p_b2 = 0, p_b3 = 0, p_b4 = 0, p_b5 = 0, p_b6 = 0, p_b7 = 0, p_b8 = 0,p_b9 = 0, p_tfr = 0,
    p_d1 = 0, p_d2 = 0, p_d3 = 0, p_d4 = 0, p_d5 = 0, p_d6 = 0, p_d7 = 0, p_d8 = 0, p_d9 = 0,
    p_d10 = 0, p_d11 = 0, p_e = 0;

var a1 = 0, a2 = 0, a3 = 0, a4 = 0, a5 = 0,a6 = 0, b1 = 0, b2 = 0, b3 = 0, b41 = 0, b42 = 0, b43 = 0, b44 = 0, b45 = 0,
    b51 = 0, b52 = 0, b53 = 0, b54 = 0, b6 = 0, b7 = 0, b8 = 0, b9 = 0, c1 = 0, c21 = 0, c22 = 0, c23 = 0, c24 = 0,
    c3 = 0, d11 = 0, d12 = 0, d13 = 0, d21 = 0, d22 = 0, d23 = 0, e1 = 0, e2 = 0, e3 = 0;

function dare_avere(id) {
    if (id == "radio-1") {
        segno = "+";
        checked = true;
        return segno;
    }

    if (id == "radio-2") {
        segno = "-";
        checked = true;
        return segno;
    }

    if (id == "radio-3") {
        segno = "-";
        checked = true;
        return segno;
    }

    if (id == "radio-4") {
        segno = "+";
        checked = true;
        return segno;
    }

    if (id == "radio-5") {
        segno = "-";
        checked = true;
        return segno;
    }

    if (id == "radio-6") {
        segno = "+";
        checked = true;
        return segno;
    }

    if (id == "radio-7") {
        segno = "+";
        checked = true;
        return segno;
    }

    if (id == "radio-8") {
        segno = "-";
        checked = true;
        return segno;
    }

    if (id == "radio-9") {
        segno = "-";
        checked = true;
        return segno;
    }

    if (id == "radio-10") {
        segno = "+";
        checked = true;
        return segno;
    }

    if (id == "radio-11") {
        segno = "-";
        checked = true;
        return segno;
    }

    if (id == "radio-12") {
        segno = "+";
        checked = true;
        return segno;
    }

    if (id == "radio-13") {
        segno = "-";
        checked = true;
        return segno;
    }

    if (id == "radio-14") {
        segno = "+";
        checked = true;
        return segno;
    }
}

function inserisci_tax() {
    var tax = document.getElementById("tax").value;
    if (tax != "") {
        $("#tax_dialog").dialog("close");
        temp = (parseFloat(tax) / 100);
    } else {
        alert("Inserisci tassazione - IRAP (%)!");
        $("#tax_dialog").dialog("open");
    }
}

function sta_inserisci() {
    var selected = $("#attivo").val();
    var valore = document.getElementById("dato1").value;
    var voce;

    if (checked == true) {
        document.getElementById("dato1").value = "";
        valore = valore.replace(/[.]/g, "");
        valore = valore.replace(/[,]/g, ".");
        v = parseFloat(valore);

        if (isNaN(v)) {
            alert("Inserisci un numero!");
            v = 0;
        }

        if (selected == "crediti_vs_soci") {
            if (segno == "-") {
                a_a -= v;
                $("#ma_a").text(a_a.toFixed(2) + "€");
                $("#a_a").text(a_a.toFixed(2) + "€");
                voce = "Crediti verso soci";
                addRow((-v), voce, "crono1");
            }

            if (segno == "+") {
                a_a += v;
                $("#ma_a").text(a_a.toFixed(2) + "€");
                $("#a_a").text(a_a.toFixed(2) + "€");
                voce = "Crediti verso soci";
                addRow((v), voce, "crono1");
            }
        }

        if (selected == "immobilizzazioni") {
            var valSel = $("#immobilizzazioni_field").val();

            if (valSel == "imm1") {
                if (segno == "-") {
                    a_b11 -= v;
                    $("#ma_b11").text(a_b11.toFixed(2) + "€");
                    $("#a_b11").text(a_b11.toFixed(2) + "€");
                    voce = "B1-Costi di impianto";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b11 += v;
                    $("#ma_b11").text(a_b11.toFixed(2) + "€");
                    $("#a_b11").text(a_b11.toFixed(2) + "€");
                    voce = "B1-Costi di impianto ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "imm2") {
                if (segno == "-") {
                    a_b12 -= v;
                    $("#ma_b12").text(a_b12.toFixed(2) + "€");
                    $("#a_b12").text(a_b12.toFixed(2) + "€");
                    voce = "B1-Costi di ricerca, ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b12 += v;
                    $("#ma_b12").text(a_b12.toFixed(2) + "€");
                    $("#a_b12").text(a_b12.toFixed(2) + "€");
                    voce = "B1-Costi di ricerca, ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "imm3") {
                if (segno == "-") {
                    a_b13 -= v;
                    $("#ma_b13").text(a_b13.toFixed(2) + "€");
                    $("#a_b13").text(a_b13.toFixed(2) + "€");
                    voce = "B1-Diritti di brevetto ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b13 += v;
                    $("#ma_b13").text(a_b13.toFixed(2) + "€");
                    $("#a_b13").text(a_b13.toFixed(2) + "€");
                    voce = "B1-Diritti di brevetto ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "imm4") {
                if (segno == "-") {
                    a_b14 -= v;
                    $("#ma_b14").text(a_b14.toFixed(2) + "€");
                    $("#a_b14").text(a_b14.toFixed(2) + "€");
                    voce = "B1-Concessioni, ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b14 += v;
                    $("#ma_b14").text(a_b14.toFixed(2) + "€");
                    $("#a_b14").text(a_b14.toFixed(2) + "€");
                    voce = "B1-Concessioni, ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "imm5") {
                if (segno == "-") {
                    a_b15 -= v;
                    $("#ma_b15").text(a_b15.toString(10) + "€");
                    $("#a_b15").text(a_b15.toString(10) + "€");
                    voce = "B1-Avviamento";
                    addRow((-v), voce, "crono1");
                }
                if (segno == "+") {
                    a_b15 += v;
                    $("#ma_b15").text(a_b15.toFixed(2) + "€");
                    $("#a_b15").text(a_b15.toFixed(2) + "€");
                    voce = "B1-Avviamento";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "imm6") {
                if (segno == "-") {
                    a_b16 -= v;
                    $("#ma_b16").text(a_b16.toFixed(2) + "€");
                    $("#a_b16").text(a_b16.toFixed(2) + "€");
                    voce = "B1-Immobilizzazioni in corso ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b16 += v;
                    $("#ma_b16").text(a_b16.toFixed(2) + "€");
                    $("#a_b16").text(a_b16.toFixed(2) + "€");
                    voce = "B1-Immobilizzazioni in corso ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "imm7") {
                if (segno == "-") {
                    a_b17 -= v;
                    $("#ma_b17").text(a_b17.toFixed(2) + "€");
                    $("#a_b17").text(a_b17.toFixed(2) + "€");
                    voce = "B1-Altre ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b17 += v;
                    $("#ma_b17").text(a_b17.toFixed(2) + "€");
                    $("#a_b17").text(a_b17.toFixed(2) + "€");
                    voce = "B1-Altre ...";
                    addRow((v), voce, "crono1");
                }
            }

            if (valSel == "mat1") {
                if (segno == "-") {
                    a_b21 -= v;
                    $("#ma_b21").text(a_b21.toFixed(2) + "€");
                    $("#a_b21").text(a_b21.toFixed(2) + "€");
                    voce = "B2-Terreni e ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b21 += v;
                    $("#ma_b21").text(a_b21.toFixed(2) + "€");
                    $("#a_b21").text(a_b21.toFixed(2) + "€");
                    voce = "B2-Terreni e ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "mat2") {
                if (segno == "-") {
                    a_b22 -= v;
                    $("#ma_b22").text(a_b22.toFixed(2) + "€");
                    $("#a_b22").text(a_b22.toFixed(2) + "€");
                    voce = "B2-Impianti e ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b22 += v;
                    $("#ma_b22").text(a_b22.toFixed(2) + "€");
                    $("#a_b22").text(a_b22.toFixed(2) + "€");
                    voce = "B2-Impianti e ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "mat3") {
                if (segno == "-") {
                    a_b23 -= v;
                    $("#ma_b23").text(a_b23.toFixed(2) + "€");
                    $("#a_b23").text(a_b23.toFixed(2) + "€");
                    voce = "B2-Attrezzature ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b23 += v;
                    $("#ma_b23").text(a_b23.toFixed(2) + "€");
                    $("#a_b23").text(a_b23.toFixed(2) + "€");
                    voce = "B2-Attrezzature ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "mat4") {
                if (segno == "-") {
                    a_b24 -= v;
                    $("#ma_b24").text(a_b24.toFixed(2) + "€");
                    $("#a_b24").text(a_b24.toFixed(2) + "€");
                    voce = "B2-Altri beni";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b24 += v;
                    $("#ma_b24").text(a_b24.toFixed(2) + "€");
                    $("#a_b24").text(a_b24.toFixed(2) + "€");
                    voce = "B2-Altri beni";
                    addRow((-v), voce, "crono1");
                }
            }
            if (valSel == "mat5") {
                if (segno == "-") {
                    a_b25 -= v;
                    $("#ma_b25").text(a_b25.toFixed(2) + "€");
                    $("#a_b25").text(a_b25.toFixed(2) + "€");
                    voce = "B2-Immobilizzazioni in corso ...";
                    addRow((v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b25 += v;
                    $("#ma_b25").text(a_b25.toFixed(2) + "€");
                    $("#a_b25").text(a_b25.toFixed(2) + "€");
                    voce = "B2-Immobilizzazioni in corso ...";
                    addRow((v), voce, "crono1");
                }
            }

            if (valSel == "f1") {
                if (segno == "-") {
                    a_b31 -= v;
                    $("#ma_b31").text(a_b31.toFixed(2) + "€");
                    $("#a_b31").text(a_b31.toFixed(2) + "€");
                    voce = "B3-Partecipazioni azionarie";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b31 += v;
                    $("#ma_b31").text(a_b31.toFixed(2) + "€");
                    $("#a_b31").text(a_b31.toFixed(2) + "€");
                    voce = "B3-Partecipazioni azionarie";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "f2") {
                if (segno == "-") {
                    a_b32 -= v;
                    $("#ma_b32").text(a_b32.toFixed(2) + "€");
                    $("#a_b32").text(a_b32.toFixed(2) + "€");
                    voce = "B3-Crediti ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b32 += v;
                    $("#ma_b32").text(a_b32.toFixed(2) + "€");
                    $("#a_b32").text(a_b32.toFixed(2) + "€");
                    voce = "B3-Crediti ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "f3") {
                if (segno == "-") {
                    a_b33 -= v;
                    $("#ma_b33").text(a_b33.toFixed(2) + "€");
                    $("#a_b33").text(a_b33.toFixed(2) + "€");
                    voce = "B3-Altri titoli";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b33 += v;
                    $("#ma_b33").text(a_b33.toFixed(2) + "€");
                    $("#a_b33").text(a_b33.toFixed(2) + "€");
                    voce = "B3-Altri titoli";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "f4") {
                if (segno == "-") {
                    a_b34 -= v;
                    $("#ma_b34").text(a_b34.toFixed(2) + "€");
                    $("#a_b34").text(a_b34.toFixed(2) + "€");
                    voce = "B3-Azioni proprie";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_b34 += v;
                    $("#ma_b34").text(a_b34.toFixed(2) + "€");
                    $("#a_b34").text(a_b34.toFixed(2) + "€");
                    voce = "B3-Azioni proprie";
                    addRow((v), voce, "crono1");
                }
            }
        }

        if (selected == "attivo_circolante") {
            var valSel = $("#attivo_circolante_field").val();

            if (valSel == "r1") {
                if (segno == "-") {
                    a_c11 -= v;
                    $("#ma_c11").text(a_c11.toFixed(2) + "€");
                    $("#a_c11").text(a_c11.toFixed(2) + "€");
                    voce = "C1-Materie prime";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c11 += v;
                    $("#ma_c11").text(a_c11.toFixed(2) + "€");
                    $("#a_c11").text(a_c11.toFixed(2) + "€");
                    voce = "C1-Materie prime";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "r2") {
                if (segno == "-") {
                    a_c12 -= v;
                    $("#ma_c12").text(a_c12.toFixed(2) + "€");
                    $("#a_c12").text(a_c12.toFixed(2) + "€");
                    voce = "C1-Prodotti in corso ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c12 += v;
                    $("#ma_c12").text(a_c12.toFixed(2) + "€");
                    $("#a_c12").text(a_c12.toFixed(2) + "€");
                    voce = "C1-Prodotti in corso ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "r3") {
                if (segno == "-") {
                    a_c13 -= v;
                    $("#ma_c13").text(a_c13.toFixed(2) + "€");
                    $("#a_c13").text(a_c13.toFixed(2) + "€");
                    voce = "C1-Lavori in corso ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c13 += v;
                    $("#ma_c13").text(a_c13.toFixed(2) + "€");
                    $("#a_c13").text(a_c13.toFixed(2) + "€");
                    voce = "C1-Lavori in corso ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "r4") {
                if (segno == "-") {
                    a_c14 -= v;
                    $("#ma_c14").text(a_c14.toFixed(2) + "€");
                    $("#a_c14").text(a_c14.toFixed(2) + "€");
                    voce = "C1-Prodotti finiti ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c14 += v;
                    $("#ma_c14").text(a_c14.toFixed(2) + "€");
                    $("#a_c14").text(a_c14.toFixed(2) + "€");
                    voce = "C1-Prodotti finiti ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "r5") {
                if (segno == "-") {
                    a_c15 -= v;
                    $("#ma_c15").text(a_c15.toFixed(2) + "€");
                    $("#a_c15").text(a_c15.toFixed(2) + "€");
                    voce = "C1-Acconti";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c15 += v;
                    $("#ma_c15").text(a_c15.toFixed(2) + "€");
                    $("#a_c15").text(a_c15.toFixed(2) + "€");
                    voce = "C1-Acconti";
                    addRow((v), voce, "crono1");
                }
            }

            if (valSel == "c1") {
                if (segno == "-") {
                    a_c21 -= v;
                    $("#ma_c21").text(a_c21.toFixed(2) + "€");
                    $("#a_c21").text(a_c21.toFixed(2) + "€");
                    voce = "C2-Verso clienti";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c21 += v;
                    $("#ma_c21").text(a_c21.toFixed(2) + "€");
                    $("#a_c21").text(a_c21.toFixed(2) + "€");
                    voce = "C2-Verso clienti";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "c2") {
                if (segno == "-") {
                    a_c22 -= v;
                    $("#ma_c22").text(a_c22.toFixed(2) + "€");
                    $("#a_c22").text(a_c22.toFixed(2) + "€");
                    voce = "C2-Verso imprese ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c22 += v;
                    $("#ma_c22").text(a_c22.toFixed(2) + "€");
                    $("#a_c22").text(a_c22.toFixed(2) + "€");
                    voce = "C2-Verso imprese ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "c3") {
                if (segno == "-") {
                    a_c23 -= v;
                    $("#ma_c23").text(a_c23.toFixed(2) + "€");
                    $("#a_c23").text(a_c23.toFixed(2) + "€");
                    voce = "C2-Altri enti";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c23 += v;
                    $("#ma_c23").text(a_c23.toFixed(2) + "€");
                    $("#a_c23").text(a_c23.toFixed(2) + "€");
                    voce = "C2-Altri enti";
                    addRow((v), voce, "crono1");
                }
            }

            if (valSel == "af1") {
                if (segno == "-") {
                    a_c31 -= v;
                    $("#ma_c31").text(a_c31.toFixed(2) + "€");
                    $("#a_c31").text(a_c31.toFixed(2) + "€");
                    voce = "C3-Partecipazioni in imprese ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c31 += v;
                    $("#ma_c31").text(a_c31.toFixed(2) + "€");
                    $("#a_c31").text(a_c31.toFixed(2) + "€");
                    voce = "C3-Partecipazioni in imprese ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "af2") {
                if (segno == "-") {
                    a_c32 -= v;
                    $("#ma_c32").text(a_c32.toFixed(2) + "€");
                    $("#a_c32").text(a_c32.toFixed(2) + "€");
                    voce = "C3-Azioni proprie";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c32 += v;
                    $("#ma_c32").text(a_c32.toFixed(2) + "€");
                    $("#a_c32").text(a_c32.toFixed(2) + "€");
                    voce = "C3-Azioni proprie";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "af3") {
                if (segno == "-") {
                    a_c33 -= v;
                    $("#ma_c33").text(a_c33.toFixed(2) + "€");
                    $("#a_c33").text(a_c33.toFixed(2) + "€");
                    voce = "C3-Altri titoli";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c33 += v;
                    $("#ma_c33").text(a_c33.toFixed(2) + "€");
                    $("#a_c33").text(a_c33.toFixed(2) + "€");
                    voce = "C3-Altri titoli";
                    addRow((v), voce, "crono1");
                }
            }

            if (valSel == "dl1") {
                if (segno == "-") {
                    a_c41 -= v;
                    $("#ma_c41").text(a_c41.toFixed(2) + "€");
                    $("#a_c41").text(a_c41.toFixed(2) + "€");
                    voce = "C4-Depositi ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c41 += v;
                    $("#ma_c41").text(a_c41.toFixed(2) + "€");
                    $("#a_c41").text(a_c41.toFixed(2) + "€");
                    voce = "C4-Depositi ...";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "dl2") {
                if (segno == "-") {
                    a_c42 -= v;
                    $("#ma_c42").text(a_c42.toFixed(2) + "€");
                    $("#a_c42").text(a_c42.toFixed(2) + "€");
                    voce = "C4-Assegni";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c42 += v;
                    $("#ma_c42").text(a_c42.toFixed(2) + "€");
                    $("#a_c42").text(a_c42.toFixed(2) + "€");
                    voce = "C4-Assegni";
                    addRow((v), voce, "crono1");
                }
            }
            if (valSel == "dl3") {
                if (segno == "-") {
                    a_c43 -= v;
                    $("#ma_c43").text(a_c43.toFixed(2) + "€");
                    $("#a_c43").text(a_c43.toFixed(2) + "€");
                    voce = "C4-Denaro e ...";
                    addRow((-v), voce, "crono1");
                }

                if (segno == "+") {
                    a_c43 += v;
                    $("#ma_c43").text(a_c43.toFixed(2) + "€");
                    $("#a_c43").text(a_c43.toFixed(2) + "€");
                    voce = "C4-Denaro e ...";
                    addRow((v), voce, "crono1");
                }
            }
        }

        if (selected == "ratei_e_risconti_attivi") {
            if (segno == "-") {
                a_d -= v;
                $("#ma_d").text(a_d.toFixed(2) + "€");
                $("#a_d").text(a_d.toFixed(2) + "€");
                voce = "C4-Ratei e  ...";
                addRow((-v), voce, "crono1");
            }

            if (segno == "+") {
                a_d += v;
                $("#ma_d").text(a_d.toFixed(2) + "€");
                $("#a_d").text(a_d.toFixed(2) + "€");
                voce = "C4-Ratei e  ... attivi";
                addRow((v), voce, "crono1");
            }
        }

        alert("Attenzione! Non è stato bilanciato correttamente il mastrino tra dare e avere nel Conto Economico! Bilancialo altrimenti non potrà essere chiuso il bilancio!");
    } else {
        alert("Scegli o dare o avere!");
    }
}

function stp_inserisci() {
    var selected = $("#passivo").val();
    var valore = document.getElementById("dato2").value;
    var voce;

    if (checked == true) {
        document.getElementById("dato2").value = "";
        valore = valore.replace(/[.]/g, "");
        valore = valore.replace(/[,]/g, ".");
        v = parseFloat(valore);

        if (isNaN(v)) {
            alert("Inserisci un numero!");
            v = 0;
        }

        if (selected == "fondo_rischi_e_oneri") {
            var valSel = $("#fondi_field").val();

            if(valSel == "fro1") {
                if (segno == "+") {
                    p_a1 += v;
                    $("#mp_a1").text(p_a1.toFixed(2) + "€");
                    $("#p_a1").text(p_a1.toFixed(2) + "€");
                    voce = "A-Per trattamento ...";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_a1 -= v;
                    $("#mp_a1").text(p_a1.toFixed(2) + "€");
                    $("#p_a1").text(p_a1.toFixed(2) + "€");
                    voce = "A-Per trattamento ...";
                    addRow((-v), voce, "crono2");
                }
            }

            if(valSel == "fro2") {
                if (segno == "+") {
                    p_a2 += v;
                    $("#mp_a2").text(p_a2.toFixed(2) + "€");
                    $("#p_a2").text(p_a2.toFixed(2) + "€");
                    voce = "A-Per imposte";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_a2 -= v;
                    $("#mp_a2").text(p_a2.toFixed(2) + "€");
                    $("#p_a2").text(p_a2.toFixed(2) + "€");
                    voce = "A-Per imposte";
                    addRow((-v), voce, "crono2");
                }
            }

            if(valSel == "fro3") {
                if (segno == "+") {
                    p_a3 += v;
                    $("#mp_a3").text(p_a3.toFixed(2) + "€");
                    $("#p_a3").text(p_a3.toFixed(2) + "€");
                    voce = "A-Altri fondi";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_a3 -= v;
                    $("#mp_a3").text(p_a3.toFixed(2) + "€");
                    $("#p_a3").text(p_a3.toFixed(2) + "€");
                    voce = "A-Altri fondi";
                    addRow((-v), voce, "crono2");
                }
            }
        }

        if (selected == "patrimonio_netto") {
            var valSel = $("#patrimonio_netto_field").val();

            if (valSel == "p1") {
                if (segno == "+") {
                    p_b1 += v;
                    $("#mp_b1").text(p_b1.toFixed(2) + "€");
                    $("#p_b1").text(p_b1.toFixed(2) + "€");
                    voce = "B-Capitale sociale";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_b1 -= v;
                    $("#mp_b1").text(p_b1.toFixed(2) + "€");
                    $("#p_b1").text(p_b1.toFixed(2)) + "€";
                    voce = "B-Capitale sociale";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "p2") {
                if (segno == "+") {
                    p_b2 += v;
                    $("#mp_b2").text(p_b2.toFixed(2) + "€");
                    $("#p_b2").text(p_b2.toFixed(2) + "€");
                    voce = "B-Riserva sovrapprezzo...";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_b2 -= v;
                    $("#mp_b2").text(p_b2.toFixed(2) + "€");
                    $("#p_b2").text(p_b2.toFixed(2) + "€");
                    voce = "B-Riserva sovrapprezzo ...";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "p3") {
                if (segno == "+") {
                    p_b3 += v;
                    $("#mp_b3").text(p_b3.toFixed(2) + "€");
                    $("#p_b3").text(p_b3.toFixed(2) + "€");
                    voce = "B-Riserva ...";
                    addRow((v), voce, "crono2");

                }

                if (segno == "-") {
                    p_b3 -= v;
                    $("#mp_b3").text(p_b3.toFixed(2) + "€");
                    $("#p_b3").text(p_b3.toFixed(2) + "€");
                    voce = "B-Riserva ...";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "p4") {
                if (segno == "+") {
                    p_b4 += v;
                    $("#mp_b4").text(p_b4.toFixed(2) + "€");
                    $("#p_b4").text(p_b4.toFixed(2) + "€");
                    voce = "B-Riserva legale";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_b4 -= v;
                    $("#mp_b4").text(p_b4.toFixed(2) + "€");
                    $("#p_b4").text(p_b4.toFixed(2) + "€");
                    voce = "B-Riserva legale";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "p5") {
                if (segno == "+") {
                    p_b5 += v;
                    $("#mp_b5").text(p_b5.toFixed(2) + "€");
                    $("#p_b5").text(p_b5.toFixed(2) + "€");
                    voce = "B-Riserva per azioni ...";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_b5 -= v;
                    $("#mp_b5").text(p_b5.toFixed(2) + "€");
                    $("#p_b5").text(p_b5.toFixed(2) + "€");
                    voce = "B-Riserva per azioni ...";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "p6") {
                if (segno == "+") {
                    p_b6 += v;
                    $("#mp_b6").text(p_b6.toFixed(2) + "€");
                    $("#p_b6").text(p_b6.toFixed(2) + "€");
                    voce = "B-Riserve statutarie";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_b6 -= v;
                    $("#mp_b6").text(p_b6.toFixed(2) + "€");
                    $("#p_b6").text(p_b6.toFixed(2) + "€");
                    voce = "B-Riserve statutarie";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "p7") {
                if (segno == "+") {
                    p_b7 += v;
                    $("#mp_b7").text(p_b7.toFixed(2) + "€");
                    $("#p_b7").text(p_b7.toFixed(2) + "€");
                    voce = "B-Altre riserve";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_b7 -= v;
                    $("#mp_b7").text(p_b7.toFixed(2) + "€");
                    $("#p_b7").text(p_b7.toFixed(2) + "€");
                    voce = "B-Altre riserve";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "p8") {
                if (segno == "+") {
                    p_b8 += v;
                    $("#mp_b8").text(p_b8.toFixed(2) + "€");
                    $("#p_b8").text(p_b8.toFixed(2) + "€");
                    voce = "B-Utili ...";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_b8 -= v;
                    $("#mp_b8").text(p_b8.toFixed(2) + "€");
                    $("#p_b8").text(p_b8.toFixed(2) + "€");
                    voce = "B-Utili ...";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "p9") {
                if (segno == "+") {
                    p_b9 += v;
                    $("#mp_b9").text(p_b9.toFixed(2) + "€");
                    $("#p_b9").text(p_b9.toFixed(2) + "€");
                    voce = "B-Utili dell'esercizio";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_b9 -= v;
                    $("#mp_b9").text(p_b9.toFixed(2) + "€");
                    $("#p_b9").text(p_b9.toFixed(2) + "€");
                    voce = "B-Utili dell'esercizio";
                    addRow((-v), voce, "crono2");
                }
            }
        }

        if (selected == "fondo_tfr") {
            if (segno == "+") {
                p_tfr += v;
                $("#mp_tfr").text(p_tfr.toFixed(2) + "€");
                $("#p_tfr").text(p_tfr.toFixed(2) + "€");
                voce = "C-TFR";
                addRow((v), voce, "crono2");
            }

            if (segno == "-") {
                p_tfr -= v;
                $("#mp_tfr").text(p_tfr.toFixed(2) + "€");
                $("#p_tfr").text(p_tfr.toFixed(2) + "€");
                voce = "C-TFR";
                addRow((-v), voce, "crono2");
            }
        }

        if (selected == "debiti") {
            var valSel = $("#debiti_field").val();

            if (valSel == "d1") {
                if (segno == "+") {
                    p_d1 += v;
                    $("#mp_d1").text(p_d1.toFixed(2) + "€");
                    $("#p_d1").text(p_d1.toFixed(2) + "€");
                    voce = "D-Obbligazioni";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d1 -= v;
                    $("#mp_d1").text(p_d1.toFixed(2) + "€");
                    $("#p_d1").text(p_d1.toFixed(2) + "€");
                    voce = "D-Obbligazioni";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d2") {
                if (segno == "+") {
                    p_d2 += v;
                    $("#mp_d2").text(p_d2.toFixed(2) + "€");
                    $("#p_d2").text(p_d2.toFixed(2) + "€");
                    voce = "D-Obbligazioni convertibili";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d2 -= v;
                    $("#mp_d2").text(p_d2.toFixed(2) + "€");
                    $("#p_d2").text(p_d2.toFixed(2) + "€");
                    voce = "D-Obbligazioni convertibili";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d3") {
                if (segno == "+") {
                    p_d3 += v;
                    $("#mp_d3").text(p_d3.toFixed(2) + "€");
                    $("#p_d3").text(p_d3.toFixed(2) + "€");
                    voce = "D-Debiti verso banche";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d3 -= v;
                    $("#mp_d3").text(p_d3.toFixed(2) + "€");
                    $("#p_d3").text(p_d3.toFixed(2) + "€");
                    voce = "D-Debiti verso banche";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d4") {
                if (segno == "+") {
                    p_d4 += v;
                    $("#mp_d4").text(p_d4.toFixed(2) + "€");
                    $("#p_d4").text(p_d4.toFixed(2) + "€");
                    voce = "D-Debiti verso fornitori";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d4 -= v;
                    $("#mp_d4").text(p_d4.toFixed(2) + "€");
                    $("#p_d4").text(p_d4.toFixed(2) + "€");
                    voce = "D-Debiti verso fornitori";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d5") {
                if (segno == "+") {
                    p_d5 += v;
                    $("#mp_d5").text(p_d5.toFixed(2) + "€");
                    $("#p_d5").text(p_d5.toFixed(2) + "€");
                    voce = "D-Acconti";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d5 -= v;
                    $("#mp_d5").text(p_d5.toFixed(2) + "€");
                    $("#p_d5").text(p_d5.toFixed(2) + "€");
                    voce = "D-Acconti";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d6") {
                if (segno == "+") {
                    p_d6 += v;
                    $("#mp_d6").text(p_d6.toFixed(2) + "€");
                    $("#p_d6").text(p_d6.toFixed(2) + "€");
                    voce = "D-Debiti verso fornitori";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d6 -= v;
                    $("#mp_d6").text(p_d6.toFixed(2) + "€");
                    $("#p_d6").text(p_d6.toFixed(2) + "€");
                    voce = "D-Debiti verso fornitori";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d7") {
                if (segno == "+") {
                    p_d7 += v;
                    $("#mp_d7").text(p_d7.toFixed(2) + "€");
                    $("#p_d7").text(p_d7.toFixed(2) + "€");
                    voce = "D-Debiti rappresentati ...";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d7 -= v;
                    $("#mp_d7").text(p_d7.toFixed(2) + "€");
                    $("#p_d7").text(p_d7.toFixed(2) + "€");
                    voce = "D-Debiti rappresentati ...";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d8") {
                if (segno == "+") {
                    p_d8 += v;
                    $("#mp_d8").text(p_d8.toFixed(2) + "€");
                    $("#p_d8").text(p_d8.toFixed(2) + "€");
                    voce = "D-Debiti verso imprese ...";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d8 -= v;
                    $("#mp_d8").text(p_d8.toFixed(2) + "€");
                    $("#p_d8").text(p_d8.toFixed(2) + "€");
                    voce = "D-Debiti verso imprese ...";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d9") {
                if (segno == "+") {
                    p_d9 += v;
                    $("#mp_d9").text(p_d9.toFixed(2) + "€");
                    $("#p_d9").text(p_d9.toFixed(2) + "€");
                    voce = "D-Debiti tributari";
                    addRow((v), voce, "crono2");
                }
                if (segno == "-") {
                    p_d9 -= v;
                    $("#mp_d9").text(p_d9.toFixed(2) + "€");
                    $("#p_d9").text(p_d9.toFixed(2) + "€");
                    voce = "D-Debiti tributari";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d10") {
                if (segno == "+") {
                    p_d10 += v;
                    $("#mp_d10").text(p_d10.toFixed(2) + "€");
                    $("#p_d10").text(p_d10.toFixed(2) + "€");
                    voce = "D-Debiti verso istituti ...";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d10 -= v;
                    $("#mp_d10").text(p_d10.toFixed(2) + "€");
                    $("#p_d10").text(p_d10.toFixed(2) + "€");
                    voce = "D-Debiti verso istituti ...";
                    addRow((-v), voce, "crono2");
                }
            }

            if (valSel == "d11") {
                if (segno == "+") {
                    p_d11 += v;
                    $("#mp_d11").text(p_d11.toFixed(2) + "€");
                    $("#p_d11").text(p_d11.toFixed(2) + "€");
                    voce = "D-Altri debiti";
                    addRow((v), voce, "crono2");
                }

                if (segno == "-") {
                    p_d11 -= v;
                    $("#mp_d11").text(p_d11.toFixed(2) + "€");
                    $("#p_d11").text(p_d11.toFixed(2) + "€");
                    voce = "D-Altri debiti";
                    addRow((-v), voce, "crono2");
                }
            }
        }

        if (selected == "ratei_e_risconti_passivi") {
            if (segno == "+") {
                p_e += v;
                $("#mp_e").text(p_e.toFixed(2) + "€");
                $("#p_e").text(p_e.toFixed(2) + "€");
                voce = "D-Ratei ... passivi";
                addRow((v), voce, "crono2");
            }

            if (segno == "-") {
                p_e -= v;
                $("#mp_e").text(p_e.toFixed(2) + "€");
                $("#p_e").text(p_e.toFixed(2) + "€");
                voce = "D-Ratei e ... passivi";
                addRow((-v), voce, "crono2");
            }
        }

        alert("Attenzione! Non è stato bilanciato correttamente il mastrino tra dare e avere nel Conto Economico! Bilancialo altrimenti non potrà essere chiuso il bilancio!");
    } else {
        alert("Scegli o dare o avere!");
    }
}

function a_inserisci() {
    var selected = $("#valoriProduzione").val();
    var valore = document.getElementById("dato3").value;
    var voce;

    if (checked == true) {
        document.getElementById("dato3").value = "";
        valore = valore.replace(/[.]/g, "");
        valore = valore.replace(/[,]/g, ".");
        v = parseFloat(valore);

        if (isNaN(v)) {
            alert("Inserisci un numero!");
            v = 0;
        }

        if (selected == "ricavi_vendite") {
            if (segno == "+") {
                a1 += v;
                $("#ce_a1").text(a1.toFixed(2) + "€");
                $("#a1").text(a1.toFixed(2) + "€");
                voce = "A-Ricavi dalle vendite e ...";
                addRow((v), voce, "crono3");
            }

            if (segno == "-") {
                a1 -= v;
                $("#ce_a1").text(a1.toFixed(2) + "€");
                $("#a1").text(a1.toFixed(2) + "€");
                voce = "A-Ricavi dalle vendite e ...";
                addRow((-v), voce, "crono3");
            }
        }

        if (selected == "variazione_rimanenze") {
            if (segno == "+") {
                a2 += v;
                $("#ce_a2").text(a2.toFixed(2) + "€");
                $("#a2").text(a2.toFixed(2) + "€");
                voce = "A-variazione delle rimanenze e ...";
                addRow((v), voce, "crono3");
            }

            if (segno == "-") {
                a2 -= v;
                $("#ce_a2").text(a2.toFixed(2) + "€");
                $("#a2").text(a2.toFixed(2) + "€");
                voce = "A-Varizione delle rimanenze e ...";
                addRow((-v), voce, "crono3");
            }
        }

        if (selected == "semilavorati_e_finiti") {
            if (segno == "+") {
                a3 += v;
                $("#ce_a3").text(a3.toFixed(2) + "€");
                $("#a3").text(a3.toFixed(2) + "€");
                voce = "A-Semilavorati e ...";
                addRow((v), voce, "crono3");
            }

            if (segno == "-") {
                a3 -= v;
                $("#ce_a3").text(a3.toFixed(2) + "€");
                $("#a3").text(a3.toFixed(2) + "€");
                voce = "A-Semilavorati e ...";
                addRow((-v), voce, "crono3");
            }
        }

        if (selected == "variazioni_lavori") {
            if (segno == "+") {
                a4 += v;
                $("#ce_a4").text(a4.toFixed(2) + "€");
                $("#a4").text(a4.toFixed(2) + "€");
                voce = "A-Variazione dei lavori ...";
                addRow((v), voce, "crono3");
            }

            if (segno == "-") {
                a4 -= v;
                $("#ce_a4").text(a4.toFixed(2) + "€");
                $("#a4").text(a4.toFixed(2) + "€");
                voce = "A-Variazione dei lavori ...";
                addRow((-v), voce, "crono3");
            }
        }

        if (selected == "incrementi") {
            if (segno == "+") {
                a5 += v;
                $("#ce_a5").text(a5.toFixed(2) + "€");
                $("#a5").text(a5.toFixed(2) + "€");
                voce = "A-Incrementi ...";
                addRow((v), voce, "crono3");
            }

            if (segno == "-") {
                a5 -= v;
                $("#ce_a5").text(a5.toFixed(2) + "€");
                $("#a5").text(a5.toFixed(2) + "€");
                voce = "A-Incrementi ...";
                addRow((-v), voce, "crono3");
            }
        }

        if (selected == "altri_ricavi") {
            if (segno == "+") {
                a6 += v;
                $("#ce_a6").text(a6.toFixed(2) + "€");
                $("#a6").text(a6.toFixed(2) + "€");
                voce = "A-Altri ricavi e ...";
                addRow((v), voce, "crono3");
            }

            if (segno == "-") {
                a6 -= v;
                $("#ce_a6").text(a6.toFixed(2) + "€");
                $("#a6").text(a6.toFixed(2) + "€");
                voce = "A-Altri ricavi e ...";
                addRow((-v), voce, "crono3");
            }
        }
    } else {
        alert("Scegli o dare o avere!");
    }
}

function b_inserisci() {
    var selected = $("#costiProduzione").val();
    var valore = document.getElementById("dato4").value;
    var voce;

    if (checked == true) {
        document.getElementById("dato4").value = "";
        valore = valore.replace(/[.]/g, "");
        valore = valore.replace(/[,]/g, ".");
        v = parseFloat(valore);

        if (isNaN(v)) {
            alert("Inserisci un numero!");
            v = 0;
        }

        if (selected == "materie") {
            if (segno == "-") {
                b1 -= v;
                $("#ce_b1").text(b1.toFixed(2) + "€");
                $("#b1").text(b1.toFixed(2) + "€");
                voce = "B-Per materie prime, ...";
                addRow((-v), voce, "crono3");
            }

            if (segno == "+") {
                b1 += v;
                $("#ce_b1").text(b1.toFixed(2) + "€");
                $("#b1").text(b1.toFixed(2) + "€");
                voce = "B-Per materie prime, ...";
                addRow((v), voce, "crono3");
            }
        }

        if (selected == "servizi") {
            if (segno == "-") {
                b2 -= v;
                $("#ce_b2").text(b2.toFixed(2) + "€");
                $("#b2").text(b2.toFixed(2) + "€");
                voce = "B-Per servizi";
                addRow((-v), voce, "crono3");
            }

            if (segno == "+") {
                b2 += v;
                $("#ce_b2").text(b2.toFixed(2) + "€");
                $("#b2").text(b2.toFixed(2) + "€");
                voce = "B-Per servizi";
                addRow((v), voce, "crono3");
            }
        }

        if (selected == "godimento") {
            if (segno == "-") {
                b3 -= v;
                $("#ce_b3").text(b3.toFixed(2) + "€");
                $("#b3").text(b3.toFixed(2) + "€");
                voce = "B-Per godimento di ...";
                addRow((-v), voce, "crono3");
            }

            if (segno == "+") {
                b3 += v;
                $("#ce_b3").text(b3.toFixed(2) + "€");
                $("#b3").text(b3.toFixed(2) + "€");
                voce = "B-Per godimento di ...";
                addRow((v), voce, "crono3");
            }
        }

        if (selected == "personale") {
            var valSel = $("#costiPersonale").val();

            if (valSel == "salari_stipendi") {
                if (segno == "-") {
                    b41 -= v;
                    $("#ce_b41").text(b41.toFixed(2) + "€");
                    $("#b41").text(b41.toFixed(2) + "€");
                    voce = "B4-Salari e stipendi";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    b41 += v;
                    $("#ce_b41").text(b41.toFixed(2) + "€");
                    $("#b41").text(b41.toFixed(2) + "€");
                    voce = "B4-Salari e stipendi";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "oneri_spec") {
                if (segno == "-") {
                    b42 -= v;
                    $("#ce_b42").text(b42.toFixed(2) + "€");
                    $("#b42").text(b42.toFixed(2) + "€");
                    voce = "B4-Oneri speciali";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    b42 += v;
                    $("#ce_b42").text(b42.toFixed(2) + "€");
                    $("#b42").text(b42.toFixed(2) + "€");
                    voce = "B4-Oneri speciali";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "tfr") {
                if (segno == "-") {
                    b43 -= v;
                    $("#ce_b43").text(b43.toFixed(2) + "€");
                    $("#b43").text(b43.toFixed(2) + "€");
                    voce = "B4-TFR";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    b43 += v;
                    $("#ce_b43").text(b43.toFixed(2) + "€");
                    $("#b43").text(b43.toFixed(2) + "€");
                    voce = "B4-TFR";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "tratt_quiescenza") {
                if (segno == "-") {
                    b44 -= v;
                    $("#ce_b44").text(b44.toFixed(2) + "€");
                    $("#b44").text(b44.toFixed(2) + "€");
                    voce = "B4-Trattamenti di quiescenza";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    b44 += v;
                    $("#ce_b44").text(b44.toFixed(2) + "€");
                    $("#b44").text(b44.toFixed(2) + "€");
                    voce = "B4-Trattamenti di quiescenza";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "altri_costi") {
                if (segno == "-") {
                    b45 -= v;
                    $("#ce_b45").text(b45.toFixed(2) + "€");
                    $("#b45").text(b45.toFixed(2) + "€");
                    voce = "B4-Altri costi";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    b45 += v;
                    $("#ce_b45").text(b45.toFixed(2) + "€");
                    $("#b45").text(b45.toFixed(2) + "€");
                    voce = "B4-Altri costi";
                    addRow((v), voce, "crono3");
                }
            }


        }

        if (selected == "amm_sval") {
            var valSel = $("#ammSv").val();

            if (valSel == "amm_imm_imm") {
                if (segno == "-") {
                    b51 -= v;
                    $("#ce_b51").text(b51.toFixed(2) + "€");
                    $("#b51").text(b51.toFixed(2) + "€");
                    voce = "B5-Ammortamento ... immateriali";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    b51 += v;
                    $("#ce_b51").text(b51.toFixed(2) + "€");
                    $("#b51").text(b51.toFixed(2) + "€");
                    voce = "B5-Ammortamento ... immateriali";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "amm_imm_mat") {
                if (segno == "-") {
                    b52 -= v;
                    $("#ce_b52").text(b52.toFixed(2) + "€");
                    $("#b52").text(b52.toFixed(2) + "€");
                    voce = "B5-Ammortamento ... materiali";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    b52 += v;
                    $("#ce_b52").text(b52.toFixed(2) + "€");
                    $("#b52").text(b52.toFixed(2) + "€");
                    voce = "B5-Ammortamento ... materiali";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "sv_imm") {
                if (segno == "-") {
                    b53 -= v;
                    $("#ce_b53").text(b53.toFixed(2) + "€");
                    $("#b53").text(b53.toFixed(2) + "€");
                    voce = "B5-Altre svalutazioni ...";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    b53 += v;
                    $("#ce_b53").text(b53.toFixed(2) + "€");
                    $("#b53").text(b53.toFixed(2) + "€");
                    voce = "B5-Altre svalutazioni ...";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "sv_cr_comp") {
                if (segno == "-") {
                    b54 -= v;
                    $("#ce_b54").text(b54.toFixed(2) + "€");
                    $("#b54").text(b54.toFixed(2) + "€");
                    voce = "B5-Svalutazioni crediti ...";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    b54 += v;
                    $("#ce_b54").text(b54.toFixed(2) + "€");
                    $("#b54").text(b54.toFixed(2) + "€");
                    voce = "B5-Svalutazioni crediti ...";
                    addRow((v), voce, "crono3");
                }
            }
        }

        if (selected == "variazioni") {
            if (segno == "-") {
                b6 -= v;
                $("#ce_b6").text(b6.toFixed(2) + "€");
                $("#b6").text(b6.toFixed(2) + "€");
                voce = "B-Variazioni delle rimanenze ...";
                addRow((-v), voce, "crono3");
            }

            if (segno == "+") {
                b6 += v;
                $("#ce_b6").text(b6.toFixed(2) + "€");
                $("#b6").text(b6.toFixed(2) + "€");
                voce = "B-Variazioni delle rimanenze ...";
                addRow((v), voce, "crono3");
            }
        }

        if (selected == "acc_rischi") {
            if (segno == "-") {
                b7 -= v;
                $("#ce_b7").text(b7.toFixed(2) + "€");
                $("#b7").text(b7.toFixed(2) + "€");
                voce = "B-Accantonamento per rischi";
                addRow((-v), voce, "crono3");
            }

            if (segno == "+") {
                b7 += v;
                $("#ce_b7").text(b7.toFixed(2) + "€");
                $("#b7").text(b7.toFixed(2) + "€");
                voce = "B-Accantonamento per rischi";
                addRow((v), voce, "crono3");
            }
        }

        if (selected == "altri_acc") {
            if (segno == "-") {
                b8 -= v;
                $("#ce_b8").text(b8.toFixed(2) + "€");
                $("#b8").text(b8.toFixed(2) + "€");
                voce = "B-Altri accantonamenti";
                addRow((-v), voce, "crono3");
            }

            if (segno == "+") {
                b8 += v;
                $("#ce_b8").text(b8.toFixed(2) + "€");
                $("#b8").text(b8.toFixed(2) + "€");
                voce = "B-Altri accantonamenti";
                addRow((v), voce, "crono3");
            }
        }

        if (selected == "oneri_diversi") {
            if (segno == "-") {
                b9 -= v;
                $("#ce_b9").text(b9.toFixed(2) + "€");
                $("#b9").text(b9.toFixed(2) + "€");
                voce = "B-Oneri diversi ...";
                addRow((-v), voce, "crono3");
            }

            if (segno == "+") {
                b9 += v;
                $("#ce_b9").text(b9.toFixed(2) + "€");
                $("#b9").text(b9.toFixed(2) + "€");
                voce = "B-Oneri diversi ...";
                addRow((v), voce, "crono3");
            }
        }
    } else {
        alert("Scegli o dare o avere!");
    }
}

function c_inserisci() {
    var selected = $("#proventiOneriFinanziari").val();
    var valore = document.getElementById("dato5").value;
    var voce;

    if(checked == true) {
        document.getElementById("dato5").value = "";
        valore = valore.replace(/[.]/g, "");
        valore = valore.replace(/[,]/g, ".");
        v = parseFloat(valore);

        if (isNaN(v)) {
            alert("Inserisci un numero!");
            v = 0;
        }

        if (selected == "proventi_part") {
            if (segno == "-") {
                c1 -= v;
                $("#ce_c1").text(c1.toFixed(2) + "€");
                $("#c1").text(c1.toFixed(2) + "€");
                voce = "C-Proventi da partecipazione";
                addRow((-v), voce, "crono3");
            }

            if (segno == "+") {
                c1 += v;
                $("#ce_c1").text(c1.toFixed(2) + "€");
                $("#c1").text(c1.toFixed(2) + "€");
                voce = "C-Proventi da partecipazione";
                addRow((v), voce, "crono3");
            }
        }

        if (selected == "altri_prov") {
            var valSel = $("#altriProv").val();

            if (valSel == "nelle_imm") {
                if (segno == "-") {
                    c21 -= v;
                    $("#ce_c21").text(c21.toFixed(2) + "€");
                    $("#c21").text(c21.toFixed(2) + "€");
                    voce = "C2-Da crediti iscritti ...";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    c21 += v;
                    $("#ce_c21").text(c21.toFixed(2) + "€");
                    $("#c21").text(c21.toFixed(2) + "€");
                    voce = "C2-Da crediti iscritti ...";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "altriprov") {
                if (segno == "-") {
                    c22 -= v;
                    $("#ce_c22").text(c22.toFixed(2) + "€");
                    $("#c22").text(c22.toFixed(2) + "€");
                    voce = "C2-Da titoli iscritti ...";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    c22 += v;
                    $("#ce_c22").text(c22.toFixed(2) + "€");
                    $("#c22").text(c22.toFixed(2) + "€");
                    voce = "C2-Da titoli iscritti ...";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "nel_att_circ") {
                if (segno == "-") {
                    c23 -= v;
                    $("#ce_c23").text(c23.toFixed(2) + "€");
                    $("#c23").text(c23.toFixed(2) + "€");
                    voce = "C2-Nell'attivo circolante";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    c23 += v;
                    $("#ce_c23").text(c23.toFixed(2) + "€");
                    $("#c23").text(c23.toFixed(2) + "€");
                    voce = "C2-Nell'attivo circolante";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "prov_diversi") {
                if (segno == "-") {
                    c24 -= v;
                    $("#ce_c24").text(c24.toFixed(2) + "€");
                    $("#c24").text(c24.toFixed(2) + "€");
                    voce = "C2-Proventi diversi";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    c24 += v;
                    $("#ce_c24").text(c24.toFixed(2) + "€");
                    $("#c24").text(c24.toFixed(2) + "€");
                    voce = "C2-Proventi diversi";
                    addRow((v), voce, "crono3");
                }
            }
        }

        if (selected == "int_e_oneri") {
            if (segno == "-") {
                c3 += v;
                $("#ce_c3").text(c3.toFixed(2) + "€");
                $("#c3").text(c3.toFixed(2) + "€");
                voce = "C-Interessi e altri oneri ...";
                addRow((v), voce, "crono3");
            }

            if (segno == "+") {
                c3 -= v;
                $("#ce_c3").text(c3.toFixed(2) + "€");
                $("#c3").text(c3.toFixed(2) + "€");
                voce = "C-Interessi e altri oneri ...";
                addRow((-v), voce, "crono3");
            }
        }
    } else {
        alert("Scegli o dare o avere!");
    }
}

function d_inserisci() {
    var selected = $("#rettifiche").val();
    var valore = document.getElementById("dato6").value;
    var voce;

    if (checked == true) {
        document.getElementById("dato6").value = "";
        valore = valore.replace(/[.]/g, "");
        valore = valore.replace(/[,]/g, ".");
        v = parseFloat(valore);

        if (isNaN(v)) {
            alert("Inserisci un numero!");
            v = 0;
        }

        if (selected == "rivalutazioni") {
            var valSel = $("#attivita").val();

            if (valSel == "di_part") {
                if (segno == "-") {
                    d11 -= v;
                    $("#ce_d11").text(d11.toFixed(2) + "€");
                    $("#d11").text(d11.toFixed(2) + "€");
                    voce = "D1-Di partecipazione";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    d11 += v;
                    $("#ce_d11").text(d11.toFixed(2) + "€");
                    $("#d11").text(d11.toFixed(2) + "€");
                    voce = "D1-Di partecipazione";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "di_imm") {
                if (segno == "-") {
                    d12 -= v;
                    $("#ce_d12").text(d12.toFixed(2) + "€");
                    $("#d12").text(d12.toFixed(2) + "€");
                    voce = "D1-Di immobilizzazioni ...";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    d12 += v;
                    $("#ce_d12").text(d12.toFixed(2) + "€");
                    $("#d12").text(d12.toFixed(2) + "€");
                    voce = "D1-Di immobilizzazioni ...";
                    addRow((v), voce, "crono3");
                }
            }

            if (valSel == "di_title") {
                if (segno == "-") {
                    d13 -= v;
                    $("#ce_d13").text(d13.toFixed(2) + "€");
                    $("#d13").text(d13.toFixed(2) + "€");
                    voce = "D1-Di titoli";
                    addRow((-v), voce, "crono3");
                }

                if (segno == "+") {
                    d13 += v;
                    $("#ce_d13").text(d13.toFixed(2) + "€");
                    $("#d13").text(d13.toFixed(2) + "€");
                    voce = "D1-Di titoli iscritti ...";
                    addRow((v), voce, "crono3");
                }
            }
        }

        if (selected == "svalutazioni") {
            var valSel = $("#attivita").val();

            if (valSel == "di_part") {
                if (segno == "-") {
                    d21 += v;
                    $("#ce_d21").text(d21.toFixed(2) + "€");
                    $("#d21").text(d21.toFixed(2) + "€");
                    voce = "D2-Di partecipazione";
                    addRow((v), voce, "crono3");
                }

                if (segno == "+") {
                    d21 -= v;
                    $("#ce_d21").text(d21.toFixed(2) + "€");
                    $("#d21").text(d21.toFixed(2) + "€");
                    voce = "D2-Di partecipazione";
                    addRow((-v), voce, "crono3");
                }
            }

            if (valSel == "di_imm") {
                if (segno == "-") {
                    d22 += v;
                    $("#ce_d22").text(d22.toFixed(2) + "€");
                    $("#d22").text(d22.toFixed(2) + "€");
                    voce = "D2-Di immobilizzazioni ...";
                    addRow((v), voce, "crono3");
                }

                if (segno == "+") {
                    d22 -= v;
                    $("#ce_d22").text(d22.toFixed(2) + "€");
                    $("#d22").text(d22.toFixed(2) + "€");
                    voce = "D2-Di immobilizzazioni ...";
                    addRow((-v), voce, "crono3");
                }
            }

            if (valSel == "di_title") {
                if (segno == "-") {
                    d23 += v;
                    $("#ce_d23").text(d23.toFixed(2) + "€");
                    $("#d23").text(d23.toFixed(2) + "€");
                    voce = "D2-Di titoli iscritti ...";
                    addRow((v), voce, "crono3");
                }

                if (segno == "+") {
                    d23 -= v;
                    $("#ce_d23").text(d23.toFixed(2) + "€");
                    $("#d23").text(d23.toFixed(2) + "€");
                    voce = "D2-Di titoli iscritti ...";
                    addRow((-v), voce, "crono3");
                }
            }
        }
    } else {
        alert("Scegli o dare o avere!");
    }
}

function e_inserisci() {
    var selected = $("#proventiOneriStraordinari").val();
    var valore = document.getElementById("dato7").value;
    var voce;

    if (checked == true) {
        document.getElementById("dato7").value = "";
        valore = valore.replace(/[.]/g, "");
        valore = valore.replace(/[,]/g, ".");
        v = parseFloat(valore);

        if (isNaN(v)) {
            alert("Inserisci un numero!");
            v = 0;
        }

        if (selected == "prov_sep") {
            if (segno == "-") {
                e1 -= v;
                $("#ce_e1").text(e1.toFixed(2) + "€");
                $("#e1").text(e1.toFixed(2) + "€");
                voce = "E-Proventi con separata indicazione ...";
                addRow((-v), voce, "crono3");
            }

            if (segno == "+") {
                e1 += v;
                $("#ce_e1").text(e1.toFixed(2) + "€");
                $("#e1").text(e1.toFixed(2) + "€");
                voce = "E-Proventi con separata indicazione ...";
                addRow((v), voce, "crono3");
            }
        }

        if (selected == "oneri_sep_minus") {
            if (segno == "-") {
                e2 += v;
                $("#ce_e2").text(e2.toFixed(2) + "€");
                $("#e2").text(e2.toFixed(2) + "€");
                voce = "E-Oneri con separata indicazione ...";
                addRow((v), voce, "crono3");
            }

            if (segno == "+") {
                e2 -= v;
                $("#ce_e2").text(e2.toFixed(2) + "€");
                $("#e2").text(e2.toFixed(2) + "€");
                voce = "E-Oneri con separata indicazione ...";
                addRow((-v), voce, "crono3");
            }
        }
    } else {
        alert("Scegli o dare o avere!");
    }
}

function calcola() {
    var t1 = 0.0, t2 = 0.0;

    var ti = a_b11 + a_b12 + a_b13 + a_b14 + a_b15 + a_b16 + a_b17 + a_b21 + a_b22 + a_b23 + a_b24 + a_b25 + a_b31
        + a_b32 + a_b33 + a_b34;
    var tac = a_c11 + a_c12 + a_c13 + a_c14 + a_c15 + a_c21 + a_c22 + a_c23 + a_c31 + a_c32 + a_c33 + a_c41 + a_c42
        + a_c43;

    var td = p_d1 + p_d2 + p_d3 + p_d4 + p_d5 + p_d6 + p_d7 + p_d8 + p_d9 + p_d10 + p_d11;

    var tv = a1 + a2 + a3 + a4 +a5 + a6;
    tv = Math.abs(tv);
    var tc = b1 + b2 + b3 + b41 + b42 + b43 + b44 + b45 + b51 + b52 + b53 + b54 + b6 + b7 + b8 + b9;
    tc = Math.abs(tc);
    var tprov = c1 + c21 + c22 + c23 + c24 - c3;
    var trett = d11+ d12 + d13 + d21 + d22 + d23;
    var tprovs = e1 + e2;

    var ta = a_a + ti + tac + a_d;

    var mo = tv - tc;
    var ul = mo + tprov + trett + tprovs;
    e3 = ul * temp;
    var un = ul - e3;

    t1 = p_a2 + e3;
    t2 = p_b9 + un;

    var tpn = p_b1 + p_b2 + p_b3 + p_b4 + p_b5 + p_b6 + p_b7 + p_b8 + t2;
    var tp = p_a1 + t1 + p_a3 + tpn + p_tfr + td + p_e;

    if (ta != 0.0 && tp != 0.0) {
        if ((ta-tp) != 0.0) {
            alert("Attenzione, le voci dell'attivo e del passivo non sono state bilanciate!");
        } else {
            alert("Le voci dell'attivo e del passivo sono state bilanciate correttamente!");
            $( "#table_bilancio" ).dialog("open");
            $("#button_calcola").hide();
            $("#button_visualizza").show();
        }
    } else {
        alert("Attenzione, attivo e passivo sono uguali a zero! Aggiungi informazioni");
    }

    $("#ti").text(ti.toFixed(2)+"€");
    $("#tac").text(tac.toFixed(2)+"€");
    $("#tpn").text(tpn.toFixed(2)+"€");
    $("#td").text(td.toFixed(2)+"€");
    $("#ta").text(ta.toFixed(2)+"€");
    $("#tp").text(tp.toFixed(2)+"€");

    $("#tv").text(tv.toFixed(2)+"€");
    $("#tc").text(tc.toFixed(2)+"€");
    $("#mo").text(mo.toFixed(2)+"€");
    $("#ul").text(ul.toFixed(2)+"€");

    $("#e3").text(e3.toFixed(2)+"€");

    $("#un").text(un.toFixed(2)+"€");

    $("#mp_a2").text(t1.toFixed(2) + "€");
    $("#p_a2").text(t1.toFixed(2) + "€");
    $("#mp_b9").text(t2.toFixed(2) + "€");
    $("#p_b9").text(t2.toFixed(2) + "€");


}