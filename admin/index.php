<?php
session_start();
include('../includes/config.php');
if(isset($_POST['adminSubmit']))
{
	$uname=$_POST['username'];
	$password=$_POST['password'];
	$sql ="SELECT admin_name,admin_password FROM admin WHERE admin_name=:uname and admin_password=:password";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
	$query-> execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
	{
		$_SESSION['alogin']=$_POST['username'];
		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	} else{
	echo "<script>alert('Invalid Details');</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>travel</title>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome/fontawesome-all.css">
    <link rel="stylesheet" href="css/webfonts/">
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
html,
body,
#bg-img {
    height: 97.4%;
}

#bg-img {
    background-image: url("../images/photo-1482059470115-0aadd6bf6834.jpg");
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    
    /*-webkit-filter: blur(1px);  
     filter: blur(1px);*/  
}

    .navbar.navbar-expand-lg{
    background-color: #24355C;
  }
  @media (min-width: 600px){
.navbar.scrolling-navbar{
    padding-top: 5px;
    padding-bottom: 5px;
}
}
  @media (max-width: 768px) {
    .navbar:not(.top-nav-collapse) {
      background-color: #24355C;
    }
  }
  @media (min-width: 800px) and (max-width: 850px) {
    .navbar:not(.top-nav-collapse) {
      background-color: #24355C;
    }
  }

  .user-avatar-md {
    height: 32px;
    width: 32px;
}

.nav-user-info {
    background-color: #5969ff;
    line-height: 1.4;
    padding: 12px;
    color: #fff;
    font-size: 13px;
    border-radius: 2px 2px 0 0;
}

.nav-user-dropdown .dropdown-item {
    display: block;
    width: 100%;
    padding: 12px 22px 15px;
    color: #686972;
    text-align: inherit;
    font-size: 13px;
    line-height: 0.4;
}

.card{
    top: 70px;

}

body{
	font-family: sans-serif;
	font-size: 14px;
}
</style>
<body>
 <!--Main Navigation-->
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">

            <div class="container">

                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">Travels & Tourism</a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto smooth-scroll">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#best-features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#examples">Examples</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                    <!-- Links -->
                </div>
                <!-- Collapsible content -->

            </div>

        </nav>
        <!--/.Navbar-->
         </header>

        <div id="bg-img">
            <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center">
            <div class="col-md-10" id="chng-pass">
            <div class="card card-outline-secondary"style="background-color: #f5f5f0; ">
                        <div class="card-header">
                            <h3 class="mb-0">Admin Login</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" name="admin_login" method="post" autocomplete="on">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="username" name="username" required="" style="background-color: transparent;">                              
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="password" class="form-control" id="password" name="password" required="" style="background-color: transparent;">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="adminSubmit" class="btn btn-success float-right" style="width:90px;color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                </div>

        </div>
       <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="background-color: #343a40; color: rgba(255,255,255,.5);">© 2020 Copyright:<b style="color: #f8f9fa"> Travel and Tourism Management</b>
            
        </div>
        <!-- Copyright -->
    </body>
</html>