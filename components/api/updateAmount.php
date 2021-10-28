<?php

require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';

if (isset($_REQUEST['id'], $_REQUEST['amount'])) {

    $pdo = new crud;
    $update = $pdo->updateAmount($_REQUEST['id'], $_REQUEST['amount']);
    echo json_encode($update);
} else {
    echo "ERROR VARIABLES NOT SET";
}
