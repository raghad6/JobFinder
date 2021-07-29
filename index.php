<!DOCTYPE html>
<html lang="en">
<head>
<title>jobs picker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist//js/bootstrap.min.js">
    <link rel = "stylesheet" type = "text/css"  href = "style.css" >
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v10.0" nonce="Q69bXmer"></script>
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
             <a  href="trendJobs.php">Trend Jobs</a>
            <a  href="Authentication/login.php">LOG IN</a>
            <a href="Authentication/register.php">SIGN UP</a>
        </div>
    </nav>

    <?php    
    require 'mydb.php';
    $db = new MyDb();
    $jobs = $db->sortChronologically();
    $ads = $db->getAds();
    $count=0;
    $coun = 0;
    ?>

     <div class="wrapper">
        <div class="left-wrapper">
            <div class="sponsored" id="spon"> </div>
            <div class="jobs">                    
                <?php foreach($jobs as $job){
                ?>
                <div class="card job-offer">
                    <div class="card-body content">
                        <span class="card-image">
                            <img src="<?php echo $job['image'];?>" alt="company logo">
                            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                        </span>
                        <span class="card-content">
                            <h5 class="card-title"><?php echo $job['jobTitle'];?></h5>
                            <p class="card-text"><?php echo $job['companyName'];?></p>
                            <p class="card-text"><?php echo $job['jobRequirements'];?></p>
                        </span>
                        <span class = "button">
                            <a href="jobOffer/details.php?id=<?php echo $job['jobID'];?>" class="btn btn-primary">Details</a>
                        </span>
                    </div>
                </div>

                <?php  } ?>

            </div>
        </div>
        <!-- <div class="right-wrapper">
        </div> -->
    </div>
</div>
<script src="javascript/ajax.js">
    // setInterval(loadXMLDoc(), 1000);
</script>
</body>
</html>