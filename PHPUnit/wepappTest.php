<?php
require_once "wepapp.php";
	
	class webappTest extends \PHPUnit_Framework_TestCase{

	 
		public function testAdd()
		{
			$aduh = new webApp();
			$aduh->page="profile";
			
			$this->assertTrue(TRUE,$aduh->page="profile");
		}
		
	}
?>