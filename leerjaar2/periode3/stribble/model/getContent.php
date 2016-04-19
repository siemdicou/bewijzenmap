<?php 
	$sql = mysql_query("SELECT * FROM pages");
	$result_ned = array();
	while ($row_ned = mysql_fetch_array($sql))
	{
		$result_ned[]=$row_ned ;
	}

	$sql = mysql_query("SELECT * FROM pages_eng");
	$result = array();
	while ($row_eng = mysql_fetch_array($sql))
	{
		$result_eng[]=$row_eng ;
	}
?>