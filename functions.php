<?php

// Atskiru dalyku vidurkio skaiciavimas
function vidurkis($arr) {
    $vidurkis = null;
    foreach ($arr as $elem) {
        $vidurkis += $elem;
    }
    return round($vidurkis / count($arr));
   
}

// Bendro vidurkio skaiciavimas
function bendrasv($arr) {
    $vidurkis = null;
    $suma = 0;
    $dlk = count($arr);

    foreach ($arr as $value) {
        $sk = count($value);
        $vidurkis = vidurkis($value);
        $suma += $vidurkis;   
    }
    return round($suma / $dlk);
}

// Elementu is masyvo isvedimas
function outelem($arr) {
    $rezult = '';
    foreach ($arr as $elem) {
        $rezult .= ' '.$elem.' ';
    }
    return $rezult;
}