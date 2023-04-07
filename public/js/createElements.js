function createNewElement(data, num) {
    const tbody = document.getElementById("tbody");
    tbody.innerHTML += '<tr><th scope="row">' + num + '</th><td>' + data.name + '</td><td id=' + data.name.slice(0, 6) + '>' + data.status + '</td></tr>';
}

function updateElement(data, id) {
    if (data.status === 'accepted') {
        id.innerHTML = '<td><span class="border bg-success border-5 rounded-pill">' + data.status + '</span></td>';
    }
    else if (data.status === 'sent') {
        id.innerHTML = '<td><span class="border bg-warning rounded-pill">' + data.status + '</span></td>';
    }
    else if (data.status === 'rejected') {
        id.innerHTML = '<td><span class="border bg-danger rounded-pill">' + data.status + '</span></td>';
    }
}

function getAllRequests() {
    var num = 1;
    var ws = new WebSocket("ws://trusting-cultured-ceratonykus.glitch.me");
    ws.onopen = function (evt) {
        var matriz = ["JPY956. MOVIL.11", "EHN881 MOVIL.06"];
        ws.send(JSON.stringify(matriz));
    }

    ws.onerror = function (evt) {
        
    }
    ws.onclose = function (evt) {
        getAllRequests();
    }
    ws.onmessage = function (evt) {
        try {
            var data = JSON.parse(evt.data);
            alert(data);
            var id = document.getElementById(data.name.slice(0, 6));
            if (id === null) {
                createNewElement(data, num);
                num += 1;
            }
            else {
                updateElement(data, id);
            }
        }
        catch (e) {
            
        }
    }
}

window.addEventListener('load', getAllRequests());