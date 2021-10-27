<?php

require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';

$locationName = $_REQUEST['name'];

$pdo = new crud;
try {
    $location = $pdo->newLocation($locationName);
} catch (PDOException $err) {
    if ($err->getCode() != 23000) {
        die(var_dump($err->errorInfo));
    }
}
echo $location;
