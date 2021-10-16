<?php

// Create connection
try {
    $db = new PDO('sqlite:db/elephpant.db');
} catch (Exception $err) {
    "could not find database\n$err";
}

//creates table
function createTables(object $pdo): void
{
    $createTable = $pdo->exec(
        'CREATE TABLE IF NOT EXISTS items (
                id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(30)
            );'
    );
    $createTable = $pdo->exec(
        'CREATE TABLE IF NOT EXISTS locations (
                id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(30)
            );'
    );
    $createTable = $pdo->exec(
        'CREATE TABLE IF NOT EXISTS item_location (
                item_id INTEGER,
                location_id INTEGER
            );'
    );
}

createTables($db);
//select from table as associative
// $query = $db->query('SELECT * FROM people');
// $rows = $query->fetchAll(PDO::FETCH_ASSOC);
// foreach ($rows as $row) {
//     echo $row['name'] . "<br>";
// }
