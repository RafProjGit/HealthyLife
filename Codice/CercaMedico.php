<!DOCTYPE html>
<html>

<head>
    <title> Richiesta visita </title>

    
    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content=" Questa pagina permette di cercare un medico se non se ne ha uno, altrimenti
    di inviargli una richiesta di visita">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">

    <script type="text/javascript">
        function chiediPrimaVisita(){
            var e = document.getElementById("selectRisultati");
            var selected = e.options[e.selectedIndex].value;
            window.location.href="controlRichiestaVisita.php?primavisita=1&user="+selected;
        }
    </script>
</head>


<body>
<?php

session_start();
include("VisiteManager.php");
?>

<table style="width: 100%">
    <tr>
        <td style="width: 50%">
            <form action="CercaMedico.php" method="get">
                <label style="margin: 5px">Nome del Medico:</label><br>
                <input name="nomeMedico" style="margin:5px" id="textNomeMedico" type="text" placeholder="type here"/></br>

                <label style="margin: 5px">Cognome del Medico:</label><br>
                <input name="cognomeMedico" style="margin:5px" id="textCognomeMedico" type="text" placeholder="type here"/>


                <br style="margin: 10px">
                <label style="margin: 5px">Località:</label><br>
                <input style="margin:5px" name="textLocalita" type="text" placeholder="type here"/>
                <br style="margin:10px">
				<input type="hidden" name="primavisita" value="1">
                <input style="margin:5px" name="submitSearch" type="submit" value="Conferma"/>
                <input style="margin:5px" name="resetAnnulla" type="reset" value="Annulla"/>
            </form>
        </td>
        <td style="width: 50%">
            <label style="margin: 5px"> Risultati:</label><br>
            <select style="margin: 5px;" id="selectRisultati" size="10" onclick="document.getElementById('confirmButton').style.display='block' ">
                <?php
                if(isset($_GET['nomeMedico']) || isset($_GET['textLocalita'])) {
                    if(isset($_GET['nomeMedico'])){
                        if(isset($_GET['cognomeMedico'])){
                            $nome = $_GET['nomeMedico'];
                            $cognome = $_GET['cognomeMedico'];
                        }else{
                            $nome = $_GET['nomeMedico'];
                            $cognome = null;
                        }
                    }else {
                        $nome = null;
                        $cognome = null;
                    }

                    if(isset($_GET['textLocalita'])){
                        $loc = $_GET['textLocalita'];
                    }else {
                        $loc = null;
                    }
                    if($nome && !$cognome) {
                        echo "<script type='text/javascript'> window.alert('Necessario specificare anche il cognome')</script>";
                    }else {
                        $visitaMgr = new VisiteManager();
                        $medics = $visitaMgr->cercaMedico($nome, $cognome, $loc);
                        $cnt = count($medics);
                        for($i=0;$i<$cnt;$i++)
                        {
                            echo "<option name = \"selectedMed\" value=\"" . $medics[$i]->email . "\">". $medics[$i]->nome . " ". $medics[$i]->cognome  ." - " . $medics[$i]->citta  . "</option><br>";
                        }
                    }
                }
                ?>
            </select><br>
            <div id="confirmButton" style="display: none"><input type="button" value="Seleziona" onclick="chiediPrimaVisita()"></div>
        </td>
    </tr>
</table>

</body>


</html>