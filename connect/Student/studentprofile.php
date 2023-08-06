<?php
    require_once('session.php');
    require_once("header.php");
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
  function time_stamp1($session_time) 
{ 
 
$time_difference = time() - $session_time ; 
$hours = round($time_difference / 3600 ); 
    return $hours;
} 
?> 


 <?php
    $id=$_SESSION['stud_id'];
    $q1="SELECT * from storymst where Studentid=$id ";
    $res=mysqli_query($cnn,$q1);
    $ans=mysqli_fetch_array($res);
    $storyid=$ans['Storyid'];
    $time=$ans['Time'];
    $t1=time_stamp1($time);
    if($t1 >=24)
    {
      $q2="DELETE from storymst where Storyid=$storyid";
      $c=mysqli_query($cnn,$q2);
    }
?>


    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
       function like(pid)
        {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("GET","like.php?postid=" + pid + "&uprofile=1",false);
          xmlhttp.send(null);
          //alert(xmlhttp.responseText);
          document.getElementById('display').innerHTML=xmlhttp.responseText;
        }
    </script>
    <script>
        $(document).ready(function(){
            $("#txt").hide();
            $("#audio").hide();
            $("#video").hide();
            $("#photo").hide();
            $("#audio1").hide();
            $("#video1").hide();
            $("#photo1").hide();
            $("#btnpost").hide();

            $("#btnaudio").click(function(){
                    $("#txt").show();
                    $("#audio").show();
                    $("#audio1").show();
                    $("#btnpost").show();
                    $("#video").hide();
                    $("#photo").hide();
                    $("#video1").hide();
                    $("#photo1").hide();
            });
            $("#btnvideo").click(function(){
                    $("#txt").show();
                    $("#video").show();
                    $("#video1").show();
                    $("#btnpost").show();
                    $("#audio").hide();
                    $("#photo").hide();
                    $("#audio1").hide();
                    $("#photo1").hide();
            });
            $("#btnphoto").click(function(){
                     $("#txt").show();
                    $("#photo").show();
                    $("#photo1").show();
                    $("#btnpost").show();
                    $("#audio").hide();
                    $("#video").hide();
                    $("#audio1").hide();
                    $("#video1").hide();
            });
            $("#btnlike2").hide();
            $("#btnlike1").click(function(){
                $("#btnlike2").show();
                 $("#btnlike1").hide();
            });
            $("#img3").click(function(){
                    var src=$(this).attr('src');
                    $("#storydisplay1").attr('src',src);
            });
            $("#imgs1").click(function(){
                var src=$(this).attr('src');
                alert(src);
                $("#storydisplay2").attr('src',src);
            });
            $("#imgs2").click(function(){
                var src=$(this).attr('src');
                alert(src);
                $("#storydisplay2").attr('src',src);
            });
            $("#imgs3").click(function(){
                //alert("hiiiiii");
                var src=$(this).attr('src');
                //alert(src);
                $("#storydisplay2").attr('src',src);
            });
            $("#close1").click(function(){
                $("#storydisplay2").removeAttr('src');
                alert("removed  ......");
            });
        });
    </script>
    

    <style type="text/css">
    
    #img1
    {
      margin:20px 0px 0px 30px;
      width: 150px;
      height: 150px;
      border-radius: 90px;
    }
    
    #img3
    {
      margin:30px 0px 0px 25px;
      width: 120px;
      height: 120px;
      border-radius: 90px;
    }
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
    #div1
    {
      margin-top: 20px; 
      margin-left: 30px;
      margin-bottom: 25px;
      background-color: white;
      box-shadow: 5px 10px 8px #888888;
      width: 200px;
      height: 300px;
    }
    #div2
    {
      margin-top: 20px;
      margin-bottom: 0px;
      background-color: white;
      box-shadow: 5px 10px 8px #888888;
      width: 670px;
      height: 300px;
    }
    #div3
    {
      margin-top: 20px;
       margin-left: 100px;
       margin-bottom: 25px;
       background-color: white;
       box-shadow: 5px 10px 8px #888888;
       width: 170px;
       height: 300px;
       border-top: 6px solid #0066ff;
    }
    
   #imgmusic
        {
            width: 150px;
            height: 150px;
            border-radius: 80px;
            margin-left: 150px;
        }  x
    </style>
    <section class="register-now section-padding-100 d-flex justify-content-between align-items-center" style="background-image: url(../img/core-img/texture.png); padding-left: 5%;
  padding-right: 5%;">
    <div class="container-fluid" >
  <?php
      $id=$_SESSION['stud_id'];
      $que="SELECT * from warningmst where Studentid=$id and Status=0";
      $res=mysqli_query($cnn,$que);
      $cnt=mysqli_num_rows($res);
      if($cnt >0)
      {
             $ans=mysqli_fetch_array($res);
             $text=$ans['Text'];
             $time=$ans['Time'];
             ?>
              <form method="post" action="">
                <div class="row" style="background-color: white;">
                  
                    <div class="col-10 alert alert-warning" style="box-shadow: 5px 10px 5px #888888;margin-top: 10px;margin-left: 50px;">
                        <span style="width: 200px;"><img src="../img/core-img/warning.png" width="30px" height="30px">&nbsp;&nbsp;&nbsp;<?php  echo $text ?></span>
                        <span style="margin-left: 50px;"><?php echo time_stamp($time); ?> </span>
                        <span style="margin-left: 400px;"><button class="btn btn-danger" name="btnaccept">I Accept</button></span>
                    </div>
                </div>
                </form>
             <?php
             
      }
     
?> 
<?php
   if(isset($_REQUEST['btnaccept']))
             {
                    $que2="UPDATE warningmst set Status=1 where Studentid=$id";
                    mysqli_query($cnn,$que2);
                    echo "<script type=\"text/javascript\">
                    window.location = \"studentprofile.php\"
                    </script>";
             }
?>
              <?php
                        $id=$_SESSION['stud_id'];
                        $query="select * from studentmst where Studentid=$id";
                        $res=mysqli_query($cnn,$query);
                        $ans=mysqli_fetch_array($res);
                        
                                $img=$ans['Profile'];
                                $name=$ans['Middlename'];
                                $uname=$ans['Username'];
                              
                                        
              ?>
  
      <div class="row" style="background-color: white;">
            <div class="col-sm-3">
                <div id="div1">
                                <div style="background-color:#0066ff;height: 180px;"><img src="../img/profile/student/<?php  echo $img; ?>" id="img1" /></div>
                                <div style="height: 80px; border-bottom: 1px solid #BFBFBF;text-align: center;padding-top: 5px;"><h4><?php  echo $name; ?></h4></div>
                                <div style=" border-bottom: 1px solid #BFBFBF;height: 40px;text-align: center;padding-top: 5px;"><a href="viewprofile.php"><font color="red">View Profile</font></a></div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div id="div2">
                    <div style="background-color:#b3ccff;height: 60px;border-bottom: 1px solid #BFBFBF;color:#0000ff;text-align: center;" ><br><h5 class="text-primary">Upload your post</h5>
                    </div>
                    <div>
                          <div class="row" style="margin-right: 5px;margin-left:5px;margin-top: 8px;height: 50px;">
                              <div class="col-sm-4">
                                    <button type="button" id="btnaudio" class="btn btn-primary w-100"><i class="fa fa-music"></i>&nbsp;&nbsp;Audio</button>
                              </div>
                              <div class="col-sm-4">
                                    <button type="button" id="btnvideo" class="btn btn-primary w-100"><i class="fa fa-video-camera"></i>&nbsp;Video</button>
                              </div>
                              <div class="col-sm-4">
                                    <button type="button" id="btnphoto" class="btn btn-primary w-100"><i class="fa fa-image"></i>&nbsp;image</button>
                              </div>
                          </div>
                    </div>
                    <div style="margin-left: 10px;margin-top: 5px;">
                        <form action="post.php" method="post" enctype="multipart/form-data">
                          <textarea class="form-control text-info" style="height: 60px;width: 600px;" cols="65" rows="3" name="txtdes" placeholder="Write Text Here ..." id="txt"></textarea>
                    </div>
                    <div style="height:70px;text-align: center;padding-top: 5px;">
                      
                          <div class="row" style="margin-left: 200px;">
                            
                            <div class="col-sm-4" id="audio"><i class="fa fa-music text-primary"></i>&nbsp;Audio</div>
                             <div class="col-sm-4" id="video"><i class="fa fa-video-camera text-primary"></i>&nbsp;Video</div>
                              <div class="col-sm-4" id="photo"><i class="fa fa-image text-primary"></i>&nbsp;Photo</div>
                          </div>
                          <div class="row" style="margin-left: 230px;">
                              <div class="col-sm-4" id="audio1"><input type="file" name="audio"></div>
                              <div class="col-sm-4" id="video1"><input type="file" name="video"></div>
                              <div class="col-sm-4" id="photo1"><input type="file" name="photo"></div>
                          </div>
                          <div class="row" style="margin-top: 10px;">
                            <div class="col-sm-12" id="btnpost"><button class="btn btn-primary w-50"><b>UPLOAD</b></button></div>
                          </div>
                      </form>
                  </div>
                </div>
            </div>
           <!--  <div class="col-sm-1"></div>
            <div class="col-sm-1"></div>
             -->
            <div class="col-sm-3">
                    <?php
                        
                          $query="SELECT * from storymst where Studentid=$id order by Time desc limit 1";
                          $res=mysqli_query($cnn,$query);
                          $ans=mysqli_fetch_array($res);
                          $img1=$ans['Photo'];
                          $time=$ans['Time'];
                         
                        
                    ?>
                     <div id="div3">
                                  <?php 
                                      if(isset($img1))
                                      {
                                  ?>
                                    <div style="height: 180px;"><img src=""><img src="../img/story/<?php  echo $img1; ?>" id="img3" data-target="#displaystory" data-toggle="modal"/></div>
                                    <?php
                                      }
                                      else
                                      {
                                    ?> 
                                     <div style="height: 180px;"><img src=""><img src="../img/profile/student/<?php  echo $img; ?>" id="img3" data-target="#displaystory" data-toggle="modal"/></div>
                                    <?php
                                        }
                                    ?>
                                    <div style="height: 65px; border-bottom: 1px solid #0066ff;text-align: center;padding-top: 5px;border-top: 4px solid #0066ff;"><h5>Your Story</h5></div>
                                    <div style="border-bottom: 1px solid #0066ff;height: 50px;text-align: center;padding-top: 5px;"><button class="btn btn-primary " data-target="#addstory" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Story</button></div>
                              </div>
              </div>
            </div>
            <div class="row" style="background-color: white;">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                    <?php
                  if(isset($_REQUEST['msg'])){
                    ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo $_SESSION['message'];  ?>
                    </div>
                    <?php
                  }
                ?>
              </div>
            </div>    
          
  <div id="display">
    <?php
        $query1="SELECT Receiverstudent from studentfriendmst where  Sender=$id and Status=1";
        $res1=mysqli_query($cnn,$query1);
        $ans1=mysqli_fetch_array($res1);
        $rid=$ans1['Receiverstudent'];
        //echo $rid;   
                  if(isset($ans1['Receiverstudent']))
                  {
                        $query="SELECT * from postmst  where Studentid=$rid and Approvedstatus='Approved' order by Time desc limit 1";
                        $result=mysqli_query($cnn,$query);
                        while($ans=mysqli_fetch_array($result))
                        {
                          $postid=$ans['Postid'];
                          $sid=$ans['Studentid'];
                          // $tid=$ans['Teacherid'];
                          $dbdes=$ans['Description'];
                          $dbphoto=$ans['Postimg'];
                          $dbaudio=$ans['Postaudio'];
                          $dbvideo=$ans['Postvideo'];
                          $cntlike=$ans['Likes'];
                          $dbtime=$ans[7];
                          $q="select * from studentmst where Studentid=$sid";
                          $res=mysqli_query($cnn,$q);
                          $ans=mysqli_fetch_array($res);
                          $dbname=$ans['Middlename'];
                          $dbimg=$ans['Profile'];
                          


                    ?>

          <div class="row" style="background-color: white;">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-lg-9">
                      <div style="margin-top: 10px;margin-bottom: 0px;background-color: white;box-shadow: 5px 10px 8px #888888;width: 650px;height: 400px;">
                         
                              <div style="width: 650px;height: 55px;background-color:#b3b3ff;">
                                <img src="../img/profile/student/<?php  echo $dbimg; ?>" id="img4" />&nbsp;&nbsp;&nbsp;<font color="#0000ff"><?php  echo $dbname; ?></font>&nbsp;&nbsp;&nbsp;
                                <strong><?php echo $dbtime = time_stamp($dbtime); ?></strong>
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
                                         <!--  <video src="../img/post/video/<?php  echo $dbvideo; ?>" id="img5"></video> -->
                                         <video id="img5" controls>
                                              <source src="../img/post/video/<?php  echo $dbvideo; ?>" >
                                              <!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
                                                Your browser does not support HTML5 video.
                                            </video>
                                      </div>
                              <?php 
                                  }
                              ?>
                              <div style="width: 650px;height: 55px;margin-top: 20px;">
                                    <div class="row">
                                          <div class="col-sm-2" style="margin-left: 45px;">
                                           
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
          }
    ?>
    <?php
        $query2="SELECT Sender from studentfriendmst where Receiverstudent=$id and Status=1";
        $res2=mysqli_query($cnn,$query2);
        $ans2=mysqli_fetch_array($res2);
        $sid=$ans2['Sender'];
        //echo $sid;
          if(isset($ans2['Sender']))
          {
            $query="SELECT * from postmst  where Studentid=$sid and Approvedstatus='Approved' order by Time desc limit 1";
                        $result=mysqli_query($cnn,$query);
                        while($ans=mysqli_fetch_array($result))
                        {
                          $postid=$ans['Postid'];
                          $spid=$ans['Studentid'];
                          // $tid=$ans['Teacherid'];
                          $dbdes=$ans['Description'];
                          $dbphoto=$ans['Postimg'];
                          $dbaudio=$ans['Postaudio'];
                          $dbvideo=$ans['Postvideo'];
                          $dbtime=$ans['Time'];
                          $cntlike=$ans['Likes'];
                          $q="select * from studentmst where Studentid=$spid";
                          $res=mysqli_query($cnn,$q);
                          $ans=mysqli_fetch_array($res);
                          $dbname=$ans['Middlename'];
                          $dbimg=$ans['Profile'];
                          


                    ?>
          

          <div class="row" style="background-color: white;">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-lg-9">
                      <div style="margin-top: 10px;margin-bottom: 0px;background-color: white;box-shadow: 5px 10px 8px #888888;width: 650px;height: 400px;">
                         
                              <div style="width: 650px;height: 55px;background-color:#b3b3ff;">
                                <img src="../img/profile/student/<?php  echo $dbimg; ?>" id="img4" />&nbsp;&nbsp;&nbsp;<font color="#0000ff"><?php  echo $dbname; ?></font>&nbsp;&nbsp;&nbsp;
                                <strong><?php echo $dbtime = time_stamp($dbtime); ?></strong>
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
                                         <!--  <video src="../img/post/video/<?php  echo $dbvideo; ?>" id="img5"></video> -->
                                         <video id="img5" controls>
                                              <source src="../img/post/video/<?php  echo $dbvideo; ?>" >
                                              <!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
                                                Your browser does not support HTML5 video.
                                            </video>
                                      </div>
                              <?php 
                                  }
                              ?>
                              <div style="width: 650px;height: 55px;margin-top: 20px;">
                                    <div class="row">
                                              <div class="col-sm-2" style="margin-left: 45px;">
                                           
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
          }
    ?>
    <?php
        $query3="SELECT Receiverteacher from studentfriendmst where Sender=$id and Status=1";
        $res3=mysqli_query($cnn,$query3);
        $ans3=mysqli_fetch_array($res3);
        $rid=$ans3['Receiverteacher'];
        //echo $rid;
          if(isset($ans3['Receiverteacher']))
          {
              $query="SELECT * from postmst  where Teacherid=$rid and Approvedstatus='Approved' order by Time desc limit 1";
                        $result=mysqli_query($cnn,$query);
                        while($ans=mysqli_fetch_array($result))
                        {
                          $postid=$ans['Postid'];
                          // $sid=$ans['Studentid'];
                           $tid=$ans['Teacherid'];
                          $dbdes=$ans['Description'];
                          $dbphoto=$ans['Postimg'];
                          $dbaudio=$ans['Postaudio'];
                          $dbvideo=$ans['Postvideo'];
                          $dbtime=$ans[7];
                          $cntlike=$ans['Likes'];
                          $q="select * from teachermst where Teacherid=$tid";
                          $res=mysqli_query($cnn,$q);
                          $ans=mysqli_fetch_array($res);
                          $dbname=$ans['Name'];
                          $dbimg=$ans['Profile'];
                          


                    ?>
          

          <div class="row" style="background-color: white;">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-lg-9">
                      <div style="margin-top: 10px;margin-bottom: 0px;background-color: white;box-shadow: 5px 10px 8px #888888;width: 650px;height: 400px;">
                         
                              <div style="width: 650px;height: 55px;background-color:#b3b3ff;">
                                <img src="../img/profile/faculty/<?php  echo $dbimg; ?>" id="img4" />&nbsp;&nbsp;&nbsp;<font color="#0000ff"><?php  echo $dbname; ?></font>&nbsp;&nbsp;&nbsp;
                                <strong><?php echo $dbtime = time_stamp($dbtime); ?></strong>
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
                                         <!--  <video src="../img/post/video/<?php  echo $dbvideo; ?>" id="img5"></video> -->
                                         <video id="img5" controls>
                                              <source src="../img/post/video/<?php  echo $dbvideo; ?>" >
                                              <!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
                                                Your browser does not support HTML5 video.
                                            </video>
                                      </div>
                              <?php 
                                  }
                              ?>
                              <div style="width: 650px;height: 55px;margin-top: 20px;">
                                    <div class="row">
                                                <div class="col-sm-2" style="margin-left: 45px;">
                                           
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
          }
    ?>
   </div>       
      <div>
      
     </section>
  
<!--Modal start-->
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                
                <div class="modal fade" id="addstory" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Add Story</h4>
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
                                        <div class="col-sm-12"><button class="btn btn-primary" name="btnadd">ADD</button></div>
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
          if(isset($_REQUEST['btnadd']))
          {
            $tempname=$_FILES['img']['tmp_name'];
            // $type=$_FILES['img']['type'];
            // $ext=explode("/",$type);
            $img=$id.$_FILES['img']['name'];
            $time=time();
            $query="insert into storymst(Studentid,Photo,Time) values($id,'$img','$time')";
            $cnt=mysqli_query($cnn,$query);
                
             if($cnt>0)
            {
              move_uploaded_file($_FILES['img']['tmp_name'],'../img/story/'.$img);
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
  <!--Modal start-->
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                
                <div class="modal fade" id="displaystory" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title text-primary">Your Story</h4>
                        <button class="close pull-right" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                         <img src="" id="storydisplay1" width="500" height="400" /> 
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!--Modal end -->

<!--Modal start-->
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                
                <div class="modal fade" id="story2" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title text-primary">Your Story</h4>
                        <button class="close pull-right" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                         <img src="" id="storydisplay2" width="500" height="400" /> 
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" id="close1" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!--Modal end -->

    <?php
    require_once("../Layout/footer.php");
?>
