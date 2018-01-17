<?php

require_once $dir . '/models/drivers.php';

$drivers = Driver::all(100, 0);

include $dir . '/views/drivers/list.php';