<?php
		include("connection.php");
		session_start();
		if(isset($_REQUEST['noti']))
		{
			$cntnoti=0;
			
			$id=$_SESSION['user_id'];
			$q1="UPDATE notification set Status=1 where Teacherid=$id and  Noticeid != 'NULL' ";
			mysqli_query($cnn,$q1);

			?>
			 <div class="div1" id="notice">
                                  <span><i class="fa fa-bullhorn" style="font-size:60px;color:#e65c00;"></i></span>
                                  <span><a onclick="noti();" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Notice</span>
                                        <?php
                                            if($cntnoti > 0)
                                            {
                                        ?>
                                        <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 270px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #e65c00;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;">
                                        <?php  
                                          echo $cntnoti;
                                        ?>
                                      </span>
                                    <?php
                                            }
                                    ?>
                                  </a>
                                </div>
			<?php
		}

    if(isset($_REQUEST['rmsg']))
    {
      echo $_REQUEST['rmsg'];
      $cntrmsg=0;
      $id=$_SESSION['user_id'];
      $q="UPDATE messagemst set notification=1 where  Senderid=$id";
      $c=mysqli_query($cnn,$q);
     ?>
                          
                                <div class="div1" id="remsg">
                                  <span><img src="../img/core-img/msg1.jfif" id="message" style="width:60px; height: 60px;"></span>
                                  <span><a onclick="rece_msg();" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Message</span>
                                 <?php
                                    if($cntrmsg > 0)
                                    {
                                 ?>
                                    <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 240px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #3d5c5c;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;"
                                        >
                                        <?php  
                                            echo $cntrmsg;
                                        ?>
                                      </span>
                                      <?php
                                        }
                                      ?>
                                  </a>
                                </span>
                                </div>    
                         
                          <?php
    }
?>