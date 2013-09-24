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

$page_name = '';
$page_content = '';

// Do we have a page to edit?
if(isset($_GET['passed']) && $_GET['passed'] != '')
{
	$page = $_GET['passed'];

	// You can't delete the 404 page or the home page
	// you stupid or somethin'?
	if($page == '404' || $page == 'home')
	{
		$errors[] = 'You cannot delete that page. Sorry.';
	}

	// See if the page exists
	if(!$data->file_exist(PAGES_DIR . $page))
	{
		// It doesn't
		$errors[] = 'Page Not Found';
	}

}
else
{
	$errors[] = 'No Page Selected';
}

// The form has been submitted
if($_POST) {

	// Are you sure?
	if($_POST['are_you_sure'] == 'Yes')
	{
		// Delete Page
		$deleted = $data->delete_file(PAGES_DIR . $page);

		// Was the page deleted?
		if($deleted)
		{
			// Yup...
			$msgs[] = 'Page Deleted. <a href="'. base_url() .'admin/pages" title="Pages">Return to Pages List</a>';
		}
		else
		{
			// Nope...
			$errors[] = 'Page Not Deleted';
		}
	}
	else
	{
		// What do we say to the god of death?
		// Not today.
		$errors[] = 'Page Not Deleted. <a href="'. base_url() .'admin/pages" title="Pages">Return to Pages List</a>';
	}
}
?>
<div id="page-description">
	<h1>Delete Page</h1>
	<p>Deleting your page cannot be reversed. Once it's gone, it's gone. No return. No zombie pages. Gone. Seriously, make sure you want to do this.</p>
</div><!-- end page-description -->
<div id="admin-content-body">
	<?php
	// Print out any messages or errors
	foreach($msgs as $msg)
	{
		echo '<div class="msg">' . $msg . '</div>';
	}

	foreach($errors as $errors)
	{
		echo '<div class="error">' . $errors . '</div>';
	}

	// If there are no errors, continue...
	if(empty($msgs) && empty($errors))
	{
	?>
	<p>Are you sure you want to delete <strong><?php echo $page; ?></strong>?</p>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<!-- <input type="hidden" name="are_you_sure" value="yup"> -->
		<input type="submit" name="are_you_sure" value="Yes">
		<input type="submit" name="are_you_sure" value="Nope">
	</form>
	<?php
	}
	?>