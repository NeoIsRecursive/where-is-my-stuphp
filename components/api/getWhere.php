<?php

require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';

$pdo = new crud;
$list = $pdo->getWhereItemsAreStored();
echo json_encode($list);
