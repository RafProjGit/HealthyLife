<html>
<head></head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: arrow
 * Date: 20/01/2016
 * Time: 01:23
 */
    $name = $_GET['name'];
    $surname=$_GET['surname'];
    $address=$_GET['address'];
    $codAttestato=$_GET['codiceattestato'];
    $giornonascita=$_GET['giornonascita'];
    $mesenascita=$_GET['mesenascita'];
    $annonascita=$_GET['annonascita'];
    $nascita=$annonascita . "-" . $mesenascita . "-" . $giornonascita;
    $password=$_GET['password'];
    $rpassword=$_GET['rpassword'];
    $residenza=$_GET['residenza'];
    $sqlInsert="INSERT INTO Medico (citta,codiceAttestato,cognome,dataNascita,email,indirizzoStudio,nome,pass) VALUES ('" . $residenza . "','" .$codAttestato . "','" .$surname ."','" . $nascita ."','". $email ."','" . $address . "','".$name."','".$password . "')";
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
?>