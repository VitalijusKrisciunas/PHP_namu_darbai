<!DOCTYPE html>
<html>
    <head>
        <title>Automobiliai</title>
        <meta charset="UTF-8">
    </head>
<body>

<?php 
    require_once 'db.php';
    $conn = connectDB();
    $uri = $_SERVER['PHP_SELF'];

    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $sql = "DELETE FROM radars WHERE id = ?";
        $sqls = $conn->prepare($sql);
        $sqls->bind_param("i", $id);
        $sqls->execute();
    }

    // jei masyvas uzduotas su tusciais raktais tai formoj tikrint nereikia
    $row = [
        'id'=>'',
        'date'=>'',
        'number'=>'',
        'distance'=>'',
        'time'=>''
    ];

    if (isset($_GET['edit'])) {
        $sql = "SELECT * FROM radars WHERE id = ". intval($_GET['edit']);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();   
        }
    }

    if (isset($_POST['save'])) {
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
            header("Location:$uri");
        } else {
            echo "insert";
            $sql = "INSERT INTO radars(date, number, distance, time) VALUES
            (?,?,?,?)";
            $sqls = $conn->prepare($sql);
            $sqls->bind_param("ssdd", $date, $number, $distance, $time);
            $sqls->execute(); 
        }
    }

    if (isset($_POST['auto'])){
        require_once 'auto.php';
    }

    if (isset($_POST['menuo'])){
        $date = $_POST['date'];
        setcookie("Data", $_POST['date']);
        require_once 'menuo.php';
    }

    if (isset($_POST['metai'])){
        $date = $_POST['date'];
        setcookie("Data", $_POST['date']);
        require_once 'metai.php';
    }
?>

<form method='post'>
    <input type='hidden' name='id' required value="<?= $row['id'] ?>">
    Data: <input type='text' name='date' required value="<?= $row['date'] ?>"><br>
    Numeris: <input type='text' name='number' required value="<?= $row['number'] ?>"><br>
    Atstumas: <input type='number' name='distance' required value="<?= $row['distance'] ?>"><br>
    Laikas: <input type='number' name='time' required value="<?= $row['time'] ?>">
    <button name="save" type="submit">Išsaugoti</button>
    <br><br>
    <button name="auto" type="submit">Automobiliai</button>
    <button name="menuo" type="submit">Menuo</button>
    <button name="metai" type="submit">Metai</button>

</form>

<hr>

<?php

    // išvedame automobilius
    $sql = 'SELECT *, `distance`/`time`*3.6 as `speed` FROM radars ORDER BY number, date DESC';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <form>
            <table style="text-align:center;width:100%;">
                <tr>
                    <th>ID</th>
                    <th>Numeris</th>
                    <th>Data</th>
                    <th>Atstumas (km)</th>
                    <th>Laikas (h)</th>
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
                    <td><?= round($row['speed']) ?></td>
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
        <?php
    } else {
        echo 'nėra duomenų';
    }

    $conn->close();
?>
</body>
</html>