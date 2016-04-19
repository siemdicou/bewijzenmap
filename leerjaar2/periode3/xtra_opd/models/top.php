<?php

	$result = $mysqli->query("SELECT * FROM content ORDER BY time_add DESC LIMIT 5");

	while($movie = $result->fetch_assoc()){

		echo '<li><a href="?movies=item&id='.$movie['id'].'"">'.$movie['title'].'</a></li>';
	
	};

?>