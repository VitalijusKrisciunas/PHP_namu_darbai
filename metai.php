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
            if (!isset($date)){
                $date = $_COOKIE['Data'];
            }

            // -------------Puslapiavimas---------------
            // irasu skaicius
            $per_page=10;

            // puslapio numerio gavimas
            if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;

            // pirma LIMIT reiksme
            $start=abs($page*$per_page);

            $sql = "SELECT YEAR(date) as year, number, COUNT(*) AS kiekis, 
            MIN(distance/time*3.6) AS ming, AVG(distance/time*3.6) AS avgg,
            MAX(distance/time*3.6) AS maxg FROM radars GROUP BY number 
            HAVING year = YEAR('$date') LIMIT $start,$per_page";

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

            $sql = "SELECT YEAR(date) as year, number, COUNT(*) AS kiekis, 
            MIN(distance/time*3.6) AS ming, AVG(distance/time*3.6) AS avgg,
            MAX(distance/time*3.6) AS maxg FROM radars GROUP BY number 
            HAVING year = YEAR('$date')";

            $result = $conn->query($sql);
            $total_rows = $result->num_rows;
            $num_pages = ceil($total_rows/$per_page);

            if ($page >= 1) {
            $i = $_GET['page'] - 1;
            echo '<a href="'.'metai.php'.'?page='.$i.'">'.'Atgal '.'</a>';
            }

            if ($page < $num_pages - 1) {
                $page += 1;
                $i = $page + 1;
                echo '<a href="'.'metai.php'.'?page='.$i.'">'.' Pirmyn'.'</a>';
            }

            echo '<>'.'<a href="index.php">'.'Grizti i pradini puslapi'.'</a>';

            $conn->close();
            die;
        ?>
    </body>
</html>