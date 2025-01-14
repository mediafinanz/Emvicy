var oEventSource = new EventSource("/~/sse");

if ('undefined' === typeof(EventSource)) { console.error('server-sent events not supported'); } else {

    // event: regular
    oEventSource.onmessage = function(oEvent) {
        document.getElementById('h1Title').innerHTML = 'event: <b>message</b><br>data: ' + oEvent.data + "\n";

        // document.getElementById('resultTextarea').innerHTML += event.data + "\n";
        var sLog = 'id: ' + oEvent.lastEventId + '\n'
            + 'type: ' + oEvent.type + '\n'
            + 'data: ' + oEvent.data + '\n'
            + 'origin: ' + oEvent.origin + '\n'
            + ''
        ;
        // console.log('regular', sLog);
    };

    // event: ping
    oEventSource.addEventListener('ping', function (oEvent) {
        // document.getElementById('resultDiv').innerHTML = 'event: <b>ping</b><br>data: ' + oEvent.data + "\n";

        // console.log('ping', oEvent.data);
    });

    oEventSource.onerror = function (oError) {

        if (false === oError.isTrusted) {
            console.error('error', JSON.stringify(oError));
        }

        // document.getElementById('error').innerHTML = 'error: ' + JSON.stringify(oError) + "\n";
        // console.log(JSON.stringify(oError));
        // shutdown connection on error
        // console.error('oError', oError);
        // oEventSource.close();
    };
}