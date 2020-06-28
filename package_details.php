<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['packageBookingSubmit']))
{
	$pid=intval($_GET['pkid']);
	$useremail=$_SESSION['login'];
	$fromdate=$_POST['fromdate'];
	$todate=$_POST['todate'];
	$persons=$_POST['persons'];
	$totalprice=$_POST['totalprice'];
	$status=0;
	$sql="INSERT INTO bookings(package_id,user_email,from_date,to_date,no_of_person,total_amount,status) VALUES(:pid,:useremail,:fromdate,:todate,:persons,:totalprice,:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid',$pid,PDO::PARAM_STR);
	$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
	$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
	$query->bindParam(':todate',$todate,PDO::PARAM_STR);
	$query->bindParam(':persons',$persons,PDO::PARAM_STR);
	$query->bindParam(':totalprice',$totalprice,PDO::PARAM_STR);
	$query->bindParam(':status',$status,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
        $email=$_SESSION['login'];
        
//-----------------------------MAIL----------------------------------------------------
        require 'PHPMailer-master/PHPMailerAutoload.php';
       
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->Username = 'ranjith.pujari.1@gmail.com';       // SMTP username
    $mail->Password = 'HarishRoopa';                      // SMTP password

    $mail->Subject = 'Travel & Tourism booking details'; 

    $mail->From = 'from@example.com';
    $mail->FromName = 'Travel and Tourism (MIT)';
    $mail->addAddress($email);


    //$mail->addAddress('@gmail.com');                      // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->WordWrap = 50;                                   // Set word wrap to 50 characters
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                    // Set email format to HTML


      
    $mail->Body    = '<html>Hi '.$email.',<br><br>Booking successfully placed.<br><br>

 
    <table style="border: 1px solid black; border-collapse: collapse;">
    
    <tr style="text-align: center;">
    <th style="border: 1px solid black; border-collapse: collapse;">Package ID</th>
    <th style="border: 1px solid black; border-collapse: collapse;">From Date</th>
    <th style="border: 1px solid black; border-collapse: collapse;">To Date</th>
    <th style="border: 1px solid black; border-collapse: collapse;">Persons</th>
    <th style="border: 1px solid black; border-collapse: collapse;">Amount</th>
    <th style="border: 1px solid black; border-collapse: collapse;">Payment</th>
    </tr>
    
    
    <tr style="text-align: center;">
    <td style="border: 1px solid black; border-collapse: collapse;">'.$pid.'</td>
    <td style="border: 1px solid black; border-collapse: collapse;">'.$fromdate.'</td>
    <td style="border: 1px solid black; border-collapse: collapse;">'.$todate.'</td>
    <td style="border: 1px solid black; border-collapse: collapse;">'.$persons.'</td>
    <td style="border: 1px solid black; border-collapse: collapse;">'.$totalprice.'</td>
    <td style="border: 1px solid black; border-collapse: collapse;"><b>Paid</b></td>
    <tr>
    
    </table>
    <br>

    Your booking will be initiated soon..!!!<br>Thank you for booking with Travel and Tourism(MIT)!<br><br>Thanks & Regards,<br>Travel and Tourism (MIT)<br>Manipal</html> ';


    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
     //   echo 'Message has been sent';
          echo "<script>
                        alert('Message has been sent');
                     </script>";
      
       
    }
    $mail->smtpClose();
//-----------------------------END MAIL----------------------------------------------------
		$msg="Booked Successfully";
	}
	else 
	{
		$error="Something went wrong. Please try again";
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


.errorWrap {
    padding: 10px !important;
    margin: 0 0 20px 0 !important;
    background: transparent !important;
    border-left: 4px solid #dd3d36 !important;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1) !important;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1) !important;

}
 .succWrap {
    padding: 10px !important;
    margin: 0 0 20px 0 !important;
    background: transparent !important;
    border-left: 4px solid #4caf50 !important;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1) !important;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1) !important;
}



</style>
<script type="text/javascript">

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}



	function calculate_price(){
		var num = document.getElementsByName("persons")[0].value;
		console.log(num);
		var packprice = document.getElementsByName("packprice")[0].value;
		console.log(packprice);
		document.getElementsByName("totalprice")[0].value = (num*packprice);
        document.getElementsByName("totalpricepay")[0].value = (num*packprice);  

		
	}

	function addDays(){
		var datepicker = $("#fromdate").val();
		console.log(datepicker);

        var joindate = new Date(datepicker);

        //var addedDate = new Date(datepicker1);
    
        console.log(joindate);

        //console.log(addedDate);
        var numberOfDaysToAdd = $('#packagedays').val();
        
        console.log(numberOfDaysToAdd);
    joindate.setDate(joindate.getDate() + parseInt(numberOfDaysToAdd));
    console.log(joindate);
        var dd = joindate.getDate();
        var MM = joindate.getMonth()+1;
        var yyyy = joindate.getFullYear();
        var joinFormattedDate = yyyy + '-' + MM + '-' + dd;

    // var addedDate = new Date(datepicker1);
        $("#todate").val(joinFormattedDate);
	}
</script>


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
                <h4 class="mb-5 font-weight-bold text-left " style="color: #6c757d;padding-top: 15px;">Packages Detail</h4>
                 <?php if($error){?><div class="errorWrap text-left"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap text-left"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<form name="packDetails" method="post">
				<?php 
				$pid=intval($_GET['pkid']);
				$sql = "SELECT * from packages join category on category.cat_id=packages.package_type where package_id=:pid";
				$query = $dbh->prepare($sql);
				$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
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
                    <div class="col-md-4 mb-5">
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
                                    <img class="d-block w-100" src="admin/packageimages/<?php echo htmlentities($result->p_image2);?>" alt="Second slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="admin/packageimages/<?php echo htmlentities($result->p_image3);?>" alt="Third slide">
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
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Package Type: </strong><?php echo htmlentities($result->cat_name) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Package Location: </strong><?php echo htmlentities($result->package_location) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>No of Days: </strong><?php echo htmlentities($result->package_days) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Package Details: </strong><?php echo htmlentities($result->package_detail) ?></p>
                    </div>
                    <!--Grid column-->

                </div>


                    <?php }} ?>

                    <?php 
				$pid=intval($_GET['pkid']);
				$sql = "SELECT * from packages join travels on travels.travels_id=packages.package_travel where package_id=:pid";
				$query = $dbh->prepare($sql);
				$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
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
                    <div class="col-md-4 mb-5">
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
                                    <img class="d-block w-100" src="Travels/travelsimages/<?php echo htmlentities($result->t_image1);?>" alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="Travels/travelsimages/<?php echo htmlentities($result->t_image2);?>" alt="First slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="Travels/travelsimages/<?php echo htmlentities($result->t_image3);?>" alt="First slide">
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
                        <h5 class="font-weight-bold" style="color: #3d405c;">Travels Name: <?php echo htmlentities($result->travels_name) ?></h5>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Travels Phone: </strong><?php echo htmlentities($result->travels_phone) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Travels Licence No: </strong><?php echo htmlentities($result->travels_licno) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Seat type: </strong><?php echo htmlentities($result->seat_type) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Travels Details: </strong><?php echo htmlentities($result->travels_detail) ?></p>
                    </div>
                    <!--Grid column-->

                </div>


                    <?php }} ?>

                    <?php 
				$pid=intval($_GET['pkid']);
				$sql = "SELECT * from packages join hotels on hotels.hotel_id=packages.package_hotel where package_id=:pid";
				$query = $dbh->prepare($sql);
				$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
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
                    <div class="col-md-4 mb-5">
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
                                    <img class="d-block w-100" src="Hotels/hotelsimages/<?php echo htmlentities($result->h_image1);?>" alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="Hotels/hotelsimages/<?php echo htmlentities($result->h_image2);?>" alt="First slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="Hotels/hotelsimages/<?php echo htmlentities($result->h_image3);?>" alt="First slide">
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
                        <h5 class="font-weight-bold" style="color: #3d405c;">Hotel Name: <?php echo htmlentities($result->hotel_name) ?></h5>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Hotel Phone: </strong><?php echo htmlentities($result->hotel_phone) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Hotel Licence No: </strong><?php echo htmlentities($result->hotel_licno) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Type: </strong><?php echo htmlentities($result->hotel_type) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Address: </strong><?php echo htmlentities($result->hotel_address) ?></p>
                        <p style="margin-bottom: 0rem;color: #71728e;"><strong>Hotel Details: </strong><?php echo htmlentities($result->hotel_details) ?></p>
                    </div>
                    <!--Grid column-->

                </div>


                    <?php }} ?>

                    <?php 
				$pid=intval($_GET['pkid']);
				$sql = "SELECT * from packages where package_id=:pid";
				$query = $dbh->prepare($sql);
				$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
					{	?>
						<div class="row">
							<div class="col-md-4 mb-5 text-left">
								<div class="form-group">
                    	<h5><label for="focusedinput" class="control-label" style="padding-top: 6px;color: #3d405c;"><b>From Date</b></label></h5>
                        <input type="date" class="form-control" name="fromdate" id="fromdate" value="" onchange="addDays();" required="">
                    </div>
							</div>

						<div class="col-md-4 mb-5 text-left">
							<div class="form-group">
                    	<h5><label for="focusedinput" class="control-label" style="padding-top: 6px;color: #3d405c;"><b>To Date</b></label></h5>
                        <input type="text" class="form-control" name="todate" id="todate" value="" placeholder="yyyy-mm-dd" readonly>
                    </div>
						</div>

						<div class="col-md-2 mb-5 text-left">
							<div class="form-group">
                    	<h5><label for="focusedinput" class="control-label" style="padding-top: 6px;color: #3d405c;"><b>Package Days</b></label></h5>
                        <input type="text" class="form-control" name="packagedays" id="packagedays" value="<?php echo htmlentities($result->package_days) ?>" readonly>
                    </div>
						</div>
						</div>
						 <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-4 mb-5 text-left">
                        <div class="form-group">
									<h5><label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;color: #3d405c;"><b>persons</b></label></h5>
									<div class="col-sm-6">
									<select class="form-control" id="persons" name="persons" required="" onchange="calculate_price();" required="">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										</select>
									</div>
								</div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-md-3 mb-5 text-left" >
                    	<div class="form-group">
                    	<h5><label for="focusedinput" class="control-label" style="padding-top: 6px;color: #3d405c;"><b>Rs</b></label></h5>
                        <input type="text" class="form-control" name="packprice" id="packprice" value="<?php echo htmlentities($result->package_amount) ?>" readonly>
                    </div>
                    </div>

                    	<div class="col-md-3 mb-5 text-left">
                        <div class="form-group">
									<h5><label for="focusedinput" class="control-label" style="padding-top: 6px;color: #3d405c;"><b>Total Price</b></label></h5>
								
									<b><input type="text" class="form-control" name="totalprice" id="totalprice" value=""  style="color: #3d405c;" readonly=""></b>
								
								</div>
							</div>

                   
                    <!--Grid column-->

                </div>


                    <?php }} ?>

            

                    <div class="row">
                    	<?php if($_SESSION['login'])
						{?>
                            <div class="card card-outline-secondary text-left">
                            <div class="card-body">
                            <h3 class="text-center">Credit Card Payment</h3>
                            <hr>
                            <div class="text-right">
                                <img src="images/paypal.jpg" alt="" style="width: 150px;">
                            </div>
                            <div class="alert alert-info p-2 pb-3">
                                <a class="close font-weight-normal initialism" data-dismiss="alert" href="#"><samp>&times;</samp></a> 
                                CVC code is required.
                            </div>
                            
                                <div class="form-group">
                                    <label for="cc_name">Card Holder's Name</label>
                                    <input type="text" class="form-control" id="cc_name" pattern="\w+ \w+.*" title="First and last name"  required="" ><i class="fa fa-credit-card"></i>
                                   
                                </div>
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <input type="text" class="form-control" autocomplete="off" maxlength="16" pattern="\d{16}" title="Credit card number" onkeypress="return isNumber(event)" required="">
                                    <i class="fa fa-credit-card"></i>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12">Card Exp. Date</label>
                                    <div class="col-md-4">
                                        <input type="month" class="form-control" name="cardExpiry" max="
     <?php
         echo date('Y-m-d');
     ?>" placeholder="MM / YY" autocomplete="cc-exp" id="month" required >
                                        <!-- <select class="form-control" name="cc_exp_mo" size="0">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="cc_exp_yr" size="0">
                                            <option>2021</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                            <option>2027</option>
                                            
                                        </select> -->
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" autocomplete="off" maxlength="3" minlength="3" pattern="\d{3}" title="Three digits at back of your card" onkeypress="return isNumber(event)" required="" placeholder="CVC">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-12">Amount</label>
                                </div>
                                <div class="form-inline">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Rs</span></div>
                                        <input type="text" class="form-control text-right" id="totalpricepay" name="totalpricepay" value="" readonly="">
                                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                    </div>
                                </div>
                    	
                           </div>
                       </div>
                       <div class="col-lg-11 mb-5 text-right">
                                    <button type="submit" name="packageBookingSubmit" id="packageBookingSubmit" class="btn btn-success col-sm-2" style="color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">Book Now</button>
                               </div>
                               <?php } else {?>
                               	<div class="col-lg-11 mb-5 text-right">
                                    <a href="#" data-toggle="modal" data-target="#signinModal" class="btn btn-success col-sm-2" style="color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">Book Now</a>
                               </div>
                           <?php } ?>

                    </div>


                </form>

            </section>
        </div>
    </main>
    <footer>
		<!--copyright-->
		<div class="footer-copyright text-center py-3" style="background-color: #343a40; color: rgba(255,255,255,.5);"><small>© 2020 Copyright:<b style="color: #f8f9fa"> Travel and Tourism Management</b>&nbsp&nbsp</small><span class="fa fa-facebook mr-2 text-sm"></span> <span class="fa fa-google-plus mr-2 text-sm"></span> <span class="fa fa-linkedin mr-2 text-sm"></span> <span class="fa fa-twitter mr-2 mr-sm-5 text-sm"></span>  
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