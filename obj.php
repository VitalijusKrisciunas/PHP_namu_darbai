<?php

class Trimestras
{
    public $trimestras;

     function __construct($trimestras){
        $this->trimestras = $trimestras;
    }
}

class Mokinys extends Trimestras
{
    public $vardas;
    public $pavarde;

    function __construct ($vardas, $pavarde, $trimestras) {
        parent::__construct ($trimestras);
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
    }

    function pilnasVardas() {
        echo $this->vardas. ' ' .$this->pavarde;
    }
}



    