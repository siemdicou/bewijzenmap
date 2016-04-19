<?php 

require('../includes/config.php'); 

$lang = (empty($_GET['lang'])) ? '' : $_GET['lang'];








//make sure user is logged in, function will redirect use if not logged in
login_required();

//if logout has been clicked run the logout function which will destroy any active sessions and redirect to the login page
if(isset($_GET['logout'])){
	logout();
}

//run if a page deletion has been requested
if(isset($_GET['delpage'])){
		
	$delpage = $_GET['delpage'];
	$delpage = mysql_real_escape_string($delpage);
	$sql = mysql_query("DELETE FROM pages WHERE pageID = '$delpage'");
    $_SESSION['success'] = "Page Deleted"; 
    header('Location: ' .DIRADMIN);
   	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITETITLE;?></title>
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
	function delpage(id, title)
	{
	   if (confirm("Are you sure you want to delete '" + title + "'"))
	   {
		  window.location.href = '<?php echo DIRADMIN;?>?delpage=' + id;
	   }
	}
</script>
</head>
<body>

<div id="wrapper">



<!-- NAV -->

<!-- END NAV -->

<div id="content">
<?php  
switch ($lang) {
	case 'english':
			include 'english.php';
		break;
	
	case 'dutch':
			include 'dutch.php';
		break;

	default:
		include 'choose.php';
	break;
}
?>


<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->

</body>
</html>