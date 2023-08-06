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
	function get_class()
  	{
    // alert("hiiiii");
    var xmlhttp = new XMLHttpRequest();
    var cid = document.getElementById('course').value;
    //alert(cid);
    var semid = document.getElementById('semester').value;
    //alert(semid);
    xmlhttp.open("GET","dropdown.php?semid=" + semid +"&couid1="+ cid,false);
    xmlhttp.send(null);
    //alert(xmlhttp.responseText);
    document.getElementById('class').innerHTML=xmlhttp.responseText;
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
						<h4 class="text-primary">Add Assignment</h4>
						<form  method="post" id="fm" name="fm" enctype="multipart/form-data" autocomplete="off">
							<div class="row">
									<div class="col-12 col-lg-6">
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
									<div class="col-12 col-lg-6">
										<label><b>Semester</b></label>
										<div class="form-group" >
											<select  id="semester" name='sem' class="form-control text-info" onchange="get_sub(); get_class();">
													<option>Select Semester</option>
												
											</select>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<label><b>Class </b></label>
										<div class="form-group" >
											<select id="class" name="class" class="form-control text-info">
												<option>Select Class</option>
											</select>

										</div>
									</div>
									<div class="col-12 col-lg-6">
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
										<div class="form-group">
											<label><b>Date of Declare </b></label>
											<input type="date" class="form-control text-info" id="txtdod" name="txtdod" >
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label><b>Date of Submission </b></label>
											<input type="date" class="form-control text-info"  name="txtdos" id="txtdos">
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
		$class=$_REQUEST['class'];
		
		$file=$_FILES['pdf']['name'];
		$dod=$_REQUEST['txtdod'];
		$dos=$_REQUEST['txtdos'];

		$w="select Coursename from coursemst where Courseid=$cou";
        $res=mysqli_query($cnn,$w);
        $ans=mysqli_fetch_array($res);
        $cnm=$ans['Coursename'];

        $w="select Semestername from semestermst where Semesterid=$sem";
        $res=mysqli_query($cnn,$w);
        $ans=mysqli_fetch_array($res);
        $snm=$ans['Semestername'];

		$w="select Subjectname from subjectmst where Subjectid=$sub";
        $res=mysqli_query($cnn,$w);
        $ans=mysqli_fetch_array($res);
        $subnm=$ans['Subjectname'];

        $w="select Classname from classmst where Classid=$class";
        $res=mysqli_query($cnn,$w);
        $ans=mysqli_fetch_array($res);
        $classnm=$ans['Classname'];

       	$type=$_FILES['pdf']['type'];
       	$ext=explode("/",$type);
       	$f=$cnm."_".$snm."_".$classnm."_".$subnm;
        $fi=$f.".".$ext[1];

		$query="insert into assignmentmst (Courseid,Semesterid,Classid,Subjectid,File,Declaredate,Submissiondate) values($cou,$sem,$class,$sub,'$fi','$dod','$dos')";
		$cnt=mysqli_query($cnn,$query);

		if($cnt>0)
		{
			move_uploaded_file($_FILES['pdf']['tmp_name'],"../img/assignment/".$fi);
			$q1="SELECT Assignmentid from assignmentmst where File='$fi' ";
			$res=mysqli_query($cnn,$q1);
			$a=mysqli_fetch_array($res);
			$aid=$a['Assignmentid'];
			$q1="SELECT Studentid from studentmst where Courseid=$cou and Semesterid=$sem and Classid=$class";
			$r=mysqli_query($cnn,$q1);
			while($ans=mysqli_fetch_array($r))
			{
				 $sid=$ans['Studentid'];
				 $que1="INSERT into notification(Studentid,Assignmentid) values($sid,$aid)";
	             $cnt=mysqli_query($cnn,$que1);
				
            }
            $_SESSION['message']="<b>Assignment Send Successfully</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"assignment.php?Err=true\"
                    </script>";
        }
        else
       	{              
       		$_SESSION['message']="<b>Please try again...</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"assignment.php?isErr=true\"
                    </script>";
            
		}
	}
?>
	
<?php
	require_once("../Layout/footer.php");
?>
<script>

$(document).ready(function(){
		$( "#fm" ).submit(function( event ) {
			var isError=false;
			teacherval = $("#txtname").val();
			var teacher_pattern = /^[a-zA-Z ]+$/;
			if(teacherval.match(teacher_pattern))
			{
				$("#name_error").hide();
			}
			else
			{
				isError=true;
				$("#name_error").html("Only Use Alphabet..");
				$("#name_error").show();
			}

			teacherval = $("#txtuname").val();
			var teacher_pattern = /^[a-zA-Z]{2,25}$/;
			if(teacherval.match(teacher_pattern))
			{
				$("#uname_error").hide();
			}
			else
			{
				isError=true;

				$("#uname_error").html("Only Use Alphabet Without Spaces..");
				$("#uname_error").show();
			}

			teacherval = $("#txtpwd").val();
			var teacher_pattern = /^[a-zA-Z0-9]{6,8}$/;
			if(teacherval.match(teacher_pattern))
			{
					$("#pwd_error").hide();
			}
			else
			{
					isError=true;
					$("#pwd_error").html("Range Between 6 To 8..");
					$("#pwd_error").show();
			}
			teacherval = $("#txtcon").val();
			var teacher_pattern = /^[0-9]{10}$/;
			if(teacherval.match(teacher_pattern))
			{
					$("#con_error").hide();
			}
			else
			{
					isError=true;
					$("#con_error").html("Only Use 10 numbers..");
					$("#con_error").show();
			}
			if(isError)
			{
					alert("All fields are required...");
					event.preventDefault();
			}
			else
			{
					return true; 
			}
		});
				
		$("#txtname").focusout(function(){
		teacherval = $("#txtname").val();
		var teacher_pattern = /^[a-zA-Z ]+$/;
			if(teacherval.match(teacher_pattern))
			{
				$("#name_error").hide();
			}
			else
			{
				$("#name_error").html("Only Use Alphabet..");
				$("#name_error").show();
			}

		});
		$("#txtuname").focusout(function(){
		teacherval = $("#txtuname").val();
		var teacher_pattern = /^[a-zA-Z]{2,25}$/;
			if(teacherval.match(teacher_pattern))
			{
				$("#uname_error").hide();
			}
			else
			{
				$("#uname_error").html("Only Use Alphabet Without Spaces..");
				$("#uname_error").show();
			}
		});
		$("#txtpwd").focusout(function(){
		teacherval = $("#txtpwd").val();
		var teacher_pattern = /^[a-zA-Z0-9]{6,8}$/;
			if(teacherval.match(teacher_pattern))
			{
				$("#pwd_error").hide();
			}
			else
			{
				$("#pwd_error").html("Range Between 6 To 8..");
				$("#pwd_error").show();
			}
		});
		$("#txtdob").focusout(function(){
				$("#dob_error").hide();
		});
		$("#txtdoj").focusout(function(){
				$("#doj_error").hide();
		});
		$("#txtimg").focusout(function(){
				$("#img_error").hide();
		});
		$("#txtcon").focusout(function(){
		teacherval = $("#txtcon").val();
		var teacher_pattern = /^[0-9]{10}$/;
			if(teacherval.match(teacher_pattern))
			{
					$("#con_error").hide();
			}
			else
			{
					$("#con_error").html("Only Use 10 numbers..");
					$("#con_error").show();
			}
		});
	});
</script> 
