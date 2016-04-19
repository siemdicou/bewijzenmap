<?php 

foreach ($songList as $songList) {
	echo '<a href="?action=viewsong&id='.$songList['id'].'">';
	echo $songList['title'];
	echo "<br></a>";
}

 ?>
