<!DOCTYPE html>
<html>

	<head>
	 <title>InvioRichiestaVisitaResult</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina di che controlla il risultato della richiesta della visita">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>



<?php


if(isset($_GET['result'])){
    $res=$_GET['result'];

    switch($res){
        case 0: {echo '<h3  class=\'result\'>Richiesta non inviata. </h3><br>';
            echo "<input type='button' onclick='window.history.back()' value='Torna indietro'>";
            break;}
        case 1: {echo '<h3 class=\'result\'>Richiesta inviata con successo<br>';
            echo "<input type='button' onclick='window.location.replace(\"UserHome.php\")' value='Torna alla home'>";
            break;}
    }
}