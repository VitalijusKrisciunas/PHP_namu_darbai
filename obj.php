<?php

class Radar
{
    public $date;
    public $number;
    public $distance;
    public $time;
    public $greitis;

    public function __construct(
        DateTime $date, // data ir laikas
        string $number, // automobilio numeris
        float $distance, // nuvaziuotas atstumas metrais
        float $time) // sugaistas laikas sekundemis
    {
        $this->date = $date;
        $this->number = $number;
        $this->distance = $distance;
        $this->time = $time;

    }

    public function greitis()
    {
        return $greitis = ($this->distance / 1000) / ($this->time / 3600);
    }
}