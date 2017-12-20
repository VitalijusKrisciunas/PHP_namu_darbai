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
        'lietuviu' => [4, 8, 6, 7], 'anglu' => [6, 7, 8],
        'matematika' => [3, 5, 4]]],
        ['vardas' => 'Ona', 'pazymiai' => [
        'lietuviu' => [10, 9, 10], 'anglu' => [9, 8, 10],
        'matematika' => [10, 10, 9, 9]]],
        ];

        var_dump($mokiniai);

        
    ?>
    </body>
</html>