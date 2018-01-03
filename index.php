<!DOCTYPE html>
<html>
    <head>
        <title>Automobiliai</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <!-- <?php
           $servername = 'localhost';
           $username = 'auto';
           $password = 'LabaiSlaptas123';
           $dbname = 'auto';
       
           $conn = new mysqli($servername, $username, $password, $dbname);
       
           if ($conn->connect_error) {
               die('Connection failed: '.$conn->connect_error);
           }
       
           $sql = "SELECT date, number, distance, time, 
                   distance/time * 3.6 AS speed from radars 
                   order by speed DESC Limit 10 offset 0";
           $rezult = $conn->query($sql);
       
           if ($rezult->num_rows > 0) {
               while($row = $rezult->fetch_assoc()) {
       
                   echo $row['date'].' '.$row['number'].' '.
                   $row['distance'].' '.$row['time'].' '.round($row['speed'], 1).'<br>';
               }
           } else {
                   echo '0 rezults';
               }
       
           $conn->close(); 
        ?> -->
        <br>
        <br>
        <form action="atgal.php">
            <input type="submit" value="Atgal">
            <input type="submit"  value="Pirmyn" formaction="pirmyn.php">
        </form>
    </body>
</html>