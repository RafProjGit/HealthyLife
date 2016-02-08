<!DOCTYPE html>
<html>

	<head>
	 <title>Paziente</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina PHP per il controllo del paziente">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>



<?php

include_once ("Utente.php");

class Paziente extends Utente
{

    var $codiceFiscale;
    var $tipologia;

    /**
     * Medico constructor.
     * @param $codiceFiscale
     */
    public function __construct($nome=null, $cognome=null, $dataNascita=null, $indirizzoStudio=null, $citta=null, $email=null, $pass=null, $codiceFiscale=null, $tipologia=null)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->dataNascita = $dataNascita;
        $this->indirizzo = $indirizzoStudio;
        $this->citta = $citta;
        $this->email = $email;
        $this->pass = $pass;
        $this->codiceFiscale = $codiceFiscale;
        $this->tipologia=$tipologia;
    }


    /**
     * @return mixed
     */
    public function getCodiceFiscale()
    {
        return $this->codiceFiscale;
    }

    /**
     * @param mixed $codiceFiscale
     */
    public function setCodiceFiscale($codiceFiscale)
    {
        $this->codiceFiscale = $codiceFiscale;
    }

}