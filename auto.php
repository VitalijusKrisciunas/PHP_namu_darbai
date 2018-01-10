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

            // -------------Puslapiavimas---------------
            // irasu skaicius
            $per_page=10;

            // puslapio numerio gavimas
            if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;

            // pirma LIMIT reiksme
            $start=abs($page*$per_page);

            // SQL uzklausa
            $sql = "SELECT number, COUNT(*) AS kiekis, 
            MAX(distance/time*3.6) AS greitis FROM radars GROUP BY number
            LIMIT $start,$per_page";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                ?>
                    <table style="text-align:center;width:100%;">
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
                <?php
            } else {
                echo 'nėra duomenų';
            }

            $sql = "SELECT number, COUNT(*) AS kiekis, 
            MAX(distance/time*3.6) AS greitis FROM radars GROUP BY number";

            $result = $conn->query($sql);
            $total_rows=$result->num_rows;
            $num_pages=ceil($total_rows/$per_page);

            if ($page >= 1) {
            $i = $_GET['page'] - 1;
            echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.'Atgal '.'</a>';
            }

            if ($page < $num_pages - 1) {
                $page += 1;
                $i = $page + 1;
                echo '<a href="'.'auto.php'.'?page='.$i.'">'.' Pirmyn'.'</a>';
            }

            echo '<>'.'<a href="'.'index.php'.'?page='.$i.'">'.' Grizti i pradini puslapi'.'</a>';

            $conn->close();
            die;
        ?>
    </body>
</html>