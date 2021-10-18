<form method="POST" action="functions/createItem.php">
    <input type="text" placeholder="name" name="name">
    <input type="submit" value="create"><br>
    <input type="radio" name="table" id="items" value="items" required>
    <label for="items">new item</label><br>
    <input type="radio" name="table" id="location" value="locations">
    <label for="location">new location</label><br>
</form>