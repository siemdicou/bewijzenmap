<?php 
	include 'includes/config.php';
	include 'includes/database.php';
 ?>

<!-- // // Gebruikersnaam, wachtwoord van de database etc ophalen
// require 'includes/config.php' ;
// // Laad de Smarty bibliotheek in
// require_once 'libs/smarty/Smarty.class.php';
// // Voer instellingen uit en stel template parser in
// require 'includes/bootstrap.php' ;
// // Maak de database connectie
// require_once 'includes/database.php' ;

// // Koppel de waarde van de paginatitel aan te smarty tag 'title'
// $templateParser->assign('title', 'Me First And The Gimme Gimmes');
// // Toon de template: output html
// $templateParser->display('head.tpl');

// // Haal de nieuws artikelen op
// require 'logic/select_newsarticles.php';
// // Toon de nieuwsberichten. Oude stijl:
// // Bouw dit om naar een template systeem

// include 'views/newsarticles.php' ; -->

<!DOCTYPE html>
<html>
<head>
	<title>Linkin Park</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<?php 
$page = (empty($_GET['page'])) ? '' : $_GET['page'];
	include 'views/header.tpl';
	?>
	<div id="wrapper">
	<?php 
 switch ($page) {
 	case 'home':
 		// include 'index.php';
 	break;
  	
  	case 'events':
 		include 'views/events.tpl';
 	break;
 
  	case 'concerten':
 		include 'views/concerten.php';
 	break;	
  	
  	case 'news':
  		// $page_nr = isset($_GET['page_nr']) ? $_GET['page_nr']: 1;
  		// echo "$page_nr";
 		include 'views/newsarticles.php';
 	break;				
 	
 	default:
 		# code...
 	break;
 }

	// $templateParser->display('views/header.tpl');


 ?>
</div>
</body>
</html>