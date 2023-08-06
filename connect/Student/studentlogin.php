<?php
  session_start();
  include("connection.php"); 
  

if(isset($_REQUEST['btnsubmit']))
{
  $em=$_REQUEST['email'];
  $query = "SELECT * FROM studentmst WHERE Email='$em'";
  $run = mysqli_query($cnn,$query);
  $row = mysqli_fetch_array($run);
  $num = mysqli_num_rows($run);
  if($num==0)
  {
        $_SESSION['message']="<b>Email address is not registered...</b>";
        echo "<script type=\"text/javascript\">
        window.location = \"studentlogin.php?Err=true\"
        </script>";
  }
  else
  {
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
      
      $mail->addAddress($row['Email']);
      
      $mail->isHTML(true);
     
      $mail->Subject = "Test mail for your Login";
      $mail->Body = "<b>Username : </b>".$row['Username']."<br><b>Password : </b>".base64_decode($row['Pwd']);
      $mail->AltBody = "This is the plain text version of the email content";
      if(!$mail->send())
      {
          $_SESSION['message']="<b>Please Check Your Internet Connection...</b>";
          echo "<script type=\"text/javascript\">
          window.location = \"studentlogin.php?Err=true\"
          </script>";

      }
      else
      {
        echo "<script type=\"text/javascript\">
        window.location = \"studentlogin.php\"
        </script>";
      }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect - Education &amp;  Home</title>
    <link rel="icon" href="../img/core-img/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script>
      $(document).ready(function(){ 
        $("#div3").hide();
        $("#div2").click(function(){
            $("#div3").show();
            $("#div1").hide();
            $("#div2").hide();
           
        }); 
    });
    </script> 
</head>

<body>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        
        <!-- Navbar Area -->
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">
                    <a class="nav-brand" href="../index.php"><img src="../img/core-img/download1.png"  style="height: 50px;width: 200px;" alt=""></a>
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
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
    

    <!-- ##### Register Now Start ##### -->
    <section class="register-now section d-flex justify-content-between align-items-center" >
        <!-- Register Contact Form -->
         <div class="hero-area bg-img bg-overlay-2by5 " style="width:100%;height:100%;background-image: url(../img/core-img/bg.jpg);padding-top: 100px;">
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left:27%;">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-12">

            
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
                    <div class="alert alert-danger" role="alert">
                          <?php echo $_SESSION['message'];  ?>
                    </div>
                    <?php
                  }
                ?>
               </div>
                    <div class="col-12">
                        <div id="div1" class="forms">
                            <h4 class="text-primary">Student Login</h4>
                            <form  action="chkstudentlogin.php" autocomplete="off" method="post">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text"   class="form-control text-info" name="txtuname" id="text" placeholder="UserName" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control text-info" id="password"  name="txtpwd" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block mt-3 font-weight-bold" name="btn">Login</button>
                                    </div>
                                    <div class="col-12" id="div2">
                                        <button type="submit" name="submit" class="btn btn-outline-primary btn-block mt-3 font-weight-bold">Forgot Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" id="div3">
                <form method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h3><b>Email</b></h3>
                                <input type="text" class="form-control text-info" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-12">
                                <input type="submit" class="form-control btn btn-primary btn-block mt-3 font-weight-bold" name="btnsubmit" value="submit">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
      </div>
</section>

<div class="top-header-area d-flex justify-content-between align-items-center">
            <div class="contact-info">
                <a href="#"><span>Phone:</span> +44 300 303 0266</a>
                <a href="#"><span>Email:</span> info@connect.com</a>
            </div>
</div>
