<!DOCTYPE html>
<html>

<head>
    <title>Calendario Visite</title>

    <!--Questo tag mette la favicon alla propria pagina web -->
    <link rel="ICON" href="favicon.ico" type="image/ico">
    <!--I tag meta servono per mantenere delle informazioni sul documento
          come l'autore , le keyword e il programma che ha generato il
          documento -->
    <meta name="author" content="Cataletti, Rotolo, D'Auria, Nunziata">
    <meta name="description" content="">


    <!--Legge tutti i caratteri speciali-->
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
                        $sqlQuery = "SELECT * FROM visita JOIN paziente on visita.idPaziente = paziente.email AND data='".$data ."'";
                        $db = mysqli_connect("127.0.0.1", "root", "", "healthylife");
                        if (!$db) {
                            die('Could not connect: ' . mysqli_error($db));
                        }

                        $result = mysqli_query($db, $sqlQuery);
                        if (!$result) echo mysqli_error();
                        while ($obj = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            //  echo $obj['nome'] . "<br>";
                            echo "<td style=\"border: 1px;\"> " . $obj['data'] . " ora:" . $obj['orario'] . "</td>";
                            echo "<td style=\"border: 1px;\"> Appuntamento con: " . $obj['nome'] . " " . $obj['cognome'] . "  </td>";
                            echo "</tr>";
                        }
                        mysqli_close($db);
                    }
                    ?>
                </table>
            </td>
        </tr>
        
    </table>
</body>


</html>