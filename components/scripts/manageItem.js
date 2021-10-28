function showItem(itemInfo) {
    const box = document.getElementById('activeItem');
    box.innerHTML = '';
    let info = document.createElement('p');
    console.log(itemInfo);
    info.innerText = `name: ${itemInfo.item}. Location: ${itemInfo.location}. amount:`;
    info.id = "item" + itemInfo.id;

    let removeBtn = document.createElement('button');
    removeBtn.innerText = 'remove';
    removeBtn.setAttribute('onclick', 'remove(' + itemInfo.id + ')');

    let amount = document.createElement('input');
    amount.id = 'amount';
    amount.type = 'number';
    amount.value = itemInfo.amount;

    let changeAmount = document.createElement('button');
    changeAmount.innerText = 'update';
    changeAmount.setAttribute('onclick', 'updateAmount(' + itemInfo.id + ')');

    info.appendChild(amount);
    info.appendChild(changeAmount);
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

function updateAmount(id) {
    let amount = document.getElementById('amount').value;
    fetch('api/updateAmount.php?id=' + id + '&amount=' + amount)
        .then(response => response.json())
        .then(data => {
            console.log("changed lines: " + data);
        });
}