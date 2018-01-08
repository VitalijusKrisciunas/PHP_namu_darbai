<!DOCTYPE html>
<html>
    <head>
        <title>Demo 2</title>
        <meta charset="UTF-8">
    </head>
<body>

<?php 
    require_once 'db.php';
    $conn = connectDB();
    $uri = $_SERVER['PHP_SELF'];

    if (isset($_GET['delete'])) {
        $sql = "DELETE FROM radars WHERE id = ". intval($_GET['delete']);
        $conn->query($sql);
    }

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
            echo "update";
            $sql = "UPDATE radars 
            SET date = '$date', number = '$number', 
            distance = $distance, time = $time WHERE id = ". intval($_GET['edit']);
            $conn->query($sql); 
            header("Location:$uri");
        } else {
            echo "insert";
            $sql = "INSERT INTO radars(date, number, distance, time) VALUES
            ('$date', '$number', $distance, $time)";
            $conn->query($sql);
        }
    }

?>

<form method='post'>
    <input type='hidden' name='id' required value="<?= $row['id'] ?>">
    Data: <input type='text' name='date' required value="<?= $row['date'] ?>"><br>
    Numeris: <input type='text' name='number' required value="<?= $row['number'] ?>"><br>
    Atstumas: <input type='number' name='distance' required value="<?= $row['distance'] ?>"><br>
    Laikas: <input type='number' name='time' required value="<?= $row['time'] ?>">
    <button name="save" type="submit">Išsaugoti</button>
</form>

<hr>

<?php

    // išvedame automobilius
    $sql = 'SELECT *, `distance`/`time`*3.6 as `speed` FROM radars ORDER BY number, date DESC';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <table>
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
                    <a href="?edit=<?= $row['id'] ?>">Taisyti</a>
                    <a href="?delete=<?= $row['id'] ?>">Trinti</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
        <?php
    } else {
        echo 'nėra duomenų';
    }
?>
</body>
</html>