<?php
// Handige functies verzameld (static functies, dus geen new Util...)
require('classes/Util.php');	
// Databaseverbinding als singleton (hoef je nog niet te begrijpen)
require('classes/Database.php');
// 'Base' model met basisfunctionaliteit voor de specifieke models
require('classes/Model.php');

// Databasegegevens etc
require('includes/config.php');

// Voer de juiste instellingen uit en start de applicatie op 
require('includes/bootstrap.php');


// Front controller
switch ($action) {
	
	// toon een enkel nummer
	case 'viewsong':
		
		require('models/Song.php');
		// Maak een instantie van de Model class
		$songModel = new Song();
		$song = $songModel->getOne($id);
		include 'views/song_view_one.php';
		break;
	// toon alle nummers	
	default:
		
		require('models/Song.php');
		// Maak een instantie van de Model class
		$songModel = new Song();
		// methode aanroepen vanuit model, variabele(n) klaarzetten 
		// om uit te lezen in de view
		$songList = $songModel->getAll($id);

		// include de view 
		include 'views/song_view.php';
}



