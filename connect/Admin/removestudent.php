<?php
    require_once("session.php");
    require_once("header.php");
?>
<script type="text/javascript">
    function get_sem()
    {
        var xmlhttp = new XMLHttpRequest();
        var courseid = document.getElementById('course').value;
        xmlhttp.open("GET","dropdown.php?cid=" + courseid,false);
        xmlhttp.send(null);
        document.getElementById('semester').innerHTML=xmlhttp.responseText;
    }
   
</script>

<?php
    if(isset($_REQUEST['delete']))
    {
        $sem=$_REQUEST['sem'];
        $cou=$_REQUEST['cou'];

        $que="SELECT * from studentmst where Courseid=$cou and Semesterid=$sem";
        $res=mysqli_query($cnn,$que);
        while($ans=mysqli_fetch_array($res))
        {
            $enroll=$ans['Enrollmentno'];
            $fnm=$ans['Firstname'];
            $mnm=$ans['Middlename'];
            $lnm=$ans['Lastname'];
            $unm=$ans['Username'];
            $pwd=$ans['Pwd'];
            $email=$ans['Email'];
            $profile=$ans['Profile'];
            $gender=$ans['Gender'];
            $dob=$ans['Dob'];
            $add=$ans['Address'];
            $con=$ans['Contact'];
            $cou=$ans['Courseid'];
            $sem=$ans['Semesterid'];
            $class=$ans['Classid'];

            $q="INSERT into alumnimst (Enrollmentno,Firstname,Middlename,Lastname,Username,Pwd,Email,Profile,Gender,Dob,Address,Contact,Courseid,Semesterid,Classid) values('$enroll','$fnm','$mnm','$lnm','$unm','$pwd','$email','profile','$gender','dob','$add','$con',$cou,$sem,$class)";
            mysqli_query($cnn,$q);
        }


        $query="DELETE from studentmst where Courseid=$cou and Semesterid='$sem'";
        if(mysqli_query($cnn,$query))
        {
            echo "<script type=\"text/javascript\">
            window.location = \"removestudent.php?err1=true\"
            </script>";
        }
        else
        {
            echo "<script type=\"text/javascript\">
            window.location = \"removestudent.php?iserr1=true\"
            </script>"; 
        }
    }
?>

<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%;">
            <div class="container-fluid">
                <div class="row" id="div4">
                    <div class="col-12">
                        <div class="forms">
                            <div class="col-12">
                            <?php

                                if(isset($_GET['err1'])){
                                ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo "Record remove successfully";  ?>
                                    </div>
                                <?php
                                    }
                                ?>
                                <?php
                                if(isset($_GET['iserr1'])){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo "Record not remove";  ?>
                                </div>
                                <?php
                              }
                            ?>
                            </div>
                            <h4 class="text-primary">Remove Data</h4>
                            <form method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                      <div class="form-group">
                                        <label><b>Course</b></label>
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
                                        <div class="form-group">
                                            <label><b>Semester</b></label>
                                            <select  id="semester" name='sem' class="form-control text-info" >
                                                    <option>Select Semester</option>
                                                
                                            </select>
                                            </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100" name="delete">Remove</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
               
        </div>
    </div>
</section>


<?php
	require_once("../Layout/footer.php");
?>