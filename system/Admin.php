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
 * @since		Version 2.0.0-alpha
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin {

	/**
	 * Construct
	 */
	public function __construct($data,$user) {
		$this->data = $data;
		$this->user = $user;		
	}

}