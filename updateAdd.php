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
$name = $_POST['name'];
$image = $_POST['image'];
$arr = $db->updateAd($id, $name, $image);
header("location:../controlPanel.php");
 ?>