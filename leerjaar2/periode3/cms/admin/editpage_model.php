<?php 

require_once('../includes/config.php'); 

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
	header('Location: '.DIRADMIN); 
}




if(isset($_POST['submit'])){


	// get data from form

	$title = $_POST['pageTitle'];
	$content = $_POST['pageCont'];
	$pageID = $_POST['pageID'];
	// $image = $_POST['image'];
	// $uploads_dir = '../img/';

	$file = $_FILES['image']['tmp_name'];
	$filename = $_FILES['image']['name'];
	// // $ext = $file['extension'];
	$destination = '../img/'.$_FILES['image']['name'];
	$uploader = $_SESSION['username'];

print_r($_FILES);

	//move to right dir
	move_uploaded_file($file, $destination);
	
	$title = mysql_real_escape_string($title);
	$content = mysql_real_escape_string($content);
	

	// pushed the data to database
	mysql_query("UPDATE pages SET pageTitle='$title', pageCont='$content', image='$filename'WHERE pageID='$pageID'");



	$_SESSION['success'] = 'Page Updated';
	header('Location: '.DIRADMIN);
	exit();

}

// get data about page id  
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$q = mysql_query("SELECT * FROM pages WHERE pageID='$id'");
$row = mysql_fetch_object($q);







?>