<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['tlogin'])==0)
	{	
header('location:index.php');
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

    <link rel="stylesheet" href="../css/fontawesome/fontawesome-all.css">
    <link rel="stylesheet" href="../css/webfonts/">
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
            $('#travelsBookings').DataTable();
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
    <!--Main Navigation-->
     <!--Main layout-->
    <main class="mt-5">
        <div class="container">

            <!--Section: features-->
            <section id="package-list" class="text-center grey-text">

                <!-- Heading -->
                <h4 class="mb-5 font-weight-bold text-left " style="color: #6c757d;padding-top: 15px;">Booking Detail</h4>
                 <?php if($error){?><div class="errorWrap text-left"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap text-left"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="col-md-12">
                    	<table class="table table-striped table-bordered" id="travelsBookings">
                    		<thead>
                     			 <tr>
                           			<th>#</th>
                           			<th>Booking Id</th>
                           			<th>Package Name</th>
                           			<th>From</th>
                           			<th>To</th>
                           			<th>No of person</th>
                           			<th>Reg Date</th>
                           			<th>status</th>
                      			</tr>
                    		</thead>
                    		<tbody>
                    			<?php
                    			$travelsemail=$_SESSION['tlogin']; 
                    			$sql = "SELECT bookings.booking_id as bookid,packages.package_name as packname,bookings.from_date as frmdt,bookings.to_date as todt,bookings.no_of_person as people,bookings.status as status,bookings.reg_date as regdate,bookings.cancelled_by as cancelby,bookings.updation_date as up_date from bookings join packages on packages.package_id=bookings.package_id join travels on travels.travels_id=packages.package_travel where travels_email=:travelsemail";
								$query = $dbh -> prepare($sql);
								$query -> bindParam(':travelsemail', $travelsemail, PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
									foreach($results as $result)
									{ ?>
										<tr>
										<td><?php echo htmlentities($cnt);?></td>
										<td>#TTBK-<?php echo htmlentities($result->bookid);?></td>
										<td><?php echo htmlentities($result->packname);?></td>
										<td><?php echo htmlentities($result->frmdt);?></td>
										<td><?php echo htmlentities($result->todt);?></td>
										<td><?php echo htmlentities($result->people);?></td>
										<td><?php echo htmlentities($result->regdate);?></td>
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
echo "Cancelled by User on " .$result->up_date;
} 
if($result->status==2 and $result->cancelby=='a')
{
echo "Cancelled by Admin on " .$result->up_date;

}
?></td>
						  				</tr>
						 			<?php $cnt=$cnt+1;} }?>
                    		</tbody>
                    	</table>
                    </div>


                </section>
            </div>
        </main>
       
</body>
</html>