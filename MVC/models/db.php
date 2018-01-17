<?php

function connectDB() {
    static $conn = null;

    $servername = 'localhost';
    $dbname = 'auto';
    $username = 'auto';
    $password = 'LabaiSlaptas123';

    if (!$conn) {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die('Nepavyko prisjungti: ' . $conn->connect_error);
        }
    }
    return $conn;
}
