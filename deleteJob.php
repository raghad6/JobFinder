<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
		header("location:login.php?msg=error no user");
	}
?>
<?php 
require 'mydb.php';
$db = new MyDb();
$id = $_GET['id'];
$arr = $db->deleteJob($id);
header("location:../controlPanel.php");
 ?>