/**
 * Constructor functie om notification bars aan te kunnen maken. Goed her te gebruiken
 * @param htmlElementID (String): ID of Class van het html element die je wilt koppelen
 * @param showTime (int): hoelang blijft een notification bar open staan (milliseconde)
 * @constructor
 */
function NotificationBar(htmlElementID, showTime){
    /** we halen het HTML element op die gebruikt moet worden als notification bar */
    this.notificationBar = document.querySelector(htmlElementID);

    /** we stellen in hoelang een bar zichtbaar blijft. Als je niets door hebt gegeven: 3 seconden */
    this.showTime = showTime || 3000;

    /** we slaan alle css classes even op in een variabele */
    this.baseClasses = this.notificationBar.className;
}

/**
 * We stellen het prototype object in met de functies die van buitenaf gebruikt moeten kunnen worden
 */
NotificationBar.prototype = {
    /**
     * Trigger de notification bar om een bericht te laten zien
     * @param message (String): de tekst die moet worden weergegeven
     */
    showMessage: function(message){
        this.setType("message");
        this.show(message);
    },

    showError: function(message){
        this.setType("error");
        this.show(message);
    },

    setType: function(typeClass){
        // resetten naar de default classes. Met className overschrijf je de classes in 1x
        this.notificationBar.className = this.baseClasses;

        this.notificationBar.classList.add(typeClass);
    },

    /**
     * Functie om de bar in beeld te laten komen
     */
    show: function(message){
        /** als er al een bericht wordt weergegeven, dan resetten we de timeout */
        if(this.timeoutID) {
            clearTimeout(this.timeoutID);
        }

        /** we stellen de tekst in in de div */
        this.notificationBar.innerHTML = message;

        /** we stellen een timer in om de balk weer weg te laten gaan
         *  ik doe this.hide.bind() omdat de functie 'hide' niet meer weet wie 'this' is */
        this.timeoutID = setTimeout(this.hide.bind(this), this.showTime);

        this.notificationBar.classList.add("enabled");
    },

    /**
     * Functie om de balk weer weg te laten gaan
     */
    hide: function(){
        this.notificationBar.classList.remove("enabled");
          app.eventDispatcher.dispatch("TEST");
    }

}