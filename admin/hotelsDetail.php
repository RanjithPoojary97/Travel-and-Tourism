<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script> 
	<!-- <script src="http://code.jquery.com/jquery-1.11.2.min.js" type="text/javascript"></script> -->
	 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>;
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	 <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/fontawesome/fontawesome-all.css">
    <link rel="stylesheet" href="../css/webfonts/">
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    



     <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link href="../vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../libs/css/style.css">
    <link rel="stylesheet" href="../vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../vendor/fonts/flag-icon-css/flag-icon.min.css">

</head>
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

    	<?php include('includes/sidebarnav.php');?>

    	 <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Customer</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Travels Detail</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- content  -->
                    <!-- ============================================================== -->
                    <?php 
                    $hid=intval($_GET['hid']);
                    $sql = "SELECT * FROM hotels WHERE hotel_id=:hid";
					$query = $dbh -> prepare($sql);
					$query -> bindParam(':hid', $hid, PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0)
					{
						foreach($results as $result)
						{	?>
							<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Name :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->hotel_name); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Mobile No :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->hotel_phone); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Email id :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->hotel_email); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Licence no :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->hotel_licno); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Location :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->hotel_location); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>State :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->hotel_state); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Type :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->hotel_type); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Address :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->hotel_address); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Hotel Detail :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->hotel_details); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Registration Date :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->h_regdate); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style=""><b>Updation Date :</b></label>
									<div class="col-sm-7">
									<span><?php echo htmlentities($result->h_updation); ?></span>
									</div>
								</div>
								<div class="col-md-4 mb-4">

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
                                    <img class="d-block w-100" src="../Hotels/hotelsimages/<?php echo htmlentities($result->h_image1);?>" alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="../Hotels/hotelsimages/<?php echo htmlentities($result->h_image2);?>" alt="First slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="../Hotels/hotelsimages/<?php echo htmlentities($result->h_image3);?>" alt="First slide">
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


                    <!-- ============================================================== -->
                    <!-- end content  -->
                    <!-- ============================================================== -->
                     </div>
            </div>
        </div>
		<!-- end wrapper  -->
        <!-- ============================================================== -->

    </div>
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
</body>
</html>