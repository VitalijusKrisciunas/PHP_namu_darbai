<?php

require_once $dir . '/models/db.php';

class Radar 
{
    public $id;
    public $date;
    public $number;
    public $distance;
    public $time;
    public $speed;
    public $driverId;

    function assignFromDB($row) 
    {
        $this->id = $row['id'];
        $this->date = $row['date'];
        $this->number = $row['number'];
        $this->distance = $row['distance'];
        $this->time = $row['time'];
        $this->speed = round($this->distance / $this->time * 3.6);
        $this->driverId = $row['driverid'];
    }

    static function all($limit, $offset) 
    {
        $conn = connectDB();
        $sql = 'SELECT * FROM radars ORDER BY `number`, `date` DESC';

        $result = $conn->query($sql);

        $radars = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $a = new Radar();
                $a->assignFromDB($row);
                $radars[] = $a;
            }
        }
        return $radars;
    }


    static function get($id) 
    {
        if (!is_numeric($id)) return null;
        
        $conn = connectDB();
        $sql = 'SELECT * FROM radars WHERE id = '.$id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $a = new Radar();
            $a->assignFromDB($row);
            return $a;
        }
        return null;
    }

    static function remove($id)
    {
        $conn = connectDB();
        $sql = "DELETE FROM radars WHERE id = ?";
        $sqls = $conn->prepare($sql);
        $sqls->bind_param("i", $id);
        $sqls->execute();
    }

    static function update($id)
    {
        $conn = connectDB();
        if (isset($_POST['save'])) {
            // formos kintamieji
            $date = $_POST['date'];
            $number = $_POST['number'];
            $distance = $_POST['distance'];
            $time = $_POST['time'];
            echo "update";
            $sql = "UPDATE radars SET date = ?, number = ?, distance = ?, time = ? 
            WHERE id = ?";
            $sqls = $conn->prepare($sql);
            $sqls->bind_param("ssddi", $date, $number, $distance, $time, $id);
            $sqls->execute();
        }
    }

    static function new()
    {
        echo "insert";
        $sql = "INSERT INTO radars(date, number, distance, time) VALUES
        (?,?,?,?)";
        $sqls = $conn->prepare($sql);
        $sqls->bind_param("ssdd", $date, $number, $distance, $time);
        $sqls->execute();
    }
}