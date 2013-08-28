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
 * LET'S GO!
 *---------------------------------------------------------------
 *
 * Check to see if the CMS has been installed.
 * Load the configuration file and the bootstrap file. 
 */

	if(file_exists('install.php')) 
	{
		header("Location: install.php");
	} 
	else 
	{
		require_once('config.php');
		require_once(SYSTEM_DIR . 'bootstrap.php');
	}


/*
 *---------------------------------------------------------------
 * LOAD THE PAGE
 *---------------------------------------------------------------
 *
 * Get the requested page and load it.
 */

	if(isset($_GET['page']))
	{
		$requested_page = $_GET['page'];		
	}
	else
	{
		$requested_page = '';
	}
	

	$page->load($requested_page);

?>