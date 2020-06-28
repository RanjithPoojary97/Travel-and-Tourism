<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


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

     <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>




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



 $(document).ready(function () {
            $('#viewPackages').DataTable();
        });
</script>
<style type="text/css"></style>

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
                                            <li class="breadcrumb-item active" aria-current="page">Manage package</li>
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
                    <div class="col-md-12">
                    	<table class="table table-striped table-bordered" id="viewPackages">
                    		<thead>
                     			 <tr>
                           			<th>#</th>
                           			<th>Name</th>
                           			<th>Type</th>
                           			<th>Location</th>
                           			<th>Hotel</th>
                           			<th>Travels</th>
                           			<th>Price</th>
                           			<th>Creation Date</th>
                           			<th>Action</th>
                      			</tr>
                    		</thead>
                    		<tbody>
                    			<?php $sql = "SELECT packages.package_id as packid, packages.package_name as packname,category.cat_name as packcat,packages.package_location as packloc,hotels.hotel_name as packhotel,travels.travels_name as packtravels,packages.package_amount as packamt,packages.p_regdate as packreg from category join packages on packages.package_type=category.cat_id join hotels on packages.package_hotel=hotels.hotel_id join travels on packages.package_travel=travels.travels_id";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
									foreach($results as $result)
									{ ?>
										<tr>
										<td><?php echo htmlentities($cnt);?></td>
										<td><?php echo htmlentities($result->packname);?></td>
										<td><?php echo htmlentities($result->packcat);?></td>
										<td><?php echo htmlentities($result->packloc);?></td>
										<td><?php echo htmlentities($result->packhotel);?></td>
										<td><?php echo htmlentities($result->packtravels);?></td>
										<td>Rs <?php echo htmlentities($result->packamt);?></td>
										<td><?php echo htmlentities($result->packreg);?></td>
										<td><a href="updatePackage.php?pid=<?php echo htmlentities($result->packid);?>"><button type="button" class="btn btn-primary btn-block" >View</button></a></td>
						  				</tr>
						 			<?php $cnt=$cnt+1;} }?>
                    		</tbody>
                    	</table>
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