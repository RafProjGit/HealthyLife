<!DOCTYPE html>
<html>

<head>
    <title>Calendario Visite</title>

    <?php
    include_once ("VisiteManager.php");

        session_start();
        if(isset($_SESSION['CurrentUser'])){
            $emailMedico =  $_SESSION['CurrentUser'];
        }else{
            die("Per accedere a questa pagina occorre essere loggati");
        }
        if(isset($_SESSION['CurrentUserType'])){
        }else{
            die("Per accedere a questa pagina occorre essere loggati come medico");
        }
    ?>
    
    <link rel="ICON" href="favicon.ico" type="image/ico">
   
    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content="Pagina che mostra il calendario visite">

    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">



</head>

<body>
    <table style="width: 100%">
        <tr>
            <td style="width: 30%;">
                <h1>Calendario Visite</h1>
                <form action="CalendarioVisite.php" method="get">
                <label  style="margin: 5px" >Scegli data:<br/>
                    <input type="date" name="datetimeVisita">
                </label>
                    <br>
                    <input type="submit" value="Cerca">
                </form>
            </td>
            <td style="width: 70%;">
                <table id="tableCalendario" border="1" valign="top" style="width: 100%; border: 1px; border-collapse: collapse; margin: 5px" cellpadding="0" >
                    <tr>
                        <th bgcolor="#d3d3d3" style="width:30%;" >Orario</th>
                        <th bgcolor="#d3d3d3" style="width:70%;">Visita</th>
                    </tr>
                    <?php

                    if ($_GET) {
                        $data = $_GET['datetimeVisita'];

                        $visMan = new VisiteManager();
                        $visite = $visMan->getVisite($emailMedico, $data);

                        foreach ($visite as $v)
                        {
                            $p=$visMan->getPazienteRiferito($v);
                            echo "<tr>";
                            echo "<td style=\"border: 1px;\"> " . $v->data . " ora:" . $v->orario . "</td>";
                            echo "<td style=\"border: 1px;\"> Appuntamento con: " . $p->nome . " " . $p->cognome . "  </td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </td>
        </tr>
        
    </table>
    <div id="result">
        <ul id="lista">

        </ul>

    </div>
<script type="text/javascript">
    document.getElementsByName('datetimeVisita')[0].valueAsDate = new Date();
</script>
<script type="text/javascript" src="inputValidation.js" defer></script>
</body>


</html>