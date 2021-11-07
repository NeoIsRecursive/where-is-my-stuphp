<?php

declare(strict_types=1);
require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';
if (isset($_REQUEST['name'])) {
    $locationName = $_REQUEST['name'];
    if (trim($locationName) === '') {
        echo '{ "error" :"you didnt insert anything"}';
        die();
    } else {
        $pdo = new Crud;
        try {
            $location = $pdo->newLocation($locationName);
        } catch (PDOException $err) {
            if ($err->getCode() != 23000) {
                $location = json_encode($err);
            } else if ($err->getCode() == 2300) {
                //if its a dupe, then do nothing -\(*-*)/-
            }
        }
        echo $location;
    }
}
