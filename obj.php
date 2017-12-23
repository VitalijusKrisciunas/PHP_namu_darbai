<?php

class Mokinys
{
    public $vardas;
    public $pavarde;
    public $gimimoData;
    public $skirtumas;
    public $gd;

    function __construct ($vardas, $pavarde, $gimimoData) {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->gimimoData = $gimimoData;

    }

    function pilnasVardas() {
        return $this->vardas. ' ' .$this->pavarde;
    }

    function mokinioMetai() {
        $gd = new DateTime($this->gimimoData);
        $skirtumas = date_diff($gd, date_create());
        return $skirtumas->y;
    }
}



    