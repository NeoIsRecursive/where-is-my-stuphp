<?php

declare(strict_types=1);

class dbh
{

    protected function connect(): object
    {
        require __DIR__ . '/path.php';
        $pdo = new PDO('sqlite:' . $path);
        return $pdo;
    }
}
