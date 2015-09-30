<?php

// {include file="navigation.tpl"};
	echo '<section>';
// $nr_items_page = 5;
// $ofset = ($page_nr-1) * $nr_items_page;


$sql = "SELECT * FROM newsItem"; // limit" .$ofset ." , ". $nr_items_page
$result = $mysqli->query("$sql");

while ($newsItem = $result->fetch_assoc()) {
	echo '<div id="newsitem">';
	echo '<article>';
	echo '<h1>'.$newsItem['id'].'</h1><br>';
	echo '<h1>'.$newsItem['title'].'</h1><br>';
	echo '<img src='.$newsItem['image'].'><br><br>';
	echo '<content>'.$newsItem['content'].'</content><br><br>';
	echo '</article>';
	echo "</div>";
}


echo '</section>';