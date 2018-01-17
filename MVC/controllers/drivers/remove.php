<?php

require_once $dir . '/models/drivers.php';

$driverid = $_REQUEST['driverid'];

Driver::remove($driverid);

$drivers = Driver::all(100,0);

include $dir . '/views/drivers/list.php';
