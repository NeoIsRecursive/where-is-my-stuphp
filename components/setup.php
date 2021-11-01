<?php

declare(strict_types=1);
require_once __DIR__ . '/classes/class-crud.php';

$pdo = new crud;
$pdo->createTables();
