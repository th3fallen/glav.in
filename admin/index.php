<?php
/**
 * Glav.in
 *
 * A very simple CMS
 *
 *
 * @package		Glav.in
 * @author		Matt Sparks
 * @copyright	Copyright (c) 2013, Matt Sparks (http://www.mattsparks.com)
 * @license		http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link		http://glav.in
 * @since		Version 1.0.0-alpha
 */

/*
 *---------------------------------------------------------------
 * LET'S GO ADMIN STYLE!
 *---------------------------------------------------------------
 *
 * Load the configuration file and the bootstrap file. As well as
 * all the other tools and helpers we'll need.
 */

	require_once('../config.php');
	require_once(SYSTEM_DIR . 'bootstrap.php');

	$errors = array();
	$msgs = array();
	$title = 'Admin Panel';

	$login_header = $user->is_logged_in() ? false : true;	

/*
 *---------------------------------------------------------------
 * IS THE USER LOGGED IN?
 *---------------------------------------------------------------
 *
 * Check to see if the user is logged in. If not, ask them to.
 * After that, figure out where to send them.
 */
	if(isset($_GET['page']))
	{
		$requested_page = $_GET['page'];

		// Pages that use the "login_header"
		switch($requested_page) {
			case 'login':
			case 'logout':
			case 'reset_password':
				$login_header = true;
				break;
			default:
				$login_header = false;
		}
	}
	
	if($requested_page != 'login' && $requested_page != 'reset_password')
	{
		if($user->is_logged_in())
		{
			if($requested_page == '')
			{
				$include = 'pages.php';
			}
			else 
			{
				$include = $requested_page . '.php';
			}
		}
		else
		{
			$login_header = true;
			$include = 'login.php';
		}
	}
	else 
	{
		$include = $requested_page . '.php';	
	}

	require_once(ADMIN_DIR . '/template/header.php');
	include($include);
	require_once(ADMIN_DIR . '/template/footer.php');	
?>