<?php
require_once __DIR__ . '/classes/class-crud.php';

$pdo = new crud;
$list = $pdo->getWhereItemsAreStored();
echo json_encode($list);
