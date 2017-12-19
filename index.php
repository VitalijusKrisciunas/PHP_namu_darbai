<!DOCTYPE html>
<html>
    <head>
        <title>Poros</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
    
    $a = ['Jonas', 'Petras', 'Antanas', 'Povilas'];
    var_dump($a);
    foreach($a as $value) {
        $x = $value;
        array_shift($a);
       
        foreach($a as $value){
            echo $x.'-'.$value.'<br>';
        }
    }
    ?>
    </body>
</html>