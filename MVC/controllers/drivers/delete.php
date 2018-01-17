<?php

require_once $dir . '/models/drivers.php';

$driverid = $_REQUEST['driverid'];
echo "AHA - nori kazkas istrinti  irasa: $driverid";

$a = Driver::get($driverid);

include $dir . '/views/drivers/ask_delete.php';
