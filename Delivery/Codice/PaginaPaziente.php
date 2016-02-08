<!DOCTYPE html>
<html lang="en">
<head>
    <title> Pagina Paziente </title>

    <?php
    include_once ("GestioneMedicoManager.php");
    include_once ("Paziente.php");
    session_start();
    if(isset($_SESSION['CurrentUser'])){
        $emailMedico =  $_SESSION['CurrentUser'];
    }else{
        die("Per accedere a questa pagina occorre essere loggati");
    }
    if(isset($_SESSION['CurrentUserType']) && $_SESSION['CurrentUserType'] == "medico"){
    }else{
        die("Per accedere a questa pagina occorre essere loggati come medico");
    }
    ?>
    <link rel="ICON" href="favicon.ico" type="image/ico">
   
    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content="Pagina del paziente">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
    <style type="text/css">
        .title {
            text-align: center;
            font-family: Arial;
            font-size: x-large;
            color:    #000000;
        }

        #datiPaziente{
            text-align: center;
            font-family: Arial;
            font-size: large;
            color:    #000000;
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
<h1 class="title"> Pagina del paziente</h1>
<?php $mgr = new GestioneMedicoManager();
$paz = $mgr->getPazienteById($_GET['id']);

echo "<h2 id=\"datiPaziente\">Nome: $paz->nome  Cognome: $paz->cognome Codice Fiscale: $paz->codiceFiscale Email: $paz->email Città: $paz->citta</h2>"
?>
<div id="tableContainer1">
    <div id = "tableContainer2">
        <table border="0" id="buttonTable" cellpadding="10">
            <tr>
                <td align="center" valign="middle">
                    <a class="menuButton" href="PesoPaziente.html">
                        <img src="img/heart.png" width="16" height="16">
                        Visualizza andamento peso</a> </td>
                <td align="center" valign="middle">
                    <a class="menuButton" <?php echo "href=\"ControlModificaMenu.php?userId=".$paz->email."\""; ?>">
                        <img src="img/edit.png" width="16" height="16">
                        Modifica menu settimanale</a> </td>
            </tr>
            <tr>
                <td align="center" valign="middle">
                    <a class="menuButton" <?php echo "href=\"menuSettimanale.php?id=".$paz->email."\""; ?>>
                        <img src="img/food.png" width="16" height="16">
                        Visualizza menu</a> </td>

                <td align="center" valign="middle">
                    <a class="menuButton" href="InvioComunicazione.html">
                        <img src="img/mail.png" width="16" height="16">
                        Invia Comunicazione</a> </td>
            </tr>
            <tr>
                <td align="center" valign="middle">
                     </td>
            </tr>


        </table>
    </div>
</div>

</body>
</html>