<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name = "viewport" content = "initial-scale = 1.0">
		<title><?php echo $title; ?> - Glav.in - The Not Robust, Not Very Powerful, Simple CMS</title>
		<script type="text/javascript" src="template/js/jquery-1.10.2.min.js"></script>
		<!--[if (gte IE 6)&(lte IE 8)]>
		  <script type="text/javascript" src="js/selectivizr.js"></script>
		<![endif]--> 		
		<!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link rel="stylesheet" href="template/styles/normalize.css">
		<link rel="stylesheet" href="template/styles/style.css">
		<script type="text/javascript" src="template/js/respond.min.js"></script>
		<script type="text/javascript" src="template/js/placeMe.min.js"></script>
		<script src="template/js/ckeditor/ckeditor.js"></script>
		<script>
		    window.onload = function() {
		        CKEDITOR.replace( 'page-content' );
		    };
		</script>		
	</head>
<body>
	<div id="admin-container">
		<header id="admin-header">
			<h1 id="admin-logo"><a href="pages.php"><span class="none">Glav.in</span></a></h1>
			<nav id="admin-nav">
				<ul>
					<li><a href="pages.php" title="Pages">Pages</a></li>
					<li><a href="#" title="Settings">Settings</a></li>
					<li><a href="logout.php" title="Logout">Logout</a></li>
				</ul>
			</nav>
		</header>
		<div id="admin-content">