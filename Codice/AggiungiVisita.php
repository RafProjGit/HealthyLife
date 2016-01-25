<!DOCTYPE html>
<html>

<head>
    <title>Aggiungi Visita</title>

    <!--Questo tag mette la favicon alla propria pagina web -->
    <link rel="ICON" href="favicon.ico" type="image/ico">
    <!--I tag meta servono per mantenere delle informazioni sul documento
          come l'autore , le keyword e il programma che ha generato il
          documento -->
    <meta name="author" content="Cataletti, Rotolo, D'Auria, Nunziata">
    <meta name="description" content="Pagina per l'aggiunta del paziente all'interno del database">


    <!--Legge tutti i caratteri speciali-->
    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">


</head>
<body>
<table width="100%">
    <tr>
    <td width="40%" height="100%">
        <form action="AddVisita.php" method="post">

        <h1 style="margin: 5px;">Aggiungi Visita</h1>
        <b style="margin: 5px">Seleziona Paziente:</b><br/>
        <select style="margin:5px" title="Seleziona Paziente"  name="selectPaziente">
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
                //  echo $obj['nome'] . "<br>";
                echo "<option value=\"" . $obj['email'] . "\">". $obj['nome'] . " - " . $obj['cognome']  . "</option><br>";
            }
            mysqli_close($db);

            ?>
        </select>
        <br/>
        <input style="margin: 5px" type="date" name="datetimeVisita">
        <br/>
	
		<label for="orario">Inserire orario: <input type="time" id="orario" name="orario">
	
		
        <br/>
        <textarea style="margin: 5px" name="textMessaggio" placeholder="inserisci il messaggio di avviso" style="width:100%" rows="5"></textarea>
        <br/>
        <input style="margin: 5px;" type="submit" value="Aggiungi visita" name="submitVisita"/>
        </form>
    </td>
    <td width="60%" style="vertical-align: top; horiz-align: left; height:100%">
        <table id="tableCalendario" border="1" valign="top" style="width: 100%; border: 1px; border-collapse: collapse; margin: 5px" cellpadding="0" >
            <tr>
                <th bgcolor="#d3d3d3" style="width:30%; border: 1;" >Orario</th>
                <th bgcolor="#d3d3d3" style="width:70%;">Visita</th>
            </tr>
			
            <tr>
                <?php
                $sqlQuery="SELECT * FROM visita JOIN paziente on visita.idPaziente = paziente.email";
                $db=mysqli_connect("127.0.0.1","root","","healthylife");
                if (!$db)
                {
                    die('Could not connect: ' . mysqli_error($db));
                }

                $result = mysqli_query($db,$sqlQuery);
                if (!$result) echo mysqli_error();
                while ($obj = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    //  echo $obj['nome'] . "<br>";
                    echo "<td style=\"border: 1px;\"> " . $obj['data'] . " ora:" . $obj['orario'] . "</td>";
                    echo "<td style=\"border: 1px;\"> Appuntamento con: " . $obj['nome'] . " " . $obj['cognome'] . "  </td>";
                    echo "</tr>";
                 }
                mysqli_close($db);

                ?>
            </tr>
        </table>
    </td>
    </tr>
</table>
</body>


</html>