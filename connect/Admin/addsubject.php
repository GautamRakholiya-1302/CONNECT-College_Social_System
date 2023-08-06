<?php
    require_once("session.php");
    require_once("header.php");
?>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script>
    $(document).ready(function(){
        $("#sub2").hide();
        $("#sub3").hide();
        $("#sub4").hide();
        $("#sub5").hide();
        $("#sub6").hide();
        $("#sub7").hide();
        $("#sub8").hide();
        
        $("#plus1").click(function(){
            $("#sub2").show();
            $("#plus1").hide();
        });
        $("#plus2").click(function(){
            $("#sub3").show();
            $("#plus2").hide();
        });
        $("#plus3").click(function(){
            $("#sub4").show();
            $("#plus3").hide();
        });
        $("#plus4").click(function(){
            $("#sub5").show();
            $("#plus4").hide();
        });
        $("#plus5").click(function(){
            $("#sub6").show();
            $("#plus5").hide();
        });
        $("#plus6").click(function(){
            $("#sub7").show();
            $("#plus6").hide();
        });
        $("#plus7").click(function(){
            $("#sub8").show();
            $("#plus7").hide();
        });
    });
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
</script>
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
       <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <?php
                      if(isset($_GET['err'])){
                        ?>
                        <div class="alert alert-info" role="alert">
                            <?php echo "Record insert Successfully ";  ?>
                        </div>
                        <?php
                      }
                    ?>
                    <?php
                      if(isset($_GET['iserr'])){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "Record Not Added";  ?>
                        </div>
                        <?php
                      }
                    ?>
                    </div>
                    <div class="col-12">
                        <div class="forms">
                            <h4 class="text-primary">Add Subject</h4>
                             <form  method="post" autocomplete="off">
                                    <div class="col-12 ">
                                        <label><b>Course Name</b></label>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label><b>Semester</b></label>
                                            <select  id="semester" name='sem' class="form-control text-info" onchange="get_sub();">
                                                    <option>Select Semester</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" id="sub1" style="margin-left: 3px;">
                                        <div class="col-10">
                                            <label><b>Subject 1</b></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-info" name="txtsub1" >   
                                            </div>
                                        </div>
                                        <div id="plus1" class="col-2" style="margin-top: 27px;">
                                            <img src="../img/core-img/Button_plus.png" width="40px" height="52px">
                                        </div>
                                    </div>
                                    <div class="row" id="sub2" style="margin-left: 3px;">
                                        <div class="col-10">
                                            <label><b>Subject 2</b></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-info" name="txtsub2" >   
                                            </div>
                                        </div>
                                        <div id="plus2" class="col-2" style="margin-top: 27px;">
                                            <img src="../img/core-img/Button_plus.png" width="40px" height="52px">
                                        </div>
                                    </div>
                                    <div class="row" id="sub3" style="margin-left: 3px;">
                                        <div class="col-10">
                                            <label><b>Subject 3</b></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-info" name="txtsub3" >   
                                            </div>
                                        </div>
                                        <div id="plus3" class="col-2" style="margin-top: 27px;">
                                            <img src="../img/core-img/Button_plus.png" width="40px" height="52px">
                                        </div>
                                    </div>
                                    <div class="row" id="sub4" style="margin-left: 3px;">
                                        <div class="col-10">
                                            <label><b>Subject 4</b></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-info" name="txtsub4" >   
                                            </div>
                                        </div>
                                        <div id="plus4" class="col-2" style="margin-top: 27px;">
                                            <img src="../img/core-img/Button_plus.png" width="40px" height="52px">
                                        </div>
                                    </div>
                                    <div class="row" id="sub5" style="margin-left: 3px;">
                                        <div class="col-10">
                                            <label><b>Subject 5</b></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-info" name="txtsub5" >   
                                            </div>
                                        </div>
                                        <div id="plus5" class="col-2" style="margin-top: 27px;">
                                            <img src="../img/core-img/Button_plus.png" width="40px" height="52px">
                                        </div>
                                    </div>
                                    <div class="row" id="sub6" style="margin-left: 3px;">
                                        <div class="col-10">
                                            <label><b>Subject 6</b></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-info" name="txtsub6" >   
                                            </div>
                                        </div>
                                        <div id="plus6" class="col-2" style="margin-top: 27px;">
                                            <img src="../img/core-img/Button_plus.png" width="40px" height="52px">
                                        </div>
                                    </div>
                                    <div class="row" id="sub7" style="margin-left: 3px;">
                                        <div class="col-10">
                                            <label><b>Subject 7</b></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-info" name="txtsub7" >   
                                            </div>
                                        </div>
                                        <div id="plus7" class="col-2" style="margin-top: 27px;">
                                            <img src="../img/core-img/Button_plus.png" width="40px" height="52px">
                                        </div>
                                    </div>
                                    <div class="row" id="sub8" style="margin-left: 3px;">
                                        <div class="col-10">
                                            <label><b>Subject 8</b></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control text-info" name="txtsub8" >   
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary btn-block mt-3 font-weight-bold" name="btnadd" value="Add Subject">
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
        if(isset($_REQUEST['btnadd']))
        {
            $cou1=$_REQUEST['cou'];
            $sem1=$_REQUEST['sem'];
            
            $sub1=$_REQUEST['txtsub1'];
            $sub2=$_REQUEST['txtsub2'];
            $sub3=$_REQUEST['txtsub3'];
            $sub4=$_REQUEST['txtsub4'];
            $sub5=$_REQUEST['txtsub5'];
            $sub6=$_REQUEST['txtsub6'];
            $sub7=$_REQUEST['txtsub7'];
            $sub8=$_REQUEST['txtsub8'];
            if($sub1!=NULL)
            {
                $query="insert into subjectmst(Subjectname,Courseid,Semesterid) values('$sub1','$cou1','$sem1')";
                mysqli_query($cnn,$query);

                if($sub2!=NULL)
                {
                    $query="insert into subjectmst(Subjectname,Courseid,Semesterid) values('$sub2','$cou1','$sem1')";
                    mysqli_query($cnn,$query);

                    if($sub3!=NULL)
                    {
                        $query="insert into subjectmst(Subjectname,Courseid,Semesterid) values('$sub3','$cou1','$sem1')";
                        mysqli_query($cnn,$query);

                        if($sub4!=NULL)
                        {
                            $query="insert into subjectmst(Subjectname,Courseid,Semesterid) values('$sub4','$cou1','$sem1')";
                            mysqli_query($cnn,$query);

                            if($sub5!=NULL)
                            {
                                $query="insert into subjectmst(Subjectname,Courseid,Semesterid) values('$sub5','$cou1','$sem1')";
                                mysqli_query($cnn,$query);

                                if($sub6!=NULL)
                                {
                                    $query="insert into subjectmst(Subjectname,Courseid,Semesterid) values('$sub6','$cou1','$sem1')";
                                    mysqli_query($cnn,$query);

                                    if($sub7!=NULL)
                                    {
                                        $query="insert into subjectmst(Subjectname,Courseid,Semesterid) values('$sub7','$cou1','$sem1')";
                                        mysqli_query($cnn,$query);

                                        if($sub8!=NULL)
                                        {
                                            $query="insert into subjectmst(Subjectname,Courseid,Semesterid) values('$sub8','$cou1','$sem1')";
                                            mysqli_query($cnn,$query);
                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }
            
            if($sub1)
            {
                 echo "<script type=\"text/javascript\">
                    window.location = \"addsubject.php?err=true\"
                    </script>";
            }
            else
            {
                echo "<script type=\"text/javascript\">
                    window.location = \"addsubject.php?iserr=true\"
                    </script>"; 
            }

            
        }
?>
<?php
    require_once("../Layout/footer.php");
?>
