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

defined('BASEPATH') OR exit('No direct script access allowed');

class Page {

	/**
	 * Construct
	 */
	function __construct($data) {
		$this->data = $data;
	}

	/**
	 * Get Pages
	 *
	 * @return	array of all pages with full path
	 */	
	public function get_pages() {

		$pages = array();

		foreach (glob(PAGES_DIR . "*.json") as $page)
		{
			$pages[] = $page;
		}		

		return $pages;
	}

	/**
	 * Pages List
	 *
	 * @param string optional id attribute
	 * @return	html list of all pages
	 */	
	public function pages_list($id='') {

		$pages = $this->get_pages();

		$id = $id ? ' id="'.$id.'"' : '';

		$list  = '<ul'.$id.'>';

		foreach($pages as $page) {

			$page_name = basename($page, '.json');

			if($page_name != '404') {
				$list .= '<li>';
				$list .= '<a href="' . base_url() . $page_name . '">';
				$list .= ucwords(str_replace('_', ' ', $page_name));
				$list .= '</a></li>';
			}

		}

		$list .= '</ul>';

		return $list;

	}	

	/**
	 * Load the page
	 *
	 * @param	string	the page name being requested
	 */
	public function load($page) {

		// If $page is empty, lets assume the index/home page has been requested.
		if(($page == '') || ($page == 'index.php') || ($page == 'index.html'))
		{
			$page = 'home';
		}
		// If the page can't be found load the 404 page. 
		elseif (!$this->data->file_exist(PAGES_DIR . $page)) 
		{
			$page = '404';
		}
			
		$content       = $this->data->get_content(PAGES_DIR . $page);
		$page          = $content['page'];
		$template      = $page['template'];
		$template_path = BASEPATH . '/template/' . $template . '.php';

		// Make sure template exists
		if(file_exists($template_path)) 
		{
			include($template_path);
		} 
		else 
		{
			exit('<strong>ERROR:</strong> Template "'.$template.'" not found.');
		}
		

	}

	/**
	 * Create a page
	 *
	 * @param	array containing all our page info and content
	 * @return	bool
	 */
	public function create($p) {
		$page_name    = $p['page_name'];
		$page_content = $p['page_content'];
		$page_created = time();
		$page_file    = PAGES_DIR . str_replace(' ', '_', strtolower($page_name));

		$page = array(
				'page' => array(
						'name'     => $page_name,
						'content'  => $page_content,
						'created'  => $page_created,
						
						// For the time being.
						'template' => 'page'
					)
			);

		return $this->data->create_file($page_file, $page);
		
	}

}

?>