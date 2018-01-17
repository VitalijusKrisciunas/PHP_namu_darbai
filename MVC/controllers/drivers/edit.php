<?php

require_once $dir . '/models/drivers.php';

$driverid = $_REQUEST['driverid'];
$a = Driver::get($driverid);

require_once $dir . '/views/drivers/forma.php';
Driver::update($driverid);

$drivers = Driver::all(100,0);
include $dir . '/views/drivers/list.php';
?>