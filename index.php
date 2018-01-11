<!DOCTYPE html>
<html>
    <head>
        <title>Automobiliai</title>
        <meta charset="UTF-8">
    </head>
    <body>

        <?php           
            require_once 'db.php';
            // prisijungimas prie DB
            $conn = connectDB();

            // masyvas
            $row = ['id'=>'', 'date'=>'', 'number'=>'', 'distance'=>'', 'time'=>''];
            // esamas url adresas
            $url = $_SERVER['PHP_SELF'];

            /* if (isset($_POST['menuo'])){
                $date = $_POST['date'];
                setcookie("Data", $_POST['date']);
                require_once 'menuo.php';
            } */
        
            /* if (isset($_POST['metai'])){
                $date = $_POST['date'];
                setcookie("Data", $_POST['date']);
                require_once 'metai.php';
            } */

            // puslapiavimo kintamieji
            if (isset($_GET['page'])) {
                $offset = $_GET['page'];
             } else {
                $_GET['page'] = 0;
                $offset = 0;
             }

             if (isset($_GET['edit'])) {
                $sql = "SELECT * FROM radars WHERE id = ". intval($_GET['edit']);
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();   
                }
            }
        
            if (isset($_POST['carsave'])) {
                    // formos kintamieji
                    $date = $_POST['date'];
                    $number = $_POST['number'];
                    $distance = $_POST['distance'];
                    $time = $_POST['time'];
        
                if (intval($_POST['id']) > 0) {
                    $id = intval($_GET['edit']);
                    echo "update";
                    $sql = "UPDATE radars 
                    SET date = ?, number = ?, distance = ?, time = ? 
                    WHERE id = ?";
                    $sqls = $conn->prepare($sql);
                    $sqls->bind_param("ssddi", $date, $number, $distance, $time, $id);
                    $sqls->execute(); 
                    header("Location:$url");
                } else {
                    echo "insert";
                    $sql = "INSERT INTO radars(date, number, distance, time) VALUES
                    (?,?,?,?)";
                    $sqls = $conn->prepare($sql);
                    $sqls->bind_param("ssdd", $date, $number, $distance, $time);
                    $sqls->execute(); 
                }
            }
            // formos uzkrovimas
            require_once 'forma.php';
            // išvedame automobilius
            $sql = "SELECT *, `distance`/`time`*3.6 as `greitis` 
            FROM radars ORDER BY id LIMIT 10 OFFSET $offset";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
        ?>

        <div class = "inner">
                <form class = "tableform">
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Numeris</th>
                            <th>Data</th>
                            <th>Atstumas (m)</th>
                            <th>Laikas (s)</th>
                            <th>Greitis (km/h)</th>
                            <th>Veiksmai</th>
                        </tr>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['number'] ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['distance'] ?></td>
                            <td><?= $row['time'] ?></td>
                            <td><?= round($row['greitis']) ?></td>
                            <td>
                                <button type=“submit" name="edit" value="<?= $row['id'] ?>">
                                Taisyti</button>
                                <button type=“submit" name="delete" value="<?= $row['id'] ?>">
                                Trinti</button>
                            </td>
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
               $sql = "SELECT id FROM radars";
                $result = $conn->query($sql);
                if($_GET['page'] > 0){
            ?>
                <button type="submit" name="page" value="<?=$offset - 10?>">Atgal</button>
            <?php } ?>
            <?php if($_GET['page'] <= $result->num_rows - 10){?>    
                <button type="submit" name="page" value="<?=$offset + 10?>">Pirmyn</button>
            <?php } $conn->close();?>
        </form>
    </body>
</html>