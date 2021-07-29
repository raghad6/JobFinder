<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
		header("location:login.php?msg=error no user");
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Control Panel</title>
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist//js/bootstrap.min.js">
    <link rel = "stylesheet" type = "text/css"  href = "style.css" >
</head>
<body>

	<?php
	require 'mydb.php';
	$db = new MyDb();
	$users = $db->getUsers();
	$jobs = $db->getjobs();
	$ads = $db->getAds();
	?>
	<div class="root">
		<nav class="navbar main-nav navbar-light bg-light">
			<div class="navbar-brand  left-side">
				<img class="image" src="images/logo_transparent.png" alt="logo">
				<span>
					<form action="search.php" method="post" class="form-inline">
						<input class="form-control mr-sm-2" name="title" type="search" placeholder="Job Title, category" aria-label="Job Title, category">            
						<input class="form-control mr-sm-2" name= "category" type="search" placeholder="City" aria-label="City">
						<input class="search" type="submit" name="submit" value="search">
					</form>
				</span>
			</div>
			<div class="form-inline">
				<a  href="view.php">Home</a>
				<a  href="controlPanel.php">Control Panel</a>
				<a href="Authentication/logout.php">Log Out</a>
			</div>
		</nav>

		<table class="table box">
			<thead>
				<tr>
					<th scope="coth">#</th>
					<th scope="col">username</th>
					<th scope="col">email</th>
					<th scope="col">type</th>
					<th scope="col">telephone number</th>
					<th scope="col">address</th>
					<th scope="col">delete</th>
					<th scope="col">update</th>
				</tr>
			</thead>

			<?php foreach($users as $user){?>
				<tbody>
					<tr>
						<td><?php echo $user['userID'];?></td>
						<td><?php echo $user['username'];?></td>
						<td><?php echo $user['email'];?></td>
						<td><?php echo $user['type'];?></td>
						<td><?php echo $user['teleNo'];?></td>
						<td><?php echo $user['address'];?></td>
						<td><a href="users/delete.php?id=<?php echo $user['userID'];?>">Delete</a></td>
						<td><a href="users/update.php?id=<?php echo $user['userID'];?>">Update</a></td>
					</tr>
				</tbody>


			<?php } ?>

		</table>
		<br>
		<table class="table box">
			<thead>
				<tr>
					<th>#</th>
					<th>job title</th>
					<th>company name</th>
					<th>category</th>
					<th>address</th>
					<th>Details</th>
					<th>Add Category</th>
					<th>review</th>
					<th>delete</th>
					<th>update</th>	
				</tr>
			</thead>


			<?php foreach($jobs as $job){?>
				<tbody>
					<tr>
						<td><?php echo $job['jobID'];?></td>
						<td><?php echo $job['jobTitle'];?></td>
						<td><?php echo $job['companyName']?></td>
						<td><?php echo $job['category'];?></td>
						<td><?php echo $job['address'];?></td>
						<td><a href="jobOffer/details.php?id=<?php echo $job['jobID'];?>">Details</td>
						<td><a href="addCategory.php?id=<?php echo $job['jobID'];?>">add Category</a></td>
						<td><a class="review" href="reviewPost.php?id=<?php echo $job['jobID'];?>">post job offer</a></td>
						<td><a href="jobOffer/delete.php?id=<?php echo $job['jobID'];?>">Delete</a></td>
						<td><a href="jobOffer/update.php?id=<?php echo $job['jobID'];?>">Update</a></td>
					</tr>
			</tbody>

			<?php } ?>

		</table>
		<table class="table box">
			<thead>
				<tr>
					<th>#</th>
					<th>name</th>
					<th>image</th>
					<th>delete</th>
					<th>update</th>	
				</tr>
			</thead>


			<?php foreach($ads as $ad){?>
				<tbody>
					<tr>
						<td><?php echo $ad['adsId'];?></td>
						<td><?php echo $ad['name'];?></td>
						<td><?php echo $ad['image']?></td>
						<td><a href="ads/update.php?id=<?php echo $ad['adsId'];?>">Update</a></td>
						<td><a href="ads/delete.php?id=<?php echo $ad['adsId'];?>">Delete</a></td>
					</tr>
			</tbody>

			<?php } ?>

		</table>
		<div class="add-ad">
			<a href="ads/addAd.php">add Advertisement</a>		
		</div>
	</div>
	
</body>
</html>