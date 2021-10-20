<?php

function getList(object $pdo, int $limit = 0): array
{
    $sql = 'SELECT items.name AS item,locations.name AS location
            FROM item_location
            INNER JOIN items ON  item_location.item_id = items.id
            INNER JOIN locations ON item_location.location_id = locations.id
            ' . ($limit !== 0 ? " LIMIT $limit;" : ';');
    $query = $pdo->query($sql);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getLocations($pdo)
{
    $sql = 'SELECT id,name FROM locations';
    $query = $pdo->query($sql);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
