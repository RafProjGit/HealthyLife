<!DOCTYPE html>
<html>

	<head>
	 <title>Control Richiesta Visita</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina di controllo per la richiesta della visitas">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>



<?php
session_start();
	include_once ("VisiteManager.php");
	include_once ("Visita.php");
	if(isset($_SESSION['CurrentUser'])) {
		$paziente = $_SESSION['CurrentUser'];
	}else {
		echo "Bisogna essere loggati per accedere a questa pagina!";
		die("Bisogna essere loggati per accedere a questa pagina!");
	}
	//la pagina richiestavisita.php informa se si tratta di una prima visita. In caso affermativo setta la variabile primavisita a true.
	if(isset($_GET['primavisita'])){
		$primavisita = $_GET['primavisita'];
	}else $primavisita=0;

	$medico= $_GET['user'];
	$visMan = new VisiteManager();

//se il type è 0 allora la richiesta è di prima visita
if($primavisita == 1){

	$vis = new Visita();
	$vis->setIdPaziente($paziente);
	$vis->setIdMedico($medico);
	$vis->setPrimavisita(true);

	$result = $visMan->aggiungiVisita($vis);

	if($result){
		echo"<script type='text/javascript'> window.location.href='InvioRichiestaVisitaResult.php?result=1';</script>";
	}else{
		echo"<script type='text/javascript'> window.location.href='InvioRichiestaVisitaResult.php?result=0';</script>";
	}

}
else{
	//allora si tratta di inviare una richiesta di visita
	$vis = new Visita();
	$vis->setIdPaziente($paziente);
	$vis->setIdMedico($medico);
	$vis->setPrimavisita(false);

	$result = $visMan->aggiungiVisita($vis);

	if($result){
		echo"<script type='text/javascript'> window.location.href='InvioRichiestaVisitaResult.php?result=1';</script>";
	}else{
		echo"<script type='text/javascript'> window.location.href='InvioRichiestaVisitaResult.php?result=0';</script>";
	}

}

