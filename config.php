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
 * DEFINE CONSTANTS
 *---------------------------------------------------------------
 */
	define("BASEPATH",     __DIR__);
	define("SYSTEM_DIR",   BASEPATH . '/system/');
	define("ADMIN_DIR",    BASEPATH . '/admin/');
	define("PAGES_DIR",    BASEPATH . '/data/pages/');
	define("SETTINGS_DIR", BASEPATH . '/data/settings/');
	define("USERS_DIR",    BASEPATH . '/data/users/');

/*
 *---------------------------------------------------------------
 * PASSWORD SALT
 *---------------------------------------------------------------
 *
 * It's recommended that you change this before Glav.in 
 * is installed
 */
	$password_options = array(
		'cost' => 11,
		'salt' => '45tygrfE#$%t6hgr4332@23r4t5y$$%G###'
	);

?>