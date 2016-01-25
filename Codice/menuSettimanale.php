<html>

	<head>
			<title> Menù Settimanale </title>
			
																	<!--Questo tag mette la favicon alla propria pagina web -->
			<link rel="ICON" href="favicon.ico" type="image/ico">
																	<!--I tag meta servono per mantenere delle informazioni sul documento
																		  come l'autore , le keyword e il programma che ha generato il 
																		  documento -->
			<meta name="author" content="Cataletti, Rotolo, D'Auria, Nunziata">
			<meta name="description" content="In questa pagina è contenuto il menù settimanale del paziente">
			
			
																	<!--Legge tutti i caratteri speciali-->
			<meta http-equiv="Content-type" content="text/html; CHARSET=utf-8"> 

			
			<style type="text/css">
			table{ border-collapse:collapse;
				   width:100%;
				   height:70%;}
			table,td,th{ border: 2px solid black;}
			#bottone{heigh:150px;
					 width:100px;}
			</style>
			
			
	</head>
	
	<body>
	
	<p style="font-size:120%;
			  text-align:left;">
	Menù settimanale
	</p>
	
	<!--Tabella del menù-->
	<table >
		<tr bgcolor="#C0C0C0">
		<th>Giorno</th>
		<th>Colazione</th>
		<th>Spuntino Mattutino</th>
		<th>Pranzo</th>
		<th>Spuntino Pomeridiano</th>
		<th>Cena</th>

		</tr>

		<?php
		$sqlQuery = "SELECT * FROM `menu` WHERE emailPaziente='fra@outlook.it' ";
		$db = mysqli_connect("127.0.0.1", "root", "", "healthylife");
		if (!$db) {
			die('Could not connect: ' . mysqli_error($db));
		}

		$result = mysqli_query($db, $sqlQuery);
		if (!$result) echo mysqli_error();
		while ($obj = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<th bgcolor='#C0C0C0' style=\"border: 1px;\"> " . $obj['giornoDellaSettimana'] . "</th>";
			echo "<td style=\"border: 1px;\"> " . $obj['colazione'] . "</td>";
			echo "<td style=\"border: 1px;\"> " . $obj['spuntinoMattutino'] . "</td>";
			echo "<td style=\"border: 1px;\"> " . $obj['pranzo'] . "</td>";
			echo "<td style=\"border: 1px;\"> " . $obj['spuntinoPomeridiano'] . "</td>";
			echo "<td style=\"border: 1px;\"> " . $obj['cena'] . "</td>";
			echo "</tr>";
		}
		mysqli_close($db);
		?>
	</table>

	<!--Scendiamo di tre righe-->
	<br>				
	<br>
	<br>
	
	<!--Bottone per tornare alla schermata precedente-->
	<form action=homePagePaziente target=”_blank”>
		<input type="submit" id="Bottone" name="Bottone" value="Indietro">
	</form>
	
	
	</body>
	
	
</html>