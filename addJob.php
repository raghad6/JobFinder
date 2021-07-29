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
$companyName = $_POST['companyName'];
$address = $_POST['address'];
$street = $_POST['street'];
$city = $_POST['city'];
$salary = $_POST['salary'];
$teleNo = $_POST['teleNo'];
$email = $_POST['email'];
$image = $_POST['image'];
$sponsored = $_POST['sponsored'];
$selectCategory = $_POST['selectCategory'];
$jogDesc = $_POST['jobDesc'];
$jobReq = $_POST['jobReq'];
$date = $_POST['date'];
$application = $_POST['application'];
$result = $db->addJob($jobTitle, $companyName, $address, $street, $city, $salary,$teleNo,$email,$image,$selectCategory,$jogDesc,$jobReq,$sponsored, $id, $date, $application);
header("location:announcements.php?id=$id");
 ?>