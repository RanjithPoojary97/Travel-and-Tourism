<?php
include('../includes/config.php');
parse_str($_SERVER['QUERY_STRING'], $params);
$hotelocation=$params['service_to'];

//echo "<script>console.log($hotelocation)</script>";

$sql ="SELECT * FROM travels where service_to='$hotelocation'";
$query= $dbh -> prepare($sql);
$query-> bindParam(':service_to', $hotelocation, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
	{
	foreach($results as $result)		
	{ ?>
		<select class="form-control" id="ptravel" name="ptravel" required="">
		<option value="">select Travels</option>
		<option value="<?php echo htmlentities($result->travels_id) ?>"><?php echo htmlentities($result->travels_name) ?></option>
		
	<?php } 
}
//echo json_encode($result);
?>