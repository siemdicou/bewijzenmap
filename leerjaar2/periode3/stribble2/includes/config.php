<?php


ob_start();
session_start();

// db properties
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','cms2');

// make a connection to mysql here
$conn = @mysql_connect (DBHOST, DBUSER, DBPASS);
$conn = @mysql_select_db (DBNAME);
if(!$conn){
	die( "Sorry! There seems to be a problem connecting to our database.");
}

// define site path
define('DIR','http://localhost/bewijzenmap/leerjaar2/periode3/project/stribble/');

// define admin site path
define('DIRADMIN','http://localhost/bewijzenmap/leerjaar2/periode3/project/stribble/admin/');

// define site title for top of the browser
define('SITETITLE','Stribble');

//define include checker
define('included', 1);

include('functions.php');
?>
