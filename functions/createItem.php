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
