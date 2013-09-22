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
			$page_visible = $content['page']['visible'];
		}
	}
	else
	{
		$errors[] = 'No Page Selected';
	}

	// The form has been submitted
	if($_POST) {
		$page_file = $_GET['passed'];
		$page_name = $_POST['page_name'];
		$page_content = $_POST['page_content'];
		$page_visible = $_POST['page_visible'] == "true" ? true : false;

		$content = array(
			'page' => array(
				'name' => trim($page_name),
				'content' => $page_content,
				'visible' => $page_visible
			)				
		);

		if($data->update_file(PAGES_DIR . $page_file, $content))
		{
			$msgs[] = 'Page Updated. <a href="'. base_url() .'admin/pages" title="Pages">Return to Pages List</a>';
		}
	}		
?>
<div id="page-description">
	<h1>Edit Page</h1>
	<p>Edit your existing page below.</p>
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

if(empty($errors))
{
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
			<option value="true"<?php echo $page_visible ? ' selected="true"' : ''; ?>>Yes</option>
			<option value="false"<?php echo $page_visible ? '' : ' selected="true"'; ?>>No</option>
		</select>
	</p>	
	<input type="submit" value="Submit">
</form>
<?php
}
?>