	<?php 
	 function resultToArray($db_result)
	 {
	 	$rowlist = array();
	 	while ($row = $db_result->fetch_assoc())
	 	 {
	 		$rowlist[] = $row;
	 	}
	 	return $rowlist;
	 }



	 ?>