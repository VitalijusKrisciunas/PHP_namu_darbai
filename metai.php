<!DOCTYPE html>
<html>
    <head>
        <title>Automobiliai</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php

            $sql = "SELECT YEAR(date) as year, number, COUNT(*) AS kiekis, 
            MIN(distance/time*3.6) AS ming, AVG(distance/time*3.6) AS avgg,
            MAX(distance/time*3.6) AS maxg FROM radars GROUP BY number 
            HAVING year = YEAR('$date')";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                ?>
                    <table style="text-align:center;width:100%;">
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
                <?php
            } else {
                echo 'nėra duomenų';
            }

            $conn->close();
            die
        ?>
    </body>
</html>