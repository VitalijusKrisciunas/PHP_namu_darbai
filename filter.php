<?php

    require_once 'index.html';
    require_once 'obj.php';

// Paleidziama sesija.
session_start();
    
$cars = $_SESSION['cars'];

// Automobiliu isvedimas i lentele.
echo 'Automobiliu baze:';
echo '<table style="border: 1px solid black">';
    echo '<tr>
        <th>'.'Data ir laikas'.'</th>
        <th style="border: 1px solid black">'.'Valst. num.'.'</th>
        <th>'.'Atstumas, m'.'</th>
        <th style="border: 1px solid black">'.'Laikas, s'.'</th>
        <th>'.'Greitis, km/h'.'</th>
    </tr>';
    foreach ($cars as $value) {
        echo '<tr style="text-align:center;border: 1px solid black">
            <td>'.$value->date.'</td>
            <td style="border: 1px solid black">'.$value->number.'</td>
            <td>'.$value->distance.'</td>
            <td style="border: 1px solid black">'.$value->time.'</td>
            <td>'.round($value->greitis(), 1).'</td>           
            </tr>';
    }
echo '</table>';

    // Filtro salyga.
    if ($_POST['filtras'] == ''){
        echo '<h4 style="color:red">Iveskite filtro salyga !</h4>';
        return;
    } else {
        $filtras = '/'.strtoupper($_POST['filtras']).'/';
    }

    // Filtravimo isvedimas i lentele.
    echo 'Filtro salyga: '.$filtras;
    echo '<table style="border: 1px solid black">';
        echo '<tr>
            <th>'.'Data ir laikas'.'</th>
            <th style="border: 1px solid black">'.'Valst. num.'.'</th>
            <th>'.'Atstumas, m'.'</th>
            <th style="border: 1px solid black">'.'Laikas, s'.'</th>
            <th>'.'Greitis, km/h'.'</th>
        </tr>';
        foreach ($cars as $value) {
            if (preg_match($filtras, $value->number)) { // Isvedimas pagal filtra.
                echo '<tr style="text-align:center;border: 1px solid black">
                    <td>'.$value->date.'</td>
                    <td style="border: 1px solid black">'.$value->number.'</td>
                    <td>'.$value->distance.'</td>
                    <td style="border: 1px solid black">'.$value->time.'</td>
                    <td>'.round($value->greitis(), 1).'</td>           
                    </tr>';
            }
        }
    echo '</table>';