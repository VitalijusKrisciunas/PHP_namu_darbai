<?php

require_once $dir . '/models/radars.php';

$id = $_REQUEST['id'];

Radar::remove($id);

$radars = Radar::all(100, 0);

include $dir . '/views/radars/list.php';
