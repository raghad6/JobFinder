<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style=" background: rgba(125, 138, 232); hight:100%;">

 
<div class="card shadow p-3 mb-5 bg-white rounded" style="width: 25rem; left:34%; Top:20%; ">
  <div class="card-body">

<div class="container">
        <h2 style="margin-left:80px;">Login Form</h2>
        <div class="row">
            <div class="col-md-6" style="left:3%;">
                
                <form action="check.php" method="post">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input style="width:300px;" required type="text" name="username" class="form-control"  aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                      
                    <div class="form-group">
                        <label>Passowrd</label>
                        <input style="width:300px;" required type="password" name="password" class="form-control"  aria-describedby="emailHelp" placeholder="Enter password">
                    </div>
                     
                   
                    <button type="submit" style="margin-left:110px;" class="btn btn-primary">Login</button>
                    </br>
                    <br>
                    <button type="submit"  href="index.php" style="margin-left:40px; width:200px;" class="btn btn-primary">Back To Home</button>
                </form>
            </div>
            <div class="col-md-6">

            </div>
            
        </div>
        <div class="row">
                <div class="col-md-6">
                    <?php
                        if (isset($_GET['error'])){
                            ?>
                            <div class="alert alert-danger" role="alert">
                            Invalid Username or Password!
                            </div>
                          <?php
                        }
                    ?>
                </div>
        </div>
    </div> 
    </div>
</div>

</body>
</html>