function createNewElement(data) {
    const newElement = document.createElement("div");
    newElement.classList.add("div");
    newElement.textContent = data;
    document.querySelector(".container").appendChild(newElement);
}

function getAllRequests() {
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
        var data = evt.data;
        createNewElement(data);
    }
}

window.addEventListener('load', getAllRequests());