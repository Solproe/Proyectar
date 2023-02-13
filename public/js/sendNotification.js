function transfer(plate, device, from, to) {
    var fromGeo = (Array), from;
    var ws = new WebSocket("ws://trusting-cultured-ceratonykus.glitch.me");
    ws.onopen = function (evt) {
        var patientName = document.getElementById('patientName').innerHTML;
        var documentType = document.getElementById('documentType').innerHTML;
        var fate = document.getElementById('fate').innerHTML;
        var identification = document.getElementById('identification').innerHTML;
        var companions = document.getElementById('check').innerHTML;
        var birthday = document.getElementById('birthday').innerHTML;
        var transferDate = document.getElementById('transferDate').innerHTML;
        var diagnosis = document.getElementById('diagnosis').innerHTML;
        var transferTime = document.getElementById('transferTime').innerHTML;

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
                lat: fromGeo[0],
                lng: fromGeo[1],
            },
            device: device,
            message: address,
            time: transferTime,
            date: transferDate,
        };
        ws.send(JSON.stringify(data));
    }
}