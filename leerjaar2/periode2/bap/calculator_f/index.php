<?php

$valA = $_POST['a'];
$valB = $_POST['b'];
$action = $_POST['action'];

include('logic/functions.php');
include('views/head.php');
include('views/calcform.php');

switch ($action) {
	
	case 'add':
	
		include('views/add.php');
		break;
	case 'substract':
		include('views/substract.php');
		break;
	case 'multiply':
		include('views/multiply.php');
		break;
	}
		
include('views/footer.php');




