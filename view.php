<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
			header("location:login.php?msg=error no user");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jobs picker</title>
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
    $sponsoreds = $db->getSponsored();
    $jobs = $db->sortChronologically();
    $count=0;
    ?>
     
     <div class="wrapper">
        <div class="left-wrapper">
            <div class="sponsored">
                    <?php foreach($sponsoreds as $sponsored) {
                    $count=$count+1;
                    if($count > 6 )
                    break;
                    ?>

                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $sponsored['image']; ?>" class="card-img-top" alt="job offer">
                    <div class="card-body ">
                        <h6 class="card-title"><?php echo $sponsored['jobTitle'];?></h6>
                        <p class="card-text"><?php echo $sponsored['companyName'];?></p>
                        <div class="footer">
                             <a href="details.php?id=<?php echo $sponsored['jobID'];?>" class="btn btn-primary">Details</a>
                             <p><?php echo $sponsored['offerDate'];?></p>
                        </div>
                    </div>
                </div>

                <?php  } ?>

            </div>
            <div class="jobs">                    
                <?php foreach($jobs as $job){
                ?>
                <div class="card job-offer">
                    <div class="card-body content">
                        <span class="card-image">
                            <img src="<?php echo $job['image'];?>" alt="company logo">
                        </span>
                        <span class="card-content">
                            <h5 class="card-title"><?php echo $job['jobTitle'];?></h5>
                            <p class="card-text"><?php echo $job['companyName'];?></p>
                            <p class="card-text"><?php echo $job['jobRequirements'];?></p>
                        </span>
                        <span class = "button">
                            <a href="details.php?id=<?php echo $job['jobID'];?>" class="btn btn-primary">Details</a>
                        </span>
                    </div>
                </div>

                <?php  } ?>

            </div>
        </div>
        <div class="right-wrapper">
        </div>
    </div>
    <div class="footer">
        <footer></footer>
    </div>
</div>
</body>
</html>