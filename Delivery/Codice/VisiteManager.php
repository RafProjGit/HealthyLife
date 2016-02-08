<!DOCTYPE html>
<html>

	<head>
	 <title>Control Modifica Menu</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina manager per le visite">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>




<?php
include ("Medico.php");
include ("Paziente.php");

class VisiteManager
{
    /**
     * VisiteManager constructor.
     */
    public function __construct()
    {
        include_once ("Visita.php");
    }


    public function cercaMedicoPaziente($emailPaziente){

        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

            $query = "SELECT emailMedico FROM afferisce WHERE emailPaziente ='".$emailPaziente."'";

        $result = mysqli_query($db,$query);
        if (!$result) echo mysqli_error();
        if(mysqli_num_rows($result) == 1){
            $ris = mysqli_fetch_assoc($result);
            $ret =  $ris['emailMedico'];
            mysqli_close($db);
            return $ret;
        }
        mysqli_close($db);

        return null;
    }
    public function cercaMedico($nome, $cognome, $localita){

        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        //echo $nome, $cognome, $localita;
        if($nome && $cognome && $localita) {
            $query = "SELECT * FROM medico WHERE nome='" . $nome . "' AND cognome='" . $cognome . "' AND citta='" . $localita . "'";
        }else if(!$nome && !$cognome && $localita) {
            $query = "SELECT * FROM medico WHERE citta='" . $localita . "'";
        }else if($nome && $cognome && !$localita) {
            $query = "SELECT * FROM medico WHERE nome='" . $nome . "' AND cognome='" . $cognome . "'";
        }

        $result = mysqli_query($db,$query);
        if (!$result) echo mysqli_error();
        $results = array();
        $i = 0;
        while($riga = mysqli_fetch_assoc($result)){
            $nome = $riga['nome'];
            $cognome = $riga['cognome'];
            $data = $riga['dataNascita'];
            $indirizzo = $riga['indirizzoStudio'];
            $citta = $riga['citta'];
            $email = $riga['email'];
            $pass = $riga['pass'];
            $codAtt = $riga['codiceAttestato'];

            $med = new Medico($nome, $cognome, $data, $indirizzo, $citta, $email, $pass, $codAtt);
            $results[$i]=$med;
            $i++;
        }
        mysqli_close($db);
        return $results;
    }

    public function getPazientiByMedico($idMedico){
        $sqlQuery="SELECT * FROM paziente paz, afferisce a WHERE a.emailPaziente = paz.email AND a.emailMedico = '".addslashes($idMedico)."'";
        echo $sqlQuery;
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

    public function aggiungiVisita(Visita $visita){
        $sqlInsert="INSERT INTO visita (idVisita,idMedico,idPaziente,data,orario,note,status,primavisita) VALUES ('" . uniqid() . "','" .$visita->idMedico . "','" .$visita->idPaziente ."','" . $visita->data ."','". $visita->orario ."','" . $visita->note . "',".($visita->status != "" ? "'".$visita->status."'" : "null").",'".$visita->primavisita."')";
        //echo $sqlInsert;
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        mysqli_query($db,$sqlInsert);
        //echo mysqli_error($db);
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

    public function getVisitaById($visitaId){
        $sqlQuery="SELECT * FROM visita WHERE idVisita='".$visitaId."'";

        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        if (!$result) echo mysqli_error($db);
        $riga = mysqli_fetch_assoc($result);
        $idVisita = $riga['idVisita'];
        $idMedico = $riga['idMedico'];
        $idPaziente = $riga['idPaziente'];
        $data = $riga['data'];
        $orario = $riga['orario'];
        $note = $riga['note'];
        $status = $riga['status'];
        $primavisita = $riga['primavisita'];

        $vis = new Visita($idVisita, $idMedico, $idPaziente, $data, $orario, $note, $status, $primavisita);

        mysqli_close($db);
        return $vis;
    }

    public function getVisite($medicoId, $data=null){
       if($data==null) {
           $sqlQuery = "SELECT * FROM visita WHERE idMedico='" . $medicoId . "' AND  data > ".date("y-m-d");
       }else{
           $sqlQuery = "SELECT * FROM visita WHERE idMedico='" . $medicoId . "' AND data='".$data."'";
       }
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        $visite = array();
        $i=0;
        if (!$result) echo mysqli_error($db);
        while($riga = mysqli_fetch_assoc($result)) {
            $idVisita = $riga['idVisita'];
            $idMedico = $riga['idMedico'];
            $idPaziente = $riga['idPaziente'];
            $data = $riga['data'];
            $orario = $riga['orario'];
            $note = $riga['note'];
            $status = $riga['status'];
            $primavisita = $riga['primavisita'];

            $vis = new Visita($idVisita, $idMedico, $idPaziente, $data, $orario, $note, $status, $primavisita);
            $visite[$i]=$vis;
            $i++;
        }
        mysqli_close($db);
        return $visite;
    }

    public function getPazienteRiferito(Visita $visita){
        $sqlQuery="SELECT * FROM visita v, paziente p WHERE v.idVisita='".$visita->idVisita."' AND p.email = v.idPaziente";

        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        if (!$db)
        {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db,$sqlQuery);
        if (!$result) echo mysqli_error($db);
        $paz=new Paziente();
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

    /**
     * @param Visita $visita
     * controlla se la data di una visita si sovrappone con qualche altra
     * @return true se la visita è valida, false atltrimenti.
     */
    public function validaDataVisita(Visita $visita){
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        $query="SELECT data,orario FROM visita WHERE data='".$visita->data."' AND orario='".$visita->orario."' AND idMedico='".$visita->idMedico."'";
        echo  $query, "<br";
        $resut = mysqli_query($db,$query);
        $num=mysqli_num_rows($resut);
        mysqli_close($db);
        if ($num==0){
            return true;
        }
        return false;
    }

    /**
     * Sostituisce una richiesta di visita con una visita.
     * @param Visita $visita
     * @return bool true se è andato tutto a buon fine, false altrimenti
     */
    public function accettaVisita(Visita $visita){
        $db=mysqli_connect("127.0.0.1","root","","healthylife");
        $sqlRemove = "DELETE FROM visita WHERE idVisita='".$visita->idVisita."'";
        mysqli_query($db,$sqlRemove);
        $num=mysqli_affected_rows($db);
        if($num != 1){
            echo mysqli_error($db);
            mysqli_close($db);
            return false;
        }
        $sqlInsert="INSERT INTO visita (idVisita,idMedico,idPaziente,data,orario,note,status,primavisita) VALUES ('" . uniqid() . "','" .$visita->idMedico . "','" .$visita->idPaziente ."','" . $visita->data ."','". $visita->orario ."','" . $visita->note . "',true,'".$visita->primavisita."')";

        mysqli_query($db,$sqlInsert);
        $num=mysqli_affected_rows($db);
        if($num != 1){
            echo mysqli_error($db);
            mysqli_close($db);
            return false;
        }
        return true;
    }

    public function getRichiesteDiVisita($idMedico){
        $sqlQuery = "SELECT * FROM visita v, paziente p WHERE p.email = v.idPaziente AND v.idMedico='".$idMedico."' AND v.status IS NULL";
        $db = mysqli_connect("127.0.0.1", "root", "", "healthylife");
        if (!$db) {
            die('Could not connect: ' . mysqli_error($db));
        }

        $result = mysqli_query($db, $sqlQuery);
        if (!$result) echo mysqli_error();
        $visite = array();
        $i=0;
        if (!$result) echo mysqli_error($db);
        while($riga = mysqli_fetch_assoc($result)) {
            $idVisita = $riga['idVisita'];
            $idMedico = $riga['idMedico'];
            $idPaziente = $riga['idPaziente'];
            $data = $riga['data'];
            $orario = $riga['orario'];
            $note = $riga['note'];
            $status = $riga['status'];
            $primavisita = $riga['primavisita'];

            $vis = new Visita($idVisita, $idMedico, $idPaziente, $data, $orario, $note, $status, $primavisita);
            $visite[$i]=$vis;
            $i++;
        }
        mysqli_close($db);
        return $visite;
    }
}