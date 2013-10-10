<?php

require_once('config.php');
require_once(SYSTEM_DIR . 'bootstrap.php');

class UserTest extends PHPUnit_Framework_TestCase {

	function __construct() {

		$password_options = array(
			'cost' => 11,
			'salt' => '45tygrfE#$%t6hgr4332@23r4t5y$$%G###'
		);

		$this->data = new Data();
		$this->user = new User($this->data, $password_options);

		$this->fakeuser = 'fakeuser@example.com';
	}
	
	/**
	 * @expectation create() returns true when user is created
	 */	
	public function testCreateUserReturnsTrue() {
			
			// Create a fake user for testing
			$user = $this->user->create(
				'fakeuser@example.com',
				'test',
				1
			);

			$this->assertTrue($user);
	}

	/**
	 * @expectation create() returns false when user exists
	 */	
	public function testCreateUserReturnsFalseWhenUserExists() {
			
			// Create a fake user for testing
			$user = $this->user->create(
				'fakeuser@example.com',
				'test',
				1
			);

			$this->assertFalse($user);
	}	

	/**
	 * @expectation exist() returns false when no user found
	 */
	public function testExistReturnsFalseWhenNoUserFound() {
	    $this->assertTrue($this->user->exists($this->fakeuser));
	}

	/**
	 * @expectation delete() returns true when user is deleted
	 */
	public function testDeleteUserReturnsTrue() {
		$this->assertTrue($this->user->delete($this->fakeuser));
	}
    
	/**
	 * @expectation delete() returns false when user doesn't exist
	 */
	public function testDeleteUserReturnsFalseWhenUserDoesntExist() {
		$this->assertFalse($this->user->delete($this->fakeuser));
	}    

}