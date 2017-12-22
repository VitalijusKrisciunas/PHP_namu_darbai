<!DOCTYPE html>
<html>
    <head>
        <title>Klases</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

        include_once 'functions.php';
        include_once 'masyvai.php';
        include_once 'obj.php';

        $jonotrim = new Trimestras($jj);
        $onostrim = new Trimestras($oo);
        $petrotrim =new Trimestras($pp);
        $marestrim =new Trimestras($mm);

        $mokiniai = [
            new Mokinys ('Jonas', 'Jonaitis', $jonotrim),
            new Mokinys ('Ona', 'Onaite', $onostrim),
            new Mokinys ('Petras', 'Petraitis', $petrotrim),
            new Mokinys ('Mare', 'Maraite', $marestrim),
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
            for ($i = 10; $i > 1; $i--) {
                foreach ($mokiniai as $obj) {
                    if (bendrasv($obj->trim->trim) == $i) {
                
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
                }
            }
            
        echo '</table>';

    ?>
    </body>
</html>