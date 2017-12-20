<!DOCTYPE html>
<html>
    <head>
        <title>Poros</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

        include_once 'functions.php';
        include_once 'masyvai.php';
        include_once 'obj.php';

        $jonotrim = new Trimestras($jj);
        $onostrim = new Trimestras($oo);

        $mokiniai = [
            new Mokinys ('Jonas', 'Jonaitis', $jonotrim),
            new Mokinys ('Ona', 'Onaite', $onostrim),
        ];

        var_dump($mokiniaimoki);


       
    ?>
    </body>
</html>