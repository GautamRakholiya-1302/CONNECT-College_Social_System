<?php
    require_once("session.php");
    include("connection.php");
      $pid=$_REQUEST['id'];
      $q="select * from postmst where Postid=$pid";
      $res=mysqli_query($cnn,$q);
      $ans=mysqli_fetch_array($res);
      $des=$ans['Description'];
      $img=$ans['Postimg'];
      $sid=$ans['Studentid'];
    if(isset($ans['Studentid']))
    {
        $que="SELECT * from studentmst where Studentid=$sid";
        $data=mysqli_query($cnn,$que);
        $row=mysqli_fetch_array($data);
        $name=$row['Middlename'];
    }
   $tid=$ans['Teacherid'];
    if(isset($ans['Teacherid']))
    {
    $que="select Name from teachermst where Teacherid=$tid";
    $data=mysqli_query($cnn,$que);
    $row=mysqli_fetch_array($data);
    $name=$row['Name'];
    }
?>
<?php
    
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
</head>
<body>
   
    <header class="header-area">
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar justify-content-between" id="cleverNav">
                    <a class="nav-brand" href="adminhome.php"><img src="../img/core-img/download1.png"  style="height: 50px;width: 200px;" alt=""></a>
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
    <section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="forms">
                            
                             <form  method="post" autocomplete="off" enctype="multipart/form-data">
                                    <div class="col-12 ">
                                        <label><b>Username</b></label>
                                        <div class="form-group">
                                            <input type="text" class="form-control text-info" name="txtuname"value="<?php echo $name; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label><b>Description</b></label>
                                            <input type="text" class="form-control text-info" name="txtdes" value="<?php echo $des; ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <img src="../img/post/photo/<?php echo $img; ?>" width="500" height="450" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button class="btn btn-success w-100" name="btnapproved"><b>Approved</b></button>
                                        </div>
                                    </div>
                                  </form>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button class="btn btn-danger w-100 " name="btndeclined" data-target="#warning" data-toggle="modal"><b>Declined</b></button>
                                        </div>
                                    </div>
                                </div>
                          
                         </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <!--Modal start-->
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                
                <div class="modal fade" id="warning" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header " style="background-color: #ffcc00;">
                            <h5><img src="../img/core-img/warning.png" width="50px" height="50px">&nbsp;&nbsp;Give Warning</h5>
                      </div>
                      <div class="modal-body ">
                         <form method="post" enctype="multipart/form-data">
                                 <label><b>Description</b></label>
                                        <div class="form-group">
                                            <textarea class="form-control text-info" rows="5" cols="64" placeholder="Write Description Here..." name="txtwarn" style="height: 80px;"></textarea>
                                        </div>
                                 
                      </div>
                      <div class="modal-footer">
                                <div class="row">
                                        <div class="col-sm-12"><button class="btn btn-warning" name="btnwarn">Warn</button></div>
                                  </div> 
                                <button class="btn btn-warning" data-dismiss="modal">Close</button>
                                </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!--Modal end -->

<?php
    if(isset($_REQUEST['btnapproved']))
    {
        $query="UPDATE postmst set Approvedstatus='Approved' where Postid=$pid";

        $cnt=mysqli_query($cnn,$query);
        if($cnt > 0)
        {
            if(isset($sid))
            {
            echo "<script type=\"text/javascript\">
                window.location = \"studentpost.php\"
                </script>";
            }

            if(isset($tid))
            {
            echo "<script type=\"text/javascript\">
                window.location = \"facultypost.php\"
                </script>";
            }

        }
    }
    if(isset($_REQUEST['btnwarn']))
    {
            $text=$_REQUEST['txtwarn'];
            echo $text;
            $time=time();
            echo $time;
            if(isset($sid))
            {
                $q1="INSERT into warningmst(Studentid,Text,Time) values($sid,'$text',$time)";
                //echo $q1;
                mysqli_query($cnn,$q1);
                 $query="UPDATE postmst set Approvedstatus='Rejected' where Postid=$pid";
                $cnt=mysqli_query($cnn,$query);

                echo "<script type=\"text/javascript\">
                    window.location = \"studentpost.php\"
                    </script>";
            }

            if(isset($tid))
            {
                $q2="INSERT into warningmst(Teacherid,Text,Time) values($tid,'$text',$time)";
                echo $q2;
                mysqli_query($cnn,$q2);
                 $query="UPDATE postmst set Approvedstatus='Rejected' where Postid=$pid";
                $cnt=mysqli_query($cnn,$query);

                echo "<script type=\"text/javascript\">
                    window.location = \"facultypost.php\"
                    </script>";
            } 
    }
   
?>
<?php
    require_once("../Layout/footer.php");
?>