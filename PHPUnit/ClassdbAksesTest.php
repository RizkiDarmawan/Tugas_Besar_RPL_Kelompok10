<?php
require_once "ClassdbAkses.php";

class dbAksesTest extends PHPUnit_Extensions_Database_TestCase {
	protected $conn = null;

	public function getConnection() {
		if (is_null($this->conn)) {
			$pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$this->conn = $this->createDefaultDBConnection($pdo);
		}
		return $this->conn;
	}

	public function setUp()
	{
		$this->getConnection()->getConnection()->query("set foreign_key_checks=0");
		parent::setUp();
		$this->getConnection()->getConnection()->query("set foreign_key_checks=1");
	}
	
	public function getDataSet() {
		$dataset = new PHPUnit_Extensions_Database_DataSet_CsvDataSet();
		$dataset->addTable('amalanyaumi', dirname(__FILE__) . '/files/amalanyaumi.csv');
		return $dataset;
	}
	
	public function testAddEntry()
    {
		$dataSet = $this->getConnection()->createDataSet();
        $this->assertEquals(10, $this->getConnection()->getRowCount('amalanyaumi'), "Pre-Condition");

		$a = new dbAkses();
		$a->input("insert into amalanyaumi values('','puasa nabi daud','20x')");
        
        $this->assertEquals(11, $this->getConnection()->getRowCount('amalanyaumi'), "Inserting failed");
    }
}