<!DOCTYPE html>
<html>
    <head>
        <title>Funkcijos</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
       
       $a = array(5, 6, 10, 15);
       $b = array(8,5, 3, 25);
    

        function masvid($x) {
            $a = null;
            $b = count($x);
            foreach ($x as $elem) {
                $a += $elem;
            }
            $a /= $b;
            return $a;
        }

        echo 'Pirma uzduotis:'."<br>";
        echo '<br>'.'Atsakymas yra: '.$c = masvid($a) - masvid($b);
    ?>

    <br>
    <br>
    <br>

    <?php
        echo 'Antra uzduotis:'."<br>"."<br>";

        // Funkcija skaiciaus dalikliams rasti

        function sk_dal($sk){

            $arr = array();

            for ($i = 1; $i < $sk; $i++) {
                $b = $sk / $i;
                if ($b == is_int($b)) {
                    array_push($arr, $i);
                }
            }
            return $arr;
        }

        // Funkcija ar skaicius yra tobulas

        function sk_tob($sk) {

            $arr = sk_dal($sk);
            $sum = null;

            for ($i = 0; $i < count($arr); $i++) {
                $sum += $arr[$i];
            }

            if ($sk == $sum) {
                echo 'Skaicius: '.$sk.' yra tobulas'.'<br>';
            } 
        }

        // Skaiciu nuo 1 iki 1000 ciklas

        echo 'Tobulo skaiciuas nuo 1 iki 1000 paieska:'.'<br>'.'<br>';

        for ($i = 1; $i <= 1000; $i++) {
          sk_tob($i);
        }
    ?>
    </body>
</html>