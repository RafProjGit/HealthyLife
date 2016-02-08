<!DOCTYPE html>
<html>

	<head>
	 <title>Visita</title>

    <link rel="ICON" href="favicon.ico" type="image/ico">
    
    <meta name="author" content="Cataletti, D'Auria, Nunziata,Rotolo">
    <meta name="description" content="Classe Visita">


    <meta http-equiv="Content-type" content="text/html; CHARSET=utf-8">
	</head>

</html>



<?php

class Visita
{
    var $idVisita;
    var $idMedico;
    var $idPaziente;
    var $data;
    var $orario;
    var $note;
    var $status;
    var $primavisita;

    /**
     * Visita constructor.
     * @param $idVisita
     * @param $idMedico
     * @param $idPaziente
     * @param $data
     * @param $orario
     * @param $note
     * @param $status
     * @param $primavisita
     */
    public function __construct($idVisita = null, $idMedico = null, $idPaziente = null, $data = null, $orario = null, $note = null, $status=null, $primavisita=null)
    {
        $this->idVisita = $idVisita;
        $this->idMedico = $idMedico;
        $this->idPaziente = $idPaziente;
        $this->data = $data;
        $this->orario = $orario;
        $this->note = $note;
        $this->status = $status;
        $this->primavisita = $primavisita;
    }


    /**
     * @return mixed
     */
    public function getIdVisita()
    {
        return $this->idVisita;
    }

    /**
     * @param mixed $idVisita
     */
    public function setIdVisita($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    /**
     * @return mixed
     */
    public function getIdMedico()
    {
        return $this->idMedico;
    }

    /**
     * @param mixed $idMedico
     */
    public function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;
    }

    /**
     * @return mixed
     */
    public function getIdPaziente()
    {
        return $this->idPaziente;
    }

    /**
     * @param mixed $idPaziente
     */
    public function setIdPaziente($idPaziente)
    {
        $this->idPaziente = $idPaziente;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getOrario()
    {
        return $this->orario;
    }

    /**
     * @param mixed $orario
     */
    public function setOrario($orario)
    {
        $this->orario = $orario;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function isPrimavisita()
    {
        return $this->primavisita;
    }

    /**
     * @param mixed $primavisita
     */
    public function setPrimavisita($primavisita)
    {
        $this->primavisita = $primavisita;
    }



}