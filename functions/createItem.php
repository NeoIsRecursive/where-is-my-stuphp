<?php
function createItem(object $pdo, string $tblName, string $name): bool | array
{
    $query = $pdo->prepare('INSERT INTO ' . $tblName . ' (name) VALUES (?)');
    try {
        $query->execute([$name]);
    } catch (PDOException $err) {
        if ($err->errorInfo[0] == 23000) {
            return false;
        } else {
            return $err->errorInfo;
        }
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    require_once 'connect.php';
    $test = createItem($db, $_POST['table'], $_POST['name']);
    if (!$test) {
        echo 'dupe';
    } else {
        echo "succesfully added your item";
    }
} else {
    echo "you are not supposed to be here?";
}
