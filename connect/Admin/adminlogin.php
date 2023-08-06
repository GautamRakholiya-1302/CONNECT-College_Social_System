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
</head>
<body>
   
    <header class="header-area">
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar justify-content-between" id="cleverNav">
                    
                    <a class="nav-brand" href="../index.php"><img src="../img/core-img/download1.png"  style="height: 50px;width: 200px;" alt=""></a>
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <div class="classy-menu">
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                    </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <section class="register-now section d-flex justify-content-between align-items-center" >
        <!-- Register Contact Form -->
        <div class="hero-area bg-img bg-overlay-2by5 " style="width:100%;height:100%;background-image: url(../img/core-img/bg.jpg);padding-top: 100px;">
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left:27%;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="forms">
                            <h4 class="text-primary">Admin Login</h4>
                            <form action="chkadminlogin.php" method="post" autocomplete="off" name="fm">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control text-info" name="txtname" id="txtname" placeholder="UserName">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control text-info" name="txtpwd" id="txtpwd" placeholder="Password">
                                        </div>
                                    </div>
                                     
                                    <div class="col-12">
                                         <button class="btn clever-btn w-100">Login</button> 
                                    </div>
                                    <div class="col-12">
                                         <a></a> 
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<div class="top-header-area d-flex justify-content-between align-items-center">
           <div class="contact-info">
                <a href="#"><span>Phone :</span> +44 300 303 0266</a>
                <a href="#"><span>Email :</span> connect1014@gmail.com</a>
            </div>
</div>

        