<?php 
	$sql = mysql_query("SELECT * FROM pages");
	$result = array();
	while ($row = mysql_fetch_array($sql))
	{
		$result[]=$row ;
	}
?>