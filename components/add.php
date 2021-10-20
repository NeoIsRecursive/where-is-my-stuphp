<?php

require_once __DIR__ . '/classes/class-crud.php';

$pdo = new crud;
$locations = $pdo->getLocations();
$pdo = null;

?>
<script>
    function output(x) {
        document.getElementById('output').innerText = 'added ' + x + ' item(s).';
    }

    //AJAX request to add data to db instead of POST because
    //with AJAX the page doesnt have to be loaded again. 
    function addToLocation() {
        let itemName = document.getElementById('itemName').value;
        let locationId = document.getElementById('locationId').value;
        console.log(itemName + locationId);
        let xhtml = new XMLHttpRequest();
        xhtml.onreadystatechange = () => {
            if (xhtml.readyState == 4 && xhtml.status == 200) {
                output(xhtml.responseText);
            }
        }
        xhtml.open("GET", "addToList.php?name=" + itemName + "&&locationId=" + locationId, true);
        xhtml.send();
    }
</script>

<input type="text" placeholder="name" name="name" id="itemName">
<select name="location" required id="locationId">
    <?php foreach ($locations as $location) :
        $id = $location['id'];
        $name = $location['name'];
    ?>

        <option value="<?= $id ?>"><?= $name ?></option>

    <?php endforeach; ?>
</select>
<button onclick="addToLocation()">add</button>


<div id="output"></div>