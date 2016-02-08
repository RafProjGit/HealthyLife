<!DOCTYPE html>
<html>

<head>
    <title>ControlAggiungiPaziente</title>

    
    <link rel="ICON" href="favicon.ico" type="image/ico">
   
    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content="Pagina che controlla l'aggiunta del paziente">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">


</head>
</html>

<?php

include_once ("GestioneMedicoManager.php");
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

if(isset($_GET['radioAdd'])){
    $tipo = $_GET['radioAdd'];
}else{
    header("Location: AggiuntaPazienteResult.php?result=0");

}
$medMgr = new GestioneMedicoManager();
if($tipo == "primavisita"){
    if(isset($_GET['comboUser'])) {
        $paziente = $_GET['comboUser'];
    }else{
        header("Location: AggiuntaPazienteResult.php?result=2");
        exit();
    }
    $ris = $medMgr->aggiungiPazientePerPrimaVisita($emailMedico, $paziente);
    if($ris){
        header("Location: AggiuntaPazienteResult.php?result=1");
    }else{
        header("Location: AggiuntaPazienteResult.php?result=4");
    }
}else if($tipo == "email") {
    if(isset($_GET['textMail'])) {
        $paziente = $_GET['textMail'];
    }else{
        header("Location: AggiuntaPazienteResult.php?result=2");
        exit();
    }

    if(empty($paziente)){
        header("Location: AggiuntaPazienteResult.php?result=2");
    exit();
    }
    $ris = $medMgr->aggiungiPazientePerEmail($emailMedico, $paziente);
    if ($ris) {
        header("Location: AggiuntaPazienteResult.php?result=1");
    } else {
        header("Location: AggiuntaPazienteResult.php?result=3");
    }
}