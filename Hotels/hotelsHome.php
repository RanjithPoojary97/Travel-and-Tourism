<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['hlogin'])==0)
	{	
		header('location:index.php');
	}
	else{
		if(isset($_POST['hprofileSubmit']))
		{
			$hname=$_POST['hname'];
			$hphone=$_POST['hphone'];
			$hlicno=$_POST['hlicno'];
			$hlocation=$_POST['hlocation'];
    		$hstate=$_POST['hstate'];
			$htype=$_POST['htype'];
    		$haddress=$_POST['haddress'];
			$hdetails=$_POST['hdetails'];

			$hemail=$_SESSION['hlogin'];

			$sql="update hotels set hotel_name=:hname,hotel_phone=:hphone,hotel_licno=:hlicno,hotel_location=:hlocation,hotel_state=:hstate,hotel_type=:htype,hotel_address=:haddress,hotel_details=:hdetails where hotel_email=:hemail";
			$query = $dbh->prepare($sql);
			$query->bindParam(':hemail',$hemail,PDO::PARAM_STR);
    		$query->bindParam(':hname',$hname,PDO::PARAM_STR);
			$query->bindParam(':hphone',$hphone,PDO::PARAM_STR);
			$query->bindParam(':hlicno',$hlicno,PDO::PARAM_STR);
			$query->bindParam(':hlocation',$hlocation,PDO::PARAM_STR);
    		$query->bindParam(':hstate',$hstate,PDO::PARAM_STR);
			$query->bindParam(':htype',$htype,PDO::PARAM_STR);
    		$query->bindParam(':haddress',$haddress,PDO::PARAM_STR);
			$query->bindParam(':hdetails',$hdetails,PDO::PARAM_STR);
			$query->execute();
			$msg="Hotel Updated Successfully";
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
#bg-img {
    height: 125%;
}

body{
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
    
top:10%;
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

                    
                        <?php if($_SESSION['hlogin'])
                        {?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link"><span><b>Hotel : </b></span><?php echo ($_SESSION['hlogin']);?></a>
                                </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/images.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo ($_SESSION['hlogin']);?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-2"></i>Profile</a>
                                <a class="dropdown-item" href="changePassword.php"><i class="fas fa-cog mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="hotelsBooking.php"><i class="fas fa-rocket mr-2"></i>Booking Detail</a>
                                <a class="dropdown-item" href="logoutHotels.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
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

        <div id="bg-img">
            <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center">
            <div class="col-md-10" id="treg">
            <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Hotel details</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" name="h_profileform" method="post" autocomplete="on" enctype="multipart/form-data">
                            	 <?php if($error){?><div class="errorWrap"><span><strong>ERROR</strong>: <em><?php echo htmlentities($error); ?></em></span></div><?php } 
                                else if($msg){?><div class="successWrap"><span><strong>SUCCESS</strong>: <em><?php echo htmlentities($msg); ?></em> </span></div><?php }?>


<?php 
$hotelsemail=$_SESSION['hlogin'];
$sql = "SELECT * from hotels where hotel_email=:hotelsemail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':hotelsemail',$hotelsemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
                                <div class="form-group">
                                    <label>Hotel Email</label>
                                    <input type="text" class="form-control" id="hemail" name="hemail" value="<?php echo htmlentities($result->hotel_email);?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="hname" name="hname" value="<?php echo htmlentities($result->hotel_name);?>" required="" >
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="hphone" name="hphone" value="<?php echo htmlentities($result->hotel_phone);?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Licence No</label>
                                    <input type="text" class="form-control" id="hlicno" name="hlicno" value="<?php echo htmlentities($result->hotel_licno);?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" id="hlocation" name="hlocation" value="<?php echo htmlentities($result->hotel_location);?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" id="hstate" name="hstate" value="<?php echo htmlentities($result->hotel_state);?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Hotel type</label>
                                    <select class="form-control" id="htype" name="htype" value="<?php echo htmlentities($result->hotel_type);?>" required="">    
                                    	<option><?php echo htmlentities($result->hotel_type);?></option>                                  
                                    	<option>1 star</option>
                                    	<option>2 star</option>
                                    	<option>3 star</option>
                                    	<option>4 star</option>
                                        <option>5 star</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="haddress" name="haddress" value="<?php echo htmlentities($result->hotel_address);?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Hotel Details</label>
                                    <textarea rows="3" cols="50" class="form-control" id="hdetails" name="hdetails" required=""><?php echo htmlentities($result->hotel_details); ?></textarea>
                                </div>
                                <div class="form-group">
                             		<label><b>Registration Date : </b><?php echo htmlentities($result->h_regdate);?></label>
                             	</div>
                             	<div class="form-group">
                             		<label><b>Last updation Date : </b><?php echo htmlentities($result->h_updation);?></label>
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
                                    <img class="d-block w-100" src="hotelsimages/<?php echo htmlentities($result->h_image1);?>" alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="hotelsimages/<?php echo htmlentities($result->h_image2);?>" alt="First slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="hotelsimages/<?php echo htmlentities($result->h_image3);?>" alt="First slide">
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
                                    <button type="submit" name="hprofileSubmit" class="btn btn-success float-right" style="width:90px;color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">Update</button>
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