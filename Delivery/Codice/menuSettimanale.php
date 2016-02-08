<!DOCTYPE html>
<html>

	<head>
		<?php
		include_once ("MenuManager.php");
		include_once ("Menu.php");
		session_start();
		if(isset($_SESSION['CurrentUser']) && $_SESSION['CurrentUserType'] == "paziente" ){
			$emailPaziente = $_SESSION['CurrentUser'];
		}else if(isset($_GET['id'])){
			$emailPaziente =$_GET['id'];
		}
		else{
			die("Per accedere a questa pagina occorre essere loggati");
		}
		?>
			<title> Menù Settimanale </title>
			
			<link rel="ICON" href="favicon.ico" type="image/ico">
																
			<meta name="author" content="Cataletti,D'Auria, Nunziata,Rotolo">
			<meta name="description" content="In questa pagina è contenuto il menù settimanale del paziente">
			
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
	<?php
	$menuMgr = new MenuManager();
	$menu = $menuMgr->getMenuByPaziente($emailPaziente);
	if(count($menu) == 0){
		echo "<h3  class='result'>Nessun menu trovato. Riprovare tra qualche ora o contattare il medico";
	}else {
	?>
	<p style="font-size:120%;
			  text-align:left;">
	Menù settimanale
	</p>
	
	<!--Tabella del menù-->
	<table width="100%">
		<tr bgcolor="#C0C0C0">
		<th>Giorno</th>
		<th>Colazione</th>
		<th>Spuntino Mattutino</th>
		<th>Pranzo</th>
		<th>Spuntino Pomeridiano</th>
		<th>Cena</th>

		</tr>

		<?php

			foreach ($menu as $m) {
				echo "<tr>";
				echo "<th bgcolor='#C0C0C0' style=\"border: 1px;\"> " . $m->giornoDellaSettimana . "</th>";
				echo "<td style=\"border: 1px;\"> " . $m->colazione . "</td>";
				echo "<td style=\"border: 1px;\"> " . $m->spuntinoMattutino . "</td>";
				echo "<td style=\"border: 1px;\"> " . $m->pranzo . "</td>";
				echo "<td style=\"border: 1px;\"> " . $m->spuntinoPomeridiano . "</td>";
				echo "<td style=\"border: 1px;\"> " . $m->cena . "</td>";
				echo "</tr>";
			}
		}
		?>
	</table>

	<!--Scendiamo di tre righe-->
	<br>				
	<br>
	<br>
	
	<!--Bottone per tornare alla schermata precedente-->
		<input type="button" id="Bottone" name="Bottone" value="Indietro" onclick="window.history.back()">
	
	
	</body>
	
	
</html>