<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
			header("location:../Authentication/login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add advertisemnt</title>
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist//js/bootstrap.min.js">
    <link rel = "stylesheet" type = "text/css"  href = "style.css" >
</head>
<body>
<div class="root">
	<nav class="navbar main-nav navbar-light bg-light">
		<div class="navbar-brand  left-side">
        <img class="image "style="width:50px;" src="img/logo.png" alt="logo">
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
    <form class="category-form" action="add-ads-opr.php" method="post">
        <input class="category"type="text" name="name" placeholder="add advertisment name" required>
        <input class="category"type="text" name="image" placeholder="add advertisment description" required>
        <input class="submit" type="submit" name="submit" value="add">
    </form>
</div>
</body>    
</html>