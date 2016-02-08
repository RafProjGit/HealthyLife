<!DOCTYPE html>
<html>

	<head>
			<title>Registrazione medico</title>
			
																
			<link rel="ICON" href="favicon.ico" type="image/ico">
																
			<meta name="author" content="Cataletti, Rotolo, D'Auria, Nunziata">
			<meta name="description" content="Pagina per la registrazione del medico">
			
			<meta http-equiv="Content-type" content="text/html; CHARSET=utf-8"> 
			
			
	</head>
		
	<body>
		<br><br>
		
			<div><center><font size = 5>Registrati alla piattaforma!<br>Inserisci qui i tuoi dati.</font></center></div>
			
			<br><br><br>
		<form action="ControlRegistraMedico.php" method="post">
		<table width="900" height="440" align="center" bgcolor="#000000" border="0">
			<tbody>
				<tr>
					<td bgcolor="#ffffff">
						
						<table align="center" bgcolor="#000000" border="0" rules="all">
							<tbody>
								<tr height="60">
									<td bgcolor="#ffffff">
										&nbsp Nome:&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp <input id="Nome" name="name" type="text" pattern="(?=.*[a-zA-Z0-9]+[a-zA-Z0-9]+).{1,15}" required title="Richiesti da 1 a 15 caratteri">
										>&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp Indirizzo dello studio:&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp <input id="Indirizzo" name="address" type="text" pattern=".{1,50}" required title="Richiesti da 1 a 50 caratteri">&nbsp
									</td>
								</tr>
								<tr height="60">
									<td bgcolor="#ffffff">
										&nbsp Cognome:&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp <input id="Cognome" name="surname" type="text" pattern=".{1,15}" required title="Richiesti da 1 a 15 caratteri"">&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp Email:&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp <input id="Email" name="email" type="email" pattern=".{1,30}" required title="Richiesti da 1 a 30 caratteri, nel formato x@y.z">&nbsp
									</td>
								</tr>
								<tr height="60">
									<td bgcolor="#ffffff">
										&nbsp Codice attestato medico:&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp <input  id="Codice Attestato" name="codiceattestato" type="text" pattern="[a-zA-Z0-9]{16}" required title="Richiesti esattamente 16 caratteri alfanumerici">&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp Password:&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp <input id="Password" name="password" type="password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30})" required title="La password deve essere tra i 8 e i 30 caratteri e deve contenere almeno un carattere maiuscolo, uno minuscolo e un numero">&nbsp
									</td>
								</tr>
								<tr height="60">
									<td bgcolor="#ffffff">
										&nbsp Data di nascita (gg\mm\aaaa) :&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp <input id="Giorno" name="giornonascita" type="text" maxlength="2" size="1" pattern="((?=.*[0-9]).{2,2})" required title="Richiesti esattamente 2 numeri">&nbsp \
										<input id="Mese" name="mesenascita" type="text" maxlength="2" size="1" pattern="((?=.*[0-9]).{2,2})" required title="Richiesti esattamente 2 numeri">&nbsp \
										<input id="Anno" name="annonascita" type="text" maxlength="4" size="4"pattern="((?=.*[0-9]).{4,4})" required title="Richiesti esattamente 4 numeri">&nbsp
									</td>
									
									
									<td bgcolor="#ffffff">
										&nbsp Ripeti password:&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp <input name="rpassword" type="password">&nbsp
									</td>
								</tr>
								<tr height="60">
									<td bgcolor="#ffffff">
										&nbsp Città dello studio:&nbsp
									</td>
									
									<td bgcolor="#ffffff">
										&nbsp <input id="Citta" name="residenza" type="text" pattern="(?=.*[a-zA-Z0-9]+[a-zA-Z0-9 ]+).{1,30}" required title="Richiesti da 1 a 30 caratteri">&nbsp
									</td>
									
									<td bgcolor="#ffffff">
									</td>
									
									<td bgcolor="#ffffff">
									</td>
								</tr>
							</tbody>
						</table>
						<br><br>
						<div align="right"><input name="completaregistrazione" type="submit" value="Completa registrazione">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
					</td>
				</tr>
			</tbody> 
		</table>
		</form>
		<script type="text/javascript" src="inputValidation.js" defer></script>

		<div id="result" style="display: block">
			<ul id="lista">
			</ul>
		<?php
		if(isset($_GET['result'])){
			$res = $_GET['result'];
			$maxdate = date("Y")-3;
			switch($res){
				case 0: echo "<h3 class='result'>Operazione fallita, errore nel database</h3>"; break;
				case 1: echo "<h3 class='result'>Operazione completata con successo</h3><br><a href='login.php'>Effettua il login</a>"; break;
				case 2: echo "<h3 class='result'>Operazione fallita, non tutti i campi sono settati</h3>"; break;
				case 3: echo "<h3 class='result'>Operazione fallita, password e ripeti password sono diversi</h3>"; break;
				case 4: echo "<h3 class='result'>Operazione fallita, la data inserita non è corretta. Ricorda che il campo Anno deve essere compreso tra 1900 e $maxdate</h3>"; break;
				case 5: echo "<h3 class='result'>Operazione fallita, il codice fiscale non è corretto</h3>"; break;
				case 6: echo "<h3 class='result'>Operazione fallita, email già usata</h3>"; break;
				default: "<h3  class='result'>Operazione fallita</h3>"; break;
			}
		}
		?>
		</div>
	</body>	
</html>