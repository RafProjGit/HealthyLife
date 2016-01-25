<!DOCTYPE html>
<html>

<head>
    <title>  </title>

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
            <td style="width: 50%">
                <form action="Richiesta%20Visita.php" method="get">
                <label style="margin: 5px">Nome del Medico:</label><br>
                <input name="txtMedico" style="margin:5px" id="textNomeMedico" type="text" placeholder="type here"/>
                <br style="margin: 10px">
                <label style="margin: 5px">Località:</label><br>
                <input style="margin:5px" name="textLocalita" type="text" placeholder="type here"/>
                <br style="margin:10px">
                <input style="margin:5px" name="submitSearch" type="submit" value="Conferma"/>
                <input style="margin:5px" name="resetAnnulla" type="reset" value="Annulla"/>
                </form>
            </td>
            <td style="width: 50%">
                <label style="margin: 5px"> Risultati:</label><br>
               <select style="margin: 5px;" id="selectRisultati" size="10">
                <?php
                if ($_GET)
                {
                    $medico = $_GET['txtMedico'];
                    $localita=$_GET['textLocalita'];
                    $sqlQuery="SELECT email,nome,citta FROM `medico` WHERE (nome='" . $medico . "' AND citta='". $localita ."')";
                    $db=mysqli_connect("127.0.0.1","root","","healthylife");
                    if (!$db)
                    {
                        die('Could not connect: ' . mysqli_error($db));
                    }

                    $result = mysqli_query($db,$sqlQuery);
                    if (!$result) echo mysqli_error();
                    while ($obj = mysqli_fetch_assoc($result))
                    {
                      //  echo $obj['nome'] . "<br>";
                        echo "<option value=\"" . $obj['email'] . "\">". $medico . " - " . $localita  . "</option><br>";
                    }
                    mysqli_close($db);
                }
                ?>
                </select>
            </td>
        </tr>
    </table>
</body>


</html>