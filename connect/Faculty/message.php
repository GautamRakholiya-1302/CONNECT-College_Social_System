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
      /*height: px;*/
    }
    #div3
    {
      margin-top: 20px;
      margin-left: 30px;
      margin-bottom: 0px;
      background-color: white;
      box-shadow: 5px 10px 8px #888888;
      width: 600px; 
      /*height: 350px;*/
      padding-top: 10px;
      padding-left: 15px;
      padding-bottom: 20px;
    }
    .tab-content {
    box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
    
    .card {
        border-radius: 0;
    }
    
    .card-header {
        padding: 15px 16px;
        border-radius: 0;
        background-color: #f6f6f6;
        
        h5 {
            margin: 0;
            
            button {
                display: block;
                width: 100%;
                padding: 0;
                border: 0;
                font-weight: 700;
                color: rgba(0,0,0,.87);
                text-align: left;
                white-space: normal
            }
        }
    }
    
    .card-body {
        p {
            color: #616161;
            
            &:last-of-type {
                margin: 0;
            }
        }
    }
}


// BORDER FIX
.accordion {
    > .card {
        &:not(:first-child) {
            border-top: 0;
        }   
    }
}

.collapse.show {
    .card-body {
        border-bottom: 1px solid rgba(0,0,0,.125);
    }
}
</style>
<section class="register-now section-padding-100 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png); padding-left: 10%;
  padding-right: 10%;">
 	<div class="container-fluid">
      	<div class="row" style="background-color: white;box-shadow: 5px 10px 8px #888888;">
      		<?php
            if(isset($_REQUEST['id']))
            {
      			   $sid=$_REQUEST['id'];
            }
            if(isset($_REQUEST['rid']))
            {
              $sid=$_REQUEST['rid'];
            }
      			$tid=$_SESSION['user_id'];
      			// echo $sid.$id;
      			$q1="SELECT * from teachermst where Teacherid=$sid";
      			$res=mysqli_query($cnn,$q1);
      			$ans=mysqli_fetch_array($res);
      			$img=$ans['Profile'];
      			$name=$ans['Name'];
      			$dept=$ans['Department'];
      			$status=$ans['Status'];
      			$r=mysqli_query($cnn,"SELECT Coursename from coursemst where Courseid=$dept");
      			$a=mysqli_fetch_array($r);
      			$cname=$a['Coursename'];
      		?>
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
                            	<br>	
                                <textarea class="text-info" rows="2" cols="50" placeholder="Write Here..." name="txtque" ></textarea>&nbsp;&nbsp;&nbsp;<button class="btn clever-btn" name="send" style="margin-bottom: 30px;"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 20px;"></i>&nbsp;&nbsp;send</button><br>
                                 <div class="form-group">
                                  <label><b>File</b></label>
                                  <input type="file" class="form-control text-info" name="txtfile">
                                </div>
                            </div>
	                   <div class="tab-content" id="faq-tab-content" style="margin-bottom: 10px;">
			                <h2 style="margin-left: 10px;margin-top: 10px;">Messages</h2>
			                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
			                    <div class="accordion" id="accordion-tab-1">
			                        <?php 
			                            $cnt=1;
			                            $q1="SELECT * from messagemst where Senderid=$tid and Receiverid=$sid";
			                            $res1=mysqli_query($cnn,$q1);
			                            while($ans1=mysqli_fetch_array($res1))
			                            {
			                                $que=$ans1['Sendmsg'];
			                                $answer=$ans1['Receivermsg'];
			                                
			                        ?>
			                        <div class="card">
			                            <div class="card-header" id="accordion-tab-1-heading-<?php echo $cnt; ?>">
			                                <h5>
			                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-<?php echo $cnt; ?>" aria-expanded="false" aria-controls="accordion-tab-1-content-<?php echo $cnt; ?>"><?php echo $que; ?></button>
			                                </h5>
			                            </div>
			                            <div class="collapse" id="accordion-tab-1-content-<?php echo $cnt; ?>" aria-labelledby="accordion-tab-1-heading-<?php echo $cnt; ?>" data-parent="#accordion-tab-<?php echo $cnt; ?>">
			                                <div class="card-body">
			                                    <p><?php echo $answer; ?></p>
			                                </div>
			                            </div>
			                        </div>
			                        <?php
			                            $cnt+=1;
			                            }
			                        ?>
			                        </div>
			                  </div>
			                </div>
	        		</div>
  				</form>
      		</div>
      	</div>
    </div>
</section>
<?php
	if(isset($_REQUEST['send']))
	{
		$ques=$_REQUEST['txtque'];
    $file=$_FILES['txtfile']['name'];
    // echo $file;
		if($ques!="" || $file!="")
    {
			$q="INSERT into messagemst(Senderid,Receiverid,Sendmsg,File) values($tid,$sid,'$ques','$file')";
			mysqli_query($cnn,$q);
      move_uploaded_file($_FILES['txtfile']['tmp_name'],"../img/message_file/".$file);
		}
	}
?>
<?php
	 require_once("../Layout/footer.php");
?>