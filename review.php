<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
		header("location:login.php?msg=error no user");
	}

require 'mydb.php';
$db = new MyDb();
$id = $_GET['id'];
$result = $db->review($id);
header("location:controlPanel.php");
 ?>