<?php

    // Ivedimo formos ir klasiu uzkrovimas.
    require_once 'index.html';
    require_once 'obj.php';

     // Paleidziama sesija.
     session_start();

    // Sukuriamas sesijos irasas.
     if (isset($_SESSION['cars'])) {
        $cars = $_SESSION['cars'];
    } else {
        $cars = array();
    }
 
    // Siuntimas i session.            
    if ($_POST['dateOfTime'] == '' || $_POST['numeris'] == ''
        || $_POST['atstumas'] == '' || $_POST['laikas'] == ''){

        echo '<h4 style="color:red">Visi langeliai turi buti uzpildyti !</h4>';
        return; // Jeigu kuris nors langelis tuscias nepraleidzia.

    } else {

        $car = new Radar($_POST['dateOfTime'], $_POST['numeris'],
                    $_POST['atstumas'], $_POST['laikas']);

        array_push($cars, $car);
        $_SESSION['cars'] = $cars;
    }

    // Rusiavimas pagal greiti.
    usort($cars, function($a, $b){
        return ($a->greitis() < $b->greitis());
    });
    
    // Rezultato isvedimas i lentele.
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
?>




