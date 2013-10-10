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
 * @since		1.0.0-alpha
 */

/*
 *---------------------------------------------------------------
 * COMMON FUNCTIONS
 *---------------------------------------------------------------
 */
	require_once(SYSTEM_DIR . '/common.php');

/*
 *---------------------------------------------------------------
 * INSTANSIATE CLASSES
 *---------------------------------------------------------------
 *
 * Instansiate the default classes
 */
	
	// Data
	require_once(SYSTEM_DIR . 'Data.php');
	$data = new Data();

	// Page
	require_once(SYSTEM_DIR . 'Page.php');
	$page = new Page($data);

	// User
	require_once(SYSTEM_DIR . 'User.php');
	$user = new User($data, $password_options);

	// Admin
	require_once(SYSTEM_DIR . 'Admin.php');
	$admin = new Admin($data, $user);	

/*
 *---------------------------------------------------------------
 * TEMPLATE FUNCTIONS
 *---------------------------------------------------------------
 */
	require_once(SYSTEM_DIR . '/template_functions.php');

?>