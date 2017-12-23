<!DOCTYPE html>
<html>
    <head>
        <title>Mokiniai</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

        include_once 'obj.php';

        $mokiniai = [
            new Mokinys ('Jonas', 'Jonaitis', '2000-01-10'),
            new Mokinys ('Ona', 'Onaite', '1990-08-10'),
            new Mokinys ('Petras', 'Petraitis', '1996-05-10'),
            new Mokinys ('Mare', 'Maraite', '1973-12-20'),
        ];

        echo '<table style="border: 1px solid black">';
        echo '<tr>
                <th>'.'Vardas Pavarde'.'</th>
                <th style="border: 1px solid black">'.'Amzius'.'</th>
            </tr>';
        
                foreach ($mokiniai as $obj) {
                    if ($obj->mokinioMetai() >= 18) {
                
                        echo '<tr style="text-align:center;border: 1px solid black">
                            <td>'.$obj->pilnasVardas().'</td>
                            <td style="border: 1px solid black">'.$obj->mokinioMetai().'</td>
                        </tr>';
                    }
                }
        
        echo '</table>';

    ?>
    </body>
</html>