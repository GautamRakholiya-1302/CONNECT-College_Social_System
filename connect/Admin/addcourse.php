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
                        <div class="forms" >
                            <h4 class="text-primary">Add Course</h4>
                             <form  method="post" autocomplete="off">
                                    <div class="col-12 ">
                                        <label><b>Course Name</b></label>
                                        <div class="form-group">
                                            <input type="text" class="form-control text-info" name="txtcou" placeholder="Full name">   
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label><b>Semester</b></label>
                                            <select class="form-control text-info" name="txtsem">
                                                <option value="1">SEM-1</option>
                                                <option value="2">SEM-2</option>
                                                <option value="3">SEM-3</option>
                                                <option value="4">SEM-4</option>
                                                <option value="5">SEM-5</option>
                                                <option value="6">SEM-6</option>
                                                <option value="7">SEM-7</option>
                                                <option value="8">SEM-8</option>
                                                <option value="9">SEM-9</option>
                                                <option value="10">SEM-10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary btn-block mt-3 font-weight-bold" name="add" value="Add Course">
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
        $cou=$_REQUEST['txtcou'];
        $sem=$_REQUEST['txtsem'];

        $course="insert into coursemst(Coursename) values('$cou')";
        $cnt1=mysqli_query($cnn,$course);


        $w="select Courseid from coursemst where Coursename='$cou'";
        $res=mysqli_query($cnn,$w);
        $ans=mysqli_fetch_array($res);
        $id=$ans['Courseid'];

        for($i=1 ; $i<=$sem ; $i++)
        {
            $var="sem-".$i;
            $semester="insert into semestermst(Semestername,Courseid) values('$var',$id)";
            $cnt2=mysqli_query($cnn,$semester);
        }
            
    }
?>


<?php
    require_once("../Layout/footer.php");
?>
