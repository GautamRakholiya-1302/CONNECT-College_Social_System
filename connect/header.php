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
    <link rel="stylesheet" href="js/bootstrap/bootstrap.min.js">
    <title>Connect - Education</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="js/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <header class="header-area">
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar justify-content-between" id="cleverNav">
                    <a class="nav-brand" href="index.php"><img src="img/core-img/download1.png"  style="height: 50px;width: 200px;" alt=""></a>
                   <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <div class="classy-menu">
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <div class="classynav">
                            <ul>
                                <a href="index.php" class="btn active">Home</a>
                                <a href="about.php" class="btn active">About Us</a>
                                <a href="course.php" class="btn active">Courses</a>
                                <a href="event.php" class="btn active">Events</a>
                                <a href="contact.php" class="btn active">Contact Us</a>
                                <li>
                                    <a href="#">Login</a>
                                    <ul class="dropdown">
                                        <li><a href="Admin/adminlogin.php">Admin</a></li>
                                        <li><a href="Faculty/facultylogin.php">Faculty</a></li>
                                        <li><a href="Student/studentlogin.php">Student</a></li>
                                    </ul>
                                </li>
                            </ul>
                    </div>
                </div>
                </nav>
            </div>
        </div>
    </header>