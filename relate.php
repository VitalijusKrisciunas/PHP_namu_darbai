<!-- Susiejimo programa -->
<!DOCTYPE html>
<html>
    <head>
        <title>Dvi lenteles</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            require_once 'pagination.php';
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
            $per_page = 10;
            if (isset($_GET['page'])) {
                $pagenum = $_GET['page'];
            } else {
                $_GET['page'] = 1;
                $pagenum = 0;             
            }
            if ($pagenum == 0){
                $offset = $pagenum * $per_page;
                $pagenum = 1;
            } else {
                $offset = ($pagenum * $per_page) - $per_page;
            }
            // formos uzkrovimas
            require_once 'forma.php';
            // išvedame automobilius
            $sql = "SELECT date, number, b.name, b.city FROM radars a 
            INNER JOIN drivers b ON a.driverid = b.driverid GROUP BY number
            LIMIT $per_page OFFSET $offset";
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
            $sql = "SELECT date, number, b.name, b.city FROM radars a 
            INNER JOIN drivers b ON a.driverid = b.driverid GROUP BY number";
            pagination($per_page, $pagenum, $sql, $conn);
            $conn->close();
        ?>
        <script>
            function dis(btn){
                $(btn).attr('color','blue');
            }
        </script>
    </body>
</html>