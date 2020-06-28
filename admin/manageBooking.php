<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_REQUEST['bkid'])||isset($_REQUEST['uemail'])||isset($_REQUEST['uname']))
	{
$bid=intval($_GET['bkid']);
$uemail=strval($_GET['uemail']);
$uname=strval($_GET['uname']);

$status=2;
$cancelby='a';
$sql = "UPDATE bookings SET status=:status,cancelled_by=:cancelby WHERE booking_id=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();
            

//-----------------------------MAIL----------------------------------------------------
        require '../PHPMailer-master/PHPMailerAutoload.php';
       
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
    $mail->addAddress($uemail);


    //$mail->addAddress('@gmail.com');                      // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->WordWrap = 50;                                   // Set word wrap to 50 characters
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                    // Set email format to HTML


      
    $mail->Body    = '<html>Hi '.$uname.',<br><br>Your Booking has been <b>Cancelled</b>.<br>

    <br>

    Sorry for the inconvenience!!!<br>Thank you for booking with Travel and Tourism(MIT)!<br><br>Thanks & Regards,<br>Travel and Tourism (MIT)<br>Manipal</html> ';


    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo "<script>
                        alert('$mail->ErrorInfo;');
                     </script>";
    } else {
     //   echo 'Message has been sent';
          echo "<script>
                        alert('Message has been sent');
                     </script>";
      
       
    }
    $mail->smtpClose();
//-----------------------------END MAIL----------------------------------------------------
$msg="Booking Cancelled successfully";
}


if(isset($_REQUEST['bckid'])||isset($_REQUEST['ucemail'])||isset($_REQUEST['ucname']))
	{
$bcid=intval($_GET['bckid']);
$ucemail=strval($_GET['ucemail']);
$ucname=strval($_GET['ucname']);
$status=1;
$cancelby='a';
$sql = "UPDATE bookings SET status=:status WHERE booking_id=:bcid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bcid',$bcid, PDO::PARAM_STR);
$query -> execute();

    //-----------------------------MAIL----------------------------------------------------
        require '../PHPMailer-master/PHPMailerAutoload.php';
       
    $mail1 = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail1->isSMTP();                                      // Set mailer to use SMTP
    $mail1->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail1->SMTPAuth = true;                               // Enable SMTP authentication
    $mail1->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail1->Port = 587;                                    // TCP port to connect to
    $mail1->Username = 'ranjith.pujari.1@gmail.com';       // SMTP username
    $mail1->Password = 'HarishRoopa';                      // SMTP password

    $mail1->Subject = 'Travel & Tourism booking details'; 

    $mail1->From = 'from@example.com';
    $mail1->FromName = 'Travel and Tourism (MIT)';
    $mail1->addAddress($ucemail);


    //$mail->addAddress('@gmail.com');                      // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail1->WordWrap = 50;                                   // Set word wrap to 50 characters
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail1->isHTML(true);                                    // Set email format to HTML


      
    $mail1->Body    = '<html>Hi '.$ucname.',<br><br>Your Booking has been <b>Confirmed</b>.<br>

    <br>

    Wish you Happy and Safe Journey!!!<br>Thank you for booking with Travel and Tourism(MIT)!<br><br>Thanks & Regards,<br>Travel and Tourism (MIT)<br>Manipal</html> ';


    if(!$mail1->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail1->ErrorInfo;
        echo "<script>
                        alert('$mail->ErrorInfo;');
                     </script>";
    } else {
     //   echo 'Message has been sent';
          echo "<script>
                        alert('Message has been sent');
                     </script>";
      
       
    }
    $mail1->smtpClose();
//-----------------------------END MAIL----------------------------------------------------

$msg="Booking Confirm successfully";
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
            $('#manageBookings').DataTable();
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
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Booking manager</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Manage booking</li>
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
                    	<table class="table table-striped table-bordered" id="manageBookings">
                    		<thead>
                     			 <tr>
                           			<th>#</th>
                           			<th>Booking Id</th>
                           			<th>Name</th>
                           			<th>Mobile No</th>
                           			<th>Email id</th>
                           			<th>Package name</th>
                           			<th>Reg Date</th>
                           			<th>From</th>
                           			<th>To</th>
                                    <th>People</th>
                                    <th>Price</th>
                           			<th>Status</th>
                           			<th>Action</th>
                      			</tr>
                    		</thead>
                    		<tbody>
                    			<?php 
                    			$sql = "SELECT bookings.booking_id as bookid,user.user_name as uname,user.phone as phno,user.email_id as email,packages.package_name as pckname,bookings.package_id as pid,bookings.reg_date as regdt,bookings.from_date as fdate,bookings.to_date as tdate,bookings.no_of_person as people,bookings.total_amount as price,bookings.status as status,bookings.cancelled_by as cancelby,bookings.updation_date as up_date from user join bookings on bookings.user_email=user.email_id join packages on packages.package_id=bookings.package_id";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
						  	<td><?php echo htmlentities($cnt);?></td>
							<td>#TTBK-<?php echo htmlentities($result->bookid);?></td>
							<td><?php echo htmlentities($result->uname);?></td>
							<td><?php echo htmlentities($result->phno);?></td>
							<td><?php echo htmlentities($result->email);?></td>
							<td><a href="updatePackage.php?pid=<?php echo htmlentities($result->pid);?>"><?php echo htmlentities($result->pckname);?></a></td>
							<td><?php echo htmlentities($result->regdt);?></td>
							<td><?php echo htmlentities($result->fdate);?></td>
							<td><?php echo htmlentities($result->tdate);?></td>
                            <td><?php echo htmlentities($result->people);?></td>
                            <td><?php echo htmlentities($result->price);?></td>
							<td><?php if($result->status==0)
{
echo "Pending";
}
if($result->status==1)
{
echo "Confirmed";
}
if($result->status==2 and  $result->cancelby=='a')
{
echo "Cancelled by you on " .$result->up_date;
} 
if($result->status==2 and $result->cancelby=='u')
{
echo "Cancelled by User on " .$result->up_date;

}
?></td>

<?php if($result->status==2)
{
	?><td>Cancelled</td>
<?php } else {?>
<td><a href="manageBooking.php?bkid=<?php echo htmlentities($result->bookid);?>&uemail=<?php echo htmlentities($result->email);?>&uname=<?php echo htmlentities($result->uname);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a> / <a href="manageBooking.php?bckid=<?php echo htmlentities($result->bookid);?>&ucemail=<?php echo htmlentities($result->email);?>&ucname=<?php echo htmlentities($result->uname);?>" onclick="return confirm('Do you really want to confirm booking')" >Confirm</a></td>
<?php }?>

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