<?php

class AccountManager
{


    /**
     * AccountManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * Permette di aggiungere un paziente al database
     * @param Paziente $paziente
     * @return bool
     *
     */
    public function aggiungiPaziente(Paziente $paziente){

        $name = $paziente->nome;
        $surname = $paziente->cognome;
        $date = $paziente->dataNascita;
        $address = $paziente->indirizzo;
        $citta = $paziente->citta;
        $email = $paziente->email;
        $password = $paziente->pass;
        $codicefiscale = $paziente->codiceFiscale;
        $tipologia = $paziente->tipologia;



        $sqlInsert="INSERT INTO paziente (nome,cognome,dataNascita,indirizzo,citta,email,pass,codiceFiscale,tipologia) VALUES ('" . $name . "','" .$surname . "','" .$date ."','" . $address ."','".$citta."','" . $email . "','".$password."','".$codicefiscale . "','".$tipologia."')";

        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        mysqli_query($db,$sqlInsert);
		echo $sqlInsert;
        $num = mysqli_affected_rows($db);
        mysqli_close($db);
        if ($num>0)
            return true;
        else
            return false;
    }

    public function aggiungiMedico(Medico $medico){

        $name = $medico->nome;
        $surname = $medico->cognome;
        $date = $medico->dataNascita;
        $address = $medico->indirizzo;
        $citta = $medico->citta;
        $email = $medico->email;
        $password = $medico->pass;
        $codiceAttestato = $medico->codiceAttestato;

        $sqlInsert="INSERT INTO medico(citta,codiceAttestato,cognome,dataNascita,email,indirizzoStudio,nome,pass) VALUES ('" . $citta . "','" .$codiceAttestato . "','" .$surname ."','" . $date ."','". $email ."','" . $address . "','".$name."','".$password . "')";
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        mysqli_query($db,$sqlInsert);
        $num = mysqli_affected_rows($db);

        mysqli_close($db);
        if ($num>0)
            return true;
        else
            return false;
    }

    /**
     * Cerca un paziente nel database in base a email e password
     * @param $mail
     * @param $password
     * @return null|Paziente
     *
     */
    public function getPaziente($mail, $password){
        $sqlQuery="SELECT * FROM `paziente` WHERE (email='" . $mail . "' AND pass='". $password ."')";
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        if (!$result) echo mysqli_error();
        $row = mysqli_num_rows($result);
        if ($row=="1") {
            $riga = mysqli_fetch_assoc($result);
            $nome = $riga['nome'];
            $cognome = $riga['cognome'];
            $data = $riga['dataNascita'];
            $indirizzo = $riga['indirizzo'];
            $citta = $riga['citta'];
            $email = $riga['email'];
            $pass = $riga['pass'];
            $codFis = $riga['codiceFiscale'];
            $tipologia = $riga['tipologia'];

            $paz = new Paziente($nome, $cognome, $data, $indirizzo, $citta, $email, $pass, $codFis, $tipologia);

            mysqli_close($db);
            return $paz;
        }
        else {
            mysqli_close($db);
            return null;
        }
    }

    /**
     * Cerca un medico nel database in base a email e password
     * @param $mail
     * @param $password
     * @return Medico|null
     */
    public function getMedico($mail, $password){
        $sqlQuery="SELECT * FROM `medico` WHERE (email='" . $mail . "' AND pass='". $password ."')";
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        if (!$result) echo mysqli_error();
        $row = mysqli_num_rows($result);
        if ($row=="1") {
            $riga = mysqli_fetch_assoc($result);
            $nome = $riga['nome'];
            $cognome = $riga['cognome'];
            $data = $riga['dataNascita'];
            $indirizzo = $riga['indirizzoStudio'];
            $citta = $riga['citta'];
            $email = $riga['email'];
            $pass = $riga['pass'];
            $codAtt = $riga['codiceAttestato'];

            $med = new Medico($nome, $cognome, $data, $indirizzo, $citta, $email, $pass, $codAtt);

            mysqli_close($db);
            return $med;
        }
        else {
            mysqli_close($db);
            return null;
        }
    }


    /**
     * Controlla se un indirizzo email è assente nel database
     * @param $mail
     * @return bool
     */
    public function checkEmail($mail){
        $sqlQuery="SELECT * FROM `paziente` WHERE (email='" . $mail ."')";
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        if (!$result) echo mysqli_error();
        $row = mysqli_num_rows($result);
        if($row == 1){
            mysqli_close($db);
            return false;
        }

        $sqlQuery="SELECT * FROM `medico` WHERE (email='" . $mail ."')";

        $result = mysqli_query($db,$sqlQuery);
        if (!$result) echo mysqli_error();
        $row = mysqli_num_rows($result);
        if($row == 1){
            mysqli_close($db);
            return false;
        }

        mysqli_close($db);
        return true;

    }

    }