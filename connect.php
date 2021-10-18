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
                name VARCHAR UNIQUE
            );'
    );
    $createTable = $pdo->exec(
        'CREATE TABLE IF NOT EXISTS locations (
                id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                name VARCHAR UNIQUE
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
    try {
        $query->execute([$name]);
    } catch (PDOException $err) {
        echo "this already exists! \n$err\n";
    }
}

function addItemToLocation(object $pdo, int $item, int $location, int $amount)
{
    $query = $pdo->prepare('INSERT INTO item_location (item_id,amount,location_id) VALUES (?,?,?)');
    $query->execute([
        $item, $amount, $location
    ]);
}

function listAllWhere(object $pdo, int $limit = 0): array | bool
{
    $sql = 'SELECT items.name AS item , item_location.amount ,locations.name AS location FROM item_location
            INNER JOIN items ON  item_location.item_id = items.id
            INNER JOIN locations ON item_location.location_id = locations.id
            ' . ($limit !== 0 ? " LIMIT $limit;" : ';');
    $query = $pdo->query($sql);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) <= 0) {
        return false;
    } else {
        return $rows;
    }
}

createTables($db);
createItem($db, 'items', 'mjölk1');
createItem($db, 'locations', 'låda1');
addItemToLocation($db, 3, 1, 1);
$items = listAllWhere($db);
foreach ($items as $row) {
    print_r($row);
}

if (array_search("test2", $items)) {
    echo "already exists";
} else {
    echo "we add";
}
