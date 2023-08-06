<?php
      require_once("session.php");
      require_once("header.php");
      require_once("sendEmail.php");
?>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script>
	$(document).ready(function(){
		$("#div3").hide();
		$("#div4").hide();
		$("#div1").click(function(){
			$("#div4").hide();
			$("#div3").show();
		});
		$("#div2").click(function(){
			$("#div3").hide();
			$("#div4").show();
		});

	});
</script>
<script>
  function valid()
  {
        
  }
</script>
<script type="text/javascript">
  function get_sem()
  {
    var xmlhttp = new XMLHttpRequest();
    var courseid = document.getElementById('course').value;
    xmlhttp.open("GET","dropdown.php?cid=" + courseid,false);
    xmlhttp.send(null);
    document.getElementById('semester').innerHTML=xmlhttp.responseText;
  }
  function get_class()
  {
    
    var xmlhttp = new XMLHttpRequest();
    var cid = document.getElementById('course').value;
    var semid = document.getElementById('semester').value;
    xmlhttp.open("GET","dropdown.php?semid=" + semid +"&couid1="+ cid,false);
    xmlhttp.send(null);
    document.getElementById('class').innerHTML=xmlhttp.responseText;
  }
 </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
</script>

<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
  <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%;">
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
        
        <div class="col-12">
        <?php
          if(isset($_GET['err'])){
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo "Please choose CSV file";  ?>
            </div>
            <?php
          }
        ?>
      </div>
      </div>
      <div class="row">
        <div class="col-lg-6" id="div1">
         <button class="btn btn-info"><i class="fa fa-plus fa-2" aria-hidden="true"></i>&nbsp;Single Add
         </button>
       </div>
       <div class="col-lg-6" id="div2">
         <button class="btn btn-info"><i class="fa fa-plus fa-2" aria-hidden="true"></i>&nbsp;Bulk Add</button>
       </div>
     </div>
     <br><br>
     <div class="row" id="div3">
      <div class="col-12">
        <div class="forms">
          <h4 class="text-primary">Student Detail</h4>
          <form data-toggle="validator" method="post" action="addStudentData.php?type=single" autocomplete="off" role="form">
            <div class="row">
             <div class="col-12 col-lg-6">
              <div class="form-group">
                <label for="inputno"><b>Enrollment No</b></label>
                <input type="text" class="form-control text-info" data-error="*Required" name="txteno" id="inputno" pattern="^E[0-9]{7,10}$" required placeholder="E*********">
                <div class="help-block with-errors" style="color: red;"></div>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label for="inputName"><b>First Name</b></label>
                <input type="text" class="form-control text-info" data-error="*Alphabets Only" name="txtfname" id="inputName" pattern="^[A-Za-z]{3,}$" required>
                <div class="help-block with-errors" style="color: red;"></div>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label for="mname"><b>Middle Name</b></label>
                <input type="text" class="form-control text-info" data-error="*Alphabets Only" name="txtmname" id="mname"  pattern="^[A-Za-z]{2,}$" required>
                <div class="help-block with-errors" style="color: red;"></div>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label for="lname"><b>Last Name</b></label>
                <input type="text" class="form-control text-info" data-error="*Alphabets Only" name="txtlname" id="lname" pattern="^[A-Za-z]{4,}$" required>
                <div class="help-block with-errors" style="color: red;"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="inputEmail"><b>Email</b></label>
                <input type="email" class="form-control text-info" name="txtemail"  id="inputEmail" required>
                <div class="help-block with-errors" style="color: red;"></div>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label><b>Gender</b></label>
                <select name="gender" class="form-control text-info" id="gender">
                  <option>Male</option>
                  <option>Female</option>
                </select>
                </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label for="dob"><b>Date of Birth</b></label>
                <input type="date" class="form-control text-info" data-error="*Required"  name="dob" id="dob" required>
                <div class="help-block with-errors" style="color: red;"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="address"><b>Address</b></label>
                <input type="text" class="form-control text-info" data-error="*Required" name="txtadd" id="address" pattern="^[A-Za-z0-9][,A-Za-z0-9-/.: ]{6,}$" required>
                <div class="help-block with-errors" style="color: red;"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="phone"><b>Phone</b></label>
                <input type="text" class="form-control text-info" data-error="Use 10 digits Only" name="txtcon" id="phone" pattern="^[0-9]{10}$" required>
                <div class="help-block with-errors" style="color: red;"></div>
              </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="form-group">
                <label><b>Course</b></label>
                <select name="txtcou" class="form-control text-info" id="course" onchange="get_sem();">
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
            <div class="col-12 col-lg-4">
              <div class="form-group">
                <label><b>Semester</b></label>
                <select  id="semester" name='sem' class="form-control text-info" onchange="get_class();">
                          <option>Select Semester</option>
                </select>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label ><b>Class</b></label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <select  id="class" name='class'  class="form-control text-info">
                          <option>Select Class</option>
                </select>
               </div>
            </div> 
            <div class="col-12">
              <button class="btn clever-btn w-100" name="add" >Add</button>
            </div>
        </form>
          </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row" id="div4">
   <form method="post"  autocomplete="off" action="addStudentData.php?type=multiple" enctype="multipart/form-data">
     <div class="col-12">
      <div class="form-group">
        <h2 class="text-primary">Import Data</h2><br><h6 class="text-primary">Select CSV file</h6>	
        <input type="file" class="form-control text-info" name="file" id="file" class="input-large">
      </div>
    </div>
    <div class="col-12">
     <button  type="submit" class="btn clever-btn w-100" value="submit" name="add">Add</button>
   </div>
 </form>
</div>
</div>
</div>
</section>

<?php
    require_once("../Layout/footer.php");
?>
                                               