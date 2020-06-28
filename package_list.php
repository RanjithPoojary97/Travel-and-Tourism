<?php
session_start();
error_reporting(0);
include('includes/config.php');
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
#intro {
    height: 100%;
}
/*font-family: 'Montserrat', sans-serif;*/
body{
    
    font-size: 14px;
    background-color:#f8f9fa;
}

#intro {
    background: url("images/img (3).jpg")no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
 
 /* Full height (cover the whole page) */
  background-color: rgba(0,0,0,0.5); /* Black background with opacity */
  z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
 /* cursor: pointer;*/ /* Add a pointer on hover */
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
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
.nav-user-dropdown {
    padding: 0px;
    min-width: 150px;
    margin: 0px;
}
</style>


<body>
 <!--Main Navigation-->
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">

            <div class="container">

                <!-- Navbar brand -->
                <a class="navbar-brand" href="index.php">Travels & Tourism</a>

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
                            <a class="nav-link" href="#intro">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Hotels/index.php">Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Travels/index.php">Travels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin/index.php">Contact</a>
                        </li>
                    </ul>
                    <!-- Links -->

                    
    					<?php if($_SESSION['login'])
						{?>
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link"><?php echo ($_SESSION['login']);?></a>
								</li>
    					<li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/images.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <?php 
                                    $useremail=$_SESSION['login'];
                                    $sql = "SELECT * from user where email_id=:useremail";
                                    $query = $dbh -> prepare($sql);
                                    $query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    if($query->rowCount() > 0)
                                    {
                                        foreach($results as $result)
                                    {   ?>
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo htmlentities($result->user_name);?></h5>
                                    <?php }} ?>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-2"></i>Profile</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="booking_details.php"><i class="fas fa-rocket mr-2"></i>Ticket Detail</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                        </ul><?php } else {?>
                       <!-- Social Icon  -->
                    <ul class="navbar-nav">
    					<li class="nav-item">
      						<a class="nav-link" data-toggle="modal" data-target="#signinModal" href="#">Signin</a>
    					</li>
   						<li class="nav-item">
      						<a class="nav-link" data-toggle="modal" data-target="#signupModal" href="#">/  Signup</a>
    					</li>
					</ul>
					<?php }?>
                </div>
                <!-- Collapsible content -->

            </div>

        </nav>
        <!--/.Navbar-->
    </header>
    <!--Main Navigation-->
    <!--Main layout-->
    <main class="mt-5">
        <div class="container">

            <!--Section: features-->
            <section id="package-list" class="text-center grey-text">

                <!-- Heading -->
                <h4 class="mb-5 font-weight-bold text-left " style="color: #6c757d;">Packages</h4>


                <?php $sql = "SELECT * from packages";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
					foreach($results as $result)
					{	?>

						 <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-3 mb-5">
                        <!--Carousel Wrapper-->
                        <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade" data-ride="carousel">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                            </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner z-depth-1-half" role="listbox">
                                <!--First slide-->
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="admin/packageimages/<?php echo htmlentities($result->p_image1);?>" alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="admin/packageimages/<?php echo htmlentities($result->p_image2);?>" alt="First slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="admin/packageimages/<?php echo htmlentities($result->p_image3);?>" alt="First slide">
                                </div>
                                <!--/Third slide-->
                            </div>
                            <!--/.Slides-->
                            <!--Controls-->
                            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!--/.Controls-->
                        </div>
                        <!--/.Carousel Wrapper-->
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 mb-1 text-left" >
                        <h5 class="font-weight-bold" style="color: #3d405c;">Package Name: <?php echo htmlentities($result->package_name) ?></h5>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Package Type: </strong><?php echo htmlentities($result->package_type) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Package Location: </strong><?php echo htmlentities($result->package_location) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>No of Days: </strong><?php echo htmlentities($result->package_days) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Package Details: </strong><?php echo htmlentities($result->package_detail) ?></p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-3 mb-1">
                        <h4 class="my-4 font-weight-bold"  style="color: #3d405c;">Rs <?php echo htmlentities($result->package_amount) ?></h4>
                        <a href="package_details.php?pkid=<?php echo htmlentities($result->package_id);?>"><button type="button" class="btn btn-primary col-md-4" style="color:white;background-color:#3971a9;border-radius: 3px;border:transparent;font-family: sans-serif;font-size: 13px;" >Details</button></a>


                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                 <hr class="my-3">

					<?php }} ?>

               


            </section>
        </div>
    </main>



	<footer>
		<!--copyright-->
		<div class="footer-copyright text-center py-3" style="background-color: #343a40; color: rgba(255,255,255,.5); "><small>© 2020 Copyright:<b style="color: #f8f9fa"> Travel and Tourism Management</b>&nbsp&nbsp</small><span class="fa fa-facebook mr-2 text-sm"></span> <span class="fa fa-google-plus mr-2 text-sm"></span> <span class="fa fa-linkedin mr-2 text-sm"></span> <span class="fa fa-twitter mr-2 mr-sm-5 text-sm"></span>  
        </div>
        <!--copyright-->
	</footer>
	<!-- Footer -->
    <!-- Signup -->
    <?php include ('includes/signup.php');?>
    <!-- Signin -->
    <?php include ('includes/signin.php');?>

</body>
</html>