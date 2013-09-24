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
	
if($_POST) {

	$page_name    = $_POST['page_name'];
	$page_content = $_POST['page_content'];
	$page_visible = $_POST['page_visible'];

	// Simple Validation
	if($page_name == '')
	{
		$errors[] = 'Page Name cannot be blank';
	}

	// Check to make sure there isn't already a page
	// with this name. If so, send error.
	if($data->file_exist(PAGES_DIR . trim($page_name)))
	{
		$errors[] = "A page with this name already exists. Please update the page name.";
	}		

	if($page_content == '')
	{
		$errors[] = 'Page Content cannot be empty';
	}

	$p = array(
			'page_name'    => $page_name,
			'page_content' => $page_content,
			'page_visible' => $page_visible
		);

	// If there's no errors create the page
	if(empty($errors))
	{
		if($page->create($p)) 
		{
			$msgs[] = 'Page Created. <a href="'. base_url() .'admin/pages" title="Pages">Return to Pages List</a>';
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
	// Print out any messages or errors
	foreach($msgs as $msg)
	{
		echo '<div class="msg">' . $msg . '</div>';
	}

	foreach($errors as $errors)
	{
		echo '<div class="error">' . $errors . '</div>';
	}
	?>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<input type="text" placeholder="Page Name" name="page_name" value="<?php echo $page_name ? $page_name : ''; ?>" />
		<p>
			<strong>Page Address:</strong> <?php echo base_url(); ?><span id="create-uri"><?php echo $page_name ? strtolower(str_replace(" ", "_", $page_name)) : ''; ?></span>
		</p>
		<textarea name="page_content" placeholder="Page Content" id="page-content"><?php echo $page_content ? $page_content : ''; ?></textarea>
		<p>
			Is this page visible to the public?
			<select name="page_visible">
				<option value="true">Yes</option>
				<option value="false">No</option>
			</select>
		</p>
		<input type="submit" value="Submit">
	</form>