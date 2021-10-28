function search(query) {
    fetch('components/api/search.php?query=' + query)
        .then(response => response.json())
        .then(data => {
            output = document.getElementById('result');
            output.innerText = "";
            if (data.length < 1) {
                output.innerText = "found no matches";
                return;
            }
            data.forEach(row => {
                listItems(row);
            });
        });
}