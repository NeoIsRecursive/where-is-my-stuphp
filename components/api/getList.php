<?php

require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';

$pdo = new crud;
$locations = $pdo->getLocations();
echo json_encode($locations);
