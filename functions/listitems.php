<p>All of your items:</p>
<ul>
    <?php
    $items = getList(pdo: $db, limit: 5);
    if ($items) :
        foreach ($items as $row) : ?>
            <li>
                <?php
                foreach ($row as $key => $col) {
                    echo $col . ($key === 'amount' ? ' st ' : ' ');
                } ?>
            </li>
    <?php endforeach;
    else :
        echo "you dont have stuff";
    endif; ?>
</ul>