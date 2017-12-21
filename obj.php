<?php

class Trimestras
{
    public $trim;

     function __construct($trim){
        $this->trim = $trim;
    }
}

class Mokinys extends Trimestras
{
    public $vardas;
    public $pavarde;

    function __construct ($vardas, $pavarde, $trim) {
        parent::__construct ($trim);
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
    }

    function pilnasVardas() {
        echo $this->vardas. ' ' .$this->pavarde;
    }
}



    