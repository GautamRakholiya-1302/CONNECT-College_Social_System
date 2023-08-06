<?php
	 require_once('session.php');
    require_once("header.php");
?>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(".remove1").click(function(){
            var rid=$("#hidden").attr('value');
            alert(rid);
            var sid=$(this).attr('id');
            alert(sid);
            $.ajax({
              url : 'friends.php',
              type : 'post',
              async : false,
              data : {
                'remove1' : 1,
                'sid' : sid,
                'rid' : rid
              },
              success : function(){
                alert("ok...."); 
              }
            });
          });
          $(".remove2").click(function(){
            var sid=$("#hidden1").attr('value');
            alert(sid);
            var rid=$(this).attr('id');
            alert(rid);
            $.ajax({
              url : 'friends.php',
              type : 'post',
              async : false,
              data : {
                'remove2' : 1,
                'sid' : sid,
                'rid' : rid
              },
              success : function(){
                alert("ok...."); 
              }
            });
          });
          
            $(".remove3").click(function(){
            var sid=$("#hidden2").attr('value');
            alert(sid);
            var rid=$(this).attr('id');
            alert(rid);
            $.ajax({
              url : 'friends.php',
              type : 'post',
              async : false,
              data : {
                'remove3' : 1,
                'sid' : sid,
                'rid' : rid
              },
              success : function(){
                alert("ok...."); 
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
</style>
 <section class="register-now section-padding-100 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png); padding-left: 5%;
  padding-right: 5%;">
 	<div class="container-fluid" style="background-color: white;box-shadow: 5px 10px 8px #888888;">
      	<div class="row" style="background-color: white;">

           <?php
                $id=$_SESSION['user_id'];
                $query="SELECT * from teacherfriendmst where  Sender=$id and Receiverteacher!=0 and Status=1";
                $res=mysqli_query($cnn,$query);
                $cnt1=mysqli_num_rows($res);
                while($ans=mysqli_fetch_array($res))
                {
                    $rt=$ans['Receiverteacher'];
                    $r=mysqli_query($cnn,"SELECT * from teachermst where Teacherid=$rt");
                    $a=mysqli_fetch_array($r);
                    $img=$a['Profile'];
                    $name=$a['Name'];
                  

            ?>
            <div class="col-sm-3">
                <div id="div1">
                  <form>
                    <input type="hidden" name="txtsid" id="hidden" value="<?php  echo $rt; ?>">
                   <div style="height: 120px;"><img src="../img/profile/faculty/<?php echo $img; ?>" id="img1" /></div>
                    <div style="height: 40px;text-align: center;padding-top: 5px;margin-top: 50px;"><h4><?php echo $name; ?></h4></div> 
                    
                    <div style="height: 50px;">
                       <span style="margin-left: 15px;"><a href="message.php?rid=<?php echo $rt; ?>"><img src="../img/core-img/msg1.jfif" id="message" style="width:50px; height: 40px;"></a></span>
                      <span style="margin-left: 15px;">
                      <a href=""   class="btn  btn-danger w-50 remove1"  role="button"  name="cancel" id="<?php echo $id; ?>"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Remove</a>
                      </span>
                      </div>
                    </form>
                </div>
           
            </div>
            <?php
             }
            ?>
            <?php
         if(isset($_REQUEST['remove1']))
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
                $query="SELECT * from teacherfriendmst where Receiverteacher=$id and Status=1";
                $res=mysqli_query($cnn,$query);
                 $cnt2=mysqli_num_rows($res);
                while($ans=mysqli_fetch_array($res))
                {
                    $rt=$ans['Sender'];
                    $r=mysqli_query($cnn,"SELECT * from teachermst where Teacherid=$rt");
                    $a=mysqli_fetch_array($r);
                    $img=$a['Profile'];
                    $name=$a['Name'];
                  

            ?>
            <div class="col-sm-3">
                <div id="div1">
                  <form>
                    <input type="hidden" name="txtsid" id="hidden1" value="<?php  echo $rt; ?>">
                   <div style="height: 120px;"><img src="../img/profile/faculty/<?php echo $img; ?>" id="img1" /></div>
                    <div style="height: 40px;text-align: center;padding-top: 5px;margin-top: 50px;"><h4><?php echo $name; ?></h4></div> 

                   <div style="height: 50px;">
                       <span style="margin-left: 15px;"><a href="message.php?rid=<?php echo $rt; ?>"><img src="../img/core-img/msg1.jfif" id="message" style="width:50px; height: 40px;"></a></span>
                      <span style="margin-left: 15px;">
                      <a href=""   class="btn  btn-danger w-50 remove2"  role="button"  name="cancel" id="<?php echo $id; ?>"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Remove</a>
                      </span>
                      </div>
                    </form>
                </div>
           
            </div>
            <?php
             }
            ?>
            <?php
         if(isset($_REQUEST['remove2']))
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
                $query="SELECT * from studentfriendmst where Receiverteacher=$id and Status=1";
                $res=mysqli_query($cnn,$query);
                $cnt3=mysqli_num_rows($res);
                while($ans=mysqli_fetch_array($res))
                {
                    $sid=$ans['Sender'];
                    $r=mysqli_query($cnn,"SELECT * from studentmst where Studentid=$sid");
                    $a=mysqli_fetch_array($r);
                    $img=$a['Profile'];
                    $name=$a['Middlename'];
                  

            ?>
            <div class="col-sm-3">
                <div id="div1">
                  <form>
                    <input type="hidden" name="txtsid" id="hidden2" value="<?php  echo $sid; ?>">
                   <div style="height: 120px;"><img src="../img/profile/student/<?php echo $img; ?>" id="img1" /></div>
                    <div style="height: 40px;text-align: center;padding-top: 5px;margin-top: 50px;"><h4><?php echo $name; ?></h4></div> 

                    <div style="height: 50px;">
                      
                      <span style="margin-left: 0px;">
                      <a href=""   class="btn  btn-danger w-100 remove3"  role="button"  name="cancel" id="<?php echo $id; ?>"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Remove</a>
                      </span>
                      </div>
                    </form>
                </div>
           
            </div>
            <?php
             }
            ?>
            <?php
         if(isset($_REQUEST['remove3']))
            {
              $sid=$_REQUEST['sid'];
              $rid=$_REQUEST['rid'];
              $q2="DELETE from  studentfriendmst where Sender=$sid and Receiverteacher=$rid ";
              $cnt=mysqli_query($cnn,$q2);
              exit();
            }
        ?>
        </div>
          <?php
            if($cnt1 <= 0 && $cnt2 <= 0 && $cnt3 <= 0)
            {
          ?>
             <div class="row" style="background-color: white;" id="div2">
                      <h4 style="margin-left: 300px;margin-top: 10px;"><img src="../img/core-img/info.jpg" style="width: 70px;height: 70px;">&nbsp;&nbsp;No Friends Available</h4>
              </div>
          <?php
            }
          ?>
    </div>
  </section>  
  <?php
	 require_once("../Layout/footer.php");
?>