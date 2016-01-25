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
<h1>Aggiunta Paziente</h1>
<br>

<form action="AggiuntaPaziente.php" method="get">
<table style="width: 100%">
    <tr>
        <td style="width: 50%">
            <input style="margin: 5px" name="radioAdd" id="radioAdd" type="radio" value="primavisita" name="aggiungipaziente">Aggiungi per prima visita<br>


            <select style="margin: 5px"  name="comboUser">
                <?php
                $sqlQuery="SELECT * FROM `paziente`";
                $db=mysqli_connect("127.0.0.1","root","","healthylife");
                if (!$db)
                {
                    die('Could not connect: ' . mysqli_error($db));
                }

                $result = mysqli_query($db,$sqlQuery);
                if (!$result) echo mysqli_error();
                while ($obj = mysqli_fetch_assoc($result))
                {
                    echo "<option value=\"" . $obj['email'] . "\">". $obj['nome'] . " - " . $obj['cognome']  . "</option><br>";
                }
                mysqli_close($db);

                ?>
            </select>
            <br>
            <input style="margin: 5px"  name="submitAdd" type="submit" value="Conferma"/>
        </td>
        <td style="width: 50%">
            <input style="margin: 5px"  name="radioAdd" type="radio" value="peremail" name="aggiungipaziente">Aggiungi per email<br>
            <input style="margin: 5px"  name="textMail" type="text" placeholder="type here email"/><br>
            <input style="margin: 5px"  name="submitMail" type="submit" value="Conferma"/>
        </td>
    </tr>
</table>
</form>
</body>


</html>