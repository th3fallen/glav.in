<?php
/**
* Glav.in
*
* A very simple CMS
*
*
* @package Glav.in
* @author Matt Sparks
* @copyright Copyright (c) 2013, Matt Sparks (http://www.mattsparks.com)
* @license http://opensource.org/licenses/MIT The MIT License (MIT)
* @link http://glav.in
* @since Version 1.0.0-alpha
*/

$title = 'Install';
$errors = array();
$msgs = array();
$login_header = true;
$created = false;

require_once('config.php');
require_once(SYSTEM_DIR . 'bootstrap.php');

if( $_POST ) {

	if( ( $_POST['admin_email_address'] == '' ) || ( $_POST['admin_password'] == '' ) ) {
		$errors[] = "Fields Cannot Be Empty";
	}

	if( empty( $errors ) ) {
		$email = $_POST['admin_email_address'];
		$password = $_POST['admin_password'];
		$user_level = 1;

		$created = $user->create( $email, $password, $user_level );

		if( $created ) {
			$msgs[] = 'User created! <a href="' . base_url() . 'admin/" title="Login">Go Login!</a>';
			unlink( realpath( __FILE__ ) );
		} else {
			$errors[] = 'User not created';
		}
	}

}

require_once( ADMIN_DIR . '/template/header.php' );
?>
<div id="login-content">
	<?php
	foreach( $msgs as $msg )
	{
		echo '<div class="msg">' . $msg . '</div>';
	}

	foreach( $errors as $errors )
	{
		echo '<div class="error">' . $errors . '</div>';
	}

	if( !$created ) {
	?>
	<p>Thanks for installing Glav.in! Please create an admin account.</p>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="email" name="admin_email_address" placeholder="Email Address" />
	<input type="password" name="admin_password" placeholder="Password" />
	<input type="submit" value="Submit" />
	</form>
<?php
	}

require_once( ADMIN_DIR . '/template/footer.php' );
?>