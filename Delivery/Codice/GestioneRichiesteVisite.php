<!DOCTYPE html>
<html>
    <?php
    include_once "VisiteManager.php";
    session_start();

    if(isset($_SESSION['CurrentUser'])) {
        $idMedico = $_SESSION['CurrentUser'];
    }else {
        die("Bisogna essere loggati per accedere a questa pagina!");
    }
    ?>
    <title>Gestione Richieste Visite</title>

   
    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, Rotolo, D'Auria, Nunziata">
    <meta name="description" content="Pagina per la gestione della richiesta delle visite ">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">

    <script type="text/javascript">
        function accettaRichiesta(idVisita, idPaziente) {
            window.location.href="AggiungiVisita.php?idVisita="+idVisita+"&idPaziente="+idPaziente;
        }
    </script>

</head>

<body>
<h1>Richieste di visite</h1>
<br>
<table id="tablePazienti" border="1" valign="top" style="width: 100%; border: 1px; border-collapse: collapse; margin: 5px" cellpadding="0" >
    <tr>
        <th bgcolor="#d3d3d3" style="width:10%;">Nome</th>
        <th bgcolor="#d3d3d3" style="width:10%;">Cognome</th>
        <th bgcolor="#d3d3d3" style="width:20%;">Codice Fiscale</th>
        <th bgcolor="#d3d3d3" style="width:15%;">Città</th>
        <th bgcolor="#d3d3d3" style="width:15%;">Indirizzo</th>
        <th bgcolor="#d3d3d3" style="width:10%;">email</th>
        <th bgcolor="#d3d3d3" style="width:10%">conferma</th>
    </tr>
	
         <?php

                $visMan = new VisiteManager();
                $visite = $visMan->getRichiesteDiVisita($idMedico);
                foreach($visite as $v) {
                    $paz = $visMan->getPazienteRiferito($v);
                    echo "<tr >";
                    echo "<td style=\"display: none;\"> " . $v->idVisita . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $paz->nome . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $paz->cognome . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $paz->codiceFiscale . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $paz->citta . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $paz->indirizzo . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $paz->email. "</td>";
                    echo "<td><input style=\" margin: 2px\"   type=\"button\" value=\"Conferma\" onclick='accettaRichiesta(\"".$v->idVisita."\",\"".$paz->email ."\")'></td>";
                }
            ?>

			</tr>

</table>

</body>


</html>