<?php

require_once __DIR__ . '/classes/class-crud.php';

$pdo = new crud;
$locations = $pdo->getLocations();
echo json_encode($locations);
