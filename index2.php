<!DOCTYPE html>
<html>
    <head>
        <title>Masyvai</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    
    $a = [[1, 3, 4], [2, 5], [2 => 3, 5 => 8], [1, 1, 5 => 1]];
    $b = array();
    $dsum = 0;
    $suma = 0;
    $num = 0;
       
    foreach($a as $arr) {   // Didziausio rakto paieska
        foreach($arr as $key => $value) {
            if ($num < $key){
                $num = $key;
            }
        }
    }
    
    for ($i = 0; $i <= $num; $i++) { // Stulpeliu sudeties ciklas
        foreach ($a as $elem) {
            if (isset($elem[$i])) {
                
            } else {
                $elem[$i] = 0;
            }
           $suma += $elem[$i];
        }
        if ($dsum < $suma) { // Diziausio stulpelio paieska
            $dsum = $suma;
        }
        array_push($b, $suma);
        $suma = 0;
    }
    print_r($b);
    echo 'Didziausia stulpelio suma yra: '.$dsum;

    ?>
    </body>
</html>