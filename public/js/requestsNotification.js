function addRequests(data, num) {
    var id = document.getElementsByClassName('notification-bell');
    alert(id);
    $('.notification-bell').html('<i clas="notification-bell far fa-bell></i>');
    /* $('.dropdown-menu').append('<li id=' + data.name.slice(0, 6) +
        '><div>' + data.name.slice(0, 6) + '</div><div>' + data.status + '</div></li>'); */
}

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
        var num = 1;
        try {
            $('.notification-bell').html('<i clas="notification-bell far fa-bell></i>');
            var data = JSON.parse(evt.data);
            var id = document.getElementById(data.name.slice(0, 6));
            if (id === null) {
                alert(data.name);
                addRequests(data, num);
                num += 1;
            }
        }
        catch (e) {
            
        }
    }
}

window.addEventListener('load', getAllRequests());
