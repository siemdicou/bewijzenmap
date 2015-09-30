<head>
	<title>reg express</title>
</head>
<body>
<h1>tijd</h1>
	<form method="POST">
		<input type="text" name="input_string">
		<input type="submit">
	</form>

<?php 
$input_string = $_POST['input_string'];

$reg_exp = '/^[1-2]{0,1}[0-9][:][0-5][0-9](am|pm)$/';

if (preg_match($reg_exp, $input_string)) {
	echo $input_string. ' voldoet';
}
else{
	echo $input_string. ' voldoet niet';
}

 ?>
</body>
</html>