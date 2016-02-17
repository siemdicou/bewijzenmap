<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form class="calc" method="POST" action="index.php">
	<input type="number" name="numb1" required>
	+
	<input type="number" name="numb2" required>
	=
	<br>
	<input type="submit" value="uitrekenen" name="submit-calc">
</form>

<?php

	if (isset($_POST['submit-calc'])) {

	$number1= $_POST['numb1'];
	$number2 = $_POST['numb2'];
	$result = $number1 + $number2;
	echo $number1 .'+'. $number2.'='.$result;
	
	}
?>
<hr>
<form class="background" method="POST" action="index.php">
	stel je kleur in
	<input type="text" name="color">
	<input type="submit" value="submit" name="submit-col">
</form>
<?php 

	if (isset($_POST['submit-col'])) {

		$color= $_POST['color'];
		echo "<body style='background-color:".$color."'>";
	
	}
?>
<hr>
<?php
	echo date('l d M Y');
	echo "<Br>";
	echo date('H:i:s');
 ?>
<hr>

<?php

/* counter */

$datei = fopen("countlog.txt","r");
$count = fgets($datei,1000);
fclose($datei);
$count=$count + 1 ;
echo $count ;
echo " hits" ;
echo "\n" ;

$datei = fopen("countlog.txt","w");
fwrite($datei, $count);
fclose($datei);
?>
<hr>
<?php 
	for ($i=1; $i < 7; $i++) { 
		echo '<h'.$i.'>h'.$i.'</h'.$i.'>';
	}
 ?>
 <hr>

</body>
</html>