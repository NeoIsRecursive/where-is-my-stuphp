<?php

// Create connection
$pdo = new PDO('sqlite:db/elephpant.db');

function tableExist(object $conn, string $table): bool
{
    try {
        $tryConn = $conn->query("SELECT 1 FROM $table");
    } catch (Exception $error) {
        return false;
    }
    return $tryConn !== false;
}
echo tableExist($pdo, 'test') ? "succes!" : "no #errorgang";
