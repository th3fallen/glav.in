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

$updated = false;

require_once('../system/password.php');
require_once('../system/mail.php');

if(isset($_GET['token']) && isset($_GET['email']))
{

	$email = clean($_GET['email']);
	$token = clean($_GET['token']);
	$show_update_form = true;

	// Check token & user's existence
	if($user->exists($email))
	{
		$check = $data->get_content(USERS_DIR . $email);

		if($token != $check['user']['token'])
		{
			$errors[] = 'Invalid Token';
			$show_update_form = false;
		}
	}
	else
	{
		$errors[] = 'User not found.';
		$show_update_form = false;
	}

	if(empty($errors))
	{
		if($_POST)
		{
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];

			//Validate
			if(empty($password1) || empty($password2))
			{
				$errors[] = 'Please enter your new password in both fields.';
			}

			if($password1 != $password2)
			{
				$errors[] = 'Passwords do not match.';
			}

			// No errors. Update password.
			if(empty($errors))
			{
				$password  = password_hash($password1, PASSWORD_DEFAULT, $password_options);
				$email     = $_GET['email'];

				// Look for user
				if($user->exists($email))
				{
					// Update User
					$content = array(
						'user' => array(
							'password' => $password,
							'token' => '' // Empty token
						)				
					);

					if($data->update_file(USERS_DIR . $email, $content))
					{
						$msgs[] = 'Password Updated. <a href="' . base_url() . 'admin/login.php" title="Login">Go login!</a>';
						$updated = true;
					}
				} 
				else
				{
					$errors[] = 'User not found.';
				}

			}
		}
	}

}

if(($_POST) && !isset($_GET['token'])) {

	$email  = clean($_POST['email']);
	$token  = password_hash(time().rand(0, 2000), PASSWORD_DEFAULT, $password_options);

	if($email == '')
	{
		$errors[] = 'Please enter a valid email address.';
	}

	// No errors, continue...
	if(empty($errors))
	{
		// Look for user
		if($user->exists($email))
		{
			// Add token to user
			$content = array(
				'user' => array(
					'token' => $token
				)				
			);

			if($data->update_file(USERS_DIR . $email, $content))
			{

				$url = base_url() . 'admin/reset_password.php?email=' . $email . '&token=' . $token;
				$message = 'To reset your password please go to the following address: ' . $url;

				$mailer = new Simple_Mail();
				$send   = $mailer->setTo($email, 'Glav.in')
							->setSubject('Reset Password')
							->setFrom('no-reply@glav.in', 'Glav.in')
							->addMailHeader('Reply-To', 'no-reply@glav.in', 'Glav.in')
							->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
							->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
							->setMessage($message)
							->setWrap(100)
							->send();
				if($send)
				{
					$msgs[] = "An email has been sent with instructions for resetting your password";
				}
			}
		}
		else
		{
			$errors[] = 'No User Found';
		}
	}

}
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

	if(!isset($_GET['token']))
	{
	?>
	<p>To reset your password, please enter your email address below.</p>
	<section id="login-form">			
		<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
			<input type="email" placeholder="Email Address" name="email" />
			<input type="submit" value="Submit">
		</form>
	</section><!-- end login-form -->
	<?php
	}
	else
	{
		if(!$updated && $show_update_form)
		{
		?>
		<p>Please choose a new password.</p>
		<section id="login-form">			
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
				<input type="password" placeholder="New Password" name="password1" />
				<input type="password" placeholder="Repeat New Password" name="password2" />
				<input type="submit" value="Submit">
			</form>
		</section><!-- end login-form -->	
		<?php
		}
	}
?>