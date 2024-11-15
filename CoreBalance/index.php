<?php
if (isset($_COOKIE['password'])) {
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Calcolo del Bilancio</title>

    <link rel="stylesheet" type="text/css" href="js/jquery-ui.hot/jquery-ui.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">



    <style type="text/css">
        .nascondi {
            display: none;
        }

        .ui-state-default,
        .ui-widget-content .ui-state-default,
        .ui-widget-header .ui-state-default,
        .ui-button,
        html .ui-button.ui-state-disabled:hover,
        html .ui-button.ui-state-disabled:active {
            color: white;
            background: rgb(34, 37, 41);
        }

        .ui-widget input,
        .ui-widget select,
        .ui-widget textarea,
        .ui-widget button {
            margin-bottom: 16px;
            ;
        }

        .ui-dialog .ui-dialog-content {
            text-align: center;
        }

        .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
            float: none;
            text-align: center;
            margin-left: 10px;
        }

        .ui-widget-header {
            background-color: rgb(34, 37, 41);
            color: white;
        }

        .ui-widget-overlay {
            background: rgb(34, 37, 41);
        }

        .ui-state-hover,
        .ui-widget-content .ui-state-hover,
        .ui-widget-header .ui-state-hover,
        .ui-state-focus,
        .ui-widget-content .ui-state-focus,
        .ui-widget-header .ui-state-focus,
        .ui-button:hover,
        .ui-button:focus {
            background: rgb(110, 167, 105);
        }

        .ui-state-active,
        .ui-widget-content .ui-state-active,
        .ui-widget-header .ui-state-active,
        a.ui-button:active,
        .ui-button:active,
        .ui-button.ui-state-active:hover {
            background: rgb(34, 37, 41);
            border: rgb(34, 37, 41);
            ;
        }

        .ui-icon-background,
        .ui-state-active .ui-icon-background {
            border: rgb(85, 85, 85);
        }

        .ui-icon,
        .ui-widget-content .ui-icon {
            background-image: none;
        }

        .visualizza {
            display: block;
        }

        .w3-btn {
            width: 150px;
            background-color: #9d9d9d;
        }

        .ui-dialog .ui-dialog-title {
            text-align: center;

            width: 100%;
        }

        .ui-dialog-titlebar-close {
            visibility: hidden;
        }
    </style>

    <script type="text/javascript" src="js/core/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/jquery-ui.hot/jquery-ui.js"></script>
    <script type="text/javascript" src="js/usefullFunctions.js"></script>
    <script type="text/javascript" src="js/bilancio_functions.js"></script>
    <script type="text/javascript" src="js/dynamicTable.js"></script>

    <script>
        $(function() {
            $("#tabs").tabs({
                show: {
                    effect: "clip",
                    duration: 300
                }
            });

            $("#accordion1").accordion({
                heightStyle: "content",
                active: false,
                collapsible: true,
                animate: 300
            });
            $("#accordion2").accordion({
                heightStyle: "content",
                active: false,
                collapsible: true,
                animate: 300
            });

            $("#attivo").selectmenu();
            $("#passivo").selectmenu();

            $("#valoriProduzione").selectmenu();
            $("#costiProduzione").selectmenu();

            $("#immobilizzazioni_field").selectmenu();
            $("#immobilizzazioni_field").selectmenu("widget").hide();
            $("#attivo_circolante_field").selectmenu();
            $("#attivo_circolante_field").selectmenu("widget").hide();

            $("#fondi_field").selectmenu();
            $("#patrimonio_netto_field").selectmenu();
            $("#patrimonio_netto_field").selectmenu("widget").hide();
            $("#debiti_field").selectmenu();
            $("#debiti_field").selectmenu("widget").hide();

            $("#costiPersonale").selectmenu();
            $("#costiPersonale").selectmenu("widget").hide();
            $("#ammSv").selectmenu();
            $("#ammSv").selectmenu("widget").hide();

            $("#altriProv").selectmenu();
            $("#altriProv").selectmenu("widget").hide();

            $("#proventiOneriFinanziari").selectmenu();

            $("#rettifiche").selectmenu();
            $("#attivita").selectmenu();
            $("#proventiOneriStraordinari").selectmenu();

            $("#attivo").selectmenu({
                change: function(event, ui) {
                    var optionSelected = $("option:selected", this);
                    var valueSelected = this.value;

                    if (valueSelected == "immobilizzazioni") {
                        visualizzaSelect("immobilizzazioni_field");
                        nascondiSelect("attivo_circolante_field");
                    } else {
                        nascondiSelect("immobilizzazioni_field");
                    }

                    if (valueSelected == "attivo_circolante") {
                        visualizzaSelect("attivo_circolante_field");
                        nascondiSelect("immobilizzazioni_field");
                    } else {
                        nascondiSelect("attivo_circolante_field");
                    }
                }
            });

            $("#passivo").selectmenu({
                change: function(event, ui) {
                    var optionSelected = $("option:selected", this);
                    var valueSelected = this.value;

                    if (valueSelected == "fondo_rischi_e_oneri") {
                        visualizzaSelect("fondi_field");
                        nascondiSelect("debiti_field");
                        nascondiSelect("patrimonio_netto_field");
                    } else {
                        nascondiSelect("fondi_field");
                    }

                    if (valueSelected == "patrimonio_netto") {
                        visualizzaSelect("patrimonio_netto_field");
                        nascondiSelect("debiti_field");
                        nascondiSelect("fondi_field");
                    } else {
                        nascondiSelect("patrimonio_netto_field");
                    }

                    if (valueSelected == "debiti") {
                        visualizzaSelect("debiti_field");
                        nascondiSelect("patrimonio_netto_field");
                        nascondiSelect("fondi_field");
                    } else {
                        nascondiSelect("debiti_field");
                    }
                }
            });

            $("#costiProduzione").selectmenu({
                change: function(event, ui) {
                    var optionSelected = $("option:selected", this);
                    var valueSelected = this.value;

                    if (valueSelected == "personale") {
                        visualizzaSelect("costiPersonale");
                        nascondiSelect("ammSv");
                    } else {
                        nascondiSelect("costiPersonale");
                    }

                    if (valueSelected == "amm_sval") {
                        visualizzaSelect("ammSv");
                        nascondiSelect("costiPersonale");
                    } else {
                        nascondiSelect("ammSv");
                    }
                }
            });

            $("#proventiOneriFinanziari").selectmenu({
                change: function(event, ui) {
                    var optionSelected = $("option:selected", this);
                    var valueSelected = this.value;

                    if (valueSelected == "altri_prov") {
                        visualizzaSelect("altriProv");
                    } else {
                        nascondiSelect("altriProv");
                    }
                }
            });

            $("#login").dialog({
                modal: true,
                resizable: false,
                draggable: false,
                width: 252,
                buttons: {
                    Conferma: function() {
                        $(this).dialog("close");
                        dati_azienda();
                    }
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
                closeOnEscape: false
            });

            $("#tax_dialog").dialog({
                modal: true,
                resizable: false,
                draggable: false,
                width: 252,
                buttons: {
                    Conferma: function() {
                        $(this).dialog("close");
                        inserisci_tax();
                    }
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
                closeOnEscape: false,
                autoOpen: false
            });

            $("#calcola").button();
            $("#vis_bilancio").button();
            $("#ricalcola").button();

            $("#view1").button();
            $("#view2").button();

            $("#inserisci1").button();
            $("#inserisci2").button();
            $("#inserisci3").button();
            $("#inserisci4").button();
            $("#inserisci5").button();
            $("#inserisci6").button();
            $("#inserisci7").button();

            $("#cronologia1").button();
            $("#cronologia2").button();
            $("#cronologia3").button();
            $("#cronologia4").button();
            $("#cronologia5").button();
            $("#cronologia6").button();
            $("#cronologia7").button();

            $("#table_bilancio").dialog({
                modal: true,
                resizable: false,
                draggable: false,
                width: 1000,
                height: 600,
                autoOpen: false,
                show: {
                    effect: "blind",
                    duration: 300
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
                closeOnEscape: false,
                buttons: {
                    Chiudi: function() {
                        $(this).dialog("close");
                    }
                }
            });

            $("#mastrini").dialog({
                modal: true,
                resizable: false,
                draggable: false,
                width: 1000,
                height: 600,
                autoOpen: false,
                show: {
                    effect: "blind",
                    duration: 300
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
                title: "Stato Patrimoniale",
                closeOnEscape: false,
                buttons: {
                    Chiudi: function() {
                        $(this).dialog("close");
                    }
                }
            });

            $("#view1").on("click", function() {
                $("#mastrini").dialog("open");
            });

            $("#CE").dialog({
                modal: true,
                resizable: false,
                draggable: false,
                width: 1000,
                height: 600,
                autoOpen: false,
                show: {
                    effect: "blind",
                    duration: 300
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
                title: "Conto Economico",
                closeOnEscape: false,
                buttons: {
                    Chiudi: function() {
                        $(this).dialog("close");
                    }
                }
            });

            $("#view2").on("click", function() {
                $("#CE").dialog("open");
            });

            $("#history1").dialog({
                modal: true,
                resizable: false,
                draggable: false,
                width: 500,
                height: 380,
                autoOpen: false,
                show: {
                    effect: "blind",
                    duration: 300
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
                title: "Cronologia",
                closeOnEscape: false,
                buttons: {
                    Chiudi: function() {
                        $(this).dialog("close");
                    }
                }
            });

            $("#history2").dialog({
                modal: true,
                resizable: false,
                draggable: false,
                width: 500,
                height: 380,
                autoOpen: false,
                show: {
                    effect: "blind",
                    duration: 300
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
                title: "Cronologia",
                closeOnEscape: false,
                buttons: {
                    Chiudi: function() {
                        $(this).dialog("close");
                    }
                }
            });

            $("#history3").dialog({
                modal: true,
                resizable: false,
                draggable: false,
                width: 500,
                height: 380,
                autoOpen: false,
                show: {
                    effect: "blind",
                    duration: 300
                },
                hide: {
                    effect: "blind",
                    duration: 300
                },
                title: "Cronologia",
                closeOnEscape: false,
                buttons: {
                    Chiudi: function() {
                        $(this).dialog("close");
                    }
                }
            });

            $("input[type='radio']").checkboxradio();
        });
    </script>


</head>

<body>
    <div id="login" title="Dati Azienda">
        <input id="azienda" name="azienda" autocomplete="on" placeholder="Nome Azienda">
        <input id="anno" name="anno" autocomplete="on" placeholder="Anno Bilancio">
    </div>


    <div id="tabs">
        <ul>
            <li><a href="#stato_patrimoniale">Stato Patrimoniale</a></li>
            <li><a href="#conto_economico">Conto Economico</a></li>
        </ul>
        <div id="stato_patrimoniale">
            <div id="accordion1">
                <h3>Attivo</h3>
                <div>
                    <input type="text" id="dato1" name="dato1" placeholder="Inserisci importo" />
                    <select id="attivo">
                        <option value="crediti_vs_soci">Crediti verso soci per versamenti ancora dovuti</option>
                        <option value="immobilizzazioni">Immobilizzazioni</option>
                        <option value="attivo_circolante">Attivo circolante</option>
                        <option value="ratei_e_risconti_attivi">Ratei e risconti attivi</option>
                    </select>

                    <select name="immobilizzazioni_field" id="immobilizzazioni_field">
                        <optgroup label="Immateriali">
                            <option value="imm1">Costi di impianto e di ampliamento</option>
                            <option value="imm2">Costi di ricerca, sviluppo e di pubblicità</option>
                            <option value="imm3">Diritti di brevetto industriale</option>
                            <option value="imm4">Concessioni, licenze, marchi, diritti simili</option>
                            <option value="imm5">Avviamento</option>
                            <option value="imm6">Immobilizzazioni in corso e acconti</option>
                            <option value="imm7">Altre immobilizzazioni immateriali</option>
                        </optgroup>
                        <optgroup label="Materiali">
                            <option value="mat1">Terreni e fabbricati</option>
                            <option value="mat2">Impianti e macchinari</option>
                            <option value="mat3">Attrezzature industriali e commerciali</option>
                            <option value="mat4">Altri beni</option>
                            <option value="mat5">Immobilizzazioni in corso e acconti</option>
                        </optgroup>
                        <optgroup label="Finanziarie">
                            <option value="f1">Partecipazioni azionarie</option>
                            <option value="f2">Crediti finanziari</option>
                            <option value="f3">Altri titoli</option>
                            <option value="f4">Azioni proprie</option>
                        </optgroup>
                    </select>
                    <select name="attivo_circolante_field" id="attivo_circolante_field">
                        <optgroup label="Rimanenze">
                            <option value="r1">Materie prime</option>
                            <option value="r2">Prodotti in corso di lavorazione</option>
                            <option value="r3">Lavori in corso su ordinazione</option>
                            <option value="r4">Prodotti finiti e merci</option>
                            <option value="r5">Acconti</option>
                        </optgroup>
                        <optgroup label="Crediti">
                            <option value="c1">Verso clienti</option>
                            <option value="c2">Verso imprese controllate, collegate, controllanti</option>
                            <option value="c3">Verso altri enti</option>
                        </optgroup>
                        <optgroup label="Attività finanziarie non immobilizzate">
                            <option value="af1">Partecipazioni in imprese controllate e collegate</option>
                            <option value="af2">Azioni proprie</option>
                            <option value="af3">Altri titoli</option>
                        </optgroup>
                        <optgroup label="Disponibilità liquide">
                            <option value="dl1">Depositi bancari e postali</option>
                            <option value="dl2">Assegni</option>
                            <option value="dl3">Denaro e valori di cassa</option>
                        </optgroup>
                    </select>

                    <label for="radio-1">Dare</label>
                    <input type="radio" name="radio_1" id="radio-1" style="align-self: auto" onclick="dare_avere(id)">
                    <label for="radio-2">Avere</label>
                    <input type="radio" name="radio_1" id="radio-2" style="align-self: auto" onclick="dare_avere(id)">
                    <button id="inserisci1" name="inserisci1" class="w3-btn w3-round-large" onclick="sta_inserisci()">Inserisci</button>
                    <button id="cronologia1" name="cronologia1" class="w3-btn w3-round-large" onclick="openCrono1()">Cronologia</button>
                </div>

                <h3>Passivo</h3>
                <div>
                    <input type="text" id="dato2" name="dato2" placeholder="Inserisci importo" />
                    <select id="passivo">
                        <option value="fondo_rischi_e_oneri">Fondo per rischi e oneri</option>
                        <option value="patrimonio_netto">Patrimonio netto</option>
                        <option value="fondo_tfr">Fondo TFR</option>
                        <option value="debiti">Debiti</option>
                        <option value="ratei_e_risconti_passivi">Ratei e risconti passivi</option>
                    </select>
                    <select id="fondi_field">
                        <option value="fro1">Per trattemento di quiescenza</option>
                        <option value="fro2">Per imposte</option>
                        <option value="fro3">Altri fondi</option>
                    </select>
                    <select id="patrimonio_netto_field">
                        <option value="p1">Capitale sociale</option>
                        <option value="p2">Riserva sovrapprezzo azioni</option>
                        <option value="p3">Riserva di rivalutazione</option>
                        <option value="p4">Riserva legale</option>
                        <option value="p5">Riserva per azioni proprie</option>
                        <option value="p6">Riserve statutarie</option>
                        <option value="p7">Altre riserve</option>
                        <option value="p8">Utili portati a nuovo</option>
                        <option value="p9">Utili dell'esercizio</option>
                    </select>
                    <select id="debiti_field">
                        <option value="d1">Obbligazioni</option>
                        <option value="d2">Obbligazioni convertibili</option>
                        <option value="d3">Debiti verso banche</option>
                        <option value="d4">Debiti verso altri finanziatori</option>
                        <option value="d5">Acconti</option>
                        <option value="d6">Debiti verso fornitori</option>
                        <option value="d7">Debiti rappresentati da titoli di credito</option>
                        <option value="d8">Debiti verso imprese controllate, collegate e controllanti</option>
                        <option value="d9">Debiti tributari</option>
                        <option value="d10">Debiti versi istituti di previdenza e sicurezza sociale</option>
                        <option value="d11">Altri debiti</option>
                    </select>

                    <label for="radio-3">Dare</label>
                    <input type="radio" name="radio_2" id="radio-3" style="align-self: auto" onclick="dare_avere(id)">
                    <label for="radio-4">Avere</label>
                    <input type="radio" name="radio_2" id="radio-4" style="align-self: auto" onclick="dare_avere(id)">
                    <button id="inserisci2" name="inserisci2" class="w3-btn w3-round-large" onclick="stp_inserisci()">Inserisci</button>
                    <button id="cronologia2" name="cronologia2" class="w3-btn w3-round-large" onclick="openCrono2()">Cronologia</button>
                </div>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <button id="view1" name="view1" class="w3-btn w3-round-large">Visualizza</button>
            </div>

            <div id="mastrini">
                <table id="table2" class="display">
                    <tbody>
                        <tr>
                            <th>ATTIVO</th>
                            <th></th>
                            <th>PASSIVO</th>
                            <th></th>
                        </tr>

                        <tr>
                            <th>A) Crediti verso soci per versamenti ancora dovuti</th>
                            <td width="25%" style="text-align: center"><label id="ma_a"></label></td>
                            <th>A) Fondo rischi e oneri</th>
                            <td width="25%" style="text-align: center"></td>
                        </tr>

                        <tr>
                            <th>B) Immobilizzazioni</th>
                            <td width="25%"></td>
                            <td>
                                <li>Per trattamento di quiescenza</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_a1"></label></td>
                        </tr>
                        <tr>
                            <th>1) Immateriali</th>
                            <td width="25%"></td>
                            <td>
                                <li>Per imposte</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_a2"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Costi di impianto e di ampliamento</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b11"></label></td>
                            <td>
                                <li>Altri fondi</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_a3"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Costi di ricerca, sviluppo e di pubblicità</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b12"></label></td>
                            <th>B) Patrimonio netto</th>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Diritti di brevetto industriale</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b13"></label></td>
                            <td>
                                <li>Capitale sociale</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_b1"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Concessioni, licenze, marchi, diritti simili</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b14"></label></td>
                            <td>
                                <li>Riserva sovrapprezzo azioni</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_b2"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Avviamento</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b15"></label></td>
                            <td>
                                <li>Riserva di rivalutazione</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_b3"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Immobilizzazioni in corso e acconti</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b16"></label></td>
                            <td>
                                <li>Riserva legale</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_b4"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Altre immobilizzazioni immateriali</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b17"></label></td>
                            <td>
                                <li>Riserva per azioni proprie</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_b5"></label></td>
                        </tr>
                        <tr>
                            <th>2) Materiali</th>
                            <td width="25%"></td>
                            <td>
                                <li>Riserve statutarie</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_b6"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Terreni e fabbricati</li>
                            </td>
                            <td width="25%" style="text-align: center" id="ma_b21"><label></label></td>
                            <td>
                                <li>Altre riserve</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_b7"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Impianti e macchinari</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b22"></label></td>
                            <td>
                                <li>Utili portati a nuovo</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_b8"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Attrezzature industriali e commerciali</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b23"></label></td>
                            <td>
                                <li>Utili dell'esercizio</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_b9"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Altri beni</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b24"></label></td>
                            <th>C) Fondo TFR</th>
                            <td width="25%" style="text-align: center"><label id="mp_tfr"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Immobilizzazioni in corso e acconti</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b25"></label></td>
                            <th>D) Debiti</th>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <th>3) Finanziarie</th>
                            <td width="25%"></td>
                            <td>
                                <li>Obbligazioni</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d1"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Partecipazioni azionarie</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b31"></label></td>
                            <td>
                                <li>Obbligazioni convertibili</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d2"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Crediti finanziari</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b32"></label></td>
                            <td>
                                <li>Debiti verso banche</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d3"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Altri titoli</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b33"></label></td>
                            <td>
                                <li>Debiti verso altri finanziatori</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d4"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Azioni proprie</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_b34"></label></td>
                            <td>
                                <li>Acconti</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d5"></label></td>
                        </tr>

                        <tr>
                            <th>C) Attivo circolante</th>
                            <td width="25%"><label></label></td>
                            <td>
                                <li>Debiti verso fornitori</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d6"></label></td>
                        </tr>
                        <tr>
                            <th>1) Rimanenze</th>
                            <td width="25%"></td>
                            <td>
                                <li>Debiti rappresentati da titoli di credito</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d7"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Materie prime</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c11"></label> </td>
                            <td>
                                <li>Debiti verso imprese controllate, collegate, controllanti</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d8"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Prodotti in corso di lavorazione</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c12"></label></td>
                            <td>
                                <li>Debiti tributari</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d9"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Lavori in corso su ordinazioni</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c13"></label></td>
                            <td>
                                <li>Debiti verso istituti di previdenza e sicurezza sociale</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d10"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Prodotti finiti e merci</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c14"></label></td>
                            <td>
                                <li>Altri debiti</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="mp_d11"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Acconti</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c15"></label></td>
                            <th>E) Ratei e risconti passivi</th>
                            <td width="25%" style="text-align: center"><label id="mp_e"></label></td>
                        </tr>
                        <tr>
                            <th>2) Crediti</th>
                            <td width="25%"></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Verso clienti</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c21"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Verso imprese controllate, collegate, controllanti</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c22"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Verso altri enti</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c23"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <th>3) Attività finanziarie non immobilizzate</th>
                            <td width="25%"></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Partecipazioni in imprese controllate e collegate</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c31"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Azioni proprie</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c32"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Altri titoli</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c33"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <th>4) Disponibilità liquide</th>
                            <td width="25%"></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Depositi bancari e postali</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c41"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Assegni</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c42"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Denaro e valori di cassa</li>
                            </td>
                            <td width="25%" style="text-align: center"><label id="ma_c43"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>

                        <tr>
                            <th>D) Ratei e risconti attivi</th>
                            <td width="25%" style="text-align: center"><label id="ma_d"></label></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="conto_economico">
            <div id="accordion2">
                <h3>A) Valore della produzione</h3>
                <div>
                    <input type="text" id="dato3" name="dato3" placeholder="Inserisci importo" />
                    <select id="valoriProduzione">
                        <option value="ricavi_vendite">Ricavi delle vendite e delle prestazioni</option>
                        <option value="variazione_rimanenze">Variazione delle rimanenze di prodotti in corso di lavorazione</option>
                        <option value="semilavorati_e_finiti">Semilavorati e finiti</option>
                        <option value="variazioni_lavori">Variazione dei lavori in corso di ordinazione</option>
                        <option value="incrementi">Incrementi e immobilizzazioni per lavori interni</option>
                        <option value="altri_ricavi">Altri ricavi e proventi</option>
                    </select>

                    <label for="radio-5">Dare</label>
                    <input type="radio" name="radio_1" id="radio-5" style="align-self: auto" onclick="dare_avere(id)">
                    <label for="radio-6">Avere</label>
                    <input type="radio" name="radio_1" id="radio-6" style="align-self: auto" onclick="dare_avere(id)">
                    <button id="inserisci3" name="inserisci3" class="w3-btn w3-round-large" onclick="a_inserisci()">Inserisci</button>
                    <button id="cronologia3" name="cronologia3" class="w3-btn w3-round-large" onclick="openCrono3()">Cronologia</button>
                </div>

                <h3>B) Costi della produzione</h3>
                <div>
                    <input type="text" id="dato4" name="dato4" placeholder="Inserisci importo" />
                    <select id="costiProduzione">
                        <option value="materie">Per materie prime, sussidiarie e merci</option>
                        <option value="servizi">Per servizi</option>
                        <option value="godimento">Per godimento beni di terzi</option>
                        <option value="personale">Per il personale</option>
                        <option value="amm_sval">Ammortamenti e svalutazioni</option>
                        <option value="variazioni">Variazione delle rimanenze di materie prime, sussidiarie, di consumo e merci</option>
                        <option value="acc_rischi">Accantonamento per rischi</option>
                        <option value="altri_acc">Altri accantonamenti</option>
                        <option value="oneri_diversi">Oneri diversi di gestione</option>
                    </select>
                    <select id="costiPersonale">
                        <option value="salari_stipendi">Salari e stipendi</option>
                        <option value="oneri_spec">Oneri speciali</option>
                        <option value="tfr">Trattamento di fine rapporto</option>
                        <option value="tratt_quiescenza">Trattamento di quiescenza e simili</option>
                        <option value="altri_costi">Altri costi</option>
                    </select>
                    <select id="ammSv">
                        <option value="amm_imm_imm">Ammortamento delle immobilizzazioni immateriali</option>
                        <option value="amm_imm_mat">Ammortamento delle immobilizzazioni materiali</option>
                        <option value="sv_imm">Altre svalutazioni delle immobilizzazioni</option>
                        <option value="sv_cr_comp">Svalutazioni dei crediti compresi nell'attivo circolante e nelle disponibilità liquide</option>
                    </select>

                    <label for="radio-7">Dare</label>
                    <input type="radio" name="radio_1" id="radio-7" style="align-self: auto" onclick="dare_avere(id)">
                    <label for="radio-8">Avere</label>
                    <input type="radio" name="radio_1" id="radio-8" style="align-self: auto" onclick="dare_avere(id)">
                    <button id="inserisci4" name="inserisci4" class="w3-btn w3-round-large" onclick="b_inserisci()">Inserisci</button>
                    <button id="cronologia4" name="cronologia4" class="w3-btn w3-round-large" onclick="openCrono3()">Cronologia</button>
                </div>

                <h3>C) Proventi e oneri finanziari</h3>
                <div>
                    <input type="text" id="dato5" name="dato5" placeholder="Inserisci importo" />
                    <select id="proventiOneriFinanziari">
                        <option value="proventi_part">Proventi da partecipazione</option>
                        <option value="altri_prov">Altri proventi</option>
                        <option value="int_e_oneri">Interessi e altri oneri finanziari</option>
                    </select>
                    <select id="altriProv">
                        <option value="nelle_imm">Da crediti iscritti nelle immobilizzazioni</option>
                        <option value="altriprov">Da titoli iscritti nelle immobilizzazioni</option>
                        <option value="nel_att_circ">Da titoli iscritti nell'attivo circolante</option>
                        <option value="prov_diversi">Da proventi diversi dai precedenti</option>
                    </select>

                    <label for="radio-9">Dare</label>
                    <input type="radio" name="radio_1" id="radio-9" style="align-self: auto" onclick="dare_avere(id)">
                    <label for="radio-10">Avere</label>
                    <input type="radio" name="radio_1" id="radio-10" style="align-self: auto" onclick="dare_avere(id)">
                    <button id="inserisci5" name="inserisci5" class="w3-btn w3-round-large" onclick="c_inserisci()">Inserisci</button>
                    <button id="cronologia5" name="cronologia5" class="w3-btn w3-round-large" onclick="openCrono3()">Cronologia</button>
                </div>

                <h3>D) Rettifiche di valore di attività finanziarie</h3>
                <div>
                    <input type="text" id="dato6" name="dato6" placeholder="Inserisci importo" />
                    <select id="rettifiche">
                        <option value="rivalutazioni">Rivalutazione</option>
                        <option value="svalutazioni">Svalutazione</option>
                    </select>
                    <select id="attivita">
                        <option value="di_part">Di partecipazioni</option>
                        <option value="di_imm">Di immobilizzazioni finanziarie</option>
                        <option value="di_title">Di titoli iscritti nell'attivo circolante</option>
                    </select>

                    <label for="radio-11">Dare</label>
                    <input type="radio" name="radio_1" id="radio-11" style="align-self: auto" onclick="dare_avere(id)">
                    <label for="radio-12">Avere</label>
                    <input type="radio" name="radio_1" id="radio-12" style="align-self: auto" onclick="dare_avere(id)">
                    <button id="inserisci6" name="inserisci6" class="w3-btn w3-round-large" onclick="d_inserisci()">Inserisci</button>
                    <button id="cronologia6" name="cronologia6" class="w3-btn w3-round-large" onclick="openCrono3()">Cronologia</button>
                </div>

                <h3>E) Proventi e oneri straordinari</h3>
                <div>
                    <input type="text" id="dato7" name="dato7" placeholder="Inserisci importo" />
                    <select id="proventiOneriStraordinari">
                        <option value="prov_sep">Proventi con separata indicazione delle plusvalenze da alienazioni</option>
                        <option value="oneri_sep_minus">Oneri con separata indicazione delle minusvalenze</option>
                    </select>

                    <label for="radio-13">Dare</label>
                    <input type="radio" name="radio_1" id="radio-13" style="align-self: auto" onclick="dare_avere(id)">
                    <label for="radio-14">Avere</label>
                    <input type="radio" name="radio_1" id="radio-14" style="align-self: auto" onclick="dare_avere(id)">
                    <button id="inserisci7" name="inserisci7" class="w3-btn w3-round-large" onclick="e_inserisci()">Inserisci</button>
                    <button id="cronologia7" name="cronologia7" class="w3-btn w3-round-large" onclick="openCrono3()">Cronologia</button>
                </div>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <button id="view2" name="view2" class="w3-btn w3-round-large">Visualizza</button>
            </div>
            <div id="CE">
                <table id="table3" class="display">
                    <tbody>
                        <tr>
                            <th>A) Valore della produzione</th>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>1) Ricavi dalle vendite delle prestazioni</td>
                            <td width="50%" style="text-align: center"><label id="ce_a1"></label></td>
                        </tr>
                        <tr>
                            <td>2) Variazione delle rimanenze di prodotti in corso di lavorazione</td>
                            <td width="50%" style="text-align: center"><label id="ce_a2"></label></td>
                        </tr>
                        <tr>
                            <td>3) Semilavorati e finiti</td>
                            <td width="50%" style="text-align: center"><label id="ce_a3"></label></td>
                        </tr>
                        <tr>
                            <td>4) Variazione dei lavori in corso di ordinazione</td>
                            <td width="50%" style="text-align: center"><label id="ce_a4"></label></td>
                        </tr>
                        <tr>
                            <td>5) Incrementi di immobilizzazioni per lavori interni</td>
                            <td width="50%" style="text-align: center"><label id="ce_a5"></label></td>
                        </tr>
                        <tr>
                            <td>6) Altri ricavi e proventi</td>
                            <td width="50%" style="text-align: center"><label id="ce_a6"></label></td>
                        </tr>

                        <tr>
                            <th>B) Costi della produzione</th>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>1) Per materie prime, sussidiaria, di consumo e merci</td>
                            <td width="50%" style="text-align: center"><label id="ce_b1"></label></td>
                        </tr>
                        <tr>
                            <td>2) Per servizi</td>
                            <td width="50%" style="text-align: center"><label id="ce_b2"></label></td>
                        </tr>
                        <tr>
                            <td>3) Per il godimenti di beni di terzi</td>
                            <td width="50%" style="text-align: center"><label id="ce_b3"></label></td>
                        </tr>
                        <tr>
                            <td>4) Per il personale</td>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Salari e stipendi</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_b41"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Oneri speciali</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_b42"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Trattamento di fine rapporto</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_b43"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Trattamento di quiescenza e simili</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_b44"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Altri costi</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_b45"></label></td>
                        </tr>
                        <tr>
                            <td>5) Ammortamenti e svalutazioni</td>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Ammortamento delle immobilizzazioni immateriali</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_b51"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Ammortamento delle immobilizzazioni materiali</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_b52"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Altre svalutazioni delle immobilizzazioni</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_b53"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Svalutazioni dei crediti compresi nell'attivo circolante e nelle disponibilità liquide</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_b54"></label></td>
                        </tr>
                        <tr>
                            <td>6) Variazione delle rimanenze di materie prime, sussidiarie, di consumo e merci</td>
                            <td width="50%" style="text-align: center"><label id="ce_b6"></label></td>
                        </tr>
                        <tr>
                            <td>7) Accantonamento per rischi</td>
                            <td width="50%" style="text-align: center"><label id="ce_b7"></label></td>
                        </tr>
                        <tr>
                            <td>8) Altri accantonamenti</td>
                            <td width="50%" style="text-align: center"><label id="ce_b8"></label></td>
                        </tr>
                        <tr>
                            <td>9) Oneri diversi di gestione</td>
                            <td width="50%" style="text-align: center"><label id="ce_b9"></label></td>
                        </tr>

                        <tr>
                            <th>C) Proventi e oneri finanziari</th>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>1) Proventi da partecipazione</td>
                            <td width="50%" style="text-align: center"><label id="ce_c1"></label></td>
                        </tr>
                        <tr>
                            <td>2) Altri proventi finanziari</td>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Da crediti iscritti nelle immobilizzazioni</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_c21"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Da titoli iscritti nelle immobilizzazioni</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_c22"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Da titoli iscritti nell'attivo circolante</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_c23"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Da proventi diversi dai precedenti</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_c24"></label></td>
                        </tr>
                        <tr>
                            <td>3) Interessi e altri oneri finanziari</td>
                            <td width="50%" style="text-align: center"><label id="ce_c3"></label></td>
                        </tr>

                        <tr>
                            <th>D) Rettifiche di valore di attività finanziarie</th>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>1) Rivalutazioni</td>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Di partecipazione</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_d11"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Di immobilizzazioni finanziarie</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_d12"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Di titoli iscritti nell'attivo circolante</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_d13"></label></td>
                        </tr>
                        <tr>
                            <td>2) Svalutazioni</td>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Di partecipazione</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_d21"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Di immobilizzazioni finanziarie</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_d22"></label></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Di titoli iscritti nell'attivo circolante</li>
                            </td>
                            <td width="50%" style="text-align: center"><label id="ce_d23"></label></td>
                        </tr>

                        <tr>
                            <th>E) Proventi e oneri strordinari</th>
                            <td width="50%"></td>
                        </tr>
                        <tr>
                            <td>1) Proventi con separata indicazione delle plusvalenze da alienazione</td>
                            <td width="50%" style="text-align: center"><label id="ce_e1"></label></td>
                        </tr>
                        <tr>
                            <td>2) Oneri con separata indicazione delle minusvalenze da alienazione e delle imposte relative a esercizi precedenti</td>
                            <td width="50%" style="text-align: center"><label id="ce_e2"></label></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <div id="button_calcola" style="text-align: center; margin-top: 20px;">
        <button id="calcola" name="calcola" class="w3-btn w3-round-large" onclick="calcola()">Calcola</button>
    </div>
    <div id="button_visualizza" style="text-align: center; margin-top: 20px; display: none">
        <button id="vis_bilancio" name="vis_bilancio" class="w3-btn w3-round-large" onclick="openBilancio()">Bilancio</button>
        <button id="ricalcola" name="ricalcola" class="w3-btn w3-round-large" onclick="calcola()">Ricalcola</button>
    </div>

    <div id="history1" style="text-align: center">
        <table id="crono1" cellpadding="2">
            <tr>
                <td><b>N°</b></td>
                <td><b>Importo (€)</b></td>
                <td><b>Voce</b></td>
            </tr>
        </table>
    </div>
    <div id="history2" style="text-align: center">
        <table id="crono2" cellpadding="2">
            <tr>
                <td><b>N°</b></td>
                <td><b>Importo (€)</b></td>
                <td><b>Voce</b></td>
            </tr>
        </table>
    </div>
    <div id="history3" style="text-align: center">
        <table id="crono3" cellpadding="2">
            <tr>
                <td><b>N°</b></td>
                <td><b>Importo (€)</b></td>
                <td><b>Voce</b></td>
            </tr>
        </table>
    </div>


    <div id="table_bilancio">
        <h1>STATO PATRIMONIALE</h1>
        <table id="table1" class="display">
            <tbody>
                <tr>
                    <th>ATTIVO</th>
                    <th></th>
                    <th>PASSIVO</th>
                    <th></th>
                </tr>

                <tr>
                    <th>A) Crediti verso soci per versamenti ancora dovuti</th>
                    <td width="25%" style="text-align: center"><label id="a_a"></label></td>
                    <th>A) Fondo rischi e oneri</th>
                    <td width="25%" style="text-align: center"></td>
                </tr>

                <tr>
                    <th>B) Immobilizzazioni</th>
                    <td width="25%"></td>
                    <td>
                        <li>Per trattamento di quiescenza</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_a1"></label></td>
                </tr>
                <tr>
                    <th>1) Immateriali</th>
                    <td width="25%"></td>
                    <td>
                        <li>Per imposte</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_a2"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Costi di impianto e di ampliamento</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b11"></label></td>
                    <td>
                        <li>Altri fondi</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_a3"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Costi di ricerca, sviluppo e di pubblicità</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b12"></label></td>
                    <th>B) Patrimonio netto</th>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Diritti di brevetto industriale</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b13"></label></td>
                    <td>
                        <li>Capitale sociale</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_b1"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Concessioni, licenze, marchi, diritti simili</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b14"></label></td>
                    <td>
                        <li>Riserva sovrapprezzo azioni</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_b2"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Avviamento</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b15"></label></td>
                    <td>
                        <li>Riserva di rivalutazione</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_b3"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Immobilizzazioni in corso e acconti</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b16"></label></td>
                    <td>
                        <li>Riserva legale</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_b4"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Altre immobilizzazioni immateriali</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b17"></label></td>
                    <td>
                        <li>Riserva per azioni proprie</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_b5"></label></td>
                </tr>
                <tr>
                    <th>2) Materiali</th>
                    <td width="25%"></td>
                    <td>
                        <li>Riserve statutarie</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_b6"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Terreni e fabbricati</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b21"></label></td>
                    <td>
                        <li>Altre riserve</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_b7"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Impianti e macchinari</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b22"></label></td>
                    <td>
                        <li>Utili portati a nuovo</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_b8"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Attrezzature industriali e commerciali</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b23"></label></td>
                    <td>
                        <li>Utili dell'esercizio</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_b9"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Altri beni</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b24"></label></td>
                    <th>Totale Patrimonio Netto</th>
                    <td width="25%" style="text-align: center"><label id="tpn"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Immobilizzazioni in corso e acconti</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b25"></label></td>
                    <th>C) Fondo TFR</th>
                    <td width="25%" style="text-align: center"><label id="p_tfr"></label></td>
                </tr>
                <tr>
                    <th>3) Finanziarie</th>
                    <td width="25%"></td>
                    <th>D) Debiti</th>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Partecipazioni azionarie</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b31"></label></td>
                    <td>
                        <li>Obbligazioni</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d1"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Crediti finanziari</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b32"></label></td>
                    <td>
                        <li>Obbligazioni convertibili</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d2"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Altri titoli</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b33"></label></td>
                    <td>
                        <li>Debiti verso banche</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d3"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Azioni proprie</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_b34"></label></td>
                    <td>
                        <li>Debiti verso altri finanziatori</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d4"></label></td>
                </tr>
                <tr>
                    <th>Totale Immobilizzazioni</th>
                    <td width="25%" style="text-align: center"><label id="ti"></label></td>
                    <td>
                        <li>Acconti</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d5"></label></td>
                </tr>

                <tr>
                    <th>C) Attivo circolante</th>
                    <td width="25%"></td>
                    <td>
                        <li>Debiti verso fornitori</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d6"></label></td>
                </tr>
                <tr>
                    <th>1) Rimanenze</th>
                    <td width="25%"></td>
                    <td>
                        <li>Debiti rappresentati da titoli di credito</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d7"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Materie prime</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c11"></label> </td>
                    <td>
                        <li>Debiti verso imprese controllate, collegate, controllanti</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d8"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Prodotti in corso di lavorazione</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c12"></label></td>
                    <td>
                        <li>Debiti tributari</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d9"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Lavori in corso su ordinazioni</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c13"></label></td>
                    <td>
                        <li>Debiti verso istituti di previdenza e sicurezza sociale</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d10"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Prodotti finiti e merci</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c14"></label></td>
                    <td>
                        <li>Altri debiti</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="p_d11"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Acconti</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c15"></label></td>
                    <th>Totale Debiti</th>
                    <td width="25%" style="text-align: center"><label id="td"></label></td>
                </tr>
                <tr>
                    <th>2) Crediti</th>
                    <td width="25%"></td>
                    <th>E) Ratei e risconti passivi</th>
                    <td width="25%" style="text-align: center"><label id="p_e"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Verso clienti</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c21"></label></td>
                    <th width="25%">Totale Passivo</th>
                    <td width="25%" style="text-align: center"><label id="tp"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Verso imprese controllate, collegate, controllanti</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c22"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Verso altri enti</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c23"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <th>3) Attività finanziarie non immobilizzate</th>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Partecipazioni in imprese controllate e collegate</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c31"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Azioni proprie</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c32"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Altri titoli</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c33"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <th>4) Disponibilità liquide</th>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Depositi bancari e postali</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c41"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Assegni</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c42"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Denaro e valori di cassa</li>
                    </td>
                    <td width="25%" style="text-align: center"><label id="a_c43"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <th>Totale Attivo Circolante</th>
                    <td width="25%" style="text-align: center"><label id="tac"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>

                <tr>
                    <th>D) Ratei e risconti attivi</th>
                    <td width="25%" style="text-align: center"><label id="a_d"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>

                <tr>
                    <th>Totale Attivo</th>
                    <td width="25%" style="text-align: center"><label id="ta"></label></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>

                <tr>
                    <td width="25%"></td>
                    <td width="25%" style="text-align: center"></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td width="25%"></td>
                    <td width="25%" style="text-align: center"></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
            </tbody>
        </table>

        <h1>CONTO ECONOMICO</h1>
        <table id="table4" class="display">
            <tbody>
                <tr>
                    <th>A) Valore della produzione</th>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>1) Ricavi dalle vendite delle prestazioni</td>
                    <td width="50%" style="text-align: center"><label id="a1"></label></td>
                </tr>
                <tr>
                    <td>2) Variazione delle rimanenze di prodotti in corso di lavorazione semilavorati e finiti</td>
                    <td width="50%" style="text-align: center"><label id="a2"></label></td>
                </tr>
                <tr>
                    <td>3) Semilavorati e finiti</td>
                    <td width="50%" style="text-align: center"><label id="a3"></label></td>
                </tr>
                <tr>
                    <td>4) Variazione dei lavori in corso di ordinazione</td>
                    <td width="50%" style="text-align: center"><label id="a4"></label></td>
                </tr>
                <tr>
                    <td>5) Incrementi di immobilizzazioni per lavori interni</td>
                    <td width="50%" style="text-align: center"><label id="a5"></label></td>
                </tr>
                <tr>
                    <td>6) Altri ricavi e proventi</td>
                    <td width="50%" style="text-align: center"><label id="a6"></label></td>
                </tr>
                <tr>
                    <th>Totale valore della produzione</th>
                    <td width="50%" style="text-align: center"><label id="tv"></label></td>
                </tr>

                <tr>
                    <th>B) Costi della produzione</th>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>1) Per materie prime, sussidiaria, di consumo e merci</td>
                    <td width="50%" style="text-align: center"><label id="b1"></label></td>
                </tr>
                <tr>
                    <td>2) Per servizi</td>
                    <td width="50%" style="text-align: center"><label id="b2"></label></td>
                </tr>
                <tr>
                    <td>3) Per il godimenti di beni di terzi</td>
                    <td width="50%" style="text-align: center"><label id="b3"></label></td>
                </tr>
                <tr>
                    <td>4) Per il personale</td>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Salari e stipendi</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="b41"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Oneri speciali</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="b42"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Trattamento di fine rapporto</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="b43"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Trattamento di quiescenza e simili</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="b44"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Altri costi</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="b45"></label></td>
                </tr>
                <tr>
                    <td>5) Ammortamenti e svalutazioni</td>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Ammortamento delle immobilizzazioni immateriali</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="b51"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Ammortamento delle immobilizzazioni materiali</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="b52"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Altre svalutazioni delle immobilizzazioni</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="b53"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Svalutazioni dei crediti compresi nell'attivo circolante e nelle disponibilità liquide</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="b54"></label></td>
                </tr>
                <tr>
                    <td>6) Variazione delle rimanenze di materie prime, sussidiarie, di consumo e merci</td>
                    <td width="50%" style="text-align: center"><label id="b6"></label></td>
                </tr>
                <tr>
                    <td>7) Accantonamento per rischi</td>
                    <td width="50%" style="text-align: center"><label id="b7"></label></td>
                </tr>
                <tr>
                    <td>8) Altri accantonamenti</td>
                    <td width="50%" style="text-align: center"><label id="b8"></label></td>
                </tr>
                <tr>
                    <td>9) Oneri diversi di gestione</td>
                    <td width="50%" style="text-align: center"><label id="b9"></label></td>
                </tr>
                <tr>
                    <th>Totale costi della produzione</th>
                    <td width="50%" style="text-align: center"><label id="tc"></label></td>
                </tr>

                <tr>
                    <th>Margine Operativo Netto</th>
                    <td width="50%" style="text-align: center"><label id="mo"></label></td>
                </tr>

                <tr>
                    <th>C) Proventi e oneri finanziari</th>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>1) Proventi da partecipazione</td>
                    <td width="50%" style="text-align: center"><label id="c1"></label></td>
                </tr>
                <tr>
                    <td>2) Altri proventi finanziari</td>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Da crediti iscritti nelle immobilizzazioni</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="c21"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Da titoli iscritti nelle immobilizzazioni</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="c22"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Da titoli iscritti nell'attivo circolante</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="c23"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Da proventi diversi dai precedenti</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="c24"></label></td>
                </tr>
                <tr>
                    <td>3) Interessi e altri oneri finanziari</td>
                    <td width="50%" style="text-align: center"><label id="c3"></label></td>
                </tr>

                <tr>
                    <th>D) Rettifiche di valore di attività finanziarie</th>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>1) Rivalutazioni</td>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Di partecipazione</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="d11"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Di immobilizzazioni finanziarie</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="d12"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Di titoli iscritti nell'attivo circolante</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="d13"></label></td>
                </tr>
                <tr>
                    <td>2) Svalutazioni</td>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>
                        <li>Di partecipazione</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="d21"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Di immobilizzazioni finanziarie</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="d22"></label></td>
                </tr>
                <tr>
                    <td>
                        <li>Di titoli iscritti nell'attivo circolante</li>
                    </td>
                    <td width="50%" style="text-align: center"><label id="d23"></label></td>
                </tr>

                <tr>
                    <th>E) Proventi e oneri strordinari</th>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>1) Proventi con separata indicazione delle plusvalenze da alienazione</td>
                    <td width="50%" style="text-align: center"><label id="e1"></label></td>
                </tr>
                <tr>
                    <td>2) Oneri con separata indicazione delle minusvalenze da alienazione e delle imposte relative a esercizi precedenti</td>
                    <td width="50%" style="text-align: center"><label id="e2"></label></td>
                </tr>

                <tr>
                    <th>Utile Lordo</th>
                    <td width="50%" style="text-align: center"><label id="ul"></label></td>
                </tr>

                <tr>
                    <td>3) Imposte sul reddito dell'esercizio, corrente, differite e anticipate</td>
                    <td width="50%" style="text-align: center"><label id="e3"></label></td>
                </tr>

                <tr>
                    <th>Utile Netto</th>
                    <td width="50%" style="text-align: center"><label id="un"></label></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php

    }

?>



