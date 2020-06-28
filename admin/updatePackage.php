<?php
	session_start();
	error_reporting(0);
	include('../includes/config.php');
	if(strlen($_SESSION['alogin'])==0)
	{	
		header('location:index.php');
	}
	else{
		$pid=intval($_GET['pid']);	
if(isset($_POST['packageUpdateSubmit']))
{
$pname=$_POST['pname'];
$ptype=$_POST['ptype'];	
$ploc=$_POST['ploc'];
$photel=$_POST['photel'];
$ptravel=$_POST['ptravel'];
$pdays=$_POST['pdays'];
$pamount=$_POST['pamount'];	
$pdetails=$_POST['pdetails'];	



$sql="update packages set package_name=:pname,package_type=:ptype,package_location=:ploc,package_hotel=:photel,package_travel=:ptravel,package_days=:pdays,package_amount=:pamount,package_detail=:pdetails where package_id=:pid";

$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':pname',$pname,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':ploc',$ploc,PDO::PARAM_STR);
$query->bindParam(':photel',$photel,PDO::PARAM_STR);
$query->bindParam(':ptravel',$ptravel,PDO::PARAM_STR);
$query->bindParam(':pdays',$pdays,PDO::PARAM_STR);
$query->bindParam(':pamount',$pamount,PDO::PARAM_STR);
$query->bindParam(':pdetails',$pdetails,PDO::PARAM_STR);


$query->execute();

$msg="Package updated Successfully";


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
<script type="text/javascript">
	// function getSelectedLocation(packageloc) {
 //         comValues = [];
 //         for (var i = 0; i < packageloc.options.length; i++) {
 //         if (packageloc.options[i].selected == true) {
 //         comValues.push(packageloc.options[i].value);
 //         }
 //         }
 //         return comValues;

 //         }
 //    function getSelectedHotel(){
 //    	var comValues = getSelectedLocation(packageloc);
 //    	console.log(comValues);
 //    }
 

function getSelectedCompany(ploc) {
         comValues = [];
         for (var i = 0; i < ploc.options.length; i++) {
         if (ploc.options[i].selected == true) {
         comValues.push(ploc.options[i].value);
         		}
         	}
        	return comValues;
         }

         function getSelectedValue()
         {
         

         var comValues = getSelectedCompany(ploc);
         console.log(comValues);
        // var hotel_location = comValues;

        var hotel_location = {
         hotel_location : $('#ploc').val(),
         };
         console.log(hotel_location);

         var data=hotel_location;

         var url = "getHotels.php?hotel_location=" + comValues;

         

         console.log(url);
         $.ajax({
         url: url,
         method: 'POST',
         data: data, 
         success: function (data) {
         console.log(data);
         $('select#photel').html(data);   
     }
 });


         var service_to = {
         service_to : $('#ploc').val(),
         };
         console.log(service_to);

         var data2=service_to;

         var url2 =  "getTravels.php?service_to=" + comValues;
         console.log(url2);

         $.ajax({
         url: url2,
         method: 'POST',
         data: data2, 
         success: function (data2) {
         console.log(data2);
         $('select#ptravel').html(data2);   
     }
 });
	}
  




</script> 		
<style type="text/css">
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
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Package manager</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Update package</li>
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
                    <div class="grid-form">
                    	<h3>Update Package</h3>
                    	 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

				<?php 
$pid=intval($_GET['pid']);

$sql = "SELECT * from packages where package_id=:pid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results1=$query->fetchAll(PDO::FETCH_OBJ);
echo "<script>console.log('$pid');</script>";
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results1 as $result1)
{	?>
						<div class="tab-content">
							<form class="form-horizontal" name="updatePackage" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;">Package Name</label>
									<div class="col-sm-7">
									<input type="text" class="form-control" name="pname" id="pname" placeholder="Enter package name" value="<?php echo htmlentities($result1->package_name);?>" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;">Package Type</label>
									<div class="col-sm-7">
									<select class="form-control" id="ptype" name="ptype" required="">
										<option value="">select</option>
										<?php $sql = "SELECT * from category";
										$query = $dbh->prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										if($query->rowCount() > 0)
										{
											foreach($results as $result)
											{	?>
												<option value="<?php echo htmlentities($result->cat_id) ?>"><?php echo htmlentities($result->cat_name) ?></option>

											<?php }} ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;">Package Location</label>
									<div class="col-sm-7">
									<select class="form-control" name="ploc" id="ploc" required onchange="getSelectedValue();" >
										<option value="">select location</option>
										<?php $sql = "SELECT hotel_location as loc from hotels INNER JOIN travels on hotels.hotel_location=travels.service_to";
										$query = $dbh->prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										if($query->rowCount() > 0)
										{
											foreach($results as $result)
											{	?>
												<option value="<?php echo htmlentities($result->loc)?>"><?php echo htmlentities($result->loc)?></option>

											<?php }} 
											
											?>

									</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;">Package hotel</label>
									<div class="col-sm-7">
									<select class="form-control" id="photel" name="photel" required="">
										<!--<option value="">select hotel</option>-->
								
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;">Package Travels</label>
									<div class="col-sm-7">
									<select class="form-control" id="ptravel" name="ptravel" required="">
										<!--<option value="">select travels</option>-->
								
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;">No of days</label>
									<div class="col-sm-2">
									<input type="number" class="form-control" name="pdays" id="pdays" placeholder="Enter number of days" value="<?php echo htmlentities($result1->package_days);?>" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;">Package amount</label>
									<div class="col-sm-2">
									<input type="text" class="form-control" name="pamount" id="pamount" placeholder="Enter amount" value="<?php echo htmlentities($result1->package_amount);?>" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;">Package Details</label>
									<div class="col-sm-7">
									<textarea rows="5" class="form-control" name="pdetails" id="pdetails" required><?php echo htmlentities($result1->package_detail);?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;"><b>Package Registration :</b> <?php echo htmlentities($result1->p_regdate);?></label>
								</div>
								<div class="form-group row">
									<label for="focusedinput" class="control-label col-sm-2" style="padding-top: 6px;"><b>Package Updation :</b> <?php echo htmlentities($result1->p_updation);?></label>
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
                                    <img class="d-block w-100" src="packageimages/<?php echo htmlentities($result1->p_image1);?>" alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="packageimages/<?php echo htmlentities($result1->p_image2);?>" alt="First slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="packageimages/<?php echo htmlentities($result1->p_image3);?>" alt="First slide">
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

								<b><a class="col-sm-2" href="changePackImage.php?imgid=<?php echo htmlentities($result1->package_id);?>">Change Image</a></b>

								<div class="form-group">
                                    <button type="submit" name="packageUpdateSubmit" class="btn btn-success col-sm-2" style="width:90px;color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">Update</button>
                                </div>
							</form>
						</div>
					
                    </div>

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
<?php } ?>