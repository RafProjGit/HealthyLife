<!DOCTYPE html>
<html lang="en">
<head>
    <title> Homepege </title>
	<?php 
	
	session_start();
	if(isset($_SESSION['CurrentUser'])){
        $pziente =  $_SESSION['CurrentUser'];
    }else{
        die("Per accedere a questa pagina occorre essere loggati");
    }
    if(isset($_SESSION['CurrentUserType']) && $_SESSION['CurrentUserType'] == "paziente"){
    }else{
        die("Per accedere a questa pagina occorre essere loggati come medico");
    }
	?>
  
    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content="Homepege dell'user">

    <script type="text/javascript">
        var elems = document.getElementsByClassName('conferma');
        var confirmIt = function (e) {
            if (!confirm('Sei sicuro?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>

    <!--Legge tutti i caratteri speciali-->
    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
    <style type="text/css">
        .title {
            text-align: center;
            font-family: Arial ;
            font-size: large;
            color:    #000000;
        }
        .button {
            padding:5px 10px;
            background-color:#44c767;
            -moz-border-radius:28px;
            -webkit-border-radius:28px;
            border-radius:28px;
            border:1px solid #18ab29;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:17px;
            padding:16px 31px;
            text-decoration:none;
            text-shadow:0px 1px 0px #2f6627;
        }
        .button:hover {
            background-color:#5cbf2a;
        }
        .button:active {
            position:relative;
            top:1px;
        }

        .menuButton {
            display: inline-block;
            width: 250px;
            padding:5px 10px;
            background-color:#44c767;
            -moz-border-radius:28px;
            -webkit-border-radius:28px;
            border-radius:28px;
            border:1px solid #18ab29;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:17px;
            padding:16px 31px;
            text-decoration:none;
            text-shadow:0px 1px 0px #2f6627;
        }
        .menuButton:hover {
            background-color:#5cbf2a;
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
            <h1 class="title">Benvenuto Paziente</h1></td>
        <td align="center" valign="middle">
            <a href="ControlLogout.php" class="button conferma" id="logoutButton">
                <img src="img/logout.png" width="16" height="16">
                Logout</a> </td>
    </tr>
</table>


<div id="tableContainer1">
    <div id = "tableContainer2">
        <table border="0" id="buttonTable" cellpadding="10">
            <tr>
                <td align="center" valign="middle">

                    <a class="menuButton" href="menuSettimanale.php">
                        <img src="img/calendar.png" width="16" height="16">
                        Controlla menu settimanale</a> </td>
                <td align="center" valign="middle">
                    <a class="menuButton" href="VisualizzaAndamento.html">
                        <img src="img/progress.png" width="16" height="16">
                        Visualizza andamento</a> </td>
            </tr>
            <tr>
                <td align="center" valign="middle">
                    <a class="menuButton conferma" href="ControlCreazioneRichiestaVisita.php">
                        <img src="img/stethoscope.png" width="16" height="16">
                        Richiedi una visita</a> </td>
                <td align="center" valign="middle">
                    <a class="menuButton" href="AggiuntaPeso.html">
                        <img src="img/balance.png" width="16" height="16">
                        Aggiungi peso</a> </td>
            </tr>
            <tr>
                <td align="center" valign="middle">
                    <a class="menuButton" href="PuntiDiInteresse.html">
                        <img src="img/position.png" width="16" height="16">
                        Visualizza punti di interesse</a> </td>
                <td align="center" valign="middle">
                    <a class="menuButton" href="Avvisi.html">
                        <img src="img/doc.png" width="16" height="16">
                        Leggi avvisi e comunicazioni</a> </td>
            </tr>
            <tr>
                <td align="center" valign="middle">
                    <a class="menuButton" href="CambioMedico.html">
                        <img src="img/medical.png" width="16" height="16">
                        Cambia medico</a> </td>
                <td></td>
            </tr>

        </table>
    </div>
</div>

</body>
</html>
