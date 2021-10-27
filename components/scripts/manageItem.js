function showItem(itemInfo) {
    const box = document.getElementById('activeItem');
    box.innerHTML = '';
    let info = document.createElement('p');
    console.log(itemInfo);
    info.innerText = `name: ${itemInfo.item}. Location: ${itemInfo.location}. amount: ${itemInfo.amount}`;
    removeBtn = document.createElement('button');
    info.id = "item" + itemInfo.id;
    removeBtn.innerText = 'remove';
    removeBtn.setAttribute('onclick', 'remove(' + itemInfo.id + ')');
    info.appendChild(removeBtn);
    box.appendChild(info);
}

function getItem(x) {
    fetch('api/getItem.php?id=' + x)
        .then(response => response.json())
        .then(data => showItem(data[0]));
}

function remove(id) {
    fetch('api/removeFromList.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            console.log("removed " + data + " lines");
            document.getElementById('item' + id).remove();
        });
}