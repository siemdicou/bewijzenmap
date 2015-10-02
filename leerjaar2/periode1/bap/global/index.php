<?php 
	$name = 'henk';

	function sayHello()
	{	
		global$name;
		echo "<h1>my name is ". $name.'</h1><br>';
	}
	sayHello();
 ?>