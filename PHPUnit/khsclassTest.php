<?php
	require_once "khsclass.php";
	
	class securityTest extends \PHPUnit_Framework_TestCase{
		private $khs;
 
		public function setUp()
		{
			$this->khs = new khs();
		}
	 
		public function testAdd()
		{
			$this->assertEquals("A", $this->khs->predikat("84"));
			$this->assertEquals("B", $this->khs->predikat("79"));
			$this->assertEquals('C', $this->khs->predikat("63"));
		}
	
	}
?>