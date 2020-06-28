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
header,
#intro {
    height: 100%;
}

body{
    
    font-size: 14px;
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
                            <a class="nav-link" href="#intro">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Hotels/index.php">Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Travels/index.php">Travels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="package_list.php">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin/index.php">Contact</a>
                        </li>
                        <?php if($_SESSION['login'])
                        {?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#writeissueModal" href="#">Write-us</a>
                        </li>
                        <?php } else {?>
                           <li class="nav-item">
                            <a class="nav-link" href="#">Enqiry</a>
                        </li> 
                        <?php }?>
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
                                 <a class="dropdown-item" href="issue_details.php"><i class="fab fa-fw fa-wpforms mr-2"></i>Issues Detail</a>
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

        <!--Mask-->
        <div id="intro" class="view">

            <div class="mask rgba-black-strong">

                <div class="container-fluid d-flex align-items-center justify-content-center h-100">

                    <div class="row d-flex justify-content-center text-center">

                        <div id="text"class="col-md-10">

                            <!-- Heading -->
                            <h2 class="display-4 font-weight-bold white-text pt-5 mb-2" style="color: white;">Travel<br></h2>
                            <h4>Not until we are lost do we begin to understand ourselves</h4>

                            <!-- Divider -->
                            <hr class="hr-light">

                            <!-- Description -->

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!--/.Mask-->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5">
        <div class="container">

            <!--Section: Best Features-->
            <section id="best-features" class="text-center">

                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold">Best Features</h2>

                <!--Grid row-->
                <div class="row d-flex justify-content-center mb-4">

                    <!--Grid column-->
                    <div class="col-md-8">

                        <!-- Description -->
                        <p class="grey-text">There are many reasons why humans have loved to travel over the centuries. From discovering new lands to interacting with different peoples, travel really does broaden the mind. But just don’t take our word for it. We’ve pulled together of the best travel locations, from some of the greatest thinkers and explorers, which are bound to give you a serious case of wanderlust.</p>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-4 mb-5">
                        <i class="fa fa-camera-retro fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Experience</h4>
                        <p class="grey-text">People travel to faraway places to watch, in fascination, the kind of people they ignore at home.

</p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-1">
                        <i class="fa fa-heart fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Happiness</h4>
                        <p class="grey-text">Not until we are lost do we begin to understand ourselves.

</p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-1">
                        <i class="fa fa-bicycle fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Adventure</h4>
                        <p class="grey-text">Like all great travellers, I have seen more than I remember, and remember more than I have seen.

</p>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Best Features-->

            <hr class="my-5">

            <!--Section: Examples-->
            <section id="examples" class="text-center">

                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold">Stunning Examples</h2>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">

                        <div class="view overlay z-depth-1-half">
                            <img src="images/48.jpg" class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>

                        <h4 class="my-4 font-weight-bold">Heading</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.</p>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="view overlay z-depth-1-half">
                            <img src="images/49.jpg" class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>

                        <h4 class="my-4 font-weight-bold">Heading</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.</p>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="view overlay z-depth-1-half">
                            <img src="images/29.jpg" class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>

                        <h4 class="my-4 font-weight-bold">Heading</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.</p>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">

                        <div class="view overlay z-depth-1-half">
                            <img src="images/10.jpg" class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>

                        <h4 class="my-4 font-weight-bold">Heading</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.</p>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="view overlay z-depth-1-half">
                            <img src="images/11.jpg" class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>

                        <h4 class="my-4 font-weight-bold">Heading</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.</p>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="view overlay z-depth-1-half">
                            <img src="images/13.jpg" class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>

                        <h4 class="my-4 font-weight-bold">Heading</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.</p>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Examples-->

            <hr class="my-5">

            <!--Section: Gallery-->
            <section id="gallery">

                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold text-center">Gallery heading</h2>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 mb-4">

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
                                    <img class="d-block w-100" src="images/img (130).jpg"
                                        alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/img (129).jpg"
                                        alt="Second slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/img (70).jpg"
                                        alt="Third slide">
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
                    <div class="col-md-6">

                        <!--Excerpt-->
                        <a href="" class="teal-text">
                            <h6 class="pb-1"><i class="fa fa-heart"></i><strong> Lifestyle </strong></h6>
                        </a>
                        <h4 class="mb-3"><strong>This is title of the news</strong></h4>
                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id
                            quod maxime
                            placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus et aut
                            officiis
                            debitis aut rerum.</p>

                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id
                            quod maxime
                            placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus et aut
                            officiis
                            debitis aut rerum.</p>
                        <p>by <a><strong>Jessica Clark</strong></a>, 26/08/2016</p>
                        <a class="btn btn-primary btn-md">Read more</a>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Gallery-->

            <hr class="my-5">

                </div>
                </main>
                <!--Grid row-->
            </div>
        </div>
        <!-- Social buttons -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="background-color: #343a40; color: rgba(255,255,255,.5);">© 2020 Copyright:<b style="color: #f8f9fa"> Travel and Tourism Management</b>
            
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <!-- Signup -->
    <?php include ('includes/signup.php');?>
    <!-- Signin -->
    <?php include ('includes/signin.php');?>
    <!-- issue -->
    <?php include ('includes/writeissue.php');?>
</body>
</html>