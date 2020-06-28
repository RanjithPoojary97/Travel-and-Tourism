<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{ 
  $isid=intval($_GET['isid']);
if(isset($_POST['updateIssue']))
  {
$remark=$_POST['remark'];

$sql = "UPDATE issues SET admin_remarks=:remark WHERE issue_id=:isid";
$query = $dbh->prepare($sql);
$query -> bindParam(':remark',$remark, PDO::PARAM_STR);
$query-> bindParam(':isid',$isid, PDO::PARAM_STR);
$query -> execute();

$msg="Remark successfully Updated";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Update Issues</title>
</head>
<body style="font-family: sans-serif;">
	<div style="margin-left:50px;">
 	<form name="update_issue" id="update_issue" method="post"> 
	<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" style="padding-left:0px;"><div> <b>Update Remark !</b></div></td>
      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
      <tr>
      <td colspan="2" >  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?></td>
    
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tbody>
<?php 
$sql = "SELECT * from issues where issue_id=:isid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':isid',$isid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{ 

  if($result->admin_remarks=="")
  {
?>

     <tr>
      <td>Remark:</td>
      <td><span>
        <textarea class="form-control" cols="50" rows="7" name="remark" required="required" ></textarea>
        </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="updateIssue"  value="update"   size="40" style="cursor: pointer;"/></td>
    </tr> 
    <?php } else { ?>
     <tr>
      <td><b>Remark:</b></td>
      <td style="text-align: left;"><?php echo htmlentities($result->admin_remarks);?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><b>Remark Date:</b></td>
      <td style="text-align: left;"><?php echo htmlentities($result->remarks_date);?></td>
    </tr>
</tbody>
    <?php }}}?>
    
 

 
</table>
</form>
</div>
</body>
</html>
<?php } ?>