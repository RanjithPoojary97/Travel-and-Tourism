<?php
	error_reporting(0);
	include('../includes/config.php');
	if(isset($_POST['tregisterSubmit']))
	{
	$temail=$_POST['temail'];
	$tname=$_POST['tname'];
	$tpassword=md5($_POST['tpassword']);
	$tphone=$_POST['tphone'];
	$tlicno=$_POST['tlicno'];
	$tservice=$_POST['tservice'];
	$tseatType=$_POST['tseatType'];
	$tdetails=$_POST['tdetails'];

	$timg1=$_FILES["timg1"]["name"];
	$timg2=$_FILES["timg2"]["name"];
	$timg3=$_FILES["timg3"]["name"];

	echo "<script>console.log('$timg1')</script>";
	move_uploaded_file($_FILES["timg1"]["tmp_name"],"travelsimages/".$_FILES["timg1"]["name"]);
	
	move_uploaded_file($_FILES["timg2"]["tmp_name"],"travelsimages/".$_FILES["timg2"]["name"]);

	
	move_uploaded_file($_FILES["timg3"]["tmp_name"],"travelsimages/".$_FILES["timg3"]["name"]);

	$sql="INSERT INTO travels(travels_email,travels_name,travels_pass,travels_phone,travels_licno,service_to,seat_type,travels_detail,t_image1,t_image2,t_image3) VALUES(:temail,:tname,:tpassword,:tphone,:tlicno,:tservice,:tseatType,:tdetails,:timg1,:timg2,:timg3)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':temail',$temail,PDO::PARAM_STR);
	$query->bindParam(':tname',$tname,PDO::PARAM_STR);
	$query->bindParam(':tpassword',$tpassword,PDO::PARAM_STR);
	$query->bindParam(':tphone',$tphone,PDO::PARAM_STR);
	$query->bindParam(':tlicno',$tlicno,PDO::PARAM_STR);
	$query->bindParam(':tservice',$tservice,PDO::PARAM_STR);
	$query->bindParam(':tseatType',$tseatType,PDO::PARAM_STR);
	$query->bindParam(':tdetails',$tdetails,PDO::PARAM_STR);
	$query->bindParam(':timg1',$timg1,PDO::PARAM_STR);
	$query->bindParam(':timg2',$timg2,PDO::PARAM_STR);
	$query->bindParam(':timg3',$timg3,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		$_SESSION['msg']="Your Travels successfully registered. Now you can login ";
		echo "<script>alert('Travels created');</script>";
		echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		//header('location:thankyou.php');
	}
	else 
	{
		$_SESSION['msg']="Something went wrong. Please try again.";
		echo "<script>alert('Travels not registered');</script>";
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
    <link rel="stylesheet" href="css/fontawesome/fontawesome-all.css">
    <link rel="stylesheet" href="css/webfonts/">
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
        var fuData = document.getElementById('timg1')
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
        var fuData = document.getElementById('timg2')
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
        var fuData = document.getElementById('timg3')
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
                            <h3 class="mb-0">Travels Registration</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" name="t_registerform" method="post" autocomplete="on" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Travels Email</label>
                                    <input type="text" class="form-control" id="temail" name="temail" required="" pattern="^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="tname" name="tname" required="" pattern="\w+ \w+.*">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="tpassword" name="tpassword" required="">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="tphone" name="tphone" required="" minlength="10" maxlength="10" onkeypress="return isNumber(event)">
                                </div>
                                <div class="form-group">
                                    <label>Licence No</label>
                                    <input type="text" class="form-control" id="tlicno" name="tlicno" required="">
                                </div>
                                <div class="form-group">
                                    <label>Service To</label>
                                    <input type="text" class="form-control" id="tservice" name="tservice" required="">
                                </div>
                                <div class="form-group">
                                    <label>Seat type</label>
                                    <select class="form-control" id="tseatType" name="tseatType" required="">
                                    	<option disabled="">select</option>
                                    	<option>seater</option>
                                    	<option>sleeper</option>
                                    	<option>semi-sleeper</option>
                                    	<option>seater-sleeper</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Travels Details</label>
                                    <textarea rows="3" class="form-control" id="tdetails" name="tdetails" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image 1</label>
                                    <input type="file" class="form-control" id="timg1" name="timg1" required="" onchange="return ValidateFileUpload1()">
                                </div>
                                <div class="form-group">
                                    <label>Image 2</label>
                                    <input type="file" class="form-control" id="timg2" name="timg2"  onchange="return ValidateFileUpload2()">
                                </div>
                                 <div class="form-group">
                                    <label>Image 3</label>
                                    <input type="file" class="form-control" id="timg3" name="timg3"  onchange="return ValidateFileUpload3()">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="tregisterSubmit" class="btn btn-success float-right" style="width:90px;color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">Register</button>
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
        <div class="footer-copyright text-center py-3" style="background-color: #343a40; color: rgba(255,255,255,.5); "><small>© 2020 Copyright:<b style="color: #f8f9fa"> Travel and Tourism Management</b></small><span class="fa fa-facebook mr-2 text-sm"></span> <span class="fa fa-google-plus mr-2 text-sm"></span> <span class="fa fa-linkedin mr-2 text-sm"></span> <span class="fa fa-twitter mr-2 mr-sm-5 text-sm"></span>
            
        </div>
        <!-- Copyright -->
    </footer>
    </body>
</html>

