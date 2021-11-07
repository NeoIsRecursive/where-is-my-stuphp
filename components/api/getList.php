<?php

declare(strict_types=1);
require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';

$pdo = new Crud;
$locations = $pdo->getLocations();
echo json_encode($locations);
