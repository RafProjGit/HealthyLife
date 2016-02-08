<!DOCTYPE html>
<html>

	<head>
	 <title>GestioneMedicoManager</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina manager per la gestione del medico">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>


<?php


class GestioneMedicoManager
{


    /**
     * GestioneMedicoManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * Aggiunge a un medico un paziente che ha effettuato una prima visita
     * @param $medico
     * @param $paziente
     * @return bool
     */
    public function aggiungiPazientePerPrimaVisita($medico, $paziente){

        $sqlInsert="INSERT INTO afferisce (emailMedico,emailPaziente) VALUES ('".$medico."','" .$paziente."')";
        $sqlUpdate="UPDATE visita SET primavisita=0 WHERE idMedico='".$medico."' AND idPaziente ='".$paziente."'";
        echo $sqlInsert;
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }


        mysqli_query($db,$sqlInsert);
        $num = mysqli_affected_rows($db);
        echo mysqli_error($db);
        if ($num>0){
            mysqli_query($db,$sqlUpdate);
            $num = mysqli_affected_rows($db);
            if ($num>0){
                mysqli_close($db);
                return true;
            }
            else {
                mysqli_close($db);
                return false;
            }

        }
        else {
            mysqli_close($db);
            return false;
        }
    }


    /**
     * Aggiunge un paziente a un medico, selezionato inserendo la sua email
     * @param $medico
     * @param $paziente
     * @return bool
     */
    public function aggiungiPazientePerEmail($medico, $paziente){

        $sqlInsert="INSERT INTO afferisce (emailMedico, emailPaziente) VALUES ('".$medico."','" .$paziente."')";
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }


        mysqli_query($db,$sqlInsert);
        $num = mysqli_affected_rows($db);
        echo mysqli_error($db);
        if ($num>0){
            mysqli_close($db);
            return true;
        }

        else {
            mysqli_close($db);
            return false;
        }
    }

    /**
     * Cerca nel database tutti i pazienti che hanno effettuato la richiesta di una prima visita presso il medico
     * @param $medicoId
     * @return array
     */
    public function getPrimeVisitePazienti($medicoId){
        $sqlQuery="SELECT * FROM visita v, paziente p WHERE primavisita=1 AND idMedico='".$medicoId."' AND v.idPaziente = p.email ";
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        if (!$result) echo mysqli_error();
        $pazienti = array();
        $i=0;
        while ($riga = mysqli_fetch_assoc($result)){
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
            $pazienti[$i] = $paz;
            $i++;
        }
        mysqli_close($db);
        return $pazienti;
    }

    /**
     * Cerca tutti i pazienti di un medico
     * @param $idMedico
     * @return array
     */
    public function getPazientiByMedico($idMedico){
        $sqlQuery="SELECT * FROM paziente paz, afferisce a WHERE a.emailPaziente = paz.email AND a.emailMedico = '".addslashes($idMedico)."'";
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        $pazienti = array();
        if (!$result) echo mysqli_error($db);
        $i=0;
        while ($riga = mysqli_fetch_assoc($result)){
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
            $pazienti[$i] = $paz;
            $i++;
        }
        mysqli_close($db);
        return $pazienti;
    }

    /**
     * Cerca un paziente nel database tramite la sua email
     * @param $idPaziente
     * @return Paziente
     */
    public function getPazienteById($idPaziente){
        $sqlQuery="SELECT * FROM paziente paz WHERE paz.email = '".addslashes($idPaziente)."'";
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        if (!$result) echo mysqli_error($db);

        while ($riga = mysqli_fetch_assoc($result)){
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
        }
        mysqli_close($db);
        return $paz;
    }
}