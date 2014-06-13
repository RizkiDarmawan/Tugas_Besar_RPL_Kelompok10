<?php
require_once "classtime.php";
class classtimetest extends PHPUnit_Framework_TestCase
{
	private $time;
	public function setup()
	{
		$this->time = new time();
	}
	public function testTimer()
	{
		$this->assertEquals("2014", $this->time->timer('t'));
	}
	/*public function testNamahari()
	{

	}
	public function testNamabulan()
	{

	}
	public function testSelisih()
	{

	}*/
}
?>