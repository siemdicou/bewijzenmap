/*global App (for now) */

var app = app || {};

function initApp()
{
	
	// dit is het startpunt van je applicatie. Hier geef je aan de view(s) door welke models ze moeten gebruiken
	// naar welk model ze moeten luisteren kun je bijvoorbeeld doorgeven in de init() functie. Dit mogen jullie zelf bouwen
	app.randomStudentsView.init();

}

// als de pagina geladen is, dan starten we de app
window.addEventListener("load", initApp);