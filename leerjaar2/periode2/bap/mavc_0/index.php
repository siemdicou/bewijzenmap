<?php
// Handige functie verzameld (static functies, dus geen new ...)
require('classes/Util.php');
// Databasegegevens etc
require('includes/config.php');
require('includes/bootstrap.php');


// Databaseverbinding als singleton (hoef je nog niet te begrijpen)
require('classes/Database.php');
// 'Base' model met basisfunctionaliteit voor de specifieke models
require('classes/Model.php');

// Front controller
switch ($action) {
	
	// toon een enkel nummer
	case 'viewsong':
		
		require('models/Song.php');
		// initieer het model

		$songmodel = new Song();
		// methode aanroepen vanuit model
		$song =$songmodel->getOne($id);

		// variabele(n) klaarzetten om uit te lezen in de view
		// include de view 
		break;
		
	default:
		
		require('models/Song.php');
		// initieer het model
		$songmodel = new Song();
		// methode aanroepen vanuit model
		$songs =$songmodel->getAll();
		// variabele(n) klaarzetten om uit te lezen in de view
		// include de view 
		include 'views/AllSongs.php';
}



