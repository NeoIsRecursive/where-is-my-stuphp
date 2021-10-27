//print the location options
function init() {
    fetch('api/getList.php')
        .then(response => response.json())
        .then(data => {
            const locations = data;
            document.getElementById('locationId').innerHTML = "";
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
                listItems(row);
            });
        });

}

function listItems(row) {
    let text = document.createElement('p');
    let btn = document.createElement('button');
    btn.innerText = 'see more';
    btn.setAttribute('onclick', 'getItem(' + row.id + ')');
    text.innerText = row.item + " hittar du i " + row.location + " ";
    text.appendChild(btn);
    output.appendChild(text);
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
            document.getElementById('itemName').value = "";
            //listAll();
        });

}
function addLocation() {
    const locationName = document.getElementById('locationName').value;
    fetch('api/addLocation.php?name=' + locationName)
        .then()
        .then(() => {
            init();
            document.getElementById('locationName').value = '';
        });
}


document.getElementById('addListBtn').addEventListener('click', () => addToLocation());
document.getElementById('locationBtn').addEventListener('click', () => addLocation());