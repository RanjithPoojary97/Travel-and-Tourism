<?php
session_start();
if(isset($_POST['signin']))
{
	$usr_email=$_POST['usr_email'];
	$usr_pass=md5($_POST['usr_pass']);
	$sql = "SELECT * FROM user WHERE email_id=:usr_email and password=:usr_pass";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':usr_email', $usr_email, PDO::PARAM_STR);
	$query-> bindParam(':usr_pass', $usr_pass, PDO::PARAM_STR);
	$query-> execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
    {
		$_SESSION['login'] = $_POST['usr_email'];
		echo "<script>alert('welcome again');</script>";
		echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
		//echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
	} else{
			echo "<script>alert('Invalid Details');</script>";
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

  
        #usr_email {
            height: 43px !important;
        }

        #usr_pass {
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

<!-- Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->
        <form method="post">
                    <div class="form-label-group">
                        <input id="usr_email" name="usr_email" required="" class="form-control" placeholder="Enter Email"
                            style="background-color: transparent;">
                        <label data-error="wrong" data-success="right" for="usr_email">Enter Email</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="usr_pass" name="usr_pass" required="" class="form-control" placeholder="Enter password"
                            style="background-color: transparent;">
                        <label data-error="wrong" data-success="right" for="usr_pass">Enter password</label>
                    </div>


                    <div class="text-center mb-3">
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" value="submit" name="signin" id="signin" type="submit" onclick="">Login</button>
                    </div>
                </form>
          <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="forgot_password.php" class="blue-text ml-1">
              Password?</a></p>
        </div>   
      <!--Footer-->
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal -->