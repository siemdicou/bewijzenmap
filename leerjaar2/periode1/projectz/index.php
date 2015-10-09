<?php 
	require 'includes/config.php';
	require 'includes/database.php';
	require_once 'libs/smarty/Smarty.class.php';
	require 'includes/bootstrap.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Linkin Park</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<?php 
$page = (empty($_GET['page'])) ? '' : $_GET['page'];
$templateParser->assign('curr_page',$page);
$templateParser->display('header.tpl');

	?>
	<div id="wrapper">
	<?php 
 switch ($page) {
 	case 'home':
 		$templateParser->display ('home.tpl');
 	break;
  	
  	case 'events':
  		require 'logic/select_events.php';
  		$templateParser->assign('data', $result);
 		$templateParser->display ('events.tpl');
 	break;

  	case 'cd':
  		require 'logic/select_cds.php';
  		$templateParser->assign('data', $result);
 		$templateParser->display ('cds.tpl');
 	break;

 	case 'search':

 		$search_string = isset($_POST['search_string']) ? $_POST['search_string']:"";
 		// search db for search
 		// require 'logic/script.js';
 		require 'logic/search_articles.php';
 		$templateParser->assign('data', $search_result);
 		$templateParser->display('search_result.tpl');

 		break;
 
  	case 'concerten':
  	  		require 'logic/select_events.php';
  		$templateParser->assign('data', $result);
 		$templateParser->display ('concerten.tpl');
 	break;	
  	
  	case 'news':
  		$page_nr = isset($_GET['page_nr']) ? $_GET['page_nr']: 1;
  		// echo "$page_nr";
  		require 'logic/select_newsarticles.php';
  		// require 'file';
 		$templateParser->assign('data', $result);
 		$templateParser->display('newsarticles.tpl');

 	break;				
 	
 	default:
		$templateParser->display('home.tpl');
	 break;
 }

	// $templateParser->display('views/header.tpl');


 ?>
</div>
</body>
</html>