function createNewElement() {
    alert("works");
    const newElement = document.createElement("div");
    newElement.classList.add("div");
    newElement.textContent = "soy un div creado con javascript";
    document.querySelector(".container").appendChild(newElement);
    getAllRequests();
}

function getAllRequests() {
    var ws = new WebSocket("ws://trusting-cultured-ceratonykus.glitch.me");
    ws.onopen = function(evt) {
        alert("abierta la conexion");

        var matriz = [{name: "JPY956. MOVIL.11"}];

        ws.send(JSON.stringify(matriz));
    }

    ws.onerror = function(evt) {
        alert("error de conexion " + evt);
    }
    ws.onclose = function(evt) {
        alert("close");
    }
    ws.onmessage = function(evt) {
        alert(evt.data);
    }
}

window.addEventListener('load', createNewElement());