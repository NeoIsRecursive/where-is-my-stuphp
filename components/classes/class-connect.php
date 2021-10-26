<?php

declare(strict_types=1);

class dbh
{

    protected function connect(): object
    {
        $path = '/Users/neo/Development/GitHub/the-elephpant-in-the-room/db/elephpant.db';
        $pdo = new PDO('sqlite:' . $path);
        return $pdo;
    }
}
