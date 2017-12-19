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

    $b = array();
   
     // Masyvo perindeksacija
    foreach($a as $elem) {
        
          $x = array_values($elem);
          array_push($b, $x);
    }

    foreach($b as $elem) {
        print_r($elem);
        echo '<br>';

    }

    foreach ($b as $key => $value) {
            
        $column = array_column($b, $key);
        $sum = array_sum($column);

        /* if ($sum != 0) {
        echo 'Daugiamacio masyvo stulpelio suma yra: '.$sum.'<br>';
        } */
        echo 'Daugiamacio masyvo stulpelio suma yra: '.$sum.'<br>';
        if ($dsum <= $sum) {
            $dsum = $sum;
        }
    }
    echo 'Didziausia stulpelio suma yra: '.$dsum;

    ?>
    </body>
</html>