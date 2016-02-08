<!DOCTYPE html>
<html>

	<head>
	 <title>Utente</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Pagina php per caricare il paziente">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>



<?php

class Utente
{
    var $nome;
    var $cognome;
    var $dataNascita;
    var $indirizzo;
    var $citta;
    var $email;
    var $pass;

    /**
     * Medico constructor.
     * @param $nome
     * @param $cognome
     * @param $dataNascita
     * @param $indirizzoStudio
     * @param $citta
     * @param $email
     * @param $pass
     */
    public function __construct($nome, $cognome, $dataNascita, $indirizzoStudio, $citta, $email, $pass)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->dataNascita = $dataNascita;
        $this->indirizzo = $indirizzoStudio;
        $this->citta = $citta;
        $this->email = $email;
        $this->pass = $pass;
    }
    
    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * @param mixed $cognome
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    /**
     * @return mixed
     */
    public function getDataNascita()
    {
        return $this->dataNascita;
    }

    /**
     * @param mixed $dataNascita
     */
    public function setDataNascita($dataNascita)
    {
        $this->dataNascita = $dataNascita;
    }

    /**
     * @return mixed
     */
    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    /**
     * @param mixed $indirizzo
     */
    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }

    /**
     * @return mixed
     */
    public function getCitta()
    {
        return $this->citta;
    }

    /**
     * @param mixed $citta
     */
    public function setCitta($citta)
    {
        $this->citta = $citta;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }


}