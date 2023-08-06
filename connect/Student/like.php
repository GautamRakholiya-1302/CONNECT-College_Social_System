<?php
		include("connection.php");
		session_start();

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


	if(isset($_REQUEST['postid']))
        {
          $sid=$_SESSION['stud_id'];
          $postid=$_REQUEST['postid'];
          $result=mysqli_query($cnn,"SELECT * from postmst where Postid=$postid");
          $row=mysqli_fetch_array($result);
          $n=$row['Likes'];
          mysqli_query($cnn,"UPDATE postmst set Likes=$n+1 where Postid=$postid");
          mysqli_query($cnn,"INSERT INTO likemst(Studentid,Postid) values ($sid,$postid)");
         
        } 
?>
<?php
	if(isset($_REQUEST['uprofile']))
	{
?>
<div id="display">
    <?php
    	$id=$_SESSION['stud_id'];
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

<?php
	}
?>
<?php
	if(isset($_REQUEST['vprofile']))
	{
?>
<div id="yourpost">
      <?php
      					$id=$_SESSION['stud_id'];
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
                           $q="select * from studentmst where Studentid=$sid";
                          $res=mysqli_query($cnn,$q);
                          $ans=mysqli_fetch_array($res);
                          $dbname=$ans['Middlename'];
                          $dbimg=$ans['Profile'];     
  ?>

      <div class="row" style="background-color: white;width: 100%;">
                <div class="col-sm-3">
                    <!-- <div id="div1">
                      
                    </div> -->
                </div>
                <div class="col-lg-9">
                      <div style="margin-top: 10px;margin-bottom: 0px;background-color: white;box-shadow: 5px 10px 8px #888888;width: 650px;height: 400px;">
                         
                              <div style="width: 650px;height: 55px;background-color:#b3b3ff;">
                                <img src="../img/profile/<?php  echo $dbimg; ?>" id="img4" />&nbsp;&nbsp;&nbsp;<font color="#0000ff"><?php  echo $dbname; ?></font>&nbsp;&nbsp;&nbsp;
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
          ?>
</div>

<?php
	}
?>