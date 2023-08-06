<?php
    require_once('session.php');
    require_once('header.php'); 

  function time_stamp($session_time) 
{ 
 
$time_difference = time() - $session_time ; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 

if($seconds <= 60)
{
echo"$seconds seconds ago"; 
}
else if($minutes <=60)
{
   if($minutes==1)
   {
     echo"one minute ago"; 
   }
   else
   {
   echo"$minutes minutes ago"; 
   }
}
else if($hours <=24)
{
   if($hours==1)
   {
   echo"one hour ago";
   }
  else
  {
  echo"$hours hours ago";
  }
}
else if($days <=7)
{
  if($days==1)
   {
   echo"one day ago";
   }
  else
  {
  echo"$days days ago";
  }


  
}
else if($weeks <=4)
{
  if($weeks==1)
   {
   echo"one week ago";
   }
  else
  {
  echo"$weeks weeks ago";
  }
 }
else if($months <=12)
{
   if($months==1)
   {
   echo"one month ago";
   }
  else
  {
  echo"$months months ago";
  }
 
   
}

else
{
if($years==1)
   {
   echo"one year ago";
   }
  else
  {
  echo"$years years ago";
  }

}
 
} 



?>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        function like(pid)
        {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","like.php?postid=" + pid + "&vprofile=1",false);
          xmlhttp.send(null);
          //alert(xmlhttp.responseText);
          document.getElementById('yourpost').innerHTML=xmlhttp.responseText;
        }
     

     $(document).ready(function(){
           
            $("#update").hide();
            $("#linkupdate").click(function(){
              $("#update").show();
              $("#display").hide();
            });
        });
    </script>
    <style type="text/css">
     
     #img4
    {
      margin:10px 0px 0px 10px;
      width: 40px;
      height: 40px;
      border-radius: 90px;
    }
    #img5
    {
      width: 600px;
      height: 250px;
    }
    #img1
    {
      margin:40px 0px 0px 80px;
      width: 200px;
      height: 200px;
      border-radius: 90px;
      border:5px solid white;
    }
    #img2
    {
      margin:10px 0px 0px 20px;
      width: 80px;
      height: 80px;
      border-radius: 90px;
    }
    #camera
    {
      margin:0px 0px 0px 100px;
    }
    #div1
    {
      margin-top: 10px; 
      margin-left: 30px;
      margin-bottom: 25px;
      background-color: white;
      box-shadow: 5px 10px 8px #888888;
      width: 1100px;
      height: 300px;
    
    }
  
    #div2
    {
      margin-top: 0px; 
      margin-left: 40px;
      margin-bottom: 25px;
      background-color: white;
      box-shadow: 5px 10px 8px #888888;
      width: 300px;
      height: 250px;
      
    }
    #div4
    {
      margin-top: 0px; 
      margin-left: 40px;
      margin-bottom: 25px;
      background-color: white;
      box-shadow: 5px 10px 8px #888888;
      width: 300px;
      height: 250px;
      
    }
    #div3
    {
      margin-top: 10px;
      margin-bottom: 15px;
      background-color: white;
      box-shadow: 5px 10px 8px 5px #888888;
      width: 600px;
      height: 500px;
    }
     #imgmusic
        {
            width: 150px;
            height: 150px;
            border-radius: 80px;
            margin-left: 150px;
        }  
  
    </style>
    <section class="register-now section-padding-100 d-flex justify-content-between align-items-center" style="background-image: url(../img/core-img/texture.png);padding-left: 5%;
  padding-right: 5%;">
      <?php
                                                $id=$_SESSION['stud_id'];
                                                $query="select * from studentmst where Studentid=$id";
                                                $res=mysqli_query($cnn,$query);
                                                $ans=mysqli_fetch_array($res);
                                                
                                                        $img=$ans['Profile'];
                                                        $fname=$ans['Firstname'];
                                                        $mname=$ans['Middlename'];
                                                        $lname=$ans['Lastname'];
                                                        $uname=$ans['Username'];
                                                        $email=$ans['Email'];
                                                        $Gender=$ans['Gender'];
                                                        $dob=date('d-m-Y',strtotime($ans['Dob']));
                                                        $add=$ans['Address'];
                                                        $contact=$ans['Contact'];
                                                        
    ?>
  <div class="container-fluid">
      <div class="row" style="background-color: white;width: 100%;">
            <div class="col-12">
                <div id="div1">
                                <div style="height: 180px;background-image: url(../img/bg-img/profile.jpg);"><img src="../img/profile/student/<?php  echo $img; ?>" id="img1" /><h5><img src="../img/core-img/camera.png" width="50" height="50" data-target="#changeprofile" data-toggle="modal" id="camera"/>Change Profile</h5></div>
                                <div style="height: 80px;text-align: center;padding-top: 75px;padding-left: 800px;padding-right: 20px;"><button class="btn btn-primary w-100" id="linkupdate">Update Profile Details
                                </button></div>
             </div>
            </div>
      </div>
      <div class="row" style="background-color: white;width: 100%;" id="display">
                <div class="col-sm-4">
                      <div id="div2">
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>First Name</b><br><?php  echo $fname; ?></div>
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Middle name</b><br><?php  echo $mname; ?></div>
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Last Name</b><br><?php  echo $lname; ?></div>
                          
                      </div>
                </div>
                <div class="col-sm-4">
                      <div id="div2">
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>User Name</b><br><?php  echo $uname; ?></div>
                          
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Email</b><br><?php  echo $email; ?></div>
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Gender</b><br><?php  echo $Gender; ?></div>
                          
                      </div>
                </div>     
                <div class="col-sm-4">
                      <div id="div2">
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Date-Of-Birth</b><br><?php  echo $dob; ?></div>
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Address</b><br><?php  echo $add; ?></div>
                          
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Contact</b><br><?php  echo $contact; ?></div>
                          
                          
                      </div>
                </div>            
      </div>
      <!--update-->
      <div class="row" style="background-color: white;width: 100%;" id="update">
                <div class="col-sm-4">
                      <div id="div4">
                        <form method="post" action="update.php" autocomplete="off">
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b> First Name</b><br><input type="text"class="form-control text-info" name="txtfname" value="<?php  echo $fname; ?>"></div>
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Middle Name</b><br><input type="text"class="form-control text-info" name="txtmname" value="<?php  echo $mname; ?>"></div>
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Last Name</b><br><input type="text"class="form-control text-info" name="txtlname" value="<?php  echo $lname; ?>"></div>
                          
                      </div>
                </div>
                <div class="col-sm-4">
                      <div id="div4">
                              <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>User Name</b><br><input type="text"class="form-control text-info" name="txtuname" value="<?php  echo $uname; ?>"></div>
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Email</b><br><input type="text"class="form-control text-info" name="txtemail" value="<?php  echo $email; ?>"></div>
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Gender</b><br>
                                    <select name="gender" class="form-control text-info">
                                                <?php
                                                    if($Gender=="Male")
                                                    {
                                                        echo "<option selected>".$Gender."</option>";
                                                        echo "<option>Female</option>";
                                                    }
                                                    else
                                                    {
                                                        echo "<option selected>".$Gender."</option>";
                                                        echo "<option>Male</option>";

                                                    }
                                                ?>
                                    </select>
                                            
                          </div>
                          
                      </div>
                </div>     
                <div class="col-sm-4">
                      <div id="div4">
                           <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Date-Of-Birth</b><br><input type="text" class="form-control text-info" id="txtdob" name="txtdob" value="<?php  echo $dob; ?>"></div>
                            <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Address</b><br><input type="text" class="form-control text-info" id="txtadd" name="txtadd" value="<?php  echo $add; ?>"></div>
                         
                          <div style="height: 70px;text-align: center;padding-top: 15px;border-bottom: 1px solid;"><b>Contact</b><br><input type="text"class="form-control text-info" name="txtcon" value="<?php  echo $contact; ?>"></div>
                        
                    </div>
                </div> 
                    <div style="height: 50px;text-align: center;margin-top:0px;padding-top:0px;padding-left: 550px;padding-right: 20px;"><button class="btn btn-primary w-100" class="form-control" id="btnupdate">Update
                                </button></div>
                 </form>           
      </div>
     <?php

     ?>
      <!--update End-->
<div id="yourpost">
      <?php
                        $query="SELECT * from postmst where Studentid=$id  and Approvedstatus='Approved' order by Time desc";
                        $result=mysqli_query($cnn,$query);
                        while($ans=mysqli_fetch_array($result))
                        {
                          $postid=$ans['Postid'];
                          $sid=$ans['Studentid'];
                          $dbdes=$ans['Description'];
                          $dbphoto=$ans['Postimg'];
                          $dbaudio=$ans['Postaudio'];
                          $dbvideo=$ans['Postvideo'];
                          $dbtime=$ans['Time'];
                          $cntlike=$ans['Likes'];       
  ?>
  <div class="row" style="background-color: white;width: 100%;">
                <div class="col-sm-3">
                    <!-- <div id="div1">
                      
                    </div> -->
                </div>
                <div class="col-lg-9">
                      <div style="margin-top: 10px;margin-bottom: 0px;background-color: white;box-shadow: 5px 10px 8px #888888;width: 650px;height: 400px;">
                         
                              <div style="width: 650px;height: 55px;background-color:#b3b3ff;">
                                <img src="../img/profile/student/<?php  echo $img; ?>" id="img4" />&nbsp;&nbsp;&nbsp;<font color="#0000ff"><?php  echo $mname; ?></font>&nbsp;&nbsp;&nbsp;
                                <strong><i class="fa fa-clock-o"></i>&nbsp;<?php echo $dbtime = time_stamp($dbtime); ?></strong>
                              </div>
                               <div style="width: 650px;height: 30px;margin-left: 35px;margin-top: 5px;"><b><?php echo $dbdes; ?></b></div>
                              
                              <?php
                                  if($dbphoto!="")
                                  {
                              ?>
                                      <div style="width:600px;height:250px;margin-left:25px;margin-top:5px;box-shadow: 5px 10px 8px #888888;">
                                          <img src="../img/post/photo/<?php  echo $dbphoto; ?>" id="img5" />
                                      </div>
                              <?php 
                                  }
                              ?>
                               <?php
                                  if($dbaudio!=NULL)
                                  {
                              ?>
                                      <div style="width:600px;height:250px;margin-left:25px;margin-top:5px;box-shadow: 5px 10px 8px #888888;padding-left: 70px;">
                                        <img src="../img/core-img/music.jpg" id="imgmusic"><br><br>
                                                <audio controls style="width: 450px;">
                                                    <source src="../img/post/audio/<?php  echo $dbaudio; ?>" >
                                                </audio>
                                      </div>
                              <?php 
                                  }
                              ?>
                               <?php
                                  if($dbvideo!="")
                                  {
                              ?>
                                      <div style="width:600px;height:250px;margin-left:25px;margin-top:5px;box-shadow: 5px 10px 8px #888888;">
                                        
                                         <video id="img5" controls>
                                              <source src="../img/post/video/<?php  echo $dbvideo; ?>" >
                                             
                                            </video>
                                      </div>
                              <?php 
                                  }
                              ?>
                              <div style="width: 650px;height: 55px;margin-top: 15px;">
                                    <div class="row">
                                          <div class="col-sm-1" style="margin-left: 45px;">
                                           
                                          <?php
                                            $que="SELECT * from likemst where Studentid=$id and Postid=$postid ";
                                            //echo $que;
                                            $result1=mysqli_query($cnn,$que);
                                            $cnt=mysqli_num_rows($result1);
                                            //echo $cnt;
                                            if($cnt == 1)
                                            {
                                          ?>
                                          <span><i class="fa fa-thumbs-up fa-6" aria-hidden="true" style="font-size: 30px;color: blue;"></i></span>
                                          <?php 
                                            }
                                            else
                                            {
                                          ?>
                                          <span><i class="fa fa-thumbs-o-up" aria-hidden="true"  onclick="like(<?php echo $postid; ?>);" style="font-size: 30px;color: blue;"></i></span>
                                         <?php 
                                            }
                                          ?>
                                        </div>
                                        <div class="col-sm-1" style="margin-top: 5px;margin-right: 10px;"><b><?php echo $cntlike; ?>&nbsp;&nbsp;Likes</b>
                                        </div>
                                       
                                    </div>
                              </div>
                      </div>
                </div>
      </div>
               <?php
                }
          ?>
</div>
  </div>
      
     </section>
   
<!--Modal start-->
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                
                <div class="modal fade" id="changeprofile" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Change Profile</h4>
                        <button class="close pull-right" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                         <form method="post" enctype="multipart/form-data">
                                  <div class="row">
                                        <div class="col-sm-12"><i class='fa fa-image' style="color: blue;"></i>&nbsp;Photo</div>
                                  </div>
                                  <div class="row">
                                        <div class="col-sm-12"><input type="file" name="img"></div>
                                  </div><br><br>
                                 
                      </div>
                      <div class="modal-footer">
                                <div class="row">
                                        <div class="col-sm-12"><button class="btn btn-primary" name="btnchange">Change</button></div>
                                  </div>
                                </form>
                        <button class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!--Modal end -->
      <?php
          if(isset($_REQUEST['btnchange']))
          {
            $id=$_SESSION['stud_id'];
            //echo $id;
            $tempname=$_FILES['img']['tmp_name'];
            $type=$_FILES['img']['type'];
            //echo $type;
            $ext=explode("/",$type);
            //print_r($ext);
            $img=$id.".".$ext[1];
            //echo $img;
            $query="UPDATE studentmst set Profile='$img' where Studentid=$id";
            $cnt=mysqli_query($cnn,$query);
                
             if($cnt>0)
            {
              move_uploaded_file($_FILES['img']['tmp_name'],'../img/profile/student/'.$img);
              echo "<script type=\"text/javascript\">
            window.location = \"studentprofile.php\"
            </script>";
            }
            else
            {
                  ?><script type="text/javascript">
                         tostr.info('Your Story Not added....');
                  </script>
                  <?php
            }
            
          }
     ?>
    <!-- ##### Regular Page Area End ##### -->

  <?php
    require_once("../Layout/footer.php");
?>