<?php

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name = "viewport" content = "initial-scale = 1.0">
		<title><?php echo $page['name']; ?> - Glav.in - The Not Robust, Not Very Powerful, Simple CMS</title>
		<script type="text/javascript" src="template/js/jquery-1.10.2.min.js"></script>
		<!--[if (gte IE 6)&(lte IE 8)]>
		  <script type="text/javascript" src="js/selectivizr.js"></script>
		<![endif]--> 		
		<!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link rel="stylesheet" href="template/styles/normalize.css">
		<link rel="stylesheet" href="template/styles/style.css">
		<script type="text/javascript" src="template/js/respond.min.js"></script>
		<script type="text/javascript" src="template/js/placeMe.min.js"></script>	
	</head>
<body>
	<body>
		<div id="container">
			<header>
				<h1 id="logo"><a href="<?php echo base_url(); ?>" title="Home"><span class="none">Glav.in</span></a></h1>
			</header>
			<div id="content">
				<h1><?php echo $page['name']; ?></h1>
				<?php echo $page['content']; ?>
			</div><!-- end content -->
			<footer>
				&copy;2013 Glav.in
			</footer>
		</div><!-- end #container -->
	</body>
</html>