<!DOCTYPE html>
<html>
<head>
 <title>Control Login</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina PHP per il controllo del login">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
</head>
<body>
<?php
include("AccountManager.php");
include ("Medico.php");
include ("Paziente.php");
$mail = $_POST['mail'];
$password=$_POST['password'];
if($mail=="" || $password==""){
    header("location: login.php?result=1");
    exit(0);
}
$accountManager = new AccountManager();
$medico = $accountManager->getMedico($mail, $password);
$paziente = $accountManager->getPaziente($mail, $password);

if($paziente){
    session_start();
    $_SESSION['CurrentUser'] = $paziente->email;
    $_SESSION['CurrentUserType']="paziente";
    header("location: UserHome.php");
}else if($medico){
    session_start();
    $_SESSION['CurrentUser'] = $medico->email;
    $_SESSION['CurrentUserType']="medico";
    header("location: MedicHome.php");
}else{
    header("location: login.php?result=0");
    exit(0);
}
?>
</body>
</html>
