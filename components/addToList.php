<?php

require_once __DIR__ . '/classes/class-crud.php';

$locationId = $_REQUEST['locationId'];
$itemName = $_REQUEST['name'];

$pdo = new crud;
try {
    $item = $pdo->newItem($itemName);
} catch (PDOException $err) {
    if ($err->getCode() == 23000) {
        echo "duplicate";
    }
}
$add = $pdo->addToLocation($itemName, $locationId);
echo $add;
