<?php require __DIR__ . '/static/head.php' ?>
<div id="addToList" class="">
    <input type="text" placeholder="name" name="name" id="itemName" class="">
    <select name="location" required id="locationId">
    </select>
    <button onclick="addToLocation()">add</button>
</div>

<?php include __DIR__ . '/static/func-search.php' ?>

<div id="output" class=""></div>
<script src="scripts/index.js" onload="init()"></script>