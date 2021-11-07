<div id="addToList" class="addToList card">
    <input type="text" placeholder="item name" name="name" id="itemName" autocomplete="password">
    <select name="location" required id="locationId">
    </select>
    <button id="addListBtn">add</button>
</div>


<div id="addLocation" class="addLocation card">
    <input type="text" placeholder="new location name" name="name" id="locationName" autocomplete="password">
    <button id="locationBtn">add</button>
</div>


<div id="search" class="card">
    <input type="text" placeholder="search" id="searchBtn">
    <button onclick="search(document.getElementById('searchBtn').value)">search</button>
</div>

<div class="items">
    <div id="result"></div>
    <div id="activeItem"></div>
    <a class="link" href="https://github.com/NeoIsRecursive/where-is-my-stuphp#how-to-use" target="_blank">how to use</a>
</div>

<!-- SCRIPTS -->
<script src="components/scripts/getLists.js" onload="init()"></script>
<script src="components/scripts/add.js"></script>
<script src="components/scripts/manageItem.js"></script>
<script src="components/scripts/search.js"></script>