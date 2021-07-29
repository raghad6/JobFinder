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
    <title>Update Job Date</title>
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist//js/bootstrap.min.js">
    <link rel = "stylesheet" type = "text/css"  href = "style.css" >
</head>
<body>
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
	<?php 
	require 'mydb.php';
	$db = new MyDb();
	$id = $_GET['id'];
	$jobs = $db->getJobById($id);
	foreach($jobs as $job) { 
	?>
	<div class="job-form-content">
		<div class="job-form-header">
			<h1>Add Job Offer</h1>
		</div>
		<div class="job-form-input">
			<form action="update-opr.php?id=<?php echo $id; ?>" method="post">
				<div class="job-form-input-top">
					<div class="left-content">
						<input type="hidden" name="id" value="<?php echo $job['jobID']; ?>">
						<label for="jobTitle"><b>Job Title</b></label>
						<input type="text" name="jobTitle"  placeholder="job title" value="<?php echo $job['jobTitle']; ?>">
						<label for="company"><b>Company Name</b></label>
						<input type="text" name="companyName" placeholder="company name" value="<?php echo $job['companyName']; ?>">
						<label for="address"><b>Address</b></label>
						<input type="text" name="address" placeholder="address" value="<?php echo $job['address']; ?>">
						<label for="street"><b>Street</b></label>
						<input type="text" name="street" placeholder="street" value="<?php echo $job['street']; ?>">
						<label for="city"><b>City</b></label>
						<input type="text" name="city" placeholder="city" value="<?php echo $job['city'];?>">
						<label for="salary"><b>Salary</b></label>
						<input type="text" name="salary" placeholder="salary" value="<?php echo $job['salary']; ?>">
					</div>
					<div class="right-content">
						<label for="email"><b>Email</b></label>
						<input type="text" name="email" placeholder="email" value="<?php echo $job['email']; ?>">
						<label for="application"><b>Application Link </b></label>
						<input type="text" name="application" placeholder="add application link" value="<?php echo $job['application']; ?>">
						<label for="date"><b>Last Date For Applying</b></label>
						<input type="text" name="date" placeholder="last date for applying" value="<?php echo $job['lastDate']; ?>">
						<label for="image"><b>Image URL</b></label>
						<input type="text" name="image" placeholder="image" value="<?php echo $job['image']; ?>">
						<label for="type"><b>Select Job Type</b></label>
						<input type="text" name="category"placeholder="category" value="<?php echo $job['category']; ?>">
						<label for="tele"><b>Telephone Number</b></label>
						<input  name="teleNo" placeholder="telephone number" value="<?php echo $job['teleNo']; ?>">
						<div class="sponsored">
						<input type="checkbox" name="sponsored" value="sponsored"<?php echo ($job['sponsored']==1 ? 'checked' : '');?>>sponsered
						</div>
					</div>
				</div>
				<div class="job-form-input-bottom">
					<div class="desc">
						<textarea name="jobDesc" ><?php echo $job['jobDescription']; ?></textarea>
					</div>
					<div class="requir">
						<textarea name="jobReq"><?php echo $job['jobRequirements']; ?></textarea>
					</div>
				</div>
				<div class="add-button">
					<input type="submit" name="submit" value="add">
				</div>
			</form>
		</div>
	</div>
	<?php } ?>
</div>
</body>	
</html>




</body>	
</html>