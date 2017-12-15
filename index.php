<!DOCTYPE html>
<html>
    <head>
        <title>Daugiamatis masyvas</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

        $a = [[3, 4, 6, 4],[5, 6, 2, 1],[1, 4, 7, 4]];
        $z = null;
        
        echo 'Pirma uzduotis:'.'<br>';

        for ($j = 0; $j <= count($a); $j++) {
            
            $x = array_column($a, $j);
            $y = array_sum($x);
            print_r($x);
            echo 'Daugiamacio masyvo stulpelio suma yra: '.$y.'<br>';

            if ($z <= $y) {
                $z = $y;
            }

        }
        echo '<br>'.'Antra uzduotis:'.'<br>';
        echo 'Daugiamacio masyvo didziausia stulpelio suma yra: '.$z.'<br>';
        echo '<br>'.'Trecia uzduotis:';
    ?>
    </body>
</html>
