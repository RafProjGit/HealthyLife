<!DOCTYPE html>
<html>

	<head>
	 <title>Modifica Menù Settimanale</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina di modifica del menù settimanale">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>


<html>

	<head>

		<?php
		session_start();
		include_once "MenuManager.php";
		include_once "Menu.php";
		if(isset($_SESSION['CurrentUser'])){
			$emailMedico =  $_SESSION['CurrentUser'];
		}else{
			die("Per accedere a questa pagina occorre essere loggati");
		}
		if(isset($_SESSION['CurrentUserType']) && $_SESSION['CurrentUserType'] == "medico"){
		}else{
			die("Per accedere a questa pagina occorre essere loggati come medico");
		}
		if(isset($_GET['id'])) {
			$paziente = $_GET['id'];
		}else{
			die("Nessun paziente selezionato");
		}
		?>
		<script src="jquery-1.12.0.min.js"></script>

		<script >
			$(function(){
				//acknowledgement message
				var message_status = $("#status");

				$("td[contenteditable=true]").blur(function(e){
					var field_userid = $(this).attr("id") ;

					var value = $(this).text()
					if(value.length==0){
						alert("Il campo non puo essere vuoto");
						window.location.reload();
						return false;
					}
					if(value.length>150){
						alert("Limite di caratteri superato. Inserisci al massimo 150 caratteri ")
						return false;
					}
					$.post('ControlModificaMenu.php' , field_userid + "=" + value, function(data){
						if(data != '')
						{
							alert(data);
							message_status.show();
							message_status.text(data);
							//hide the message
							setTimeout(function(){message_status.hide()},3000);
						}
					});
				});
			});
		</script>

			<title> Modifica menù settimanale </title>
			
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
	Modifica del menù settimanale
	</p>
	
	<!--Tabella del menù-->
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
		$mgr = new MenuManager();
		$menu = $mgr->getMenuByPaziente($paziente);?>
		<tbody>
  			<?php
  			foreach($menu as $m) {
	  ?>
	  <tr class="table-row">
		  <td><?php echo $m->giornoDellaSettimana; ?></td>
		  <td id="<?php echo "colazione:", $m->idMenu ?>" contenteditable="true"><?php echo $m->colazione ?></td>
		  <td id="<?php echo "spuntinoMattutino:", $m->idMenu ?>" contenteditable="true"><?php echo $m->spuntinoMattutino ?></td>
		  <td id="<?php echo "pranzo:", $m->idMenu ?>" contenteditable="true"><?php echo $m->pranzo ?></td>
		  <td id="<?php echo "spuntinoPomeridiano:", $m->idMenu ?>" contenteditable="true"><?php echo $m->spuntinoPomeridiano ?></td>
		  <td id="<?php echo "cena:", $m->idMenu ?>" contenteditable="true"><?php echo $m->cena ?></td>
		  </tr>
	  <?php
  }
?>
	</table>
	<!--Scendiamo di tre righe-->
	<br>				
	<br>
	<br>
	
	<!--Bottone per tornare alla schermata precedente-->
		<input type="button" id="Bottone" name="Bottone" value="Indietro"
		onclick="
		newUrl= 'PaginaPaziente.php?id='+'<?php echo $paziente?>';
		window.location.replace(newUrl);
		">

	
	
	</body>
	
	
</html>