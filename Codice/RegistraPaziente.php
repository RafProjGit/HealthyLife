<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>x
<head>
    <h1>insert</h1>	<meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">

</head>
<body>
<?php
$name = $_GET['name'];
$surname=$_GET['surname'];
$address=$_GET['address'];
$date= $_GET['annonascita'] ."-".$_GET['mesenascita'] . "-" . $_GET['giornonascita'];
$email = $_GET['email'];
$codicefiscale=$_GET['codicefiscale'];
$password=$_GET['password'];
$rpassword=$_GET['repeatpassword'];
$citta=$_GET['citta'];
$sqlInsert="INSERT INTO Paziente (nome,cognome,dataNascita,indirizzo,citta,email,pass,codiceFiscale,tipologia) VALUES ('" . $name . "','" .$surname . "','" .$date ."','" . $address ."','".$citta."','" . $email . "','".$password."','".$codicefiscale . "','')";
echo $sqlInsert;
$db=mysqli_connect("127.0.0.1","root","","healthylife");
if (!$db)
{
    die('Could not connect: ' . mysqli_error($db));
}

mysqli_query($db,$sqlInsert);
$num = mysqli_affected_rows($db);
if ($num>0)
    echo "yeah";
else
    echo "oh no";
mysqli_close($db);
?>
</body>
</html>