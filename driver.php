<!DOCTYPE html>
<html>
    <head>
        <title>Vairuotojai</title>
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

            if (isset($_GET['delete'])) {
                $id = intval($_GET['delete']);
                $sql = "DELETE FROM drivers WHERE driverid = ?";
                $sqls = $conn->prepare($sql);
                $sqls->bind_param("i", $id);
                $sqls->execute();
            }

             if (isset($_GET['edit'])) {
                $sql = "SELECT * FROM drivers WHERE driverid = ". intval($_GET['edit']);
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $rowdrv = $result->fetch_assoc();   
                }
            }
        
            if (isset($_POST['drvsave'])) {
                    // formos kintamieji
                    $name = $_POST['name'];
                    $city = $_POST['city'];
        
                if (intval($_POST['driverid']) > 0) {
                    $driverid = intval($_GET['edit']);
                    echo "update";
                    $sql = "UPDATE drivers SET name = ?, city = ? WHERE driverid = ?";
                    $sqls = $conn->prepare($sql);
                    $sqls->bind_param("ssi", $name, $city, $driverid);
                    $sqls->execute(); 
                    header("Location:$url");
                } else {
                    echo "insert";
                    $sql = "INSERT INTO drivers(name, city) VALUES(?,?)";
                    $sqls = $conn->prepare($sql);
                    $sqls->bind_param("ss", $name, $city);
                    $sqls->execute(); 
                }
            }

            // formos uzkrovimas
            require_once 'forma.php';         
            // puslapiavimo kintamieji
            if (isset($_GET['page'])) {
                $offset = $_GET['page'];
             } else {
                $_GET['page'] = 0;
                $offset = 0;
             }
            // išvedame automobilius
            $sql = "SELECT * FROM drivers ORDER BY name LIMIT 10 OFFSET $offset";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
        ?>
        <div class = "inner">
                <form class = "tableform">
                    <table>
                        <tr>
                            <th>DriverId</th>
                            <th>Vardas, Pavarde</th>
                            <th>Miestas</th>
                            <th>Veiksmai</th>
                        </tr>
                    <?php while($rowdrv = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $rowdrv['driverid'] ?></td>
                            <td><?= $rowdrv['name'] ?></td>
                            <td><?= $rowdrv['city'] ?></td>
                            <td>
                                <button type=“submit" name="edit" value="<?= $rowdrv['driverid'] ?>">
                                Taisyti</button>
                                <button type=“submit" name="delete" value="<?= $rowdrv['driverid'] ?>">
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
               $sql = "SELECT * FROM drivers";
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