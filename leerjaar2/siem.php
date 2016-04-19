<?php

$image = $_POST['image'];

$result = $mysqli->query("SELECT * FROM table WHERE image='$image'"); 
$user_match_count = $result->num_rows;
 				
if ($user_match_count == 0){

	// DIT IS PICTURE INPUT
	$image = $_POST['image'];

	$data1 = strip_tags($_POST['data1']);
	$data2 = strip_tags($_POST['data2']);
	$data3 = strip_tags($_POST['data3']);

	// MET IMAGE UPDATE
	$views_amount= "UPDATE table SET WHERE ";
	$result = $mysqli->query($views_amount);


}else{

	// DIT IS ZONDER PICTURE INPUT
	$data1 = strip_tags($_POST['data1']);
	$data2 = strip_tags($_POST['data2']);
	$data3 = strip_tags($_POST['data3']);

	// ZONDER IMAGE UPDATE
	$views_amount= "UPDATE table SET WHERE ";
	$result = $mysqli->query($views_amount);

}





?>