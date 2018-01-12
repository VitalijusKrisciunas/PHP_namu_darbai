<!DOCTYPE html>
<html>
    <head>
        <title>Bendra duomenu baze</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            require_once 'db.php';
            // prisijungimas prie DB
            $conn = connectDB();

            // masyvai
            $row = ['id'=>'', 'date'=>'', 'number'=>'', 'distance'=>'', 'time'=>''];
            $rowdrv = ['driverid'=>'', 'name'=>'', 'city'=>''];
            $rowav = ['date'=>'', 'number'=>'', 'name'=>'', 'city'=>''];
            // esamas url adresas
            $url = $_SERVER['PHP_SELF'];
      
            if (!isset($_POST['relateav'])){
              if (isset($_POST['relate'])) {
                    // formos kintamieji
                    $driverid = $_POST['drivid'];
                    $id = intval($_POST['autoid']);
                    echo "update";
                    $sql = "UPDATE radars SET driverid = ? WHERE id = ?";
                    $sqls = $conn->prepare($sql);
                    $sqls->bind_param("ii", $driverid, $id);
                    $sqls->execute();
              }
            }
       
            // puslapiavimo kintamieji
            if (isset($_GET['page'])) {
                $offset = $_GET['page'];
             } else {
                $_GET['page'] = 0;
                $offset = 0;
             }
            // formos uzkrovimas
            require_once 'forma.php';
            // išvedame automobilius
            $sql = "SELECT date, number, b.name, b.city FROM radars a 
            INNER JOIN drivers b ON a.driverid = b.driverid GROUP BY number
            LIMIT 10 OFFSET $offset";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
        ?>
        <div class = "inner">
                <form class = "tableform">
                    <table>
                        <tr>
                            <th>Data</th>
                            <th>Numeris</th>
                            <th>Vardas, Pavarde</th>
                            <th>Miestas</th>
                        </tr>
                    <?php while($rowav = $result->fetch_assoc()):?>
                        <tr>
                            <td><?= $rowav['date'] ?></td>
                            <td><?= $rowav['number'] ?></td>
                            <td><?= $rowav['name'] ?></td>
                            <td><?= $rowav['city'] ?></td>
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
               $sql = "SELECT date, number, b.name, b.city FROM radars a 
               INNER JOIN drivers b ON a.driverid = b.driverid";
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