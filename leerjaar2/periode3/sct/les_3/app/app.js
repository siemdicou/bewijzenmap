/*global App (for now) */

var app = app || {};

function initApp()
{
	
	// dit is het startpunt van je applicatie. Hier geef je aan de view(s) door welke models ze moeten gebruiken

	app.randomStudentsView.init();

}

// als de pagina geladen is, dan starten we de app
window.addEventListener("load", initApp);