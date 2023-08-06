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
               <div class="forms">
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
                            <h4 class="text-primary">Add Notice</h4>
                             <form  method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <input type="checkbox" name="course" value="">&nbsp;&nbsp;<b>All Course</b>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <input type="checkbox" name="semester" value="">&nbsp;&nbsp;<b>All Semester</b>
                                       </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <select name="txtcou" class="form-control text-info" id="course" onchange="get_sem();">
                                                <option>Select Course</option>
                                                <option value="ALL">ALL</option>
                                                <?php
                                                  $query="SELECT * from coursemst";
                                                  $res=mysqli_query($cnn,$query);
                                                  while($ans=mysqli_fetch_array($res))
                                                  {
                                                    
                                                      echo "<option value=".$ans['Courseid'].">".$ans['Coursename']."</option>";
                                                  
                                                  }
                                                ?>
                                        </select>

                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <select  id="semester" name='sem' class="form-control text-info" onchange='get_sub();'>
                                                <option>Select Course</option>
                                                <option value="ALL">ALL</option>

                                        </select>                                     
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-12">
                                        <label><b>Description</b></label>
                                        <div class="form-group">
                                            <textarea class="form-control text-info" rows="4" cols="75" placeholder="Write Description Here..." style="height: 70px;font-size: 14px;" name="txtdes" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label><b>Date</b></label>
                                            <input type="date" class="form-control text-info" name="txtdate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100" name="btnadd">Add</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                         </div>
                   </div>
        </div>
</section>
 <?php
        if(isset($_REQUEST['btnadd']))
        {
            if(isset($_REQUEST['course']))
            {
                $q="select * from coursemst";
                $res=mysqli_query($cnn,$q);
                while($ans=mysqli_fetch_array($res))
                {
                    $cid=$ans['Courseid'];
                    $q2="SELECT * from semestermst where Courseid=$cid";
                    $r=mysqli_query($cnn,$q2);
                    while($ans1=mysqli_fetch_array($r))
                    {
                        $sid=$ans1['Semesterid'];
                        $des   =    $_REQUEST['txtdes'];
                        $date  =    $_REQUEST['txtdate'];
                        $date=date('Y-m-d',strtotime($date));
                        $query="INSERT into noticemst(Description,Date,Courseid,Semesterid) values('$des','$date',$cid,$sid)";
                        $cnt1=mysqli_query($cnn,$query);

                        $que1="SELECT Noticeid from noticemst where Description='$des' ";
                        $r1=mysqli_query($cnn,$que1);
                        $a=mysqli_fetch_array($r1);
                        $nid=$a['Noticeid'];
                        $que2="SELECT Studentid from studentmst where Courseid=$cid and Semesterid=$sid";
                        $res1=mysqli_query($cnn,$que2);
                        while($ans1=mysqli_fetch_array($res1))
                        {
                            $stid=$ans1['Studentid'];
                            $que1="INSERT into notification(Studentid,Noticeid) values($stid,$nid)";
                            $cnt=mysqli_query($cnn,$que1);
                        }
                       
                    }
                     $que3="SELECT Teacherid from teachermst where Department=$cid";
                        $res2=mysqli_query($cnn,$que3);
                        while($ans3=mysqli_fetch_array($res2))
                        {
                            $tid=$ans3['Teacherid'];
                             $que1="INSERT into notification(Teacherid,Noticeid) values($tid,$nid)";
                            $cnt=mysqli_query($cnn,$que1);

                        }
                }
            }
            if(isset($_REQUEST['semester']))
            {
                    $cid=$_REQUEST['txtcou'];
                    $q2="SELECT * from semestermst where Courseid=$cid";
                    $r=mysqli_query($cnn,$q2);
                    while($ans1=mysqli_fetch_array($r))
                    {
                        $sid=$ans1['Semesterid'];
                        $des   =    $_REQUEST['txtdes'];
                        $date  =    $_REQUEST['txtdate'];
                        $date=date('Y-m-d',strtotime($date));
                        $query="INSERT into noticemst(Description,Date,Courseid,Semesterid) values('$des','$date',$cid,$sid)";
                        $cnt2=mysqli_query($cnn,$query);

                        $que1="SELECT Noticeid from noticemst where Description='$des' ";
                        $r1=mysqli_query($cnn,$que1);
                        $a=mysqli_fetch_array($r1);
                        $nid=$a['Noticeid'];
                        $que2="SELECT Studentid from studentmst where Courseid=$cid and Semesterid=$sid";
                        $res1=mysqli_query($cnn,$que2);
                        while($ans1=mysqli_fetch_array($res1))
                        {
                            $stid=$ans1['Studentid'];
                            $que1="INSERT into notification(Studentid,Noticeid) values($stid,$nid)";
                            $cnt=mysqli_query($cnn,$que1);
                        }
                        
                    }
                    $que3="SELECT Teacherid from teachermst where Department=$cid";
                        $res2=mysqli_query($cnn,$que3);
                        while($ans3=mysqli_fetch_array($res2))
                        {
                            $tid=$ans3['Teacherid'];
                             $que1="INSERT into notification(Teacherid,Noticeid) values($tid,$nid)";
                            $cnt=mysqli_query($cnn,$que1);

                        }
            }

            $des   =    $_REQUEST['txtdes'];
            $date  =    $_REQUEST['txtdate'];
            $cou   =    $_POST['txtcou'];
            $sem   =    $_POST['sem'];
            
            $date=date('Y-m-d',strtotime($date));
            $query="INSERT into noticemst(Description,Date,Courseid,Semesterid) values('$des','$date',$cou,$sem)";
            $cnt3=mysqli_query($cnn,$query);

            if($cnt3 >0)
             {
                 $que1="SELECT Noticeid from noticemst where Description='$des' ";
                 //echo $que1;
                        $r1=mysqli_query($cnn,$que1);
                        $a=mysqli_fetch_array($r1);
                        $nid=$a['Noticeid'];
                        //echo $nid;
                        $que2="SELECT Studentid from studentmst where Courseid=$cou and Semesterid=$sem";
                        $res1=mysqli_query($cnn,$que2);
                        while($ans1=mysqli_fetch_array($res1))
                        {
                            $stid=$ans1['Studentid'];
                            $que3="INSERT into notification(Studentid,Noticeid) values($stid,$nid)";
                             $cnt=mysqli_query($cnn,$que3);
                        }
                        $que3="SELECT Teacherid from teachermst where Department=$cou";
                        $res2=mysqli_query($cnn,$que3);
                        while($ans3=mysqli_fetch_array($res2))
                        {
                            $tid=$ans3['Teacherid'];
                             $que1="INSERT into notification(Teacherid,Noticeid) values($tid,$nid)";
                            $cnt=mysqli_query($cnn,$que1);

                        }
             }              
                           
            if($cnt1>0 || $cnt2>0 || $cnt3 >0)
            {
                 echo "<script type=\"text/javascript\">
                window.location = \"addnotice.php?err=true\"
                </script>";   
            }
            else
            {
               
                 echo "<script type=\"text/javascript\">
                    window.location = \"addnotice.php?iserr=true\"
                    </script>";
            }
         }
?>
<?php
    require_once("../Layout/footer.php");
?>
