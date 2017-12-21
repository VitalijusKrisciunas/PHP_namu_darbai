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

        echo '<table style="border: 1px solid black">';
        echo '<tr>
                <th>'.'Vardas Pavarde'.'</th>
                <th style="border: 1px solid black">'.'Lietuviu'.'</th>
                <th>'.'L. v.'.'</th>
                <th style="border: 1px solid black">'.'Anglu'.'</th>
                <th>'.'A. v.'.'</th>
                <th style="border: 1px solid black">'.'Matematika'.'</th>
                <th>'.'M. v.'.'</th>
                <th style="border: 1px solid black">'.'B. vidurkis'.'</th>
            </tr>';
            foreach ($mokiniai as $obj) {
            
                echo '<tr style="text-align:center;border: 1px solid black">
                    <td>'.$obj->vardas.' '.$obj->pavarde.'</td>
                    <td style="border: 1px solid black">'.outelem($obj->trim->trim['lietuviu']).'</td>
                    <td style="text-align:center">'.vidurkis($obj->trim->trim['lietuviu']).'</td>
                    <td style="border: 1px solid black">'.outelem($obj->trim->trim['anglu']).'</td>
                    <td>'.vidurkis($obj->trim->trim['anglu']).'</td>
                    <td style="border: 1px solid black">'.outelem($obj->trim->trim['matematika']).'</td>
                    <td>'.vidurkis($obj->trim->trim['matematika']).'</td>
                    <td style="border: 1px solid black">'.bendrasv($obj->trim->trim).'</td>     
                </tr>';
            }
            
        echo '</table>';

    ?>
    </body>
</html>