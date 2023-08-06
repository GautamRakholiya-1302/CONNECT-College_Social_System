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
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    
</head>
<body>
    
    <header class="header-area">
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">
                <a class="nav-brand" href="adminhome.php"><img src="../img/core-img/download1.png"  style="height: 50px;width: 200px;" alt=""></a>
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
                                <li><a href="#">Student</a>
                                    <ul class="dropdown">
                                        <li><a href="addstudent.php">Add Student</a></li>
                                        <li><a href="#">Manage Student</a>
                                            <ul class="dropdown">
                                                <li><a href="removestudent.php">Remove Student</a></li>
                                                <li><a href="transferstudent.php">Transfer Student</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="viewstudent.php">View Student</a></li>
                                    </ul>
                                </li>                                
                                <li><a href="#">Faculty</a>
                                    <ul class="dropdown">
                                        <li><a href="addfaculty.php">Add Faculty</a></li>
                                        <li><a href="managefaculty.php">Manage Faculty</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Manage Post</a>
                                    <ul class="dropdown">
                                        <li><a href="studentpost.php">Student Post</a></li>
                                        <li><a href="facultypost.php">Faculty Post</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Add Course</a>
                                    <ul class="dropdown">
                                        <li><a href="addcourse.php">Course</a></li>
                                        <li><a href="addsubject.php">Subject</a></li>
                                        <li><a href="addclass.php">Class</a></li>
                                    </ul>
                                </li>
                                <li><a href="addevent.php">Add Events</a></li>
                                <li><a href="addnotice.php">Add Notice</a></li>
                            </ul>
                            <div class="register-login-area">
                                <a href="adminlogout.php" class="btn active">Logout</a>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script> -->