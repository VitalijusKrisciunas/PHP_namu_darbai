<!DOCTYPE html>
<html>
    <head>
        <title>Automobiliai</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            // masyvas
            $row = ['id'=>'', 'date'=>'', 'number'=>'', 'distance'=>'', 'time'=>''];
            $rowdrv = ['driverid'=>'', 'name'=>'', 'city'=>''];
            $rowav = ['date'=>'', 'number'=>'', 'name'=>'', 'city'=>''];
            require_once 'forma.php';
            require_once 'db.php';
            $conn = connectDB();

            // puslapiavimo kintamieji
            if (isset($_GET['page'])) {
                $offset = $_GET['page'];
             } else {
                $_GET['page'] = 0;
                $offset = 0;
             }

            // SQL uzklausa
            $sql = "SELECT number, COUNT(*) AS kiekis, 
            MAX(distance/time*3.6) AS greitis FROM radars GROUP BY number
            LIMIT 10 OFFSET $offset";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
        ?>
        <div class = "inner">
            <form class = "tableform">
                <table>
                    <tr>
                        <th>Numeris</th>
                        <th>Kiekis</th>
                        <th>Max greitis (km/h)</th>
                    </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['number'] ?></td>
                        <td><?= $row['kiekis'] ?></td>
                        <td><?= round($row['greitis']) ?></td>
                    </tr>
                <?php endwhile; ?>
                </table>
            </form>
        </div>
        <?php
            } else {
                echo 'Nėra duomenų';
            }
        ?>
           <form class="pslform">
               <?php
                // SQL uzklausa irasu kiekiui gauti
                $sql = "SELECT number, COUNT(*) AS kiekis, 
                MAX(distance/time*3.6) AS greitis FROM radars GROUP BY number";
                $result = $conn->query($sql);
                if($_GET['page'] > 0){
               ?>
                   <button type="submit" name="page" value="<?=$offset - 10?>">Atgal</button>
               <?php } ?>
               <?php if($_GET['page'] < $result->num_rows - 10){?>    
                   <button type="submit" name="page" value="<?=$offset + 10?>">Pirmyn</button>
               <?php } $conn->close(); die;?>
           </form>
    </body>
</html>