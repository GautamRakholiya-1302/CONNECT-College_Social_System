<?php
    include("connection.php");

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
    <link rel="stylesheet" type="text/css" href="js/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<body style="background-image: url(img/core-img/texture.png);">
    <!-- Preloader -->
    <!-- <div id="preloader">
        <div class="spinner"></div>
    </div> -->

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                 <a class="nav-brand" href="facultyprofile.php"><img src="../img/core-img/download1.png"  style="height: 50px;width: 200px;" alt=""></a>
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

                        <?php
                                        $tid=$_SESSION['user_id'];
                                        $q2="SELECT * from teachermst where Teacherid=$tid";
                                        $res3=mysqli_query($cnn,$q2);
                                        $ans2=mysqli_fetch_array($res3);
                                        $cou2=$ans2['Department'];
                                        $img=$ans2['Profile'];

                                        $q="SELECT * from noticemst where Courseid=$cou2";
                                        $res=mysqli_query($cnn,$q);
                                        $cntnoti=0;
                                        while($ans=mysqli_fetch_array($res))
                                            {
                                              
                                                    $nid=$ans['Noticeid'];
                                                    $query1="SELECT Status from notification where Teacherid=$tid and Noticeid=$nid and Status=0";
                                                   
                                                    $r=mysqli_query($cnn,$query1);
                                                    $a=mysqli_fetch_array($r);
                                                    $cntnoti+=mysqli_num_rows($r);
                                                    
                                                   
                                            }
                                           
                                       $cntt1=0;
                                       //echo $cntt1;
                                        $res1=mysqli_query($cnn,"SELECT * from teacherfriendmst where Receiverteacher=$tid and Status=0");
                                        $cntt1+=mysqli_num_rows($res1);
                                        $res3=mysqli_query($cnn,"SELECT * from studentfriendmst where Receiverteacher=$tid and Status=0");
                                        $cntt1+=mysqli_num_rows($res3);
                                         //echo $cntt1;
                                        $res2=mysqli_query($cnn,"SELECT * from leaveapplicationmst where Teacherid=$tid and Approvedstatus='0' ");

                                        $cntt1+=mysqli_num_rows($res2);
                                         //echo $cntt1;
                                        $query="SELECT * from messagemst where Receiverid=$tid and Status=0 ";
                                        //echo $query;
                                        $res=mysqli_query($cnn,$query);
                                        $cntt1+=mysqli_num_rows($res);
                                          // echo $cntt1; 
                                        $query="SELECT * from messagemst where Senderid=$tid and Status=1 and notification=0";
                                        $res=mysqli_query($cnn,$query);
                                        $cntt1+=mysqli_num_rows($res);
                                         //echo $cntt1;
                                ?>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="material.php">Material</a></li>
                                <li><a href="assignment.php">Assignment</a></li>
                                <li><a href="question.php">Questions</a></li>
                                <li><a href="manageapplication.php">Leave Application</a></li>
                                <li><a href="#">Friends</a>
                                    <ul class="dropdown">
                                        <li><a href="friends.php">Your Friends</a></li>
                                        <li><a href="friendrequest.php"> Friends Requests</a></li>
                                         <li><a href="#">Find Friends</a>
                                                 <ul class="dropdown">
                                                    <li><a href="findfacultyfriend.php">Faculty</a></li>
                                                     
                                                </ul>
                                         </li>

                                    </ul>
                                </li>
                                
                                <li><a href="notification.php" onclick="<?php cntremove1(); ?>"><div class="container">
                                        <div class="notification">
                                        </div>
                                        <?php
                                            $cnt=$cntnoti+$cntt1;
                                            if($cnt != 0)
                                            {
                                            echo "<span class=\"count\">";
                                            echo $cnt; 
                                            echo "</span>";
                                            }
                                        ?>
                                </div></a>
                                </li>
                                <li><a href="#"><img src="../img/profile/faculty/<?php echo $img;?>" id="profile1"></a>
                                    <ul class="dropdown">
                                        <li><a href="changepassword.php"><i class="fa fa-cog text-primary"></i>&nbsp;&nbsp;Setting</a></li>
                                        <li><a href="facultylogout.php" ><i class="fa fa-power-off text-primary"></i>&nbsp;&nbsp;Logout</a></li>
                                     </ul>
                                </li>
                            </ul>

                            <!-- <div class="register-login-area">
                                <a href="facultylogout.php" class="btn active">Logout</a>
                            </div>
 -->

                        </div>
                        <!-- Nav End -->
                    </div>

                </nav>
            </div>
        </div>
    </header>
    <?php
        function cntremove1()
        {
            unset($cntt1);
        } 
    ?> 