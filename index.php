<!DOCTYPE html>
<html>
    <head>
        <title>Trikampiai</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
        $arr = [[3, 4, 5],
            [2, 10, 8],
            [5, 6, 5],
            [5, 5, 5]];

  
        echo 'Trikampiai:'.'<br>'.'<br>';

        for ($i = 0; $i < count($arr); $i++) {
            
            $a = $arr[$i][0];
            $b = $arr[$i][1];
            $c = $arr[$i][2];
            $p = ($a + $b + $c) / 2;
            $x = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));


            
            if ($a != $b && $a != $c && $b != $c) {
                print_r($arr[$i]);
                echo ' Trikampis yra ivairiakrastis ir jo plotas yra: '.$x.'<br>';
                    
                } elseif ($a == $b && $a == $c && $b == $c) {
                    print_r($arr[$i]);
                    echo ' Trikampis yra lygiakrastis ir jo plotas yra: '.$x.'<br>';
                
                } elseif ($a == $b || $a == $c || $b == $c) {
                    print_r($arr[$i]);
                    echo ' Trikampis yra lygiasonis ir jo plotas yra: '.$x.'<br>';
                }    
        }

        echo '<br>'.'<br>';
        echo 'Masyvas:'.'<br>'.'<br>';

        $x = array(-10, 0, 2, 9, -5);
        $j = count($x);
        $n = count($x);

        sort($x);
       
        for ($i = 0; $i < $n ; $i++) {
            print_r($x);
            $j--;
            array_splice($x, $j, 1); 
            
           echo '<br>';
        }
      
    ?>
    </body>
</html>