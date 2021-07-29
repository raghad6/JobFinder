<?php 
 require 'mydb.php';
 $db = new MyDb();
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$teleNo = $_POST['teleNo'];
$address = $_POST['address'];
$type = $_POST['selectType'];
$confirm = $_POST['confirm'];
$result = $db->addUser($username, $password, $email, $teleNo, $address, $type);
header("location:login.php");
 ?>