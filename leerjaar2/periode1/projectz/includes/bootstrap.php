<?php

// Dit is de bootstrap. Hier worden zaken vooraf uitgevoerd om de site intialiseren.
 
// Wijzig istellingen voor live- en testomgeving
switch (PROJECT_STATUS) {
	case 'production': {
		ini_set('display_errors','Off');
		// en meer
	}
	default :
	{
		ini_set('display_errors','1');
		ini_set('error_reporting', E_ALL);
	}
}


// intialiseer de template parser
$templateParser = new Smarty();
$templateParser->template_dir = "views"; 
$templateParser->compile_dir = "views/compiled"; //Hierin komen de gecompileerde templatebestanden te staan
//$templateParser->cache_dir = "views/cache";





?>