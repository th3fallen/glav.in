<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name = "viewport" content = "initial-scale = 1.0">
		<title><?php echo $title; ?> - Glav.in - The Not Robust, Not Very Powerful, Simple CMS</title>
		<script type="text/javascript" src="<?php echo base_url(); ?>admin/template/js/jquery-1.10.2.min.js"></script>
		<!--[if (gte IE 6)&(lte IE 8)]>
		  <script type="text/javascript" src="js/selectivizr.js"></script>
		<![endif]--> 		
		<!--[if lt IE 9]><script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>admin/template/styles/normalize.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>admin/template/styles/style.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>admin/template/js/respond.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>admin/template/js/placeMe.min.js"></script>
		<script src="<?php echo base_url(); ?>admin/template/js/ckeditor/ckeditor.js"></script>
		<script>
		    window.onload = function() {
		        CKEDITOR.replace( 'page-content' );
		    };

		    $(function() {

		    	// When the page_name field is typed into, update
		    	// the "page address" helper.
		    	$('input[name="page_name"]').keyup(function() {
		    		var val = $(this).val(),
		    			new_val = val.toLowerCase();

		    		if(new_val.slice(-1) != " ") {
		    			$('#create-uri').text(new_val.replace(/ /g, "_"));	
		    		}
		    		
		    	});	

		    })
		    
		</script>		
	</head>
	<body<?php echo $login_header ? ' class="not_logged_in"' : ''; ?>>
		<?php if($login_header) { ?>
		<div id="login-container">
			<header>
				<h1 id="login-logo"><span class="none">Glav.in</span></h1>
			</header>
		<?php } else { ?>
		<div id="admin-container">
			<header id="admin-header">
				<h1 id="admin-logo"><a href="<?php echo base_url(); ?>admin/pages"><span class="none">Glav.in</span></a></h1>
				<nav id="admin-nav">
					<ul>
						<li><a href="<?php echo base_url(); ?>admin/pages" title="Pages">Pages</a></li>
						<li><a href="<?php echo base_url(); ?>admin/users" title="Users">Users</a></li>
						<?php /* <li><a href="#" title="Settings">Settings</a></li> */ ?>
						<li><a href="<?php echo base_url(); ?>admin/logout" title="Logout">Logout</a></li>
					</ul>
				</nav>
			</header>
			<div id="admin-content">
		<?php } ?>