<table>
    <tr>
        <th>Nr</th>
        <th>DriverId</th>
        <th>Vardas, Pavarde</th>
        <th>Miestas</th>
        <th></th>
    </tr>

<?php
// output data of each row
$nr = 1;
foreach($drivers as $a): ?>
    <tr>
        <td><?= $nr++ ?></td>
        <td><?= $a->driverid ?></td>
        <td><?= $a->name ?></td>
        <td><?= $a->city ?></td>
        <td>
            <a href="<?= $base ?>drivers/edit?driverid=<?= $a->driverid ?>">Redaguoti</a> 
            <a href="<?= $base ?>drivers/delete?driverid=<?= $a->driverid ?>">Trinti</a> 
        </td>
    </tr>
<?php endforeach; ?>
</table>
