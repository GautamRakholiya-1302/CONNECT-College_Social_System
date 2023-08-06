<?php
  include("connection.php"); 
  // require_once("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect - Education</title>
    <link rel="icon" href="../img/core-img/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="js/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $(".notification").click(function(){
                    $(".count").hide();
                });
           },1000);
        });
    </script>
    
    
    <style type="text/css">
   
       #profile1
       {
        width: 50px;
        height: 50px;
        border-radius: 50px;
        margin-bottom: 10px;
       }

  </style>
   
</head>

<body>
    
    <header class="header-area">
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                    <a class="nav-brand" href="studentprofile.php"><img src="../img/core-img/download1.png"  style="height: 50px;width: 200px;" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                              <li><a href="material.php">Material</a></li>
                              <li><a href="assignment.php">Assignment</a></li>
                              <li><a href="question.php">Questions</a></li>
                                <li><a href="leaveapplication.php">Leave Application</a></li>
                                <li><a href="#">Friends</a>
                                    <ul class="dropdown">
                                        <li><a href="friends.php">Your Friends</a></li>
                                        <li><a href="friendrequest.php"> Friends Requests</a></li>
                                         <li><a href="#">Find Friends</a>
                                                 <ul class="dropdown">
                                                    <li><a href="findstudentfriend.php">Student</a></li>
                                                    <li><a href="findfacultyfriend.php">Faculty</a></li>
                                                     
                                                </ul>
                                         </li>

                                    </ul>
                                </li>
                                <?php
                                        $sid=$_SESSION['stud_id'];
                                        $q2="SELECT * from studentmst where Studentid=$sid";
                                        $res2=mysqli_query($cnn,$q2);
                                        $ans2=mysqli_fetch_array($res2);
                                        $cou2=$ans2['Courseid'];
                                        $sem2=$ans2['Semesterid'];
                                        $class=$ans2['Classid'];
                                        $img=$ans2['Profile'];
                                        $cntass=0;
                                        $q3="SELECT * from assignmentmst where Courseid=$cou2 and Semesterid=$sem2 and Classid=$class";
                                        $res1=mysqli_query($cnn,$q3);
                                        while($ans=mysqli_fetch_array($res1))
                                        {
                                            
                                                 $aid=$ans['Assignmentid'];
                                              
                                                $query1="SELECT Status from notification where Studentid=$sid and Assignmentid=$aid";
                                                
                                            $r=mysqli_query($cnn,$query1);
                                            $a=mysqli_fetch_array($r);

                                            if($a['Status']==0)
                                            {
                                                $cntass++;
                                            }
                                            
                                        }
                                        $cntmati=0;
                                        $res1=mysqli_query($cnn,"SELECT * from materialmst where Courseid=$cou2 and Semesterid=$sem2");
                                        
                                            while($ans=mysqli_fetch_array($res1))
                                            {
                                                   $mid=$ans['Id'];
                                                    $query1="SELECT Status from notification where Studentid=$sid and Materialid=$mid";
                                                
                                                    $r=mysqli_query($cnn,$query1);
                                                    $a=mysqli_fetch_array($r);

                                                    if($a['Status'] == 0)
                                                    {
                                                        $cntmati++;
                                                    }
                                            }
                                        
                                        $cntnoti=0;
                                        $res1=mysqli_query($cnn,"SELECT * from noticemst where Courseid=$cou2 and Semesterid=$sem2");
                                          while($ans=mysqli_fetch_array($res1))
                                            {
                                              
                                                    $nid=$ans['Noticeid'];
                                                    $query1="SELECT Status from notification where Studentid=$sid and Noticeid=$nid";
                                                
                                                    $r=mysqli_query($cnn,$query1);
                                                    $a=mysqli_fetch_array($r);

                                                    if($a['Status'] == 0)
                                                    {
                                                
                                                        $cntnoti++;
                                                    }
                                                
                                            }
                                            $cntt1=0;
                                        $res1=mysqli_query($cnn,"SELECT * from studentfriendmst where Receiverstudent=$sid and Status=0");
                                        $cntt1+=mysqli_num_rows($res1);

                                        

                                        $res1=mysqli_query($cnn,"SELECT * from leaveapplicationmst where Studentid=$sid and Status=0 and Approvedstatus!='0' ");
                                        $cntt1+=mysqli_num_rows($res1);

                                ?>
            
                                </li>
                                
                                <li><a href="notification.php"><div class="container">
                                            <div class="notification">
                                            </div>
                                            <?php 
                                                 $cnt=$cntass+$cntmati+$cntnoti+$cntt1;
                                             if($cnt != 0)
                                            {
                                                echo "<span class=\"count\">";
                                                echo $cnt;
                                                echo "</span>";
                                            }
                                             ?>
                                    </div></a>
                                </li>
                                <li><a href="#"><img src="../img/profile/student/<?php echo $img;?>" id="profile1"></a>
                                    <ul class="dropdown">
                                        <li><a href="changepassword.php"><i class="fa fa-cog text-primary"></i>&nbsp;&nbsp;Setting</a></li>
                                        <li><a href="studentlogout.php" ><i class="fa fa-power-off text-primary"></i>&nbsp;&nbsp;Logout</a></li>
                                     </ul>
                                </li>
                            </ul>
                                      
                           <!--  <div class="register-login-area">
                               <a href="studentlogout.php" class="btn active">Logout</a>
                            </div> -->

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <?php
        // function cntremove()
        // {
        //     unset($cntt1);
        // }
    ?>
