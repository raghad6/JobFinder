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
	<title>Post Job</title>
	<link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist//js/bootstrap.min.js">
    <link rel = "stylesheet" type = "text/css"  href = "style.css" >

</head>
<body>
<body>
    <?php 
        $id = $_GET['id'];
    ?>
<div class="root">
	<nav class="navbar main-nav navbar-light bg-light">
		<div class="navbar-brand  left-side">
        <img class="image "style="width:50px;" src="img/logo.png" alt="logo">
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
	<div class="job-form-content">
		<div class="job-form-header">
			<h1>Add Job Offer</h1>
		</div>
		<div class="job-form-input">
			<form action="add-opr.php?id=<?php echo $id; ?>" method="post">
				<div class="job-form-input-top">
					<div class="left-content">
						<label for="jobTitle"><b>Job Title</b></label>
						<input type="text" name="jobTitle" placeholder="job title" required>
						<label for="company"><b>Company Name</b></label>
						<input type="text" name="companyName" placeholder="company name" required>
						<label for="address"><b>Address</b></label>
						<input type="text" name="address" placeholder="address" required>
						<label for="street"><b>Street</b></label>
						<input type="text" name="street" placeholder="street" required>
						<label for="city"><b>City</b></label>
						<input type="text" name="city" placeholder="city" required>
						<label for="salary"><b>Salary</b></label>
						<input type="text" name="salary" placeholder="salary" required>
					</div>
					<div class="right-content">
						<label for="email"><b>Email</b></label>
						<input type="text" name="email" placeholder="email" required>
						<label for="application"><b>Application Link </b></label>
						<input type="text" name="application" placeholder="add application link" required>
						<label for="date"><b>Last Date For Applying like</b></label>
						<input type="text" name="date" placeholder="last date for applying ex: 2019-3-6" required>
						<label for="image"><b>Image URL</b></label>
						<input type="text" name="image" placeholder="add image URL">
						<label for="type"><b>Select Job Type</b></label>
						<select name="selectCategory">
							<option value="PartTime">part time</option>
							<option value="fullTime">full time</option>
						</select>
						<label for="tele"><b>Telephone Number</b></label>
						<input  name="teleNo" placeholder="telephone number" required>
						<div class="sponsored">
							<input type="checkbox" name="sponsored" value="sponsored">
							<p>is Sponsored</p>
						</div>
					</div>
				</div>
				<div class="job-form-input-bottom">
					<div class="desc">
						<textarea name="jobDesc" cols="30" rows="10">job Description</textarea>
					</div>
					<div class="requir">
						<textarea name="jobReq" id="" cols="30" rows="10">job requirements</textarea>
					</div>
				</div>
				<div class="add-button">
					<input  type="submit" name="submit" value="add">
					<!-- <input onclick="loadXMLDoc()" type="submit" name="submit" value="add"> -->
				</div>
			</form>
		</div>
	</div>
</div>
<script src="../javascript/ajax.js"></script>
</body>	
</html>