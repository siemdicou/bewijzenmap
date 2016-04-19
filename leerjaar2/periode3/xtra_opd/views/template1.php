<html class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/item.css">

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style2.css">
	<script src="js/modernizr.js"></script>
	<script src="js/modernizr2.js"></script>

	<!-- PAGINATION -->
	<link rel="stylesheet" href="css/resetPag.css">
	<link rel="stylesheet" href="css/stylePag.css">
	<script src="js/modernizrPag.js"></script>
  	
	<script src="js/jquery-2.1.4.js"></script>
	<script src="js/main.js"></script>
  	<script src="js/jquery.sticky.js"></script>
	<script>
	  $(document).ready(function(){
	    $("#sticker").sticky({topSpacing:0});
	  });
	</script>
	<script>
		function showList(str) {
		console.log(str);
		    if (str == "") {
		        document.getElementById("txtHint").innerHTML = "";
		        return;
		    } else {

		        if (window.XMLHttpRequest){
		            xmlhttp = new XMLHttpRequest();
		        }else{
		            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		        };
		        xmlhttp.onreadystatechange = function() {
		            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

		            	document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

		            };
		        };
				xmlhttp.open("GET","models/search.php?name="+str);
		        xmlhttp.send();
		    };
		};
	</script>
	<title>WatchMe | Online</title>
</head>
<body>
	<header class="cd-main-header animate-search" id="sticker">
		<div class="cd-logo"><a href="?movies=all"><img src="img/WatchMeLogo2.png" alt="Logo"></a></div>

		<nav class="cd-main-nav-wrapper">
			<a href="#search" class="cd-search-trigger cd-text-replace">Search</a>
			
			<ul class="cd-main-nav">
				<li><a href="index.php?movies=all">Home</a></li>
				<li><a href="index.php?movies=trending">Trending</a></li>
				<li><a href="index.php?us=about">About</a></li>
			</ul>
		</nav>

		<a href="#0" class="cd-nav-trigger cd-text-replace">Menu<span></span></a>
	</header>
	
	<main class="cd-main-content">