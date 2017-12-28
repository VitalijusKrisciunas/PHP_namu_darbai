<!DOCTYPE html>
<html>
    <head>
        <title>Automobiliai</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

        include_once 'obj.php';

        $objArray = [
            new Radar(new DateTime('2017-01-01'), 'AAA111', 3600, 100),
            new Radar(new DateTime('2017-02-02'), 'BBB222', 5600, 200),
            new Radar(new DateTime('2017-03-03'), 'CCC333', 4600, 150),
            new Radar(new DateTime('2017-04-04'), 'DDD444', 6600, 260),
        ];

        usort($objArray, function($a, $b){
            return ($a->greitis() < $b->greitis());
        });

        foreach ($objArray as $obj) {
            echo 'Automobilis: '.$obj->number.' greitis: '.round($obj->greitis(), 1).' km/h'.'<br>';
        }

    ?>
    </body>
</html>