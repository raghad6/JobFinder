<?php

 $username = $_POST['username'];
 $password = $_POST['password'];

 //echo "Password: " . $password;

 require 'Mydb.php';

 $db = new MyDb();

 		if($db->login($username,$password)){
 			
 			setcookie("username",$username,time()+ 1000);
 			header("location:index.php");

 			echo "Welcome";
 		}
 		else{
 			header("location:login.php?error=1");
 		}



?>