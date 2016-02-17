function ArtWork(templateID, containerID){

    // we halen onze HTML template op als 'rauwe' html
    var templateSource = document.querySelector(templateID).innerHTML;

    // Als er geen containerID is doorgegeven dan pakken we standaard "#container"
    containerID = containerID || "#container";

    // We slaan een referentie op naar de <DIV> waar we de kunstwerken in mogen laten zien
    this.container = document.querySelector(containerID);

    // Handlebars moet je template eerst compilen voordat je hem kunt gebruiken
    this.createHTMLFromTemplate = Handlebars.compile(templateSource);

    // todo: verplaats deze data naar een 'model' object + eigen script bestand
    // het zou zelfs het mooiste zijn als je model de data laad uit een JSON bestand of uit een database
    this.artworks = [
        {
            title: "Mona Lisa",
            description: "In Parijs is ....",
            url:"http://nieuws.testnet.org/wp-content/uploads/2013/05/Schilderij-de-aardappel-eters.png"
        },
        {
            title: "Nachtwacht",
            description: "In Amsterdam is ....",
            url:"http://nieuws.testnet.org/wp-content/uploads/2013/05/Schilderij-de-aardappel-eters.png"
        },
        {
            title: "De schreeuw",
            description: "Verloren gegaan....",
            url:"http://nieuws.testnet.org/wp-content/uploads/2013/05/Schilderij-de-aardappel-eters.png"
        },
        {
            title: "Aardappeleters",
            description: "Mooi werk wat....",
            url:"http://nieuws.testnet.org/wp-content/uploads/2013/05/Schilderij-de-aardappel-eters.png"
        }
    ];
}

/**
 * We stellen het prototype object in met de functies die van buitenaf gebruikt moeten kunnen worden
 */
ArtWork.prototype = {

    /**
     * Deze functie kan een kunstwerk uit de lijst pakken en deze in de template injecteren
     * @param id
     */
    showArtByID: function(id){
        var artwork = this.artworks[id],
            artworkHTML = this.createHTMLFromTemplate(artwork);

        this.container.innerHTML = artworkHTML;

        // kunstwerk staat klaar buiten beeld. Over 1 seconde geven we hem de class 'enabled'
        setTimeout(function(){
            document.querySelector(".artwork").classList.add("enabled");
        }, 1000);
    }

}