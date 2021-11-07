<?php

declare(strict_types=1);
require_once __DIR__ . '/classpath.php';
require_once $path . '/classes/class-crud.php';

function search(string $query): array
{
    $pdo = new Crud;
    $items = $pdo->getWhereItemsAreStored();
    $result = [];
    foreach ($items as $row) {
        $found = false;
        foreach ($row as $val) {
            if (str_contains($val, $query) && $found === false) {
                $result[] = $row;
                $found = true;
            }
        }
    }
    return $result;
}

echo json_encode(search($_REQUEST['query']));
