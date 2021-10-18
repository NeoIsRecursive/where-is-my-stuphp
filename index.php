
        <?php
        $dir = __DIR__;
        require __DIR__ . '/functions/connect.php';
        require __DIR__ . '/functions/listAll.php';
        $items = getList(pdo: $db, limit: 5);
        echo ($items);
        ?>