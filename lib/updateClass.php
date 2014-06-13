<?php
include('Class.php');

$sql = $_GET["sql"];
$namatable = $_REQUEST["table"];
$sql = "select * from ".$namatable." where ".$sql;

$aks = new dbAkses();
$data= $aks->select($sql);

echo json_encode($data);
?>