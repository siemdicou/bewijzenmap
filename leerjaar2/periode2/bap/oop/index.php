<?php 
	require_once 'product.php';

	$myProduct = new Product('php for dummies', 'boek');
	$myProduct2 = new Product('hoi','film');

	// $myProduct-> getTitle();
	echo "Title: ";
	echo $myProduct->getTitle();
	echo'<br>';
	echo 'dit is een:';
	echo $myProduct->getType();
	echo'<br>';
	echo $myProduct2->getTitle();
	echo'<br>';
	echo 'dit is een:';
	echo $myProduct2->getType();

?>