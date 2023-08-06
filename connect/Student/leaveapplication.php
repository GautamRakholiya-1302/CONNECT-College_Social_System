<?php
    include("session.php");
    require_once("header.php");
?>
 <?php
        if(isset($_REQUEST['send']))
        {
            $sid=$_SESSION['stud_id'];
            $to1=$_REQUEST['txtto1'];
            $from1=$_REQUEST['txtfrom1'];
            $des1=$_REQUEST['txtdes1'];

            $to2=$_REQUEST['txtto2'];
            $from2=$_REQUEST['txtfrom2'];
            $des2=$_REQUEST['txtdes2'];


            if(isset($_REQUEST['txtdept1']))
            {
                $tnm=$_REQUEST['txtdept1'];
                $tquery="SELECT * from teachermst where Name='$tnm' ";
                $res=mysqli_query($cnn,$tquery);
                $t=mysqli_fetch_array($res);
                $tid=$t['Teacherid'];
                $em=$t['Email'];
                
                require '../PHPMailer-master/PHPMailerAutoload.php';
                $mail = new PHPMailer();
                    //Enable SMTP debugging.
                $mail->SMTPDebug = 0;
                    //Set PHPMailer to use SMTP.
                $mail->isSMTP();
                    //Set SMTP host name
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
                );
                    //Set this to true if SMTP host requires authentication to send email
                $mail->SMTPAuth = TRUE;
                    //Provide username and password
                $mail->Username = "connect1014@gmail.com";
                $mail->Password = "108connect";
                    //If SMTP requires TLS encryption then set it
                $mail->SMTPSecure = "false";
                $mail->Port = 587;
                    //Set TCP port to connect to

                $mail->From = "connect1014@gmail.com";
                $mail->FromName = "connect";
                $mail->addAddress($em);
                $mail->isHTML(true);
                $mail->Subject ="For Leave Application";
                $mail->Body = "<h4><b>you have notification for approve leave from this site </b></h4>";
                    // $mail->Body = "<b>your Password : </b>".$pass;
                $mail->AltBody = "This is the plain text version of the email content";
                if(!$mail->send())
                {
                    $_SESSION['message']="<b>Please Check Your Internet Connection...</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"leaveapplication.php?isErr=true\"
                    </script>";
                }
                else
                {
                    
                    if(($to1!="") && ($from1!=""))
                    {   
                        $query1="INSERT into leaveapplicationmst(Teacherid,Studentid,Todate,Fromdate,Description) values($tid,$sid,'$to1','$from1','$des1')"; 
                        mysqli_query($cnn,$query1);
                    }

                   
                    if(($to2!="") && ($from2!=""))
                    {   
                        $query2="INSERT into leaveapplicationmst(Teacherid,Studentid,Todate,Fromdate,Description) values($tid,$sid,'$to2','$from2','$des2')"; 
                        mysqli_query($cnn,$query2);
                    } 
                    $_SESSION['message']="<b>Your Leave request has been send to faculty for approval...you will get response in sometime</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"leaveapplication.php?Err=true\"
                    </script>";  
                }            
            }
        }
        
   ?>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script>
   
    $(document).ready(function(){
        $("#form1").hide();
        
        $("#add1").click(function(){
        	$("#form1").show();
        });
       $("#minus1").click(function(){
        	$("#form1").hide();
        });
        
    });
</script>
  
    <section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
            <div class="container-fluid" style="background-color: white;box-shadow: 5px 10px 8px #888888;margin-left:60px;margin-bottom: 25px;margin-right: 40px;">
                <div class="row-12" style="padding-top: 5px;" >
                        <?php
                          if(isset($_REQUEST['isErr'])){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['message'];  ?>
                            </div>
                            <?php
                          }
                        ?>
                        <?php
                          if(isset($_REQUEST['Err'])){
                            ?>
                            <div class="alert alert-info" role="alert">
                                <?php echo $_SESSION['message'];  ?>
                            </div>
                            <?php
                          }
                        ?>
                </div>
                <!-- <div class="row" style="margin-left: 10px;margin-top: 5px;margin-bottom: 5px;"> -->
                        <div class="forms"> 
                        <h4 class="text-primary">Leave Application</h4> 
                        <form  method="post"  id="fm" name="fm" autocomplete="off">
                        		<div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label><b>Faculty Name </b></label>
                                            <select name="txtdept1" class="form-control text-info" id="txtdept">
                                                <option>Select faculty</option>
												<?php
                                                    $id=$_SESSION['stud_id'];
                                                    $que1="SELECT *  from studentmst where Studentid=$id";
                                                    $res1=mysqli_query($cnn,$que1);
                                                    $ans2=mysqli_fetch_array($res1);
                                                    $dept=$ans2['Courseid'];
													$query="SELECT * from teachermst where Department=$dept";
													$res=mysqli_query($cnn,$query);
													while($ans=mysqli_fetch_array($res))
													{
													echo "<option>".$ans['Name']."</option>";
													}
												?>
											</select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label><b>To Date </b></label>
                                            <input type="date" class="form-control text-info" name="txtto1" id="txtto1" >
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label><b>From Date </b></label>
                                            <input type="date" class="form-control text-info" name="txtfrom1" id="txtfrom1" >
                                        </div>
                                    </div>
                                  
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label><b>Description </b></label>
                                            <input type="text" class="form-control text-info" name="txtdes1" id="txtdes" >
                                        </div>
                                    </div>
                                    <div class="col-1">
                                    	<div class="form-group">
                                    	<lable><b>More </b></lable><br>
                                    	<img src="https://image.flaticon.com/icons/svg/60/60740.svg" width="40	" height="50" alt="Add button inside black circle free icon" title="Add button inside black circle free icon" id="add1">
                                    	</div>
                                	</div>
                                </div>

                                <div class="row" id="form1">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <input type="date" class="form-control text-info" name="txtto2" id="txtto2" >
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <input type="date" class="form-control text-info" name="txtfrom2" id="txtfrom2" >
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group"> 
                                            <input type="text" class="form-control text-info" name="txtdes2" id="txtdes2" >
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-group">
                                        <img src="https://www.flaticon.com/premium-icon/icons/svg/246/246235.svg" width="40" height="50" alt="Subtraction premium icon" title="Subtraction premium icon" id ="minus1">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                                
                                <div class="col-6" style="margin-left: 180px;">
                                      <button class="btn clever-btn w-100" name="send">send</button>
                                </div>
                        </form>
                        <br>
                    </div>
             <!-- </div> -->
                            
    </section>
<?php
    require_once("../Layout/footer.php");
?>   