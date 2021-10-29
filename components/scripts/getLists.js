//get all locations and add them to the 'location picker'
function init() {
    fetch('components/api/getList.php')
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
    fetch('components/api/getWhere.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const output = document.getElementById('result');
            output.innerText = "";
            data.forEach(row => {
                listItems(row);
            });
        });

}

//prints out the name, location and a button that leads to more info about the item
function listItems(row) {
    let text = document.createElement('p');
    let btn = document.createElement('button');
    const output = document.getElementById('result');
    btn.innerText = 'see more';
    btn.setAttribute('onclick', 'getItem(' + row.id + ')');
    text.innerText = row.item + " hittar du i " + row.location + " ";
    text.appendChild(btn);
    output.appendChild(text);
}