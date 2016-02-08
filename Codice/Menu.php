<?php

class Menu
{

    var $idMenu;
    var $emailPaziente;
    var $giornoDellaSettimana;
    var $colazione;
    var $spuntinoMattutino;
    var $pranzo;
    var $spuntinoPomeridiano;
    var $cena;

    /**
     * Menu constructor.
     * @param $idMenu
     * @param $emailPaziente
     * @param $giornoDellaSettimana
     * @param $colazione
     * @param $spuntinoMattutino
     * @param $pranzo
     * @param $spuntinoPomeridiano
     * @param $cena
     */
    public function __construct($idMenu, $emailPaziente, $giornoDellaSettimana, $colazione, $spuntinoMattutino, $pranzo, $spuntinoPomeridiano, $cena)
    {
        $this->idMenu = $idMenu;
        $this->emailPaziente = $emailPaziente;
        $this->giornoDellaSettimana = $giornoDellaSettimana;
        $this->colazione = $colazione;
        $this->spuntinoMattutino = $spuntinoMattutino;
        $this->pranzo = $pranzo;
        $this->spuntinoPomeridiano = $spuntinoPomeridiano;
        $this->cena = $cena;
    }

    /**
     * @return mixed
     */
    public function getIdMenu()
    {
        return $this->idMenu;
    }

    /**
     * @param mixed $idMenu
     */
    public function setIdMenu($idMenu)
    {
        $this->idMenu = $idMenu;
    }

    /**
     * @return mixed
     */
    public function getEmailPaziente()
    {
        return $this->emailPaziente;
    }

    /**
     * @param mixed $emailPaziente
     */
    public function setEmailPaziente($emailPaziente)
    {
        $this->emailPaziente = $emailPaziente;
    }

    /**
     * @return mixed
     */
    public function getGiornoDellaSettimana()
    {
        return $this->giornoDellaSettimana;
    }

    /**
     * @param mixed $giornoDellaSettimana
     */
    public function setGiornoDellaSettimana($giornoDellaSettimana)
    {
        $this->giornoDellaSettimana = $giornoDellaSettimana;
    }

    /**
     * @return mixed
     */
    public function getColazione()
    {
        return $this->colazione;
    }

    /**
     * @param mixed $colazione
     */
    public function setColazione($colazione)
    {
        $this->colazione = $colazione;
    }

    /**
     * @return mixed
     */
    public function getSpuntinoMattutino()
    {
        return $this->spuntinoMattutino;
    }

    /**
     * @param mixed $spuntinoMattutino
     */
    public function setSpuntinoMattutino($spuntinoMattutino)
    {
        $this->spuntinoMattutino = $spuntinoMattutino;
    }

    /**
     * @return mixed
     */
    public function getPranzo()
    {
        return $this->pranzo;
    }

    /**
     * @param mixed $pranzo
     */
    public function setPranzo($pranzo)
    {
        $this->pranzo = $pranzo;
    }

    /**
     * @return mixed
     */
    public function getSpuntinoPomeridiano()
    {
        return $this->spuntinoPomeridiano;
    }

    /**
     * @param mixed $spuntinoPomeridiano
     */
    public function setSpuntinoPomeridiano($spuntinoPomeridiano)
    {
        $this->spuntinoPomeridiano = $spuntinoPomeridiano;
    }

    /**
     * @return mixed
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * @param mixed $cena
     */
    public function setCena($cena)
    {
        $this->cena = $cena;
    }


}