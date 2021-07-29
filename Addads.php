<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
		header("location:login.php?msg=error no user");
	}
?>
<?php 
require 'mydb.php';
$db = new MyDb();
$name = $_POST['name'];
$image = $_POST['image'];
$result = $db->addAd($name, $image);
header("location:../controlPanel.php");
?>