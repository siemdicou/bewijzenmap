<?php
// -----------------------------------------------------------------------------
// voor het overzicht is alle funtionaliteit (op de models na) in deze index geplaatst 
// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------
// Navigatie
echo '<head><base href="http://localhost/bewijzenmap/leerjaar2/periode3/mavc_1/rewrite/"></head>';
echo '<h2>Navigatie: let op de url!</h2>';
echo '<ul>';
echo '<li><a href="song/view/10">Toon een enkel nummer (met id 10)</a></li>';
echo '<li><a href="song/delete/13">Verwijder een enkel nummer (met id 13)</a></li>';
echo '<li><a href="album/view/8">Toon een enkel album (met id 8)</a></li>';
echo '<li><a href="song/viewall">Toon alle nummers</a></li>';
echo '</ul>';

// -----------------------------------------------------------------------------
// Toon de complete $_GET array om te tonen hoe deze gevuld wordt vanuit de mod_rewrite
echo '<pre>Zo ziet de $_GET array eruit: 
';var_dump($_GET);echo '</pre>';

// -----------------------------------------------------------------------------
// Deze autoloader om de classes automatisch in te laden. Normaal plaats je deze in een include
function __autoload($className) {
	
    if (file_exists('models/'.$className.'.php')) {
       
        require_once('models/'.$className.'.php');
    }
    else if (file_exists('classes/'.$className.'.php')) {
	    
        require_once('classes/'.$className.'.php');
    }
    else if (file_exists('controllers/'.$className.'.php')) {
	    
        require_once('controllers/'.$className.'.php');
    }
    else 
    {
	 	// foutafhandeling toevoegen
	 	exit('<hr><h1>Class <u>'.$className.'</u> not found!</h1><hr>');  
    }
}

// -----------------------------------------------------------------------------
// Get variabele ophalen in array omzetten, elementen en=ruit halen en toekennen 
// aan lokale variabelen 	
$request = $_GET['request'];

// Maak een array van bijvoorbeeld "album/delete/1". Explodeer op de slash
$requestList = explode("/",$request);

// De apenstaart zorg voro eht weglaten van de foutmelding als het element niet bestaat
$modelName 		= @$requestList[0];
// Geeft de model name een hoofdletter
$modelName		= ucwords($modelName);

// Stel de contrroller name samen
$controllerName = $modelName.'s'.'Controller';

$action		 	= @$requestList[1];
$id	 			= @$requestList[2];

// -----------------------------------------------------------------------------
echo '<hr><h3>De waarden van de afgeleide variabelen:</h3>';
echo 'Naam van de controller: <b>'.$controllerName.'</b><br>';
echo 'Naam van het model: <b>'.$modelName.'</b><br>';
echo 'Welke actie: <b>'.$action.'</b><br>';
echo 'Bijbehorende id: <b>'.$id.'</b><br>';

// -----------------------------------------------------------------------------
// Nu kunnnen we dynamisch de classes en controllers aan laten roepen

// Deze werkt nog niet: 		
//new $controllerName();

// Dit werkt nu alleen voor de twee betaande classes: Album en Song
// Nieuwe class aanmaken, waardoor de constructor wordt aangeroepen
new $modelName();









