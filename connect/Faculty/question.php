<?php
    require_once("session.php");
    require_once("header.php");
?>
 <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('.send').click(function(){
            var queid=$(this).attr('id');
            //alert(queid);
            var ans1=document.getElementById('ans').value;
            //alert(ans1);
            $.ajax({
              url : 'question.php',
              type : 'post',
              async : false,
              data : {
                'Sendans' : 1,
                'questionid' : queid,
                'answer' : ans1
              },
              success : function(){
                 // alert("okkkkk  ...");
              }
            });
          });
          
      });
    </script>
<style type="text/css">
    #div1
    {
      margin-top: 20px;
      margin-left: 50px;
      margin-bottom: 30px;
      background-color: white;
      box-shadow: 5px 10px 8px 5px #888888;
      width: 950px; 
      height: 130px;
    }
    #div2
    {
      margin-top: 20px;
      margin-left: 50px;
      margin-bottom: 30px;
      background-color: white;
      box-shadow: 5px 10px 8px 5px #888888;
      width: 950px; 
      height: 90px;
    }
    #img1
    {
      margin-top: 10px;
      margin-left: 10px;
      width: 90px;
      height: 90px;
      border-radius: 50px;
    }
</style>
<script src="js/jquery/jquery-2.2.4.min.js"></script>  
    <section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);padding-left: 10%;padding-right: 10%;padding-bottom: 10%;">
            <div class="container-fluid" style="background-color: white;box-shadow: 5px 10px 8px #888888">
            			<h3 class="text-primary">Questions</h3>
            			  
							     <!-- <label><b>Question</b></label> -->
                    <form name="f1">
                       
                              <?php
                                  $tid=$_SESSION['user_id'];
                                  $q="SELECT * from questionmst where Teacherid=$tid and Status=0 ";
                                 // echo $q;
                                  $res=mysqli_query($cnn,$q);
                                  if(mysqli_num_rows($res) > 0)
                                  {
                                  while($ans=mysqli_fetch_array($res))
                                  {
                                      $qid=$ans['Questionid'];
                                      $que=$ans['Query'];
                                      $sid=$ans['Studentid'];
                                      $q="SELECT * from studentmst where Studentid=$sid";
                                      $r=mysqli_query($cnn,$q);
                                      $a=mysqli_fetch_array($r);
                                      $name=$a['Middlename'];
                                      $img=$a['Profile'];
                                      $cou=$a['Courseid'];
                                      $q1="SELECT * from coursemst where Courseid=$cou";
                                      $res1=mysqli_query($cnn,$q1);
                                      $ans1=mysqli_fetch_array($res1);
                                      $course=$ans1['Coursename'];

                                      $sem=$a['Semesterid'];
                                      $q2="SELECT * from semestermst where Semesterid=$sem";
                                      $res2=mysqli_query($cnn,$q2);
                                      $ans2=mysqli_fetch_array($res2);
                                      $semester=$ans2['Semestername'];

                                      $div=$a['Classid'];
                                      $q3="SELECT * from classmst where Classid=$div";
                                      $res3=mysqli_query($cnn,$q3);
                                      $ans3=mysqli_fetch_array($res3);
                                      $division=$ans3['Classname'];
                                ?>
                      <div class="row" style="background-color: white;" id="div1">
                         
                            <div class="col-2">
                                <span>
                                  <img src="../img/profile/student/<?php  echo $img; ?>" id="img1" />
                                  <h6 style="margin-left: 35px;margin-top: 5px;"><?php  echo $name; ?></h6>
                                </span>
                            </div>
                            <div class="col-1">
                                <div style="height: 30px;padding-top: 15px;"><b><?php  echo $course; ?></b></div>
                                <div style="height: 30px;padding-top: 15px;"><b><?php  echo $semester; ?></b></div>
                                <div style="height: 30px;padding-top: 15px;"><b><?php  echo $division; ?></b></div>
                          
                            </div> 
                            <div class="col-6" style="margin-top: 10px;margin-left: 0px;">
                                <div class="text-info"><b>Question :&nbsp;&nbsp;&nbsp;</b><?php echo $que; ?></div><br>
                                <div><textarea class="form-control text-info" style="height: 70px;" placeholder="Answer write here..." name="txtans" id="ans"></textarea>
                                </div>
                            </div>
                            <div class="col-3" style="margin-top: 65px;">
                                <a href="" class="btn clever-btn w-50 send" role="button" id="<?php echo $qid; ?>"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 20px;"></i>&nbsp;&nbsp;Send</a>
                             </div> 
                          
                      </div>
                      <?php
                        }
                      }
                      else
                      {
                        ?>
                        <div class="row" style="background-color: white;" id="div2">
                          <h4 style="margin-left: 300px;margin-top: 10px;"><img src="../img/core-img/info.jpg" style="width: 70px;height: 70px;">&nbsp;&nbsp;No More Question </h4>
                         </div>
                         <?php
                      }
                      ?>
            	    </form>
            	</div>
            </div>
   
 <?php
 	if(isset($_REQUEST['Sendans']))
 	{
    // $tid=$_SESSION['user_id'];
    // echo $tid;
    $qid=$_REQUEST['questionid'];
    $ans=$_REQUEST['answer'];
    $q="UPDATE questionmst set Answer='$ans',Status=1 where Teacherid=$tid and Questionid=$qid";
    mysqli_query($cnn,$q);
    exit();
    
 	}	

 ?>   
   </section>
<?php
    require_once("../Layout/footer.php");
?>   