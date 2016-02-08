<!DOCTYPE>
<html>
<head>
<title>AggiuntaResult></title>
<link rel="ICON" href="favicon.ico" type="image/ico">

    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content="Questa pagina mostra i risultati dell'aggiunta di una visita">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	
</head>
</html>
<?php


if(isset($_GET['result'])){
    $res=$_GET['result'];

    switch($res){
        case 0: {echo '<h3 class=\'result\'>Visita non inserita. Impossibile accedere al database</h3><br>';
            echo "<input type='button' onclick='window.history.back()' value='Torna indietro'>";
            break;}
        case 1: {echo '<h3 class=\'result\'>Visita inserita con successo<br>';
            echo "<input type='button' 	onclick=\"
		newUrl= 'MedicHome.php';
		window.location.replace(newUrl);
		\" value='Torna alla home'>";
            break;}
        case 2: {echo '<h3 class=\'result\'>Visita non inserita. Uno o più parametri errati.<br>';
                echo "<input type='button' onclick='window.history.back()' value='Torna indietro'>";
                break;}
        case 3: {echo '<h3 class=\'result\'>Visita non inserita. Esiste già una visita nello stesso orario.<br>';
                    echo "<input type='button' onclick='window.history.back()' value='Torna indietro'>";
                    break;}
        case 4: {echo '<h3 class=\'result\'>Visita non inserita. Orario o data inseriti sono antecedenti a quelli odierni.<br>';
            echo "<input type='button' onclick='window.history.back()' value='Torna indietro'>";
            break;}
    }
}
