<?php

require_once $dir . '/models/db.php';

class Driver 
{
    public $driverid;
    public $name;
    public $city;

    function assignFromDB($row) 
    {
        $this->driverid = $row['driverid'];
        $this->name = $row['name'];
        $this->city = $row['city'];    
    }

    static function all($limit, $offset) 
    {
        $conn = connectDB();
        $sql = 'SELECT * FROM drivers ORDER BY `name` DESC';

        $result = $conn->query($sql);

        $drivers = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $a = new Driver();
                $a->assignFromDB($row);
                $drivers[] = $a;
            }
        }
        return $drivers;
    }


    static function get($driverid) 
    {
        if (!is_numeric($driverid)) return null;
        
        $conn = connectDB();
        $sql = 'SELECT * FROM drivers WHERE driverid = '.$driverid;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $a = new Driver();
            $a->assignFromDB($row);
            return $a;
        }
        return null;
    }

    static function remove($driverid)
    {
        $conn = connectDB();
        $sql = "DELETE FROM drivers WHERE driverid = ?";
        $sqls = $conn->prepare($sql);
        $sqls->bind_param("i", $driverid);
        $sqls->execute();
    }

    static function update($driverid)
    {
        $conn = connectDB();
        if (isset($_POST['save'])) {
            // formos kintamieji
            $name = $_POST['name'];
            $city = $_POST['city'];

            echo "update";
            $sql = "UPDATE drivers SET name = ?, city = ? WHERE driverid = ?";
            $sqls = $conn->prepare($sql);
            $sqls->bind_param("ssi", $name, $city, $driverid);
            $sqls->execute();
        }
    }

    static function new()
    {
        echo "insert";
        $sql = "INSERT INTO drivers(name, city) VALUES(?,?)";
        $sqls = $conn->prepare($sql);
        $sqls->bind_param("ss", $name, $city);
        $sqls->execute();
    }
}