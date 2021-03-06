<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['tlogin'])==0)
	{	
			header('location:index.php');
	}
	else{
		if(isset($_POST['changeTravelspass']))
		{
			$curpassword=md5($_POST['curpassword']);
			$newpassword=md5($_POST['newpassword']);
			$temail=$_SESSION['tlogin'];
			$sql ="SELECT travels_pass FROM travels WHERE travels_email=:temail and travels_pass=:curpassword";
			$query= $dbh -> prepare($sql);
			$query-> bindParam(':temail', $temail, PDO::PARAM_STR);
			$query-> bindParam(':curpassword', $curpassword, PDO::PARAM_STR);
			$query-> execute();
			$results = $query -> fetchAll(PDO::FETCH_OBJ);
			if($query -> rowCount() > 0)
			{
				$con="update travels set travels_pass=:newpassword where travels_email=:temail";
				$chngpwd1 = $dbh->prepare($con);
				$chngpwd1-> bindParam(':temail', $temail, PDO::PARAM_STR);
				$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
				$chngpwd1->execute();
				$msg="Your Password succesfully changed";
			}
			else {
			$error="Your current password is wrong";	
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
    function valid()
    {
        if(document.changeTravel_pwd.newpassword.value!= document.changeTravel_pwd.confirmpassword.value)
        {
            alert("New Password and Confirm Password do not match!!!");
            document.changeTravel_pwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>
<style type="text/css">
	html,
	body,
	#bg_img{
		height: 100%;
	}
body
{
	font-family: sans-serif;
	font-size: 14px;
}

#bg-img {
    background-image: url("images/flight.jpg");
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
    top: 20%;

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
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Bookings</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-rocket mr-2"></i>change password</a>
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

        <div id="bg-img" style="height: inherit;">
            <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center">
            <div class="col-md-10" id="chng-pass">
            <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" name="changeTravel_pwd" method="post" onsubmit="return valid();" autocomplete="on">
                                <?php if($error){?><div class="errorWrap"><span><strong>ERROR</strong>: <em><?php echo htmlentities($error); ?></em></span></div><?php } 
                                else if($msg){?><div class="successWrap"><span><strong>SUCCESS</strong>: <em><?php echo htmlentities($msg); ?></em> </span></div><?php }?>
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="text" class="form-control" id="curpassword" name="curpassword" required="">
                                </div>
                                <div class="form-group">
                                    <label>New password</label>
                                    <input type="text" class="form-control" id="newpassword" name="newpassword" required="">                                    
                                </div>
                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="changeTravelspass" class="btn btn-success float-right" style="width:90px;color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                </div>

        </div>

        <footer style="">
 <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="background-color: #343a40; color: rgba(255,255,255,.5); "><small>© 2020 Copyright:<b style="color: #f8f9fa"> Travel and Tourism Management</b></small><span class="fa fa-facebook mr-2 text-sm"></span> <span class="fa fa-google-plus mr-2 text-sm"></span> <span class="fa fa-linkedin mr-2 text-sm"></span> <span class="fa fa-twitter mr-2 mr-sm-5 text-sm"></span>
            
        </div>
        <!-- Copyright -->
    </footer>

     </body>
     </html>
     <?php } ?>