<?php
include('../lib/Class.php');
$table=$_GET['table'];
$a=new dbAkses();
$qty=$a->select("select count(*) from ".$table."");
echo$qty[0][0];
?>