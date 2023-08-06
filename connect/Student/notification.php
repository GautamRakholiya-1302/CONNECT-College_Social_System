<?php
   	require_once('session.php');
  	include("connection.php"); 
  	require_once("header.php");
   
?>
 <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
       function assi()
        {
          //alert("hiii");
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","noti.php?assig=1",false);
          xmlhttp.send(null);
          //alert(xmlhttp.responseText);
          document.getElementById('assignment').innerHTML=xmlhttp.responseText;
          window.location="assignment.php";
        }
         function mati()
        {
          //alert("hiii");
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","noti.php?mati=1",false);
          xmlhttp.send(null);
          //alert(xmlhttp.responseText);
          document.getElementById('material').innerHTML=xmlhttp.responseText;
          window.location="material.php";
        }
         function noti()
        {
          //alert("hiii");
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","noti.php?noti=1",false);
          xmlhttp.send(null);
          //alert(xmlhttp.responseText);
          document.getElementById('notice').innerHTML=xmlhttp.responseText;
          window.location="notice.php";
        }
        function leaveapp()
        {
          //alert("hiii");
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","noti.php?leaveapp=1",false);
          xmlhttp.send(null);
          //alert(xmlhttp.responseText);
          document.getElementById('leaveapp').innerHTML=xmlhttp.responseText;
          window.location="leaveapprove.php";
        }
    </script>
   
<style type="text/css">
  .div1
  {
      background-color: white;
      box-shadow: 3px 5px 3px 3px #888888;
      width: 500px;
      height: 60px;
      margin-bottom: 15px;
  }
  </style>
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%;box-shadow: 5px 10px 8px #888888;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                          <h3 class="text-primary">Notification</h3>
                         
                                 <?php 
                                     
                                  
                                        $q3="SELECT * from assignmentmst where Courseid=$cou2 and Semesterid=$sem2 and Classid=$class";
                                        $id=$_SESSION['stud_id'];
                                        $res1=mysqli_query($cnn,$q3);
                                        $cntass1=0;

                                        while($ans=mysqli_fetch_array($res1))
                                        {
                                            $aid=$ans['Assignmentid'];
                                            $query1="SELECT * from notification where Studentid=$id and Assignmentid=$aid";
  
                                            $r=mysqli_query($cnn,$query1);
                                            $a=mysqli_fetch_array($r);
                                            if($a['Status']==0)
                                            {
                                                $cntass1++;
                                           
                                            }
                                        }
                                    ?>
                                    <?php
                                      if($cntass1>0)
                                      {
                                  ?>
                                <div class="col-12">
                                <div class="div1" id="assignment">
                                  <span><i class="fa fa-file-pdf-o" style="font-size:60px;color:red;"></i></span>
                                 
                                  <span><a  onclick="assi();" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Assignment</span>
                                  
                                        <span id="cnt1" style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 210px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background:red;
                                                  color: white;
                                                  text-align: center;
                                          ">
                                          <?php  
                                            echo $cntass1; 
                                          ?>
                                      </span>
                                     
                                  </a>
                             </div>    
                          </div>
                          <?php
                            }
                          ?>
                          <?php 
                                      $q1="SELECT * from materialmst where Courseid=$cou2 and Semesterid=$sem2";
                                      $res1=mysqli_query($cnn,$q1);
                                      $cntmat1=0;
                                       while($ans=mysqli_fetch_array($res1))
                                        {
                                            $mid=$ans['Id'];
                                            $query1="SELECT * from notification where Studentid=$id and Materialid=$mid";
                                            $r=mysqli_query($cnn,$query1);
                                            $a=mysqli_fetch_array($r);
                                            if($a['Status']==0)
                                            {
                                                $cntmat1++;
                                           
                                          }
                                        }
                                  ?>
                                  <?php
                                      if($cntmat1>0)
                                      {
                                  ?>
                          <div class="col-12">
                                <div class="div1" id="material">
                                 <span><i class="fa fa-file-text" style="font-size:60px;color:#3498db;"></i></span>
                                    <span><a onclick="mati();" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Material</span>
                                     <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 260px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #3498db;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;"
                                        >
                                        <?php  
                                            echo $cntmat1;  
                                             
                                        ?>
                                      </span>
                                     
                                  </a>
                                </div>    
                          </div>
                          <?php
                                       }
                          ?>
                           <?php 
                                      $que4="SELECT * from noticemst where Courseid=$cou2 and Semesterid=$sem2";
                                      $res1=mysqli_query($cnn,$que4);
                                      $cntnoti=0;
                                      while($ans4=mysqli_fetch_array($res1))
                                      {
                                         $nid=$ans4['Noticeid'];
                                            $query1="SELECT * from notification where Studentid=$id and Noticeid=$nid";
                                            
                                            $r=mysqli_query($cnn,$query1);
                                            $a=mysqli_fetch_array($r);
                                            if($a['Status'] == 0)
                                            {
                                              $cntnoti++;
                                          }
                                      }
                                      if($cntnoti>0)
                                      {
                                  ?>
                           <div class="col-12">
                                <div class="div1" id="notice">
                                  <span><i class="fa fa-bullhorn" style="font-size:60px;color:#e65c00;"></i></span>
                                  <span><a onclick="noti();" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Notice</span>
                                 
                                        <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 270px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #e65c00;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;">
                                        <?php  
                                          echo $cntnoti;
                                          
                                        ?>
                                      </span>
                                     
                                  </a>
                                </div>    
                          </div>
                           <?php
                                      }
                                  ?>
                          <?php 
                                    $sid=$_SESSION['stud_id'];
                                      $res1=mysqli_query($cnn,"SELECT * from leaveapplicationmst where Status=0 and Studentid=$sid and Approvedstatus!='0' ");
                                      $cntlapp=mysqli_num_rows($res1);
                                      if($cntlapp>0)
                                      {
                                  ?>
                          <div class="col-12">
                                <div class="div1" id="leaveapp">
                                  <span><i class="fa fa-edit" style="font-size:60px;color:#4d0099;"></i></span>
                                  <span><a onclick="leaveapp();" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Leave Application</span>

                                        <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 135px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #4d0099;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;"
                                        >
                                        <?php  
                                            echo $cntlapp;
                                            
                                        ?>
                                      </span>
                                     
                                  </a>
                                </div>    
                          </div>
                           <?php
                                      }
                                  ?>
                          <?php 
                                    $sid=$_SESSION['stud_id'];
                                      $res1=mysqli_query($cnn,"SELECT * from studentfriendmst where Status=0 and  Receiverstudent=$sid");   
                                      $cnt=mysqli_num_rows($res1);
                                      if($cnt>0)
                                      {
                                  ?>
                          <div class="col-12">
                                <div class="div1">
                                  <span><i class="fa fa-user" style="font-size:60px;color:#3d5c5c;"></i></span>
                                  <span><a href="friendrequest.php" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Friend Request</span>
                                  
                                        <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 180px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #3d5c5c;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;"
                                        >
                                        <?php  
                                            echo $cnt;
                                        ?>
                                      </span>
                                    
                                  </a>
                                </span>
                                </div>    
                          </div>
                            <?php
                                      }
                                  ?>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php
    require_once("../Layout/footer.php");
?>
