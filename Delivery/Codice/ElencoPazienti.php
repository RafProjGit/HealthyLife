<!DOCTYPE html>
<html>

<head>
    <title>Elenco Pazienti</title>


    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina che visualizza l'elenco dei pazienti">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	




    <?php
    include_once("GestioneMedicoManager.php");
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

    <script type="text/javascript">
        onload = function() {
                if (!document.getElementsByTagName || !document.createTextNode) return;
                var rows = document.getElementById('tablePazienti').getElementsByTagName('tr');
                for (i = 1; i < rows.length; i++) {

                    rows[i].onclick = function() {
                       window.location = "PaginaPaziente.php?id="+this.cells[5].innerHTML;
                    }
                }
            }
    </script>


</head>

<body>
    <h1>Elenco Pazienti</h1>
    <br>

    <table id="tablePazienti"   border="1" valign="top" style="border-color: black; width: 100%; border: 1px; border-collapse: collapse; margin: 5px" cellpadding="0" >
        <tr>
            <th bgcolor="#d3d3d3" style="width:10%;" >Nome</th>
            <th bgcolor="#d3d3d3" style="width:10%;">Cognome</th>
            <th bgcolor="#d3d3d3" style="width:20%;">Codice Fiscale</th>
            <th bgcolor="#d3d3d3" style="width:15%;">Città</th>
            <th bgcolor="#d3d3d3" style="width:20%;">Indirizzo</th>
            <th bgcolor="#d3d3d3" style="width:15%;">email</th>
        </tr>
        <tr>
            <?php
                $mgr = new GestioneMedicoManager();
                $pazienti = $mgr->getPazientiByMedico($emailMedico);

               foreach($pazienti as $p) {
                    echo "<tr style='cursor: pointer'>";
                    echo "<td style=\"border: 1px;\">" . $p->nome . "</td>";
                    echo "<td style=\"border: 1px;\">" . $p->cognome. "</td>";
                    echo "<td style=\"border: 1px;\">" . $p->codiceFiscale . "</td>";
                    echo "<td style=\"border: 1px;\">" . $p->citta . "</td>";
                    echo "<td style=\"border: 1px;\">" . $p->indirizzo . "</td>";
                    echo "<td style=\"border: 1px;\">" . $p->email . "</td>";
                    echo "</tr>";
                }
            ?>
        </tr>
    </table>
</body>


</html>