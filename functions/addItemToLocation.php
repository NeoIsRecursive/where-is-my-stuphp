<?php
function addItemToLocation(object $pdo, int $item, int $location, int $amount)
{
    $query = $pdo->prepare('INSERT INTO item_location (item_id,amount,location_id) VALUES (?,?,?)');
    $query->execute([
        $item, $amount, $location
    ]);
}
