<!DOCTYPE html>
<html>

	<head>
			<title>LogIn</title>
			
																	
			<link rel="ICON" href="favicon.ico" type="image/ico">
																
			<meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
			<meta name="description" content="Pagina di LogIn">
			
			
															
			<meta http-equiv="Content-type" content="text/html; CHARSET=utf-8"> 

	</head>
	
	<body>
	<br><br>

		<div><center><font size = 5>Benvenuto su HealthyLife!<br>Effettua il login.</font></center></div>
	<?php
	if(isset($_GET['result'])){
		$res=$_GET['result'];
		switch($res){
			case 0: echo "<h4 style='text-align: center'>Nome utente o password errati!</h4>";break;
			case 1: echo "<h4 style='text-align: center'>Uno o più campi non compilati</h4>";break;
		}
	}else{
		echo "&nbsp;&nbsp;";
	}
	?>
		<br><br><br><br><br><br>
		<form action="ControlLogin.php" method="post">
			<table width="450" height="170" align="center" bgcolor="#000000" border="0"><tbody>
			<tr>
				<td bgcolor="#ffffff"><div>
					<center>
						Email : &nbsp;&nbsp;&nbsp;&nbsp;<input type="e-mail" name="mail"><br><br>
						Password : <input type="password" name="password"><br>
					</center>

					<br>
					<center>
						<input type="submit" name="LogIn" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <input type="button" name="Registrati" onclick="document.location.href='registrazione_paziente.php'" value="Registrati"></button>
					</center>
				</div></td>
			</tr>
			</tbody></table>

		</form>
	<br><br><br><br><br><br><br><br><br><br>

	<div align="right">Se sei un medico e vuoi partecipare al progetto HealthyLife, <a href="registrazione_medico.php">clicca qui</a></div>
</body>
</html>