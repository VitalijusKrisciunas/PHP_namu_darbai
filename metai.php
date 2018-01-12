<!DOCTYPE html>
<html>
    <head>
        <title>Automobiliai</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            // issaugoma data        
            if (isset($_POST['date'])){
                $date=$_POST['date'];
                setcookie("Data", $date);   
            } else {
              $date = $_COOKIE['Data'];
            }
            // masyvas
            $row = ['id'=>'', 'date'=>$date, 'number'=>'', 'distance'=>'', 'time'=>''];
            $rowdrv = ['driverid'=>'', 'name'=>'', 'city'=>''];
            $rowav = ['date'=>'', 'number'=>'', 'name'=>'', 'city'=>''];
            // uzkraunama forma
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

            $sql = "SELECT YEAR(date) as year, number, COUNT(*) AS kiekis, 
            MIN(distance/time*3.6) AS ming, AVG(distance/time*3.6) AS avgg,
            MAX(distance/time*3.6) AS maxg FROM radars GROUP BY number 
            HAVING year = YEAR('$date') LIMIT 10 OFFSET $offset";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                ?>
                <div class = "inner">
                    <form class = "tableform">
                    <table>
                        <tr>
                            <th>Metai</th>
                            <th>Numeris</th>
                            <th>Kiekis</th>
                            <th>Min. greitis (km/h)</th>
                            <th>Vid. greitis (km/h)</th>
                            <th>Max. greitis (km/h)</th>
                        </tr>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['year'] ?></td>
                            <td><?= $row['number'] ?></td>
                            <td><?= $row['kiekis'] ?></td>
                            <td><?= round($row['ming']) ?></td>
                            <td><?= round($row['avgg']) ?></td>
                            <td><?= round($row['maxg']) ?></td>
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
                    $sql = "SELECT YEAR(date) as year, number, COUNT(*) AS kiekis, 
                    MIN(distance/time*3.6) AS ming, AVG(distance/time*3.6) AS avgg,
                    MAX(distance/time*3.6) AS maxg FROM radars GROUP BY number 
                    HAVING year = YEAR('$date')";
                    
                    if($_GET['page'] > 0){
                ?>
                    <button type="submit" name="page" value="<?=$offset - 10?>">Atgal</button>
                <?php } ?>
                <?php if($_GET['page'] <= $result->num_rows - 10){?>    
                    <button type="submit" name="page" value="<?=$offset + 10?>">Pirmyn</button>
                <?php } $conn->close(); die;?>
            </form>
    </body>
</html>