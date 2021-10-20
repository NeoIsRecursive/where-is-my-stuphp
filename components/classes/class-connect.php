<?php

class dbh
{

    protected function connect()
    {
        $path = '/Users/neo/Development/GitHub/the-elephpant-in-the-room/db/elephpant.db';
        $pdo = new PDO('sqlite:' . $path);
        return $pdo;
    }
}
