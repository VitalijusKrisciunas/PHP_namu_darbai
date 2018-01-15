<!DOCTYPE html>
<html>
    <head>
        <title>Automobiliai</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            require_once 'db.php';
            // prisijungimas prie DB
            $conn = connectDB();
        ?>
        <div class="inner">
            <form class="cars" action="index.php" method="post">
                <fieldset>
                    <legend>Automobiliai</legend>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="carsleft">
                        <p>
                            <label>Data ir laikas:</label>
                            <input type="datetime" name="date" 
                            placeholder="2017-01-01 12:00:00" value="<?= $row['date'] ?>">
                        </p>
                        <p>
                            <label>Numeris:</label>
                            <input type="text" name="number" placeholder="pvz:XXX000"
                            value="<?= $row['number'] ?>">
                        </p>
                    </div>
                        <div class="carsright">
                        <p>
                            <label>Atstumas (m):</label>
                            <input type="number" name="distance" placeholder="5000"
                            value="<?= $row['distance'] ?>">
                        </p>
                        <p>
                            <label>Laikas (s):</label>
                            <input type="number" name="time" placeholder="300" value="<?= $row['time'] ?>">
                        </p>
                    </div><br>
                    <button type="submit" name="carsave">Issaugoti</button>
                </fieldset>
                <button formaction="auto.php" type="submit" name="auto">Maks. greitis</button>
                <button formaction="metai.php" type="submit" name="metai">Metai</button>
                <button formaction="menuo.php" type="submit" name="menuo">Menesiai</button>
                <button formaction="index.php<?='?page=1'?>" type="submit">Automobiliai</button>                
            </form>
            <form class="drivers" action="driver.php" method="post">
                <fieldset>
                    <legend>Vairuotojai</legend>
                    <input type="hidden" name="driverid" value="<?= $rowdrv['driverid'] ?>">
                    <p>
                        <label>Vardas, Pavarde:</label>
                        <input type="text" name="name" placeholder="Jonas Jonaitis" value="<?= $rowdrv['name'] ?>">
                    </p><br>
                    <p>
                        <label>Miestas:</label>
                        <input type="text" name="city" placeholder="Balbieriskis" value="<?= $rowdrv['city'] ?>">
                    </p><br>
                    <button type="submit" name="drvsave">Issaugoti</button>
                    <button>Vairuotojai</button>
                </fieldset> 
            </form>
            <form class="relate" action="relate.php" method="post">
                <fieldset>
                    <legend>Susiejimas</legend>
                        <label>Automobilis:</label>
                        <select name="autoid">
                        <?php
                        // automobiliu numeriu ikrovimas
                            $rownum = ['id'=>'', 'number'=>'']; 
                            $sql = "SELECT id, number FROM radars";
                            $result = $conn->query($sql);
                            while($rownum = $result->fetch_assoc()):
                        ?>
                            <option value="<?= $rownum['id'] ?>"><?= $rownum['number'] ?></option>
                        <?php endwhile; ?>
                        </select><br>
                    <label class="rel">&&</label><br>
                    <label>Vairuotojas:</label>
                    <select name="drivid">
                    <?php
                    // vairuotoju vardu ikrovimas
                        $rowname = ['driverid'=>'', 'name'=>'']; 
                        $sql = "SELECT driverid, name FROM drivers";
                        $result = $conn->query($sql);
                         while($rowname = $result->fetch_assoc()):
                    ?>
                        <option value="<?=$rowname['driverid']?>"><?= $rowname['name'] ?></option>
                    <?php endwhile; ?>
                    </select>
                </fieldset>
                <button type="submit" name="relate">Susieti</button>
                <button name="relateav">A<>V</button>
            </form>
            <hr>
        </div>
    </body>
</html>