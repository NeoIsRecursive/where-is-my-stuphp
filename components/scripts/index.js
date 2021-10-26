//print the location options
function init() {
    fetch('api/getList.php')
        .then(response => response.json())
        .then(data => {
            const locations = data;
            data.forEach(location => {
                let option = document.createElement('option');
                option.value = location.id;
                option.innerText = location.name;
                document.getElementById('locationId').appendChild(option);
            });
        });
    return "succes";

}

//get the list where everything is
function listAll() {
    fetch('api/getWhere.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const output = document.getElementById('output');
            output.innerText = "";
            data.forEach(row => {
                let text = document.createElement('p');
                text.innerText = row.item + " hittar du i " + row.location;
                output.appendChild(text);
            });
        });

}

//AJAX request to add data to db instead of POST because
//with AJAX the page doesnt have to be loaded again. 
function addToLocation() {
    const itemName = document.getElementById('itemName').value;
    const locationId = document.getElementById('locationId').value;
    console.log(itemName + locationId);
    fetch('api/addToList.php?name=' + itemName + '&&locationId=' + locationId)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            alert('added ' + itemName);
            document.getElementById('itemName').value = "";
            listAll();
        });
}