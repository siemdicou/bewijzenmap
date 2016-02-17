var app = app || {};

function QRReader(videoContainerID, callback){

    /** we slaan een referentie op naar het HTML element. Ditmaal als JQUERY object aangezien de library daar gebruik van maakt */
    this.container = $(videoContainerID);

    /** we gaan gelijk starten met het scannen van het beeld */
    this.startReading();

    /** optie om een callback in te stellen. Wordt uitgevoerd als er een nieuw getal is gescand */
    this.callback = callback;

    /** we hebben nog niks gescand maar toch maken we alvast de variabele aan */
    this.lastScannedData = undefined;

    setTimeout(function(){
        app.eventDispatcher.dispatch("QR_CODE_SCANNED");
    }, 10000);



}


 // app.eventDispatcher.dispatch("TEST");

QRReader.prototype = {

    startReading: function() {

        /** makkelijke manier om 'this' te onthouden */
        var self = this;

        this.container.html5_qrcode(function onSucces(scannedData) {
                if(scannedData != self.lastScannedData){
                    self.lastScannedData = scannedData;

                    app.eventDispatcher.dispatch("QR_CODE_SCANNED");

                    if(self.callback) {
                        self.callback(scannedData);
                    }
                }
            },
            function onError(error) {
                //show read errors
            }, function onVideoError(videoError) {
                //the video stream could be opened
            }
        );
    }
}