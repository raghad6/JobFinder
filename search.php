<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Job</title>
    <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0/dist//js/bootstrap.min.js">
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
        </nav>

        <?php 
            require 'mydb.php';
            $db = new MyDb();
            $title = $_POST['title'];
            $category = $_POST['category'];
            $jobs = $db->search($title, $category);
        ?>

        <div class="wrapper">
            <div class="left-wrapper">
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
                                <a href="jobOffer/details.php?id=<?php echo $job['jobID'];?>" class="btn btn-primary">Details</a>
                            </span>
                        </div>
                    </div>

                    <?php  } ?>

                </div>
            </div>
            <div class="right-wrapper">
            </div>
        </div>
    </div>
</body>
</html>