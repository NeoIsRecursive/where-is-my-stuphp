<?php

require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/getList.php';
$rows = getLocations($db);
if (!$rows) {
    echo 'error loading in locations';
}

?>

<form method="POST" action="doStuff.php">
    <input type="text" placeholder="name" name="name">
    <select name="location" required>
        <?php foreach ($rows as $row) :
            $id = $row['id'];
            $name = $row['name'];
        ?>

            <option value="<?= $id ?>"><?= $name ?></option>

        <?php endforeach; ?>
    </select>
    <input type="submit" value="add">

</form>