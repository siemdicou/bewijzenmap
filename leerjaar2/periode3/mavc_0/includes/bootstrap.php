<?php 

// Definieer de status van het project
define('PROJECT_STATUS','development');

// Stel de instellingen in op Nederlands
setlocale(LC_ALL, 'nl_NL');
// Instellingen voor een Windows server
//setlocale(LC_ALL, 'nld_nld');

// haal het id op van een nummer om het op te zoeken in de database
// fucnties uit de class Util als static aangeroepen
$id 	= Util::getSafeGetVar('id');
$action = Util::getSafeGetVar('action');

?>
