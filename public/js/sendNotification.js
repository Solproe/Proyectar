function data() {

    var ws = new WebSocket("ws://trusting-cultured-ceratonykus.glitch.me");
    ws.onopen = function(evt) {
        alert("abierta la conexion");
        var data = {
            type: "transfer",
            name: "JPY956. MOVIL.11",
            device: "fD2QDILlRB6KzSGIUClE8h:APA91bGzIA3iuPr_Gt3KpeX3Bpu9YJ3FWvActkWpBNcK4a1_3f8rawMPpGUJrw-OLOeJPHJMBB-VPY6IRtsF7fwzu5rl8HwUbVHrCKvWDGQ6xNhGTpux62AYGkFyeb2quYUj_g8U7vqW",
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