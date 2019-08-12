var xhr = new XMLHttpRequest();

function doGet() {
    console.log('doGet()');

    xhr.onreadystatechange = function() {
        console.log('xhr.onreadystatechange()');

        console.log('xhr.readyState: ' + xhr.readyState);

        if (xhr.readyState == XMLHttpRequest.DONE) {
            console.log(xhr.responseText);

            var obj = JSON.parse(xhr.responseText);

            console.log(obj);

            clearTable();
            
            var table = document.getElementById("tableItems");

            obj.forEach(function(item, index, array) {
                console.log('[Item] ID=' + item.id + ', Nome: ' + item.name);

                // Insert table row

                var row = table.insertRow();

                var cell1 = row.insertCell(0);
                cell1.innerHTML = item.id;

                var cell2 = row.insertCell(1);
                cell2.innerHTML = item.name;
            });
        }
    }

    xhr.open("get", "rest/get.php", true);

    xhr.send(null);
}

function addItem() {
    console.log('addItem()');

    var itemName = document.getElementById('form_name').value;

    console.log('[ITEM] nome: ' + itemName);

    xhr.onreadystatechange = function() {
        console.log('xhr.onreadystatechange()');

        console.log('xhr.readyState: ' + xhr.readyState);
        console.log('xhr.status: ' + xhr.status);

        if (xhr.readyState == XMLHttpRequest.DONE) {
            console.log(xhr.responseText);

            var obj = JSON.parse(xhr.responseText);

            console.log(obj);

            if (obj.error != null) {
                console.error('Error: ' + obj.error);

                return;
            }

            clearTable();

            var table = document.getElementById("tableItems");

            obj.forEach(function(item, index, array) {
                console.log('[Item] ID=' + item.id + ', Nome: ' + item.name);

                // Insert table row

                var row = table.insertRow();

                var cellID = row.insertCell(0);
                cellID.innerHTML = item.id;

                var cellName = row.insertCell(1);
                cellName.innerHTML = item.name;
            });
        }
    }

    xhr.open("POST", "rest/post.php", true);

    //xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.send(JSON.stringify({'name': itemName}));
}

function clearTable() {
    var table = document.getElementById("tableItems");

    console.log('table rows: ' + table.rows.length);

    while (table.rows.length > 1) {
        table.deleteRow(table.rows.length - 1);
    }
}