<?php

require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';


$id = $_REQUEST['id'];

$pdo = new crud;
try {
    $itemInfo = $pdo->getItem($id);
} catch (PDOException $err) {
    if ($err->getCode() != 23000) {
        die(var_dump($err->errorInfo));
    }
}
echo json_encode($itemInfo);