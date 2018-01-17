<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vairuotojai</title>
</head>
<body>
    <form method="post">
        <input type="hidden" name="driverid" value="<?=$driverid?>">
        <p><label>Vardas, Pavarde:</label><input type="text" name="name" value="<?=$a->name?>"></p>
        <p><label>Miestas:</label><input type="text" name="city" value="<?=$a->city?>"></p>
        <input type="submit" name="save" value="Irasyti">
    </form> 
</body>
</html>