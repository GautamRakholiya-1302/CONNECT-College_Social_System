<?php
	require_once("session.php");
	require_once("header.php");
?>

<?php   
	if(isset($_REQUEST['add']))
	{
		$nm     =    trim($_REQUEST['txtname']);
		$uname 	= 	 substr(str_replace(' ','',strtolower($nm)), 0, 8).rand(1,100);
		$pwd 	= 	 bin2hex(openssl_random_pseudo_bytes(4)); 
		$dob    =    $_REQUEST['dob'];
		$doj    =    $_REQUEST['doj'];
		$g      =    $_REQUEST['gender'];
		$email  =    trim($_REQUEST['txtemail']);
		$con    =    trim($_REQUEST['txtcon']);
		$dept   =    $_REQUEST['dept'];
		$qul    =    implode(",",$_REQUEST['txtqul']);
		   	
		$query = "select max(Teacherid) from teachermst";
		$res = mysqli_query($cnn,$query);
		$ans = mysqli_fetch_array($res);
		$id = $ans[0] + 1;
		
		$ndob=date('Y-m-d',strtotime($dob));
		$ndoj=date('Y-m-d',strtotime($doj));
		$pswd = base64_encode($pwd);
		$query="insert into teachermst(Teacherid,`Name`,`Username`,`Pwd`,`Email`,`Gender`,`Dob`,`Doj`,`Contact`,`Qualification`,`Department`) values($id,'$nm','$uname','$pswd','$email','$g','$ndob','$ndoj','$con','$qul','$dept')";

		
  		
    		require '../PHPMailer-master/PHPMailerAutoload.php';
    		$mail = new PHPMailer();
                //Enable SMTP debugging.
    		$mail->SMTPDebug = 0;
                //Set PHPMailer to use SMTP.
    		$mail->isSMTP();
                //Set SMTP host name
    		$mail->Host = "smtp.gmail.com";
    		$mail->SMTPOptions = array(
     		'ssl' => array(
        	'verify_peer' => false,
        	'verify_peer_name' => false,
        	'allow_self_signed' => true
      		)
    		);
                //Set this to true if SMTP host requires authentication to send email
    		$mail->SMTPAuth = TRUE;
                //Provide username and password
    		$mail->Username = "connect1014@gmail.com";
    		$mail->Password = "108connect";
                //If SMTP requires TLS encryption then set it
    		$mail->SMTPSecure = "false";
   			$mail->Port = 587;
                //Set TCP port to connect to

    		$mail->From = "connect1014@gmail.com";
    		$mail->FromName = "connect";
    		$mail->addAddress($email);
    		$mail->isHTML(true);
    		$mail->Subject ="For Your Log In";
    		$mail->Body = "<h4><b>your Username : </b></h4>".$uname."<br><h4><b>Password : </b></h4>".base64_decode($pswd);
                // $mail->Body = "<b>your Password : </b>".$pass;
    		$mail->AltBody = "This is the plain text version of the email content";
    		if(!$mail->send())
    		{
      			$_SESSION['message']="Please Check Your Internet Connection...";
      			 	echo "<script type=\"text/javascript\">
                  	window.location = \"addfaculty.php?isErr=true\"
                   </script>";
      			
    		}
    		else
    		{
      			if(mysqli_query($cnn,$query))
      			{
      				$_SESSION['message']="<b>Faculty added successfully</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"managefaculty.php?Err=true\"
                    </script>";
      			}
      			else
      			{
      				$_SESSION['message']="Failed to add faculty...please try again.";
      				echo "<script type=\"text/javascript\">
                    window.location = \"addfaculty.php?isErr=true\"
                    </script>";
                    
      			}
    		}            
  		
  		
	} 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
</script>
<!-- ##### Regular Page Area Start ##### -->
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
	<!-- Register Contact Form -->
	<div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%";>
		<div class="container-fluid">
		<div class="row">
			<div class="col-12">
	        <?php
	          if(isset($_GET['isErr'])){
	            ?>
	            <div class="alert alert-danger" role="alert">
	                <?php echo $_SESSION['message'];  ?>
	            </div>
	            <?php
	          }
	        ?>
        	</div>
      </div>
			<div class="row">
				<div class="col-12">
					<div class="forms">
						<h4 class="text-primary">Add Faculty</h4>
						<form  data-toggle="validator" role="form" method="post" autocomplete="off" onsubmit="addfaculty()" id="fm" name="fm" enctype="multipart/form-data" autocomplete="off">
							<div class="row">
									<div class="col-12">
										<label for="name"><b>Name </b></label>
										<div class="form-group">
											<input type="text" class="form-control text-info" data-error="*Required" pattern="^[a-zA-Z ]{5,}$" required name="txtname" id="name" placeholder="Surname Name">
											<div class="help-block with-errors" style="color: red;"></div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label for="inputEmail"><b>Email </b></label>
											<input type="email" class="form-control text-info" name="txtemail" id="inputEmail" required>
											<div class="help-block with-errors" style="color: red;"></div>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="form-group">
											<label><b>Gender</b></label>
											<select name="gender" class="form-control text-info">
												<option>Male</option>
												<option>Female</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="form-group">
											<label for="dob"><b>Date of Birth </b></label>
											<input type="date" class="form-control text-info" data-error="*Required" name="dob" id="dob" required>
											<div class="help-block with-errors" style="color: red;"></div>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="form-group">
											<label for="doj"><b>Date of joining </b></label>
											<input type="date" class="form-control text-info"  name="doj" id="doj" data-error="*Required" required>
											<div class="help-block with-errors" style="color: red;"></div>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="form-group">
											<label for="con"><b>Contact number </b></label>
											<input type="text" class="form-control text-info" id="con" name="txtcon" pattern="^[0-9]{10}$" data-error="Use 10 digits only" required>
											<div class="help-block with-errors" style="color: red;"></div>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="form-group">
											<label for="qul"><b>Qualification </b></label>
											<select name="txtqul[]" class="form-control text-info" style="height: 80px;" id="qul" size="5" multiple="multiple" data-error="*Required" required>
												<option value="Ph.D.">Ph.D.</option>
												<option value="M.Phil.">M.Phil.</option>
												<option value="M.Sc(IT)">M.Sc(IT)</option>
												<option value="B.Sc(IT)">B.Sc(IT)</option>
												<option value="M.C.A.">M.C.A.</option>
												<option value="B.C.A.">B.C.A</option>
												<option value="M.B.A.">M.B.A.</option>
												<option value="B.B.A.">B.B.A.</option>
												<option value="M.A.">M.A.</option>
												<option value="B.E.">B.E.</option>
												<option value="M.Com.">M.Com.</option>
												<option value="B.Com.">B.Com.</option>
												<option value="NET">NET</option>
											</select>
											<div class="help-block with-errors" style="color: red;"></div>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="form-group">
											<label><b>Department </b><small id="dept_error" style="color:red;">
											</small></label>
											<select name="dept" class="form-control text-info" id="txtdept">
												<?php
													$query="select * from coursemst";
													$res=mysqli_query($cnn,$query);
													while($ans=mysqli_fetch_array($res))
													{
													echo "<option value=".$ans['Courseid'].">".$ans['Coursename']."</option>";
													}
												?>
											</select>
										</div>
									</div>
									
									<div class="col-12">
										<input type="submit" class="btn clever-btn w-100" name="add"  value="Add">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
	
<?php
	require_once("../Layout/footer.php");
?>


 