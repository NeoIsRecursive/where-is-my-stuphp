<?php

declare(strict_types=1);
require_once __DIR__ . '/class-connect.php';

class crud extends dbh
{

    //get associatve array of all locations
    public function getLocations(): array
    {
        $pdo = $this->connect();
        $sql = 'SELECT * FROM locations';
        $statement = $pdo->query($sql);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    //get associatve array of all items that have been assigned a location
    public function getWhereItemsAreStored(): array
    {
        $pdo = $this->connect();
        $sql = 'SELECT items.name AS item,locations.name AS location
        FROM item_location
        INNER JOIN items ON  item_location.item_id = items.id
        INNER JOIN locations ON item_location.location_id = locations.id
        ORDER BY location';
        $statement = $pdo->query($sql);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    //'create' new item and location functions, exactly the same and could
    //  have been one but I think that it looks better to have separete functions
    //  instead of having to pass in the table name
    public function newItem(string $name): void
    {
        $pdo = $this->connect();
        $query = $pdo->prepare('INSERT INTO items (name) VALUES (?)');
        $query->execute([$name]);
    }

    public function newLocation(string $name): void
    {
        $pdo = $this->connect();
        $query = $pdo->prepare('INSERT INTO locations (name) VALUES (?)');
        $query->execute([$name]);
    }

    public function addToLocation(string $itemName, int $locationId): int
    {
        $pdo = $this->connect();
        $query = $pdo->prepare("INSERT INTO item_location (item_id,location_id) VALUES (
            (SELECT id FROM items WHERE name = ?),?)");
        $query->execute([
            $itemName, $locationId
        ]);
        return $query->rowCount();
    }

    public function createTables(): void
    {
        $pdo = $this->connect();
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
}
