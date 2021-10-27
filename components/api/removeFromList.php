<?php

declare(strict_types=1);
require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $pdo = new crud;
    $removed = $pdo->removeFromList(intval($id));
    echo json_encode($removed);
}
