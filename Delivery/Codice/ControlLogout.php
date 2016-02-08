<!DOCTYPE html>
<html>

	<head>
	 <title>Control Logout</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina di controllo per il Logout">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>


<?php

session_start();
session_destroy();

echo "<script >newUrl= 'login.php';
window.location.replace(newUrl);
</script>
";