function getAllRequests() {
    var num = 1;
    var numRequests = 0;
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
            var id = document.getElementById(data.name.slice(0, 6));
            if (id === null) {
                
            }
            else {
                
            }
        }
        catch (e) {
            
        }
    }
}