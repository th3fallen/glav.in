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

$title  = 'Create Page';
$errors = array();
$msgs   = array();
$page_name = '';
$page_content = '';

require_once('../config.php');
require_once(SYSTEM_DIR . 'bootstrap.php');

// Check to see if the user is logged in
if($user->is_logged_in('create_page.php'))
{

	require_once(ADMIN_DIR  . '/template/header.php');
	
	if($_POST) {

		$page_name = $_POST['page_name'];
		$page_content = $_POST['page_content'];

		// Simple Validation
		if($page_name == '')
		{
			$errors[] = 'Page Name cannot be blank';
		}

		if($page_content == '')
		{
			$errors[] = 'Page Content cannot be empty';
		}

		$p = array(
				'page_name'    => $page_name,
				'page_content' => $page_content
			);

		// If there's no errors create the page
		if(empty($errors))
		{
			if($page->create($p)) 
			{
				$msgs[] = 'Page Created. <a href="pages.php" title="Pages">Return to Pages List</a>';
			} 
			else 
			{
				$errors[] = 'Something went wrong. The page wasn\'t created.';
			}
		}

	}
?>
<div id="page-description">
<h1>Create Page</h1>
<p>Fill out the form below to create a new page.</p>
</div><!-- end page-description -->
<div id="admin-content-body">
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="text" placeholder="Page Name" name="page_name" value="<?php echo $page_name ? $page_name : ''; ?>" />
	<textarea name="page_content" placeholder="Page Content" id="page-content"><?php echo $page_content ? $page_content : ''; ?></textarea>
	<input type="submit" value="Submit">
</form>
<?php 
	require_once(ADMIN_DIR . '/template/footer.php'); 
}
?>