<!DOCTYPE html>
<html>
    <head>
        <title>Automobiliai</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="inner">
            <form class="cars" method="post">
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
                <button formaction="auto.php" type="submit" name="auto">Automobiliai</button>
                <button formaction="metai.php" type="submit" name="metai">Metai</button>
                <button formaction="menuo.php" type="submit" name="menuo">Menesiai</button>                
            </form>
            <form class="drivers" method="post">
                <fieldset>
                    <legend>Vairuotojai</legend>
                    <input type="hidden" name="id">
                    <p>
                        <label>Vardas, Pavarde:</label>
                        <input type="text" name="name" placeholder="Jonas Jonaitis">
                    </p><br>
                    <p>
                        <label>Miestas:</label>
                        <input type="text" name="city" placeholder="Balbieriskis">
                    </p><br>
                    <button type="submit" name="drvsave">Issaugoti</button>
                </fieldset> 
            </form>
            <hr>
        </div>
    </body>
</html>