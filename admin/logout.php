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

$title = 'Logout';

require_once('../config.php');
require_once(SYSTEM_DIR . 'bootstrap.php');

// Logout the user
$user->logout();
?>
You've been logged out. Congrats. <a href="login.php">Log Back In!</a>
