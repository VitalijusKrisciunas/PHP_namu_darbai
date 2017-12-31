<?php

    $sk = 0;
    
    require 'index.html';

    if (isset($_COOKIE['eilnum'])) {
        $sk = $_COOKIE['eilnum'];
    } else {
        setcookie('eilnum', 0);
    }
    
                 
    if ($_POST['dateOfTime'] == '' || $_POST['numeris'] == ''
        || $_POST['atstumas'] == '' || $_POST['laikas'] == ''){

        echo '<h4 style="color:red">Visi langeliai turi buti uzpildyti !</h4>';
        return;

    } else {

        $greitis = round(($_POST['atstumas'] / 1000) / ($_POST['laikas'] / 3600), 1);
        setcookie($sk.'[data]', $_POST['dateOfTime']);
        setcookie($sk.'[numeris]', $_POST['numeris']);
        setcookie($sk.'[atstumas]', $_POST['atstumas']);
        setcookie($sk.'[laikas]', $_POST['laikas']);
        setcookie($sk.'[greitis]', $greitis);
        $sk++;
        setcookie('eilnum', $sk);
    }

    usort($_COOKIE, function($a, $b){
        if (isset($a['greitis']) && isset($b['greitis'])) {
            return ($a['greitis'] < $b['greitis']);
        } 
    });
    
    echo '<table style="border: 1px solid black">';
        echo '<tr>
            <th>'.'Data ir laikas'.'</th>
            <th style="border: 1px solid black">'.'Valst. num.'.'</th>
            <th>'.'Atstumas, m'.'</th>
            <th style="border: 1px solid black">'.'Laikas, s'.'</th>
            <th>'.'Greitis, km/h'.'</th>
        </tr>';
        
        foreach ($_COOKIE as $value) {
            if (!isset($value['data']) && !isset($value['numeris'])
            && !isset($value['atstumas']) && !isset($value['laikas'])
            && !isset($value['greitis'])){
                break;
            }
            echo '<tr style="text-align:center;border: 1px solid black">
                <td>'.$value['data'].'</td>
                <td style="border: 1px solid black">'.$value['numeris'].'</td>
                <td>'.$value['atstumas'].'</td>
                <td style="border: 1px solid black">'.$value['laikas'].'</td>
                <td>'.$value['greitis'].'</td>           
                </tr>';
        }
    echo '</table>';

?>

