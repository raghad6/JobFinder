<!DOCTYPE html>
<html>
<head>
    <title>Job Details</title>
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
                    <form action="../search.php" method="post" class="form-inline">
                        <input class="form-control mr-sm-2" name="title" type="search" placeholder="Job Title, category" aria-label="Job Title, category">            
                        <input class="form-control mr-sm-2" name= "category" type="search" placeholder="City" aria-label="City">
                        <input class="search" type="submit" name="submit" value="search">
                    </form>
                </span>
            </div>
        </nav>
        

        <?php
        require 'mydb.php';
        $db = new MyDb();
        $jobID = $_GET['jobID'];
        $view = $db->setView($jobID);
        $job = $db->getJobDetails($jobID);
        $ads = $db->getAds();
        while ($row = mysqli_fetch_assoc($job)) {
        ?>
        <div class="main-header">
            <div class="card job-offer">
                <div class="card-body content">
                    <span class="card-image">
                        <img src="<?php echo $row['image'];?>" alt="company logo">
                    </span>
                    <div class="card-content">
                        <span>
                        <h5 class="card-title"><?php echo $row['jobTitle'];?></h5>
                        <p class="card-text"><?php echo $row['companyName'];?></p>
                        </span>
                        <span class="button">
                             <a href="<?php echo $row['application'];?>" class="btn btn-primary">Apply For Job</a>
                        </span>
                    </div>
                </div>
            </div>

            <?php foreach($ads as $ad) {?> 
            <div class= "ads">
                <img src="<?php echo($ad['image']) ?>" alt="">
            </div>
             <?php } ?>

        </div>
        
        <div class="job-desc box">
            <h1><?php echo $row['companyName']; ?></h1>
            <h6><?php echo $row['jobTitle']; ?></h6>
            <p> job Description : <br> <?php echo $row['jobDescription']; ?></p>
        </div>
        <div class="job-req box">
            <p>Job Requirements : <br><?php echo $row['jobRequirements']; ?></p>
        </div>
        <div class="job-details box">
            <div><h6>Job Details : <br></h6>
                <p>Job Name : <?php echo $row['jobTitle']; ?></p>
                <p> company name : <?php echo $row['companyName']; ?></p>
                <p> country : <?php echo $row['address']; ?></p>
                <p> city : <?php echo $row['city']; ?></p>
            </div>
            <div class="details-job">
                <br>
                <p> salary : <?php echo $row['salary']; ?></p>
                <p> category : <?php echo $row['addCategory']; ?></p>
                <p> The last date for apply : <?php echo $row['lastDate']; ?></p>
                <p> Job Type : <?php echo $row['category']; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>