<?php

// Create connection
try {
    $db = new PDO('sqlite:db/elephpant.db');
} catch (Exception $err) {
    echo "could not find database\n$err";
}

//creates table
function createTables(object $pdo): void
{
    $createTable = $pdo->exec(
        'CREATE TABLE IF NOT EXISTS items (
                id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                name VARCHAR
            );'
    );
    $createTable = $pdo->exec(
        'CREATE TABLE IF NOT EXISTS locations (
                id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                name VARCHAR
            );'
    );
    $createTable = $pdo->exec(
        'CREATE TABLE IF NOT EXISTS item_location (
                item_id INTEGER,
                amount INTEGER,
                location_id INTEGER
            );'
    );
}
//select from table as associative
// $query = $db->query('SELECT * FROM people');
// $rows = $query->fetchAll(PDO::FETCH_ASSOC);
// foreach ($rows as $row) {
//     echo $row['name'] . "<br>";
// }

function createItem(object $pdo, string $tblName, string $name): void
{
    $query = $pdo->prepare('INSERT INTO ' . $tblName . ' (name) VALUES (?)');
    $query->execute([$name]);
}

function addItemToLocation(object $pdo, int $item, int $location, int $amount)
{
    $query = $pdo->prepare('INSERT INTO item_location (item_id,amount,location_id) VALUES (?,?,?)');
    $query->execute([
        $item, $amount, $location
    ]);
}

function listAllWhere($pdo)
{
    $query = $pdo->query(
        'SELECT items.name AS itemName , item_location.amount ,locations.name AS locname FROM item_location
        INNER JOIN items ON  item_location.item_id = items.id
        INNER JOIN locations ON item_location.location_id = locations.id;'
    );
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        print_r($row);
    }
}

// createTables($db);
// //createItem($db, 'items', 'test4');
// //createItem($db, 'locations', 'testplats3');
// addItemToLocation($db, 2, 1, 7);
// listAllWhere($db);
