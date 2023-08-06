<?php
    require_once('session.php');
    include("connection.php"); 
    require_once("header.php");
?>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
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
        function rece_msg()
        {
          //alert("hiii");
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","noti.php?rmsg=1",false);
          xmlhttp.send(null);
          //alert(xmlhttp.responseText);
          document.getElementById('remsg').innerHTML=xmlhttp.responseText;
          window.location="receive_msg.php";
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
<?php
  $tid=$_SESSION['user_id'];
  $q="SELECT * from teachermst where Teacherid=$tid";
  $res=mysqli_query($cnn,$q);
  $ans=mysqli_fetch_array($res);
  $couid=$ans['Department'];
?>
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%;box-shadow: 5px 10px 8px #888888;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                          <h3 class="text-primary">Notification</h3>
                          <?php 
                                $id=$_SESSION['user_id']; 
                                $que4="SELECT * from noticemst where Courseid=$couid";
                                      $res1=mysqli_query($cnn,$que4);
                                      $cntnoti=0;
                                      while($ans4=mysqli_fetch_array($res1))
                                      {
                                         $nid=$ans4['Noticeid'];
                                            $query1="SELECT * from notification where Teacherid=$id and Noticeid=$nid and Status=0";
                                            
                                            $r=mysqli_query($cnn,$query1);
                                            $a=mysqli_fetch_array($r);
                                            $cntnoti+=mysqli_num_rows($r);
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
                                      $res1=mysqli_query($cnn,"SELECT * from leaveapplicationmst where Teacherid=$tid and Approvedstatus='0' ");
                                      $cnt=mysqli_num_rows($res1);
                                      if($cnt>0)
                                      {
                                  ?>
                          <div class="col-12">
                                <div class="div1" >
                                  <span><i class="fa fa-edit" style="font-size:60px;color:#4d0099;"></i></span>
                                  <span><a href="manageapplication.php" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Leave Application</span>
                                  
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
                                            echo $cnt;
                                             
                                        ?>
                                      </span>
                                      
                                  </a>
                                </div>    
                          </div>
                          <?php
                                      }
                                  ?>
                          <?php 
                                    $tid=$_SESSION['user_id'];
                                      $res1=mysqli_query($cnn,"SELECT * from teacherfriendmst where Status=0 and  ReceiverTeacher=$tid");   
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

                           <?php 
                                    $tid=$_SESSION['user_id'];
                                      $res1=mysqli_query($cnn,"SELECT * from studentfriendmst where Status=0 and  ReceiverTeacher=$tid");   
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
				<?php
                              $tid=$_SESSION['user_id'];
                              $query="SELECT * from messagemst where Senderid=$tid and Status=1 and notification=0";
                              $res=mysqli_query($cnn,$query);
                              $ans=mysqli_fetch_array($res);
                              $rid=$ans['Receiverid'];
                              $cntrmsg=mysqli_num_rows($res);
                              if($cntrmsg>0)
                              {
                          ?>
                          <div class="col-12">
                                <div class="div1" id="remsg">
                                  <span><img src="../img/core-img/msg1.jfif" id="message" style="width:60px; height: 60px;"></span>
                                  <span><a onclick="rece_msg();" 
                                     style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Message</span>
                                        <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 240px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #3d5c5c;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;"
                                        >
                                        <?php  
                                            echo $cntrmsg;
                                        ?>
                                      </span>
                                  </a>
                                </span>
                                </div>    
                                </div>
                          <?php       
                              }
                          ?>

                          <?php
                              $query="SELECT * from messagemst where Receiverid=$tid and Status=0";
                              $res=mysqli_query($cnn,$query);
                              $cnt=mysqli_num_rows($res);
                              if($cnt>0)
                              {
                          ?>
                          <div class="col-12">
                                <div class="div1" >
                                  <span><img src="../img/core-img/msg1.jfif" id="message" style="width:60px; height: 60px;"></span>
                                  <span><a href="receive_msg.php" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Message</span>
                                 
                                    <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 240px;
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

