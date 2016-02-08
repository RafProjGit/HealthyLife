<!DOCTYPE html>
<html>

<head>
    <title>ControlRichiestaVisita</title>

    
    <link rel="ICON" href="favicon.ico" type="image/ico">
   
    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content="Questo control viene invocato quando viene richiesta una visita per
									 controllare se il paziente ha un medico o meno">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">


</head>
</html>

<?php

include_once ("VisiteManager.php");
session_start();
if(isset($_SESSION['CurrentUser'])){
    $paziente =  $_SESSION['CurrentUser'];
}else{
    die("Per accedere a questa pagina occorre essere loggati");
}
if(isset($_SESSION['CurrentUserType']) && $_SESSION['CurrentUserType'] == "paziente"){
}else{
    die("Per accedere a questa pagina occorre essere loggati come paziente");
}
$visMan = new VisiteManager();

$medico = $visMan ->cercaMedicoPaziente($paziente);
if($medico){
    echo "trovato medico ", $medico ;
    header('location: controlRichiestaVisita.php?primavisita=0&user='.$medico);
}else{
    header('location: CercaMedico.php');
}