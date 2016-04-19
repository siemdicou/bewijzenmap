
	<?php 

	$title = $_POST['pageTitle'];
	$content = $_POST['pageCont'];
	$pageID = $_POST['pageID'];
	$image = $_POST['image'];
	// $uploads_dir = '../img/';

	$file = $_FILES['image']['tmp_name'];
	$filename = $_FILES['image']['name'];
	// // $ext = $file['extension'];
	$destination = '../img/'.$_FILES['image']['name'];
	$uploader = $_SESSION['username'];

	move_uploaded_file($file, $destination);
	
	$title = mysql_real_escape_string($title);
	$content = mysql_real_escape_string($content);
	
	mysql_query("UPDATE pages SET pageTitle='$title', pageCont='$content', image='$image'WHERE pageID='$pageID'");
?>