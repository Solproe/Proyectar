function createNewElement(data, num) {
    const tbody = document.getElementById("tbody");
    alert(data.name);
    tbody.innerHTML += '<tr><th scope="row">1</th><td>' + data.name + '</td><td>' + data.status + '</td></tr>';
}

function getAllRequests() {
    var num = 1;
    var ws = new WebSocket("ws://trusting-cultured-ceratonykus.glitch.me");
    ws.onopen = function(evt) {
        var matriz = ["JPY956. MOVIL.11", "EHN881 MOVIL.06"];

        ws.send(JSON.stringify(matriz));
    }

    ws.onerror = function(evt) {
        alert("error de conexion " + evt);
    }
    ws.onclose = function(evt) {
        alert("close");
    }
    ws.onmessage = function(evt) {
        var data = JSON.parse(evt.data);
        createNewElement(data, num);
        num += 1;
    }
}

window.addEventListener('load', getAllRequests());