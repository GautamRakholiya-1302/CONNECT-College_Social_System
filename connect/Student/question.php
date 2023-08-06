<?php
    require_once("session.php");
    require_once("header.php");
?>
<style type="text/css">
    #div1
    {
      margin-top: 20px;
      margin-left: 30px;
      margin-bottom: 0px;
      background-color: white;
      box-shadow: 5px 10px 8px #888888;
      width: 600px; 
      height: 350px;
    }
    #div2
    {
       margin-top: 20px;
       margin-left: 40px;
       margin-bottom: 25px;
       background-color: white;
       box-shadow: 5px 10px 8px #888888;
       width: 170px;
       height: 350px;
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
      padding-bottom: 10px;
    }
    // TAB CONTENT
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
                white-space: normal;
                
               /* &:hover,
                &:focus,
                &:active,
                &:hover:active {
                    text-decoration: none;
                }*/
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
 #img1
    {
      margin-top: 10px;
      width: 50px;
      height: 50px;
      border-radius: 50px;
    }
</style>
<?php
    $sid=$_SESSION['stud_id'];
    $q="SELECT * from studentmst where Studentid=$sid";
    $r=mysqli_query($cnn,$q);
    $a=mysqli_fetch_array($r);
    $cou=$a['Courseid'];
?>
<script src="js/jquery/jquery-2.2.4.min.js"></script>  
    <section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);padding-left: 5%;padding-right: 5%;padding-bottom: 5%;">
            <div class="container-fluid">
            	<div class="row" style="background-color: white;box-shadow: 5px 10px 8px #888888;"> 
            		<div class="col-8" id="div1">
            			<form method="post">
            			<h2 class="text-primary">Ask Question</h2><br>
            			  <label><h5>Faculty Name </h5></label><br>
                            <select name="txtdept" class="form-control text-info" id="txtdept">
                                <option>Select faculty</option>
              								<?php
              									$query="SELECT * from teachermst where Department=$cou";
              									$res=mysqli_query($cnn,$query); 
              									while($ans=mysqli_fetch_array($res))
              									{
              									echo "<option>".$ans['Name']."</option>";
              									}
              								?>
							               </select><br>
							             <label><h5>Question</h5></label>
                            <div class="form-group">
                                <textarea class="form-control text-info" style="height: 70px;" placeholder="Write Question Here..." name="txtque" >
                                </textarea>
                            </div>
                            <div class="col-4" style="margin-left:500px;">
                                <button class="btn clever-btn w-100" name="send"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 20px;"></i>&nbsp;&nbsp&nbsp;send</button>
                            </div>
                        </form>
            		</div>
            		<div class="col-3" id="div2"> 
                        <div style="height: 40px;text-align: left;padding-top: 0px;padding-left:15px;padding-bottom:40px;border-bottom: 1px solid #75a3a3;">
                            <span style="font-size: 20px;"><b>Faculty</b></span>
                            <span style="margin-left: 90px;"><i class="fa fa-circle" style="font-size:12px; color:#00cc00;"></i>&nbsp;&nbsp;Online</span>
                        </div>
            			<?php
            				$q="SELECT * from teachermst where Status='Online' and Department='$cou' ";
            				$res=mysqli_query($cnn,$q);

            				while($ans=mysqli_fetch_array($res))
            				{
                                $img=$ans['Profile'];
                                $name=$ans['Name'];
            					?>
            				    <div style="height: 70px;text-align: left;padding-top: 0px;padding-left:15px;padding-bottom:40px;border-bottom: 1px solid #75a3a3;">
                                   <span>
                                        <img src="../img/profile/faculty/<?php  echo $img; ?>" id="img1" />
                                    </span>
                                    <span style="margin-left: 10px;margin-top: 30px;">
                                        <font color="#0000ff" size="4px;"><?php echo $name; ?></font>
                                    </span>
                                </div>
            					
            					<?php
            				}
            			?>
            		</div>
            	</div>
        <div class="row" style="background-color: white;box-shadow: 5px 10px 8px #888888;">
          <div class="col-lg-8" id="div3" style="margin-bottom: 15px;">
            <div class="tab-content" id="faq-tab-content">
                <h3>Previous Questions</h3>
                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                    <div class="accordion" id="accordion-tab-1">
                        <?php 
                            $cnt=1;
                            $q1="SELECT * from questionmst where Studentid=$sid and Status=1 order by Questionid DESC limit 5";
                            $res1=mysqli_query($cnn,$q1);
                            while($ans1=mysqli_fetch_array($res1))
                            {
                                $que=$ans1['Query'];
                                $answer=$ans1['Answer'];
                                
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
            </div>
        </div>
            </div>
    </section>
 <?php
 	if(isset($_REQUEST['send']))
 	{
 		$ques=$_REQUEST['txtque'];
 		$sid=$_SESSION['stud_id'];
 		
 		$tnm=$_REQUEST['txtdept'];
 		$query="SELECT * from teachermst where Name='$tnm'";
 		$res=mysqli_query($cnn,$query);
 		$ans=mysqli_fetch_array($res);
 		$tid=$ans['Teacherid'];

 		$q="INSERT into questionmst(Studentid,Teacherid,Query) values($sid,$tid,'$ques')";
 		mysqli_query($cnn,$q);
 	}
 ?>   
  
<?php
    require_once("../Layout/footer.php");
?>   