<!DOCTYPE html>
<html>

	<head>
	 <title> Medico </title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina che preleva i dati del medico">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>




<?php

include_once ("Utente.php");

class Medico extends Utente
{

    var $codiceAttestato;

    /**
     * Medico constructor.
     * @param $codiceFiscale
     */
    public function __construct($nome=null, $cognome=null, $dataNascita=null, $indirizzoStudio=null, $citta=null, $email=null, $pass=null, $codiceFiscale=null)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->dataNascita = $dataNascita;
        $this->indirizzo = $indirizzoStudio;
        $this->citta = $citta;
        $this->email = $email;
        $this->pass = $pass;
        $this->codiceAttestato = $codiceFiscale;
    }


    /**
     * @return mixed
     */
    public function getCodiceAttestato()
    {
        return $this->codiceAttestato;
    }

    /**
     * @param mixed $codiceAttestato
     */
    public function setCodiceAttestato($codiceAttestato)
    {
        $this->codiceAttestato = $codiceAttestato;
    }



}