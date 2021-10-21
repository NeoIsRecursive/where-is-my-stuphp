<script>
    function printList(data) {
        const locations = data;
        data.forEach(location => {
            let option = document.createElement('option');
            option.value = location.id;
            option.innerText = location.name;
            document.getElementById('locationId').appendChild(option);
        });
    }

    function listOfBabel() {
        fetch('getWhere.php')
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

    function output(x) {
        document.getElementById('output').innerText = 'added ' + x + ' item(s).';
    }

    //AJAX request to add data to db instead of POST because
    //with AJAX the page doesnt have to be loaded again. 
    function addToLocation() {
        const itemName = document.getElementById('itemName').value;
        const locationId = document.getElementById('locationId').value;
        console.log(itemName + locationId);
        fetch('addToList.php?name=' + itemName + '&&locationId=' + locationId)
            .then(response => response.json())
            .then(data => {
                console.log(data)
                listOfBabel();
            });
    }
    fetch('getList.php')
        .then(response => response.json())
        .then(data => printList(data));
    listOfBabel();
</script>

<input type="text" placeholder="name" name="name" id="itemName">
<select name="location" required id="locationId">
</select>
<button onclick="addToLocation()">add</button>


<div id="output"></div>