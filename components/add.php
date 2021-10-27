<?php require __DIR__ . '/static/head.php' ?>
<?php include 'static/func-search.php' ?>
<div id="addToList" class="addToList">
    <input type="text" placeholder="item name" name="name" id="itemName" class="">
    <select name="location" required id="locationId">
    </select>
    <button id="addListBtn">add</button>
</div>
<div id="addLocation" class="addLocation">
    <input type="text" placeholder="new location name" name="name" id="locationName" class="">
    <button id="locationBtn">add</button>
</div>

<div id="activeItem"></div>


<div id="output" class=""></div>
<script src="scripts/index.js" onload="init()"></script>
<script src="scripts/manageItem.js"></script>