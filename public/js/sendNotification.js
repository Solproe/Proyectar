
function transfer(plate, device, from, to) {
    var ws = new WebSocket("ws://trusting-cultured-ceratonykus.glitch.me");
    ws.onopen = function (evt) {
        var patientName = document.getElementById('patientName').value;
        var documentType = document.getElementById('documentType').value;
        var fate = document.getElementById('fate').value;
        var identification = document.getElementById('identification').value;
        var companions = document.getElementById('check').value;
        var birthday = document.getElementById('birthday').value;
        var transferDate = document.getElementById('transferDate').value;
        var diagnosis = document.getElementById('diagnosis').value;
        var transferTime = document.getElementById('transferTime').value;

        var data = {
            type: 'transfer',
            plate: plate,
            data: {
                patientName: patientName,
                documentTYpe: documentType,
                identification: identification,
                companions: companions,
                birthday: birthday,
                diagnosis: diagnosis,
            },
            from:{
                lat: from[0],
                lng: from[1],
            },
            to: {
                lat: to[0],
                lng: to[1],
            },
            device: device,
            message: address,
            time: transferTime,
            date: transferDate,
        };
        ws.send(JSON.stringify(data));
    }
}