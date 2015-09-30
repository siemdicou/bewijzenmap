<?php 
	$valA = $_POST['a'];
	$valB = $_POST['b'];
	$action = $_POST['action'];

	include 'apps/views/calcform.php';

	switch ($action) {
		case 'add':
			include 'apps/views/add.php';
		break;
		
		case 'substract':
			include 'apps/views/substract.php';
		break;

		case 'multiply':
			include 'apps/views/multiply.php';
		break;

		case 'devide':
			include 'apps/views/devide.php';
		break;
	}
	// include 'apps/views/footer.php';
	

 ?>
