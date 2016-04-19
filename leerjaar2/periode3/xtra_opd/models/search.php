<?php

require_once '../config/config.php';
require_once '../library/database.php';

$resultArray = array();
$search = $_GET['name']; 

$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
	exit();
}
mysqli_select_db($con,"DB2468079");

$sql = "SELECT * FROM content WHERE title COLLATE UTF8_GENERAL_CI LIKE '%$search%' LIMIT 4";

	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)){

		echo '<li>';
		echo '<a class="image-wrapper" href="?movies=item&id='.$row['id'].'"><img src="movies/'.$row['img'].'" alt="'.$row['title'].'"></a>';
		echo '<h4><a class="cd-nowrap" href="?movies=item&id='.$row['id'].'">'.$row['title'].'</a></h4>';
		echo '<time datetime="2016-01-12">'.$row['year'].'</time>';
		echo '</li>';
	};

mysqli_close($con);

?>