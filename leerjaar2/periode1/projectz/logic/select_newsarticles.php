<?php
$nr_items_page = PAGENUMBER;
$ofset = ($page_nr-1) * $nr_items_page;
$sql = "SELECT * FROM newsItem limit " .$ofset ." , ". $nr_items_page  ;
$result = $mysqli->query($sql);
?>