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

?>
 <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(".cancel").click(function(){
            var sid=$("#hidden").attr('value');
            //alert(sid);
            var rid=$(this).attr('id');
            //alert(rid);
            $.ajax({
              url : 'findfacultyfriend.php',
              type : 'post',
              async : false,
              data : {
                'can' : 1,
                'sid' : sid,
                'rid' : rid
              },
              success : function(){

              }
            });
          });
          $(".friend").click(function(){
            var sid=$("#hidden").attr('value');
            //alert(sid);
            var rid=$(this).attr('id');
            //alert(rid);
            $.ajax({
              url : 'findfacultyfriend.php',
              type : 'post',
              async : false,
              data : {
                'frd' : 1,
                'sid' : sid,
                'rid' : rid
              },
              success : function(){

              }
            });
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

	#div1
    {
      margin-top: 20px; 
      margin-left: 60px;
      margin-bottom: 25px;
      background-color: white;
      box-shadow: 5px 5px 5px 5px #888888;
      width: 200px;
      height: 258px;
    }
</style>
<section class="register-now section-padding-100 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png); padding-left: 5%;
  padding-right: 5%;">
  <div class="container-fluid" style="background-color: white;box-shadow: 5px 10px 8px #888888;">
        <div class="row" style="background-color: white;">
            <form method="Post">
          <?php
                  $sid=$_SESSION['stud_id'];
                  $q1="SELECT * from teachermst where facultystatus!='left' " ;
                  $res1=mysqli_query($cnn,$q1);
                  while($ans1=mysqli_fetch_array($res1))
                  {
                      $rid=$ans1['Teacherid'];
                      $img=$ans1['Profile'];
                      $name=$ans1['Name']; 
              ?>
            <div class="col-sm-3">
              
                <?php 
                      // $q2="SELECT * from teacherfriendmst where Sender=$sid and Receiverteacher=$rid union SELECT * from teacherfriendmst where Sender=$rid  and Receiverteacher=$sid";
                      $q2="SELECT * from studentfriendmst where Sender=$sid and Receiverteacher=$rid";
                        $res2=mysqli_query($cnn,$q2); 
                        $cnt=mysqli_num_rows($res2);
                        if($cnt > 0)
                        {
                          while($ans2=mysqli_fetch_array($res2))
                          {
                                if($ans2['Status']==1)
                                {
                                  ?>
                                   <div id="div1">
                                      <input type="hidden" name="txtsid" id="hidden" value="<?php  echo $sid; ?>">
                                       <div style="height: 120px;"><img src="../img/profile/faculty/<?php echo $img; ?>" id="img1" /></div>
                                      <div style="height: 50px;text-align: center;padding-top: 5px;margin-top: 50px;"><h4><?php echo $name; ?> </h4></div> 
                                    <div style="height: 50px;margin-top: 0px;margin-left: 0px;">
                                     
                                    <a href=""   class="btn  btn-primary w-100"  role="button"  name="cancel" id="<?php echo $rid; ?>"><i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;Your Friend</a>
                                  </div>  
                                <?php
                                }
                                else
                                {
                      ?>
                             <div id="div1">
                                  <input type="hidden" name="txtsid" id="hidden" value="<?php  echo $sid; ?>">
                                   <div style="height: 120px;"><img src="../img/profile/faculty/<?php echo $img; ?>" id="img1" /></div>
                                  <div style="height: 50px;text-align: center;padding-top: 5px;margin-top: 50px;"><h4><?php echo $name; ?> </h4></div> 
                                <div style="height: 50px;margin-top: 0px;margin-left: 0px;">
                                 
                                  <a href=""   class="btn  btn-danger w-100 cancel"  role="button"  name="cancel" id="<?php echo $rid; ?>"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel Request</a>
                              </div>  
                      <?php
                                }
                          }
                        }
                        else
                        {
                      ?>
                       <div id="div1">
                            <input type="hidden" name="txtsid" id="hidden" value="<?php  echo $sid; ?>">
                             <div style="height: 120px;"><img src="../img/profile/faculty/<?php echo $img; ?>" id="img1" /></div>
                            <div style="height: 50px;text-align: center;padding-top: 5px;margin-top: 50px;"><h4><?php echo $name; ?> </h4></div> 
                          <div style="height: 50px;margin-top: 0px;margin-left: 0px;">
                           
                            <a href=""   class="btn  btn-success w-100 friend"  role="button"  name="friend" id="<?php echo $rid; ?>"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Friend</a>
                            </div>
                      <?php
                        }
                      ?>
                    
                    </form>
                </div>
            </div>
             <?php
                }
              ?>

<?php 
            if(isset($_REQUEST['frd']))
            {
                $sid1=$_REQUEST['sid'];
                $rid1=$_REQUEST['rid'];
                $time=time();
                $q3="INSERT into studentfriendmst (Sender,Receiverteacher,Time) values($sid1,$rid1,'$time')";
                $cnt=mysqli_query($cnn,$q3);
                exit();
            }
            if(isset($_REQUEST['can']))
            {
                $sid2=$_REQUEST['sid'];
                $rid2=$_REQUEST['rid'];
                $q4="DELETE from studentfriendmst where Sender=$sid2 and Receiverteacher=$rid2";
                $cnt=mysqli_query($cnn,$q4);
                exit();
            }
        ?>


        </div>
        

    </div>
  </section> 
 
<?php
	 require_once("../Layout/footer.php");
?>