<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
     <title>Control Registra Paziente</title>

    <!--Questo tag mette la favicon alla propria pagina web -->
    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata, Rotolo">
    <meta name="description" content="Pagina per il controllo della corretta registrazione del paziente">


    <!--Legge tutti i caratteri speciali-->
    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
</head>
<body>
<?php
include_once ("Paziente.php");
include_once ("AccountManager.php");
$accountManager = new AccountManager();

$name = $_POST['name'];
$surname=$_POST['surname'];
$address=$_POST['address'];
$giornonascita=$_POST['giornonascita'];
$mesenascita=$_POST['mesenascita'];
$annonascita=$_POST['annonascita'];
$email = $_POST['email'];
$codicefiscale=$_POST['codicefiscale'];
$password=$_POST['password'];
$rpassword=$_POST['repeatpassword'];
$citta=$_POST['citta'];
//controllo se tutti i campi sono settati
if($name == "" || $surname=="" || $address=="" || $codicefiscale==""||$giornonascita==""||$mesenascita==""||$annonascita==""||$password==""||$email==""||$password==""||$rpassword==""||$citta==""){
    header('location: registrazione_paziente.php?result=2');
    exit(0);
}

//controllo che le due password coincidano
if($password != $rpassword){
    header('location: registrazione_paziente.php?result=3');
    exit(0);
}

$curYear = date("Y");

//controllo che la data di nascita sia valida
if($annonascita>1900 && $annonascita<($curYear-3)){
    $annoOk= true;
}else{
    $annoOk = false;
}
if ($annoOk && (($annonascita%4==0 && $annonascita%100!=0) || $annonascita%400==0)){
    $annoBisestile = true;
} else {
    $annoBisestile = false;
}

if($mesenascita > 0 && $mesenascita<13){
    $meseOK = true;
    if ($mesenascita == 4 || $mesenascita == 6 || $mesenascita == 9 || $mesenascita == 11) {
        if($giornonascita>0 && $giornonascita<31){
            $giornoOK=true;
        }else{
            $giornoOK=false;
        }

    }else if($mesenascita==2){
        if($annoBisestile){
            if($giornonascita>0 && $giornonascita<30){
                $giornoOK=true;
            }else{
                $giornoOK=false;
            }
        }else{
            if($giornonascita>0 && $giornonascita<29){
                $giornoOK=true;
            }else {
                $giornoOK=false;
            }
        }
    }else{
        if($giornonascita>0 && $giornonascita<32){
            $giornoOK = true;
        }else{
            $giornoOK=false;
        }
    }
} else{
    $meseOK=false;
}

if($meseOK && $giornoOK && $annoOk){

}else{
    header('location: registrazione_paziente.php?result=4');
    exit(0);
}

//controllo che il codice fiscale sia di 16 cifre
if(strlen($codicefiscale) != 16) {

    header('location: registrazione_paziente.php?result=5');
    exit(0);
}

$codicefiscale = strtoupper($codicefiscale);
//controllo il tipo di paziente
if($curYear - $annonascita > 13){
    $tipologia = "standard";
}else{
    $tipologia = "junior";
}

//controllo che l'email non sia stata gia usata
$exist = $accountManager->checkEmail($email);
if(!$exist){
        header('location: registrazione_paziente.php?result=6');
        exit(0);
}
$nascita=$annonascita . "-" . $mesenascita . "-" . $giornonascita;

$paz = new Paziente($name, $surname, $nascita, $address, $citta, $email, $password, $codicefiscale, $tipologia);


$res = $accountManager->aggiungiPaziente($paz);
echo $res;
if($res){
    header('location: registrazione_paziente.php?result=1');
}else{
    header('location: registrazione_paziente.php?result=0');
}
?>
</body>
</html>