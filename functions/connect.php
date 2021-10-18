<?php

// Create connection
try {
    $db = new PDO('sqlite:/Users/neo/Development/GitHub/the-elephpant-in-the-room/db/elephpant.db');
} catch (PDOException $err) {
    echo dirname(__FILE__);
    print_r($err->getMessage());
    exit;
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
            item_id INTEGER NOT NULL REFERENCES items (id),
            location_id INTEGER NOT NULL REFERENCES locations(id),
            amount int
        );'
    );
}
createTables($db);
