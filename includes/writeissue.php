<?php
error_reporting(0);
if(isset($_POST['issueSubmit']))
{
$issue=$_POST['issue'];
$description=$_POST['description'];
$email=$_SESSION['login'];
$sql="INSERT INTO issues(user_email,issue_type,description) VALUES(:email,:issue,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':issue',$issue,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Issue Submitted');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
echo "<script>alert('Something went wrong');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
}
?>
<!-- Modal -->
<div class="modal fade" id="writeissueModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Need Help?</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->
        <form method="post">
                    <div class="form-group">
                    	<label>Issue</label>
                        <select id="issue" name="issue" required="" class="form-control" style="background-color: transparent;">
                        	<option value="">Select Issue</option> 		
														<option value="Booking Issues">Booking Issues</option>
														<option value="Cancellation"> Cancellation</option>
														<option value="Refund">Refund</option>
														<option value="Travels">Travels</option>
														<option value="Hotel">Hotel</option>
														<option value="Other">Other</option>
													</select>
                    </div>

                    <div class="form-group">
                    	<label>Description</label>
                        <textarea rows="5" id="description" name="description" required="" class="form-control" 
                            style="background-color: transparent;"></textarea>
                      
                    </div>


                    <div class="text-right mb-3">
                       <button type="submit" name="issueSubmit" id="issueSubmit" class="btn btn-success col-sm-2" style="color:white;background-color:#3971a9;border-radius: 5px;border:transparent;font-family: sans-serif;font-size: 13px;">Submit</button>
                    </div>
                </form>
        </div>
      <!--Footer-->
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal -->