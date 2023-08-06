<?php
    require_once("session.php");
    require_once("header.php");
?>
<script type="text/javascript">
   
    function get_sem1()
    {
        var xmlhttp = new XMLHttpRequest();
        var courseid = document.getElementById('course').value;
        xmlhttp.open("GET","dropdown1.php?cid=" + courseid,false);
        xmlhttp.send(null);
        document.getElementById('semester1').innerHTML=xmlhttp.responseText;
    }
    function get_sem2()
    {
        var xmlhttp = new XMLHttpRequest();
        var courseid = document.getElementById('course').value;
        xmlhttp.open("GET","dropdown1.php?cid1=" + courseid,false);
        xmlhttp.send(null);
        document.getElementById('semester2').innerHTML=xmlhttp.responseText;
    }
</script>

<?php
    if(isset($_REQUEST['transfer']))
    {
    	$cou=$_REQUEST['txtcou'];

        $to=$_REQUEST['txtto'];

 
        $from=$_REQUEST['txtfrom'];
        $q1="SELECT * FROM studentmst where Courseid=$cou and Semesterid=$to";
        $res1=mysqli_query($cnn,$q1);
        while($ans1=mysqli_fetch_array($res1))
        {
            $sid=$ans1['Studentid'];
            $cid=$ans1['Classid'];
            $r1=mysqli_query($cnn,"SELECT Classname from classmst where Classid=$cid and Semesterid=$to and Courseid=$cou");
            $a=mysqli_fetch_array($r1);
            $cname=$a['Classname'];
            echo $cname;

            $r1=mysqli_query($cnn,"SELECT Classid from classmst where Classname='$cname' and Semesterid=$from and Courseid=$cou");
            $a=mysqli_fetch_array($r1);
            $ncid=$a['Classid'];
            echo $ncid;

            $query="UPDATE studentmst set Semesterid=$from,Classid=$ncid where Studentid=$sid and  Courseid=$cou and Semesterid=$to";
            $cnt=mysqli_query($cnn,$query);
        }
 
         if($cnt > 0)
        {
            echo "<script type=\"text/javascript\">
            window.location = \"transferstudent.php?err2=true\"
            </script>";
        }
        else
        {
            echo "<script type=\"text/javascript\">
            window.location = \"transferstudent.php?iserr2=true\"
            </script>"; 
        }
    }
?>

<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%;">
            <div class="container-fluid">
        
                <div class="row" id="div3">
                    <div class="col-12">
                        <div class="col-12">
                             <?php
                                if(isset($_GET['err2'])){
                                ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo "Record transfer successfully";  ?>
                                    </div>
                                <?php
                                    }
                                ?>
                            <?php
                              if(isset($_GET['iserr2'])){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo "Record not transfer";  ?>
                                </div>
                                <?php
                              }
                            ?>
                            </div>
                        <div class="forms">
                            <h4 class="text-primary">Transfer Data</h4>
                            <form method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label><b>Course</b></label>
                                        <select name="txtcou" class="form-control text-info" id="course" onchange="get_sem1(); onchange=get_sem2();">
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
                                            <label><b>To</b></label>
                                            <select  id="semester1" name='txtto' class="form-control text-info">
                                                    <option>Select Semester</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label><b>From</b></label>
                                            <select  id="semester2" name='txtfrom' class="form-control text-info">
                                                    <option>Select Semester</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100" name="transfer">Transfer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>

        </div>
    </div>
</section>

<?php
	require_once("../Layout/footer.php");
?>