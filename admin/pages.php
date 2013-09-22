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
?>
<div id="page-description">
<h1>Pages</h1>
<p>Below is a list of all of your site's pages. From here you are able to edit and delete existing pages. To create a new page, click the button in the upper right.</p>
<a href="create_page" title="Create Page" id="create-page-btn" class="btn">Create Page</a>
</div><!-- end page-description -->
<div id="admin-content-body">
	<ul id="admin-pages-list">
		<?php
			
			$pages = $page->get_pages();

			// Put home first
			echo '<li>';
			echo '<a href="' . base_url() . '">Home</a>';
			echo '<a href="edit_page/home" class="action-btn">Edit</a>';
			echo '</li>';

			// List the rest of the pages
			foreach($pages as $page)
			{
				$page_name = basename($page, '.json');

				if($page_name != '404' && $page_name != 'home')
				{
					echo '<li>';
					echo '<a href="'. base_url() . $page_name . '">' . str_replace('_', ' ', $page_name) . '</a>';
					echo '<a href="edit_page/' . $page_name . '" class="action-btn">Edit</a>';
					if($page_name != 'home')
					{
						echo '<a href="delete_page/' . $page_name . '" class="action-btn">Delete</a>';	
					}				
					echo '</li>';
				}
				
			}
			
		?>
	</ul>