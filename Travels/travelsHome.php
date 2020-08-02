<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['tlogin'])==0)
	{	
		header('location:index.php');
	}
	else{
		if(isset($_POST['t_profileSubmit']))
		{
			$t_name=$_POST['t_name'];
			$t_phone=$_POST['t_phone'];
			$t_licno=$_POST['t_licno'];
			$t_service=$_POST['t_service'];
			$t_seat=$_POST['t_seat'];
			$t_details=$_POST['t_details'];	

			$t_email=$_SESSION['tlogin'];

			$sql="update travels set travels_name=:t_name,travels_phone=:t_phone,travels_licno=:t_licno,service_to=:t_service,seat_type=:t_seat,travels_detail=:t_details where travels_email=:t_email";
			$query = $dbh->prepare($sql);
			$query->bindParam(':t_name',$t_name,PDO::PARAM_STR);
			$query->bindParam(':t_phone',$t_phone,PDO::PARAM_STR);
			$query->bindParam(':t_licno',$t_licno,PDO::PARAM_STR);
			$query->bindParam(':t_service',$t_service,PDO::PARAM_STR);
			$query->bindParam(':t_seat',$t_seat,PDO::PARAM_STR);
			$query->bindParam(':t_details',$t_details,PDO::PARAM_STR);
			$query->bindParam(':t_email',$t_email,PDO::PARAM_STR);
			$query->execute();
			$msg="Travels Updated Successfully";
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
    <link rel="stylesheet" href="../css/fontawesome/fontawesome-all.css">
    <link rel="stylesheet" href="../css/webfonts/">
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script type="text/javascript">
  
</script>
<style type="text/css">
	html,
	body,
	#bg_img{
		height: 120%; 
	}
body
{
	font-family: sans-serif;
	font-size: 14px;
}

#bg-img {
    background-image: url("../images/photo-1479888230021-c24f136d849f.jpg");
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
    top: 75px;

}

.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);

}
 .successWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #4caf50;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

.row{
	top:30px;
}

.travelsImg{
	height: 100px;
	width: 100px;
}
</style>
<body>
 <!--Main Navigation-->
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">

            <div class="container">

                <!-- Navbar brand -->
                <a class="navbar-brand" href="travelsHome.php">Travels & Tourism</a>

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

                    
                        <?php if($_SESSION['tlogin'])
                        {?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link"><span><strong>Travels : </strong></span><?php echo ($_SESSION['tlogin']);?></a>
                                </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/images.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo ($_SESSION['tlogin']);?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Profile Update</a>
                                <a class="dropdown-item" href="travelsBooking.php"><i class="fas fa-cog mr-2"></i>Bookings</a>
                                <a class="dropdown-item" href="changePassword.php"><i class="fas fa-rocket mr-2"></i>change password</a>
                                <a class="dropdown-item" href="logoutTravels.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                        </ul><?php } else {?>
                       <!-- Social Icon  -->
                    
                    <?php }?>
                </div>
                <!-- Collapsible content -->

            </div>

        </nav>
        <!--/.Navbar-->
         </header>
         <div id="bg-img" style="height: 120% !important;">
            <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center">
            <div class="col-md-10" id="chng-pass">
            <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Travels Details</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" name="profile_form" method="post" autocomplete="on">
                                <?php if($error){?><div class="errorWrap"><span><strong>ERROR</strong>: <em><?php echo htmlentities($error); ?></em></span></div><?php } 
                                else if($msg){?><div class="successWrap"><span><strong>SUCCESS</strong>: <em><?php echo htmlentities($msg); ?></em> </span></div><?php }?>


<?php 
$travelsemail=$_SESSION['tlogin'];
$sql = "SELECT * from travels where travels_email=:travelsemail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':travelsemail',$travelsemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

                                <div class="form-group">
                                    <label>Email id</label>
                                    <input type="text" class="form-control" id="t_email" name="t_email" value="<?php echo htmlentities($result->travels_email);?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="t_name" name="t_name" value="<?php echo htmlentities($result->travels_name);?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="t_phone" name="t_phone" value="<?php echo htmlentities($result->travels_phone);?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>licence no</label>
                                    <input type="text" class="form-control" id="t_licno" name="t_licno" value="<?php echo htmlentities($result->travels_licno);?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>servive to</label>
                                    <input type="text" class="form-control" id="t_service" name="t_service" value="<?php echo htmlentities($result->service_to);?>" required="">
                                </div>
                                 <div class="form-group">
                                    <label>Seat type</label>
                                     <select class="form-control" id="t_seat" name="t_seat" value="<?php echo htmlentities($result->seat_type);?>" required="">
                                     	<option><?php echo htmlentities($result->seat_type);?></option>
                                    	<option>seater</option>
                                    	<option>sleeper</option>
                                    	<option>semi-sleeper</option>
                                    	<option>seater-sleeper</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>travels details</label>
                                    <textarea row="3" class="form-control" id="t_details" name="t_details" required=""><?php echo htmlentities($result->travels_detail);?></textarea>
                                </div>
                                <div class="form-group">

                                	
                                </div>
                             	<div class="form-group">
                             		<label><b>Registration Date : </b><?php echo htmlentities($result->t_regdate);?></label>
                             	</div>
                             	<div class="form-group">
                             		<label><b>Last updation Date : </b><?php echo htmlentities($result->t_updation);?></label>
                             	</div>

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
                                    <img class="d-block w-100" src="travelsimages/<?php echo htmlentities($result->t_image1);?>" alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="travelsimages/<?php echo htmlentities($result->t_image2);?>" alt="First slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="travelsimages/<?php echo htmlentities($result->t_image3);?>" alt="First slide">
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

<?php }} ?>

                                <div class="form-group">
                                    <button type="submit" name="t_profileSubmit" class="btn btn-success float-right" style="width:90px;color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                </div>



        </div>
        <footer>
 <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="background-color: #343a40; color: rgba(255,255,255,.5); "><small>© 2020 Copyright:<b style="color: #f8f9fa"> Travel and Tourism Management</b>&nbsp&nbsp</small><span class="fa fa-facebook mr-2 text-sm"></span> <span class="fa fa-google-plus mr-2 text-sm"></span> <span class="fa fa-linkedin mr-2 text-sm"></span> <span class="fa fa-twitter mr-2 mr-sm-5 text-sm"></span>
            
        </div>
        <!-- Copyright -->
    </footer>

     </body>
     </html>
     <?php } ?>