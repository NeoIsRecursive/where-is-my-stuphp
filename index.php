<?php

require_once __DIR__ . '/components/classes/class-crud.php';

$pdo = new crud;
$cool = $pdo->getWhereItemsAreStored();
print_r($cool);
?>
<a href="components/add.php">Manage my items</a>