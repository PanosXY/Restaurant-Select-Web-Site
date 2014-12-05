<?php
	include_once("mydbclass.php");
	$db = new myDB('localhost', 'root', 'passwd');
	$db->SelectDB('Home');
?>
