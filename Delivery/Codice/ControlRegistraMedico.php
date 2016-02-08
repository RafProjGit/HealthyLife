<!DOCTYPE html>
<html>
<head>
 <title>Control Registra Medico</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">

    <meta name="author" content="Cataletti, Rotolo, D'Auria, Nunziata">
    <meta name="description" content="Pagina php per il controllo della corretta registrazione del medico">


    <!--Legge tutti i caratteri speciali-->
    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>
<body>
<?php


    include_once ("Medico.php");
    include_once ("AccountManager.php");
$accountManager = new AccountManager();

    $name = $_POST['name'];
    $surname=$_POST['surname'];
    $address=$_POST['address'];
    $email = $_POST['email'];
    $codAttestato=$_POST['codiceattestato'];
    $giornonascita=$_POST['giornonascita'];
    $mesenascita=$_POST['mesenascita'];
    $annonascita=$_POST['annonascita'];
    $password=$_POST['password'];
    $rpassword=$_POST['rpassword'];
    $residenza=$_POST['residenza'];

    //controllo se tutti i campi sono settati
    if($name == "" || $surname=="" || $address=="" || $codAttestato==""||$giornonascita==""||$mesenascita==""||$annonascita==""||$password==""||$email==""||$password==""||$rpassword==""||$residenza==""){
        header('location: registrazione_medico.php?result=2');
        exit(0);
    }

    //controllo che le due password coincidano
    if($password != $rpassword){
        header('location: registrazione_medico.php?result=3');
        exit(0);
    }

    //controllo che la data di nascita sia valida
    $maxdate = date("Y")-3;
if($annonascita>1900 && $annonascita<$maxdate){
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
    header('location: registrazione_medico.php?result=4');
    exit(0);
}

//controllo che il codice fiscale sia di 16 cifre
if(strlen($codAttestato) != 16){

    header('location: registrazione_medico.php?result=5');
    exit(0);
}

//controllo che l'email non sia stata gia usata
$exist = $accountManager->checkEmail($email);
if(!$exist){
    header('location: registrazione_paziente.php?result=6');
    exit(0);
}

$codicefiscale = strtoupper($codicefiscale);


    $nascita=$annonascita . "-" . $mesenascita . "-" . $giornonascita;
    $med = new Medico($name, $surname, $nascita, $address, $residenza, $email, $password, $codAttestato);


    $res = $accountManager->aggiungiMedico($med);
    if($res){
        header('location: registrazione_medico.php?result=1');
    }else{
        header('location: registrazione_medico.php?result=0');
    }
?>
</body>
</html>
?>