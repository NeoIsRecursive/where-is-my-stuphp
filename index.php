<?php
$dir = __DIR__;
require __DIR__ . '/functions/connect.php';
require __DIR__ . '/functions/listAll.php';
$items = getList(pdo: $db, limit: 5);
?>
<p>All of your items:</p>
<ul>
    <?php
    foreach ($items as $row) : ?>
        <li>
            <?php
            foreach ($row as $key => $col) {
                echo $col . ($key === 'amount' ? ' st ' : ' ');
            } ?>
        </li>
    <?php endforeach; ?>
</ul>