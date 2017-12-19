<!DOCTYPE html>
<html>
    <head>
        <title>Masyvai</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    
    $a = [[1, 3, 4], [2, 5], [2 => 3, 5 => 8], [1, 1, 5 => 1]];
    $dsum = 0;

    foreach($a as $value){
        $sum = array_sum($value);
        echo 'Stulpelio suma: '.array_sum($value).'<br>';

        if ($dsum < $sum){
            $dsum = $sum;
        }
    }
    
    echo 'Didziausia stulpelio suma: '.$dsum;

    /* $b = array();
    

     // Masyvo perindeksacija
    foreach($a as $elem) {
        
          $x = array_values($elem);
          array_push($b, $x);
          
    }

    foreach($b as $elem) {
        print_r($elem);
        echo '<br>';

    }
 
    for ($i = 0; $i <= count($b); $i++) {
            
        $column = array_column($b, $i);
        $sum = array_sum($column);
        if ($sum != 0) {
        echo 'Daugiamacio masyvo stulpelio suma yra: '.$sum.'<br>';
        }

        if ($dsum <= $sum) {
            $dsum = $sum;
        }
    }
    echo 'Didziausia stulpelio suma yra: '.$dsum; */

    ?>
    </body>
</html>