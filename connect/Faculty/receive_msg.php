<?php
	require_once('session.php');
  require_once("header.php");
?>
<style type="text/css">
	 #img1
    {
      margin:20px 0px 0px 30px;
      width: 100px;
      height: 100px;
      border-radius: 90px;
    }

	#div1
    {
      margin-top: 20px; 
      margin-left: 35px;
      margin-bottom: 25px;
      background-color: white;
      box-shadow: 5px 10px 8px #888888;
      width: 150px;
      height: 230px;
    }
  	 #div2
    {
      margin-top: 20px;
      margin-left: 70px;
      margin-bottom: 30px;
      background-color: white;
      box-shadow: 5px 10px 8px 5px #888888;
      width: 900px; 
    }
   
}
</style>
<section class="register-now section-padding-100 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png); padding-left: 10%;
  padding-right: 10%;">
 	<div class="container-fluid">
      	
      		<?php
      			$tid=$_SESSION['user_id'];

            $q="SELECT * from messagemst where Senderid=$tid and Status=1";
            $res=mysqli_query($cnn,$q);
            while($ans=mysqli_fetch_array($res))
            {
            $que=$ans['Sendmsg'];
            $file=$ans['File'];
            $a1=$ans['Receivermsg'];
            $cnt1=mysqli_num_rows($res);
            if($cnt1>0)
            {
                $rid=$ans['Receiverid'];
               
                $q1="SELECT * from Teachermst where Teacherid=$rid";
                $res1=mysqli_query($cnn,$q1);
                $ans1=mysqli_fetch_array($res1);

                $img=$ans1['Profile'];
                $name=$ans1['Name'];
                $dept=$ans1['Department'];
                $r=mysqli_query($cnn,"SELECT Coursename from coursemst where Courseid=$dept");
                $a=mysqli_fetch_array($r);
                $cname=$a['Coursename'];
                $status=$ans1['Status'];
                ?>
                <div class="row" style="background-color: white;box-shadow: 5px 10px 8px #888888;">
                  <div class="col-lg-3" id="div1">
               <div style="height:120px;padding-left: 50px;"><img src="../img/profile/faculty/<?php echo $img; ?>" id="img1" /></div>
                                <div style="height: 40px;text-align: center;padding-top: 15px;"><h5><?php echo $name; ?></h5></div>
                                <div style="text-align: center;padding-top: 10px;height: 30px;"><?php echo $cname ?></div>

                                <?php
                                  if($status=="online")
                                  {
                                    echo "<span style=\"margin-left: 90px;\"><i class=\"fa fa-circle\" style=\"font-size:10px; color:#00cc00;\"></i>&nbsp;&nbsp;<b>Online</b></span>";
                                  }
                                  else
                                  {
                                    echo "<span style=\"margin-left: 90px;\"><i class=\"fa fa-circle\" style=\"font-size:10px; color:red;\"></i>&nbsp;&nbsp;<b>Offline</b></span>";
                                  }
                               ?>
          </div>
          <div class="col-7" id="div2">
            <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <div class="text-info"><b><u>Send :</u>&nbsp;&nbsp;&nbsp;</b><?php echo $que; ?></div><br>
                              <div class="text-info"><b><u>File:</u>&nbsp;&nbsp;&nbsp;</b><?php echo "<a target=\"_blank\"href=\"../img/message_file/".$file."\">".$file."</a>"; ?></div><br>
                                <div class="text-info"><b><u>Reply:</u>&nbsp;&nbsp;&nbsp;</b><?php echo $a1; ?></div><br>
                                </div>
                            
            </form>
          </div>
        </div>
        <?php
            }
        ?>
                <?php
            }
            
            $q2="SELECT * from messagemst where Receiverid=$tid  and Status=0";
            $res2=mysqli_query($cnn,$q2);
            while($ans2=mysqli_fetch_array($res2))
            {
            $cnt2=mysqli_num_rows($res2);
             $que=$ans2['Sendmsg'];
            $file=$ans2['File'];
            if($cnt2>0)
            {
                $sid=$ans2['Senderid'];
               
                $q3="SELECT * from Teachermst where Teacherid=$sid";
                $res3=mysqli_query($cnn,$q3);
                $ans3=mysqli_fetch_array($res3);

                $img=$ans3['Profile'];
                $name=$ans3['Name'];
                $dept=$ans3['Department'];
                $r=mysqli_query($cnn,"SELECT Coursename from coursemst where Courseid=$dept");
                $a=mysqli_fetch_array($r);
                $cname=$a['Coursename'];
                $status=$ans3['Status'];
                ?>
                 <div class="row" style="background-color: white;box-shadow: 5px 10px 8px #888888;">
                  <div class="col-lg-3" id="div1">
               <div style="height:120px;padding-left: 50px;"><img src="../img/profile/faculty/<?php echo $img; ?>" id="img1" /></div>
                                <div style="height: 40px;text-align: center;padding-top: 15px;"><h5><?php echo $name; ?></h5></div>
                                <div style="text-align: center;padding-top: 10px;height: 30px;"><?php echo $cname ?></div>

                                <?php
                                  if($status=="online")
                                  {
                                    echo "<span style=\"margin-left: 90px;\"><i class=\"fa fa-circle\" style=\"font-size:10px; color:#00cc00;\"></i>&nbsp;&nbsp;<b>Online</b></span>";
                                  }
                                  else
                                  {
                                    echo "<span style=\"margin-left: 90px;\"><i class=\"fa fa-circle\" style=\"font-size:10px; color:red;\"></i>&nbsp;&nbsp;<b>Offline</b></span>";
                                  }
                               ?>
          </div>
          <div class="col-7" id="div2">
            <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <div class="text-info"><b><u>Que:</u>&nbsp;&nbsp;&nbsp;</b><?php echo $que; ?></div><br>
                              <div class="text-info"><b><u>File:</u>&nbsp;&nbsp;&nbsp;</b><?php echo "<a target=\"_blank\"href=\"../img/message_file/".$file."\">".$file."</a>"; ?></div><br>
                                <textarea class="text-info" rows="2" cols="65" placeholder="Answer Write Here..." name="txtans" ></textarea>&nbsp;&nbsp;&nbsp;<button class="btn clever-btn" name="send" style="margin-bottom: 30px;"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 20px;"></i>&nbsp;&nbsp;send</button><br>
                                
                                
                            </div>
                            
            </form>
          </div>
        </div>
        <?php
            }

      		}
      			
      		?>
      		
    </div>
</section>
<?php
	if(isset($_REQUEST['send']))
  {
    $answer=$_REQUEST['txtans'];
        $q="UPDATE messagemst set Receivermsg='$answer' , Status=1 Where Sendmsg='$que'  ";
        mysqli_query($cnn,$q);
  }
?>
<?php
	 require_once("../Layout/footer.php");
?>