<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radarai</title>
</head>
<body>
    <form method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <p><label>Data:</label><input type="datetime" name="date" value="<?=$a->date?>"></p>
        <p><label>Numeris:</label><input type="text" name="number" value="<?=$a->number?>"></p>
        <p><label>Atstumas (m):</label><input type="number" name="distance" value="<?=$a->distance?>"></p>
        <p><label>Laikas (s):</label><input type="number" name="time" value="<?=$a->time?>"></p>
        <input type="submit" name="save" value="Irasyti">
    </form> 
</body>
</html>