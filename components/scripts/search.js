function search(query) {
    fetch('search.php?query=' + query)
        .then(response => response.json())
        .then(data => {
            output = document.getElementById('result');
            output.innerText = "";
            if (data.length < 1) {
                output.innerText = "found no matches";
                return;
            }
            data.forEach(row => {
                let text = document.createElement('p');
                text.innerText = row.item + " hittar du i " + row.location;
                output.appendChild(text);
            });
        });
}