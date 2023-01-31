function data() {

    var ws = new WebSocket("ws://trusting-cultured-ceratonykus.glitch.me");
    ws.onopen = function(evt) {
        alert("abierta la conexion");
        var data = {
            type: "transfer",
            name: "JPY956. MOVIL.11",
            device: "eHVyCDZlTCSKOb0BXoyFuZ:APA91bETTYsLs2J-YRtJ2z1HxTl2RIc1JTs8iJHSEAm2XXF1r3071_6PYAwFJIvubeGlS81InkTctN8u-RMKZdt5AdSOWzEZDbMDd7Zcs_N5FuoatOhIDbxF5KlJpvE3m5sknIAu7CSe",
            from: {
                lat: 10.445672,
                lng: -73.238404,
            },
            to: {
                lat: 10.432587,
                lng: -73.251883,
            },
            message: "El paramo",
            status: "sent",
        };

        var matriz = ["data1", "data2", "data3"];

        ws.send(JSON.stringify(data));
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

window.addEventListener('load', data());