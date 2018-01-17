<?php

require_once $dir . '/models/radars.php';

$id = $_REQUEST['id'];
$a = Radar::get($id);

require_once $dir . '/views/radars/forma.php';
Radar::update($id);

$radars = Radar::all(100,0);
include $dir . '/views/radars/list.php';
?>
