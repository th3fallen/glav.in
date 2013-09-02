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

$title = 'Login';
$errors  = array();
$msgs    = array();

require_once('../config.php');
require_once(SYSTEM_DIR . 'bootstrap.php');
require_once('../system/password.php');

if($_POST) {

	$email     = clean($_POST['email']);
	$password  = password_hash(clean($_POST['password']), PASSWORD_DEFAULT, $password_options);

	if(isset($_GET['redirect']))
	{
		$url = $_GET['redirect'];
	}
	else
	{
		$url = 'pages.php';
	}

	if(!$user->validate($email, $password, $url))
	{
		$errors[] = 'Invalid Login Information. Need to <a href="reset_password.php" title="Reset Password">reset your password?</a>';
	}


}

if($user->is_logged_in()) 
{
	$errors[] = 'You\'re already logged in.<a href="pages.php" view="View All Pages">View Pages</a>';
}

require_once(ADMIN_DIR . '/template/login_header.php'); 
?>
	<div id="login-content">
	<?php	
	foreach($msgs as $msg)
	{
		echo '<div class="msg">' . $msg . '</div>';
	}

	foreach($errors as $errors)
	{
		echo '<div class="error">' . $errors . '</div>';
	}

	if(!$user->is_logged_in()) {
	?>		
		<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
			<input type="text" placeholder="Email Address" name="email" />
			<input type="password" placeholder="Password" name="password" />
			<input type="submit" value="Submit">
		</form>
	</div><!-- end login-content -->
	<?php
	}
	
require_once(ADMIN_DIR . '/template/footer.php');	
?>