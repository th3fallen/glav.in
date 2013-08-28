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

require_once('../config.php');
require_once(SYSTEM_DIR . 'bootstrap.php');

if($user->is_logged_in()) 
{
	header("Location: pages.php");
}
else
{
	header("Location: login.php");
}

?>