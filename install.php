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

$title = 'Install';
$errors  = array();
$msgs    = array();

require_once('config.php');
require_once(SYSTEM_DIR . 'bootstrap.php');
require_once('system/password.php');

if($_POST) {

	if(($_POST['admin_email_address'] == '') || ($_POST['admin_password'] == ''))
	{
		$errors[] = "Fields Cannot Be Empty";
	}

	if(empty($errors))
	{
		$email      = $_POST['admin_email_address'];
		$password   = password_hash($_POST['admin_password'], PASSWORD_BCRYPT, $password_options);
		$user_level = 1;

		$user = array(
				'user' => array(
						'email'      => $email,
						'password'   => $password,
						'user_level' => $user_level,
						'token'		 => ''
					)
			);

		$added = $data->create_file('data/users/'.$email, $user);

		if($added) {
			unlink(realpath(__FILE__));
			header('Location: index.php');
		}
	}

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
	?>
		<p>Please create an admin account.</p>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="email" name="admin_email_address" placeholder="Email Address" />
			<input type="password" name="admin_password" placeholder="Password" />
			<input type="submit" value="Submit" />
		</form>
<?php
require_once(ADMIN_DIR . '/template/footer.php');
?>