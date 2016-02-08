<!DOCTYPE html>
<html>

<head>
    <title>ControlAggiungiVisita</title>

    
    <link rel="ICON" href="favicon.ico" type="image/ico">
   
    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content="Questo control viene chiamato da AggiungiVisita.php e permette di
									 aggiungere una nuova vistita al medico">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">


</head>
</html>




<?php
/**
 * 
 */

	include ("VisiteManager.php");
	include ("Visita.php");
	session_start();
	if(isset($_SESSION['CurrentUser'])){
		$medico =  $_SESSION['CurrentUser'];
	}else{
		die("Per accedere a questa pagina occorre essere loggati");
	}
	if(isset($_SESSION['CurrentUserType'])){
	}else{
		die("Per accedere a questa pagina occorre essere loggati come medico");
	}
    $paziente = $_POST['selectedPaziente'];
    $data = $_POST['datetimeVisita'];
    $orario = $_POST['orario'];
    $messaggio = $_POST['textMessaggio'];
	if(isset($_POST['idVisita'])){
		$idVisita = $_POST['idVisita'];
	}else $idVisita="";
	if(isset($_POST['idVisita'])){
		$primavisita = $_POST['primavisita'];
	}else{
		echo "primavcifew non settata";
	}
	$visiteMgr = new VisiteManager();




	//Eventualmente i campi siano corretti, avviene l'inserimento
	if(($paziente=="") || ($data=="") || ($orario=="") ){
		header('location: AggiuntaResult.php?result=2');
		exit();
	}

	$visita=new Visita($idVisita, $medico, $paziente, $data, $orario, $messaggio, true, $primavisita);

	$composedTime = $data." ".$orario;
	//Controlliamo prima se la data inserita dal medico sia successiva ad oggi
	if(strtotime($composedTime) <= strtotime('now') ) {
		header('location: AggiuntaResult.php?result=4');
		exit();
	}

	//Interroghiamo il database e vediamo se i valori dei campi inseriti non si sovrappongano con altri
	$result = $visiteMgr->validaDataVisita($visita);
	if(!$result){
		header('location: AggiuntaResult.php?result=3');
		exit();
	}
	//se il campo idVisita è settato vuol dire che si tratta di accettare una richiesta di visita
	if($idVisita){
		echo "accedo ad accettavisita";
		$result = $visiteMgr->accettaVisita($visita);
	}else{
		//altrimenti si tratta di una nuova visita richiesta dal medico
		echo "accedo a aggiungivisita";
		$result = $visiteMgr->aggiungiVisita($visita);
	}

	if($result){
		header('location: AggiuntaResult.php?result=1');
	}else{
		header('location: AggiuntaResult.php?result=0');
	}
?>