<?php

if(!function_exists('pages_list'))
	{
	/**
	 * Get unordered list nav list
	 *
	 * @param string id
	 * @return string
	 */

	function pages_list($id='')
	{
		global $page;
		
		// This function is here to provide a more
		// user-friendly way to get an unordered list
		// of the site's navigation.
		return $page->pages_list($id);

	}
}