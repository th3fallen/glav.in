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

class User {


	/**
	 * Construct
	 */
	function __construct($data) {
		$this->data = $data;
		
	}

	/**
	 * Exist
	 *
	 * @param string user's email address
	 * @return	bool
	 */	
	public function exists($email) {

		return $this->data->file_exist(USERS_DIR . $email);

	}

	/**
	 * Validate
	 *
	 * @param string user's email address
	 * @param string user's password
	 * @param string redirect url
	 * @return	bool
	 */	
	public function validate($email, $password) {

		// Make sure user exists
		if(!$this->exists($email))
		{
			return false;
		}
		// If there's a user, continue.
		else
		{
			// Get Contents
			$user_data = $this->data->get_content(USERS_DIR . $email);
			$user = $user_data['user'];

			if($password == $user['password'])
			{			
				$this->start_session($user);

				return true;				
			}
		}

	}

	/**
	 * Start Session
	 *
	 * @param array user's information
	 */	
	public function start_session($user) {

		if(!isset($_SESSION))
		{
			// User confirmed. Start session.
			session_start();
		}
			// Load session info
			$_SESSION['user_email'] = $user['email'];
			$_SESSION['user_level'] = $user['user_level'];
			$_SESSION['time_logged_in'] = time();

			// Adding some randomization
			$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
			
	}

	/**
	 * Logout User
	 */	
	public function logout() {

		if(!isset($_SESSION))
		{
			session_start();
		}

		$_SESSION = array();

		session_destroy();
	}	

	/**
	 * Is the user logged in?
	 *
	 * @param string page from which the method was called
	 * @return	bool
	 */	
	public function is_logged_in($page='') {

		if(!isset($_SESSION))
		{
			session_start();
		}

		// See if there's a session
		if(isset($_SESSION['HTTP_USER_AGENT']))
		{
			if($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
			{
				return false;
			}
			else
			{
				return true;	
			}
			
		}
		else
		{
			if($page)
			{
				$url = 'login.php?redirect=' . $page;
				header('Location:' . $url);				
			}
			else
			{
				return false;
			}			
						
		}

	}

}