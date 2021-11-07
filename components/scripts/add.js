//AJAX request to add data to db instead of POST because
//with AJAX the page doesnt have to be loaded again. 
function addToLocation() {
    const itemName = document.getElementById('itemName').value;
    const locationId = document.getElementById('locationId').value;
    fetch('components/api/addToList.php?name=' + itemName + '&&locationId=' + locationId)
        .then(response => response.json())
        .then(data => {
            document.getElementById('itemName').value = "";
            //listAll();
        });

}

//add new location 
function addLocation() {
    const locationName = document.getElementById('locationName').value;
    fetch('components/api/addLocation.php?name=' + locationName)
        .then()
        .then(() => {
            init();
            document.getElementById('locationName').value = '';
        });
}

//event listeners, heard this was best practice but I am using onclick for everything else -\(o-o)/-
document.getElementById('addListBtn').addEventListener('click', () => addToLocation());
document.getElementById('locationBtn').addEventListener('click', () => addLocation());