<!DOCTYPE html>
<html>

<head>
    <title>Elenco Pazienti</title>

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
                $sqlQuery = "SELECT * FROM paziente";
                $db = mysqli_connect("127.0.0.1", "root", "", "healthylife");
                if (!$db) {
                    die('Could not connect: ' . mysqli_error($db));
                }

                $result = mysqli_query($db, $sqlQuery);
                if (!$result) echo mysqli_error();
                while ($obj = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td style=\"border: 1px;\"> " . $obj['nome'] . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $obj['cognome'] . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $obj['codiceFiscale'] . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $obj['citta'] . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $obj['indirizzo'] . "</td>";
                    echo "<td style=\"border: 1px;\"> " . $obj['email'] . "</td>";
                    echo "</tr>";
                }
                mysqli_close($db);
            ?>
        </tr>
    </table>
</body>


</html>