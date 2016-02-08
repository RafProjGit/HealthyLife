<!DOCTYPE>

<html>
<head>

<link rel="ICON" href="favicon.ico" type="image/ico">

    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content="Risultato dell'aggiunta del paziente">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
</head>
</html>


<?php


if(isset($_GET['result'])){
    $res=$_GET['result'];

    switch($res){
        case 0: {echo '<h3 class=\'result\'>Devi selezionare un tipo di aggiunta</h3><br>';
            echo "<input type='button' onclick='window.history.back()' value='Torna indietro'>";
            break;}
        case 1: {echo '<h3 class=\'result\'>Paziente aggiunto con successo<br>';
            echo "<input type='button'
                onclick=\"
		newUrl= 'MedicHome.php';
		window.location.replace(newUrl);\"
		value='Torna alla home'>";
            break;}
        case 2: {echo '<h3 class=\'result\'>Nessun paziente selezionato o nessun indirizzo email inserito.<br>';
            echo "<input type='button' onclick='window.history.back()' value='Torna indietro'>";
            break;}
        case 3: {echo '<h3 class=\'result\'>Non è stato trovato nessun paziente con la mail inserita<br>';
            echo "<input type='button' onclick='window.history.back()' value='Torna indietro'>";
            break;}
        default: {echo '<h3 class=\'result\'>Errore<br>';
            echo "<input type='button' onclick='window.history.back()' value='Torna indietro'>";
            break;}
    }
}