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
$jobTitle = $_POST['jobTitle'];
$campanyName = $_POST['companyName'];
$address = $_POST['address'];
$street = $_POST['street'];
$city = $_POST['city'];
$salary = $_POST['salary'];
$teleNo = $_POST['teleNo'];
$email = $_POST['email'];
$image = $_POST['image'];
$sponsored = $_POST['sponsored'];
$category = $_POST['category'];
$jobDesc = $_POST['jobDesc'];
$jobReq = $_POST['jobReq'];
$arr = $db->updateJob($id, $jobTitle, $campanyName, $address, $street, $city, $salary,$teleNo,$email,
$image,$category,$jobDesc,$jobReq,$sponsored);
header("location:../controlPanel.php");
?>