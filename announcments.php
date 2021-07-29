<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
		header("location:login.php?msg=error no user");
	}
?>
<!DOCTYPE html>
<html>
   <head>
	  <title>My Announcements</title>
	  <link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
   	  <link rel="stylesheet" href="../bootstrap-4.0.0/dist//js/bootstrap.min.js">
      <link rel = "stylesheet" type = "text/css"  href = "style.css" >
   </head>
   <body>
   <?php 
        $id = $_GET['id'];
    ?>
<div class="root">
	<nav class="navbar main-nav navbar-light bg-light">
		<div class="navbar-brand  left-side">
			<img class="image" src="../images/logo_transparent.png" alt="logo">
			<span>
				<form action="../search.php" method="post" class="form-inline">
                    <input class="form-control mr-sm-2" name="title" type="search" placeholder="Job Title, category" aria-label="Job Title, category">            
                    <input class="form-control mr-sm-2" name= "category" type="search" placeholder="City" aria-label="City">
                    <input class="search" type="submit" name="submit" value="search">
                </form>
			</span>
		</div>
		<div class="form-inline">
			<a  href="view.php?id=<?php echo $id ?>">Home</a>
			<a href="add.php?id=<?php echo $id ?>">Post Job</a>
			<a href="announcements.php?id=<?php echo $id ?>">My announcements</a>            
			<a href="../Authentication/logout.php">Log Out</a>
		</div>
	</nav>
	<?php
	require 'mydb.php';
	$db = new MyDb();
	$id = $_GET['id'];
	$jobs = $db->getjobsOffer($id);
	if (empty($jobs)) {
	?>
	<h1>You Don't have any announcements yet</h1>
	<?php }
	else { ?>
	<table class="table box">
	<thead>
		<tr>
		<th scope="col">#</th>
		<th scope="col">Job Title</th>
		<th scope="col">Company</th>
		<th scope="col">category</th>
		<th scope="col">Address</th>
		<th scope="col">City</th>
		<th scope="col">Date</th>
		<th scope="col">Details</th>	  
		</tr>
  </thead>

		<?php foreach($jobs as $job){?>
			<tbody>
				<tr>
					<th scope="row"><?php echo $job['jobID'];?></th>
					<td><?php echo $job['jobTitle']?></td>
					<td><?php echo $job['companyName'];?></td>
					<td><?php echo $job['category'];?></td>
					<td><?php echo $job['address'];?></td>
					<td><?php echo $job['city'];?></td>
					<td><?php echo $job['offerDate'];?></td>
					<td><a href="details.php?id=<?php echo $job['jobID']?>">Details</td>				
				</tr>
			</tbody>

		<?php }} ?>

	</table>
	</body>
</html>
  