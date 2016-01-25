<html>
<head>

</head>
<body>
<?php

$mail = $_GET['mail'];
$password=$_GET['password'];
$sqlQuery="SELECT COUNT(*) as n FROM `paziente` WHERE (email='" . $mail . "' AND pass='". $password ."')";
$db=mysqli_connect("127.0.0.1","root","","healthylife");
if (!$db)
{
    die('Could not connect: ' . mysqli_error($db));
}

$result = mysqli_query($db,$sqlQuery);
if (!$result) echo mysqli_error();
$row = mysqli_num_rows($result);
if ($row=="1")
    echo "Login";
else
    echo "Error";
mysqli_close($db);
?>
</body>
</html>
