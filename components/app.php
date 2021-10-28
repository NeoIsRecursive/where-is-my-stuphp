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
<?php include 'static/func-search.php' ?>

<div id="activeItem"></div>


<div id="output" class=""></div>
<script src="components/scripts/getLists.js" onload="init()"></script>
<script src="components/scripts/add.js"></script>
<script src="components/scripts/manageItem.js"></script>