<?php 

require('includes/config.php'); 
require 'model/getContent.php';?>

<!DOCTYPE html>
<link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png">
<link rel="shortcut icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITETITLE;?></title>
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- nav -->
<div id="navigation">
<!-- 	<div class="menu">
		<li>
			<ul>hi</ul>
			<ul>hi</ul>
			<ul>hi</ul>
			<ul>hi</ul>
		</li>
	</div> -->
</div>

<!-- content -->

<div id="wrapper">
	
	<div id="content">
	<br>

		<?php	
		
		echo $result[0]['pageID'];
		echo "<Br>";
		echo $result[0]['pageTitle'];
		echo "<Br>";
		echo $result[0]['pageCont'];
		echo "<Br>";
		echo '<img src="img/'.$result[0]['image'].'">';
		echo "<hr>";
		?>

		<?php 

		echo $result[1]['pageID'];
		echo "<Br>";
		echo $result[1]['pageTitle'];
		echo "<Br>";
		echo $result[1]['pageCont'];
		echo "<Br>";
		echo '<img src="img/'.$result[1]['image'].'">';

		echo "<hr>";

		 ?>
		 <?php 

		echo $result[2]['pageID'];
		echo "<Br>";
		echo $result[2]['pageTitle'];
		echo "<Br>";
		echo $result[2]['pageCont'];
		echo "<Br>";
		echo '<img src="img/'.$result[2]['image'].'">';

		echo "<hr>";

		 ?>
		 <?php 

		echo $result[3]['pageID'];
		echo "<Br>";
		echo $result[3]['pageTitle'];
		echo "<Br>";
		echo $result[3]['pageCont'];
		echo "<Br>";
		echo '<img src="img/'.$result[3]['image'].'">';
		echo "<hr>";

		 ?>

		 <?php 
		echo $result[4]['pageID'];
		echo "<Br>";
		echo $result[4]['pageTitle'];
		echo "<Br>";
		echo $result[4]['pageCont'];
		echo '<img src="img/'.$result[4]['image'].'">';

		 ?>

	
	</div>
	<!-- close content-->

	<div id="footer">	

			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>