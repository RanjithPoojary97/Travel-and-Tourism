<?php
include('../includes/config.php');
parse_str($_SERVER['QUERY_STRING'], $params);
$hotelocation=$params['hotel_location'];

//echo "<script>console.log($hotelocation)</script>";

$sql ="SELECT * FROM hotels where hotel_location='$hotelocation'";
$query= $dbh -> prepare($sql);
$query-> bindParam(':hotel_location', $hotelocation, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
	{
	foreach($results as $result)		
	{ ?>
		<select class="form-control" id="photel" name="photel" required="">
		<option value="">select hotel</option>
		<option value="<?php echo htmlentities($result->hotel_id) ?>"><?php echo htmlentities($result->hotel_name) ?></option>
		
	<?php } 
}
//echo json_encode($result);
?>