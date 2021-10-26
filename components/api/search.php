<?php

declare(strict_types=1);
require_once __DIR__ . '/classes/class-crud.php';

function search(string $query): array
{
    $pdo = new crud;
    $items = $pdo->getWhereItemsAreStored();
    $result = [];
    foreach ($items as $row) {
        foreach ($row as $key => $val) {
            if ((str_contains($val, $query))) {
                $result[] = $row;
            }
        }
    }
    return $result;
}

echo json_encode(search($_REQUEST['query']));
