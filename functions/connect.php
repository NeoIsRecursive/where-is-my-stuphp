<?php

// Create connection
try {
    $db = new PDO('sqlite:' . $dir . '/db/elephpant.db');
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
                item_id INTEGER NOT NULL,
                amount INTEGER,
                location_id INTEGER NOT NULL,
                FOREIGN KEY(item_id) REFERENCES items(id)
            );'
    );
}
createTables($db);
