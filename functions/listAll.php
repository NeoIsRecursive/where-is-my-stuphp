<?php

use function PHPSTORM_META\type;

function getList(object $pdo, int $limit = 0): array | bool
{
    $sql = 'SELECT items.name AS item , item_location.amount ,locations.name AS location
            FROM item_location
            INNER JOIN items ON  item_location.item_id = items.id
            INNER JOIN locations ON item_location.location_id = locations.id
            ' . ($limit !== 0 ? " LIMIT $limit;" : ';');
    $query = $pdo->query($sql);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($rows)) {
        return $rows;
    } else {
        return false;
    }
}
