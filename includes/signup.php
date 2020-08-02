<?php
error_reporting(0);
if(isset($_POST['submit']))
{
	$usrname=$_POST['usrname'];
	$usremail=$_POST['usremail'];
	$usrpass=md5($_POST['usrpass']);
	$usrphone=$_POST['usrphone'];
	$sql="INSERT INTO user(user_name,email_id,password,phone) VALUES(:usrname,:usremail,:usrpass,:usrphone)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':usrname',$usrname,PDO::PARAM_STR);
	$query->bindParam(':usremail',$usremail,PDO::PARAM_STR);
	$query->bindParam(':usrpass',$usrpass,PDO::PARAM_STR);
	$query->bindParam(':usrphone',$usrphone,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{

        $_SESSION['msg']="You are successfully registered. Now you can login ";
        echo "<script>alert('user created');</script>";
        //header('location:thankyou.php');

       
		
	}
	else 
	{
		$_SESSION['msg']="Something went wrong. Please try again.";
		echo "<script>alert('user not registered');</script>";
		// header('location:thankyou.php');
	}
}
?>

<style type="text/css">
	

        .form-elegant .font-small {
            font-size: 0.8rem;
        }

        .form-elegant .z-depth-1a {
            -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
            box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
        }

        .form-elegant .z-depth-1-half,
        .form-elegant .btn:hover {
            -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
            box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
        }

        .form-elegant .modal-header {
            border-bottom: none;
        }

        .modal-dialog .form-elegant .btn .fab {
            color: #2196f3 !important;
        }

        .form-elegant .modal-body,
        .form-elegant .modal-footer {
            font-weight: 400;
        }

        :root {
            --input-padding-x: 1.5rem;
            --input-padding-y: .75rem;
        }

        #usrname {
            height: 43px !important;
        }

        #usremail {
            height: 43px !important;
        }

        #usrpass {
            height: 43px !important;
        }

        #usrphone {
            height: 43px !important;
        }

        .modal-body.btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            transition: all 0.2s;
        }


        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-label-group input {
            height: auto;

        }

        .form-label-group>input,
        .form-label-group>label {
            padding: var(--input-padding-y) var(--input-padding-x);
        }

        .form-label-group>label {
            position: absolute;
            top: 4px;
            left: 0px;
            display: block;
            width: 100%;
            margin-bottom: 0;
            /* Override default `<label>` margin */
            line-height: 10px;
            color: #495057;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
            color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-moz-placeholder {
            color: transparent;
        }

        .form-label-group input::placeholder {
            color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
            padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
            padding-bottom: calc(var(--input-padding-y) / 2);
        }

        .form-label-group input:not(:placeholder-shown)~label {
            padding-top: calc(var(--input-padding-y) / 3);
            padding-bottom: calc(var(--input-padding-y) / 3);
            font-size: 12px;
            color: #777;
        }



        /*---------END MODAL---------*/


</style>
<script>
    function checkAvailablity() {

        $("#loaderIcon").show();
        jQuery.ajax({
        url: "email_availablity.php",
        data:'emailid='+$("#usremail").val(),
        type: "POST",
        success:function(data){
            $("#useremail_status").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
        });
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign up</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->
        <form name="signup" method="post">

                    <div class="form-label-group">
                        <input id="usrname" name="usrname" required="" class="form-control" placeholder="Enter Name" pattern="\w+ \w+.*" style="background-color: transparent;">
                        <label data-error="wrong" data-success="right" for="usrname">Enter Name</label>
                    </div>

                    <div class="form-label-group">
                        <input type="text" value="" id="usremail" name="usremail" autocomplete="off" required=""class="form-control" placeholder="Enter Email" pattern="^[a-z0-9](\.?[a-z0-9]){5,}@gmail\.com$" onBlur="checkAvailablity()"
                            style="background-color: transparent;">
                        <label data-error="wrong" data-success="right" for="usremail">Enter Email</label>
                         <span id="useremail_status" style="font-size:12px;"></span>
                    </div>
                     

                    <div class="form-label-group">
                        <input type="password" id="usrpass" name="usrpass" required="" class="form-control" placeholder="Enter password"
                            style="background-color: transparent;">
                        <label data-error="wrong" data-success="right" for="usrpass">Enter password</label>
                    </div>

                    <div class="form-label-group">
                        <input value="" id="usrphone" name="usrphone"required="" maxlength="10" minlength="10" class="form-control" placeholder="Enter Mobile no" onkeypress="return isNumber(event)"
                            style="background-color: transparent;">
                        <label data-error="wrong" data-success="right" for="usrphone">Enter Mobile no</label>
                    </div>

                    <div class="text-center mb-3">
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" value="submit" name="submit" id="submit" type="submit" onclick="">submit</button>
                    </div>
                </form>
        </div>

        
        
      <!--Footer-->
     
    </div>
    <!--/.Content-->
  </div>
</div>

<!-- Modal -->
