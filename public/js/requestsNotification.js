function addRequests(data, num) {
    
    var name = data.plate.slice(0, 6);

    var id = name + "-status";

    $('#icon-notification').append('<span class="badge badge-warning navbar-badge" id="num-notifications">' +
        num + '</span>');

    $('#header-notifications').html('<span class="dropdown-header">' + num +
        ' Notifications</span>');

    if (data.status === 'sent') {
        $('#list-requests').append('<a href="#" class="dropdown-item" id=' + name + 
        '><i class="fas fa-ambulance mr-2"></i>' +
        name + '<span class="float-right text-sm" style="color: orange;" id=' + id + '>' + data.status +
            '</span></a>');
        $('#list-requests').append('<div class="dropdown-divider"></div>');
    }
    else if (data.status === 'accepted') {
        $('#list-requests').append('<a href="#" class="dropdown-item" id=' + name + 
            '><i class="fas fa-ambulance mr-2"></i>' +
            name + '<span class="float-right text-sm" style="color: green;" id=' + id + '>' + data.status +
            '</span></a>');
        $('#list-requests').append('<div class="dropdown-divider"></div>');
    }
    else if (data.status === 'rejected') {
        $('#list-requests').append('<a href="#" class="dropdown-item" id=' + name + 
            '><i class="fas fa-ambulance mr-2"></i>' +
            name + '<span class="float-right text-sm" style="color: red;" id=' + id + '>' + data.status +
            '</span></a>');
        $('#list-requests').append('<div class="dropdown-divider"></div>');
    }
}

function updateRequests(data) {

    var name = data.plate.slice(0, 6);

    var id = "#" + name + "-status";

    if (data.status === 'sent') {
        $(id).text(data.status);
        $(id).css("color", "orange");
    }
    else if (data.status === 'accepted') {
        $(id).text(data.status);
        $(id).css("color", "green");
    }
    else if (data.status === 'rejected') {
        $(id).text(data.status);
        $(id).css("color", "red");
    }
    
}

function getAllRequests() {
    var num = 0;
    var ws = new WebSocket("ws://trusting-cultured-ceratonykus.glitch.me");
    ws.onopen = function (evt) {
        var req = {
            type: 'getstate',
        };
        ws.send(JSON.stringify(req));
    }

    ws.onerror = function (evt) {

    }
    ws.onclose = function (evt) {
        getAllRequests();
    }
    ws.onmessage = function (evt) {
        try {
            var data = JSON.parse(evt.data);
            if (data.plate !== undefined)
            {
                var id = document.getElementById(data.plate.slice(0, 6));
            }
            
            if (id === null) {
                num += 1;
                addRequests(data, num);
            }
            else if (id !== null){
                updateRequests(data);
            }
        }
        catch (e) {

        }
    }
}

window.addEventListener('load', getAllRequests());
