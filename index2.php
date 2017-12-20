<!DOCTYPE html>
<html>
    <head>
        <title>Mokiniai</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
       
       $mokiniai = [
        ['vardas' => 'Jonas', 'pazymiai' => [
        'lietuviu' => [4, 8, 6, 7], 
        'anglu' => [6, 7, 8],
        'matematika' => [3, 5, 4]]],
        ['vardas' => 'Ona', 'pazymiai' => [
        'lietuviu' => [10, 9, 10], 
        'anglu' => [9, 8, 10],
        'matematika' => [10, 10, 9, 9]]],
        ];

        $jonovidsuma = 0;
        $onosvidsuma = 0;

        foreach($mokiniai as $value) {
            echo '<br>'.$value['vardas'].'<br>'.'<br>';
            
            foreach($value['pazymiai'] as $key => $subvalue){

                $daliklis = count($value['pazymiai'][$key]);

                $rezult = round(array_sum($value['pazymiai'][$key]) / $daliklis);

                echo $key.' vidurkis : '.$rezult.'<br>';

                if ($value['vardas'] == 'Jonas') {
                    $jonovidsuma += $rezult;
                } else {
                    $onosvidsuma += $rezult;
                }         
                
            }
                        
        }

        echo '<br>';
        echo '<br>';
  

        if ($jonovidsuma > $onosvidsuma) {
            echo 'Jonas mokosi geriausiai!';
        } else {
            echo 'Ona mokosi geriausiai!';
        }

        
    ?>
    </body>
</html>