<?php 
	function writeHello()
	{
		echo  'hallo de file werkt';
		echo '<br>';
	}
	function writeMsg($str)
	{
		echo $str	;
		echo '<br>';
	}

	function writeMsgTo($name,$str="")
	{
		echo $name ;
		echo ' ';
		echo $str;
		echo '<br>';
	}

	function addValue($num1, $num2){
		$r= $num1 + $num2;
		return $r;
	}

	function calcRect($num1, $num2){
		$r= $num1 * $num2 ;
		return $r;
	}
 ?>		