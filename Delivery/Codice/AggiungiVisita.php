<!DOCTYPE html>
<html>

<head>
    <?php
        include_once ("VisiteManager.php");
        session_start();
        if(isset($_SESSION['CurrentUser'])){
            $emailMedico = $_SESSION['CurrentUser'];
        }else{
            die("Bisogna essere loggati per accedere a questa pagina!");
        }
        if(isset($_GET['idPaziente'])) {
            $pazienteSelezionato = $_GET['idPaziente'];
        }else $pazienteSelezionato = "";

        if(isset($_GET['idVisita'])) {
            $visitaSelezionata = $_GET['idVisita'];
        }else $visitaSelezionata = "";

    ?>
    <title>Aggiungi Visita</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
   
    <meta name="author" content="Cataletti, Rotolo, D'Auria, Nunziata">
    <meta name="description" content="Questa pagina permette al medico di aggiungere una vista
									  Ci si può arrivare in 2 modi:
									  1. Dalla pagina GestioneRichiesteVisite.php, in questo caso vuol dire che si sta accettando una richiesta di
									  visita, quindi sarà settato un campo contenente l'id della richiesta di visita ($_GET['idVisita'])
									  e un campo contenente l'id del paziente che ha richiesto la visita; ($_GET['idPaziente']);
									  2. Dalla pagina MedicHome.html in questo caso non si avrà nessun campo settato.
								      Dopo aver premuto sul bottone di submit viene invocato il ControlAggiungiVisita.php">
									  
    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">

    <script type='text/javascript'>
        function disabilitaOption(){
           var select = document.getElementById("selezionePaziente");
            select.setAttribute("Disabled", "")
        }
        function aggiungiPazienteSelezionato(){
            var el = document.getElementById("selezionePaziente");
            var sel = el.options[el.selectedIndex].getAttribute("value");
            var hidden = document.getElementById("pazienteToSend");
            hidden.value = sel;
        }
    </script>

</head>
<body>
<table width="100%">
    <tr>
        <td width="40%" height="100%">
            <form action="ControlAggiungiVisita.php" method="post" onsubmit="aggiungiPazienteSelezionato()">

                <h1 style="margin: 5px;">Aggiungi Visita</h1>
                <b style="margin: 5px">Seleziona Paziente:</b><br/>
                <select id="selezionePaziente" style="margin:5px" title="Seleziona Paziente" name="selectPaziente"
                        >
                    <?php

                    $visMan = new VisiteManager();
                    if(!$visitaSelezionata) {
                        //se non è settato il campo idVisita allora il medico può scegliere un paziente
                        $pazienti = $visMan->getPazientiByMedico($emailMedico);
                        foreach ($pazienti as $paz) {
                            if ($paz->email == $pazienteSelezionato) echo "<script type='text/javascript'>disabilitaOption();</script>\n";
                            echo "<option value=\"" . $paz->email . "\"";
                            if ($paz->email == $pazienteSelezionato) echo "SELECTED";
                            echo ">" . $paz->nome . " - " . $paz->cognome . "</option><br>";
                            //echo "<input type=\"hidden\" name=\"selectedPaziente\" value=\"selectPaziente\" />";
                        }
                    }
                    else{
                        //altrimenti l'utente viene selezionato dal sistema
                        $visita = $visMan->getVisitaById($visitaSelezionata);
                        $paziente = $visMan->getPazienteRiferito($visita);
                        echo "<script type='text/javascript'>disabilitaOption();</script>";
                        echo "<option value=\"" . $visita->idPaziente . "\"";
                        echo ">" . $paziente->nome . " - " . $paziente->cognome . "</option><br>";
                        echo "<script type='text/javascript'>disabilitaOption();</script>";
                        //echo "<input type=\"hidden\" name=\"selectedPaziente\" value=\"selectPaziente\" />";

                    }
                    ?>
                </select>
                <br/>
                <input id="Data" style="margin: 5px" type="date" name="datetimeVisita">
                <br/>

                <label for="orario">Inserire orario (i munuti accettati sono 00, 15, 30, 45): <br><input type="time" id="orario" name="orario" min="00:00" max="23:00" step="900"  >
                </label>

                    <br/>
                    <label for="Note"> Inserisci note (Opzionale)<br>
                    <textarea id="note" maxlength="200" style="margin: 5px" name="textMessaggio" placeholder="Max 200 caratteri" style="width:100%" rows="5"></textarea>
                    <br/></label>
                <?php
                if($visitaSelezionata){
                    //nel caso di una richiesta di vista due campi hidden permettono di inviare al control
                    //informazioni aggiuntive sulla visita.
                    echo "<input type='hidden' name='idVisita' value='$visita->idVisita'>";
                    echo "<input type='hidden' name='primavisita' value='$visita->primavisita'>";
                }
                //Questa input permette di settare tramite una funzione js (settata in onsubmit nel tag di apertura
                //della form il valore selezionato nella select. Questo perche se la option è settata a disabled, il suo valore
                //non viene inviato al control.
                echo "<input type='hidden' id='pazienteToSend' name='selectedPaziente' value='pollo'>";
                ?>
                <input style="margin: 5px;" type="submit" value="Aggiungi visita" name="submitVisita"/>
            </form>
        </td>
        <td width="60%" style="vertical-align: top; horiz-align: left; height:100%">
            <table id="tableCalendario" border="1" valign="top" style="width: 100%; border: 1px; border-collapse: collapse; margin: 5px" cellpadding="0" >
                <tr>
                    <th bgcolor="#d3d3d3" style="width:30%;" >Orario</th>
                    <th bgcolor="#d3d3d3" style="width:70%;">Visita</th>
                </tr>

                <tr>
                    <?php
                    $visite = $visMan->getVisite($emailMedico);

                    foreach ($visite as $v)
                    {
                        if($v->data > date("y-m-d")) {
                            $p = $visMan->getPazienteRiferito($v);
                            echo "<tr>";
                            echo "<td style=\"border: 1px;\"> " . $v->data . " ora:" . $v->orario . "</td>";
                            echo "<td style=\"border: 1px;\"> Appuntamento con: " . $p->nome . " " . $p->cognome . "  </td>";
                            echo "</tr>";
                        }
                    }

                    ?>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div id="result">
    <ul id="lista">

    </ul>

</div>
<script type="text/javascript" src="inputValidation.js" defer></script>
</body>


</html>