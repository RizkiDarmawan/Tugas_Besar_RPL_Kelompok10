<?php
ob_start();
include('../lib/Class.php');
$reg = new userSession();
$reg->userLogout("admin");

?>