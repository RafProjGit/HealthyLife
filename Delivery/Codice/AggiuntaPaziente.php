<!DOCTYPE html>
<html>

<head>
    <title>AggiuntaPaziente</title>

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
    <meta name="description" content="Questa pagina permette di selezionare un paziente che ha richiesto una prima visita e di aggiungerlo al proprio
									  elenco di pazienti. Al submit viene invocato ControlAggiungiPaziente.php">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">


</head>

<body>
<h1>Aggiunta Paziente</h1>
<br>

<form action="ControlAggiungiPaziente.php" method="get">
<table style="width: 100%">
    <tr>
        <td style="width: 50%">
            <input style="margin: 5px" name="radioAdd" id="radioAdd" type="radio" value="primavisita" name="aggiungipaziente" checked >Aggiungi per prima visita<br>


            <select style="margin: 5px"  name="comboUser">
            <?php
                $gesMed = new GestioneMedicoManager();
                $pazienti=$gesMed->getPrimeVisitePazienti($emailMedico);
                foreach ($pazienti as $p)
                {
                    echo "<option value=\"" . $p->email . "\">". $p->nome . " - " . $p->cognome  . "</option><br>";
                }

                ?>
            </select>
            <br>
            <input style="margin: 5px"  name="submitAdd" type="submit" value="Conferma"/>
        </td>
        <td style="width: 50%">
            <input style="margin: 5px"  name="radioAdd" type="radio" value="email" name="aggiungipaziente">Aggiungi per email<br>
            <input style="margin: 5px"  name="textMail" type="text" placeholder="type here email"/><br>
            <input style="margin: 5px"  name="submitMail" type="submit" value="Conferma"/>
        </td>
    </tr>
</table>
</form>
</body>


</html>