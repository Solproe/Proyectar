function transfer(plate, device, fromLat, fromLng, toLat, toLng, address) {
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

        alert(documentType);

        var data = {
            type: 'transfer',
            plate: plate,
            patient: {
                patientName: patientName,
                documentType: documentType,
                identification: identification,
                companions: companions,
                birthday: birthday,
                diagnosis: diagnosis,
            },
            from:{
                lat: fromLat,
                lng: fromLng,
            },
            to: {
                lat: toLat,
                lng: toLng,
            },
            token: device,
            message: address,
            time: transferTime,
            date: transferDate,
            status: 'sent',
        };
        ws.send(JSON.stringify(data));
    }
}