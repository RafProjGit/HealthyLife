<!DOCTYPE html>
<html lang="en">
<head>
    <title> Homepage </title>

    <link rel="ICON" href="favicon.ico" type="image/ico">

    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Home page del medico">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
    <style type="text/css">
        .title {
            text-align: center;
            font-family: Arial;
            font-size: large;
            color:    #000000;
        }
        .button {
            padding:5px 10px;
            background-color: #38b1c7;
            -moz-border-radius:28px;
            -webkit-border-radius:28px;
            border-radius:28px;
            border:1px solid #1c6cab;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:17px;
            padding:16px 31px;
            text-decoration:none;
            text-shadow:0px 1px 0px #405a66;
        }
        .button:hover {
            background-color: #1ea2bf;
        }
        .button:active {
            position:relative;
            top:1px;
        }

        .menuButton {
            display: inline-block;
            width: 250px;
            padding:5px 10px;
            background-color:#38b1c7;
            -moz-border-radius:28px;
            -webkit-border-radius:28px;
            border-radius:28px;
            border:1px solid #1c6cab;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:17px;
            padding:16px 31px;
            text-decoration:none;
            text-shadow:0px 1px 0px #405a66;
        }
        .menuButton:hover {
            background-color:#1ea2bf;
        }
        .menuButton:active {
            position:relative;
            top:1px;
        }

        #titleTable{
            width: 100%
        }

        #tableContainer1 {
            height: 100%;
            width: 100%;
            display: table;
        }
        #tableContainer2 {
            vertical-align: middle;
            display: table-cell;
            height: 100%;
        }
        #buttonTable {
            width: 100px;
            margin-left: auto;
            margin-right: auto;

        }
    </style>


</head>
<body>
<!--header><h1>HealtyLife</h1></header-->
<table border="0" id="titleTable" cellpadding="10">
    <tr >
        <td align="center" valign="middle">
            <a href="PazienteModificaDati.html" class="button" id="modificaDatiButton"> Modifica Account</a></td>
        <td width="60%" >
            <h1 class="title">Benvenuto Medico</h1></td>
        <td align="center" valign="middle">
            <a href="ControlLogout.php" class="button" id="logoutButton">
               <img src="img/logout.png" width="16" height="16">
                Logout</a> </td>
    </tr>
</table>


<div id="tableContainer1">
    <div id = "tableContainer2">
        <table border="0" id="buttonTable" cellpadding="10">
            <tr>
                <td align="center" valign="middle">
                    <a class="menuButton" href="GestioneRichiesteVisite.php">
                        <img src="img/ambulance.png" width="16" height="16">
                        Richieste di visita</a> </td>
                <td align="center" valign="middle">
                    <a class="menuButton" href="ElencoPazienti.php">
                        <img src="img/list.png" width="16" height="16">
                        Elenco Pazienti</a> </td>
            </tr>
            <tr>
                <td align="center" valign="middle">
                    <a class="menuButton" href="AggiuntaPaziente.php">
                        <img src="img/persadd.png" width="16" height="16">
                        Aggiungi Paziente</a> </td>
                <td align="center" valign="middle">
                    <a class="menuButton" href="AggiungiVisita.php">
                        <img src="img/add.png" width="16" height="16">
                        Aggiungi visita</a> </td>
            </tr>
            <tr>
                <td align="center" valign="middle">
                    <a class="menuButton" href="CalendarioVisite.php">
                        <img src="img/list.png" width="16" height="16">
                        Visualizza calendario visite</a> </td>
                <td align="center" valign="middle">
                    <a class="menuButton" href="InvioComunicazioni.html">
                        <img src="img/mail.png" width="16" height="16">
                        Invia comunicazioni</a> </td>
            </tr>


        </table>
    </div>
</div>

</body>
</html>
