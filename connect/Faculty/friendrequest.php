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
echo"$seconds S"; 
}
else if($minutes <=60)
{
   if($minutes==1)
   {
     echo"1 M"; 
   }
   else
   {
   echo"$minutes M"; 
   }
}
else if($hours <=24)
{
   if($hours==1)
   {
   echo"1 H";
   }
  else
  {
  echo"$hours H";
  }
}
else if($days <=7)
{
  if($days==1)
   {
   echo"1 D";
   }
  else
  {
  echo"$days D";
  }


  
}
else if($weeks <=4)
{
  if($weeks==1)
   {
   echo"1 W";
   }
  else
  {
  echo"$weeks W";
  }
 }
else if($months <=12)
{
   if($months==1)
   {
   echo"1 M";
   }
  else
  {
  echo"$months M";
  }
 
   
}

else
{
if($years==1)
   {
   echo"1 Y";
   }
  else
  {
  echo"$years Y";
  }

}
 
} 

?>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(".comfirm").click(function(){
            var rid=$("#hidden").attr('value');
            //alert(rid);
            var sid=$(this).attr('id');
            //alert(sid);
            $.ajax({
              url : 'friendrequest.php',
              type : 'post',
              async : false,
              data : {
                'con' : 1,
                'sid' : sid,
                'rid' : rid
              },
              success : function(){
                
              }
            });
          });
           $(".cancel").click(function(){
            var rid=$("#hidden").attr('value');
            var sid=$(this).attr('id');
            $.ajax({
              url : 'friendrequest.php',
              type : 'post',
              async : false,
              data : {
                'cancel1' : 1,
                'sid' : sid,
                'rid' : rid
              },
              success : function(){

              }
            });
          });
           $(".comfirm1").click(function(){
            var rid=$("#hidden").attr('value');
            //alert(rid);
            var sid=$(this).attr('id');
            //alert(sid);
            $.ajax({
              url : 'friendrequest.php',
              type : 'post',
              async : false,
              data : {
                'con2' : 1,
                'sid' : sid,
                'rid' : rid
              },
              success : function(){
                
              }
            });
          });
           $(".cancel1").click(function(){
            var rid=$("#hidden").attr('value');
            //alert(rid);
            var sid=$(this).attr('id');
            //(sid);
            $.ajax({
              url : 'friendrequest.php',
              type : 'post',
              async : false,
              data : {
                'cancel2' : 1,
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
   #img4
    {
      margin:0px 0px 0px 10px;
      width: 60px;
      height: 60px;
      border-radius: 90px;
    }
	#div1
    {
      margin-top: 20px; 
      margin-left: 10px;
      margin-bottom: 10px;
      padding-top: 15px;
      padding-left: 10px; 
      background-color: white;
      box-shadow: 5px 5px 5px 5px #888888;
      width: 550px;
      height: 80px;
    }
     #div2
    {
      margin-top: 20px;
      margin-left: 100px;
      margin-bottom: 30px;
      background-color: white;
      box-shadow: 5px 10px 8px 5px #888888;
      width: 950px; 
      height: 90px;
    }
    #s1
    {
      margin-left: 20px;
    }
</style>
 <section class="register-now section-padding-100 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png); padding-left: 5%;padding-right: 5%;">
 	<div class="container-fluid" style="background-color: white;box-shadow: 5px 10px 8px #888888">
      	<div class="row" style="background-color: white;">
          <form>
            <?php
                $id=$_SESSION['user_id'];
                $query="SELECT * from teacherfriendmst where Receiverteacher=$id and Status=0";
                $res=mysqli_query($cnn,$query);
                $cnt1=mysqli_num_rows($res);
                while($ans=mysqli_fetch_array($res))
                {
                    $sid=$ans['Sender'];
                    $r=mysqli_query($cnn,"SELECT * from teachermst where Teacherid=$sid");
                    $a=mysqli_fetch_array($r);
                    $img=$a['Profile'];
                    $name=$a['Name'];
                    $time=$ans['Time'];

            ?>
            <div class="col-sm-6">
                <div id="div1">
                                <form>
                                 <input type="hidden" name="txtrid" id="hidden" value="<?php  echo $id; ?>">
                                <span><img src="../img/profile/faculty/<?php  echo $img; ?>" id="img4" /></span>
                                <span id="s1"><font color="#0000ff"><?php echo $name; ?></font></span>
                                <span id="s1"><strong><?php echo $time = time_stamp($time); ?></strong></span>
                                 <span style="padding-left: 150px;"><a href=""   class="btn  btn-success w-40 comfirm"  role="button"  name="friend" id="<?php echo $sid; ?>">Confirm</a></span>
                                 <span style="padding-left: 0px;">
                                 <a href=""   class="btn  btn-danger w-10 cancel"  role="button"  name="cancel" id="<?php echo $sid; ?>"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                               </form>
                       </div>       
               	</div>
            <?php 
              }
            ?>
             <?php
            if(isset($_REQUEST['con']))
            {
              $sid=$_REQUEST['sid'];
              $rid=$_REQUEST['rid'];
              $q1="UPDATE teacherfriendmst set Status=1 where Sender=$sid and Receiverteacher=$rid ";
              $cnt=mysqli_query($cnn,$q1);
              exit();
            }
             if(isset($_REQUEST['cancel1']))
            {
              $sid=$_REQUEST['sid'];
              $rid=$_REQUEST['rid'];
              $q1="DELETE from  teacherfriendmst where Sender=$sid and Receiverteacher=$rid ";
              $cnt=mysqli_query($cnn,$q1);
              exit();
            }
        ?>
  
            <?php 

                $id=$_SESSION['user_id'];
                $query1="SELECT * from studentfriendmst where Receiverteacher=$id and Status=0";
                $res1=mysqli_query($cnn,$query1);
                $cnt2=mysqli_num_rows($res1); 
            while($ans1=mysqli_fetch_array($res1))
                {
                    $sid=$ans1['Sender'];
                    $r=mysqli_query($cnn,"SELECT * from studentmst where Studentid=$sid");
                    $a=mysqli_fetch_array($r);
                    $img=$a['Profile'];
                    $name=$a['Middlename'];
                    $time=$ans1['Time'];

            ?>
            <div class="col-sm-6">
                <div id="div1">
                                <form>
                                 <input type="hidden" name="txtrid" id="hidden" value="<?php  echo $id; ?>">
                                <span><img src="../img/profile/student/<?php  echo $img; ?>" id="img4" /></span>
                                <span id="s1"><font color="#0000ff"><?php echo $name; ?></font></span>
                                <span id="s1"><strong><?php echo $time = time_stamp($time); ?></strong></span>
                                 <span style="padding-left: 150px;"><a href=""   class="btn  btn-success w-40 comfirm1"  role="button"  name="friend" id="<?php echo $sid; ?>">Confirm</a></span>
                                 <span style="padding-left: 0px;">
                                 <a href=""   class="btn  btn-danger w-10 cancel1"  role="button"  name="cancel1" id="<?php echo $sid; ?>"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                               </form>
                       </div>       
                </div>
            <?php 
              }
            ?>
          </div>
          </form>
          <?php
            if($cnt1 <= 0 && $cnt2 <= 0)
            {
          ?>
         <div class="row" style="background-color: white;" id="div2">
                          <h4 style="margin-left: 300px;margin-top: 10px;"><img src="../img/core-img/info.jpg" style="width: 70px;height: 70px;">&nbsp;&nbsp;No Request Available</h4>
          </div>
          <?php
            }
          ?>
        </div>
        <?php
            if(isset($_REQUEST['con2']))
            {
              $sid=$_REQUEST['sid'];
              $rid=$_REQUEST['rid'];
              $q1="UPDATE studentfriendmst set Status=1 where Sender=$sid and Receiverteacher=$rid ";
              $cnt=mysqli_query($cnn,$q1);
              exit();
            }
             if(isset($_REQUEST['cancel2']))
            {
              $sid=$_REQUEST['sid'];
              $rid=$_REQUEST['rid'];
              $q1="DELETE from  studentfriendmst where Sender=$sid and Receiverteacher=$rid ";
              $cnt=mysqli_query($cnn,$q1);
              exit();
            }
        ?>
  
    </div>
  </section>  
<?php
	 require_once("../Layout/footer.php");
?>