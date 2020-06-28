<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(strlen($_SESSION['login'])==0)
        {	
    header('location:index.php');
    }
    else{
    if(isset($_REQUEST['bkid']))
        {
            $bid=intval($_GET['bkid']);
            $email=$_SESSION['login'];
            $sql ="SELECT from_date FROM bookings WHERE user_email=:email and booking_id=:bid";
            $query= $dbh -> prepare($sql);
            $query-> bindParam(':email', $email, PDO::PARAM_STR);
            $query-> bindParam(':bid', $bid, PDO::PARAM_STR);
            $query-> execute();
            $results = $query -> fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
                foreach($results as $result)
                {
                    $fdate=$result->from_date;

                    $a=explode("/",$fdate);
                    $val=array_reverse($a);
                    $mydate =implode("/",$val);
                    $cdate=date('Y/m/d');
                    $date1=date_create("$cdate");
                    $date2=date_create("$fdate");
                    $diff=date_diff($date1,$date2);
                echo $df=$diff->format("%a");
    if($df>1)
    {
    $status=2;
    $cancelby='u';
    $sql = "UPDATE bookings SET status=:status,cancelled_by=:cancelby WHERE user_email=:email and booking_id=:bid";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':status',$status, PDO::PARAM_STR);
    $query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
    $query-> bindParam(':email',$email, PDO::PARAM_STR);
    $query-> bindParam(':bid',$bid, PDO::PARAM_STR);
    $query -> execute();

    $msg="Booking Cancelled successfully";
    echo "<script type='text/javascript'> document.location = 'booking_details.php'; </script>";
    }
    else
    {
    $error="You can't cancel booking before 24 hours";
    }
    }
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

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

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

 $(document).ready(function () {
            $('#viewBookings').DataTable();
        });

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
                                <a class="dropdown-item" href="#"><i class="fas fa-rocket mr-2"></i>Ticket Detail</a>
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
				<div class="col-md-12">
                    	<table class="table table-striped table-bordered" id="viewBookings">
                    		<thead>
                     			 <tr>
                           			<th>#</th>
                           			<th>Booking Id</th>
                           			<th>Package Name</th>
                           			<th>From</th>
                           			<th>To</th>
                           			<th>No of person</th>
                           			<th>Price</th>
                           			<th>Status</th>
                           			<th>Booking Date</th>
                           			<th>Action</th>	
                      			</tr>
                    		</thead>
                    		<tbody>
                    			<?php 

$useremail=$_SESSION['login'];
$sql = "SELECT bookings.booking_id as bookid,bookings.package_id as pkid,packages.package_name as pkgname,bookings.from_date as frmdt,bookings.to_date as todt,bookings.no_of_person as person,bookings.total_amount as totamt,bookings.status as status,bookings.reg_date as regdate,bookings.cancelled_by as cancelby,bookings.updation_date as up_date from bookings join packages on packages.package_id=bookings.package_id where user_email=:useremail";
$query = $dbh->prepare($sql);
$query -> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
	<tr>
<td><?php echo htmlentities($cnt);?></td>
<td>#TTBK-<?php echo htmlentities($result->bookid);?></td>
<td><a href="package_details.php?pkid=<?php echo htmlentities($result->pkid);?>"><?php echo htmlentities($result->pkgname);?></a></td>
<td><?php echo htmlentities($result->frmdt);?></td>
<td><?php echo htmlentities($result->todt);?></td>
<td><?php echo htmlentities($result->person);?></td>
<td><?php echo htmlentities($result->totamt);?></td>
<td><?php if($result->status==0)
{
echo "Pending";
}
if($result->status==1)
{
echo "Confirmed";
}
if($result->status==2 and  $result->cancelby=='u')
{
echo "Cancelled by you on " .$result->up_date;
} 
if($result->status==2 and $result->cancelby=='a')
{
echo "Cancelled by admin on " .$result->up_date;

}
?></td>
<td><?php echo htmlentities($result->regdate);?></td>
<?php if($result->status==2)
{
	?><td>Cancelled</td>
<?php } else {?>
<td><a href="booking_details.php?bkid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a></td>
<?php }?>
</tr>
<?php $cnt=$cnt+1; }} ?>
                    		</tbody>
                    	</table>
                    </div>


			</section>
		</div>
	</main>
	
</body>
</html>
<?php } ?>