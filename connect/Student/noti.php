<?php
		include("connection.php");
		session_start();
		if(isset($_REQUEST['assig']))
		{
			// echo $_REQUEST['assig'];
			$cntass1=0;
			
			$id=$_SESSION['stud_id'];
			$q1="UPDATE notification set Status=1 where Studentid=$id and  Assignmentid != 'NULL' ";
			mysqli_query($cnn,$q1);

			?>
			<div class="div1" id="assignment">
                                  <span><i class="fa fa-file-pdf-o" style="font-size:60px;color:red;"></i></span>
                                  <span><a  onclick="assi();" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Assignment</span>
                                    <?php
                                      if($cntass1>0)
                                      {
                                  ?>
                                        <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 260px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #3498db;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;"
                                        >
                                        <?php  
                                            echo $cntass1;  
                                             
                                        ?>
                                      </span>
                                      <?php
                                       }
                                  ?>
                                </a>
                             </div>    
                           
			<?php
		}
    if(isset($_REQUEST['mati']))
    {
      //echo $_REQUEST['mati'];
      $cntmat1=0;

      $id=$_SESSION['stud_id'];
      $q1="UPDATE notification set Status=1 where Studentid=$id and  Materialid != 'NULL' ";
      mysqli_query($cnn,$q1);
      ?>
      <div class="div1" id="material">
                                 <span><i class="fa fa-file-text" style="font-size:60px;color:#3498db;"></i></span>
                                 <span><a onclick="mati();" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Material</span>
                                  <?php
                                      if($cntmat1>0)
                                      {
                                  ?>
                                        <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 260px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #3498db;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;"
                                        >
                                        <?php  
                                            echo $cntmat1;  
                                             
                                        ?>
                                      </span>
                                      <?php
                                       }
                                  ?>
                                   </a>
                                </div>
      <?php
    }

    if(isset($_REQUEST['noti']))
    {
      //echo $_REQUEST['noti'];
      $cntnoti=0;
      $id=$_SESSION['stud_id'];
      $q1="UPDATE notification set Status=1 where Studentid=$id and  Noticeid != 'NULL' ";
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
    if(isset($_REQUEST['leaveapp']))
    {
      $cntlapp=0;
       $id=$_SESSION['stud_id'];
      echo $_REQUEST['leaveapp'];
      $q="UPDATE leaveapplicationmst set Status= 1 where Studentid=$id";
        mysqli_query($cnn,$q);
     ?>
                          <div class="col-12">
                                <div class="div1" id="leaveapp">
                                  <span><i class="fa fa-edit" style="font-size:60px;color:#4d0099;"></i></span>
                                  <span><a onclick="leaveapp();" style="margin-top: 10px;margin-left: 20px;font-size: 25px;">Leave Application</span>
                                       <?php
                                            if($cntlapp > 0)
                                            { 
                                        ?>
                                        <span style="position: absolute;
                                                  margin-top: 20px;
                                                  padding-bottom: 10px;
                                                  margin-left: 135px;
                                                  border-radius: 90%;
                                                  height: 35px;
                                                  width: 30px;
                                                  background: #4d0099;
                                                  color: white;
                                                  text-align: center;
                                                  size: 10px;"
                                        >
                                        <?php  
                                            echo $cntlapp;
                                              
                                        ?>
                                      </span>
                                      <?php
                                          }
                                     ?>
                                  </a>
                                </div>    
                          </div>
                           <?php
                                      
                                  
                          
    }
?>