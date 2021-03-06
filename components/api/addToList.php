<?php

declare(strict_types=1);
require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';

if (isset($_REQUEST['name'], $_REQUEST['locationId'])) {
    $locationId = $_REQUEST['locationId'];
    $itemName = $_REQUEST['name'];
    if (trim($itemName) === '') {
        echo '{ "error" :"you didnt insert anything"}';
        die();
    } else {
        $pdo = new Crud;
        try {
            $item = $pdo->newItem($itemName);
        } catch (PDOException $err) {
            if ($err->getCode() != 23000) {
                die(var_dump($err->errorInfo));
            }
        }
        $add = $pdo->addToLocation($itemName, intval($locationId));
        echo $add;
    }
}
