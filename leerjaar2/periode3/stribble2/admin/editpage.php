<?php 

require('../includes/config.php');
require('editpage_model.php'); 


?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITETITLE;?></title>
<link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png">
<link rel="shortcut icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png">
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">

<!-- <div id="logo"><a href="<?php echo DIR;?>"><img src="https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png" alt="<?php echo SITETITLE;?>" title="<?php echo SITETITLE;?>" border="0" /></a></div> --><!-- close logo -->

<!-- NAV -->
<div id="navigation">
<ul class="menu">
<li><a href="<?php echo DIRADMIN;?>">Admin</a></li>
<li><a href="<?php echo DIRADMIN;?>?logout">Logout</a></li>
<li><a href="<?php echo DIR;?>" target="_blank">View Website</a></li>
</ul>
</div>
<!-- END NAV -->

<div id="content">

<h1>Edit Page</h1>

<form action="editpage_model.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="pageID" value="<?php echo $row->pageID;?>" />
<p>Title:<br /> <input name="pageTitle" type="text" value="<?php echo $row->pageTitle;?>" size="103" />
</p>
<p>content<br /><textarea name="pageCont" cols="100" rows="20"><?php echo $row->pageCont;?></textarea>
</p>
<input type="file" name="image" accept="image/*" >
<p><input type="submit" name="submit" value="Submit" class="button" /></p>
</form>

</div>

<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>