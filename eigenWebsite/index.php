<?php 
	include 'head.php';
	$page = isset($_GET['page']) ? trim(strtolower($_GET['page']))       : "home";
	include 'header.php';
	echo "<div id=wrapper>";
	switch ($page) {
		case 'home':
			# code...
			break;

		case 'portefolio':
			include 'portefolio.html';
			break;

		case 'about':
			include 'about.html';
			break;
		case 'opdrachten':
			# code...
			break;

		case 'contact':
			include 'contact.php';
			break;
		
		default:

		break;
	}
echo "</div>";

 ?>