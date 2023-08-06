<?php
    require_once("session.php");
    require_once("header.php");
?>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
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
                        <div class="forms">
                            <h4 class="text-primary">Add Class</h4>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label><b>Class</b></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="div[]" value="Div1">&nbsp;<b>Div1</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="div[]" value="Div2">&nbsp;<b>Div2</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="div[]" value="Div3">&nbsp;<b>Div3</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="div[]" value="Div4">&nbsp;<b>Div4</b>
                                        </div>
                                    </div>                                    
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary btn-block mt-3 font-weight-bold" name="btnadd" value="Add Class">
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
            $check=$_REQUEST['div'];
            foreach ($check as $chk) 
            {
                $query="INSERT into classmst(Classname,Courseid,Semesterid) values('$chk','$cou1','$sem1')";
                mysqli_query($cnn,$query);
                echo "<script type=\"text/javascript\">
                window.location = \"addclass.php\"
                </script>";
            }
            echo "<script type=\"text/javascript\">
            window.location = \"addclass.php\"
            </script>";

        }
?>
<?php
    require_once("../Layout/footer.php");
?>
