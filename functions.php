<?php

function vidurkis($arr) {
    $vidurkis = array_sum($arr) / count($arr);
    return $vidurkis;
}