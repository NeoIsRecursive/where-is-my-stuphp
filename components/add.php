<?php require __DIR__ . '/static/head.php' ?>
<div id="addToList" class="bg-green-500 p-3 m-1 flex gap-12 rounded-md">
    <input type="text" placeholder="name" name="name" id="itemName" class="p-1 rounded-md font-sans text-xl">
    <select name="location" required id="locationId">
    </select>
    <button onclick="addToLocation()">add</button>
</div>

<?php include __DIR__ . '/static/func_search.php' ?>

<div id="output" class="bg-green-50 m-1 p-3"></div>
<script src="scripts/index.js" onload="init()"></script>