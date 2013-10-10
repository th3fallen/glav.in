<?php

require_once('config.php');
require_once(SYSTEM_DIR . 'bootstrap.php');

class PageTest extends PHPUnit_Framework_TestCase {

	function __construct() {
		$this->data = new Data();
		$this->page = new Page($this->data);
	}
	
	/**
	 * @expectation get_pages() returns an array
	 */
	public function testGetPagesReturnsArray() {	    
	    $this->assertTrue(is_array($this->page->get_pages()));
	}

	/**
	 * @expectation get_pages() returns a non-empty array
	 */
	public function testGetPagesNotEmpty() {
		$this->assertNotEmpty($this->page->get_pages());
	}

	/**
	 * @expectation pages_list() returns a string
	 */
	public function testPagesListReturnsString() {
		$this->assertTrue(is_string($this->page->pages_list()));
	}

	/**
	 * @expectation pages_list() returns a non-empty string
	 */
	public function testPagesListNotEmpty() {
		$this->assertNotEmpty($this->page->pages_list());
	}

	/**
	 * Mock objects for load() & create()
	 */
    public function testLoad() {
        // Create a stub for the Page class.
        $stub = $this->getMockBuilder('Page')
        			 ->disableOriginalConstructor()
        			 ->getMock();
 
        // Configure the stub.
        $stub->expects($this->any())
             ->method('load')
             ->will($this->returnValue('foo'));
 
        // Calling $stub->doSomething() will now return
        // 'foo'.
        $this->assertEquals('foo', $stub->load('page'));
    }	

    public function testCreate() {
        // Create a stub for the Page class.
        $stub = $this->getMockBuilder('Page')
        			 ->disableOriginalConstructor()
        			 ->getMock();
 
        // Configure the stub.
        $stub->expects($this->any())
             ->method('create')
             ->will($this->returnValue('foo'));
 
        // Calling $stub->doSomething() will now return
        // 'foo'.
        $this->assertEquals('foo', $stub->create('page'));
    }	    

}