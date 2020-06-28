<?php
	error_reporting(0);
	include('../includes/config.php');
	if(isset($_POST['hregisterSubmit']))
	{
	$hemail=$_POST['hemail'];
    $hname=$_POST['hname'];
	$hpassword=md5($_POST['hpassword']);
	$hphone=$_POST['hphone'];
	$hlicno=$_POST['hlicno'];
	$hlocation=$_POST['hlocation'];
    $hstate=$_POST['hstate'];
	$htype=$_POST['htype'];
    $haddress=$_POST['haddress'];
	$hdetails=$_POST['hdetails'];

	$himg1=$_FILES["himg1"]["name"];
	$himg2=$_FILES["himg2"]["name"];
	$himg3=$_FILES["himg3"]["name"];

	echo "<script>console.log('$himg1')</script>";
	move_uploaded_file($_FILES["himg1"]["tmp_name"],"hotelsimages/".$_FILES["himg1"]["name"]);
	
	move_uploaded_file($_FILES["himg2"]["tmp_name"],"hotelsimages/".$_FILES["himg2"]["name"]);

	
	move_uploaded_file($_FILES["himg3"]["tmp_name"],"hotelsimages/".$_FILES["himg3"]["name"]);

	$sql="INSERT INTO hotels(hotel_email,hotel_name,hotel_pass,hotel_phone,hotel_licno,hotel_location,hotel_state,hotel_type,hotel_address,hotel_details,h_image1,h_image2,h_image3) VALUES(:hemail,:hname,:hpassword,:hphone,:hlicno,:hlocation,:hstate,:htype,:haddress,:hdetails,:himg1,:himg2,:himg3)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':hemail',$hemail,PDO::PARAM_STR);
    $query->bindParam(':hname',$hname,PDO::PARAM_STR);
	$query->bindParam(':hpassword',$hpassword,PDO::PARAM_STR);
	$query->bindParam(':hphone',$hphone,PDO::PARAM_STR);
	$query->bindParam(':hlicno',$hlicno,PDO::PARAM_STR);
	$query->bindParam(':hlocation',$hlocation,PDO::PARAM_STR);
    $query->bindParam(':hstate',$hstate,PDO::PARAM_STR);
	$query->bindParam(':htype',$htype,PDO::PARAM_STR);
    $query->bindParam(':haddress',$haddress,PDO::PARAM_STR);
	$query->bindParam(':hdetails',$hdetails,PDO::PARAM_STR);
	$query->bindParam(':himg1',$himg1,PDO::PARAM_STR);
	$query->bindParam(':himg2',$himg2,PDO::PARAM_STR);
	$query->bindParam(':himg3',$himg3,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		$_SESSION['msg']="Your Travels successfully registered. Now you can login ";
		echo "<script>alert('Hotel Registered');</script>";
		echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		//header('location:thankyou.php');
	}
	else 
	{
		$_SESSION['msg']="Something went wrong. Please try again.";
		echo "<script>alert('Hotel not registered');</script>";
		// header('location:thankyou.php');
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
    <link rel="stylesheet" href="../css/fontawesome/fontawesome-all.css">
    <link rel="stylesheet" href="../css/webfonts/">
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<script type="text/javascript">

    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

    function ValidateFileUpload1() {
        var fuData = document.getElementById('himg1')
        var FileUploadPath = fuData.value;

            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
  				return true;
            } 
//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
				return false;
            }
        }
    
     function ValidateFileUpload2() {
        var fuData = document.getElementById('himg2')
        var FileUploadPath = fuData.value;

            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
  				return true;
            } 
//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
				return false;
            }
        }

         function ValidateFileUpload3() {
        var fuData = document.getElementById('himg3')
        var FileUploadPath = fuData.value;

            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
  				return true;
            } 
//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
				return false;
            }
        }

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

                    
                        <?php if($_SESSION['login'])
                        {?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link"><?php echo ($_SESSION['login']);?></a>
                                </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/images.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo ($_SESSION['login']);?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-2"></i>Profile</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-rocket mr-2"></i>Ticket Detail</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
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
                            <h3 class="mb-0">Hotel Registration</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" name="h_registerform" method="post" autocomplete="on" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Hotel Email</label>
                                    <input type="text" class="form-control" id="hemail" name="hemail" required="" pattern="^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="hname" name="hname" required="" pattern="\w+ \w+.*">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="hpassword" name="hpassword" required="">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="hphone" name="hphone" required="" maxlength="10" minlength="10" onkeypress="return isNumber(event)">
                                </div>
                                <div class="form-group">
                                    <label>Licence No</label>
                                    <input type="text" class="form-control" id="hlicno" name="hlicno" required="">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" id="hlocation" name="hlocation" required="">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" id="hstate" name="hstate" required="">
                                </div>
                                <div class="form-group">
                                    <label>Hotel type</label>
                                    <select class="form-control" id="htype" name="htype" required="">
                                        <option disabled="">select</option>
                                    	<option>1 star</option>
                                    	<option>2 star</option>
                                    	<option>3 star</option>
                                    	<option>4 star</option>
                                        <option>5 star</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="haddress" name="haddress" required="">
                                </div>
                                <div class="form-group">
                                    <label>Hotel Details</label>
                                    <textarea rows="3" class="form-control" id="hdetails" name="hdetails" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image 1</label>
                                    <input type="file" class="form-control" id="himg1" name="himg1" required="" onchange="return ValidateFileUpload1()">
                                </div>
                                <div class="form-group">
                                    <label>Image 2</label>
                                    <input type="file" class="form-control" id="himg2" name="himg2"  onchange="return ValidateFileUpload2()">
                                </div>
                                 <div class="form-group">
                                    <label>Image 3</label>
                                    <input type="file" class="form-control" id="himg3" name="himg3"  onchange="return ValidateFileUpload3()">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="hregisterSubmit" class="btn btn-success float-right" style="width:90px;color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">Register</button>
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