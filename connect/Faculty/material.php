<?php
	require_once("session.php");
	require_once("header.php");
?>

<script type="text/javascript">
	function get_sem()
	{
		var xmlhttp = new XMLHttpRequest();
		
		var courseid = document.getElementById('course').value;
		//alert(courseid);
		xmlhttp.open("GET","dropdown.php?cid=" + courseid,false);
		xmlhttp.send(null);
		//alert(xmlhttp.responseText);
		document.getElementById('semester').innerHTML=xmlhttp.responseText;
	}
	function get_sub()
	{
		var xmlhttp = new XMLHttpRequest();
		var course = document.getElementById('course').value;
		//alert(course);
		var semesterid= document.getElementById('semester').value;
		//alert(semesterid);
		xmlhttp.open("GET","dropdown.php?sid=" + semesterid + "&couid=" + course,false);
		xmlhttp.send(null);
		//alert(xmlhttp.responseText);
		document.getElementById('subject').innerHTML=xmlhttp.responseText;
	}
</script>
<!-- ##### Regular Page Area Start ##### -->
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
	<!-- Register Contact Form -->
	<div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%";>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

		        <?php
		              if(isset($_REQUEST['Err'])){
		                ?>
		                <div class="alert alert-info" role="alert">
		                    <?php echo $_SESSION['message'];  ?>
		                </div>
		                <?php
		              }
		            ?>
		            <?php
		              if(isset($_REQUEST['isErr'])){
		                ?>
		                <div class="alert alert-danger" role="alert">
		                    <?php echo $_SESSION['message'];  ?>
		                </div>
		                <?php
		              }
		            ?>
		           </div>
				<div class="col-12">
					<div class="forms">
						<h4 class="text-primary">Add Material</h4>
						<form  method="post" id="fm" name="fm" enctype="multipart/form-data" autocomplete="off">
							<div class="row">
									<div class="col-12 ">
										<label><b>Department </b></label>
										<div class="form-group">
											
											<select name="cou" class="form-control text-info" id="course" onchange="get_sem();">
												<option>Select Course</option>
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
										<label><b>Semester</b></label>
										<div class="form-group" >
											<select  id="semester" name='sem' class="form-control text-info" onchange="get_sub();">
													<option>Select Semester</option>
												
											</select>
										</div>
									</div>
									<div class="col-12">
										<label><b>Subject </b></label>
										<div class="form-group" >
											<select id="subject" name="sub" class="form-control text-info">
												<option>Select Subject</option>
											</select>

										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label><b>File </b></label>
											<input type="file" class="form-control text-info" name="pdf" id="pdf">
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
	if(isset($_REQUEST['add']))
	{
		$cou=$_REQUEST['cou'];
		$sem=$_REQUEST['sem'];
		$sub=$_REQUEST['sub'];
		
		$file=$_FILES['pdf']['name'];
		$tempname=$_FILES['pdf']['tmp_name'];
            
		$w="select Coursename from coursemst where Courseid='$cou'";
        $res=mysqli_query($cnn,$w);
        $ans=mysqli_fetch_array($res);
        $cnm=$ans['Coursename'];

        $w="select Semestername from semestermst where Semesterid='$sem'";
        $res=mysqli_query($cnn,$w);
        $ans=mysqli_fetch_array($res);
        $snm=$ans['Semestername'];

		$w="select Subjectname from subjectmst where Subjectid='$sub'";
        $res=mysqli_query($cnn,$w);
        $ans=mysqli_fetch_array($res);
        $subnm=$ans['Subjectname'];

       	$type=$_FILES['pdf']['type'];
       	$ext=explode("/",$type);
       	$f=$cnm."_".$snm."_".$subnm;
        $fi=$f.".".$ext[1];
        $dt=date('Y-m-d');
		$query="insert into materialmst (Courseid,Semesterid,Subjectid,File,Date) values($cou,$sem,$sub,'$fi','$dt')";
		$cnt=mysqli_query($cnn,$query);

		if($cnt>0)
		{
			move_uploaded_file($tempname,"../img/material/".$fi);
			$q1="SELECT Id from materialmst where File='$fi' ";
			$res=mysqli_query($cnn,$q1);
			$a=mysqli_fetch_array($res);
			$mid=$a['Id'];
			echo $mid;
			$q1="SELECT Studentid from studentmst where Courseid=$cou and Semesterid=$sem";
			$r=mysqli_query($cnn,$q1);
			while($ans=mysqli_fetch_array($r))
			{
				 $sid=$ans['Studentid'];
				 echo $sid;
				 $que1="INSERT into notification(Studentid,Materialid) values($sid,$mid)";
				 echo $que1;
	             $cnt=mysqli_query($cnn,$que1);
				
            }
			$_SESSION['message']="<b>Material Send Successfully</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"material.php?Err=true\"
                    </script>";
        }
        else
       	{              
       		 $_SESSION['message']="<b>Please try again..</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"material.php?isErr=true\"
                    </script>";
            
		}
	}
?>
	
<?php
	require_once("../Layout/footer.php");
?>
</body>
</html>

 