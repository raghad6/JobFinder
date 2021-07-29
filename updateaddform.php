<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
		header("location:login.php?msg=error no user");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update ads</title>
	<link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist//js/bootstrap.min.js">
	<link rel = "stylesheet" type = "text/css"  href = "style.css">
</head>
<body>

<?php 
require 'mydb.php';
$db = new MyDb();
$id = $_GET['id'];
$ads = $db->getAdById($id);
?>
<div class="root">
	<nav class="navbar main-nav navbar-light bg-light">
		<div class="navbar-brand  left-side">
			<img class="image" src="../images/logo_transparent.png" alt="logo">
			<span>
				<form action="search.php" method="post" class="form-inline">
                    <input class="form-control mr-sm-2" name="title" type="search" placeholder="Job Title, category" aria-label="Job Title, category">            
                    <input class="form-control mr-sm-2" name= "category" type="search" placeholder="City" aria-label="City">
                    <input class="search" type="submit" name="submit" value="search">
                 </form>
			</span>
		</div>
		<div class="form-inline">
            <a  href="../view.php">Home</a>
				<a  href="../controlPanel.php">Control Panel</a>            
			<a href="../Authentication/logout.php">Log Out</a>
		</div>
	</nav>
	<?php foreach($ads as $ad){ ?>
    <form class="category-form" action="update-opr.php?id=<?php echo($id) ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $ad['adsId']; ?>">
        <input class="category"type="text" name="name" value="<?php echo $ad['name']; ?>" placeholder="add advertisment name" required>
        <input class="category"type="text" name="image" value="<?php echo $ad['image']; ?>" placeholder="add advertisment image" required>
        <input class="submit" type="submit" name="submit" value="Update">
    </form>
</div>
<?php } ?>

</form>
</body>
</html>