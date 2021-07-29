<?php 
require 'mydb.php';
$db = new MyDb();
$username = $_POST['username'];
$password = $_POST['password'];
$count = 0 ;
$users = $db->login($username,$password);
foreach($users as $user){
	$count++;
	$type = $user['type'];
	$id = $user['userID'];
}
if($count == 1){
	session_start();
	$_SESSION['auth'] = $type;
	if($type == "admin") {
		header("location:../controlpannel.php?");
	}
	elseif ($type == "businessOwner") {
		header("location:../jobOffer/view.php?id=$id");
	}
	elseif ($type == "user") {
		header ("location:../users/view.php?id=$id");
	}
	else {
		header("location:login.php?msg=Error");
	}
}
?>