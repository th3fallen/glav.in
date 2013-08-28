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


if ( ! function_exists('base_url'))
{
	/**
	 * Returns the site's base url
	 *
	 * @return	string
	 */
	function base_url() 
	{

		if(isset($_SERVER['HTTP_HOST'])) 
		{

			$base_url  = $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
			$base_url .= $_SERVER['HTTP_HOST'];
			$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
			
			// If we're in the admin directory remove that from the path
			// probably not the best approach, however
			return str_replace('admin/', '', $base_url); 
		}
		
	}

 }

 if(!function_exists('clean'))
 {
 	/**
 	 * Clean user input
 	 *
 	 * @param string input being cleaned
 	 * @param bool convert html or not
 	 * @return string
 	 */

 	function clean($input, $convert=false)
 	{
 		$dirty = $input;

 		// Strip tags
 		$clean = strip_tags($dirty);

 		if($convert)
 		{
	 		// Convert anything that needs converted
	 		$clean = htmlentities($clean); 			
 		}

 		return $clean;

 	}
 }
