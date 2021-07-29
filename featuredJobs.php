<!DOCTYPE html>
<html>
<head>
    <title>Trend Job</title>
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist//js/bootstrap.min.js">
    <link rel = "stylesheet" type = "text/css"  href = "style.css" >
</head>
<body>
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
                <a  href="Authentication/login.php">LOG IN</a>
                <a href="Authentication/register.php">SIGN UP</a>
            </div>
        </nav>
        

        <?php
        require 'mydb.php';
        $db = new MyDb();
        $job = $db->getTrend();
        $counter = 0;
         foreach($job as $trend) {
             $counter++;
             if($counter > 1)
             break;
        ?>
        <div class="main-header">
            <div class="card job-offer">
                <div class="card-body content">
                    <span class="card-image">
                        <img src="<?php echo $trend['image'];?>" alt="company logo">
                    </span>
                    <div class="card-content">
                        <span>
                        <h5 class="card-title"><?php echo $trend['jobTitle'];?></h5>
                        <p class="card-text"><?php echo $trend['companyName'];?></p>
                        </span>
                        <span class="button">
                             <a href="<?php echo $trend['application'];?>" class="btn btn-primary">Apply For Job</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="job-desc box">
            <h1><?php echo $trend['companyName']; ?></h1>
            <h6><?php echo $trend['jobTitle']; ?></h6>
            <p> job Description : <br> <?php echo $trend['jobDescription']; ?></p>
        </div>
        <div class="job-req box">
            <p>Job Requirements : <br><?php echo $trend['jobRequirements']; ?></p>
        </div>
        <div class="job-details box">
            <div><h6>Job Details : <br></h6>
                <p>Job Name : <?php echo $trend['jobTitle']; ?></p>
                <p> company name : <?php echo $trend['companyName']; ?></p>
                <p> country : <?php echo $trend['address']; ?></p>
                <p> city : <?php echo $trend['city']; ?></p>
            </div>
            <div class="details-job">
                <br>
                <p> salary : <?php echo $trend['salary']; ?></p>
                <p> category : <?php echo $trend['addCategory']; ?></p>
                <p> The last date for apply : <?php echo $trend['lastDate']; ?></p>
                <p> Job Type : <?php echo $trend['category']; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>