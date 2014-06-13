<?php
	require_once "securityclass.php";
	
	class securityTest extends \PHPUnit_Framework_TestCase{
		private $security;
 
		public function setUp()
		{
			$this->security = new security();
		}
	 
		public function testAdd()
		{
			$this->assertEquals('test', $this->security->replace("test$"));
			$this->assertEquals('ajo', $this->security->replace("ajo#"));
			$this->assertEquals('coba', $this->security->replace("coba;"));
		}
	
	}
?>