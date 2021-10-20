<?php
require __DIR__ . '/connect.php';
require __DIR__ . '/insert.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $table = 'items';
    $name = $_POST['name'];
    $location = $_POST['location'];
    if ($table == "" || $name == "" || $location == "") {
        die('you didnt enter any values');
    }
    require_once 'connect.php';
    $test = createItem($db, $table, $name);
    if (!$test) {
        echo 'dupe';
        addItemToLocation($db, $name, $location);
    } else {
        addItemToLocation($db, $name, $location);
    }
} else {
    echo "you are not supposed to be here?";
}
