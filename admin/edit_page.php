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

$title  = 'Edit Page';
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
	
	// Do we have a page to edit?
	if(isset($_GET['page']) && $_GET['page'] != '')
	{
		$page = $_GET['page'];

		// See if the page exists
		if(!$data->file_exist(PAGES_DIR . $page))
		{
			$errors[] = 'Page Not Found';
		}
		// It does, so let's grab the data
		else
		{
			$content = $data->get_content(PAGES_DIR . $page);

			$page_name = $content['page']['name'];
			$page_content = $content['page']['content'];
		}
	}
	else
	{
		$errors[] = 'No Page Selected';
	}

	// The form has been submitted
	if($_POST) {
		$page_file = $_GET['page'];
		$page_name = $_POST['page_name'];
		$page_content = $_POST['page_content'];

		$content = array(
			'page' => array(
				'name' => $page_name,
				'content' => $page_content
			)				
		);

		if($data->update_file(PAGES_DIR . $page_file, $content))
		{
			$msgs[] = 'Page Updated. <a href="pages.php" title="Pages">Return to Pages List</a>';
		}		
	}
?>
<h1>Edit Page</h1>
<?php
foreach($msgs as $msg)
{
	echo '<div class="msg">' . $msg . '</div>';
}

foreach($errors as $errors)
{
	echo '<div class="error">' . $errors . '</div>';
}

if(empty($errors))
{
?>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<input type="text" placeholder="Page Name" name="page_name" value="<?php echo $page_name ? $page_name : ''; ?>" />
	<textarea name="page_content" placeholder="Page Content" id="page-content"><?php echo $page_content ? $page_content : ''; ?></textarea>
	<input type="submit" value="Submit">
</form>
<?php 
}
	require_once(ADMIN_DIR . '/template/footer.php'); 
}
?>