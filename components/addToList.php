<?php

require_once __DIR__ . '/classes/class-crud.php';

$locationId = $_REQUEST['locationId'];
$itemName = $_REQUEST['name'];

$pdo = new crud;
$item = $pdo->newItem($itemName);
$add = $pdo->addToLocation($itemName, $locationId);
echo $add;
